<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Search Form Template
 *
 *
 * @file           searchform.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
 
?>
<form method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<label class="screen-reader-text" for="s"><?php esc_attr_e( 'Search for:', 'cybermag' ) ?></label>
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'search here &hellip;', 'cybermag' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'cybermag' ); ?>" />
</form>