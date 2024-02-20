<?php include("element/top-header.php");
include("element/header.php");
include("element/sidemenu.php");
include("element/nav.php");
include("element/modal.php");

?>
<?php 

$my_aa = isset($_SESSION['id']) ? $_SESSION['id'] : '';
if($my_aa == '') { 
redirect('login', 'refresh');
}

 ?>
<link href="<?php echo base_url('public/css/profile.css'); ?>" rel="stylesheet">
<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="public/image/prlx.jpg" alt="#"></div>
  <h1>My Account</h1>
  <ul>
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="#">Account</a></li>
    <li><a href="profile">My Account</a></li>
  </ul>
</div>
<div class="col-xs-12 header-right search" style="margin-top: -17px; margin-left: 0px;">
        <!--   <div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
 <input type="text" class="form-control" placeholder="Search"> 
  </div>-->
        
      </div>
<div id="center">
  <div class="container">
    <div class="row">
      <div class="content col-sm-12" style="min-height:0px;">
       
       <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class=" user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600" style="color:#fff;"><?php echo ucfirst($_SESSION['f_name']); ?>&nbsp;<?php echo ucfirst($_SESSION['l_name']); ?></h6>
                               <button type="button" class="btn btn-success btn-sm">Edit</button> </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $_SESSION['email_id']; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><?php echo $_SESSION['primary_mobile']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                       <?php  
                                       $v_verify = $this->common_model->getList('v_users', array('status' => '0','user_id' => $_SESSION['user_id']));
                                       if($v_verify[0]['mobile_status'] == '1'){ ?>
                                       <i class="fa fa-check-circle" style="color:green" aria-hidden="true">Verify</i>
                                     <?php  }else{ ?>
                                     <i class="fa fa-times-circle" style="color:red">Not Verify</i>
<?php                                     } ?>
                                        </h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Birthday</p>
                                        <?php 
                                        $v_birth = $this->common_model->getList('v_users', array('status' => '0','user_id' => $_SESSION['user_id']));
                                        if (!empty($v_birth) && is_array($v_birth)) {
    foreach ($v_birth as $val) { 
      $timestamp = strtotime($val['dob']);
   $new_date = date("d-m-Y", $timestamp);

    
    ?>
                                        <h6 class="text-muted f-w-400"><?php echo $new_date; ?></h6>
                                        
                                        <?php }}else{ ?>
                                             <h6 class="text-muted f-w-400"><?php echo "Not Available"; ?></h6>
                                        
                                     <?php   }?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Gender</p>
                                        <?php 
                                        $v_gender = $this->common_model->getList('v_users', array('status' => '0','user_id' => $_SESSION['user_id'] ));
                                        if (!empty($v_gender) && is_array($v_gender)) {
    foreach ($v_gender as $val) { ?>
                                        <h6 class="text-muted f-w-400"><?php echo $val['gender']; ?></h6>
                                        
                                        <?php }}else{ ?>
                                             <h6 class="text-muted f-w-400"><?php echo "Not Available"; ?></h6>
                                        
                                     <?php   }?>
                                    </div>
                                </div>
                               <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Billing Address</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Recent</p>
                                        <?php 
                                        $v_billing = $this->common_model->getList('v_users_address', array('status' => '0','user_id' => $_SESSION['user_id'], 'address_type' => '1' ));
                                        if (!empty($v_billing) && is_array($v_billing)) {
    foreach ($v_billing as $val) { ?>
                                        <h6 class="text-muted f-w-400"><?php echo $val['address1'] . $val['address2']	; ?></h6>
                                        
                                        <?php }}else{ ?>
                                             <h6 class="text-muted f-w-400"><?php echo "Not Available"; ?></h6>
                                        
                                     <?php   }?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">State</p>
                                        <?php 
                                        $v_billing_r = $this->common_model->getList('v_users_address', array('status' => '0', 'user_id' => $_SESSION['user_id'], 'address_type' => '1' ));
                                        if (isset($v_billing_r) && is_array($v_billing_r) && $v_billing_r == '0') {
    foreach ($v_billing_r as $val) {
    
    $r_state = $this->common_model->getProductData('v_master_state', array('status' => '0','id' => '13' ), '50');
  
    ?>
                                        <h6 class="text-muted f-w-400"><?php echo $r_state[0]['name']; ?></h6>
                                        
                                        <?php }}else{
                                        echo "Not Available";
                                        }?>
                                        
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">City</p>
                                        <?php 
                                        $v_billing = $this->common_model->getList('v_users_address', array('status' => '0','user_id' => $_SESSION['user_id'], 'address_type' => '1'));
                                        if (isset($v_billing) && is_array($v_billing) && $v_billing == '0') {
    foreach ($v_billing as $val) { 
 $r_city = $this->common_model->getProductData('v_master_city', array('status' => '0','id' => $val['city'] ), '50');
    ?>
                                        <h6 class="text-muted f-w-400"><?php echo $r_city[0]['name']; ?></h6>
                                        
                                        <?php }}else{
                                        echo "Not Available";
                                        }?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Pincode</p>
                                        <?php 
                                        $v_billing_r = $this->common_model->getList('v_users_address', array('status' => '0','user_id' => $_SESSION['user_id'], 'address_type' => '1'));
                                        if (isset($v_billing_r) && is_array($v_billing_r) && $v_billing_r != '0') {
    foreach ($v_billing_r as $val) { ?>
                                        <h6 class="text-muted f-w-400"><?php echo $val['pincode']; ?></h6>
                                        
                                        <?php }}else{
                                        echo "Not Available";
                                        }?>
                                        
                                    </div>
                                </div>
                                
                                 <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Shipping Address</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Recent</p>
                                        <?php 
                                        $v_shipped = $this->common_model->getList('v_users_address', array('status' => '0','user_id' => $_SESSION['user_id'], 'address_type' => '2'));
                                        if (!empty($v_shipped) && is_array($v_shipped)) {
    foreach ($v_shipped as $val) { ?>
                                        <h6 class="text-muted f-w-400"><?php echo $val['address1'] . $val['address2']; ?></h6>
                                        
                                        <?php }}else{
                                        echo "Not Available";
                                        }?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">State</p>
                                       <?php 
                                        $v_shipped = $this->common_model->getList('v_users_address', array('status' => '0','user_id' => $_SESSION['user_id'], 'address_type' => '2'));
                                        if (!empty($v_shipped) && is_array($v_shipped) && $v_shipped != '0') {
    foreach ($v_shipped as $val) { 
    $s_state = $this->common_model->getProductData('v_master_state', array('status' => '0','id' => '13' ), '50');
    ?>
                                        <h6 class="text-muted f-w-400"><?php echo $s_state[0]['name']; ?></h6>
                                        
                                        <?php }}else{
                                        echo "Not Available";
                                        }?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">City</p>
                                        <?php 
                                        $v_shipped = $this->common_model->getList('v_users_address', array('status' => '0','user_id' => $_SESSION['user_id'], 'address_type' => '2'));
                                       
                                        if (!empty($v_shipped) && is_array($v_shipped) && $v_shipped != '0') {
    foreach ($v_shipped as $val) {
  
     $s_city = $this->common_model->getProductData('v_master_city', array('status' => '0','id' => $val['city'] ), '50');
    ?>
                                        <h6 class="text-muted f-w-400"><?php echo $s_city[0]['name']; ?></h6>
                                        
                                        <?php }}else{
                                        echo "Not Available";
                                        }?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Pincode</p>
                                       <?php 
                                        $v_shipped = $this->common_model->getList('v_users_address', array('status' => '0','user_id' => $_SESSION['user_id'], 'address_type' => '2'));
                                        if (!empty($v_shipped) && is_array($v_shipped) && $v_shipped != '0' ) {
    foreach ($v_shipped as $val) { ?>
                                        <h6 class="text-muted f-w-400"><?php echo $val['pincode']; ?></h6>
                                        
                                        <?php }}else{
                                        echo "Not Available";
                                        }?>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<style>
    .box_rrr{
        margin-bottom:10px;
    }
    
    .user-profilesss{
        width: 273px;
    height: 131px;
    border-radius: 5px;
    }
    
    @media only screen and (max-width: 990px){
       .user-profilesss{
        width: 150px;
    height: 80px;
    border-radius: 3px;
    } 
    
    .cardss{
        margin-bottom:80px;
    }
    }
    
    @media only screen and (max-width: 600px) {
  .pro {font-size: 28px !important;
      color: #FFE77AFF;
  }
  .text{
      font-size: 8.5px;
  }
  .box_rrr{
      
  }
}

