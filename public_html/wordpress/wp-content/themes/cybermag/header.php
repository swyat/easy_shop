<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        cybermag
 * @author         CyberSpeclab
 * @copyright      cyberspeclab.com 2014
 * @license        license.txt
 * @version        Release: 2.0
 * @since          available since Release 2.0
 */
 
?>
	<!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<title><?php wp_title( '&#124;', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
<?php cybermag_container(); // before container hook ?>
<div id="container" class="hfeed">
<?php cybermag_header(); // before header hook ?>
	<div id="header">
		<?php cybermag_header_top(); // before header content hook ?>
		<?php if( has_nav_menu( 'top-menu', 'cybermag' ) ) { ?>
			<?php wp_nav_menu( array(
								   'container'      => '',
								   'fallback_cb'    => false,
								   'menu_class'     => 'top-menu',
								   'theme_location' => 'top-menu'
							   )
			);
			?>
		<?php } ?>
		<?php cybermag_in_header(); // header hook ?>
		<?php if( get_header_image() != '' ) : ?>
			<div id="logo">
				<a href="<?php echo esc_url(home_url( '/' )); ?>"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
			</div><!-- end of #logo -->
		<?php endif; // header image was removed ?>
		<?php if( !get_header_image() ) : ?>
			<div id="logo">
				<span class="site-name"><a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			</div><!-- end of #logo -->
		<?php endif; // header image was removed (again) ?>
		<?php get_sidebar( 'top' ); ?>
		<?php wp_nav_menu( array(
							   'container'       => 'div',
							   'container_class' => 'main-nav',
							   'fallback_cb'     => 'cybermag_fallback_menu',
							   'theme_location'  => 'header-menu'
						   )
		);
		?>
		<?php if( has_nav_menu( 'sub-header-menu', 'cybermag' ) ) { ?>
			<?php wp_nav_menu( array(
								   'container'      => '',
								   'menu_class'     => 'sub-header-menu',
								   'theme_location' => 'sub-header-menu'
							   )
			);
			?>
		<?php } ?>
		<?php cybermag_header_bottom(); // after header content hook ?>
	</div><!-- end of #header -->
<?php cybermag_header_end(); // after header container hook ?>
<?php cybermag_wrapper(); // before wrapper container hook ?>
	<div id="wrapper" class="clearfix">
<?php cybermag_wrapper_top(); // before wrapper content hook ?>
<?php cybermag_in_wrapper(); // wrapper hook ?>