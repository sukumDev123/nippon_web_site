 <?php 
 $phase = "1";
 if(isset($_GET['phase'])):
	$phase = $_GET['phase']; 
endif;
 $query = new WP_Query([
	 "post_type" => "post",
	 'meta_query' => array(
		array(
			'key' => 'page_name',
			'value' => 'register-post'
			)
	)
 ]);
 
 
 ?>

 <?php if(!is_user_logged_in()): ?>
<div class="ui stackable row grid segment " id="sign_in_step1">
	<div class="ten wide column form-content">
		<?php
		
		if( $query->have_posts()):
			while($query->have_posts()):
				$query->the_post();
				the_content();
			endwhile;
		endif;
		?>
		
		 
	</div>
  <div class="six wide column  form-content">
  <h2 class="ui header centered primary-text" style="margin:0px;">
			<?php _e("Register") ?>
			<div class="sub header">เข้าสู่ระบบเพื่อใช้บริการพิเศษจากนิปปอนเพนต์</div>
			
		</h2>
  <div 
	class="ui form signinForm " 
	name="signinForm" 
	id="signinForm" 
		class="mt-5"
	method="post">
	<div class="field">
		
	 
	</div>

   
   
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "Email",
		"name" => "log",
		"label" => "Email",
		"id" => "emailVal",
		"value" => "",
		"class"=>"input" 
	]); ?>
  
  
  
  <div class="required field">
		<label for="user_pass"><?php _e( 'Password' ); ?></label>
		<div class="ui icon input">
			<input 
				type="password" 
				name="pwd"
				id="pwd" 
				size="20"
				placeholder="Password"
			/>
			<i id="togglePassword" class="eye icon"></i>

		</div>
  </div>
 
  <div class="required field">
		<label for="user_pass"><?php _e( 'Password' ); ?></label>
		<div class="ui icon input">
			<input 
				type="password" 
				name="confirm_password"
				id="confirm_password" 
				size="20"
				placeholder="Confirm Password"
			/>
			<i id="togglePassword" class="eye icon"></i>
		</div>
		<h5 class="ui header" >
			<div class="sub header">ใช้อักขระ 8 ตัวขึ้นไปที่มีทั้งตัวอักษร ตัวเลข และสัญลักษณ์ผสมกัน</div>
		</h5>
  </div>
 
 
 
  <button 
  	class="ui button submit primary fluid" 
	name="wp-pass-signup" 
	id="wp-pass-signup" 
	onclick="registerForm()"
	type="submit"><?php esc_attr_e( 'Register' ); ?></button>
  
</div>		
  </div>
</div>
<?php endif; ?>


<?php 
    $found_posts = checkUserIsAddedUserData();

?>
<?php  if($found_posts == 0):  ?>
<div  id="sign_in_step2">
    <form 
	class="ui form loginform " 
        name="loginform" 
        id="loginform" 
       
        method="post">
        <div class="field">
            <h1 class="ui header primary-text" style="margin:0px;">
                <?php _e("Register") ?>
                
            </h1>
            
        </div>


		
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "ชื่อ",
		"name" => "name",
		"label" => "ชื่อ",
		"id" => "name",
		"value" => "",
		"class"=>"input" 
	]); ?>
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "นามสกุล",
		"name" => "lastname",
		"label" => "นามสกุล",
		"id" => "lastname",
		"value" => "",
		"class"=>"input" 
	]); ?>

<div class="field required tel-form">
	<label for="Tel">เบอร์โทรศัพท์</label>
	<div class="ui left icon input">
	<input type="text" placeholder="Search...">
 
	<i class="icon">+66</i>
	</div>
</div>

 
  <div class="field required">
      <label>เลือกประเภทที่เป็นตัวคุณ</label>


	  <div class="ui selection dropdown">
 
		<!-- <i class="dropdown icon"></i> -->
		<select class="menu">
			<option  class="item" value="">Gender</option>
			<option  class="item" value="1">Male</option>
			<option  class="item" value="0">Female</option>
			<div class="default text">Gender</div> 

		</select>
</div>
 
  </div>
  <div class="field required">
    <select class="menu">
      <option  class="item" value="">Gender</option>
      <option  class="item" value="1">Male</option>
      <option  class="item" value="0">Female</option>
    </select>
  </div>

        
        <div class="field">
        <button 
                class="ui button submit primary fluid" 
                name="wp-submit" 
                id="wp-register" 
                type="submit"
				
				>ยืนยัน</button>
        </div>
    
 
 
 
    </form>
</div>
 
<?php endif; ?>
   


<?php  get_template_part("components/form-success" , null ,  [
		 "title" => "ลงทะเบียนสำเร็จ",
		 "sub_title" => "การลงทะเบียนสมบูรณ์ คุณสามารถใช้งานได้ทันที",
		 "btn_title" => "กลับสู่หน้าหลัก",
		 "id_form" => "sign_in_step3"
	]); ?>
 