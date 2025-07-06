<?php

add_ux_builder_shortcode( 'tabgroup', array(
    'type' => 'container',
    'name' => __( 'تب ها' ),
    'image' => '',
    'category' => __( 'Content' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'tabs' ),
    'template' => flatsome_ux_builder_template( 'tabgroup.html' ),
    'tools' => 'shortcodes/tabgroup/tabgroup.tools.html',
    'info' => '{{ title }}',
    'allow' => array( 'tab' ),

    'children' => array(
        'draggable' => false,
        'addable_spots' => array( 'center' ),
    ),

    'toolbar' => array(
        'show_children_selector' => true,
        'show_on_child_active' => true,
    ),

    'presets' => array(
        array(
            'name' => __( 'پیش فرض' ),
            'content' => '
                [tabgroup title="عنوان تب"]
                    [tab title="تب اول"][/tab]
                    [tab title="تب دوم"][/tab]
                    [tab title="تب سوم"][/tab]
                [/tabgroup]
            '
        ),
    ),

    'options' => array(

        'title' => array(
            'type' => 'textfield',
            'heading' => __( 'عنوان' ),
            'default' => __( '' ),
        ),

        'style' => array(
            'type' => 'select',
            'heading' => __( 'استایل' ),
            'default' => 'line',
            'options' => require( __DIR__ . '/values/nav-styles.php' ),
        ),

        'type' => array(
            'type' => 'select',
            'heading' => __( 'نوع' ),
            'default' => 'horizontal',
            'options' => array(
                'horizontal' => 'افقی',
                'vertical' => 'عمودی',
            )
        ),

        'nav_style' => array(
          'type' => 'radio-buttons',
          'heading' => 'استایل ناوبری',
          'default' => 'uppercase',
          'options' => require( __DIR__ . '/values/nav-types-radio.php' ),
        ),

        'nav_size' => array(
            'type' => 'radio-buttons',
            'heading' => __( 'اندازه' ),
            'default' => 'medium',
            'options' => require( __DIR__ . '/values/text-sizes.php' ),
        ),

        'align' => array(
            'type' => 'radio-buttons',
            'heading' => 'تراز تب ها',
            'default' => 'left',
            'options' => require( __DIR__ . '/values/align-radios.php' ),
        ),
        'bahavior_group' => array(
	        'type' => 'group',
	        'heading' => __( 'رفتار' ),
	        'options' => array(
		        'event' => array(
			        'type'    => 'radio-buttons',
			        'heading' => __( 'فعالسازی' ),
			        'description' => 'در حالت هاور فعال می شود',
			        'default' => '',
			        'options' => array(
				        ''      => array( 'title' => 'با کلیک' ),
				        'hover' => array( 'title' => 'با هاور' ),
			        ),
		        ),
	        ),
        ),
        'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    ),
) );
