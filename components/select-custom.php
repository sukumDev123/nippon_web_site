






<?php if(count($args["categories"])):  ?>


  


<div class="select-custom-div-big">
   
<div  class="select-custom-big-div ">
            <select 
                    
                    onchange="onSelected('mainCate' , '<?php echo $args['url_redirect'] ?>')")"
                    id="mainCate"  
                    class="select-product-custom form-select" 
                    
                    >
                        <option value=""><?php echo $args["label"] ?></option>
                        <?php foreach($args["categories"]  as $term): ?>
                            <option <?php if($term->term_id == $args["value"]): echo  "selected"; endif; ?> value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
                        <?php endforeach; ?>
                    </select>
                
            </div>

            

</div>
<?php endif; ?>
