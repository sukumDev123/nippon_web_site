<div class="ui stackable grid  faq-form">
    <div class="four wide column">
       <h3 class="ui header">มีคำถามเพิ่มเติม</h3>
       <p>สามารถถามคำถามไว้ผ่านแบบฟอร์มนี้ <br />
        โดยจะมีการติดต่อกลับทางอีเมลที่กรอกไว้</p>
    </div>

    <div class="ten wide column">
            <div class="ui form">
                <div class="two  fields">
             
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
                </div>
                <div class="two  fields">
                    
                    <?php  get_template_part("components/input_exclamation" , null ,  [
                        "placeholder" => "อีเมล",
                        "name" => "email",
                        "label" => "อีเมล",
                        "id" => "emailVal",
                        "value" => "",
                        "class"=>"input" 
                    ]); ?>
                    
                   

                    <?php /* get_template_part("components/input_exclamation" , null ,  [
                        "placeholder" => "เบอร์โทรศัพท์",
                        "name" => "tel",
                        "label" => "เบอร์โทรศัพท์",
                        "id" => "tel",
                        "value" => "",
                        "class"=>"input isNumber" 
                    ]); */?>
                    <div class="field required">
                    <label for="Test">เบอร์โทรศัพท์</label>

                    <div class="ui labeled input">
                    <div class="ui label">
                    +66
                    </div>
                    <input type="text" id="tel" class="isPhone" placeholder="0999999999">
                    </div>
                    </div>
                </div>
                <?php  /* get_template_part("components/input_exclamation" , null ,  [
                        "placeholder" => "",
                        "name" => "detail",
                        "label" => "เบอร์โทรศัพท์",
                        "id" => "detail",
                        "value" => "",
                        "class"=>"input textarea_input" 
                    ]); */?>
                                
                <div class="field required">
                    <label for="Test">คำถาม</label>
                    <div class="ui icon input">
                    <textarea name="detail" id="detail" cols="30" rows="10"></textarea>

                                <i  class="exclamation circle icon"></i>

                </div>
                </div>
                <div id="accept_field" class="field required">
                    <div class="ui checkbox">
                    <input type="checkbox" name="accept" id="accept" tabindex="0" >
                    <label>ยอมรับข้อกำหนดและเงื่อนไขที่ระบุไว้ใน <a href="/">นโยบายคุ้มครองข้อมูลส่วนบุคคล</a> </label>
                </div>
                <div class="field mt-4">
                    <!-- <button></button> -->
                    <button 
                class="ui button submit primary fluid" 
                name="wp-submit" 
              
                onclick="saveFaqForm()"
                type="submit">ส่งคำถาม</button>
                </div>
            </div>
            </div>
    </div>
       
</div>



<?php  get_template_part("components/popup-success" , null ,  [
		 "title" => "สำเร็จ",
		 "sub_title" => "ได้รับข้อมูลเรียบร้อยแล้ว กรุณารอการติดต่อกลับ",
		 
		 "id_form" => "sign_in_step3"
	]); ?>
<?php