<?php wp_footer(); ?>
<footer>
    <div  >
 
        <div >
            <div>
                <h1>เริ่มแต่งแต้มสีสันไปกับนิปปอนเพนต์</h1>
                <h5>รับข่าวสารโปรโมชั่นดีๆ ก่อนใคร</h5>
            </div> 
            <form method="get" class="footer-input">
                <input type="text" name="email"  placeholder="Email" />
                <i class="fas fa-long-arrow-alt-right"></i>
            </form>
        </div>

        
    </div>
    <div class="footer-content">
        <div>
            <div class="address">
                <h1>ADDRESS </h1>
                <p>
                    บริษัท นิปปอนเพนต์ เดคโคเรทีฟ โคทติ้ง </br>
                    (ประเทศไทย) จำกัด</br>
                    101 ม. 3 ซ.สุขสวัสดิ์ 76 ถนนสุขสวัสดิ์</br> 
                    บางจาก พระประแดง สมุทรปราการ 10130
                </p>
            </div>
            <div class="phone">
                <h1>PHONE </h1>
                <h5><a>TEL 0 246 25299  </a></h5>
                <h5><a>FAX 0 2463 2863 </a></h5>
            </div>
        </div>
        <div>
            <?php 
            
            wp_nav_menu(
                [
                    "theme_location" => 'menu-footer'
                ]
            )
            
            ?>
        </div>
        <!-- <div></div>
        <div></div>
        <div></div> -->

       
    </div>
    <div class="border-bottom"></div>
        <h5 class="text-center">2021 - © Nippon Paint Decorative Coatings (Thailand) Co.,Ltd. All rights reserved.</h5>
</footer>
</body>
</html>
