<?php
class Etheme_WooCommerce_Widget_Cart extends WP_Widget {

	/** Variables to setup the widget. */
	var $woo_widget_cssclass;
	var $woo_widget_description;
	var $woo_widget_idbase;
	var $woo_widget_name;

	/** constructor */
	function Etheme_WooCommerce_Widget_Cart() {

		/* Widget variable settings. */
		$this->woo_widget_cssclass 		= 'etheme_woocommerce_widget_cart';
		$this->woo_widget_description 	= __( "Display the user's Cart in the sidebar.", 'woocommerce' );
		$this->woo_widget_idbase 		= 'etheme_woocommerce_widget_cart';
		$this->woo_widget_name 			= __( 'WooCommerce Cart', 'woocommerce' );

		/* Widget settings. */
		$widget_ops = array( 'classname' => $this->woo_widget_cssclass, 'description' => $this->woo_widget_description );

		/* Create the widget. */
		$this->WP_Widget( 'shopping_cart', $this->woo_widget_name, $widget_ops );
	}

	/** @see WP_Widget */
	function widget( $args = array(), $instance = array() ) {
		global $woocommerce;
		
		extract( $args );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Cart', 'woocommerce') : $instance['title'], $instance, $this->id_base );
		$hide_if_empty = empty( $instance['hide_if_empty'] )  ? 0 : 1;


?>
    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php if ( $title ) echo $title ; ?></a><?php echo '<span> - </span>' ?><span class="dark-span"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span> 
    <div class="cart-popup" style="display: none; ">
        <?php
		
		if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
		  ?>
            <p class="recently-added"><?php echo __('Recently added item(s)', 'woocommerce'); ?></p>
            <div class="products-small">
          <?php
            $counter = 0;
			foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
				$counter++;
                if($counter > 3) continue;
				$_product = $cart_item['data'];

				if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) 
					continue;
				
				if ( $_product->exists() && $cart_item['quantity'] > 0 ) {
			
	   				$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();
							
					$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key ); 	
								
				?>
                    <div class="product-item">       
                        <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>" class="product-image">
                            <?php echo get_the_post_thumbnail( $cart_item['product_id'], array(50,50) ); ?>
                        </a>
                        <h5><a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ) ?></a></h5>
                        <div class="qty">
                            <span class="price"><span class="pricedisplay"><?php echo $product_price; ?></span></span> (<?php echo __('Quantity', 'woocommerce'); ?>: <?php echo $cart_item['quantity']; ?>)
                        </div>
                        <div class="clear"></div>
                    </div> 
                <?php
                }
			}
    	?>
        </div>

        <?php	
		} else {
			echo '<p class="empty">' . __('No products in the cart.', 'woocommerce') . '</p>';
		}
		

		if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
		  ?>
            <div class="totals">
                <?php echo __('Total:', 'woocommerce'); ?> <span class="price"><span class="pricedisplay"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></span>
            </div>
          <?php

			do_action( 'woocommerce_widget_shopping_cart_before_buttons' );
            ?>
                <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="button emptycart"><span><?php echo __('View Cart &rarr;', 'woocommerce'); ?></span></a>
                
                <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="button fl-r"><span><?php echo __('Checkout &rarr;', 'woocommerce'); ?></span></a>   
            
            <?php

		}
		?>
    </div> 
        <?php

	}

	/** @see WP_Widget->update */
	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
		$instance['hide_if_empty'] = empty( $new_instance['hide_if_empty'] ) ? 0 : 1;
		return $instance;
	}

	/** @see WP_Widget->form */
	function form( $instance ) {
		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'woocommerce') ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('hide_if_empty') ); ?>" name="<?php echo esc_attr( $this->get_field_name('hide_if_empty') ); ?>"<?php checked( $hide_if_empty ); ?> />
		<label for="<?php echo $this->get_field_id('hide_if_empty'); ?>"><?php _e( 'Hide if cart is empty', 'woocommerce' ); ?></label></p>
		<?php
	}

} // class WooCommerce_Widget_Cart
class Etheme_Widget_Price_Filter extends WP_Widget {

	/** Variables to setup the widget. */
	var $woo_widget_cssclass;
	var $woo_widget_description;
	var $woo_widget_idbase;
	var $woo_widget_name;
	
	/** constructor */
	function Etheme_Widget_Price_Filter() {
		
		/* Widget variable settings. */
		$this->woo_widget_cssclass = 'widget_price_filter';
		$this->woo_widget_description = __( 'Shows a price filter slider in a widget which lets you narrow down the list of shown products when viewing product categories.', 'woocommerce' );
		$this->woo_widget_idbase = 'etheme_woocommerce_price_filter';
		$this->woo_widget_name = __('8theme Price Filter', 'woocommerce' );
		
		/* Widget settings. */
		$widget_ops = array( 'classname' => $this->woo_widget_cssclass, 'description' => $this->woo_widget_description );
		
		/* Create the widget. */
		$this->WP_Widget('price_filter', $this->woo_widget_name, $widget_ops);
	}

