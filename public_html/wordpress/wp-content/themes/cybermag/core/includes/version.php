<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Version Control
 *
 *
 * @file           version.php
 * @package        WordPress
 * @subpackage     cybermag
 * @author         CyberSpeclab
 * @copyright      2014 cyberspeclab
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php
function cybermag_template_data() {
	echo '<!-- We need this for debugging -->' . "\n";
	echo '<!-- ' . get_cybermag_template_name() . ' ' . get_cybermag_template_version() . ' -->' . "\n";
}
add_action( 'wp_head', 'cybermag_template_data' );
function cybermag_theme_data() {
	if( is_child_theme() ) {
		echo '<!-- ' . get_cybermag_theme_name() . ' ' . get_cybermag_theme_version() . ' -->' . "\n";
	}
}
add_action( 'wp_head', 'cybermag_theme_data' );
function get_cybermag_theme_name() {
	$theme = wp_get_theme();
	return $theme->Name;
}
function get_cybermag_theme_version() {
	$theme = wp_get_theme();
	return $theme->Version;
}
function get_cybermag_template_name() {
	$theme  = wp_get_theme();
	$parent = $theme->parent();
	if( $parent ) {
		$theme = $parent;
	}
	return $theme->Name;
}
function get_cybermag_template_version() {
	$theme  = wp_get_theme();
	$parent = $theme->parent();
	if( $parent ) {
		$theme = $parent;
	}
	return $theme->Version;
}