<?php

return array(
      'type' => 'group',
      'heading' => __( 'پس زمینه' ),
      'options' => array(
        'bg' => array(
          'type' => 'image',
          'heading' => __( 'تصویر' ),
          'thumb_size' => 'bg_size',
          'bg_position' => 'bg_pos',
        ),
        'bg_size'=> array(
          'type' => 'select',
          'heading' => 'اندازه',
          'default' => 'large',
          'conditions' => 'bg',
          'options' => flatsome_ux_builder_image_sizes(),
        ),
        'bg_color' => array(
          'type' => 'colorpicker',
          'heading' => __('رنگ'),
          'format' => 'rgb',
          'position' => 'bottom right',
          'helpers' => require( __DIR__ . '/../helpers/colors.php' ),
        ),
        'bg_overlay' => array(
          'type' => 'colorpicker',
          'heading' => __('روکش'),
          'responsive' => true,
          'alpha' => true,
          'format' => 'rgb',
          'position' => 'bottom right',
          'helpers' => require( __DIR__ . '/../helpers/colors-overlay.php' ),
        ),
        'bg_pos' => array(
          'conditions' => 'bg',
          'type' => 'textfield',
          'heading' => __('مکان'),
        ),
        'hover' => array(
          'conditions' => 'bg',
          'type' => 'select',
          'heading' => 'هاور',
          'options' => require( __DIR__ . '/../values/image-hover.php' ),
        ),
        'hover_alt' => array(
          'conditions' => 'hover',
          'type' => 'select',
          'heading' => 'هاور الت',
          'options' => require( __DIR__ . '/../values/image-hover.php' ),
        ),
        'parallax' => array(
            'conditions' => 'bg',
            'type' => 'slider',
            'heading' => 'پارالکس',
            'unit' => '+',
            'default' => 0,
            'max' => 10,
            'min' => 0,
        ),
       'effect' => array(
            'type' => 'select',
            'heading' => 'افکت',
            'options' => array(
              '' => 'بدون افکت',
              'snow' => 'برف',
              'confetti' => 'کاغذ رنگی',
              'sliding-glass' => 'شیشه',
              'sparkle' => 'درخشش',
              'rain' => 'باران',
            ),
        ),
    ),
);
