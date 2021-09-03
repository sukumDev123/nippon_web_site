<?php 

$user_login = $args['user_login'];
$aria_describedby_error = $args['aria_describedby_error'];
$errors =  $args["errors"];
 
?>
 
 <form 
	class="ui equal form loginform" 
	name="loginform" 
	id="loginform" 
	action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" 
	method="post">
	<div class="field">
		<?php 
		
		
	 
			if(count($errors->errors) && !isset($_GET["logged"]) && !isset($_GET["loggedout"])):
			 ?>
					<h5 class="error-text">ไม่พบผู้ใช้งาน</h5>
				<?php 

			endif;
		 
		
		?>
	</div>
	<div class="field">
		<h2 class="ui header centered  primary-text">
			<?php _e("Log In") ?>
			<div class="sub header">	สมาชิกใหม่?  <a class="primary-text" href="wp-login.php?action=register" > ลงทะเบียนฟรี </a></div>
		</h2>
	
	</div>


	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "อีเมล",
		"name" => "log",
		"label" => "อีเมล",
		"id" => "user_login",
		"value" => esc_attr( $user_login ),
		"class"=>"input" 
	]); ?>
  
  
  <div class="field required">
  	<label for="user_pass"><?php _e( 'Password' ); ?></label>
	  <div class="ui icon-password">
		<input 
			type="password" 
			name="pwd" 
			id="pwd_user_pass" <?php echo $aria_describedby_error; ?>  
			placeholder="<?php  _e( 'Password' ); ?>" 
			size="20"
		/>    
		<i onclick="passwordEyeChanged('#pwd_user_pass' , '.password-eye')"  class=" bi bi-eye password-eye   " ></i>

   		</div>
  </div>
 
 <div class="filed">
 <a class="primary-text remember-link" href="<?php echo esc_url( wp_lostpassword_url() ); ?>">ลืมรหัสผ่าน?</a>
 <button 
  	class="ui button submit primary fluid button-sign" 
	name="wp-submit" 
	id="wp-submit" 
	type="submit"><?php esc_attr_e( 'Log In' ); ?></button>
  
 </div>
 

<?php get_template_part("components/login-social-button") ?>



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