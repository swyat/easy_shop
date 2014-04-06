<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', ETHEME_DOMAIN ) . '</span> %title' ); ?></div>
				<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', ETHEME_DOMAIN ) . '</span>' ); ?></div>
                <div class="clear"></div>
            </div><!-- #nav-above -->
            <div class="clear"></div>
            <article class="article article-single" id="post-<?php the_ID(); ?>"> 
                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), @$images_sizes); ?>
                <?php endif; ?>  
                <?php if(@$image[0] && @$image[0]!=''): ?>
                    <a class="article-image" style="background-image: url('<?php echo @$image[0]; ?>')"></a>    
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
                <div class="article-description">
                    <?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'etheme' ), 'after' => '</div>' ) ); ?>
                </div>
                <div class="clear"></div>
            </article>

            
            <?php edit_post_link( __( 'Edit', 'etheme' ), '<span class="edit-link">', '</span>' ); ?>

            <?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>