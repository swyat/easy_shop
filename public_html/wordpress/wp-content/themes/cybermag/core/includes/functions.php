<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        cybermag
 * @author         Cyberspeclab
 * @copyright      2014 cyberspeclab
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php

/*
 * Globalize Theme options
 */
 
$cybermag_options = cybermag_get_options();

/*
 * Hook options
 */
 
add_action( 'admin_init', 'cybermag_theme_options_init' );
add_action( 'admin_menu', 'cybermag_theme_options_add_page' );

/**
 * Retrieve Theme option settings
 */
function cybermag_get_options() {
	// Globalize the variable that holds the Theme options
	global $cybermag_options;
	// Parse array of option defaults against user-configured Theme options
	$cybermag_options = wp_parse_args( get_option( 'cybermag_theme_options', array() ), cybermag_get_option_defaults() );
	// Return parsed args array
	return $cybermag_options;
}
/**
 * cybermag Theme option defaults
 */
function cybermag_get_option_defaults() {
	$defaults = array(
		'breadcrumb'                      => false,
		'minified_css'                    => false,
		'front_page'                      => 1,
		'featured_content'                => null,
		'cybermag_inline_css'           => '',
		'cybermag_inline_js_head'       => '',
		'cybermag_inline_css_js_footer' => '',
		'static_page_layout_default'      => 'content-sidebar-page',
		'single_post_layout_default'      => 'content-sidebar-page',
		'blog_posts_index_layout_default' => 'content-sidebar-page',
	);
	return apply_filters( 'cybermag_option_defaults', $defaults );
}
/**
 * Helps file locations in child themes. If the file is not being overwritten by the child theme then
 * return the parent theme location of the file. Great for images.
 *
 * @param $dir string directory
 *
 * @return string complete uri
 */
function cybermag_child_uri( $dir ) {
	if ( is_child_theme() ) {
		$directory = get_stylesheet_directory() . $dir;
		$test      = is_file( $directory );
		if ( is_file( $directory ) ) {
			$file = get_stylesheet_directory_uri() . $dir;
		} else {
			$file = get_template_directory_uri() . $dir;
		}
	} else {
		$file = get_template_directory_uri() . $dir;
	}
	return $file;
}
/**
 * Fire up the engines boys and girls let's start theme setup.
 */
add_action( 'after_setup_theme', 'cybermag_setup' );
if ( !function_exists( 'cybermag_setup' ) ):
	function cybermag_setup() {

/*
 * Create image sizes for the galley
 */
add_image_size( 'cybermag-100', 100, 9999 );
add_image_size( 'cybermag-150', 150, 9999 );
add_image_size( 'cybermag-200', 200, 9999 );
add_image_size( 'cybermag-300', 300, 9999 );
add_image_size( 'cybermag-450', 450, 9999 );
add_image_size( 'cybermag-600', 600, 9999 );
add_image_size( 'cybermag-900', 900, 9999 );

		global $content_width;
		$template_directory = get_template_directory();
		/**
		 * Global content width.
		 */
		if ( !isset( $content_width ) ) {
			$content_width = 550;
		}
		/**
		 * cybermag is now available for translations.
		 * The translation files are in the /languages/ directory.
		 * Translations are pulled from the WordPress default lanaguge folder
		 * then from the child theme and then lastly from the parent theme.
		 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
		 */
		$domain = 'cybermag';
		load_theme_textdomain( $domain, WP_LANG_DIR . '/cybermag/' );
		load_theme_textdomain( $domain, get_stylesheet_directory() . '/languages/' );
		load_theme_textdomain( $domain, get_template_directory() . '/languages/' );
		
        // Disable media queries
        function remove_media_queries() {
        wp_dequeue_style( 'cybermag-media-queries' );
        }
        add_action( 'wp_enqueue_scripts', 'remove_media_queries', 20 );
		/**
		 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
		 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
		 */
		add_editor_style();
		/**
		 * This feature enables post and comment RSS feed links to head.
		 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
		 */
		add_theme_support( 'automatic-feed-links' );
		/**
		 * This feature enables post-thumbnail support for a theme.
		 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		/**
		 * This feature enables woocommerce support for a theme.
		 * @see http://www.woothemes.com/2013/02/last-call-for-testing-woocommerce-2-0-coming-march-4th/
		 */
		add_theme_support( 'woocommerce' );
		/**
		 * This feature enables custom-menus support for a theme.
		 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
		 */
		register_nav_menus( array(
								'top-menu'        => __( 'Top Menu', 'cybermag' ),
								'header-menu'     => __( 'Header Menu', 'cybermag' ),
								'sub-header-menu' => __( 'Sub-Header Menu', 'cybermag' ),
								'footer-menu'     => __( 'Footer Menu', 'cybermag' )
							)
		);
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-header', array(
			// Header image default
			'default-image'       => '',
			// Header text display default
			'header-text'         => true,
			// Header image flex width
			'flex-width'          => true,
			// Header image width (in pixels)
			'width'               => 300,
			// Header image flex height
			'flex-height'         => true,
			// Header image height (in pixels)
			'height'              => 100,
			// Admin header style callback
			'admin-head-callback' => 'cybermag_admin_header_style'
		) );
		// gets included in the admin header
		function cybermag_admin_header_style() {
			?>
			<style type="text/css">
				.appearance_page_custom-header #headimg {
					background-repeat: no-repeat;
					border: none;
				}
			</style><?php
		}
		// While upgrading set theme option front page toggle not to affect old setup.
		$cybermag_options = get_option( 'cybermag_theme_options' );
		if ( $cybermag_options && isset( $_GET['activated'] ) ) {
			// If front_page is not in theme option previously then set it.
			if ( !isset( $cybermag_options['front_page'] ) ) {
				// Get template of page which is set as static front page
				$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
				// If static front page template is set to default then set front page toggle of theme option to 1
				if ( 'page' == get_option( 'show_on_front' ) && $template == 'default' ) {
					$cybermag_options['front_page'] = 1;
				} else {
					$cybermag_options['front_page'] = 0;
				}
				update_option( 'cybermag_theme_options', $cybermag_options );
			}
		}
	}
