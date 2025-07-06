<?php

// جلوگیری از دسترسی مستقیم به فایل
defined( 'ABSPATH' ) || exit;

/**
 * شروع session برای استفاده در کپچا
 */
function LTO_start_session() {
    if ( ! session_id() ) {
        session_start();
    }
}
add_action( 'init', 'LTO_start_session' );

/**
 * اضافه کردن فایل‌های CSS و فونت‌ها به پنل مدیریت و صفحه ورود
 */
function LTO_enqueue_assets() {
    // دریافت تنظیمات ذخیره شده
    $options = get_option( 'lto_settings', [] );

    // بررسی فعال بودن فونت فارسی
    if ( ! empty( $options['enable_persian_font'] ) ) {
        wp_enqueue_style( 'lto-admin-font', LTO_ASSETS_URL . 'css/admin-font.css', [], LTO_VERSION );
    }

    // استایل پنل مدیریت همیشه فعال است
    if ( is_admin() ) {
        wp_enqueue_style( 'lto-admin-style', LTO_ASSETS_URL . 'css/admin-style.css', [], LTO_VERSION );
    }

    // بررسی فعال بودن استایل صفحه ورود
    if ( in_array( $GLOBALS['pagenow'], [ 'wp-login.php', 'wp-register.php' ] ) && ! empty( $options['enable_login_style'] ) ) {
        wp_enqueue_style( 'lto-login-style', LTO_ASSETS_URL . 'css/login-style.css', [], LTO_VERSION );
    }
}
add_action( 'admin_enqueue_scripts', 'LTO_enqueue_assets' );
add_action( 'login_enqueue_scripts', 'LTO_enqueue_assets' );


/**
 * تزریق استایل‌های داینامیک (رنگ‌ها، لوگو، پس‌زمینه) به هدر
 */
function LTO_apply_custom_styles_to_head() {
    $options = get_option( 'lto_settings', [] );
    
    $is_login_page = in_array( $GLOBALS['pagenow'], [ 'wp-login.php', 'wp-register.php' ] );
    
    // اگر در صفحه ورود هستیم و استایل آن غیرفعال است، خارج شو
    if ( $is_login_page && empty( $options['enable_login_style'] ) ) {
        return;
    }

    // تعریف مقادیر پیش‌فرض
    $default_logo_url = LTO_ASSETS_URL . 'images/loginto-log.png';
    $default_bg_url = LTO_ASSETS_URL . 'images/loginto-back.jpg';
    $default_main_color = '#8b70cd';

    // استایل‌های داینامیک: استفاده از مقادیر ذخیره شده یا مقادیر پیش‌فرض
    $login_logo_url = ! empty( $options['login_logo'] ) ? esc_url( $options['login_logo'] ) : $default_logo_url;
    $login_bg_url = ! empty( $options['login_bg'] ) ? esc_url( $options['login_bg'] ) : $default_bg_url;
    $main_color = ! empty( $options['main_color'] ) ? sanitize_hex_color( $options['main_color'] ) : $default_main_color;
    
    echo "<style>";
    echo ":root { --var-loginto-color-main: {$main_color} !important; }";

    if ( $is_login_page ) {
        if ( $login_logo_url ) {
            echo ".login h1 a { background-image: url({$login_logo_url}) !important; }";
        } else {
            echo ".login h1 { display: none !important; }";
        }
        if ( $login_bg_url ) {
            echo "body.login { background-image: url({$login_bg_url}) !important; }";
        }
    }
    echo "</style>";
}
add_action( 'admin_head', 'LTO_apply_custom_styles_to_head' );
add_action( 'login_head', 'LTO_apply_custom_styles_to_head' );


/**
 * نمایش فیلد کپچا در فرم ورود
 */
function LTO_display_captcha_field() {
    $options = get_option( 'lto_settings', [] );
    if ( ! empty( $options['enable_captcha'] ) ) {
        // تولید اعداد رندوم و ذخیره در سشن
        $num1 = rand( 1, 9 );
        $num2 = rand( 1, 9 );
        $_SESSION['lto_captcha_answer'] = $num1 + $num2;

        echo '<p class="captcha-wrapper">';
        echo '<label for="lto_captcha">' . sprintf( 'حاصل جمع %d + %d چند می‌شود؟', $num1, $num2 ) . '</label>';
        echo '<input type="text" name="lto_captcha" id="lto_captcha" class="input" value="" size="20" autocomplete="off" required />';
        echo '</p>';
    }
}
add_action( 'login_form', 'LTO_display_captcha_field' );


/**
 * بررسی و اعتبارسنجی پاسخ کپچا هنگام ورود
 *
 * @param WP_User|WP_Error $user
 * @return WP_User|WP_Error
 */
