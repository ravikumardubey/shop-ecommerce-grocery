<?php 


$this->load->view("element/top-header.php");
$this->load->view("element/header.php");
$this->load->view("element/sidemenu.php");
$this->load->view("element/nav.php");

if(isset($_REQUEST['vendor_id']) && $_REQUEST['vendor_id'] != '') { 
$vendor_id = $_REQUEST['vendor_id'];
$product_data = $this->common_model->getProductData('v_product',array('status'=>'0','vendor_id'=>base64_decode(strtr($vendor_id, '._-', '+/='))),'8');
$Shop_info = $this->common_model->getProductData('v_shop_vendor',array('status'=>'0','vendor_id'=>base64_decode(strtr($vendor_id, '._-', '+/='))),'8');
} else if(isset($_REQUEST['search']) && $_REQUEST['search'] != '') { 
    
$search = $_REQUEST['search'];

$this->db->select('*');
$this->db->from('v_product');
$this->db->like('name', $search);
//echo $this->db->last_query();
$product_data =  $this->db->get()->result_array();
if(empty($product_data)) { 
  $this->db->select('*');
$this->db->from('v_shop_vendor');
$this->db->where_in('v_shop_name',$search);
//echo $this->db->last_query();
$product_shop =  $this->db->get()->result_array();
if(isset($product_shop[0]['vendor_id']) && $product_shop[0]['vendor_id'] != '') { 
$vendor_id =$product_shop[0]['vendor_id'];
$product_data = $this->common_model->getProductData('v_product',array('status'=>'0','vendor_id'=>$vendor_id),'8');
}

}
//$product_data = $this->common_model->getProductData('v_product',array('status'=>'0','vendor_id'=>base64_decode(strtr($vendor_id, '._-', '+/='))),'8');
$Shop_info = array();
}

if(empty($product_data)) { 
 //  redirect(base_url(), 'refresh');
}
    

?>
<script src="<?php echo base_url(); ?>public/global_assets/js/main/common.js"></script>

<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?php echo base_url('public/image/prlx.jpg'); ?>" alt="#"></div>
  <h1 class="category-title">Category</h1>
  <ul>
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="#">Category </a></li>
  </ul>
</div>


<div class="only-mobile_view ">
    <div class="col-xs-12">
         <?php 
  if(!empty($Shop_info) && is_array($Shop_info)) { 
    foreach($Shop_info as $val) { 
 ?>
        <div class="main-timeline">
            <div class="timeline">
                <a href="#" class="timeline-content">
                   
                    <h3 class="title"><?php echo $val['v_shop_name']; ?></h3>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> Deliver at &nbsp;<?php echo $val['v_shop_pincode']; ?></p>
                    <span class="nunito-medium" style="font-size: 9px;"><img src="<?php echo base_url('public/image/noun_delivery van_72.png'); ?>"
                            style="width: 13px"> 1000+ Orders | <img src="<?php echo base_url('public/image/noun_review3x.png'); ?>" style="width: 13px">
                        Reviews</span>
                    <div class="timeline-icon"><i class="fa fa-user" style="font-size: 32px; color: #3fc767;"></i></div>

                </a>
               
            </div>

        </div>
 <?php }} ?>
    </div>
</div>


<div id="center">
    <div class="container">
        <div class="row">
            <div class="content col-sm-12">
            <?php 
  if(!empty($product_data) && is_array($product_data)) { 
      $iii= 1;
    foreach($product_data as $val) { 
         $images_data =  $this->common_model->getImagelist($val['product_id']);
 ?>

                <div class="product-layout  product-grid  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="item">
                        <div class="product-thumb">
                            <div class="image product-imageblock"> <a href="product?pro_id=<?php echo base64_encode($val['product_id']); ?>"> <img
                                        src="<?php echo $images_data['image1']; ?>" alt="iPod Classic" title="iPod Classic"
                                        class="img-responsive" /> <img src="<?php echo $images_data['image2']; ?>"
                                        alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                                        
                                        <?php 
                                   
                                    $buying_price = $val['MRP_price'];
                                    $selling_price = $val['price'];
                                    
                                    $discount = (($buying_price-$selling_price)/$buying_price)*100;
                                    $fn_getWeight =  $this->common_model->fn_getWeight($val['product_id']);
                                    $pro_weight = '';
                                    if(!empty($fn_getWeight) && is_array($fn_getWeight)) { 
                                        $pro_weight = $fn_getWeight[0]['id'];
                                    } 
                                    ?>
                                     <?php if($buying_price!=$selling_price){ ?>
                                            <div id="saving_box_2043_2240" class="saving_box"><?php echo Round($discount) ?>% OFF</div>
                                            <?php } ?>
                                
                            </div>
                            <div class="caption product-detail">
                                <div class="rating"> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i><i
                                            class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                <h4 class="product-name"><a href="product?pro_id=<?php echo base64_encode($val['product_id']); ?>" title="<?php echo $val['short_name']; ?>"><?php echo substr($val['brand_name'],0,15); ?></br><?php echo substr($val['short_name'],0,15); ?></a></h4>
                                  <?php if($val['price'] == $val['MRP_price'] ){?>
                                    <p class="price product-price">₹<?php echo $val['price']; ?></p>
                                    <?php }else{ ?>
                                    <p class="price product-price">₹<?php echo $val['price']; ?><span class="less">₹<?php echo $val['MRP_price']; ?></span>
                                    </p>
                                    <?php }?>
                                <div class="button-custome-plus">
                                    <div class="input-group mb-3 catagre">
                                        <div class="input-group-prepend">
                                            <button onclick="fn_plus('<?php echo $val['product_id']; ?>','1')"  class="btn btn-dark btn-sm" id="minus-btn"><i
                                                    class="fa fa-minus"></i></button>
                                        </div>
                                        <input type="text" id="qty_input<?php echo $val['product_id']; ?>" name="qty_input<?php echo $val['product_id']; ?>" class="form-control form-control-sm"
                                            value="1" min="1" style="text-align:center;">
                                        <div class="input-group-prepend">
                                            <button onclick="fn_plus('<?php echo $val['product_id']; ?>','2')" class="btn btn-dark btn-sm" id="plus-btn"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <a href="JavaScript:void(0)"  onclick="fn_add_cart('<?php echo $val['product_id']; ?>','1','<?php echo $pro_weight; ?>')" class="btn add"
                                        style="padding-top:10px;">Add Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } else { ?>
             
        <div class="card-custome">

                    <div class="container cartss">
        <div class="row ">
    <div class="col-md-offset-2 col-md-8 purchase">
         <h3 class="purchase-title">product is not found!</h3>
      <h3 class="purchase-title">Please search any other prodcut!</h3>
     <button onclick="location.href='https://gomores.com/'" type="button" class="btn btn-primary">Buy Now</button>
    </div>
  </div>
  </div>
                </div><style>
            
            .cartss{ margin-bottom: 85px;
                
            }
        </style> 
                
<?php } ?>
            </div>
            <!-- tab-living-->

        </div>
    </div>
</div>


<style>
.button_related {
    padding: 0px 8px 0px 5px;
}

</style>
<script>

</script>


<?php $this->load->view("element/related_product.php");?>
<?php $this->load->view("element/footer.php");?>