endif;
/**
 * Set a fallback menu that will show a home link.
 */
function cybermag_fallback_menu() {
	$args    = array(
		'depth'       => 0,
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => false,
		'show_home'   => true,
		'link_before' => '',
		'link_after'  => ''
	);
	$pages   = wp_page_menu( $args );
	$prepend = '<div class="main-nav">';
	$append  = '</div>';
	$output  = $prepend . $pages . $append;
	echo $output;
}
/**
 * This function removes .menu class from custom menus
 * in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 *
 * Marko Heijnen Contribution
 *
 */
class cybermag_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}
	public function menu_different_class( $settings, $widget ) {
		if ( $widget instanceof WP_Nav_Menu_Widget ) {
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
		}
		return $settings;
	}
	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
		if ( 'menu' == $args['menu_class'] ) {
			$args['menu_class'] = apply_filters( 'cybermag_menu_widget_class', 'menu_widget' );
		}
		return $args;
	}
}
$GLOBALS['nav_menu_widget_classname'] = new cybermag_widget_menu_class();
/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function cybermag_wp_page_menu( $page_markup ) {
	preg_match( '/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches );
	$divclass   = $matches[1];
	$replace    = array( '<div class="' . $divclass . '">', '</div>' );
	$new_markup = str_replace( $replace, '', $page_markup );
	$new_markup = preg_replace( '/^<ul>/i', '<ul class="' . $divclass . '">', $new_markup );
	return $new_markup;
}
add_filter( 'wp_page_menu', 'cybermag_wp_page_menu' );
/**
 * wp_title() Filter for better SEO.
 *
 * Adopted from Twenty Twelve
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 *
 */
if ( !function_exists( 'cybermag_wp_title' ) && !defined( 'AIOSEOP_VERSION' ) ) :
	function cybermag_wp_title( $title, $sep ) {
		global $page, $paged;
		if ( is_feed() ) {
			return $title;
		}
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'cybermag' ), max( $paged, $page ) );
		}
		return $title;
	}
	add_filter( 'wp_title', 'cybermag_wp_title', 10, 2 );
endif;
/**
 * Filter 'get_comments_number'
 *
 * Filter 'get_comments_number' to display correct
 * number of comments (count only comments, not
 * trackbacks/pingbacks)
 */
function cybermag_comment_count( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments         = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $comments );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}
add_filter( 'get_comments_number', 'cybermag_comment_count', 0 );
/**
 * wp_list_comments() Pings Callback
 *
 * wp_list_comments() Callback function for
 * Pings (Trackbacks/Pingbacks)
 */
