<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Home Widgets Template
 *
 *
 * @file           sidebar-home.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php cybermag_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="home-widgets">
		<div id="home_widget_1" class="grid col-300">
			<?php cybermag_widgets(); // above widgets hook ?>

			<?php if( !dynamic_sidebar( 'home-widget-1' ) ) : ?>
				<div class="widget-wrapper">

					<div class="widget-title-home"><h3><?php _e( 'Home Widget 1', 'cybermag' ); ?></h3></div>
					<div
						class="textwidget"><?php _e( 'This is your first home widget box. To edit please go to Appearance > Widgets and choose the widget called Home Widget 1. Title is also manageable from widgets as well.', 'cybermag' ); ?></div>

				</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-1 ?>

			<?php cybermag_widgets_end(); // cybermag after widgets hook ?>
		</div>
		<!-- end of .col-300 -->

		<div id="home_widget_2" class="grid col-300 fit">
			<?php cybermag_widgets(); // cybermag above widgets hook ?>

			<?php if( !dynamic_sidebar( 'home-widget-2' ) ) : ?>
				<div class="widget-wrapper">

					<div class="widget-title-home"><h3><?php _e( 'Home Widget 2', 'cybermag' ); ?></h3></div>
					<div
						class="textwidget"><?php _e( 'This is your second home widget box. To edit please go to Appearance > Widgets and choose the widget called Home Widget 2. Title is also manageable from widgets as well.', 'cybermag' ); ?></div>

				</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-2 ?>

			<?php cybermag_widgets_end(); // after widgets hook ?>
		</div>
		<!-- end of .col-300 -->

		<div id="home_widget_3" class="grid col-620">
			<?php cybermag_widgets(); // above widgets hook ?>

			<?php if( !dynamic_sidebar( 'home-widget-3' ) ) : ?>
				<div class="widget-wrapper">

					<div class="widget-title-home"><h3><?php _e( 'Home Widget 3', 'cybermag' ); ?></h3></div>
					<div
						class="textwidget"><?php _e( 'This is your third home widget box. To edit please go to Appearance > Widgets and choose the widget called Home Widget 3. Title is also manageable from widgets as well.', 'cybermag' ); ?></div>

				</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-3 ?>

			<?php cybermag_widgets_end(); // after widgets hook ?>
		</div>
		<!-- end of .col-300 fit -->
	</div><!-- end of #widgets -->
<?php cybermag_widgets_after(); // after widgets container hook ?>