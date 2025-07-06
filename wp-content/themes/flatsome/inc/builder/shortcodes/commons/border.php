<?php
// Border Control
return array(
      'type' => 'group',
      'heading' => __( 'گردی لبه' ),
      'options' => array(
        'border' => array(
            'type' => 'margins',
            'heading' => 'عرض',
            'full_width' => true,
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
        'border_margin' => array(
            'type' => 'margins',
            'heading' => 'فاصله بیرونی',
            'conditions' => 'border',
            'full_width' => true,
            'min' => -100,
            'max' => 100,
            'step' => 1,
        ),
        'border_style' => array(
            'type' => 'radio-buttons',
            'heading' => 'استایل',
            'full_width' => true,
            'conditions' => 'border',
            'default' => '',
            'options' => array(
                ''   => array( 'title' => 'ساده'),
                'dashed'  => array( 'title' => 'خط چین'),
                'dotted'  => array( 'title' => 'نقطه چین'),
            ),
        ),
        'border_radius' => array(
            'type' => 'slider',
            'heading' => 'گردی لبه',
            'conditions' => 'border',
            'unit' => 'px',
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
        'border_color' => array(
          'type' => 'colorpicker',
          'heading' => __('رنگ'),
          'conditions' => 'border',
          'responsive' => true,
          'alpha' => true,
          'format' => 'rgb',
          'position' => 'bottom right',
        ),
        'border_hover' => array(
            'type' => 'select',
            'heading' => __( 'هاور' ),
            'default' => '',
            'conditions' => 'border',
            'options' => require( __DIR__ . '/../values/text-hover.php' ),
        ),
),
);