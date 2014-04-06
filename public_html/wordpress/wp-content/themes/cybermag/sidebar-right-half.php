<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sidebar Right Half Template
 *
 *
 * @file           sidebar-right-half.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php cybermag_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="grid col-460 fit">
		<?php cybermag_widgets(); // above widgets hook ?>

		<?php if( !dynamic_sidebar( 'right-sidebar-half' ) ) : ?>
			<div class="widget-wrapper">

				<div class="widget-title"><h3><?php _e( 'In Archive', 'cybermag' ); ?></h3></div>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

			</div><!-- end of .widget-wrapper -->
		<?php endif; //end of sidebar-right-half ?>

		<?php cybermag_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
<?php cybermag_widgets_after(); // after widgets container hook ?>