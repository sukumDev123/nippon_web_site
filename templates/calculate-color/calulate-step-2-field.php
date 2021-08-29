<div>
    

                <h2   class="ui header primary-text">
                    <?php echo $args["title"] ?>
                </h2>
                <div class="ui three columns grid">
                    <div class="column cal-div">
                            <h4 for="A1"> <?php echo $args["choice_1"] ?></h5>
                            <input class="isNumber" type="text" id="<?php echo $args["input_1"] ?>">
                    </div>
                    <div class="column  cal-div">
                            <h4 for="A1"><?php echo $args["choice_2"] ?></h4>
                            <input class="isNumber" type="text" id="<?php echo $args["input_2"] ?>">
                    </div>
                    <div class="column ">
                        <div class="cal-result-step4">
                            <h4><?php echo $args['button_text'] ?></h4> 
                            <h1 id="<?php echo $args["result_id"] ?>">0</h1>   
                            <h4>ตารางเมตร</h4>   
                        </div>
                    </div>
                </div>
</div>