function cybermag_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
/**
 * Sets the post excerpt length to 40 words.
 * Adopted from Coraline
 */
function cybermag_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'cybermag_excerpt_length' );
/**
 * Returns a "Read more" link for excerpts
 */
function cybermag_read_more() {
	return '<div class="read-more"><a href="' . get_permalink() . '">' . __( 'Read more &#8250;', 'cybermag' ) . '</a></div><!-- end of .read-more -->';
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and cybermag_read_more_link().
 */
function cybermag_auto_excerpt_more( $more ) {
	return '<span class="ellipsis">&hellip;</span>' . cybermag_read_more();
}
add_filter( 'excerpt_more', 'cybermag_auto_excerpt_more' );
/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
function cybermag_custom_excerpt_more( $output ) {
	if ( has_excerpt() && !is_attachment() ) {
		$output .= cybermag_read_more();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'cybermag_custom_excerpt_more' );
/**
 * This function removes inline styles set by WordPress gallery.
 */
function cybermag_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'cybermag_remove_gallery_css' );
/**
 * This function removes default styles set by WordPress recent comments widget.
 */
function cybermag_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}
add_action( 'widgets_init', 'cybermag_remove_recent_comments_style' );
/**
 * This function prints post meta data.
 *
 */
if ( !function_exists( 'cybermag_post_meta_data' ) ) :
	function cybermag_post_meta_data() {
		printf( __( '<span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span>%4$s', 'cybermag' ),
				'meta-prep meta-prep-author posted',
				sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp updated">%3$s</span></a>',
						 esc_url( get_permalink() ),
						 esc_attr( get_the_time() ),
						 esc_html( get_the_date() )
				),
				'byline',
				sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
						 get_author_posts_url( get_the_author_meta( 'ID' ) ),
						 sprintf( esc_attr__( 'View all posts by %s', 'cybermag' ), get_the_author() ),
						 esc_attr( get_the_author() )
				)
		);
	}
endif;
/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 *
 */
function cybermag_category_rel_removal( $output ) {
	$output = str_replace( ' rel="category tag"', '', $output );
	return $output;
}
add_filter( 'wp_list_categories', 'cybermag_category_rel_removal' );
add_filter( 'the_category', 'cybermag_category_rel_removal' );
/**
 * Breadcrumb Lists
 * Load the plugin from the plugin that is installed.
 *
 */
