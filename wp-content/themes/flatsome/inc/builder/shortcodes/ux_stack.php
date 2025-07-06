<?php
/**
 * Registers the Stack element in UX Builder.
 *
 * @package flatsome
 */

add_ux_builder_shortcode( 'ux_stack', array(
	'type'      => 'container',
	'name'      => __( 'استک', 'flatsome' ),
	'category'  => __( 'Layout', 'flatsome' ),
	'thumbnail' => flatsome_ux_builder_thumbnail( 'ux_stack' ),
	'template'  => flatsome_ux_builder_template( 'ux_stack.html' ),
	'wrap'      => false,
	'nested'    => true,
	'options'   => array(
		'direction'        => array(
			'type'       => 'select',
			'heading'    => __( 'جهت', 'flatsome' ),
			'responsive' => true,
			'default'    => 'row',
			'options'    => array(
				'row' => __( 'افقی', 'flatsome' ),
				'col' => __( 'عمودی', 'flatsome' ),
			),
		),
		'distribute'       => array(
			'type'       => 'select',
			'heading'    => __( 'توزیع', 'flatsome' ),
			'responsive' => true,
			'default'    => 'start',
			'options'    => array(
				'start'   => __( 'شروع ', 'flatsome' ),
				'center'  => __( 'مرکز', 'flatsome' ),
				'end'     => __( 'انتها', 'flatsome' ),
				'between' => __( 'فضای بین', 'flatsome' ),
				'around'  => __( 'فضای اطراف', 'flatsome' ),
			),
		),
		'align'            => array(
			'type'       => 'select',
			'heading'    => __( 'تراز کردن', 'flatsome' ),
			'responsive' => true,
			'default'    => 'stretch',
			'options'    => array(
				'stretch'  => __( 'کش آمده', 'flatsome' ),
				'start'    => __( 'شروع', 'flatsome' ),
				'center'   => __( 'مرکز', 'flatsome' ),
				'end'      => __( 'انتها', 'flatsome' ),
				'baseline' => __( 'Baseline', 'flatsome' ),
			),
		),
		'gap'              => array(
			'type'       => 'slider',
			'heading'    => __( 'شکاف', 'flatsome' ),
			'responsive' => true,
			'default'    => '0',
			'unit'       => 'rem',
			'max'        => '16',
			'min'        => '0',
			'step'       => '0.25',
		),
		'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
	),
) );
