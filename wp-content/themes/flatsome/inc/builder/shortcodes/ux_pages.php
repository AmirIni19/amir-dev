<?php

$repeater_type        = 'row';
$default_text_align   = 'left';
$repeater_col_spacing = 'normal';

$options = array(
	'pages_options'   => array(
		'type'    => 'group',
		'heading' => __( 'گزینه ها' ),
		'options' => array(
			'style'   => array(
				'type'    => 'select',
				'heading' => __( 'استایل' ),
				'default' => 'نرمال',
				'options' => require( __DIR__ . '/values/box-layouts.php' ),
			),
			'parent'  => array(
				'type'    => 'select',
				'heading' => 'والد',
				'default' => '',
				'options' => ux_builder_get_page_parents(),
			),
			'orderby' => array(
				'type'    => 'select',
				'heading' => __( 'ترتیب بر اساس' ),
				'default' => 'menu_order',
				'options' => array(
					'post_title'    => 'عنوان',
					'post_date'     => 'تاریخ',
					'menu_order'    => 'ترتیب فهرست',
					'post_modified' => 'آخرین اصلاح',
				),
			),
			'order'   => array(
				'type'    => 'select',
				'heading' => __( 'ترتیب' ),
				'default' => 'asc',
				'options' => array(
					'asc'  => 'صعودی',
					'desc' => 'نزولی',
				),
			),
		),
	),
	'layout_options'        => require( __DIR__ . '/commons/repeater-options.php' ),
	'layout_options_slider' => require( __DIR__ . '/commons/repeater-slider.php' ),
);

$box_styles = require( __DIR__ . '/commons/box-styles.php' );
$options    = array_merge( $options, $box_styles );

$advanced = array('advanced_options' => require( __DIR__ . '/commons/advanced.php'));
$options = array_merge($options, $advanced);

add_ux_builder_shortcode( 'ux_pages',
	array(
		'name'      => __( 'صفحات', 'ux-builder' ),
		'category'  => __( 'Content' ),
		'thumbnail' => flatsome_ux_builder_thumbnail( 'pages' ),
		'scripts'   => array(
			'flatsome-masonry-js' => get_template_directory_uri() . '/assets/libs/packery.pkgd.min.js',
		),
		'presets'   => array(
			array(
				'name'    => __( 'Default' ),
				'content' => '[ux_pages]',
			),
		),
		'options'   => $options,
	)
);
