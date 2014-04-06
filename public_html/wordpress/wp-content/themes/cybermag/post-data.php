<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Post Data Template-Part File
 *
 * @file           post-data.php
 * @package        cybermag
 * @author         Cyberspeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>

<?php if( !is_page() && !is_search() ) { ?>

	<div class="post-data">
		<?php the_tags( __( 'Tagged with:', 'cybermag' ) . ' ', ', ', '<br />' ); ?>
		<?php printf( __( 'Posted in %s', 'cybermag' ), get_the_category_list( ', ' ) ); ?>
	</div><!-- end of .post-data -->

<?php } ?>

<div class="post-edit"><?php edit_post_link( __( 'Edit', 'cybermag' ) ); ?></div>