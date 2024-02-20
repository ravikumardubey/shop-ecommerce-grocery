
<?php $this->load->view('admin/includes/top_header');?>
	

<?php $this->load->view('admin/includes/header');
?>
<!-- Page content -->
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-6">
    <div class="card">
    <div class="card-body">
        <legend class="text-uppercase font-size-sm font-weight-bold">Vendor Information</legend>
                        <div class="alert alert-success" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>
                        
                         <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>

                        <form id="vendor_regisration" name="vendor_regisration" action="">


                                <div class="form-group">
                                    <div class="row">
                                        <!----SECTION - 1 ---->

                                        <div class="col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" placeholder="Enter First Name"
                                                   class="form-control required" id="f_name" name="f_name" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Enter last Name"
                                                   class="form-control required" id="l_name" name="l_name" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Date Of Birth</label>
                                            <input type="date" placeholder="Enter Date Of Birth"
                                                   class="form-control required" id="dob" name="dob" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3 mb-md-2" id="gender">
                                                <label class="d-block font-weight-semibold">Gender</label>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="gender" value="male" checked data-fouc>
                                                        Male
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="gender" value="female" data-fouc>
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="gender" value="other" data-fouc>
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Address</label>
                                            <input type="text" placeholder="Enter Vendor Address"
                                                   class="form-control required" id="v_address" name="v_address" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">State</label>
                                             
                                            <select class="form-control select-fixed-single" id="loc_state" name="loc_state" onChange="getCity(this.value);" data-fouc>
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
                                                   class="form-control required" id="pincode" name="pincode" autocomplete="off">
                                        </div>
                                       <div class="col-sm-6">
                                            <label>Area Name</label>
                                            <input type="text" placeholder="Enter Area Name"
                                                   class="form-control required" id="area" name="area" autocomplete="off">
                                        </div>
                                         <div class="col-sm-6">
                                            <label>Email</label>
                                            <input type="text" placeholder="Enter Email"
                                                   class="form-control required" id="email" name="email" autocomplete="off">
                                        </div>
                                       

                                        <div class="col-sm-6">
                                            <label>Primary Mobile Number</label>
                                            <input type="text" placeholder="Enter Primary Mobile Number"
                                                   class="form-control required" id="primary_mobile" name="primary_mobile" autocomplete="off">
                                        </div>

      <div class="col-sm-6" id="mobile_otp_div" style="display:none;">
                                            <label>Mobile OTP</label>
                                            <input type="text" placeholder="Enter OTP" class="form-control required" id="mobile_otp" name="mobile_otp" autocomplete="off">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Password</label>
                                            <input type="password" placeholder="Enter Password"
                                                   class="form-control required" id="psw" name="psw" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Confirm Password</label>
                                            <input type="password" placeholder="Enter Confirm Password"
                                                   class="form-control required" id="cpsw" name="cpsw" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">Security Policy</label>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input-styled" id="termCon" name="termCon" value="Yes" data-fouc>
                                                        <a href="<?php echo base_url(); ?>">Term & Condition </a> &nbsp;and&nbsp; <a href=""> Privacy Policy</a>
                                                    </label>
                                                </div>
