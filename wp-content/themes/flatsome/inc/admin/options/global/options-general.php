<?php 

Flatsome_Option::add_section( 'advanced', array(
	'title'       => __( 'ریست گزینه ها', 'flatsome-admin' ),
	'priority' 	  => 999,
    'description' => __( 'برای ریست کردن همه موارد اینجا کلیک کنید.', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_advanced_reset',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'advanced',
    'default'     => '<div class="reset-options-container"><button name="Reset" id="flatsome-customizer-reset" class="button-primary button" title="Reset Theme Options">Reset Theme Options</button></div>',
) );