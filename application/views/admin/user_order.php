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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User Order
                        </span> - List</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="announcement_group" class="breadcrumb-item">User Order</a>
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

                    <h5 class="card-title">User Order</h5>
                   <!--  <div class="header-elements">
                    <!--    <button type="button" id="add_popup" class="btn btn-primary">
                            <i class="icon-eye-plus mr-6 icon-4x"></i> Add
                        </button>
                    </div> -->
                </div>
                <table class="table" id="detailsList">
                    <thead>
                        <tr>
                            <th>Sr. No. </th>
                            <th>Order ID</th>
                            <th>User Name</th>
                            <th>Mobile No.</th>
                            <th>Email Id</th>
                            <th>Address</th>
                            <th>Product Details</th>
                            <th>Total Amount</th>
                             <th>Pay Status</th>
                              <th>Order Status</th>
                              <th>Payment Method</th>
                         
                            <th>Created On</th>

                           
                            
                        </tr>
                    </thead>
                    <tbody id="html_listing_data">
                    </tbody>
                </table>
            </div>
            <!-------- Product ordered -------->
             <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title">Product Order List</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
<div id="product_order">
    <table class="table">
                             <thead>
                    <tr>
                        <th >S.No.</th>
                         <th >Image</th>
                        <th >Product</th>
                        <th >Quantity</th>
                        <th >MRP Price</th>
                        <th >Sale Price</th>
                        <th >Total Amount</th>
                        </tr>
                        </thead>
                        <tbody id="html_listingsss_data">
                          
                            </tbody>
                            
                    </table>
   
</div>
        </div>
      </div>
      
    </div>
  </div>
     <!-------- Product ordered -------->
      <div class="modal fade" id="order_status" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         
        <div class="modal-header">
              <h4 class="modal-title">Product Order List</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="alert alert-success" style="margin: 30px 30px 0px 30px; display:none;">
                </div>
        <form id="page_form_id" name="page_form_id" action="post">
    <input type="hidden" id="hidden_page_id" name="hidden_page_id" >
        <div class="modal-body">
                <div class="form-group">
                                    
            <div class="row">
                 <div class="col-sm-6">
                                            <label class="d-block">Order Status</label>
                                            <select class="form-control" id="order_status" name="order_status">
 <option value="">Select</option>
                                                <option value="In-Progress">In-Progress</option>
                                                <option value="Confirmed">Confirmed</option>
                                                <option value="Delivered">Delivered</option>
                                           
                                            </select>
                                        </div>
                
                
              </div>
               </div>
        </div>
        
        </form>
      </div>
      
    </div>
  </div>
     

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
    data['action'] = 'v_order';
    $(document).ready(function() {
        table_list('POST', '../ajaxcall', data, 'html', 'html_listing_data', 'detailsList');
    });
}


$('select').on('change', function() {
   var valid = $("#page_form_id").valid();
    if (valid) {
        var data = {};
        data['action'] = 'update_data';
        data['t_code'] = '6';
        data['hidden_page_id'] = $("#page_form_id #hidden_page_id").val();
       data['order_status'] = $("#page_form_id #order_status").val();
       fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
       ajax_function_list();
        
       
    }
});


</script>

<script src="../public/global_assets/js/main/common.js"></script>
</body>

</html>