<?php
add_filter('etheme_theme_settings_defaults', 'etheme_theme_settings_load_defaults');
function etheme_theme_settings_load_defaults($defaults) {
	 $defaults = array(
        'custom_tab_title' => 'Custom Tab For All Products',
        'custom_tab' => '
<div  style="float:left; width:435px; padding-right:15px; border-right:1px solid #efefef;">
<h4>Custom HTML</h4>
<img src="[etheme_template_url]/images/assets/customtab.png" width="435">
<p>Odio, magnis. Et nisi. Facilisis, integer! Risus augue! Non turpis. Ac! Turpis, sit velit cras nec enim duis, rhoncus porttitor ac vut rhoncus duis! Sit. Vel integer quis porttitor sed in in ac, ut diam porttitor odio nunc tempor dapibus quis est aliquam dictumst, vel amet tincidunt pulvinar?</p>
</div>
<div  style="float:right; width:435px; ">
<h4>Custom HTML</h4>
<img src="[etheme_template_url]/images/assets/customtab2.png" width="435">
<p>Odio, magnis. Et nisi. Facilisis, integer! Risus augue! Non turpis. Ac! Turpis, sit velit cras nec enim duis, rhoncus porttitor ac vut rhoncus duis! Sit. Vel integer quis porttitor sed in in ac, ut diam porttitor odio nunc tempor dapibus quis est aliquam dictumst, vel amet tincidunt pulvinar?</p>
</div>
        ',
        'contacts_email' => 'test@gmail.com',
        'google_map' => 'Level 13, 2 Elizabeth St, Melbourne Victoria 3000 Australia',
        'contacts_custom_html' => '',
        'contacts_info' => '
<h5>Contact Info</h5>
<p style="font-size:11px;">30 South Park Avenue<br/>
San Francisco, CA 94108<br/>
USA</p> 
<p style="font-size:11px;">Phone: (123) 456-7890<br/>
Fax: +08 (123) 456-7890<br/>
Email: contact@companyname.com<br/>
Web: companyname.com</p>
<hr style="margin-bottom:15px;">
<h5>Dummy Text</h5>
<p style="font-size:11px;">It is a long established fact that a reader will be 
distracted by the readable content of a page when 
looking at its layout.</p>
        ',
        'right_banners' => '
<div class="product-banner">
<img src="[etheme_template_url]/images/assets/product-banner.png" alt="" />
<a href="#" class="button active"><span>Shop Now</span></a>
</div>
<div class="product-banner">
<img src="[etheme_template_url]/images/assets/product-banner2.png" alt="" />
<a href="#" class="button active"><span>Shop Now</span></a>
</div>
        ',
        'size_guide_img' => 'wp-content/themes/xmarket/images/assets/size-guide.jpg',
        'product_bage_banner' => 'wp-content/themes/xmarket/images/assets/banner5.jpg',
        'product_layout' => 'default',
        'activecol' => '#fa832a',
        'product_img_hover' => 'swap',
        'activehovercol' => '#f76a00',
        'backgroundcol' => '#EFEFEF',
        'background_img' => '',
        'new_icon' => 1,
        'new_icon_url' => '',
        'new_icon_width' => 50,
        'new_icon_height' => 50,
        'sale_icon' => 1,
        'sale_icon_url' => '',
        'sale_icon_width' => 50,
        'sale_icon_height' => 50,
		'cats_accordion' => 1,
        'product_page_sidebar' => 1,
        'prodcuts_per_row' => 3,   
        'blog_layout' => 'default',   
        'blog_sidebar' => 'left',
		'view_mode' => 'grid_list',
        'view_mode_default' => 'grid',        
		'cart_widget' => 1,
        'wpsc_crop_images' => 1,
        'header_phone' => 'Call toll free: 099822384',        
		'top_links' => 1,
		'prefooter' => 1,
        'facebook_url' => '#',
        'twitter_url' => '#',
        'rss_url' => '#',
        'shipp_text' => 'Free shipping on all orders from UK',
        'to_top' => 1,
		'copyright' => 'Wordpress DEMO Store. All Rights Reserved.',
		'twitter_name' => '8theme'
	 );
	return $defaults;
}
add_action('admin_init', 'etheme_load_admin_styles');
function etheme_load_admin_styles() {
	wp_enqueue_style('farbtastic');
	wp_enqueue_style('etheme_admin_css', ETHEME_CODE_CSS_URL.'/admin.css');
}
add_action('admin_init','etheme_add_admin_script');

