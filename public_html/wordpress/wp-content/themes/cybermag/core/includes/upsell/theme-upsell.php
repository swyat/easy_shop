<?php
/**
 * Title: Theme Upsell.
 *
 * Description: Displays list of all Cyberspeclab theme linking to it's pro and free versions.
 *
 * @category Cyberspeclab Framework
 * @package  Framework
 * @since    2.0
 * @author   CyberSpeclab
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

// Add stylesheet and JS for upsell page.
function cybermag_upsell_style() {

	// Set template directory uri
	$directory_uri = get_template_directory_uri();

	wp_enqueue_style( 'bootstrap', $directory_uri . '/core/includes/upsell/bootstrap/css/bootstrap.css' );
	wp_enqueue_style( 'bootstrap-cybermag', $directory_uri . '/core/includes/upsell/bootstrap/css/bootstrap-cybermag.css', 'bootstrap' );
	wp_enqueue_style( 'cybermag-cybermag', $directory_uri . '/core/includes/upsell/bootstrap/css/cybermag-cybermag.css', array( 'bootstrap', 'bootstrap-cybermag' ) );

	wp_enqueue_script( 'bootstrap-js', $directory_uri . '/core/includes/upsell/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );

	wp_enqueue_style( 'upsell_style', get_template_directory_uri() . '/core/includes/upsell/css/upsell.css' );
}

// Add upsell page to the menu.
function cybermag_add_upsell() {
	$page = add_theme_page( 'cybermag Themes', 'cybermag Themes', 'administrator', 'cybermag-themes', 'cybermag_display_upsell' );

	add_action( 'admin_print_styles-' . $page, 'cybermag_upsell_style' );
}

add_action( 'admin_menu', 'cybermag_add_upsell' );

// Define markup for the upsell page.
function cybermag_display_upsell() {

	// Set template directory uri
	$directory_uri = get_template_directory_uri();
	?>

	<div class="wrap">
	<div class="container-fluid">
	<div id="upsell_container">
	<div class="row-fluid">
		<div id="upsell_header" class="span12">
			<h2>
				<a href="http://cyberspeclab.com" target="_blank">
					<img src="<?php echo $directory_uri; ?>/core/includes/upsell/images/upsell-logo.png"/>
				</a>
			</h2>
			<h5><?php _e( 'Professional, customizable, fast loading, always updated and guaranteed to work themes.', 'cybermag_core' ); ?></h5>
		</div>
	</div>
	<div id="upsell_themes" class="row-fluid">

		<!-- -------------- Ifeature Pro ------------------- -->

		<div id="ifeature" class="row-fluid">
			<div class="theme-container">
				<div class="theme-image span3">
					<a href="http://cyberspeclab.com/themes/" target="_blank">
						<img src="<?php echo $directory_uri; ?>/core/includes/upsell/images/innovative.png"/>
					</a>
				</div>
				<div class="theme-info span9">
					<a class="theme-name" href="http://cyberspeclab.com/themes/" target="_blank"><h4>Amazing Features & Beautiful Designs</h4></a>

					<div class="theme-description">
						<p>Have your website up and running in minutes with WordPress and one of our themes. Our theme options customizer makes creating a unique and impressive website easy                          enough that anyone can do it.</p>

					</div>

					<a class="buy btn btn-primary" href="http://cyberspeclab.com/themes/" target="_blank"><?php _e( 'Browse our themes', 'cybermag_core' ); ?></a>
				</div>
			</div>
		</div>

	</div>
	<!-- upsell themes -->
	</div>
	<!-- upsell container -->
	</div>
	<!-- container-fluid -->
	</div>
<?php
}

?>