<div class="mt-5">
    <h3 class="ui header">
        ป้อนข้อมูลพื้นที่ห้อง
    </h3>

    <div class="text-center">
        <img src="<?php  bloginfo("template_directory") ?>/assets/images/internal-room-top.jpg" alt="">

    </div>

    <?php 
    
        get_template_part("templates/calculate-color/calulate-step" , null , [
            "title" => "ภายในผนังห้อง",
            "choice_1" => "A ความกว้างของห้อง (เมตร)",
            "choice_2" => "B ความยาวของห้อง (เมตร)",
            "choice_3" => "C ความสูงของห้อง (เมตร)",
            "input_1" => "step_1_value_a",
            "input_2" => "step_1_value_b",
            "input_3" => "step_1_value_c",
            "result-id" => "step_1_result"
        ]);
    
    ?>
    <?php 
    
        get_template_part("templates/calculate-color/calulate-step" , null , [
            "title" => "ประตู",
            "choice_1" => "D ความกว้างของประตู (เมตร)",
            "choice_2" => "E ความสูงของประตู (เมตร)",
            "choice_3" => "จำนวนประตู",
            "input_1" => "step_2_value_a",
            "input_2" => "step_2_value_b",
            "input_3" => "step_2_value_c",
            "result-id" => "step_2_result"
        ]);
    
    ?>
    <?php 
    
        get_template_part("templates/calculate-color/calulate-step" , null , [
            "title" => "หน้าต่าง",
            "choice_1" => "F ความกว้างของหน้าต่าง(เมตร)",
            "choice_2" => "G ความสูงของหน้าต่าง (เมตร)",
            "choice_3" => "จำนวนหน้าต่าง",
            "input_1" => "step_3_value_a",
            "input_2" => "step_3_value_b",
            "input_3" => "step_3_value_c",
            "result-id" => "step_3_result"
        ]);
    
    ?>


  
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
                    <img src="<?php  bloginfo("template_directory") ?>/assets/images/room-internal-bottom.jpg" alt="">

            </div>
 

                    <?php 
            
                    get_template_part("templates/calculate-color/calulate-step-2-field" , null , [
                        "title" => "ฝ้า",
                        "choice_1" => "ความกว้างของห้อง (เมตร)",
                        "choice_2" => "ความยาวของห้อง (เมตร)",
                        
                        "input_1" => "step_4_value_a",
                        "input_2" => "step_4_value_b",
                        "result_id" => "step_4_result"
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
   <button id="submit_all_calculate" class="submit-button">คำนวณปริมาณสีที่ต้องใช้</button>
   </div>
    <div  class="text-center">
    <button id="reset_calculate"  class="reset-button" >ล้างข้อมูล</button>
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