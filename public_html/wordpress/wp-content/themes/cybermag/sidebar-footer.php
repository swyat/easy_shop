<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Widget Template
 *
 * @category CyberSpecLab Framework
 * @package  Framework
 * @since    2.0
 * @author   CyberSpeclab
 */


if( !is_active_sidebar( 'footer-widget' ) ) {
	return;
}
?>
<?php cybermag_widgets_before(); // above widgets container hook ?>
	<div id="footer_widget" class="grid col-940">
		<?php cybermag_widgets(); // above widgets hook ?>

		<?php if( is_active_sidebar( 'footer-widget' ) ) : ?>

			<?php dynamic_sidebar( 'footer-widget' ); ?>

		<?php endif; //end of colophon-widget ?>

		<?php cybermag_widgets_end(); // after widgets hook ?>
	</div><!-- end of #footer-widget -->
<?php cybermag_widgets_after(); // after widgets container hook ?>