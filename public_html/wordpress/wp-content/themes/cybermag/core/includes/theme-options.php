<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Theme Options
 *
 * @file           theme-options.php
 * @package        cybermag
 * @author         cyberspeclab
 * @copyright      2014 cyberspeclab
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
 
/**
 * Call the options class
 */
 
require( get_template_directory() . '/core/includes/classes/cybermag_Options.php' );

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
 
function cybermag_admin_enqueue_scripts( $hook_suffix ) {
	$template_directory_uri = get_template_directory_uri();
	wp_enqueue_style( 'cybermag-theme-options', $template_directory_uri . '/core/includes/theme-options.css', false, '1.0' );
	wp_enqueue_script( 'cybermag-theme-options', $template_directory_uri . '/core/includes/theme-options.js', array( 'jquery' ), '1.0' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'cybermag_admin_enqueue_scripts' );

/**
 * Init plugin options to white list our options
 */
 
function cybermag_theme_options_init() {
	register_setting( 'cybermag_options', 'cybermag_theme_options', 'cybermag_theme_options_validate' );
}

/**
 * Load up the menu page
 */
 
function cybermag_theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'cybermag' ), __( 'Theme Options', 'cybermag' ), 'edit_theme_options', 'theme_options', 'cybermag_theme_options_do_page' );
}

/**
 * Create the options page
 */
