<?php 

$_SESSION['session_user_id1'] = rand();
$my_var = isset($_SESSION['session_user_id']) ? $_SESSION['session_user_id'] : '';
if(isset($_SESSION['session_user_id1']) && $_SESSION['session_user_id1']!='' && $my_var == '') { 
  $_SESSION['session_user_id'] = rand();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>GoMores</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Gomores is fastest growing e-commerce portal"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="<?php echo base_url(); ?>public/image/favicon.png" rel="icon" type="<?php echo base_url(); ?>public/image/png" >
<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>public/css/stylesheet.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/javascript/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/css/mobile_view.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/javascript/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
<link href="<?php echo base_url(); ?>public/javascript/owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />

<script type="text/javascript" src="<?php echo base_url(); ?>public/global_assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/global_assets/demo_data/js/form_select2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/javascript/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/javascript/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/javascript/template_js/jstree.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/javascript/template_js/template.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/javascript/common.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/global_assets/js/main/common.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/javascript/global.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/javascript/owl-carousel/owl.carousel.min.js" ></script>


<script src="<?php echo base_url(); ?>public/javascript/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>public/global_assets/js/plugins/forms/validation/validate.min.js"></script>


</head>

<body class="index">
<div class="preloader loader" style="display: block;"> <img src="<?php echo base_url(); ?>public/image/gomoresjp.jpeg"  title="E-Commerce_loader" alt="E-Commerce_loader" class="img-responsive" /></div>
