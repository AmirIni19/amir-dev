<?php

Flatsome_Option::add_section( 'product-page', array(
	'title' => __( 'صفحه محصول', 'flatsome-admin' ),
	'panel' => 'woocommerce',
) );

function flatsome_customizer_shop_product_page_options() {
	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_product_layout',
		'label'    => __( '', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => '<div class="options-title-divider">طرح</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'radio-image',
		'settings' => 'product_layout',
		'label'    => __( 'طرح محصول', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => flatsome_product_layout(),
		'choices'  => array(
			'no-sidebar'          => flatsome_customizer_images_uri() . '/layout-no-sidebar.svg',
			'left-sidebar'        => flatsome_customizer_images_uri() . '/layout-left.svg',
			'left-sidebar-full'   => flatsome_customizer_images_uri() . '/layout-left-full.svg',
			'left-sidebar-small'  => flatsome_customizer_images_uri() . '/layout-left-small.svg',
			'right-sidebar'       => flatsome_customizer_images_uri() . '/layout-right.svg',
			'right-sidebar-small' => flatsome_customizer_images_uri() . '/layout-right-small.svg',
			'right-sidebar-full'  => flatsome_customizer_images_uri() . '/layout-right-full.svg',
			'gallery-wide'        => flatsome_customizer_images_uri() . '/layout-wide-gallery.svg',
			'stacked-right'       => flatsome_customizer_images_uri() . '/product-stacked.svg',
			'custom'              => flatsome_customizer_images_uri() . '/layout-custom.svg',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'product_custom_layout',
		'label'           => __( 'طرح محصول سفارشی', 'flatsome' ),
		'description'     => __( 'Create a custom product layout by using the UX Builder. You need to select a Block and then open it in the UX Builder from a product page in the front-end.', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => array(
			array(
				'setting'  => 'product_layout',
				'operator' => '==',
				'value'    => 'custom',
			),
		),
		'default'         => false,
		'choices'         => flatsome_customizer_blocks(),
	) );

	$hide_on_gallery_wide   = array(
		'setting'  => 'product_layout',
		'operator' => '!==',
		'value'    => 'gallery-wide',
	);
	$hide_on_custom_product = array(
		'setting'  => 'product_layout',
		'operator' => '!==',
		'value'    => 'custom',
	);

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'checkbox',
		'settings' => 'product_offcanvas_sidebar',
		'label'    => __( 'سایدبار آف کانواس موبایل', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-image',
		'settings'        => 'product_header',
		'label'           => __( 'سربرگ محصول', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => '',
		'active_callback' => array(
			$hide_on_gallery_wide,
			$hide_on_custom_product,
		),
		'choices'         => array(
			''                => flatsome_customizer_images_uri() . '/product-title.svg',
			'top'             => flatsome_customizer_images_uri() . '/product-title-top.svg',
			'featured'        => flatsome_customizer_images_uri() . '/product-title-featured.svg',
			'featured-center' => flatsome_customizer_images_uri() . '/product-title-featured-center.svg',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'checkbox',
		'settings' => 'product_header_transparent',
		'label'    => __( 'هدر شفاف', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'product_next_prev_nav',
		'active_callback' => array(
			$hide_on_gallery_wide,
			$hide_on_custom_product,
		),
		'label'           => __( 'ناوبری محصول قبل و بعد', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => 1,
	) );

	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_product_gallery',
		'label'    => __( '', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => '<div class="options-title-divider">گالری</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'product_image_width',
		'label'           => __( 'عرض تصویرمحصول', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => function () {
			return ! get_theme_mod( 'product_gallery_woocommerce' )
						&& get_theme_mod( 'product_layout' ) !== 'gallery-wide'
						&& get_theme_mod( 'product_layout' ) !== 'custom';
		},
		'transport'       => 'postMessage',
		'default'         => '6',
		'choices'         => array(
			'8' => __( '8/12', 'flatsome-admin' ),
			'7' => __( '7/12', 'flatsome-admin' ),
			'6' => __( '6/12 (50%)', 'flatsome-admin' ),
			'5' => __( '5/12', 'flatsome-admin' ),
			'4' => __( '4/12', 'flatsome-admin' ),
			'3' => __( '3/12', 'flatsome-admin' ),
			'2' => __( '2/12', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-image',
		'settings'        => 'product_image_style',
		'label'           => __( 'استایل تصویر محصول', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => function () {
			return ! get_theme_mod( 'product_gallery_woocommerce' )
						&& get_theme_mod( 'product_layout' ) !== 'gallery-wide'
						&& get_theme_mod( 'product_layout' ) !== 'custom'
						&& get_theme_mod( 'product_layout' ) !== 'stacked-right';
		},
		'default'         => 'normal',
		'choices'         => array(
			'normal'   => flatsome_customizer_images_uri() . '/product-gallery.svg',
			'vertical' => flatsome_customizer_images_uri() . '/product-gallery-vertical.svg',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-image',
		'settings'        => 'product_gallery_grid_layout',
		'label'           => __( 'طرج گرید', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'product_layout',
				'operator' => '===',
				'value'    => 'stacked-right',
			),
		),
		'choices'         => array(
			''      => flatsome_customizer_images_uri() . '/product-gallery-grid-1.svg',
			'1-2'   => flatsome_customizer_images_uri() . '/product-gallery-grid-1-2.svg',
			'2'     => flatsome_customizer_images_uri() . '/product-gallery-grid-2.svg',
			'3-1-2' => flatsome_customizer_images_uri() . '/product-gallery-grid-3-1-2.svg',
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'product_gallery_slider_type',
		'active_callback' => function () {
			return ! get_theme_mod( 'product_gallery_woocommerce' )
			       && get_theme_mod( 'product_layout' ) !== 'gallery-wide';
		},
		'label'           => esc_html__( 'Type', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => '',
		'choices'         => array(
			''     => esc_html__( 'Slide', 'flatsome-admin' ),
			'fade' => esc_html__( 'Fade', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'product_lightbox',
		'active_callback' => function() {
			return ! get_theme_mod( 'product_gallery_woocommerce' );
		},
		'label'           => __( 'لایتباکس تصویر محصول', 'flatsome-admin' ),
		'description'     => __( 'هنگام کلیک روی تصویر در گالری ، تصاویر را در یک لایتباکس نشان دهید. برای این که به درستی کار کند ممکن است لازم باشد Customizer را ذخیره و بسته کنید.', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => 'default',
		'choices'         => array(
			'default'     => __( 'لایتباکس جدید ووکامرس 3.0', 'flatsome-admin' ),
			'flatsome'    => __( 'لایتباکس فلتسام', 'flatsome-admin' ),
			'woocommerce' => __( 'لایتباکس قدیمی ووکامرس', 'flatsome-admin' ),
			'disabled'    => __( 'غیرفعال کردن لایتباکس', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'product_zoom',
		'active_callback' => function () {
			return ! get_theme_mod( 'product_gallery_woocommerce' )
						&& get_theme_mod( 'product_layout' ) !== 'gallery-wide';
		},
		'label'           => __( 'زوم هاور تصویر محصول', 'flatsome-admin' ),
		'description'     => __( 'Show a zoomed version of image when hovering gallery', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'product_sticky_gallery',
		'active_callback' => function () {
			$product_layout = get_theme_mod( 'product_layout' );

			return $product_layout !== 'gallery-wide'
					&& $product_layout !== 'custom';
		},
		'label'           => esc_html__( 'گالری چسبنده', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'product_sticky_gallery_mode',
		'label'           => esc_html__( 'حالت چسبنده', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => '',
		'choices'         => array(
			''           => esc_html__( 'CSS (native)', 'flatsome-admin' ),
			'javascript' => esc_html__( 'JavaScript (enhanced)', 'flatsome-admin' ),
		),
		'active_callback' => array(
			$hide_on_gallery_wide,
			$hide_on_custom_product,
			array(
				'setting'  => 'product_sticky_gallery',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_html_woocommerce_image_shortcut_product',
		'label'    => __( '', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => '<button style="margin-top: 15px; margin-bottom:15px" class="button button-primary" data-to-section="woocommerce_product_images">تنظیمات تصویر ووکامرس →</button>',
	) );

	Flatsome_Option::add_field( '', array(
		'type'            => 'custom',
		'settings'        => 'custom_section_gallery_message',
		'label'           => __( '', 'flatsome-admin' ),
		'active_callback' => function () {
			return get_theme_mod( 'product_gallery_woocommerce' ) ? true : false;
		},
		'section'         => 'product-page',
		'default'         => '<span style="margin-top: -10px" class="description customize-control-description">The default WooCommerce gallery has been activated in section Advanced → WooCommerce. Multiple Flatsome gallery options are disabled.</span>',
	) );

	Flatsome_Option::add_field( '', array(
		'type'            => 'custom',
		'settings'        => 'custom_title_product_info',
		'label'           => __( '', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => '<div class="options-title-divider">توضیحات خلاصه محصول</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'product_info_align',
		'label'           => __( 'چینش متن', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => array(
			$hide_on_gallery_wide,
			$hide_on_custom_product,
		),
		'default'         => 'left',
		'choices'         => array(
			'left'   => __( 'چپ', 'flatsome-admin' ),
			'center' => __( 'مرکز', 'flatsome-admin' ),
			'right'  => __( 'راست', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'product_info_form',
		'active_callback' => array(
			$hide_on_custom_product,
		),
		'label'           => __( 'استایل فرم', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => '',
		'choices'         => array(
			''     => __( 'Default', 'flatsome-admin' ),
			'flat' => __( 'Flat', 'flatsome-admin' ),
			'minimal' => __( 'Minimal', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'product_title_divider',
		'label'           => __( 'جداکننده نام محصول', 'flatsome-admin' ),
		'active_callback' => array(
			$hide_on_custom_product,
		),
		'section'         => 'product-page',
		'default'         => 1,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'product_brands',
		'label'           => __( 'نمایش تصویر برند', 'flatsome-admin' ),
		'active_callback' => array(
			$hide_on_custom_product,
		),
		'section'         => 'product-page',
		'default'         => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'product_info_review_count',
		'active_callback' => array(
			$hide_on_custom_product,
		),
		'label'           => __( 'نمایش تعداد دیدگاه', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => false,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'product_info_review_count_style',
		'label'           => __( 'استایل شمارشگر', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => array(
			$hide_on_custom_product,
			array(
				'setting'  => 'product_info_review_count',
				'operator' => '==',
				'value'    => true,
			),
		),
		'default'         => 'inline',
		'choices'         => array(
			'tooltip' => __( 'Tooltip', 'flatsome-admin' ),
			'stacked' => __( 'Stacked', 'flatsome-admin' ),
			'inline'  => __( 'Inline', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'checkbox',
		'settings' => 'product_sticky_cart',
		'label'    => esc_html__( 'دکمه افزودن به سبد خرید چسبنده', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'checkbox',
		'settings' => 'product_buy_now',
		'label'    => esc_html__( 'خرید سریع', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => 0,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'product_buy_now_redirect',
		'label'           => esc_html__( 'ریدایرکت دکمه خرید سریع', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => array(
			array(
				'setting'  => 'product_buy_now',
				'operator' => '==',
				'value'    => true,
			),
		),
		'default'         => 'checkout',
		'choices'         => array(
			'checkout' => esc_html__( 'Checkout page', 'flatsome-admin' ),
			'cart'     => esc_html__( 'صفحه سبد خرید', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'product_info_meta',
		'active_callback' => array(
			$hide_on_gallery_wide,
			$hide_on_custom_product,
		),
		'label'           => __( 'نمایش متا / دسته بندی ها', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => 1,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'checkbox',
		'settings'        => 'product_info_share',
		'active_callback' => array(
			$hide_on_custom_product,
		),
		'label'           => __( 'نمایش آیکون اشتراک گذاری', 'flatsome-admin' ),
		'section'         => 'product-page',
		'default'         => 1,
	) );

	if ( get_theme_mod( 'swatches' ) ) :
		Flatsome_Option::add_field( '', array(
			'type'     => 'custom',
			'settings' => 'custom_title_swatches',
			'label'    => '',
			'section'  => 'product-page',
			'default'  => '<div class="options-title-divider">ویژگی ها</div>',
		) );

		Flatsome_Option::add_field( 'option', array(
			'type'     => 'radio-image',
			'settings' => 'swatches_layout',
			'label'    => __( 'طرح', 'flatsome' ),
			'section'  => 'product-page',
			'default'  => '',
			'choices'  => array(
				''        => flatsome_customizer_images_uri() . '/product-swatches.svg',
				'stacked' => flatsome_customizer_images_uri() . '/product-swatches-stacked.svg',
			),
		) );

		Flatsome_Option::add_field( 'option', array(
			'type'        => 'checkbox',
			'settings'    => 'swatches_tooltip',
			'label'       => __( 'تولتیپ', 'flatsome' ),
			'description' => __( 'یک راهنمای ابزار با توضیحات اصطلاح یا اصطلاح نشان دهید.', 'flatsome' ),
			'section'     => 'product-page',
			'default'     => 1,
		) );

		Flatsome_Option::add_field( 'option', array(
			'type'        => 'checkbox',
			'settings'    => 'swatches_out_of_stock_inactive',
			'label'       => __( 'غیرفعال کردن محصولات ناموجود', 'flatsome' ),
			'description' => __( 'Show out of stock items as inactive.', 'flatsome' ),
			'section'     => 'product-page',
			'default'     => 0,
		) );

		Flatsome_Option::add_field( 'option', array(
			'type'     => 'checkbox',
			'settings' => 'swatches_disable_deselect',
			'label'    => __( 'حذف انتخاب را غیرفعال کنید', 'flatsome' ),
			'section'  => 'product-page',
			'default'  => 0,
		) );

		Flatsome_Option::add_field( 'option', array(
			'type'        => 'color',
			'settings'    => 'swatches_color_selected',
			'transport'   => 'postMessage',
			'label'       => __( 'رنگ : انتخاب شده', 'flatsome' ),
			'description' => __( 'Default is Secondary color', 'flatsome-admin' ),
			'section'     => 'product-page',
			'default'     => '',
		) );
	endif;

	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_product_tabs',
		'label'    => __( '', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => '<div class="options-title-divider">تب ها</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'product_display',
		'label'           => __( 'سبک زبانه های محصول', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => array(
			$hide_on_custom_product,
		),
		'default'         => 'tabs',
		'choices'         => array(
			'tabs'                => __( 'Line Tabs', 'flatsome-admin' ),
			'tabs_normal'         => __( 'Tabs Normal', 'flatsome-admin' ),
			'line-grow'           => __( 'Line Tabs - Grow', 'flatsome-admin' ),
			'tabs_vertical'       => __( 'Tabs vertical', 'flatsome-admin' ),
			'tabs_pills'          => __( 'Pills', 'flatsome-admin' ),
			'tabs_outline'        => __( 'Outline', 'flatsome-admin' ),
			'sections'            => __( 'Sections', 'flatsome-admin' ),
			'accordian'           => __( 'Accordion', 'flatsome-admin' ),
			'accordian-collapsed' => __( 'Accordion - Collapsed', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'product_tabs_align',
		'label'           => __( 'چنیش تب های محصول', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => array(
			$hide_on_custom_product,
		),
		'default'         => 'left',
		'choices'         => array(
			'left'   => __( 'چپ', 'flatsome-admin' ),
			'center' => __( 'مرکز', 'flatsome-admin' ),
			'right'  => __( 'راست', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'              => 'text',
		'settings'          => 'tab_title',
		'label'             => __( 'تب عمومی عنوان محصول', 'flatsome-admin' ),
		'section'           => 'product-page',
		'sanitize_callback' => 'flatsome_custom_sanitize',
		'default'           => '',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'              => 'textarea',
		'settings'          => 'tab_content',
		'label'             => __( 'محتوای تب عمومی محصول', 'flatsome-admin' ),
		'section'           => 'product-page',
		'sanitize_callback' => 'flatsome_custom_sanitize',
		'default'           => '',
	) );


	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_product_related',
		'label'    => __( '', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => '<div class="options-title-divider">محصولات مرتبط</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'product_upsell',
		'label'           => __( 'Product Upsell', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => array(
			$hide_on_gallery_wide,
			$hide_on_custom_product,
		),
		'default'         => 'sidebar',
		'choices'         => array(
			'sidebar'  => __( 'در سایدبار', 'flatsome-admin' ),
			'bottom'   => __( 'زیر توضیحات', 'flatsome-admin' ),
			'disabled' => __( 'غیرفعال', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'            => 'select',
		'settings'        => 'related_products',
		'label'           => __( 'استایل محوصلات مرتبط', 'flatsome-admin' ),
		'section'         => 'product-page',
		'active_callback' => array(
			$hide_on_custom_product,
		),
		'default'         => 'slider',
		'choices'         => array(
			'slider' => __( 'Slider', 'flatsome-admin' ),
			'grid'   => __( 'Grid', 'flatsome-admin' ),
			'hidden' => __( 'Disabled', 'flatsome-admin' ),
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'slider',
		'settings' => 'related_products_pr_row',
		'label'    => __( 'محصولات در هر ردیف - دسکتاپ', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => 4,
		'choices'  => array(
			'min'  => 1,
			'max'  => 6,
			'step' => 1,
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'slider',
		'settings' => 'related_products_pr_row_tablet',
		'label'    => __( 'محصولات در هر ردیف - تبلت', 'flatsome-admin' ) . ' (جدید)',
		'section'  => 'product-page',
		'default'  => 3,
		'choices'  => array(
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'slider',
		'settings' => 'related_products_pr_row_mobile',
		'label'    => __( 'محصولات در هر ردیف - موبایل', 'flatsome-admin' ) . ' (جدید)',
		'section'  => 'product-page',
		'default'  => 2,
		'choices'  => array(
			'min'  => 1,
			'max'  => 3,
			'step' => 1,
		),
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'     => 'text',
		'settings' => 'max_related_products',
		'label'    => __( 'حداکثر تعداد محصولات مرتبط', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => '12',
	) );

	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_product_html',
		'label'    => __( '', 'flatsome-admin' ),
		'section'  => 'product-page',
		'default'  => '<div class="options-title-divider">HTML سفارشی</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'              => 'textarea',
		'settings'          => 'html_before_add_to_cart',
		'label'             => __( 'HTML قبل از دکمه افزودن به سبد خرید', 'flatsome-admin' ),
		'section'           => 'product-page',
		'sanitize_callback' => 'flatsome_custom_sanitize',
		'default'           => '',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'              => 'textarea',
		'settings'          => 'html_after_add_to_cart',
		'label'             => __( 'HTML بعد از دکمه افزودن به سبد خرید', 'flatsome-admin' ),
		'section'           => 'product-page',
		'sanitize_callback' => 'flatsome_custom_sanitize',
		'default'           => '',
	) );
}
add_action( 'init', 'flatsome_customizer_shop_product_page_options' );
