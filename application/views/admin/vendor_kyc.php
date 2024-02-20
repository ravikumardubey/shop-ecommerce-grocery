<?php $this->load->view('admin/includes/top_header');


?>
<?php $this->load->view('admin/includes/header');

$userdata = $this->common_model->getList('v_vendor_kyc',array('vendor_id'=>$_SESSION['vendor_id']));
 if(isset($userdata[0]['status'])=='1'){
      redirect('dashboard/account_kyc', 'refresh');

  }
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
                        <form id="kyc_regisration_id" name="kyc_regisration_id" action="#" enctype="multipart/form-data">
 <input type="hidden" name="hidden_action" id="hidden_action" value="image_upload_kyc" />
  <input type="hidden" name="pages" id="pages" value="v_vendor_kyc" />

                                <div class="form-group">
                                    <div class="row">
                                        <!----SECTION - 1 ---->

                                        
                                        <div class="col-sm-6">
                                            <label>Aadhar Card Number</label>
                                            <input type="text" placeholder="Enter Shop Name"
                                                   class="form-control required" id="aadhar_card" name="aadhar_card">
                                        </div>


                                        <div class="col-sm-6">
                                                <label >Upload Aadhar Image</label>
                                                    
                                                        <input type="file"  id="aadhar_card_img" name="aadhar_card_img[]" value="aadhar_card_img" multiple accept="image/png, image/jpeg">
                                                        
                                                   

                                    </div>


                                        <div class="col-sm-6">
                                            <label>Pancard</label>
                                            <input type="text" placeholder="Enter Pan Card"
                                                   class="form-control required" id="pancard" name="pancard">
                                        </div>
                                       


                                       
                                        <div class="col-sm-6">
                                            <label>GST NO</label>
                                            <input type="text" placeholder="Enter GST No"
                                                   class="form-control required" id="gst_no" name="gst_no">
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
    var valid = $("#kyc_regisration_id").valid();
   
        var data = {};
        data['action'] = 'insert_data';
       
         data['t_code'] = '25';
      
         data['aadhar_card'] = $("#kyc_regisration_id #aadhar_card").val();
         data['pancard'] = $("#kyc_regisration_id #pancard").val();
         data['gst_no'] = $("#kyc_regisration_id #gst_no").val();
         data['status'] = '1';
        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
        
         with(document.kyc_regisration_id) {
        method = "post";
        action = "../image_upload";
        submit();
    }
  
        $('#kyc_regisration_id').trigger("reset");
       location.reload();
      
    }
      

    
    
</script>
</html>