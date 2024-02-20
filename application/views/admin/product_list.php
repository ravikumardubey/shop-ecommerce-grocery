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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Product List
                        </span> - List</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="announcement_group" class="breadcrumb-item">Product List</a>
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

                <?php

echo ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : ''; ?>

                <div class="alert alert-success" style="margin: 30px 30px 0px 30px; display:none;">
                </div>
                <div class="card-header header-elements-inline">

                    <h5 class="card-title">Product List</h5>
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
                            <th>MRP</th>
                            <th>Sell Price</th>
                         <th>Total Quantity</th>
                        
                            <th>Brand Name</th>
                          
                            <th>Update Image </th>
                            <th>Update SIze & Color</th>
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
                            <h5 class="modal-title"> <span id="add_edit_span"> </span> Product List </h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>

                        <form id="page_form_id" name="page_form_id" action="post">
                            <input type="hidden" id="hidden_product_id" name="hidden_product_id" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">




                                        <?php if ($_SESSION['vendor_type'] == 'Admin') {?>
                                        <div class="col-sm-6">
                                            <label class="d-block">Select Vendor</label>
                                            <select class="form-control" id="vendor_id" name="vendor_id">
                                                <option value="">Select Vendor</option>
                                                <?php

    $where_con = array('status' => '0', 'kyc_status' => '0', 'acc_status' => '0', 'shop_status' => '0', 'vendor_type' => 'Vendor');
    $v_vendor = $this->common_model->getList('v_vendor', $where_con);

    if (!empty($v_vendor) && is_array($v_vendor)) {
        foreach ($v_vendor as $val) {
            ?>
                                                <option value="<?php echo $val['vendor_id']; ?>">
                                                    <?php echo $val['username']; ?></option>

                                                <?php }}?>

                                            </select>
                                        </div>
                                        <?php }?>

                                        <div class="col-sm-6">
                                            <label class="d-block">Product Category</label>
                                            <select class="form-control" id="category_id" name="category_id"
                                                onchange="getCategoryssssss(this.value,'')">
                                                <optgroup label="Select Category">
                                                    <option value="">Select Category</option>
                                                    <?php $loc_data = $this->common_model->getProductData('v_master_category', array('status' => '0'), '50');

if (!empty($loc_data) && is_array($loc_data)) {
    foreach ($loc_data as $val) {?>
                                                    <option value="<?php echo $val['id']; ?>">
                                                        <?php echo $val['name']; ?></option>

                                                    <?php }}?>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">Product Sub Category</label>
                                            <select class="form-control select-fixed-single" id="sub_category_id"
                                                name="sub_category_id">


                                                <optgroup label="Select Sub Category">
                                                    <option value="">Select Sub Category</option>

                                                </optgroup>


                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Product Name</label>
                                            <input type="text" placeholder="Enter Product Name"
                                                class="form-control required" id="product_name" name="product_name">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Product Short Name</label>
                                            <input type="text" placeholder="Enter Product Short Name"
                                                class="form-control required" id="product_short_name"
                                                name="product_short_name">
                                        </div>


                                        <div class="col-sm-6">
                                            <label>Description</label>


                                            <textarea placeholder="Enter Description" class="form-control required"
                                                id="description" name="description"></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Short Description</label>
                                            <!--<input type="text" placeholder="Enter Description"-->
                                            <!--       class="form-control required" id="description" name="description">-->

                                            <textarea placeholder="Enter Short Description"
                                                class="form-control required" id="short_description"
                                                name="short_description"></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Total Availability</label>
                                            <input type="text" placeholder="Enter Total Availability"
                                                class="form-control required" id="total_aval" name="total_aval">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Left Availability</label>
                                            <input type="text" placeholder="Enter Left Availability"
                                                class="form-control required" id="left_aval" name="left_aval">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Total Quantity</label>
                                            <input type="text" placeholder="Enter Total Quantity"
                                                class="form-control required" id="total_quan" name="total_quan">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Product MRP Price</label>
                                            <input type="text" placeholder="Enter MRP Price"
                                                class="form-control required" id="mrp" name="mrp">
                                        </div>
                                  <div class="col-sm-6">
                                            <label>Product Selling Price</label>
                                            <input type="text" placeholder="Enter Product Price"
                                                class="form-control required" id="product_price" name="product_price">
                                                
                                        </div>
                                        

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Related Products</label>
                                                <select multiple="multiple" class="form-control" id="rel_prod">
                                                    
                                                        <option value="0" disabled>Related Product</option>
                                                        <?php $sloc_data = $this->common_model->getProductData('v_product', array('status' => '0'), '50');

