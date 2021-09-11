<?php 

$termId = $args["termId"];
$selected = "";
?>
<div  id="nav-products">
    <ul class="desktop">
        <?php if(count($args["terms"]) > 0): ?>
            <?php foreach($args["terms"] as  $term): $className = ""; if($term->name != "all"): if($termId == $term->term_id): $className="cate-active";$word_selected=$term->name; endif;  ?>
                <li class="<?php  echo $className ?>"> 
                    <a href="<?php echo get_term_link($term->term_id)  ?>/?scroll=true"><?php echo $term->name ?></a>
                </li>
            <?php endif; endforeach; ?>
        <?php endif; ?>
    </ul>
    
        <button 
            id="productCate" 
            type="button" 
            class="btn  dropdown dropdown-toggle" 
            data-bs-toggle="dropdown" 
            aria-expanded="false"
        >
        <?php echo $word_selected ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="productCate">
        <li>
            <a class="dropdown-item"  >
                        เลือกประเภทสินค้า
                    </a>    
            </li>
        <?php foreach($args["terms"] as  $term): if($term->name != "all"): $className = "";  if($termId == $term->term_id): $className="cate-active"; endif;  ?>
                <li > 
                    <a 
                        class="dropdown-item <?php echo $className ?>"  
                        href="<?php echo get_term_link($term->term_id)  ?>/?scroll=true"><?php echo $term->name ?></a>
                </li>
            <?php endif; endforeach; ?>
            
        </ul>

 
</div>