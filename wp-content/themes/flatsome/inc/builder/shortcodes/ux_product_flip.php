<?php
/**
 * Registers the Product Flip element in UX Builder.
 *
 * @package flatsome
 */

$repeater_posts     = 'products';    // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
$repeater_post_type = 'product';     // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
$repeater_post_cat  = 'product_cat'; // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable

$options = array(
	'post_options' => require __DIR__ . '/commons/repeater-posts.php',
	'filter_posts' => array(
		'type'       => 'group',
		'heading'    => __( 'فیلتر پست ها' ),
		'conditions' => 'ids == ""',
		'options'    => array(
			'orderby'      => array(
				'type'    => 'select',
				'heading' => __( 'Order By' ),
				'default' => 'normal',
				'options' => array(
					'normal' => 'نرمال',
                'sales' => 'فروش',
                'rand' => 'رندوم',
                'date' => 'تاریخ'
				),
			),
			'order'        => array(
				'type'    => 'select',
				'heading' => __( 'ترتیب' ),
				'default' => 'asc',
				'options' => array(
					'asc'  => 'صعودی',
					'desc' => 'نزولی',
				),
			),
			'show'         => array(
				'type'    => 'select',
				'heading' => __( 'ترتیب' ),
				'default' => '',
				'options' => array(
					''         => 'All',
					'featured' => 'ویژه',
					'onsale'   => 'درحال فروش',
				),
			),
			'out_of_stock' => array(
				'type'    => 'select',
				'heading' => __( 'اتمام موجودی' ),
				'default' => '',
				'options' => array(
					''        => 'شامل شدن',
					'exclude' => 'عدم شامل شدن',
				),
			),
		),
	),
);

$options['post_options']['options']['tags'] = array(
	'type'       => 'select',
	'heading'    => 'برچسب',
	'conditions' => 'ids == ""',
	'full_width' => true,
	'default'    => '',
	'config'     => array(
		'multiple'    => true,
		'placeholder' => 'انتخاب کنید...',
		'termSelect'  => array(
			'post_type'  => 'product',
			'taxonomies' => 'product_tag',
		),
	),
);

add_ux_builder_shortcode( 'ux_product_flip', array(
	'name'      => 'فلیپ بوک',
	'category'  => __( 'Shop' ),
	'priority'  => 4,
	'thumbnail' => flatsome_ux_builder_thumbnail( 'product_flipbook' ),
	'wrap'      => false,
	'presets'   => array(
		array(
			'name'    => __( 'نرمال' ),
			'content' => '[ux_product_flip]',
		),
	),
	'options'   => $options,
) );
