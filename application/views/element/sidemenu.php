<div id="mySidenav" class="sidenav">
    <div class="main_sss">
    <img src="<?php echo base_url('public/image/logo-2.png'); ?>" / style="padding-left: 13px;"><a
        href="javascript:void(0)" class="closebtn" onclick="closeNav()"
        style="border-bottom:0.5px solid #333;">&times;</a>
        
</div>
    <div class="menu">
              <?php if(isset($_SESSION['id']) && $_SESSION['id'] != '' && isset($_SESSION['user_id']) &&  $_SESSION['user_id'] != '' && isset($_SESSION['email_id']) && $_SESSION['email_id'] != '' && isset($_SESSION['primary_mobile']) && $_SESSION['primary_mobile'] != '') { ?>
      <h3 style="padding-left:16px; font-weight:600;"> Hello!<br></h3><h3 style="padding-left:16px; font-weight:600;"> <?php echo $_SESSION['f_name']." ".$_SESSION['l_name']; ?></h3>
        <div class="menu-content"><a class="call_menu" href="tel:+917982607328"><span><span><img
                            src="https://ik.imagekit.io/bfrs/image_ravisingh0009/data/content/call.png"></span><span
                        style="padding:5px;">Call Us</span></span></a>
            <a class="email_menu" href="mailto:info@gomores.com"><span><span><img
                            src="https://ik.imagekit.io/bfrs/image_ravisingh0009/data/content/maill.png"></span><span
                        style="padding:5px;">Email Us</span></span></a>
        </div>
         
        <a href="<?php echo base_url(); ?>/#">Term & Condition</a>
        <a href="<?php echo base_url(); ?>/#">Return Policy</a>

             
                          
             <a href="<?php echo base_url('logout'); ?>">Logout</a>
                      <?php } else {  ?>
            <a href="<?php echo base_url('register'); ?>">Register</a>
                    <a href="<?php echo base_url('login'); ?>">Login</a>
                    <?php } ?>
       <a href="<?php echo base_url('contactus'); ?>">Contact Us</a>
   <a href="<?php echo base_url('helpFaq'); ?>">Help & FAQs</a>
   <a href="<?php echo base_url(''); ?>">Teams and Careers</a>
   <a href="<?php echo base_url(''); ?>">About Us</a>
   <a href="<?php echo base_url(''); ?>">Brands</a>
  
       
    </div>
</div>
<style>
.modal-backdrop {
    z-index: 0;
}
</style>




<span class="side-menu-2" style="" onclick="openNav()">&#9776;</span>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}
</script>
<script>
    jQuery(document).ready(function ($) {
        $('.parallax').parallax();
    });
</script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>