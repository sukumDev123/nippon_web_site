 <?php 
 
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
  <form 
	class="ui form loginform " 
	name="loginform" 
	id="loginform" 
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
  	<label for="user_pass">ยืนยันรหัสผ่าน</label>
   	<div class="ui icon input">
   		<input 
        	type="password" 
        	name="pwd"
			id="pwd_confirm" 
			placeholder="Confirm Password"
        	size="20"
         />
 		<!-- <i id="togglePassword" class="eye icon"></i> -->
   </div>
	 
	<h5 class="ui header" style="margin:0px;">
			<div class="sub header">ใช้อักขระ 8 ตัวขึ้นไปที่มีทั้งตัวอักษร ตัวเลข และสัญลักษณ์ผสมกัน</div>
		</h5>
  </div>
 
 
  <button 
  	class="ui button submit primary fluid" 
	name="wp-pass-signup" 
	id="wp-pass-signup" 

	type="submit"><?php esc_attr_e( 'Register' ); ?></button>
  
</form>		
  </div>
</div>





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
<div class="ui selection dropdown_type_user dropdown">
    <input type="hidden" name="gender">
    <i class="dropdown icon"></i>
    <div class="default text">Select Gender</div>
    <div class="menu">
        <div class="item" data-value="0">Male</div>
        <div class="item" data-value="1">Female</div>
        <div class="item" data-value="2">Other</div>
    </div>


	
</div>
<!-- <div class="ui form"> -->

<!-- </div> -->
   
<?php  get_template_part("components/form-success" , null ,  [
		 "title" => "ลงทะเบียนสำเร็จ",
		 "sub_title" => "การลงทะเบียนสมบูรณ์ คุณสามารถใช้งานได้ทันที",
		 "btn_title" => "กลับสู่หน้าหลัก",
		 "id_form" => "sign_in_step3"
	]); ?>

<div class="ui fluid search selection dropdown">
  	<input type="hidden" name="country">
  	<div class="default text">Select Country</div>
		<i class="dropdown icon"></i>
		<div class="menu">
		<div class="item" data-value="af"><i class="af flag"></i>Afghanistan</div>
		<div class="item" data-value="ax"><i class="ax flag"></i>Aland Islands</div>
		<div class="item" data-value="al"><i class="al flag"></i>Albania</div>
		<div class="item" data-value="dz"><i class="dz flag"></i>Algeria</div>
		<div class="item" data-value="as"><i class="as flag"></i>American Samoa</div>
		<div class="item" data-value="ad"><i class="ad flag"></i>Andorra</div>
		<div class="item" data-value="ao"><i class="ao flag"></i>Angola</div>
	</div>
</div>