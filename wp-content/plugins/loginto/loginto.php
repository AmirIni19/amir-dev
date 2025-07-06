<?php
/*
Plugin Name: لاگینتو
Description: افزونه‌ای برای زیباسازی و افزایش امنیت صفحه ورود و پنل مدیریت وردپرس.
Version:     1.5.0
Author:      Amir Naseri
Author URI:  https://webutp.ir
Text Domain: loginto
Domain Path: /languages
*/

// جلوگیری از دسترسی مستقیم به فایل
defined( 'ABSPATH' ) || exit;

// تعریف ثابت‌های اصلی افزونه
define( 'LTO_VERSION', '1.0.0' );
define( 'LTO_PATH', plugin_dir_path( __FILE__ ) ); // مسیر فیزیکی پوشه افزونه
define( 'LTO_URL', plugin_dir_url( __FILE__ ) );   // آدرس اینترنتی پوشه افزونه
define( 'LTO_INC_PATH', LTO_PATH . 'inc/' );     // مسیر پوشه فایل‌های PHP
define( 'LTO_ASSETS_URL', LTO_URL . 'assets/' ); // آدرس پوشه فایل‌های CSS, JS, Fonts

/**
 * فراخوانی فایل‌های مورد نیاز افزونه
 * این فایل‌ها شامل توابع اصلی و پنل تنظیمات هستند.
 */
require_once LTO_INC_PATH . 'lto-core-functions.php';
require_once LTO_INC_PATH . 'lto-settings-panel.php';

/**
 * تابع اصلی برای بارگذاری دامنه ترجمه
 * این تابع به وردپرس اجازه می‌دهد فایل‌های ترجمه افزونه را شناسایی و بارگذاری کند.
 */
function LTO_load_textdomain() {
    load_plugin_textdomain( 'Loginto', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'LTO_load_textdomain' );

// amir-naseri.ir