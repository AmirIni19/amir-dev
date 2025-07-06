<?php
Flatsome_Option::add_section( 'catalog-mode', array(
	'title'       => __( 'حالت کاتالوگ', 'flatsome-admin' ),
	'panel' => 'woocommerce',
	'description' => __( 'فعال سازی حالت کاتالوگ', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'catalog_mode',
	'label'       => __( 'حالت کاتالوگ', 'flatsome-admin' ),
	'section'     => 'catalog-mode',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'catalog_mode_prices',
	'label'       => __( 'غیرفعال سازی قیمت ها', 'flatsome-admin' ),
	'description' => 'غیرفعال کردن قیمت ها در صفحات دسته بندی و صفحه محصول را انتخاب کنید.',
	'section'     => 'catalog-mode',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'catalog_mode_header',
	'transport' => $transport,
	'label'       => __( 'جایگزینی سبد خرید', 'flatsome-admin' ),
	'help'        => __( "به جای حساب کاربری / سبد خرید ، محتوای موردنظر برای نمایش را وارد کنید. کد کوتاه مجاز است.", 'flatsome-admin'),
	'section'     => 'catalog-mode',
	'default'     => '',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'catalog_mode_product',
	'transport' => $transport,
	'label'       => __( 'صفحه محصول افزودن به سبد خرید', 'flatsome-admin' ),
	'help'        => __( 'اطلاعات تماس یا شورتکد فرم را اینجا وارد کنید.', 'flatsome-admin'),
	'section'     => 'catalog-mode',
	'default'     => 'هر HTML یا کد کوتاه را اینجا اضافه کنید ...',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'catalog_mode_lightbox',
	'transport' => $transport,
	'label'       => __( 'افزودن به سبد خرید - نمایش سریع محصول', 'flatsome-admin' ),
	'help'        => __( 'متن را وارد کنید که در نمای سریع محصول نشان داده شود', 'flatsome-admin'),
	'section'     => 'catalog-mode',
	'default'     => '',
));
