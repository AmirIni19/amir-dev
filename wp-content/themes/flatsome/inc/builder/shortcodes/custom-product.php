<?php

$sizes = array(
	'xxsmall' => 'خیلی خیلی کوچک',
	'xsmall'  => 'خیلی کوچک',
	'smaller' => 'کوچک تر',
	'small'   => 'کوچک',
	''        => 'نرمال',
	'large'   => 'بزرگ',
	'larger'  => 'بزرگتر',
	'xlarge'  => 'خیلی بزرگتر',
	'xxlarge' => 'خیلی خیلی بزرگتر',
);

add_ux_builder_shortcode( 'ux_product_gallery', array(
	'name'      => __( 'گالری محصول' ),
	'category'  => __( 'Product Page' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_gallery' ),
	'overlay'   => true,
	'wrap'      => true,
	'priority'  => 9999,
	'options'   => array(
		'style' => array(
			'type'    => 'select',
			'heading' => 'Style',
			'default' => 'normal',
			'options' => array(
				'normal'     => __( 'نرمال', 'flatsome-admin' ),
				'vertical'   => __( 'عمودی', 'flatsome-admin' ),
				'full-width' => __( 'تمام عرض', 'flatsome-admin' ),
				'stacked'    => __( 'استک', 'flatsome-admin' ),
			),
		),
		'grid_layout' => array(
			'type'       => 'select',
			'heading'    => 'طرح گرید',
			'full_width' => true,
			'conditions' => 'style == "stacked"',
			'default'    => '',
			'options' => array(
				''      => __( '1 ستون', 'flatsome-admin' ),
				'2'     => __( '2 ستون', 'flatsome-admin' ),
				'1-2'   => __( 'شاخص - 2 ستون', 'flatsome-admin' ),
				'3-1-2' => __( '3 ستون - شاخص - 2 ستون', 'flatsome-admin' ),
			),
		),
		'slider_type' => array(
			'type'       => 'radio-buttons',
			'heading'    => 'نوع اسلاید',
			'full_width' => true,
			'conditions' => 'style == "normal" || style == "vertical" || style == "stacked"',
			'default'    => '',
			'options'    => array(
				''     => array( 'title' => esc_html__( 'اسلاید', 'flatsome-admin' ) ),
				'fade' => array( 'title' => esc_html__( 'محو شدن', 'flatsome-admin' ) ),
			),
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_title', array(
	'name'      => __( 'عنوان محصول' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_products' ),
	'category'  => __( 'Product Page' ),
	'options'   => array(
		'size'      => array(
			'type'    => 'select',
			'heading' => 'اندازه',
			'default' => '',
			'options' => $sizes,
		),
		'divider'   => array(
			'type'    => 'checkbox',
			'heading' => 'جدا کننده',
			'default' => 'true',
		),
		'uppercase' => array(
			'type'    => 'checkbox',
			'heading' => 'حروف بزرگ',
			'default' => 'false',
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_rating', array(
	'name'      => __( 'امتیاز محصولات' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_products' ),
	'wrap'      => false,
	'category'  => __( 'Product Page' ),
	'options'   => array(
		'count'      => array(
			'type'    => 'checkbox',
			'heading' => 'تعداد نظرات',
			'default' => 'false',
		),
		'style'      => array(
			'type'    => 'select',
			'heading' => 'استایل تعداد نظرات',
			'default' => 'inline',
			'options' => array(
				'tooltip' => __( 'تولتیپ', 'flatsome-admin' ),
				'stacked' => __( 'انباشته', 'flatsome-admin' ),
				'inline'  => __( 'درون خطی', 'flatsome-admin' ),
			),
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_price', array(
	'name'      => __( 'قیمت محصول' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_price' ),
	'wrap'      => false,
	'category'  => __( 'Product Page' ),
	'options'   => array(
		'size' => array(
			'type'    => 'select',
			'heading' => 'اندازه',
			'default' => '',
			'options' => $sizes,
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_excerpt', array(
	'name'      => __( 'توضیحات کوتاه محصول' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_short_desc' ),
	'wrap'      => false,
	'category'  => __( 'Product Page' ),
) );

add_ux_builder_shortcode( 'ux_product_add_to_cart', array(
	'name'      => __( 'دکمه اضافه کردن به سبد خرید' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_add_to_cart' ),
	'category'  => __( 'Product Page' ),
	'options'   => array(
		'style' => array(
			'type'    => 'select',
			'heading' => 'استایل فرم',
			'default' => 'normal',
			'options' => array(
				'normal' => __( 'نرمال', 'flatsome-admin' ),
				'flat'   => __( 'فلت', 'flatsome-admin' ),
				'minimal'   => __( 'مینیمال', 'flatsome-admin' ),
			),
		),
		'size'  => array(
			'type'    => 'select',
			'heading' => 'Size',
			'default' => '',
			'options' => $sizes,
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_meta', array(
	'name'      => __( 'متا محصول' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_meta' ),
	'category'  => __( 'Product Page' ),
) );

add_ux_builder_shortcode( 'ux_product_upsell', array(
	'name'      => __( 'فروش محصولات' ),
	'category'  => __( 'Product Page' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_upsells' ),
	'options'   => array(
		'style' => array(
			'type'    => 'select',
			'heading' => 'استایل',
			'default' => 'sidebar',
			'options' => array(
				'sidebar' => __( 'List', 'flatsome-admin' ),
				'grid'    => __( 'Grid', 'flatsome-admin' ),
			),
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_tabs', array(
	'name'      => __( 'تب های محصول' ),
	'category'  => __( 'Product Page' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_tabs' ),
	'options'   => array(
		'style' => array(
			'type'    => 'select',
			'heading' => 'استایل',
			'default' => 'tabs',
			'options' => array(
				'tabs'          => __( 'Line Tabs', 'flatsome-admin' ),
				'tabs_normal'         => __( 'Tabs Normal', 'flatsome-admin' ),
				'line-grow'           => __( 'Line Tabs - Grow', 'flatsome-admin' ),
				'tabs_vertical'       => __( 'Tabs vertical', 'flatsome-admin' ),
				'tabs_pills'          => __( 'Pills', 'flatsome-admin' ),
				'tabs_outline'        => __( 'Outline', 'flatsome-admin' ),
				'sections'            => __( 'Sections', 'flatsome-admin' ),
				'accordian'           => __( 'Accordion', 'flatsome-admin' ),
				'accordian-collapsed' => __( 'Accordion - Collapsed', 'flatsome-admin' ),
			),
		),
		'align' => array(
			'type'    => 'select',
			'heading' => 'تراز',
			'default' => 'left',
			'options' => array(
				'left'   => __( 'چپ', 'flatsome-admin' ),
				'center' => __( 'میانه', 'flatsome-admin' ),
				'right'  => __( 'راست', 'flatsome-admin' ),
			),
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_related', array(
	'name'      => __( 'محصولات مرتبط' ),
	'category'  => __( 'Product Page' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_related' ),
	'options'   => array(
		'style' => array(
			'type'    => 'select',
			'heading' => 'استایل',
			'default' => 'slider',
			'options' => array(
				'slider' => __( 'اسلایدر', 'flatsome-admin' ),
				'grid'   => __( 'گرید', 'flatsome-admin' ),
			),
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_hook', array(
	'name'      => __( 'هوک های محصول' ),
	'category'  => __( 'Product Page' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_hooks' ),
	'options'   => array(
		'hook' => array(
			'type'    => 'select',
			'heading' => 'هوک',
			'default' => 'woocommerce_single_product_summary',
			'options' => apply_filters( 'flatsome_custom_product_single_product_hooks', array(
				'woocommerce_before_single_product_summary' => 'woocommerce_before_single_product_summary',
				'woocommerce_single_product_summary'        => 'woocommerce_single_product_summary',
				'woocommerce_after_single_product_summary'  => 'woocommerce_after_single_product_summary',
				'flatsome_custom_single_product_1'          => 'flatsome_custom_single_product_1',
				'flatsome_custom_single_product_2'          => 'flatsome_custom_single_product_2',
				'flatsome_custom_single_product_3'          => 'flatsome_custom_single_product_3',
			) ),
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_breadcrumbs', array(
	'name'      => __( 'ریزآدرس محصولات' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_breadcrumbs' ),
	'category'  => __( 'Product Page' ),
	'options'   => array(
		'size' => array(
			'type'    => 'select',
			'heading' => 'اندازه',
			'default' => '',
			'options' => $sizes,
		),
	),
) );

add_ux_builder_shortcode( 'ux_product_next_prev_nav', array(
	'name'      => __( 'محصول قبلی / بعدی' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_next_prev' ),
	'category'  => __( 'Product Page' ),
	'options'   => array(
		'class' => array(
			'type'    => 'textfield',
			'heading' => 'Class',
			'default' => '',
		),
	),
) );
