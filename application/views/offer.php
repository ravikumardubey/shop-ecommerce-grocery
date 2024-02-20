<?php include("element/top-header.php");
include("element/header.php");
include("element/sidemenu.php");
include("element/nav.php");

?>


<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?php echo base_url('public/image/prlx.jpg'); ?>" alt="#"></div>
  <h1 class="category-title">Offer</h1>
  <ul>
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="<?php echo base_url(); ?>offer">Offer </a></li>
  </ul>
</div>


<div class="container offer">

 <div class="row ">
    <div class="col-md-offset-2 col-md-8 purchase" >
        <h3 class="purchase-title">OOps! No Offer Found yet.</h3>
        
      <h3 class="purchase-title">Are you Ready for shopping with us</h3>
      <button class="btn btn-primary"><a href="<?php echo base_url(); ?>">Buy Now</a></button>
    </div>
  </div>
  </div>
  <div class="container">
      </div>
      
      <style>
          .offer{
              margin-bottom:85px;
          }
      </style>
  <?php include("element/footer.php"); ?>