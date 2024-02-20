<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gomor's Admin Login</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="public/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="public/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="public/assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="public/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="public/assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- Core JS files -->
    <script src="public/global_assets/js/main/jquery.min.js"></script>
    <script src="public/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="public/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script src="public/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="public/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="public/assets/js/app.js"></script>
    <style>



    </style>
</head>

<body>

    <div class="load_container">
        <img class="loader" src="public/global_assets/images/loading-indicator.gif">
    </div>

    <?php  // print_r($data); ?>
    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login card -->

                <?php echo validation_errors(); ?>

                <div id="login_div">
                    <form class="login-form form-validate" id="vendor_login" method="post" action="">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i
                                        class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted">Your credentials</span>
                                    <span id="mesage_error" class="text-danger"></span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control required" autocomplete="off" name="username"
                                        placeholder="Username" id="username">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                    <span id="username_error" class="text-danger"></span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control required" autocomplete="off"
                                        name="password" placeholder="Password" id="password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    <span id="password_error" class="text-danger"></span>
                                </div>

                                <div class="form-group d-flex align-items-center">
                                    <div class="form-check mb-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-input-styled" data-fouc>
                                            Remember
                                        </label>
                                    </div>

                                    <a href="#" onclick="fn_login_forgot('1')" class="ml-auto">Forgot password?</a>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" onclick="login()">Sign in <i
                                            class="icon-circle-right2 ml-2"></i></button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- /login card -->

                <!-- forgot card -->
                <div id="forgot_div" style="display:none">
                    <form class="login-form form-validate" action="" autocomplete="off">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i
                                        class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Forgot password</h5>
                                    <span class="d-block text-muted">Your credentials</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control required" autocomplete="off" name="username"
                                        placeholder="Username" id="username">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group d-flex align-items-center">

                                    <a href="#" onclick="fn_login_forgot('2')" class="ml-auto">Login</a>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Forgot password <i
                                            class="icon-circle-right2 ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /forgot card -->

            </div>
            <!-- /content area -->


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; 2015 - 2021. <a href="https://gomores.com">Gomores.com</a> by <a href="https://gomores.com">https://gomores.com</a>
                    </span>


                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    <script>
    function login() {
        var valid = $("#vendor_login").valid();
        if (valid) {
            $('.load_container').show();
            var data = {};
            data['action'] = 'login_vendor';
            data['username'] = $("#vendor_login #username").val();
            data['password'] = $("#vendor_login #password").val();
            $.ajax({
                type: "POST",
                url: "login/login_users",
                data: data,
                dataType: "json",
                success: function(data) {
                    $("#username_error").html('');
                    $("#password_error").html('');
                  
                    if (data.error) {
                        $("#username_error").html(data.username_error);
                        $("#password_error").html(data.password_error);
                    } else if (data.success) {
                        window.location.href = "dashboard";
                    } else {
                        $("#mesage_error").html(data.message);
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

    function fn_login_forgot(type_status) {
        $('#forgot_div').hide();
        $('#login_div').show();
        if (type_status == '1') {
            $('#forgot_div').show();
            $('#login_div').hide();
        }
    }
    </script>
</body>

</html>