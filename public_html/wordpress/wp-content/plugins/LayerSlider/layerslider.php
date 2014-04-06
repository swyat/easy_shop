<?php

/**
 * @package LayerSlider WP
 * @version 3.5.0
 */
/*

Plugin Name: LayerSlider WP
Plugin URI: http://codecanyon.net/user/kreatura/
Description: The Wordress Parallax Slider
Version: 3.5.0
Author: Kreatura Media
Author URI: http://kreaturamedia.com/
*/


/********************************************************/
/*                        Actions                       */
/********************************************************/

	// Activation hook for creating the initial DB table
	register_activation_hook(__FILE__, 'layerslider_activation_scripts');

	// Register custom settings menu
	add_action('admin_menu', 'layerslider_settings_menu');

	// Link content resources
	add_action('wp_enqueue_scripts', 'layerslider_enqueue_content_res');

	// Link admin resources
	add_action('admin_enqueue_scripts', 'layerslider_enqueue_admin_res');

	// Add shortcode
	add_shortcode("layerslider","layerslider_init");

	// Widget action
	add_action( 'widgets_init', create_function( '', 'register_widget("LayerSlider_Widget");' ) );

	// Remove slider
	if(isset($_GET['page']) && $_GET['page'] == 'layerslider' && isset($_GET['action']) && $_GET['action'] == 'remove') {
		layerslider_removeslider( $_GET['id'] );
	}

	// Duplicate slider
	if(isset($_GET['page']) && $_GET['page'] == 'layerslider' && isset($_GET['action']) && $_GET['action'] == 'duplicate') {
		layerslider_duplicateslider( $_GET['id'] );
	}

	// Import sample sliders
	if(isset($_GET['page']) && $_GET['page'] == 'layerslider' && isset($_GET['action']) && $_GET['action'] == 'import_sample') {
		layerslider_import_sample_slider();
	}

	// Convert data storage
	if(isset($_GET['page']) && $_GET['page'] == 'layerslider' && isset($_GET['action']) && $_GET['action'] == 'convert') {
		layerslider_convert();
	}

	// Help menu
	add_filter('contextual_help', 'layerslider_help', 10, 3);

	// Storage notice
	if(get_option('layerslider-slides') != false) {

        // Get current page
        global $pagenow;

        // Plugins page
        if($pagenow == 'plugins.php' || $pagenow == 'index.php' || strstr($_SERVER['REQUEST_URI'], 'layerslider')) {

			add_action('admin_notices', 'layerslider_admin_notice');
		}
	}


/********************************************************/
/*            LayerSlider activation scripts            */
/********************************************************/

function layerslider_activation_scripts() {

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "layerslider";

	// Building the query
	$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
			  `id` int(10) NOT NULL AUTO_INCREMENT,
			  `name` varchar(100) NOT NULL,
			  `data` text NOT NULL,
			  `date_c` int(10) NOT NULL,
			  `date_m` int(11) NOT NULL,
			  `flag_hidden` tinyint(1) NOT NULL DEFAULT '0',
			  `flag_deleted` tinyint(1) NOT NULL DEFAULT '0',
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

	// Executing the query
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	// Execute the query
	dbDelta($sql);
}

/********************************************************/
/*               Enqueue Content Scripts                */
/********************************************************/

	function layerslider_enqueue_content_res() {

		wp_enqueue_script('layerslider_js', plugins_url('/js/layerslider.kreaturamedia.jquery.js', __FILE__), array('jquery'), '3.5.0' );
		wp_enqueue_script('jquery_easing', plugins_url('/js/jquery-easing-1.3.js', __FILE__), array('jquery'), '1.3.0' );
		wp_enqueue_style('layerslider_css', plugins_url('/css/layerslider.css', __FILE__), array(), '3.5.0' );
	}


