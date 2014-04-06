<?php
/**
 * The Header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'blanco' ), max( $paged, $page ) );

	?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <script type="text/javascript">
        var etheme_wp_url = '<?php echo home_url(); ?>'; 
        var succmsg = '<?php _e('All is well, your e&ndash;mail has been sent!', ETHEME_DOMAIN); ?>';
    </script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>

<body <?php body_class(); ?>>
    <?php get_template_part( 'et-styles' ); ?>
    <div id="container">
        <div class="containerInner">
            <div id="top-panel">
                <?php if(class_exists('WP_eCommerce') && etheme_get_option('cart_widget')): ?>
                    <div id="top-cart" class="shopping-cart-wrapper">
                        <?php get_template_part( 'wpsc-cart_widget' ); ?> 
                    </div>
                <?php endif ;?> 
                <?php if(class_exists('Woocommerce') && etheme_get_option('cart_widget')): ?>
                    <div id="top-cart" class="shopping-cart-wrapper widget_shopping_cart">
                        <?php $cart_widget = new Etheme_WooCommerce_Widget_Cart(); $cart_widget->widget(); ?> 
                    </div>
                <?php endif ;?> 
            </div>         
            <header id="header">
                <div class="logo">
                    <?php $logoimg = etheme_get_option('logo'); ?>
                    <?php if($logoimg): ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo $logoimg ?>" alt="<?php bloginfo( 'description' ); ?>" /></a>
                    <?php else: ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/assets/logo.png" alt="<?php bloginfo( 'description' ); ?>" /></a>
                    <?php endif ;?>
                    
                </div>
                
                <div id="search">
                    <?php if(etheme_get_option('header_phone') && etheme_get_option('header_phone') != ''): ?>
                        <span class="header-phone">
                            <?php etheme_option('header_phone') ?>
                        </span>
                    <?php endif; ?>
                    <?php get_search_form(); ?>
                </div>

                <?php if(etheme_get_option('top_links')): ?>
                <div id="links">
                    <div id="site-description"><?php bloginfo( 'description' ); ?></div>
                    <?php  get_template_part( 'et-links' ); ?>
                </div>
                <?php endif; ?>
                <div class="clear"></div>
                <?php wp_nav_menu(array('theme_location' => 'top', 'name' => 'top', 'container' => 'nav', 'container_id' => 'main-nav', 'menu_id' => 'top')); ?>

            </header>