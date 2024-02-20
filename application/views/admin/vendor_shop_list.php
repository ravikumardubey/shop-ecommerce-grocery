
<?php $this->load->view('admin/includes/top_header');?>
<?php $this->load->view('admin/includes/header');

?>
<!-- Page content -->
<div class="page-content">
        <?php $this->load->view('admin/includes/sidebar');?>
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Vendor Shop List
                        </span> - List</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="announcement_group" class="breadcrumb-item">Vendor Shop List</a>
                    </div>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <!-- Basic datatable -->

            <div class="card">

                <div class="alert alert-success" style="margin: 30px 30px 0px 30px; display:none;">
                </div>
                <div class="card-header header-elements-inline">

                    <h5 class="card-title">Vendor Shop List</h5>
                    <div class="header-elements">
                        <button type="button" id="add_popup" class="btn btn-primary">
                            <i class="icon-eye-plus mr-6 icon-4x"></i> Add
                        </button>
                    </div>
                </div>
                <table class="table" id="detailsList">
                    <thead>
                        <tr>
                            <th>Sr. No. </th>
                            <th>Shop Name</th>
                            <th>Shop Address</th>
                            <th>Shop state</th>
                            <th>Shop city</th>
                            <th>Shop Pincode</th>
                            <th>Shop Area</th>
                            <th>Shop ID</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="html_listing_data">
                    </tbody>
                </table>
            </div>
            <!-- /basic datatable -->
            <!-- Vertical form modal -->
            <div id="modal_id" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> <span id="add_edit_span"> </span> Vendor Shop List </h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>
<form id="page_form_id" name="page_form_id" action="post">
    <!--<input type="hidden" id="hidden_page_id" name="hidden_page_id" />-->

  <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <!----SECTION - 1 ---->
                                         <div class="col-sm-6">
                                            <label class="d-block">Vendor</label>
                                            <select class="form-control select-fixed-single" id="vendor_id" name="vendor_id" data-fouc>
                                                <option value="0" >Select Vendor</option>
                                                <?php $loc_data = $this->common_model->getProductData('v_vendor', array('status' => '0'), '50');   
                                  
                            if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) {?>
        <option value="<?php echo $val['vendor_id'];?>"><?php echo $val['f_name'].'&nbsp'.$val['l_name'];?></option>
   <?php     }}?>
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="col-sm-6">
                                            <label class="d-block">Category</label>
                                            <select class="form-control select-fixed-single" id="category_id" name="category_id" data-fouc>
                                                <option value="0" >Select Category</option>
                                                <?php $loc_data = $this->common_model->getProductData('v_master_category', array('status' => '0'), '50');   
                                  
                            if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) {?>
        <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
   <?php     }}?>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="d-block">Shop Image</label>
                                            <select class="form-control select-fixed-single" id="shop_image" name="shop_image" data-fouc>
                                               
                                                    <option value="0" >Select Shop Image</option>
                                                    <?php $loc_data = $this->common_model->getProductData('v_vendor_image', array('status' => '0'), '50');   
                                  
                            if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) {?>
        <option value="<?php echo $val['image'];?>"><?php echo $val['img_name'];?></option>
   <?php     }}?>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">Shop Image 2</label>
                                            <select class="form-control select-fixed-single" id="shop_image_2" name="shop_image_2" data-fouc>
                                                
                                                   <option value="0" >Select Shop Image 2</option>
                                                   <?php $loc_data = $this->common_model->getProductData('v_vendor_image', array('status' => '0'), '50');   
                                  
                            if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) {?>
        <option value="<?php echo $val['image'];?>"><?php echo $val['img_name'];?></option>
   <?php     }}?>
                                                </optgroup>
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
                                                   class="form-control required" id="shop_address" name="shop_address">
                                        </div>

                                       <div class="col-sm-6">
                                            <label class="d-block">State</label>
                                             
                                            <select class="form-control select-fixed-single" id="loc_state" name="loc_state" onChange="getCitysssss(this.value);" data-fouc>
                                                <option value="0">Select State</option>
                                                <?php $loc_data = $this->common_model->getProductData('v_master_state', array('status' => '0'), '50');   
                                  
                            if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) {?>
        <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
   <?php     }}?>
      </select>
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
                                        <label>Area Name</label>
                                        <input type="text" placeholder="Enter Area Name"
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
                                    
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <div id="button_add_update"></div>
                            </div>
</div>
                        </form>
                        
                    </div>
                </div>
            
            <!-- /vertical form modal -->


        </div>
        <!-- /content area -->

        <?php $this->load->view('admin/includes/footer');?>

        <div id="data_json_div" style="display:none;"></div>

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
<script>
$(document).ready(function() {
    $('#detailsList').DataTable();
});
ajax_function_list();

function ajax_function_list() {
    $('.load_container').show();
    var data = {};
    data['action'] = 'v_shop_vendor';
    $(document).ready(function() {
        table_list('POST', '../ajaxcall', data, 'html', 'html_listing_data', 'detailsList');
    });
}
function getCitysssss(val) {
    var data = {};
        data['action'] = 'loc_model';
        data['loc_state'] = 'state_id='+val;

	$.ajax({
		type: "POST",
		url: '../ajaxcall',
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

function fn_add() {

    var valid = $("#page_form_id").valid();
    if (valid) {
          var data = {};
      data['action'] = 'insert_data';
        data['t_code'] = '16';
         data['vendor_id'] = $("#page_form_id #vendor_id").val();
        data['category_id'] = $("#page_form_id #category_id").val();
        data['shop_image'] = $("#page_form_id #shop_image").val();
        data['shop_image_2'] = $("#page_form_id #shop_image_2").val();
        data['v_shop_name'] = $("#page_form_id #shop_name").val();
        data['v_shop_address'] = $("#page_form_id #shop_address").val();
        data['v_shop_state'] = $("#page_form_id #loc_state").val();
        data['v_shop_city'] = $("#page_form_id #loc_city").val();
         data['v_shop_pincode'] = $("#page_form_id #pincode").val();
          data['v_shop_area'] = $("#page_form_id #area").val();
           data['open_time'] = $("#page_form_id #open_time").val();
            data['closing_time'] = $("#page_form_id #close_time").val();
             data['lat_log'] = $("#page_form_id #distance").val();
        
     
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
        ajax_function_list();
    }
}

//
// function fn_edit_popup(id) {
//     fn_reset('page_form_id');
//     $("#button_add_update").html('<button type="button" onclick="fn_edit()" class="btn bg-primary">Update</button>');
//     var data = {};
//     data['action'] = 'data_list';
//     data['id'] = id;
//     data['t_code'] = '1';
//     fn_ajax('POST', data, 'json', '../ajaxcall', 'data_json_div');
//     var json_div = $("#data_json_div").text();
//     alert(json_div);
//     console.log(json_div);
//     var data_json = $.parseJSON(json_div);
//    // console.log(data_json.id);
//    // console.log(data_json.name);
//     $("#modal_id").modal('show');
//     $('.load_container').hide();
// }
//
// function fn_edit() {
//     $("#modal_id").modal('show');
// }
</script>

<script src="../public/global_assets/js/main/common.js"></script>
</body>

</html>