

<div    clas="login-form">
    <div 

        class="ui form loginform" 
        name="loginform" 
        id="lost_password_form" 
        action="<?php // echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" 
        method="post">
        <div class="field">
            <h1 class="ui header primary-text text-center" style="margin:0px;">
                ลืมรหัสผ่าน?
                <div class="sub header">โปรดระบุอีเมลที่ต้องการรีเซ็ตรหัสผ่าน</div>
            </h1>
           
        </div>

     
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "Email",
		"name" => "log",
		"label" => "Email",
		"id" => "emailVal",
		"value" => "",
		"class"=>"input" 
	]); ?>
    <div id="email_format_error" class="ui pointing red basic label pointing-alert">
                        รูปแบบอีเมลผิดพลาด
                    </div>
        <div class="field mt-4">
            <div class='range-button  button-normal'>
                <input onmouseenter="onResetKeyDown(event)" onchange="onResetPasswordSubmit(event)" id="btn-slide-reset-password" type="range" name=""  value="0"   id="">
                <h5>สไลด์เพื่อยืนยัน</h5>
                <div class="rage-button_box">
                    <i class="bi bi-chevron-double-right"></i>
                </div>
            </div>
            
  <?php 
		get_template_part("components/error-message" , null , [
			"id" => "message_email_not_found",
			"text" => "ไม่เจอ อีเมลในระบบ"
		]); 
	?>
 
            <div class="button-loading">
						<div class="d-grid gap-2  ">
							<button

							class="btn btn-primary btn-block" type="button" disabled>
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</button>
						</div>
					</div>
            <!-- <button class="ui button submit primary fluid"></button> -->
        </div>
       

        
 
 
 
    </div>
      
    <?php  get_template_part("components/form-success" , null ,  [
		 "title" => "ตรวจสอบอีเมล",
		 "sub_title" => "ระบบทำการส่งลิงก์เพื่อใช้รีเซ็ตรหัสผ่าน <br />
         ไปทางอีเมลของคุณ",
		 "btn_title" => "ตกลง",
		 "id_form" => "lost_password_success",
		 "link" => get_site_url(). "/wp-login.php"
	]); ?>

</div>