<?php

add_ux_builder_shortcode( 'featured_box',
	array(
		'type'      => 'container',
		'name'      => __( 'آیکون باکس' ),
		'category'  => __( 'Content' ),
		'thumbnail' => flatsome_ux_builder_thumbnail( 'icon_box' ),
		'wrap'      => false,
		'presets'   => array(
			array(
				'name'    => __( 'پیشفرض' ),
				'content' => '[featured_box]<h3>ایران فلتسام</h3><p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>[/featured_box]',
			),
		),
		'options'   => array(
			'img'         => array(
				'type'    => 'image',
				'heading' => 'آیکون',
				'value'   => '',
			),
			'inline_svg'  => array(
				'type'    => 'checkbox',
				'heading' => 'درونخطی SVG',
				'default' => 'true',
			),
			'img_width'   => array(
				'type'      => 'slider',
				'heading'   => 'پهنای آیکون',
				'unit'      => 'px',
				'default'   => 60,
				'max'       => 600,
				'min'       => 20,
				'on_change' => array(
					'selector' => '.icon-box-img',
					'style'    => 'width: {{ value }}px',
				),
			),
			'pos'         => array(
				'type'      => 'select',
				'heading'   => 'موقعیت آیکون',
				'default'   => 'top',
				'options'   => array(
					'top'    => 'بالا',
					'center' => 'مرکز',
					'left'   => 'چپ',
					'right'  => 'راست',
				),
			),
			'title'       => array(
				'type'      => 'textfield',
				'heading'   => 'عنوان',
				'value'     => '',
				'on_change' => array(
					'selector' => '.icon-box-text h5',
					'content'  => '{{ value }}',
				),
			),
			'title_small' => array(
				'type'      => 'textfield',
				'heading'   => 'عنوان کوچک',
				'value'     => '',
				'on_change' => array(
					'selector' => '.icon-box-text h6',
					'content'  => '{{ value }}',
				),
			),
			'tooltip'     => array(
				'type'    => 'textfield',
				'heading' => 'تولتیپ',
				'value'   => '',
			),
			'font_size'   => array(
				'type'      => 'radio-buttons',
				'heading'   => __( 'اندازه متن' ),
				'default'   => 'medium',
				'options'   => require( __DIR__ . '/values/text-sizes.php' ),
				'on_change' => array(
					'recompile' => false,
					'class'     => 'is-{{ value }}',
				),
			),
			'margin'      => array(
				'type'      => 'margins',
				'heading'   => __( 'فاصله' ),
				'value'     => '',
				'default'   => '',
				'min'       => -100,
				'max'       => 100,
				'step'      => 1,
				'on_change' => array(
					'selector' => '.icon-box',
					'style'    => 'margin: {{ value }}',
				),
			),
			'icon_border' => array(
				'type'      => 'slider',
				'heading'   => 'حاشیه آیکون',
				'unit'      => 'px',
				'default'   => 0,
				'max'       => 10,
				'min'       => 0,
				'on_change' => array(
					'selector' => '.has-icon-bg .icon-inner',
					'style'    => 'border-width: {{ value }}px',
				),
			),
			'icon_color'  => array(
				'type'        => 'colorpicker',
				'heading'     => __( 'رنگ آیکون' ),
				'description' => __( 'تنها برای آیکون های svg کار میکند.' ),
				'format'      => 'rgb',
				'position'    => 'bottom right',
				'on_change'   => array(
					'selector' => '.icon-inner',
					'style'    => 'color: {{ value }}',
				),
			),
			'link_group'  => require( __DIR__ . '/commons/links.php' ),
			'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
		),
	)
);
