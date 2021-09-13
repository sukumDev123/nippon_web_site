<div class="footer-out-company">
    <h1 class="title-footer-our-company"><?php echo $args["title"] ?></h1>
    <?php if( $args["video"]): ?>
        <video width="480" height="320" preload="metadata" poster="<?php  echo $args["poster"]['url'] ?>" controls="controls">
            <source src="<?php echo $args["video"] ?>" type="video/mp4">
        </video>
    <?php endif; ?>

 
    

</div>