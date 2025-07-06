<?php

add_ux_builder_shortcode( 'ux_bestseller_products', array(
    'name' => __( 'پرفروش ترین محصولات' ),
    'image' => '',
    'category' => __( 'Shop' ),

    'presets' => array(
        array(
            'name' => __( 'نرمال' ),
            'content' => '[ux_bestseller_products products="8" columns="4" title="Check our bestsellers!"]'
        ),
    ),

    'options' => array(
        array(
            'type' => 'textfield',
            'class' => '',
            'full_width' => true,
            'heading' => 'عنوان',
            'param_name' => 'title',
            'default' => '',
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => 'ستون',
            'param_name' => 'columns',
            'default' => '',
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => 'پست',
            'param_name' => 'products',
            'default' => '',
            'value' => ''
        ),
    ),
) );


add_ux_builder_shortcode( 'ux_featured_products', array(
    'name' => __( 'محصول ویژه' ),
    'image' => '',
    'category' => __( 'Shop' ),
    'ajax' => true,

    'presets' => array(
        array(
            'name' => __( 'نرمال' ),
            'content' => '[ux_featured_products products="8" columns="4"]'
        ),
        array(
            'name' => __( '3 ستون' ),
            'content' => '[ux_featured_products products="8" columns="3"]'
        ),
    ),

    'options' => array(
        array(
            'type' => 'textfield',
            'class' => '',
            'full_width' => true,
            'heading' => 'عنوان',
            'param_name' => 'title',
            'default' => '',
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => 'ستون',
            'param_name' => 'columns',
            'default' => '',
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => 'پست',
            'param_name' => 'products',
            'default' => '',
            'value' => ''
        ),
    ),
) );
