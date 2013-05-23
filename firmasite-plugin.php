<?php
/*
Plugin Name: FirmaSite Theme Enhancer
Plugin URI: http://firmasite.com
Description: This plugin provides new features to themes. Twitter Bootstrap design elements, custom editor buttons and more..
Version: 1.0.2
Author: Ünsal Korkmaz
Author URI: http://unsalkorkmaz.com
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl.txt
Text Domain:   firmasite-plugin
Domain Path:   /languages/
*/
// You can translate Plugin Name with this
__("FirmaSite Theme Enhancer", "firmasite-plugin");
// You can translate description with this
__("This plugin provides new features to themes. Twitter Bootstrap design elements, custom editor buttons and more..", "firmasite-plugin");

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

define('FIRMASITE_PLUGIN_VERSION', '1.0.2');


if ( !defined('FIRMASITE_PLUGIN_URL') )
	define( 'FIRMASITE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
if ( !defined('FIRMASITE_PLUGIN_DIR') )
	define( 'FIRMASITE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action('after_setup_theme', "firmasite_plugin_setup",11 );
function firmasite_plugin_setup() {
	if (!current_theme_supports('firmasite-bootstrap') || !defined('FIRMASITE_POWEREDBY') ){
		add_action('wp_enqueue_scripts', "firmasite_plugin_enqueue_script" );
		function firmasite_plugin_enqueue_script() {
			// bootstrap
			wp_register_style( 'bootstrap', FIRMASITE_PLUGIN_URL . 'assets/bootstrap/css/bootstrap.min.css' );
			wp_enqueue_style( 'bootstrap' );
			// bootstrap
			wp_register_style( 'firmasite_plugin_custom', FIRMASITE_PLUGIN_URL . 'assets/css/custom.css' );
			wp_enqueue_style( 'firmasite_plugin_custom' );
		}
		
		// Tell the TinyMCE editor to use a custom stylesheet
		function firmasite_plugin_mce_css( $mce_css ) {
			if ( ! empty( $mce_css ) )
				$mce_css .= ',';
		
			$mce_css .= FIRMASITE_PLUGIN_URL . 'assets/css/wpeditor.php';
			$mce_css .= ',';
			$mce_css .= FIRMASITE_PLUGIN_URL . 'assets/css/custom.css';
		
			return $mce_css;
		}	
		add_filter( 'mce_css', 'firmasite_plugin_mce_css' );
	}
	
	if ( defined('FIRMASITE_POWEREDBY') ) {
		include_once( FIRMASITE_PLUGIN_DIR . "functions/anatema-custom-css.php");		
	} 
	
	require_once (FIRMASITE_PLUGIN_DIR . 'functions/tinymce-buttons.php');			// Tinymce buttons
		
}
	


// Load translations
add_action('plugins_loaded', "firmasite_plugin_language_init");
function firmasite_plugin_language_init() {
	load_plugin_textdomain( 'firmasite-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );	
}