function etheme_add_admin_script(){
	add_thickbox();
 	wp_enqueue_script('theme-preview');
	wp_enqueue_script('common');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
	wp_enqueue_script('farbtastic');
	wp_enqueue_script('etheme_admin_js', ETHEME_CODE_JS_URL.'/admin.js');	
}

function etheme_theme_settings_defaults() {
	$defaults = array();
	return apply_filters('etheme_theme_settings_defaults', $defaults);
}

add_action('admin_init', 'etheme_register_theme_settings', 5);
function etheme_register_theme_settings() {
	register_setting( ETHEME_OPTIONS, ETHEME_OPTIONS );
	add_option( ETHEME_OPTIONS, etheme_theme_settings_defaults() ); // update_option  add_option
	if ( !isset($_REQUEST['page']) || $_REQUEST['page'] != 'ethemesoptions' )
		return;
}
add_action('admin_menu', 'etheme_theme_settings_load_boxes');
function etheme_theme_settings_load_boxes() {
	global $_etheme_settings_pagehook;
	add_action('load-'.$_etheme_settings_pagehook, 'etheme_theme_settings_boxes');
}
function etheme_theme_settings_boxes() {
	global $_etheme_settings_pagehook;
	add_meta_box('etheme-theme-settings-general', __('General', ETHEME_DOMAIN), 'etheme_theme_settings_general_box', $_etheme_settings_pagehook, 'column1');
    add_meta_box('etheme-theme-settings-product-page', __('Product Page', ETHEME_DOMAIN), 'etheme_theme_settings_product_page_box', $_etheme_settings_pagehook, 'column1');
    add_meta_box('etheme-theme-settings-blog-page', __('Blog Layout', ETHEME_DOMAIN), 'etheme_theme_settings_blog_page_box', $_etheme_settings_pagehook, 'column1');
    add_meta_box('etheme-theme-settings-single-product-page', __('Single Product Page', ETHEME_DOMAIN), 'etheme_theme_settings_single_product_page_box', $_etheme_settings_pagehook, 'column1');
    add_meta_box('etheme-theme-settings-colors', __('Color Scheme', ETHEME_DOMAIN), 'etheme_theme_settings_colors_box', $_etheme_settings_pagehook, 'column2');
    add_meta_box('etheme-theme-settings-header', __('Header', ETHEME_DOMAIN), 'etheme_theme_settings_header_box', $_etheme_settings_pagehook, 'column2');
    add_meta_box('etheme-theme-settings-contacts', __('Contact Form', ETHEME_DOMAIN), 'etheme_theme_settings_contacts_box', $_etheme_settings_pagehook, 'column2');
    add_meta_box('etheme-theme-settings-footer', __('Footer', ETHEME_DOMAIN), 'etheme_theme_settings_footer_box', $_etheme_settings_pagehook, 'column2');
}


function etheme_theme_settings_contacts_box () {?>

    <p><?php _e("Your email for contact form:", ETHEME_DOMAIN); ?>
    <input type="text" class="text-input" name="<?php echo ETHEME_OPTIONS; ?>[contacts_email]" value="<?php echo esc_attr( etheme_get_option('contacts_email') ); ?>" />
    </p>
    <p><?php _e("Address for google map:", ETHEME_DOMAIN); ?>
    <input type="text" class="text-input" name="<?php echo ETHEME_OPTIONS; ?>[google_map]" value="<?php echo esc_attr( etheme_get_option('google_map') ); ?>" />
    <br /><span class="description"><?php _e('<b>Example:</b>  Level 13, 2 Elizabeth St, Melbourne Victoria 3000 Australia', ETHEME_DOMAIN); ?></span>
    </p>
    <p><?php _e("Custom html content: ", ETHEME_DOMAIN); ?><br />
    <textarea name="<?php echo ETHEME_OPTIONS; ?>[contacts_custom_html]" cols="60" rows="6"><?php etheme_option('contacts_custom_html',null,false); ?></textarea><br />
    <span class="description"><?php _e('This content will appear above contacts information', ETHEME_DOMAIN); ?></span></p>
    <hr />
    </p>
	<p><?php _e("Enter your contacts information:", ETHEME_DOMAIN); ?><br />
	<textarea name="<?php echo ETHEME_OPTIONS; ?>[contacts_info]" cols="60" rows="12"><?php etheme_option('contacts_info',null,false); ?></textarea><br />
	<span class="description"><?php _e('<b>NOTE:</b>  You can use any shortcode / HTML code.', ETHEME_DOMAIN); ?></span></p>
    <hr />
<?php
    
}


