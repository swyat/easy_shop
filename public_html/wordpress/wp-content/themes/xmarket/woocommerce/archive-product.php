<?php 
    get_header('shop');
    do_action('woocommerce_before_main_content'); 
    $product_per_row = etheme_get_option('prodcuts_per_row'); 
    $product_sidebar = etheme_get_option('product_page_sidebar');
    if($product_per_row == 5){
        $product_sidebar = false;
    }
?>  
<section id="main" class="columns2-left">
	<div id="default_products_page_container" class="<?php if(!$product_sidebar) echo 'no-sidebar'; else echo 'with-sidebar'?>">
	<a class="back-to" href="javascript: history.go(-1)"><?php _e('Return to Previous Page', ETHEME_DOMAIN); ?></a>
        	
    <?php
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        if(!@$cat->term_id){
            $image = etheme_get_option('product_bage_banner');
        }else{
            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
        }
        if($image && $image !=''){
            ?> <img class="cat-banner" src="<?php echo $image ?>" /> <?php
        }
     ?>
<div style="display:none"><a href="http://wpandyou.ru/" title="Wordpress Themes">wordpress themes</a>.</div>
		<?php if ( have_posts() ) : ?>

            <div class="toolbar">
                <?php do_action( 'woocommerce_pagination' ); ?>
                <div class="clear"></div>
            </div>
            
			<?php do_action('woocommerce_before_shop_loop'); ?>
		
				<?php woocommerce_product_subcategories(); ?>
                <div id="products-grid" class="products_grid rows-count<?php echo $product_per_row ?>">
    				<?php while ( have_posts() ) : the_post(); ?>
    		
    					<?php woocommerce_get_template_part( 'content', 'product' ); ?>
    		
    				<?php endwhile; // end of the loop. ?>
                    <div style="clear: both;"></div>
				</div>
			<?php do_action('woocommerce_after_shop_loop'); ?>
    		<div class="clear"></div>
    
            <div class="toolbar bottom">
                <?php do_action( 'woocommerce_pagination' ); ?>
                <div class="clear"></div>
            </div>
    		
		<?php else : ?>
		
			<?php if ( ! woocommerce_product_subcategories( array( 'before' => '<ul class="products">', 'after' => '</ul>' ) ) ) : ?>
					
				<p class="error"><?php _e( 'No products found which match your selection.', 'woocommerce' ); ?></p>
					
			<?php endif; ?>
		
		<?php endif; ?>
		


	   <?php do_action('woocommerce_after_main_content'); ?>
        </div><script type="text/javascript">imageTooltip(jQuery('.imageTooltip'))</script>
    <?php if($product_sidebar) : ?>
    	<div id="products-sidebar" class="main-products-sidebar">
            <?php etheme_get_wc_categories_menu() ?>
    		<?php if ( is_active_sidebar( 'product-widget-area' ) ) : ?>
    			<?php dynamic_sidebar( 'product-widget-area' ); ?>
    		<?php endif; ?>	
            <div class="clear"></div>
        </div>
	<?php endif; ?>	
    <div class="clear"></div>
</section><!-- #container -->
<?php get_footer('shop'); ?>