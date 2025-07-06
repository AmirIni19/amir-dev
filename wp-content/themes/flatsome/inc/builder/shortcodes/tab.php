<?php

add_ux_builder_shortcode( 'tab', array(
    'type' => 'container',
    'name' => __( 'پنل تب' ),
    'template' => flatsome_ux_builder_template( 'tab.html' ),
    'info' => '{{ title }}',
    'require' => array( 'tabgroup' ),
    'hidden' => true,
    'wrap' => false,

    'options' => array(

        'title' => array(
            'type' => 'textfield',
            'heading' => __( 'عنوان' ),
            'default' => __( 'عنوان تب (ایران فلتسام)' ),
            'auto_focus' => true,
        ),

        'anchor' => array(
            'type' => 'textfield',
            'heading' => __( 'متن انکر' ),
            'default' => '',
            'description' => __( 'اگر خالی بماند به صورت خودکار تولید می شود.' ),
        ),
    ),
) );
