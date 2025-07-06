<?php
/**
 * Registers the Menu element in UX Builder.
 *
 * @package flatsome
 */

add_ux_builder_shortcode( 'ux_menu', array(
	'type'      => 'container',
	'name'      => __( 'فهرست', 'flatsome' ),
	'category'  => __( 'Content', 'flatsome' ),
	'allow'     => array( 'ux_menu_link', 'ux_menu_title' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'ux_menu' ),
	'template'  => flatsome_ux_builder_template( 'ux_menu.html' ),
	'wrap'      => false,
	'nested'    => false,
	'presets'   => array(
		array(
			'name'    => __( 'پیش فرض', 'flatsome' ),
			'content' => '
				[ux_menu divider="solid"]
					[ux_menu_link text="فهرست اول"]
					[ux_menu_link text="فهرست دوم"]
					[ux_menu_link text="فهرست سوم"]
					[ux_menu_link text="فهرست چهارم"]
				[/ux_menu]
			',
		),
	),
	'options'   => array(
		'divider'          => array(
			'type'       => 'radio-buttons',
			'heading'    => __( 'جداکننده', 'flatsome' ),
			'responsive' => true,
			'default'    => '',
			'options'    => array(
				''      => array( 'title' => __( 'هیچکدام', 'flatsome' ) ),
				'solid' => array( 'title' => __( 'ساده', 'flatsome' ) ),
			),
		),
		'advanced_options' => require __DIR__ . '/commons/advanced.php',
	),
) );
