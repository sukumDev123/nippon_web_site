  <?php 
// wp_logout();
 $phase = "1";
 if(isset($_GET['phase'])):
	$phase = $_GET['phase']; 
endif;

$user = [
	"first_name" => "",
	"last_name" => "",
	"ID" => "",
	"user_email" => ""
];
$found_posts = false;

if(is_user_logged_in()):
	
	$userId = get_current_user_id();
	$userObj = get_user_by("ID" , $userId); 
	// var_dump($user);
	$pieces = explode(" ", $userObj->data->display_name);
 
	$user["first_name"] = $pieces[0];
	if(isset($userObj->data->user_email)):
	$user["user_email"] = $userObj->data->user_email;
	endif;
	if(count($pieces) > 1):
	$user["last_name"] = $pieces[1];
	endif;
	$user["ID"] =  $userId;
	$found_posts = checkUserIsAddedUserData();



	
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

<style>
	<?php 
	if($found_posts  > 0):
?>
#sign_in_step1 , #sign_in_step2 {
			display: none;
		}
<?php

	endif;
	
	?>
 <?php if(!is_user_logged_in()): ?>
		#sign_in_step2 , #sign_in_step3 {
			display: none;
		}
	<?php else:
	?>
#nsl-custom-login-form-main {
	display: none !important;
}

<?php 
		if($found_posts == 0):
?>
#sign_in_step3 {
	display:none;
}

<?php  
		endif;
		?>
<?php endif; ?>
</style>

 
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
  <form 
	class="ui form signinForm " 

		class="mt-5"
		onsubmit="registerStep1(event)"
		name="loginform" 
        id="loginform" 
	method="post">
	<div class="field">
		
	 
	</div>

   
   
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "อีเมล",
		"name" => "log",
		"label" => "อีเมล",
		"id" => "emailVal",
		"value" => "",
		"class"=>"input" 
	]); ?>
    <div id="email_format_error" class="ui pointing red basic label pointing-alert">
                        รูปแบบอีเมลผิดพลาด
                    </div>
  
  
  <div class="required field">
		<label for="user_pass">รหัสผ่าน</label>
		 


			<div class="ui icon-password">
			<input 
				type="password" 
				name="pwd"
				id="pwd" 
				size="20"
				placeholder="รหัสผ่าน"
			/>

		            <i onclick="passwordEyeChanged('#pwd' , '.pwd-eye')"  class=" bi bi-eye password-eye pwd-eye  " ></i>

   		            </div>



			<div id="password_more_8_length"  class="ui pointing red basic label pointing-alert">
			ใช้อักขระ 8 ตัวขึ้นไปที่มีทั้งตัวอักษร ตัวเลข และสัญลักษณ์ผสมกัน
                </div>

  </div>
 
  <div class="required field">
		<label for="user_pass">ยืนยันรหัสผ่าน</label>
		

			<div class="ui icon-password">
			<input 
				type="password" 
				name="confirm_password"
				id="confirm_password" 
				size="20"
				placeholder="ยืนยันรหัสผ่าน"
			/>

		            <i onclick="passwordEyeChanged('#confirm_password' , '.confirm_pwd')"  class=" bi bi-eye password-eye confirm_pwd " ></i>

   		            </div>




			<div id="password_new_and_password_confirm"  class="ui pointing red basic label pointing-alert">
                    รหัสผ่านไม่ตรงกัน
                </div>

				<div id="password_confirm_more_8_length"  class="ui pointing red basic label pointing-alert">
                    รหัสผ่านต้องมีจำนวน 8 ตัวอักษรขึ้นไป
                </div>
		<h5 class="ui header" >
			<div class="sub header">ใช้อักขระ 8 ตัวขึ้นไปที่มีทั้งตัวอักษร ตัวเลข และสัญลักษณ์ผสมกัน</div>
		</h5>
	
  </div>
 
  <?php 
		get_template_part("components/error-message" , null , [
			"id" => "message_error_exists_user",
			"text" => "ผู้ใช้งานคนนี้มีอยู่ในระบบแล้ว"
		]); 
	?>
 
  <button 
  	class="ui button submit primary fluid button-normal" 
	  name="wp-submit" 
	id="wp-pass-signup" 
	onclick="registerStep1(event)"
	type="submit"><?php esc_attr_e( 'Register' ); ?></button>
	<div class="button-loading">
						<div class="d-grid gap-2  ">
							<button

							class="btn btn-primary btn-block" type="button" disabled>
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</button>
						</div>
					</div>
				
	
	
	<?php get_template_part("components/login-social-button") ?>



 
</form>		
  </div>
</div>
 

