<?php
if ( ! defined( 'ABSPATH' ) )
	exit;
	
	
// Tinymce button
add_filter('mce_external_plugins', "firmasite_firmasitebutton_register");
function firmasite_firmasitebutton_register($plugin_array){
    $plugin_array["firmasitebutton"] = FIRMASITE_PLUGIN_URL ."/assets/js/firmasite-button.js";
    $plugin_array["firmasiteicons"] = FIRMASITE_PLUGIN_URL ."/assets/js/firmasite-icons.js";
   return $plugin_array;
} 
add_filter('tiny_mce_before_init', 'firmasite_firmasitebutton' );
function firmasite_firmasitebutton($init) {
	global $firmasite_settings;
	$init['theme_advanced_buttons2_add_before'] = 'firmasitebutton,firmasiteicons'; // Adds the buttons at the begining. (theme_advanced_buttons2_add adds them at the end)
	$init['body_class'] = $init['body_class'] . ' ' . $firmasite_settings["layout_page_class"];
	return $init;
}



add_filter('init', "firmasite_plugin_editor_init");
function firmasite_plugin_editor_init() {
	wp_localize_script( 'editor', 'firmasitebutton', array(
		//'url'    => plugin_dir_url( __FILE__ ),
		'icons'  => __( 'Icons', 'firmasite-plugin' ),		
		'title'  => __( 'Styles', 'firmasite-plugin' ),		
		'container'  => __( 'Container', 'firmasite-plugin' ),		
			// Well Box
			'well'  => __( 'Well Box', 'firmasite-plugin' ),
				'well_small'  => __( 'Small Well Box', 'firmasite-plugin' ),
				'well_standard'  => __( 'Standard Well Box', 'firmasite-plugin' ),
				'well_large'  => __( 'Large Well Box', 'firmasite-plugin' ),
			// Message Box
			'messagebox'  => __( 'Message Box', 'firmasite-plugin' ),
				'messagebox_alert'  => __( 'Alert Box', 'firmasite-plugin' ),
				'messagebox_error'  => __( 'Alert Box (Danger)', 'firmasite-plugin' ),
				'messagebox_success'  => __( 'Alert Box (Success)', 'firmasite-plugin' ),
				'messagebox_info'  => __( 'Alert Box (Information)', 'firmasite-plugin' ),
			// Modal Box
			'modal'  => __( 'Modal Box', 'firmasite-plugin' ),
				'modal_header'  => __( 'Modal Box (Header)', 'firmasite-plugin' ),
				'modal_body'  => __( 'Modal Box (Body)', 'firmasite-plugin' ),
				'modal_footer'  => __( 'Modal Box (Footer)', 'firmasite-plugin' ),
		// Text Styles
		'text'  => __( 'Text Styles', 'firmasite-plugin' ),
			// Text Color
			'textcolor'  => __( 'Text Color', 'firmasite-plugin' ),
				'text_muted'  => __( 'Muted', 'firmasite-plugin' ),
				'text_alert'  => __( 'Alert', 'firmasite-plugin' ),
				'text_error'  => __( 'Danger', 'firmasite-plugin' ),
				'text_success'  => __( 'Success', 'firmasite-plugin' ),
				'text_info'  => __( 'Information', 'firmasite-plugin' ),
			// Label
			'label'  => __( 'Label', 'firmasite-plugin' ),
				'label_standard'  => __( 'Label', 'firmasite-plugin' ),
				'label_warning'  => __( 'Label (Warning)', 'firmasite-plugin' ),
				'label_important'  => __( 'Label (Important)', 'firmasite-plugin' ),
				'label_success'  => __( 'Label (Success)', 'firmasite-plugin' ),
				'label_info'  => __( 'Label (Info)', 'firmasite-plugin' ),
				'label_inverse'  => __( 'Label (Inverse)', 'firmasite-plugin' ),
			// Badge
			'badge'  => __( 'Badge', 'firmasite-plugin' ),
				'badge_standard'  => __( 'Badge', 'firmasite-plugin' ),
				'badge_warning'  => __( 'Badge (Warning)', 'firmasite-plugin' ),
				'badge_important'  => __( 'Badge (Important)', 'firmasite-plugin' ),
				'badge_success'  => __( 'Badge (Success)', 'firmasite-plugin' ),
				'badge_info'  => __( 'Badge (Info)', 'firmasite-plugin' ),
				'badge_inverse'  => __( 'Badge (Inverse)', 'firmasite-plugin' ),
		// Button
		'button'  => __( 'Link to Button', 'firmasite-plugin' ),
			// Button Color
			'buttoncolor'  => __( 'Button Color', 'firmasite-plugin' ),
				'button_standard'  => __( 'Standard', 'firmasite-plugin' ),
				'button_primary'  => __( 'Primary', 'firmasite-plugin' ),
				'button_alert'  => __( 'Alert', 'firmasite-plugin' ),
				'button_error'  => __( 'Danger', 'firmasite-plugin' ),
				'button_success'  => __( 'Success', 'firmasite-plugin' ),
				'button_info'  => __( 'Information', 'firmasite-plugin' ),
				'button_inverse'  => __( 'Inverse', 'firmasite-plugin' ),
			// Button Size
			'buttonsize'  => __( 'Button Size', 'firmasite-plugin' ),
					'button_block'  => __( 'Block', 'firmasite-plugin' ),
					'button_large'  => __( 'Large', 'firmasite-plugin' ),
					'button_standard'  => __( 'Standard', 'firmasite-plugin' ),
					'button_small'  => __( 'Small', 'firmasite-plugin' ),
					'button_mini'  => __( 'Mini', 'firmasite-plugin' ),
	
	) );
	wp_localize_script( 'editor', 'firmasiteicons', array(
		'wp_includes_url'    => WPINC,
		'title'  => __( 'Icons', 'firmasite-plugin' ),		
	
	) );
}
