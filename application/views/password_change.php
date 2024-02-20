
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
  <h1>Password Change</h1>
  <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="<?php echo base_url(); ?>password_change">Password Change</a></li>
  </ul>
</div>
<div class="container">
  <div class="main-form">
    <h3 class="contactus-title">CHANGE YOUR PASSWORD</h3>
    <div class="row">
        <div class="alert alert-success" style="margin: 30px 30px 0px 30px; display:none;">
                </div>
                <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>
      <form id="page_form_id" name="page_form_id"  action="POST">
          <input type="hidden" id="hidden_page_id" name="hidden_page_id" />
          <div class="col-sm-6 ">
          <input type="password"  name="old_pass" id="old_pass" placeholder="Old Password" required>
        </div>
        <div class="col-sm-6 ">
          <input type="password"  name="password" id="password" placeholder="New Password" required>
        </div>
        <div class="col-sm-6 ">
          <input type="password"  name="curr_pass" id="curr_pass" placeholder="Confirm Password" required>
        </div>
        <div class="col-xs-12  text-center">
          <div class="commun-btn">
            <button type="button"  onclick="pass_change()" class="btn">Submit</button>
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


function pass_change() {
    var valid = $("#page_form_id").valid();
    if (valid) {
        var old_password = $("#page_form_id #old_pass").val();
        var new_password = $("#page_form_id #password").val();
        var con_new_password = $("#page_form_id #curr_pass").val();
        if(new_password != con_new_password) { 
            alert('Please match new password and confirm new password.');
            return false;
        }
        var data = {};
        data['action'] = 'change_password';
      //  data['t_code'] = '1';
        data['hidden_id'] = '<?php echo $_SESSION['id']?>';
        data['old_password'] = old_password;
        data['new_password'] = new_password;
        data['con_new_password'] = con_new_password;
        $.ajax({
        type: 'post',
        url: '../ajaxcall',
        data: data,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('.load_container').hide();
            $('.alert-success').show();
            $(".alert-success").html(data.message);
        },
        error: function(request, error) {
            swal("Something error");
            $('.alert-danger').show();
            $(".alert-danger").html(data.message);
            $('.load_container').hide();
        }
    });

    }
}




    // function pass_change(){
        
    //     var hidden_id = <?php echo $_SESSION['id']?>
      
    //     var valid = $("#page_form_id").valid();
    // if (valid) {
    //     var password =  $("#page_form_id #password").val();
    //     var curr_pass =  $("#page_form_id #curr_pass").val();
        
    //     if(password != curr_pass) { 
    //     swal('Please check your confirm password');
    //         return false
    //     }  else { 
    //       var data = {};
    //   data['action'] = 'update_data';
    //     data['t_code'] = '3';
    //     data['hidden_page_id'] = hidden_id;
    //     data['old_pass'] = $("#page_form_id #old_pass").val();
    //     data['password'] = $("#page_form_id #password").val();
       
        
    //     fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
    //   $('#page_form_id').trigger("reset");
    // }
    // }
    // }
</script>
<?php include("element/footer.php"); ?>