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
?>

 <div class="<?php echo $classFront ?>">
  	<label for="<?php echo $id ?>"><?php echo $label ?></label>
      <div class="ui icon input">
		  <input 
				type="text" 
				placeholder="<?php echo $placeholder ?>" 
				name="<?php echo $name ?>" 
				id="<?php echo $id ?>"
				class="<?php echo $class ?>" 
				 
		/>
				<i  class="exclamation circle icon"></i>

   </div>
  </div>