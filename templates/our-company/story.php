<div class="template-culture-container">
    <div class="container">
    <h1 class="title-big ">ความสำเร็จของเรา</h1>

    <?php
            get_template_part("templates/our-company/components/corporate-value-2" , null , [
                "col-lg" => "col-lg-3" ,
                "class_title" => "primary-title",

                "cards" => [
                     [
                        "title" =>get_field("card_step_1")["title"],
                        "detail" =>    get_field("card_step_1")["detail"],
                        "image" => get_field("card_step_1")["image"]["url"]
                    ],
                     [
                        "title" =>get_field("card_step_2")["title"],
                        "detail" =>    get_field("card_step_2")["detail"],
                        "image" => get_field("card_step_2")["image"]["url"]
                    ],
                     [
                        "title" =>get_field("card_step_3")["title"],
                        "detail" =>    get_field("card_step_3")["detail"],
                        "image" => get_field("card_step_3")["image"]["url"]
                    ],
                     [
                        "title" =>get_field("card_step_4")["title"],
                        "detail" =>    get_field("card_step_4")["detail"],
                        "image" => get_field("card_step_4")["image"]["url"]
                    ],
                     [
                        "title" =>get_field("card_step_5")["title"],
                        "detail" =>    get_field("card_step_1")["detail"],
                        "image" => get_field("card_step_5")["image"]["url"]
                    ],
                
                ]
            ]);
        ?>
                   <div class="border-content"></div>


                   <h1 class="title-big ">ประวัติศาสตร์และจุดเริ่มต้นของนิปปอนเพนต์</h1>

                   <?php
        get_template_part("templates/our-company/components/card-title" , null , [
            "title" =>  get_field("content_card1")["title"],
            "detail" =>  get_field("content_card1")["detail"],
            "image-left-small2"=> true ,
            "image-title-small"=> "image-title-small" ,
            "image" =>    get_field("content_card1")["image"]["url"]
        ]);
    ?>
    <div class="card-margin"></div>

                   <?php
        get_template_part("templates/our-company/components/card-title" , null , [
            "title" =>  "" ,
            "detail" =>  get_field("content_card2")["detail"],
            "image-right-med"=> true ,
            "image" =>   get_field("content_card2")["image"]["url"]
        ]);
    ?>
                   <div class="border-content"></div>

                   <?php
        
        get_template_part("templates/our-company/components/footer-video" , null , [
            "title" => get_field("footer")["title"],
            "video" => get_field("footer")["video_link"],
            "poster" => get_field("footer")["poster"],

        ])
        
        
        ?>

    </div>
</div>