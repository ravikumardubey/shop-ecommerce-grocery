
<?php 
$page_url =  uri_string();
$page_data = $this->common_model->getList('v_pages',array('status'=>'0','page_url'=>$page_url)); 
?>
<?php 

$this->load->view("element/top-header.php");
$this->load->view("element/header.php");
$this->load->view("element/sidemenu.php");
$this->load->view("element/nav.php");

?>
<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="public/image/prlx.jpg" alt="#"></div>
  <h1>Contact Us</h1>
  <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="contact.html">Contact Us</a></li>
  </ul>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-offset-1 col-md-10">
      <h3 class="contactus-title">You Have Got Questions We have Got Answers</h3>
      <p class="text-center contact-desc">Feel free to contact us for additional information</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div class="complaint">
        <h2 class="tf">Tel</h2>
        <div class="call-info">+917982607328</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="email">
        <h2 class="tf">For Information</h2>
        <div class="email-info">info@gomores.com</div>
      </div>
    </div>
     <div class="col-sm-4">
      <div class="email">
        <h2 class="tf">For Technical Support</h2>
        <div class="email-info">support@gomores.com</div>
      </div>
    </div>
     <div class="col-sm-4">
      <div class="email">
        <h2 class="tf">For Sales and Business</h2>
        <div class="email-info">sales@gomores.com</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="time">
        <h2 class="tf">Time</h2>
        <div class="time-info">Sun – Sat: 24 Hours</div>
      </div>
    </div>
  </div>
  <div class="main-form">
    <h3 class="contactus-title">Leave Message</h3>
    <div class="row">
        <div class="alert alert-success" style="margin: 30px 30px 0px 30px; display:none;">
                </div>
                <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>
      <form id="page_form_id" name="page_form_id"  action="POST">
        <div class="col-sm-6">
          <input type="text" required name="name" id="name" placeholder="Name">
        </div>
        <div class="col-sm-6 ">
          <input type="email" required name="email" id="email" placeholder="Email">
        </div>
        <div class="col-sm-6 ">
          <input type="text" required name="phone_no" id="phone_no" placeholder="Phone Number">
        </div>
        <div class="col-sm-6 ">
          <input type="text" required name="subject" id="subject" placeholder="Subject">
        </div>
        <div class="col-xs-12 ">
          <textarea required name="message" placeholder="Message" id="message"  rows="3" cols="30"></textarea>
        </div>
        <div class="col-xs-12  text-center">
          <div class="commun-btn">
            <button type="button"  onclick="myFunction()" class="btn">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--<div class="row">
    <div class="col-sm-12">
      <div class="map"> 
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <div style="overflow:hidden;height:520px;width:100%;">
          <div id="gmap_canvas" style="height:520px;width:1170px;"></div>
          <a class="google-map-code" href="http://www.pureblack.de/google-maps/" id="get-map-data">pureblack.de</a> </div>
        <script type="text/javascript"> function init_map(){var myOptions = {zoom:14, scrollwheel:false,center:new google.maps.LatLng(36.778261,-119.41793239999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(36.778261, -119.41793239999998)});}google.maps.event.addDomListener(window, 'load', init_map);</script> 
      </div>
    </div>
  </div> -->
</div>
<div class="container">
  <h3 class="client-title">Favourite Brands</h3><br>
 <!-- <h4 class="title-subline">The High Quality Products</h4> -->
  <!--<div id="brand_carouse" class="owl-carousel brand-logo">-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>-->
  </div>
</div>

<script>
    function myFunction(){
      
        var valid = $("#page_form_id").valid();
    if (valid) {
          var data = {};
      data['action'] = 'insert_data';
        data['t_code'] = '20';
        data['name'] = $("#page_form_id #name").val();
        data['email'] = $("#page_form_id #email").val();
        data['phone_no'] = $("#page_form_id #phone_no").val();
        data['subject'] = $("#page_form_id #subject").val();
        data['message'] = $("#page_form_id #message").val();
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
       $('#page_form_id').trigger("reset");
    }
    }
</script>
<?php include("element/footer.php"); ?>