</div>


                                    </div>
                                </div>
                            <div class="text-right" id="submit_regstration_button">
                               
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

  
    $(document).ready(function(){
  $("#email_otp").hide();
  $("#mobile_otp_div").hide();
  $("#primary_mobile").prop('disabled', false); //enable
   $("#mobile_otp").prop('disabled', false);
  
   $("#mobile_otp").keyup(function(){
       
        $("#mobile_otp").prop('disabled', false); //enable 
    var primary_mobile = $("#primary_mobile").val();
    var mobile_otp = $("#mobile_otp").val();
    if (mobile_otp.length == 6) {
    var data = {};
    data['action'] = 'check_otp_send';
    data['mobile_no'] = primary_mobile;
    data['user_type'] = 'Vendor';
    data['mobile_otp'] = mobile_otp;
    $.ajax({
        type: 'POST',
        url: 'otpsend',
        data: data,
        dataType: 'html',
        success: function(data) {
            $('.load_container').hide();
               var obj = JSON.parse(data);
               if(obj.status == 'success') { 
                    $("#mobile_otp").prop('disabled', true); //disable 
         $("#submit_regstration_button").html('<button type="button" class="btn btn-primary" onclick="fn_register_vendor()" value="Register">Submit<i class="icon-paperplane ml-2"></i></button>');
               } else { 
                   alert(obj.message);
                     $("#mobile_otp").prop('disabled', false); //disable 
          $("#submit_regstration_button").html('');
               }
        },
        error: function(request, error) {
            swal("Something Error", "error");
            $('.load_container').hide();
        }
    });
    }
   });
       
  
  
  
  
  $("#email").keyup(function(){
var email = $("#email").val();
var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
if(pattern.test(email))
{
    $("#email_otp").show();
} else  {
   $("#email_otp").hide();  
}
  });
  
   $("#primary_mobile").keyup(function(){
    var primary_mobile = $("#primary_mobile").val().replace(/\D+/g,'');
    if (primary_mobile.length == 10) {
    var data = {};
    data['action'] = 'otp_send';
    data['mobile_no'] = primary_mobile;
    data['user_type'] = 'Vendor';
    $.ajax({
        type: 'POST',
        url: 'otpsend',
        data: data,
        dataType: 'html',
        success: function(data) {
            $('.load_container').hide();
            var obj = JSON.parse(data);
              // console.log(obj);
               alert(obj.message);
               if(obj.status == 'success') {
                   $("#primary_mobile").prop('disabled', true); //disable 

          $("#mobile_otp_div").show();
            } else { 
          $("#submit_regstration_button").html('');
          $("#mobile_otp_div").hide(); 
          $("#primary_mobile").prop('disabled', false); //enable
               }
        },
        error: function(request, error) {
            swal("Something Error", "error");
            $('.load_container').hide();
        }
    });
    } else { 
         $("#submit_regstration_button").html('');
          $("#mobile_otp_div").hide();
          $("#primary_mobile").prop('disabled', false); //enable
    }
  });
});
    
    function fn_register_vendor() { 

    var valid = $("#vendor_regisration").valid();
    if (valid) {
        var password =  $("#vendor_regisration #psw").val();
        var con_pass =  $("#vendor_regisration #cpsw").val();
        
        if(password != con_pass) { 
        alert('Please check your confirm password');
            return false
        }  else { 
        var data = {};
        data['action'] = 'insert_data';
         data['t_code'] = '1';
         data['f_name'] = $("#vendor_regisration #f_name").val();
         
         data['l_name'] = $("#vendor_regisration #l_name").val();
         data['dob'] = $("#vendor_regisration #dob").val();
         data['email_id'] = $("#vendor_regisration #email").val();
         data['primary_mobile'] = $("#vendor_regisration #primary_mobile").val();
         data['password'] = $("#vendor_regisration #psw").val();
         data['alternate_mobile'] = $("#vendor_regisration #alt_mobile").val();
         data['gender'] = $("#vendor_regisration #gender").val();
         data['v_address'] = $("#vendor_regisration #v_address").val();
         data['v_state'] = $("#vendor_regisration #loc_state").val();
         data['v_city'] = $("#vendor_regisration #loc_city").val();
         data['v_pincode'] = $("#vendor_regisration #pincode").val();
          data['v_area'] = $("#vendor_regisration #area").val();
           data['term_con'] = $("#vendor_regisration #termCon").val();
       //  data['con_password'] = $("#page_form_id #con_password").val();
        fn_ajax('POST', data, 'json', 'ajaxcall', 'message_data');
        $('#vendor_regisration').trigger("reset");
        }
      
    }
  }
    
    
</script>

</html>