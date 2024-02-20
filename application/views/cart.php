<?php 

$this->load->view("element/top-header.php");
$this->load->view("element/header.php");
$this->load->view("element/sidemenu.php");
$this->load->view("element/nav.php");

?>



<span class="side-menu-2" style="" onclick="openNav()">&#9776;</span>
<div class="breadcrumb parallax-container">
    <div class="parallax"><img src="<?php echo base_url('public/image/prlx.jpg'); ?>" alt="#"></div>
    <h1>Shopping Cart</h1>
    <ul>
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url('cart'); ?>">Shopping Cart</a></li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="card-custome">

            <?php 

$session_user = $_SESSION['__ci_last_regenerate'];

$session_user_id = isset($_SESSION['session_user_id']) ? $_SESSION['session_user_id'] : '';
$data_check = array('user_id' => $session_user_id, 'session_user_id' => $session_user_id, 'status' => '0');
$v_product_cart = $this->common_model->getProductData('v_product_cart', $data_check, 100);
 $sub_total = 0;
$all = 0;
$cart_view = '';
$Mrp = '';

$cart_item = count($v_product_cart);
if (!empty($v_product_cart) && is_array($v_product_cart)) {
    $iii = 1;
    foreach ($v_product_cart as $val) {
        
     $product_data1 = $this->common_model->getProductData('v_product',array('status'=>'0','product_id'=>$val['product_id']),'8');  
     
     
     
      $product_data_data = $this->common_model->getProductData('v_product_color_size', array('product_id' => $val['product_id'],'id' => $val['size_id']), '100');
       
       
     
     $product_id=  $val['id'];
     $product_id_main = $val["product_id"];
     $product_id_main = "$product_id_main";
      $images_data =  $this->common_model->getImagelist($product_id_main);
      
      
      
                                    $fn_getWeight =  $this->common_model->fn_getWeight($val['product_id']);
                                    $pro_weight = '';
                                    if(!empty($fn_getWeight) && is_array($fn_getWeight)) { 
                                        $pro_weight = $fn_getWeight[0]['id'];
                                    }
     
     ?>
     <style>
         .close {
    margin-top: -7px;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover, .close:focus {
    
    text-decoration: none;
    cursor: pointer;
}
     </style>
        
     <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="card-style">
                    <div class="media">
                       <span class="close" data-toggle="tooltip" onclick="fn_remove_cart('<?php echo $val['id']?>')" data-original-title="Remove">×</span> 
                        <div class="media-left">
                            
                            <img class="img-responsive" width="100" heigh="100" src="<?php echo $images_data['image1']; ?>">
                        </div>
                        <div class="media-body">
                            <p class="price product-price">₹<?php echo $product_data_data[0]['price'] ?><span class="less">₹<?php echo $product_data_data[0]['MRP_price'] ?></p>
                            <div class="members pull-left"><?php echo $product_data1[0]['short_name'].'('.$product_data_data[0]['size'].')'; ?> </div>
                            <div class="pluse-minus">
                                <div class="input-group mb-3 catagre pull-right">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark btn-sm" id="minus-btn" onclick="fn_plus_cart('<?php echo $val['size_id'].'-'.$product_id_main; ?>',1)"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="text" id="qty_input<?php echo $val['size_id'].'-'.$product_id_main; ?>" class="form-control form-control-sm" value="<?php echo $val['quantity']; ?>" min="1" style="text-align:center;" disabled="">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark btn-sm" id="plus-btn" onclick="fn_plus_cart('<?php echo $val['size_id'].'-'.$product_id_main; ?>',2)" ><i class="fa fa-plus"></i></button>
                                    </div>
                                    &nbsp;&nbsp;
                                     <!--<button class="btn btn-dark btn-sm" id="plus-btn" onclick="fn_add_cart_cart('<?php echo $val['size_id'].'-'.$product_id_main; ?>','1','<?php echo $val['size_id']; ?>')" ><i class="fa fa-refresh"></i></button>-->
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php 

            $iii++;
        
        $price = $val['quantity'] * $product_data1[0]['price'];
        //$discount = $val['quantity'] * $product_data1[0]['MRP_price'];
        //$all = $all + $discount;
        //$sub_total = $sub_total + $price;
        
        
          $product_data_data = $this->common_model->getProductData('v_product_color_size', array('product_id' => $val['product_id'],'id' => $val['size_id']), '100');
       
         $price = $val['quantity'] * $product_data_data[0]['price'];
           $sub_total = $sub_total + $price;
        // $all = $val['quantity'] * $product_data_data[0]['MRP_price'];
        //   $Mrp = $Mrp + $all;
          
  
       // $alls = $Mrp-$sub_total;
        } }else{ ?>
        <div class="container cartss">
        <div class="row ">
    <div class="col-md-offset-2 col-md-8 purchase" >
        <img src="<?php echo base_url('public/image/carts.png'); ?>" style="background-color: #FFFFFF;" alt="#">
         <h3 class="purchase-title">Cart is empty!</h3>
      <h3 class="purchase-title">Are you Ready for shopping with us</h3>
     <button onclick="location.href='<?php echo base_url(); ?>'" type="button" class="btn btn-primary" >Buy Now</button>
    </div>
  </div>
  </div>
        <?php 
        } ?>
        </div><style>
            
            .cartss{ margin-bottom: 85px;
                
            }
        </style> </div>
        
        <?php 
        if (!empty($v_product_cart) && is_array($v_product_cart)) {
        // $vat_tax = (($sub_total * 20)/100);
        // $eco_tax= "2";
        // $grand_total = $vat_tax + $sub_total + $eco_tax;
        
      
        
     $cart_view .= '<div id="cart_view_chck"><div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
            <table class="table table-striped custab">
                <tbody>
                    <tr>
                       <td>Sub Total <span><button class="btn toolTip top custome" data-tip="Tooltop Top"><i class="fa fa-info"></i></button></span> </td>
                        <td class="text-center"><span class="label label-success"><i class="fa fa-inr"  aria-hidden="true"></i> '.$sub_total.'</span></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="buttons custome">
        <div class="pull-left"><a class="btn btn-default" href="'.base_url().'">Continue Shopping</a></div>
        <div class="pull-right"><a class="btn btn-primary" href="'.base_url('checkout').'">Checkout</a></div>
    </div>
   <div class="col-xs-12 p-0 fixed bottom-55 left-0">
    <div class="col-xs-12 p-0 bg-blueButton flex align-items-center">
        <div class="col-xs-5 pt-5 pr-15 pb-5 pl-15 br-1 nunito-regular font-13">
            <span class="block text-left whiteColor">₹'.$sub_total.'</span>
        <span class="block text-left greenColor font-weight-bold ng-star-inserted">Saved ₹</span>
        </div>
        <div class="col-xs-7 p-10 pt-5 pr-10 pb-5 pl-10">
    <button  id="myButton" class="mat-button-ripple gradient-green z-depth-1 blackColor width-100-p nunito-bold font-14 text-center p-6 bd-0 p-0 radius-10 line-22 pl-35">Checkout<span class="fa fa-angle-right floatR font-22 line-22"></span>
            </button>
        </div>
        <?php } ?>
    </div>
</div> 
    
    ';
    echo $cart_view;
    ?>

 <?php } ?>
    
</div>

</div>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "<?php echo base_url('checkout'); ?>";
    };
</script>


<?php include("element/footer.php"); ?>