if (!empty($sloc_data) && is_array($sloc_data)) {
    foreach ($sloc_data as $val) {?>
                                                        <option value="<?php echo $val['product_id']; ?>">
                                                            <?php echo $val['short_name']; ?></option>
                                                        <?php }}?>

                                                   
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Brand Name</label>
                                            <input type="text" placeholder="Enter Brand Name"
                                                class="form-control required" id="brand_name" name="brand_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">Product Type</label>
                                            <select class="form-control" id="product_type" name="product_type">
                                                <optgroup label="Select Product Type">
                                                    <option value="">Select Product Type</option>
                                                    <option value="Latest">Latest</option>
                                                    <option value="Top">Top</option>
                                                    <option value="Featured">Featured</option>
                                                </optgroup>
                                            </select>
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





            
            



            <div id="modal_upload_image_id" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> <span id="add_edit_span"> </span> Upload Product Image </h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>


                        <form id="image_upload_form_id" name="image_upload_form_id" action="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="hidden_action" id="hidden_action" value="image_upload" />
                            <input type="hidden" name="hidden_product_id" id="hidden_product_id" value="" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label>Please Browse FIle</label>
                                            <input type="file" placeholder="Browse Product Image" multiple
                                                class="form-control required" id="product_image" name="product_image[]">
                                        </div>




                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <div id="button_image_upload"><button type="button" onclick="fn_image_browse()"
                                        class="btn bg-primary">Upload Image</button></div>
                            </div>
                        </form>
                        <table class="table" id="image_list">
                            <thead>
                                <tr>
                                    <th>Sr. No. </th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="image_product_list">
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
<div id="modal_color_size_id" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> <span id="add_edit_span"> </span> Color & Size Update </h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>


                        <form id="color_size_form_id" name="color_size_form_id" action="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="hidden_product_id" id="hidden_product_id" value="" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row" id="div_size_color" >
                                        
                                        <div class="col-sm-1">
                                            <label>Total Quantity</label>
                                            <input type="number" placeholder="Enter Total Quantity"
                                                class="form-control required" id="total_quantity" name="total_quantity[]">
                                        </div>
                                        <div class="col-sm-1">
                                            <label>Total Availability</label>
                                            <input type="number" placeholder="Enter total availability"
                                                class="form-control required" id="total_availability" name="total_availability[]">
                                        </div>
                                        <div class="col-sm-1">
                                            <label>Total left quantity</label>
                                            <input type="number" placeholder="Enter left quantity"
                                                class="form-control required" id="left_quantity" name="left_quantity[]">
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="d-block">Product Size</label>
                                            <select class="form-control" id="product_size" name="product_size[]">
                                                <optgroup label="Select Product Size">
                                                    <option value="">Select Product Type</option>
                                                    <option value="50GM">50 GM</option>
                                                    <option value="100GM">100 GM</option>
                                                    <option value="200GM">200 GM</option>
                                                    <option value="250GM">250 GM</option>
                                                    <option value="300GM">300 GM</option>
                                                    <option value="350GM">350 GM</option>
                                                    <option value="400GM">400 GM</option>
                                                    <option value="450GM">450 GM</option>
                                                    <option value="500GM">500 GM</option>
                                                    <option value="1KG">1 KG</option>
                                                     <option value="5KG">5 KG</option>
                                                      <option value="10KG">10 KG</option>
                                                     
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="d-block">Product Color</label>
                                            <select class="form-control" id="product_color" name="product_color[]">
                                                <optgroup label="Select Product Color">
                                                    <option value="">Select Product Type</option>
                                                    <option value="red">Red</option>
                                                    <option value="green">Green</option>
                                                    <option value="blue">Blue</option>
                                                    <option value="white">White</option>
                                                    <option value="black">Black</option>
                                                    <option value="brown">Brown</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="sky">Sky</option>
                                                     <option value="yellow">Yellow</option>
                                                      <option value="orange">Orange</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Product MRP Price</label>
                                            <input type="text" placeholder="Enter Product Price"
                                                class="form-control required" id="mrp" name="mrp[]">
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Product Selling Price</label>
                                            <input type="text" placeholder="Enter Product Price"
                                                class="form-control required" id="product_price" name="product_price[]">
                                                <span style="color:red; font-size:10px;">Selling Price would be (Selling price = Service(% of Product Selling price)+Product Selling Price)</span>
                                        </div>
                                        
                                        <div class="col-sm-1">
                                            <label>&nbsp;</label>
                                            <button type="button" onclick="fn_add_more_co_size()" id="add_more_size_color" class="btn bg-primary">Add More</button>
                                        </div>
                                        
                                         </div>
                                         <!--<div class="row">-->
                                         <!--      <div id="div_size_color" class="row col-sm-12"></div>-->
                                             
                                         <!--</div>-->
                                      
                                        
                                        

                                   
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <div id="button_image_upload"><button type="button" onclick="fn_add_size_color()"
                                        class="btn bg-primary">Add Size & Color</button></div>
                            </div>
                        </form>
                        
                        <table class="table" id="image_listdrtf">
                            <thead>
                                <tr>
                                    <th>Sr. No. </th>
                                    <th>quantity</th>
                                       <th>Ava</th>
                                          <th>Left quantity</th>
                                             <th>Size/Weight</th>
                                                <th>Color</th>
                                                <th>MRP</th>
                                                <th>Sale Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="size_color_product_list">
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            




        </div>
        
        <style>
            
            .size_color_margin {
                margin-top:20px;
            }
        </style>
        <!-- /content area -->

        <?php $this->load->view('admin/includes/footer');?>

        <div id="data_json_div" style="display:none;"></div>

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
<script>
function fn_image_browse() {
    with(document.image_upload_form_id) {
        method = "post";
        action = "../image_upload";
        submit();
    }
}

