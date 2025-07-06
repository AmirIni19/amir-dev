<?php

// Shortcode to display product categories

$repeater_columns = '4';
$repeater_type = 'slider';
$default_text_align = 'center';
$repeater_col_spacing = 'small';

$options = array(
'portfolio_meta' => array(
    'type' => 'group',
    'heading' => __( 'گزینه ها' ),
    'options' => array(

    'style' => array(
        'type' => 'select',
        'heading' => __( 'استایل' ),
        'default' => 'bounce',
        'options' => require( __DIR__ . '/values/box-layouts.php' )
    ),

     'filter' => array(
            'type' => 'radio-buttons',
            'heading' => __('فیلتر'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'خاموش'),
                'true'  => array( 'title' => 'روشن'),
            ),
        ),

    'filter_nav' => array(
        'type' => 'select',
        'heading' => __( 'استایل فیلتر' ),
        'conditions' => 'filter',
        'default' => 'line-grow',
        'options' => require( __DIR__ . '/values/nav-styles.php' ),
    ),

    'filter_align' => array(
        'type' => 'radio-buttons',
        'conditions' => 'filter',
        'heading' => 'تراز فیلتر',
        'default' => 'center',
        'options' => require( __DIR__ . '/values/align-radios.php' ),
    ),

    'lightbox' => array(
        'type' => 'radio-buttons',
        'heading' => __('لایتباکس'),
        'default' => '',
        'options' => array(
            ''  => array( 'title' => 'خاموش'),
            'true'  => array( 'title' => 'روشن'),
        ),
    ),

    'lightbox_image_size' => array(
	    'type'       => 'select',
	    'heading'    => __( 'اندازه تصویر لایتباکس' ),
	    'conditions' => 'lightbox == "true"',
	    'default'    => 'original',
	    'options'    => flatsome_ux_builder_image_sizes(),
    ),

    'ids' => array(
        'type' => 'select',
        'heading' => 'آیدی',
        'config' => array(
            'multiple' => true,
            'placeholder' => 'انتخاب کنید..',
            'postSelect' => array(
                'post_type' => array( 'featured_item' )
            ),
        )
    ),

    'cat' => array(
        'type' => 'select',
        'heading' => 'دسته بندی',
        'conditions' => 'ids == ""',
        'config' => array(
            'placeholder' => 'انتخاب کنید..',
            'termSelect' => array(
                'post_type' => 'featured_item',
                'taxonomies' => 'featured_item_category'
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
        'conditions' => 'ids == ""',
        'options' => array(
		'title' => 'عنوان',
            'name' => 'نام',
            'date' => 'تاریخ',
            'menu_order' => 'ترتیب فهرست',
        )
    ),
    'order' => array(
        'type' => 'select',
        'heading' => __( 'ترتیب' ),
        'conditions' => 'ids == ""',
        'default' => 'desc',
        'options' => array(
          'desc' => 'نرولی',
          'asc' => 'صعودی',
        )
    ),
  ),
),
'layout_options' => require( __DIR__ . '/commons/repeater-options.php' ),
'layout_options_slider' => require( __DIR__ . '/commons/repeater-slider.php' ),
);
$box_styles = require( __DIR__ . '/commons/box-styles.php' );

$options = array_merge($options, $box_styles);

$advanced = array('advanced_options' => require( __DIR__ . '/commons/advanced.php'));
$options = array_merge($options, $advanced);

add_ux_builder_shortcode( 'ux_portfolio', array(
   'name' => __( 'Portfolio' ),
   'category' => __( 'Content' ),
   'wrap' => true,
   'thumbnail' =>  flatsome_ux_builder_thumbnail( 'portfolio' ),
    'scripts' => array(
        'flatsome-masonry-js' => get_template_directory_uri() .'/assets/libs/packery.pkgd.min.js',
        'flatsome-isotope-js' => get_template_directory_uri() .'/assets/libs/isotope.pkgd.min.js',
    ),
   'presets' => array(
        array(
            'name' => __( 'نرمال' ),
            'content' => '[ux_portfolio]'
        ),
        array(
            'name' => __( 'لایتباکس نرمال' ),
            'content' => '[ux_portfolio lightbox="true"]'
        ),
        array(
            'name' => __( 'فیلترینگ ساده' ),
            'content' => '[ux_portfolio style="overlay" filter="true" orderby="name" type="masonry" grid="3" image_hover="overlay-add-50" image_hover_alt="zoom" text_pos="middle" text_size="large" text_hover="slide"]'
        ),array(
            'name' => __( 'فیلتر ناو خطی' ),
            'content' => '[ux_portfolio style="overlay" filter="true" filter_nav="outline" orderby="name" type="masonry" grid="3" image_hover="overlay-add-50" image_hover_alt="blur" text_pos="middle"]'
        ),array(
            'name' => __( 'اسلایدر ساده' ),
            'content' => '[ux_portfolio style="shade" filter_nav="outline" orderby="name" grid="3" columns="5" image_hover="zoom" image_hover_alt="grayscale"]'
        ),
        array(
            'name' => __( 'استایل گرید' ),
            'content' => '[ux_portfolio style="overlay" filter="true" filter_nav="outline" number="4" orderby="name" type="grid" grid="3" image_hover="overlay-add-50" image_hover_alt="zoom" text_align="left" text_size="large" text_hover="bounce"]'
        ),
        array(
            'name' => __( 'استایل گرید 2' ),
            'content' => '[ux_portfolio style="overlay" filter="true" filter_nav="outline" number="4" orderby="name" type="grid" grid="3" width="full-width" col_spacing="collapse" image_hover="overlay-add-50" image_hover_alt="zoom" text_align="left" text_size="large" text_hover="bounce"]'
        )
    ),
    'options' => $options
) );
