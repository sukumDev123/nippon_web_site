<?php 
$user = $args["user"];
$query = new WP_Query([
    "post_type" => "user_custom_field",
    "meta_query" => [
        [
            "key" => "user_id",
            "value"  => get_current_user_id() ,
            "compare" => "LIKE"
        ],
    ]
    ]);
    $user = [
        "first_name" =>"",
        "last_name" => "",
        "email" => "",
        "type_of_user" => "",
        "phone_number" => "",
        "birthday" => "",
        "postId" => "",
        "userId" =>  get_current_user_id() 
    ];

    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();
            $user = [
                "first_name" => get_field("first_name"),
                "last_name" => get_field("last_name"),
                "email" => get_field("email"),
                "type_of_user" => get_field("type_of_user"),
                "phone_number" => get_field("phone_number"),
                "birthday" => get_field("birthday"),
                "postId" => get_the_ID(),
                "userId" =>  get_current_user_id() 
            ];
        endwhile;
    endif; wp_reset_query();
 
?>
  <script>

setTimeout(() => {
  onLoadDate('<?php echo $user['birthday'] ?>');
    
}, 100);
 </script>
 <div class="edit-account-div">
     
 

    <form onsubmit="editProfileInfo(event)" class="ui equal width form edit-account-form">
    <div class="field">
            <h3 class="ui header" style="margin:0px;">
            ข้อมูลส่วนตัว
            </h3>
            
        </div>
        <!-- <div class="filed required">
            input 
        </div> -->
        <input type="hidden" id="userId" value="<?php echo  $user['userId'] ?>">
        <input type="hidden" id="postId" value="<?php echo  $user['postId'] ?>">
        <div class="fields">
             	
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "ชื่อ",
		"name" => "name",
		"label" => "ชื่อ",
		"id" => "name",
		"value" => $user['first_name'],
		"class"=>"input" 
	]); ?>
	<?php  get_template_part("components/input_exclamation" , null ,  [
		"placeholder" => "นามสกุล",
		"name" => "lastname",
		"label" => "นามสกุล",
		"id" => "lastname",
		"value" => $user['last_name'],
		"class"=>"input" 
	]); ?>


        </div>
        <div class="fields">
            <?php  
        //     get_template_part("components/input_exclamation" , null ,  [
        //     "placeholder" => "อีเมล",
        //     "name" => "emailVal",
        //     "label" => "อีเมล",
        //     "id" => "emailVal",
        //     "value" =>  $user['email'],
        //     "class"=>"input" 
        // ]); 
        ?>
            <div class="field required">
                <label for="emailVal">อีเมล</label>

                <div class="ui icon input">
                    <input 
                            type="text" 
                            placeholder="อีเมล" 
                            value="<?php echo $user['email'] ?>"
                            id="emailVal"
                    
                            
                    />
                            <i  class="exclamation circle icon"></i>
                    <div id="email_format_error" class="ui pointing red basic label pointing-alert">
                        รูปแบบอีเมลผิดพลาด
                    </div>
                </div>
              

            </div>
            <div class="field required">
                <label for="Test">เบอร์โทรศัพท์</label>

                    <div class="ui labeled input">
                        <div class="ui label">
                        +66
                        </div>
                        <input type="text" id="phone_number" class="isPhone" value='<?php echo  $user['phone_number'] ?>' placeholder="0999999999">
                    </div>
                    <div id="phone_number_10_alert" class="ui pointing red basic label pointing-alert">
                        เบอร์โทรศัพท์ต้องมี 10 ตัวอักษรขึ้นไป
                    </div>
            </div>
        </div>
        <div class="fields">
            <div class="field required">
                <label for="">วันเกิด</label>
                <div class="row">
                    <div class="col-4">
                        <div class="field required">
                            <select value="20" name="date" id="date"></select>
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
					<label for="">ประเภทผู้ใช้งาน</label>
						<select  class="ui dropdown" name="type_user" id="type_user">
							<option value="">ประเภทผู้ใช้งาน</option>
						<?php  
                                                $argc = [
                                                    "post_type" => "type_user" , 
                                                    "posts_per_page" => -1 , 
                                                    'order' => 'ASC',
                                                    'orderby' => 'ID'
                                                ];
                                                $queryTypeUser = new WP_Query($argc);
                                                $selected  = "";
                                                if($queryTypeUser->have_posts()):
                                                    while($queryTypeUser->have_posts()): $queryTypeUser->the_post();
                                                    if(get_the_title() == $user['type_of_user'] ):
                                                        $selected = "selected";
                                                    endif;
                                            ?>
                                           
                                                    <option <?php echo  $selected ?>  value="<?php echo get_the_title() ?>"><?php echo get_the_title() ?></option>
                                            <?php 
                                            
                                                 endwhile;  endif;  wp_reset_query();
                                            
                                            ?>
						</select>
			  
			</div>



        </div>
        <div class="field mt-5">
            <button 
            class="ui button submit primary fluid button-normal" 
            name="wp-submit" 
            id="wp-submit" 
            onclick="editProfileInfo(event)"
            type="submit"
            ><?php esc_attr_e( 'Save' ); ?></button>

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
    </form>



    <div class="border mt-5 mb-5"></div>

    <form  onsubmit="resetPassword(event)" class="ui equal width form reset-password-form">
        <div class="field">
            <h3 class="ui header  ">
                <?php esc_html_e( 'Password change', 'woocommerce' ); ?>

            
    
            </h3>
        </div>

        <input type="hidden" id="userId" value="<?php echo $user["userId"] ?>">
       <div class="fields">
        <div class="field required old-password-div">
                <label for="password_current">รหัสผ่านปัจจุบัน</label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_old" autocomplete="off" />
                <div id="password_not_match_old"  class="ui pointing red basic label pointing-alert">
                    รหัสผ่านไม่ตรงกับรหัสผ่านเก่า
                </div>
            </div>
           
       </div>
      <div class="fields">
        <div class="field required">
                    <label for="password_1">รหัสผ่านใหม่</label>
                    <input type="password"  class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
                    <h5 class="ui header" >
			<div class="sub header">ใช้อักขระ 8 ตัวขึ้นไปที่มีทั้งตัวอักษร ตัวเลข และสัญลักษณ์ผสมกัน</div>
		</h5>
                </div>
                
            <div class="field required">
                <label for="password_2">ยืนยันรหัสผ่านใหม่</label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
                <div id="password_new_and_password_confirm"  class="ui pointing red basic label pointing-alert">
                    รหัสผ่านไม่ตรงกัน
                </div>
            </div>
      </div>
        <div class="field mt-4">
        
                <button 
                class="ui button submit primary fluid button-normal" 
                name="wp-submit" 
                id="wp-submit" 
                onclick="resetPassword(event)"
                type="submit"><?php esc_attr_e( 'Save' ); ?></button>
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
    </form>
    
 </div>
