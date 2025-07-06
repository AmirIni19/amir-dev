<?php

add_ux_builder_shortcode( 'ux_price_table', array(
  'type' => 'container',
  'name' => __( 'جدول قیمت' ),
  'category' => __( 'Content' ),
  'thumbnail' => flatsome_ux_builder_thumbnail( 'price_table' ),
  'allow' => array('text','bullet_item','button'),
  'wrap' => false,
  'presets' => array(
    array(
      'name' => __( 'Default' ),
      'content' => '[ux_price_table title="Title" price="price" featured="false"][bullet_item text="Title"][bullet_item text="Title"][bullet_item text="Title"][bullet_item text="Title"][/ux_price_table]',
      ),
    ),
    'options' => array(
      'title' => array( 'type' => 'textfield','heading' => 'عنوان', 'default' => 'title', 'on_change' => array('selector' => '.title', 'content' => '{{value}}' )),
      'price' => array( 'type' => 'textfield','heading' => 'قیمت', 'default' => '$99.99','on_change' => array('selector' => '.price', 'content' => '{{value}}')),
      'description' => array( 'type' => 'textfield','heading' => 'توضیح', 'default' => 'Description','on_change' => array('selector' => '.description', 'content' => '{{value}}')),
  
      'featured' => array(
            'type' => 'radio-buttons',
            'heading' => __('ویژه'),
            'default' => 'false',
            'options' => array(
                'false'  => array( 'title' => 'خیر'),
                'true'  => array( 'title' => 'بله'),
            ),
            'on_change' => array(
              'recompile' => false,
              'selector' => '.pricing-table',
              'class' => array(
                'false'  => '',
                'true'  => 'featured-table',
              ),
            ),
      ),
      'color' => array(
            'type' => 'radio-buttons',
            'heading' => __('رنگ متن'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'تیره'),
                'dark'  => array( 'title' => 'روشن'),
            ),
            'on_change' => array(
              'recompile' => false,
              'class' => '{{ value }}',
            ),
      ),
      'bg_color' => array(
        'type' => 'colorpicker',
        'heading' => __('رنگ پسزمینه'),
        'format' => 'rgb',
        'position' => 'bottom right',
        'on_change' => array(
          'selector' => '.pricing-table',
          'style' => 'background-color: {{value}}',
        ),
      ),
      'radius' => array(
        'type' => 'slider',
        'heading' => __( 'شعاع' ),
        'default' => '0',
        'unit' => 'px',
        'max' => '30',
        'min' => '0',
        'on_change' => array(
          'selector' => '.pricing-table',
          'style' => 'border-radius: {{value}}px',
        ),
      ),
     'depth' => array(
        'type' => 'slider',
        'heading' => __( 'عمق' ),
        'default' => '0',
        'max' => '5',
        'min' => '0',
        'on_change' => array(
          'recompile' => false,
          'selector' => '.pricing-table',
          'class' => 'box-shadow-{{ value }}'
        ),
      ),
      'depth_hover' => array(
          'type' => 'slider',
          'heading' => __( 'عمق هاور' ),
          'default' => '3',
          'max' => '5',
          'min' => '0',
          'on_change' => array(
            'recompile' => false,
            'selector' => '.pricing-table',
            'class' => 'box-shadow-{{ value }}-hover'
          ),
      ),
      'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    )
) );

add_ux_builder_shortcode( 'bullet_item', array(
    'name' => __( 'آیتم گلوله ای' ),
    'info' => '{{ title }}',
    'require' => array( 'ux_price_table' ),
    'template' => '
      <div class="bullet-item"
        ng-class="{
          \'tooltip\': !!shortcode.options.tooltip,
          \'has-hover\': !!shortcode.options.tooltip,
          \'is-disabled\': shortcode.options.enabled !== \'true\'
        }"
        ng-attr-title="shortcode.options.tooltip">
        <span class="text" ng-bind-html="shortcode.options.text | html"></span>
        <span ng-if="shortcode.options.tooltip" class="tag-label bullet-more-info circle">?</span>
      </div>
    ',
    'wrap' => false,
    'hidden' => true,
    'options' => array(
      'text' => array(
        'type' => 'textfield',
        'heading' => 'متن',
        'default' => 'متن را اینجا وارد کنید...',
      ),
      'tooltip' => array(
        'type' => 'textfield',
        'heading' => 'تولتیپ',
        'default' => '',
      ),
      'enabled' => array(
          'type' => 'radio-buttons',
          'heading' => __('فعال'),
          'default' => 'true',
          'options' => array(
              'true'  => array( 'title' => 'بله'),
              'false'  => array( 'title' => 'خیر'),
          ),
        ),
    ),
) );
