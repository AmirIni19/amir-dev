<?php

add_ux_builder_shortcode( 'button', array(
	'name'      => __( 'دکمه', 'ux-builder' ),
	'category'  => __( 'Content', 'ux-builder' ),
	'template'  => flatsome_ux_builder_template( 'button.html' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'button' ),
	'info'      => '{{ text }}',
	'inline'    => true,
	'wrap'      => false,
	'priority'  => 1,
	'presets'   => array(
		array(
			'name'      => __( 'ساده', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-simple' ),
			'content'   => '[button text="Click me!"]',
		),
		array(
			'name'      => __( 'گرد', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-round' ),
			'content'   => '[button text="Click me!" radius="10"]',
		),
		array(
			'name'      => __( 'دایره', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-circle' ),
			'content'   => '[button text="Click me!" radius="99"]',
		),
		array(
			'name'      => __( 'خط خارجی', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-outline' ),
			'content'   => '[button text="Click me!" style="outline"]',
		),
		array(
			'name'      => __( 'Outline Round', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-outline-round' ),
			'content'   => '[button text="Click me!" style="outline" radius="10"]',
		),
		array(
			'name'      => __( 'خط خارجی گرد', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-outline-circle' ),
			'content'   => '[button text="Click me!" style="outline" radius="99"]',
		),
		array(
			'name'      => __( 'لینک ساده', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-link' ),
			'content'   => '[button text="Click me!"  style="link"]',
		),
		array(
			'name'      => __( 'خط زیر', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-underline' ),
			'content'   => '[button text="Click me!"  style="underline"]',
		),
		array(
			'name'      => __( 'CTA - کوچک', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-call-to-action' ),
			'content'   => '[button text="Click me!" style="shade" depth="3" depth_hover="5" radius="5"]',
		),
		array(
			'name'      => __( 'CTA - بزرگ', 'ux-builder' ),
			'thumbnail' => flatsome_ux_builder_thumbnail( 'button-call-to-action-large' ),
			'content'   => '[button text="Click me!" style="shade" size="larger" depth="4" depth_hover="5" radius="10"]',
		),
	),
	'options'   => array(
		'text'             => array(
			'type'       => 'textfield',
			'holder'     => 'button',
			'heading'    => 'متن',
			'param_name' => 'text',
			'focus'      => 'true',
			'value'      => 'Button',
			'default'    => '',
			'auto_focus' => true,
		),
		'letter_case'      => array(
			'type'    => 'radio-buttons',
			'heading' => 'نوع حروف',
			'default' => '',
			'options' => array(
				''          => array( 'title' => 'ABC' ),
				'lowercase' => array( 'title' => 'Abc' ),
			),
		),
		'layout_options'   => array(
			'type'    => 'group',
			'heading' => 'طرح',
			'options' => array(
				'color'       => array(
					'type'    => 'select',
					'heading' => 'رنگ',
					'default' => 'primary',
					'options' => array(
                'primary' => 'اولیه',
                'secondary' => 'ثانویه',
                'alert' => 'هشدار',
                'success' => 'موفقیت',
                'white' => 'سفید',
					),
				),
				'style'       => array(
					'type'    => 'select',
            'heading' => 'طرح',
            'default' => '',
            'options' => array(
                '' => 'Default',
                'outline' => 'خط خارجی',
                'link' => 'ساده',
                'underline' => 'خط زیر',
                'shade' => 'سایه',
                'bevel' => 'برجسته',
                'gloss' => 'شیشه ای',
					),
				),
				'size'        => array(
					'type'    => 'select',
					'heading' => 'سایز',
					'options' => require __DIR__ . '/values/sizes.php',
				),
				'animate'     => array(
					'type'    => 'select',
					'heading' => 'انیمیشن',
					'default' => 'none',
					'options' => require __DIR__ . '/values/animate.php',
				),
				'padding'     => array(
					'type'       => 'margins',
					'heading'    => 'پدینگ',
					'full_width' => true,
					'min'        => 0,
					'max'        => 200,
					'step'       => 1,
				),
				'radius'      => array(
					'type'    => 'slider',
					'class'   => '',
					'heading' => 'شعاع',
					'default' => '0',
					'max'     => '99',
					'min'     => '0',
				),
				'depth'       => array(
					'type'    => 'slider',
					'class'   => '',
					'heading' => 'عمق',
					'default' => '0',
					'max'     => '5',
					'min'     => '0',
				),
				'depth_hover' => array(
					'type'       => 'slider',
					'class'      => '',
					'heading'    => 'عمق: هاور',
					'param_name' => 'depth_hover',
					'default'    => '0',
					'max'        => '5',
					'min'        => '0',
				),
				'expand'      => array(
					'type'    => 'checkbox',
					'heading' => 'باز کردن',
				),
			),
		),
		'icon_options'     => array(
			'type'    => 'group',
			'heading' => 'آیکون',
			'options' => array(
				'icon'        => array(
					'type'    => 'select',
					'heading' => 'آیکون',
					'options' => require __DIR__ . '/values/icons.php',
				),
				'icon_pos'    => array(
					'conditions' => 'icon',
					'type'       => 'select',
					'heading'    => 'موقعیت',
					'options'    => array(
						''     => 'راست',
						'left' => 'چپ',
					),
				),
				'icon_reveal' => array(
					'conditions' => 'icon',
					'type'       => 'select',
					'heading'    => 'قابلیت مشاهده',
					'options'    => array(
						''     => 'همیشه قابل مشاهده ',
						'true' => 'قابل مشاهده در هاور',
					),
				),
			),
		),
		'link_options'     => require __DIR__ . '/commons/links.php',
		'advanced_options' => require __DIR__ . '/commons/advanced.php',
	),
) );
