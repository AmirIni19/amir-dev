<?php

add_ux_builder_shortcode( 'divider', array(
    'name' => __( 'جدا کننده' ),
    'category' => __( 'Content' ),
    'template' => flatsome_ux_builder_template( 'divider.html' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'divider' ),
    'options' => array(
        'align' => array(
            'type' => 'radio-buttons',
            'heading' => __('چینش'),
            'default' => '',
            'options' => require( __DIR__ . '/values/align-radios.php' ),
        ),
    	'width' => array(
    		'type' => 'scrubfield',
    		'heading' => __('پهنا'),
    		'default' => '30px',
            'min' => 0,
    	),
    	'height' => array(
    		'type' => 'scrubfield',
    		'heading' => __('ارتفاع'),
    		'default' => '3px',
            'min' => 0,
    	),
    	'margin' => array(
    		'type' => 'scrubfield',
    		'heading' => __('فاصله'),
    		'default' => '1.0em',
            'step' => 0.1,
    	),
		'color' => array(
	      'type' => 'colorpicker',
	      'heading' => __('رنگ'),
	      'default' => '',
	      'alpha' => true,
	      'format' => 'rgb',
	      'position' => 'bottom right',
	    ),
    )


) );

/*
 'width' => 'small',
	    'height' => '',
	    'align' => 'left',  */
