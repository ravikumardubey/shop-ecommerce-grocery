                                                           <?php


$this->load->view("element/top-header.php");
$this->load->view("element/header.php");
$this->load->view("element/sidemenu.php");
$this->load->view("element/nav.php");



$pro_id = base64_decode($_REQUEST['pro_id']);
 $product_data1 = $this->common_model->getProductData('v_product',array('status'=>'0','product_id'=>$pro_id),'8');  
  $product_image = $this->common_model->getlist('v_product_image',array('status'=>'0','product_id'=>$pro_id));  
   $single_pro = $this->common_model->getProductData('v_product_color_size',array('status'=>'0','product_id'=>$pro_id),'8');
$product_data =  array();
if(!empty($product_data1) && is_array($product_data1)) {
$product_data = $product_data1['0'];
}

if(empty($product_data)) { 
   redirect(base_url(), 'refresh');
}
    
    
    

                                   $images_data =  $this->common_model->getImagelist($pro_id);

                                   $fn_getWeight =  $this->common_model->fn_getWeight($pro_id);
                                    $pro_weight = '';
                                    if(!empty($fn_getWeight) && is_array($fn_getWeight)) { 
                                        $pro_weight = $fn_getWeight[0]['size'];
                                    }

?>

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

<!----image_popup----------->




<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?php echo base_url('public/image/prlx.jpg'); ?>" alt="#"></div>
  <h1>Product</h1>
  <ul>
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="category?vendor-id=<?php echo strtr(base64_encode($product_data['vendor_id']),'+/=', '._-'); ?>">Desktops</a></li>
    <li><a href="product?pro_id=<?php echo base64_encode($product_data['product_id']); ?>"><?php echo $product_data['name'];?></a><span class="product_size_pro"><?php echo '('.$pro_weight.')'; ?></span></li>
  </ul>
</div>
<div class="container">
  <div class="row">
    <div class="content col-sm-12">
      <div class="row">
        <div class="col-sm-5">
          <div class="thumbnails">
            <div data-toggle="modal" data-target="#image_popup"><img src="<?php echo $images_data['image1']; ?>" title="<?php echo $product_data['name'];?>" alt="<?php echo $product_data['name'];?>c" /></div>
            <div id="product-thumbnail" class="owl-carousel">

            <?php if($product_image) { foreach($product_image as $value_image) { 
                
                $image_name=  $value_image['image'];
                ?>
              <div class="item" data-toggle="modal" data-target="#image_popup">
                <div class="image-additional"><img src="<?php echo base_url('public/upload/'.$image_name); ?>" title="<?php echo $product_data['name'];?>" alt="<?php echo $product_data['name'];?>" /></div>
              </div>
             <?php } } ?> 
       
            </div>
          </div>
        </div>
               
        <!-- Modal notification -->
  <div class="modal fade" id="image_popup" role="dialog">
    <div class="modal-dialog order" style="z-index:9999;">
     <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Image View</h4>
        </div>
        <div class="modal-body">
          <div class="row">
        <div class="col-md-12">
           <img src="<?php echo $images_data['image1']; ?>" title="<?php echo $product_data['name'];?>" alt="<?php echo $product_data['name'];?>" /> 
    </div>
	</div>
			
        </div>
        <div class="modal-footer">
         </div>
      </div>
      
    </div>
  </div>


<!------------>
        
        <div class="col-sm-7 prodetail">
          <h1 class="productpage-title"><?php echo $product_data['name']; ?><span class="product_size_pro"><?php echo '('.$pro_weight.')'; ?></span></h1>
          <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> 
          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span>
          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="riview"><a href="#">reviews</a> / <a href="#">Write a review</a></span> </div>
          <ul class="list-unstyled productinfo-details-top">
            <li>
              <h2 class="productpage-price"><?php echo '₹'. $product_data['price']; ?><span class="less">₹<?php echo $product_data['MRP_price']; ?></span></h2>
            </li>
            
          </ul>
          <hr>
          <ul class="list-unstyled product_info">
            <li>
              <label>Brand:</label>
              <span> <a href="#"><?php echo $product_data['brand_name']; ?></a></span></li>
            <li>
              <label>Product Code:</label>
              <span> <?php echo $product_data['product_id']; ?></span></li>
            <li>
              <label>Availability:</label>
              <span> <?php if($product_data['total_availability'] > 0) { echo 'In Stock'; } else { echo 'Not In Stock'; }; ?></span></li>
          </ul>
          <hr>
          <p class="product-desc"> <?php echo substr($product_data['short_description'],0,200);  ?></p>
          <div id="product">
            <div class="form-group">
              <div class="row">
                <div class="Sort-by col-md-6">
                  <label>Size/Weight</label>
                   <select id="select_by_size" name="select_by_size" class="selectpicker form-control" onchange="fn_product_price(this.value,'<?php echo $pro_id; ?>')">
                       
                       <?php

    
    $single_pro = $this->common_model->getColor_Size('v_product_color_size',array('status'=>'0','product_id'=>$pro_id),'100');

    if (!empty($single_pro) && is_array($single_pro)) {
        foreach ($single_pro as $val) {
            ?>
                
                 
                      
                       <option value="<?php echo $val['id']; ?>">
                                                    <?php echo $val['size']; ?></option>

                                                <?php }}?>
                    
                  </select>
                </div>
                <div class="Color col-md-6">
                  <label>Color</label>
                  <select id="select-by-size" class="selectpicker form-control">
                       
                       <?php

    
    $single_pro = $this->common_model->getColor_Size('v_product_color_size',array('status'=>'0','product_id'=>$pro_id),'100');

    if (!empty($single_pro) && is_array($single_pro)) {
        foreach ($single_pro as $val) {
            ?>
                
                 
                      
                       <option value="<?php echo $val['id']; ?>">
                                                    <?php echo $val['color']; ?></option>

                                                <?php }}?>
                    
                  </select>
                </div>
              </div>
             		<?php 
