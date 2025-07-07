<?php

/**
 * Plugin Name: My Profile Page
 * Description: پروفایل شبکه اجتماعی
 * Version: 1.0
 * Author: Webuto 
 */

if (!defined('ABSPATH'))
    exit;





























// **************************  start our panel of in conter wp **************************

// Create custom post type 'insta_post' ************************************************
function mip_create_post_type()
{
    register_post_type('insta_post', [
        'labels' => ['name' => __('پست‌های شبکه اجتماعی'), 'singular_name' => __('پست شبکه اجتماعی'), 'add_new' => __('افزودن پست جدید')],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-camera',
        'supports' => ['title', 'thumbnail'],
    ]);
}
add_action('init', 'mip_create_post_type');

// Add admin menu for profile settings
function mip_add_admin_menu()
{
    add_menu_page('تنظیمات پروفایل شبکه اجتماعی', 'تنظیمات پروفایل', 'manage_options', 'my_insta_page_settings', 'mip_settings_page_html', 'dashicons-admin-users', 25);
}
add_action('admin_menu', 'mip_add_admin_menu');

// Register settings fields
function mip_register_settings()
{
    register_setting('mip_settings_group', 'mip_profile_name');
    register_setting('mip_settings_group', 'mip_profile_bio');
    register_setting('mip_settings_group', 'mip_profile_picture');
}
add_action('admin_init', 'mip_register_settings');

// HTML for profile settings page
function mip_settings_page_html()
{
    if (!current_user_can('manage_options'))
        return;
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php settings_fields('mip_settings_group'); ?>
            <table class="form-table">
                <tr>
                    <th><label for="mip_profile_name">نام پروفایل کاربری</label></th>
                    <td><input type="text" id="mip_profile_name" name="mip_profile_name"
                            value="<?php echo esc_attr(get_option('mip_profile_name')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="mip_profile_bio">بیوگرافی</label></th>
                    <td><textarea id="mip_profile_bio" name="mip_profile_bio" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('mip_profile_bio')); ?></textarea></td>
                </tr>
                <tr>
                    <th><label for="mip_profile_picture">عکس پروفایل</label></th>
                    <td>
                        <input type="text" name="mip_profile_picture" id="mip_profile_picture"
                            value="<?php echo esc_attr(get_option('mip_profile_picture')); ?>" class="regular-text" />
                        <input type="button" id="mip-upload-btn" class="button-secondary" value="آپلود عکس">
                        <?php if (get_option('mip_profile_picture')): ?>
                            <p><img src="<?php echo esc_url(get_option('mip_profile_picture')); ?>"
                                    style="width:100px;height:100px;border-radius:50%;object-fit:cover;margin-top:10px;" /></p>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}



// Add gallery meta box
// When we want to add new post in the our site , it is here 
function mip_add_gallery_meta_box()
{
    add_meta_box('mip_gallery_meta_box', 'گالری پست (اسلایدر)', 'mip_gallery_meta_box_html', 'insta_post', 'normal', 'high');
}
add_action('add_meta_boxes', 'mip_add_gallery_meta_box');

