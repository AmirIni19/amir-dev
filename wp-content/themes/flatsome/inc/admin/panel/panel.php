<?php

/**
 * Flatsome Admin Panel
 */
class Flatsome_Admin {

	/**
	 * Sets up the welcome screen
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'flatsome_panel_register_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'flatsome_panel_style' ) );
	}


	/**
	 * Load welcome screen css.
	 *
	 * @since  1.4.4
	 */
	public function flatsome_panel_style() {
		$uri     = get_template_directory_uri();
		$theme   = wp_get_theme( get_template() );
		$version = $theme->get( 'Version' );

		wp_enqueue_style( 'flatsome-panel-css', $uri . '/inc/admin/panel/panel.css', array(), $version );
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.0.0
	 */
	public function flatsome_panel_register_menu() {
		$flatsome_icon = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDM4IiBoZWlnaHQ9IjQzOCIgdmlld0JveD0iMCAwIDQzOCA0MzgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxnIGNsaXAtcGF0aD0idXJsKCNjbGlwMF85NTJfOSkiPgo8cGF0aCBkPSJNMjE4LjUwNSA0MzcuMDEzVjM3NS43MzdMMTY5Ljg3NSAzMjcuMTA4TDIxOC41MDUgMjc4LjQ3NlYyMTcuMkwxMzkuMjM2IDI5Ni40NzFMNjEuMjc2NCAyMTguNTFMMjE4LjUwNSA2MS4yODA0VjAuMDA2ODM1OTRMMCAyMTguNTFMMjE4LjUwNSA0MzcuMDEzWiIgZmlsbD0id2hpdGUiLz4KPHBhdGggb3BhY2l0eT0iMC41IiBkPSJNMjE4LjUwNyA2MS4yNzU5TDM3NS43MzUgMjE4LjUwNUwyOTcuNzc2IDI5Ni40NjRMMjE4LjUwNyAyMTcuMTk4VjI3OC40NzJMMjY3LjEzOSAzMjcuMTAzTDIxOC41MDcgMzc1LjczMlY0MzcuMDA2TDMyOC40MTMgMzI3LjEwM0w0MzcuMDEyIDIxOC41MDVMMjE4LjUwNyAwVjYxLjI3NTlaIiBmaWxsPSJ3aGl0ZSIvPgo8L2c+CjxkZWZzPgo8Y2xpcFBhdGggaWQ9ImNsaXAwXzk1Ml85Ij4KPHJlY3Qgd2lkdGg9IjQzOCIgaGVpZ2h0PSI0MzgiIGZpbGw9IndoaXRlIi8+CjwvY2xpcFBhdGg+CjwvZGVmcz4KPC9zdmc+Cg==';
		add_menu_page( 'Welcome to Flatsome', 'ایران فلتسام', 'manage_options', 'flatsome-panel', array( $this, 'flatsome_panel_welcome' ), $flatsome_icon, '2' );
		add_submenu_page( 'flatsome-panel', 'Theme Registration', 'لایسنس', 'manage_options', 'admin.php?page=flatsome-panel' );
		add_submenu_page( 'flatsome-panel', 'Help & Guides', 'راهنما', 'manage_options', 'flatsome-panel-support', array( $this, 'flatsome_panel_support' ) );
		add_submenu_page( 'flatsome-panel', 'Status', 'وضعیت', 'manage_options', 'flatsome-panel-status', array( $this, 'flatsome_panel_status' ) );
		add_submenu_page( 'flatsome-panel', 'Features', 'امکانات', 'manage_options', 'flatsome-panel-features', array( $this, 'flatsome_panel_features' ) );
		add_submenu_page( 'flatsome-panel', 'Change log', 'تغییرات', 'manage_options', 'flatsome-panel-changelog', array( $this, 'flatsome_panel_changelog' ) );
		add_submenu_page( 'flatsome-panel', '', 'سفارشی سازی', 'manage_options', 'customize.php' );
	}

	/**
	 * The welcome screen
	 * @since 1.0.0
	 */
	public function flatsome_panel_welcome() {
		?>
		<div class="flatsome-panel">
			<div class="wrap about-wrap">
				<?php require get_template_directory() . '/inc/admin/panel/sections/top.php'; ?>
				<?php require get_template_directory() . '/inc/admin/panel/sections/tab-activate.php'; ?>
			</div>
		</div>
		<?php
	}

	public function flatsome_panel_getting_started() {
		?>
		<div class="flatsome-panel">
			<div class="wrap about-wrap">
				<?php require get_template_directory() . '/inc/admin/panel/sections/top.php'; ?>
				<?php require get_template_directory() . '/inc/admin/panel/sections/tab-guide.php'; ?>
			</div>
		</div>
		<?php
	}

	public function flatsome_panel_tutorials() {
		?>
		<div class="flatsome-panel">
			<div class="wrap about-wrap">
				<?php require get_template_directory() . '/inc/admin/panel/sections/top.php'; ?>
				<?php require get_template_directory() . '/inc/admin/panel/sections/tab-tutorials.php'; ?>
			</div>
		</div>
		<?php
	}

	public function flatsome_panel_support() {
		?>
		<div class="flatsome-panel">
			<div class="wrap about-wrap">
				<?php require get_template_directory() . '/inc/admin/panel/sections/top.php'; ?>
				<?php require get_template_directory() . '/inc/admin/panel/sections/tab-support.php'; ?>
			</div>
		</div>
		<?php
	}

	public function flatsome_panel_status() {
		?>
		<div class="flatsome-panel">
			<div class="wrap about-wrap">
				<?php require get_template_directory() . '/inc/admin/panel/sections/top.php'; ?>
				<?php require get_template_directory() . '/inc/admin/panel/sections/tab-status.php'; ?>
			</div>
		</div>
		<?php
	}

	public function flatsome_panel_features() {
		?>
		<div class="flatsome-panel">
			<div class="wrap about-wrap">
				<?php require get_template_directory() . '/inc/admin/panel/sections/top.php'; ?>
				<?php require get_template_directory() . '/inc/admin/panel/sections/tab-features.php'; ?>
			</div>
		</div>
		<?php
	}

	public function flatsome_panel_changelog() {
		?>
		<div class="flatsome-panel">
			<div class="wrap about-wrap">
				<?php require get_template_directory() . '/inc/admin/panel/sections/top.php'; ?>
				<?php require get_template_directory() . '/inc/admin/panel/sections/tab-changelog.php'; ?>
			</div>
		</div>
		<?php
	}
}

$GLOBALS['Flatsome_Admin'] = new Flatsome_Admin();
