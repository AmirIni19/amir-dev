<?php

// جلوگیری از دسترسی مستقیم به فایل
defined( 'ABSPATH' ) || exit;

/**
 * اضافه کردن منوی تنظیمات افزونه به پیشخوان وردپرس
 */
function LTO_add_admin_menu() {
    add_menu_page(
        'تنظیمات لاگینتو',      // عنوان صفحه (Title Tag)
        'لاگینتو',               // نام منو
        'manage_options',        // سطح دسترسی مورد نیاز
        'loginto_settings',      // اسلاگ (slug) صفحه
        'LTO_settings_page_html',// تابعی که محتوای صفحه را نمایش می‌دهد
        LTO_ASSETS_URL . 'images/loginto.icon.png', // آیکون منو (تغییر یافته)
        100                      // جایگاه منو در لیست
    );
}
add_action( 'admin_menu', 'LTO_add_admin_menu' );


/**
 * رندر کردن ساختار HTML اصلی صفحه تنظیمات
 */
function LTO_settings_page_html() {
    // بررسی سطح دسترسی کاربر
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap lto-settings-wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // خروجی فیلدهای امنیتی، nonce و غیره
            settings_fields( 'lto_settings_group' );
            // نمایش بخش‌های مختلف تنظیمات
            do_settings_sections( 'loginto_settings' );
            // دکمه ذخیره تغییرات
            submit_button( 'ذخیره تغییرات' );
            ?>
        </form>
    </div>
    <?php
}


/**
 * ثبت، تعریف بخش‌ها و فیلدهای تنظیمات
 */
function LTO_initialize_settings() {
    // ثبت یک گروه تنظیمات که تمام گزینه‌های ما را در یک ردیف در دیتابیس ذخیره می‌کند
    register_setting( 'lto_settings_group', 'lto_settings' );

    // --- بخش اول: تنظیمات عمومی ---
    add_settings_section(
        'lto_general_section',
        'تنظیمات عمومی',
        'LTO_general_section_callback', // تابع برای نمایش توضیحات این بخش
        'loginto_settings'
    );

    add_settings_field( 'enable_persian_font', 'فعال‌سازی فونت فارسی', 'LTO_setting_callback_checkbox', 'loginto_settings', 'lto_general_section', [ 'id' => 'enable_persian_font', 'label' => 'فونت زیبای فارسی در کل پیشخوان و صفحه ورود فعال شود.' ] );
    // فیلد مربوط به استایل پنل مدیریت حذف شد.

    // --- بخش دوم: تنظیمات صفحه ورود ---
    add_settings_section(
        'lto_login_page_section',
        'تنظیمات صفحه ورود',
        'LTO_login_page_section_callback',
        'loginto_settings'
    );

    add_settings_field( 'enable_login_style', 'فعال‌سازی استایل صفحه ورود', 'LTO_setting_callback_checkbox', 'loginto_settings', 'lto_login_page_section', [ 'id' => 'enable_login_style', 'label' => 'ظاهر جذاب برای صفحه ورود و ثبت‌نام فعال شود.' ] );
    add_settings_field( 'login_logo', 'آپلود لوگو', 'LTO_setting_callback_image_uploader', 'loginto_settings', 'lto_login_page_section', [ 'id' => 'login_logo' ] );
    add_settings_field( 'login_bg', 'آپلود پس‌زمینه', 'LTO_setting_callback_image_uploader', 'loginto_settings', 'lto_login_page_section', [ 'id' => 'login_bg' ] );
    add_settings_field( 'main_color', 'انتخاب رنگ اصلی', 'LTO_setting_callback_color_picker', 'loginto_settings', 'lto_login_page_section', [ 'id' => 'main_color' ] );

    // --- بخش سوم: تنظیمات امنیتی ---
    add_settings_section(
        'lto_security_section',
        'تنظیمات امنیتی',
        'LTO_security_section_callback',
        'loginto_settings'
    );

    add_settings_field( 'enable_captcha', 'فعال‌سازی کپچا', 'LTO_setting_callback_checkbox', 'loginto_settings', 'lto_security_section', [ 'id' => 'enable_captcha', 'label' => 'یک سوال ساده جمع ریاضی برای جلوگیری از ورود ربات‌ها به فرم ورود اضافه شود.' ] );
}
add_action( 'admin_init', 'LTO_initialize_settings' );


