<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        cybermag
 * @author         CyberSpecLab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
 
/*
 * Globalize Theme options
 */
 
global $cybermag_options;
$cybermag_options = cybermag_get_options();
?>
<?php cybermag_wrapper_bottom(); // after wrapper content hook ?>
</div><!-- end of #wrapper -->
<?php cybermag_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php cybermag_container_end(); // after container hook ?>
<div id="footer" class="clearfix">
	<?php cybermag_footer_top(); ?>
	<div id="footer-wrapper">
		<?php get_sidebar( 'footer' ); ?>
		<div class="grid col-940">
			<div class="grid col-540">
				<?php if( has_nav_menu( 'footer-menu', 'cybermag' ) ) { ?>
					<?php wp_nav_menu( array(
										   'container'      => '',
										   'fallback_cb'    => false,
										   'menu_class'     => 'footer-menu',
										   'theme_location' => 'footer-menu'
									   )
					);
					?>
				<?php } ?>
			</div>
			<!-- end of col-540 -->
		</div>
		<!-- end of col-940 -->
		<?php get_sidebar( 'colophon' ); ?>
		<div class="grid col-300 copyright">
			<?php esc_attr_e( '&copy;', 'cybermag' ); ?> <?php _e( date( 'Y' ) ); ?><a href="<?php echo esc_url(home_url( '/' )) ?>" target="_blank" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div>
		<!-- end of .copyright -->
		<div class="grid col-300 scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'cybermag' ); ?>"><?php _e( '&uarr;', 'cybermag' ); ?></a></div>
		<div class="grid col-300 fit powered">
			<a href="<?php echo esc_url( 'http://cyberspeclab.com/cybermag/' ); ?>" target="_blank" title="<?php esc_attr_e( 'cybermag Theme', 'cybermag' ); ?>">
				cybermag Theme</a>
			<?php esc_attr_e( 'powered by', 'cybermag' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" target="_blank" title="<?php esc_attr_e( 'WordPress', 'cybermag' ); ?>">
				WordPress</a>
		</div>
		<!-- end .powered -->
	</div>
	<!-- end #footer-wrapper -->
	<?php cybermag_footer_bottom(); ?>
</div><!-- end #footer -->
<?php cybermag_footer_after(); ?>
<?php wp_footer(); ?>
</body>
</html>