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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Vendor List
                        </span> - List</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="announcement_group" class="breadcrumb-item">Vendor List</a>
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

                    <h5 class="card-title">Vendor List</h5>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Status</th>
                             <th>Shop Status</th>
                              <th>KYC Status</th>
                               <th>Account Status</th>
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
                            <h5 class="modal-title"> <span id="add_edit_span"> </span> Vendor List </h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>

                        <form id="page_form_id" name="page_form_id" action="post">
                            <input type="hidden" id="hidden_page_id" name="hidden_page_id" />
                            <div class="modal-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="d-block">Vendor Type</label>
                                            <select class="form-control select-fixed-single" id="vendor_type" name="vendor_type" data-fouc>
                                                <optgroup label="Select Vendor Type">
                                                    <option value="0">Select Vendor Type</option>
                                                    <option value="vendor">Vendor</option>
                                                    <option value="vendor_emp">Vendor Emp</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">Vendor Category Type</label>
                                            <select class="form-control select-fixed-single" id="vendor_category_type" name="vendor_category_type" data-fouc>
                                                <optgroup label="Select Vendor Category Type">
                                                    <option value="0">Select Vendor Category Type</option>
                                                    <option value="top">Top</option>
                                                    <option value="special">Specials</option>
                                                    <option value="recommended">Recommended</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Username</label>
                                            <input type="text" placeholder="Enter User Name"
                                                   class="form-control required" id="username" name="username">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" placeholder="Enter First Name"
                                                class="form-control required" id="f_name" name="f_name">
                                        </div>
                                   
                                        <div class="col-sm-6">
                                            <label>Middle Name</label>
                                            <input type="text" placeholder="Enter Middle Name"
                                                class="form-control required" id="m_name" name="m_name">
                                        </div>
                                  
                                        <div class="col-sm-6">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Enter last Name"
                                                class="form-control required" id="l_name" name="l_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Date Of Birth</label>
                                            <input type="date" placeholder="Enter Date Of Birth"
                                                   class="form-control required" id="dob" name="dob" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Email</label>
                                            <input type="text" placeholder="Enter Email"
                                                   class="form-control required" id="email_id" name="email_id">
                                        </div>
<!--                                        <div class="col-sm-6">-->
<!--                                        <div class="card-header header-elements-inline">-->
<!--                                            <div class="header-elements">-->
<!--                                                    <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm">-->
<!--                                                        <label class="form-check-label">-->
<!--                                                            <input type="checkbox" class="form-input-switchery" id="email_status" name="email_status"  unchecked data-fouc>-->
<!--                                                            Email Status-->
<!--                                                        </label>-->
<!--                                                    </div>-->
<!--<input type="hidden" class="form-control required" id="hidden_email" name="hidden_email">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        </div>-->
                                        <div class="col-sm-6">
                                            <label>Primary Mobile Number</label>
                                            <input type="text" placeholder="Enter Primary Mobile Number"
                                                   class="form-control required" id="primary_mobile" name="primary_mobile">
                                        </div>
<!--                                        <div class="col-sm-6">-->
<!--                                            <div class="card-header header-elements-inline">-->
<!--                                                <div class="header-elements">-->
<!--                                                    <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm">-->
<!--                                                        <label class="form-check-label">-->
<!--                                                            <input type="checkbox" class="form-input-switchery"  id="mobile_status" name="mobile_status"  unchecked data-fouc>-->
<!--                                                            Mobile Status-->
<!--                                                        </label>-->
<!--                                                    </div>-->
<!--<input type="hidden" class="form-control required" id="hidden_mobile" name="hidden_mobile">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        
                                        <div class="col-sm-6">
                                            <label>Password</label>
                                            <input type="text" placeholder="Enter Password"
                                                   class="form-control required" id="psw" name="psw">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Alternate Mobile Number</label>
                                            <input type="text" placeholder="Enter Alternate Mobile Number"
                                                   class="form-control required" id="alt_mobile" name="alt_mobile">
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="form-group mb-3 mb-md-2" id="gender">
                                            <label class="d-block font-weight-semibold">Gender</label>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input-styled" name="gender" id="male" value="Male" checked data-fouc>
                                                    Male
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input-styled" name="gender" id="female" value="Female" data-fouc>
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input-styled" name="gender" id="other" value="Other" data-fouc>
                                                    Other
                                                </label>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Address</label>
                                            <input type="text" placeholder="Enter Vendor Address"
                                                   class="form-control required" id="v_address" name="v_address">
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
                                            <label>Area Name</label>
                                            <input type="text" placeholder="Enter Area Name"
                                                   class="form-control required" id="area" name="area">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Pincode</label>
                                            <input type="text" placeholder="Enter Pincode"
                                                   class="form-control required" id="pincode" name="pincode">
                                        </div>


                                </div>
                                        </div>
                                    
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <div id="button_add_update"></div>
                            </div>
                        </form>
                    </div>
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


function ajax_function_list() {
    $('.load_container').show();
    var data = {};
    data['action'] = 'vendor_list';
    $(document).ready(function() {
        table_list('POST', '../ajaxcall', data, 'html', 'html_listing_data', 'detailsList');
    });
}


