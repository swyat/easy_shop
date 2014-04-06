<?php
/**
 * Template Name: Custom Registration Page
 */
require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;
//Check whether the user is already logged in
if (!$user_ID) {
    if($_POST){
        //We shall SQL escape all inputs
        $username = $wpdb->escape($_REQUEST['username']);
        if(empty($username)) {
            echo "<span class='error'>".__( "User name should not be empty.", ETHEME_DOMAIN )."</span>";
            exit();
        }
        $email = $wpdb->escape($_REQUEST['email']);
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
            echo "<span class='error'>".__( "Please enter a valid email.", ETHEME_DOMAIN )."</span>";
            exit();
        }
        $pass = $wpdb->escape($_REQUEST['pass']);
        $pass2 = $wpdb->escape($_REQUEST['pass2']);
        if(empty($pass) || strlen($pass) < 5) {
            echo "<span class='error'>".__( "Password should have more than 5 symbols", ETHEME_DOMAIN )."</span>";
            exit();
        }
        if($pass != $pass2) {
            echo "<span class='error'>".__( "The passwords do not match", ETHEME_DOMAIN )."</span>";
            exit();
        }
        
        $status = wp_create_user( $username, $pass, $email );
        if ( is_wp_error($status) )
            echo "<span class='error'>".__( "Username already exists. Please try another one.", ETHEME_DOMAIN )."</span>";
        else {
            $from = get_option('admin_email');
            $headers = 'From: '.$from . "\r\n";
            $subject = "Registration successful";
            $msg = "Registration successful.\nYour login details\nUsername: $username\nPassword: $random_password";
            wp_mail( $email, $subject, $msg, $headers );
            echo "<span class='success'>".__( "Please check your email for login details.", ETHEME_DOMAIN )."</span>";
        }
        exit();
    } else {
        get_header();
        ?>
        <section id="main" class="columns2-left">
            <div class="content">
                <div class="entry-content">
                    <?php
                    if(get_option('users_can_register')) {
                        ?>
                        <h1><?php the_title(); ?></h1>
                        <div id="result"></div> 
                        
                        <form id="wp_signup_form" action="" method="post" class="login">
                            <div class="login-fields">
                    			<p class="form-row form-row-first">
                                    <label><?php _e( "Username", ETHEME_DOMAIN ) ?> <span class="required">*</span></label>
                    				<input type="text" name="username" class="text" value="" />
                    			</p>
                    			<p class="form-row">
                                    <label><?php _e( "Email address", ETHEME_DOMAIN ) ?> <span class="required">*</span></label>
                    				<input type="text" name="email" class="text" value="" />
                    			</p>
                    			<p class="form-row">
                                    <label><?php _e( "Password", ETHEME_DOMAIN ) ?> <span class="required">*</span></label>
                    				<input type="password" name="pass" class="text" value="" />
                    			</p>
                    			<p class="form-row form-row-last">
                                    <label><?php _e( "Re-enter password", ETHEME_DOMAIN ) ?> <span class="required">*</span></label>
                    				<input type="password" name="pass2" class="text" value="" />
                    			</p>
                    			<div class="clear"></div>
                			</div>
                			<p class="form-row">
                				<button class="button fl-r submitbtn" type="submit"><span><?php _e( "Register", ETHEME_DOMAIN ) ?></span></button>
                                <div class="clear"></div>
                			</p>
                        </form>
                        <script type="text/javascript">
                            jQuery(".submitbtn").click(function() {
                                jQuery('#result').html('<img src="<?php bloginfo('template_url'); ?>/images/loading.gif" class="loader" />').fadeIn();
                                var input_data = jQuery('#wp_signup_form').serialize();
                                jQuery.ajax({
                                    type: "POST",
                                    url: "<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
                                    data: input_data,
                                    success: function(msg){
                                        jQuery('.loader').remove();
                                        jQuery('<div>').html(msg).appendTo('div#result').hide().fadeIn('slow');
                                    }
                                });
                                return false;
                            });
                        </script>
                        <?php
                    }
                    else _e( '<span class="error">Registration is currently disabled. Please try again later.<span>', ETHEME_DOMAIN );
                    ?>
                </div>
			</div><!-- #content -->
            <aside id="sidebar">
                <?php get_sidebar(); ?>
            </aside>
            <div class="clear"></div>
		</section><!-- #container -->
        <?php
        get_footer();
    } //end of if($_post)
}
else {
    echo "<script type='text/javascript'>window.location='". home_url() ."'</script>";
}
?>