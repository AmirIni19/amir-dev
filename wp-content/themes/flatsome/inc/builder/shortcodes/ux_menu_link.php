<?php
/**
 * Registers the Menu link element in UX Builder.
 *
 * @package flatsome
 */

$flatsome_ux_menu_link_options = require __DIR__ . '/commons/links.php';

$flatsome_ux_menu_link_options['options'] = flatsome_array_insert(
	$flatsome_ux_menu_link_options['options'],
	array(
		'post' => array(
			'type'       => 'select',
			'full_width' => true,
			'conditions' => '!term && !link',
			'config'     => array(
				'placeholder' => __( 'انتخاب پست..', 'flatsome' ),
				'postSelect'  => array(),
			),
		),
		'term' => array(
			'type'       => 'select',
			'full_width' => true,
			'conditions' => '!post && !link',
			'config'     => array(
				'placeholder' => __( 'انتخاب دسته..', 'flatsome' ),
				'termSelect'  => array(
					'taxonomies' => array(
						'post_tag',
						'category',
						'product_cat',
						'product_tag',
					),
				),
			),
		),
	),
	0
);

$flatsome_ux_menu_link_options['options']['link']['conditions'] = '!post && !term';

add_ux_builder_shortcode( 'ux_menu_link', array(
	'name'      => __( 'لینک فهرست', 'flatsome' ),
	'category'  => __( 'Content', 'flatsome' ),
	'info'      => '{{ label }}',
	'require'   => array( 'ux_menu' ),
	'template'  => flatsome_ux_builder_template( 'ux_menu_link.html' ),
	'wrap'      => false,
	'presets'   => array(
		array(
			'name'    => __( 'Default', 'flatsome' ),
			'content' => '[ux_menu_link text="Menu link"]',
		),
	),
	'options'   => array(
		'text'            => array(
			'type'       => 'textfield',
			'heading'    => __( 'متن', 'flatsome' ),
			'default'    => '',
			'auto_focus' => true,
		),
		'icon'             => array(
			'type'    => 'select',
			'heading' => __( 'آیکون', 'flatsome' ),
			'options' => require __DIR__ . '/values/icons.php',
		),
		'label'             => array(
			'type'    => 'select',
			'heading' => __( 'لیبل', 'flatsome' ),
			'options' => require __DIR__ . '/values/menu-labels.php',
		),
		'link_options'     => $flatsome_ux_menu_link_options,
		'advanced_options' => require __DIR__ . '/commons/advanced.php',
	),
) );
