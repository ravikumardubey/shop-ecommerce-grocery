
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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Menu List
                        </span> - List</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="announcement_group" class="breadcrumb-item">Menu List</a>
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

                    <h5 class="card-title">Menu List</h5>
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
                            <th>Menu Name</th>
                            <th>URL</th>
                            <th>Parent Url</th>
                            <th>Parent ID</th>
                            <th>Parent</th>
                            <th>Icon</th>

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
                            <h5 class="modal-title"> <span id="add_edit_span"> </span> Menu List </h5>
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
                                            <label>Menu Name</label>
                                            <input type="text" placeholder="Enter Menu Name"
                                                class="form-control required" id="menu_name" name="menu_name">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Menu URL</label>
                                            <input type="text" placeholder="Enter Menu URL"
                                                class="form-control required" id="url" name="url">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Parent Url</label>
                                            <input type="text" placeholder="Enter Parent URL"
                                                class="form-control required" id="parent_url" name="parent_url">
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="d-block">Menu Name</label>
                                            <select class="form-control select-fixed-single" id="parent_id" name="parent_id" data-fouc>
                                                <optgroup label="Select Category">
                                                    <option value="0">Main Menu</option>
                                                  <?php  
                                                  
      $v_shop_vendossr = $this->common_model->getProductData('v_menu', array('parent' => '0'), '50');
     foreach ($v_shop_vendossr as $value) { ?>
  <option value="<?php echo $value['id'];?>" ><?php echo $value['menu_name'];?></option>
<?php } ?>

                                                </optgroup>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="d-block">Parent Type</label>
                                            <select class="form-control select-fixed-single" id="parent" name="parent" data-fouc>
                                                <optgroup label="Select Category">
                                                    <option value="0">Parent</option>
                                                    <option value="1">Child</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">Icon</label>
                                            <select class="form-control select-fixed-single" id="icon" name="icon" data-fouc>
                                                <optgroup label="Select Icon">
                                                    <option value="home">Home</option>
                                                    <option value="users">Users</option>
                                                    <option value="user">User</option>
                                                    <option value="copy">Copy</option>
                                                    <option value="color-sampler">Color-Sampler</option>
                                                    <option value="history">History</option>
                                                    <option value="gift">Gift</option>
                                                    <option value="database">Database</option>
                                                    <option value="road">Road</option>
                                                    <option value="bookmark">Bookmark</option>
                                                    <option value="briefcase">Briefcase</option>
                                                    <option value="pencil">Pencil</option>
                                                    <option value="coffee">Coffee</option>
                                                    <option value="envelope">Envelope</option>
                                                    <option value="cog">Cog</option>
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
    data['action'] = 'v_menu';
    $(document).ready(function() {
        table_list('POST', '../ajaxcall', data, 'html', 'html_listing_data', 'detailsList');
    });
}


function fn_add() {
    var valid = $("#page_form_id").valid();
    if (valid) {
          var data = {};
      data['action'] = 'insert_data';
        data['t_code'] = '12';
        data['menu_name'] = $("#page_form_id #menu_name").val();
        data['url'] = $("#page_form_id #url").val();
        data['parent_url'] = $("#page_form_id #parent_url").val();
        data['parent_id'] = $("#page_form_id #parent_id").val();
        data['parent'] = $("#page_form_id #parent").val();
        data['icon'] = $("#page_form_id #icon").val();
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
    data['t_code'] = '12';
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
  $("#page_form_id #menu_name").val(data_json[0].menu_name);
            $("#page_form_id #url").val(data_json[0].url);
            $("#page_form_id #parent_url").val(data_json[0].parent_url);
            $("#page_form_id #parent_id").val(data_json[0].parent_id);
            $("#page_form_id #parent").val(data_json[0].parent);
             $("#page_form_id #icon").val(data_json[0].icon);
            
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
        data['t_code'] = '12';
        data['hidden_page_id'] = $("#page_form_id #hidden_page_id").val();
        data['menu_name'] = $("#page_form_id #menu_name").val();
          data['url'] = $("#page_form_id #url").val();
        data['parent_url'] = $("#page_form_id #parent_url").val();
        data['parent_id'] = $("#page_form_id #parent_id").val();
        data['parent'] = $("#page_form_id #parent").val();
        data['icon'] = $("#page_form_id #icon").val();
      
       fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
       ajax_function_list();
        
       
    }
}

</script>

<script src="../public/global_assets/js/main/common.js"></script>
</body>

</html>