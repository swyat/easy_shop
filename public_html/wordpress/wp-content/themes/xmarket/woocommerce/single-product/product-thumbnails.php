<?php
/**
 * Single Product Thumbnails
 */

global $post, $woocommerce;
                        
$product_layout = etheme_get_option('product_layout');
$crop = (get_option('woocommerce_single_image_crop') == 1) ? true : false;
$mainHeight = 400;
if($product_layout == 'horizontal') { 
    $mainWidth = 460;
}else if ($product_layout == 'vertical' || $product_layout == 'universal'){
    $mainWidth = 330;
}else{
    $mainWidth = 400;
}
                                    	
$attachments = get_posts( array(
    'post_type' 	=> 'attachment',
    'numberposts' 	=> -1,
    'post_status' 	=> null,
    'post_parent' 	=> $post->ID,
    'post__not_in'	=> array( get_post_thumbnail_id() ),
    'post_mime_type'=> 'image',
    'orderby'		=> 'menu_order',
    'order'			=> 'ASC'
) );
if($attachments){
    ?>
    <div class="views-gallery">
        <ul class="slider <?php if(count($attachments) > 3 && $product_layout == 'universal'){ ?>jcarousel-horizontal<?php } ?>">
            <li class="slide">
            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="cloud-zoom-gallery image" cloud-zoom-data="useZoom: 'zoom1', smallImage: '<?php echo etheme_get_image( $attachment->ID, $mainWidth, $mainHeight, $crop ) ?>'">
                <?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail'  ) ) ?>
            </a> 
            </li>            
            <?php       
                $loop = 0;
                
                foreach ( $attachments as $key => $attachment ) {
                    
                    if ( get_post_meta( $attachment->ID, '_woocommerce_exclude_image', true ) == 1 ) 
                    continue;
                    ?>
                    <li class="slide">
                        <a href="<?php echo wp_get_attachment_url( $attachment->ID ) ?>" class="cloud-zoom-gallery image" cloud-zoom-data="useZoom: 'zoom1', smallImage: '<?php echo etheme_get_image( $attachment->ID, $mainWidth, $mainHeight, $crop ) ?>'">
                            <?php echo wp_get_attachment_image( $attachment->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) ) ?>
                        </a>   
                    </li>               
                        
                    <?php
                }
            ?>
        </ul>
    </div>
    
    <?php if(count($attachments) > 3 && $product_layout != 'universal'){ ?>
        <div class="more-views-arrow prev" style="cursor: pointer; ">&nbsp;</div> 
        <div class="more-views-arrow next" style="cursor: pointer; ">&nbsp;</div> 
    <?php } ?> 
    <?php if(count($attachments) > 3 && $product_layout != 'universal'){ ?>
        <script type="text/javascript">
            jQuery('.views-gallery').iosSlider({
                desktopClickDrag: true,
                snapToChildren: true,
                infiniteSlider: false,
                navNextSelector: '.more-views-arrow.next',
                navPrevSelector: '.more-views-arrow.prev'
            }); 
        </script>  
    <?php } ?>
    <?php if(count($attachments) > 3 && $product_layout == 'universal'){ 
        wp_enqueue_script('jcarousel', get_template_directory_uri().'/js/jcarousel.js');
        wp_enqueue_style("carousel",get_template_directory_uri().'/css/carousel.css');
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('.jcarousel-horizontal').jcarousel({
                    scroll: 1,
                    vertical:true
                });  
            });
        </script>  
    <?php } ?>   
    <?php
}      
?>