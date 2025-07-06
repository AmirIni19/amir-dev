<?php

/*************
 * Header Mobile
 *************/

Flatsome_Option::add_section( 'header_mobile', array(
	'title'       => __( 'سربرگ منو موبایل / روکش', 'flatsome-admin' ),
	'panel'       => 'header',
	//'description' => __( 'This is the section description', 'flatsome-admin' ),
) );


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'header_height_mobile',
	'label'       => __( 'ارتفاع سربرگ موبایل', 'flatsome-admin' ),
	//'description' => __( 'This is the control description', 'flatsome-admin' ),
	//'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'flatsome-admin' ),
	'section'     => 'header_mobile',
	'default'     => '70',
	'choices'     => array(
		'min'  => 30,
		'max'  => 500,
		'step' => 1
	),
	'transport' => 'postMessage'
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-image',
	'settings'     => 'logo_position_mobile',
	'label'       => __( 'موقعیت سربرگ', 'flatsome-admin' ),
	'section'     => 'header_mobile',
	'transport' => $transport,
	'default'     => 'center',
	'choices'     => array(
		'left' => $image_url . 'logo-left.svg',
		'center' => $image_url . 'logo-right.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'menu_icon_style',
	'label'       => __( 'استایل آیکون منو', 'flatsome-admin' ),
	'section'     => 'header_mobile',
	'default'     => '',
	'transport' => $transport,
	'choices'     => array(
		'' => $image_url . 'nav-icon-plain.svg',
		'outline' => $image_url . 'nav-icon-outline.svg',
		'fill' => $image_url . 'nav-icon-fill.svg',
		'fill-round' => $image_url . 'nav-icon-fill-round.svg',
		'outline-round' => $image_url . 'nav-icon-outline-round.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'menu_icon_title',
	'label'       => __( 'نمایش عنوان منو', 'flatsome-admin' ),
	'section'     => 'header_mobile',
	'transport' => $transport,
	'default'     => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-image',
	'settings'     => 'mobile_overlay',
	'label'       => __( 'روکش فهرست', 'flatsome-admin' ),
	'section'     => 'header_mobile',
	'transport'	  => $transport,
	'default'     => 'left',
	'choices'     => array(
		'left' => $image_url . 'overlay-left.svg',
		'right' => $image_url . 'overlay-right.svg',
		'center' => $image_url . 'overlay-center.svg'
	),
));

Flatsome_Option::add_field( '', array(
	'type'            => 'custom',
	'settings'        => 'mobile_drawer_link',
	'label'           => '',
	'section'         => 'header_mobile',
	'default'         => '<p><a href="#" data-to-section="lightbox">Customize Drawer &rarr;</a></p>',
	'active_callback' => array(
		array(
			'setting'  => 'mobile_overlay',
			'operator' => '!=',
			'value'    => 'center',
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio',
	'settings'    => 'mobile_submenu_parent_behavior',
	'label'       => __( 'رفتار آیتم منو', 'flatsome' )  . ' (جدید)',
	'description' => __( 'برای منوهای همراه با زیر منو یک رفتار تعیین کنید','flatsome' ),
	'section'     => 'header_mobile',
	'transport'   => 'refresh',
	'default'     => '',
	'choices'     => array(
		''       => __( 'بازکردن لینک', 'flatsome' ),
		'toggle' => __( 'بازکردن زیرمنو', 'flatsome' ),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'radio',
	'settings'        => 'mobile_submenu_effect',
	'label'           => __( 'افکت زیرمنو', 'flatsome' ) . ' (جدید)',
	'section'         => 'header_mobile',
	'transport'       => 'refresh',
	'default'         => 'accordion',
	'choices'         => array(
		'accordion' => __( 'اکوردئون', 'flatsome' ),
		'slide'     => __( 'اسلاید', 'flatsome' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'mobile_overlay',
			'operator' => '!=',
			'value'    => 'center',
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'select',
	'settings'        => 'mobile_submenu_levels',
	'label'           => __( 'سطح زیرمنو', 'flatsome' ) . ' (جدید)',
	'section'         => 'header_mobile',
	'transport'       => 'refresh',
	'default'         => '1',
	'choices'         => array(
		'1' => __( '1 سطح', 'flatsome' ),
		'2' => __( '2 سطحی', 'flatsome' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'mobile_overlay',
			'operator' => '!=',
			'value'    => 'center',
		),
		array(
			'setting'  => 'mobile_submenu_effect',
			'operator' => '===',
			'value'    => 'slide',
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'              => 'textarea',
	'settings'          => 'mobile_sidebar_top_content',
	'label'             => __( 'Top content', 'flatsome' ),
	'section'           => 'header_mobile',
	'sanitize_callback' => 'flatsome_custom_sanitize',
	'default'           => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-buttonset',
	'settings' => 'mobile_sidebar_tabs',
	'label'    => __( 'تب ها', 'flatsome' ),
	'section'  => 'header_mobile',
	'default'  => '0',
	'choices'  => array(
		'0' => __( 'هیچکدام', 'flatsome' ),
		'2' => __( '2 تب', 'flatsome' ),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'text',
	'settings'        => 'mobile_sidebar_tab_text',
	'label'           => __( 'متن تب اول', 'flatsome' ),
	'section'         => 'header_mobile',
	'default'         => '',
	'active_callback' => array(
		array(
			'setting'  => 'mobile_sidebar_tabs',
			'operator' => '!=',
			'value'    => false,
		),
	),
) );

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'sortable',
  'settings'     => 'mobile_sidebar',
  'label'       => __( 'المنت های منو', 'flatsome' ),
  'section'     => 'header_mobile',
  'transport'   => $transport,
  'multiple' => 10,
  'default'     => flatsome_header_mobile_sidebar(),
  'choices'     => $nav_elements
));

Flatsome_Option::add_field( 'option', array(
	'type'            => 'text',
	'settings'        => 'mobile_sidebar_tab_2_text',
	'label'           => __( 'متن تب 2', 'flatsome' ),
	'section'         => 'header_mobile',
	'default'         => '',
	'active_callback' => array(
		array(
			'setting'  => 'mobile_sidebar_tabs',
			'operator' => '!=',
			'value'    => false,
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'sortable',
	'settings'        => 'mobile_sidebar_tab_2',
	'label'           => __( 'المنت های تب 2', 'flatsome' ),
	'section'         => 'header_mobile',
	'transport'       => flatsome_customizer_transport(),
	'multiple'        => 10,
	'default'         => '',
	'choices'         => $nav_elements,
	'active_callback' => array(
		array(
			'setting'  => 'mobile_sidebar_tabs',
			'operator' => '!=',
			'value'    => false,
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-image',
	'settings'     => 'mobile_overlay_color',
	'label'       => __( 'رنگ پوشش', 'flatsome-admin' ),
	'section'     => 'header_mobile',
	'transport'	  => $transport,
	'default'     => '',
	'choices'     => array(
		'' => $image_url . 'text-dark.svg',
		'dark' => $image_url . 'text-light.svg',
	),
));


Flatsome_Option::add_field( 'option',  array(
    'type'        => 'color-alpha',
    'settings'     => 'mobile_overlay_bg',
    'label'       => __( 'رنگ پس زمینه', 'flatsome-admin' ),
	'section'     => 'header_mobile',
	'default'     => '',
	'transport' => 'postMessage'
));
