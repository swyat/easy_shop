<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', ETHEME_DOMAIN) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', ETHEME_DOMAIN) ); ?></div>
	    <div class="clear"></div>
    </div><!-- #nav-above -->
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', ETHEME_DOMAIN); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', ETHEME_DOMAIN); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts of the Gallery format. The gallery category is the old way. */ ?>

	<?php if ( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) || in_category( _x( 'gallery', 'gallery category slug', ETHEME_DOMAIN ) ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', ETHEME_DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-meta">
				<?php etheme_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
						<div class="gallery-thumb">
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</div><!-- .gallery-thumb -->
						<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, ETHEME_DOMAIN ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', ETHEME_DOMAIN ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								number_format_i18n( $total_images )
							); ?></em></p>
				<?php endif; ?>
						<?php the_excerpt(); ?>
<?php endif; ?>
			</div><!-- .entry-content -->

			<div class="entry-utility">
			<?php if ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) : ?>
				<a href="<?php echo get_post_format_link( 'gallery' ); ?>" title="<?php esc_attr_e( 'View Galleries', ETHEME_DOMAIN ); ?>"><?php _e( 'More Galleries', ETHEME_DOMAIN ); ?></a>
				<span class="meta-sep">|</span>
			<?php elseif ( in_category( _x( 'gallery', 'gallery category slug', ETHEME_DOMAIN ) ) ) : ?>
				<a href="<?php echo get_term_link( _x( 'gallery', 'gallery category slug', ETHEME_DOMAIN ), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', ETHEME_DOMAIN ); ?>"><?php _e( 'More Galleries', ETHEME_DOMAIN ); ?></a>
				<span class="meta-sep">|</span>
			<?php endif; ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', ETHEME_DOMAIN ), __( '1 Comment', ETHEME_DOMAIN ), __( '% Comments', ETHEME_DOMAIN ) ); ?></span>
				<?php edit_post_link( __( 'Edit', ETHEME_DOMAIN ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

<?php /* How to display posts of the Aside format. The asides category is the old way. */ ?>

	<?php elseif ( ( function_exists( 'get_post_format' ) && 'aside' == get_post_format( $post->ID ) ) || in_category( _x( 'asides', 'asides category slug', ETHEME_DOMAIN ) )  ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_content(  __( '<p class="a-right"><a class="button active"><span>READ MORE</span></a></p>', ETHEME_DOMAIN )  ); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content(  __( '<p class="a-right"><a class="button active"><span>READ MORE</span></a></p>', ETHEME_DOMAIN )  ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

			<div class="entry-utility">
				<?php etheme_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', ETHEME_DOMAIN ), __( '1 Comment', ETHEME_DOMAIN ), __( '% Comments', ETHEME_DOMAIN ) ); ?></span>
				<?php edit_post_link( __( 'Edit', ETHEME_DOMAIN ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

<?php /* How to display all other posts. */ ?>

	<?php else : ?>
        <?php 
            $blog_layout = etheme_get_option('blog_layout');
            switch ($blog_layout){ 
            	case 'default':
                    $images_sizes = array(700,700);
            	break;
            	case 'portrait':
                    $images_sizes = array(300,300);
            	break;
            	case 'horizontal':
                    $images_sizes = array(340,340);
            	break;
            
            }
        ?>
        <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $images_sizes); ?>
        <?php endif; ?>  
        
        <article id="post-<?php the_ID(); ?>" class="article <?php if(!@$image[0] || @$image[0]=='') echo 'without-image'; ?>">
            <div <?php post_class(); ?>>
                <?php if(@$image[0] && @$image[0]!=''): ?>
                    <a href="<?php the_permalink(); ?>" class="article-image" style="background-image: url('<?php echo $image[0]; ?>')"></a>    
            	<?php endif; ?>
                
                <div class="article-info">
                    <div class="article-date">
                        <span class="date-day"><?php the_time('d'); ?></span>
                        <span class="date-month"><?php the_time('M'); ?></span>
                    </div>
                    <h3 class="article-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', ETHEME_DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h3>
                
        			<div class="entry-utility">
            			<?php etheme_posted_by(); ?> /
        
        				<?php if ( count( get_the_category() ) ) : ?>
        					<span class="cat-links">
        						<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', ETHEME_DOMAIN ), 'entry-utility-prep entry-utility-prep-cat-links', etheme_get_the_category_list( ', ' ) ); ?>
        					</span>
        					<span class="meta-sep">|</span>
        				<?php endif; ?>
        				<?php
        					$tags_list = get_the_tag_list( '', ', ' );
        					if ( $tags_list ):
        				?>
        					<span class="tag-links">
        						<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', ETHEME_DOMAIN ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
        					</span>
        					<span class="meta-sep">|</span>
        				<?php endif; ?>
        				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', ETHEME_DOMAIN ), __( '1 Comment', ETHEME_DOMAIN ), __( '% Comments', ETHEME_DOMAIN ) ); ?></span>
        				<?php edit_post_link( __( 'Edit', ETHEME_DOMAIN ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
        			</div><!-- .entry-utility -->  
                    <div class="clear"></div>
                </div>
                
            	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
            			<div class="entry-summary">
            				<?php the_excerpt(); ?>
            			</div><!-- .entry-summary -->
            	<?php else : ?>
            			<div class="entry-content">
            				<?php the_content( __( '<span class="button active fl-r"><span>Read More</span></span><br/>', ETHEME_DOMAIN ) ); ?>
            				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', ETHEME_DOMAIN ), 'after' => '</div>' ) ); ?>
            			</div><!-- .entry-content -->
            	<?php endif; ?>              
                <div class="clear"></div>
		          <?php comments_template( '', true ); ?>
            </div>
        </article>   

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', ETHEME_DOMAIN ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', ETHEME_DOMAIN ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