/* Small devices (portrait tablets and large phones, 600px and up) */

}
</style>
<div class="container cardss">
<div class="row">
            <div class="col-md-12">
                <div class=" user-card-full">
                    <div class="box_rrr col-md-3 col-sm-6 col-xs-6" data-toggle="modal" data-target="#myModal">
<div class="col-sm-3 bg-c-lite-green user-profilesss">
    
                            <div class="card-block text-center text-white">
                                <i class="fa fa-map-marker pro" style="font-size: 50px; color: #FFE77AFF" aria-hidden="true"></i>
                                <h6 class="f-w-600 text" style="color:#fff;">Address Change</h6>
                                
                                </div>
                        </div>
                         </div>
                        <div class="box_rrr col-md-3 col-sm-6 col-xs-6" data-toggle="modal" data-target="#tran_history">
                        <div class="col-sm-3 bg-c-lite-green user-profilesss">
                            <div class="card-block text-center text-white">
                                <i class="fa fa-university pro" style="font-size: 50px; color: #FFE77AFF" aria-hidden="true"></i>
                                <h6 class="f-w-600 text" style="color:#fff;">Transction History</h6>
                              </div>
                        </div>
                         </div>
                      <a href="<?php echo base_url(); ?>orderhistory" ?> <div class="box_rrr col-md-3 col-sm-6 col-xs-6" >
                        <div class="col-sm-3 bg-c-lite-green user-profilesss">
                            <div class="card-block text-center text-white">
                               <i class="fa fa-first-order pro" style="font-size: 50px; color: #FFE77AFF"aria-hidden="true"></i>
                                <h6 class="f-w-600 text" style="color:#fff;">Order History</h6>
                                </div>
                        </div>
                         </div></a>
                        <div class="box_rrr col-md-3 col-sm-6 col-xs-6" data-toggle="modal" data-target="#notification">
                        <div class="col-sm-3 bg-c-lite-green user-profilesss">
                            <div class="card-block text-center text-white">
                                <i class="fa fa-bell pro" style="font-size: 50px; color: #FFE77AFF" aria-hidden="true"></i>
                                <h6 class="f-w-600 text" style="color:#fff;">Notification</h6>
                               </div>
                        </div>

