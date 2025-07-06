<?php

/*************
 * Header Main
 *************/

Flatsome_Option::add_section( 'main_bar', array(
	'title'       => __( 'سربرگ اصلی', 'flatsome-admin' ),
	'panel'       => 'header',
	//'description' => __( 'This is the section description', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_header_layout',
    'label'       => __( '', 'flatsome-admin' ),
    'section'     => 'main_bar',
    'default'     => '<div class="options-title-divider">طرح</div>',
) );


Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-image',
	'settings'     => 'header_width',
	'label'       => __( 'عرض سربرگ', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default'     => 'container',
	'transport' => 'postMessage',
	'choices'     => array(
		'container' => $image_url . 'container.svg',
		'full-width' => $image_url . 'full-width.svg'
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'header_height',
	'label'       => __( 'ارتفاع', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default'     => 90,
	'choices'     => array(
		'min'  => 30,
		'max'  => 500,
		'step' => 1
	),
	'transport' => 'postMessage'
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'header_color',
	'label'       => __( 'رنگ متن', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default'     => 'light',
	'transport' => 'postMessage',
	'choices'     => array(
		'dark' => $image_url . 'text-light.svg',
		'light' => $image_url . 'text-dark.svg'
	),
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'header_bg',
    'label'       => __( 'رنگ پس زمینه', 'flatsome-admin' ), 
    'section'     => 'main_bar',
	'default'     => 'rgba(255,255,255,0.9)',
	'transport' => 'postMessage'
));


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'image',
    'settings'     => 'header_bg_img',
    'label'       => __( 'تصویر پس زمینه', 'flatsome-admin' ),
    'help' => __( 'Image is added to .header container. Try set a header background with opacity if you can not see the background image. (Drag the alpha slider in the background selector)', 'flatsome-admin' ),
    'section'     => 'main_bar',
	'default'     => "",
	'transport' => 'postMessage',
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-buttonset',
	'settings'     => 'header_bg_img_repeat',
	'label'       => __( 'تکرار پسزمینه', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default'     => 'repeat',
	'choices'     => $bg_repeat,
	'transport' => 'postMessage',
	'active_callback' => array(
		array(
			'setting'  => 'header_bg_img',
			'operator' => '!==',
			'value'    => '',
		),
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'box_shadow_header',
	'label'       => __( 'اضافه کردن سایه', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'transport' => 'postMessage',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'header_divider',
	'label'       => __( 'اضافه  کردن جدا کننده', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'transport' => $transport,
	'default'     => 1,
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'html_after_header',
	'label'       => __( 'HTML قبل از سربرگ', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default'     => '',
	'sanitize_callback' => 'flatsome_custom_sanitize',
));


Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_nav',
    'label'       => __( '', 'flatsome-admin' ),
    'section'     => 'main_bar',
    'default'     => '<div class="options-title-divider">ناوبری</div>',
) );


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'nav_style',
	'label'       => __( 'استایل ناوبری', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default'     => '',
	'transport' => $transport,
	'choices'     => $nav_styles_img
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-buttonset',
	'settings'     => 'nav_size',
	'label'       => __( 'اندازه ناوبری', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'transport' => $transport,
	'default'     => '',
	'choices'     => $nav_sizes
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-buttonset',
	'settings'     => 'nav_spacing',
	'label'       => __( 'فضای ناوبری', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'transport' => $transport,
	'default'     => '',
	'choices'     => $nav_sizes
));


Flatsome_Option::add_field( 'option',  array(
		'type'        => 'checkbox',
		'settings'     => 'nav_uppercase',
		'label'       => __( 'حروف برجسته', 'flatsome-admin' ),
		'section'     => 'main_bar',
	    'transport' => $transport,
		'default'     => 1,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'nav_body_overlay',
	'label'    => __( 'افزودن پوشش در حالت هاور', 'flatsome-admin' ),
	'section'  => 'main_bar',
	'default'  => 0,
) );


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'nav_height',
	'label'       => __( 'ارتفاع ناوبری', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default' => 16,
	'choices'     => array(
		'min'  => 0,
		'max'  => 500,
		'step' => 1
	),
	'transport' => 'postMessage',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'nav_push',
	'label'       => __( 'پوش ناوبری', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default' => 0,
	'choices'     => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	),
	'transport' => 'postMessage',
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color',
    'settings'     => 'type_nav_color',
    'label'       => __( 'رنگ ناوبری', 'flatsome-admin' ),
	'section'     => 'main_bar',
    'transport' => $transport
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color',
    'settings'     => 'type_nav_color_hover',
    'label'       => __( 'رنگ ناوبری : عمق', 'flatsome-admin' ),
	'section'     => 'main_bar',
    'transport' => $transport
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'header_icons_color',
    'label'       => __( 'رنگ آیکون ها', 'flatsome-admin' ), 
    'section'     => 'main_bar',
	'default'     => '',
	'transport' => $transport
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'header_icons_color_hover',
    'label'       => __( 'رنگ آیکون ها : هاور', 'flatsome-admin' ),
    'section'     => 'main_bar',
	'default'     => '',
	'transport' => $transport
));



Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_transparent',
    'label'       => __( '', 'flatsome-admin' ),
    'section'     => 'main_bar',
    'default'     => '<div class="options-title-divider">هدر شفاف</div>',
) );


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'header_height_transparent',
	'label'       => __( 'ارتفاع سربرگ بی رنگ', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'default'     => 90,
	'transport' => 'postMessage',
	'choices'     => array(
		'min'  => 30,
		'max'  => 500,
		'step' => 1
	),
));


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color-alpha',
    'settings'     => 'header_bg_transparent',
    'label'       => __( 'رنگ پس زمینه هدر شفاف', 'flatsome-admin' ),
    'section'     => 'main_bar',
	'default'     => '',
	'transport' => 'postMessage',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
    'settings'     => 'header_bg_transparent_shade',
	'label'       => __( 'اضافه کردن سایه', 'flatsome-admin' ),
	'section'     => 'main_bar',
	'transport' => 'postMessage',
	'default'     => 0,
));
