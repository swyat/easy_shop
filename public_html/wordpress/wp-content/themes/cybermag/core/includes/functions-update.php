<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Update social icon options
 *
 * @since    2.0
 */
 
function cybermag_update_social_icon_options() {
	$cybermag_options = cybermag_get_options();
	
	// Update entire array
	update_option( 'cybermag_theme_options', $cybermag_options );
}
add_action( 'after_setup_theme', 'cybermag_update_social_icon_options' );