function etheme_theme_settings_single_product_page_box() { ?>
    <p>
        <div class="radio-set product-layout">
            <h4><?php _e("Product page layout:", ETHEME_DOMAIN); ?></h4>
            <div class="layout-type prodl1" >
                <input type="radio" name="<?php echo ETHEME_OPTIONS; ?>[product_layout]" value="default" <?php checked( etheme_get_option('product_layout') == 'default' ); ?> />
                <span><?php _e("Default", ETHEME_DOMAIN); ?></span>
            </div>
            <div class="layout-type prodl2">
                <input type="radio" name="<?php echo ETHEME_OPTIONS; ?>[product_layout]" value="horizontal" <?php checked( etheme_get_option('product_layout') == 'horizontal' ); ?>/>
                <span><?php _e("Horizontals", ETHEME_DOMAIN); ?></span>
            </div>
            <div class="layout-type prodl3">
                <input type="radio" name="<?php echo ETHEME_OPTIONS; ?>[product_layout]" value="vertical" <?php checked( etheme_get_option('product_layout') == 'vertical' ); ?>/>
                <span><?php _e("Vertical", ETHEME_DOMAIN); ?></span>
            </div>
            <div class="layout-type prodl4">
                <input type="radio" name="<?php echo ETHEME_OPTIONS; ?>[product_layout]" value="universal" <?php checked( etheme_get_option('product_layout') == 'universal' ); ?>/>
                <span><?php _e("Universal", ETHEME_DOMAIN); ?></span>
            </div>
            <div class="clear"></div>
        </div>
    </p>
    <!--p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[wpsc_crop_images]" id="<?php echo ETHEME_OPTIONS; ?>[wpsc_crop_images]" value="1" <?php checked(1, etheme_get_option('wpsc_crop_images')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[wpsc_crop_images]"><?php _e("Enable image cropping (wp-ecommerce only)", ETHEME_DOMAIN); ?></label>
    </p-->
    <hr />       
	<p><?php _e("Enter custom content you would like output to the product right sidebar <br>(If its off - widget from \"Product single product sidebar\" area will be shown):", ETHEME_DOMAIN); ?><br />
	<textarea name="<?php echo ETHEME_OPTIONS; ?>[right_banners]" cols="99" rows="7"><?php etheme_option('right_banners',null,false); ?></textarea><br />
	<span class="description"><?php _e('<b>NOTE:</b>  You can use any shortcode / HTML code.', ETHEME_DOMAIN); ?></span></p>
    <hr />
    
 	<p><?php _e("Size Guide img", ETHEME_DOMAIN); ?>
    <br/><span class="description"><?php _e("png, jpg or gif file", ETHEME_DOMAIN); ?></span></p>
	<?php echo etheme_add_upload_setting('size_guide_img', __("Upload image: png, jpg or gif file", ETHEME_DOMAIN)); ?>
    
    <hr />
    <p>
        <?php _e("Custom Tab Title:", ETHEME_DOMAIN); ?> <input type="text" class="text" name="<?php echo ETHEME_OPTIONS; ?>[custom_tab_title]" value="<?php etheme_option('custom_tab_title'); ?>" />
    </p>
    
	<p><?php _e("Enter custom content you would like output to the product custom tab (for all products):", ETHEME_DOMAIN); ?><br />
	<textarea name="<?php echo ETHEME_OPTIONS; ?>[custom_tab]" id="etheme_custom_tab1" cols="99" rows="7"><?php etheme_option('custom_tab',null,false); ?></textarea><br />
	<span class="description"><?php _e('<b>NOTE:</b>  You can use any shortcode / HTML code.', ETHEME_DOMAIN); ?></span></p>
    <hr />
    
<?php
}
function etheme_theme_settings_blog_page_box() { ?>
    <p>
        <div class="radio-set">
            <h4><?php _e("Blog page layout:", ETHEME_DOMAIN); ?></h4>
            <div class="layout-type blog1" >
                <input type="radio" name="<?php echo ETHEME_OPTIONS; ?>[blog_layout]" value="default" <?php checked( etheme_get_option('blog_layout') == 'default' ); ?> />
                <span><?php _e("Default", ETHEME_DOMAIN); ?></span>
            </div>
            <div class="layout-type blog2">
                <input type="radio" name="<?php echo ETHEME_OPTIONS; ?>[blog_layout]" value="portrait" <?php checked( etheme_get_option('blog_layout') == 'portrait' ); ?>/>
                <span><?php _e("Portrait Images", ETHEME_DOMAIN); ?></span>
            </div>
            <div class="clear"></div>
        </div>
    </p>
    
	<p><?php _e("Sidebar position:", ETHEME_DOMAIN); ?>
	<select name="<?php echo ETHEME_OPTIONS; ?>[blog_sidebar]">
		<option value="left" <?php selected('left', etheme_get_option('blog_sidebar')); ?>><?php _e("Left", ETHEME_DOMAIN); ?></option>
		<option value="right" <?php selected('right', etheme_get_option('blog_sidebar')); ?>><?php _e("Right", ETHEME_DOMAIN); ?></option>					
	</select>
    </p>
    
<?php
}
function etheme_theme_settings_colors_box() { ?>

	<p><?php _e("Main Color:", ETHEME_DOMAIN); ?>
	<?php echo etheme_add_color_setting('activecol'); ?></p>

	<p><?php _e("Active button hover Color:", ETHEME_DOMAIN); ?>
	<?php echo etheme_add_color_setting('activehovercol'); ?></p>
    
    <hr />
    
	<p><?php _e("Background Color:", ETHEME_DOMAIN); ?>
	<?php echo etheme_add_color_setting('backgroundcol'); ?></p>
    
 	<p><?php _e("Background Image", ETHEME_DOMAIN); ?>
    <br/><span class="description"><?php _e("png, jpg or gif file", ETHEME_DOMAIN); ?></span></p>
	<?php echo etheme_add_upload_setting('background_img', __("Upload image: png, jpg or gif file", ETHEME_DOMAIN)); ?>
    
	<p><?php _e("Background Repeat:", ETHEME_DOMAIN); ?>
	<select name="<?php echo ETHEME_OPTIONS; ?>[background_repeat]">
		<option><?php _e("Select", ETHEME_DOMAIN); ?></option>
		<option value="no-repeat" <?php selected('no-repeat', etheme_get_option('background_repeat')); ?>><?php _e("no-repeat", ETHEME_DOMAIN); ?></option>
		<option value="repeat-x" <?php selected('repeat-x', etheme_get_option('background_repeat')); ?>><?php _e("repeat-x", ETHEME_DOMAIN); ?></option>
		<option value="repeat-y" <?php selected('repeat-y', etheme_get_option('background_repeat')); ?>><?php _e("repeat-y", ETHEME_DOMAIN); ?></option>		
	</select>
    </p> 
       
	<p><?php _e("Background Attachment:", ETHEME_DOMAIN); ?>
	<select name="<?php echo ETHEME_OPTIONS; ?>[background_attachment]">
		<option><?php _e("Select", ETHEME_DOMAIN); ?></option>
		<option value="fixed" <?php selected('fixed', etheme_get_option('background_attachment')); ?>><?php _e("fixed", ETHEME_DOMAIN); ?></option>
		<option value="scroll" <?php selected('scroll', etheme_get_option('background_attachment')); ?>><?php _e("scroll", ETHEME_DOMAIN); ?></option>		
	</select>
    </p>
       
	<p><?php _e("Background Position (X):", ETHEME_DOMAIN); ?>
	<select name="<?php echo ETHEME_OPTIONS; ?>[background_position_x]">
		<option><?php _e("Select", ETHEME_DOMAIN); ?></option>
		<option value="left" <?php selected('left', etheme_get_option('background_position_x')); ?>><?php _e("left", ETHEME_DOMAIN); ?></option>
		<option value="center" <?php selected('center', etheme_get_option('background_position_x')); ?>><?php _e("center", ETHEME_DOMAIN); ?></option>		
		<option value="right" <?php selected('right', etheme_get_option('background_position_x')); ?>><?php _e("right", ETHEME_DOMAIN); ?></option>		
	</select>
    </p>
	<p><?php _e("Background Position (Y):", ETHEME_DOMAIN); ?>
	<select name="<?php echo ETHEME_OPTIONS; ?>[background_position_y]">
		<option><?php _e("Select", ETHEME_DOMAIN); ?></option>
		<option value="top" <?php selected('top', etheme_get_option('background_position_y')); ?>><?php _e("top", ETHEME_DOMAIN); ?></option>
		<option value="center" <?php selected('center', etheme_get_option('background_position_y')); ?>><?php _e("center", ETHEME_DOMAIN); ?></option>		
		<option value="bottom" <?php selected('bottom', etheme_get_option('background_position_y')); ?>><?php _e("bottom", ETHEME_DOMAIN); ?></option>		
	</select>
    </p>
<?php
}

