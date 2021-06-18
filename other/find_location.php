<?php 


$lang=get_bloginfo("language");  
$text_static_inspire_suggestion = [
    "en" => [
        "title" => "ค้นหาร้านค้าตัวแทน",
        "detail" => "เรามีตัวแทนจำหน่ายทั่วประเทศ ที่พร้อมให้บริการคุณลูกค้าและให้คำปรึกษาเรื่องสีได้ โดยสามารถค้าหาตัวแทนจำหน่ายใกล้บ้านคุณได้แล้ว ที่นี่",
        "button_title" => "ค้นหาตัวแทนจำหน่าย",
        "button_link" => get_the_permalink()."search-shop"
    ],
    "th" => [
        "title" => "ค้นหาร้านค้าตัวแทน<br />
        จำหน่ายนิปปอนเพนต์",
        "detail" => "เรามีตัวแทนจำหน่ายทั่วประเทศ ที่พร้อมให้บริการคุณลูกค้าและให้คำปรึกษาเรื่องสีได้ โดยสามารถค้าหาตัวแทนจำหน่ายใกล้บ้านคุณได้แล้ว ที่นี่",
        "button_title" => "ค้นหาตัวแทนจำหน่าย",
        "button_link" => get_the_permalink()."search-shop"
    ]
][$lang];
?>


<div id="find_location">
            <div class="find_location">
                <div class="content">
                    <h1><?php echo $text_static_inspire_suggestion["title"] ?></h1>
                   <p> <?php echo $text_static_inspire_suggestion["detail"] ?></p>
                    <div class="mt-5"></div>
                    <a id="find_location_btn_desktop" class="a-primary-button" href="<?php echo $text_static_inspire_suggestion['button_link'] ?>">
                        <button class="primary-button">
                            <?php echo $text_static_inspire_suggestion['button_title'] ?>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </button>
                    </a>
                </div>
                <div class="image_location">
                    <img src="<?php echo get_field("find_location")['image_location']['url'] ?>" alt="">
                </div>
                <a  id="find_location_btn_mobile" class="a-primary-button" href="<?php echo $text_static_inspire_suggestion['button_link'] ?>">
                        <button class="primary-button">
                            <?php echo $text_static_inspire_suggestion['button_title'] ?>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </button>
                    </a>
            </div>
        </div>
