<?php

add_ux_builder_shortcode( 'col', array(
    'type' => 'container',
    'name' => __( 'ستون', 'ux-builder' ),
    'category' => __( 'Layout' ),
    'template' => flatsome_ux_builder_template( 'col.html' ),
    'tools' => 'shortcodes/col/col-tools.directive.html',
    'info' => '{{ span }}/12 {{ label }}',
    'require' => array( 'row' ),
    'wrap'   => false,
    'inline' => true,
    'nested' => true,
    'resize' => array( 'right' ),

    'presets' => array(
        array(
            'name' => __( 'پیش فرض' ),
            'content' => '[col span="4" span__sm="12"][/col]',
        ),
    ),

    'options' => array(
	    'label' => array(
		    'full_width'  => true,
		    'type'        => 'textfield',
		    'heading'     => 'Label',
		    'placeholder' => 'لیبل آدمین را وارد کنید...',
	    ),
        'span' => array(
            'type' => 'col-slider',
            'heading' => 'پهنا',
            'full_width' => true,
            'responsive' => true,
            'auto_focus' => true,
            'default' => 12,
            'max' => 12,
            'min' => 1,
        ),

        'force_first' => array(
            'type' => 'select',
            'heading' => 'اجبار به قرار گرفتن در اولین مورد',
            'default' => '',
            'options' => array(
                ''   => 'None',
                'medium' => 'روی تبلت',
                'small'  => 'در موبایل'
            )
        ),

        'divider' => array(
            'type' => 'checkbox',
            'heading' => 'چدا کننده',
        ),

        'padding' => array(
            'type' => 'margins',
            'heading' => 'پدینگ',
            'full_width' => true,
            'responsive' => true,
            'min' => 0,
            'max' => 200,
            'step' => 1,
        ),

        'margin' => array(
            'type' => 'margins',
            'heading' => 'فاصله',
            'full_width' => true,
            'responsive' => true,
            'min' => -200,
            'max' => 200,
            'step' => 1,
        ),

        'align' => array(
            'type' => 'radio-buttons',
            'heading' => 'تراز متن',
            'default' => '',
            'options' => require( __DIR__ . '/values/align-radios.php' ),
        ),

        'bg_color' => array(
            'type' => 'colorpicker',
            'heading' => __('رنگ پس زمینه'),
            'format' => 'rgb',
            'alpha' => true,
            'position' => 'bottom right',
            'helpers' => require( __DIR__ . '/helpers/colors.php' ),
        ),
	    'bg_radius' => array(
		    'type'    => 'slider',
		    'heading' => __( 'شعاع بکگراند' ),
		    'unit'    => 'px',
		    'default' => 0,
		    'max'     => 100,
		    'min'     => 0,
	    ),
        'color' => array(
            'type' => 'radio-buttons',
            'heading' => 'رنگ',
            'default' => '',
            'options' => array(
                'light'   => array( 'title' => 'روشن'),
                ''  => array( 'title' => 'تیره'),
            ),
        ),
	    'sticky' => array(
		    'type'    => 'radio-buttons',
		    'heading' => 'چسبنده',
		    'default' => '',
		    'options' => array(
			    'true' => array( 'title' => 'روشن' ),
			    ''     => array( 'title' => 'خاموش' ),
		    ),
	    ),
	    'sticky_mode' => array(
		    'type'       => 'select',
		    'heading'    => 'حالت چسبنده',
		    'conditions' => 'sticky === "true"',
		    'default'    => '',
		    'options'    => array(
			    ''           => 'CSS (native)',
			    'javascript' => 'JavaScript (enhanced)',
		    ),
	    ),
        'text_depth' => array(
              'type' => 'slider',
              'heading' => __('سایه متن'),
              'default' => '0',
              'unit' => '+',
              'max' => '5',
              'min' => '0',
        ),

        'max_width' => array(
            'type' => 'scrubfield',
            'heading' => 'حداکثر حرض',
            'responsive' => true,
            'default' => '',
            'min' => '0'
        ),


        'animate' => array(
            'type' => 'select',
            'heading' => 'انیمیشن',
            'default' => 'none',
            'options' => require( __DIR__ . '/values/animate.php' ),
        ),

        'hover' => array(
            'type' => 'select',
            'heading' => 'افکت هاور',
            'options' => array(
                '' => 'None',
                'fade' => 'ظاهر شدن',
                'focus' => 'متمرکز',
                'blur' => 'تار شدن',
            ),
        ),

        'tooltip' => array(
            'type' => 'textfield',
            'heading' => 'تولتیپ',
        ),

        'parallax' => array(
            'type' => 'slider',
            'vertical' => true,
            'heading' => 'پارالکس',
            'default' => 0,
            'max' => 10,
            'min' => -10,
        ),

        'depth' => array(
            'type' => 'slider',
            'vertical' => true,
            'heading' => 'عمق',
            'default' => 0,
            'max' => 5,
            'min' => 0,
        ),

        'depth_hover' => array(
            'type' => 'slider',
            'vertical' => true,
            'heading' => 'عمق هاور',
            'default' => 0,
            'max' => 5,
            'min' => 0,
        ),
	    'border_options' => require( __DIR__ . '/commons/border.php' ),
        'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    ),
) );
