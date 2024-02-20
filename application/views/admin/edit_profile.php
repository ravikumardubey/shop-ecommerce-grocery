<?php $this->load->view('admin/includes/top_header');?>
<?php $this->load->view('admin/includes/header');

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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit 
                        </span> - Profile </h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <a href="#" class="breadcrumb-item">Edit Profile</a>
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
                <form id="page_form_id" name="page_form_id" action="post">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $user_details['id']?>" />
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-sm-6">
                                    <label> Select User Type</label>
                                            <select disabled placeholder="Enter book Name" class="form-control required select"
                                                id="user_type" name="user_type">
                                                <option value="">Select User Type</option>
                                                <?php $roles = $this->common_model->getList('v_vendor',array('status'=>'0'));
                                                if(!empty($roles) && is_array($roles))  { 
                                                    foreach($roles as $val) {
                                                        $selected = '';
                                                        if($user_details['vendor_type'] == $val["vendor_type"]) { 
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option '.$selected.' value="'. $val["id"].'">'. $val["vendor_type"].'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        <div class="col-sm-6">
                                            <label>Username</label>
                                            <input type="text"  disabled placeholder="Enter Users Name"
                                                class="form-control required" value="<?php echo $user_details['username']?>" id="username" name="username">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" placeholder="Enter First Name"
                                                class="form-control required" value="<?php echo $user_details['f_name']?>"  disabled id="f_name" name="f_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Last Name</label>
                                            <input type="text" disabled placeholder="Enter Last Name"
                                                class="form-control required" value="<?php echo $user_details['l_name']?>"  id="l_name" name="l_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Email Id</label>
                                            <input type="text" placeholder="Enter Email "
                                                class="form-control required"  value="<?php echo $user_details['email_id']?>"  id="email_id" name="email_id">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Mobile No</label>
                                            <input type="text" placeholder="Enter Mobile No"
                                          disabled      class="form-control required"  value="<?php echo $user_details['primary_mobile']?>"  id="primary_mobile" name="primary_mobile">
                                            </div>
                                             <div class="col-sm-12">
                                            <label>Address</label>
                                            <input type="text" placeholder="Enter Address"
                                                class="form-control required"  value="<?php echo $user_details['v_address']?>"  id="v_address" name="v_address">
                                            </div>
                                            
                                             <div class="col-sm-6">
                                    <label> Select State</label>
                                            <select  placeholder="Enter book Name" class="form-control required select"
                                                id="v_state" name="v_state">
                                                <option value="">Select State </option>
                                                <?php $roles = $this->common_model->getList('v_master_state',array('status'=>'0'));
                                                if(!empty($roles) && is_array($roles))  { 
                                                    foreach($roles as $val) {
                                                        $selected = '';
                                                        if($user_details['id'] == $val["id"]) { 
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option '.$selected.' value="'. $val["id"].'">'. $val["name"].'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            </div>
                                            
                                               <div class="col-sm-6">
                                    <label> Select City</label>
                                            <select  placeholder="Enter book Name" class="form-control required select"
                                                id="v_city" name="v_city">
                                                <option value="">Select City </option>
                                                <?php $roles = $this->common_model->getList('v_master_city',array('status'=>'0'));
                                                if(!empty($roles) && is_array($roles))  { 
                                                    foreach($roles as $val) {
                                                        $selected = '';
                                                        if($user_details['id'] == $val["id"]) { 
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option '.$selected.' value="'. $val["id"].'">'. $val["name"].'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            </div>
                                            
                                             <div class="col-sm-6">
                                            <label>Pincode</label>
                                            <input type="text" placeholder="Enter Pincode"
                                                class="form-control required"  value="<?php echo $user_details['v_pincode']?>"  id="v_pincode" name="v_pincode">
                                            </div>
                                            <div class="col-sm-6">
                                            <label>Area</label>
                                            <input type="text" placeholder="Enter Area"
                                                class="form-control required"  value="<?php echo $user_details['v_area']?>"  id="v_area" name="v_area">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <button type="button" onclick="fn_edit()" class="btn btn-primary">Update Menu</button>
                            </div>
                        </form>
            </div>
            <!-- /basic datatable -->
        </div>
        <!-- /content area -->
        <?php $this->load->view('admin/includes/footer');?>
    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
<script>
function fn_edit() {
    var valid = $("#page_form_id").valid();
    if (valid) {
        var data = {};
        data['action'] = 'update_data';
        data['t_code'] = '1';
        data['hidden_id'] = $("#page_form_id #hidden_id").val();
        //data['username'] = $("#page_form_id #username").val();
        data['email_id'] = $("#page_form_id #email_id").val();
        data['v_address'] = $("#page_form_id #v_address").val();
        data['v_state'] = $("#page_form_id #v_state").val();
        
           data['v_city'] = $("#page_form_id #v_city").val();
           data['v_pincode'] = $("#page_form_id #v_pincode").val();
           data['v_area'] = $("#page_form_id #v_area").val();
        //data['user_type'] = $("#page_form_id #user_type").val();
       fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
    }
}
</script>

<script src="<?php echo base_url('public/global_assets/js/main/common.js') ?> "></script>
</body>

</html>