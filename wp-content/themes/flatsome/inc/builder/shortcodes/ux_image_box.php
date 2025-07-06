<?php

add_ux_builder_shortcode( 'ux_image_box', array(
    'name' => __( 'جعبه تصویر' ),
    'category' => __( 'Content' ),
    'type' => 'container',
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'image_box' ),
    'wrap' => false,
    'presets' => array(
        array(
            'name' => __( 'Blank' ),
            'content' => '[ux_image_box] <h4>یک عنوان</h4> <p>متن - ایران فلتسام</p> [/ux_image_box]',
        ),
    ),
    'options' => array_merge_recursive( array(
        'style' => array(
            'type' => 'select',
            'heading' => __( 'Style' ),
            'default' => 'normal',
            'options' => require( __DIR__ . '/values/box-layouts.php' ),
        ),
        'image_options' => array(
            'options' => array(
                'img' => array(
                    'type' => 'image',
                    'heading' => 'تصویر',
                    'group' => 'background',
                    'param_name' => 'img',
                ),
            ),
        ),
        'depth' => array(
            'type' => 'slider',
            'heading' => __( 'عمق' ),
            'default' => '0',
            'max' => '5',
            'min' => '0',
            'on_change' => array(
                'class' => 'box-shadow-{{ value }}'
            )
        ),
        'depth_hover' => array(
            'type' => 'slider',
            'heading' => __( 'عمق : هاور' ),
            'default' => '0',
            'max' => '5',
            'min' => '0',
            'on_change' => array(
                'class' => 'box-shadow-{{ value }}-hover'
            )
        ),
        'link_group' => require( __DIR__ . '/commons/links.php' ),
    ),
    require( __DIR__ . '/commons/box-styles.php' ) ),
) );
