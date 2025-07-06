<?php

return array(
	'type'       => 'group',
	'heading'    => 'صفحه بندی',
	'conditions' => 'type != "slider" && type != "slider-full"',
	'options'    => array(
		'relay'                      => array(
			'type'    => 'select',
			'heading' => 'Type',
			'default' => '',
			'options' => array(
				''           => 'None',
				'pagination' => 'لینک صفحه بندی',
				'load-more'  => 'لود بیشتر',
				'prev-next'  => 'قبلی / بعدی',
			),
		),
		'relay_control_result_count' => array(
			'type'       => 'checkbox',
			'heading'    => 'تعداد نتایج',
			'conditions' => 'relay == "load-more"',
			'default'    => 'true',
		),
		'relay_control_position'     => array(
			'type'       => 'select',
			'heading'    => 'موقعیت',
			'conditions' => 'relay',
			'default'    => 'bottom',
			'options'    => array(
				'top'        => 'بالا',
				'bottom'     => 'پایین',
				'top-bottom' => 'بالا و پایین',
			),
		),
		'relay_control_align'        => array(
			'type'       => 'radio-buttons',
			'heading'    => 'تراز',
			'conditions' => 'relay',
			'default'    => 'center',
			'options'    => require __DIR__ . '/../values/align-radios.php',
		),
		'relay_id'                   => array(
			'type'       => 'textfield',
			'heading'    => 'آیدی',
			'conditions' => 'relay',
			'default'    => '',
		),
		'relay_class'                => array(
			'type'       => 'textfield',
			'heading'    => 'کلاس',
			'conditions' => 'relay',
			'default'    => '',
		),
	),
);
