
<?php

$title = $args["title"];
$subTitle  = $args["sub_title"];
 
 
?>


<div class="popup-show">
<div   class="form-success-process popup-div">
<?php 
     get_template_part("components/icon" ,null, ["icon" => "icon-cancel"]);
	
	?>
	<div class="center-card">
	
		<img
			src="<?php echo get_bloginfo("template_directory") ?>/assets/images/check-circle.svg" 
			alt="check-circle">
			<h2 class="ui header primary-text">
				<?php echo $title ?>
				<div class="sub header primary-text"><?php echo $subTitle ?></div>
			</h2>
 
	</div>
</div>
</div>