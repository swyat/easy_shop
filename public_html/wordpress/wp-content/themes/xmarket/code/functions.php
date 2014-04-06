<?php
    
register_nav_menu('top', 'Top Navigation');

if (!isset( $content_width )) $content_width = 920;

function etheme_enqueue_styles() {
    if ( !is_admin() ) {
        wp_enqueue_style("superfish",get_template_directory_uri().'/css/superfish.css');
        wp_enqueue_style("slider",get_template_directory_uri().'/css/slider.css');
        wp_enqueue_style("lightbox",get_template_directory_uri().'/css/lightbox.css');
        
        wp_enqueue_script("jquery");
        wp_enqueue_script('jquery.easing', get_template_directory_uri().'/js/jquery.easing.1.3.min.js');
        wp_enqueue_script('cookie', get_template_directory_uri().'/js/cookie.js');
        wp_enqueue_script('hoverIntent', get_template_directory_uri().'/js/hoverIntent.js');
        wp_enqueue_script('jquery.slider', get_template_directory_uri().'/js/jquery.slider.js');
        wp_enqueue_script('efects', get_template_directory_uri().'/js/efects.js');
        wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js');
        wp_enqueue_script('tooltip', get_template_directory_uri().'/js/tooltip.js');
        wp_enqueue_script('lightbox', get_template_directory_uri().'/js/lightbox.js');
        wp_enqueue_script('etheme', get_template_directory_uri().'/js/script.js');
    }
}

add_action( 'wp_enqueue_scripts', 'etheme_enqueue_styles' );
function jsString($str='') { 
    return trim(preg_replace("/('|\"|\r?\n)/", '', $str)); 
} 

function etheme_get_the_category_list($separator = '', $parents='', $post_id = false){
	global $wp_rewrite;
	$categories = get_the_category( $post_id );
	if ( !is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) )
		return apply_filters( 'the_category', '', $separator, $parents );

	if ( empty( $categories ) )
		return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );

	$rel = "";

	$thelist = '';
	if ( '' == $separator ) {
		$thelist .= '<ul class="post-categories">';
		foreach ( $categories as $category ) {
			$thelist .= "\n\t<li>";
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
					break;
				case 'single':
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= $category->name.'</a></li>';
					break;
				case '':
				default:
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
			}
		}
		$thelist .= '</ul>';
	} else {
		$i = 0;
		foreach ( $categories as $category ) {
			if ( 0 < $i )
				$thelist .= $separator;
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
					break;
				case 'single':
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= "$category->name</a>";
					break;
				case '':
				default:
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
			}
			++$i;
		}
	}
	return apply_filters( 'the_category', $thelist, $separator, $parents );
}


function etheme_get_contents( $url ) {
	if ( function_exists('curl_init') ) {
		$output = file_get_contents( $url ); //$output = file_get_contents_curl( $url );
	}
	elseif ( function_exists('file_get_contents') ) {
		$output = file_get_contents( $url );
	}
	else {
		return false;
	}
	return $output;
}


/**
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 */

function etheme_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'etheme_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @return int
 */
function etheme_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'etheme_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @return string "Continue Reading" link
 */
function etheme_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'etheme' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and etheme_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @return string An ellipsis
 */
function etheme_auto_excerpt_more( $more ) {
	return ' &hellip;' . etheme_continue_reading_link();
}
add_filter( 'excerpt_more', 'etheme_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function etheme_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= etheme_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'etheme_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function etheme_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'etheme_remove_gallery_css' );

if ( ! function_exists( 'etheme_comment' ) ) :
function etheme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
            <?php echo get_avatar( $comment, 55 ); ?>
            <div class="comment-meta">
                <h5 class="author"><?php echo get_comment_author_link() ?> -  <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></h5>	
                <?php if ( $comment->comment_approved == '0' ) : ?>
        			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'etheme' ); ?></em>	
        		<?php endif; ?>
                <p class="date">
        			<?php
        				/* translators: 1: date, 2: time */
        				printf( __( '%1$s at %2$s', 'etheme' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'etheme' ), ' ' );
        			?>
                </p>
            </div>
    		<div class="comment-body"><?php comment_text(); ?></div>
            <div class="clear"></div>
<!-- .reply -->
    	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'etheme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'etheme' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Twenty Ten 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Twenty Ten styling.
 *
 */
function etheme_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'etheme_remove_recent_comments_style' );

