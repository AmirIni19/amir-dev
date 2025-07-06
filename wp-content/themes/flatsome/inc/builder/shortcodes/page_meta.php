<?php

add_ux_builder_shortcode( 'ux_the_title', array(
  'name' => __( 'عنوان صفحه' ),
  'category' => __( 'Meta' ),
  'options' => array(
  	 'video' => array(
        'type' => 'textfield',
        'heading' => 'Video',
      ),
  	)
) );

add_ux_builder_shortcode( 'ux_breadcrumbs', array(
  'name' => __( 'ریزآدرس ها' ),
  'category' => __( 'Meta' ),
  'options' => array(
  	 'video' => array(
        'type' => 'textfield',
        'heading' => 'ویدئو',
      ),
  	)
) );

add_ux_builder_shortcode( 'ux_subnav', array(
  'name' => __( 'زیرناوها' ),
  'category' => __( 'Meta' ),
  'options' => array( 
  	'video' => array(
        'type' => 'textfield',
        'heading' => 'ویدئو',
      ),
 	)
) );


add_ux_builder_shortcode( 'ux_excerpt', array(
  'name' => __( 'خلاصه' ),
  'category' => __( 'Meta' ),
  'options' => array( 
    'video' => array(
        'type' => 'textfield',
        'heading' => 'ویدئو',
      ),
  )
) );