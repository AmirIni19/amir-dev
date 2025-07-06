<?php

// Set defaults
$repeater_columns = '4';
$repeater_type = 'slider';
$repeater_post_type = 'post';
$repeater_col_spacing = 'normal';

$repeater_post_cat = 'category';
$default_text_align = 'center';

$options =  array(
'style_options' => array(
    'type' => 'group',
    'heading' => __( 'استایل' ),
    'options' => array(
         'style' => array(
            'type' => 'select',
            'heading' => __( 'Style' ),
            'default' => '',
            'options' => require( __DIR__ . '/values/box-layouts.php' )
        )
    ),
),
'layout_options' => require( __DIR__ . '/commons/repeater-options.php' ),
'relay_options' => require( __DIR__ . '/commons/relay.php' ),
'layout_options_slider' => require( __DIR__ . '/commons/repeater-slider.php' ),
'post_options' => require( __DIR__ . '/commons/repeater-posts.php' ),
'post_title_options' => array(
    'type' => 'group',
    'heading' => __( 'Title' ),
        'options' => array(
            'title_size' => array(
                'type' => 'select',
                'heading' => 'اندازه عنوان',
                'default' => '',
                'options' => require( __DIR__ . '/values/sizes.php' )
            ),
            'title_style' => array(
                'type' => 'radio-buttons',
                'heading' => 'استایل عنوان',
                'default' => '',
                'options' => array(
                    ''   => array( 'title' => 'Abc'),
                    'uppercase' => array( 'title' => 'ABC'),
                )
        ),
    )
),
'read_more_button' => array(
    'type' => 'group',
    'heading' => __( 'مطالعه بیشتر' ),
        'options' => array(
            'readmore' => array(
                'type' => 'textfield',
                'heading' => 'متن',
                'default' => '',
            ),
            'readmore_color' => array(
            'type' => 'select',
            'heading' => 'رنگ',
            'conditions' => 'readmore',
            'default' => '',
            'options' => array(
                '' => 'Default',
                'primary' => 'اولیه',
                'secondary' => 'ثانویه',
                'alert' => 'هشدار',
                'success' => 'موفقیت',
                'white' => 'سفید',
            )
        ),
        'readmore_style' => array(
            'type' => 'select',
            'heading' => 'استایل',
            'conditions' => 'readmore',
            'default' => 'outline',
            'options' => array(
                '' => 'Default',
                'outline' => 'خطی',
                'link' => 'ساده',
                'underline' => 'خط زیر',
                'shade' => 'سایه',
                'bevel' => 'اریب',
                'gloss' => 'شیشه ای',
            )
        ),
        'readmore_size' => array(
            'type' => 'select',
            'conditions' => 'readmore',
            'heading' => 'سایز',
            'default' => '',
            'options' => require( __DIR__ . '/values/sizes.php' ),
        ),
    )
),


'post_meta_options' => array(
    'type' => 'group',
    'heading' => __( 'متا' ),
    'options' => array(

    'show_date' => array(
        'type' => 'select',
        'heading' => 'تاریخ',
        'default' => 'badge',
        'options' => array(
            'badge' => 'نشان',
            'text' => 'متن',
            'false' => 'مخفی',
        )
    ),
    'badge_style' => array(
        'type' => 'select',
        'heading' => 'حالت نشان',
        'default' => '',
        'conditions' => 'show_date == "badge"',
        'options' => array(
            '' => 'پیشفرض',
            'outline' => 'خطی',
            'square' => 'مربع',
            'circle' => 'دایره',
            'circle-inside' => 'دایره داخل',
        )
    ),
    'excerpt' => array(
        'type' => 'select',
        'heading' => 'خلاصه',
        'default' => 'visible',
        'options' => array(
            'visible' => 'نمایش',
            'fade' => 'نمایش در حالت هاور',
            'slide' => 'اسلاید در حالت هاور',
            'reveal' => 'ظاهرشدن در حالت هاور',
            'false' => 'مخفی',
        )
    ),
   'excerpt_length' => array(
        'type' => 'slider',
        'heading' => 'اندازه خلاصه',
        'default' => 15,
        'max' => 50,
        'min' => 5,
    ),
    'show_category' => array(
        'type' => 'select',
        'heading' => 'دسته بندی',
        'default' => 'false',
        'options' => array(
            'label' => 'لیبل',
            'text' => 'متن',
            'false' => 'مخفی',
        )
    ),
    'comments' => array(
        'type' => 'select',
        'heading' => 'تظرات',
        'default' => 'visible',
        'options' => array(
            'visible' => 'نمایش',
            'false' => 'مخفی',
        )
    ),
    ),
),
);


$box_styles = require( __DIR__ . '/commons/box-styles.php' );
$options = array_merge($options, $box_styles);


add_ux_builder_shortcode( 'blog_posts', array(
    'name' => __( 'پست های بلاگ' ),
    'category' => __( 'Content' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'blog_posts' ),
    'scripts' => array(
        'flatsome-masonry-js' => get_template_directory_uri() .'/assets/libs/packery.pkgd.min.js',
    ),

    'presets' => array(
        array(
            'name' => __( 'نرمال' ),
            'content' => '[blog_posts style="normal" columns="3" columns__md="1" image_height="56.25%"]'
        ),
        array(
            'name' => __( 'پرش' ),
            'content' => '[blog_posts style="bounce" badge_style="square" image_height="75%"]'
        ),
        array(
            'name' => __( 'پوش' ),
            'content' => '[blog_posts style="push" columns="3" columns__md="1" badge_style="circle-inside" image_height="75%"]'
        ),
        array(
            'name' => __( 'عمودی' ),
            'content' => '[blog_posts style="vertical" slider_nav_style="simple" slider_nav_position="outside" columns="2" columns__md="1" depth="2" image_height="89%" image_width="43"]'
        ),
        array(
            'name' => __( 'روکش' ),
            'content' => '[blog_posts style="overlay" depth="1" title_style="uppercase" show_date="text" image_height="144%" image_overlay="rgba(0, 0, 0, 0.17)" image_hover="zoom"]'
        ),
        array(
            'name' => __( 'روکش - خاکستری' ),
            'content' => '[blog_posts style="overlay" depth="1" animate="fadeInLeft" title_style="uppercase" show_date="text" image_height="144%" image_overlay="rgba(0, 0, 0, 0.56)" image_hover="color" image_hover_alt="overlay-remove-50"]'
       ),
        array(
            'name' => __( 'مانسوری' ),
            'content' => '[blog_posts type="masonry" columns="3" depth="2" image_height="180px"]'
       ),
       array(
            'name' => __( 'گرید' ),
            'content' => '[blog_posts style="shade" type="grid" columns="3" depth="1" posts="4" title_size="larger" title_style="uppercase" readmore="Read More" badge_style="circle-inside" image_height="180px"]'
       ),
       array(
            'name' => __( 'اسلایدر فول' ),
            'content' => '[blog_posts style="shade" type="slider-full" grid="2" slider_nav_style="circle" columns="1" title_size="larger" show_date="text" excerpt="false" show_category="label" comments="false" image_size="large" image_overlay="rgba(0, 0, 0, 0.09)" image_hover="overlay-remove" text_size="large" text_hover="bounce" text_padding="10% 0px 10% 0px"]'
        ),
),

    'options' => $options
) );
