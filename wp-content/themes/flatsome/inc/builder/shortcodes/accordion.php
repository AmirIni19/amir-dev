<?php

add_ux_builder_shortcode( 'accordion', array(
	'type'      => 'container',
	'name'      => __( 'آکوردئون' ),
	'image'     => '',
	'category'  => __( 'Content' ),
	'template'  => flatsome_ux_builder_template( 'accordion.html' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'accordion' ),
	'info'      => '{{ title }}',
	'allow'     => array( 'accordion-item' ),
	'presets' => array(
		array(
			'name'    => __( 'Default' ),
			'content' => '
                [accordion]
                    [accordion-item title="آکوردئون اول - ایران فلتسام"][/accordion-item]
                    [accordion-item title="آکوردئون دوم - ایران فلتسام"][/accordion-item]
                    [accordion-item title="آکوردئون سوم - ایران فلتسام"][/accordion-item]
                [/accordion]
            ',
		),
	),
	'options' => array(
		'title'           => array(
			'type'       => 'textfield',
			'heading'    => __( 'عنوان' ),
			'default'    =>  '',
			'auto_focus' => true,
		),
		'auto_open'       => array(
			'type'    => 'radio-buttons',
			'heading' => __( 'باز شدن خودکار' ),
			'default' => '',
			'options' => array(
				''     => array( 'title' => 'خاموش' ),
				'true' => array( 'title' => 'روشن' ),
			),
		),
		'class'           => array(
			'type'        => 'textfield',
			'heading'     => 'کلاس سفارشی',
			'full_width'  => true,
			'placeholder' => 'class-name',
			'default'     => '',
		),
		'structured_data' => array(
			'type'    => 'group',
			'heading' => __( 'Structured data یا داده‌های ساختار یافته' ),
			'options' => array(
				'faq_schema' => array(
					'type'    => 'radio-buttons',
					'heading' => __( 'FAQ اسکیمای' ),
					'default' => '',
					'options' => array(
						''     => array( 'title' => 'خاموش' ),
						'true' => array( 'title' => 'روشن' ),
					),
				),
			),
		),
	),
) );
