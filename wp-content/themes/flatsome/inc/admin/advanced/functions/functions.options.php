<?php
/**
 * Advanced Theme Options
 *
 * @package Flatsome/Admin/Options/Advanced
 */

add_action( 'init', 'of_options' );

if ( ! function_exists( 'of_options' ) ) {
	/**
	 * Advance Theme Options.
	 *
	 * @global array $of_options Description.
	 *
	 * @return void.
	 */
	function of_options() {
		// Access the WordPress Categories via an Array.
		$of_categories     = array();
		$of_categories_obj = get_categories( 'hide_empty=0' );
		foreach ( $of_categories_obj as $of_cat ) {
			$of_categories[ $of_cat->cat_ID ] = $of_cat->cat_name;
		}

		// Access the WordPress Pages via an Array.
		$of_pages      = array();
		$of_pages_obj  = get_pages( 'sort_column=post_parent,menu_order' );
		$of_pages['0'] = 'Select a page:';
		foreach ( $of_pages_obj as $of_page ) {
			$of_pages[ $of_page->ID ] = $of_page->post_title;
		}

		// Set the Options Array.
		global $of_options;
		$of_options = array();

		$of_options[] = array(
			'name' => 'تنظیمات عمومی',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'اسکریپت های هدر',
			'desc' => 'اسکریپت های سفارشی را درون برچسب HEAD اضافه کنید.',
			'id'   => 'html_scripts_header',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'اسکریپت های فوتر',
			'desc' => 'اسکریپت های سفارشی را که ممکن است بخواهید در پایین صفحه وب سایت خود بارگیری کنید ، اضافه کنید.',
			'id'   => 'html_scripts_footer',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'اسکریپت های بادی - بالا',
			'desc' => 'درست بعد از باز شدن برچسب BODY ، اسکریپت های سفارشی را اضافه کنید. ',
			'id'   => 'html_scripts_after_body',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'اسکریپت های بادی - پایین',
			'desc' => 'درست قبل از بسته شدن برچسب BODY ، اسکریپت های سفارشی را اضافه کنید.',
			'id'   => 'html_scripts_before_body',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'محتوای پشتیبان فلتسام نسخه 2.0',
			'id'   => 'flatsome_fallback',
			'desc' => 'جهت افزایش سرعت سایت غیرفعال کنید.',
			'std'  => 1,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'CSS سفارشی',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'تمام صفحه ها',
			'desc' => 'CSS سفارشی را اینجا اضافه کنید',
			'id'   => 'html_custom_css',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'تبلت و پایینتر',
			'desc' => 'CSS سفارشی را برای تبلت و موبایل به اینجا اضافه کنید',
			'id'   => 'html_custom_css_tablet',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'فقط موبایل',
			'desc' => 'CSS سفارشی را برای مشاهده موبایل اضافه کنید',
			'id'   => 'html_custom_css_mobile',
			'std'  => '',
			'type' => 'textarea',
		);

		// Performance.
		$of_options[] = array(
			'name' => 'Performance - عملکرد',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => ' <strong> با احتیاط استفاده کنید! اگر مشکل سازگاری افزونه دارید غیرفعال کنید. </strong>',
		);

		$of_options[] = array(
			'name' => 'پیش بارگزاری صفحات',
			'id'   => 'perf_instant_page',
			'desc' => 'قبل از کلیک کاربر برای تماشای سریع در بین صفحات ، صفحات را بارگیری کنید.',
			'std'  => 0,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'بارگزاری تنبل بنر و پس زمینه بخش ها',
			'id'   => 'lazy_load_backgrounds',
			'desc' => 'بارگیری تنبل پیش زمینه های بنر و بخش را فعال کنید.',
			'std'  => 1,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'بارگزاری تنبل تصاویر',
			'id'   => 'lazy_load_images',
			'desc' => 'بارگذاری تنبل را برای تصاویر فعال کنید. این یک تصویر Base64 خالی درون خطی با نسبت ابعاد همان تصویر اصلی تولید می کند.',
			'std'  => 0,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'غیرفعال کردن style.css قالب',
			'type' => 'checkbox',
			'id'   => 'flatsome_disable_style_css',
			'std'  => 0,
			'desc' => 'غیرفعال کردن بارگذاری style.css قالب. این پرونده فقط در صورت نیاز به اضافه کردن CSS سفارشی به آن پرونده مورد نیاز است.',
		);

		$of_options[] = array(
			'name' => 'غیرفعال کردن اسکریپت Emoji',
			'type' => 'checkbox',
			'id'   => 'disable_emoji',
			'std'  => 0,
			'desc' => 'اسکریپت های emoji WP را از قسمت جلویی حذف کنید.',
		);

		$of_options[] = array(
			'name' => 'غیرفعال کردن بلوک css',
			'type' => 'checkbox',
			'id'   => 'disable_blockcss',
			'std'  => 0,
			'desc' => 'css های پیش فرض کتابخانه بلوک cSS از وردپرس را حذف کنید',
		);

		$of_options[] = array(
			'name' => 'غیرفعال سازی مهاجرت jquery',
			'type' => 'checkbox',
			'id'   => 'jquery_migrate',
			'std'  => 0,
			'desc' => 'Remove jQuery Migrate. Most up-to-date front-end code and plugins don’t require jquery-migrate.min.js. More often than not, keeping this - simply adds unnecessary load to your site.',
		);

		// Content delivery.
		$of_options[] = array(
			'name' => 'Content Delivery - تحویل محتوا',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<h2 style="font-size:1rem; margin-top: 40px;">لودینگ آجاکس<span class="of-tag"> آزمایشی</span></h2><p style="font-size:14px">بدون بارگیری مجدد کل صفحه، محتوا را از سرور واکشی کنید. این یک ویژگی آزمایشی است و ممکن است تغییر کند. <b>اگر با مشکلات سازگاری افزونه مواجه شدید، غیرفعال کنید.</b></p><p><a target="_blank" rel="noopener" href="https://docs.uxthemes.com/article/430-pjax">اطلاعات بیشتر</a></p>',
		);

		$of_options[] = array(
			'name'    => 'صفحه بندی بلاگ',
			'id'      => 'blog_pagination',
			'std'     => '',
			'type'    => 'select',
			'options' => array(
				''     => 'صفحه بندی عادی',
				'ajax' => 'ناوبری آجاکس',
			),
		);

		if ( is_woocommerce_activated() ) {
			$of_options[] = array(
				'name'    => 'صفحه بندی فروشگاه',
				'id'      => 'shop_pagination',
				'std'     => '',
				'type'    => 'select',
				'options' => array(
					''                => 'صفحه بندی عادی',
					'ajax'            => 'ناوبری آجاکس',
					'infinite-scroll' => 'اسکرول نامحدود',
				),
			);

			$of_options[] = array(
				'name' => 'آرشیو محصولات',
				'id'   => 'shop_filter_widgets_pjax',
				'desc' => 'AJAX را برای ویجت دسته محصول و ویجت‌های فیلتر فعال کنید',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		$of_options[] = array(
			'name' => 'بازگشت به بالا',
			'id'   => 'pjax_scroll_to_top',
			'desc' => 'بعد از پیمایش آجاکس به ابتدای صفحه بروید.',
			'std'  => 0,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => '',
			'type' => '',
			'desc' => '<h2 style="font-size:1rem; margin-top: 40px;">تنظیمات اسکرول بی نهایت</h2>',
		);

		$of_options[] = array(
			'name'    => 'نوع لودینگ',
			'id'      => 'infinite_scroll_loader_type',
			'desc'    => 'انیمیشن نوع بارگیری را انتخاب کنید یا روی دکمه کلیک کنید.',
			'std'     => 'spinner',
			'type'    => 'select',
			'options' => array(
				'button'  => 'دکمه',
				'spinner' => 'چرخنده',
				'image'   => 'تصویر سفارشی',
			),
		);

		$of_options[] = array(
			'name' => 'تصویر سفارشی لودر',
			'desc' => "یک تصویر بارگیری سفارشی را آپلود یا انتخاب کنید (برای بارگیری نوع «تصویر سفارشی»).",
			'id'   => 'infinite_scroll_loader_img',
			'std'  => '',
			'type' => 'upload',
		);

		$of_options[] = array(
			'name' => 'Site Loader - لودر سایت',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name'    => 'لودر سایت',
			'id'      => 'site_loader',
			'desc'    => 'پوشش صفحه هنگام لود سایت',
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''     => 'غیرفعال',
				'home' => 'فعال کردن در صفحه اصلی',
				'all'  => 'فعال کردن در تمامی صفحات',
			),
		);

		$of_options[] = array(
			'name'    => 'رنگ',
			'id'      => 'site_loader_color',
			'type'    => 'select',
			'std'     => 'light',
			'options' => array(
				'light' => 'روشن',
				'dark'  => 'تیره',
			),
		);

		$of_options[] = array(
			'name' => 'رنگ پس زمینه',
			'id'   => 'site_loader_bg',
			'std'  => '',
			'type' => 'color',
		);

		$of_options[] = array(
			'name' => 'Site Search - جستجوی سایت',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'جستجوی زنده',
			'id'   => 'live_search',
			'desc' => 'جستجوی زنده را برای پست ها، محصولات و برگه ها فعال کنید.',
			'std'  => 1,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'متن نگهدارنده جستجو',
			'desc' => 'متنی را که در فیلد جستجو نمایش داده می شود را وارد کنید...',
			'id'   => 'search_placeholder',
			'type' => 'text',
		);

		$of_options[] = array(
			'name'    => 'تأخیر نتایج جستجو',
			'desc'    => 'تأخیر را برای نتایج جستجوی مستقیم تنظیم کنید.',
			'id'      => 'search_result_latency',
			'std'     => '0',
			'type'    => 'select',
			'options' => array(
					'0'    => 'Instant',
					'500'  => '500 ms',
					'1000' => '1000 ms',
					'1500' => '1500 ms',
					'2000' => '2000 ms',
				),
		);

		if ( is_woocommerce_activated() ) {

			$of_options[] = array(
				'name' => 'نمایش صفحات و مقالات در جستجو',
				'id'   => 'search_result',
				'desc' => 'Enable blog and pages in search results.',
				'std'  => 1,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name'    => 'استایل نمایش پست ها و مقالات',
				'id'      => 'search_result_style',
				'desc'    => 'Display results as row, masonry or slider style.',
				'type'    => 'select',
				'std'     => 'slider',
				'options' => array(
					'row'     => 'ردیف',
					'masonry' => 'مانسوری',
					'slider'  => 'اسلایدر',
				),
			);

			$of_options[] = array(
				'name'    => 'جستجوی محصولات براساس...',
				'id'      => 'search_products_order_by',
				'type'    => 'select',
				'std'     => 'relevance',
				'options' => array(
					'relevance' => 'Relevance',
					'title'     => 'Title',
					'price'     => 'Price',
				),
			);

			$of_options[] = array(
				'name' => 'جستجوی محصول براساس SKU',
				'desc' => 'جستجوی زنده محصولات بر اساس SKU',
				'id'   => 'search_by_sku',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'جستجوی برچسب محصول',
				'desc' => 'جستجوی محصولات در حالت زنده بر اساس برچسب',
				'id'   => 'search_by_product_tag',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		$of_options[] = array(
			'name' => 'Instagram',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'تنظیمات فید',
			'id'   => 'instagram_lazy_load',
			'desc' => 'بارگذاری تنبل ابزارک اینستاگرام',
			'std'  => 0,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'حساب کاربری',
			'std'  => flatsome_facebook_accounts_html(),
			'type' => 'info',
		);

		$of_options[] = array(
			'name' => 'کش',
			'std'  => flatsome_facebook_cache_html(),
			'type' => 'info',
		);

		$of_options[] = array(
			'name' => 'حساب حرفه ای',
			'desc' => flatsome_facebook_login_button_html(),
			'type' => 'info',
		);

		$of_options[] = array(
			'name' => 'API گوگل',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'api نقشه گوگل',
			'desc' => "برای فعال کردن نقشه ، کلید API Google Maps را اینجا وارد کنید. شما می توانید یکی را در اینجا تولید کنید: <a target='_blank' href='https://developers.google.com/maps/documentation/javascript/get-api-key'> Google Maps API </a>",
			'id'   => 'google_map_api',
			'std'  => '',
			'type' => 'text',
		);

		$maintenance_mode = apply_filters( 'flatsome_maintenance_mode', [ 'access_mode' => 'roles' ] );

		$of_options[] = array(
			'name' => 'Maintenance Mode - حالت تعمیرات سایت',
			'type' => 'heading',
		);

		if ( ! empty( $maintenance_mode['access_mode'] ) ) {
			$access_mode = $maintenance_mode['access_mode'];

			$supported_modes = [ 'logged_in', 'roles', 'current_user_can' ];
			$display_mode    = in_array( $access_mode, $supported_modes, true )
				? $access_mode
				: sprintf( '%s (not supported)', $access_mode );

			$of_options[] = array(
				'name' => '',
				'type' => 'info',
				'desc' => sprintf( '<p style="font-size:14px">نحوه دسترسی: %s</p>', $display_mode ),
			);
		}

		$of_options[] = array(
			'name' => 'حالت تعمیرات',
			'id'   => 'maintenance_mode',
			'desc' => 'حالت تعمیرات را فعال کنید.',
			'std'  => 0,
			'type' => 'checkbox',
		);

		if ( ! empty( $maintenance_mode['access_mode'] && $maintenance_mode['access_mode'] === 'roles' ) ) {
			$of_options[] = array(
				'name'    => 'عدم مشمولیت نقش ها',
				'id'      => 'maintenance_mode_excluded_roles',
				'desc'    => 'نقش ها را از حالت نگهداری حذف کنید (ادمین همیشه دسترسی دارد).',
				'std'     => array(),
				'type'    => 'multicheck',
				'options' => flatsome_get_role_list( array(
					'exclude' => array(
						'super_admin',
						'administrator',
					),
				) ),
			);
		}

		$of_options[] = array(
			'name' => 'کلید عبور',
			'id'   => 'maintenance_mode_bypass_key',
			'desc' => 'این کلید، هنگامی که به عنوان پارامتر در URL ارسال می شود، به کاربر امکان می دهد حالت تعمیر و نگهداری را دور بزند و به وب سایت دسترسی پیدا کند.<br/>f.ex: https://example.com/?nomaintenance1234',
			'std'  => '',
			'type' => 'text',
		);

		$of_options[] = array(
			'name' => 'اعلان مدیریت',
			'id'   => 'maintenance_mode_admin_notice',
			'desc' => 'وقتی حالت تعمیر و نگهداری فعال است، اطلاعیه مدیریت را نشان دهید.',
			'std'  => 1,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name'    => 'صفحه تعمیر و نگهداری سفارشی',
			'id'      => 'maintenance_mode_page',
			'desc'    => 'یک صفحه سفارشی را به عنوان صفحه تعمیر و نگهداری تنظیم کنید. فقط این صفحه برای بازدیدکنندگان قابل مشاهده خواهد بود.',
			'std'     => 0,
			'type'    => 'select',
			'options' => $of_pages,
		);

		$of_options[] = array(
			'name' => 'متن حالت نگهداری',
			'desc' => 'متنی که هنگام دسترسی به صفحه تعمیر و نگهداری برای مشتریان شما قابل مشاهده خواهد بود.',
			'id'   => 'maintenance_mode_text',
			'std'  => 'Please check back soon..',
			'type' => 'text',
		);

		$of_options[] = array(
			'name' => '404 Page - صفحه 404',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name'    => 'بلوک اختصاصی صفحه 404',
			'id'      => '404_block',
			'desc'    => 'محتوای صفحه 404 را با یک بلوک سفارشی جایگزین کنید که می توانید آن را در صفحه ساز ویرایش کنید.',
			'std'     => 0,
			'type'    => 'select',
			'options' => flatsome_get_block_list_by_id( array( 'option_none' => '-- هیچکدام --' ) ),
		);

		if ( is_woocommerce_activated() ) {

			$of_options[] = array(
				'name' => 'WooCommerce - فروشگاه',
				'type' => 'heading',
			);

			$of_options[] = array(
				'name' => 'متغیرها و ویژگی ها',
				'id'   => 'swatches',
				'desc' => 'فعال سازی',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'id'   => 'additional_variation_images',
				'desc' => 'تصاویر متغیرها را فعال کنید.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'محصول تکی',
				'id'   => 'ajax_add_to_cart',
				'desc' => 'افزودن دکمه افزودن به سبد خرید و مشاهده سریع آجاکس به صفحه محصول',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'غیرفعال کردن عمومی دیدگاه های محصولات',
				'id'   => 'disable_reviews',
				'desc' => 'غیرفعال کردن عمومی دیدگاه ها برای تمامی محصولات',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'گالری تصاویر محصولات',
				'id'   => 'product_gallery_woocommerce',
				'desc' => 'برای سازگاری افزونه ، از "اسلایدر پیش فرض گالری WooCommerce" استفاده کنید ، مانند "Additional Variation Images".',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'سربرگ فروشگاه',
				'desc' => 'HTML را که باید در بالای صفحه اصلی فروشگاه قرار داده شود وارد کنید. شورتکد هم مجاز است.',
				'id'   => 'html_shop_page',
				'std'  => '',
				'type' => 'textarea',
			);

			$of_options[] = array(
				'name' => 'تب عمومی اضافی / عنوان تب',
				'id'   => 'tab_title',
				'std'  => '',
				'type' => 'text',
			);

			$of_options[] = array(
				'name' => 'محتوای برگه / بخش اضافی عمومی',
				'id'   => 'tab_content',
				'std'  => '',
				'type' => 'textarea',
				'desc' => 'محتوای برگه اضافی را در اینجا اضافه کنید ... مانند نمودار اندازه و غیره',
			);

			$of_options[] = array(
				'name' => 'HTML قبل از دکمه افزودن به سبد خرید (جهانی)',
				'desc' => 'HTML و کدهای کوتاه را نشان می دهد که قبل از افزودن به سبد خرید نشان داده می شود.',
				'id'   => 'html_before_add_to_cart',
				'std'  => ' ',
				'type' => 'textarea',
			);

			$of_options[] = array(
				'name' => 'HTML پس از دکمه افزودن به سبد خرید (جهانی)',
				'desc' => 'HTML و کد های کوتاه را نشان می دهد که بعد از افزودن به سبد خرید نشان داده خواهد شد.',
				'id'   => 'html_after_add_to_cart',
				'std'  => '',
				'type' => 'textarea',
			);
			
			$of_options[] = array(
				'name' => 'محتوای/اسکریپت صفحه تشکر خرید',
				'desc' => 'اسکریپت ها یا محتوای HTML سفارشی را برای صفحه تشکر از اینجا وارد کنید',
				'id'   => 'html_thank_you',
				'std'  => '',
				'type' => 'textarea',
			);

			$of_options[] = array(
				'name' => 'Catalog Mode - حالت کاتالوگ',
				'type' => 'heading',
			);

			$of_options[] = array(
				'name' => 'فعال سازی حالت کاتالوگ',
				'id'   => 'catalog_mode',
				'desc' => 'با فعال سازی حالت کاتالوگ تمامی دکمه های افزودن به سبد خرید بر روی سایت شما حذف خواهند شد.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'غیرفعال سازی قیمت ها',
				'id'   => 'catalog_mode_prices',
				'desc' => 'جهت غیرفعال سازی قیمت در صفحات محصول و دسته بندی ها فعال کنید.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'برداشتن برچسب حراج',
				'id'   => 'catalog_mode_sale_badge',
				'desc' => 'برای حذف تمامی برچسب های حراج انتخاب کنید.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'تعویض سبد / حساب کاربری (هدر)',
				'id'   => 'catalog_mode_header',
				'std'  => '',
				'type' => 'textarea',
				'desc' => "به جای حساب / سبد ، محتوای موردنظر برای نمایش را وارد کنید. کد کوتاه مجاز است. برای جعبه جستجو <b> [جستجو] را وارد کنید. برای نمادهای اجتماعی وارد کنید:",
			);

			$of_options[] = array(
				'name' => 'افزودن به سبد خرید - صفحه محصول',
				'id'   => 'catalog_mode_product',
				'std'  => '',
				'type' => 'textarea',
				'desc' => 'اطلاعات تماس یا شورتکد را از اینجا وارد کنید.',
			);

			$of_options[] = array(
				'name' => 'افزودن به سبد خرید - نمایش سریع محصول',
				'id'   => 'catalog_mode_lightbox',
				'std'  => '',
				'type' => 'textarea',
				'desc' => 'متن را وارد کنید که در نمای سریع محصول نشان داده شود',
			);
		}

		// Portfolio.
		$of_options[] = array(
			'name' => 'Portfolio - نمونه کارها',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'فعال کردن نمونه کارها',
			'id'   => 'fl_portfolio',
			'desc' => 'فعال کردن نمونه کارها',
			'std'  => 1,
			'type' => 'checkbox',
		);

		// Mobile.
		$of_options[] = array(
			'name' => 'Mobile - موبایل',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Parallax Mobile Support',
			'id'   => 'parallax_mobile',
			'desc' => 'Enable parallax for mobile devices',
			'std'  => 0,
			'type' => 'checkbox',
		);

		// Integrations.
		$of_options[] = array(
			'name' => 'Integrations - ادغام',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<p style="font-size:14px">در صورت فعال بودن گزینه های اضافی افزونه های یکپارچه در اینجا نشان داده خواهد شد.</p>',
		);

		$of_options[] = array(
			'name' => 'فلتسام استودیو',
			'id'   => 'flatsome_studio',
			'desc' => 'دسترسی به استودیوی Flatsome در UX Builder را فعال کنید',
			'std'  => 1,
			'type' => 'checkbox',
		);

		if ( function_exists( 'ubermenu' ) ) {
			$of_options[] = array(
				'name' => 'Ubermenu',
				'id'   => 'flatsome_uber_menu',
				'desc' => 'فعال سازی حالت تمام عرض ubermenu',
				'std'  => 1,
				'type' => 'checkbox',
			);
		}

		// Yoast options.
		if ( class_exists( 'WPSEO_Options' ) ) {
			$of_options[] = array(
				'name' => 'دسته بندی اصلی یواست',
				'id'   => 'wpseo_primary_term',
				'desc' => 'استفاده در صفحات دسته بندی و المنت ها.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => '',
				'id'   => 'wpseo_manages_product_layout_priority',
				'desc' => 'مدیریت طرح سفارشی صفحه محصول.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name'  => 'ریزآدرس های افزونه یواست',
				'id'    => 'wpseo_breadcrumb',
				'desc'  => 'استفاده در صفحات دسته بندی محصولات، محصول و المنت ها',
				'std'   => 0,
				'folds' => 1,
				'type'  => 'checkbox',
			);

			$of_options[] = array(
				'name' => '',
				'id'   => 'wpseo_breadcrumb_remove_last',
				'desc' => 'حذف آخرین ریز آدرس استاتیک از صفحه محصول (عنوان محصول)',
				'std'  => 1,
				'fold' => 'wpseo_breadcrumb',
				'type' => 'checkbox',
			);
		}

		// Rank Math options.
		if ( class_exists( 'RankMath' ) ) {
			$of_options[] = array(
				'name' => 'دسته بندی اصلی رنک مث سئو',
				'id'   => 'rank_math_primary_term',
				'desc' => 'استفاده در صفحات دسته بندی و المنت ها.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => '',
				'id'   => 'rank_math_manages_product_layout_priority',
				'desc' => 'مدیریت طرح سفارشی صفحه محصول.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'ریزآدرس رنک مث',
				'id'   => 'rank_math_breadcrumb',
				'desc' => 'استفاده در صفحات دسته بندی محصولات، محصول و المنت ها',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		// All in one SEO options.
		if ( class_exists( 'AIOSEO\Plugin\AIOSEO' ) ) {
			$of_options[] = array(
				'name' => 'AIOSEO ریزآدرس های',
				'id'   => 'aioseo_breadcrumb',
				'desc' => 'استفاده در صفحات دسته بندی محصولات، محصول و المنت ها',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		// SEOPress options.
		if ( defined( 'SEOPRESS_VERSION' ) ) {
			$of_options[] = array(
				'name' => defined( 'SEOPRESS_PRO_VERSION' ) ? 'SEOPress Breadcrumbs' : 'SEOPress Breadcrumbs (Requires SeoPress PRO)',
				'id'   => 'wpseopress_breadcrumb',
				'desc' => 'Use on product category pages, single product pages and elements.',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		// Updates.
		$of_options[] = array(
			'name' => 'Updates - آپدیت ها',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name'    => 'کانال آپدیت ها',
			'id'      => 'release_channel',
			'std'     => 'stable',
			'type'    => 'select',
			'options' => array(
				'stable' => 'پایدار',
				'beta'   => 'بتا',
			),
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'warning',
			'desc' => '<p style="font-size:14px">لطفا با دقت استفاده کنید. نسخه های بتا را روی سایت هایی که در حال کار هستند استفاده نکنید. نخه های بتا ممکن است پایدار نباشند.</p>',
		);

		// Backup Options.
		$of_options[] = array(
			'name' => 'Backup and Import - بکاپ و ایمپورت',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'گزینه های تهیه نسخه پشتیبان و بازیابی',
			'id'   => 'of_backup',
			'std'  => '',
			'type' => 'backup',
			'desc' => 'می توانید از دو دکمه زیر استفاده کنید تا از گزینه های فعلی خود نسخه پشتیبان تهیه کنید و در زمان بعدی دوباره آن را بازیابی کنید. در صورتی که می خواهید روی گزینه ها آزمایش کنید ، مفید است اما می خواهید تنظیمات قدیمی را در صورت نیاز به عقب نگه دارید.',
		);

		$of_options[] = array(
			'name' => 'انتقال داده های گزینه های تم',
			'id'   => 'of_transfer',
			'std'  => '',
			'type' => 'transfer',
			'desc' => 'با کپی کردن متن درون جعبه متن می توانید داده های گزینه های ذخیره شده را بین نصب های مختلف منتقل کنید. برای وارد کردن داده از یک نصب دیگر ، داده های موجود در جعبه متن را با نصب دیگری نصب کنید و روی "گزینه های واردات" کلیک کنید".',
		);

	} // End of 'of_options()' function.
} // End check if function exists: of_options()
