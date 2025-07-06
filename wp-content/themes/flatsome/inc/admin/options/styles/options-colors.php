<?php
/**
 * Style & Colors
 */

Flatsome_Option::add_section( 'colors', array(
	'title'       => __( 'رنگ ها', 'flatsome-admin' ),
	'panel' => 'style',
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_colors_main',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'colors',
    'default'     => '<div class="options-title-divider">رنگ های اصلی</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
	'settings'    => 'color_primary',
    'label'       => __( 'رنگ اولیه', 'flatsome-admin' ),
	'description' => __( 'Change primary color.', 'flatsome-admin' ),
	'section'     => 'colors',
	'default'     => Flatsome_Default::COLOR_PRIMARY,
	'transport'   => $transport,
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
	'settings'    => 'color_secondary',
	'transport'   => $transport,
    'label'       => __( 'رنگ ثانویه', 'flatsome-admin' ),
	'description' => __( 'Change secondary color.', 'flatsome-admin' ),
	'default'     => Flatsome_Default::COLOR_SECONDARY,
	'section'     => 'colors',
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
	'settings'    => 'color_success',
	'transport'   => $transport,
	'label'       => __( 'رنگ موفقیت', 'flatsome-admin' ),
	'description' => __( 'Change the success color. Used for global success messages.', 'flatsome-admin' ),
	'section'     => 'colors',
	'default'     => Flatsome_Default::COLOR_SUCCESS,
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
	'settings'    => 'color_alert',
	'transport'   => $transport,
	'label'       => __( 'رنگ هشدار', 'flatsome-admin' ),
	'description' => __( 'رنگ هشدار را تغییر دهید. برای پیام های خطای کلی و غیره استفاده می شود', 'flatsome-admin' ),
	'section'     => 'colors',
	'default'     => Flatsome_Default::COLOR_ALERT,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_color_type',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'colors',
	'default'  => '<div class="options-title-divider">تایپ</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
	'settings'    => 'color_texts',
	'label'       => __( 'رنگ پایه', 'flatsome-admin' ),
	'description' => __( 'برای همه متون عادی استفاده می شود.', 'flatsome-admin' ),
	'section'     => 'colors',
	'default'     => '#777',
	'transport'   => $transport,
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
	'settings'    => 'type_headings_color',
	'label'       => __( 'رنگ تیترها', 'flatsome-admin' ),
	'description' => __( 'استفاده  برای تمامی تیترها در پس زمینه سفید', 'flatsome-admin' ),
	'section'     => 'colors',
	'default'     => '#555',
	'transport'   => $transport,
) );

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color-alpha',
	'settings'    => 'color_divider',
	'label'       => __( 'رنگ جدا کننده', 'flatsome-admin' ),
	'description' => __( 'استفاده برای جداکننده ها.', 'flatsome-admin' ),
	'section'     => 'colors',
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_type_links',
	'label'    => __( '', 'flatsome-admin' ),
	'section'  => 'colors',
	'default'  => '<div class="options-title-divider">لینک ها</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color',
	'settings'  => 'color_links',
	'label'     => __( 'رنگ لینک ها', 'flatsome-admin' ),
	'section'   => 'colors',
	'default'   => Flatsome_Default::LINK_COLOR,
	'transport' => $transport,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color',
	'settings'  => 'color_links_hover',
	'label'     => __( 'رنگ لینک ها:هاور', 'flatsome-admin' ),
	'section'   => 'colors',
	'default'   => Flatsome_Default::LINK_COLOR_HOVER,
	'transport' => $transport,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color',
	'settings'  => 'color_widget_links',
	'label'     => __( 'رنگ لینک ابزارک ها', 'flatsome-admin' ),
	'section'   => 'colors',
	'default'   => '',
	'transport' => $transport,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color',
	'settings'  => 'color_widget_links_hover',
	'label'     => __( 'رنگ لینک ابزارک ها:هاور', 'flatsome-admin' ),
	'section'   => 'colors',
	'default'   => '',
	'transport' => $transport,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_title_colors_tooltip',
	'label'    => '',
	'section'  => 'colors',
	'default'  => '<div class="options-title-divider">' . esc_html__( 'رنگ تولتیپ ها', 'flatsome' ) . '</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color',
	'settings'  => 'tooltip_color',
	'label'     => esc_html__( 'رنگ تولتیپ', 'flatsome' ),
	'section'   => 'colors',
	'default'   => Flatsome_Default::TOOLTIP_COLOR,
	'transport' => flatsome_customizer_transport(),
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color',
	'settings'  => 'tooltip_bg_color',
	'label'     => esc_html__( 'پس زمینه رنگ تولتیپ', 'flatsome' ),
	'section'   => 'colors',
	'default'   => Flatsome_Default::TOOLTIP_BG_COLOR,
	'transport' => flatsome_customizer_transport(),
) );

if ( is_woocommerce_activated() ) {
	Flatsome_Option::add_field( '', array(
		'type'     => 'custom',
		'settings' => 'custom_title_colors_shop',
		'label'    => __( '', 'flatsome-admin' ),
		'section'  => 'colors',
		'default'  => '<div class="options-title-divider">رنگ فروشگاه</div>',
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'        => 'color',
		'settings'    => 'color_checkout',
		'label'       => __( 'افزودن به سبد خرید / دکمه های پرداخت', 'flatsome-admin' ),
		'description' => __( 'تغییر دکمه های پرداخت. پیش فرض رنگ ثانویه است', 'flatsome-admin' ),
		'section'     => 'colors',
		'transport'   => $transport,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'        => 'color',
		'settings'    => 'color_sale',
		'label'       => __( 'حباب تخفیف', 'flatsome-admin' ),
		'description' => __( 'تغییر رنگ حباب تخفیف. پیش فرض رنگ ثانویه است', 'flatsome-admin' ),
		'section'     => 'colors',
		'transport'   => $transport,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'        => 'color',
		'settings'    => 'color_new_bubble_auto',
		'label'       => __( 'حباب جدید (خودکار)', 'flatsome-admin' ),
		'description' => __( 'تغییر رنگ حباب خودکار "جدید".', 'flatsome-admin' ),
		'section'     => 'colors',
		'transport'   => $transport,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'        => 'color',
		'settings'    => 'color_new_bubble',
		'label'       => __( 'حباب سفارشی', 'flatsome-admin' ),
		'description' => __( 'تغییر رنگ حباب سفارشی.', 'flatsome-admin' ),
		'section'     => 'colors',
		'transport'   => $transport,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'        => 'color',
		'settings'    => 'color_review',
		'label'       => __( 'ستاره های بازنگری', 'flatsome-admin' ),
		'description' => __( 'تغییر رنگ ستاره های نظرات', 'flatsome-admin' ),
		'section'     => 'colors',
		'transport'   => $transport,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'        => 'color',
		'settings'    => 'color_regular_price',
		'label'       => __( 'قیمت عادی', 'flatsome-admin' ),
		'description' => __( 'تغییر رنگ قیمت عادی محصول در حال فروش.', 'flatsome-admin' ),
		'section'     => 'colors',
		'transport'   => $transport,
	) );

	Flatsome_Option::add_field( 'option', array(
		'type'        => 'color',
		'settings'    => 'color_sale_price',
		'label'       => __( 'قیمت حراجی', 'flatsome-admin' ),
		'description' => __( 'تغییر رنگ قیمت فروش ویژه.', 'flatsome-admin' ),
		'section'     => 'colors',
		'transport'   => $transport,
	) );
}
