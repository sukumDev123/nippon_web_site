
<div  class="select-custom-big-div ">
    <form  onclick="onSelectedShowList('select-custom-big-div' , 'li-show')" class="select-custom-div">
        <input type="text" value="" placeholder="Choose 1" value="<?php echo $args["value"] ?>" disabled id="<?php echo $args["input_id"] ?>">
        <?php get_template_part("components/icon" , null , ["icon" => "arrow-down"]) ?>
    </form>
    <div class="li-show  ">
        <?php if(count($args["categories"])):  ?>
            <?php foreach($args["categories"] as $cate): ?>
                <li onclick="onSelected('<?php echo $cate->name ?>' , '<?php echo $args['input_id'] ?>'  , 'select-custom-big-div' , 'li-show' , <?php echo $args['url_redirect'] ?>)"><?php echo $cate->name ?></li>
            <?php endforeach; ?>
            <?php endif; ?>
    </div>
</div>

<!-- cate_problem -->
<!-- $problem_and_solution_cate
$problem_and_solution_cate -->