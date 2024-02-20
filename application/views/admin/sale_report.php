
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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Sale Report
                        </span> - List</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="announcement_group" class="breadcrumb-item">Sale Report List</a>
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

                    <h5 class="card-title">Sale Report List</h5>
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
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Pincode</th>
                            <th>Product List</th>                                
                            
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
                                            <label>Customer Name</label>
                                            <input type="text" placeholder="Enter Customer Name"
                                                   class="form-control required" id="cust_name" name="cust_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Mobile</label>
                                            <input type="text" placeholder="Enter Customer Mobile"
                                                   class="form-control required" id="cust_mob" name="cust_mob">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Email</label>
                                            <input type="text" placeholder="Enter Customer Email"
                                                   class="form-control required" id="cust_email" name="cust_email">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Address</label>
                                            <input type="text" placeholder="Enter Customer Address"
                                                   class="form-control required" id="cust_address" name="cust_address">
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
                                               class="form-control required" id="cust_pincode" name="cust_pincode">
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
        
        
                    <div id="myModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> <span id="add_edit_span"> </span> Sale Report List </h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>
                        <div class="header-elements">
                        <button type="button" id="add_product"  onclick="fn_add_div()" class="btn btn-primary">
                            <i class="icon-eye-plus mr-6 icon-4x"></i> Add Product
                        </button>
                    </div>
<form id="page_form_id" name="page_form_id" action="post">
    

  <div class="modal-body">
       <div class="form-group">
                                    <div class="row" id="html_subject_form"></div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" >Save</button>
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
let x = Math.floor((Math.random() * 10) + 1);
var size_incre = 1;
$(document).ready(function() {
  $("#select2insidemodal").select2({
    dropdownParent: $("#myModal")
  });
});

$(document).ready(function() {
    $('#detailsList').DataTable();
});
ajax_function_list();

function fn_add_div_div() {
    
    var data_div_html =                 "<div class='form-group '>" +
   
                  "<label>Minimal</label>" +
                  "<select class='form-control select2' style='width: 100%' onChange='productName(this.value);'>" +
             "<option value='0'>Select Product</option>" +
            "<?php $product_data = $this->common_model->getProductData('v_product', array('status' => '0'),1000);   
            
                                  
                            if (!empty($product_data) && is_array($product_data)){
    foreach ($product_data as $val) {?>" +
        "<option value='<?php echo $val['id'];?>'><?php echo $val['name'];?></option>" +
   "<?php     }}?>" +
                 "</select>" +
   
        "</div>" +
        "<div class='row' id='mrp_price_"+ x +"'>" +
                  
        "</div>" +
        "<div id='quantity'>" +
                  
        "</div>";
          
    return data_div_html;
}




function fn_add_div() {
 //alert('safsafasd');
    var html_fee_text = fn_add_div_div();
    $('#html_subject_form').append(html_fee_text);
    size_incre++;
}

function grand_total(val){
    
    var mrp_priceee = $("#page_form_id #mrp_priceee").val();
    var sale_price = $("#page_form_id #sale_price").val();
    var gst = $("#page_form_id #gst").val();
    
    var totalsum = sale_price*val;
    $("#total").val(function() {
    return totalsum;
});
}

function productName(val) {
    var data = {};
        data['action'] = 'product_data';
        data['product_idd'] = 'id='+val;

	$.ajax({
		type: "POST",
		url: '../ajaxcall',
		 data: data,
		beforeSend: function() {
		    
			$('#mrp_price_'+ x).addClass("loader");
		},
		success: function(data){
		 
			$('#mrp_price_'+ x).html(data);
			$('#mrp_price_'+ x).removeClass("loader");
		}
	});
}



function ajax_function_list() {
    $('.load_container').show();
    var data = {};
    data['action'] = 'v_sale_report';
    $(document).ready(function() {
        table_list('POST', '../ajaxcall', data, 'html', 'html_listing_data', 'detailsList');
    });
}





/*$(document).ready(function() {
    $('#detailsList').DataTable();
});
ajax_function_list();

function ajax_function_list() {
    $('.load_container').show();
    var data = {};
    data['action'] = 'v_sale_report';
    $(document).ready(function() {
        table_list('POST', '../ajaxcall', data, 'html', 'html_listing_data', 'detailsList');
    });
} */
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
        data['t_code'] = '27';
         data['cust_name'] = $("#page_form_id #cust_name").val();
        data['cust_mob'] = $("#page_form_id #cust_mob").val();
        data['email'] = $("#page_form_id #cust_email").val();
        data['address'] = $("#page_form_id #cust_address").val();
        data['state'] = $("#page_form_id #loc_state").val();
        data['city'] = $("#page_form_id #loc_city").val();
        data['pincode'] = $("#page_form_id #cust_pincode").val();
        
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
        ajax_function_list();
    }
} 

function fn_get_product(){
    $('#sale_report_id').show();
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