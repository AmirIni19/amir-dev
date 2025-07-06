<?php

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textfield',
	'settings'     => 'nav_position',
	'label'       => __( 'موقعیت ناوبری', 'flatsome-admin' ),
	'section'     => 'header-layout',
	'default'     => '',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textfield',
	'settings'     => 'search_pos',
	'label'       => __( 'موقعیت جستجو', 'flatsome-admin' ),
	'section'     => 'header-layout',
	'default'     => '',
));