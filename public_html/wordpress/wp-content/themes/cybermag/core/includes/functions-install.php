<?php

/**
 * Functions Install
 *
 * Functions for installation & activation
 *
 * @package        cybermag
 * @license        license.txt
 * @copyright      2014 cyberspeclab
 * @since          2.0
 *
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * Customize theme activation message.
 *
 * @since    2.0
 */
 
function cybermag_activation_notice() {
	if ( isset( $_GET['activated'] ) ) {
		$return = '<div class="updated activation"><p><strong>';
					$cybermag_theme = wp_get_theme();
		if ( isset( $_GET['previewed'] ) ) {
			$return .= sprintf( __( 'Settings saved and %s activated successfully.' ), $cybermag_theme->get( 'Name' ) );
		} else {
			$return .= sprintf( __( '%s activated successfully.' ), $cybermag_theme->get( 'Name' ) );
		}
		$return .= '</strong> <a href="' . home_url( '/' ) . '">' . __( 'Visit site', 'cybermag' ) . '</a></p>';
		//$return .= '<p><a class="button button-primary customize load-customize" href="' . admin_url( 'customize.php?theme=' . get_stylesheet() ) . '">' . __( 'Customize', 'cybermag' ) . '</a>';
		$return .= ' <a class="button button-primary theme-options" href="' . admin_url( 'themes.php?page=theme_options' ) . '">' . __( 'Theme Options', 'cybermag' ) . '</a>';
		$return .= ' <a class="button button-primary help" href="http://cyberspeclab.com/forum/">' . __( 'Help', 'cybermag' ) . '</a>';
		$return .= '</p></div>';
		echo $return;
	}
}
add_action( 'admin_notices', 'cybermag_activation_notice' );
/*
 * Hide core theme activation message.
 *
 * @since    2.0
 */
function cybermag_admin_css() { ?>
	<style>
	.themes-php #message2 {
		display: none;
	}
	.themes-php div.activation a {
		text-decoration: none;
	}
	</style>
<?php }
add_action( 'admin_head', 'cybermag_admin_css' );