function get_cybermag_breadcrumb_lists() {
	$cybermag_options = get_option( 'cybermag_theme_options' );
	if ( 1 == $cybermag_options['breadcrumb'] ) {
		return;
	} elseif ( function_exists( 'bcn_display' ) ) {
		bcn_display();
	} elseif ( function_exists( 'breadcrumb_trail' ) ) {
		breadcrumb_trail();
	} elseif ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	} elseif ( ! is_search() ) {
		cybermag_breadcrumb_lists();
	}
}
/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 */
if ( !function_exists( 'cybermag_breadcrumb_lists' ) ) {
	function cybermag_breadcrumb_lists() {
		/* === OPTIONS === */
		$text['home']     = __( 'Home', 'cybermag' ); // text for the 'Home' link
		$text['category'] = __( 'Archive for %s', 'cybermag' ); // text for a category page
		$text['search']   = __( 'Search results for: %s', 'cybermag' ); // text for a search results page
		$text['tag']      = __( 'Posts tagged %s', 'cybermag' ); // text for a tag page
		$text['author']   = __( 'View all posts by %s', 'cybermag' ); // text for an author page
		$text['404']      = __( 'Error 404', 'cybermag' ); // text for the 404 page
		$show['current'] = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$show['home']    = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = ' <span class="chevron">&#8250;</span> '; // delimiter between crumbs
		$before    = '<span class="breadcrumb-current">'; // tag before the current crumb
		$after     = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */
		$home_link   = home_url( '/' );
		$before_link = '<span class="breadcrumb" typeof="v:Breadcrumb">';
		$after_link  = '</span>';
		$link_att    = ' rel="v:url" property="v:title"';
		$link        = $before_link . '<a' . $link_att . ' href="%1$s">%2$s</a>' . $after_link;
		$post      = get_queried_object();
		$parent_id = isset( $post->post_parent ) ? $post->post_parent : '';
		$html_output = '';
		if ( is_front_page() ) {
			if ( 1 == $show['home'] ) {
				$html_output .= '<div class="breadcrumb-list"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
			}
		} else {
			$html_output .= '<div class="breadcrumb-list" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf( $link, $home_link, $text['home'] ) . $delimiter;
			if ( is_home() ) {
				if ( 1 == $show['current'] ) {
					$html_output .= $before . get_the_title( get_option( 'page_for_posts', true ) ) . $after;
				}
			} elseif ( is_category() ) {
				$this_cat = get_category( get_query_var( 'cat' ), false );
				if ( 0 != $this_cat->parent ) {
					$cats = get_category_parents( $this_cat->parent, true, $delimiter );
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
				}
				$html_output .= $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
			} elseif ( is_search() ) {
				$html_output .= $before . sprintf( $text['search'], get_search_query() ) . $after;
			} elseif ( is_day() ) {
				$html_output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
				$html_output .= sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $delimiter;
				$html_output .= $before . get_the_time( 'd' ) . $after;
			} elseif ( is_month() ) {
				$html_output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
				$html_output .= $before . get_the_time( 'F' ) . $after;
			} elseif ( is_year() ) {
				$html_output .= $before . get_the_time( 'Y' ) . $after;
			} elseif ( is_single() && !is_attachment() ) {
				if ( 'post' != get_post_type() ) {
					$post_type    = get_post_type_object( get_post_type() );
					$archive_link = get_post_type_archive_link( $post_type->name );
					$html_output .= sprintf( $link, $archive_link, $post_type->labels->singular_name );
					if ( 1 == $show['current'] ) {
						$html_output .= $delimiter . $before . get_the_title() . $after;
					}
				} else {
					$cat  = get_the_category();
					$cat  = $cat[0];
					$cats = get_category_parents( $cat, true, $delimiter );
					if ( 0 == $show['current'] ) {
						$cats = preg_replace( "#^(.+)$delimiter$#", "$1", $cats );
					}
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
					if ( 1 == $show['current'] ) {
						$html_output .= $before . get_the_title() . $after;
					}
				}
			} elseif ( !is_single() && !is_page() && !is_404() && 'post' != get_post_type() ) {
				$post_type = get_post_type_object( get_post_type() );
				$html_output .= $before . $post_type->labels->singular_name . $after;
			} elseif ( is_attachment() ) {
				$parent = get_post( $parent_id );
				$cat    = get_the_category( $parent->ID );
				if ( isset( $cat[0] ) ) {
					$cat = $cat[0];
				}
				if ( $cat ) {
					$cats = get_category_parents( $cat, true, $delimiter );
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
				}
				$html_output .= sprintf( $link, get_permalink( $parent ), $parent->post_title );
				if ( 1 == $show['current'] ) {
					$html_output .= $delimiter . $before . get_the_title() . $after;
				}
			} elseif ( is_page() && !$parent_id ) {
				if ( 1 == $show['current'] ) {
					$html_output .= $before . get_the_title() . $after;
				}
			} elseif ( is_page() && $parent_id ) {
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page_child    = get_page( $parent_id );
					$breadcrumbs[] = sprintf( $link, get_permalink( $page_child->ID ), get_the_title( $page_child->ID ) );
					$parent_id     = $page_child->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					$html_output .= $breadcrumbs[$i];
					if ( $i != count( $breadcrumbs ) - 1 ) {
						$html_output .= $delimiter;
					}
				}
				if ( 1 == $show['current'] ) {
					$html_output .= $delimiter . $before . get_the_title() . $after;
				}
			} elseif ( is_tag() ) {
				$html_output .= $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
			} elseif ( is_author() ) {
				$user_id  = get_query_var( 'author' );
				$userdata = get_the_author_meta( 'display_name', $user_id );
				$html_output .= $before . sprintf( $text['author'], $userdata ) . $after;
			} elseif ( is_404() ) {
				$html_output .= $before . $text['404'] . $after;
			}
			if ( get_query_var( 'paged' ) || get_query_var( 'page' ) ) {
				$page_num = get_query_var( 'page' ) ? get_query_var( 'page' ) : get_query_var( 'paged' );
				$html_output .= $delimiter . sprintf( __( 'Page %s', 'cybermag' ), $page_num );
			}
			$html_output .= '</div>';
		}
		echo $html_output;
	} // end cybermag_breadcrumb_lists
}
/**
 * A safe way of adding stylesheets to a WordPress generated page.
 */
