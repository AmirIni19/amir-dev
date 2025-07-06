<?php
// Handle AJAX request for liking/unliking a post
function mip_like_post() {
    check_ajax_referer('mip_like_nonce', 'nonce');

    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    $unlike = isset($_POST['unlike']) && $_POST['unlike'] == 1;
    if (!$post_id || get_post_type($post_id) !== 'insta_post') {
        wp_send_json_error(['message' => 'پست نامعتبر است']);
    }

    $likes = get_post_meta($post_id, '_mip_likes', true);
    $likes = $likes ? intval($likes) : 0;

    if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        $liked_posts = get_user_meta($user_id, '_mip_liked_posts', true);
        $liked_posts = $liked_posts ? explode(',', $liked_posts) : [];

        if ($unlike) {
            if (in_array($post_id, $liked_posts)) {
                $likes = max(0, $likes - 1);
                update_post_meta($post_id, '_mip_likes', $likes);
                $liked_posts = array_diff($liked_posts, [$post_id]);
                update_user_meta($user_id, '_mip_liked_posts', implode(',', $liked_posts));
            }
        } else {
            if (!in_array($post_id, $liked_posts)) {
                $likes++;
                update_post_meta($post_id, '_mip_likes', $likes);
                $liked_posts[] = $post_id;
                update_user_meta($user_id, '_mip_liked_posts', implode(',', $liked_posts));
            }
        }
    } else {
        // For non-logged-in users, use cookies
        $cookie_name = 'mip_liked_posts';
        $liked_posts = isset($_COOKIE[$cookie_name]) ? json_decode(stripslashes($_COOKIE[$cookie_name]), true) : [];
        if (!is_array($liked_posts)) $liked_posts = [];

        if ($unlike) {
            if (in_array($post_id, $liked_posts)) {
                $likes = max(0, $likes - 1);
                update_post_meta($post_id, '_mip_likes', $likes);
                $liked_posts = array_diff($liked_posts, [$post_id]);
                setcookie($cookie_name, json_encode($liked_posts), time() + 31536000, '/');
            }
        } else {
            if (!in_array($post_id, $liked_posts)) {
                $likes++;
                update_post_meta($post_id, '_mip_likes', $likes);
                $liked_posts[] = $post_id;
                setcookie($cookie_name, json_encode($liked_posts), time() + 31536000, '/');
            }
        }
    }

    wp_send_json_success(['likes' => $likes]);
}
add_action('wp_ajax_mip_like_post', 'mip_like_post');
add_action('wp_ajax_nopriv_mip_like_post', 'mip_like_post');

// Get liked posts for logged-in users
function mip_get_user_likes() {
    check_ajax_referer('mip_like_nonce', 'nonce');

    if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        $liked_posts = get_user_meta($user_id, '_mip_liked_posts', true);
        $liked_posts = $liked_posts ? explode(',', $liked_posts) : [];
        wp_send_json_success(['liked_posts' => $liked_posts]);
    } else {
        wp_send_json_error(['message' => 'کاربر لاگین نکرده است']);
    }
}
add_action('wp_ajax_mip_get_user_likes', 'mip_get_user_likes');
?>