</div>
 </div> </div>

</div>

</div>



  <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="z-index:9999;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Billing Address</h4>
        </div>
        <div class="modal-body">
            <?php $user_id=$_SESSION['user_id'];
     $address_book = $this->common_model->getProductData('v_users_address', array('user_id'=>$user_id,'address_type'=>'1'), '50');                    if (!empty($address_book) && is_array($address_book)){
   
    
    foreach ($address_book as $val) {   ?>
          <div class="row">
        <div class="col-md-12">
           <div class="form cf">
                <?php
               
                $color_class =  'red';
               if ($val['status'] == '1'){ $color_class =  'green'; } ?>
			  <div class="plan cf  text-addresh">
			      
				<input <?php if ($val['status'] == '0'){ echo 'checked'; } ?> type="radio" name="billing_address" id="billing_address" onchange="fn_shipped_change('<?php echo $val['id']; ?>','<?php echo $user_id; ?>','<?php echo $val['address_type']; ?>')" >
				<label class="free-label four col" for="billing_address">Address</label>
				<div class="addresh-select">
				<strong style="color:#077c10; font-weight:600;"><?php echo $val['address1']."&nbsp;".$val['address2']; ?></strong>
				
				</div>
				</div>
				
			  </div>
        </div>
    </div>
	<div class="row pad-15">
               
                <div class="col-sm-4 col-xs-12">
                    <button onclick="fn_add_edit_deleverd('Edit_deleverd_address','1','edit','<?php echo $val['id']; ?>','<?php echo $val['address1']; ?>','<?php echo $val['address1']; ?>')" class="btn btn-success">Edit Delivery</a>
                </div>
                
            </div>
            <?php }   }?>
           
              <h4 class="modal-title">Shipping Address</h4> 
            <div class="row pad-15 buttons_add_shipp">
               
                             <div class="col-sm-4 col-xs-12">
                    <button onclick="fn_add_edit_deleverd('add_deleverd_address','2','add','','','')" class="btn btn-success">Add Delivery</a>
                </div>
            </div>
            <?php $user_id=$_SESSION['user_id'];
     $address_book = $this->common_model->getProductData('v_users_address', array('user_id'=>$user_id,'address_type'=>'2'), '50');              
     if (!empty($address_book) && is_array($address_book)){
    foreach ($address_book as $val) { 
        if($val['status'] !== '2') {
    $n = rand(10,100); 
    ?>
    
			<div class="row">
			<div class="col-md-12">
           <div class="form cf">
			  <div class="plan cf  text-addresh">
				<input <?php if ($val['status'] == '0'){ echo 'checked'; } ?> type="radio" name="shipping_address" id="billing_address_<?php echo $n?>" onchange="fn_shipped_change('<?php echo $val['id']; ?>','<?php echo $user_id; ?>','<?php echo $val['address_type']; ?>')" > 
				<label class="free-label four col" for="billing_address_<?php echo $n?>">Address</label>
				<div class="addresh-select">
				<strong style="color:#077c10; font-weight:600;"><?php echo $val['address1']."&nbsp;".$val['address2']; ?></strong>
				 
				</div>
				</div>
				
			  </div>
        </div>
        <div class="row pad-15 buttons_add_shipp">
                <div class="col-sm-4 col-xs-12">
                     <button onclick="fn_add_edit_deleverd('Edit_deleverd_address','2','edit','<?php echo $val['id']; ?>','<?php echo $val['address1']; ?>','<?php echo $val['address1']; ?>')" class="btn btn-success">Edit Delivery</a>
               
                </div>
                 <div class="col-sm-4 col-xs-12">
                     <button onclick="fn_delete_addd('<?php echo $val['id']; ?>','24')" class="btn btn-danger">Delete Address</button>
                     
                </div>
            </div>
           
		
		
			</div>
			 <?php }  } }
