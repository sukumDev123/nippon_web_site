
<?php

$title = $args["title"];
$subTitle  = $args["sub_title"];
$btnTitle = $args["btn_title"];
$idForm = $args["id_form"];
?>


<div id="<?php echo $idForm ?>" class="form-success-process">
	<div class="center-card">
		<img
			src="<?php echo get_bloginfo("template_directory") ?>/assets/images/check-circle.svg" 
			alt="check-circle">
			<h2 class="ui header primary-text">
				<?php echo $title ?>
				<div class="sub header primary-text"><?php echo $subTitle ?></div>
			</h2>

			<button 
                class="ui mt-5 button submit primary fluid" 
                name="wp-submit" 
                id="wp-register" 
                type="submit"
				
				><?php echo $btnTitle ?></button>
	</div>
</div>