/*
 * توابع Callback برای نمایش توضیحات هر بخش
 */
function LTO_general_section_callback() {
    echo '<p>تنظیمات کلی برای فعال‌سازی قابلیت‌های اصلی افزونه.</p>';
}
function LTO_login_page_section_callback() {
    echo '<p>شخصی‌سازی ظاهر صفحه ورود، ثبت‌نام و فراموشی رمز عبور.</p>';
}
function LTO_security_section_callback() {
    echo '<p>افزایش امنیت فرم ورود وردپرس.</p>';
}


/*
 * توابع Callback برای رندر کردن هر فیلد در صفحه تنظیمات
 */

// تابع برای نمایش فیلدهای checkbox
function LTO_setting_callback_checkbox( $args ) {
    $options = get_option( 'lto_settings', [] );
    $id = $args['id'];
    $label = $args['label'];
    $checked = isset( $options[$id] ) ? checked( $options[$id], 'on', false ) : '';
    echo "<label for='{$id}'><input type='checkbox' id='{$id}' name='lto_settings[{$id}]' {$checked} /> {$label}</label>";
}

// تابع برای نمایش فیلدهای آپلود تصویر
function LTO_setting_callback_image_uploader( $args ) {
    $options = get_option( 'lto_settings', [] );
    $id = $args['id'];
    
    // تعریف تصاویر پیش‌فرض
    $default_value = '';
    if ( $id === 'login_logo' ) {
        $default_value = LTO_ASSETS_URL . 'images/loginto-log.png';
    } elseif ( $id === 'login_bg' ) {
        $default_value = LTO_ASSETS_URL . 'images/loginto-back.jpg';
    }

    // اگر مقداری در دیتابیس ذخیره شده، از آن استفاده کن، در غیر این صورت از مقدار پیش‌فرض استفاده کن
    $value = ! empty( $options[$id] ) ? esc_url( $options[$id] ) : $default_value;

    echo "<div>";
    echo "<input type='text' id='{$id}' name='lto_settings[{$id}]' value='{$value}' class='regular-text' />";
    echo "<input type='button' class='button-secondary lto-upload-button' value='آپلود تصویر' data-target-id='{$id}' />";
    echo "<div class='lto-image-preview' id='{$id}-preview' style='margin-top:10px;'>";
    if ( $value ) {
        echo "<img src='{$value}' style='max-width:200px; height:auto;' />";
    }
    echo "</div></div>";
}

// تابع برای نمایش فیلد انتخاب رنگ
function LTO_setting_callback_color_picker( $args ) {
    $options = get_option( 'lto_settings', [] );
    $id = $args['id'];
    $value = isset( $options[$id] ) ? sanitize_hex_color( $options[$id] ) : '#8b70cd';
    echo "<input type='text' id='{$id}' name='lto_settings[{$id}]' value='{$value}' class='lto-color-picker' />";
}


/**
 * اضافه کردن اسکریپت‌های مورد نیاز برای صفحه تنظیمات (برای آپلودر و انتخاب رنگ)
 */
function LTO_enqueue_settings_page_assets( $hook ) {
    // فقط در صفحه تنظیمات خودمان اسکریپت‌ها را بارگذاری کن
    if ( 'toplevel_page_loginto_settings' != $hook ) {
        return;
    }
    wp_enqueue_media(); // برای آپلودر تصویر
    wp_enqueue_style( 'wp-color-picker' ); // استایل انتخاب‌گر رنگ
    wp_enqueue_script( 'wp-color-picker' ); // اسکریپت انتخاب‌گر رنگ
    wp_enqueue_script( 'lto-admin-settings', LTO_ASSETS_URL . 'js/admin-settings.js', [ 'jquery' ], LTO_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'LTO_enqueue_settings_page_assets' );


// amir-naseri.ir