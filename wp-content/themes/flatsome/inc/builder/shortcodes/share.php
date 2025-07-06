<?php

add_ux_builder_shortcode( 'share', array(
    'name' => __( 'آیکون اشتراک گذاری' ),
    'category' => __( 'Content' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'share' ),
    'options' => array(
        'title' => array(
            'type' => 'textfield',
            'heading' => 'Title',
            'default' => '',
        ),
        'style' => array(
            'type' => 'radio-buttons',
            'heading' => __( 'استایل' ),
            'default' => '',
            'options' => array(
                'outline' => array( 'title' => 'خط خارجی' ),
                'fill' => array( 'title' => 'پر' ),
                'small' => array( 'title' => 'کوچک' ),
            ),
        ),
        'align' => array(
            'type' => 'radio-buttons',
            'heading' => __( 'تراز' ),
            'default' => '',
            'options' => array(
                '' => array( 'title' => 'درون خطی' ),
                'left'   => array( 'title' => 'چپ',   'icon' => 'dashicons-editor-alignleft'),
                'center' => array( 'title' => 'وسط', 'icon' => 'dashicons-editor-aligncenter'),
                'right'  => array( 'title' => 'راست',  'icon' => 'dashicons-editor-alignright'),
            ),
        ),
        'scale' => array(
            'type' => 'slider',
            'heading' => 'مقیاس',
            'default' => '100',
            'unit' => '%',
            'max' => '300',
            'min' => '50',
        ),
        'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    ),
) );