<!DOCTYPE html>
<html lang="en">

<head>
<title>Gomores.com</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<!--<meta name="description" content="Gomores.com is online shoping portal which is based on made in india, local shop to vocal shop objetives with high determination., online shoping, shoping shop,shoping store,dress shoping/>-->
<!--<meta name="keywords" content="Gomores, Gomores.com, online shoping, shoping shop,shoping store,dress shoping,about us" />-->
<!--<meta name="robots" content="index, follow" />-->
<!--<meta name="googlebot" content="index, follow" />-->
 <?php $my_aa = isset($_SESSION['id']) ? $_SESSION['id'] : '';
if($my_aa == '') { 
redirect('login', 'refresh');
} ?>
<style>
.container_ddd {   
    width: 100%;
background:#f3f7f8;
padding: 20px 30px;
border-radius: 5px;
border: 1px solid #90EE90;
margin-bottom: 10px;
}

.edit-btn{
   background-color:#32CD32;
   padding: 7px;
    color: #ffffff;
    border-radius: 3px;
    text-align: center;
}

</style>
<?php $this->load->view('includes/top_header'); 
?>
<body class="about">
<?php $this->load->view('includes/header'); $this->load->view('includes/navbar'); ?>
<!--<div class="breadcrumb parallax-container">-->
<!--  <div class="parallax"><img src="public/image/prlx.jpg" alt="#"></div>-->
<!--  <h1>Address Book</h1>-->
<!--  <ul>-->
<!--    <li><a href="<?php echo base_url(); ?>">Home</a></li>-->
<!--    <li><a href="<?php echo base_url(); ?>aboutus">Address Book</a></li>-->
<!--  </ul>-->
<!--</div>-->



<div class="container">
  <div class="row">
    <<div class="col-sm-3 hidden-xs column-left" id="column-left">
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
      <h3 class="about-title">Address Book</h3>
      <p class="text-center about-desc">Gomores.com is a user friendly shopping portal in which customers can order their desired products and sit at home,We provide customers with home delivery services keeping in mind the convenience. 
So that the customer does not have to face the crowded area nor more pollution also</p>
<div class="container_ddd">
    <?php $user_id=$_SESSION['user_id'];
     $address_book = $this->common_model->getProductData('v_users_address', array('status' => '0','user_id'=>$user_id,'address_type'=>'1'), '50');   ?> 
    <h2>Billing Adderess</h2>
      <?php                  if (!empty($address_book) && is_array($address_book)){
    foreach ($address_book as $val) {     ?>
           <h3><input type="radio" name="billing_address" id="billing_address"  onclick="fn_biling_change('<?php echo $val['id']; ?>','<?php echo $val['address1']; ?>','<?php echo $val['address2']; ?>')" <? if ($address_book[0]['id'] == $val['id']){ echo 'checked'; } ?> >&nbsp;<?php echo $val['address1']."&nbsp;".$val['address2']; ?> <div class="col-sm-12 billing_add" align="right" id="<?php echo $val['id']; ?>"><button type="button" data-toggle="modal" data-target=".modal"  class="edit-btn" data-toggle="tooltip" data-placement="top"  title="Edit Billing Address"  ><i class="fa fa-pencil"></i>Edit</button></div></h3>
<?php } }?>

    </div>
    <div class="container_ddd">
    <?php $user_id=$_SESSION['user_id'];
     $address_book = $this->common_model->getProductData('v_users_address', array('status' => '0','user_id'=>$user_id,'address_type'=>'2'), '50');   ?> 
    <h2>Shipping Adderess</h2>
      <?php                  if (!empty($address_book) && is_array($address_book)){
    foreach ($address_book as $val) {     ?>
           <h3><input type="radio" name="shipping_address" id="shipping_address" onclick="fn_shipped_change('<?php echo $val['id']; ?>','<?php echo $val['address1']; ?>','<?php echo $val['address2']; ?>')" <? if ($address_book[0]['id'] == $val['id']){ echo 'checked'; } ?> >&nbsp;<?php echo $val['address1']."&nbsp;".$val['address2']; ?><div class="col-sm-12 shipped_add" align="right" id="<?php echo $val['id']; ?>"> <button type="button"  data-toggle="modal" data-target=".modal" class="edit-btn" data-toggle="tooltip" data-placement="top"  title="Edit Shipped Address"  ><i class="fa fa-pencil"></i>Edit</button></div></h3>
           
<?php } }?>

    </div>


    </div>
   
  </div>
   <div class="col-sm-9" id="content">
      <div class="row">
      <h3 class="about-title">Address Book</h3>
      <p class="text-center about-desc">Gomores.com is a user friendly shopping portal in which customers can order their desired products and sit at home,We provide customers with home delivery services keeping in mind the convenience. 
