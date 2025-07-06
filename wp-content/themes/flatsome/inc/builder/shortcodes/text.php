<?php

add_ux_builder_shortcode( 'text', array(
    'type' => 'container',
    'name' => __( 'متن', 'ux-builder'),
    'category' => __( 'Content' ),
    'compile' => false,
    'thumbnail' =>  flatsome_ux_builder_thumbnail( 'text' ),
    'template_shortcode' => function ( $element, $options, $content, $parent = null ) {
        if (
            ! empty( $options ) ||
            ( ! empty( $parent ) && 'ux_stack' === $parent['tag'] )
        ) {
            return "[ux_text{options}]\n\n{content}\n[/ux_text]\n";
        }
        return "{content}\n";
    },
    'template' => flatsome_ux_builder_template( 'text.html' ),
    'directives' => array( 'ux-text-editor' ),
    'priority' => 1,

    'presets' => array(
        array(
            'name' => __( 'پاراگراف' ),
            'content' => '[text]<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>[/text]'
        ),
        array(
            'name' => __( 'لید پاراگراف' ),
            'content' => '[text]<p class="lead">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>[/text]'
        ),
        array(
            'name' => __( 'پاراگراف با تیتر' ),
            'content' => '[text]<h3>این یک تیتر نمونه است</h3><p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>[/text]'
        ),
        array(
            'name' => __( 'پاراگراف با تیتر کوچک' ),
            'content' => '[text]<h5 class="uppercase">این یک تیتر کوچک است</h5><p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>[/text]'
        ),
        array(
            'name' => __( 'تیتر' ),
            'content' => '[text]<h2>این یک تیتر کوچک است</h2>[/text]'
        ),
        array(
            'name' => __( 'تیتر برجسته' ),
            'content' => '[text]<h2 class="uppercase">این یک تیتر کوچک است</h2>[/text]'
        ),
        array(
            'name' => __( 'تیتر با زینویس' ),
            'content' => '[text]<h2 class="uppercase">این یک تیتر کوچک است</h2><h3 class="thin-font">این یک زیر عنوان است.</h3>[/text]'
        ),
        array(
            'name' => __( 'تصویر سمت چپ' ),
            'content' => '[row][col span="6" span__sm="12"][ux_image image_size="medium"][/col][col span="6" span__sm="12"][text]<h3>این یک تیتر نمونه است</h3><p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>[/text][/col][/row]'
        ),
       array(
            'name' => __( 'تصویر سمت راست' ),
            'content' => '[row][col span="6" span__sm="12"][text]<h3>این یک تیتر نمونه است</h3><p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>[/text][/col][col span="6" span__sm="12"][ux_image image_size="medium"][/col][/row]'
        ),
        array(
            'name' => __( 'نقل قول' ),
            'content' => '[text]<blockquote>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</blockquote>[/text]'
        ),
    ),

    'options' => array(
      '$content' => array(
        'type'       => 'text-editor',
        'full_width' => true,
        'height'     => 'calc(100vh - 691px)',
      ),
      'typography_options' => require( __DIR__ . '/commons/typography.php'),
      'advanced_options'   => require( __DIR__ . '/commons/advanced.php'),
    )
) );
