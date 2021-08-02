<?php 
 /** Template Name: Career Detail */
get_header();
?>

<div class="container page-mt">

<h1 class="ui head center aligned container  primary-text">
    <?php echo get_the_title() ?>
</h1>
<div class="margin-page"></div>

<div class="ui stackable grid ">
  <div class="eight wide column">
      <?php the_content() ?>
  </div>
  <div class="eight wide column form-career ">
     <!-- <div class=""> -->
         
        <h3 class="ui head center aligned container">กรอกข้อมูลสมัครงาน</h3>
 
        <div class="ui form">
            <div class="required field">
                <label>First Name</label>
                <input type="text" name="first-name" placeholder="First Name">
            </div>
            <div class="required field">
                <label>Last Name</label>
                <input type="text" name="last-name" placeholder="Last Name">
            </div>
            <div class="required field">
                <label>First Name</label>
                <input type="text" name="first-name" placeholder="First Name">
            </div>
            <div class="required field">
                <label>Last Name</label>
                <input type="text" name="last-name" placeholder="Last Name">
            </div>
            <div class="required field">
                <label>First Name</label>
                <input type="text" name="first-name" placeholder="First Name">
            </div>
            <div class="required field">
                <label>Last Name</label>
                <input type="text" name="last-name" placeholder="Last Name">
            </div>
            <div class="inline field required">
                <div class="ui checkbox">
                <input type="checkbox" tabindex="0" class="hidden">
                <label>I agree to the Terms and Conditions</label>
                </div>
            </div>

        </div>
 
     <!-- </div> -->
    
  </div>
 
</div>
</div>

<?php


get_footer();

?>
