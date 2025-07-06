<?php

add_ux_builder_shortcode( 'map', array(
  'type' => 'container',
  'name' => __( 'نقشه' ),
  'category' => __( 'Content' ),
  'thumbnail' =>  flatsome_ux_builder_thumbnail( 'map' ),
  'template' => flatsome_ux_builder_template( 'map.html' ),
  'wrap' => false,
  'scripts' => array(
    'google-maps' => '//maps.google.com/maps/api/js?key='. trim( get_theme_mod( 'google_map_api', 'AIzaSyCnQHEUD4Yvg4m1ul3PWUwsjctR1Cl2NFc' ) ),
  ),

  'presets' => array(
    array(
      'name' => 'Default',
      'content' => '
        [map content_width="30" content_width__sm="100" content_width__md="40" position_x__sm="100" position_y__sm="100"]
          <p>هر آدرس و یا اطلاعاتی را که تمایل دارید این جا وارد کنید. (<a href="https://flatsomee.ir/" target="_blank" rel="noopener">ایران فلتسام</a>)</p>
        [/map]',
    ),
  ),

  'options' => array(

    'height' => array(
      'type' => 'scrubfield',
      'heading' => 'ا',
      'default' => '500px',
      'responsive' => true
    ),

    'lat' => array(
      'type' => 'scrubfield',
      'heading' => 'عرض جغرافیایی',
      'default' => '40.79028',
      'step' => '0.00001',
      'unit' => '',
    ),

    'long' => array(
      'type' => 'scrubfield',
      'heading' => 'طول جغرافیایی',
      'default' => '-73.95972',
      'step' => '0.00001',
      'unit' => '',
    ),

    'zoom' => array(
      'type' => 'slider',
      'heading' => __( 'زوم' ),
      'default' => 17,
      'max' => 20,
      'min' => 1,
    ),

    'pan' => array(
      'type' => 'checkbox',
      'heading' => __( 'پن' ),
      'default' => 'true',
    ),

    'content_group' => array(
      'type' => 'group',
      'heading' => __( 'محتوا' ),
      'options' => array(
           'content_enable' => array(
            'type' => 'checkbox',
            'heading' => __( 'نمایش محتوا' ),
            'default' => 'true',
          ),
          'content_bg' => array(
            'type' => 'colorpicker',
            'heading' => __('پس زمینه'),
            'format' => 'rgb',
            'default' => '#fff',
            'position' => 'bottom right',
          ),
          'content_width' => array(
            'type' => 'slider',
            'heading' => __( 'پهنا' ),
            'responsive' => true,
            'default' => 30,
            'min'  => 0,
            'max'  => 100,
            'step' => 1
          ),
          'position_x' => array(
            'type' => 'slider',
            'heading' => __( 'X موقعیت' ),
            'responsive' => true,
            'default' => 95,
            'min'  => 0,
            'max'  => 100,
            'step' => 5
          ),
          'position_y' => array(
            'type' => 'slider',
            'heading' => __( 'Y موقعیت' ),
            'responsive' => true,
            'default' => 95,
            'min'  => 0,
            'max'  => 100,
            'step' => 5
            ),
        ),
    ),

    'controls_group' => array(
      'type' => 'group',
      'heading' => __( 'کنترل ها' ),
      'options' => array(
        'controls' => array(
          'type' => 'checkbox',
          'heading' => __( 'نمایش کنترل ها' ),
          'default' => false,
        ),
        'zoom_control' => array(
          'type' => 'checkbox',
          'heading' => __( 'زوم' ),
          'default' => 'true',
          'conditions' => 'controls === "true"'
        ),
        'street_view_control' => array(
          'type' => 'checkbox',
          'heading' => __( 'حالت نمایش خیابانی' ),
          'default' => 'true',
          'conditions' => 'controls === "true"'
        ),
        'map_type_control' => array(
          'type' => 'checkbox',
          'heading' => __( 'حالت نقشه' ),
          'default' => 'true',
          'conditions' => 'controls === "true"'
        ),
      ),
    ),

    'styles_group' => array(
      'type' => 'group',
      'heading' => 'استایل',
      'options' => array(
        'color' => array(
          'type' => 'colorpicker',
          'heading' => 'رنگ',
          'default' => '',
          'format' => 'hex',
          'position' => 'bottom right',
        ),
        'saturation' => array(
          'type' => 'slider',
          'heading' => 'اشباع',
          'default' => -30,
          'max' => 100,
          'min' => -100,
        ),
      ),
    ),
    'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
  ),
) );
