<?php

add_ux_builder_shortcode( 'follow', array(
    'name' => __( 'آیکون های فالو' ),
    'category' => __( 'Content' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'share' ),
    'options' => array(
        'title' => array(
            'type' => 'textfield',
            'heading' => 'عنوان',
            'default' => '',
        ),

        'style' => array(
            'type' => 'radio-buttons',
            'heading' => __( 'استایل' ),
            'default' => 'outline',
            'options' => array(
                'outline' => array( 'title' => 'خطی' ),
                'fill' => array( 'title' => 'پر' ),
                'small' => array( 'title' => 'کوچک' ),
            ),
        ),
        'align' => array(
            'type' => 'radio-buttons',
            'heading' => __( 'تراز' ),
            'default' => '',
            'options' => array(
                '' => array( 'title' => 'داخل' ),
                'left'   => array( 'title' => 'چپ',   'icon' => 'dashicons-editor-alignleft'),
                'center' => array( 'title' => 'مرکز', 'icon' => 'dashicons-editor-aligncenter'),
                'right'  => array( 'title' => 'راست',  'icon' => 'dashicons-editor-alignright'),
            ),
        ),
        'scale' => array(
            'type' => 'slider',
            'heading' => 'Scale',
            'default' => '100',
            'unit' => '%',
            'max' => '300',
            'min' => '50',
        ),
        'social_icons' => array(
	        'type' => 'group',
	        'heading' => 'شبکه های اجتماعی',
	        'options' => array(
		        'facebook' => array( 'type' => 'textfield','heading' => 'Facebook', 'default' => ''),
		        'instagram' => array( 'type' => 'textfield','heading' => 'Instagram', 'default' => ''),
		        'tiktok' => array( 'type' => 'textfield','heading' => 'TikTok', 'default' => ''),
		        'snapchat' => array( 'type' => 'image', 'heading' => __( 'SnapChat' )),
		        'x' => array( 'type' => 'textfield','heading' => 'X', 'default' => ''),
		        'twitter' => array( 'type' => 'textfield','heading' => 'Twitter', 'default' => ''),
		        'threads' => array( 'type' => 'textfield','heading' => 'Threads', 'default' => ''),
		        'email' => array( 'type' => 'textfield','heading' => 'Email', 'default' => ''),
		        'phone' => array( 'type' => 'textfield','heading' => 'Phone', 'default' => ''),
		        'pinterest' => array( 'type' => 'textfield','heading' => 'Pinterest', 'default' => ''),
		        'rss' => array( 'type' => 'textfield','heading' => 'RSS', 'default' => ''),
		        'linkedin' => array( 'type' => 'textfield','heading' => 'Linkedin', 'default' => ''),
		        'youtube' => array( 'type' => 'textfield','heading' => 'Youtube', 'default' => ''),
		        'flickr' => array( 'type' => 'textfield','heading' => 'Flickr', 'default' => ''),
		        'px500' => array( 'type' => 'textfield','heading' => '500px', 'default' => ''),
		        'vkontakte' => array( 'type' => 'textfield','heading' => 'VKontakte', 'default' => ''),
		        'telegram' => array( 'type' => 'textfield','heading' => 'Telegram', 'default' => ''),
		        'twitch' => array( 'type' => 'textfield','heading' => 'Twitch', 'default' => ''),
		        'discord' => array( 'type' => 'textfield','heading' => 'Discord', 'default' => ''),
	        ),
        ),
        'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    ),
) );
