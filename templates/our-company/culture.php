<div class="template-culture-container">
    <div class="container">
        <?php
        get_template_part("templates/our-company/components/card-title" , null , [
            "title" =>  get_field("content_card1")["title"],
            "detail" =>  get_field("content_card1")["detail"],
            "image-right"=> true ,
            
            "image" =>    get_field("content_card1")["image"]["url"]
        ]);
        ?>
        <div class="border-content"></div>
        <h1 class="title-big">ค่านิยมหลักขององค์กร</h1>
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
                     [
                        "title" =>get_field("card_step_5")["title"],
                        "detail" =>    get_field("card_step_5")["detail"],
                        "image" => get_field("card_step_5")["image"]["url"]
                    ],
                ]
            ]);
        ?>

    </div>
</div>