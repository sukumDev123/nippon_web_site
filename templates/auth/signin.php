<?php 

$user_login = $args['user_login'];
$aria_describedby_error = $args['aria_describedby_error'];
		
?>
 
 <form 
	class="ui equal form loginform" 
	name="loginform" 
	id="loginform" 
	action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" 
	method="post">
	<div class="field">
		<h1 class="ui header primary-text">
			<?php _e("Log In") ?>
		</h1>
		สมาชิกใหม่?  <a class="primary-text" href="wp-login.php?action=register" > <?php echo _e("Register") ?> </a>
	</div>

  <div class="field ">
  	<label for="user_login"><?php _e( 'Username or Email Address' ); ?></label>
	  <input 
	  	type="text" 
		  placeholder="<?php  _e( 'Username' ); ?>" 
		  name="log" 
		  id="user_login"<?php echo $aria_describedby_error; ?> 
		  class="input" 
		  value="<?php echo esc_attr( $user_login ); ?>" 
		  size="20" 
		  autocapitalize="off" />
  </div>
  
  <div class="field">
  	<label for="user_pass"><?php _e( 'Password' ); ?></label>
   <div class="ui icon input">
   <input 
        type="password" 
        name="pwd" 
        id="pwd user_pass"<?php echo $aria_describedby_error; ?>  
        placeholder="<?php  _e( 'Password' ); ?>" 
        size="20"
         />

 <i id="togglePassword" class="eye icon"></i>

   </div>
	
    
  </div>
 
 <div class="field">
 <a class="primary-text" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?' ); ?></a>
 </div>

  <button 
  	class="ui button submit primary fluid" 
	name="wp-submit" 
	id="wp-submit" 
	type="submit"><?php esc_attr_e( 'Log In' ); ?></button>
  
</form>		