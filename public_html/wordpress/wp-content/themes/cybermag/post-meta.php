<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Post Meta-Data Template-Part File
 *
 * @file           post-meta.php
 * @package        cybermag
 * @author         CyberSpecLab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
?>

<?php if( is_single() ): ?>
	<h1 class="entry-title post-title"><?php the_title(); ?></h1>
<?php else: ?>
	<h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php endif; ?>

<div class="post-meta">
	<?php cybermag_post_meta_data(); ?>

	<?php if( comments_open() ) : ?>
		<span class="comments-link">
		<span class="mdash">&mdash;</span>
			<?php comments_popup_link( __( 'No Comments &darr;', 'cybermag' ), __( '1 Comment &darr;', 'cybermag' ), __( '% Comments &darr;', 'cybermag' ) ); ?>
		</span>
	<?php endif; ?>
</div><!-- end of .post-meta -->
