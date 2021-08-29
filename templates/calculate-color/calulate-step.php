
<?php 




?>


<div class="set_a">
        <h3 class="ui header primary-text">
            <?php echo $args["title"] ?>
        </h3>
         
        <div  class="ui three columns grid choice-div">
            <div class="column cal-div">
                    <h4 for="A1"><?php echo $args["choice_1"] ?></h4>
                    <input class="isNumber" type="text" id="<?php echo $args["input_1"] ?>">
            </div>
            <div class="column  cal-div">
                    <h4 for="A1"><?php echo $args["choice_2"] ?></h4>
                    <input class="isNumber" type="text" id="<?php echo $args["input_2"] ?>">
            </div>
            <div class="column  cal-div">
                    <h4 for="A1"><?php echo $args["choice_3"] ?></h4>
                    <input  class="isNumber" type="text" id="<?php echo $args["input_3"] ?>">
            </div>
        </div>
        <div class=" cal-result">
            <h4>พื้นที่ทาผนัง</h4> 
            <h1 id="<?php echo $args["result-id"] ?>">0</h1>   
            <h4>ตารางเมตร</h4>   
        </div>
    </div>

  