/********************************************************/
/*                Enqueue Admin Scripts                 */
/********************************************************/

	function layerslider_enqueue_admin_res() {

		// Global
		wp_enqueue_style('layerslider_global_css', plugins_url('/css/global.css', __FILE__), array(), '3.5.0' );

		// LayerSlider
		if(strstr($_SERVER['REQUEST_URI'], 'layerslider')) {

			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');

			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('jquery-ui-draggable');

			wp_enqueue_script('farbtastic');
			wp_enqueue_style('farbtastic');

			wp_enqueue_script('wp-pointer');
			wp_enqueue_style('wp-pointer');

			wp_enqueue_script('layerslider_admin_js', plugins_url('/js/admin.js', __FILE__), array('jquery'), '3.5.0' );
			wp_enqueue_style('layerslider_admin_css', plugins_url('/css/admin.css', __FILE__), array(), '3.5.0' );

			wp_enqueue_script('layerslider_js', plugins_url('/js/layerslider.kreaturamedia.jquery.js', __FILE__), array('jquery'), '3.5.0' );
			wp_enqueue_script('jquery_easing', plugins_url('/js/jquery-easing-1.3.js', __FILE__), array('jquery'), '1.3.0' );
			wp_enqueue_style('layerslider_css', plugins_url('/css/layerslider.css', __FILE__), array(), '3.5.0' );
		}
	}

function layerslider_help($contextual_help, $screen_id, $screen) {

	global $layerslider_hook;
	if ($screen_id == $layerslider_hook) {
		$screen = get_current_screen();

		if(function_exists('file_get_contents')) {

			// List view
			if(!isset($_GET['action'])) {

				// Overview
				$screen->add_help_tab(array(
				   'id' => 'home_overview',
				   'title' => 'Overview',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/home_overview.html')
				));

				// Managing sliders
				$screen->add_help_tab(array(
				   'id' => 'home_screen',
				   'title' => 'Managing sliders',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/managing_sliders.html')
				));

				// Insert LayerSlider to your page
				$screen->add_help_tab(array(
				   'id' => 'inserting_slider',
				   'title' => 'Insert LayerSlider to your page',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/inserting_slider.html')
				));

				// Export / Import
				$screen->add_help_tab(array(
				   'id' => 'exportimport',
				   'title' => 'Export / Import',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/exportimport.html')
				));

				// Sample slider
				$screen->add_help_tab(array(
				   'id' => 'sample_slider',
				   'title' => 'Sample sliders',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/sample_slider.html')
				));

			// Editor view
			} else {

				// Overview
				$screen->add_help_tab(array(
				   'id' => 'overview',
				   'title' => 'Overview',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/edit_overview.html')
				));

				// Getting started video
				$screen->add_help_tab(array(
				   'id' => 'gettingstarted',
				   'title' => 'Getting started',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/gettingstarted.html')
				));

				// Slider types
				$screen->add_help_tab(array(
				   'id' => 'slider_types',
				   'title' => 'Slider types',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/slider_types.html')
				));

				// Layer options
				$screen->add_help_tab(array(
				   'id' => 'layer_options',
				   'title' => 'Layer options',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/layer_options.html')
				));

				// Sublayer options
				$screen->add_help_tab(array(
				   'id' => 'sublayer_options',
				   'title' => 'Sublayer options',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/sublayer_options.html')
				));

				// WYSIWYG Editor
				$screen->add_help_tab(array(
				   'id' => 'wysiwyg_editor',
				   'title' => 'WYSIWYG Editor',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/wysiwyg_editor.html')
				));

				// Embedding videos
				$screen->add_help_tab(array(
				   'id' => 'embedding_videos',
				   'title' => 'Embedding videos',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/embedding_videos.html')
				));

				// Other features
				$screen->add_help_tab(array(
				   'id' => 'other_features',
				   'title' => 'Other features',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/other_features.html')
				));

				// Event callbacks
				$screen->add_help_tab(array(
				   'id' => 'event_callbacks',
				   'title' => 'Event callbacks',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/event_callbacks.html')
				));

				// LayerSlider API
				$screen->add_help_tab(array(
				   'id' => 'layerslider_api',
				   'title' => 'LayerSlider API',
				   'content' => file_get_contents(dirname(__FILE__).'/docs/api.html')
				));
			}
		} else {

			// Error
			$screen->add_help_tab(array(
				'id' => 'error',
				'title' => 'Error',
				'content' => 'This help section couldn\'t show you the documentation because your server don\'t support the "file_get_contents" function'
			));
		}
	}
}