// HTML for gallery meta box
function mip_gallery_meta_box_html($post)
{
    wp_nonce_field('mip_save_gallery_meta_box_data', 'mip_gallery_meta_box_nonce');
    $gallery_ids_str = get_post_meta($post->ID, '_mip_gallery_ids', true);
    $gallery_ids = !empty($gallery_ids_str) ? explode(',', $gallery_ids_str) : [];
?>
    <div id="mip_gallery_container">
        <ul class="mip-gallery-images">
            <?php
            foreach ($gallery_ids as $image_id) {
                if ($image_id) {
                    echo '<li class="image" data-attachment_id="' . esc_attr($image_id) . '">';
                    echo wp_get_attachment_image($image_id, 'thumbnail');
                    echo '<a href="#" class="delete" title="حذف">×</a>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
        <input type="hidden" id="mip_gallery_image_ids" name="mip_gallery_ids"
            value="<?php echo esc_attr($gallery_ids_str); ?>" />
    </div>
    <p class="add-mip-gallery-images-wrapper">
        <a href="#" class="button button-primary add-mip-gallery-images">افزودن تصاویر/ویدیوهای گالری</a>
    </p>
<?php
}

// Save gallery meta box data
function mip_save_gallery_meta_box_data($post_id)
{
    if (!isset($_POST['mip_gallery_meta_box_nonce']) || !wp_verify_nonce($_POST['mip_gallery_meta_box_nonce'], 'mip_save_gallery_meta_box_data'))
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;

    $ids_string = isset($_POST['mip_gallery_ids']) ? sanitize_text_field($_POST['mip_gallery_ids']) : '';
    update_post_meta($post_id, '_mip_gallery_ids', $ids_string);
}
add_action('save_post_insta_post', 'mip_save_gallery_meta_box_data');

// **************************  end of our panel of in conter wp **************************









































// // **************************  start our frontend page **************************
// Shortcode for frontend display
function mip_display_shortcode_slider()
{
    $profile_name = get_option('mip_profile_name', 'نام پروفایل');
    $profile_bio = get_option('mip_profile_bio', 'بیوگرافی شما.');
    $profile_picture_url = get_option('mip_profile_picture', plugins_url('assets/images/default-profile.png', __FILE__));

    // Count posts for display
    $post_count = wp_count_posts('insta_post')->publish;

    ob_start();
?>


    <div class="mip-container">
        <header class="mip-profile">
            <div class="mip-profile-image"><img src="<?php echo esc_url($profile_picture_url); ?>" alt="Profile Picture">
            </div>
            <div class="mip-profile-info">
                <h1 class="mip-profile-name"><?php echo esc_html($profile_name); ?>
                    <br>
                    <span class="profile-stats"><span class="profile-stat-count"><?php echo esc_html($post_count); ?></span>
                        پست</span>
                </h1>
                <p class="mip-profile-bio"><?php echo nl2br(esc_html($profile_bio)); ?></p>


            </div>
        </header>


        <!-- Stories Section -->
        <section class="mip-stories" style="text-align: center; margin: 2rem 0; display:flex;">
            <?php echo do_shortcode('[wp-story]'); ?>
        </section>

        <main class="mip-posts-grid">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $query = new WP_Query([
                'post_type'      => 'insta_post',
                'posts_per_page' => 12, // نمایش ۱۲ پست در هر صفحه
                'paged'          => $paged,
                'orderby'        => 'date',
                'order'          => 'DESC'
            ]);
            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $post_id = get_the_ID();
                    $gallery_ids_str = get_post_meta($post_id, '_mip_gallery_ids', true);
                    $gallery_ids = !empty($gallery_ids_str) ? explode(',', $gallery_ids_str) : [];
                    $thumbnail_url = get_the_post_thumbnail_url($post_id, 'medium_large') ?: plugins_url('assets/images/default-thumbnail.png', __FILE__);
                    $likes = get_post_meta($post_id, '_mip_likes', true) ?: 0;

                    $gallery_data = [];
                    if (!empty($gallery_ids)) {
                        foreach ($gallery_ids as $id) {
                            if ($id) {
                                $url = wp_get_attachment_url($id);
                                if ($url) {
                                    $gallery_data[] = ['url' => $url, 'type' => strpos(get_post_mime_type($id), 'video') !== false ? 'video' : 'image'];
                                }
                            }
                        }
                    }
                    if (empty($gallery_data) && has_post_thumbnail($post_id)) {
                        $gallery_data[] = ['url' => $thumbnail_url, 'type' => 'image'];
                    }
                    if (empty($gallery_data))
                        continue;
            ?>
                    <div class="mip-post-item" data-gallery='<?php echo esc_attr(json_encode($gallery_data)); ?>'
                        data-caption="<?php echo esc_attr(get_the_title()); ?>"
                        data-profile-name="<?php echo esc_attr($profile_name); ?>"
                        data-profile-pic="<?php echo esc_url($profile_picture_url); ?>"
                        data-post-id="<?php echo esc_attr($post_id); ?>" data-likes="<?php echo esc_attr($likes); ?>">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </main>
    </div>
    <div id="mip-modal" class="mip-modal-overlay">
        <span class="mip-modal-close">×</span>
        <div class="mip-modal-content">
            <div class="mip-modal-slider">
                <div class="mip-slider-container"></div>

                <!-- <button class="mip-slider-nav prev">
                    >
                </button>
                    
                <button class="mip-slider-nav next">
                        <
                </button> -->

                <button class="mip-slider-nav next" aria-label="Next slide">&lt;</button>
                <button class="mip-slider-nav prev" aria-label="Previous slide">&gt;</button>

            </div>
            <div class="mip-modal-info"></div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('my_insta_page', 'mip_display_shortcode_slider');
// // **************************  end of our frontend page **************************






























// Include asset files
require_once plugin_dir_path(__FILE__) . 'admin-assets.php';
require_once plugin_dir_path(__FILE__) . 'frontend-assets.php';
require_once plugin_dir_path(__FILE__) . 'ajax-handlers.php';
?>