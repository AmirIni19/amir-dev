<?php

return array(
    'type' => 'group',
    'heading' => __( 'لینک' ),
    'options' => array(
        'link' =>   array(
          'type' => 'textfield',
          'heading' => __('لینک'),
        ),
        'target' => array(
          'type' => 'select',
          'heading' => __( 'هدف' ),
          'default' => '',
          'options' => array(
              '' => 'پنجره فعلی',
              '_blank' => 'پنجره جدید',
          )
        ),
        'rel' => array(
	        'type' => 'textfield',
	        'heading' => __( 'رابطه - REL' ),
        ),
    )
); 