<?php

add_ux_builder_shortcode( 'ux_nav', array(
  'name' => __( 'راهبری','ux-builder'),
  'category' => __( 'Layout' ),
  'thumbnail' =>  flatsome_ux_builder_thumbnail( 'nav' ),
  'options' => array(
     'parent' => array(
          'type' => 'select',
          'heading' => 'والد',
          'default' => '',
          'options' => ux_builder_get_page_parents(),
    ),
    'type' => array(
          'type' => 'select',
          'heading' => __( 'جهت','ux-builder' ),
          'default' => 'عمودی',
          'options' => array(
              'horizontal' => 'افقی',
              'vertical' => 'عمودی',
          )
    ),
    'style' => array(
        'type' => 'select',
        'heading' => __( 'استایل','ux-builder'),
        'default' => 'line',
        'options' => require( __DIR__ . '/values/nav-styles.php' ),
    ),
    'align' => array(
        'type' => 'radio-buttons',
        'heading' => 'تراز متن',
        'default' => 'left',
        'options' => require( __DIR__ . '/values/align-radios.php' ),
    ),
    'size' => array(
        'type' => 'radio-buttons',
        'heading' => __( 'سایز' ,'ux-builder'),
        'default' => 'medium',
        'options' => require( __DIR__ . '/values/text-sizes.php' ),
    ),
    'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
)
) );