function fn_add_size_color() {
    
var total_quantity = document.getElementsByName('total_quantity[]');
var total_quantity_arr = {};
for (var i = 0; i <total_quantity.length; i++) {
total_quantity_arr[i] = total_quantity[i].value;
}

var total_availability = document.getElementsByName('total_availability[]');
var total_availability_arr = {};
for (var i = 0; i <total_availability.length; i++) {
total_availability_arr[i] = total_availability[i].value;
}
var left_quantity = document.getElementsByName('left_quantity[]');
var left_quantity_arr = {};
for (var i = 0; i <left_quantity.length; i++) {
left_quantity_arr[i] = left_quantity[i].value;
}
var product_size = document.getElementsByName('product_size[]');
var product_size_arr = {};
for (var i = 0; i <product_size.length; i++) {
product_size_arr[i] = product_size[i].value;
}
var product_color = document.getElementsByName('product_color[]');
var product_color_arr = {};
for (var i = 0; i < product_color.length; i++) {
product_color_arr[i] = product_color[i].value;
}

var product_price = document.getElementsByName('product_price[]');
var price_arr = {};
for (var i = 0; i < product_price.length; i++) {
price_arr[i] = product_price[i].value;
}
var mpr_price1 = document.getElementsByName('mrp[]');
var mpr_price_arr = {};
for (var i = 0; i < mpr_price1.length; i++) {
mpr_price_arr[i] = mpr_price1[i].value;
}

 var valid = $("#page_form_id").valid();
    if (valid) {
        var data = {};
        data['action'] = 'insert_data_size_color';
        data['t_code'] = '15';
        data['product_id'] = $("#color_size_form_id #hidden_product_id").val();
        data['left_quantity'] = left_quantity_arr;
        data['total_availability'] = total_availability_arr;
        data['total_quantity'] = total_quantity_arr;
        data['price'] = price_arr;
        data['mrp_price'] = mpr_price_arr;
        data['color'] = product_color_arr;
        data['size'] = product_size_arr;
        
        
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
    //   ajax_function_list();
        
       
    }


}


