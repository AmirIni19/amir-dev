<?php

// Shortcode to display product categories

$repeater_columns = '4';
$repeater_type = 'slider';

$default_text_align = 'center';

$options = array(
'style_options' => array(
    'type' => 'group',
    'heading' => __( 'استایل' ),
    'options' => array(
         'style' => array(
            'type' => 'select',
            'heading' => __( 'استایل' ),
            'default' => 'نشان',
            'options' => require( __DIR__ . '/values/box-layouts.php' )
        )
    ),
),
'layout_options' => require( __DIR__ . '/commons/repeater-options.php' ),
'layout_options_slider' => require( __DIR__ . '/commons/repeater-slider.php' ),
'cat_meta' => array(
    'type' => 'group',
    'heading' => __( 'متا' ),
    'options' => array(

     'ids' => array(
        'type' => 'select',
        'heading' => 'دسته بندی ها',
        'param_name' => 'ids',
        'config' => array(
            'multiple' => true,
            'placeholder' => 'انتخاب کنید..',
            'termSelect' => array(
                'post_type' => 'product_cat',
                'taxonomies' => 'product_cat'
            ),
        )
    ),

    'number' => array(
        'type' => 'textfield',
        'heading' => 'تعداد',
        'conditions' => 'ids == ""',
        'default' => '',
    ),

    'offset' => array(
        'type' => 'textfield',
        'heading' => 'آفست',
        'conditions' => 'ids == ""',
        'default' => '',
    ),

    'orderby' => array(
        'type' => 'select',
        'heading' => __( 'ترتیب بر اساس' ),
        'default' => 'menu_order',
        'options' => array(
            'name' => 'نام',
            'date' => 'تاریخ',
            'menu_order' => 'ترتیب فهرست',
        )
    ),
    'order' => array(
        'type' => 'select',
        'heading' => __( 'ترتیب' ),
        'default' => 'asc',
        'options' => array(
            'asc' => 'صعودی',
            'desc' => 'نزولی',
        )
    ),
   'show_count' => array(
        'type' => 'checkbox',
        'heading' => 'نمایش شمارش',
        'default' => 'true'
    ),
  ),
)
);

$box_styles = require( __DIR__ . '/commons/box-styles.php' );
$options = array_merge($options, $box_styles);

$advanced = array('advanced_options' => require( __DIR__ . '/commons/advanced.php'));
$options = array_merge($options, $advanced);


add_ux_builder_shortcode( 'ux_product_categories', array(
    'name' => 'دسته بندی محصولات',
    'category' => __( 'Shop' ),
    'priority' => 3,
    #'wrap' => false,
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'categories' ),

   'presets' => array(
        array(
            'name' => __( 'پیشفرض' ),
            'content' => '[ux_product_categories]'
        ),
        array(
            'name' => __( 'ساده' ),
            'content' => '[ux_product_categories style="normal"]'
        ),array(
            'name' => __( 'روکش' ),
            'content' => '[ux_product_categories style="overlay" slider_nav_style="simple" slider_nav_position="outside" image_overlay="rgba(0, 0, 0, 0.19)" image_hover="overlay-remove-50" image_hover_alt="zoom"]'
        ),array(
            'name' => __( 'گرید' ),
            'content' => '[ux_product_categories style="overlay" type="grid" grid="3" columns="3" animate="fadeInLeft" number="4" orderby="name" image_size="large" image_overlay="rgba(38, 38, 38, 0.16)" text_pos="middle" text_size="large"]'
        ),array(
            'name' => __( 'استایل دایره' ),
            'content' => '[ux_product_categories style="overlay" slider_nav_style="simple" slider_nav_position="outside" image_height="100%" image_radius="100" image_overlay="rgba(0, 0, 0, 0.19)" image_hover="overlay-remove-50" image_hover_alt="zoom" text_pos="middle" text_size="large" text_hover="bounce"]'
        ),array(
            'name' => __( 'گرید تیره' ),
            'content' => '[ux_product_categories style="overlay" type="grid" grid="13" col_spacing="small" columns="3" depth_hover="5" animate="fadeInLeft" number="5" orderby="name" image_size="large" image_overlay="rgba(38, 38, 38, 0.16)" image_hover="color" image_hover_alt="zoom-long" text_pos="middle" text_size="large"]'
        ),
    ),
    'options' => $options
) );
