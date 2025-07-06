<?php

Flatsome_Option::add_section( 'fl-portfolio', array(
'title'       => __( 'پورتفولیو', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'select',
	'settings'     => 'featured_items_page',
	'label'       => __( 'صفحه سفارشی پورتفولیو', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default'     => false,
	'choices'     => $list_pages
));

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_save_permalinks',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
    'default' => 'شما باید روی <strong>"ذخیره و انتشار"</strong> کلیک کنید و سپس دکمه <strong>"به‌روزرسانی پیوندهای یکتا"</strong> را بزنید تا مطمئن شوید که به درستی کار می‌کند!<br><br> <a class="button" href="'.admin_url().'options-permalink.php?settings-updated=true" target="_blank">به‌روزرسانی پیوندهای یکتا</a>',
) );


Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_portfolio_single',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
    'default'     => '<div class="options-title-divider">صفحه تکی</div>',
) );

// Single Posts
Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'portfolio_layout',
	'label'       => __( 'طرح صفحه تکی', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default' 	  => '',
	'transport'   => $transport,
	'choices'     => array(
		'' => $image_url . 'portfolio.svg',
		'sidebar-right' => $image_url . 'portfolio-sidebar-right.svg',
		'top' => $image_url . 'portfolio-top.svg',
		'top-full' => $image_url . 'portfolio-top-full.svg',
		'bottom' => $image_url . 'portfolio-bottom.svg',
		'bottom-full' => $image_url . 'portfolio-bottom-full.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'portfolio_title_transparent',
  'label'       => __( 'سربرگ شفاف', 'flatsome-admin' ),
  'section'     => 'fl-portfolio',
  'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'portfolio_title',
	'label'       => __( 'عنوان نمونه کار تکی', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default' 	  => '',
	'transport'   => $transport,
	'choices'     => array(
		'' => $image_url . 'portfolio-title.svg',
		'featured' => $image_url . 'portfolio-title-featured.svg',
		'breadcrumbs' => $image_url . 'portfolio-title-breadcrumbs.svg',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'portfolio_share',
	'label'    => __( 'نمایش دکمه های اشتراک گذاری', 'flatsome' ),
	'section'  => 'fl-portfolio',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'portfolio_related',
  'label'       => __( 'نمایش نمونه کارهای مرتبط', 'flatsome-admin' ),
  'section'     => 'fl-portfolio',
  'default' => 1
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'portfolio_next_prev',
  'label'       => __( 'نمایش دکمه های قبل و بعدی', 'flatsome-admin' ),
  'section'     => 'fl-portfolio',
  'default' => 1
));



Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_portfolio_archive',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
    'default'     => '<div class="options-title-divider">صفحه آرشیو</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'portfolio_archive_orderby',
	'label'    => __( 'مرتب سازی براساس', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 'menu_order',
	'choices'  => array(
		'title'      => 'عنوان',
		'name'       => 'اسم',
		'date'       => 'تاریخ',
		'menu_order' => 'فهرست',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'portfolio_archive_order',
	'label'    => __( 'ترتیب آیتم های نمونه کار', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 'desc',
	'choices'  => array(
		'desc' => 'نزولی',
		'asc'  => 'صعودی',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'portfolio_style',
	'label'       => __( 'استایل نمونه کارها', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default' 	  => '',
	'transport'   => $transport,
	'choices'     => array(
		'' => $image_url . 'portfolio-simple.svg',
		'overlay' => $image_url . 'portfolio-overlay.svg',
		'shade' => $image_url . 'portfolio-shade.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'select',
  'settings'     => 'portfolio_height',
  'label'       => __( 'ارتفاع تصاویر', 'flatsome-admin' ),
  'section'     => 'fl-portfolio',
  'default'     => 0,
  'choices'     => array(
     0   => 'Auto',
    '50%' => '1:2 (Wide)',
    '75%' => '4:3 (Rectangular)',
    '56%' => '16:9 (Widescreen)',
    '100%' => '1:1 (Square)',
    '125%' => 'Portrait',
    '200%' => '2:1 (Tall)',
  ),
));

Flatsome_Option::add_field( 'option',  array(
	'type'     => 'slider',
	'settings' => 'portfolio_archive_image_radius',
	'label'    => __( 'گردی لبه تصاویر (%)', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 0,
	'choices'  => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'     => 'select',
	'settings' => 'portfolio_archive_image_size',
	'label'    => __( 'اندازه تصاویر', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 'medium',
	'choices'  => array(
		'large'     => 'بزرگ',
		'medium'    => 'متوسط',
		'thumbnail' => 'تصویر بندانگشتی',
		'original'  => 'اصلی',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'     => 'slider',
	'settings' => 'portfolio_archive_depth',
	'label'    => __( 'عمق تصویر', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 0,
	'choices'  => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 1,
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'     => 'slider',
	'settings' => 'portfolio_archive_depth_hover',
	'label'    => __( 'عمق تصویر : هاور', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 0,
	'choices'  => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 1,
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'     => 'radio-buttonset',
	'settings' => 'portfolio_archive_spacing',
	'label'    => __( 'فضای ستون ها', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 'small',
	'choices'  => array(
		'collapse' => 'فشرده',
'xsmall'   => 'بسیار کوچک',
'small'    => 'کوچک',
'normal'   => 'معمولی',
'large'    => 'بزرگ',

	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'slider',
	'settings' => 'portfolio_archive_columns',
	'label'    => __( 'آیتم در هر ردیف - دسکتاپ', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 4,
	'choices'  => array(
		'min'  => 1,
		'max'  => 6,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'slider',
	'settings' => 'portfolio_archive_columns_tablet',
	'label'    => __( 'آیتم در هر ردیف - تبلت', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 3,
	'choices'  => array(
		'min'  => 1,
		'max'  => 4,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'slider',
	'settings' => 'portfolio_archive_columns_mobile',
	'label'    => __( 'آیتم در هر ردیف - موبایل', 'flatsome-admin' ),
	'section'  => 'fl-portfolio',
	'default'  => 2,
	'choices'  => array(
		'min'  => 1,
		'max'  => 3,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'portfolio_archive_title',
	'label'       => __( 'عنوان آرشیو نمونه کارها', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default' 	  => '',
	'transport'   => $transport,
	'choices'     => array(
		'' => $image_url . 'portfolio-title.svg',
		'featured' => $image_url . 'portfolio-title-featured.svg',
		'breadcrumbs' => $image_url . 'portfolio-title-breadcrumbs.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'portfolio_archive_title_transparent',
	'label'       => __( 'سربرگ شفاف', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'image',
    'settings'     => 'portfolio_archive_bg',
    'label'       => __( 'پس زمینه بک گراند آرشیو', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default'     => "",
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-buttonset',
	'settings'     => 'portfolio_archive_filter',
	'label'       => __( 'ناوبری فیلتر', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default'     => 'left',
	'choices'     => array(
		'left' => 'چپ',
'center' => 'وسط',
'disabled' => 'غیرفعال',

	),
	'transport' => $transport,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'portfolio_archive_filter_style',
	'label'       => __( 'استایل ناوبری فیلتر', 'flatsome-admin' ),
	'section'     => 'fl-portfolio',
	'default' 	  => 'line-grow',
	'transport' => $transport,
	'choices'     => $nav_styles_img
));




function flatsome_refresh_portfolio_partials( WP_Customize_Manager $wp_customize ) {

  // Abort if selective refresh is not available.
  if ( ! isset( $wp_customize->selective_refresh ) ) {
      return;
  }
	$wp_customize->selective_refresh->add_partial( 'portfolio-single-layout', array(
		'selector' => '.portfolio-single-page',
		'settings' => array('portfolio_style','portfolio_layout','portfolio_title'),
		'render_callback' => function() {
		    get_template_part('template-parts/portfolio/single-portfolio', flatsome_option('portfolio_layout'));
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'portfolio-archive-layout', array(
		'selector' => '.portfolio-archive',
		'settings' => array('portfolio_archive_title','portfolio_archive_filter','portfolio_style','portfolio_archive_filter_style'),
		'render_callback' => function() {
		    get_template_part('template-parts/portfolio/archive-portfolio', flatsome_option('portfolio_archive_layout'));
		},
	) );


}
add_action( 'customize_register', 'flatsome_refresh_portfolio_partials' );
