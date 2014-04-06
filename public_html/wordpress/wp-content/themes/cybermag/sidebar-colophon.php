<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Colophon Widget Template
 *
 *
 * @file           sidebar-colophon.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php
if( !is_active_sidebar( 'colophon-widget' )
) {
	return;
}
?>
<?php cybermag_widgets_before(); // above widgets container hook ?>
	<div id="colophon-widget" class="grid col-940">
		<?php cybermag_widgets(); // above widgets hook ?>

		<?php if( is_active_sidebar( 'colophon-widget' ) ) : ?>

			<?php dynamic_sidebar( 'colophon-widget' ); ?>

		<?php endif; //end of colophon-widget ?>

		<?php cybermag_widgets_end(); // after widgets hook ?>
	</div><!-- end of #colophon-widget -->
<?php cybermag_widgets_after(); // after widgets container hook ?>