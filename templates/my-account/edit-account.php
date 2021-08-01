<?php 
$user = $args["user"];
?>
 
 <div class="edit-account-div">
     
 

    <div class="ui equal width form">
        <div class="fields">
            <div class="field">
                <label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />  

            </div>
            <div class="field">
                <label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
            </div>
        </div>
        <div class="fields">
            <div class="field">
                <label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />  

            </div>
            <div class="field">
                <label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
            </div>
        </div>
        <div class="fields">
            <!-- <div class="field">
                <label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />  

            </div>
            <div class="field">
                <label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
            </div> -->
        </div>
        <div class="field">
            <button 
            class="ui button submit primary fluid" 
            name="wp-submit" 
            id="wp-submit" 
            type="submit"><?php esc_attr_e( 'Save' ); ?></button>
        </div>
    </div>



    <div class="border mt-5 mb-5"></div>

    <form class="ui form">
        <div class="field">
            <h1 class="ui header primary-text">
                <?php esc_html_e( 'Password change', 'woocommerce' ); ?>

            
    
            </h1>
        </div>

        <div class="field">
            <label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
        </div>
        <div class="field">
            <label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
        </div>
        <div class="field">
            <label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
        </div>
        <div class="field">
        
                <button 
                class="ui button submit primary fluid" 
                name="wp-submit" 
                id="wp-submit" 
                type="submit"><?php esc_attr_e( 'Save' ); ?></button>
        
        </div>
    </form>
    
 </div>