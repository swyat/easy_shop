<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog Template
 *
 * @file           home.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */

get_header();

global $more;
$more = 0;
?>

	<div id="content-blog" class="<?php echo implode( ' ', cybermag_get_content_classes() ); ?>">

		<!-- Blog page title -->
		<?php if( cybermag_free_get_option( 'blog_post_title_toggle' ) ) { ?>
			<h1> <?php echo cybermag_free_get_option( 'blog_post_title_text' ); ?> </h1>
		<?php } ?>

		<?php get_template_part( 'loop-header' ); ?>

		<?php if( have_posts() ) : ?>

			<?php while( have_posts() ) : the_post(); ?>

				<?php cybermag_entry_before(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php cybermag_entry_top(); ?>

					<?php get_template_part( 'post-meta' ); ?>

					<div class="post-entry">
						<?php if( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						<?php endif; ?>
						<?php the_content( __( 'Read more &#8250;', 'cybermag' ) ); ?>
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

	</div><!-- end of #content-blog -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>