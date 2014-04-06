<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>

</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">



	<div id="top">
		<nav class="col-full" role="navigation">
            <hgroup>

                <?php
                    $logo = esc_url( get_template_directory_uri() . '/images/logo1.png' );
                    if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
                    if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' && is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
                ?>
                <?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>

                <?php } ?>
                <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
                        <img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
                    </a>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                <div class = "nav contact_us">
                    <div class = "mailers">
                    <img src="http://png-5.findicons.com/files/icons/1772/icon/128/15_icq.png" alt="icq">617279205<br>
                    <img src="http://www.asmenybesakademija.lt/media/regSkype.png" alt="skype">nix_1_donetsk<br>
                    </div>
                    <div class = "telephone">
                        (095)614-714-3    (067)614-714-3</br>
                        (062)614-714-3    (093)614-714-3
                    </div>
                </div>
                <?php
                     if ( class_exists( 'woocommerce' ) ) {
                         echo '<ul class="nav wc-nav">';
                         woocommerce_cart_link();
                         echo '</ul>';
                     }
                ?>


                <?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
                <?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
                <?php } ?>

                <?php
                    if ( class_exists( 'woocommerce' ) ) {
                        echo get_search_form();
                    }
                ?>
            </hgroup>
		</nav>
	</div><!-- /#top -->



    <?php woo_header_before(); ?>

	<header id="header" class="col-full">

        <?php woo_nav_before(); ?>

		<nav id="navigation" class="col-full" role="navigation">

			<?php
			if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fr', 'theme_location' => 'primary-menu' ) );
			} else {
			?>
	        <ul id="main-nav" class="nav fl">
				<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
				<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
				<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
			</ul><!-- /#nav -->
	        <?php } ?>

		</nav><!-- /#navigation -->

		<?php woo_nav_after(); ?>

	</header><!-- /#header -->

	<?php woo_content_before(); ?>