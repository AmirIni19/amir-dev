<?php

global $wp_registered_sidebars;

$sidebar_options = array();
foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar){
    $sidebar_options[$sidebar['id']] = $sidebar['name'];
}

// TODO: Get sidebars
add_ux_builder_shortcode( 'ux_sidebar', array(
    'name' => __( 'ناحیه ابزارک' ),
    'category' => __( 'Layout' ),
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'sidebar' ),
    'options' => array(
        'id' => array(
            'type' => 'select',
            'heading' => 'انتخاب کنید',
            'default' => 'sidebar-main',
            'options' => $sidebar_options,
            'description' => 'می توانید مناطق ابزارک را در WP-admin> نمایش > ابزارک ها ویرایش کنید.'
        ),
        'style' => array(
            'type' => 'select',
            'heading' => __( 'استایل ابزارک' ),
            'default' => '',
            'options' => array(
                '' => 'Default',
                'framed' => 'فریم شده',
                'boxed' => 'جعبه'
            )
        ),
        'advanced_options' => require( __DIR__ . '/commons/advanced.php'),

    ),
) );