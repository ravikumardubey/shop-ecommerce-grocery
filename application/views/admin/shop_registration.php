<?php $this->load->view('admin/includes/top_header');

$userdata = $this->common_model->getList('v_shop_vendor',array('vendor_id'=>$_SESSION['vendor_id']));
 if(isset($userdata[0]['status'])=='1'){
      redirect('dashboard/vendor_kyc', 'refresh');

  }


?>
<?php $this->load->view('admin/includes/header');
?>
<!-- Page content -->
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-6">
    <div class="card">
    <div class="card-body">
<legend class="text-uppercase font-size-sm font-weight-bold">Shop Details</legend>
                        <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>
 <div class="alert alert-success" style="margin: 30px 30px 0px 30px; display:none;">
                </div>
                        <form id="shop_regisration_id" name="shop_regisration_id" action="#">


                                <div class="form-group">
                                    <div class="row">
                                        <!----SECTION - 1 ---->
                                        <div class="col-sm-6">
                                            <label class="d-block">Shop Category</label>
                                            <select class="form-control select-fixed-single" id="category_id" name="category_id" data-fouc>
                                               <option value="0" >Select Shop Image</option>
                                                    <?php  $v_shop_image = $this->common_model->getProductData('v_master_category', array('status' => '0'), '50'); 
                                                      foreach ($v_shop_image as $val) { ?>
                                                   
                                                    <option value="<?php echo $val['id'];  ?>" ><?php echo $val['name'];  ?></option>
                                                    
                                                    <?php } ?>
                                      
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="d-block">Shop Image</label>
                                            <select class="form-control select-fixed-single" id="shop_image" name="shop_image" data-fouc>
                                               <option value="0" >Select Shop Image</option>
                                                    <?php  $v_shop_image = $this->common_model->getProductData('v_vendor_image', array('status' => '0'), '50'); 
                                                      foreach ($v_shop_image as $val) { ?>
                                                   
                                                    <option value="<?php echo $val['image'];  ?>" ><?php echo $val['img_name'];  ?></option>
                                                    
                                                    <?php } ?>
                                      
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">Shop Image - 2</label>
                                            <select class="form-control select-fixed-single" id="shop_image2" name="shop_image2" data-fouc>
                                             <option value="0" >Select Shop Image - 2</option>
                                                    <?php  $v_shop_image = $this->common_model->getProductData('v_vendor_image', array('status' => '0'), '50'); 
                                                      foreach ($v_shop_image as $val) { ?>
                                                   
                                                    <option value="<?php echo $val['image'];  ?>" ><?php echo $val['img_name'];  ?></option>
                                                    <?php } ?>
                                             
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Shop Name</label>
                                            <input type="text" placeholder="Enter Shop Name"
                                                   class="form-control required" id="shop_name" name="shop_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Shop Address</label>
                                            <input type="text" placeholder="Enter Shop Address"
                                                   class="form-control required" id="v_shop_address" name="v_shop_address">
                                        </div>

                                        <div class="col-sm-6">
                                        <label class="d-block">State</label>
                                         <select class="form-control select-fixed-single" id="loc_state" name="loc_state" onChange="getCity(this.value);" data-fouc>
                                                <option value="0">Select State</option>
                                                <?php $loc_data = $this->common_model->getProductData('v_master_state', array('status' => '0'), '50');   
                                  
                            if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) {?>
        <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
   <?php     }}?>
      </select>
                                           
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="d-block">City</label>
                                       <select class="form-control select-fixed-single" id="loc_city" name="loc_city" data-fouc>
                                                <optgroup label="Select City">
                                                    <option value="0">Select City</option>
                                                   
                                                </optgroup>
                                            </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Pincode</label>
                                        <input type="text" placeholder="Enter Pincode"
                                               class="form-control required" id="pincode" name="pincode">
                                    </div>
                                    <div class="col-sm-6">
                                            <label>Shop Area Name</label>
                                            <input type="text" placeholder="Enter Shop Area Name"
                                                   class="form-control required" id="area" name="area">
                                        </div>

                                    <div class="col-sm-6">
                                        <label>Opening Time</label>
                                        <input type="time" placeholder="Enter open Time"
                                               class="form-control required" id="open_time" name="open_time">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Closing Time</label>
                                        <input type="time" placeholder="Enter Closing Time"
                                               class="form-control required" id="close_time" name="close_time">
                                    </div>
                                        <div class="col-sm-6">
                                            <label>Distance</label>
                                            <input type="type" placeholder="Enter Distance"
                                                   class="form-control required" id="distance" name="distance">
                                        </div>



                                    </div>
                                </div>
                            <div class="text-right">
                           <button type="button" class="btn btn-primary" onclick="fn_shop_registration()" value="Submit">Submit<i class="icon-paperplane ml-2"></i></button>
  
                            </div>

                        </form>
                    </div>
    </div>
</div>

    </div>
</div>
<!----e content -->


        <?php $this->load->view('admin/includes/footer');?>

        <div id="data_json_div" style="display:none;"></div>

  <!----e content -->


<script src="../public/global_assets/js/main/common.js"></script>
</body>
<script>
    
    function getCity(val,city_val) {
    var data = {};
        data['action'] = 'loc_model';
        data['loc_state'] = 'state_id='+val;
         data['city_val'] = city_val;

	$.ajax({
		type: "POST",
		url: "../ajaxcall",
		 data: data,
		beforeSend: function() {
		    
			$("#loc_city").addClass("loader");
		},
		success: function(data){
		 
			$("#loc_city").html(data);
	
			$("#loc_city").removeClass("loader");
		}
	});
}

     function fn_shop_registration() { 
       // alert('sssss');
    var valid = $("#shop_regisration_id").valid();
   
        var data = {};
        data['action'] = 'insert_data';
         data['t_code'] = '16';
         data['category_id'] = $("#shop_regisration_id #category_id").val();
         data['shop_image'] = $("#shop_regisration_id #shop_image").val();
         data['shop_image_2'] = $("#shop_regisration_id #shop_image2").val();
         data['v_shop_name'] = $("#shop_regisration_id #shop_name").val();
         data['v_shop_address'] = $("#shop_regisration_id #v_shop_address").val();
         data['v_shop_state'] = $("#shop_regisration_id #loc_state").val();
         data['v_shop_city'] = $("#shop_regisration_id #loc_city").val();
          data['v_shop_pincode'] = $("#shop_regisration_id #pincode").val();
           data['v_shop_area'] = $("#shop_regisration_id #area").val();
           data['open_time'] = $("#shop_regisration_id #open_time").val();
           data['closing_time'] = $("#shop_regisration_id #close_time").val();
             data['lat_log'] = $("#shop_regisration_id #distance").val();
        data['status'] = '1';
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
        $('#shop_regisration_id').trigger("reset");
       location.reload();
      
    }
 
    
    
</script>
</html>