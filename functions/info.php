<?php 


function getInfo() {
    $args = ['post_type' => 'info'];

    $query = new WP_Query( $args );
    $address = [];
    $tel = [];
    $fex = [];
    $cs = [];
    var_dump($query);
    while ( $query->have_posts() ) {
        $query->the_post();
        if(get_field("slug") == "address") {
            $address = ["title" => get_field("title") , "description" => get_field("description")];
        }
        if(get_field("slug") == "tel") {
            $tel = ["title" => get_field("title") , "description" => get_field("description")];
        }
        if(get_field("slug") == "fex") {
            $fex = ["title" => get_field("title") , "description" => get_field("description")];
        }
        if(get_field("slug") == "custom-service") {
            $cs = ["title" => get_field("title") , "description" => get_field("description")];
        }
    }
    return [
        "address" => $address,
        "tel" => $tel,
        "fex" => $fex ,
        "cs" => $cs
    ]
 
}
 