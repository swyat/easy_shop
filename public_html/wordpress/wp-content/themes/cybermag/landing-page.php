<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Landing Page Template
 *
Template Name:  Landing Page (no menu)
 *
 * @file           landing-page.php
 * @package        cybermag
 * @author         CyberSpecLab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */

get_header(); ?>

<div id="content-full" class="grid col-940">

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php cybermag_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php cybermag_entry_top(); ?>

				<h1 class="post-title"><?php the_title(); ?></h1>

				<div class="post-entry">
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

</div><!-- end of #content-full -->

<?php get_footer(); ?>
