

<div  id="sign_in_step2" clas="login-form">
    <form 
        class="ui form loginform" 
        name="loginform" 
        id="loginform" 
        action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" 
        method="post">
        <div class="field">
            <h1 class="ui header primary-text" style="margin:0px;">
                ลืมรหัสผ่าน?
                
            </h1>
            <h5 class="ui header centered" style="margin:0px;">
                <div class="sub header">โปรดระบุอีเมลที่ต้องการรีเซ็ตรหัสผ่าน</div>
            </h5>
        </div>

        <div class="required field ">
            <label for="user_login"><?php _e( 'Email' ); ?></label>
            <input 
                type="email" 
                placeholder="<?php  _e( 'Email' ); ?>" 
                name="email" 
       
                />
        </div>
       
         
 
 
 
    </form>
</div>