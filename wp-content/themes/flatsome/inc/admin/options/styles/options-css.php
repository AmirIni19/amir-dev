<?php

Flatsome_Option::add_panel( 'style', array(
  'title'       => __( 'استایل', 'flatsome-admin' ),
) );

Flatsome_Option::add_section( 'custom-css', array(
	'title'       => __( 'css سفارشی', 'flatsome-admin' ),
	'panel'       => 'style',
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'code',
	'settings'     => 'html_custom_css',
	'label'       => __( 'css سفارشی', 'flatsome-admin' ),
	'section'     => 'custom-css',
	'transport'   => $transport,
	'placeholder' => '.add-css-here{}',
  'choices'     => array(
    'language' => 'css',
  ),
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'code',
	'settings'     => 'html_custom_css_tablet',
	'label'       => __( 'css سفارشی تبلت', 'flatsome-admin' ),
	'section'     => 'custom-css',
	'default'     => '',
  'placeholder' => '.add-css-here{}',
	'transport'   => $transport,
  'choices'     => array(
    'language' => 'css',
  ),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'code',
	'settings'     => 'html_custom_css_mobile',
	'label'       => __( 'css سفارشی موبایل', 'flatsome-admin' ),
	'section'     => 'custom-css',
	'default'     => '',
  'placeholder' => '.add-css-here{}',
	'transport'   => $transport,
  'choices'     => array(
    'language' => 'css',
  ),
));
