<?php

$options = array(
	'per_page' => array(
		'type'    => 'slider',
		'heading' => 'تعداد',
		'default' => '12',
		'max'     => '99',
		'min'     => '4',
	),
	'columns'  => array(
		'type'    => 'slider',
		'heading' => 'ستونها',
		'default' => '4',
		'max'     => '8',
		'min'     => '1',
	),
	'orderby'  => array(
		'type'    => 'select',
		'heading' => __( 'ترتیب بر اساس' ),
		'default' => 'title',
		'options' => array(
			'menu_order' => 'ترتیب فهرست',
			'title'      => 'عنوان',
			'date'       => 'روز',
			'rand'       => 'رندوم',
			//'id' => 'ID', // Valid but Disabled
		),
	),
	'order'    => array(
		'type'    => 'select',
		'heading' => __( 'ترتیب' ),
		'default' => 'asc',
		'options' => array(
			'asc'  => 'صعودی',
			'desc' => 'نزولی',
		),
	),
);

$options_custom = array(
	'ids'      => array(
		'type'       => 'select',
		'heading'    => 'محصولات',
		'param_name' => 'ids',
		'config'     => array(
			'multiple'    => true,
			'placeholder' => 'انتخاب کنید...',
			'postSelect'  => array(
				'post_type' => array( 'product' ),
			),
		),
	),
	'per_page' => array(
		'type'    => 'slider',
		'heading' => 'تعداد',
		'default' => '12',
		'max'     => '99',
		'min'     => '4',
	),
	'columns'  => array(
		'type'    => 'slider',
		'heading' => 'ستون ها',
		'default' => '4',
		'max'     => '8',
		'min'     => '1',
	),
	'orderby'  => array(
		'type'    => 'select',
		'heading' => __( 'ترتیب بر اساس' ),
		'default' => 'title',
		'options' => array(
			'menu_order' => 'ترتیب فهرست',
			'title'      => 'عنوان',
			'date'       => 'تاریخ',
			'rand'       => 'رندوم',
			'price'      => 'قیمت',
			'popularity' => 'محبوبیت',
			'rating'     => 'امتیاز',
			//'id' => 'ID', // Valid but Disabled
		),
	),
	'order'    => array(
		'type'    => 'select',
		'heading' => __( 'ترتیب' ),
		'default' => 'asc',
		'options' => array(
			'asc'  => 'صعودی',
			'desc' => 'نزولی',
		),
	),
);

add_ux_builder_shortcode( 'products',
	array(
		'name'      => 'Products - Custom',
		'category'  => __( 'Shop' ),
		'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_products' ),
		'wrap'      => false,
		'options'   => $options_custom,
	)
);

add_ux_builder_shortcode( 'featured_products',
	array(
		'name'      => 'Products - Featured',
		'category'  => __( 'Shop' ),
		'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_products' ),
		'wrap'      => false,
		'options'   => $options,
	)
);

add_ux_builder_shortcode( 'recent_products',
	array(
		'name'      => 'Products - Recent',
		'category'  => __( 'Shop' ),
		'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_products' ),
		'wrap'      => false,
		'options'   => $options,
	)
);

add_ux_builder_shortcode( 'sale_products',
	array(
		'name'      => 'محصول - در حال فروش',
		'category'  => __( 'Shop' ),
		'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_products' ),
		'wrap'      => false,
		'options'   => $options,
	)
);

add_ux_builder_shortcode( 'best_selling_products',
	array(
		'name'      => 'محصولات پرفروش',
		'category'  => __( 'Shop' ),
		'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_products' ),
		'wrap'      => false,
		'options'   => $options,
	)
);

add_ux_builder_shortcode( 'محصولات با امتیاز بالا',
	array(
		'name'      => 'Products - Top Rated',
		'category'  => __( 'Shop' ),
		'thumbnail' => flatsome_ux_builder_thumbnail( 'woo_products' ),
		'wrap'      => false,
		'options'   => $options,
	)
);
