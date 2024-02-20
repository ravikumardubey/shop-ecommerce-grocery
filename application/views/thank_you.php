<?php


$this->load->view("element/top-header.php");
$this->load->view("element/header.php");

?>
<style>
.order_id{
    padding-top:45px;
    text-align:left;
    font-size:20px;
    font-weight: 500;
    padding-left:15px;
}
   .site-header__title {
         
    font-size:70px;
    font-weight: 900;
    text-align: center;
    }
    
    .main-content{
        text-align: center;
    }
    .main-content__checkmark{
        font-size:110px;
        color:green;
         font-weight: 500;
        
    }
    .main-content__body{
        padding-top: 20px;
       font-size:20px; 
    }
    .shops_centr{
         margin-top: 20px;
        
    }
    
    @media only screen and (max-width: 600px) {
        .order_id{
    padding-top:70px;
    text-align:left;
    font-size:14px;
    font-weight: 500;
  
}
.site-header__title {
         
    font-size:20px;
    font-weight: 600;
    text-align: center;
    }
     .main-content__body{
        padding-top: 20px;
       font-size:15px; 
    }
    .shops_centr{
         margin-bottom: 70px;
        
    }
}
</style>
<div class="container">
    <div class="row">
	<header class="site-header" id="header">
	    <div class="col-md-12">
	    <h3 class="order_id" >Your Order ID : ccf4gs44dfg454</h3>
		<h1 class="site-header__title" >THANK YOU MR./MS. <a  href="<?php echo base_url('profile');?>"><?php echo strtoupper($_SESSION['l_name']);?></a></h1>
		<h1 class="site-header__title">FOR YOUR ORDER!</h1>
	</div>
	</header>
	</div>
	</div>
<div class="container">
    <div class="row">
    <div class="col-md-12">
	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">We're processing it now. You will receive an email confirmation shortly. Visit <a  href="<?php echo base_url('orderhistory');?>">Order Status</a> to make changes to your order, track your shipment and more. We really appreciate you giving us a moment of your time today. Thanks for being you.</p>
<button onclick="location.href='<?php echo base_url();?>'"  type="button" class="btn btn-success shops_centr">Continue Shopping</button>
	</div>
		</div>
		</div>
</div>
	<?php include("element/footer.php"); ?>