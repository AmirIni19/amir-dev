<?php

return array(
  'type' => 'group',
  'heading' => 'پیشرفته',
  'options' => array(
    'class' => array(
        'type' => 'textfield',
        'heading' => 'کلاس',
        'param_name' => 'class',
        'default' => '',
    ),
    'visibility'  => require( __DIR__ . '/visibility.php' ),
  ),
);