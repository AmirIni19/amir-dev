<?php
return array(
'type' => 'group',
'heading' => __( 'اسلایدر' ),
'conditions' => 'type === "slider" || type === "slider-full"',
'options' => array(
'slider_nav_style' => array(
    'type' => 'select',
    'heading' => "استایل ناوبری",
    'default' => 'reveal',
    'options' => require( __DIR__ . '/../values/slider-nav-styles.php' )
),
'slider_nav_color' => array(
    'type' => 'select',
    'heading' => "رنگ ناوبری",
    'default' => '',
    'options' => array(
        'light' => 'روشن',
        '' => 'تیره',
    )
),
'slider_nav_position' => array(
    'type' => 'select',
    'heading' => "مکان ناوبری",
    'conditions' => 'slider_nav_style !== "reveal"',
    'default' => 'inside',
    'options' => array(
        'inside' => 'داخل',
        'outside' => 'خارج',
    )
),
'slider_bullets' => array(
    'type' => 'select',
    'heading' => "گلوله ها",
    'default' => '',
    'options' => array(
        '' => 'غیرفعال',
        'true' => 'فعال',
    )
),
'auto_slide' => array(
    'type' => 'select',
    'heading' => 'اسلاید خودکار',
    'default' => '',
    'options' => array(
        '' => 'غیرفعال',
        '2000' => '2 sec.',
        '3000' => '3 sec.',
        '4000' => '4 sec.',
        '5000' => '5 sec.',
        '6000' => '6 sec.',
        '7000' => '7 sec.',
    )
),
'infinitive'          => array(
	'type'    => 'select',
	'heading' => "بی نهایت",
	'default' => '',
	'options' => array(
		'false' => 'غیرفعال',
		''      => 'فعال',
	),
),
)
);
