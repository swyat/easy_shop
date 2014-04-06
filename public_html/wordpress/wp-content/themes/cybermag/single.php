<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */

get_header(); ?>

<div id="content" class="<?php echo implode( ' ', cybermag_get_content_classes() ); ?>">

	<?php get_template_part( 'loop-header' ); ?>

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php cybermag_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php cybermag_entry_top(); ?>

				<?php get_template_part( 'post-meta' ); ?>

				<div class="post-entry">
					<?php the_content( __( 'Read more &#8250;', 'cybermag' ) ); ?>

					<?php if( get_the_author_meta( 'description' ) != '' ) : ?>

						<div id="author-meta">
							<?php if( function_exists( 'get_avatar' ) ) {
								echo get_avatar( get_the_author_meta( 'email' ), '80' );
							} ?>
							<div class="about-author"><?php _e( 'About', 'cybermag' ); ?> <?php the_author_posts_link(); ?></div>
							<p><?php the_author_meta( 'description' ) ?></p>
						</div><!-- end of #author-meta -->

					<?php endif; // no description, no author's meta ?>

					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'cybermag' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<div class="navigation">
					<div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
					<div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
				</div>
				<!-- end of .navigation -->

				<?php get_template_part( 'post-data' ); ?>

				<?php cybermag_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php cybermag_entry_after(); ?>

			<?php cybermag_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php cybermag_comments_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