function fn_add() {
    var valid = $("#page_form_id").valid();
    //  $('#email_status').change(function(){
    //       if($(this).prop('checked')){
    //           $('#hidden_email').val('1');
    //       }else{
    //           $('#hidden_email').val('0');
               
    //       } 
    //     });
    //     $('#mobile_status').change(function(){
    //       if($(this).prop('checked')){
    //           $('#hidden_mobile').val('1');
    //       }else{
    //           $('#hidden_mobile').val('0');
               
    //       } 
    //     });
    if (valid) {
         var data = {};
       data['action'] = 'insert_data';
        data['t_code'] = '1';
        data['vendor_type'] = $("#page_form_id #vendor_type").val();
        data['vendor_category_type'] = $("#page_form_id #vendor_category_type").val();
        data['username'] = $("#page_form_id #username").val();
        data['f_name'] = $("#page_form_id #f_name").val();
        data['m_name'] = $("#page_form_id #m_name").val();
        data['l_name'] = $("#page_form_id #l_name").val();
        data['dob'] = $("#page_form_id #dob").val();
        data['email_id'] = $("#page_form_id #email_id").val();
// 		data['email_status'] = $("#page_form_id #hidden_email").val();
        data['primary_mobile'] = $("#page_form_id #primary_mobile").val();
// 		data['mobile_status'] = $("#page_form_id #hidden_mobile").val();
        data['password'] = $("#page_form_id #psw").val();
		data['alternate_mobile'] = $("#page_form_id #alt_mobile").val();
        data['gender'] = $("page_form_id input[name='gender']:checked ").val();
        data['v_address'] = $("#page_form_id #v_address").val();
		 data['v_state'] = $("#page_form_id #loc_state").val();
        data['v_city'] = $("#page_form_id #loc_city").val();
           data['v_area'] = $("#page_form_id #area").val();
              data['v_pincode'] = $("#page_form_id #pincode").val();
       
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
        
        ajax_function_list();
    }
}

function fn_edit_popup(id) {
    fn_reset('page_form_id');
     $("#page_form_id #hidden_page_id").val(id);
    $("#button_add_update").html('<button type="button" onclick="fn_edit()" class="btn bg-primary">Update</button>');
    var data = {};
    data['action'] = 'data_list';
    data['id'] = id;
    data['t_code'] = '1';
    $.ajax({
        type: 'post',
        url: '../ajaxcall',
        data: data,
        dataType: 'json',
        success: function(data) {
            $('.load_container').hide();
            $("#data_json_div").html(data.message);
    var json_div = $("#data_json_div").text(); 
    var data_json = $.parseJSON(json_div);
      $("#page_form_id #vendor_type").val(data_json[0].vendor_type);
  $("#page_form_id #vendor_category_type").val(data_json[0].vendor_category_type);

   $("#page_form_id #username").val(data_json[0].username);
    $("#page_form_id #f_name").val(data_json[0].f_name);
     $("#page_form_id #m_name").val(data_json[0].m_name);
      $("#page_form_id #l_name").val(data_json[0].l_name);
       $("#page_form_id #dob").val(data_json[0].dob);
        $("#page_form_id #email_id").val(data_json[0].email_id);
            $("#page_form_id #primary_mobile").val(data_json[0].primary_mobile);
            $("#page_form_id #psw").val(data_json[0].password);
            $("#page_form_id #alt_mobile").val(data_json[0].alternate_mobile);
            $("#page_form_id #v_address").val(data_json[0].v_address);
             $("#page_form_id #loc_state").val(data_json[0].v_state);
              $("#page_form_id #loc_city").val(data_json[0].v_city);
               $("#page_form_id #area").val(data_json[0].v_area);
               $("#page_form_id #pincode").val(data_json[0].v_pincode);
},
 error: function(request, error) {
            swal("Something error");
            $(".alert-danger").html(error);
            $('.load_container').hide();
        }
    });
    $("#modal_id").modal('show');
    $('.load_container').hide();
}

function fn_edit() {
    
    var valid = $("#page_form_id").valid();
    if (valid) {
        var data = {};
        data['action'] = 'update_data';
        data['t_code'] = '1';
         data['hidden_page_id'] = $("#page_form_id #hidden_page_id").val();
         data['vendor_type'] = $("#page_form_id #vendor_type").val();
        data['vendor_category_type'] = $("#page_form_id #vendor_category_type").val();
        data['username'] = $("#page_form_id #username").val();
        data['f_name'] = $("#page_form_id #f_name").val();
        data['m_name'] = $("#page_form_id #m_name").val();
        data['l_name'] = $("#page_form_id #l_name").val();
        data['dob'] = $("#page_form_id #dob").val();
        data['email_id'] = $("#page_form_id #email_id").val();
// 		data['email_status'] = $("#page_form_id #hidden_email").val();
        data['primary_mobile'] = $("#page_form_id #primary_mobile").val();
// 		data['mobile_status'] = $("#page_form_id #hidden_mobile").val();
        data['password'] = $("#page_form_id #psw").val();
		data['alternate_mobile'] = $("#page_form_id #alt_mobile").val();
        data['gender'] = $("page_form_id input[name='gender']:checked ").val();
        data['v_address'] = $("#page_form_id #v_address").val();
		 data['v_state'] = $("#page_form_id #loc_state").val();
        data['v_city'] = $("#page_form_id #loc_city").val();
           data['v_area'] = $("#page_form_id #area").val();
              data['v_pincode'] = $("#page_form_id #pincode").val();
    
       fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
       ajax_function_list();
        
       
    }
}
</script>

<script src="../public/global_assets/js/main/common.js"></script>
</body>

</html>