var size_color = 1;
function fn_add_more_co_size(){
    
    $("#div_size_color").append("<div class='col-sm-1 size_color_margin div_id_"+size_color+"' >"+
"<label>Total Quantity</label>"+
"<input type='number' placeholder='Enter Total Quantity' class='form-control required' id='total_quantity' name='total_quantity[]'>"+
"</div>"+
"<div class='col-sm-1 size_color_margin div_id_"+size_color+"'>"+
"<label>total_availability</label>"+
"<input type='number' placeholder='Enter total availability' class='form-control required' id='total_availability' name='total_availability[]'>"+
"</div>"+
"<div class='col-sm-1 size_color_margin div_id_"+size_color+"'>"+
"<label>Total left quantity</label>"+
"<input type='number' placeholder='Enter left quantity' class='form-control required' id='left_quantity' name='left_quantity[]'>"+
"</div>"+
"<div class='col-sm-2 size_color_margin div_id_"+size_color+"'>"+
"<label class='d-block'>Product Size</label>"+
"<select class='form-control' id='product_size' name='product_size[]'>"+
"<option value=''>Select Product Type</option>"+
"<option value='50GM'>50 GM</option>"+
"<option value='100GM'>100 GM</option>"+
"<option value='250GM'>250 GM</option>"+
"<option value='500GM'>500 GM</option>"+
"<option value='1KG'>1 KG</option>"+
"<option value='2KG'>2 KG</option>"+
"<option value='2KG'>2 KG</option>"+
"<option value='5KG'>5 KG</option>"+
"<option value='L'>Large</option>"+
"<option value='XL'>XL</option>"+
"<option value='XXL'>XXL</option>"+
"<option value='XXXL'>XXXL</option>"+
"</select>"+
"</div>"+
"<div class='col-sm-2 size_color_margin div_id_"+size_color+"'>"+
"<label class='d-block'>Product Color</label>"+
"<select class='form-control' id='product_color' name='product_color[]'>"+
"<option value=''>Select Product Type</option>"+
" <option value='red'>red</option>"+
"<option value='green'>green</option>"+
"<option value='blue'>blue</option>"+
"<option value='white'>white</option>"+
"<option value='black'>black</option>"+
"<option value='brown'>brown</option>"+
"<option value='pink'>pink</option>"+
"<option value='sky'>sky</option>"+
"<option value='yellow'>yellow</option>"+
"<option value='orange'>orange</option>"+
"</select>"+
"</div>"+
"<div class='col-sm-2 size_color_margin div_id_"+size_color+"'>"+
"<label>Product MRP Price</label>"+
"<input type='text' placeholder='Enter Product Price' class='form-control required' id='mrp[]' name='mrp[]'>"+
"</div>"+
"<div class='col-sm-2 size_color_margin div_id_"+size_color+"'>"+
"<label>Product Selling Price</label>"+
"<input type='text' placeholder='Enter Product Price' class='form-control required' id='product_price' name='product_price[]'>"+
"<span style='color:red; font-size:10px;'>Selling Price would be (Selling price = Service(% of Product Selling price)+Product Selling Price)</span>"+
"</div>"+
"<div style='margin-top: 47px;' class='col-sm-1 size_color_margin div_id_"+size_color+"'>"+
"<label>&nbsp;</label>"+
"<button type='button' onclick='fn_remove_co_size("+size_color+")' id='add_more_size_color' class='btn bg-primary'>Remove</button>"+
"</div>"+
"");
size_color++;


}

function fn_remove_co_size(div_id) { 
    $(".div_id_"+div_id).remove();
}

function fn_update_size(product_id) {
    
     fn_reset('color_size_form_id');
    $("#color_size_form_id #hidden_product_id").val(product_id);
    var data = {};
    data['hidden_action'] = 'size_color_data_list';
    data['product_id'] = product_id;
    $.ajax({
        type: 'POST',
        url: '../image_upload',
        data: data,
        dataType: 'html',
        success: function(data) {
            $('.load_container').hide();
            $("#size_color_product_list").html(data);
        },
        error: function(request, error) {
            swal("Something Error", "error");
            $('.load_container').hide();
        }
    });
    $("#modal_color_size_id").modal('show');
      $('.load_container').hide();
}


function fn_upload_image(product_id) {
   
    $("#modal_upload_image_id #hidden_product_id").val(product_id);
    var data = {};
    data['hidden_action'] = 'image_data_list';
    data['product_id'] = product_id;
    $.ajax({
        type: 'POST',
        url: '../image_upload',
        data: data,
        dataType: 'html',
        success: function(data) {
            $('.load_container').hide();
            $("#image_product_list").html(data);
        },
        error: function(request, error) {
            swal("Something Error", "error");
            $('.load_container').hide();
        }
    });
     $("#modal_upload_image_id").modal('show');
    
}

$(document).ready(function() {
    $('#detailsList').DataTable();
});
ajax_function_list();
function ajax_function_list() {
    $('.load_container').show();
    var data = {};
    data['action'] = 'v_product';
    $(document).ready(function() {
        
        table_list('POST', '../ajaxcall', data, 'html', 'html_listing_data', 'detailsList');
    });
}

function ajax_function_lis12t() {
    $('.load_container').show();
    var data = {};
    data['action'] = 'v_product';
        table_list('POST', '../ajaxcall', data, 'html', 'html_listing_data', 'detailsList');
}

