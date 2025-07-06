<?php
/**
 * Options for nav vertical element.
 *
 * @package flatsome
 */

Flatsome_Option::add_section( 'header_nav_vertical', array(
	'title' => __( 'فهرست آبشاری', 'flatsome' ),
	'panel' => 'header',
) );

/**
 * Add options.
 */
function flatsome_customizer_header_nav_vertical_options() {
	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_header_nav_vertical_layout',
		'label'    => '',
		'section'  => 'header_nav_vertical',
		'default'  => '<div class="options-title-divider">بازکننده</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'radio-image',
		'settings'  => 'header_nav_vertical_icon_style',
		'label'     => __( 'آیکون', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'default'   => 'plain',
		'transport' => flatsome_customizer_transport(),
		'choices'   => array(
			''      => flatsome_customizer_images_uri() . '/disabled.svg',
			'plain' => flatsome_customizer_images_uri() . '/nav-icon-plain.svg',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'slider',
		'settings'  => 'header_nav_vertical_height',
		'label'     => __( 'ارتفاع', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '50',
		'choices'   => array(
			'min'  => '10',
			'max'  => '500',
			'step' => '1',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'slider',
		'settings'  => 'header_nav_vertical_width',
		'label'     => __( 'عرض', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '250',
		'choices'   => array(
			'min'  => '10',
			'max'  => '500',
			'step' => '1',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'text',
		'settings'  => 'header_nav_vertical_tagline',
		'label'     => __( 'تگ لاین', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'text',
		'settings'  => 'header_nav_vertical_text',
		'label'     => __( 'متن', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'radio-image',
		'settings'  => 'header_nav_vertical_text_color',
		'label'     => __( 'رنگ متن', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'default'   => 'dark',
		'transport' => flatsome_customizer_transport(),
		'choices'   => array(
			'dark'  => flatsome_customizer_images_uri() . '/text-light.svg',
			'light' => flatsome_customizer_images_uri() . '/text-dark.svg',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'color-alpha',
		'alpha'     => true,
		'settings'  => 'header_nav_vertical_color',
		'label'     => __( 'رنگ', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'color-alpha',
		'alpha'     => true,
		'settings'  => 'header_nav_vertical_bg_color',
		'label'     => __( 'رنگ پسزمینه', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '',
	) );

	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_header_nav_vertical_fly_out',
		'label'    => '',
		'section'  => 'header_nav_vertical',
		'default'  => '<div class="options-title-divider">پریدن</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'checkbox',
		'settings'  => 'header_nav_vertical_fly_out_frontpage',
		'label'     => __( 'در صفحه اصلی باز نگه دار', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => 1,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'checkbox',
		'settings'  => 'header_nav_vertical_fly_out_shadow',
		'label'     => __( 'افزودن سایه', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => 1,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'slider',
		'settings'  => 'header_nav_vertical_fly_out_width',
		'label'     => __( 'پهنا', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '250',
		'choices'   => array(
			'min'  => '10',
			'max'  => '500',
			'step' => '1',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'color-alpha',
		'alpha'     => true,
		'settings'  => 'header_nav_vertical_fly_out_bg_color',
		'label'     => __( 'رنگ پسزمینه', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '',
	) );

	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_header_nav_vertical_fly_out_navigation',
		'label'    => '',
		'section'  => 'header_nav_vertical',
		'default'  => '<div class="options-title-divider">حالت پرش ناوبری</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'checkbox',
		'settings'  => 'header_nav_vertical_fly_out_nav_divider',
		'label'     => __( 'جداکننده', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => 1,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'slider',
		'settings'  => 'header_nav_vertical_fly_out_nav_height',
		'label'     => __( 'ارتفاع ناوبری', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'radio-image',
		'settings'  => 'header_nav_vertical_fly_out_text_color',
		'label'     => __( 'رنگ زمینه متن', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'default'   => 'light',
		'transport' => flatsome_customizer_transport(),
		'choices'   => array(
			'dark'  => flatsome_customizer_images_uri() . '/text-light.svg',
			'light' => flatsome_customizer_images_uri() . '/text-dark.svg',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'color-alpha',
		'alpha'     => true,
		'settings'  => 'header_nav_vertical_fly_out_nav_color',
		'label'     => __( 'رنگ ناوبری', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'color-alpha',
		'alpha'     => true,
		'settings'  => 'header_nav_vertical_fly_out_nav_color_hover',
		'label'     => __( 'رنگ ناوبری: هاور', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'      => 'color-alpha',
		'alpha'     => true,
		'settings'  => 'header_nav_vertical_fly_out_nav_bg_color_hover',
		'label'     => __( 'رنگ پسزمینه : هاور', 'flatsome' ),
		'section'   => 'header_nav_vertical',
		'transport' => flatsome_customizer_transport(),
		'default'   => '',
	) );
}

add_action( 'init', 'flatsome_customizer_header_nav_vertical_options' );

/**
 * Refresh partials.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function flatsome_refresh_header_nav_vertical_partials( WP_Customize_Manager $wp_customize ) {
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}

	$wp_customize->selective_refresh->add_partial( 'header-vertical-menu', array(
		'selector'            => '.header-vertical-menu',
		'container_inclusive' => true,
		'settings'            => array(
			'header_nav_vertical_icon_style',
			'header_nav_vertical_tagline',
			'header_nav_vertical_text',
		),
		'render_callback'     => function () {
			get_template_part( 'template-parts/header/partials/element', 'nav-vertical' );
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'header-vertical-menu-refresh-css', array(
		'selector'        => 'head > style#custom-css',
		'settings'        => array(
			'header_nav_vertical_color',
			'header_nav_vertical_bg_color',
			'header_nav_vertical_fly_out_bg_color',
			'header_nav_vertical_fly_out_nav_divider',
			'header_nav_vertical_fly_out_nav_height',
			'header_nav_vertical_fly_out_nav_color',
			'header_nav_vertical_fly_out_nav_color_hover',
			'header_nav_vertical_fly_out_nav_bg_color_hover',
		),
		'render_callback' => function () {
			flatsome_custom_css();
		},
	) );
}

add_action( 'customize_register', 'flatsome_refresh_header_nav_vertical_partials' );
