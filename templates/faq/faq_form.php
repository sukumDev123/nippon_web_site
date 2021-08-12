<div class="ui stackable grid  faq-form">
    <div class="four wide column">
       <h3 class="ui header">มีคำถามเพิ่มเติม</h3>
       <p>สามารถถามคำถามไว้ผ่านแบบฟอร์มนี้ 
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
                    
                   

                    <?php  get_template_part("components/input_exclamation" , null ,  [
                        "placeholder" => "เบอร์โทรศัพท์",
                        "name" => "tel",
                        "label" => "เบอร์โทรศัพท์",
                        "id" => "tel",
                        "value" => "",
                        "class"=>"input isNumber" 
                    ]); ?>
                </div>
                <?php  get_template_part("components/input_exclamation" , null ,  [
                        "placeholder" => "",
                        "name" => "detail",
                        "label" => "เบอร์โทรศัพท์",
                        "id" => "detail",
                        "value" => "",
                        "class"=>"input textarea_input" 
                    ]); ?>
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



