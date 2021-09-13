<div class="out-company-abount">
    <div class="container">

    <?php
        get_template_part("templates/our-company/components/card-title" , null , [
            "title" => get_field("content_card1")['title'],
            "detail" => get_field("content_card1")['detail'],
            "image-right"=> true ,
            "image" =>  get_field("content_card1")['image']['url']
        ]);
    ?>
    <div class="card-margin"></div>
    <?php
        get_template_part("templates/our-company/components/card-title" , null , [
            "title" => get_field("content_card2")['title'],
            "detail" => get_field("content_card2")['detail'],
            "image-left"=> true ,
            "image" =>  get_field("content_card2")['image']['url'] 
        ]);
    ?>
    <div class="card-margin"></div>

    <?php
        get_template_part("templates/our-company/components/card-title" , null , [
            "title" => get_field("content_card3")['title'],
            "detail" => get_field("content_card3")['detail'],
            "image-right"=> true ,
            "image" =>  get_field("content_card3")['image']['url']
        ]);
    ?>

    <div class="border-content"></div>
        <h1 class="title-big ">คุณค่าขององค์กร</h1>
    <?php
            get_template_part("templates/our-company/components/corporate-value" , null , [
                "col-lg" => "col-lg-3" ,
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
                ]
            ]);
        ?>


    </div>


    <div class="white-container">
        <div class="container">
                <?php
                    get_template_part("templates/our-company/components/card-title" , null , [
                        "title" => get_field("content_card4")['title'],
                        "detail" => get_field("content_card4")['detail'],
                        "image-right-small"=> true ,
                        "image" =>  get_field("content_card4")['image']['url'],
                        "class-image-mobile" => "nippon-logo-size"
                    ]);
                ?>
         
            <div class="border-content"></div>
            <?php
                    get_template_part("templates/our-company/components/card-title" , null , [
                        "title" => get_field("content_card5")['title'],
                        "detail" => get_field("content_card5")['detail'],
                        "image-left-small"=> true ,
                        "image" =>  get_field("content_card5")['image']['url']
                    ]);
                ?>
        </div>
    </div>
    <div class="container">
        <?php
        
        get_template_part("templates/our-company/components/footer-video" , null , [
            "title" => get_field("footer")["title"],
            "video" => get_field("footer")["video_link"]
        ])
        
        
        ?>
    </div>
</div>