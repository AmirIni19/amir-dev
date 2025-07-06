<?php

// Shortcode to display a single product
add_ux_builder_shortcode( 'scroll_to', array(
    'name' => 'اسکرول به',
    'category' => __( 'Content' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'scroll_to' ),
    'info' => '{{ title }}',
    'wrap' => false,

    'presets' => array(
        array(
            'name' => __( 'پیش فرض' ),
            'content' => '[scroll_to title="" link="" bullet="true"]'
        ),
    ),

    'options' => array(
        'title' => array(
            'type' => 'textfield',
            'heading' => 'عنوان',
            'default' => 'عنوان را وارد کنید...',
        ),
        'link' => array(
            'type' => 'textfield',
            'heading' => 'لینک',
            'default' => '',
            'placeholder' => 'لینک را وارد کنید...',
            'description' => 'You can scroll to this by using #value as link'
        ),
        'bullet' => array(
            'type' => 'radio-buttons',
            'heading' => __('گلوله'),
            'default' => 'true',
            'options' => array(
                'false'  => array( 'title' => 'خاموش'),
                'true'  => array( 'title' => 'روشن'),
            ),
        ),
        'offset_options' => array(
	        'type'    => 'group',
	        'heading' => 'آفست اسکرول',
	        'options' => array(
		        'offset_type' => array(
			        'type'    => 'radio-buttons',
			        'heading' => 'Type',
			        'default' => '',
			        'options' => array(
				        ''      => array( 'title' => 'خودکار' ),
				        'custom' => array( 'title' => 'سفارشی' ),
			        ),
		        ),
		        'offset'      => array(
			        'type'       => 'slider',
			        'heading'    => 'مقدار',
			        'conditions' => 'offset_type == "custom"',
			        'default'    => '0',
			        'min'        => '0',
			        'max'        => '1000',
			        'unit'       => 'px',
		        ),
	        ),
        ),
    ),
) );
