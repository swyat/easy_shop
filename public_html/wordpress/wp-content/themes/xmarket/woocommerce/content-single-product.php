<?php 
    do_action( 'woocommerce_before_single_product' );
    $product_layout = etheme_get_option('product_layout');
?>

<div class="clear"></div>
<div id="product-page" class="product_layout_<?php echo $product_layout; ?> product ">

	<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
    <div class="product-shop productcol summary">
		<?php do_action( 'woocommerce_single_product_summary' ); ?>

	</div><!-- .summary -->
    <div class="product-sidebar">
		<?php if (etheme_get_option('right_banners') && etheme_get_option('right_banners') != '' ) : ?>
			<?php etheme_option('right_banners'); ?>
        <?php else: ?>
            <?php dynamic_sidebar( 'product-single-widget-area' ); ?>
		<?php endif; ?>	
    </div>
    <div class="clear"></div> 
				
</div><!-- #product-<?php the_ID(); ?> -->
<?php do_action( 'woocommerce_after_single_product_summary' ); ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>