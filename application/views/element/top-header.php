

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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NQF290C4E9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NQF290C4E9');
</script>
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WZR5HQ2');</script>
    
    <?php
    $v_pages = $this->common_model->getList('v_pages', array('status' => '0'));
    $currentURL = current_url();
if (!empty($v_pages) && is_array($v_pages)) {
    foreach ($v_pages as $val) { if($currentURL === $val['page_url']) {?> 
<title><?php echo $val['title']; ?></title>
<meta http-equiv="content-type" content="<?php echo $val['meta_tag']; ?>" />
<meta name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
     user-scalable=0' >
<meta name="description" content="<?php echo $val['description']; ?>" />
 <meta name="keywords" content="<?php echo $val['keywards']; ?>">
 <?php } }} ?>
 <meta name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
     user-scalable=0' >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="<?php echo base_url('public/image/favicon.png'); ?>" rel="icon" type="image/png" >
<link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen" />
<link href="<?php echo base_url('public/javascript/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
<link href="<?php echo base_url('public/css/stylesheet.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('public/css/responsive.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('public/css/main.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('public/css/popup.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('public/javascript/owl-carousel/owl.carousel.css'); ?>" type="text/css" rel="stylesheet" media="screen" />
<link href="<?php echo base_url('public/javascript/owl-carousel/owl.transitions.css'); ?>" type="text/css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="<?php echo base_url('public/javascript/jquery-2.1.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/javascript/bootstrap/js/bootstrap.min.js'); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('public/javascript/template_js/jstree.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/javascript/template_js/template.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/javascript/common.js'); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('public/global_assets/js/main/common.js'); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('public/javascript/global.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/javascript/owl-carousel/owl.carousel.min.js'); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('public/javascript/jquery.parallax.js'); ?>"></script> 

<script src="<?php echo base_url('public/javascript/sweetalert.min.js'); ?>"></script>
<script src="<?php echo base_url('public/global_assets/js/plugins/forms/validation/validate.min.js'); ?>"></script>

</head>
<body class="index">
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZR5HQ2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="preloader loader" id="" style="display: block;"> <img src="<?php echo base_url(); ?>public/image/loading-indicator.gif"  title="E-Commerce_loader" alt="E-Commerce_loader" class="img-responsive" /></div>





