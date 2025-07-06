<?php 
return array(
  'type' => 'group',
  'heading' => __( 'اسلاید' ),
  'require' => 'ux_slider',
  'options' => array(
    'slide_effect' => array(
      'type' => 'select',
      'heading' => 'افکت اسلاید',
      'options' => array(
        '' => 'None',
        'fade-in' => 'محو شدن',
        'zoom-in' => 'بزرگنمایی',
        'zoom-out' => 'کوچک نمایی',
        'fade-in-fast' => 'محو شدن سریع',
        'zoom-in-fast' => 'بزرگنمایی سریع',
        'zoom-out-fast' => 'زوم سریع',
      ),
    ),
  ),
);