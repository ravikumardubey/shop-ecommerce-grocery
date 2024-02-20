<!DOCTYPE html>
<html lang="en">

<head>
<title>My Account </title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<!--<meta name="description" content="Gomores.com is online shoping portal which is based on made in india, local shop to vocal shop objetives with high determination., online shoping, online shoping shop, online shoping store,online dress shoping" />-->
<!--<meta name="keywords" content=" Gomores, Gomores.com, online shoping, online shoping shop,online shoping store,online dress shoping, online shoping vendors, online ecommerce platform" />-->
<!--<meta name="robots" content="index, follow" />-->
<!--<meta name="googlebot" content="index, follow" />-->

<?php 

$my_aa = isset($_SESSION['id']) ? $_SESSION['id'] : '';
if($my_aa == '') { 
redirect('login', 'refresh');
}

$this->load->view('includes/top_header'); ?>
<body class="category col-2 left-col">
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navbar'); ?>
<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="public/image/prlx.jpg" alt="#"></div>
  <h1>My Account</h1>
  <ul>
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="#">Account</a></li>
    <li><a href="my_account">My Account</a></li>
  </ul>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3 hidden-xs column-left" id="column-left">
      <div class="Categories left-sidebar-widget">
        <div class="columnblock-title">Account</div>
        <div class="category_block">
          <ul class="box-category">
            <li><a href="my_account">My Account</a></li>
            <li><a href="addressbook">Address Book</a></li>
            <li><a href="orderhistory">Order History</a></li>
            <!--<li><a href="#">Downloads</a></li>-->
            <li><a href="rewardPoint">Reward Points</a></li>
            <li><a href="transction">Transactions</a></li>
            <li><a href="returns">Returns</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-9" id="content">
      <div class="row">
        
        <form class="form-horizontal" enctype="multipart/form-data" method="post"  id="page_form_id" name="page_form_id" action="#">
        <div class="col-sm-6">
          <h2>Welcome Customer</h2>
          <p>I am a returning customer</p>
          <span id="mesage_error" class="text-danger"></span>
          <div class="form-group">
            <label class="control-label" for="input-email">First Name</label>
            <input type="text" name="f_name" disabled value="<?php echo $_SESSION['f_name']; ?>" placeholder="First Name" id="f_name" class=" form-control">
             <span id="username_error" class="text-danger"></span>
          </div>
          
           <div class="form-group">
            <label class="control-label" for="input-email">Last Name</label>
            <input type="text" name="l_name" disabled value="<?php echo $_SESSION['l_name']; ?>" placeholder="Last Name" id="l_name" class=" form-control">
             <span id="username_error" class="text-danger"></span>
          </div>
          
           <div class="form-group">
            <label class="control-label" for="input-email">Primary Mobile No.</label>
            <input type="text" name="pri_mobile" disabled value="<?php echo $_SESSION['primary_mobile']; ?>" placeholder="Primary Mobile No" id="pri_mobile" class=" form-control">
             <span id="username_error" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label class="control-label" for="input-password">Email Id</label>
            <input type="text" name="email_id" disabled value="<?php echo $_SESSION['email_id']; ?>" placeholder="Email Id" id="email_id" class=" form-control">
                 <span id="password_error" class="text-danger"></span>
            </div>
          
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!--<div class="footer-top-cms parallax-container">-->
<!--  <div class="parallax"><img src="public/image/news.jpg" alt="#"></div>-->
<!--  <div class="container">-->
<!--    <div class="row">-->
<!--      <div class="newslatter">-->
<!--        <form>-->
<!--          <h5>SIGN UP FOR OUR DISCOUNTS TODAY!</h5>-->
<!--          <h4 class="title-subline">Be sure to follow our blog and sign up for all of our mailing updates!</h4>-->
<!--          <div class="input-group">-->
<!--            <input type="text" class=" form-control" placeholder="Your-email@website.com">-->
<!--            <button type="submit" value="Sign up" class="btn btn-large btn-primary">Subscribe</button>-->
<!--          </div>-->
<!--        </form>-->
<!--      </div>-->
<!--      <div class="footer-social">-->
<!--        <ul>-->
<!--          <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--          <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--          <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--          <li class="gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--          <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>-->
<!--        </ul>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<div class="container">
  <h3 class="client-title">Favourite Brands</h3>
  <h4 class="title-subline">The High Quality Products</h4>
  <!--<div id="brand_carouse" class="owl-carousel brand-logo">-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--  <div class="item text-center"> <a href="#"><img src="public/image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>-->
  <!--</div>-->
</div>

<script>
function fn_reg(){ 
  window.location.href="<?php echo base_url('register'); ?>";
}

  function fn_login() { 
    var valid = $("#page_form_id").valid();
    if (valid) {
          $('.load_container').show();
        var password =  $("#page_form_id #password").val();
        var prim_mobile =  $("#page_form_id #prim_mobile").val();
        var data = {};
        data['action'] = 'login_user';
        data['password'] = password;
        data['username'] = prim_mobile;
        $.ajax({
        type: 'POST',
        url: 'ajaxcall',
        data: data,
        dataType: 'json',
            success: function(data) {
                    $("#username_error").html('');
                    $("#password_error").html('');
                    console.log(data.success);
                    if (data.error) {
                        $("#username_error").html(data.username_error);
                        $("#password_error").html(data.password_error);
                    } else if (data.success) {
                        window.location.href = "http://gomores.com";
                    } else {
                        $("#mesage_error").html(data.message);
                    }
                    $('.load_container').hide();
                },
                error: function(request, error) {
                    alert("something error");
                    $('.load_container').hide();
                }
    });
        
        
        
       // 
        //$('#page_form_id').trigger("reset");
    }
  }
 

</script>
<?php $this->load->view('includes/footer'); ?>