if ( ! function_exists( 'etheme_posted_on' ) ) :
function etheme_posted_on() {
	printf( __( '<span class="%1$s"></span> %2$s', 'etheme' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		)
	);
}
endif;
if ( ! function_exists( 'etheme_posted_by' ) ) :
function etheme_posted_by() {
	printf( __( '<span class="%1$s">Posted by</span> %2$s', 'etheme' ),
		'meta-author',
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'etheme' ), get_the_author() ) ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'etheme_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function etheme_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'etheme' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'etheme' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'etheme' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		etheme_get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

function etheme_excerpt_more($more) {
    global $post;
    return '<br><a class="button active fl-r" style="margin-bottom:10px;" href="'. get_permalink($post->ID) . '"><span>'.__('Read More',ETHEME_DOMAIN).'</span></a><div class="clear"></div>';
}
add_filter('excerpt_more', 'etheme_excerpt_more');

function etheme_get_image( $attachment_id = 0, $width = null, $height = null, $crop = true, $post_id = null ) {
	global $post;
	if (!$attachment_id) {
		if (!$post_id) {
			$post_id = $post->ID;
		}
		if ( has_post_thumbnail( $post_id ) ) {
			$attachment_id = get_post_thumbnail_id( $post_id );
		} 
		else {
			$attached_images = (array)get_posts( array(
				'post_type'   => 'attachment',
				'numberposts' => 1,
				'post_status' => null,
				'post_parent' => $post_id,
				'orderby'     => 'menu_order',
				'order'       => 'ASC'
			) );
			if ( !empty( $attached_images ) )
				$attachment_id = $attached_images[0]->ID;
		}
	}
	
	if (!$attachment_id)
		return;

	if ( function_exists("gd_info") && (($width >= 10) && ($height >= 10)) && (($width <= 1024) && ($height <= 1024)) ) {
		$vt_image = vt_resize( $attachment_id, '', $width, $height, $crop );
		if ($vt_image) 
			$image_url = $vt_image['url'];
		else
			$image_url = false;
	}
	else {
		$full_image = wp_get_attachment_image_src( $attachment_id, 'full');
		if ($full_image) 
			$image_url = $full_image[0];
		else
			$image_url = false;
	}
	
    if( is_ssl() && !strstr(  $image_url, 'https' ) ) str_replace('http', 'https', $image_url);
	// @todo - put fallback 'No image' catcher here
	
	return apply_filters( 'blanco_product_image', $image_url );
}

if ( !function_exists('vt_resize') ) {
	function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
	
		// this is an attachment, so we have the ID
		if ( $attach_id ) {
		
			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );
		
		// this is not an attachment, let's use the image url
		} else if ( $img_url ) {
			
			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
			
			//$file_path = ltrim( $file_path['path'], '/' );
			//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
			
			$orig_size = getimagesize( $file_path );
			
			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];
		}
		
		$file_info = pathinfo( $file_path );
	
		// check if file exists
		$base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
		if ( !file_exists($base_file) )
			return;
		 
		$extension = '.'. $file_info['extension'];
	
		// the image path without the extension
		$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
		
		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width || $image_src[2] > $height ) {
	
			if ( $crop == true ) {
			
				$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
				
				// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
				if ( file_exists( $cropped_img_path ) ) {
		
					$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
					
					$vt_image = array (
						'url' => $cropped_img_url,
						'width' => $width,
						'height' => $height
					);
					
					return $vt_image;
				}
			}
			elseif ( $crop == false ) {
			
				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			
	
				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {
				
					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
	
					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);
					
					return $vt_image;
				}
			}
	
			// check if image width is smaller than set width
			$img_size = getimagesize( $file_path );
			if ( $img_size[0] <= $width ) $width = $img_size[0];		
	
			// no cache files - let's finally resize it
			$new_img_path = image_resize( $file_path, $width, $height, $crop );
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
	
			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);
			
			return $vt_image;
		}
	
		// default output - without resizing
		$vt_image = array (
			'url' => $image_src[0],
			'width' => $image_src[1],
			'height' => $image_src[2]
		);
		
		return $vt_image;
	}
}

