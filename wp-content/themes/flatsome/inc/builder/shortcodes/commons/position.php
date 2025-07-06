<?php

return array(
    'type' => 'group',
    'heading' => __( 'مکان' ),
    'require' => array('ux_banner'),
    'options' => array(
      'position_x' => array(
        'type' => 'slider',
        'heading' => __( 'افقی' ),
        'save_when_default' => true,
        'responsive' => true,
        'default' => 50,
        'min'  => 0,
        'max'  => 100,
        'step' => 5
      ),
      'position_y' => array(
        'type' => 'slider',
        'heading' => __( 'عمودی' ),
        'save_when_default' => true,
        'responsive' => true,
        'default' => 50,
        'min'  => 0,
        'max'  => 100,
        'step' => 5
        ),
    ),
);
