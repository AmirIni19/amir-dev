<?php

Flatsome_Option::add_section( 'blog-single', array(
	'title' => __( 'پست تکی', 'flatsome-admin' ),
	'panel' => 'blog',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-image',
	'settings' => 'blog_post_layout',
	'label'    => __( 'طرح پست تکی', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 'right-sidebar',
	'choices'  => array(
		'right-sidebar' => $image_url . 'layout-right.svg',
		'left-sidebar'  => $image_url . 'layout-left.svg',
		'no-sidebar'    => $image_url . 'layout-no-sidebar.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-image',
	'settings' => 'blog_post_style',
	'label'    => __( 'طرح عنوان', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 'default',
	'choices'  => array(
		'default' => $image_url . 'blog-single.svg',
		'top'     => $image_url . 'blog-single-full.svg',
		'inline'  => $image_url . 'blog-single-inline.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_single_transparent',
	'label'    => __( 'سربرگ شفاف', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 0,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_blog_single_header',
	'label'    => '',
	'section'  => 'blog-single',
	'default'  => '<div class="options-title-divider">سربرگ</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_single_header_category',
	'label'    => __( 'دسته بندی', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_single_header_title',
	'label'    => __( 'عنوان', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_single_header_meta',
	'label'    => __( 'متا', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 1,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_blog_single_post',
	'label'    => '',
	'section'  => 'blog-single',
	'default'  => '<div class="options-title-divider">پست</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_single_featured_image',
	'label'    => __( 'تصویر شاخص', 'flatsome' ),
	'section'  => 'blog-single',
	'default'  => 1,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_blog_single_footer',
	'label'    => '',
	'section'  => 'blog-single',
	'default'  => '<div class="options-title-divider">پاورقی</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_share',
	'label'    => __( 'شبکه های اجتماعی', 'flatsome' ),
	'section'  => 'blog-single',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_single_footer_meta',
	'label'    => __( 'متا', 'flatsome' ),
	'section'  => 'blog-single',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_author_box',
	'label'    => __( 'جعبه نویسنده', 'flatsome' ),
	'section'  => 'blog-single',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_single_next_prev_nav',
	'label'    => __( 'ناوبری پست قبل/بعد', 'flatsome' ),
	'section'  => 'blog-single',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'              => 'textarea',
	'settings'          => 'blog_after_post',
	'label'             => __( 'کد html پس از پست', 'flatsome' ),
	'section'           => 'blog-single',
	'description'       => 'Enter HTML or shortcodes that will be visible after blog posts. (Before comment box). Shortcodes are allowed',
	'sanitize_callback' => 'flatsome_custom_sanitize',
	'default'           => '',
) );
