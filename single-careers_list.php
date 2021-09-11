<?php 
 
get_header();
get_template_part("other/loading");

 
$ip = getIPAddress();
 
$privacy_policy = getPrivacyPolicyPage();


?>

<div class="container page-mt">

   <div class="title-career-form">
    <h1 class="ui head center aligned container  primary-text">
            <?php echo get_the_title() ?>
        
        </h1>

        <div class="type-of-career">
            <h4>
            <?php get_template_part("components/icon" , null ,  ['icon' => "location-career"]) ?>  <?php echo get_field("location_career") ?>
            </h4>
            <h4>
            <?php get_template_part("components/icon" , null ,  ['icon' => "icon2"]) ?> <?php echo get_field("type_career") ?>
            </h4>
            <h4>
            <?php get_template_part("components/icon" , null ,  ['icon' => "icon-money-card"]) ?>  <?php echo get_field("role_career") ?>

            </h4>
        </div>
        <button onclick="goToForm()" id="btn-do-form">
            <i class="bi bi-file-earmark-text"></i>
            กรอกแบบฟอร์มสมัครงาน
        </button>
   </div>

<div class="margin-page"></div>
 

<div  class="ui mt-4 stackable grid  ">
  <div class="eight wide column content-career">
      <?php the_content() ?>
  </div>
  <div class="eight wide column form-career ">
     <!-- <div class=""> -->
         
        <h2 class="ui head center aligned container primary-text text-title">กรอกข้อมูลสมัครงาน</h2>
 
        <form class="ui form">
            <input  type="hidden" id="career_name" value="<?php echo get_the_title() ?>">
            <?php  get_template_part("components/input_exclamation" , null ,  [
                "placeholder" => "ชื่อจริง",
                "name" => "first_name",
                "label" => "ชื่อจริง",
                "id" => "first_name",
                "value" => "",
                "class"=>"input" 
            ]); ?>
        
            <?php  get_template_part("components/input_exclamation" , null ,  [
                "placeholder" => "นามสกุล",
                "name" => "last_name",
                "label" => "นามสกุล",
                "id" => "last_name",
                "value" => "",
                "class"=>"input" 
            ]); ?>
            <?php  get_template_part("components/input_exclamation" , null ,  [
                "placeholder" => "อีเมล",
                "name" => "emailVal",
                "label" => "อีเมล",
                "id" => "emailVal",
                "value" => "",
                "class"=>"input" 
            ]); ?>
            <?php  get_template_part("components/input_exclamation" , null ,  [
                "placeholder" => "เบอร์โทรศัพท์",
                "name" => "tel",
                "label" => "เบอร์โทรศัพท์",
                "id" => "tel",
                "value" => "",
                "class"=>"input isNumber isPhone" ,
                "errorId" => "phone_number_10_alert" ,
                "errorText" => "เบอร์โทรศัพท์ต้องมี 10 ตัวอักษร"
            ]); ?>
            <?php  get_template_part("components/input_exclamation" , null ,  [
                "placeholder" => "Portfolio Link",
                "name" => "portfolio_link",
                "label" => "Portfolio Link",
                "id" => "portfolio_link",
                "value" => "",
                "class"=>"input" ,
                "required" => false,
            ]); ?>


                <div id="resume_field" class="field required ">
                    <label for="resume">อัปโหลด Resume</label>
                    <input type="hidden" id="resume_value" >
                    <div class="resume_value_uploaded ">
                        <h5 class="ui header green" id="cover_latter_value">อัพโหลดสำเร็จ</h5>
                        <h5 class="ui header red" id="cover_latter_value">ขนาดไฟล์เกิน 1 mb</h5>
                        <h5 class="ui header red" id="cover_latter_value">pdf only</h5>

                    </div>
                    <div class="upload-btn-wrapper mt-2">
                        <div class=" btn">
                            <?php get_template_part("components/icon" , null ,  ['icon' => "clip"]) ?>
                            <span> เลือกไฟล์ (ขนาดไฟล์สูงสุด 1mb/pdf) </spen>
                            <input type="file" name="resume_upload" id="resume_upload" />
                        </div>
                    </div>
                    
                </div>
               

                <div id="transcript_field" class="field required ">
                    <label for="resume">อัปโหลด Transcript</label>
                    <input type="hidden" id="transcript_value" >
                    <div class="transcript_value_uploaded">
                        <h5 class="ui header green" id="cover_latter_value">อัพโหลดสำเร็จ</h5>
                        <h5 class="ui header red" id="cover_latter_value">ขนาดไฟล์เกิน 1 mb</h5>
                        <h5 class="ui header red" id="cover_latter_value">pdf only</h5>

                    </div>
                    <div class="upload-btn-wrapper mt-2">
                        <div class=" btn">
                            <?php get_template_part("components/icon" , null ,  ['icon' => "clip"]) ?>
                            <span> เลือกไฟล์ (ขนาดไฟล์สูงสุด 1mb/pdf) </spen>
                            <input type="file" name="transcript_upload" id="transcript_upload" />
                    </div>
                    </div>
                    
                </div>
             

                <div class="field ">
                    <label for="resume">Cover Letter</label>
                    <input type="hidden" id="cover_letter_value" >
                    <div class="cover_letter_uploaded">
                        <h5 class="ui header green" id="cover_latter_value">อัพโหลดสำเร็จ</h5>
                        <h5 class="ui header red" id="cover_latter_value">ขนาดไฟล์เกิน 1 mb</h5>
                        <h5 class="ui header red" id="cover_latter_value">pdf only</h5>


                    </div>
                    <div class="upload-btn-wrapper mt-2">
                        <div class=" btn">
                        <?php get_template_part("components/icon" , null ,  ['icon' => "clip"]) ?>
                        <span> เลือกไฟล์ (ขนาดไฟล์สูงสุด 1mb/pdf) </spen>
                        <input type="file" name="cover_letter_upload"  id="cover_letter_upload" />
                    </div>
                    </div>
                    
                </div>

            
        
            <div id="accept_field" class="field">
                <div class="ui checkbox">
                <input type="checkbox" name="accept" id="accept" tabindex="0" >
                <label>ยอมรับข้อกำหนดและเงื่อนไขที่ระบุไว้ใน <a href="<?php echo  $privacy_policy  ?>" target="_blank" >นโยบายคุ้มครองข้อมูลส่วนบุคคล</a> </label>
                </div>
            </div>
        



            <div class="reChapcha">
                <div class="g-recaptcha" data-sitekey="6LdjuzAcAAAAAEBGh0lefbwuyop5lH8LIUNuy8D-"></div>
                </div>

                
                <div class="width-error">
                    <div id="message_error_rechapch">
                    <?php 
                        get_template_part("components/error-message" , null , [
                            "id" => "message_error_rechapch_",
                            "text" => "I'm not a robot is required"
                        ]); 
                    ?>
                    </div>
                    
                    <div id="message_error_accept">
                    <?php 
                        get_template_part("components/error-message" , null , [
                            "id" => "message_error_accept_",
                            "text" => "กดยอมรับการเงื่อนไขก่อนส่งคำถาม"
                        ]); 
                    ?>
                    </div>
                    
                   
                </div>

                <input type="hidden" id="ip_user" value="<?php  echo $ip ?>">

                <div class="width-error">
                <?php 
                    get_template_part("components/error-message" , null , [
                        "id" => "required_resume_field",
                        "text" => "โปรดระบุบ Resume"
                    ]); 
                ?>
                            <?php 
                    get_template_part("components/error-message" , null , [
                        "id" => "required_transcript_field", 
                        "text" => "โปรดระบุบ Transcript"
                    ]); 
                ?>

                </div>
                


            <div class="field">
            <button 
                class="ui button button-normal submit primary fluid" 
                name="wp-submit"  
                id="career_send" 
                type="submit">สมัครงาน</button>
             
            </div>

            <div class="button-loading button-loading-form">
                            <div class="d-grid gap-2  ">
                                <button

                                class="btn btn-primary btn-block" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>
                        </div>



        </form>
 
     <!-- </div> -->
    
  </div>
 
</div>
</div>

 
   
<?php  get_template_part("components/popup-success" , null ,  [
		 "title" => "สำเร็จ",
		 "sub_title" => "ได้รับข้อมูลเรียบร้อยแล้ว กรุณารอการติดต่อกลับ",
		 
		 "id_form" => "sign_in_step3"
	]); ?>
<?php


get_footer();

?>
<script>
//     var onloadCallback = function () {
//     alert("grecaptcha is ready!");
//   };
   
</script>