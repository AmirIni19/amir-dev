<?php 

Flatsome_Option::add_section( 'blog-featured', array(
	'title'       => __( 'پست های ویژه وبلاگ', 'flatsome-admin' ),
	'panel' => 'blog',
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'blog_featured',
	'label'       => __( 'پست های ویژه', 'flatsome-admin' ),
	'description' => __( 'نمایش پست های برجسته در یک نوار لغزنده بالاتر از محتوا. برای نشان دادن اینجا باید یک پست "مهم" بسازید.', 'flatsome-admin' ),
	'section'     => 'blog-featured',
	'default'     => '',
	'choices'     => array(
		'' => $image_url . 'disabled.svg',
		'content' => $image_url . 'featured-posts.svg',
		'top' =>$image_url . 'featured-posts-top.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'blog_hide_sticky',
	'label'       => __( 'پستهای مهم را از پیش فرض وبلاگ مخفی کنید.', 'flatsome-admin' ),
	'section'     => 'blog-featured',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'blog_featured_height',
	'label'       => __( 'ارتفاع پست های برجسته', 'flatsome-admin' ),
	//'help'        => __( 'This is some extra help. You can use this to add some additional instructions for users. The main description should go in the "description" of the field, this is only to be used for help tips.', 'flatsome-admin' ),
	'section'     => 'blog-featured',
	'default'     => 500,
	'choices'     => array(
	'min'  => 200,
	'max'  => 1000,
	'step' => 1
	),
	'transport' => $transport,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_featured_image_size',
	'label'    => esc_attr__( 'اندازه تصویر', 'flatsome-admin' ) . ' (NEW)',
	'section'  => 'blog-featured',
	'default'  => 'medium',
	'choices'  => array(
		'thumbnail' => 'بندانگشتی',
		'medium'    => 'متوسط',
		'large'     => 'بزرگ',
		'original'  => 'اصلی',
	),
) );