function cybermag_theme_options_do_page() {
	if( !isset( $_REQUEST['settings-updated'] ) ) {
		$_REQUEST['settings-updated'] = false;
	}
	// Set confirmaton text for restore default option as attributes of submit_button().
	$attributes['onclick'] = 'return confirm("' . __( 'Do you want to restore? \nAll theme settings will be lost! \nClick OK to Restore.', 'cybermag' ) . '")';
	?>
	<div class="wrap">
	<?php $theme_name = wp_get_theme() ?>
	<?php screen_icon();
	echo "<h2>" . $theme_name . " " . __( 'Theme Options', 'cybermag' ) . "</h2>"; ?>
	<?php if( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options Saved', 'cybermag' ); ?></strong></p></div>
	<?php endif; ?>
	<?php cybermag_theme_options(); // Theme Options Hook ?>
	<?php
	/**
	 * Create array of option sections
	 *
	 * @Title The display title
	 * @id The id that the option array references so the options display in the correct section
	 */
	$sections = apply_filters( 'cybermag_option_sections_filter', array(
																	  array(
																		  'title' => __( 'Theme Elements', 'cybermag' ),
																		  'id'    => 'theme_elements'
																	  ),
																	  array(
																		  'title' => __( 'Logo Upload', 'cybermag' ),
																		  'id'    => 'logo_upload'
																	  ),
																	  array(
																		  'title' => __( 'Home Page', 'cybermag' ),
																		  'id'    => 'home_page'
																	  ),
																	  array(
																		  'title' => __( 'Default Layouts', 'cybermag' ),
																		  'id'    => 'layouts'
																	  ),
																  )
	);
	/**
	 * Creates and array of options that get added to the relevant sections
	 *
	 * @key This must match the id of the section you want the options to appear in
	 *
	 * @title Title on the left hand side of the options
	 * @subtitle Displays underneath main title on left hand side
	 * @heading Right hand side above input
	 * @type The type of input e.g. text, textarea, checkbox
	 * @id The options id
	 * @description Instructions on what to enter in input
	 * @placeholder The placeholder for text and textarea
	 * @options array used by select dropdown lists
	 */
	$options = apply_filters( 'cybermag_options_filter', array(
															 'theme_elements' => array(
																 array(
																	 'title'       => __( 'Disable breadcrumb list?', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'checkbox',
																	 'id'          => 'breadcrumb',
																	 'description' => __( 'check to disable', 'cybermag' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'Enable minified css?', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'checkbox',
																	 'id'          => 'minified_css',
																	 'description' => __( 'check to enable', 'cybermag' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'Blog Title Toggle', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'checkbox',
																	 'id'          => 'blog_post_title_toggle',
																	 'description' => ''
																 ),
																 array(
																	 'title'       => __( 'Title Text', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'text',
																	 'id'          => 'blog_post_title_text',
																	 'description' => '',
																	 'placeholder' => __( 'Blog', 'cybermag' )
																 )
															 ),
															 'logo_upload'    => array(
																 array(
																	 'title'       => __( 'Custom Header', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'description',
																	 'id'          => '',
																	 'description' => __( 'Need to replace or remove default logo?', 'cybermag' ) . sprintf( __( ' <a href="%s">Click here</a>.', 'cybermag' ),
																																							   admin_url( 'themes.php?page=custom-header' ) ),
																	 'placeholder' => ''
																 )
															 ),
															 'home_page'      => array(
																 array(
																	 'title'       => __( 'Enable Custom Front Page', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'checkbox',
																	 'id'          => 'front_page',
																	 'description' => sprintf( __( 'Overrides the WordPress %1sfront page option%2s', 'cybermag' ), '<a href="options-reading.php">', '</a>' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'Featured Content', 'cybermag' ),
																	 'subtitle'    => '<a class="help-links" href="' . esc_url( 'http://cyberspeclab.com/category/cybermag/' ) . '" title="' . esc_attr__( 'See Docs',
																																																		 'cybermag' ) . '" target="_blank">' .
																	 __( 'See Docs', 'cybermag' ) . '</a>',
																	 'heading'     => '',
																	 'type'        => 'editor',
																	 'id'          => 'featured_content',
																	 'description' => __( 'Paste your shortcode, video or image source', 'cybermag' ),
																	 'placeholder' => "<img class='aligncenter' src='" . get_template_directory_uri() . "'/core/images/featured-image.png' width='440' height='300' alt='' />"
																 )
															 ),
															 'layouts'        => array(
																 array(
																	 'title'       => __( 'Default Static Page Layout', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'select',
																	 'id'          => 'static_page_layout_default',
																	 'description' => '',
																	 'placeholder' => '',
																	 'options'     => cybermag_Options::valid_layouts()
																 ),
																 array(
																	 'title'       => __( 'Default Single Blog Post Layout', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'select',
																	 'id'          => 'single_post_layout_default',
																	 'description' => '',
																	 'placeholder' => '',
																	 'options'     => cybermag_Options::valid_layouts()
																 ),
																 array(
																	 'title'       => __( 'Default Blog Posts Index Layout', 'cybermag' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'select',
																	 'id'          => 'blog_posts_index_layout_default',
																	 'description' => '',
																	 'placeholder' => '',
																	 'options'     => cybermag_Options::valid_layouts()
																 )
															 ),
														 )
	);
	if( class_exists( 'cybermag_Pro_Options' ) ) {
		$display = new cybermag_Pro_Options( $sections, $options );
	}
	else {
		$display = new cybermag_Options( $sections, $options );
	}
	?>
	<form method="post" action="options.php">
		<?php settings_fields( 'cybermag_options' ); ?>
		<?php global $cybermag_options; ?>
		<div id="rwd" class="grid col-940">
			<?php
			$display->render_display();
			?>
		</div>
		<!-- end of .grid col-940 -->
	</form>
	</div><!-- wrap -->
<?php
}
/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function cybermag_theme_options_validate( $input ) {
	global $cybermag_options;
	$defaults = cybermag_get_option_defaults();
	if( isset( $input['reset'] ) ) {
		$input = $defaults;
	}
	else {
		// checkbox value is either 0 or 1
		foreach( array(
					 'breadcrumb',
					 'front_page'
				 ) as $checkbox ) {
			if( !isset( $input[$checkbox] ) ) {
				$input[$checkbox] = null;
			}
			$input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
		}
		foreach( array(
					 'static_page_layout_default',
					 'single_post_layout_default',
					 'blog_posts_index_layout_default'
				 ) as $layout ) {
			$input[$layout] = ( isset( $input[$layout] ) && array_key_exists( $input[$layout], cybermag_get_valid_layouts() ) ? $input[$layout] : $cybermag_options[$layout] );
		}
		foreach( array(
					 'featured_content'
				 ) as $content ) {
			$input[$content] = ( in_array( $input[$content], array( $defaults[$content], '' ) ) ? $defaults[$content] : wp_kses_stripslashes( $input[$content] ) );
		}
		$input = apply_filters( 'cybermag_options_validate', $input );
	}
	return $input;
}
