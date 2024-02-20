    <?php

if(isset($_SESSION['id']) && $_SESSION['id'] != '' && isset($_SESSION['user_id']) &&  $_SESSION['user_id'] != '' && isset($_SESSION['email_id']) && $_SESSION['email_id'] != '' && isset($_SESSION['primary_mobile']) && $_SESSION['primary_mobile'] != '') { 
  redirect('profile', 'refresh');
  }
$this->load->view("element/top-header.php");

?>
    <link href="<?php echo base_url('public/css/login.css'); ?>" rel="stylesheet">

    <body class="category col-2 left-col">
        <!-- <div class="preloader loader" style="display: block;"> <img src=""
            alt="#" /></div> -->
        <div class="login form-bg">

            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-4 col-md-offset-2 col-md-8">
                        <div class="form-container">
                            <div class="form-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="signup"><a href="<?php echo base_url(); ?>">Gomores
                                        Registeration</a></span>
                            </div>
                            <form class="form-horizontal" enctype="multipart/form-data" method="post"
                                id="user_register_page" name="user_register_page">
                                <div class="bd-example">
                                   
                                    <div class="alert alert-success" role="alert" style="font: 18px Arial, sans-serif; color: green">
                                    </div>
                                    <div class="alert alert-danger" role="alert">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="required form-control" placeholder="First Name"
                                        minlength="2" maxlength="20" value="" id="f_name" name="f_name"
                                        autocomplete="off">
                                </div>
                                <span class="help-block-1" name="f_name_val" id="f_name_val" style="color:red;"></span>


                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="required  form-control" id="l_name"
                                        placeholder="Last Name" minlength="2" maxlength="20" value="" name="l_name"
                                        autocomplete="off">
                                </div>
                                <span class="help-block-1" id="l_name_val" style="color:red;"></span>



                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="required form-control" id="email_id" placeholder="E-Mail"
                                        value="" minlength="2" maxlength="50" name="email_id" autocomplete="off">
                                </div>
                                <span class="help-block-1" id="email_id_val" style="color:red;"></span>

                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="required form-control" id="primary_mobile"
                                        placeholder="Enter your Primary No" value="" name="primary_mobile"
                                        autocomplete="off">
                                </div>
                                 <i class="fa fa-arrow-circle-right arrow" alt="Verify" title="Verify" aria-hidden="true" style="font-size:48px; color:green; float:right;"></i> 
                                <span class="help-block-1" id="primary_mobile_val" style="color:red;"></span></br></br></br>

                                <div class="form-group" id="mobile_otp_div" style="display:none;">
                                    <span class="input-icon"><i class="fa fa-key"></i></span>
                                    <input type="text" class="required form-control" id="mobile_otp"
                                        placeholder="Enter your Mobile OTP" value="" name="mobile_otp" maxlength="6"
                                        autocomplete="off">

                                </div>
                                <span class="help-block-1"></span>


                                <div class="form-group" id="hidd_passw" style="display:none;">
                                    <span class="input-icon"><i class="fa fa-leaf"></i></span>
                                    <input type="password" class="required form-control" id="password"
                                        placeholder="Password (Ex. Xyz@12345)" value="" name="password" minlength="8" maxlength="25"
                                        autocomplete="off"
                                        title="">

                          
                                </div>

                                <span class="help-block-1" id="password-strength-status"></span>

                                <div class="form-group" id="hidd_passwdd" style="display:none;">
                                    <span class="input-icon"><i class="fa fa-street-view"></i></span>
                                    <input type="password" class="required form-control" id="con_password"
                                        placeholder="Confirm Password (Ex. Xyz@12345)" value="" name="con_password" minlength="8"
                                        maxlength="25" autocomplete="off"
                                        title="">

                                </div>

                                <span class="help-block-1"></span>


                                <div class="text-right" id="submit_regstration_button">

                                </div>
                                
                                <button type="button" class="btn btn-primary forgot-pass" onclick="location.href = '<?php echo base_url('login'); ?>';" value="Register"><i class="fa fa-arrow-circle-right arrow" alt="Back" title="Back" aria-hidden="true" style="font-size:48px; color:blue; float:left;"></i>Back to Login<i class="icon-paperplane ml-2"></i></button>
                              <!--  <span class="forgot-pass"><a href="<?php echo base_url('login'); ?>"><u><strong
                                                style="font-weight: 800;">New User Login</strong></u></a></span><br>
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
$(document).ready(function() {
    
    //  $("#submit_regstration_button").html(
    //                         '<button type="button" class="btn btn-primary signin" onclick="fn_register()" value="Register">Submit<i class="icon-paperplane ml-2"></i></button>'
    //                         );
$("#hidd_passw").hide();
$("#hidd_passwdd").hide();
$(".forgot-pass").hide();
   
  
    $("#email_otp").hide();
    $("#mobile_otp_div").hide();
    $("#primary_mobile").prop('disabled', false); //enable
    $("#mobile_otp").prop('disabled', false);

    $("#mobile_otp").keyup(function() {
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
                    if (obj.status == 'success') {
                        $("#mobile_otp").prop('disabled', true); //disable 
                        $(".forgot-pass").show();
                        $("#hidd_passw").show();
                        $("#hidd_passwdd").show();
                        $("#submit_regstration_button").html(
                            '<button type="button" class="btn btn-primary signin" onclick="fn_register()" value="Register">Submit<i class="icon-paperplane ml-2"></i></button>'
                            );
                    } else {
                        swal(obj.message);
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

$("#primary_mobile").keyup(function() {
    var primary_mobile = $("#primary_mobile").val().replace(/\D+/g, '');
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
                swal(obj.message);
                if (obj.status == 'success') {
                     $(".arrow").hide();
                     
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
     var BASE_URL = '<?php echo base_url('login'); ?>';
    
    var password = $("#user_register_page #password").val();
    var con_pass = $("#user_register_page #con_password").val();
    var f_name = $("#user_register_page #f_name").val();

    var l_name = $("#user_register_page #l_name").val();

    var primary_mobile = $("#user_register_page #primary_mobile").val();

    var email_id = $("#user_register_page #email_id").val();

    var password = $("#user_register_page #password").val();


    f_name = f_name.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });


    if (f_name == "") {
        document.getElementById('f_name_val').innerHTML = "** Please fill the First Name field";
        return false;
    }

    var alphaExp = /^[a-zA-Z]+$/;
    if (!f_name.match(alphaExp)) {
        document.getElementById('f_name_val').innerHTML = "** Please fill Alphabet only field";
        return false;
    }


    if (l_name == "") {
        document.getElementById('l_name_val').innerHTML = "** Please fill the Last Name field";
        return false;
    }

    l_name = l_name.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });

    var alphaExp = /^[a-zA-Z]+$/;
    if (!l_name.match(alphaExp)) {
        document.getElementById('l_name_val').innerHTML = "** Please fill Alphabet only field";
        return false;
    }
    if (primary_mobile == "") {
        document.getElementById('primary_mobile_val').innerHTML = "** Please fill the Phone Number field";
        return false;
    }
    if (isNaN(primary_mobile)) {
        document.getElementById('primary_mobile_val').innerHTML = "** Please fill Only Digit not alphabet";
        return false;
    }
    if (email_id == "") {
        document.getElementById('email_id_val').innerHTML = "** Please fill the Email ID field";
        return false;
    }
     if (password == "") {
        document.getElementById('password-strength-status').innerHTML = "** Please fill the Password  field";
        return false;
    }
     if(password.length<8){
         document.getElementById('password-strength-status').innerHTML = "** Please fill the Password  atleast 8 character";
        return false;
     }
    if(password.search(/[0-9]/)==-1)
    {
         document.getElementById('password-strength-status').innerHTML = "** Please fill the Password  atleast 1 Numeric character";
        return false;
     }
     if(password.search(/[a-z]/)==-1)
    {
         document.getElementById('password-strength-status').innerHTML = "** Please fill the Password  atleast 1 Lower character";
        return false;
     }
    if(password.search(/[A-Z]/)==-1)
    {
         document.getElementById('password-strength-status').innerHTML = "** Please fill the Password  atleast 1 Upper character";
        return false;
     }
     if(password.search(/[!\@\#\$\%\^\&\*\(\)\_\-\+\?]/)==-1)
    {
         document.getElementById('password-strength-status').innerHTML = "** Please fill the Password  atleast 1 Special character";
        return false;
     }
    

    var valid = $("#user_register_page").valid();
    if (valid) {
        var password = $("#user_register_page #password").val();
        var con_pass = $("#user_register_page #con_password").val();
        
        if (password != con_pass) {
            swal('Please check your confirm password');
            return false
        } else {
            var data = {};
            data['action'] = 'insert_data';
            data['t_code'] = '3';
            data['f_name'] = f_name;
            data['l_name'] = l_name;
            data['primary_mobile'] = $("#user_register_page #primary_mobile").val();
            data['email_id'] = $("#user_register_page #email_id").val();
            data['password'] = $("#user_register_page #password").val();
            fn_ajax('POST', data, 'json', 'ajaxcall', 'message_data');
            window.location.href = BASE_URL;
            // /header(BASE_URL);
            $('#user_register_page').trigger("reset");
                 
        }

    }
}

$(document).ready(function() {
    $(".alert").hide();
    //   $(".help-block-1").hide();

});
    </script>

    <script src="<?php echo base_url('public/global_assets/js/main/common.js'); ?>"></script>