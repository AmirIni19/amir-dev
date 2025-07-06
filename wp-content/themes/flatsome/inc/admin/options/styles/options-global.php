<?php


Flatsome_Option::add_section( 'global-styles', array(
	'title'       => __( 'استایل عمومی', 'flatsome-admin' ),
	'panel'       => 'style',
) );


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'text',
	'settings'     => 'button_radius',
	'label'       => __( 'گردی لبه در دکمه ها', 'flatsome-admin' ),
	'section'     => 'global-styles',
	'transport'   => $transport,
	'default'     => '',
));