function getCategoryssssss(val, sub_cate) {
    var data = {};
    data['action'] = 'loc_category';
    data['category_id'] = val;
    data['sub_cate'] = sub_cate;
    $.ajax({
        type: "POST",
        url: "../ajaxcall",
        data: data,
        beforeSend: function() {
            $("#sub_category_id").addClass("loader");
        },
        success: function(data) {
            $("#sub_category_id").html(data);
            $("#sub_category_id").removeClass("loader");
        }
    });
}



function fn_add() {
    var valid = $("#page_form_id").valid();

    if (valid) {
        var data = {};
        
        
        data['action'] = 'insert_data';
        data['t_code'] = '4';
        data['category_id'] = $("#page_form_id #category_id").val();
        data['vendor_id'] = $("#page_form_id #vendor_id").val();
        data['sub_category_id'] = $("#page_form_id #sub_category_id").val();
        data['name'] = $("#page_form_id #product_name").val();
        data['short_name'] = $("#page_form_id #product_short_name").val();
    
         data['MRP_price'] = $("#page_form_id #mrp").val();
        data['price'] = $("#page_form_id #product_price").val();
       
        data['description'] = $("#page_form_id #description").val();
        data['short_description'] = $("#page_form_id #short_description").val();
        data['total_availability'] = $("#page_form_id #total_aval").val();
        data['left_quantity'] = $("#page_form_id #left_aval").val();
        data['total_quantity'] = $("#page_form_id #total_quan").val();
        data['related_product_id'] = $("#page_form_id #rel_prod").val();
        data['brand_name'] = $("#page_form_id #brand_name").val();
        data['product_type'] = $("#page_form_id #product_type").val();
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
        ajax_function_list();
    }
}

function fn_edit_popup(id) {
    fn_reset('page_form_id');
    $("#page_form_id #hidden_product_id").val(id);
    $("#button_add_update").html('<button type="button" onclick="fn_edit()" class="btn bg-primary">Update</button>');
    var data = {};
    data['action'] = 'data_list';
    data['id'] = id;
    data['t_code'] = '4';
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
            var numbersString = data_json[0].related_product_id;
            var numbersArray = numbersString.split(',');
            getCategoryssssss(data_json[0].category_id, data_json[0].sub_category_id);
            $("#page_form_id #category_id").val(data_json[0].category_id);
            $("#page_form_id #vendor_id").val(data_json[0].vendor_id);
            $("#page_form_id #product_name").val(data_json[0].name);
            $("#page_form_id #product_short_name").val(data_json[0].short_name);
            $("#page_form_id #product_price").val(data_json[0].price);
       $("#page_form_id #mrp").val(data_json[0].MRP_price);
            $("#page_form_id #description").val(data_json[0].description);
            $("#page_form_id #short_description").val(data_json[0].short_description);
            $("#page_form_id #total_aval").val(data_json[0].total_availability);
            $("#page_form_id #left_aval").val(data_json[0].left_quantity);
            $("#page_form_id #total_quan").val(data_json[0].total_quantity);
            $("#page_form_id #rel_prod").val(numbersArray);
            $("#page_form_id #brand_name").val(data_json[0].brand_name);
            $("#page_form_id #product_type").val(data_json[0].product_type);
            $("#page_form_id #sub_category_id").val(data_json[0].sub_category_id);
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
        data['t_code'] = '4';
        data['hidden_product_id'] = $("#page_form_id #hidden_product_id").val();
        data['category_id'] = $("#page_form_id #category_id").val();
        data['vendor_id'] = $("#page_form_id #vendor_id").val();
        data['sub_category_id'] = $("#page_form_id #sub_category_id").val();
        data['name'] = $("#page_form_id #product_name").val();
        data['short_name'] = $("#page_form_id #product_short_name").val();
        data['price'] = $("#page_form_id #product_price").val();
        data['MRP_price'] = $("#page_form_id #mrp").val();
      //  data['discount'] = $("#page_form_id #product_discount").val();
        data['description'] = $("#page_form_id #description").val();
        data['short_description'] = $("#page_form_id #short_description").val();
        data['total_availability'] = $("#page_form_id #total_aval").val();
        data['left_quantity'] = $("#page_form_id #left_aval").val();
        data['total_quantity'] = $("#page_form_id #total_quan").val();
        data['related_product_id'] = $("#page_form_id #rel_prod").val();
        data['brand_name'] = $("#page_form_id #brand_name").val();
        data['product_type'] = $("#page_form_id #product_type").val();
       fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
        ajax_function_list();
        
       
    }

}
</script>

<script src="../public/global_assets/js/main/common.js"></script>
</body>

</html>