function etheme_theme_settings_product_page_box() { ?>
	<p><?php _e("Products per row:", ETHEME_DOMAIN); ?>
	<select name="<?php echo ETHEME_OPTIONS; ?>[prodcuts_per_row]">
		<option value="3" <?php selected(3, etheme_get_option('prodcuts_per_row')); ?>><?php _e("3", ETHEME_DOMAIN); ?></option>
		<option value="4" <?php selected(4, etheme_get_option('prodcuts_per_row')); ?>><?php _e("4", ETHEME_DOMAIN); ?></option>
		<option value="5" <?php selected(5, etheme_get_option('prodcuts_per_row')); ?>><?php _e("5", ETHEME_DOMAIN); ?></option>
		
	</select>
    </p>  
    <hr />  
	<p><?php _e("Product Image Hover:", ETHEME_DOMAIN); ?>
	<select name="<?php echo ETHEME_OPTIONS; ?>[product_img_hover]">
		<option value="tooltip" <?php selected('tooltip', etheme_get_option('product_img_hover')); ?>><?php _e("Image Enlarge", ETHEME_DOMAIN); ?></option>
		<option value="swap" <?php selected('swap', etheme_get_option('product_img_hover')); ?>><?php _e("Image Swap", ETHEME_DOMAIN); ?></option>		
	</select>
    </p>
    <hr />  
	<p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[product_page_sidebar]" id="<?php echo ETHEME_OPTIONS; ?>[product_page_sidebar]" value="1" <?php checked(1, etheme_get_option('product_page_sidebar')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[product_page_sidebar]"><?php _e("Enable Sidebar on Product Page", ETHEME_DOMAIN); ?></label>
    </p>
    <hr class="div" style="clear:both"/>
	<p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[cats_accordion]" id="<?php echo ETHEME_OPTIONS; ?>[cats_accordion]" value="1" <?php checked(1, etheme_get_option('cats_accordion')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[cats_accordion]"><?php _e("Enable Navigation Accordion", ETHEME_DOMAIN); ?></label>
    </p>
    <hr class="div" style="clear:both"/>
	<p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[new_icon]" id="<?php echo ETHEME_OPTIONS; ?>[new_icon]" value="1" <?php checked(1, etheme_get_option('new_icon')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[new_icon]"><?php _e("Enable \"NEW\" icon", ETHEME_DOMAIN); ?></label>
    </p>
    
    <p><?php _e("Icon width:", ETHEME_DOMAIN); ?>
    <input type="text" class="text-input" style="width: 60px;" name="<?php echo ETHEME_OPTIONS; ?>[new_icon_width]" value="<?php echo esc_attr( etheme_get_option('new_icon_width') ); ?>" />
    
    <span class="description"><?php _e("<b>Example: </b> 30", ETHEME_DOMAIN); ?></span>
    </p>
    
    <p><?php _e("Icon height:", ETHEME_DOMAIN); ?>
    <input type="text" class="text-input" style="width: 60px;" name="<?php echo ETHEME_OPTIONS; ?>[new_icon_height]" value="<?php echo esc_attr( etheme_get_option('new_icon_height') ); ?>" />
    
    <span class="description"><?php _e("<b>Example: </b> 20", ETHEME_DOMAIN); ?></span>
    </p>
    
 	<p><?php _e("New icon URL", ETHEME_DOMAIN); ?>
    <br/><span class="description"><?php _e("png, jpg or gif file", ETHEME_DOMAIN); ?></span></p>
	<?php echo etheme_add_upload_setting('new_icon_url', __("Upload image: png, jpg or gif file", ETHEME_DOMAIN)); ?>
    <hr class="div" style="clear:both"/>

    
	<p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[sale_icon]" id="<?php echo ETHEME_OPTIONS; ?>[sale_icon]" value="1" <?php checked(1, etheme_get_option('sale_icon')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[sale_icon]"><?php _e("Enable \"Sale\" icon", ETHEME_DOMAIN); ?></label>
    </p>
    
    <p><?php _e("Icon width:", ETHEME_DOMAIN); ?>
    <input type="text" class="text-input" style="width: 60px;" name="<?php echo ETHEME_OPTIONS; ?>[sale_icon_width]" value="<?php echo esc_attr( etheme_get_option('sale_icon_width') ); ?>" />
    
    <span class="description"><?php _e("<b>Example: </b> 30", ETHEME_DOMAIN); ?></span>
    </p>
    
    <p><?php _e("Icon height:", ETHEME_DOMAIN); ?>
    <input type="text" class="text-input" style="width: 60px;" name="<?php echo ETHEME_OPTIONS; ?>[sale_icon_height]" value="<?php echo esc_attr( etheme_get_option('sale_icon_height') ); ?>" />
    
    <span class="description"><?php _e("<b>Example: </b> 20", ETHEME_DOMAIN); ?></span>
    </p>
    
 	<p><?php _e("Sale icon URL", ETHEME_DOMAIN); ?>
    <br/><span class="description"><?php _e("png, jpg or gif file", ETHEME_DOMAIN); ?></span></p>
	<?php echo etheme_add_upload_setting('sale_icon_url', __("Upload image: png, jpg or gif file", ETHEME_DOMAIN)); ?>
    <hr class="div" style="clear:both"/>

    <?php if(class_exists('WP_eCommerce')): ?>
    	<p><?php _e("View mode (Use List or/and Grid):", ETHEME_DOMAIN); ?>
    	<select name="<?php echo ETHEME_OPTIONS; ?>[view_mode]">
    		<option value="grid_list" <?php selected('grid_list', etheme_get_option('view_mode')); ?>><?php _e("Grid/List", ETHEME_DOMAIN); ?></option>
    		<option value="grid" <?php selected('grid', etheme_get_option('view_mode')); ?>><?php _e("Only Grid", ETHEME_DOMAIN); ?></option>
    		<option value="list" <?php selected('list', etheme_get_option('view_mode')); ?>><?php _e("Only List", ETHEME_DOMAIN); ?></option>
    		
    	</select>
        </p>
    	<p><?php _e("Default View Mode:", ETHEME_DOMAIN); ?>
    	<select name="<?php echo ETHEME_OPTIONS; ?>[view_mode_default]">
    		<option value="grid" <?php selected('grid', etheme_get_option('view_mode_default')); ?>><?php _e("Grid", ETHEME_DOMAIN); ?></option>
    		<option value="list" <?php selected('list', etheme_get_option('view_mode_default')); ?>><?php _e("List", ETHEME_DOMAIN); ?></option>		
    	</select>
        </p>
        <hr class="div" style="clear:both"/>
    <?php endif; ?>
 	<p><?php _e("Product Page Banner", ETHEME_DOMAIN); ?>
    <br/><span class="description"><?php _e("png, jpg or gif file", ETHEME_DOMAIN); ?></span></p>
	<?php echo etheme_add_upload_setting('product_bage_banner', __("Upload image: png, jpg or gif file", ETHEME_DOMAIN)); ?>
    <hr class="div" style="clear:both"/>
    
<?php
}

