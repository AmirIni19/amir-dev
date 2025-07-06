<?php


add_ux_builder_shortcode( 'search', array(
  'name' => __( 'جعبه جستجو' ),
  'category' => __( 'Content' ),
  'thumbnail' => flatsome_ux_builder_thumbnail( 'search' ),
  'wrap' => false,
  'allow_in' => array('text_box'),
  'presets' => array(
    array(
      'name' => __( 'Default' ),
      'content' => '[search]',
      ),
    ),
    'options' => array(
      'style' => array(
          'type' => 'select',
          'heading' => __( 'استایل' ),
          'options' => array(
              '' => 'نرمال',
              'flat' => 'فلت',
          )
        ),

      'size' => array(
              'type' => 'radio-buttons',
              'heading' => __( 'اندازه' ),
              'default' => 'medium',
              'options' => require( __DIR__ . '/values/text-sizes.php' ),
              'on_change' => array(
                  'class' => 'is-{{ value }}'
              )
        ),
      'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    )
) );