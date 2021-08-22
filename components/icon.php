<?php 

$icon  = $args["icon"];
$class = $icon;
if(isset($args["class"])):
  $class = $args["class"];
endif;
?>

<img class="<?php echo $class  ?>"
           src="<?php echo get_bloginfo("template_directory") ?>/assets/images/<?php echo $icon ?>.svg" 
             alt="<?php echo $icon ?>"
            />