function etheme_theme_settings_header_box() { ?>

 	<p><?php _e("Logo image URL", ETHEME_DOMAIN); ?>
    <br/><span class="description"><?php _e("png, jpg or gif file", ETHEME_DOMAIN); ?></span></p>
	<?php echo etheme_add_upload_setting('logo', __("Upload image: png, jpg or gif file", ETHEME_DOMAIN)); ?>
    <hr class="div" style="clear:both"/>

	<p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[top_links]" id="<?php echo ETHEME_OPTIONS; ?>[top_links]" value="1" <?php checked(1, etheme_get_option('top_links')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[top_links]"><?php _e("Enable top links (Register | Sign In)", ETHEME_DOMAIN); ?></label>
    </p>
    
	<p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[cart_widget]" id="<?php echo ETHEME_OPTIONS; ?>[cart_widget]" value="1" <?php checked(1, etheme_get_option('cart_widget')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[cart_widget]"><?php _e("Enable cart widget", ETHEME_DOMAIN); ?></label>
    </p>
    
    <p><?php _e("Phone number:", ETHEME_DOMAIN); ?>
    <input type="text" class="text-input" name="<?php echo ETHEME_OPTIONS; ?>[header_phone]" value="<?php echo esc_attr( etheme_get_option('header_phone') ); ?>" />
    </p>
<?php
}

