<?php

$classTitleSmall = "";
if(isset($args["image-title-small"])) {

    $classTitleSmall = $args["image-title-small"];

}
$classImgMobile = "";
if(isset($args["class-image-mobile"])) {

    $classImgMobile = $args["class-image-mobile"];

}

?>
<?php if(isset($args["image-left"])): ?>
<div class="row our-company-card">
        <div class="col-12 show-on-mobile   ">
        <img class="<?php echo $classImgMobile ?>" src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
    <div class="col-12 col-lg-6  show-on-window ">
        <div class="our-company-content">
            <img src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
        </div>
    </div>
    <div class="col-12 col-lg-6 content-right">
    <?php if($args["title"]): ?><h1 class="title <?php echo  $classTitleSmall ?>"><?php echo $args["title"] ?></h1> <?php endif; ?>
            <p class="detail"><?php echo $args["detail"] ?></p>
    </div>
</div>
<?php endif; ?>
<?php if(isset($args["image-right"])): ?>
<div class="row our-company-card" >
    <div class="col-12 show-on-mobile   ">
        <img  class="<?php echo $classImgMobile ?>" src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
    <div class="col-12 col-lg-6 content-left">
    <?php if($args["title"]): ?><h1 class="title <?php echo  $classTitleSmall ?>"><?php echo $args["title"] ?></h1> <?php endif; ?>
            <p class="detail"><?php echo $args["detail"] ?></p>
    </div>
    <div class="col-12 col-lg-6 show-on-window">
        <img src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
</div>
<?php endif; ?>
<?php if(isset($args["image-right-small"])): ?>
<div class="row our-company-card" >
    <div class="col-12 col-lg-2 show-on-mobile">
        <img  class="<?php echo $classImgMobile ?>" src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
    <div class="col-12 col-lg-10 content-left-small">
            <?php if($args["title"]): ?><h1 class="title <?php echo  $classTitleSmall ?>"><?php echo $args["title"] ?></h1> <?php endif; ?>
            <p class="detail"><?php echo $args["detail"] ?></p>
    </div>
    <div class="col-12 col-lg-2 show-on-window">
        <img src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
</div>
<?php endif; ?>
<?php if(isset($args["image-right-med"])): ?>
<div class="row our-company-card" >
<div class="col-12 col-lg-2 show-on-mobile">
        <img  class="<?php echo $classImgMobile ?>" src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
    <div class="col-12 col-lg-8 content-left-small">
            <?php if($args["title"]): ?><h1 class="title <?php echo  $classTitleSmall ?>"><?php echo $args["title"] ?></h1> <?php endif; ?>
            <p class="detail"><?php echo $args["detail"] ?></p>
    </div>
    <div class="col-12 col-lg-4 show-on-window">
        <img src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
</div>
<?php endif; ?>
<?php if(isset($args["image-left-small"])): ?>

<div class="row our-company-card" >
    <div class="col-12">
    <?php if($args["title"]): ?><h1 class="title window title-big <?php echo  $classTitleSmall ?>"><?php echo $args["title"] ?></h1> <?php endif; ?>
    </div>
<div class="col-12 col-lg-2 show-on-mobile">
        <img  class="<?php echo $classImgMobile ?>" src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
    <div class="col-12 col-lg-5 show-on-window">
        <img src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
</div>
    <div class="col-12 col-lg-7 content-right-small">
            <?php if($args["title"]): ?><h1 class="title mobile <?php echo  $classTitleSmall ?>"><?php echo $args["title"] ?></h1> <?php endif; ?>
            <p class="detail"><?php echo $args["detail"] ?></p>
    </div>
</div>
<?php endif; ?>
<?php if(isset($args["image-left-small2"])): ?>

<div class="row our-company-card" >
   
<div class="col-12 col-lg-2 show-on-mobile">
        <img  class="<?php echo $classImgMobile ?>" src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
    </div>
    <div class="col-12 col-lg-5 show-on-window">
        <img src="<?php echo $args["image"] ?>" alt="<?php echo $args["title"] ?>">
</div>
    <div class="col-12 col-lg-7 content-right-small2">
            <?php if($args["title"]): ?><h1 class="title window <?php echo  $classTitleSmall ?>"><?php echo $args["title"] ?></h1> <?php endif; ?>
            <p class="detail"><?php echo $args["detail"] ?></p>
    </div>
</div>
<?php endif; ?>