So that the customer does not have to face the crowded area nor more pollution also</p>
<div class="container_ddd">
    <?php $user_id=$_SESSION['user_id'];
     $address_book = $this->common_model->getProductData('v_users_address', array('status' => '0','user_id'=>$user_id,'address_type'=>'1'), '50');   ?> 
    <h2>Billing Adderess</h2>
      <?php                  if (!empty($address_book) && is_array($address_book)){
    foreach ($address_book as $val) {     ?>
           <h3><input type="radio" name="billing_address" id="billing_address"  onclick="fn_biling_change('<?php echo $val['id']; ?>','<?php echo $val['address1']; ?>','<?php echo $val['address2']; ?>')" <? if ($address_book[0]['id'] == $val['id']){ echo 'checked'; } ?> >&nbsp;<?php echo $val['address1']."&nbsp;".$val['address2']; ?> <div class="col-sm-12 billing_add" align="right" id="<?php echo $val['id']; ?>"><button type="button" data-toggle="modal" data-target=".modal"  class="edit-btn" data-toggle="tooltip" data-placement="top"  title="Edit Billing Address"  ><i class="fa fa-pencil"></i>Edit</button></div></h3>
<?php } }?>

    </div>
    <div class="container_ddd">
    <?php $user_id=$_SESSION['user_id'];
     $address_book = $this->common_model->getProductData('v_users_address', array('status' => '0','user_id'=>$user_id,'address_type'=>'2'), '50');   ?> 
    <h2>Shipping Adderess</h2>
      <?php                  if (!empty($address_book) && is_array($address_book)){
    foreach ($address_book as $val) {     ?>
           <h3><input type="radio" name="shipping_address" id="shipping_address" onclick="fn_shipped_change('<?php echo $val['id']; ?>','<?php echo $val['address1']; ?>','<?php echo $val['address2']; ?>')" <? if ($address_book[0]['id'] == $val['id']){ echo 'checked'; } ?> >&nbsp;<?php echo $val['address1']."&nbsp;".$val['address2']; ?><div class="col-sm-12 shipped_add" align="right" id="<?php echo $val['id']; ?>"> <button type="button"  data-toggle="modal" data-target=".modal" class="edit-btn" data-toggle="tooltip" data-placement="top"  title="Edit Shipped Address"  ><i class="fa fa-pencil"></i>Edit</button></div></h3>
           
<?php } }?>

    </div>


    </div>
   
  </div>
</div>

 <div id="modal_form_vertical" class="modal fade bd-example-modal-lg fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-body modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Addresss</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							
         <div class="modal-body " >
  
       <form enctype="multipart/form-data" id="addressbook" name="addressbook"  method="post" autocomplete="false" >
           <input type="hidden" id="hidden_page_id" name="hidden_page_id" />
									
					
								<div class="form-group" >
								    <div class="col-sm-12">
								
          
            <label for="address1">Address 1</label>
            <input type="text" class="form-control" id="address1" name="address1">
          
         </div>
         </div>
           <div class="form-group">
								    <div class="col-sm-12">
								
          
            <label for="address2">Address 2</label>
            <input type="text" class="form-control" id="address2" name="address2">
          
         </div>
         </div>
         
        </form>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="fn_address_update()" >Save</button>
      </div>
    </div>
    </div>
    </div>
    </div>
</div>
</div>
	</div>
	</div>

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
<?php $this->load->view('includes/footer'); ?>

</body>
</html>
<!-- Footer block End  --> 
<script type="text/javascript">
$(document).ready(function(){ 
    //  $("input[type='radio']").change(function(){ if($(this).val()=="checked") { $(".billing_add").show(); } else { $(".billing_add").hide(); } });
    $(".billing_add").hide();
     $(".shipped_add").hide();
});

	function fn_biling_change(id,baddress1,baddress2){
	      
	    $(".billing_add").hide();
	      $('#'+id).show();
	      $("#addressbook #hidden_page_id").val(id);
	      $("#address1").val(baddress1);
	        $("#address2").val(baddress2);
	        
	        
	}
	
	function fn_shipped_change(id,saddress1,saddress2){
	      $("#hidden_page_id").val(id);
	 
	    $(".shipped_add").hide();
	      $('#'+id).show();
	     $("#addressbook #hidden_page_id").val(id);
	        $("#addressbook #address1").val(saddress1);
	        $("#addressbook #address2").val(saddress2);
	}
	
	
	function fn_address_update(){
	    
	     var data = {};
        data['action'] = 'update_data';
         data['t_code'] = '24';
           data['hidden_page_id'] = $("#addressbook #hidden_page_id").val();
         data['address1'] = $("#addressbook #address1").val();
         data['address2'] = $("#addressbook #address2").val();
             
        fn_ajax('POST', data, 'json', 'ajaxcall', 'message_data');
      history.go(0);
	}

</script> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jQuery.html"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.html"></script>