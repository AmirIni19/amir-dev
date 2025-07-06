<?php

if ( ! isset( $repeater_posts ) ) $repeater_posts = 'posts';
if ( ! isset( $repeater_post_type ) ) $repeater_post_type = 'post';
if ( ! isset( $repeater_post_cat ) ) $repeater_post_cat = 'category';

return array(
    'type' => 'group',
    'heading' => __( 'پست ها' ),
    'options' => array(

     'ids' => array(
        'type' => 'select',
        'heading' => 'پست های سفارشی',
        'param_name' => 'ids',
		'full_width' => true,
        'config' => array(
            'multiple' => true,
            'placeholder' => 'انتخاب کنید..',
            'postSelect' => array(
                'post_type' => array($repeater_post_type)
            ),
        )
    ),

    'cat' => array(
        'type' => 'select',
        'heading' => 'دسته بندی',
        'param_name' => 'cat',
		'full_width' => true,
        'conditions' => 'ids == ""',
        'default' => '',
        'config' => array(
            'multiple' => true,
            'placeholder' => 'انتخاب کنید...',
            'termSelect' => array(
                'post_type' => $repeater_post_cat,
                'taxonomies' => $repeater_post_cat
            ),
        )
    ),

    $repeater_posts => array(
        'type' => 'textfield',
        'heading' => 'تعداد پست ها',
        'conditions' => 'ids == ""',
        'default' => '8',
    ),

    'offset' => array(
        'type' => 'textfield',
        'heading' => 'آفست',
        'conditions' => 'ids == ""',
        'default' => '',
    ),

     'orderby'       => array(
	     'type'       => 'select',
	     'heading'    => 'Order by',
	     'conditions' => 'ids == ""',
	     'default'    => 'date',
	     'options'    => array(
		     'ID'            => 'آیدی',
		     'title'         => 'عنوان',
		     'name'          => 'نام',
		     'date'          => 'تاریخ انتشار',
		     'modified'      => 'تاریخ ویرایش',
		     'rand'          => 'تصادفی',
		     'comment_count' => 'تعداد دیدگاه',
		     'menu_order'    => 'ترتیب',
	     ),
     ),

     'order'         => array(
	     'type'       => 'select',
	     'heading'    => 'ترتیب',
	     'conditions' => 'ids == ""',
	     'default'    => 'DESC',
	     'options'    => array(
		     'ASC'  => 'ASC',
		     'DESC' => 'DESC',
	     ),
     ),

    'tags' => array(
	    'type'       => 'select',
	    'heading'    => 'برچسب',
	    'conditions' => 'ids == ""',
	    'full_width' => true,
	    'default'    => '',
	    'config'     => array(
		    'multiple'    => true,
		    'placeholder' => 'انتخاب کنید...',
		    'termSelect'  => array(
			    'post_type'  => $repeater_post_type,
			    'taxonomies' => 'post_tag',
		    ),
	    ),
    ),

)
);