<?php endif; ?>


 
<div  id="sign_in_step2">
	<?php  if($found_posts == 0):  ?>
    <div 
	class="ui form loginform " 
      
        method="post">
        <div class="field">
            <h1 class="ui header primary-text text-center" style="margin:0px;">
                <?php _e("Register") ?>
                
            </h1>
            
        </div>

		<input type="hidden" id="userId" value="<?php echo $user["ID"] ?>">

		<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "อีเมล",
		"name" => "emailValConfirm",
		"label" => "อีเมล",
		"id" => "emailValConfirm",
		"value" =>  $user["user_email"],
		"class"=>"input" ,
		"emailDisabled"=> true 
	]); ?>

		
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "ชื่อ",
		"name" => "name",
		"label" => "ชื่อ",
		"id" => "name",
		"value" => $user["first_name"],
		"class"=>"input" 
	]); ?>
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "นามสกุล",
		"name" => "lastname",
		"label" => "นามสกุล",
		"id" => "lastname",
		"value" =>  $user["last_name"],
		"class"=>"input" 
	]); ?>


		<div class="field required">
			<label for="">วันเกิด</label>
			<div class="row">
				<div class="col-4">
					<div class="field required">
						<select name="date" id="date"></select>
					</div>
					
					
				</div>
				<div class="col-4">
					<div class="field required">
							<select name="month" id="month"></select>
						</div>
				</div>
				<div class="col-4">
				<div class="field required">
				
						<select name="year" id="year"></select>
					</div>
				</div>
			</div>
			<div id="date_format_error" class="ui pointing red basic label pointing-alert">
                    รูปแบบวันเกิดผิดพลาด
                </div>
		</div>
		
		<div class="field required">
            <label for="Test">เบอร์โทรศัพท์</label>

        	    <div class="ui labeled input">
                    <div class="ui label">
                    +66
                    </div>
                    <input type="text" id="phone_number" class="isPhone" placeholder="0999999999">
                    </div>
        </div>
		<div class="field required">
					<label for="">เลือกประเภทที่เป็นตัวคุณ</label>
						<select name="type_user" id="type_user">
							<option value="">เลือกประเภทที่เป็นตัวคุณ</option>
						<?php  
                                                $argc = [
                                                    "post_type" => "type_user" , 
                                                    "posts_per_page" => -1 , 
                                                    'order' => 'ASC',
                                                    'orderby' => 'ID'
                                                ];
                                                $queryTypeUser = new WP_Query($argc);
                                                if($queryTypeUser->have_posts()):
                                                    while($queryTypeUser->have_posts()): $queryTypeUser->the_post();
                                            ?>
                                           
                                                    <option value="<?php echo get_the_title() ?>"><?php echo get_the_title() ?></option>
                                            <?php 
                                            
                                                 endwhile;  endif;  wp_reset_query();
                                            
                                            ?>
						</select>
			  
				</div>
  
				<div class="field">
					<label for="">อื่น ๆ โปรดระบุ</label>
					<input name="other" id="other"></input>
			  
				</div>
			<div id="accept_field" class="field required">
				<div class="ui checkbox">
				<input type="checkbox" name="accept_email" id="accept_email" tabindex="0" >
				<label> ยอมรับจดหมายข่าวจากนิปปอนเพนต์ ผ่านทางอีเมล </label>
			</div>
        
			<div id="accept_field" class="field required">
				<div class="ui checkbox mt-2">
				<input type="checkbox" name="accept_pdpa" id="accept_pdpa" tabindex="0" >
				<label>ยอมรับข้อกำหนดและเงื่อนไขที่ระบุไว้ใน <a href="/">นโยบายคุ้มครองข้อมูลส่วนบุคคล</a> </label>
			</div>
        
			<?php 
		get_template_part("components/error-message" , null , [
			"id" => "message_error_exists_user_2",
			"text" => "ผู้ใช้งานคนนี้มีอยู่ในระบบแล้ว"
		]); 
	?>
 


        <div class="field mt-3">
			<button 
					class="ui button submit primary fluid button-normal" 
				
					id="wp-register" 
					type="submit"
					onclick="registerForm()"
					>ยืนยัน</button>


					<div class="button-loading">
						<div class="d-grid gap-2  ">
							<button

							class="btn btn-primary btn-block" type="button" disabled>
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</button>
						</div>
					</div>
				

					
        </div>
    
 



 
    </div>
</div>
</div>
<?php endif; ?>
</div>
 
   <div class="form-hide">
	   <form id="form-submit" action="wp-login.php?action=register" method="POST">
		   <input type="text" name="signInSuccess" value="true">
	   </form>
   </div>


<?php  
$redLatest = returnLatestUrl();
get_template_part("components/form-success" , null ,  [
		 "title" => "ลงทะเบียนสำเร็จ",
		 "sub_title" => "การลงทะเบียนสมบูรณ์ คุณสามารถใช้งานได้ทันที",
		 "btn_title" => "กลับสู่หน้าหลัก",
		 "id_form" => "sign_in_step3",
		 "link" => $redLatest 
	]); ?>
 
 