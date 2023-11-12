<?php
/**
** Spider_Mag User Registration and Login view
**/
?>
<div id="create-account" class="white-popup mfp-with-anim mfp-hide">    
    <form method="post" action="<?php echo esc_url(home_url('wp-login.php?action=register', 'login_post') ) ?>" class="wp-user-form">
        <h3><?php esc_html_e('Create Account','spidermag'); ?></h3>
        <hr>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="<?php esc_attr_e('First Name','spidermag'); ?>" tabindex="1">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="<?php esc_attr_e('Last Name','spidermag'); ?>" tabindex="2">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="user_login" id="display_name" class="form-control" placeholder="<?php esc_attr_e('Display Name','spidermag'); ?>" tabindex="3">
        </div>
        <div class="form-group">
            <input type="email" name="user_email" id="email" class="form-control " placeholder="<?php esc_attr_e('Email Address','spidermag'); ?>" tabindex="4">
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control " placeholder="<?php esc_attr_e('Password','spidermag'); ?>" tabindex="5">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="<?php esc_attr_e('Confirm Password','spidermag'); ?>" tabindex="6">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-16">
                <input type="submit" value="<?php esc_attr_e('Register', 'spidermag'); ?>" class="btn btn-danger btn-block btn-lg" tabindex="7">
            </div>
        </div>
    </form>
</div><!-- create-account -->

<div id="log-in" class="white-popup mfp-with-anim mfp-hide">
    <form role="form" method="post" action="<?php  echo esc_url( home_url() ) ?>/wp-login.php">
        <h3><?php esc_html_e('Log In Your Account','spidermag'); ?></h3>
        <hr>        
        <div class="form-group">
            <input type="text" name="log" id="access_name" class="form-control" placeholder="<?php esc_attr_e('UserName','spidermag'); ?>" tabindex="3">
        </div>
        <div class="form-group">
            <input type="password" name="pwd" id="password-2" class="form-control " placeholder="<?php esc_attr_e('Password','spidermag'); ?>" tabindex="4">
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-16">
                <input type="submit" value="<?php esc_attr_e('Log In', 'spidermag'); ?>" class="btn btn-danger btn-block btn-lg" tabindex="7">
            </div>
        </div>
    </form>
</div><!-- .log-in -->