<?php

if(!$repeater_col_spacing) $repeater_col_spacing = 'normal';
if(!$repeater_columns) $repeater_columns = '4';
if(!$repeater_type) $repeater_type = 'slider';

return array(
    'type' => 'group',
    'heading' => __( 'طرح' ),
    'options' => array(
        'type' => array(
            'type' => 'select',
            'heading' => 'نوع',
            'default' => $repeater_type,
            'options' => require( __DIR__ . '/../values/row-layouts.php' )
        ),
        'grid' => array(
            'type' => 'select',
            'heading' => 'طرح گرید',
            'conditions' => 'type === "grid"',
            'default' => '1',
            'options' => require( __DIR__ . '/../values/grids.php' )
        ),
        'grid_height' => array(
            'type' => 'textfield',
            'heading' => __( 'ارتفاع گرید' ),
            'conditions' => 'type === "grid"',
            'default' => '600px',
            'responsive' => true,
    ),
    'width' => array(
        'type' => 'select',
        'heading' => 'عرض',
        'conditions' => 'type !== "slider-full"',
        'default' => '',
        'options' => array(
            '' => 'کانتینر',
            'full-width' => 'تمام عرض',
        )
    ),
    'col_spacing' => array(
        'type' => 'select',
        'heading' => 'فاصله ستون',
        'conditions' => 'type !== "slider-full"',
        'default' => $repeater_col_spacing,
        'options' => require( __DIR__ . '/../values/col-spacing.php' )
    ),
    'columns' => array(
        'type' => 'slider',
        'heading' => 'ستون ها',
        'conditions' => 'type !== "grid" && type !== "slider-full"',
        'default' => $repeater_columns,
        'responsive' => true,
        'max' => '8',
        'min' => '1',
    ),
   'depth' => array(
        'type' => 'slider',
        'heading' => __( 'سایه' ),
        'default' => '0',
        'max' => '5',
        'min' => '0',
    ),
    'depth_hover' => array(
        'type' => 'slider',
        'heading' => __( 'هاور - سایه' ),
        'default' => '0',
        'max' => '5',
        'min' => '0',
    ),
    'animate' => array(
        'type' => 'select',
        'heading' => __( 'انیمیشن' ),
        'default' => 'none',
        'options' => require( __DIR__ . '/../values/animate.php' ),
    ),
  ),
);
