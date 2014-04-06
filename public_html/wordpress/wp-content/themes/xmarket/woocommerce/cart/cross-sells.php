<?php
/**
 * Cross-sells
 */

global $woocommerce_loop, $woocommerce, $product;

$crosssells = $woocommerce->cart->get_cross_sells();

if ( sizeof( $crosssells ) == 0 ) return;

$args = array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'posts_per_page' 		=> 2,
	'no_found_rows' 		=> 1,
	'orderby' 				=> 'rand',
	'post__in' 				=> $crosssells
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] 	= 2;

$crosssells_count = 0;

if ( $products->have_posts() ) : ?>
    <div class="product-slider cross-sells">
        <h4 class="slider-title"><?php _e('You may be interested in&hellip;', 'woocommerce') ?></h4>
        <div class="clear"></div>
        <div class="carousel">
            <div class="slider">
			<?php while ( $products->have_posts() ) : $products->the_post(); $crosssells_count++; ?>
		      <div class="slide product-slide">
				<?php woocommerce_get_template_part( 'content', 'product' ); ?>
	           </div> 
			<?php endwhile; // end of the loop. ?>
            </div>
        </div>
        <?php if($crosssells_count > 4): ?>
            <div class="prev related-arrow arrow<?php echo $rand ?>" style="cursor: pointer; ">&nbsp;</div>
            <div class="next related-arrow arrow<?php echo $rand ?>" style="cursor: pointer; ">&nbsp;</div>
        <?php endif; ?>

			
                           
    </div><!-- product-slider -->     

    <script type="text/javascript">
        jQuery('.arrow<?php echo $rand ?>.prev').addClass('disabled');
        jQuery('.carousel').iosSlider({
            desktopClickDrag: true,
            snapToChildren: true,
            infiniteSlider: false,
            navNextSelector: '.arrow<?php echo $rand ?>.next',
            navPrevSelector: '.arrow<?php echo $rand ?>.prev',
            lastSlideOffset: 3,
            onFirstSlideComplete: function(){
                jQuery('.arrow<?php echo $rand ?>.prev').addClass('disabled');
            },
            onLastSlideComplete: function(){
                jQuery('.arrow<?php echo $rand ?>.next').addClass('disabled');
            },
            onSlideChange: function(){
                jQuery('.arrow<?php echo $rand ?>.prev').removeClass('disabled');
                jQuery('.arrow<?php echo $rand ?>.next').removeClass('disabled');
            }
        });               
    </script>
	
<?php endif; 

wp_reset_query();
