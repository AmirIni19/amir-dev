<?php

if(!$default_text_align) $default_text_align = 'left';

return array(

    //
    // Image options
    //
    'image_options' => array(
        'type' => 'group',
        'heading' => __( 'تصویر' ),
        'options' => array(

            'image_height' => array(
              'type' => 'scrubfield',
              'heading' => __('ارتفاع'),
              'conditions' => 'type !== "grid"',
              'default' => '',
              'placeholder' => __('Auto'),
              'min' => 0,
              'max' => 1000,
              'step' => 1,
              'helpers' => require( __DIR__ . '/../helpers/image-heights.php' ),
               'on_change' => array(
                    'selector' => '.box-image-inner',
                    'style' => 'padding-top: {{ value }}'
                )
            ),

            'image_width' => array(
                'type' => 'slider',
                'heading' => __( 'عرض' ),
                'unit' => '%',
                'default' => 100,
                'max' => 100,
                'min' => 0,
                'on_change' => array(
                    'selector' => '.box-image',
                    'style' => 'width: {{ value }}%'
                )
            ),

            'image_radius' => array(
                'type' => 'slider',
                'heading' => __( 'شعاع' ),
                'unit' => '%',
                'default' => 0,
                'max' => 100,
                'min' => 0,
                'on_change' => array(
                    'selector' => '.box-image-inner',
                    'style' => 'border-radius: {{ value }}%'
                )
            ),

            'image_size' => array(
                'type' => 'select',
                'heading' => __( 'سایز' ),
                'default' => '',
                'options' => flatsome_ux_builder_image_sizes(
                    array(
                        '' => 'Default'
                    )
                ),
            ),

            'image_overlay' => array(
                'type' => 'colorpicker',
                'heading' => __( 'پوشش' ),
                'default' => '',
                'alpha' => true,
                'format' => 'rgb',
                'position' => 'bottom right',
                'on_change' => array(
                    'selector' => '.overlay',
                    'style' => 'background-color: {{ value }}'
                )
            ),

            'image_hover' => array(
                'type' => 'select',
                'heading' => __( 'هاور' ),
                'default' => '',
                'options' => require( __DIR__ . '/../values/image-hover.php' ),
                'on_change' => array(
                    'selector' => '.image-cover',
                    'class' => 'image-{{ value }}'
                )
            ),
            'image_hover_alt' => array(
                'type' => 'select',
                'heading' => __( 'هاور الت' ),
                'default' => '',
                'conditions' => 'image_hover',
                'options' => require( __DIR__ . '/../values/image-hover.php' ),
                'on_change' => array(
                    'selector' => '.image-cover',
                    'class' => 'image-{{ value }}'
                )
            ),
        ),
    ),

    //
    // Text options
    //

    'text_options' => array(
        'type' => 'group',
        'heading' => __( 'متن' ),
        'options' => array(

            'text_pos' => array(
                'type' => 'select',
                'heading' => __( 'مکان' ),
                'conditions' => 'style === "vertical" || style === "shade" || style === "overlay"',
                'default' => 'bottom',
                'options' => require( __DIR__ . '/../values/align-v.php' ),

                'on_change' => array(
                    'selector' => '.box',
                    'class' => 'box-text-{{ value }}'
                )
            ),

            'text_align' => array(
                'type' => 'radio-buttons',
                'heading' => __( 'تراز' ),
                'default' => $default_text_align,
                'options' => require( __DIR__ . '/../values/align-radios.php' ),
                'on_change' => array(
                    'selector' => '.box-text',
                    'class' => 'text-{{ value }}'
                )
            ),

            'text_size' => array(
                'type' => 'radio-buttons',
                'heading' => __( 'اندازه' ),
                'default' => 'medium',
                'options' => require( __DIR__ . '/../values/text-sizes.php' ),
                'on_change' => array(
                    'selector' => '.box-text',
                    'class' => 'is-{{ value }}'
                )
            ),

            'text_hover' => array(
                'type' => 'select',
                'heading' => __( 'هاور' ),
                'default' => '',
                'options' => require( __DIR__ . '/../values/text-hover.php' ),
            ),

            'text_bg' => array(
                'type' => 'colorpicker',
                'heading' => __( 'رنگ زمینه' ),
                'default' => '',
                'alpha' => true,
                'format' => 'rgb',
                'position' => 'bottom right',
                'on_change' => array(
                    'selector' => '.box-text',
                    'style' => 'background-color:{{ value }}'
                )
            ),

            'text_color' => array(
                'type' => 'radio-buttons',
                'heading' => __( 'رنگ' ),
                'conditions' => 'style !== "shade" && style !== "overlay"',
                'default' => 'light',
                'options' => array(
                    'light' => array( 'title' => 'تیره' ),
                    'dark' => array( 'title' => 'روشن' ),
                ),
            ),
            'text_padding' => array(
              'type' => 'margins',
              'heading' => __( 'پدینگ' ),
              'value' => '',
              'full_width' => true,
              'min' => 0,
              'max' => 100,
              'step' => 1,

              'on_change' => array(
                    'selector' => '.box-text',
                    'style' => 'padding: {{ value }}'
                )
            ),
        ),
    ),
    'advanced_options' => require( __DIR__ . '/../commons/advanced.php')
);
