<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Top Widget Template
 *
 *
 * @file           sidebar-top.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php
if( !is_active_sidebar( 'top-widget' )
) {
	return;
}
?>
<?php cybermag_widgets_before(); // above widgets container hook ?>
	<div id="top-widget" class="top-widget">
		<?php cybermag_widgets(); // above widgets hook ?>

		<?php if( is_active_sidebar( 'top-widget' ) ) : ?>

			<?php dynamic_sidebar( 'top-widget' ); ?>

		<?php endif; //end of top-widget ?>

		<?php cybermag_widgets_end(); // after widgets hook ?>
	</div><!-- end of #top-widget -->
<?php cybermag_widgets_after(); // after widgets container hook ?>