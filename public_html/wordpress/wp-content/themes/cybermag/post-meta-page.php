<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Page Meta-Data Template-Part File
 *
 * @file           post-meta-page.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>

	<h1 class="entry-title post-title"><?php the_title(); ?></h1>

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