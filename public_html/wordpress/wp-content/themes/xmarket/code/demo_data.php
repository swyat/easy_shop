<?php 

    if(@$_GET['etheme_install'] == 'xmarket'):
    global $user_ID;
    
    $new_posts_array = array();
    
    global $e_installerrors;
    global $e_installsuccs;
    
    $new_posts_array = array(
        'home' => array(
            'post_title' => 'Home page',
            'post_content' => '
<div>[layerslider id="1"]</div>
<div class="banner "><img src="[etheme_template_url]/images/assets/banner1.png" alt="" />[etheme_btn title="Shop Now" url="test_url" class="active"]</div>
<div class="banner last"><img src="[etheme_template_url]/images/assets/banner2.png" alt="" />[etheme_btn title="Shop Now" url="test_url" class="active"]</div>
<div class="clear">&nbsp;</div>          
[etheme_featured][etheme_new title="Latest Products" ] 
<div class="clear">&nbsp;</div>          
            ',
            'post_status' => 'publish',
            'post_date' => date('Y-m-d H:i:s'),
            'post_author' => $user_ID,
            'post_type' => 'page',
            'post_category' => array(0)
        ),
        'blog' => array(
            'post_title' => 'Blog',
            'post_content' => '',
            'post_status' => 'publish',
            'post_date' => date('Y-m-d H:i:s'),
            'post_author' => $user_ID,
            'post_type' => 'page',
            'post_category' => array(0)
        ),
        'contacts' => array(
            'post_title' => 'Contact Us',
            'post_content' => '[etheme_contacts]',
            'post_status' => 'publish',
            'post_date' => date('Y-m-d H:i:s'),
            'post_author' => $user_ID,
            'post_type' => 'page',
            'post_category' => array(0)
        )
    );
    
    foreach($new_posts_array as $key => $post){
        $post_id = wp_insert_post($post);
        
        $e_installsuccs[] = '<strong>'.$post['post_title'].'</strong> successfully installed!';
        
        if($key == 'home') {
            $home_id = $post_id;
        }
        if($key == 'blog') {
            $blog_id = $post_id;
        }
    }
    
    if($home_id){
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home_id );
        add_post_meta($home_id, '_wp_page_template', 'frontpage.php');
    }
    if($blog_id){
        update_option( 'page_for_posts', $blog_id );
    }
    
    function ethemeShowAdminMessages(){
        global $e_installerrors,$e_installsuccs;
        if(count($e_installerrors) < 1){
            echo '<div id="message" class="updated fade">';
            foreach($e_installsuccs as $msg){
            	echo "<p>$msg</p>";
            }
            
        }else {
            echo '<div id="message" class="error">';
            foreach($e_installerrors as $msg){
            	echo "<p>$msg</p>";
            }
        }
        echo "</div>";
    }
    add_action('admin_notices', 'ethemeShowAdminMessages');
    wp_redirect(get_bloginfo('url').'/wp-admin/admin.php?page=ethemesoptions&etheme_install=success');    
endif; 
if(@$_GET['etheme_install'] == 'success'):
    add_action('admin_notices', 'ethemeShowAdminMessages');
    function ethemeShowAdminMessages(){
        echo '<div id="message" class="updated fade">';
            echo "<p>Demo pages was successfully installed!</p>";
        echo "</div>";
    }
endif;