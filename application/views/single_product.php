<!DOCTYPE html>
<html lang="en">

<head>
<title>Gomores.com</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<!--<meta name="description" content="Gomores.com is online shoping portal which is based on made in india, local shop to vocal shop objetives with high determination., online shoping, shoping shop,shoping store,dress shoping" />-->
<!--<meta name="keywords" content="Gomores, Gomores.com, online shoping, shoping shop,shoping store,dress shoping,about us" />-->
<!--<meta name="robots" content="index, follow" />-->
<!--<meta name="googlebot" content="index, follow" />-->

<?php $this->load->view('includes/top_header'); 
?>
<body class="about">
       <style>
/*body {background-color: powderblue;}*/
/*h1   {color: blue;}*/
/*p    {color: red;}*/

.container_sss { width: 100%;
background:#f3f7f8;
padding: 20px 30px;
border-radius: 5px;
border: 1px solid #90EE90;
margin-bottom: 10px;
/*display:flex;*/
/*align-items:center;*/
/*justify-content:center*/
/*flex-direction:column;    */
    
    
    
}


}
</style>

<?php if(isset($data)){
print_r($data);

}?>
<?php $this->load->view('includes/header'); $this->load->view('includes/navbar'); ?>
<!--<div class="breadcrumb parallax-container">-->
<!--  <div class="parallax"><img src="public/image/prlx.jpg" alt="#"></div>-->
<!--  <h1>Order Product</h1>-->
<!--  <ul>-->
<!--    <li><a href="<?php echo base_url(); ?>">Home</a></li>-->
<!--    <li><a href="<?php echo base_url(); ?>aboutus">Order Product </a></li>-->
<!--  </ul>-->
<!--</div>-->
<div class="container">
  <div class="row about">
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
      <h3 class="about-title">View Order Details</h3>
    </div>
    </div>
<div class="container_sss">
    <h3> Order Date </h3><h3 id="order_date"> </h3>
    <h3> Order #</h3><h3 id="order"></h3>
    <h3> Order Total</h3><h3 id="order_total"> </h3>
    <hr></hr>
    <h3> Download Invoice</h3>
    </div>
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
      <h3 class="about-title">Shipment Details</h3>
    </div>
    </div>
<div class="container_sss">
    <h2>Delivered </h2>
    <h3> Delivery Estimated:</h3>

    <hr></hr>
    <h3> Track Shipment</h3>
    </div>
      <div class="container">
        <div class="col-md-offset-2 col-md-8">
      <h3 class="about-title">Payment Information</h3>
    </div>
    </div>
<div class="container_sss">
    <h2>Payment Method </h2>
    <hr></hr>
    <h3>Billing Address :</h3>

    <hr></hr>
    <h3> Track Shipment</h3>
    </div>
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
      <h3 class="about-title">Shipping Address</h3>
    </div>
    </div>
<div class="container_sss">
    <h2>{Customer Name} </h2>
  
    <h3>{Shipping Address}</h3>

    
    </div>
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
      <h3 class="about-title">Order Summery</h3>
    </div>
    </div>
<div class="container_sss">
    <h3>Items Price </h3>
  
    <h3>Postage & Packing</h3>
    <h3>Total Before Tax</h3>
    <h3>Tax</h3>
    <h3>Total</h3>
     <h2>Order Total</h2>

    
    </div>
    <div class="container">
        </div>
</div>
</div>
</div>
<?php $this->load->view('includes/footer'); ?>

</body>
</html>
<!-- Footer block End  --> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jQuery.html"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.html"></script>