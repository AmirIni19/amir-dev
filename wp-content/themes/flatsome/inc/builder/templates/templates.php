<?php

ux_builder_add_template( 'flatsome_home_big-sale', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'فروش بزرگ',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'big-sale' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/big-sale.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_classic-shop', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'فروشگاه کلاسیک',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'classic-shop' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/classic-shop.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_cute-shop', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'فروشگاه زیبا بچگانه',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'cute-shop' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/cute-shop.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_fullscreen-fashion', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'مد تمام عرض',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'fullscreen-fashion' ),
  'template' => 'page-transparent-header-light.php',
  'content' => file_get_contents( __DIR__ . '/content/fullscreen-fashion.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_grid-style-1', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'استایل گرید 1',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'grid-style-1' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/grid-style-1.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_grid-style-2', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'استایل گرید 2',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'grid-style-2' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/grid-style-2.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_grid-style-3', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'استایل گرید 3',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'grid-style-3' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/grid-style-3.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_mega-shop', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'مگا شاپ',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'mega-shop' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/mega-shop.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_parallax-shop', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'فروشگاه پارالکس',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'parallax-shop' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/parallax-shop.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_sale-countdown', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'شمارنده معکوس فروش',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'sale-countdown' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/sale-countdown.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_simple-slider', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'اسلایدر ساده',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'simple-slider' ),
  'template' => 'default',
  'content' => file_get_contents( __DIR__ . '/content/simple-slider.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_slider-cover', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'اسلایدر کاور',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'slider-cover' ),
  'template' => 'page-transparent-header-light.php',
  'content' => file_get_contents( __DIR__ . '/content/slider-cover.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_sport-shop', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'فروشگاه ورزشی',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'sport-shop' ),
  'template' => 'page-transparent-header-light.php',
  'content' => file_get_contents( __DIR__ . '/content/sport-shop.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_vendor-shop', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'چندفروشندگی',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'vendor-shop' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/vendor-shop.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_video-cover', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'کاور ویدئو',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'video-cover' ),
  'template' => 'page-transparent-header-light.php',
  'content' => file_get_contents( __DIR__ . '/content/video-cover.txt' ),
) );


ux_builder_add_template( 'flatsome_home_agency', array(
'post_types' => array( 'page' ),
'category' => __( 'Shop', 'flatsome' ),
'name' => 'شرکت',
'thumbnail' => flatsome_ux_builder_template_thumb( 'agency' ),
'template' => 'page-transparent-header-light.php',
'content' => file_get_contents( __DIR__ . '/content/agency.txt' ),
) );

  
ux_builder_add_template( 'flatsome_home_simple-corporate', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'شرکتی',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'simple-corporate' ),
  'template' => 'page-blank.php',
  'content' => file_get_contents( __DIR__ . '/content/simple-corporate.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_explore', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'کاوش',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'explore' ),
  'template' => 'page-transparent-header.php',
  'content' => file_get_contents( __DIR__ . '/content/explore.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_freelancer', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'فریلنسر',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'freelancer' ),
  'template' => 'page-transparent-header-light.php',
  'content' => file_get_contents( __DIR__ . '/content/freelancer.txt' ),
) );
  
ux_builder_add_template( 'flatsome_home_flatsomeeir', array(
  'post_types' => array( 'page' ),
  'category' => __( 'Shop', 'flatsome' ),
  'name' => 'ایران فلتسام',
  'thumbnail' => flatsome_ux_builder_template_thumb( 'flatsomeeir' ),
) );