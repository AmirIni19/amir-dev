<?php

Flatsome_Option::add_section( 'lightbox', array(
	'title' => __( 'لایتباکس و کشو', 'flatsome-admin' ),
	'panel' => 'style',
) );


Flatsome_Option::add_field( 'option', array(
	'type'            => 'color',
	'settings'        => 'flatsome_lightbox_bg',
	'label'           => __( 'رنگ پس زمینه', 'flatsome-admin' ),
	'section'         => 'lightbox',
	'transport'       => $transport,
	'default'         => '',
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'style_drawer_title',
	'label'    => '',
	'section'  => 'lightbox',
	'default'  => '<div class="options-title-divider" style="margin-bottom:15px">کشو</div><p>کشوها بخش های خاصی هستند که روی وب سایت شما ظاهر می شوند. آنها را مانند پانل های کشویی در نظر بگیرید که می توانند منوها، فیلترها، سبد خرید یا ناوبری تلفن همراه را در خود جای دهند.
​</p>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'dimension',
	'settings'  => 'drawer_width',
	'section'   => 'lightbox',
	'label'     => __( 'عرض کشو', 'flatsome' ),
	'transport' => $transport,
	'default'   => Flatsome_Default::DRAWER_WIDTH,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'style_lightbox_title',
	'label'    => '',
	'section'  => 'lightbox',
	'default'  => '<div class="options-title-divider" style="margin-bottom:15px">لایتباکس</div><p>لایت‌باکس‌ها مانند پنجره‌های پاپ‌آپ هستند که عکس‌ها یا محتوا را به نمایش می‌گذارند و باعث می‌شوند بقیه وب‌سایت در پس‌زمینه محو شوند.</p>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'flatsome_lightbox',
	'label'    => __( 'از لایتباکس فلتسام استفاده کن', 'flatsome-admin' ),
	'description' => __( 'وقتی فعال باشد، لایت باکس را می توان در هر تصویر یا گالری فعال کرد. در صورت تداخل با سایر افزونه های لایت باکس، غیرفعال کنید.', 'flatsome-admin' ),
	'section'  => 'lightbox',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'checkbox',
	'settings'        => 'flatsome_lightbox_multi_gallery',
	'label'           => __( 'از چندین گالری در یک صفحه استفاده کنید', 'flatsome-admin' ),
	'description'     => __( 'هنگامی که فعال باشد، گالری های لایت باکس در یک صفحه به طور جداگانه بررسی می شوند، در غیر این صورت در یک گالری ترکیب می شوند.', 'flatsome-admin' ),
	'section'         => 'lightbox',
	'default'         => 0,
	'active_callback' => array(
		array(
			'setting'  => 'flatsome_lightbox',
			'operator' => '==',
			'value'    => true,
		),
	),
) );
