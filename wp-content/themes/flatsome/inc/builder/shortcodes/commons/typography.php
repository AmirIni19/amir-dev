<?php

return array(
	'type'    => 'group',
	'heading' => 'تایپوگرافی',
	'options' => array(
		'font_size'   => array(
			'type'       => 'slider',
			'heading'    => __( 'سایز فونت', 'flatsome' ),
			'responsive' => true,
			'unit'       => 'rem',
			'max'        => 4,
			'min'        => 0.75,
			'step'       => 0.05,
		),
		'line_height' => array(
			'type'       => 'slider',
			'heading'    => __( 'ارتفاع خط', 'flatsome' ),
			'responsive' => true,
			'max'        => 3,
			'min'        => 0.75,
			'step'       => 0.05,
		),
		'text_align'  => array(
			'type'       => 'radio-buttons',
			'heading'    => __( 'تراز متن', 'flatsome' ),
			'responsive' => true,
			'default'    => '',
			'options'    => array(
				''   => array(
					'title' => 'هیچکدام',
					'icon'  => 'dashicons-no-alt',
				),
				'left'    => array(
					'title' => 'چپ',
					'icon'  => 'dashicons-editor-alignleft',
				),
				'center'  => array(
					'title' => 'وسط',
					'icon'  => 'dashicons-editor-aligncenter',
				),
				'right'   => array(
					'title' => 'راست',
					'icon'  => 'dashicons-editor-alignright',
				),
			),
		),
		'text_color' => array(
			'type'     => 'colorpicker',
			'heading'  => __( 'رنگ متن', 'flatsome' ),
			'format'   => 'rgb',
			'position' => 'bottom right',
			'helpers'  => require( __DIR__ . '/../helpers/colors.php' ),
		),
	),
);
