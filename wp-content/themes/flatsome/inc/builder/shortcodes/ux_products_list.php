<?php

// Shortcode to display a single product.
$options = array(
	'post_options'     => require( __DIR__ . '/commons/repeater-posts.php' ),
	'filter_posts'     => array(
		'type'       => 'group',
    'heading' => __( 'فیلتر پست ها' ),
    'conditions' => 'ids === ""',
    'options' => array(
         'orderby' => array(
            'type' => 'select',
            'heading' => __( 'ترتیب بر اساس' ),
            'default' => 'normal',
            'options' => array(
                'normal' => 'نرمال',
                'title' => 'عنوان',
                'sales' => 'فروش',
				'price' => 'قیمت',
                'rand' => 'رندوم',
                'date' => 'تاریخ'
            )
        ),
        'order' => array(
            'type' => 'select',
            'heading' => __( 'ترتیب' ),
            'default' => 'desc',
            'options' => array(
                'asc' => 'صعودی',
                'desc' => 'نزولی',
            )
        ),
        'show' => array(
            'type' => 'select',
            'heading' => __( 'سایه' ),
            'default' => '',
            'options' => array(
                '' => 'All',
                'featured' => 'ویژه',
                'onsale' => 'در حال فروش',
            )
        ),
         'out_of_stock' => array(
	         'type'    => 'select',
	         'heading' => __( 'عدم موجودی' ),
	         'default' => '',
	         'options' => array(
		         ''        => 'شامل',
		         'exclude' => 'عدم شامل شدن',
				),
			),
		),
	),
	'advanced_options' => require( __DIR__ . '/commons/advanced.php' ),
);

$options['post_options']['options']['tags'] = array(
	'type'       => 'select',
  'heading' => 'برچسب',
  'conditions' => 'ids == ""',
  'full_width' => true,
  'default' => '',
  'config' => array(
	  'multiple' => true,
      'placeholder' => 'Select...',
      'termSelect' => array(
          'post_type' => 'product',
          'taxonomies' => 'product_tag',
      ),
  )
);

add_ux_builder_shortcode( 'ux_products_list', array(
    'name' => 'لیست محصولات',
    'category' => __( 'Shop' ),
    'priority' => 2,
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'products-list' ),
    'presets' => array(
            array(
                'name' => __( 'پیشفرض' ),
                'content' => '[ux_products_list]'
            ),
            array(
                'name' => __( 'در تخفیف' ),
                'content' => '[ux_products_list orderby="sales" show="onsale"]'
            ),
            array(
                'name' => __( 'محصولات ویژه' ),
                'content' => '[ux_products_list show="featured"]'
            ),
             array(
                'name' => __( 'پرفروش ها' ),
			'content' => '[ux_products_list orderby="sales"]',
		),
	),
	'options'   => $options,
) );
