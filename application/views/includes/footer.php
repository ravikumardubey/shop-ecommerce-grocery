<footer id="cms_searvice">
  <div class="cms_searvice" >
    <div class="container">
      <div class="row">
        <div class="col-md-3 ">
          <div class="cms-block1 z-depth-5">
            <h4>Free Shipping</h4>
            <p>All order over upto ₹ 5000</p>
          </div>
        </div>
        <div class="col-md-3 ">
          <div class="cms-block2">
            <h4>7 Days Returns</h4>
            <p>Money Back Guarantee</p>
          </div>
        </div>
        <div class="col-md-3 ">
          <div class="cms-block3">
            <h4>24/7 Support</h4>
            <p>Feel free to Contact us</p>
          </div>
        </div>
        <div class="col-md-3 ">
          <div class="cms-block4">
            <h4>Online Shopping </h4>
            <p>Save Up to 20% on Store</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-3 footer-block">
        <h5 class="footer-title">INFORMATION</h5>
        <ul class="list-unstyled ul-wrapper">
          <li><a href="<?php echo base_url(); ?>aboutus">About Us</a></li>
          <li><a href="#">Delivery Information</a></li>
          <li><a href="<?php echo base_url(); ?>security">Privacy Policy</a></li>
          <li><a href="<?php echo base_url(); ?>termcondition">Terms & Conditions</a></li>
       <!--   <li><a href="#">Wish List</a></li>
          <li><a href="#">Gift Certificates</a></li>
          <li><a href="#">View Cart</a></li>
          <li><a href="#">Order History</a></li> -->
          <li><a href="<?php echo base_url(); ?>our_team">Teams and Careers</a></li>
        </ul>
      </div>
      <div class="col-sm-3 footer-block">
        <h5 class="footer-title">MY ACCOUNT</h5>
        <ul class="list-unstyled ul-wrapper">
          <li><a href="<?php echo base_url(); ?>contactus">Contact Us</a></li>
          <li><a href="<?php echo base_url(); ?>my_account">My Account</a></li>
          <li><a href="<?php echo base_url(); ?>">Order History</a></li>
             <li><a href="<?php echo base_url(); ?>">Brands</a></li>
          <li><a href="<?php echo base_url(); ?>">Newsletter</a></li>
         <!-- <li><a href="#">Gift Certificates</a></li>
          <li><a href="#">Wish List</a></li>
       
          <li><a href="#">Specials</a></li>
          <li><a href="#">Affiliates</a></li>-->
        </ul>
      </div>
      <div class="col-sm-3 footer-block">
        <h5 class="footer-title">Choose Gomores</h5>
        <ul class="list-unstyled ul-wrapper">
          <li><a href="<?php echo base_url(); ?>vendorRegistration">Partner with Gomores</a></li>
         <!--<li><a href="#">Faq</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Contact us</a></li>
          <li><a href="#">Sitemap</a></li>
          <li><a href="#">Product Recall</a></li>
          <li><a href="#">Gift Vouchers</a></li>-->
          <li><a href="<?php echo base_url(); ?>helpFaq">Help & FAQs</a></li>
          <li><a href="<?php echo base_url(); ?>">Sitemap</a></li>
         <!-- <li><a href="#">Sale Only Today</a></li> -->
        </ul>
      </div>
      <div class="col-sm-3 footer-block">
        <div class="content_footercms_right">
          <div class="footer-contact">
            <h5 class="contact-title footer-title">Contact Us</h5>
            <ul class="ul-wrapper">
              <!--<li><i class="fa fa-map-marker"></i><span class="location2">Offices Addresss:<br>-->
              <!--  218,Drimlend Building<br>-->
              <!--  Sarthana jakatnaka, Surat City <br>-->
              <!--  Gujarat-395013  INDIA</span></li>-->
              <li><i class="fa fa-envelope"></i><span class="mail2"><a href="#">info@gomores.com</a><br>
                <a href="http://www.gomores.com">Gomores.com</a></span></li>
              <li><i class="fa fa-mobile"></i><span class="phone2">11111111111111<br>
                111111111111111111</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div id="bottom-footer">
      <ul class="footer-link">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url(); ?>aboutus">About</a></li>
        <li><a href="<?php echo base_url(); ?>">Work</a></li>
        <li><a href="<?php echo base_url(); ?>our_team">Team</a></li>
        <li><a href="<?php echo base_url(); ?>">Pricing</a></li>
        <li><a href="<?php echo base_url(); ?>">Blog</a></li>
        <li><a href="<?php echo base_url(); ?>contactus">Contact</a></li>
      </ul>
      <div class="copyright"> Copyright - <a class="yourstore" href="http://www.gomores.com/">Gomores.com &copy; 2018-2020 </a></div>
      <div class="footer-bottom-cms">
        <div class="footer-payment">
          <ul>
            <li class="mastero"><a href="#"><img alt="" src="<?php echo base_url(); ?>public/image/payment/mastero.jpg"></a></li>
            <li class="visa"><a href="#"><img alt="" src="<?php echo base_url(); ?>public/image/payment/visa.jpg"></a></li>
            <li class="currus"><a href="#"><img alt="" src="<?php echo base_url(); ?>public/image/payment/currus.jpg"></a></li>
            <li class="discover"><a href="#"><img alt="" src="<?php echo base_url(); ?>public/image/payment/discover.jpg"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <a id="scrollup">Scroll</a> 
  
  </footer>
<script src="<?php echo base_url(); ?>public/javascript/jquery.parallax.js"></script> 
<script>
  var lang = '<?php echo current_url(); ?>';
    jQuery(document).ready(function ($) {
        $('.parallax').parallax();

        fn_auto_cat();
        
    });
</script>
<script src="public/global_assets/js/main/common.js"></script>
<style type="text/css">
    
    #cms_searvice {display: block;}

    
/*#content-mobile {display: none;}*/


@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 768px)
  and (-webkit-min-device-pixel-ratio: 2) {
#cms_searvice {display: none;}

}

    
</style>
</body>

</html>