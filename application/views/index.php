

<?php

$this->load->view("element/top-header.php");
$this->load->view("element/header.php");
$this->load->view("element/sidemenu.php");
$this->load->view("element/nav.php");
$v_banner = $this->common_model->getList('v_banner', array('status' => '0'));
?>
<style>
    .preloader > img {
	 height: 256px  !important;
	width: 256px  !important;
	left: 0  !important;
	margin: 0 auto  !important;
	position: absolute  !important;
	right: 0  !important;
	top: 40%  !important;
}

.shadow {
	box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06) !important;
}


.banner-1 {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 125px;
	background-image: url("../image/banner.jpg");
	background-position: center;
	background-size: cover;
}

.img-circle {
    height: 120px;
    width: 120px;
    border-radius: 150px;
    border: 3pxsolid #fff;
    box-shadow: 0 2px 5px rgb(0 0 0 / 10%);
    z-index: 1;
    margin-top: -53px;
    margin-bottom: 15px;
}
.carde {
    background-color: #ebeef8;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
   
    box-shadow: 0.5rem 0.5rem 3rem rgb(0 0 0 / 20%);
}
</style>

<div class="mainbanner">
    <div id="main-banner" class="owl-carousel home-slider">
        <?php
if (!empty($v_banner) && is_array($v_banner)) {
    foreach ($v_banner as $val) {?>
        <div class="item"> <a href="#"><img src="<?php echo base_url('public/image/banners/' . $val['image']); ?>"
                    alt="<?php echo $val['name']; ?>" class="img-responsive" /></a> </div>
        <?php }}?>
    </div>
</div>
<div class="container-fluid">
    <div class="cms_banner">
        <div class="row">
            <?php
if (!empty($v_banner) && is_array($v_banner)) {
    foreach ($v_banner as $val) {?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="banner sub-hover">
                    <a href="#"><img src="<?php echo base_url('public/image/banners/' . $val['template']); ?>"
                            alt="<?php echo $val['name']; ?>" class="img-responsive"></a>
                    <div class="bannertext">
                        <h2><?php echo $val['name']; ?></h2>
                        <p><?php echo $val['sub_temp']; ?></p>
                        <a href="<?php echo base_url($val['url']); ?>"> <button class="btn">Shop Now</button></a>
                    </div>
                </div>
            </div>
            <?php }}?>

        </div>
    </div>
</div>


