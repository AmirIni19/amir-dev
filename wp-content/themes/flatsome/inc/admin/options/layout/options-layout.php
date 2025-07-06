<?php

/*************
 * Layout Panel
 *************/

Flatsome_Option::add_section( 'layout', array(
	'title'       => __( 'طرح', 'flatsome-admin' ),
	//'description' => __( 'Change the Layout', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-buttonset',
	'settings'     => 'body_layout',
	'label'       => __( 'حالت طرح', 'flatsome-admin' ),
	'description' => __( 'طرح کامل ، جعبه یا قاب را انتخاب کنید', 'flatsome-admin' ),
	'section'     => 'layout',
	'default'     => 'full-width',
	'transport' => 'postMessage',
	'choices'     => array(
		'full-width' => __( 'تمام صفحه', 'flatsome-admin' ),
		'boxed' => __( 'جعبه', 'flatsome-admin' ),
		'framed' => __( 'قاب', 'flatsome-admin' ),
	),
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'box_shadow',
	'label'       => __( 'سایه را به کادر محتوا اضافه کنید', 'flatsome-admin' ),
	'section'     => 'layout',
	'transport' => 'postMessage',
	'active_callback' => array(
		array(
			'setting'  => 'body_layout',
			'operator' => '!==',
			'value'    => 'full-width',
		),
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'number',
	'settings'    => 'site_width_boxed',
	'label'       => __( 'عرض سایت (px)', 'flatsome-admin' ),
	'section'     => 'layout',
	'transport'   => 'postMessage',
	'default'     => '1170',
	'active_callback' => array(
		array(
			'setting'  => 'body_layout',
			'operator' => '!==',
			'value'    => 'full-width',
		),
	),
	'choices'     => [
		'min'  => 560,
		'max'  => 1600,
		'step' => 10,
	],
));

Flatsome_Option::add_field( 'option',  array(
 	'type'        => 'color',
  'settings'     => 'body_bg',
  'label'       => __( 'رنگ پس زمینه', 'flatsome-admin' ),
  'section'     => 'layout',
	'default'     => "",
	'transport' => 'postMessage',
	'active_callback' => array(
		array(
			'setting'  => 'body_layout',
			'operator' => '!==',
			'value'    => 'full-width',
		),
	),
));


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'image',
    'settings'     => 'body_bg_image',
    'label'       => __( 'تصویر پسزمینه', 'flatsome-admin' ),
    'section'     => 'layout',
	'default'     => "",
	'transport' => 'postMessage',
	'active_callback' => array(
		array(
			'setting'  => 'body_layout',
			'operator' => '!==',
			'value'    => 'full-width',
		),
	),
));


Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-buttonset',
	'settings'     => 'body_bg_type',
	'label'       => __( 'پس زمینه تکرارشونده', 'flatsome-admin' ),
	'section'     => 'layout',
	'default'     => 'bg-full-size',
	'transport' => 'postMessage',
	'choices'     => array(
		'bg-full-size' => __( 'تمام سایز', 'flatsome-admin' ),
		'bg-tiled' => __( 'کاشی', 'flatsome-admin' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'body_layout',
			'operator' => '!==',
			'value'    => 'full-width',
		),
		array(
			'setting'  => 'body_bg_image',
			'operator' => '!==',
			'value'    => '',
		),
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'number',
	'settings'    => 'site_width',
	'label'       => __( 'عرض نگهدارنده (px)', 'flatsome-admin' ),
	'description' => __( 'عرض پیش فرض نگهدارنده محتوا را تنظیم کنید. (هدر ، ردیف ها و غیره)', 'flatsome-admin' ),
	'section'     => 'layout',
	'transport'   => 'postMessage',
	'default'     => '1080',
	'choices'     => [
		'min'  => 560,
		'max'  => 1600,
		'step' => 10,
	],
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-image',
	'settings'     => 'content_color',
	'label'       => __( 'رنگ محتوا', 'flatsome-admin' ),
	'description' => __( 'رنگ متن روشن یا تیره', 'flatsome-admin' ),
	'section'     => 'layout',
	'default'     => 'light',
	'transport' => 'postMessage',
	'choices'     => array(
		'light' => $image_url . 'text-dark.svg',
		'dark' => $image_url . 'text-light.svg'
	),
));


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color',
    'settings'     => 'content_bg',
    'label'       => __( 'پس زمینه محتوا', 'flatsome-admin' ),
    'section'     => 'layout',
	'default'     => "",
	'transport' => 'postMessage',
));
