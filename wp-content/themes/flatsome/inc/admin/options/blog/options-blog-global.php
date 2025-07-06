<?php

Flatsome_Option::add_section( 'blog-global', array(
	'title' => __( 'بلاگ عمومی', 'flatsome-admin' ),
	'panel' => 'blog',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_badge',
	'label'    => __( 'نمایش باکس تاریخ', 'flatsome-admin' ) . ' (جدید)',
	'section'  => 'blog-global',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'radio-image',
	'settings'        => 'blog_badge_style',
	'label'           => __( 'استایل باکس تاریخ', 'flatsome-admin' ),
	'section'         => 'blog-global',
	'default'         => 'outline',
	'active_callback' => array(
		array(
			'setting'  => 'blog_badge',
			'operator' => '==',
			'value'    => '1',
		),
	),
	'choices'         => array(
		'square'        => $image_url . 'badge-square.svg',
		'circle'        => $image_url . 'badge-circle.svg',
		'circle-inside' => $image_url . 'badge-circle-inside.svg',
		'outline'       => $image_url . 'badge-outline.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'text',
	'settings'    => 'blog_excerpt_suffix',
	'label'       => __( 'موارد اضافی وبلاگ', 'flatsome-admin' ),
	'description' => __( 'پسوند پست سفارشی را انتخاب کنید. پیش فرض [...]', 'flatsome-admin' ),
	'section'     => 'blog-global',
	'default'     => ' [...]',
) );
