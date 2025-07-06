<?php

/*************
 * Header Top
 *************/

Flatsome_Option::add_section( 'top_bar', array(
	'title'       => __( 'سربرگ بالا', 'flatsome-admin' ),
	'panel'       => 'header',
	//'description' => __( 'This is the section description', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'topbar_show',
	//'transport' => $transport,
	'label'       => __( 'فعال کردن سربرگ بالا', 'flatsome-admin' ),
	'section'     => 'top_bar',
	'default'     => 1,
));

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_header_top_layout',
	'section'  => 'top_bar',
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => '<div class="options-title-divider">طرح</div>',
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'header_top_height',
	'label'       => __( 'ارتفاع', 'flatsome-admin' ),
	'section'     => 'top_bar',
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 30,
	'choices'     => array(
		'min'  => 20,
		'max'  => 100,
		'step' => 1
	),
	'transport' => 'postMessage'
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'topbar_color',
	'label'       => __( 'رنگ متن', 'flatsome-admin' ),
	'section'     => 'top_bar',
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'dark',
	'transport' => 'postMessage',
	'choices'     => array(
		'dark' => $image_url . 'text-light.svg',
		'light' => $image_url . 'text-dark.svg'
	),
));


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color-alpha',
    'settings'     => 'topbar_bg',
    'label'       => __( 'رنگ پس زمینه', 'flatsome-admin' ),
    //'description' => __( 'This is the control description', 'flatsome-admin' ),
    //'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'flatsome-admin' ),
    'section'     => 'top_bar',
    'active_callback' => array(
	    array(
		    'setting'  => 'topbar_show',
		    'operator' => '===',
		    'value'    => true,
	    ),
    ),
    'default' => '',
    'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.header-top',
			'function' => 'css',
			'property' => 'background-color'
		),
	)
));

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_header_top_nav',
	'section'  => 'top_bar',
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => '<div class="options-title-divider">ناوبری</div>',
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'nav_style_top',
	'label'       => __( 'استایل ناوبری', 'flatsome-admin' ),
	'section'     => 'top_bar',
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'divided',
	'transport' => $transport,
	'choices'     => $nav_styles_img
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'nav_top_uppercase',
	'label'     => __( 'برجسته', 'flatsome-admin' ),
	'section'   => 'top_bar',
	'transport' => $transport,
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'   => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'nav_top_body_overlay',
	'label'    => __( 'افزودن پوشش در حالت هاور', 'flatsome-admin' ),
	'section'  => 'top_bar',
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'nav_height_top',
	'label'     => __( 'ارتفاع ناوبری', 'flatsome-admin' ),
	'section'   => 'top_bar',
	'transport' => $transport,
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'   => 16,
	'choices'   => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
	'settings'    => 'type_nav_top_color',
	'label'       => __( 'رنگ ناوبری', 'flatsome-admin' ),
	'section'     => 'top_bar',
	'transport'   => $transport,
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
	'settings'    => 'type_nav_top_color_hover',
	'label'       => __( 'رنگ ناوبری: هاور', 'flatsome-admin' ),
	'section'     => 'top_bar',
	'transport'   => $transport,
	'active_callback' => array(
		array(
			'setting'  => 'topbar_show',
			'operator' => '===',
			'value'    => true,
		),
	),
) );
