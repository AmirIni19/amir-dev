<?php

add_ux_builder_shortcode( 'page_header', array(
  'name' => __( 'سربرگ صفحه' ),
  'category' => __( 'Layout' ),
  'wrap' => false,
  'thumbnail' =>  flatsome_ux_builder_thumbnail( 'page_title' ),
  'allow' => array(),
  'presets' => array(),
  'options' => array(
  	 'layout_options' => array(
      'type' => 'group',
      'heading' => __( 'Layout' ),
      'options' => array(
      	'height' => array(
          'type' => 'scrubfield',
          'responsive' => true,
          'heading' => __('Height'),
          'default' => '',
          'placeholder' => __('Default'),
          'min' => 0,
          'step' => 1,
           'on_change' => array(
              'recompile' => false,
              'selector' => '.page-title-inner',
              'style' => 'min-height: {{ value }}'
          )
        ),

        'margin' => array(
          'type' => 'scrubfield',
          'responsive' => true,
          'heading' => __('فاصله'),
          'min' => 0,
          'step' => 1,
           'on_change' => array(
            'recompile' => false,
            'style' => 'margin-bottom: {{ value }}'
          )
        ),

        'style' => array(
            'type' => 'select',
            'heading' => 'استایل محتوا',
            'full_width' => true,
            'default' => 'featured',
            'options' => array(
            	'featured' => 'ویژه',
            	'normal' => 'فلت',
                'simple' => 'ساده',
                'divided' => 'جدا',
            )
        ),

        'type' => array(
            'type' => 'select',
            'heading' => 'نوع محتوا',
            'full_width' => true,
            'default' => 'breadcrumbs',
            'options' => array(
            	'breadcrumbs' => 'ریزآدرس ها',
                'subnav' => 'ناوبری',
                'onpage' => 'اسکرول به ناوبری',
                'share' => 'دکمه های اشتراک گذاری'
            )
        ),

        'text_color' => array(
          'type' => 'radio-buttons',
          'heading' => __('رنگ متن'),
          'default' => 'light',
          'options' => array(
            'light'  => array( 'title' => 'روشن'),
            'dark'  => array( 'title' => 'تیره'),
          ),
        ),

        'align' => array(
            'type' => 'radio-buttons',
            'heading' => 'تراز',
            'full_width' => true,
            'default' => 'left',
            'options' => array(
            	'left' => array( 'title' => 'چپ'),
              'center' => array( 'title' => 'وسط'),
              'right' => array( 'title' => 'راست'),
            ),
        ),

        'v_align' => array(
            'type' => 'radio-buttons',
            'heading' => 'تراز عمودی',
            'full_width' => true,
            'default' => 'center',
            'options' => array(
                'top' => array( 'title' => 'بالا'),
                'center' => array( 'title' => 'میانه'),
                'bottom' => array( 'title' => 'پایین'),
            )
        ),

        'depth' => array(
            'type' => 'slider',
            'vertical' => true,
            'heading' => 'عمق',
            'default' => 0,
            'max' => 5,
            'min' => 0,
        ),

        'parallax_text' => array(
            'type' => 'slider',
            'heading' => 'پارالکس محتوا',
            'unit' => '+',
            'default' => 0,
            'max' => 10,
            'min' => 0,
        ),
      )
    ),
  	'title_options' => array(
  	   'type' => 'group',
       'heading' => __( 'عنوان' ),
       'options' => array(

          'show_title' => array(
            'type' => 'checkbox',
            'heading' => 'نمایش عنوان',
            'default' => 'true'
          ),

       	 'title' => array(
            'conditions' => 'show_title',
            'type' => 'textfield',
            'heading' => 'عنوان',
            'placeholder' => __( 'Page title' ),
            'default' => '',
       	 ),

       	 'title_size' => array(
            'conditions' => 'show_title',
            'type' => 'select',
            'heading' => 'سایز',
            'options' => require( __DIR__ . '/values/sizes.php' ),
         ),

       	 'title_case' => array(
            'conditions' => 'show_title',
  	        'type' => 'radio-buttons',
  	        'heading' => 'نوع نوشته',
  	        'default' => 'normal',
  	        'options' => array(
              'normal' => array( 'title' => 'Abc' ),
	            'uppercase' => array( 'title' => 'ABC'),
  	        ),
        ),

       	 'sub_title' => array(
            'conditions' => 'show_title',
            'type' => 'textfield',
            'heading' => 'زیرعنوان',
            'default' => '',
       	 ),
       ),
  	),
  	'nav_options' => array(
      'type' => 'group',
      'heading' => __( 'استایل ناوبری' ),
      'options' => array(
      	'nav_style' => array(
            'type' => 'select',
            'heading' => 'استایل',
            'default' => 'line',
            'options' => require( __DIR__ . '/values/nav-styles.php' ),
         ),
      	'nav_size' => array(
            'type' => 'select',
            'heading' => 'اندازه',
            'options' => require( __DIR__ . '/values/sizes.php' ),
         ),
      	 'nav_case' => array(
	        'type' => 'radio-buttons',
	        'heading' => 'نوع نوشته',
	        'default' => 'uppercase',
	        'options' => array(
	            'uppercase' => array( 'title' => 'ABC'),
	            'lowercase' => array( 'title' => 'Abc' ),
	        ),
        ),
       )
    ),
  	'background_options' => array(
      'type' => 'group',
     'heading' => __( 'پس زمینه' ),
      'options' => array(
        'bg' => array(
          'type' => 'image',
          'heading' => __( 'تصویر' ),
          'thumb_size' => 'bg_size',
          'bg_position' => 'bg_pos',
        ),
        'bg_size'=> array(
          'type' => 'select',
          'heading' => 'اندازه',
          'default' => 'large',
          'options' => flatsome_ux_builder_image_sizes()
        ),
        'bg_color' => array(
          'type' => 'colorpicker',
          'heading' => __('رنگ'),
          'format' => 'rgb',
          'position' => 'bottom right',
          'helpers' => require( __DIR__ . '/helpers/colors.php' ),
        ),
        'bg_overlay' => array(
          'type' => 'colorpicker',
          'heading' => __('پوشش'),
          'responsive' => true,
          'alpha' => true,
          'format' => 'rgb',
          'position' => 'bottom right',
          'helpers' => require( __DIR__ . '/helpers/colors-overlay.php' ),
        ),
        'bg_pos' => array(
          'type' => 'textfield',
          'heading' => __('موقعیت'),
           'on_change' => array(
	            'selector' => '.title-bg',
	            'style' => 'background-position: {{ value }}'
          )
        ),
        'parallax' => array(
            'type' => 'slider',
            'heading' => 'پارالکس',
            'unit' => '+',
            'default' => 0,
            'max' => 10,
            'min' => 0,
        ),
    ), // end bgs
  ),
  'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
 ),
) );
