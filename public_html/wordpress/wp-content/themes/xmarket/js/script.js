jQuery(document).ready(function(){
    
    /* Hover intent
    -------------------------------------------------------------- */
    jQuery('#top-cart').hoverIntent(
        function () {
            jQuery(".cart-popup").stop().slideDown(100);
        }, 
        function () {
            jQuery(".cart-popup").stop().slideUp(100);
        }
    );
    
    /* Tabs
    -------------------------------------------------------------- */


	var $tabsNav    = jQuery('.tabs-nav'),
		$tabsNavLis = $tabsNav.children('li'),
		$tabContent = jQuery('.tab-content');

	$tabsNav.each(function() {
		var $this = jQuery(this);

		$this.next().children('.tab-content').stop(true,true).hide()
											 .first().show();

		$this.children('li').first().addClass('active').stop(true,true).show();
	});

	$tabsNavLis.on('click', function(e) {
		var $this = jQuery(this);

		$this.siblings().removeClass('active').end()
			 .addClass('active');
		
		$this.parent().next().children('.tab-content').stop(true,true).hide()
													  .siblings( $this.find('a').attr('href') ).fadeIn();

		e.preventDefault();
	});
    /* Accordion
    -------------------------------------------------------------- */
	var $container = jQuery('.acc-container'),
		$trigger   = jQuery('.acc-trigger');

	$container.hide();
	$trigger.first().addClass('active').next().show();

	var fullWidth = $container.outerWidth(true);
	$trigger.css('width', fullWidth);
	$container.css('width', fullWidth);
	
	$trigger.on('click', function(e) {
		if( jQuery(this).next().is(':hidden') ) {
			$trigger.removeClass('active').next().slideUp(300);
			jQuery(this).toggleClass('active').next().slideDown(300);
		}
		e.preventDefault();
	});

	// Resize
	jQuery(window).on('resize', function() {
		fullWidth = $container.outerWidth(true)
		$trigger.css('width', $trigger.parent().width() );
		$container.css('width', $container.parent().width() );
	});
  
    
    /* Checkout
    -------------------------------------------------------------- */
    jQuery("a#checkout-next").click(function(){
        jQuery("#shopping-cart-form").fadeIn();
        var checkoutWidth = jQuery("#shopping-cart").width() + 30;
        jQuery("#checkout-bar-in").animate({width:'+=50%'});
        jQuery("#checkout-slider").animate({marginLeft:'-=' + checkoutWidth}, 800, function() {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
		});
		return false;		
    });
    
    jQuery("a#checkout-back,a.checkout-back").click(function(){
        jQuery("#shopping-cart-form").fadeOut();
        var checkoutWidth = jQuery("#shopping-cart").width() + 30;
        jQuery("#checkout-bar-in").animate({width:'-=50%'});
        jQuery("#checkout-slider").animate({marginLeft:'+=' + checkoutWidth}, 800, function() {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
		});
		return false;		
    });
    
    /* Listswitcher
    -------------------------------------------------------------- */
    var activeClass = 'active_switcher';
    var gridClass = 'products_grid';
    var listClass = 'products_list';
    jQuery('.switchToList').click(function(){
        if(!jQuery.cookie('products_page') || jQuery.cookie('products_page') == 'grid'){
            switchToList();
        }
    });
    jQuery('.switchToGrid').click(function(){
        if(!jQuery.cookie('products_page') || jQuery.cookie('products_page') == 'list'){
            switchToGrid();
        }
    });
    
    function switchToList(){
        jQuery('.switchToList').addClass(activeClass);
        jQuery('.switchToGrid').removeClass(activeClass);
        jQuery('#products-grid').fadeOut(300,function(){
            jQuery(this).removeClass(gridClass).addClass(listClass).fadeIn(300);
            jQuery.cookie('products_page', 'list');
        });
    }
    
    function switchToGrid(){
        jQuery('.switchToGrid').addClass(activeClass);
        jQuery('.switchToList').removeClass(activeClass);
        jQuery('#products-grid').fadeOut(300,function(){
            jQuery(this).removeClass(listClass).addClass(gridClass).fadeIn(300);
            jQuery.cookie('products_page', 'grid');
        }); 
    }
    
    /* "Top" button
    -------------------------------------------------------------- */

    var scroll_timer;
    var displayed = false;
    var $message = jQuery('#back-to-top');
    var $window = jQuery(window);
    var top = jQuery(document.body).children(0).position().top;
    
    $window.scroll(function () {
        window.clearTimeout(scroll_timer);
        scroll_timer = window.setTimeout(function () { 
        if($window.scrollTop() <= top) 
        {
            displayed = false;
            $message.fadeOut(500);
        }
        else if(displayed == false) 
        {
            displayed = true;
            $message.stop(true, true).fadeIn(500).click(function () { $message.fadeOut(500); });
        }
        }, 400);
    });
    
    jQuery('#top-link').click(function(e) {
            jQuery('html, body').animate({scrollTop:0}, 'slow');
            return false;
    });
    
    /* Accordion Navigation
    -------------------------------------------------------------- */
    jQuery(function(){
        if(!nav_accordion){
            jQuery('.categories-group .wpsc_category_title .btn-show ').hide();
        }else{
            jQuery('.block.cats').addClass('acc_enabled');
            jQuery('.categories-group').each(function(){
                jQuery(this).has('.wpsc_top_level_categories').addClass('has-subnav');
                jQuery(this).has('.current-cat').addClass('current-parent opened');
            });
            
            
            var nav_section = jQuery('.categories-group .wpsc_top_level_categories');
            var nav_toggle_element = jQuery('.categories-group .wpsc_category_title .btn-show ');
            var nav_speed = 150;
            
            
            nav_toggle_element.click(function(){
                if(jQuery(this).parent().parent().hasClass('opened')){
                    hideActiveSection();
                }else{
                    showNext(jQuery(this));
                }
            });
            
            if(jQuery('.categories-group.opened').length > 0) {
                //jQuery('.categories-group.has-subnav').addClass('opened');
            }else{
                // If doesnt exitst opened point
                jQuery('.categories-group.has-subnav:first').addClass('opened').find('ul').show();
            }
            
            function showNext(element) {
                hideActiveSection();
                element.parent().parent().addClass('opened');
                element.parent().next().show(nav_speed);
            }
            
            function hideActiveSection(){
                jQuery('.categories-group.opened').removeClass('opened').find('.wpsc_top_level_categories').hide(nav_speed);
            }
        }
    }); 
    /* ethemeContactForm
    -------------------------------------------------------------- */
    var ethemeContactForm = jQuery('#ethemeContactForm');
    
    var spinner = jQuery('.contactSpinner');
    
    jQuery('.required-field').focus(function(){
        jQuery(this).removeClass('validation-failed');
    });
    
    ethemeContactForm.find('button.button').click(function(e){
        jQuery('#contactsMsgs').html('');
        e.preventDefault();
        spinner.show();
        
        var errmsg;
        errmsg = '';
        
        ethemeContactForm.find('.required-field').each(function(){
            if(jQuery(this).val() == '') {            
                    errmsg = isRequired;
                    jQuery(this).addClass('validation-failed');
                }
        });
        
        if(errmsg){
            jQuery('#contactsMsgs').html('<p class="error">' + errmsg + '</p>');
            spinner.hide();
        }else{
            
            url = ethemeContactForm.attr('action');
            
            data = ethemeContactForm.serialize();
            data += '&contactSubmit=true';
                   
            jQuery.ajax({
                url: url,
                method: 'GET',
                data: data,
                error: function() {
                    jQuery('#contactsMsgs').html('<p class="error">' + someerrmsg + '</p>');
                    spinner.hide();
                },
                success : function(){
                    jQuery('#contactsMsgs').html('<p class="success">' + succmsg + '</p>');
                    spinner.hide();
                }
            });
            
        }
    });
    /* ethemeCommentForm
    -------------------------------------------------------------- */
    var ethemeCommentForm = jQuery('#commentform');
    
    
    ethemeCommentForm.find('#submit').click(function(e){
        jQuery('#commentsMsgs').html('');
        var errmsg;
        errmsg = '';
        
        ethemeCommentForm.find('.required-field').each(function(){
            if(jQuery(this).val() == '') { 
                errmsg = isRequired;
                jQuery(this).addClass('validation-failed');;
            }
        });
        
        if(errmsg){
            e.preventDefault();
            jQuery('#commentsMsgs').html('<p class="error">' + errmsg + '</p>');
        }
    });
    /* "Close parent" button
    -------------------------------------------------------------- */
    var closeParentBtn = jQuery('.close-parent');
    
    
    closeParentBtn.click(function(e){
        jQuery(this).parent().slideUp(100);
    });
    
    /* Mobile navigation
    -------------------------------------------------------------- */
    
    var navList = jQuery('#main-nav > ul, div.menu > ul').clone();
    var etOpener = '<span class="open-child">(open)</span>';
    navList.removeClass('menu').addClass('et-mobile-menu');
    
    navList.before('<span class="et-menu-title">' + menuTitle + '</span>');
    
    
	navList.find('li:has(ul)',this).each(function() {
		jQuery(this).prepend(etOpener);
	})
    
    navList.find('.open-child').toggle(function(){
        jQuery(this).parent().addClass('over').find('>ul').slideDown(200);
    },function(){
        jQuery(this).parent().removeClass('over').find('>ul').slideUp(200);
    });
    
    
    
    jQuery('#main-nav, div.menu').after(navList).after('<span class="et-menu-title">' + menuTitle + '</span>');
    
    jQuery('.et-menu-title').toggle(function(){
        jQuery(this).next().slideDown(200);
    },function(){
        jQuery(this).next().slideUp(200);
    });
    
    /* Superfish menu
    -------------------------------------------------------------- */
    jQuery('#main-nav > ul, .menu > ul').superfish({
        hoverClass: 'over',
        shadow: false,
        delay: 100
    });
    
    
    /* Woo
    -------------------------------------------------------------- */

	// Ajax add to cart
	jQuery('.etheme-simple-product').live('click', function() {
		// AJAX add to cart request
		var $thisbutton = jQuery(this);
		
		if ($thisbutton.is('.etheme-simple-product, .product_type_downloadable, .product_type_virtual')) {
            
			showPopup();
            
            jQuery('#top-cart').addClass('updating');
            
            popupOverlay = jQuery('.etheme-popup-overlay');
            
            popupWindow = jQuery('.etheme-popup');
            
			formAction = jQuery('#simple-product-form').attr('action');
            
			var data = {
                quantity: jQuery('input[name=quantity]').val()
			};
            
			// Trigger event
			jQuery('body').trigger('adding_to_cart');
			
			// Ajax action
            jQuery.ajax({
                url: formAction,
                data: data,
                method: 'POST',
                timeout: 10000,
                dataType: 'text',
                success: function(data) {                    
                    jQuery('#top-cart').html(jQuery(data).find('#top-cart').html());                    
                    productImageSrc = jQuery('.main-image img').attr('src');                    
                    productImage = '<img width="72" src="'+productImageSrc+'" />';                    
                    productName = jQuery('.product-shop > h1').text();                    
                    cartHref = jQuery('#top-cart > a').attr('href');                    
                    popupHtml = productImage + '<em>'+productName+'</em> was successfully added to your shopping cart.<div class="clear"><a class="button cont-shop"><span>Continiue Shopping</span></a><a href="'+cartHref+'" class="button fl-r"><span>Go to checkout</span></a></div>';
                    popupWindow.find('.etheme-popup-content').css('backgroundImage','none').html(popupHtml);                    
                    jQuery('.cont-shop').one('click',function(){
                        hidePopup(popupOverlay,popupWindow);
                    });                    
                },
                error: function(data) {
                    popupWindow.find('.etheme-popup-content').css('backgroundImage','none').text('Something wrong');
                }
            });
			
			return false;
		
		} else {
			return true;
		}
		
	});
    
    
}); // End Ready

/* Product Hover
-------------------------------------------------------------- */
function hideImage(img){
    //Opera fix
    var block = jQuery(img).parent().parent().parent();
    block.height(block.height());
    //alert(blockHeight);
    jQuery(img).animate({
        'opacity' : 0
    },300);
}

function showImage(img){
    jQuery(img).animate({
        'opacity' : 1
    },300);
}  

function showPopup(){
    html = '<div class="etheme-popup-overlay"></div><div class="etheme-popup"><div class="etheme-popup-content"></div></div>'
    jQuery('body').prepend(html);
    popupOverlay = jQuery('.etheme-popup-overlay');
    popupWindow = jQuery('.etheme-popup');
    popupOverlay.one('click',function(){
        hidePopup(popupOverlay,popupWindow);
    });
}
function hidePopup(popupOverlay,popupWindow){
    popupOverlay.fadeOut(400);
    popupWindow.fadeOut(400).html('');
}