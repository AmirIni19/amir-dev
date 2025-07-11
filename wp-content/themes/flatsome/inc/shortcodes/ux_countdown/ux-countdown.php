<?php

// Register scripts
function flatsome_countdown_shortcode_scripts() {
    wp_register_style( 'flatsome-countdown-style', get_template_directory_uri() . '/inc/shortcodes/ux_countdown/ux-countdown.css', 'flatsome-style');
    wp_register_script( 'flatsome-countdown-script', get_template_directory_uri() . '/inc/shortcodes/ux_countdown/countdown-script-min.js', 'flatsome-countdown-script');
    wp_register_script( 'flatsome-countdown-theme-js', get_template_directory_uri() . '/inc/shortcodes/ux_countdown/ux-countdown.js', 'flatsome-js', '3.2.6', true);
}
add_action( 'wp_enqueue_scripts', 'flatsome_countdown_shortcode_scripts' );

// Register Shortcode
function ux_countdown_shortcode( $atts ){
    $atts = shortcode_atts( array(
      '_id' => 'timer-'.rand(),
      'before' => '',
      'after' => '',
      'year' => '2021',
      'month' => '12',
      'day' => '31',
      'color' => 'dark',
      'bg_color' => '',
      'bg_color__md' => '',
      'bg_color__sm' => '',
      'time' => '18:00',
      'style' => 'clock',
      'size' => '300',
      'size__md' => '',
      'size__sm' => '',
      't_hour' => 'ساعت',
      't_min' => 'دقیقه',
      't_day' => 'روز',
      't_week' => 'هفته',
      't_sec' => 'ثانیه',
      //
      't_plural' => 's',
      't_hour_p' => 'ساعت',
      't_min_p' => 'دقیقه',
      't_day_p' => 'روز',
      't_week_p' => 'هفته',
      't_sec_p' => 'ثانیه',

    ), $atts );

    extract( $atts );

    wp_enqueue_style('flatsome-countdown-style');
    wp_enqueue_script('flatsome-countdown-script');
    wp_enqueue_script('flatsome-countdown-theme-js');

    $date = $year.'/'.$month.'/'.$day;

    // Fix Time
    if($time == '24:00') $time = '23:59:59';

    if($time) $date = $date.' '.$time;

    $args = array(
      'size' => array(
        'selector' => '',
        'unit' => '%',
        'property' => 'font-size',
      ),
      'bg_color' => array(
        'selector' => 'span',
        'property' => 'background-color',
      ),
    );
    // data-text-hour-p="'.$t_hour_p.'" data-text-day-p="'.$t_day_p.'" data-text-week-p="'.$t_week_p.'" data-text-min-p="'.$t_min_p.'" data-text-sec-p="'.$t_sec_p.'"
    // Texts
    $translations = 'data-text-plural="'.$t_plural.'" data-text-hour="'.$t_hour.'" data-text-day="'.$t_day.'" data-text-week="'.$t_week.'" data-text-min="'.$t_min.'" data-text-sec="'.$t_sec.'"';

    // Add plurals
    if(isset($t_hour_p) || isset($t_day_p)) {
      $translations = $translations.' '.'data-text-hour-p="'.$t_hour_p.'" data-text-day-p="'.$t_day_p.'" data-text-week-p="'.$t_week_p.'" data-text-min-p="'.$t_min_p.'" data-text-sec-p="'.$t_sec_p.'"';
    }

    if($style == 'clock'){
      return $before.'<div id="'.$_id.'" class="ux-timer '.$color.'" '.$translations.' data-countdown="'.$date.'"><span>&nbsp;<div class="loading-spin dark centered"></div><strong>&nbsp;</strong></span></div>'.ux_builder_element_style_tag($_id, $args, $atts).$after;
    } else{
      return $before.'<span id="'.$_id.'" class="ux-timer-text" '.$translations.' data-countdown="'.$date.'"></span>'.ux_builder_element_style_tag($_id, $args, $atts).''.$after;
    }
}
add_shortcode('ux_countdown', 'ux_countdown_shortcode');
