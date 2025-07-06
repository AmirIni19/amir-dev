<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

flatsome()->init();

/**
 * It's not recommended to add any custom code here. Please use a child theme
 * so that your customizations aren't lost during updates.
 *
 * Learn more here: https://developer.wordpress.org/themes/advanced-topics/child-themes/
 */

update_option( 'flatsome_wup_purchase_code', 'قالب توسط ایران فلتسام به صورت کامل فعال شده است.' );
update_option( 'flatsome_wup_buyer', 'ایران فلتسام' );

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'http://dl.flatsomee.ir/sources/fl/fghyjuiujyhgfd5444.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'flatsome'
);
