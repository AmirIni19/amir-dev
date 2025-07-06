<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wpuzman.com
 * @since      1.0.0
 *
 * @package    Wp_Story
 * @subpackage Wp_Story/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Story
 * @subpackage Wp_Story/public
 * @author     wpuzman <iletisim@wpuzman.com>
 */
class Wp_Story_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * @var array get saved stories
	 * @since 1.0.0
	 */
	var $stories;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->stories     = ! empty( get_option( $this->plugin_name . '_stories' ) ) ? get_option( $this->plugin_name . '_stories' ) : array();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name . '-main', plugin_dir_url( dirname( __FILE__ ) ) . 'dist/wp-story.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'jquery-nicescroll', plugin_dir_url( __FILE__ ) . 'js/jquery.nicescroll.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'dist/wp-story.js', array( 'jquery' ), $this->version, false );
		
		wp_localize_script( $this->plugin_name, 'wpStoryObject', array(
			'homeUrl' => home_url( '/' ),
			'is_rtl'  => is_rtl(),
			'lang'    => array(
				'unmute'      => esc_html__( 'برای صدادار کردن لمس کنید', 'wp-story' ),
				'keyboardTip' => esc_html__( 'برای دیدن بعدی، فاصله را فشار دهید', 'wp-story' ),
				'visitLink'   => esc_html__( 'مشاهده لینک', 'wp-story' ),
				'time'        => array(
					'ago'       => esc_html__( 'پیش', 'wp-story' ),
					'hour'      => esc_html__( 'ساعت پیش', 'wp-story' ),
					'hours'     => esc_html__( 'ساعت پیش', 'wp-story' ),
					'minute'    => esc_html__( 'دقیقه پیش', 'wp-story' ),
					'minutes'   => esc_html__( 'دقیقه پیش', 'wp-story' ),
					'fromnow'   => esc_html__( 'از الان', 'wp-story' ),
					'seconds'   => esc_html__( 'ثانیه پیش', 'wp-story' ),
					'yesterday' => esc_html__( 'دیروز', 'wp-story' ),
					'tomorrow'  => esc_html__( 'فردا', 'wp-story' ),
					'days'      => esc_html__( 'روز پیش', 'wp-story' ),
				),
			),
		) );
	}

	public function short_code_init() {
		add_shortcode( 'wp-story', array( $this, 'create_shortcode' ) );
	}

	/**
	 * @return array|bool
	 * @since 1.0.0
	 */
	public function get_stories() {
		if ( ! $this->stories ) {
			return false;
		}

		$args = array(
			'order'          => 'DESC',
			'post_type'      => 'wp-story',
			'posts_per_page' => -1,
			'post__in'       => $this->stories,
			'orderby'        => 'post__in',
		);

		$query = new WP_Query( $args );

		if ( ! $query->have_posts() ) {
			return false;
		}

		$story = array();
		while ( $query->have_posts() ) {
			$query->the_post();
			$story_id    = get_the_ID();
			$story_items = get_post_meta( get_the_ID(), 'wp_story_items', true );

			$story_items_arr = array();
			if ( ! empty( $story_items ) && is_array( $story_items ) ) {
				$i = 0;
				foreach ( $story_items as $story_item ) {
					
					// کد اضافه شده برای تشخیص نوع فایل
					$media_type = 'photo';
					$src = isset( $story_item['src'] ) ? $story_item['src'] : '';
					if ( ! empty( $src ) ) {
						$file_extension = strtolower( pathinfo( $src, PATHINFO_EXTENSION ) );
						$video_extensions = [ 'mp4', 'webm', 'ogv' ];
						if ( in_array( $file_extension, $video_extensions ) ) {
							$media_type = 'video';
						}
					}
					// پایان کد اضافه شده

					$story_items_arr[] = array(
						'id'       => 'story' . '-' . $story_id . '-' . $i,
						'type'     => $media_type,
						'length'   => 3,
						'src'      => $src,
						'preview'  => '',
						'link'     => $story_item['link'],
						'linkText' => $story_item['text'],
						'time'     => get_post_timestamp( get_the_ID() ),
						'seen'     => false,
						'new_tab'  => isset( $story_item['new_tab'] ) && $story_item['new_tab'] ? '_blank' : '_self',
					);
					$i++;
				}
			}

			$story[] = array(
				'id'          => 'story' . '-' . $story_id,
				'photo'       => get_the_post_thumbnail_url( get_the_ID(), 'wpstory-circle' ),
				'name'        => get_the_title(),
				'link'        => get_the_permalink(),
				'lastUpdated' => get_post_timestamp( get_the_ID() ),
				'seen'        => false,
				'items'       => $story_items_arr,
			);
		}

		wp_reset_postdata();

		return $story;
	}

	/**
	 * Create shortcode
	 * @return false|string|null
	 * @since 1.0.0
	 */
	public function create_shortcode() {
		ob_start();
		echo '<div id="stories"></div>';
		return ob_get_clean();
	}

	public function rest_api() {
		register_rest_route( 'wp-story/v1', '/free', array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'rest_api_callback' ),
			'permission_callback' => '__return_true',
		) );
	}

	public function rest_api_callback() {
		return $this->get_stories();
	}
}