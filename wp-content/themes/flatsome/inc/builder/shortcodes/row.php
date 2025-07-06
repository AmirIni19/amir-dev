<?php

add_ux_builder_shortcode( 'row', array(
    'type' => 'container',
    'name' => __( 'ردیف' , 'ux-builder' ),
    'image' => '',
    'category' => __( 'Layout' ),
    'template' => flatsome_ux_builder_template( 'row.html' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row' ),
    'tools' => 'shortcodes/row-tools.directive.html',
    'info' => '{{ label }}',
    'allow' => array( 'col' ),
    'nested' => true,
    'wrap'   => false,
    'priority' => -1,

    'presets' => array(
        array(
            'name' => __( 'سه ستون' ),
            'content' => '[row][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col]][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-3-col' ),
        ),
        array(
            'name' => __( 'دو ستون' ),
            'content' => '[row][col span="6" span__sm="12"][/col][col span="6" span__sm="12"][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-2-col' ),
        ),
        array(
            'name' => __( 'چهار ستون' ),
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-4-col' ),
            'content' => '[row][col span="3" span__sm="6"][/col][col span="3" span__sm="6"][/col][col span="3" span__sm="6"][/col][col span="3" span__sm="6"][/col][/row]'
        ),
        array(
            'name' => __( 'یک ستون' ),
            'content' => '[row][col span="12" span__sm="12"][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-1-col' ),
        ),
        array(
            'name' => __( 'بزرگ سمت راست' ),
            'content' => '[row][col span="4" span__sm="12"][/col][col span="8" span__sm="12"][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-1-3-col' ),
        ),
       array(
            'name' => __( 'بزرگ سمت چپ' ),
            'content' => '[row][col span="8" span__sm="12"][/col][col span="4" span__sm="12"][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-2-3-col' ),
        ),
        array(
            'name' => __( '2 ستون - کامل' ),
            'content' => '[row style="collapse" width="full-width"][col span="6"][/col][col span="6"][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-2-col-full' ),
        ),
        array(
            'name' => __( '3 ستون - کامل' ),
            'content' => '[row style="collapse" width="full-width"][col span="4"][/col][col span="4"][/col][col span="4"][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-3-col-full' ),
        ),
        array(
            'name' => __( 'رسانه سمت چپ' ),
            'content' => '[row  v_align="middle"][col span="6" span__sm="12"][ux_image][/col][col span="6" span__sm="12"][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-image-left' ),
        ),
        array(
            'name' => __( 'رسانه سمت راست' ),
            'content' => '[row v_align="middle"][col span="6" span__sm="12"][/col][col span="6" span__sm="12"][ux_image][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-image-right' ),
        ),
        array(
            'name' => __( 'رسانه بزرگ سمت چپ' ),
            'content' => '[row v_align="middle" style="collapse" width="full-width"][col span="6" span__sm="12"][ux_image][/col][col max_width="520px" padding="5% 5% 5% 5%" span="6" span__sm="12"][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-image-left-large' ),
        ),
        array(
            'name' => __( 'رسانه بزرگ سمت راست' ),
            'content' => '[row v_align="middle" style="collapse" width="full-width"][col max_width="520px" padding="5% 5% 5% 5%" span="6" span__sm="12" width=""][/col][col span="6" span__sm="12"][ux_image][/col][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-image-right-large' ),
        ),
        array(
            'name' => __( '3 ستون - با سایه' ),
            'content' => '[row depth="3" depth_hover="5"][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col]][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-3-shadow-col' ),
        ),
        array(
            'name' => __( '3 ستون - نقطه چین' ),
            'content' => '[row col_style="dashed"][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col][col span="4" span__sm="12"][/col]][/row]',
            'thumbnail' =>  flatsome_ux_builder_thumbnail( 'row-3-col-dashed' ),
        )
    ),

    'options' => array(
        
        'label' => array(
            'full_width' => true,
            'type' => 'textfield',
            'heading' => 'نام',
            'placeholder' => 'Enter admin label here..'
        ),

        'style' => array(
            'type' => 'radio-buttons',
            'heading' => 'فضای بین ستون ها',
            'full_width' => true,
            'default' => '',
            'options' => array(
                '' => array( 'title' => 'نرمال'),
                'small' => array( 'title' => 'کوچک' ),
                'large' => array( 'title' => 'بزرگ' ),
                'collapse' => array( 'title' => 'کلپس' ),
            ),
        ),

        'col_style' => array(
            'type' => 'radio-buttons',
            'heading' => 'استایل ستون',
            'full_width' => true,
            'default' => '',
            'options' => array(
                '' => array( 'title' => 'نرمال'),
                'divided' => array( 'title' => 'جدا'),
                'dashed' => array( 'title' => 'نقطه چین'),
                'solid' => array( 'title' => 'خط ساده'),
            ),
        ),

        'col_bg' => array(
            'type' => 'colorpicker',
            'heading' => __('رنگ پس زمینه'),
            'format' => 'rgb',
            'alpha' => true,
            'position' => 'bottom right',
            'helpers' => require( __DIR__ . '/helpers/colors.php' ),
        ),

        'col_bg_radius' => array(
	        'type'       => 'slider',
	        'vertical'   => true,
	        'full_width' => true,
	        'heading'    => __( 'گردی ستون' ),
	        'unit'       => 'px',
	        'default'    => 0,
	        'min'        => 0,
	        'max'        => 100,
        ),

        'width' => array(
            'type' => 'radio-buttons',
            'heading' => 'عرض',
            'full_width' => true,
            'default' => '',
            'options' => array(
                '' => array( 'title' => 'کانتینر'),
                'full-width' => array( 'title' => 'کامل' ),
                'custom' => array( 'title' => 'سفارشی' ),
            ),
        ),

        'custom_width' => array(
            'type' => 'scrubfield',
            'conditions' => 'width == "custom"',
            'heading' => 'عرض سفارشی',
            'default' => '',
            'placeholder' => '1080px'
        ),

        'v_align' => array(
            'type' => 'radio-buttons',
            'heading' => 'چینش',
            'full_width' => true,
            'default' => '',
            'options' => array(
                '' => array( 'title' => 'بالا'),
                'equal' => array( 'title' => 'مساوی'),
                'middle' => array( 'title' => 'وسط'),
                'bottom' => array( 'title' => 'پایین'),
            )
        ),

        'h_align' => array(
            'type' => 'radio-buttons',
            'heading' => 'تراز افقی',
            'full_width' => true,
            'default' => '',
            'options' => array(
                 '' => array( 'title' => 'چپ'),
                 'center' => array( 'title' => 'میانه'),
                 'right' => array( 'title' => 'راست')
            )
        ),

        'padding' => array(
            'type' => 'margins',
            'heading' => 'پدینگ ستون',
            'full_width' => true,
            'responsive' => true,
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),

        'depth' => array(
            'type' => 'slider',
            'vertical' => true,
            'full_width' => true,
            'heading' => 'عمق ستون',
            'default' => 0,
            'max' => 5,
            'min' => 0,
        ),

        'depth_hover' => array(
            'type' => 'slider',
            'vertical' => true,
            'full_width' => true,
            'heading' => 'عمق ستون در حالت هاور',
            'default' => 0,
            'max' => 5,
            'min' => 0,
        ),

       'advanced_options' => require( __DIR__ . '/commons/advanced.php'),
    ),
) );
