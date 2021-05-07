<?php 


$explain_inspire = get_field("explain_inspire");
$projects = get_field("projects");
 
?>



<div id="project_suggestion">
    <div class="container">
        <div class="left">
            <h1><?php echo $explain_inspire['title'] ?></h1>
            <?php echo $explain_inspire['detail'] ?>
        </div>
        <div class="right">
            <a class="a-primary-button" href="">
                <button class="primary-button">
                    <?php echo $explain_inspire['button_title'] ?>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </button>
            </a>
       
        </div>
    </div>
    <div class="swiper-container project_home_suggestion">
        <div class="swiper-wrapper">
            <?php if(count($projects) > 0): ?>
                <?php foreach($projects as $project):  
                        $photos = acf_photo_gallery("photos" , $project->ID);
                ?>
                    <div class="swiper-slide">
                        <div>
                            <img src="<?php echo $photos[0]['full_image_url']; ?>" alt="" />
                            <div class="content">
                                <h1>
                                    <a target="_blank" href="<?php echo get_permalink($project->ID) ?>"><?php echo get_the_title($project->ID) ?></a>
                                </h1>
                                <?php echo get_field("short_text" , $project->ID) ?>
                            </div>
                        </div>
                        <div class="swiper-button-prev inspire-prev"></div>
                        <div class="swiper-button-next inspire-next"></div>
                    </div>    
                <?php endforeach; ?>
            <?php endif; ?>
         
        </div>

        <div class="swiper-pagination pagination-inspire"></div>

    </div>
   
</div>


 