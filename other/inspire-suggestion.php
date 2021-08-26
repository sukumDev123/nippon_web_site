<?php 

$lang=get_bloginfo("language");  
$text_static_inspire_suggestion = [
    "en" => [
        "title" => "โครงการที่ไว้ใจ เลือกใช้สีนิปปอนเพนต์" , 
        "detail" => "รวมโครงการที่เลือกใช้สีนิปปอนเพนต์ มั่นใจในคุณภาพมาตรฐานจากประเทศญี่ปุ่น",
        "button_text" => "ดูโครงการเพิ่มเติม",
        "button_link" => get_the_permalink()."project-reference"
    ],
    "th" => [
        "title" => "โครงการที่ไว้ใจ เลือกใช้สีนิปปอนเพนต์" , 
        "detail" => "รวมโครงการที่เลือกใช้สีนิปปอนเพนต์ มั่นใจในคุณภาพมาตรฐานจากประเทศญี่ปุ่น",
        "button_text" => "ดูโครงการเพิ่มเติม",
        "button_link" => get_the_permalink()."project-reference"

    ]
][$lang];
$explain_inspire = get_field("explain_inspire");
$projects = get_field("projects");
 if(isset($explain_inspire) && isset($explain_inspire)):
?>



<div id="project_suggestion">
    <div class="container">
        <div class="left">
            <h1><?php echo $text_static_inspire_suggestion['title'] ?></h1>
            <p><?php echo $text_static_inspire_suggestion['detail'] ?></p>
        </div>
        <div class="right">
            <a  id="project_suggestion_button_desktop" class="a-primary-button" href="<?php echo  $text_static_inspire_suggestion['button_link'] ?>">
                <button class="primary-button">
                    <?php echo $text_static_inspire_suggestion['button_text'] ?>
                    <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                </button>
            </a>
       
        </div>
    </div>
    <div class="swiper-container project_home_suggestion">
        <div class="swiper-wrapper">
            <?php if(!empty($projects)): ?>
                <?php foreach($projects as $project):  
                       
            $featured_img_url = get_the_post_thumbnail_url( $project->ID,'full');

                ?>
                    <div class="swiper-slide">
                    <a   href="<?php echo get_permalink($project->ID) ?>">
                    <div>
                            <img src="<?php echo $featured_img_url ?>" alt="<?php echo get_the_title($project->ID) ?>" />
                            <div class="content">
                                <h1>
                                    <a   href="<?php echo get_permalink($project->ID) ?>"><?php echo get_the_title($project->ID) ?></a>
                                </h1>
                                <?php echo get_field("short_text" , $project->ID) ?>
                            </div>
                        </div>

                            </a>
                        
                        <div class="swiper-button-prev inspire-prev"></div>
                        <div class="swiper-button-next inspire-next"></div>
                    </div>    
                <?php endforeach; ?>
            <?php endif; ?>
         
        </div>

        <div class="swiper-pagination pagination-inspire"></div>

    </div>


    <a  id="project_suggestion_button_mobile" class="a-primary-button" href="<?php echo  $text_static_inspire_suggestion['button_link'] ?>">
                <button class="primary-button">
                    <?php echo $text_static_inspire_suggestion['button_text'] ?>
                    <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                </button>
            </a>
   
</div>


 <?php endif ?>