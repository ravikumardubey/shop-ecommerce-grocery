<?php

if(isset($_SESSION['id']) && $_SESSION['id'] != '' && isset($_SESSION['user_id']) &&  $_SESSION['user_id'] != '' && isset($_SESSION['email_id']) && $_SESSION['email_id'] != '' && isset($_SESSION['primary_mobile']) && $_SESSION['primary_mobile'] != '') { 
  redirect('profile', 'refresh');
  }
$this->load->view("element/top-header.php");

?>
<link href="<?php echo base_url('public/css/login.css'); ?>" rel="stylesheet">
<body class="category col-2 left-col">
    <div class="preloader loader" style="display: block;"> <img src="<?php echo base_url('public/imagelogo.png'); ?>"
            alt="#" /></div>
    <div class="login form-bg">

        <div class="container">
            <div class="row">
                <div class="col-lg-offset-3 col-lg-4 col-md-offset-2 col-md-8">
                    <div class="form-container">
                        <div class="form-icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="signup"><a href="<?php echo base_url(); ?>">Gomores Registeration</a></span>
                        </div>
                        <form class="form-horizontal" enctype="multipart/form-data" method="post"  id="user_register_page" name="user_register_page" >
                            <div class="bd-example">
                                <div class="alert alert-success" role="alert">
                                   
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input type="text" class="required form-control"  placeholder="First Name" value="" id="f_name" name="f_name" autocomplete="off">
                            </div>
                            <span class="help-block-1"></span>


                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input type="text" class="required  form-control" id="l_name" placeholder="Last Name" value="" name="l_name" autocomplete="off">
                            </div>
                             <span class="help-block-1"></span>



                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="required form-control" id="email_id" placeholder="E-Mail" value="" name="email_id" autocomplete="off">
                            </div>
                            <span class="help-block-1"></span>
                            <!-- <div class="form-group" id="email_otp" style="display:none;">
                                <span class="input-icon"><i class="fa fa-key"></i></span>
                                <input type="text" class="required form-control" id="email_otp" placeholder="Enter your OTP" value="" name="email_otp" autocomplete="off">

                            </div> -->
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-phone-square"></i></span>
                                <input type="text" class="required form-control" id="primary_mobile" placeholder="Enter your Primary No" value="" name="primary_mobile" autocomplete="off">
                            </div>
                             <span class="help-block-1"></span>

                            <div class="form-group"  id="mobile_otp_div"  style="display:none;">
                                <span class="input-icon"><i class="fa fa-key"></i></span>
                                <input type="text" class="required form-control" id="mobile_otp" placeholder="Enter your Mobile OTP" value="" name="mobile_otp" autocomplete="off">

                            </div>
 <span class="help-block-1"></span>


                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-book"></i></span>
                                <input class="form-control" type="text" placeholder="Address">
                            </div>
                            <span class="help-block-1"></span>


                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-university"></i></span>
                                <select class="form-control select-fixed-single" id="loc_state" name="loc_state"
                                    onChange="getCity(this.value);" data-fouc>
                                    <option value="0">Select State</option>
                                    <?php $loc_data = $this->common_model->getProductData('v_master_state', array('status' => '0'), '50');   
                                  
                            if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) {?>
                                    <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                                    <?php     }}?>
                                </select>
                                </select>
                            </div>
                            <span class="help-block-1"></span>




                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-leaf"></i></span>
                                <select class="form-control select-fixed-single" id="loc_city" name="loc_city" data-fouc>
                                                <optgroup label="Select City">
                                                    <option value="0">Select City</option>
                                                   
                                                </optgroup>
                                            </select>
                            </div>
                             <span class="help-block-1"></span>

                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-street-view"></i></span>
                                <input class="form-control" type="text" placeholder="Pincode">
                            </div>
                            <span class="help-block-1"></span>


                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-leaf"></i></span>
                                <input type="password" class="required form-control" id="password" placeholder="Password" value="" name="password" autocomplete="off">
                            </div>
                             <span class="help-block-1"></span>

                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-street-view"></i></span>
                                <input type="password" class="required form-control" id="con_password" placeholder="Password Confirm" value="" name="con_password" autocomplete="off">
                            </div>
                             <span class="help-block-1"></span>


                            <div class="text-right" id="submit_regstration_button">

</div>
                            <!-- <button class="btn signin" >Register</button> -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


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
    data['user_type'] = 'User';
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
         $("#submit_regstration_button").html('<button type="button" class="btn btn-primary signin" onclick="fn_register()" value="Register">Submit<i class="icon-paperplane ml-2"></i></button>');
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
   
});

 $("#primary_mobile").keyup(function(){
    var primary_mobile = $("#primary_mobile").val().replace(/\D+/g,'');
    if (primary_mobile.length == 10) {
    var data = {};
    data['action'] = 'otp_send';
    data['mobile_no'] = primary_mobile;
    data['user_type'] = 'User';
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


  function fn_register() { 
    var valid = $("#user_register_page").valid();
    if (valid) {
        var password =  $("#user_register_page #password").val();
        var con_pass =  $("#user_register_page #con_password").val();
        
        if(password != con_pass) { 
        swal('Please check your confirm password');
            return false
        }  else { 
        var data = {};
        data['action'] = 'insert_data';
         data['t_code'] = '3';
         data['f_name'] = $("#user_register_page #f_name").val();
         data['l_name'] = $("#user_register_page #l_name").val();
         data['primary_mobile'] = $("#user_register_page #primary_mobile").val();
         data['loc_state'] = $("#user_register_page #loc_state").val();
         data['loc_city'] = $("#user_register_page #loc_city").val();
         data['email_id'] = $("#user_register_page #email_id").val();
         data['password'] = $("#user_register_page #password").val();
       //  data['con_password'] = $("#user_register_page #con_password").val();
        fn_ajax('POST', data, 'json', 'ajaxcall', 'message_data');
        $('#user_register_page').trigger("reset");
        }
      
    }
  }
  
   $(document).ready(function(){
  $(".alert").hide();
 //   $(".help-block-1").hide();
  
});
 
  </script>

<script src="<?php echo base_url('public/global_assets/js/main/common.js'); ?>"></script>