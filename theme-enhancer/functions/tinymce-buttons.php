<?php
if ( ! defined( 'ABSPATH' ) )
	exit;
	
	
// Tinymce button
add_filter('mce_external_plugins', "firmasite_firmasitebutton_register");
function firmasite_firmasitebutton_register($plugin_array){
	if ( ! is_admin() ) return $plugin_array;
	global $firmasite_plugin_settings;
    $plugin_array["firmasitebutton"] = $firmasite_plugin_settings["url"] . "assets/js/firmasite-button.js";
    $plugin_array["firmasiteicons"] = $firmasite_plugin_settings["url"] . "assets/js/firmasite-icons.js";
   return $plugin_array;
} 
add_filter('tiny_mce_before_init', 'firmasite_firmasitebutton' );
function firmasite_firmasitebutton($init) {
	if ( ! is_admin() ) return $init;
	global $firmasite_settings;
	$init['theme_advanced_buttons2_add_before'] = 'firmasitebutton,firmasiteicons'; // Adds the buttons at the begining. (theme_advanced_buttons2_add adds them at the end)
	$init['body_class'] = $init['body_class'] . ' panel panel-default ' . $firmasite_settings["layout_page_class"];
	return $init;
}



add_filter('admin_init', "firmasite_plugin_editor_init");
function firmasite_plugin_editor_init() {
	global $firmasite_plugin_settings;
	wp_localize_script( 'editor', 'firmasitebutton', array(
		//'url'    => plugin_dir_url( __FILE__ ),
		'icons'  => __( 'Icons', FIRMASITE_THEME_ENHANCER ),		
		'title'  => __( 'Styles', FIRMASITE_THEME_ENHANCER ),		
		'container'  => __( 'Container', FIRMASITE_THEME_ENHANCER ),		
			// Well Box
			'well'  => __( 'Well Box', FIRMASITE_THEME_ENHANCER ),
				'well_small'  => __( 'Small Well Box', FIRMASITE_THEME_ENHANCER ),
				'well_standard'  => __( 'Standard Well Box', FIRMASITE_THEME_ENHANCER ),
				'well_large'  => __( 'Large Well Box', FIRMASITE_THEME_ENHANCER ),
			// Message Box
			'messagebox'  => __( 'Message Box', FIRMASITE_THEME_ENHANCER ),
				'messagebox_alert'  => __( 'Alert Box', FIRMASITE_THEME_ENHANCER ),
				'messagebox_error'  => __( 'Alert Box (Danger)', FIRMASITE_THEME_ENHANCER ),
				'messagebox_success'  => __( 'Alert Box (Success)', FIRMASITE_THEME_ENHANCER ),
				'messagebox_info'  => __( 'Alert Box (Information)', FIRMASITE_THEME_ENHANCER ),
			// Modal Box
			'modal'  => __( 'Modal Box', FIRMASITE_THEME_ENHANCER ),
				'modal_header'  => __( 'Modal Box (Header)', FIRMASITE_THEME_ENHANCER ),
				'modal_body'  => __( 'Modal Box (Body)', FIRMASITE_THEME_ENHANCER ),
				'modal_footer'  => __( 'Modal Box (Footer)', FIRMASITE_THEME_ENHANCER ),
		// Text Styles
		'text'  => __( 'Text Styles', FIRMASITE_THEME_ENHANCER ),
			// Text Color
			'textcolor'  => __( 'Text Color', FIRMASITE_THEME_ENHANCER ),
				'text_muted'  => __( 'Muted', FIRMASITE_THEME_ENHANCER ),
				'text_alert'  => __( 'Alert', FIRMASITE_THEME_ENHANCER ),
				'text_error'  => __( 'Danger', FIRMASITE_THEME_ENHANCER ),
				'text_success'  => __( 'Success', FIRMASITE_THEME_ENHANCER ),
				'text_info'  => __( 'Information', FIRMASITE_THEME_ENHANCER ),
			// Label
			'label'  => __( 'Label', FIRMASITE_THEME_ENHANCER ),
				'label_standard'  => __( 'Label', FIRMASITE_THEME_ENHANCER ),
				'label_warning'  => __( 'Label (Warning)', FIRMASITE_THEME_ENHANCER ),
				'label_important'  => __( 'Label (Important)', FIRMASITE_THEME_ENHANCER ),
				'label_success'  => __( 'Label (Success)', FIRMASITE_THEME_ENHANCER ),
				'label_info'  => __( 'Label (Info)', FIRMASITE_THEME_ENHANCER ),
				'label_primary'  => __( 'Label (Primary)', FIRMASITE_THEME_ENHANCER ),
			// Badge
			'badge'  => __( 'Badge', FIRMASITE_THEME_ENHANCER ),
				'badge_standard'  => __( 'Badge', FIRMASITE_THEME_ENHANCER ),
				'badge_warning'  => __( 'Badge (Warning)', FIRMASITE_THEME_ENHANCER ),
				'badge_important'  => __( 'Badge (Important)', FIRMASITE_THEME_ENHANCER ),
				'badge_success'  => __( 'Badge (Success)', FIRMASITE_THEME_ENHANCER ),
				'badge_info'  => __( 'Badge (Info)', FIRMASITE_THEME_ENHANCER ),
				'badge_primary'  => __( 'Badge (Primary)', FIRMASITE_THEME_ENHANCER ),
		// Button
		'button'  => __( 'Link to Button', FIRMASITE_THEME_ENHANCER ),
			// Button Color
			'buttoncolor'  => __( 'Button Color', FIRMASITE_THEME_ENHANCER ),
				'button_standard'  => __( 'Standard', FIRMASITE_THEME_ENHANCER ),
				'button_primary'  => __( 'Primary', FIRMASITE_THEME_ENHANCER ),
				'button_alert'  => __( 'Alert', FIRMASITE_THEME_ENHANCER ),
				'button_error'  => __( 'Danger', FIRMASITE_THEME_ENHANCER ),
				'button_success'  => __( 'Success', FIRMASITE_THEME_ENHANCER ),
				'button_info'  => __( 'Information', FIRMASITE_THEME_ENHANCER ),
				'button_primary'  => __( 'Primary', FIRMASITE_THEME_ENHANCER ),
			// Button Size
			'buttonsize'  => __( 'Button Size', FIRMASITE_THEME_ENHANCER ),
					'button_block'  => __( 'Block', FIRMASITE_THEME_ENHANCER ),
					'button_large'  => __( 'Large', FIRMASITE_THEME_ENHANCER ),
					'button_standard'  => __( 'Standard', FIRMASITE_THEME_ENHANCER ),
					'button_small'  => __( 'Small', FIRMASITE_THEME_ENHANCER ),
					'button_mini'  => __( 'Mini', FIRMASITE_THEME_ENHANCER ),
	
	) );
	wp_localize_script( 'editor', 'firmasiteicons', array(
		'wp_includes_url'    => WPINC,
		'title'  => __( 'Icons', FIRMASITE_THEME_ENHANCER ),		
	
	) );
}