if ( !function_exists('vt_resize2') ) {
	function vt_resize2( $img_name, $dir_url, $dir_path, $width, $height, $crop = false ) {
		
		$file_path = trailingslashit($dir_path).$img_name;
		
		$orig_size = getimagesize( $file_path );
		
		$image_src[0] = trailingslashit($dir_url).$img_name;
		$image_src[1] = $orig_size[0];
		$image_src[2] = $orig_size[1];
		
		$file_info = pathinfo( $file_path );
	
		// check if file exists
		$base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
		if ( !file_exists($base_file) )
			return;
		 
		$extension = '.'. $file_info['extension'];
	
		// the image path without the extension
		$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
		
		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width || $image_src[2] > $height ) {
	
			if ( $crop == true ) {
			
				$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
				
				// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
				if ( file_exists( $cropped_img_path ) ) {
		
					$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
					
					$vt_image = array (
						'url' => $cropped_img_url,
						'width' => $width,
						'height' => $height
					);
					
					return $vt_image;
				}
			}
			elseif ( $crop == false ) {
			
				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			
	
				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {
				
					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
	
					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);
					
					return $vt_image;
				}
			}
	
			// check if image width is smaller than set width
			$img_size = getimagesize( $file_path );
			if ( $img_size[0] <= $width ) $width = $img_size[0];		
	
			// no cache files - let's finally resize it
			$new_img_path = image_resize( $file_path, $width, $height, $crop );
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
	
			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);
			
			return $vt_image;
		}
	
		// default output - without resizing
		$vt_image = array (
			'url' => $image_src[0],
			'width' => $image_src[1],
			'height' => $image_src[2]
		);
		
		return $vt_image;
	}
}


/**
* Output breadcrumbs if configured
* @return None - outputs breadcrumb HTML
*/
function etheme_wpsc_output_breadcrumbs( $options = null ) {
	
	// Defaults
	$options = apply_filters( 'wpsc_output_breadcrumbs_options', $options );
	$options = wp_parse_args( (array)$options, array(
		'before-breadcrumbs' => '<div class="wpsc-breadcrumbs">',
		'after-breadcrumbs'  => '</div>',
		'before-crumb'       => '',
		'after-crumb'        => '',
		'crumb-separator'    => ' &raquo; ',
		'show_home_page'     => true,
		'show_products_page' => true,
		'echo'               => true
	) );
	
	$output = '';
	$products_page_id = wpec_get_the_post_id_by_shortcode( '[productspage]' );
	$products_page = get_post( $products_page_id );
	if ( !wpsc_has_breadcrumbs() ) {
		return;
	}
	$filtered_products_page = array(
		'url'  => get_option( 'product_list_url' ),
		'name' => apply_filters ( 'the_title', $products_page->post_title )
	);
	$filtered_products_page = apply_filters( 'wpsc_change_pp_breadcrumb', $filtered_products_page );
	
	// Home Page Crumb
	// If home if the same as products page only show the products-page link and not the home link
	if ( get_option( 'page_on_front' ) != $products_page_id && $options['show_home_page'] ) {
		$output .= $options['before-crumb'];
		$output .= '<a class="wpsc-crumb" id="wpsc-crumb-home" href="' . home_url() . '">' . get_option( 'blogname' ) . '</a>';
		$output .= $options['after-crumb'];
	}
	
	// Products Page Crumb
	if ( $options['show_products_page'] ) {
		if ( !empty( $output ) ) {
			$output .= $options['crumb-separator'];
		}
		$output .= $options['before-crumb'];
		$output .= '<a class="wpsc-crumb" id="wpsc-crumb-' . $products_page_id . '" href="' . $filtered_products_page['url'] . '">' . $filtered_products_page['name'] . '</a>';
		$output .= $options['after-crumb'];
	}
	
	// Remaining Crumbs
	while ( wpsc_have_breadcrumbs() ) {
		wpsc_the_breadcrumb();
		if ( !empty( $output ) ) {
			$output .= $options['crumb-separator'];
		}
		$output .= $options['before-crumb'];
		if ( wpsc_breadcrumb_url() ) {
			$output .= '<a class="wpsc-crumb" href="' . wpsc_breadcrumb_url() . '">' . wpsc_breadcrumb_name() . '</a>';
		} else {
			$output .= '<span class="wpsc-crumb">' . wpsc_breadcrumb_name() . '</span>';
		}
		$output .= $options['after-crumb'];
	}
	$output = $options['before-breadcrumbs'] . apply_filters( 'wpsc_output_breadcrumbs', $output, $options ) . $options['after-breadcrumbs'];
	if ( $options['echo'] ) {
		echo $output;
	} else {
		return $output;
	}
}

function etheme_product_page_banner(){
    global $post;
    $etheme_productspage_id = etheme_shortcode2id('[productspage]');
    if($post->ID == $etheme_productspage_id && etheme_get_option('product_bage_banner') && etheme_get_option('product_bage_banner') != ''):
    ?>
        <div class="wpsc_category_details">
            <img src="<?php etheme_option('product_bage_banner') ?>"/>              
        </div>
    <?php endif;
}
