<?php include("element/top-header.php");
include("element/header.php");
include("element/sidemenu.php");
include("element/nav.php");

?>
<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?php echo base_url('public/image/prlx.jpg'); ?>" alt="#"></div>
  <h1 class="category-title">About Us</h1>
  <ul>
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="#">About Us </a></li>
  </ul>
</div>

<div class="container">
  <div class="row about">
    <div class="col-md-offset-2 col-md-8">
      <h3 class="about-title">About Us</h3>
      <p class="text-center about-desc">Welcome to Gomores, your number one source for all things in grocery items and more. We're dedicated to giving you the very best of grocery item, with a focus on dependability, customer service and uniqueness.
Founded in 2018 by Rakesh Dhar, Gomores has come a long way from its beginnings in a Faridabad. When Rakesh Dhar first started out, his/her passion for connected people and boost local shops drove him to quit her day job, and gave him the impetus to turn hard work and inspiration into to a booming online store. We now serve customers all over Delhi NCR, and are thrilled to be a part of the  eco-friendly wing of the Grocery and etc industry.

We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
    </div>
    <div class="skill">
      <div class="col-md-4">
        <ul>
          <li>
            <div id="progress1">
              <h4>93% Sales Skills</h4>
            </div>
          </li>
          <li>
            <div id="progress2">
              <h4>90% Delivery Skills</h4>
            </div>
          </li>
          <li>
            <div id="progress3">
              <h4> 76% Marketing Skills</h4>
            </div>
          </li>
          <li>
            <div id="progress4">
              <h4>98% Quality Skills</h4>
            </div>
          </li>
          <li>
            <div id="progress5">
              <h4>95% Technology and Ideas</h4> 
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-4 mission">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a data-target="#Vision" data-toggle="tab">Our Vision</a></li>
        <li><a data-target="#Mission" data-toggle="tab">Our Mission</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="Vision">
          
          <p>Gomores a growing Startup Whose Vision: To Provide Good Quality Products To The Customer And Provide Good Service.Gomores gives you the convenience to sit back at home and get things delivered at your doorstep, but they also ensure that you are delivered the best quality products. </p>
        </div>
        <div class="tab-pane" id="Mission">
          <p>Gomores is growing startup and a platform where we empowers small businesses by providing our technology that increases earnings and eases operations.</p>
          
        </div>
      </div>
    </div>
    <div class="col-md-4 who-we-are">
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Wo We Are</a> </h4>
          </div>
          <div id="collapseOne" class="acordi-disc panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially<br>
            make a type specimen book. It has survived not only five centuries, but also the leap into </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title"> <a class="collapsed accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Wo We Are  Made</a> </h4>
          </div>
          <div id="collapseTwo" class="acordi-disc panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">Typesettin gmake a type specimen book. It has survived <br>
            not only five centuries, but also the leap into electronic , remaining essentially <br>
            make a type specimen book. It has survived not only five centuries, but also the leap into </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Our Business</a> </h4>
          </div>
          <div id="collapseThree" class="acordi-disc panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">Specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially <br>
            make a type specimen book. It has survived not<br>
            only five centuries, but also the leap into </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-offset-2 col-md-8 purchase" >
      <h3 class="purchase-title">Are you Ready for shopping with us</h3>
      <button class="btn btn-primary" onclick="location.href='<?php echo base_url();?>'">Buy Now</button>
    </div>
  </div>
</div>
<!-- Footer block Start  -->
<?php include("element/footer.php"); ?>
<script src="<?php echo base_url('public/javascript/DioProgress.js'); ?>"></script> 
<script src="<?php echo base_url('public/javascript/jquery.parallax.js'); ?>"></script> 
<script>
    jQuery(document).ready(function ($) {
        $('.parallax').parallax();
    });
</script>


<!-- Footer block End  --> 

<script type="text/javascript">
		$( "#progress1" ).appendSimpleProgressBar();
		$( "#progress1" ).slow( { width:"93" } );
		
		$( "#progress2" ).appendSimpleProgressBar();
		$( "#progress2" ).slow( { width:"90" } );
		
		$( "#progress3" ).appendSimpleProgressBar();
		$( "#progress3" ).slow( { width:"76" } );
		
		$( "#progress4" ).appendSimpleProgressBar();
		$( "#progress4" ).slow( { width:"98" } );
		
		$( "#progress5" ).appendSimpleProgressBar();
		$( "#progress5" ).slow( { width:"95" } );

</script> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<script src="<?php echo base_url('public/js/jQuery.html'); ?>"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url('public/js/bootstrap.html'); ?>"></script>
</body>

</html>