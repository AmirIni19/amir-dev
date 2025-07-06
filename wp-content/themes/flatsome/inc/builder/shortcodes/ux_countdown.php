<?php

// Add to builder
add_ux_builder_shortcode( 'ux_countdown', array(
    'name' => __( 'شمارشگر' ),
    'category' => __( 'Content' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'countdown' ),
    'allow_in' => array('text_box'),
    'scripts' => array(
        'flatsome-countdown-script' => get_template_directory_uri() . '/inc/shortcodes/ux_countdown/countdown-script-min.js',
        'flatsome-countdown-theme-js' => get_template_directory_uri() . '/inc/shortcodes/ux_countdown/ux-countdown.js'
    ),
    'styles' => array(
        'flatsome-countdown-style' => get_template_directory_uri() . '/inc/shortcodes/ux_countdown/ux-countdown.css',
    ),
    'options' => array(
        'style' => array(
            "type" => "select",
            "heading" => __('استایل'),
            "default" => 'clock',
            "options" => array(
              'clock' => 'Clock',
              'text' => 'Text',
            )
        ),
	   'size' => array(
            'type' => 'slider',
            'heading' => __('سایز'),
            'responsive' => true,
            'default' => '300',
            'unit' => '%',
            'responsive' => true,
            'max' => '400',
            'min' => '0',
            'on_change' => array(
                'selector' => '.ux-timer, .ux-timer-text',
                'style' => 'font-size: {{ value }}%'
            ),
        ),
        'color' => array(
                'type' => 'radio-buttons',
                'heading' => __( 'رنگ' ),
                'default' => 'dark',
                'options' => array(
                    'dark' => array( 'title' => 'روشن' ),
                    'light' => array( 'title' => 'تیره' ),
                ),
        ),
        'bg_color' => array(
          'type' => 'colorpicker',
          'heading' => __('پس زمینه'),
          'responsive' => true,
          'default' => '',
          'alpha' => true,
          'format' => 'rgb',
          'position' => 'پایین راست',
          'helpers' => require( __DIR__ . '/helpers/colors.php' ),
        ),
        'year' => array(
            "type" => "textfield",
            "heading" => "سال",
            "default" => "2016"
        ),
        'month' => array(
            "type" => "textfield",
            "heading" => "ماه",
            "default" => "12"
        ),
        'day' => array(
            "type" => "textfield",
            "heading" => "روز",
            "default" => "31"
        ),
        'time' => array(
            "type" => "textfield",
            "heading" => "ساعت",
            "default" => "18:00"
        ),
        'translations' => array(
            'type' => 'group',
            'heading' => 'متن ها',
            'options' => array(
                't_week' => array( "type" => "textfield", "heading" => "هفته", "default" => "هفته"),
                't_day' => array( "type" => "textfield", "heading" => "روز", "default" => "روز"),
                't_hour' => array( "type" => "textfield", "heading" => "ساعت", "default" => "ساعت"),
                't_min' => array( "type" => "textfield", "heading" => "دقیقه", "default" => "دقیقه"),
                't_sec' => array( "type" => "textfield", "heading" => "ثانیه", "default" => "ثانیه"),
            )
        ),
        'translations_p' => array(
            'type' => 'group',
            'heading' => 'متن جمع',
            'options' => array(
                't_plural' => array( "type" => "textfield", "heading" => "پیش فرض جمع", "default" => ""),
                't_week_p' => array( "type" => "textfield", "heading" => "هقته"),
                't_day_p' => array( "type" => "textfield", "heading" => "روز"),
                't_hour_p' => array( "type" => "textfield", "heading" => "ساعت"),
                't_min_p' => array( "type" => "textfield", "heading" => "دقیقه"),
                't_sec_p' => array( "type" => "textfield", "heading" => "ثانیه"),
            )
        )
     )
) );
