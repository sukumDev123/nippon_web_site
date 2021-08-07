<div class="container">


<div class="container mt-5">
    <div class="ui stackable grid list-faq">
        <div class="four wide column">
            <ul class="faq-navbar">
                <li>
                <a class="account-a active" href="<?php echo  get_site_url() ."/edit-account" ?>">ข้อมูลผู้ใช้งาน</a>
                </li>
                <li>
                <a class="account-a  " href="<?php echo  get_site_url() ."/favorites-products" ?>">เนื้อหาที่น่าสนใจ</a>
                </li>
            </ul>
        </div>
 
        <div class="ten wide column">
            <div class="sub-type-headers">
                <h4 class="sub-type-header active">ข้อมูลผลิตภัณฑ์</h4>
                <h4 class="sub-type-header ">ข้อมูลผลิตภัณฑ์</h4>
                <h4 class="sub-type-header">ข้อมูลผลิตภัณฑ์</h4>
            </div>
            <h3 class="ui header">คำถามที่พบบ่อย</h3>
            <div class="card-faq">
                <div class="card-faq-header">
                    <h3>คำถามที่ 1</h3>
                    <?php get_template_part("components/icon" , null , ["icon" => "arrow-top"]) ?>
                </div>
                <p>การแก้ไข :ใช้เครื่องมือขูดลอกสีที่หลุดล่อนและสีเดิมที่เสื่อมสภาพออกให้หมด ล้างทำความสะอาดพื้นผิว ก่อนทาสี เพื่อซ่อมงานตามระบบต่อไป : ในทางปฏิบัติการขูดลอกสี และล้างฟิล์มสีเดิม คงไม่สามารถกระทำได้อย่างสมบูรณ์</p>
            </div>
        </div>
        </div>
    </div>




<?php get_template_part("templates/faq/faq_form") ?>
</div>

