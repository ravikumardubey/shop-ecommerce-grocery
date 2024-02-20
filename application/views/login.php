

<?php

if(isset($_SESSION['id']) && $_SESSION['id'] != '' && isset($_SESSION['user_id']) &&  $_SESSION['user_id'] != '' && isset($_SESSION['email_id']) && $_SESSION['email_id'] != '' && isset($_SESSION['primary_mobile']) && $_SESSION['primary_mobile'] != '') { 
  redirect('profile', 'refresh');
  }
$this->load->view("element/top-header.php");
?>

<link href="<?php echo base_url('public/css/login.css'); ?>" rel="stylesheet">

<body class="category col-2 left-col">
<!--<div class="preloader loader" style="display: block;"> <img src=""  alt="#"/></div> -->
<div class="login form-bg">

        <div class="container">
           <div class="row">
                <div class="col-lg-offset-3 col-lg-4 col-md-offset-2 col-md-8">
                    <div class="form-container">
                    	<div class="form-icon">
                    		<i class="fa fa-user" aria-hidden="true"></i>
                    		<span class="signup"><a href="">Gomores Login</a></span>
                    	</div>
                        <form class="form-horizontal"  enctype="multipart/form-data" method="post"  id="page_form_id" name="page_form_id">
						<div class="bd-example">
<div class="alert alert-success" id="message_successful" role="alert" style="font: 18px Arial, sans-serif; color: green">
</div>
<div class="alert alert-danger" id="message_error" role="alert">
</div>

</div>
              <div class="form-group">
                                <span class="input-icon"><i class="fa fa-envelope"></i></span> 
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="prim_mobile" value="" placeholder="Enter Primary Mobile" id="prim_mobile" class=" form-control">
							 </div>
							<span class="help-block-1"  id="username_error"></span>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" value="" placeholder="Password" id="password" class=" form-control">
							</div>
							<span class="help-block-1"  id="password_error"></span>
                            <button type="button" class="btn signin" onclick="fn_login()">Login</button>
                            <span class="forgot-pass"><a href="<?php echo base_url('forgetpassword'); ?>">Forgot Username/Password?</a></span><br>
                                                        <span class="forgot-pass"><a href="<?php echo base_url('register'); ?>">If you are new user Please <u>Register</u></a></span><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php $check_login = isset($_REQUEST['check_login']) ? base_url('checkout') :  base_url(); ?>

<script>

document.getElementById('message_successful').style.display = "none";
document.getElementById('message_error').style.display = "none";
 //$(document).ready(function(){
 // $(".alert").hide();
 //   $(".help-block-1").hide();
  
//});
function fn_reg(){ 
  window.location.href="<?php echo base_url('register'); ?>";
}

  function fn_login() { 
    var valid = $("#page_form_id").valid();
    if (valid) {
          $('.load_container').show();
        var password =  $("#page_form_id #password").val();
        
         var check_login =  '<?php echo $check_login; ?>';
        var prim_mobile =  $("#page_form_id #prim_mobile").val();
        var data = {};
        data['action'] = 'login_user';
        data['password'] = password;
        data['username'] = prim_mobile;
        $.ajax({
        type: 'POST',
        url: 'ajaxcall',
        data: data,
        dataType: 'json',
            success: function(data) {
                    $("#username_error").html('');
                    $("#password_error").html('');
                    if (data.error) {
                        $("#username_error").html(data.username_error);
                        $("#password_error").html(data.password_error);
                    } else if (data.success) {
                        
                 $("#message_successful").show();
                        $("#message_successful").html(data.message);
                        $("#message_error").hide();
                        window.location.href = "<?php echo $check_login; ?>";
                    } else {
                         $("#message_error").show();
                        $("#message_error").html(data.message);
                    }
                    $('.load_container').hide();
                },
                error: function(request, error) {
                    alert("something error");
                    $('.load_container').hide();
                }
    });
        
    }
  }


</script>

<script src="<?php echo base_url('public/global_assets/js/main/common.js'); ?>"></script>