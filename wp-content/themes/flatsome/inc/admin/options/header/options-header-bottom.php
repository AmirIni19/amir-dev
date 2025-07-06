<?php

/*************
 * Header Main
 *************/

Flatsome_Option::add_section( 'bottom_bar', array(
	'title'       => __( 'سربرگ پایینی', 'flatsome-admin' ),
	'panel'       => 'header',
	//'description' => __( 'This is the section description', 'flatsome-admin' ),
) );


Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_header_bottom_layout',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
    'default'     => '<div class="options-title-divider">طرح</div>',
) );


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'header_bottom_height',
	'label'       => __( 'ارتفاع', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
	'default' => '',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1
	),
	'transport' => 'postMessage',
));


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color-alpha',
    'settings'     => 'nav_position_bg',
    'label'       => __( 'رنگ پس زمینه', 'flatsome-admin' ),
    'section'     => 'bottom_bar',
	'default'     => "#f1f1f1",
	'transport' => 'postMessage',
));



Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_header_bottom_nav',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
    'default'     => '<div class="options-title-divider">ناوبری</div>',
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'nav_style_bottom',
	'label'       => __( 'استایل ناوبری', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
	'default'     => '',
	'transport' => $transport,
	'choices'     => $nav_styles_img
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'nav_height_bottom',
	'label'       => __( 'ارتفاع ناوبری', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
	'default' => 16,
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	),
	'transport' => 'postMessage',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-buttonset',
	'settings'     => 'nav_size_bottom',
	'label'       => __( 'اندازه ناوبری', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
	'transport' => $transport,
	'default'     => '',
	'choices'     => $nav_sizes
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-buttonset',
	'settings'     => 'nav_spacing_bottom',
	'label'       => __( 'فضای ناوبری', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
	'transport' => $transport,
	'default'     => '',
	'choices'     => $nav_sizes
));

Flatsome_Option::add_field( 'option',  array(
		'type'        => 'checkbox',
		'settings'     => 'nav_uppercase_bottom',
		'label'       => __( 'حروف بزرگ', 'flatsome-admin' ),
		'section'     => 'bottom_bar',
	    'transport' => $transport,
		'default'     => 1,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'nav_bottom_body_overlay',
	'label'    => __( 'افزودن پوشش در حالت هاور', 'flatsome-admin' ),
	'section'  => 'bottom_bar',
	'default'  => 0,
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'nav_position_color',
	'label'       => __( 'رنگ زمینه ناوبری', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
	'default'     => 'light',
	'transport' => 'postMessage',
	'choices'     => array(
		'dark' => $image_url . 'text-light.svg',
		'light' => $image_url . 'text-dark.svg'
	),
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color',
    'settings'     => 'type_nav_bottom_color',
    'label'       => __( 'رنگ ناوبری', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
    'transport' => $transport
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color',
    'settings'     => 'type_nav_bottom_color_hover',
    'label'       => __( 'رنگ ناوبری:هاور', 'flatsome-admin' ),
	'section'     => 'bottom_bar',
    'transport' => $transport
));


