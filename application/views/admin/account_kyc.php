<?php $this->load->view('admin/includes/top_header');

$userdata = $this->common_model->getList('v_account_detail',array('vendor_id'=>$_SESSION['vendor_id']));
 if(isset($userdata[0]['status'])=='1'){
      redirect('dashboard/review', 'refresh');

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
<legend class="text-uppercase font-size-sm font-weight-bold">KYC Details</legend>
                        <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>
 <div class="alert alert-success" style="margin: 30px 30px 0px 30px; display:none;">
                </div>
                        <form id="acc_regisration_id" name="acc_regisration_id" action="#" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <!----SECTION - 1 ---->

                                        <div class="col-sm-6">
                                            <label>Bank Name</label>
                                            <input type="text" placeholder="Enter Bank Name"
                                                   class="form-control required" id="bank_name" name="bank_name">
                                        </div>
                                        
                                          <div class="col-sm-6">
                                            <label>Account Numberr</label>
                                            <input type="text" placeholder="Enter Account Number"
                                                   class="form-control required" id="account_no" name="account_no">
                                        </div>
                                        
                                          <div class="col-sm-6">
                                            <label>IFSC Code</label>
                                            <input type="text" placeholder="Enter IFSC Code"
                                                   class="form-control required" id="ifsc" name="ifsc">
                                        </div>
                                        
                                          <div class="col-sm-6">
                                            <label>Account Holder Name</label>
                                            <input type="text" placeholder="Enter Account Holder Name"
                                                   class="form-control required" id="account_holder_name" name="account_holder_name">
                                        </div>

                                     


                                        <div class="col-sm-6">
                                           <label class="d-block">Account Type</label>
                                            <select class="form-control select-fixed-single" id="account_type" name="account_type" data-fouc>
                                              <option value="saving">Saving Account</option>
                                                  <option value="current">Current Account</option>
  
                                                </select>
                                        </div>
                                       


                                       
                                        <div class="col-sm-6">
                                            <label>Branch Address</label>
                                            <input type="text" placeholder="Enter Branch Address"
                                                   class="form-control required" id="branch_address" name="branch_address">
                                        </div>

                                    </div>
                                </div>
                            <div class="text-right">
                            <button type="button" class="btn btn-primary" onclick="fn_kyc_registration()" value="Submit">Submit<i class="icon-paperplane ml-2"></i></button>
                                    
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
    
     function fn_kyc_registration() { 
       // alert('sssss');
    var valid = $("#acc_regisration_id").valid();
   
        var data = {};
        data['action'] = 'insert_data';
       
         data['t_code'] = '9';
      
         data['bank_name'] = $("#acc_regisration_id #bank_name").val();
         data['account_no'] = $("#acc_regisration_id #account_no").val();
         data['ifsc'] = $("#acc_regisration_id #ifsc").val();
          data['account_holder_name'] = $("#acc_regisration_id #account_holder_name").val();
           data['account_type'] = $("#acc_regisration_id #account_type").val();
            data['branch_address'] = $("#acc_regisration_id #branch_address").val();
            data['status'] = '1';
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
         $('#acc_regisration_id').trigger("reset") 
        location.reload();
    }
  
    

    
    
</script>
</html>