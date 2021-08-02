<?php


if ( ! is_user_logged_in() ) {
    wp_safe_redirect( wp_login_url() );
    exit;
}

?>
<?php get_header() ?>
<?php 
 /** Template Name: My Account */

    // global $post;
    $slug_name = get_field("page_name", get_the_ID());
    $user = wp_get_current_user();
   $checkedActive1 = $slug_name == "edit-account" ?  "active" : "" ;
   $checkedActive2 =  $slug_name == "edit-account" ? "" : "active";
   $slug_name =  $slug_name == "edit-account" ? $slug_name : "favorites/".$slug_name;
  
    
?>
<div class="template-myaccount">
    <div class="header-account">
        <h1 class="primary-text ui header centered"> 
            บัญชีของฉัน  
            <div class="sub header"> คุณสามารถดูภาพรวมบัญชีล่าสุดของคุณ และอัปเดตข้อมูลเกี่ยวกับบัญชี </div>
        </h1>
    </div>
    <div class="container mt-5">
    <div class="ui stackable grid">
        <div class="four wide column">
            <ul class="account-navbar">
                <li>
                <a class="account-a <?php echo  $checkedActive1  ?>" href="<?php echo  get_site_url() ."/edit-account" ?>">ข้อมูลผู้ใช้งาน</a>
                </li>
                <li>
                <a class="account-a  <?php echo  $checkedActive2  ?>" href="<?php echo  get_site_url() ."/favorites-products" ?>">เนื้อหาที่น่าสนใจ</a>
                </li>
            </ul>
        </div>
 
        <div class="twelve wide column">
            <?php get_template_part("templates/my-account/" . $slug_name , null , [
                "user" =>  $user
            ] ) ?>
        </div>
        </div>
    </div>
</div>
 
<?php get_footer() ?>
