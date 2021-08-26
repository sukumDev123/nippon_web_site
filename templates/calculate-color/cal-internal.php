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
<div class="accordion" id="accordionExample">


                        <div id="show-more-cal"  class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo_1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo_1" aria-expanded="false" aria-controls="collapseTwo_1">
                                <h2>ส่วนเพิ่มเติม	</h2>
                                </button>
                                </h2>
                            <div id="collapseTwo_1" class="accordion-collapse collapse" aria-labelledby="headingTwo_1" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
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
    <div class="body-summary">
        <div class="header-1">
            <h3 class="ui header">ผนังห้อง</h3>
            <h5 class="ui header">(สีน้ำ)</h5>
        </div>
        <div class="header-2">
            <h3 class="ui header">1. สีรองพื้นปูน <span>(ทา 1 รอบ)</span></h3>
            <h3 class="ui header">2. สีทับหน้า <span>(ทา 2 รอบ)</span></h3>
          
        </div>
        <div class="header-3">
            <h3 id="result-top-1"  class="ui header"></h3>
            <h3 id="result-top-2" class="ui header"></h3>
        </div>
    </div>
    <div class="body-summary">
        <div class="header-1">
            <h3 class="ui header">ฝ้า</h3>
            <h5 class="ui header">(สีน้ำ)</h5>
        </div>
        <div class="header-2">
            <h3 class="ui header">1. สีรองพื้นปูน <span>(ทา 1 รอบ)</span></h3>
            <h3 class="ui header">2. สีทับหน้า <span>(ทา 2 รอบ)</span></h3>
        </div>
        <div class="header-3">
            <h3 id="result-bottom-1"  class="ui header"></h3>
            <h3 id="result-bottom-2" class="ui header"></h3>
        </div>
    </div>

    <h5 class="ui red header">
    หมายเหตุ
    </h5>
    <p>*พื้นที่การใช้งานนี้เป็นข้อมูลจากการคำนวณทางทฤษฎีเท่านั้น ปริมาณการใช้งานจริงขึ้นอยู่กับวิธีการทำงาน สภาพพื้นผิว สภาพหน้างาน ความหนาในการเคลือบสี และปัจจัยอื่น ๆ 
ที่อาจเกี่ยวข้อง</p>
</div>

<div class="mt-5rem"></div>

<?php 

get_template_part("pages/page-services");

?>

<div class="mt-5rem"></div>