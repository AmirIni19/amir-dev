<?php

add_ux_builder_shortcode( 'team_member', array(
    'name' => __( 'اعضای تیم' ),
    'category' => __( 'Content' ),
    'type' => 'container',
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'team_member' ),

    'presets' => array(
        array(
            'name' => __( 'Default' ),
            'content' => '[team_member name="ایمان عربی نوده" title="مدیر ایران فلتسام" image_height="100%" image_width="80" image_radius="100"] متن ساختگی... [/team_member]'
        ),
    ),

    'options' => array_merge_recursive( array(
        'layout_options' => array(
            'type' => 'group',
            'heading' => __( 'طرح' ),
            'options' => array(
                'img' => array(
                    'type' => 'image',
                    'heading' => 'تصویر',
                    'group' => 'background',
                    'param_name' => 'img',
                ),
                'style' => array(
                    'type' => 'select',
                    'heading' => __( 'حالت' ),
                    'default' => 'normal',
                    'options' => require( __DIR__ . '/values/box-layouts.php' )
                ),

                'name' => array( 'type' => 'textfield','heading' => 'نام', 'default' => '', 'on_change' => array( 'selector' => '.person-name', 'content' => '{{ value }}')),
                'title' => array( 'type' => 'textfield','heading' => 'عنوان', 'default' => '',  'on_change' => array( 'selector' => '.person-title', 'content' => '{{ value }}')),
                'depth' => array(
                    'type' => 'slider',
                    'heading' => __( 'عمق' ),
                    'default' => '0',
                    'max' => '5',
                    'min' => '0',
                ),
                'depth_hover' => array(
                    'type' => 'slider',
                    'heading' => __( 'عمق هاور' ),
                    'default' => '0',
                    'max' => '5',
                    'min' => '0',
                ),
            ),
        ),
        'social_icons' => array(
            'type' => 'group',
            'heading' => __( 'آیکون شبکه های اجتماعی' ),
            'options' => array(
               'icon_style' => array(
                    'type' => 'radio-buttons',
                    'heading' => __( 'Style' ),
                    'default' => 'outline',
                    'options' => array(
                        'outline' => array( 'title' => 'خط خارجی' ),
                        'fill' => array( 'title' => 'پر' ),
                        'small' => array( 'title' => 'کوچک' ),
                    ),
                ),
                'facebook' => array( 'type' => 'textfield','heading' => 'Facebook', 'default' => ''),
                'instagram' => array( 'type' => 'textfield','heading' => 'Instagram', 'default' => ''),
                'tiktok' => array( 'type' => 'textfield','heading' => 'TikTok', 'default' => ''),
                'snapchat' => array( 'type' => 'image', 'heading' => __( 'SnapChat' )),
				'x' => array( 'type' => 'textfield','heading' => 'X', 'default' => ''),
				'twitter' => array( 'type' => 'textfield','heading' => 'Twitter', 'default' => ''),
                'email' => array( 'type' => 'textfield','heading' => 'Email', 'default' => ''),
				'threads' => array( 'type' => 'textfield','heading' => 'Threads', 'default' => ''),
                'phone' => array( 'type' => 'textfield','heading' => 'Phone', 'default' => ''),
                'pinterest' => array( 'type' => 'textfield','heading' => 'Pinterest', 'default' => ''),
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
        'link_group' => require( __DIR__ . '/commons/links.php' ),
    ),
    require( __DIR__ . '/commons/box-styles.php' ) ),
) );

// ux_builder_parse_args
