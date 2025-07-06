<?php

return array(
	'type'      => 'group',
	'heading'   => __( 'ویدئو', 'ux-builder' ),
	'collapsed' => true,
	'options'   => array(
		'youtube'          => array(
			'type'        => 'textfield',
			'heading'     => 'یوتیوب',
			'description' => 'شناسه یوتیوب را اینجا اضافه کنید.  به عنوان مثال : 9d8wWcJLnFI',
		),
		'video_mp4'        => array(
			'type'        => 'textfield',
			'heading'     => 'ویدئو MP4',
			'description' => 'ابزار خوبی برای تبدیل فیلم ها : https://cloudconvert.org/',
		),
		'video_ogg'        => array(
			'type'    => 'textfield',
			'heading' => 'ویدئو OGG ',

		),
		'video_webm'       => array(
			'type'    => 'textfield',
			'heading' => 'ویدئو WEBM',
		),
		'video_sound'      => array(
			'type'    => 'select',
			'heading' => 'صدا',
			'default' => 'false',
			'options' => array(
				'true'  => 'روشن',
				'false' => 'خاموش',
			),
		),
		'video_loop'       => array(
			'type'    => 'select',
			'heading' => 'لوپ',
			'default' => 'true',
			'options' => array(
				'true'  => 'فعال',
				'false' => 'غیر فعال',
			),
		),
		'video_visibility' => array(
			'type'    => 'select',
			'heading' => 'قابلیت دیدن',
			'default' => 'hide-for-medium',
			'options' => array(
				'visible'                        => 'قابل دیدن',
				'hidden'                         => 'مخفی',
				'hide-for-medium'                => 'فقط برای دسکتاپ',
				'show-for-small'                 => 'فقط برای موبایل',
				'show-for-medium hide-for-small' => 'فقط برای تبلت',
				'show-for-medium'                => 'مخفی برای دسکتاپ',
				'hide-for-small'                 => 'مخفی برای موبایل',
			),
		),
	),
);