function etheme_theme_settings_footer_box() { ?>
    
	<p><?php _e("Twitter Username:", ETHEME_DOMAIN); ?><br />
    <input type="text" class="text-input" name="<?php echo ETHEME_OPTIONS; ?>[twitter_name]" value="<?php echo esc_attr( etheme_get_option('twitter_name') ); ?>" />
    </p>
    
	<p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[prefooter]" id="<?php echo ETHEME_OPTIONS; ?>[prefooter]" value="1" <?php checked(1, etheme_get_option('prefooter')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[prefooter]"><?php _e("Use Prefooter (If its off - widget from Prefooter area will be shown)", ETHEME_DOMAIN); ?></label>
    </p>
    <hr class="div" style="clear:both"/>
    <p><?php _e("Facebook url:", ETHEME_DOMAIN); ?><br />
    <input type="text" class="text-input" name="<?php echo ETHEME_OPTIONS; ?>[facebook_url]" value="<?php echo esc_attr( etheme_get_option('facebook_url') ); ?>" />
    </p>
    <p><?php _e("Twitter url:", ETHEME_DOMAIN); ?><br />
    <input type="text" class="text-input" name="<?php echo ETHEME_OPTIONS; ?>[twitter_url]" value="<?php echo esc_attr( etheme_get_option('twitter_url') ); ?>" />
    </p>
    <p><?php _e("Vimeo url:", ETHEME_DOMAIN); ?><br />
    <input type="text" class="text-input" name="<?php echo ETHEME_OPTIONS; ?>[rss_url]" value="<?php echo esc_attr( etheme_get_option('rss_url') ); ?>" />
    </p>
    <hr class="div" style="clear:both"/>
    <p><?php _e("Prefooter text:", ETHEME_DOMAIN); ?><br />
    <input type="text" class="text-input" name="<?php echo ETHEME_OPTIONS; ?>[shipp_text]" value="<?php echo esc_attr( etheme_get_option('shipp_text') ); ?>" />
    </p>

<?php
}
function etheme_theme_settings_general_box() { ?>    
    <p><?php _e("Use Google Font For Headings:", ETHEME_DOMAIN); ?>
    	<select name="<?php echo ETHEME_OPTIONS; ?>[google_font]">
    		<option value="" ><?php _e("Select", ETHEME_DOMAIN); ?></option>
    		<option value="Courgette|Courgette" <?php selected('Courgette|Courgette', etheme_get_option('google_font')); ?>><?php _e("Courgette", ETHEME_DOMAIN); ?></option>		
    		<option value="Cantata+One|Cantata One" <?php selected('Cantata+One|Cantata One', etheme_get_option('google_font')); ?>><?php _e("Cantata One", ETHEME_DOMAIN); ?></option>		
    		<option value="Patrick+Hand|Patrick Hand" <?php selected('Patrick+Hand|Patrick Hand', etheme_get_option('google_font')); ?>><?php _e("Patrick Hand", ETHEME_DOMAIN); ?></option>		
    		<option value="Alike|Alike" <?php selected('Alike|Alike', etheme_get_option('google_font')); ?>><?php _e("Alike", ETHEME_DOMAIN); ?></option>		
    		<option value="Alegreya+SC|Alegreya SC" <?php selected('Alegreya+SC|Alegreya SC', etheme_get_option('google_font')); ?>><?php _e("Alegreya SC", ETHEME_DOMAIN); ?></option>		
    		<option value="Cuprum|Cuprum" <?php selected('Cuprum|Cuprum', etheme_get_option('google_font')); ?>><?php _e("Cuprum", ETHEME_DOMAIN); ?></option>		
    		<option value="Muli|Muli" <?php selected('Muli|Muli', etheme_get_option('google_font')); ?>><?php _e("Muli", ETHEME_DOMAIN); ?></option>		
    		<option value="Playfair+Display|Playfair Display" <?php selected('Playfair+Display|Playfair Display', etheme_get_option('google_font')); ?>><?php _e("Playfair Display", ETHEME_DOMAIN); ?></option>		
    	    <option value="Lustria|Lustria" <?php selected('Lustria|Lustria', etheme_get_option('google_font')); ?>><?php _e("Lustria", ETHEME_DOMAIN); ?></option>		
   		    <option value="Tinos|Tinos" <?php selected('Tinos|Tinos', etheme_get_option('google_font')); ?>><?php _e("Tinos", ETHEME_DOMAIN); ?></option>		
   		    <option value="Francois+One|Francois One" <?php selected('Francois+One|Francois One', etheme_get_option('google_font')); ?>><?php _e("Francois One", ETHEME_DOMAIN); ?></option>		
   		    <option value="Carme|Carme" <?php selected('Carme|Carme', etheme_get_option('google_font')); ?>><?php _e("Carme", ETHEME_DOMAIN); ?></option>		
   		    <option value="Berkshire+Swash|Berkshire Swash" <?php selected('Berkshire+Swash|Berkshire Swash', etheme_get_option('google_font')); ?>><?php _e("Berkshire Swash", ETHEME_DOMAIN); ?></option>		
   		    <option value="Share|Share" <?php selected('Share|Share', etheme_get_option('google_font')); ?>><?php _e("Share", ETHEME_DOMAIN); ?></option>		
   		</select>
    </p>
    <hr />
	<p>
    <input type="checkbox" name="<?php echo ETHEME_OPTIONS; ?>[to_top]" id="<?php echo ETHEME_OPTIONS; ?>[to_top]" value="1" <?php checked(1, etheme_get_option('to_top')); ?> /> 
    <label for="<?php echo ETHEME_OPTIONS; ?>[to_top]"><?php _e("Enable \"Back To Top\" button", ETHEME_DOMAIN); ?></label>
    </p>

	<p><?php _e("Copyright Text:", ETHEME_DOMAIN); ?><br />
	<textarea name="<?php echo ETHEME_OPTIONS; ?>[copyright]" cols="39" rows="2"><?php etheme_option('copyright'); ?></textarea>
    </p>
<?php
}

