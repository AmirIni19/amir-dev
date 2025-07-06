<?php

add_ux_builder_shortcode( 'gap', array(
    'name' => __( 'شکاف' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'gap' ),
    'info' => '{{ height }}',
    'allow_in' => array('text_box'),
    'wrap' => false,

    'options' => array(

        'height' => array(
            'type' => 'scrubfield',
            'responsive' => true,
            'heading' => __( 'ارتفاع' ),
            'default' => '30px',
            'min' => 0,
            'on_change' => array(
                'style' => 'padding-top: {{ value }}'
            ),
        ),
        'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    ),
) );
