<?php

Flatsome_Option::add_section( 'blog-layout', array(
	'title'       => __( 'طرح بلاگ', 'flatsome-admin' ),
	'panel' => 'blog',
) );


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'blog_header',
	//'transport' => $transport,
	'label'       => __( 'عنوان صفحه وبلاگ', 'flatsome-admin' ),
	'description' => __( 'HTML را برای عنوان وبلاگ در اینجا وارد کنید. بالای محتوا و نوار کناری قرار خواهد گرفت. کد کوتاه مجاز است. F.ex [block id = "Blog-header"]', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'sanitize_callback' => 'flatsome_custom_sanitize',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'blog_archive_transparent',
	'label'       => __( 'هدر شفاف', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'blog_layout',
	'label'       => __( 'سایدبار وبلاگ', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'default'     => 'right-sidebar',
	'transport'	  => $transport,
	'choices'     => array(
		'right-sidebar' => $image_url . 'layout-right.svg',
		'left-sidebar' => $image_url . 'layout-left.svg',
		'no-sidebar' => $image_url . 'layout-no-sidebar.svg',
	),
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'blog_layout_divider',
	'label'       => __( 'جداکننده نوار کناری را فعال کنید', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'transport'	  => $transport,
	'default'     => 1,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_sticky_sidebar',
	'label'    => __( 'سایدبار چسبنده', 'flatsome-admin' ),
	'section'  => 'blog-layout',
	'default'  => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'select',
	'settings'        => 'blog_sticky_sidebar_mode',
	'label'           => __( 'حالت چسبنده', 'flatsome-admin' ),
	'section'         => 'blog-layout',
	'default'         => '',
	'choices'         => array(
		''           => __( 'CSS (native)', 'flatsome-admin' ),
		'javascript' => __( 'JavaScript (enhanced)', 'flatsome-admin' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'blog_sticky_sidebar',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'blog_style',
	'label'       => __( 'طرح پست ها', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'default'     => 'normal',
	'choices'     => array(
		'normal' => $image_url . 'blog-normal.svg',
		'inline' => $image_url . 'blog-inline.svg',
		'2-col' => $image_url . 'blog-two-col.svg',
		'3-col' =>$image_url . 'blog-three-col.svg',
		'list' => $image_url . 'blog-list.svg',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'            => 'radio-buttonset',
	'settings'        => 'blog_style_type',
	'label'           => __( 'نوع طرح پست ها', 'flatsome-admin' ),
	'section'         => 'blog-layout',
	'default'         => 'masonry',
	'choices'         => array(
		'row'     => __( 'ردیف', 'flatsome-admin' ),
		'masonry' => __( 'مانسوری', 'flatsome-admin' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'blog_style',
			'operator' => 'contains',
			'value'    => array( '2-col', '3-col' ),
		),
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'blog_show_excerpt',
	'transport'	  => $transport,
	'label'       => __( 'نمایش خلاصه', 'flatsome-admin' ),
	'help'        => __( 'فقط گزیده ای از پست های وبلاگ را نشان دهید. می‌توانید با افزودن یک برچسب بیشتر به محتوای پست، پیوند ادامه مطالعه را به صورت دستی اضافه کنید.', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'default'     => 1,
));

Flatsome_Option::add_field( 'option',  array(
'type'        => 'color-alpha',
'settings'     => 'blog_bg_color',
'label'       => __( 'رنگ پس زمینه وبلاگ', 'flatsome-admin' ),
'section'     => 'blog-layout',
'default'     => '',
'transport' => 'postMessage',
'js_vars'   => array(
	array(
		'element'  => '.blog-wrapper',
		'function' => 'css',
		'property' => 'background-color'
	),
)
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'blog_posts_depth',
	'label'       => __( 'عمق', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'default'     => 0,
	'choices'     => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 1
	),
	'transport' => $transport
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'blog_posts_depth_hover',
	'label'       => __( 'عمق : هاور', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'default'     => 0,
	'choices'     => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 1
	),
	'transport' => $transport
));


Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_post_layout',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'blog-layout',
    'default'     => '<div class="options-title-divider">طرح پست</div>',
) );


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'blog_posts_header_style',
	'label'       => __( 'سبک عنوان پست ها', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'active_callback'    => array(
		array(
			'setting'  => 'blog_style',
			'operator' => '===',
			'value'    => 'normal',
		),
	),
	'default'     => 'normal',
	'choices'     => array(
		'normal' => $image_url . 'text-top.svg',
		'bottom' => $image_url . 'text-bottom.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'blog_posts_title_align',
	'label'       => __( 'ترازعنوان پست ها', 'flatsome-admin' ),
	'section'     => 'blog-layout',
	'default'     => 'center',
	'choices'     => array(
		'left' =>	$image_url . 'align-left.svg',
		'center' => $image_url . 'align-center.svg',
		'right' => 	$image_url . 'align-right.svg',
	),
));
