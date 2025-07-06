<?php
/**
 * Adds Pages Panel and options to the Customizer for Flatsome.
 *
 * @package Flatsome
 */

Flatsome_Option::add_section( 'pages', array(
	'title'       => __( 'صفحات', 'flatsome-admin' ),
	'description' => __( 'Change the default page layout for all pages. You can also override some of these options per page in the page editor.', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'الگوی صفحه',
	'label'    => __( 'پیش فرض - الگوی صفحه', 'flatsome-admin' ),
	'section'  => 'pages',
	'default'  => 'default',
	'choices'  => array(
		'default'                           => __( 'کانتینر (پیشفرض)', 'flatsome-admin' ),
		'blank-title-center'                => __( 'کانتینر - عنوان وسط', 'flatsome-admin' ),
		'blank'                             => __( 'تمام عرض', 'flatsome-admin' ),
		'header-on-scroll'                  => __( 'تمام عرض - هدر با اسکرول', 'flatsome-admin' ),
		'blank-featured'                    => __( 'تمام عرض - عنوان پارالکس', 'flatsome-admin' ),
		'transparent-header'                => __( 'تمام عرض - هدر شفاف', 'flatsome-admin' ),
		'transparent-header-light'          => __( 'تمام عرض - هدر شفاف، متن روشن', 'flatsome-admin' ),
		'left-sidebar'                      => __( 'سایدبار راست', 'flatsome-admin' ),
		'blank-landingpage'                 => __( 'بدون فوتر / بدون سربرگ', 'flatsome-admin' ),
		'right-sidebar'                     => __( 'سایدبار چپ', 'flatsome-admin' ),
		'single-page-nav'                   => __( 'ناوبری صفحه تکی', 'flatsome-admin' ),
		'single-page-nav-transparent'       => __( 'ناوبری صفحه تکی - هدر شفاف', 'flatsome-admin' ),
		'single-page-nav-transparent-light' => __( 'ناوبری صفحه تکی - هدر شفاف - متن روشن', 'flatsome-admin' ),
		'blank-sub-nav-vertical'            => __( 'ناوبری عمودی', 'flatsome-admin' ),
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'default_title',
	'label'    => __( 'عنوان صفحه H1 را روی ظرف (پیش فرض) ، الگوهای نوار کناری سمت چپ و الگوهای نوار کناری سمت راست نشان دهید.', 'flatsome-admin' ),
	'section'  => 'pages',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'page_top_excerpt',
	'label'    => __( 'اضافه کردن خلاصه به بالای صفحات', 'flatsome-admin' ),
	'section'  => 'pages',
	'default'  => 1,
));
