<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Loop Navigation Template-Part File
 *
 * @file           loop-nav.php
 * @package        cybermag
 * @author         CyberSpecLab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */

/**
 * Output Prev/Next Posts Links
 */
if( $wp_query->max_num_pages > 1 ) :
	?>

	<div class="navigation">
		<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'cybermag' ) ); ?></div>
		<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'cybermag' ) ); ?></div>
	</div><!-- end of .navigation -->

<?php
endif;