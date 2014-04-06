<?php
    $google_font_array = explode('|',etheme_get_option('google_font'));
    $font_src = '';
    if(!empty($google_font_array[1])){
        $font_name = $google_font_array[1];
        $font_src = $google_font_array[0];
    }
    if($font_src != ''):
?>
    <link href='http://fonts.googleapis.com/css?family=<?php echo $font_src; ?>' rel='stylesheet' type='text/css'/>
<?php endif; ?>
<style type="text/css">
    body {
        background-color: <?php etheme_option('backgroundcol') ?> ;
        <?php if(etheme_get_option('background_img') && etheme_get_option('background_img') != ''): ?>background-image: url(<?php etheme_option('background_img') ?>) ;<?php endif; ?>                               
        background-attachment: <?php etheme_option('background_attachment') ?> ;
        background-repeat: <?php etheme_option('background_repeat') ?> ;
        background-position: <?php etheme_option('background_position_x') ?> <?php etheme_option('background_position_y') ?> ;
    }
    
    <?php if ( etheme_get_option('sale_icon') ) : ?>
        .label-icon.sale-label { 
            width: <?php echo (etheme_get_option('sale_icon_width')) ? etheme_get_option('sale_icon_width') : 50 ?>px; 
            height: <?php echo (etheme_get_option('sale_icon_height')) ? etheme_get_option('sale_icon_height') : 50 ?>px;
        }            
        .label-icon.sale-label { background-image: url(<?php echo (etheme_get_option('sale_icon_url')) ? etheme_get_option('sale_icon_url') : get_template_directory_uri() .'/images/sale.png' ?>); }
    <?php endif; ?>
    
    <?php if ( etheme_get_option('new_icon') ) : ?>
        .label-icon.new-label { 
            width: <?php echo (etheme_get_option('new_icon_width')) ? etheme_get_option('new_icon_width') : 50 ?>px; 
            height: <?php echo (etheme_get_option('new_icon_height')) ? etheme_get_option('new_icon_height') : 50 ?>px;
        }            
        .label-icon.new-label { background-image: url(<?php echo (etheme_get_option('new_icon_url')) ? etheme_get_option('new_icon_url') : get_template_directory_uri() .'/images/new.png' ?>); }
        
    <?php endif; ?>
    
    <?php 
    $selectors = Array();
    $selectors['active_color'] = '
        a:hover,
        td.product-name a:hover,
        .cats .block-content .wpsc_categories > li > a:hover,
        .cats .block-content .wpsc_categories > li ul > li a:hover,
        a.product-name:hover,
        .product-name a:hover,
        .product-slider .product-slide .product-name a:hover,
        #products-grid.products_grid .product-grid .product-name a:hover,
        .etheme_widget_recent_entries > ul > li a:hover,
        .before-prefooter .links a:hover,
        .amount, 
        #breadcrumb a:hover, 
        .wpsc-breadcrumbs a:hover,
        .onsale-price .price, 
        .currentprice
        .cats .block-content li a:hover,
        #search .button:hover span,
        .cats .block-content .current-parent h5 a,
        .product-code span,
        .stock.in-stock span,
        .cats .block-content .wpsc_categories li.current-cat > a
    ';
    
    $selectors['google_font'] = '
        h1,h2,h3,h4,h5,h6,
        table.table th,
        .menu > ul > li > a,
        #main-nav > ul > li > a,
        .block .block-head,
        .product-slider .product-slide .product-name a,
        #products-grid .product-grid .product-name a,
		.tabs-nav li a,
        .tabs li a
    ';
    
    $selectors['active_bg'] = '
        .menu,
        .et-menu-title,
        #main-nav,
        .cats.acc_enabled .block-content .categories-group > h5:hover,
        .cats.acc_enabled .block-content .categories-group.has-subnav .btn-show:hover,
        .dropcap.dark,
        
        .menu> ul > li > ul li:hover,
        #main-nav > ul > li > ul li:hover,
        
        
        input[type=\'submit\'].active,
        .button.active,
        
        .widget_categories  > ul > li:hover,
        
        .square li:hover,
        
        .toolbar .pagintaion a:hover,
        
        .follow-us div img:hover,
        
        .twitter-message,
        
        .iosSlider .sliderNavi .naviItem.selected,
        
        .product-slider .next:hover,
        .product-slider .prev:hover,
        .related-arrow.prev:hover, 
        .related-arrow.prev:hover,
        .related-arrow.next:hover,
        
        .continue_shopping:hover,
        .go_to_checkout:hover,
        input[type=\'submit\']:hover,
        .button:hover
    ';

    
    $selectors['brown_bg'] = '
        .menu > ul > li > ul li,
        #main-nav > ul > li > ul li,
        
        .square li,
        
        .widget_categories > ul > li,
        
        .continue_shopping,
        .go_to_checkout,
        input[type=\'submit\'],
        .button 
    ';  
    
    $selectors['active_bg2'] = '
        input[type=\'submit\'].active:hover,
        .button.active:hover
    '; 
    $selectors['active_border'] = '
        textarea.validation-failed,
        input.validation-failed
    '; 
    ?>
    
    ::-moz-selection, ::selection                                    { background-color: <?php echo (etheme_get_option('activecol')) ? etheme_get_option('activecol') : '#fa832a' ?>; }
    
    <?php echo jsString($selectors['active_color']); ?>              { color: <?php echo (etheme_get_option('activecol')) ? etheme_get_option('activecol') : '#fa832a' ?>; }
    
    <?php echo jsString($selectors['active_bg']); ?>                 { background-color: <?php echo (etheme_get_option('activecol')) ? etheme_get_option('activecol') : '#fa832a' ?>; }
    
    <?php echo jsString($selectors['active_bg2']); ?>                { background-color: <?php echo (etheme_get_option('activehovercol')) ? etheme_get_option('activehovercol') : '#f56900' ?>; }
    
    <?php echo jsString($selectors['google_font']); ?>               { /* font-family: <?php echo (etheme_get_option('google_font') && etheme_get_option('google_font') != '') ? $font_name : 'Georgia' ?>; */ }
    
    <?php echo jsString($selectors['active_border']); ?>             { border-color: <?php echo (etheme_get_option('activecol')) ? etheme_get_option('activecol') : '#fa832a' ?>;}
    
    <?php echo jsString($selectors['brown_bg']); ?>                  { background-color:#dfdfdf; }
   
</style>
<script type="text/javascript">
    var active_color_selector = '<?php echo jsString($selectors['active_color']); ?>';
    var active_bg_selector = '<?php echo jsString($selectors['active_bg']); ?>';
    var active_border_selector = '<?php echo jsString($selectors['active_border']); ?>';
    var active_color_default = '<?php echo (etheme_get_option('activecol')) ? etheme_get_option('activecol') : '#ff4949' ?>';
    var bg_default = '<?php etheme_option('backgroundcol') ?>'; 
    var pattern_default = '<?php etheme_option('background_img') ?>';
    
    var isRequired = ' <?php _e('Please, fill in the required fields!', ETHEME_DOMAIN); ?>';
    var someerrmsg = '<?php _e('Something went wrong', ETHEME_DOMAIN); ?>';
    var menuTitle = '<?php _e('Menu', ETHEME_DOMAIN); ?>';
    var nav_accordion = false;

</script>