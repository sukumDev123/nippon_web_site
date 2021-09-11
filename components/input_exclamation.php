<?php

$label = $args['label'];
$name = $args['name'];
$class = $args['class'];
$placeholder = $args['placeholder'];
$value = $args['value'];
$id = $args['id'];
$red = true;
if(isset($args['required'])) {
	$red = $args['required'];

}
$classFront = "field required";
if($red == false) {
	$classFront = "field";
}
$emailDisabled = "";
if(isset($args['emailDisabled'])): 
	if($args['value']):
		$emailDisabled = "disabled";
	endif;
endif;
?>

 <div class="<?php echo $classFront ?>">
  	<label for="<?php echo $id ?>"><?php echo $label ?></label>
      <div class="ui icon input">
		  <input 
				type="text" 
				placeholder="<?php echo $placeholder ?>" 
				name="<?php echo $name ?>" 
				value="<?php echo $value  ?>"
				id="<?php echo $id ?>"
				class="<?php echo $class ?>" 
				 <?php echo $emailDisabled ?>
		/>
				<i  class="exclamation circle icon"></i>

   </div>

   <?php if(isset($args["errorId"])): ?>
   <div id="<?php echo $args["errorId"] ?>" class="ui pointing red basic label pointing-alert">
                        
						<?php echo $args["errorText"] ?>
                    </div>
   <?php endif; ?>

  </div>