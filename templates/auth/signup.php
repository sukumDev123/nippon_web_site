<!-- <form 
    name="registerform" 
    id="registerform" 
    action="<?php echo esc_url( site_url( 'wp-login.php?action=register', 'login_post' ) ); ?>" 
    method="post" 
    novalidate="novalidate"
    >
			<p>
				<label for="user_login"><?php _e( 'Username' ); ?></label>
				<input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr( wp_unslash( $user_login ) ); ?>" size="20" autocapitalize="off" />
			</p>
			<p>
				<label for="user_email"><?php _e( 'Email' ); ?></label>
				<input type="email" name="user_email" id="user_email" class="input" value="<?php echo esc_attr( wp_unslash( $user_email ) ); ?>" size="25" />
			</p>
			 
			<p id="reg_passmail">
				<?php _e( 'Registration confirmation will be emailed to you.' ); ?>
			</p>
			<br class="clear" />
			<input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Register' ); ?>" />
			</p>
</form> -->

<div class="ui grid segment" id="sign_in_step1">
	<div class="ten wide column">
		<h3 class="primary-text">สิทธิพิเศษสำหรับสมาชิก</h3>
		<p class="mb-3">บทความแนะนำธุรกิจน่าลงทุน เหมาะสำหรับ ธุรกิจที่ต้องการหาตัวแทนจำหน่าย ขยายสาขา 
	หาผู้ซื้อแฟรนไชส์ บทความทางทีมงานนิปปอนเพนต์ เป็นผู้เขียนขึ้นมาให้เหมาะสมกับประเภทการใช้งาน
	ของท่าน</p>
		<h3>สิ่งที่สมาชิกจะได้รับ</h3>
		<ol class="ui list">
			<li>ได้รับสิทธิ์ในการดาวน์โหลดโปรแกรมจากเมนู Colour Library</li>
			<li>สามารถเลือกเก็บผลิตภัณฑ์ และเนื้อหาที่น่าสนใจไว้ดูภายหลังได้</li>
			
			<li>รับคูปองส่วนลดพิเศษในการเลือกซื้อผลิตภัณฑ์จากนิปปอนเพนต์</li>
		</ol>
	</div>
  <div class="six wide column">
  <form 
	class="ui form loginform " 
	name="loginform" 
	id="loginform" 
	action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" 
	method="post">
	<div class="field">
		<h1 class="ui header primary-text" style="margin:0px;">
			<?php _e("Register") ?>
			
		</h1>
		<h5 class="ui header centered" style="margin:0px;">
			<div class="sub header">เข้าสู่ระบบเพื่อใช้บริการพิเศษจากนิปปอนเพนต์</div>
		</h5>
	</div>

  <div class="required field ">
  	<label for="user_login"><?php _e( 'Username or Email Address' ); ?></label>
	  <input 
	  	type="text" 
		  placeholder="<?php  _e( 'Username' ); ?>" 
		  name="log" 
		  class="input" 
		  size="20" 
		  autocapitalize="off" />
  </div>
  
  <div class="required field">
  	<label for="user_pass"><?php _e( 'Password' ); ?></label>
   	<div class="ui icon input">
   		<input 
        	type="password" 
        	name="pwd" 
        	size="20"
         />
 		<i id="togglePassword" class="eye icon"></i>

   </div>
  </div>
  <div class="required field">
  	<label for="user_pass">ยืนยันรหัสผ่าน</label>
   	<div class="ui icon input">
   		<input 
        	type="password" 
        	name="pwd" 
        	size="20"
         />
 		<i id="togglePassword" class="eye icon"></i>
   </div>
	 
	<h5 class="ui header" style="margin:0px;">
			<div class="sub header">ใช้อักขระ 8 ตัวขึ้นไปที่มีทั้งตัวอักษร ตัวเลข และสัญลักษณ์ผสมกัน</div>
		</h5>
  </div>
 
 
  <button 
  	class="ui button submit primary fluid" 
	name="wp-submit" 
	id="wp-submit" 
	type="submit"><?php esc_attr_e( 'Register' ); ?></button>
  
</form>		
  </div>
</div>





<div  id="sign_in_step2">
    <form 
        class="ui form loginform" 
        name="loginform" 
        id="loginform" 
        action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" 
        method="post">
        <div class="field">
            <h1 class="ui header primary-text" style="margin:0px;">
                <?php _e("Register") ?>
                
            </h1>
            
        </div>

        <div class="required field ">
            <label for="user_login"><?php _e( 'Name' ); ?></label>
            <input 
                type="text" 
                placeholder="<?php  _e( 'Name' ); ?>" 
                name="log" 
                class="input" 
                size="20" 
                autocapitalize="off"
                />
        </div>
        
        <div class="required field">
            <label for="user_pass">นามสกุล</label>
            <input 
                type="text" 
                placeholder="นามสกุล" 
                name="log" 
                class="input" 
                size="20" 
                autocapitalize="off"
                />
        </div>
        <div class="field">
            <button 
                class="ui button submit primary fluid" 
                name="wp-submit" 
                id="wp-submit" 
                type="submit">ยืนยัน</button>
        </div>
    
 
 
 
    </form>
</div>