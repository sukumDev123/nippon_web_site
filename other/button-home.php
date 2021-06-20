<?php 


$lang=get_bloginfo("language");  
$text_static = [
    "en" => [
         "title1" => "Owner",
         "new_home" => "บ้านใหม่",
         "owner_renovate"  => "ปรับปรุงบ้าน",
         "EngineersAndContractors" => "วิศวกรและผู้รับเหมา",
         "Designer" => "Designer",
         "ProjectOwner" => "Project Owner"
         
        ],
        "th" => [
            "title1" => "เจ้าของบ้าน",
            "new_home" => "บ้านใหม่",
            "owner_renovate"  => "ปรับปรุงบ้าน",
            "title2" => "ผู้เชี่ยวชาญ",
            "EngineersAndContractors" => "วิศวกรและผู้รับเหมา",
            "Designer" => "นักออกแบบ",
            "ProjectOwner" => "เจ้าของโครงการ"


    ]
][$lang];


?>
<?php 
 
if(isset($_GET['scroll'])):
    echo '<script> setTimeout(() => {
        document.querySelector(".card").scrollIntoView({behavior: "smooth" , block: "center"})
    } , 1000)</script>';
endif;

?>

<div class='button'>
    
<div class="what_your_type">
    <h5>เลือกประเภทที่เป็นตัวคุณ ?</h5>
    <div class="border-line"></div>
</div>
            <div class="_button">
                <div class="_button_select">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $text_static['title1'] ?>
                            <img src="<?php echo get_bloginfo("template_directory"); ?>/assets/images/arrow-down-white.svg" alt="">


                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item" href="<?php echo get_site_url() ?>/?scroll=true">
                            <?php echo $text_static['new_home'] ?>
                            
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo get_site_url() ?>/nippon-paint-thailand/home-renovate?scroll=true">
                            <?php echo $text_static['owner_renovate'] ?>
                            </a></li>
                            </ul>
                        </div>
                </div>
                <div class="_button_select">
                 
 

                    <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $text_static['title2'] ?>
                            <img src="<?php echo get_bloginfo("template_directory"); ?>/assets/images/arrow-down-white.svg" alt="">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item" href="<?php echo get_site_url() ?>/nippon-paint-thailand/home-perfessions-constractors/?scroll=true">
                            
                            <?php echo $text_static['EngineersAndContractors'] ?>
                            
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo get_site_url() ?>/nippon-paint-thailand/home-perfessions-designers?scroll=true">
                            
                            <?php echo $text_static['Designer'] ?>
                            
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo get_site_url() ?>/nippon-paint-thailand/home-owner-develop?scroll=true">
                            <?php echo $text_static['ProjectOwner'] ?>
                            </a></li>
                            </ul>
                        </div>



                </div>
            </div>
        </div>