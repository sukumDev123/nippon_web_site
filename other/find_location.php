<div class="container">
            <div class="find_location">
                <div class="content">
                    <h1><?php echo get_field("find_location")["title"] ?></h1>
                    <?php echo get_field("find_location")["detail"] ?>
                </div>
                <div class="image_location">
                    <div class="left">
                        <?php 
                            $imageLeft = get_field("find_location")['left']['image']['url'];
                        ?>
                        <img src="<?php echo $imageLeft  ?>" alt="" />
                        <div class="image-bk"></div>

                        <div class="text">
                            <h1> <i class="fas fa-location-arrow"></i> <?php echo get_field("find_location")['left']["title"] ?></h1>
                                <p><?php echo get_field("find_location")['left']["detail"] ?></p>
                        </div>
                    </div>
                    <div class="right">
                        <?php 
                            $imageRight = get_field("find_location")['right']['image']['url'];
                        ?>
                        <img src="<?php echo $imageRight  ?>" alt="" />
                        <div class="image-bk"></div>
                       <div class="text">
                        <h1><i class="fas fa-map-marker-alt"></i> <?php echo get_field("find_location")['right']["title"] ?></h1>
                           <p> <?php echo get_field("find_location")['right']["detail"] ?></p>
                       </div>
                    </div>
                </div>
            </div>
        </div>
