<?php

// CART

Flatsome_Option::add_section( 'cart-checkout', array(
	'title'       => __( 'سبد خرید', 'flatsome-admin' ),
	'panel' => 'woocommerce',
  'priority'    => 1000
) );


Flatsome_Option::add_field( 'option', array(
  'type'        => 'radio-buttonset',
  'settings'     => 'cart_layout',
  'label'       => __( 'طرح سبد خرید', 'flatsome-admin' ),
  'section'     => 'cart-checkout',
  'default'     => '',
  'choices'     => array(
    '' => __( 'Default', 'flatsome-admin' ),
    'simple' => __( 'ساده', 'flatsome-admin' ),
    'focused' => __( 'متمرکز', 'flatsome-admin' ),
  ),
));


Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'cart_sticky_sidebar',
  'label'       => __( 'سایدبار چسبنده', 'flatsome-admin' ),
  'section'     => 'cart-checkout',
  'default' => 0
));

Flatsome_Option::add_field( 'option', array(
	'type'            => 'select',
	'settings'        => 'cart_sticky_sidebar_mode',
	'label'           => __( 'حالت چسبنده', 'flatsome-admin' ),
	'section'         => 'cart-checkout',
	'default'         => '',
	'choices'         => array(
		''           => __( 'CSS (native)', 'flatsome-admin' ),
		'javascript' => __( 'جاوا اسکریپت (پیشرفت)', 'flatsome-admin' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'cart_sticky_sidebar',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'cart_auto_refresh',
	'label'    => __( 'بروزرسانی خودکار در تغییر تعداد', 'flatsome-admin' ),
	'section'  => 'cart-checkout',
	'default'  => 0,
) );


Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'cart_boxed_shipping_labels',
  'label'       => __( 'لیبل های نقل و انتقالات جعبه شکل', 'flatsome' ),
  'section'     => 'cart-checkout',
  'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'cart_estimate_text',
  'label'       => __( 'نمایش محاسبه نقل و انتقال', 'flatsome' ),
  'section'     => 'cart-checkout',
  'default' => 1
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'cart_shipping',
	'label'    => esc_html__( 'نمایش ارسال رایگان', 'flatsome' ),
	'section'  => 'cart-checkout',
	'default'  => 0,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'cart_steps_title',
	'label'    => '',
	'section'  => 'cart-checkout',
	'default'  => '<div class="options-title-divider">مراحل</div>',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_steps_size',
	'label'    => __( 'اندازه مراحل', 'flatsome-admin' ),
	'section'  => 'cart-checkout',
	'default'  => 'h2',
	'choices'  => array(
		'h2' => __( 'پیشفرض', 'flatsome-admin' ),
		'h3' => __( 'کوچک', 'flatsome-admin' ),
		'h4' => __( 'کوچک تر', 'flatsome-admin' ),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_steps_case',
	'label'    => esc_attr__( 'مراحل با حروف بزرگ', 'flatsome-admin' ),
	'section'  => 'cart-checkout',
	'default'  => 'uppercase',
	'choices'  => array(
		'uppercase' => 'UPPERCASE',
		'none'      => 'Normal',
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'cart_steps_numbers',
	'label'    => __( 'اعداد مراحل', 'flatsome-admin' ),
	'section'  => 'cart-checkout',
	'default'  => 0,
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'html_cart_title',
	'label'    => '',
	'section'  => 'cart-checkout',
	'default'  => '<div class="options-title-divider">محتوای سفارشی</div>',
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'html_cart_sidebar',
	'transport' => $transport,
	'label'       => __( 'محتوای سایدبار سبدخرید', 'flatsome-admin' ),
	'help'        => __( 'Enter HTML that will show on bottom of cart sidebar' ),
	'section'     => 'cart-checkout',
	'default'     => '',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'html_cart_footer',
	'transport' => $transport,
	'label'       => __( 'محتوای بعد از سبدخرید', 'flatsome-admin' ),
	'help'        => __( 'Enter HTML or Shortcodes that will show after cart here.' ),
	'section'     => 'cart-checkout',
	'default'     => '',
));


// CHECKOUT

Flatsome_Option::add_field( 'option', array(
  'type'        => 'radio-buttonset',
  'settings'     => 'checkout_layout',
  'priority' => 1,
  'label'       => __( 'طرح صورتحساب', 'flatsome-admin' ),
  'section'     => 'woocommerce_checkout',
  'default'     => '',
  'choices'     => array(
    '' => __( 'پیشفرض', 'flatsome-admin' ),
    'simple' => __( 'ساده', 'flatsome-admin' ),
    'focused' => __( 'متمرکز', 'flatsome-admin' ),
  ),
));


if ( is_nextend_facebook_login() || is_nextend_google_login() ) {
	Flatsome_Option::add_field( 'option',  array(
		'type'        => 'checkbox',
		'settings'     => 'facebook_login_checkout',
		'label'       => __( 'دکمه های شبکه های اجتماعی', 'flatsome-admin' ),
		'section'     => 'woocommerce_checkout',
		'default' => 0
	));
}

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-buttonset',
	'settings' => 'checkout_terms_and_conditions',
	'label'    => __( 'استایل لینک قوانین و مقررات', 'flatsome-admin' ) . ' (NEW)',
	'section'  => 'woocommerce_checkout',
	'default'  => '',
	'choices'  => array(
		''         => __( 'پیشفرض', 'flatsome-admin' ),
		'tab'      => __( 'تب جدید', 'flatsome-admin' ),
		'lightbox' => __( 'لایتباکس', 'flatsome-admin' ),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'            => 'checkbox',
	'settings'        => 'terms_and_conditions_lightbox_buttons',
	'transport'       => $transport,
	'label'           => __( 'دکمه موافقت با شرایط و قوانین سایت', 'flatsome-admin' ) . ' (NEW)',
	'section'         => 'woocommerce_checkout',
	'default'         => 1,
	'active_callback' => array(
		array(
			'setting'  => 'checkout_terms_and_conditions',
			'operator' => '==',
			'value'    => 'lightbox',
		),
	),
) );

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'checkout_floating_labels',
  'label'       => __( 'لیبل فیلد های شناور', 'flatsome-admin' ),
  'section'     => 'woocommerce_checkout',
  'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'checkout_fields_email_first',
  'label'       => __( 'انتقال فیلد ایمیل به قسمت اول', 'flatsome-admin' ),
  'section'     => 'woocommerce_checkout',
  'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'checkout_sticky_sidebar',
  'label'       => __( 'سایدبار چسبنده', 'flatsome-admin' ),
  'section'     => 'woocommerce_checkout',
  'default' => 0
));

Flatsome_Option::add_field( 'option', array(
	'type'            => 'select',
	'settings'        => 'checkout_sticky_sidebar_mode',
	'label'           => __( 'حالت چسبنده', 'flatsome-admin' ),
	'section'         => 'woocommerce_checkout',
	'default'         => '',
	'choices'         => array(
		''           => __( 'CSS (native)', 'flatsome-admin' ),
		'javascript' => __( 'جاوااسکریپت » پیشرفته', 'flatsome-admin' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'checkout_sticky_sidebar',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'checkout_shipping',
	'label'    => esc_html__( 'نمایش ارسال رایگان', 'flatsome' ),
	'section'  => 'woocommerce_checkout',
	'default'  => 0,
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'html_checkout_sidebar',
	'transport' => $transport,
	'label'       => __( 'محتوای صوراحساب به صورت سایدبار کناری', 'flatsome-admin' ),
	'help'        => __( 'HTML را وارد کنید که در پایین نوار کناری تسویه حساب نشان داده می شود' ),
	'section'     => 'woocommerce_checkout',
	'default'     => '',
));