function etheme_theme_settings_admin() { 
	global $_etheme_settings_pagehook;
?>	
	<div id="etheme-theme-settings" class="wrap etheme-metaboxes">
	<form method="post" action="options.php">
		<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
		<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>
		<?php settings_fields(ETHEME_OPTIONS); // important! ?>
		<?php screen_icon('options-etheme'); ?>
		<h2>
			<?php echo ETHEME_THEME_NAME.' - '.__('Theme Settings', ETHEME_DOMAIN); ?><br/>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings', ETHEME_DOMAIN) ?>" />
            <a class="button" onclick="return confirm('<?php _e('Are you sure you want to install demo data?', ETHEME_DOMAIN) ?>')" href="<?php echo home_url() ?>/wp-admin/admin.php?page=ethemesoptions&etheme_install=xmarket"><?php _e('Install Demo Pages', ETHEME_DOMAIN) ?></a>
		</h2>
		<div class="metabox-holder clearfix">
			<div class="postbox-container-left">
			<div class="postbox-container">
				<?php do_meta_boxes($_etheme_settings_pagehook, 'column1', null); ?>
			</div>
			</div>
			<div class="postbox-container-right">
			<div class="postbox-container">
				<?php do_meta_boxes($_etheme_settings_pagehook, 'column2', null); ?>
			</div>
			</div>
		</div>
		<div class="bottom-buttons">
			<input type="submit" class="button-primary" value="<?php _e('Save Settings', ETHEME_DOMAIN) ?>" />
            <a class="button" onclick="return confirm('<?php _e('Are you sure you want to install demo data?', ETHEME_DOMAIN) ?>')" href="<?php echo home_url() ?>/wp-admin/admin.php?page=ethemesoptions&etheme_install=xmarket"><?php _e('Install Demo Pages', ETHEME_DOMAIN) ?></a>
		</div>
	</form>
	</div>

<?php
}