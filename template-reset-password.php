<?php   /** Template Name: Reset Password */

if(!isset($_GET['token']) || !isset($_GET['user_login'])):
    wp_redirect(get_site_url() );
    exit;
endif;

?>
 <?php get_header();
 
 
//  $checkedToken = check_password_reset_key("NtK4jri8Ndmfd2HQMQ7E",  "nilpech.sukhum@gmail.com" );
 
 ?>
<?php 
 
$errors = new WP_Error();
$user = check_password_reset_key($_GET['token'],$_GET['user_login']);


?>
     <div  class="reset-password">
        <div class="container">
        
        <?php 
        
        
        if ( is_wp_error( $user ) ) {
            if ( $user->get_error_code() === 'expired_key' ){
                ?>
  <div class="reset-password-body">
                    <h1 class="text-center">Key is Expired</h1>
            </div>

    <?php 
            }
            else {
                ?>
                 <div class="reset-password-body">
                    <h1 class="text-center">Key is not valid</h1>
            </div>
                <?php 
            }
                // echo "Key is not valid";
        } else {
            ?>


            <div id="reset_password_form" class="reset-password-body ui form">
                <h1 class="ui header text-center primary-text">ตั้งรหัสผ่านใหม่</h1>
                <input type="hidden" id="emailVal" value="<?php echo $_GET['user_login'] ?>">
                <div class="field required">
                    <label for="">รหัสผ่านใหม่</label>
                    <input type="password" id="password_1">
                    <div id="password_more_8_length"  class="ui pointing red basic label pointing-alert">
                        รหัสผ่านต้องมีจำนวน 8 ตัวอักษรขึ้นไป
                    </div>

                </div>
                <div class="field required">
                    <label for="">ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" id="password_2">
                    <div id="password_new_and_password_confirm"  class="ui pointing red basic label pointing-alert">
                        รหัสผ่านไม่ตรงกัน
                    </div>
                    <h5 class="ui header" >
                        <div class="sub header">ใช้อักขระ 8 ตัวขึ้นไปที่มีทั้งตัวอักษร ตัวเลข และสัญลักษณ์ผสมกัน</div>
                    </h5>
                </div>

                <div class="field mt-4">
                <button 
                    class="ui button submit primary fluid button-normal" 
                    name="wp-pass-signup" 
                    id="reset_password_button" 
                    onclick="resetPassword(event)"
                    type="submit">ยืนยัน</button>
                </div>
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
<?php 
        }
        
        ?>
        
        <?php  get_template_part("components/form-success" , null ,  [
		 "title" => "ตั้งรหัสผ่านสำเร็จ",
		 "sub_title" => "กรุณาใช้รหัสผ่านใหม่เข้าสู่ระบบอีกครั้งเพื่อใช้งาน",
		 "btn_title" => "เข้าสู่ระบบ",
		 "id_form" => "reset_password_success",
		 "link" => get_site_url(). "/wp-login.php"
	]); ?>

        
         </div>
     </div>

     


 <?php get_footer() ?>