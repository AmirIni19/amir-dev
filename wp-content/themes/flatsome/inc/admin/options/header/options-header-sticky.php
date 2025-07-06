<?php
/**
 * Header Sticky
 *
 * @package Flatsome/Admin/Options/Header
 */

Flatsome_Option::add_section( 'header_sticky', array(
	'title' => __( 'هدر چسبنده', 'flatsome-admin' ),
	'panel' => 'header',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'header_height_sticky',
	'label'     => __( 'ارتفاع سربرگ در حالت چسبنده', 'flatsome-admin' ),
	'section'   => 'header_sticky',
	'transport' => $transport,
	'default'   => 70,
	'choices'   => array(
		'min'  => 30,
		'max'  => 300,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'sticky_logo_padding',
	'label'     => __( 'پدینگ لوگو چسبنده', 'flatsome-admin' ),
	'section'   => 'header_sticky',
	'default'   => 0,
	'choices'   => array(
		'min'  => 0,
		'max'  => 30,
		'step' => 1,
	),
	'transport' => 'postMessage',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'nav_height_sticky',
	'label'     => __( 'ارتفاع ناوبری در حالت چسبنده', 'flatsome-admin' ),
	'section'   => 'header_sticky',
	'default'   => '',
	'choices'   => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
	'transport' => 'postMessage',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'topbar_sticky',
	'label'    => __( 'منو بالا - چسبنده در حالت اسکرول', 'flatsome-admin' ),
	'section'  => 'header_sticky',
	'default'  => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'header_sticky',
	'label'    => __( 'سربرگ پایین - چسبنده در حال اسکرول', 'flatsome-admin' ),
	'section'  => 'header_sticky',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'bottombar_sticky',
	'label'    => __( 'سربرگ پایین - چسبنده در حال اسکرول', 'flatsome-admin' ),
	'section'  => 'header_sticky',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'sticky_style',
	'label'    => __( 'استایل چسبنده', 'flatsome-admin' ),
	'section'  => 'header_sticky',
	'default'  => 'jump',
	'choices'  => array(
		'jump'   => __( 'پرش به پایین', 'flatsome-admin' ),
		'fade'   => __( 'ظاهر شدن', 'flatsome-admin' ),
		'shrink' => __( 'کوچک شدن', 'flatsome-admin' ),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'sticky_hide_on_scroll',
	'label'    => __( 'مخفی کردن چسبنده در حالت اسکرول', 'flatsome-admin' ) . ' (NEW)',
	'section'  => 'header_sticky',
	'default'  => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'image',
	'settings'  => 'site_logo_sticky',
	'label'     => __( 'لوگو چسبنده سفارشی', 'flatsome-admin' ),
	'section'   => 'header_sticky',
	'transport' => $transport,
	'default'   => '',
	'choices'   => array( 'save_as' => 'id' ),
) );
