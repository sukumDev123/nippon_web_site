<?php

// require_once( '../functions/info.php' );
 
$args = ['post_type' => 'info'];

$query = new WP_Query( $args );
$address = [];
$tel = [];
$fex = [];
$cs = [];

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
$info =  [
    "address" => $address,
    "tel" => $tel,
    "fex" => $fex ,
    "cs" => $cs
]
 
 

?>

<?php 

 
 
// var_dump($info);
?>


<div id="contact-us" class="container"> 
    <div class="phone-cs-social-address">
        <div class="phone">
   
            <h1> <i class="fas fa-phone-alt"></i> Phone</h1>
            <h5>Tel 0000000000</h5>
            <h5>Fex 0000000000</h5>
        </div>
        <div class="cs">
        <h1>Customer Service</h1>
            <h5><a href="tel:024631899">02 463 1899</a></h5>
        </div>
        <div class="social">
            <h1>ติดตามเราได้ที่นี่</h1>
        </div>
        <div class="address">
        <h1>
        <i class="fas fa-map-marker-alt"></i>  <?php echo $info['address']['title']; ?></h1>
        <p>
            <?php echo $info['address']['description']; ?>
        </p>
    </div>
    </div>
   
   

</div>