/********************************************************/
/*                 Loads settings menu                  */
/********************************************************/
function layerslider_settings_menu() {

	// Menu hook
	global $layerslider_hook;

	//create new top-level menu
	$layerslider_hook = add_menu_page('LayerSlider WP', 'LayerSlider WP', 'manage_options', 'layerslider', 'layerslider_router', plugins_url('/img/icon_16x16.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'layerslider_register_settings' );
}

/********************************************************/
/*                    Settings page                     */
/********************************************************/
function layerslider_router() {

	// Add new
	if(isset($_GET['action']) && $_GET['action'] == 'add') {
		include(dirname(__FILE__).'/add.php');

	// Edit
	} elseif(isset($_GET['action']) && $_GET['action'] == 'edit') {
		include(dirname(__FILE__).'/edit.php');

	// List
	} else {
		include(dirname(__FILE__).'/list.php');
	}
}

/********************************************************/
/*                  Register settings                   */
/********************************************************/
function layerslider_register_settings() {

	// Add slider
	if(isset($_POST['posted_add']) && strstr($_SERVER['REQUEST_URI'], 'layerslider')) {

		// Get WPDB Object
		global $wpdb;

		// Table name
		$table_name = $wpdb->prefix . "layerslider";

		// Create new record
		if($_POST['layerkey'] == 0) {

			// Execute query
			$wpdb->query(
				$wpdb->prepare("INSERT INTO $table_name
									(data, date_c, date_m)
								VALUES (%s, %d, %d)",
								'',
								time(),
								time()
								)
			);

			// Empty slider
			$slider = array();

			// ID
			$id = mysql_insert_id();
		} else {

			// Get slider
			$slider = $wpdb->get_row("SELECT * FROM $table_name ORDER BY id DESC LIMIT 1" , ARRAY_A);

			// ID
			$id = $slider['id'];

			$slider = json_decode($slider['data'], true);
		}

		// Add modifications
		if(isset($_POST['layerslider-slides']['properties']['relativeurls'])) {
			$slider['properties'] = $_POST['layerslider-slides']['properties'];
			$slider['layers'][ $_POST['layerkey'] ] = layerslider_convert_urls($_POST['layerslider-slides']['layers'][$_POST['layerkey']]);
		} else {
			$slider['properties'] = $_POST['layerslider-slides']['properties'];
			$slider['layers'][ $_POST['layerkey'] ] = $_POST['layerslider-slides']['layers'][$_POST['layerkey']];
		}

		// DB data
		$name = $wpdb->escape($slider['properties']['title']);
		$data = $wpdb->escape(json_encode($slider));

		// Update
		$wpdb->query("UPDATE $table_name SET
					name = '$name',
					data = '$data',
					date_m = '".time()."'
				  ORDER BY id DESC LIMIT 1");

		// Echo last ID for redirect
		echo $id;

		// Redirect back
		//header('Location: '.$_SERVER['REQUEST_URI'].'');
		die();
	}

	// Edit slider
	if(isset($_POST['posted_edit']) && strstr($_SERVER['REQUEST_URI'], 'layerslider')) {

		// Get WPDB Object
		global $wpdb;

		// Table name
		$table_name = $wpdb->prefix . "layerslider";

		// Get the IF of the slider
		$id = (int) $_GET['id'];

		// Get slider
		$slider = $wpdb->get_row("SELECT * FROM $table_name WHERE id = ".(int)$id." ORDER BY date_c DESC LIMIT 1" , ARRAY_A);
		$slider = json_decode($slider['data'], true);

		// Empty the slider
		if($_POST['layerkey'] == 0) {
			$slider = array();
		}

		// Add modifications
		if(isset($_POST['layerslider-slides']['properties']['relativeurls'])) {
			$slider['properties'] = $_POST['layerslider-slides']['properties'];
			$slider['layers'][ $_POST['layerkey'] ] = layerslider_convert_urls($_POST['layerslider-slides']['layers'][$_POST['layerkey']]);
		} else {
			$slider['properties'] = $_POST['layerslider-slides']['properties'];
			$slider['layers'][ $_POST['layerkey'] ] = $_POST['layerslider-slides']['layers'][$_POST['layerkey']];
		}

		// DB data
		$name = $wpdb->escape($slider['properties']['title']);
		$data = $wpdb->escape(json_encode($slider));

		// Update
		$wpdb->query("UPDATE $table_name SET
					name = '$name',
					data = '$data',
					date_m = '".time()."'
				  WHERE id = '$id' LIMIT 1");

		// Redirect back
		//header('Location: '.$_SERVER['REQUEST_URI'].'');
		die();
	}

	// Import settings
	if(isset($_POST['import']) && strstr($_SERVER['REQUEST_URI'], 'layerslider')) {

		// Try to get slider data with JSON
		$import = json_decode(base64_decode($_POST['import']), true);

		// Invalid export code
		if(!is_array($import)) {

			// Try to get slider data with PHP unserialize
			$import = unserialize(base64_decode($_POST['import']));

			// Failed to extract the slider data, exit
			if(!is_array($import)) {
				header('Location: '.$_SERVER['REQUEST_URI'].'');
				die();
			}
		}

		// Get WPDB Object
		global $wpdb;

		// Table name
		$table_name = $wpdb->prefix . "layerslider";

		// Iterate over imported sliders
		foreach($import as $item) {

			// Execute query
			$wpdb->query(
				$wpdb->prepare("INSERT INTO $table_name
									(name, data, date_c, date_m)
								VALUES (%s, %s, %d, %d)",
								$item['properties']['title'],
								json_encode($item),
								time(),
								time()
								)
			);
		}

		// Redirect back
		header('Location: '.$_SERVER['REQUEST_URI'].'');
		die();
	}
}

/********************************************************/
/*                 LayerSlider init                     */
/********************************************************/

function layerslider_init($atts) {

	// ID check
	if(!isset($atts['id']) || empty($atts['id'])) {
		return '[LayerSliderWP] Invalid shortcode';
	}

	// Get slider ID
	$id = $atts['id'];

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "layerslider";

	// Get slider
	$slider = $wpdb->get_row("SELECT * FROM $table_name
								WHERE id = ".(int)$id." AND flag_hidden = '0'
								AND flag_deleted = '0'
								ORDER BY date_c DESC LIMIT 1" , ARRAY_A);

	// Result check
	if($slider == null) {
		return '[LayerSliderWP] Slider not found';
	}

	// Decode data
	$slides = json_decode($slider['data'], true);

	// Include slider file
	include(dirname(__FILE__).'/init.php');
	include(dirname(__FILE__).'/slider.php');

	// Return data
	return $data;
}

/********************************************************/
/*              LayerSlider storage notice              */
/********************************************************/

function layerslider_admin_notice() {
    ?>
    <div id="layerslider_notice" class="updated">
        <img src="<?php echo plugins_url('/img/ls_80x80.png', __FILE__) ?>" alt="WeatherSlider icon">
        <h1>The new version of LayerSlider WP is almost ready!</h1>
        <p>
            For a faster and more reliable solution, LayerSlider WP needs to convert
            your data associated with the plugin. Your sliders and settings will
            remain still, and it only takes a click on this button.

            <a href="admin.php?page=layerslider&action=convert">Convert Data</a>
        </p>
        <div class="clear"></div>
    </div>
    <?php
}

/********************************************************/
/*              LayerSlider storage convert             */
/********************************************************/

function layerslider_convert() {

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "layerslider";

	// Building the query
	$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
			  `id` int(10) NOT NULL AUTO_INCREMENT,
			  `name` varchar(100) NOT NULL,
			  `data` text NOT NULL,
			  `date_c` int(10) NOT NULL,
			  `date_m` int(11) NOT NULL,
			  `flag_hidden` tinyint(1) NOT NULL DEFAULT '0',
			  `flag_deleted` tinyint(1) NOT NULL DEFAULT '0',
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

	// Executing the query
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	// Execute the query
	dbDelta($sql);

	// Get sliders if any
	$sliders = get_option('layerslider-slides');

	// There is no sliders, exit
	if($sliders == false) {
		header('Location: admin.php?page=layerslider');
		die();
	}

	// Unserialize
	$sliders = is_array($sliders) ? $sliders : unserialize($sliders);

	// Iterate over them
	foreach($sliders as $key => $slider) {

		$wpdb->query(
			$wpdb->prepare("INSERT INTO $table_name
								( name, data, date_c, date_m )
							VALUES
								(
									'%s', '%s', '%d', '%d'
								)",
								$slider['properties']['title'],
	        					json_encode($slider),
								time(),
								time()
			)
		);
	}

	// Remove old data
	delete_option('layerslider-slides');

	// Done, exit
	header('Location: admin.php?page=layerslider');
	die();
}

/********************************************************/
/*               Action to duplicate slider             */
/********************************************************/
function layerslider_duplicateslider($id) {

	// Get the ID of the slider
	$id = (int) $id;

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "layerslider";

	// Get slider
	$slider = $wpdb->get_row("SELECT * FROM $table_name WHERE id = ".(int)$id." ORDER BY date_c DESC LIMIT 1" , ARRAY_A);
	$slider = json_decode($slider['data'], true);

	// Name check
	if(empty($slider['properties']['title'])) {
		$slider['properties']['title'] = 'Unnamed';
	}

	// Rename
	$slider['properties']['title'] .= ' copy';

	// Insert the duplicate
	$wpdb->query(
		$wpdb->prepare("INSERT INTO $table_name
							(name, data, date_c, date_m)
						VALUES (%s, %s, %d, %d)",
						$slider['properties']['title'],
						json_encode($slider),
						time(),
						time()
		)
	);

	// Success
	header('Location: admin.php?page=layerslider');
	die();
}


/********************************************************/
/*                Action to remove slider               */
/********************************************************/
function layerslider_removeslider($id) {

	// Get the ID of the slider
	$id = (int) $id;

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "layerslider";

	// Remove the slider
	$wpdb->query("UPDATE $table_name SET flag_deleted = '1' WHERE id = '$id' LIMIT 1");

	// Success
	header('Location: admin.php?page=layerslider');
	die();
}

/********************************************************/
/*            Action to import sample slider            */
/********************************************************/
function layerslider_import_sample_slider() {

	// Base64 encoded, serialized slider export code
	$sample_slider = json_decode(base64_decode(file_get_contents(dirname(__FILE__).'/sample_sliders.txt')), true);

	// Iterate over the sliders
	foreach($sample_slider as $sliderkey => $slider) {

		// Iterate over the layers
		foreach($sample_slider[$sliderkey]['layers'] as $layerkey => $layer) {

			// Change background images if any
			if(!empty($sample_slider[$sliderkey]['layers'][$layerkey]['properties']['background'])) {
				$sample_slider[$sliderkey]['layers'][$layerkey]['properties']['background'] = plugins_url('/sampleslider/' . $layer['properties']['background'], __FILE__);
			}

			// Change thumbnail images if any
			if(!empty($sample_slider[$sliderkey]['layers'][$layerkey]['properties']['thumbnail'])) {
				$sample_slider[$sliderkey]['layers'][$layerkey]['properties']['thumbnail'] = plugins_url('/sampleslider/' . $layer['properties']['thumbnail'], __FILE__);
			}

			// Iterate over the sublayers
			foreach($layer['sublayers'] as $sublayerkey => $sublayer) {

				// Only IMG sublayers
				if($sublayer['type'] == 'img') {
					$sample_slider[$sliderkey]['layers'][$layerkey]['sublayers'][$sublayerkey]['image'] = plugins_url('/sampleslider/' . $sublayer['image'], __FILE__);
				}
			}
		}
	}

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "layerslider";

	// Append duplicate
	foreach($sample_slider as $key => $val) {

		// Insert the duplicate
		$wpdb->query(
			$wpdb->prepare("INSERT INTO $table_name
								(name, data, date_c, date_m)
							VALUES (%s, %s, %d, %d)",
							$val['properties']['title'],
							json_encode($val),
							time(),
							time()
			)
		);
	}

	// Success
	header('Location: admin.php?page=layerslider');
	die();
}

/********************************************************/
/*                        MISC                          */
/********************************************************/

function layerslider_check_unit($str) {

	if(strstr($str, 'px') == false && strstr($str, '%') == false) {
		return $str.'px';
	} else {
		return $str;
	}
}

function layerslider_convert_urls($arr) {

	// Layer BG
	if(strpos($arr['properties']['background'], 'http://') !== false) {
		$arr['properties']['background'] = parse_url($arr['properties']['background'], PHP_URL_PATH);
	}

	// Layer Thumb
	if(strpos($arr['properties']['thumbnail'], 'http://') !== false) {
		$arr['properties']['thumbnail'] = parse_url($arr['properties']['thumbnail'], PHP_URL_PATH);
	}

	// Image sublayers
	foreach($arr['sublayers'] as $sublayerkey => $sublayer) {

	    if($sublayer['type'] == 'img') {
	    	if(strpos($sublayer['image'], 'http://') !== false) {
	    		$arr['sublayers'][$sublayerkey]['image'] = parse_url($sublayer['image'], PHP_URL_PATH);
	    	}
	    }
	}

	return $arr;
}

/********************************************************/
/*                   Widget settings                    */
/********************************************************/

class LayerSlider_Widget extends WP_Widget {

	function LayerSlider_Widget() {

		$widget_ops = array( 'classname' => 'layerslider_widget', 'description' => __('Insert a slider with LayerSlider WP Widget', 'layerslider') );
		$control_ops = array( 'id_base' => 'layerslider_widget' );
		$this->WP_Widget( 'layerslider_widget', __('LayerSlider WP Widget', 'layerslider'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );


		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		// Call layerslider_init to show the slider
		echo do_shortcode('[layerslider id="'.$instance['id'].'"]');

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['id'] = strip_tags( $new_instance['id'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function form( $instance ) {

		// Defaults
		$defaults = array( 'title' => __('LayerSlider', 'layerslider'));
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get WPDB Object
		global $wpdb;

		// Table name
		$table_name = $wpdb->prefix . "layerslider";

		// Get sliders
		$sliders = $wpdb->get_results( "SELECT * FROM $table_name
											WHERE flag_hidden = '0' AND flag_deleted = '0'
											ORDER BY date_c ASC LIMIT 100" );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'id' ); ?>">Choose a slider:</label><br>
			<?php if($sliders != null && !empty($sliders)) { ?>
			<select id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>">
				<?php foreach($sliders as $item) : ?>
				<?php $name = empty($item->name) ? 'Unnamed' : $item->name; ?>
				<?php if(($item->id) == $instance['id']) { ?>
				<option value="<?php echo $item->id?>" selected="selected"><?php echo $name ?> | #<?php echo $item->id?></option>
				<?php } else { ?>
				<option value="<?php echo $item->id?>"><?php echo $name ?> | #<?php echo $item->id?></option>
				<?php } ?>
				<?php endforeach; ?>
			</select>
			<?php } else { ?>
			You didn't create any slider yet.
			<?php } ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
	<?php
	}
}