	/** @see WP_Widget */
	function widget( $args, $instance ) {
		extract($args);
		
		global $_chosen_attributes, $wpdb, $woocommerce, $wp_query, $wp;
		
		if (!is_tax( 'product_cat' ) && !is_post_type_archive('product') && !is_tax( 'product_tag' )) return; // Not on product page - return
		
		if ( sizeof( $woocommerce->query->unfiltered_product_ids ) == 0 ) return; // None shown - return
		
		if ( get_option( 'woocommerce_enable_jquery_ui' ) != 'no' ) {
			
			wp_enqueue_script( 'wc-price-slider' );
			
			wp_localize_script( 'wc-price-slider', 'woocommerce_price_slider_params', array(
				'currency_symbol' 	=> get_woocommerce_currency_symbol(),
				'currency_pos'      => get_option( 'woocommerce_currency_pos' ), 
				'min_price'			=> isset( $_SESSION['min_price'] ) ? $_SESSION['min_price'] : '',
				'max_price'			=> isset( $_SESSION['max_price'] ) ? $_SESSION['max_price'] : ''
			) );
		}

		$title = $instance['title'];
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
				
		// Remember current filters/search
		$fields = '';
		
		if (get_search_query()) $fields = '<input type="hidden" name="s" value="'.get_search_query().'" />';
		if (isset($_GET['post_type'])) $fields .= '<input type="hidden" name="post_type" value="'.esc_attr( $_GET['post_type'] ).'" />';
		if (isset($_GET['product_cat'])) $fields .= '<input type="hidden" name="product_cat" value="'.esc_attr( $_GET['product_cat'] ).'" />';
		if (isset($_GET['product_tag'])) $fields .= '<input type="hidden" name="product_tag" value="'.esc_attr( $_GET['product_tag'] ).'" />';
		
		if ($_chosen_attributes) foreach ($_chosen_attributes as $attribute => $data) :
		
			$fields .= '<input type="hidden" name="'.esc_attr( str_replace('pa_', 'filter_', $attribute) ).'" value="'.esc_attr( implode(',', $data['terms']) ).'" />';
			if ($data['query_type']=='or') $fields .= '<input type="hidden" name="'.esc_attr( str_replace('pa_', 'query_type_', $attribute) ).'" value="or" />';
		
		endforeach;
		
		$min = $max = 0;
		$post_min = $post_max = '';
		
		if ( sizeof( $woocommerce->query->layered_nav_product_ids ) == 0 ) :

			$max = ceil($wpdb->get_var("SELECT max(meta_value + 0) 
			FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE meta_key = '_price'"));

		else :
		
			$max = ceil($wpdb->get_var("SELECT max(meta_value + 0) 
			FROM $wpdb->posts
			LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
			WHERE meta_key = '_price' AND (
				$wpdb->posts.ID IN (".implode(',', $woocommerce->query->layered_nav_product_ids).") 
				OR (
					$wpdb->posts.post_parent IN (".implode(',', $woocommerce->query->layered_nav_product_ids).")
					AND $wpdb->posts.post_parent != 0
				)
			)"));
		
		endif;
		
		if ( $min == $max ) return;
		
		if (isset($_SESSION['min_price'])) $post_min = $_SESSION['min_price'];
		if (isset($_SESSION['max_price'])) $post_max = $_SESSION['max_price'];

		echo $before_widget . $before_title . $title . $after_title;
		
		if ( get_option( 'permalink_structure' ) == '' ) 
			$form_action = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
		else
			$form_action = preg_replace( '%\/page/[0-9]+%', '', home_url( $wp->request ) );
		
		echo '<form method="get" action="' . $form_action . '">
			<div class="price_slider_wrapper">
				<div class="price_slider" style="display:none;"></div>
				<div class="price_slider_amount">
					<input type="text" id="min_price" name="min_price" value="'.esc_attr( $post_min ).'" data-min="'.esc_attr( $min ).'" placeholder="'.__('Min price', 'woocommerce').'" />
					<input type="text" id="max_price" name="max_price" value="'.esc_attr( $post_max ).'" data-max="'.esc_attr( $max ).'" placeholder="'.__('Max price', 'woocommerce').'" />
					<button type="submit" class="button"><span>'.__('Filter', 'woocommerce').'</span></button>
					<div class="price_label" style="display:none;">
						'.__('Price:', 'woocommerce').' <span class="from"></span> &mdash; <span class="to"></span>
					</div>
					'.$fields.'
					<div class="clear"></div>
				</div>
			</div>
		</form>';
		
		echo $after_widget;
	}

	/** @see WP_Widget->update */
	function update( $new_instance, $old_instance ) {
		if (!isset($new_instance['title']) || empty($new_instance['title'])) $new_instance['title'] = __('Filter by price', 'woocommerce');
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		return $instance;
	}

	/** @see WP_Widget->form */
	function form( $instance ) {
		global $wpdb;
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'woocommerce') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
		<?php
	}
} // class WooCommerce_Widget_Price_Filter
function etheme_wc_register_widgets() {
	register_widget('Etheme_Widget_Price_Filter');
}
add_action('widgets_init', 'etheme_wc_register_widgets');


function etheme_get_wc_categories_menu(){
    global $wp_query;
    ?>
        <div class="block cats">
            <div class="block-head">
                <?php _e('Categories', ETHEME_DOMAIN);?>
            </div>
            <div class="block-content">
            	<?php $instance_categories = get_terms( 'product_cat', 'hide_empty=0&parent=0');
                    $cat = $wp_query->get_queried_object();
                    if(@$cat->term_id){ $current_cat = $cat->term_id; }
                foreach($instance_categories as $categories){ 
                    $term_id = $categories->term_id;
                    $term_name = $categories->name;
                    ?>
                    <div class='categories-group <?php if($term_id == $current_cat) echo 'current-parent opened' ; ?>' id='sidebar_categorisation_group_<?php echo $term_id; ?>'>
                        <h5 class='wpsc_category_title'><a href="<?php echo get_term_link( $categories, 'product_cat' ); ?>"><?php echo $term_name; ?></a><span class="btn-show"></span></h5>
                            <?php $subcat_args = array( 'taxonomy' => 'product_cat', 
                            'title_li' => '', 'show_count' => 0, 'hide_empty' => 0, 'echo' => false,
                            'show_option_none' => '', 'child_of' => $term_id ); ?>
                            <?php if(get_option('show_category_count') == 1) $subcat_args['show_count'] = 1; ?>
                            <?php $subcategories = wp_list_categories( $subcat_args ); ?>
                            <?php if ( $subcategories ) { ?>
                            <ul class='wpsc_categories wpsc_top_level_categories'><?php echo $subcategories ?></ul>
                            <?php } ?>
                        <div class='clear_category_group'></div>
                    </div>
                    <?php
                } 
                ?>
            </div>
            <script type="text/javascript"> 
                <?php if(!etheme_get_option('cats_accordion')): ?>
                    var nav_accordion = false;
                <?php else: ?>
                    var nav_accordion = true;
                <?php endif ;?>
            </script>
        </div>
    <?php
}

function etheme_wc_product_labels( $product_id = '' ) { 
    echo etheme_wc_get_product_labels($product_id);
}
function etheme_wc_get_product_labels( $product_id = '' ) {
	global $post, $wpdb,$product;
    $count_labels = 0; 
    $output = '';

    if ( etheme_get_option('sale_icon') ) : 
        if ($product->is_on_sale()) {$count_labels++; 
            $output .= '<span class="label-icon sale-label">'.__( 'Sale!', ETHEME_DOMAIN ).'</span>';
        }
    endif; 
    
    if ( etheme_get_option('new_icon') ) : $count_labels++; 
        if(etheme_product_is_new($product_id)) :
            $second_label = ($count_labels > 1) ? 'second_label' : '';
            $output .= '<span class="label-icon new-label '.$second_label.'">'.__( 'New!', ETHEME_DOMAIN ).'</span>';
        endif;
    endif; 
    return $output;
}

function etheme_wc_pagination( $pages = '', $range = 10 )
{
     global $paged;
     if( empty( $paged ) ) $paged = 1;
     
     $html = '';

     if( $pages == '' ) {
         global $wp_query;
         
         if ( isset( $wp_query->max_num_pages ) )   
             $pages = $wp_query->max_num_pages;
         
         if( !$pages )
             $pages = 1;
     }   

     if( 1 != $pages ) {
         $html .= "<div class='pagintaion'>";
         if( $paged > 2 ) $html .= "<a href='" . get_pagenum_link( 1 ) . "'>&laquo;</a>";
         if( $paged > 1 ) $html .= "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo;</a>";

         for ( $i=1; $i <= $pages; $i++ )
         {
             if( 1 != $pages &&( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) )
             {
                 $class = ( $paged == $i ) ? " class='selected'" : '';
                 $html .= "<a href='" . get_pagenum_link( $i ) . "'$class >$i</a>";
             }
         }

         if ( $paged < $pages ) $html .= "<a href='" . get_pagenum_link( $paged + 1 ) . "'>&rsaquo;</a>";  
         if ( $paged < $pages - 1 ) $html .= "<a href='" . get_pagenum_link($pages) . "'>&raquo;</a>";
         
         $html .= "</div>\n";
     }
     
     echo apply_filters( 'etheme_wc_pagination', $html );
}   