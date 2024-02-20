<link href="css/login.css" rel="stylesheet">
<style>
    .error{
        color: red;
    }
</style>
<?php include("element/top-header.php"); ?>
<link href="<?php echo base_url('public/css/login.css'); ?>" rel="stylesheet">
<body class="category col-2 left-col">
<div class="preloader loader" style="display: block;"> <img src="image/loader.gif"  alt="#"/></div>
<div class="login form-bg">

        <div class="container">
           <div class="row">
                <div class="col-lg-offset-3 col-lg-4 col-md-offset-2 col-md-8">
                    <div class="form-container">
                    	<div class="form-icon">
                    		<i class="fa fa-user" aria-hidden="true"></i>
                    		<span class="signup"><a href="<?php echo base_url('login'); ?>">Reset Password</a></span>
                    	</div>
                        <form class="form-horizontal" id='form_reset_password'>
						<div class="bd-example">
<div style="display:none" class="alert alert-success" role="alert">
 
</div>
<div style="display:none" class="alert alert-danger" role="alert">
 
</div>
</div>
                             <div class="form-group">
                                <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                <input class="required form-control" type="text" name="registered_mobile" id="registered_mobile" placeholder="Please Enter Registered Mobile Number">
							 </div>
							<span class="help-block-1">Please correct Registered Mobile No. error</span>
                            <button type="button" class="btn signin" onClick="fn_reset_password()">Reset</button>
                            <span class="forgot-pass"><a href="<?php echo base_url('login'); ?>"><strong>Back in login</strong></a></span><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



<script>
$( document ).ready(function() {
    $(".help-block-1").hide();
});
  function fn_reset_password() { 
     
      $(".alert-success").hide();
      $(".alert-danger").hide();
      
    var valid = $("#form_reset_password").valid();
    if(valid) {
        var registered_mobile = $("#form_reset_password #registered_mobile").val();
        var data = {};
         data['action'] = 'reset_password';
         data['t_code'] = '3';
         data['registered_mobile'] = $("#form_reset_password #registered_mobile").val();
         fn_ajax('POST', data, 'json', 'ajaxcall', 'message_data');
       // $('#form_reset_password').trigger("reset");
    }
  }
 
  </script>

<script src="<?php echo base_url('public/global_assets/js/main/common.js'); ?>"></script>