<?php

add_ux_builder_shortcode( 'ux_video', array(
    'name' => __( 'ویدئو','ux-builder'),
    'category' => __( 'Content' ),
//    'toolbar_thumbnail' => 'id',
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'ux_video' ),
    'allow_in' => array('text_box'),
    'wrap' => true,
    'overlay' => true,
    'options' => array(

        'url' => array(
            'type' => 'textfield',
            'full_width' => true,
            'default' => 'https://www.youtube.com/watch?v=AoPiLg8DZ3A',
            'heading' => 'آدرس ویدئو',
            'description' => 'یک ویدیوی یوتیوب یا Vimeo را از اینجا وارد کنید. ویدیو در لایتباکس باز خواهد شد. مثال :: https://www.youtube.com/watch?v=AoPiLg8DZ3A',
        ),

        'height' => array(
              'type' => 'scrubfield',
              'heading' => __('ارتفاع'),
              'default' => '56.25%',
              'placeholder' => __('Auto'),
              'min' => 0,
              'max' => 1000,
              'step' => 1,
              'helpers' => require( __DIR__ . '/helpers/image-heights.php' ),
               'on_change' => array(
                    'selector' => '.video',
                    'style' => 'padding-top: {{ value }}'
                )
        ),


        'depth' => array(
            'type' => 'slider',
            'heading' => 'عمق',
            'default' => '0',
            'max' => '5',
            'min' => '0',
            'on_change' => array(
                'selector' => '.video',
                'class' => 'box-shadow-{{ value }}'
            )
        ),

        'depth_hover' => array(
            'type' => 'slider',
            'heading' => 'عمق :هاور',
            'default' => '0',
            'max' => '5',
            'min' => '0',
            'on_change' => array(
                'selector' => '.video',
                'class' => 'box-shadow-{{ value }}-hover'
            )
        ),
        'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    ),
) );
