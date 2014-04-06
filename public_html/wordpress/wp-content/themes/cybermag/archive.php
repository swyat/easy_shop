<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        cybermag
 * @author         CyberSpecLab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */

get_header(); ?>

<div id="content-archive" class="<?php echo implode( ' ', cybermag_get_content_classes() ); ?>">

	<?php if( have_posts() ) : ?>

		<?php get_template_part( 'loop-header' ); ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php cybermag_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php cybermag_entry_top(); ?>

				<?php get_template_part( 'post-meta' ); ?>

				<div class="post-entry">
					<?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
						</a>
					<?php endif; ?>
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'cybermag' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>

				<?php cybermag_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php cybermag_entry_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content-archive -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
