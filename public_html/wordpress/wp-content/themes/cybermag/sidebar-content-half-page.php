<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sidebar/Content Half Template
 *
Template Name:  Sidebar/Content Half Page
 *
 * @file           sidebar-content-half-page.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php get_header(); ?>

<div id="content" class="grid-right col-460 fit">

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

				<?php get_cybermag_breadcrumb_lists(); ?>

			<?php cybermag_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php cybermag_entry_top(); ?>

				<h1 class="post-title"><?php the_title(); ?></h1>

				<?php if( comments_open() ) : ?>
					<div class="post-meta">
						<?php cybermag_post_meta_data(); ?>

						<?php if( comments_open() ) : ?>
							<span class="comments-link">
                        <span class="mdash">&mdash;</span>
								<?php comments_popup_link( __( 'No Comments &darr;', 'cybermag' ), __( '1 Comment &darr;', 'cybermag' ), __( '% Comments &darr;', 'cybermag' ) ); ?>
                        </span>
						<?php endif; ?>
					</div><!-- end of .post-meta -->
				<?php endif; ?>

				<div class="post-entry">
					<?php the_content( __( 'Read more &#8250;', 'cybermag' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'cybermag' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<?php if( comments_open() ) : ?>
					<div class="post-data">
						<?php the_tags( __( 'Tagged with:', 'cybermag' ) . ' ', ', ', '<br />' ); ?>
						<?php the_category( __( 'Posted in %s', 'cybermag' ) . ', ' ); ?>
					</div><!-- end of .post-data -->
				<?php endif; ?>

				<div class="post-edit"><?php edit_post_link( __( 'Edit', 'cybermag' ) ); ?></div>

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

<?php get_sidebar( 'left-half' ); ?>
<?php get_footer(); ?>