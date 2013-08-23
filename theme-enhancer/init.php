<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


add_action('after_setup_theme', "firmasite_theme_enhancer_setup",11 );
function firmasite_theme_enhancer_setup() {
	// Disables gpl plugin
	remove_action('after_setup_theme', "firmasite_plugin_setup", 99);

	global $firmasite_plugin_settings;

		include_once( $firmasite_plugin_settings["dir"] . "functions/anatema-custom-css.php");		
		include_once( $firmasite_plugin_settings["dir"] . "functions/shortcode-showcase.php");		

		// Tell the TinyMCE editor to use a custom stylesheet
		add_filter( 'mce_css', 'firmasite_theme_enhancer_mce_css' );
		function firmasite_theme_enhancer_mce_css( $mce_css ) {
			global $firmasite_plugin_settings;
			if ( ! empty( $mce_css ) )
				$mce_css .= ',';
		
			$mce_css .= $firmasite_plugin_settings["font_url"] . $firmasite_plugin_settings["font_id"] . '.css';
		
			return $mce_css;
		}	
	
	// Register font for customizer panel, admin panel and frontend
	add_action( 'customize_controls_print_styles', "firmasite_theme_enhancer_fontcss" );
	add_action( 'admin_init', "firmasite_theme_enhancer_fontcss" );
	add_action( 'wp_enqueue_scripts', "firmasite_theme_enhancer_fontcss" );
	function firmasite_theme_enhancer_fontcss() {
		global $firmasite_plugin_settings;
		// font-css
		wp_register_style( 'firmasite_iconfont', $firmasite_plugin_settings["font_url"] . $firmasite_plugin_settings["font_id"] . '.css' );
		wp_enqueue_style( 'firmasite_iconfont' );
	}	
	require_once ($firmasite_plugin_settings["dir"] . 'functions/tinymce-buttons.php');			// Tinymce buttons
	
}

