<?php $this->load->view("element/top-header.php");
$this->load->view("element/header.php");
$this->load->view("element/sidemenu.php");
$this->load->view("element/nav.php"); ?>

<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="public/image/prlx.jpg" alt="#"></div>
  <h1>Help & Faq</h1>
  <ul>
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="<?php echo base_url(); ?>helpFaq">Help & Faq</a></li>
  </ul>
</div>
<div class="container">
  <div class="row about">
    <div class="col-md-offset-2 col-md-8">
      <h3 class="about-title">Help & Faq</h3>
      <p class="text-center about-desc">Gomores.com is a user friendly shopping portal in which customers can order their desired products and sit at home,We provide customers with home delivery services keeping in mind the convenience. 
So that the customer does not have to face the crowded area nor more pollution also</p>
    </div>
    
     <?php $loc_data = $this->common_model->getColor_Size('v_faq', array('status' => '0'), '50');   
                                  
                            if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) { ?>

     <div class="col-md-12 who-we-are">
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo $val['faq_cat']; ?></a> </h4>
          </div>
          <div id="collapseOne" class="acordi-disc panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"><?php echo $val['description']; ?> </div>
          
      </div>
    </div>
  </div>
  <?php   }} ?>
                                        

    
  
   <div class="container"></div>
  <div class="row helpfaq">
    <div class="col-md-offset-2 col-md-8 purchase" >
      <h3 class="purchase-title">Are you Ready for join Gomores Family</h3>
      <button class="btn btn-primary" onclick="location.href = '<?php echo base_url(); ?>';">Purchase Product</button>
    </div>
  </div>
</div>
</div>
</div>
<style>
    .helpfaq{
        margin-bottom:87px;
        margin-right:15px;
        margin-left:15px;
    }
</style>
<!-- Footer block Start  -->
<!--<div class="container">-->
<!--  <h3 class="client-title">Favourite Brands</h3>-->
<!--  <h4 class="title-subline">The High Quality Products</h4>-->
<!--  <div id="brand_carouse" class="owl-carousel brand-logo">-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>-->
<!--    <div class="item text-center"> <a href="#"><img src="image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>-->
<!--  </div>-->
<!--</div>-->
<?php $this->load->view("element/footer.php");?>

</body>
</html>
<!-- Footer block End  --> 
<script type="text/javascript">
		$( "#progress1" ).appendSimpleProgressBar();
		$( "#progress1" ).slow( { width:"78" } );
		
		$( "#progress2" ).appendSimpleProgressBar();
		$( "#progress2" ).slow( { width:"92" } );
		
		$( "#progress3" ).appendSimpleProgressBar();
		$( "#progress3" ).slow( { width:"76" } );
		
		$( "#progress4" ).appendSimpleProgressBar();
		$( "#progress4" ).slow( { width:"98" } );
		
		$( "#progress5" ).appendSimpleProgressBar();
		$( "#progress5" ).slow( { width:"62" } );

</script> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jQuery.html"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.html"></script>