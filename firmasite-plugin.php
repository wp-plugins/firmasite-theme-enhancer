<?php
/*
Plugin Name: FirmaSite Theme Enhancer
Plugin URI: http://firmasite.com
Description: This plugin provides new features to themes. Twitter Bootstrap design elements, custom editor buttons and more..
Version: 1.1.1
Author: Ünsal Korkmaz
Author URI: http://unsalkorkmaz.com
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl.txt
Text Domain:   firmasite-theme-enhancer
Domain Path:   /languages/
*/


// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action('after_setup_theme', "firmasite_plugin_setup", 99);
function firmasite_plugin_setup() {
	
  if ( !defined('FIRMASITE_STOP_THEME_ENHANCER') || ( defined('FIRMASITE_STOP_THEME_ENHANCER') && false === WP_DEBUG ) ) {

	define("FIRMASITE_THEME_ENHANCER", "firmasite-theme-enhancer");
	
	// You can translate Plugin Name with this
	__("FirmaSite Theme Enhancer", FIRMASITE_THEME_ENHANCER);
	// You can translate description with this
	__("This plugin provides new features to themes. Twitter Bootstrap design elements, custom editor buttons and more..", FIRMASITE_THEME_ENHANCER);

	/* 
	 * Settings init 
	 */
	global $firmasite_plugin_settings;

	if (!isset($firmasite_plugin_settings["plugin_url"])) $firmasite_plugin_settings["plugin_url"] = plugin_dir_url( __FILE__ );
	if (!isset($firmasite_plugin_settings["plugin_dir"])) $firmasite_plugin_settings["plugin_dir"] = plugin_dir_path( __FILE__ );
	
	if (!isset($firmasite_plugin_settings["url"])) $firmasite_plugin_settings["url"] = $firmasite_plugin_settings["plugin_url"] . 'theme-enhancer/';
	if (!isset($firmasite_plugin_settings["dir"])) $firmasite_plugin_settings["dir"] = $firmasite_plugin_settings["plugin_dir"] . 'theme-enhancer/';
	
	if (!isset($firmasite_plugin_settings["font_url"])) $firmasite_plugin_settings["font_url"] = $firmasite_plugin_settings["plugin_url"] . 'font-awesome/';
	if (!isset($firmasite_plugin_settings["font_dir"])) $firmasite_plugin_settings["font_dir"] = $firmasite_plugin_settings["plugin_dir"] . 'font-awesome/';
	if (!isset($firmasite_plugin_settings["font_name"])) $firmasite_plugin_settings["font_name"] = 'FontAwesome';
	if (!isset($firmasite_plugin_settings["font_id"])) $firmasite_plugin_settings["font_id"] = 'fontawesome-webfont';

	
	if (!current_theme_supports('firmasite-bootstrap') || !defined('FIRMASITE_POWEREDBY') ){
		add_action('wp_enqueue_scripts', "firmasite_plugin_enqueue_script" );
		function firmasite_plugin_enqueue_script() {
			global $firmasite_plugin_settings;
			// bootstrap
			wp_register_style( 'bootstrap', $firmasite_plugin_settings["plugin_url"] . 'bootstrap/css/bootstrap.min.css' );
			wp_enqueue_style( 'bootstrap' );
		}
		
		add_action("wp_head", "firmasite_plugin_custom_css");
		function firmasite_plugin_custom_css(){
		?>
		<style type="text/css">	
		/* make modals usable */
		.firmasite-modal-static{position:inherit;top:inherit;left:inherit;right:inherit;bottom:inherit;	margin:0 auto 20px;z-index:inherit;max-width:100%;width:100%;word-wrap:break-word;display:inline-block;overflow:inherit}
		.firmasite-modal-static .modal-dialog{width:100%;z-index:inherit;left:inherit;right:inherit;padding:0}
		.firmasite-modal-static .modal-footer{border-radius:6px;text-align:inherit;margin-top:0}
		.firmasite-modal-static .bbp-reply-author{text-align:center} 
		.firmasite-modal-static .modal-body{overflow-y:inherit;max-height:inherit}
		.firmasite-modal-static .modal-body.alert{margin-bottom:0}

		/* Tinymce Bootstrap Fixes for wp-admin */
		body.mceContentBody{margin:10px!important;padding:10px!important}
		</style>
        <?php
		}
		// Tell the TinyMCE editor to use a custom stylesheet
		add_filter( 'mce_css', 'firmasite_plugin_mce_css' );
		function firmasite_plugin_mce_css( $mce_css ) {
			global $firmasite_plugin_settings;
			if ( ! empty( $mce_css ) )
				$mce_css .= ',';
		
			$mce_css .= $firmasite_plugin_settings["url"] . 'assets/css/wpeditor.php';
			$mce_css .= ',';
			$mce_css .= $firmasite_plugin_settings["font_url"] . $firmasite_plugin_settings["font_id"] . '.css';
		
			return $mce_css;
		}	
	}
	
	if ( defined('FIRMASITE_POWEREDBY') ) {
		include_once( $firmasite_plugin_settings["dir"] . "functions/anatema-custom-css.php");		
		include_once( $firmasite_plugin_settings["dir"] . "functions/shortcode-showcase.php");		

		// Tell the TinyMCE editor to use a custom stylesheet
		add_filter( 'mce_css', 'firmasite_plugin_mce_css_for_theme' );
		function firmasite_plugin_mce_css_for_theme( $mce_css ) {
			global $firmasite_plugin_settings;
			if ( ! empty( $mce_css ) )
				$mce_css .= ',';
		
			$mce_css .= $firmasite_plugin_settings["font_url"] . $firmasite_plugin_settings["font_id"] . '.css';
		
			return $mce_css;
		}
			
	}
	
	add_action('wp_enqueue_scripts', "firmasite_plugin_enqueue_fontcss", 11 );
	function firmasite_plugin_enqueue_fontcss() {
		global $firmasite_plugin_settings;
		// font-css
		wp_register_style( 'firmasite_plugin_fontcss', $firmasite_plugin_settings["font_url"] . $firmasite_plugin_settings["font_id"] . '.css' );
		wp_enqueue_style( 'firmasite_plugin_fontcss' );
	}
	
	require_once ($firmasite_plugin_settings["dir"] . 'functions/tinymce-buttons.php');			// Tinymce buttons
	
	load_plugin_textdomain( FIRMASITE_THEME_ENHANCER, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );	
  }
}
	


// Load translations
/*add_action('plugins_loaded', "firmasite_plugin_language_init");
function firmasite_plugin_language_init() {
	global $firmasite_plugin_settings;
	load_plugin_textdomain( 'firmasite-theme-enhancer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );	
}*/


