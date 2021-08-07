<div class="mt-5">
    <h3 class="ui header">
        ป้อนข้อมูลพื้นที่ห้อง
    </h3>

    <div class="text-center">
        <img src="<?php  bloginfo("template_directory") ?>/assets/images/external-room-top.jpg" alt="">

    </div>

    <div class="external-big-div">
        <div class="external-div">
            <?php 
                    
                    get_template_part("templates/calculate-color/calulate-step-2-field" , null , [
                        "title" => "ผนังด้านที่ 1",
                        "choice_1" => "ความกว้างของรั้ว (เมตร)",
                        "choice_2" => "ความสูงของรั้ว (เมตร)",
                        
                        "input_1" => "external_input_1_1",
                        "input_2" => "external_input_2_1",
                        "result_id" => "result_external_1"
                    ]);
                
            ?>
        </div>
    </div>
    <div class="external-add-new">
        <?php echo get_template_part("components/icon" , null , ["icon" => "plus-button"]) ?>
    </div>


  
</div>



<div class="cal-internal-other">
    <div id="show-more-cal" class="ui accordion">
        <div class="title ">
            <h2>ส่วนเพิ่มเติม	</h2>
            <!-- <i class="dropdown icon"></i> -->
            <?php get_template_part("components/icon" , null , ["icon" => "arrow-top"]) ?>
</div>
        <div class="content ">
            <div class="text-center">
                    <img src="<?php  bloginfo("template_directory") ?>/assets/images/external-room-bottom.jpg" alt="">

            </div>
 

                    <?php 
            
                    get_template_part("templates/calculate-color/calulate-step-2-field" , null , [
                        "title" => "รั้ว",
                        "choice_1" => "ความกว้างของรั้ว (เมตร)",
                        "choice_2" => "ความสูงของรั้ว (เมตร)",
                        
                        "input_1" => "external_other_value_a",
                        "input_2" => "external_other_value_b",
                        "result_id" => "external_other_result"
                    ]);
                
            ?>
  
        </div>
        
    </div>
</div>


<div class="submit-calculate">
    <div class="show-result-m">
        <h2>พื้นที่ทาสีทั้งหมด</h2>
        <h1 id="summary_number_1">0</h1>
        <h2>ตารางเมตร</h2>
    </div>

   <div class="text-center">
   <button id="submit_all_calculate_external" class="submit-button">คำนวณปริมาณสีที่ต้องใช้</button>
   </div>
    <div  class="text-center">
    <button id="reset_calculate_external"  class="reset-button" >ล้างข้อมูล</button>
    </div>
</div>


<div class="summary-calculate ">
    <h1 class="ui header primary-text text-center">ผลคำนวณปริมาณการใช้สี</h1>
    <h3 class="ui header primary-text text-center">
    พื้นที่ทาสีทั้งหมด
    <strong id="summary_number_2">400</strong>
    ตารางเมตร
    </h3>
    <div class="header-summary">
        <div class="text-center">
            <h5 class="primary-text">พื้นที่ทาสี</h5>
        </div>
        <div class="text-center">
            <h5 class="primary-text">ประเภท</h5>
        </div>
        <div class="text-center">
            <h5 class="primary-text">ปริมาณสีที่ต้องใช้</h5>
        </div>
    </div>
</div>

<div class="mt-5rem"></div>

<?php 

get_template_part("pages/page-services");

?>

<div class="mt-5rem"></div>