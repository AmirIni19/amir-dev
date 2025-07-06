<?php

Flatsome_Option::add_section( 'woocommerce_product_catalog', array(
  'title' => __( 'کاتالوگ محصولات', 'woocommerce' ),
  'panel' => 'woocommerce',
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_category_homepage',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<div class="options-title-divider">صفحه فروشگاه</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'textarea',
	'settings'    => 'html_shop_page',
	'label'       => __( 'سربرگ صفحه فروشگاه', 'flatsome-admin' ),
	'description' => __( 'HTML را که باید در بالای صفحه اصلی فروشگاه قرار داده شود وارد کنید. کد کوتاه مجاز است. این جایگزین عنوان صفحه اصلی فروشگاه می شود', 'flatsome-admin' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'textarea',
	'settings'    => 'html_shop_page_content',
	'label'       => __( 'محتوای برگه فروشگاه', 'flatsome-admin' ),
	'description' => __( 'کد / کد کوتاه HTML را جایگزین محتوای صفحه اصلی فروشگاه کنید.', 'flatsome-admin' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => '',
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_category_layout',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<div class="options-title-divider">چیدمان کاتالوگ</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-image',
	'settings' => 'category_sidebar',
	'label'    => __( 'طرح', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 'left-sidebar',
	'choices'  => array(
		'none'          => $image_url . 'category-no-sidebar.svg',
		'left-sidebar'  => $image_url . 'category-left-sidebar.svg',
		'right-sidebar' => $image_url . 'category-right-sidebar.svg',
		'off-canvas'    => $image_url . 'category-off-canvas.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'checkbox',
	'settings'        => 'category_sticky_sidebar',
	'label'           => __( 'سایدبار چسبنده', 'flatsome-admin' ) . ' (جدید)',
	'section'         => 'woocommerce_product_catalog',
	'active_callback' => array(
		array(
			'setting'  => 'category_sidebar',
			'operator' => '!==',
			'value'    => 'none',
		),
		array(
			'setting'  => 'category_sidebar',
			'operator' => '!==',
			'value'    => 'off-canvas',
		),
	),
	'default'         => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'select',
	'settings'        => 'category_sticky_sidebar_mode',
	'label'           => __( 'حالت چسبنده', 'flatsome-admin' ),
	'section'         => 'woocommerce_product_catalog',
	'default'         => '',
	'choices'         => array(
		''           => __( 'CSS (native)', 'flatsome-admin' ),
		'javascript' => __( 'JavaScript (enhanced)', 'flatsome-admin' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'category_sidebar',
			'operator' => '!==',
			'value'    => 'none',
		),
		array(
			'setting'  => 'category_sidebar',
			'operator' => '!==',
			'value'    => 'off-canvas',
		),
		array(
			'setting'  => 'category_sticky_sidebar',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-image',
	'settings'  => 'category_grid_style',
	'label'     => __( 'سبک لیست', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 'grid',
	'choices'   => array(
		'grid'    => $image_url . 'category-style-grid.svg',
		'list'    => $image_url . 'category-style-list.svg',
		'masonry' => $image_url . 'category-style-masonry.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'checkbox',
	'settings'    => 'category_force_image_height',
	// 'transport' => $transport,
	'label'       => __( 'ارتفاع مساوی تصاویر ', 'flatsome-admin' ),
	'description' => 'همه تصاویر را مجبور به داشتن یک اندازه یکسان کنید',
	'section'     => 'woocommerce_product_catalog',
	'default'     => false,
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'slider',
	'settings'        => 'category_image_height',
	'label'           => __( 'ارتفاع برابر تصاویر', 'flatsome-admin' ),
	'description'     => 'ارتفاع تصویر را در٪ تغییر دهید. (100٪ = 1: 1)',
	'section'         => 'woocommerce_product_catalog',
	'active_callback' => array(
		array(
			'setting'  => 'category_force_image_height',
			'operator' => '==',
			'value'    => true,
		),
	),
	'transport'       => $transport,
	'default'         => 100,
	'choices'         => array(
		'min'  => 50,
		'max'  => 200,
		'step' => 1,
	),
) );


Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_html_woocommerce_image_shortcut_category',
    'label'       => __( '', 'flatsome-admin' ),
    'section'         => 'woocommerce_product_catalog',
    'default'     => '<button style="margin-top: 15px; margin-bottom:15px" class="button button-primary" data-to-section="woocommerce_product_images">Thumbnail Image Settings →</button>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'products_pr_page',
	'transport' => $transport,
'label'     => __( 'محصولات در هر صفحه', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 12,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'category_row_count',
	'transport' => $transport,
	'label'     => __( 'محصولات در هر ردیف - دسکتاپ', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 3,
	'choices'   => array(
		'min'  => 1,
		'max'  => 6,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'category_row_count_tablet',
	'label'     => __( 'محصولات در هر ردیف - تبلت', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 3,
	'choices'   => array(
		'min'  => 1,
		'max'  => 4,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'category_row_count_mobile',
	'label'     => __( 'محصولات در هر ردیف - موبایل', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 2,
	'choices'   => array(
		'min'  => 1,
		'max'  => 3,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_category_header',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<div class="options-title-divider">سربرگ</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-image',
	'settings'  => 'category_title_style',
	'label'     => __( 'سبک عنوان', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => '',
	'choices'   => array(
		''                => $image_url . 'category-title.svg',
		'featured'        => $image_url . 'category-title-featured.svg',
		'featured-center' => $image_url . 'category-title-featured-center.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'category_show_title',
	'transport' => $transport,
	'label'     => __( 'نمایش عنوان', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => '0',
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'checkbox',
	'settings'        => 'breadcrumb_home',
	'transport'       => $transport,
'label'           => __( 'نمایش لینک صفحه اصلی در ریزآدرس ها', 'flatsome-admin' ),
	'section'         => 'woocommerce_product_catalog',
	'active_callback' => function () {
		$wpseo     = class_exists( 'WPSEO_Options' ) && get_theme_mod( 'wpseo_breadcrumb' ) ? true : false;
		$rank_math = class_exists( 'RankMath' ) && get_theme_mod( 'rank_math_breadcrumb' ) ? true : false;

		return ! $wpseo && ! $rank_math;
	},
	'default'         => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'category_show_result_count',
	'transport' => flatsome_customizer_transport(),
	'label'     => esc_html__( 'نمایش تعداد نتایج', 'flatsome' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'category_show_catalog_ordering',
	'transport' => flatsome_customizer_transport(),
	'label'     => esc_html__( 'نمایش ترتیب کاتالوگ', 'flatsome' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'category_header_transparent',
	'label'    => __( 'سربرگ شفاف', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => '0',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'header_shop_bg_featured',
	'transport' => $transport,
	'help'      => __( 'از تصاویر برجسته از دسته ها و محصولات به عنوان پس زمینه استفاده کنید. اگر چیزی تنظیم نشده باشد ، به پیش زمینه پیش فرض عنوان فروشگاه بازگردد.', 'flatsome-admin' ),
	'label'     => __( 'تصویر برجسته به عنوان پس زمینه', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'image',
	'settings'  => 'header_shop_bg_image',
	'transport' => $transport,
	'label'     => __( 'پیش زمینه عنوان فروشگاه', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color-alpha',
	'alpha'     => true,
	'settings'  => 'header_shop_bg_color',
	'transport' => $transport,
'label'     => __( 'عنوان رنگ پس زمینه', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 'rgba(0,0,0,.3)',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'text',
	'settings'  => 'category_filter_text',
	'transport' => $transport,
	'label'     => __( 'Custom Filter Text', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => '',
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_category_breadcrumbs',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<div class="options-title-divider">ریزآدرس ها</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'breadcrumb_size',
	'label'    => __( 'سایز ریزآدرس ها', 'flatsome-admin' ),
	'help'     => __( 'اندازه ریزآدرس ها را در دسته بندی محصولات تغییر دهید..', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 'large',
	'choices'  => $sizes,
) );


Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-buttonset',
	'settings' => 'breadcrumb_case',
	'label'    => esc_attr__( 'حروف ریزآدرس ها', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => 'uppercase',
	'choices'  => array(
		'uppercase' => 'UPPERCASE',
		''          => 'Normal',
	),
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_category_category_box',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
  'default'  => '<div class="options-title-divider">باکس دسته بندی</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-image',
	'settings'  => 'cat_style',
	'label'     => __( 'استایل باکس دسته بندی', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 'badge',
	'choices'   => array(
		'normal'  => $image_url . 'category-box.svg',
		'badge'   => $image_url . 'category-box-badge.svg',
		'overlay' => $image_url . 'category-box-overlay.svg',
		'label'   => $image_url . 'category-box-label.svg',
		'shade'   => $image_url . 'category-box-shade.svg',
		'bounce'  => $image_url . 'category-box-bounce.svg',
		'push'    => $image_url . 'category-box-push.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'category_show_count',
	'transport' => $transport,
	'label'     => __( 'نمایش تعداد محصولات', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 1,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_category_product_box',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'default'  => '<div class="options-title-divider">جعبه محصول</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-image',
	'settings'  => 'grid_style',
	'label'     => __( 'استایل گرید', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 'grid1',
	'choices'   => array(
		'grid1' => $image_url . 'product-box.svg',
		'grid2' => $image_url . 'product-box-center.svg',
		'grid3' => $image_url . 'product-box-wide.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'select',
	'settings'  => 'product_hover',
	'transport' => $transport,
	'label'     => __( 'سبک شناور تصویر محصول', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 'fade_in_back',
	'choices'   => array(
		'none'         => __( 'None', 'flatsome-admin' ),
		'fade_in_back' => __( 'Back Image - Fade In', 'flatsome-admin' ),
		'zoom_in'      => __( 'Back Image - Zoom In', 'flatsome-admin' ),
		'zoom'         => 'Zoom',
		'zoom-fade'    => 'Zoom Fade',
		'blur'         => 'Blur',
		'fade-in'      => 'Fade In',
		'fade-out'     => 'Fade Out',
		'glow'         => 'Glow',
		'color'        => 'Add Color',
		'grayscale'    => 'Grayscale',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'category_shadow',
	'label'     => __( 'سایه', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 0,
	'choices'   => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'slider',
	'settings'  => 'category_shadow_hover',
	'label'     => __( 'سایه : هاور', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 0,
	'choices'   => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 1,
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-image',
	'settings'  => 'add_to_cart_icon',
	'label'     => __( 'دکمه افزودن به سبد خرید', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 'disable',
	'choices'   => array(
		'disable' => $image_url . 'product-box.svg',
		'show'    => $image_url . 'product-box-add-to-cart-icon.svg',
		'button'  => $image_url . 'product-box-add-to-cart-button.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'select',
	'settings'  => 'add_to_cart_style',
	'label'     => __( 'طرح دکمه', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 'outline',
	'choices'   => array(
		'flat'      => __( 'ساده', 'flatsome-admin' ),
		'outline'   => __( 'خط خارجی', 'flatsome-admin' ),
		'underline' => __( 'خط زیر', 'flatsome-admin' ),
		'shade'     => __( 'سایه', 'flatsome-admin' ),
		'bevel'     => __( 'بول', 'flatsome-admin' ),
		'gloss'     => __( 'شیشه ای', 'flatsome-admin' ),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'product_box_category',
	'transport' => $transport,
	'label'     => __( 'نمایش دسته بندی', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'product_box_rating',
	'transport' => $transport,
	'label'     => __( 'نمایش امتیاز', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'product_box_review_count',
	'transport' => $transport,
	'label'     => __( 'نمایش شمارش دیدگاه', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'short_description_in_grid',
	'transport' => $transport,
	'label'     => __( 'نمایش توضیحات خلاصه', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => '0',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings'  => 'disable_quick_view',
	'transport' => $transport,
	'label'     => __( 'غیرفعال کردن مشاهده سریع', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'default'   => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'checkbox',
	'settings'    => 'equalize_product_box',
	'transport'   => $transport,
	'label'       => esc_attr__( 'ارتفاع مساوی آیتم ها', 'flatsome-admin' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => '0',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-image',
	'settings'  => 'bubble_style',
	'label'     => __( 'استایل حبابی', 'flatsome-admin' ),
	'section'   => 'woocommerce_product_catalog',
	'transport' => $transport,
	'default'   => 'style1',
	'choices'   => array(
		'style1' => $image_url . 'badge-circle.svg',
		'style2' => $image_url . 'badge-square.svg',
		'style3' => $image_url . 'badge-border.svg',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'checkbox',
	'settings'    => 'sale_bubble',
	'transport'   => $transport,
	'label'       => __( 'نمایش حباب حراج', 'flatsome-admin' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => 1,
) );

Flatsome_Option::add_field( 'option', array(
	'type'              => 'text',
	'settings'          => 'sale_bubble_text',
	'transport'         => $transport,
	'label'             => __( 'متن حباب حراج سفارشی', 'flatsome-admin' ),
	'section'           => 'woocommerce_product_catalog',
	'sanitize_callback' => 'wp_kses_post',
	'active_callback' => array(
		array(
			'setting'  => 'sale_bubble',
			'operator' => '!=',
			'value'    => false,
		),
	),
	'default'           => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'sale_bubble_percentage',
	'label'    => __( 'به جای "فروش! ٪ را فعال کنید"', 'flatsome-admin' ),
	'section'  => 'woocommerce_product_catalog',
	'active_callback' => array(
		array(
			'setting'  => 'sale_bubble',
			'operator' => '!=',
			'value'    => false,
		),
	),
	'default'  => '0',
) );

Flatsome_Option::add_field( 'option', array(
	'type'              => 'text',
	'settings'          => 'sale_bubble_percentage_formatting',
	'transport'         => $transport,
	'label'             => __( 'فرمت % حباب حراج', 'flatsome-admin' ),
	'description'       => __( 'نحوه نمایش فرمت تخفیف ، به عنوان مثال -{value}%', 'flatsome-admin' ),
	'section'           => 'woocommerce_product_catalog',
	'sanitize_callback' => 'wp_kses_post',
	'active_callback'   => array(
		array(
			'setting'  => 'sale_bubble_percentage',
			'operator' => '==',
			'value'    => true,
		),
		array(
			'setting'  => 'sale_bubble',
			'operator' => '!=',
			'value'    => false,
		),
	),
	'default'           => '-{value}%',
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'number',
	'settings'    => 'new_bubble_auto',
	'label'       => __( 'حباب "جدید" خودکار', 'flatsome-admin' ),
	'description' => __( 'نمایش سن محصول.', 'flatsome-admin' ),
	'section'     => 'woocommerce_product_catalog',
	'transport'   => $transport,
	'default'     => 0,
	'choices'     => array(
		'min'  => 0,
		'step' => 1,
	),
) );

if ( get_theme_mod( 'swatches' ) ) :
	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_category_swatches',
		'label'    => '',
		'section'  => 'woocommerce_product_catalog',
		'default'  => '<div class="options-title-divider">ویژگی ها</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'select',
		'settings' => 'swatches_box_attribute',
		'label'    => __( 'ویژگی محصول', 'flatsome-admin' ),
		'tooltip'  => __( 'متغیرهای محصول که ویژگی ها برای آن جمع می شوند (معمولاً ویژگی هایی که رنگ ها را تعیین می کند).', 'flatsome-admin' ),
		'section'  => 'woocommerce_product_catalog',
		'default'  => '',
		'choices'  => flatsome_get_product_attribute_taxonomies_list_by_id( array( 'option_none' => '-- None --' ) ),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'swatches_box_layout',
		'label'           => __( 'طرح', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
		),
		'default'         => '',
		'choices'         => array(
			''      => 'Normal',
			'limit' => 'Limited',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'slider',
		'settings'        => 'swatches_box_limit',
		'label'           => __( 'محدودیت', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
			array(
				'setting'  => 'swatches_box_layout',
				'operator' => '===',
				'value'    => 'limit',
			),
		),
		'default'         => 5,
		'choices'         => array(
			'min'  => 1,
			'max'  => 30,
			'step' => 1,
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'swatches_box_size',
		'label'           => __( 'اندازه', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'transport'       => $transport,
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
		),
		'default'         => '',
		'choices'         => array(
			'x-small' => 'X Small',
			'small'   => 'Small',
			''        => 'Medium',
			'large'   => 'Large',
			'x-large' => 'X Large',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'swatches_box_shape',
		'label'           => __( 'شکل', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'transport'       => $transport,
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
		),
		'default'         => '',
		'choices'         => array(
			''        => 'مربع',
			'rounded' => 'گرد شده',
			'circle'  => 'دایره',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'swatches_box_select_event',
		'label'           => __( 'انتخاب ایونت - دسکتاپ', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
		),
		'default'         => '',
		'choices'         => array(
			''      => 'با هاور',
			'click' => 'با کلیک',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'color',
		'settings'        => 'swatches_box_color_selected',
		'transport'       => 'postMessage',
		'label'           => __( 'رنگ :انتخاب شده', 'flatsome' ),
		'description'     => __( 'رنگ ثانویه به عنوان پیشفرض است', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
		),
		'default'         => '',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'swatches_box_behavior_selected',
		'label'           => __( 'رفتار:انتخاب شده', 'flatsome-admin' ),
		'description'     => __( 'وقتی که یک ویژگی که در حال حاضر انتخاب شده را کلیک می کنید.', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
		),
		'default'         => '',
		'choices'         => array(
			''         => 'مراجعه به صفحه محصول',
			'unselect' => 'عدم انتخاب ویژگی',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'swatches_box_update_urls',
		'label'           => __( 'آپدیت لینک ها برای ویژگی های انتخاب شده', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
		),
		'default'         => 1,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'swatches_box_reset',
		'label'           => __( 'ریست خودکار انتخاب شده ها', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
		),
		'default'         => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'swatches_box_reset_limited',
		'label'           => __( 'ریست محدود', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
			array(
				'setting'  => 'swatches_box_layout',
				'operator' => '==',
				'value'    => 'limit',
			),
			array(
				'setting'  => 'swatches_box_reset',
				'operator' => '!=',
				'value'    => 0,
			),
		),
		'default'         => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'swatches_box_reset_extent',
		'label'           => __( 'بازنشانی وسعت', 'flatsome-admin' ),
		'description'     => __( 'ناحیه ای که نشانگر باید برای تنظیم مجدد بگذارد.', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
			array(
				'setting'  => 'swatches_box_reset',
				'operator' => '!=',
				'value'    => 0,
			),
		),
		'default'         => '',
		'choices'         => array(
			''            => __( 'ویژگی', 'flatsome-admin' ),
			'product-box' => __( 'باکس محصول', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'slider',
		'settings'        => 'swatches_box_reset_time',
		'label'           => __( 'زمان ریست', 'flatsome-admin' ),
		'description'     => __( 'بر حسب میلی ثانیه (1000ms = 1sec).', 'flatsome-admin' ),
		'section'         => 'woocommerce_product_catalog',
		'active_callback' => array(
			array(
				'setting'  => 'swatches_box_attribute',
				'operator' => '!=',
				'value'    => '',
			),
			array(
				'setting'  => 'swatches_box_reset',
				'operator' => '!=',
				'value'    => 0,
			),
		),
		'default'         => 300,
		'choices'         => array(
			'min'  => 100,
			'max'  => 10000,
			'step' => 100,
		),
	) );
endif;
