<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Loop Header Template-Part File
 *
 * @file           loop-header.php
 * @package        cybermag
 * @author         CyberSpecLab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */

/**
 * Display breadcrumb
 */
get_cybermag_breadcrumb_lists();

/**
 * Display archive information
 */
if( is_category() || is_tag() || is_author() || is_date() ) {
	?>
	<h6 class="title-archive">
		<?php
		if( is_day() ) :
			printf( __( 'Daily Archives: %s', 'cybermag' ), '<span>' . get_the_date() . '</span>' );
		elseif( is_month() ) :
			printf( __( 'Monthly Archives: %s', 'cybermag' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif( is_year() ) :
			printf( __( 'Yearly Archives: %s', 'cybermag' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		else :
			_e( 'Blog Archives', 'cybermag' );
		endif;
		?>
	</h6>
<?php
}

/**
 * Display Search information
 */

if( is_search() ) {
	?>
	<h6 class="title-search-results"><?php printf( __( 'Search results for: %s', 'cybermag' ), '<span>' . get_search_query() . '</span>' ); ?></h6>
<?php
}