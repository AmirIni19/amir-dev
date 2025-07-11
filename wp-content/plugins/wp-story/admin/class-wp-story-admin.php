<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wpuzman.com
 * @since      1.0.0
 *
 * @package    Wp_Story
 * @subpackage Wp_Story/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Story
 * @subpackage Wp_Story/admin
 * @author     wpuzman <iletisim@wpuzman.com>
 */
class Wp_Story_Admin {

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
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->stories = ! empty( get_option( $this->plugin_name . '_stories' ) ) ? get_option( $this->plugin_name . '_stories' ) : array();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Story_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Story_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		global $current_screen;

		if( $current_screen->id === 'wp-story' || $current_screen->post_type === 'wp-story' ) {
			wp_enqueue_style( 'selectize', plugin_dir_url( __FILE__ ) . 'css/selectize.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-story-admin.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Story_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Story_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		global $current_screen;

		if( $current_screen->id === 'wp-story' || $current_screen->post_type === 'wp-story' ) {
			wp_enqueue_script( 'selectize', plugin_dir_url( __FILE__ ) . 'js/selectize.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-story-admin.js', array( 'jquery' ), $this->version, false );

			$localized_array = [
				'ajaxUrl'           => admin_url( 'admin-ajax.php' ),
				'featured_required' => esc_html__( 'تصویر شاخص الزامی است!', 'wp-story' ),
				'dont_forget'       => esc_html__( 'فراموش نکنید که کدام استوری‌ها نمایش داده می‌شوند را تنظیم کنید.', 'wp-story' ),
			];

			wp_localize_script( $this->plugin_name, 'wpStoryObject', $localized_array );
		}
	}

	/**
	 * Create oprions page
	 *
	 * @since 1.0.0
	 */
	public function add_options_page() {

		add_submenu_page(
			'edit.php?post_type=' . $this->plugin_name,
			__( 'استوری‌های نمایش داده شده', 'wp-story' ),
			__( 'استوری‌های نمایش داده شده', 'wp-story' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_fields_page' )
		);

		add_submenu_page(
			'edit.php?post_type=' . $this->plugin_name,
			__( 'گزینه‌ها', 'wp-story' ),
			__( 'گزینه‌ها', 'wp-story' ),
			'manage_options',
			$this->plugin_name . '-options',
			array( $this, 'display_options_page' )
		);

	}

	public function register_settings() {
		add_settings_section(
			$this->plugin_name . '_stories_section',
			'',
			array( $this, 'stories_section_cb' ),
			$this->plugin_name
		);

		add_settings_field(
			$this->plugin_name . '_stories',
			__( 'استوری‌ها', 'wp-story' ),
			array( $this, 'stories_cb' ),
			$this->plugin_name,
			$this->plugin_name . '_stories_section',
			array( 'label_for' => $this->plugin_name . '_stories' )
		);

		register_setting( $this->plugin_name, $this->plugin_name . '_stories', 'sanitize_array' );

		/**************************************************************************************************************/
	}

	public function stories_cb() { ?>
        <select class="story-posts" name="<?php echo $this->plugin_name . '_stories[]' ?>" id="<?php echo $this->plugin_name . '_stories' ?>" multiple>
			<?php
			foreach ( $this->post_options() as $post ) {
				echo '<option value="' . get_post( $post )->ID . '" ' . selected( in_array( get_post( $post )->ID, $this->stories ), true ) . '>' . get_the_title( $post ) . '</option>';
			}
			?>
        </select>
	<?php }

	public function stories_section_cb() {

	}

	/**
	 * @param $arr
	 * @return array
	 * Sanitize array values before saving to database
	 */
	public function sanitize_array( $arr ) {
		$newArr = array();
		$func = 'sanitize_text_field';

		foreach ( $arr as $key => $value ) {
			$newArr[ $key ] = ( is_array( $value ) ? sanitize_array( $func, $value ) : ( is_array( $func ) ? call_user_func_array( $func, $value ) : $func( $value ) ) );
		}

		return $newArr;
	}

	/**
	 * Render fields page
	 *
	 * @since 1.0.0
	 */
	public function display_fields_page() {
		include_once 'partials/wp-story-admin-fields-display.php';
	}

	/**
	 * Render options page fields
	 *
	 * @since 1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/wp-story-admin-options-display.php';
	}

	/**
	 * @return array
	 * Displayed story posts
	 */
	public function post_options() {
		return get_posts( array(
			'fields'         => 'ids',
			'post_type'      => 'wp-story',
			'posts_per_page' => -1
		) );
	}

	/**
	 * Create custom post type
	 */
	function create_story_cpt() {

		$labels = array(
			'name'                  => _x( 'استوری‌ها', 'Post Type General Name', 'wp-story' ),
			'singular_name'         => _x( 'استوری', 'Post Type Singular Name', 'wp-story' ),
			'menu_name'             => _x( 'استوری‌ها', 'Admin Menu text', 'wp-story' ),
			'name_admin_bar'        => _x( 'استوری', 'Add New on Toolbar', 'wp-story' ),
			'archives'              => __( 'آرشیو استوری', 'wp-story' ),
			'attributes'            => __( 'ویژگی‌های استوری', 'wp-story' ),
			'parent_item_colon'     => __( 'استوری والد:', 'wp-story' ),
			'all_items'             => __( 'همه استوری‌ها', 'wp-story' ),
			'add_new_item'          => __( 'افزودن استوری جدید', 'wp-story' ),
			'add_new'               => __( 'افزودن جدید', 'wp-story' ),
			'new_item'              => __( 'استوری جدید', 'wp-story' ),
			'edit_item'             => __( 'ویرایش استوری', 'wp-story' ),
			'update_item'           => __( 'به‌روزرسانی استوری', 'wp-story' ),
			'view_item'             => __( 'مشاهده استوری', 'wp-story' ),
			'view_items'            => __( 'مشاهده استوری‌ها', 'wp-story' ),
			'search_items'          => __( 'جستجوی استوری', 'wp-story' ),
			'not_found'             => __( 'یافت نشد', 'wp-story' ),
			'not_found_in_trash'    => __( 'در زباله‌دان یافت نشد', 'wp-story' ),
			'featured_image'        => __( 'تصویر شاخص', 'wp-story' ),
			'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'wp-story' ),
			'remove_featured_image' => __( 'حذف تصویر شاخص', 'wp-story' ),
			'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'wp-story' ),
			'insert_into_item'      => __( 'درج در استوری', 'wp-story' ),
			'uploaded_to_this_item' => __( 'در این استوری بارگذاری شد', 'wp-story' ),
			'items_list'            => __( 'لیست استوری‌ها', 'wp-story' ),
			'items_list_navigation' => __( 'پیمایش لیست استوری‌ها', 'wp-story' ),
			'filter_items_list'     => __( 'فیلتر لیست استوری‌ها', 'wp-story' ),
		);
		$args = array(
			'label'               => __( 'استوری', 'wp-story' ),
			'description'         => '',
			'labels'              => $labels,
			'menu_icon'           => plugin_dir_url( __FILE__ ) . 'img/menu.png',
			'supports'            => array( 'title', 'thumbnail' ),
			'taxonomies'          => array(),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'hierarchical'        => false,
			'exclude_from_search' => true,
			'show_in_rest'        => true,
			'publicly_queryable'  => false,
			'capability_type'     => 'post',
		);
		register_post_type( 'wp-story', $args );

	}

	public function wp_story_stories_ajax() {
		check_ajax_referer( 'wp_story_action', 'wp_story_field' );

		// Sanitize Array Values
		$stories = isset( $_POST[ 'story_posts' ] ) ? (array) $_POST[ 'story_posts' ] : array();
		$stories = array_map( 'esc_attr', array_unique( $stories ) );

		// Update Sanitized Values
		update_option( 'wp_story', $stories );

		wp_send_json_success( [ 'message' => __( 'استوری‌ها ذخیره شدند!', 'wp-story' ) ] );
	}

	public function settings_link( $links ) {
		$settings_link = array(
			'<a style="font-weight: bold;" target="_blank" href="https://codecanyon.net/item/wp-story-premium/27546341">' . __( 'خرید نسخه پرو', 'wp-story' ) . '</a>',
		);
		return array_merge( $links, $settings_link );
	}

	/**
	 * Create fixed story thumbnail size.
	 * @since 2.0.1
	 */
	public function image_sizes() {
		add_image_size( 'wpstory-circle', 86, 86, true );
	}
}