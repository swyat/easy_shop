<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Site Front Page
 *
 * @file           front-page.php
 * @package        cybermag
 * @author         CyberSpecLab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */

/**
 * Globalize Theme Options
 */
$cybermag_options = cybermag_get_options();
/**
 * If front page is set to display the
 * blog posts index, include home.php;
 * otherwise, display static front page
 * content
 */
if ( 'posts' == get_option( 'show_on_front' ) && $cybermag_options['front_page'] != 1 ) {
	get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $cybermag_options['front_page'] != 1 ) {
	$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
	$template = ( $template == 'default' ) ? 'index.php' : $template;
	locate_template( $template, true );
} else {

	get_header();

	//test for first install no database
	$db = get_option( 'cybermag_theme_options' );
	?>
 
         <div id="featured-image" class="grid col-620">

			<?php $featured_content = ( !empty( $cybermag_options['featured_content'] ) ) ? $cybermag_options['featured_content'] : '<img class="aligncenter" src="' . get_template_directory_uri() . '/core/images/featured-image.png" width="620" height="350" alt="" />'; ?>

			<?php echo do_shortcode( wpautop( $featured_content ) ); ?>
            
	<?php
	get_sidebar( 'home' );
	 ?>
    </div>
	 <!-- end of #featured-image -->
	
	<?php	
	get_sidebar();
	get_footer();
}
?>