//   if(!empty($product_data) && is_array($product_data)) { 
//       $iii= 1;
//     foreach($product_data as $val) { 
 ?>
			  <div class="button-custome-plus-product col-md-3">
					<div class="input-group mb-3 catagre">
                               <div class="input-group-prepend">
                                            <button onclick="fn_plus('<?php echo $product_data['product_id']; ?>','1')"  class="btn btn-dark btn-sm" id="minus-btn"><i
                                                    class="fa fa-minus"></i></button>
                                        </div>
                                 <input type="text" id="qty_input<?php echo $product_data['product_id']; ?>" name="qty_input<?php echo $product_data['product_id']; ?>" class="form-control form-control-sm"
                                            value="1" min="1" style="text-align:center;">
                                <div class="input-group-prepend">
                                            <button onclick="fn_plus('<?php echo $product_data['product_id']; ?>','2')" class="btn btn-dark btn-sm" id="plus-btn"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                            </div>
						<a href="Javascript:void(0)" onclick="fn_add_cart('<?php echo $product_data['product_id']; ?>','','')" class="btn add">Add Cart</a>
                    </div>
				<?php // } } ?>	
            </div>
          </div>
        </div>
      </div>
      
      

      
      
      <div class="productinfo-tab">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
          <?php $product_data_related = $this->common_model->getProductData('v_product_review',array('status'=>'0','product_id'=>$pro_id),'4'); 
     
          if(!empty($product_data_related)){
              $var = count($product_data_related);
          }else{
               $var = '0';
          }
          
           
          ?>
          <li><a href="#tab-review" data-toggle="tab">Reviews (<?php echo $var; ?>)</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-description">
            <div class="cpt_product_description ">
              <div>
                <p> <?php echo substr($product_data['description'],0);  ?> </p>
              </div>
            </div>
            <!-- cpt_container_end --></div>
          <div class="tab-pane" id="tab-review">
            <form class="form-horizontal" enctype="multipart/form-data" method="post"  id="user_review_page" name="user_review_page" action="#">
              <div id="review"></div>
              <h2>Write a review</h2>
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label" for="input-review">Your Review</label>
                  <textarea name="text" rows="5" id="comment" name="comment" class="form-control"></textarea>
                  <div class="help-block"><span class="text-danger">Note:</span> Please Entered Your Valueable Review Comment!</div>
                </div>
              </div>
              <div class="form-group required">
                <div class="col-sm-12">
				<label class="control-label">Rating</label>
                  <div class="rating custome">
				 <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
				  <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
				  <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> 
				  <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> 
				  <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                     </div>
              </div>
              <div class="buttons clearfix">
                <div class="pull-right">
                  <button type="button" id="button-review" data-loading-text="Loading..." onclick="fn_review('<?php echo $pro_id; ?>')" class="btn btn-primary">Continue</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php $this->load->view("element/related_product.php");?>
<!--
<div class="container">
  <h3 class="client-title">Favourite Brands</h3>
  <h4 class="title-subline">The High Quality Products</h4>
  <div id="brand_carouse" class="owl-carousel brand-logo">
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand1.png'); ?>" alt="Disney" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand2.png'); ?>" alt="Dell" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand3.png'); ?>" alt="Harley" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand4.png'); ?>" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand5.png'); ?>" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand6.png'); ?>" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand7.png'); ?>" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand8.png'); ?>" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand9.png'); ?>" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/brand5.png'); ?>" alt="Canon" class="img-responsive" /></a> </div>
  </div>
</div> -->
<script>

function fn_product_price(weight_id,pro_id) { 
   // $('.preloader').show();
       $(".productpage-price").html('');
       $(".product_size_pro").html('');
        var data = {};
        data['action'] = 'change_price_weight_wise';
        data['weight_id'] = weight_id;
        data['pro_id'] = pro_id;
        $.ajax({
        type: 'post',
        url: '../ajaxcall',
        data: data,
        dataType: 'json',
        success: function(data) {
            console.log(data);
              $(".productpage-price").html(data.price);
              $(".product_size_pro").html(data.weight);
         
            $('.preloader').hide();
            // $('.alert-success').show();
            // $(".alert-success").html(data.message);
        },
        error: function(request, error) {
            swal("Something error");
            // $('.alert-danger').show();
            // $(".alert-danger").html(data.message);
             $('.preloader').hide();
        }
    });

    

}

  function fn_review(product_id) { 
<?php  $my_aa = isset($_SESSION['id']) ? $_SESSION['id'] : '';  
if($my_aa == '') { ?>

alert('Oops! You are not Sign in. Please Sign in');
window.location.reload();
 <?PHP } else {?>
    var valid = $("#user_review_page").valid();
        var data = {};
        data['action'] = 'insert_data';
         data['t_code'] = '7';
         data['comment'] = $("#user_review_page #comment").val();
         data['rating'] = $('input[name=rating]:checked', '#user_review_page').val();
         data['product_id'] = product_id;
        fn_ajax('POST', data, 'json', 'ajaxcall', 'message_data');
        $('#user_review_page').trigger("reset");
     window.top.location = window.top.location
   <?php     } ?>
     
   }
  </script>

<?php include("element/footer.php"); ?>