
<?php
$this->load->view('admin/includes/top_header'); 
$this->load->view('admin/includes/header');


$user_details = $this->common_model->getList('v_vendor', array('vendor_id'=>$_SESSION['vendor_id']));
$user_details =$user_details['0'];
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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Change 
                        </span> - Password </h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="#" class="breadcrumb-item">Change Password</a>
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
                <div class="alert alert-success" style="margin: 30px 30px 0px 30px;">
                </div>
                <form id="page_form_id" name="page_form_id" action="post">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $user_details['id']?>" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Old Password</label>
                                            <input type="password"   placeholder="Enter Old Password"
                                                class="form-control required" id="old_password" name="old_password">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>New Password</label>
                                            <input type="password" placeholder="Enter New Password"
                                                class="form-control required"  id="new_password" name="new_password">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Confirm New Password</label>
                                            <input type="password" placeholder="Enter Confirm Password"
                                                class="form-control required"  id="con_new_password" name="con_new_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <button type="button" onclick="fn_change_password()" class="btn btn-primary">Update Menu</button>
                            </div>
                        </form>
            </div>
            <!-- /basic datatable -->
        </div>
        <!-- /content area -->
        <?php
        
        $this->load->view('admin/includes/footer'); ?>
      
    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
<script>
$( document ).ready(function() {
   $('.alert').hide();  
});

function fn_change_password() {
    var valid = $("#page_form_id").valid();
    if (valid) {
        var old_password = $("#page_form_id #old_password").val();
        var new_password = $("#page_form_id #new_password").val();
        var con_new_password = $("#page_form_id #con_new_password").val();
        if(new_password != con_new_password) { 
            alert('Please match new password and confirm new password.');
            return false;
        }
        var data = {};
        data['action'] = 'change_password_vendor';
        data['t_code'] = '1';
        data['hidden_id'] = $("#page_form_id #hidden_id").val();
        data['old_password'] = old_password;
        data['new_password'] = new_password;
        data['con_new_password'] = con_new_password;
        $.ajax({
        type: 'post',
        url: '../ajaxcall',
        data: data,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('.load_container').hide();
            $('.alert').show();  
            $(".alert-success").html(data.message);
            $('#page_form_id').trigger("reset");
        },
        error: function(request, error) {
            swal("Something error");
            $(".alert-danger").html(data.message);
            $('.load_container').hide();
        }
    });

    }
}
</script>

<script src="<?php echo base_url('public/global_assets/js/main/common.js') ?> "></script>
</body>

</html>