?>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Save Changes</button>
         </div>
      </div>
      
    </div>
  </div>
  
  
  
  
<!--- Modal Transction History --->
  <div class="modal" id="edit_add_deliverd_address" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Shipping Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="add_edit_form_id" name="add_edit_form_id" action="POST">
      <div class="modal-body">
      
               <input type="hidden" required="" name="action" id="action" >
               <input type="hidden" required="" name="address_type" id="address_type" >
               <input type="hidden" required="" name="add_edit" id="add_edit" >
                <input type="hidden" required="" name="address_id" id="address_id" >
                
                <div class="form-group">
    <label for="address1"> address 1</label>
    <input type="email" class="form-control" id="address1" name="address1" placeholder="Enter address1">
  </div>
  
  <div class="form-group">
    <label for="address1"> address 2</label>
    <input type="email" class="form-control" id="address2" name="address2" placeholder="Enter address2">
  </div>
  
          <div class="form-group required hidden_class" style="display: none;">
                                                <label for="input-email" >State</label>

                                               
                                                    <select class="form-control select-fixed-single" id="loc_state"
                                                        name="loc_state" onChange="getCity(this.value);" data-fouc>
                                                        <option value="0">Select State</option>
                                                        <?php $loc_data = $this->common_model->getProductData('v_master_state', array('status' => '0', 'id'=> '13'), '50');

