<div>
    

                <h2   class="ui header primary-text">
                    <?php echo $args["title"] ?>
                </h2>
                <div class="ui three columns grid">
                    <div class="column cal-div">
                            <h5 for="A1"> <?php echo $args["choice_1"] ?></h5>
                            <input type="text" id="<?php echo $args["input_1"] ?>">
                    </div>
                    <div class="column  cal-div">
                            <h5 for="A1"><?php echo $args["choice_2"] ?></h5>
                            <input type="text" id="<?php echo $args["input_2"] ?>">
                    </div>
                    <div class="column ">
                        <div class="cal-result-step4">
                            <h5>พื้นที่ทาฝ้า</h5> 
                            <h1 id="<?php echo $args["result_id"] ?>">0</h1>   
                            <h5>ตารางเมตร</h5>   
                        </div>
                    </div>
                </div>
</div>