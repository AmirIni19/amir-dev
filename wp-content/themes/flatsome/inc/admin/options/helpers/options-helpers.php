<?php

//Access the WordPress Pages via an Array
$list_pages            = array();
$list_pages_by_id      = array();
$of_pages_obj          = get_pages('sort_column=post_parent,menu_order');
$list_pages['0']       = 'Select a page:';
$list_pages_by_id['0'] = 'Select a page:';
foreach ($of_pages_obj as $of_page) {
    $list_pages[$of_page->post_name] = $of_page->post_title;
    $list_pages_by_id[$of_page->ID] = $of_page->post_title;
}

function flatsome_customizer_blocks() {
  $blocks = array( false => '-- None --' );
  $items  = flatsome_get_post_type_items( 'blocks' );

  if ( ! empty( $items ) ) {
    foreach ( $items as $item ) {
      $blocks[ $item->post_name ] = $item->post_title;
    }
  }

  return $blocks;
}

// Set default transport
$transport = 'postMessage';
if ( ! isset( $wp_customize->selective_refresh ) ) {
  $transport = 'refresh';
}

function flatsome_customizer_transport() {
  global $wp_customize;
  return ! isset( $wp_customize->selective_refresh )
    ? 'refresh'
    : 'postMessage';
}

$image_url = get_template_directory_uri().'/inc/admin/customizer/img/';

function flatsome_customizer_images_uri() {
  return get_template_directory_uri() . '/inc/admin/customizer/img';
}


function flatsome_customizer_nav_elements() {
	return apply_filters( 'flatsome_header_element', array(
		'cart'          => __( 'سبد خرید', 'flatsome-admin' ),
		'account'       => __( 'حساب کاربری', 'flatsome-admin' ),
		'menu-icon'     => __( '☰ آیکون ناوبری', 'flatsome-admin' ),
		'nav'           => __( 'فهرست اصلی', 'flatsome-admin' ),
		'nav-secondary' => __( 'فهرست دوم', 'flatsome-admin' ),
		'nav-top'       => __( 'فهرست سربرگ بالا', 'flatsome-admin' ),
		'nav-vertical'  => __( '☰ فهرست آبشاری', 'flatsome-admin' ),
		'search'        => __( 'آیکون جستجو', 'flatsome-admin' ),
		'search-form'   => __( 'فرم جستجو', 'flatsome-admin' ),
		'social'        => __( 'آیکون های اجتماعی', 'flatsome-admin' ),
		'contact'       => __( 'تماس با ما', 'flatsome-admin' ),
		'button-1'      => __( 'دکمه 1', 'flatsome-admin' ),
		'button-2'      => __( 'دکمه 2', 'flatsome-admin' ),
		'checkout'      => __( 'دکمه صورتحساب', 'flatsome-admin' ),
		'newsletter'    => __( 'خبرنامه', 'flatsome-admin' ),
		'languages'     => __( 'زبان ها', 'flatsome-admin' ),
		'divider'       => __( '|', 'flatsome-admin' ),
		'divider_2'     => __( '|', 'flatsome-admin' ),
		'divider_4'     => __( '|', 'flatsome-admin' ),
		'divider_3'     => __( '|', 'flatsome-admin' ),
		'divider_5'     => __( '|', 'flatsome-admin' ),
		'block-1'       => __( 'Block 1', 'flatsome-admin' ),
		'block-2'       => __( 'Block 2', 'flatsome-admin' ),
		'block-2'       => __( 'Block 2', 'flatsome-admin' ),
		'block-3'       => __( 'Block 3', 'flatsome-admin' ),
		'html'          => __( 'HTML 1', 'flatsome-admin' ),
		'html-2'        => __( 'HTML 2', 'flatsome-admin' ),
		'html-3'        => __( 'HTML 3', 'flatsome-admin' ),
		'html-4'        => __( 'HTML 4', 'flatsome-admin' ),
		'html-5'        => __( 'HTML 5', 'flatsome-admin' ),
	) );
}

// Add Hooked Header Elements
$nav_elements = flatsome_customizer_nav_elements();

$visibility= array(
  '' => __( 'Show for All', 'flatsome-admin' ),
  'hide-for-small' => __( 'پنهان کردن برای موبایل', 'flatsome-admin' ),
  'hide-for-medium' => __( 'پنهان کردن برای تبلت', 'flatsome-admin' ),
  'show-for-small' => __( 'نمایش برای موبایل', 'flatsome-admin' ),
  'show-for-medium' => __( 'نمایش برای تبلت', 'flatsome-admin' ),
  'show-for-large' => __( 'نمایش برای دسکتاپ', 'flatsome-admin' ),
);

$nav_styles_img = array(
  '' => $image_url . 'nav-default.svg',
  'divided' => $image_url . 'nav-divided.svg',
  'line' => $image_url . 'nav-line.svg',
  'line-grow' => $image_url . 'nav-line-grow.svg',
  'line-bottom' => $image_url . 'nav-line-bottom.svg',
  'box' => $image_url . 'nav-box.svg',
  'outline' => $image_url . 'nav-outline.svg',
  'pills' => $image_url . 'nav-pills.svg',
  'tabs' => $image_url . 'nav-tabs.svg'
);

$smart_links = __( '', 'flatsome-admin' );

$sizes = array(
    'xxlarge' => __( 'XX Large', 'flatsome-admin' ),
    'xlarge' => __( 'X Large', 'flatsome-admin' ),
    'larger' => __( 'Larger', 'flatsome-admin' ),
    'large' => __( 'Large', 'flatsome-admin' ),
    'medium' => __( 'Medium', 'flatsome-admin' ),
    'small' => __( 'Small', 'flatsome-admin' ),
    'smaller' => __( 'Smaller', 'flatsome-admin' ),
    'xsmall' => __( 'X Small', 'flatsome-admin' ),
);

$button_styles = array(
	''          => __( 'پیشفرض', 'flatsome-admin' ),
	'outline'   => __( 'خط بیرونی', 'flatsome-admin' ),
	'underline' => __( 'خط زیرین', 'flatsome-admin' ),
	'shade'     => __( 'سایه', 'flatsome-admin' ),
	'bevel'     => __( 'برجسته', 'flatsome-admin' ),
	'gloss'     => __( 'شیشه ای', 'flatsome-admin' ),
	'link'      => __( 'لینک', 'flatsome-admin' ),
);

$nav_sizes = array(
  'xsmall' => __( 'XS', 'flatsome-admin' ),
  'small' => __( 'S', 'flatsome-admin' ),
  '' => __( 'Default', 'flatsome-admin' ),
  'medium' => __( 'M', 'flatsome-admin' ),
  'large' => __( 'L', 'flatsome-admin' ),
  'xlarge' => __( 'XL', 'flatsome-admin' ),
);

$nav_spacing = array(
  'xsmall' => __( 'XS', 'flatsome-admin' ),
  'small' => __( 'S', 'flatsome-admin' ),
  '' => __( 'Default', 'flatsome-admin' ),
  'medium' => __( 'M', 'flatsome-admin' ),
  'large' => __( 'L', 'flatsome-admin' ),
  'xlarge' => __( 'XL', 'flatsome-admin' ),
);


$bg_repeat = array(
  "repeat" => "کاشی",
  "repeat-x" => "تکرار X",
  "repeat-y" => "تکرار Y",
  "no-repeat" => "بدون تکرار"
);
