<div class="banner-csr-div">
    <img class="banner-bk-image" src="<?php echo $args['image'] ?>" alt="Banner">
    <div class="banner-image-bk"></div>
    <div class="container content-banner">
        <h1 class="banner-title"><?php echo $args['title'] ?></h1>
        <h2 class="banner-sub-title"><?php echo $args['sub_title'] ?></h2>
        <div class="cards-banner">
            <div class="card-banner">
                <img src="<?php echo get_bloginfo("template_directory")."/assets/images/book.svg" ?>" class="card-banner-image"></img>
                <h2 class="card-banner-title"><?php echo $args['card-title'] ?></h2>
                <p class="card-banner-detail"><?php echo $args['card-detail'] ?></p>
            </div>
            <div class="card-banner">
                <img src="<?php echo get_bloginfo("template_directory")."/assets/images/humen.svg" ?>" class="card-banner-image"></img>
                <h2 class="card-banner-title"><?php echo $args['card-title2'] ?></h2>
                <p class="card-banner-detail"><?php echo $args['card-detail2'] ?></p>
            </div>
        </div>
        <div class="scroll-to-content"></div>
    </div>
</div>