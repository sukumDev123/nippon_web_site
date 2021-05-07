
<?php
    get_template_part("headers/header-single");

        $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
        $termShow = [];
        $termId = 0;

        
    ?>


 
<div   id="nav-products">
    <ul>
        <?php if(count($terms) > 0): ?>
            <?php foreach($terms as  $term):   ?>
                <li> 
                    <a href="/product/?cate=<?php echo $term->term_id ?>"><?php echo $term->name ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
       
    </ul>
</div>

<div class='container' id="single-product">
    <div class="left-side">
         <?php 
            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 
         ?>
         <img src="<?php echo $featured_img_url ?>" />
    </div>
    <div class="right-side">
        <h1> <?php the_title() ?> </h1>
        <?php the_content() ?>  

         

        <?php 
            // $photos = acf_photo_gallery("" , get_the_ID());
            $product_gallery = get_field('product_gallery', get_the_ID());
            print_r( $product_gallery);
        ?>
 


    </div>
</div>

<?php  get_footer() ?>