<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Gallery Widget Template
 *
 *
 * @file           sidebar-gallery.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php cybermag_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="grid col-300 fit gallery-meta">
		<?php cybermag_widgets(); // above widgets hook ?>
		<div class="widget-wrapper">

			<div class="widget-title"><h3><?php _e( 'Image Information', 'cybermag' ); ?></h3></div>
			<ul>
				<?php
				$cybermag_data = get_post_meta( $post->ID, '_wp_attachment_metadata', true );

				if( is_array( $cybermag_data ) ) {
					?>
					<span class="full-size"><?php _e( 'Full Size:', 'cybermag' ); ?> <a
							href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo $cybermag_data['width'] . '&#215;' . $cybermag_data['height']; ?></a>px</span>

					<?php
					if( is_array( $cybermag_data['image_meta'] ) ) {
						?>
						<?php if( $cybermag_data['image_meta']['aperture'] ) { ?>
							<span class="aperture"><?php _e( 'Aperture: f&#47;', 'cybermag' ); ?><?php echo $cybermag_data['image_meta']['aperture']; ?></span>
						<?php } ?>

						<?php if( $cybermag_data['image_meta']['focal_length'] ) { ?>
							<span
								class="focal-length"><?php _e( 'Focal Length:', 'cybermag' ); ?> <?php echo $cybermag_data['image_meta']['focal_length']; ?><?php _e( 'mm', 'cybermag' ); ?></span>
						<?php } ?>

						<?php if( $cybermag_data['image_meta']['iso'] ) { ?>
							<span class="iso"><?php _e( 'ISO:', 'cybermag' ); ?> <?php echo $cybermag_data['image_meta']['iso']; ?></span>
						<?php } ?>

						<?php if( $cybermag_data['image_meta']['shutter_speed'] ) { ?>
							<span class="shutter"><?php _e( 'Shutter:', 'cybermag' ); ?>
								<?php
								if( ( 1 / $cybermag_data['image_meta']['shutter_speed'] ) > 1 ) {
									echo "1/";
									if( number_format( ( 1 / $cybermag_data['image_meta']['shutter_speed'] ), 1 ) == number_format( ( 1 / $cybermag_data['image_meta']['shutter_speed'] ), 0 ) ) {
										echo number_format( ( 1 / $cybermag_data['image_meta']['shutter_speed'] ), 0, '.', '' ) . ' sec';
									}
									else {
										echo number_format( ( 1 / $cybermag_data['image_meta']['shutter_speed'] ), 1, '.', '' ) . ' sec';
									}
								}
								else {
									echo $cybermag_data['image_meta']['shutter_speed'] . ' sec';
								}
								?>
								</span>
						<?php } ?>

						<?php if( $cybermag_data['image_meta']['camera'] ) { ?>
							<span class="camera"><?php _e( 'Camera:', 'cybermag' ); ?> <?php echo $cybermag_data['image_meta']['camera']; ?></span>
						<?php
						}
					}
				}
				?>
			</ul>

		</div>
		<!-- end of .widget-wrapper -->
	</div><!-- end of #widgets -->

<?php if( !is_active_sidebar( 'gallery-widget' ) ) {
	return;
} ?>

<?php if( is_active_sidebar( 'gallery-widget' ) ) : ?>

	<div id="widgets" class="grid col-300 fit">

		<?php cybermag_widgets(); // above widgets hook ?>

		<?php dynamic_sidebar( 'gallery-widget' ); ?>

		<?php cybermag_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
	<?php cybermag_widgets_after(); // after widgets container hook ?>

<?php endif; ?>