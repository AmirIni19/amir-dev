<?php

add_ux_builder_shortcode( 'accordion-item', array(
    'type' => 'container',
    'name' => __( 'پنل آکوردئون' ),
    'template' => flatsome_ux_builder_template( 'accordion_item.html' ),
    'info' => '{{ title }}',
    'require' => array( 'accordion' ),
    'wrap' => false,
    'hidden' => true,
    'options' => array(
        'title' => array(
            'type' => 'textfield',
            'heading' => __( 'عنوان' ),
            'default' => __( 'عنوان پنل آکوردئون' ),
            'auto_focus' => true,
        ),
        'anchor' => array(
            'type' => 'textfield',
            'heading' => __( 'Anchor' ),
            'description' => __( 'اگر خالی بماند به صورت خودکار تولید می شود.' ),
            'default' => '',
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'کلاس سفارشی',
            'full_width' => true,
            'placeholder' => 'class-name',
            'default' => '',
        ),
    ),
) );
