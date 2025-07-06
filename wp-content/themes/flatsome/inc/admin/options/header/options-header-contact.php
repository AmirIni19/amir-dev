<?php
/**
 * Header contact options.
 *
 * @package Flatsome
 */

Flatsome_Option::add_section( 'header_contact', array(
	'title' => esc_html__( 'تماس با ما', 'flatsome-admin' ),
	'panel' => 'header',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'contact_style',
	'label'     => esc_html__( 'استایل آیکون', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => 'left',
	'choices'   => array(
		'left'  => esc_html__( 'آیکون سمت چپ', 'flatsome-admin' ),
		'icons' => esc_html__( 'آیکون سمت راست', 'flatsome-admin' ),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_icon_size',
	'label'       => __( 'سایزآیکون', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => '16px',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_location',
	'label'     => esc_html__( 'موقعیت مکانی', 'flatsome-admin' ),
	'help'      => esc_html__( 'محل مکان یا فروشگاه خود را تایپ کنید. در یک پنجره جدید در Google Maps باز می شود.', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_location_label',
	'label'     => esc_html__( 'لیبل موقعیت مکانی', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_email',
	'label'     => esc_html__( 'ایمیل', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => 'youremail@gmail.com',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_email_label',
	'label'     => esc_html__( 'لیبل ایمیل', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_hours',
	'label'     => esc_html__( 'ساعات کار', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => '08:00 - 17:00',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'textarea',
	'settings'  => 'contact_hours_details',
	'label'     => esc_html__( 'اطلاعات ساعات کاری', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_phone',
	'label'     => esc_html__( 'تلفن', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => '+47 900 99 000',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_whatsapp',
	'label'     => esc_html__( 'واتس اپ', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'tooltip'   => 'از یک شماره تلفن کامل فقط در قالب بین المللی استفاده کنید. هنگام اضافه کردن شماره تلفن، علائم مثبت، صفر، براکت یا خط تیره را حذف کنید.',
	'default'   => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'contact_whatsapp_label',
	'label'     => esc_html__( 'لیبل واتس اپ', 'flatsome-admin' ),
	'section'   => 'header_contact',
	'transport' => flatsome_customizer_transport(),
	'default'   => '',
) );

/**
 * Refresh header contact partials.
 *
 * @param WP_Customize_Manager $wp_customize Customize Manager object.
 *
 * @return void
 */
function flatsome_refresh_header_contact_partials( WP_Customize_Manager $wp_customize ) {

	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}

	$wp_customize->selective_refresh->add_partial( 'header-contact', array(
		'selector'            => '.header-contact-wrapper',
		'container_inclusive' => true,
		'settings'            => array(
			'contact_style',
			'contact_icon_size',
			'contact_phone',
			'contact_whatsapp',
			'contact_whatsapp_label',
			'contact_email',
			'contact_email_label',
			'contact_location',
			'contact_location_label',
			'contact_hours',
			'contact_hours_details',
		),
		'render_callback'     => function () {
			get_template_part( 'template-parts/header/partials/element', 'contact' );
		},
	) );
}

add_action( 'customize_register', 'flatsome_refresh_header_contact_partials' );
