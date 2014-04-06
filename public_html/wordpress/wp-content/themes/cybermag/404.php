<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Error 404 Template
 *
 *
 * @file           404.php
 * @package        cybermag
 * @author         CyberSpecLab
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>
<?php get_header(); ?>

<div id="content-full" class="grid col-940">

	<?php cybermag_entry_before(); ?>
	<div id="post-0" class="error404">
		<?php cybermag_entry_top(); ?>

		<div class="post-entry">

			<?php get_template_part( 'loop-no-posts' ); ?>

		</div>
		<!-- end of .post-entry -->

		<?php cybermag_entry_bottom(); ?>
	</div>
	<!-- end of #post-0 -->
	<?php cybermag_entry_after(); ?>

</div><!-- end of #content-full -->

<?php get_footer(); ?>
