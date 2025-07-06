<?php

add_ux_builder_shortcode( 'block', array(
  'name' => __( 'بلاگ', 'flatsome' ),
  'category' => __( 'Layout', 'flatsome' ),
  'compile' => false,
  'thumbnail' =>  flatsome_ux_builder_thumbnail( 'block' ),
  'template_shortcode' => "[{tag}{options}]\n\n",
  'external' => true,

  'options' => array(
    'id' => array(
      'type' => 'select',
      'heading' => __( 'بلاگ', 'flatsome' ),
      'full_width' => true,
      'config' => array(
        'placeholder' => __( 'انتخاب کنید', 'flatsome' ),
        'postSelect' => array(
          'post_type' => array( 'blocks' )
        ),
      )
    ),
  ),
) );