if (!empty($loc_data) && is_array($loc_data)) {
    foreach ($loc_data as $val) {?>
                                                        <option value="<?php echo $val['id']; ?>">
                                                            <?php echo $val['name']; ?></option>
                                                        <?php }}?>
                                                    </select>
                                                    </select>
                                                
                                            </div>
                                            <div class="form-group required hidden_class " style="display: none;">
                                                <label for="input-email" >City</label>

                                                
                                                    <select class="form-control select-fixed-single" id="loc_city"
                                                        name="loc_city" data-fouc>
                                                        <optgroup label="Select City">
                                                            <option value="0">Select City</option>

                                                        </optgroup>
                                                    </select>
                                                
                                            </div>
                                            <div class="form-group required hidden_class" style="display: none;">
                                                <label for="postcode" >Post Code</label>
                                                
                                                    <input type="text" class="required form-control"
                                                        id="postcodess" placeholder="Post Code" value=""
                                                        name="postcode_biling">
                                                </div
                                            </div>

  
  
      </div>
      
      
      <div class="modal-footer">
        <button type="button" onclick="fn_add_edit_change()" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>
  </div>
</div>
  




<script type="text/javascript">
$(document).ready(function(){
  $('.hidden_class').hide();

});

function fn_add_edit_deleverd(action,address_type,add_edit,address_id,address1,address2) {
    if(action == 'add_deleverd_address'){
        $('.hidden_class').show();
    }else{
       $('.hidden_class').hide();
    }
    
    $("#add_edit_form_id #action").val(action);
     $("#add_edit_form_id #address_id").val(address_id);
       $("#add_edit_form_id #address_type").val(address_type);
    $("#add_edit_form_id #add_edit").val(add_edit);
    $("#add_edit_form_id #address1").val(address1);
    $("#add_edit_form_id #address2").val(address2);
    $("#edit_add_deliverd_address").modal('show');
    
    
}




	function fn_add_edit_change(){
	    var data = {};
        data['action'] = $("#add_edit_form_id #action").val();
        data['id'] = $("#add_edit_form_id #address_id").val();
        data['address_type'] = $("#add_edit_form_id #address_type").val();
        data['add_edit'] =$("#add_edit_form_id #add_edit").val();
        data['address1'] =$("#add_edit_form_id #address1").val();
        data['address2'] =$("#add_edit_form_id #address2").val();
        data['loc_state'] =$("#add_edit_form_id #loc_state").val();
        data['loc_city'] =$("#add_edit_form_id #loc_city").val();
        data['postcodess'] =$("#add_edit_form_id #postcodess").val();
        
        
    $.ajax({
        type: 'POST',
        url: 'ajaxcall',
        data: data,
        dataType: 'html',
        success: function(data) {
            $('.load_container').hide();
              var obj = JSON.parse(data);
                swal(obj.message, "success");
               location.reload();
              
        },
        error: function(request, error) {
            swal("Something Error", "error");
            $('.load_container').hide();
        }
    });
	}
	
	function fn_shipped_change(id,user_id,address_type){
    var data = {};
    data['action'] = 'deleverd_address';
    data['id'] = id;
     data['user_id'] = user_id;
      data['address_type'] = address_type;
    $.ajax({
        type: 'POST',
        url: 'ajaxcall',
        data: data,
        dataType: 'html',
        success: function(data) {
            $('.load_container').hide();
              var obj = JSON.parse(data);
              console.log(obj);
              
        },
        error: function(request, error) {
            swal("Something Error", "error");
            $('.load_container').hide();
        }
    });
   
	  
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

<?php include("element/footer.php"); ?>