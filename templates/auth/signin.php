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
		<h2 class="ui header centered  primary-text">
			<?php _e("Log In") ?>
			<div class="sub header">	สมาชิกใหม่?  <a class="primary-text" href="wp-login.php?action=register" > <?php echo _e("Register") ?> </a></div>
		</h2>
	
	</div>


	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "Email",
		"name" => "log",
		"label" => "Email",
		"id" => "user_login",
		"value" => esc_attr( $user_login ),
		"class"=>"input" 
	]); ?>
  
  
  <div class="field required">
  	<label for="user_pass"><?php _e( 'Password' ); ?></label>
  
		<input 
				type="password" 
				name="pwd" 
				id="pwd_user_pass" <?php echo $aria_describedby_error; ?>  
				placeholder="<?php  _e( 'Password' ); ?>" 
				size="20"
				/>


	 

    
	
    
  </div>
 
 <div class="field required">
 <a class="primary-text" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?' ); ?></a>
 </div>

  <button 
  	class="ui button submit primary fluid" 
	name="wp-submit" 
	id="wp-submit" 
	type="submit"><?php esc_attr_e( 'Log In' ); ?></button>
  
</form>		
<!-- 

<div class="ui equal width form">
  <div class="fields">
    <div class="field">
      <label>Username</label>
      <input type="text" placeholder="Username">
    </div>
    <div class="field">
      <label>Password</label>
      <input type="password">
    </div>
  </div>
  <div class="fields">
    <div class="field">
      <label>First name</label>
      <input type="text" placeholder="First Name">
    </div>
    <div class="field">
      <label>Middle name</label>
      <input type="text" placeholder="Middle Name">
    </div>
    <div class="field">
      <label>Last name</label>
      <input type="text" placeholder="Last Name">
    </div>
  </div>
</div> -->