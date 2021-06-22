<script src="http://localhost:35729/livereload.js"></script>
<script>
    // localStorage.setTimes();
    localStorage.setItem("link_now", "<?php echo get_permalink() ?>")

</script>
<div class='message-right'>
    
    <div class="contact-message-top">
         
        <a class="content-message-box-1" href="<?php echo get_site_url() ?>/contact-us/">
            <img src="<?php bloginfo("template_directory");  ?>/assets/images/message-2.svg" alt="">
        </a>
 
        <!-- <div class="content-message-box-1"> -->
        <a  class="content-message-box-1" href="tel:024631899">
            <img src="<?php bloginfo("template_directory");  ?>/assets/images/tel.svg" alt="">
        </a>
        <!-- </div> -->
        <!-- <div class="content-message-box-1"> -->
        <a  class="content-message-box-1" target="_blank" href="https://bit.ly/inbox-nipponpaint">
            <img src="<?php bloginfo("template_directory");  ?>/assets/images/fb-message.svg" alt="">
        </a>

        <!-- </div> -->
        
    </div>
    <div class="contact-message-div">
        <h5>สอบถามผลิตภัณฑ์ <br /> และบริการได้แล้ววันนี้</h5>
        <div class="contact-message-box">
                <!-- <img src="<?php bloginfo("template_directory");  ?>/assets/images/message1.svg" alt=""> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 26.113 26.113">
                    <path id="Icon_material-textsms" data-name="Icon material-textsms" d="M26.5,3H5.611a2.608,2.608,0,0,0-2.6,2.611L3,29.113l5.223-5.223H26.5a2.619,2.619,0,0,0,2.611-2.611V5.611A2.619,2.619,0,0,0,26.5,3ZM12.14,14.751H9.528V12.14H12.14Zm5.223,0H14.751V12.14h2.611Zm5.223,0H19.974V12.14h2.611Z" transform="translate(-3 -3)" fill="currentColor"/>
                </svg>

        </div>
    </div>
</div>


<div id="user_info">
<div class="icon-items">
        <i class="fa fa-times"></i>
    </div>
    <div class="user_info_form">
            <div>
                        <div class="form1">
                        <div class="form-items">
                            <label  for="Email">Email: </label>
                            <input type="text" id="email" placeholder="Email" />
                        </div>
                    <div class="form-items">
                        <label for="Fullname">Fullname: </label>

                            <input id="fullname" type="text" placeholder="Fullname" />
                        </div>
                
                        <div class="form-items">
                            <label for="Type user">Type user: </label>

                                <select id="type">
                                            
                                            <option value="บ้านใหม่">บ้านใหม่</option>
                                            <option value="ปรับปรุงบ้าน">ปรับปรุงบ้าน</option>
                                           
                                            <option value="วิศวกรและผู้รับเหมา">วิศวกรและผู้รับเหมา</option>
                                            <option value="นักออกแบบ">นักออกแบบ</option>
                                            <option value="เจ้าของโครงการ">เจ้าของโครงการ</option>
                                
                                    
                                </select>    
                        </div>
                    </div>
                        <div class="form2">
                        <div class="form-items">
                        <label for="Email">Contact: </label>

                            <input id="contact" type="text" placeholder="Contact" />
                        </div>
                    
                        <div class="form-items">
                        <label for="Email">Career: </label>

                            <input type="text" placeholder="Career" id="career" />
                        </div>
                
                        </div>
                        
    

            </div>
           <div class="form-button">
           <button id="send_data">
                    Save 
                    <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                </button>
            
           </div>
           <div class="form-message">
               <h5>บันทึกข้อมูลสำเร็จ</h5>
           </div>
    </div>
</div>