function LTO_validate_login_captcha( $user, $password ) {
    $options = get_option( 'lto_settings', [] );
    // اگر کپچا فعال است، آن را بررسی کن
    if ( ! empty( $options['enable_captcha'] ) ) {
        if ( empty( $_POST['lto_captcha'] ) ) {
            return new WP_Error( 'captcha_empty', 'لطفاً به سوال امنیتی پاسخ دهید.' );
        }
        
        if ( isset( $_SESSION['lto_captcha_answer'] ) && intval( $_POST['lto_captcha'] ) !== $_SESSION['lto_captcha_answer'] ) {
            return new WP_Error( 'captcha_incorrect', 'پاسخ شما به سوال امنیتی صحیح نیست.' );
        }
        // پاک کردن سشن بعد از استفاده
        unset( $_SESSION['lto_captcha_answer'] );
    }
    return $user;
}
add_filter( 'wp_authenticate_user', 'LTO_validate_login_captcha', 10, 2 );

/**
 * تغییر آدرس لینک لوگوی صفحه ورود به آدرس اصلی سایت
 */
function LTO_change_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'LTO_change_login_logo_url' );

/**
 * تغییر عنوان لینک لوگو به نام سایت
 */
function LTO_change_login_logo_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'LTO_change_login_logo_title' );


// amir-naseri.ir

// =================================================================== //
// کد جدید برای نمایش پنل تمام عرض خوش‌آمدگویی در پیشخوان
// =================================================================== //

/**
 * This function removes the default WordPress welcome panel.
 */
function weboto_remove_default_welcome_panel() {
    remove_action('welcome_panel', 'wp_welcome_panel');
}
add_action('load-index.php', 'weboto_remove_default_welcome_panel');

/**
 * This function adds our custom full-width welcome panel.
 */
function weboto_custom_welcome_panel() {
    ?>
    <div class="welcome-panel">
        <div class="welcome-panel-content">
            <div class="welcome-panel-header">
                <h2>وبوتو، تیم حرفه‌ای تو …</h2>
                <p>
                    <a href="#">درمورد پشتیبانی</a>
                </p>
            </div>
            <div class="welcome-panel-column-container">
                <div class="welcome-panel-column">
                    <div class="welcome-panel-column-content">
                        <h3>توسعه وب‌سایت</h3>
                        <p>ما وب‌سایت‌های مدرن، واکنش‌گرا و بهینه برای موتورهای جستجو را با جدیدترین تکنولوژی‌ها برای کسب‌وکار شما طراحی و پیاده‌سازی می‌کنیم.</p>
                        <a class="button button-primary button-hero" href="https://webuto.agency/web-design/">مشاهده نمونه‌کارها</a>
                    </div>
                </div>
                <div class="welcome-panel-column">
                    <div class="welcome-panel-column-content">
                        <h3>پشتیبانی و نگهداری</h3>
                        <p>با خدمات پشتیبانی تخصصی ما، وب‌سایت شما همیشه در دسترس، امن و به‌روز خواهد بود. با خیال راحت بر روی رشد کسب‌وکارتان تمرکز کنید.</p>
                        <a class="button button-primary button-hero" href="https://webuto.agency/web-design/">تماس با پشتیبانی</a>
                    </div>
                </div>
                <div class="welcome-panel-column">
                    <div class="welcome-panel-column-content">
                        <h3>طراحی UI/UX</h3>
                        <p>ما با تمرکز بر تجربه کاربری (UX) و رابط کاربری (UI)، طرح‌هایی جذاب و کاربرپسند خلق می‌کنیم که کاربران را به مشتریان وفادار شما تبدیل می‌کند.</p>
                        <a class="button button-primary button-hero" href="https://webuto.agency/visual-identity/">بیشتر بدانید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
add_action('welcome_panel', 'weboto_custom_welcome_panel');
/**
 * تغییر متن لینک "فراموشی رمز عبور" در صفحه ورود با جاوا اسکریپت
 * این کد به قلاب login_footer متصل می‌شود تا در پاورقی صفحه ورود اجرا شود.
 */
function LTO_change_lost_password_text_js() {
    // برای هماهنگی، این تغییر فقط زمانی اعمال می‌شود که استایل صفحه ورود فعال باشد
    $options = get_option( 'lto_settings', [] );
    if ( empty( $options['enable_login_style'] ) ) {
        return;
    }
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // المنت لینک را با استفاده از کلاس آن پیدا می‌کنیم
            var lostPasswordLink = document.querySelector('p#nav a.wp-login-lost-password');
            
            // بررسی می‌کنیم که آیا المنت پیدا شده است یا نه
            if (lostPasswordLink) {
                // متن داخل لینک را به مقدار دلخواه تغییر می‌دهیم
                lostPasswordLink.innerText = 'فراموشی رمز عبور!';
            }
        });
    </script>
    <?php
}
add_action( 'login_footer', 'LTO_change_lost_password_text_js' );