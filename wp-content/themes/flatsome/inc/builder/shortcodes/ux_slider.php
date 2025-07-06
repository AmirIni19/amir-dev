<?php

add_ux_builder_shortcode( 'ux_slider', array(
    'type' => 'container',
    'name' => __( 'اسلایدر' ),
    'category' => __( 'Layout' ),
    'message' => __( 'اسلایدها را اینجا وارد کنید' ),
    'directives' => array( 'ux-slider' ),
    'allow' => array( 'ux_banner','ux_image','ux_lottie','section','row','ux_banner_grid','logo'),
    'template' => flatsome_ux_builder_template( 'ux_slider.html' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'slider' ),
    'tools' => 'shortcodes/ux_slider/ux-slider-tools.directive.html',
    'wrap'   => false,
    'info' => '{{ label }}',
    'priority' => -1,

    'toolbar' => array(
        'show_children_selector' => true,
        'show_on_child_active' => true,
    ),

    'children' => array(
        'inline' => true,
        'addable_spots' => array( 'left', 'right' )
    ),

    /*
    'presets' => array(
        array(
            'name' => __( 'پیش فرض' ),
            'content' => '[ux_slider]',
        ),
        array(
            'name' => __( 'بنر ساده' ),
            'content' => '[ux_slider][ux_banner][/ux_slider]',
        ),
    ), */

    'options' => array(
        'label' => array(
            'type' => 'textfield',
            'heading' => 'لیبل آدمین',
            'placeholder' => 'اینجا وارد کنید...'
        ),
        'type' => array(
          'type' => 'select',
          'heading' => 'نوع',
          'default' => 'slide',
          'options' => array(
            'slide' => 'اسلاید',
            'fade' => 'محو شدن',
          ),
        ),
        'layout_options' => array(
          'type' => 'group',
          'heading' => __( 'طرح' ),
          'options' => array(
            'style' => array(
              'type' => 'select',
              'heading' => 'استایل',
              'default' => 'نرمال',
              'options' => array(
                  'normal' => 'پیش فرض',
                  'container' => 'کانتینر',
                  'focus' => 'متمرکز',
                  'shadow' => 'سایه',
              ),
              'conditions' => 'type !== "fade"',
            ),
            'slide_width' => array(
              'type' => 'scrubfield',
              'responsive' => true,
              'heading' => 'عرض استلایدر',
              'placeholder' => 'Width in Px',
              'default' => '',
              'min' => '0',
              'conditions' => 'type !== "fade"',
            ),

            'slide_align' => array(
              'type' => 'select',
              'heading' => 'مکان اسلایدر',
              'default' => 'center',
              'options' => array(
                  'center' => 'مرکز',
                  'left' => 'چپ',
                  'right' => 'راست',
              ),
              'conditions' => 'type !== "fade"',
            ),
            'bg_color' => array(
              'type' => 'colorpicker',
              'heading' => __('رنگ پس زمینه'),
              'format' => 'rgb',
              'position' => 'bottom right',
              'helpers' => require( __DIR__ . '/helpers/colors.php' ),
            ),
            'margin' => array(
              'type' => 'scrubfield',
              'responsive' => true,
              'heading' => __('فاصله'),
              'default' => '0px',
              'min' => 0,
              'max' => 100,
              'step' => 1
            ),
            'infinitive' => array(
                'type' => 'radio-buttons',
                'heading' => __('بی نهایت'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'خاموش'),
                    'true'  => array( 'title' => 'روشن'),
                ),
            ),
            'freescroll' => array(
                'type' => 'radio-buttons',
                'heading' => __('اسکرول آزاد'),
                'default' => 'false',
                'options' => array(
                    'false'  => array( 'title' => 'خاموش'),
                    'true'  => array( 'title' => 'روشن'),
                ),
            ),
            'draggable' => array(
                'type' => 'radio-buttons',
                'heading' => __('امکان کشیدن'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'خاموش'),
                    'true'  => array( 'title' => 'روشن'),
                ),
            ),
            'parallax' => array(
                'type' => 'slider',
                'heading' => 'پارالکس',
                'unit' => '+',
                'default' => 0,
                'max' => 10,
                'min' => 0,
            ),
            'mobile' => array(
                'type' => 'radio-buttons',
                'heading' => __('نمایش برای موبایل'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'خاموش'),
                    'true'  => array( 'title' => 'روشن'),
                ),
            ),
          ),
        ),

        'nav_options' => array(
          'type' => 'group',
          'heading' => __( 'راهبری' ),
          'options' => array(
            'hide_nav' => array(
                'type' => 'radio-buttons',
                'heading' => __('همیشه دیده شود'),
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'خاموش'),
                    'true'  => array( 'title' => 'روشن'),
                ),
            ),
            'nav_pos' => array(
              'type' => 'select',
              'heading' => 'مکان',
              'default' => '',
              'options' => array(
                  '' => 'داخل',
                  'outside' => 'خارج',
              )
            ),
           'nav_size' => array(
              'type' => 'select',
              'heading' => 'سایز',
              'default' => 'large',
              'options' => array(
                  'large' => 'بزرگ',
                  'normal' => 'نرمال',
              )
            ),
            'arrows' => array(
              'type' => 'radio-buttons',
              'heading' => __('پیکان ها'),
              'default' => 'true',
              'options' => array(
                'false'  => array( 'title' => 'خاموش'),
                'true'  => array( 'title' => 'روشن'),
                ),
            ),
            'nav_style' => array(
              'type' => 'select',
              'heading' => __('استایل پیکان'),
              'default' => 'circle',
              'options' => array(
                  'circle' => 'دایره',
                  'simple' => 'ساده',
                  'reveal' => 'رویل',
              )
            ),
            'nav_color' => array(
                'type' => 'radio-buttons',
                'heading' => __('رنگ پیکان'),
                'default' => 'light',
                'options' => array(
                    'dark'  => array( 'title' => 'تیره'),
                    'light'  => array( 'title' => 'روشن'),
                ),
            ),

            'bullets' => array(
              'type' => 'radio-buttons',
              'heading' => __('گلوله ها'),
              'default' => 'true',
              'options' => array(
                  'false'  => array( 'title' => 'خاموش'),
                  'true'  => array( 'title' => 'روشن'),
              ),
            ),
            'bullet_style' => array(
              'type' => 'select',
              'heading' => 'استایل گلوله ها',
              'default' => 'circle',
              'options' => array(
                'circle' => 'دایره',
                'dashes' => 'خط تیره',
                'dashes-spaced' => 'خط تیره (فاصله)',
                'simple' => 'ساده',
                'square' => 'مربع',
            )
           ),
          ),
        ),
        'slide_options' => array(
          'type' => 'group',
          'heading' => __( 'اسلاید خودکار' ),
          'options' => array(
            'auto_slide' => array(
                'type' => 'radio-buttons',
                'heading' => __('اسلاید خودکار'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'خاموش'),
                    'true'  => array( 'title' => 'روشن'),
                ),
            ),
            'timer' => array(
                'type' => 'textfield',
                'heading' => 'تایمر (ms)',
                'default' => 6000,
            ),
            'pause_hover' => array(
                'type' => 'radio-buttons',
                'heading' => __('ایست در حالت هاور'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'خاموش'),
                    'true'  => array( 'title' => 'روشن'),
                ),
            ),
          ),
        ),
        'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    ),
) );