<div id="center">
    <div class="container">
        <div class="row">
            <div class="content col-sm-12">
                <div class="customtab">
                    <h3 class="productblock-title">Our Collection </h3>
                    <div id="tabs" class="customtab-wrapper">
                        <ul class='customtab-inner'>
                        
                         <?php
                         if (isset($_SESSION['cust_type']) && $_SESSION['cust_type'] == 'Retailer') { ?>
                            <li class='tab'><a href="#tab-livin">Wholesalers</a></li>
                            <li class='tab'><a href="#tab-kitche">Manufacturers</a></li>
                            <?php } else { ?>
                            <li class='tab'><a href="#tab-Top" onclick="fn_view_more_product('Top','tab-Top')">Product</a></li>
                            <li class='tab'><a href="#tab-outdoo" onclick="fn_view_more_product('Latest','tab-outdoo')">New product</a></li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
                <!-- tab-furniture-->
  <div id="tab-Top" class="tab-content">
  </div>
  <div id="tab-outdoo" class="tab-content">
</div>

                <!-- tab-living-->


                <?php 
                $where_con = array('status' => '0', 'kyc_status' => '0', 'acc_status' => '0', 'shop_status' => '0');
                $v_vendor = $this->common_model->getList('v_vendor', $where_con);
                if (isset($_SESSION['cust_type']) && $_SESSION['cust_type'] == 'Retailer') { 
                
                
                if (!empty($v_vendor) && is_array($v_vendor)) { 
                ?>
                <div id="tab-livin" class="tab-content">
                <?php 
                 $i = 1;
                 foreach ($v_vendor as $val) {
                     $l = explode(',', $val['vendor_category_type']);
                     if (in_array('Top', $l)) {
                        $where_shop = array('vendor_id'=>$val['vendor_id'],'status' => '0');
                        $v_shop11 = $this->common_model->getList('v_shop_vendor', $where_shop);
                        if(!empty($v_shop11) && is_array($v_shop11)) { 
                            foreach($v_shop11 as $v_shop) { 
                ?>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="serviceBox-2">
                            <div class="service-icon">
                                <span> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" 
                                        src="<?php echo base_url('public/image/product/'.$v_shop['shop_image']); ?>"></span>
                            </div>
                            <h3 class="title">Web <span><?php echo substr($v_shop['v_shop_name'],0,15); ?></span></h3>
                            <p class="description">Owner Name: <?php echo 'Mr./Mrs:'.$val['l_name']; ?></p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i
                                        class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-2x"></i><i
                                        class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-2x"></i><i
                                        class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-2x"></i><i
                                        class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-2x"></i></span>
                            </div>
                            <a href="category?vendor-id=<?php echo strtr(base64_encode($val['vendor_id']),'+/=', '._-'); ?>" class="btn" style="padding-top:10px;">Shop</a>
                        </div>
                    </div>
                    <?php 
                    if($i == '4') { break;}
                    $i++;
                            }}
                 } } 
                 if ($i >= '4') {
                 ?>
                    <div class="viewmore">
                        <div class="btn">View More All Products</div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>


                <!-- tab-living-->

                <?php 
                 if (!empty($v_vendor) && is_array($v_vendor)) {  ?>
                <div id="tab-kitche" class="tab-content">
               <?php  $i = 1;
                 foreach ($v_vendor as $val) {
                     $l = explode(',', $val['vendor_category_type']);
                     if (in_array('Recommended', $l)) { 
                         
                        $where_shop = array('vendor_id'=>$val['vendor_id'],'status' => '0');
                        $v_shop11 = $this->common_model->getList('v_shop_vendor', $where_shop);
                        if(!empty($v_shop11) && is_array($v_shop11)) { 
                            foreach($v_shop11 as $v_shop) { 
                         ?>
                  
                  <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="serviceBox-2">
                            <div class="service-icon">
                                <span> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" 
                                        src="<?php echo base_url('public/image/product/'.$v_shop['shop_image']); ?>"></span>
                            </div>
                            <h3 class="title"><span><?php echo substr($v_shop['v_shop_name'],0,15); ?></span></h3>
                            <p class="description">Owner Name: <?php echo 'Mr./Mrs:'.$val['l_name']; ?></p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i
                                        class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-2x"></i><i
                                        class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-2x"></i><i
                                        class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-2x"></i><i
                                        class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-2x"></i></span>
                            </div>
                            <a href="category?vendor-id=<?php echo strtr(base64_encode($val['vendor_id']),'+/=', '._-'); ?>" class="btn" style="padding-top:10px;">Shop</a>
                        </div>
                    </div>

                    <?php 
                if($i == '4') { break;}
                $i++;
                } } } }
                if ($i >= '4') { ?>

                    <div class="viewmore">
                        <div class="btn">View More All Products</div>
                    </div>
                    <?php } ?>

                </div>
                <?php }
                }?>
                <!-- tab-decor-->



            </div>
        </div>
    </div>
</div>
 <!--<div class="container">
<div class="item"> <a href="#"><img src="<?php //echo base_url('public/image/banners/20211109_205610_0000.jpg'); ?>"
                    alt="#" class="img-responsive" /></a> </div></div> -->




 <div class="container">
<div class="item"> <a href="#"><img src="<?php echo base_url('public/image/banners/jpg_20211113_104734_0000.jpg'); ?>"
                    alt="#" class="img-responsive" /></a> </div></div>
 <div class="container">
<div class="mainbanner">
    <div id="main-banner" class="owl-carousel home-slider">
        <?php
if (!empty($v_banner) && is_array($v_banner)) {
    foreach ($v_banner as $val) {?>
        <div class="item"> <a href="#"><img src="<?php echo base_url('public/image/banners/' . $val['image']); ?>"
                    alt="<?php echo $val['name']; ?>" class="img-responsive" /></a> </div>
        <?php }}?>
    </div>
</div>
</div>
<div class="container">
    <h3 class="client-title">Favourite Brands</h3>
    <h4 class="title-subline">The High Quality Products</h4>
    <div id="brand_carouse" class="owl-carousel brand-logo">
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/itc.png'); ?>"
                    alt="Disney" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/dove-removebg-preview.png'); ?>"
                    alt="Dell" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/hul-removebg-preview.png'); ?>"
                    alt="Harley" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/parle-removebg-preview.png'); ?>"
                    alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/bikano-removebg-preview.png'); ?>"
                    alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/haldiram-removebg-preview.png'); ?>"
                    alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/rajdhani-removebg-preview.png'); ?>"
                    alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/patanjali-removebg-preview.png'); ?>"
                    alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/nestle-removebg-preview.png'); ?>"
                    alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="<?php echo base_url('public/image/brand/MDH-removebg-preview.png'); ?>"
                    alt="Canon" class="img-responsive" /></a> </div>
    </div>
</div>

 <script>
 
 
          var limit_product = 1;
            var product_type1 = '';
      function fn_view_more_product(product_type,div_id) {
           $('.preloader').show();
         $("#"+div_id).html('');
          if(product_type1 == product_type) { 
              limit_product = limit_product + 1;
          } else { 
                limit_product = 1;
                product_type1 = product_type;
          }
        var data = {};
            data['action'] = 'view_more_product';
            data['product_type'] = product_type;
            data['div_id'] = div_id;
            data['limit'] = limit_product;
        $.ajax({
             type: "POST",
             url: "ajaxcall",
             data: data,
            success: function(data){
                $("#"+div_id).html(data);
                 $('.preloader').hide();
            }
        });
    }
     
 </script>
 


<?php $this->load->view("element/footer.php");?>