<?php

Flatsome_Option::add_section( 'notifications', array(
	'title'    => __( 'اعلانات', 'flatsome-admin' ),
	'priority' => 160,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'cookie_notice',
	'section'  => 'notifications',
	'label'    => esc_html__( 'فعال سازی کوکی ها', 'flatsome-admin' ),
	'default'  => false,
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'textarea',
	'settings'    => 'cookie_notice_text',
	'section'     => 'notifications',
	'transport'   => $transport,
	'label'       => esc_html__( 'متن سفارشی کوکی ها', 'flatsome-admin' ),
	'description' => esc_html__( 'هر HTML یا کد کوتاهی را در اینجا اضافه کنید...', 'flatsome-admin' ),
	'active_callback' => array(
		array(
			'setting'  => 'cookie_notice',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'select',
	'settings'    => 'privacy_policy_page',
	'section'     => 'notifications',
	'label'       => esc_html__( 'صفحه قوانین', 'flatsome-admin' ),
	'description' => esc_html__( 'یک دکمه مرتبط با صفحه سیاست کوکی را نشان دهید.', 'flatsome-admin' ),
	'active_callback' => array(
		array(
			'setting'  => 'cookie_notice',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => false,
	'choices'     => $list_pages_by_id,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'select',
	'settings'  => 'cookie_notice_button_style',
	'section'   => 'notifications',
	'transport' => $transport,
	'label'     => esc_html__( 'استایل دکمه', 'flatsome-admin' ),
	'choices'   => $button_styles,
	'active_callback' => array(
		array(
			'setting'  => 'cookie_notice',
			'operator' => '===',
			'value'    => true,
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-image',
	'settings'  => 'cookie_notice_text_color',
	'section'   => 'notifications',
	'transport' => $transport,
	'label'     => esc_html__( 'رنگ متن', 'flatsome-admin' ),
	'active_callback' => array(
		array(
			'setting'  => 'cookie_notice',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'   => 'light',
	'choices'   => array(
		'dark'  => $image_url . 'text-light.svg',
		'light' => $image_url . 'text-dark.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color-alpha',
	'alpha'     => true,
	'settings'  => 'cookie_notice_bg_color',
	'section'   => 'notifications',
	'label'     => esc_html__( 'رنگ پس زمینه', 'flatsome-admin' ),
	'active_callback' => array(
		array(
			'setting'  => 'cookie_notice',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'   => '',
	'transport' => $transport,
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'text',
	'settings'    => 'cookie_notice_version',
	'section'     => 'notifications',
	'label'       => esc_html__( 'نسخه', 'flatsome-admin' ),
	'description' => esc_html__( 'پس از اعمال تغییرات، نسخه را افزایش دهید تا اعلان برای بازدیدکنندگانی که قبلاً آن را پذیرفته‌اند، دوباره نمایش داده شود.', 'flatsome-admin' ),
'active_callback' => array(
		array(
			'setting'  => 'cookie_notice',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '1',
) );

function flatsome_refresh_cookies_partials( WP_Customize_Manager $wp_customize ) {

	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}

	$wp_customize->selective_refresh->add_partial( 'refresh_css_cookies', array(
		'selector'        => 'head > style#custom-css',
		'settings'        => array( 'cookie_notice_bg_color' ),
		'render_callback' => function () {
			flatsome_custom_css();
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'cookies-text', array(
		'selector'        => '.flatsome-cookies__text',
		'settings'        => array( 'cookie_notice_text' ),
		'render_callback' => function () {
			return get_theme_mod( 'cookie_notice_text' )
				? do_shortcode( get_theme_mod( 'cookie_notice_text' ) )
				: __( 'This site uses cookies to offer you a better browsing experience. By browsing this website, you agree to our use of cookies.', 'flatsome' );
		},
	) );
}

add_action( 'customize_register', 'flatsome_refresh_cookies_partials' );
