<?php
/**
 * The template for displaying attachments.
 *
 */

get_header(); ?>
        <section id="main">
			<?php
			/* Run the loop to output the attachment.
			 * If you want to overload this in a child theme then include a file
			 * called loop-attachment.php and that will be used instead.
			 */
			get_template_part( 'loop', 'attachment' );
			?>
		</section><!-- #container -->
<?php get_footer(); ?>