if ( !function_exists( 'cybermag_css' ) ) {
	function cybermag_css() {
		$theme      = wp_get_theme();
		$cybermag = wp_get_theme( 'cybermag' );
		$cybermag_options = get_option( 'cybermag_theme_options' );
		if ( 1 == $cybermag_options['minified_css'] ) {
			wp_enqueue_style( 'cybermag-style', get_template_directory_uri() . '/core/css/style.min.css', false, $cybermag['Version'] );
		} else {
			wp_enqueue_style( 'cybermag-style', get_template_directory_uri() . '/core/css/style.css', false, $cybermag['Version'] );
			wp_enqueue_style( 'cybermag-media-queries', get_template_directory_uri() . '/core/css/cybermag.css', false, $cybermag['Version'] );
		}
		if ( is_rtl() ) {
			wp_enqueue_style( 'cybermag-rtl-style', get_template_directory_uri() . '/rtl.css', false, $cybermag['Version'] );
		}
		if ( is_child_theme() ) {
			wp_enqueue_style( 'cybermag-child-style', get_stylesheet_uri(), false, $theme['Version'] );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'cybermag_css' );
/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
if ( !function_exists( 'cybermag_js' ) ) {
	function cybermag_js() {
		$suffix                 = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		$directory              = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? 'js-dev' : 'js';
		$template_directory_uri = get_template_directory_uri();
		// JS at the bottom for fast page loading.
		// except for Modernizr which enables HTML5 elements & feature detects.
		wp_enqueue_script( 'modernizr', $template_directory_uri . '/core/' . $directory . '/cybermag-modernizr' . $suffix . '.js', array( 'jquery' ), '2.6.1', false );
		wp_enqueue_script( 'cybermag-scripts', $template_directory_uri . '/core/' . $directory . '/cybermag-scripts' . $suffix . '.js', array( 'jquery' ), '1.2.5', true );
		if ( !wp_script_is( 'tribe-placeholder' ) ) {
			wp_enqueue_script( 'jquery-placeholder', $template_directory_uri . '/core/' . $directory . '/jquery.placeholder' . $suffix . '.js', array( 'jquery' ), '2.0.7', true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'cybermag_js' );
/**
 * A comment reply.
 */
function cybermag_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cybermag_enqueue_comment_reply' );
/**
 * Theme options upgrade bar
 */
function cybermag_upgrade_bar() {
	?>
	<div class="upgrade-callout">
		<p><img src="<?php echo get_template_directory_uri(); ?>/core/includes/images/spec.png" alt="Cyberspeclab"/>
			<?php printf( __( 'Welcome to %1$s! Upgrade to %2$s today.', 'cybermag' ),
						  'CyberMag',
						  ' <a href="http://cyberspeclab.com/product/cybermag-pro/" target="_blank" title="cybermag Pro">CyberMag Pro</a> '
			); ?>
		</p>
		<div class="social-container">
			<div class="social">
				<a href="https://twitter.com/cyberspeclab" class="twitter-follow-button" data-show-count="false" data-size="small">Follow @cyberspeclab</a>
                    <script>!function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, "script", "twitter-wjs");</script>
			</div>
			<div class="social">
				<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FCyberSpecLab%2F162781543926606&amp;width=90&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
			</div>
		</div>
	</div>
<?php
}
add_action( 'cybermag_theme_options', 'cybermag_upgrade_bar', 1 );
/**
 * Theme Options Support and Information
 */
function cybermag_theme_support() {
	?>
	<div id="info-box-wrapper" class="grid col-940">
		<div class="info-box notice">
			<a class="button" href="<?php echo esc_url( 'http://cyberspeclab.com/category/cybermag/' ); ?>" title="<?php esc_attr_e( 'Instructions', 'cybermag' ); ?>" target="_blank">
				<?php _e( 'Instructions', 'cybermag' ); ?></a>
			<a class="button button-primary" href="<?php echo esc_url( 'http://cyberspeclab.com/forum/' ); ?>" title="<?php esc_attr_e( 'Help', 'cybermag' ); ?>" target="_blank">
				<?php _e( 'Help', 'cybermag' ); ?></a>
			<a class="button" href="<?php echo esc_url( 'http://cyberspeclab.com/showcase/' ); ?>" title="<?php esc_attr_e( 'Showcase', 'cybermag' ); ?>" target="_blank">
				<?php _e( 'Showcase', 'cybermag' ); ?></a>
			<a class="button" href="<?php echo esc_url( 'http://cyberspeclab.com/themes/' ); ?>" title="<?php esc_attr_e( 'More Themes', 'cybermag' ); ?>" target="_blank">
				<?php _e( 'More Themes', 'cybermag' ); ?></a>
                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=AUWMJX5N3NHU2" target="_blank"><img alt="Donate Button" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" /></a>
		</div>
	</div>
<?php
}
add_action( 'cybermag_theme_options', 'cybermag_theme_support', 2 );
/**
 * Front Page function starts here. The Front page overides WP's show_on_front option. So when show_on_front option changes it sets the themes front_page to 0 therefore displaying the new option
 */
function cybermag_front_page_override( $new, $orig ) {
	global $cybermag_options;
	if ( $orig !== $new ) {
		$cybermag_options['front_page'] = 0;
		update_option( 'cybermag_theme_options', $cybermag_options );
	}
	return $new;
}
add_filter( 'pre_update_option_show_on_front', 'cybermag_front_page_override', 10, 2 );
/**
 * Funtion to add CSS class to body
 */
function cybermag_add_class( $classes ) {
	// Get cybermag theme option.
	global $cybermag_options;
	if ( $cybermag_options['front_page'] == 1 && is_front_page() ) {
		$classes[] = 'front-page';
	}
	return $classes;
}
add_filter( 'body_class', 'cybermag_add_class' );
/*
 * Add notification to Reading Settings page to notify if Custom Front Page is enabled.
 *
 * @since    2.0
 */
function cybermag_front_page_reading_notice() {
	$screen             = get_current_screen();
	$cybermag_options = cybermag_get_options();
	if ( 'options-reading' == $screen->id ) {
		$html = '<div class="updated">';
		if ( 1 == $cybermag_options['front_page'] ) {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is enabled. You can disable it in the <a href="%1$s">theme settings</a>.', 'cybermag' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		} else {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is disabled. You can enable it in the <a href="%1$s">theme settings</a>.', 'cybermag' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		}
		$html .= '</div>';
		echo $html;
	}
}
add_action( 'admin_notices', 'cybermag_front_page_reading_notice' );
/**
 * Use shortcode_atts_gallery filter to add new defaults to the WordPress gallery shortcode.
 * Allows user input in the post gallery shortcode.
 *
 */
function cybermag_gallery_atts( $out, $pairs, $atts ) {
	$full_width = is_page_template( 'full-width-page.php' ) || is_page_template( 'landing-page.php' );
	// Check if the size attribute has been set, if so use it and skip the cybermag sizes
	if ( array_key_exists( 'size', $atts ) ) {
		$size = $atts['size'];
	} else {
		if ( $full_width ) {
			switch ( $out['columns'] ) {
				case 1:
					$size = 'cybermag-900'; //900
					break;
				case 2:
					$size = 'cybermag-450'; //450
					break;
				case 3:
					$size = 'cybermag-300'; //300
					break;
				case 4:
					$size = 'cybermag-200'; //225
					break;
				case 5:
					$size = 'cybermag-200'; //180
					break;
				case 6:
					$size = 'cybermag-150'; //150
					break;
				case 7:
					$size = 'cybermag-150'; //125
					break;
				case 8:
					$size = 'cybermag-150'; //112
					break;
				case 9:
					$size = 'cybermag-100'; //100
					break;
			}
		} else {
			switch ( $out['columns'] ) {
				case 1:
					$size = 'cybermag-600'; //600
					break;
				case 2:
					$size = 'cybermag-300'; //300
					break;
				case 3:
					$size = 'cybermag-200'; //200
					break;
				case 4:
					$size = 'cybermag-150'; //150
					break;
				case 5:
					$size = 'cybermag-150'; //120
					break;
				case 6:
					$size = 'cybermag-100'; //100
					break;
				case 7:
					$size = 'cybermag-100'; //85
					break;
				case 8:
					$size = 'cybermag-100'; //75
					break;
				case 9:
					$size = 'cybermag-100'; //66
					break;
			}
		}
	}
	$atts = shortcode_atts(
		array(
			'size' => $size,
		),
		$atts
	);
	$out['size'] = $atts['size'];
	return $out;
}
add_filter( 'shortcode_atts_gallery', 'cybermag_gallery_atts', 10, 3 );