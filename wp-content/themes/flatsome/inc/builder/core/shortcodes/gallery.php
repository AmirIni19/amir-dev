<?php

$size_names = apply_filters( 'image_size_names_choose', array(
	'thumbnail' => __( 'بندانگشتی' ),
	'medium' => __( 'متوسط' ),
	'large' => __( 'بزرگ' ),
	'full' => __( 'اندازه کامل' ),
) );

add_ux_builder_shortcode( 'gallery', array(
    'name' => __( 'گالری وردپرس','ux-builder'),
    'image' => '',
    'category' => __( 'Content' ),
    'presets' => array(
        array(
            'name' => __( 'Default' ),
            'content' => '[gallery]'
        ),
    ),

    'options' => array(
      /*'id' => array(
        'type' => 'select',
        'heading' => __( 'پست' ),
        'descrition' => __( 'The gallery will display images which are attached to that post.' ),
        'config' => array(
          'placeholder' => __( 'انتخاب کنید..' ),
          'postSelect' => array(),
        )
      ), */
      'ids' => array(
        'type' => 'gallery',
        'heading' => __( 'تصاویر' ),
      ),
      'orderby' => array(
        'type' => 'select',
        'heading' => __( 'ترتیب بر اساس' ),
        'default' => 'menu_order',
        'options' => array(
          'menu_order' => __( 'سفارشی' ),
          'title' => __( 'عنوان تصویر' ),
          'ID' => __( 'آیدی تصویر' ),
          'post_date' => __( 'تارخ' ),
          'rand' => __( 'رندوم' ),
        ),
      ),
      'order' => array(
        'type' => 'select',
        'heading' => __( 'ترتیب مرتب سازی' ),
        'default' => 'ASC',
        'options' => array(
          'ASC' => __( 'صعودی' ),
          'DESC' => __( 'نزولی' ),
        ),
      ),
      'columns' => array(
        'type' => 'select',
        'heading' => __( 'ستون ها' ),
        'default' => '3',
        'options' => array(
          '1' => __( '1' ),
          '2' => __( '2' ),
          '3' => __( '3' ),
          '4' => __( '4' ),
          '5' => __( '5' ),
          '6' => __( '6' ),
          '7' => __( '7' ),
          '8' => __( '8' ),
         ),
      ),
      'size' => array(
        'type' => 'select',
        'heading' => __( 'اندازه تصویر' ),
        'default' => 'thumbnail',
        'options' => $size_names,
      ),
      'link' => array(
        'type' => 'select',
        'heading' => __( 'پیوند به' ),
        'default' => 'post',
        'options' => array(
          'post' => __( 'صفحه پیوست' ),
          'file' => __( 'پرونده رسانه' ),
          'none' => __( 'هیچ کدام' ),
        ),
      ),
      'itemtag' => array(
        'type' => 'textfield',
        'heading' => __( 'برچسب مورد' ),
        'placeholder' => 'dl',
      ),
      'icontag' => array(
        'type' => 'textfield',
        'heading' => __( 'برچسب آیکون' ),
        'placeholder' => 'dt',
      ),
      'captiontag' => array(
        'type' => 'textfield',
        'heading' => __( 'برچسب کپشن' ),
        'placeholder' => 'dd',
      ),
      'include' => array(
        'type' => 'textfield',
        'heading' => __( 'شامل شناسه های' ),
      ),
      'exclude' => array(
        'type' => 'textfield',
        'heading' => __( 'عدم شامل شدن شناسه' ),
      ),
    ),
) );
