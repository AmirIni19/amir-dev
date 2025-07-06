<?php

add_ux_builder_shortcode( 'video_button', array(
  'name' => __( 'دکمه ویدئو' ),
  'category' => __( 'Content' ),
  'thumbnail' =>  flatsome_ux_builder_thumbnail( 'play' ),

  'options' => array(
      'video' => array(
        'type' => 'textfield',
        'heading' => 'ویدئو',
        'description' => 'یک ویدیوی یوتیوب یا Vimeo را از اینجا وارد کنید. ویدیو در لایتباکس باز خواهد شد. مثال :: https://www.youtube.com/watch?v=AoPiLg8DZ3A',
      ),
      'size' => array(
        'type' => 'slider',
        'heading' => __('سایز'),
        'unit' => '%',
        'default' => '100',
        'max' => '500',
        'min' => '0',
        'on_change' => array(
	        'selector' => '.video-button-wrapper',
            'style' => 'font-size: {{ value }}%'
        )
      ),
  )
) );
