<?php

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'woocommerce_store_notice_top',
	'label'     => __( 'اعلامیه فروشگاه را به بالا منتقل کنید', 'flatsome-admin' ),
	'section'   => 'woocommerce_store_notice',
	'default'   => 0
) );