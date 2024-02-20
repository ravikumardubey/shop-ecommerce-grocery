<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajaxcall extends CI_Controller
{
    public function index()
    {
        $data = $this->input->post();
        
         
         if ($data['action'] == 'order_list_history') { 
         
         $data_check = array('user_id' => $data['user_id'], 'order_id' => $data['order_id']);
        $v_order = $this->common_model->getProductData('v_order', $data_check, 100);
        
        $subtotal_t = '';
       if (!empty($v_order) && is_array($v_order)) {
         foreach ($v_order as $val) {
             
  $locccc_data = $this->common_model->getProductData('v_product', array('status' => '0','product_id'=>$val['product_id']), '50');  
  $images_data =  $this->common_model->getImagelist($val['product_id']);
         $product_data_data = $this->common_model->getProductData('v_product_color_size', array('product_id' => $val['product_id'],'id' => $val['size_id']), '100');
         $subtotal = (int)$product_data_data[0]['price'] * (int)$val['quantity'];
         $subtotal_t = (int)$subtotal + (int)$subtotal_t;
        
         ?>
           <div class="popup-panel">
                    <div class="panel panel-success">
                        <div class="plan cf  text-addresh">
                            
                            <?php 
                            
                            ?>
                            <div class="col-md-3 col-xs-5">
                                <img class="img-responsive" title="<?php echo $locccc_data[0]['name']?>"
                                    alt="<?php echo $locccc_data[0]['name']?>"
                                    src="<?php echo $images_data['image1'];?>">
                            </div>
                            <div class="col-md-9 col-xs-12">
                                <div class="price">

                                    <span style="font-weight:400; color:#333; font-size:16px; padding-bottom:5px;">Order
                                        ID : <?php echo $val['order_id']?></span><br>
                                    <span
                                        style="font-weight:700; color:#333; font-size:14px; padding-bottom:5px;"><?php echo $locccc_data[0]['name'].'('.$product_data_data[0]['size'].')'?></span><br>
                                    <span style="font-size:13px;"> <?php echo $locccc_data[0]['short_description'] ?>

                                    </span>
                                    <p><span class="price-text">Price: <i class="fa fa-inr"
                                                aria-hidden="true"></i><?php echo $product_data_data[0]['price']; ?></span></p>
                                                
                                                <p><span class="price-text">Product Quantity: <?php echo $val['quantity']; ?></span></p>
                                                
                                                
                                    </a>
                                </div>
                            </div>
                            <?php  ?>
                            
                        </div>
                    </div>
           </div>
          
             
             
        <?php  } } ?> 
        
         <p><span class="price-text">Total Order Amount: <i class="fa fa-inr"
                                                aria-hidden="true"></i><?php echo $subtotal_t; ?></span></p>
        <?php }
         
         else if ($data['action'] == 'cart_view_model') { 
             
                 

$session_user = $_SESSION['__ci_last_regenerate'];

$session_user_id = isset($_SESSION['session_user_id']) ? $_SESSION['session_user_id'] : '';
$data_check = array('user_id' => $session_user_id, 'session_user_id' => $session_user_id, 'status' => '0');
$v_product_cart = $this->common_model->getProductData('v_product_cart', $data_check, 100);
 $sub_total = 0;


$cart_view = '';
$Mrp = '';

$cart_item = count($v_product_cart);

if (!empty($v_product_cart) && is_array($v_product_cart)) {
    foreach ($v_product_cart as $val) {
        
     $product_data1 = $this->common_model->getProductData('v_product',array('status'=>'0','product_id'=>$val['product_id']),'8');  
     $product_image = $this->common_model->getlist('v_product_image',array('status'=>'0','product_id'=>$val['product_id']));  
       // $price = $val['quantity'] * $product_data1[0]['price'];
        //$sub_total = $sub_total + $price;
        
         $product_data_data = $this->common_model->getProductData('v_product_color_size', array('product_id' => $val['product_id'],'id' => $val['size_id']), '100');
       
         $price = $val['quantity'] * $product_data_data[0]['price'];
           $sub_total = $sub_total + $price;
          
        //$all = $product_data1[0]['quantity']*$product_data_data[0]['MRP_price'];
      //$Mrp = $all + $product_data1[0]['MRP_price'];
        
  
    
   
        } }
        
        // $vat_tax = (($sub_total * 20)/100);
        // $eco_tax= "2";
        // $grand_total = $vat_tax + $sub_total + $eco_tax;
       
        
        
        //  <tr>
        //                 <td>Eco Tax (-2.00) <span><button class="btn toolTip top custome" data-tip="Tooltop Top"><i class="fa fa-info"></i></button></span> </td>
        //                 <td class="text-center"><span class="label label-success"><i class="fa fa-inr"  aria-hidden="true"></i> '.$eco_tax.'</span></td>
        //             </tr>
        //             <tr>
        //                 <td>VAT (20%) <span><button class="btn toolTip top custome" data-tip="Tooltop Top"><i class="fa fa-info"></i></button></span> </td>
        //                 <td class="text-center"><span class="label label-success"><i class="fa fa-inr"  aria-hidden="true"></i> '.$vat_tax.'</span></td>
        //             </tr>
        //             <tr>
        //                 <td>Sub Total</td>
        //                 <td class="text-center"><span class="label label-default"><i class="fa fa-inr" aria-hidden="true"> '.$grand_total.'</span></td>
        //             </tr>
//          <tr>
//                       <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
//                       <td class="text-right">₹ '.$eco_tax.'</td>
//                     </tr>
//                     <tr>
//                       <td class="text-right"><strong>VAT (20%)</strong></td>
//         <td class="text-right">₹ '. $vat_tax .' </td>
//                     </tr>
//                     <tr>
//                       <td class="text-right"><strong>Total</strong></td>
//   <td class="text-right">₹'.$grand_total.'</td>
//                     </tr>
     $cart_view .= '<div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
            <table class="table table-striped custab">
                <tbody>
                    <tr>
                       <td>Sub-Total</td>
                        <td class="text-center"><span class="label label-success"><i class="fa fa-inr" aria-hidden="true"></i>'.$sub_total.'</span></td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
    <div class="buttons custome">
        <div class="pull-left"><a class="btn btn-default" href="'.base_url().' ?>">Continue Shopping</a></div>
        <div class="pull-right"><a class="btn btn-primary" href="'.base_url('checkout').'">Checkout</a></div>
    </div>
    <div class="col-xs-12 p-0 fixed bottom-55 left-0">
    <div class="col-xs-12 p-0 bg-blueButton flex align-items-center">
        <div class="col-xs-5 pt-5 pr-15 pb-5 pl-15 br-1 nunito-regular font-13">
            <span class="block text-left whiteColor">₹'.$sub_total.'</span>
            <span class="block text-left greenColor font-weight-bold ng-star-inserted">Saved ₹</span>
        </div>
        <div class="col-xs-7 p-10 pt-5 pr-10 pb-5 pl-10">
            <button onclick="location.href='.base_url('checkout').';"
                class="mat-button-ripple gradient-green z-depth-1 blackColor width-100-p nunito-bold font-14 text-center p-6 bd-0 p-0 radius-10 line-22 pl-35">Checkout
                <span class="fa fa-angle-right floatR font-22 line-22"></span>
            </button>
        </div>
        <?php } ?>
    </div>
</div>
    
    ';
    echo $cart_view;
         }
          else if ($data['action'] == 'auto_cart_view') {
            $session_user = $_SESSION['__ci_last_regenerate'];
            $session_user_id = isset($_SESSION['session_user_id']) ? $_SESSION['session_user_id'] : '';
            $data_check = array('user_id' => $session_user_id, 'session_user_id' => $session_user_id, 'status' => '0');
            $v_product_cart = $this->common_model->getProductData('v_product_cart', $data_check, 100);
             $sub_total = 0;
          
          
             $cart_view = '';
          
          
          $cart_item = count($v_product_cart);
          
          if (!empty($v_product_cart) && is_array($v_product_cart)) {
                foreach ($v_product_cart as $val) {
                    
                 $product_data1 = $this->common_model->getProductData('v_product',array('status'=>'0','product_id'=>$val['product_id']),'8');  
                 $product_image = $this->common_model->getlist('v_product_image',array('status'=>'0','product_id'=>$val['product_id']));  
                 $images_data =  $this->common_model->getImagelist($val['product_id']);  
                 
                 $product_data_data = $this->common_model->getProductData('v_product_color_size', array('product_id' => $val['product_id'],'id' => $val['size_id']), '100');
       
           $cart_view .= '<li><table class="table table-striped">
                <tbody>
                  <tr>
                    <td class="text-center"><a href="#"> <img src='.$images_data['image1'].' height="60" width="60" alt="iPod Classic" title="iPod Classic" class="img-responsive" />
                                         </a></td>
                    <td class="text-left"><a href="#">'.$product_data1[0]['short_name'].'('.$product_data_data[0]['size'].')</a></td>
                <td class="text-right"> '.$product_data_data[0]['price'].' x '.$val['quantity'].'</td>
                    <td class="text-right">₹'.$val['quantity'] * $product_data_data[0]['price'].'</td>
                    <td class="text-center"><button class="btn btn-danger btn-xs" title="Remove" type="button" data-toggle="tooltip" onclick="fn_remove_cart('.$val['id'].')" data-original-title="Remove"><i class="fa fa-times"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </li>'; 
            $price = $val['quantity'] * $product_data_data[0]['price'];
           $sub_total = $sub_total + $price;
        
        
        } } 
        
        $vat_tax = (($sub_total * 20)/100);
        $eco_tax= "2";
        $grand_total = $vat_tax + $sub_total + $eco_tax;
           
           $cart_view  .= '<li>
              <div>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="text-right"><strong>Sub-Total</strong></td>
                      <td class="text-right">₹ '.$sub_total.'</td>
                    </tr>
                   
                  </tbody>
                </table>
                <p class="text-right"> <span class="btn-viewcart"><a href='. base_url('cart').'><strong><i class="fa fa-shopping-cart"></i> View Cart</strong></a></span> <span class="btn-checkout"><a href='. base_url('checkout').'><strong><i class="fa fa-share"></i> Checkout</strong></a></span> </p>
              </div>
            </li>'; 
            
              
            
$cart_return  = array('cart_view' =>$cart_view,'cart_item_no' =>$cart_item.' Item(s)');
             
             echo json_encode($cart_return);

        } elseif ($data['action'] == 'loc_model') {

            if (!empty($data['loc_state'])) {
                $stateId = $data['loc_state'];
                
                $city_val = $data['city_val'];
                
                
                $loc_city = $this->common_model->getCityByStateId('v_master_city', $stateId);

            }?>
<option value="">Select City</option>
<?php
foreach ($loc_city as $city => $val) {
    
    $checked = '';
    if($city_val == $val->id) { 
    
        $checked = 'selected';
    }

                ?>

<option <?php echo $checked; ?> value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>


<?php
}

        }elseif ($data['action'] == 'product_data') {

if (!empty($data['product_idd'])) {
                $productId = $data['product_idd'];
                
                $singleProduct = $this->common_model->getProductdatasss('v_product', $productId);

            }?>

            <div class="col-sm-2"> 
            <label>MRP</label>
           <input type="text" class="form-control required" id="mrp_priceee" value="<?php echo $singleProduct[0]->MRP_price; ?>" disabled >
           </div>
           <div class="col-sm-2"> 
           <label>Sale Price</label>
           <input type="text" class="form-control required" id="sale_price" value="<?php echo $singleProduct[0]->price; ?>" disabled >
           </div>
           <div class="col-sm-2"> 
           <label>GST</label>
           <input type="text" class="form-control required" id="gst" value="<?php echo $singleProduct[0]->MRP_price; ?>" disabled >
           </div>
           <div class="col-sm-2">          
                               <label>Quantity</label>
                                        <input type="text" placeholder="Enter Quantity"
                                               class="form-control required" id="quantity" name="quantity" onkeyup="grand_total(this.value)">
        </div>
        <div class="col-sm-2"> 
           <label>Total Sum</label>
           <input type="text" class="form-control required" id="total"  disabled >
           </div>
        
        
           
     <?php   } else if ($data['action'] == 'quantity_data'){
         
         print_r($data);
         
     }else if($_REQUEST['action'] == 'change_price_weight_wise') { 
            
             //print_r($data);
            
              $color_size = $this->common_model->getList('v_product_color_size', array('id' => $data['weight_id'],'product_id' => $data['pro_id'],'status' =>'0'));
            
           // print_r($color_size);
            
            
            $price =  '₹'.$color_size[0]['price'].'<span class="less"> ₹'.$color_size[0]['MRP_price'].'</span>';
             $weight =  '('.$color_size[0]['size'].')';
             
              $array = array('weight' => $weight, 'price' => $price);
               echo json_encode($array);
          
        }else if ($_REQUEST['action'] == 'change_password_vendor') {
            $old_password = $_REQUEST['old_password'];
            $user_id = $_REQUEST['hidden_id'];
            $con_new_password = $_REQUEST['con_new_password'];
            $new_password = $_REQUEST['new_password'];
            $user_verify = $this->common_model->getList('v_vendor', array('id' => $user_id, 'password' => $old_password));
            if (empty($user_verify) && is_array($user_verify)) {
                $array = array('status' => false, 'message' => 'Old Password Is not match. Please try again.');
            } else if ($con_new_password != $new_password) {
                $array = array('status' => false, 'message' => 'Please match new password and confirm new password.');
            } else {
                try {
                    $return_res = $this->common_model->updateData('v_vendor', array('password' => $new_password), array('id' => $user_id));
                    if ($return_res) {
                        $array = array('status' => true, 'message' => 'Password Change Successfully.');
                    } else {
                        $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
                    }
                } catch (Exception $ex) {
                    echo $ex;
                }
            }
            echo json_encode($array);
        }else if ($_REQUEST['action'] == 'change_password') {
            $old_password = $_REQUEST['old_password'];
            $user_id = $_REQUEST['hidden_id'];
            $con_new_password = $_REQUEST['con_new_password'];
            $new_password = $_REQUEST['new_password'];
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $user_verify = $this->common_model->getList('v_users', array('id' => $user_id));
            if(password_verify($old_password,$user_verify[0]['password']) === TRUE){
               if ($con_new_password != $new_password) {
                $array = array('status' => false, 'message' => 'Please match new password and confirm new password.');
                } else {
                try {
                    $return_res = $this->common_model->updateData('v_users', array('password' => $hashed_password), array('id' => $user_id));
                    if ($return_res) {
                        $array = array('status' => true, 'message' => 'Password Change sucessfully.');
                    } else {
                        $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
                    }
                } catch (Exception $ex) {
                    echo $ex;
                }
            }
               
            } else { 
                $array = array('status' => false, 'message' => 'Old Password Is not match. Please try again.');
            }
            echo json_encode($array);
        } elseif ($data['action'] == 'reset_password') {
            $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
            if (!empty($data['registered_mobile'])) {
                $registered_mobile = $data['registered_mobile'];
                    $check_user = $this->common_model->getProductData('v_users', array('primary_mobile' => $registered_mobile), '1');
                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                    $password = substr(str_shuffle($permitted_chars), 0, 10);
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    if(!empty($check_user) && is_array($check_user)) { 
                        $v_shop_vendossr = $this->common_model->updateData('v_users', array('password' => $hashed_password), array('primary_mobile' => $registered_mobile));
                    if ($v_shop_vendossr) {
                        $mobile_no =  $registered_mobile;
                    $apiKey = 'bqfBa8tTgHI-kTIJjjlgDBeTqsLXDQdjioDxKHM9Jx';
                   $opt_msg = "Hi User, Your current password is $password. Team Gomores.com";
                    //$opt_msg = "Dear User, Your order id $password has been cancelled. Team Gomores.com.";
                    $send_otp_res = $this->common_model->send_otp($opt_msg, $mobile_no, $apiKey);
                        $array = array('status' => true, 'message' => 'Your password successfully reset. Temporary password has been sent to your registered mobile number.');
                    } else {
                        $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');

                    }
                    } else { 
                    
                           $array = array('status' => false, 'message' => 'Invalid Registered Mobile No.'); 
                    }
            }
             echo json_encode($array);
        }
            elseif ($data['action'] == 'order_cancelled') {
            if (!empty($data['order_id'])) {
                $order_id = $data['order_id'];
                $v_otp_user = $this->common_model->getProductData('v_product_order', array('order_id' => $order_id), '50');
                foreach ($v_otp_user as $sub => $val) {
                    $v_otp_userrrrrr = $this->common_model->getProductData('v_users', array('mobile_status' => '0', 'status' => '0', 'user_id' => $val['user_id']), '50');

                    $v_shop_vendossr = $this->common_model->updateData('v_product_order', array('status' => 'Cancel'), array('order_id' => $order_id));
//  $mobile_no = $_SESSION['primary_mobile'];
                    $mobile_no = $v_otp_userrrrrr[0]['primary_mobile'];
                    $apiKey = 'bqfBa8tTgHI-kTIJjjlgDBeTqsLXDQdjioDxKHM9Jx';
                    //$opt_msg = "Dear Partner, Your order id $order_id has been cancelled. Team Gomores.com";
                //   $opt_msg = "Dear Partner, Your Order id $order_id . Please prepared product in 30 min. Team Gomores.com";
                   //$opt_msg = "Dear User, Your order id $order_id has been cancelled. Team Gomores.com.";
                   // $opt_msg = "Dear User, Your order id $order_id has been cancelled. Team Gomores.com";
                    // $send_otp_res = $this->common_model->send_otp($opt_msg, $mobile_no, $apiKey);

                }

            }

        }elseif ($data['action'] == 'order') {
            $var = $data['order_id'];
         $prod_idss = $data['product_id'];
         
            $v_shop_vendossr = $this->common_model->getProductData('v_order', array('order_id' => $var,'product_id' => $prod_idss, 'user_id'=>$_SESSION['user_id']), '50');
             if (!empty($v_shop_vendossr) && is_array($v_shop_vendossr)){
            foreach ($v_shop_vendossr as $val) {
                $timestamp = strtotime($val['created_on']);
                 $new_dateee = date("d-m-Y", $timestamp);
                   $locccc_data = $this->common_model->getProductData('v_product', array('status' => '0','product_id'=>$v_shop_vendossr[0]['product_id']), '50');
                   $v_pay = $this->common_model->getProductData('v_product_order', array('order_id' => $var, 'user_id'=>$_SESSION['user_id']), '50');
         
            $images_data =  $this->common_model->getImagelist($v_shop_vendossr[0]['product_id']);
            
            ?>
            
            

<!--------------- new update verion --------->

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View Order Details</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="details-order">
                                <p id="order_date"><a class="" href="javascript:void(0)" style="text-decoration:none;">Order Date</a>
                                    <span class="price"><?php echo $new_dateee; ?></span>
                                </p>
                                <p id="order"><a class="" href="javascript:void(0)" style="text-decoration:none">Order #</a> <span
                                        class="price"><?php echo $var ?></span></p>
                                <p id="order_total"><a class="" href="javascript:void(0)" style="text-decoration:none">Order Total</a>
                                    <span class="price"><?php echo '₹' . $locccc_data[0]['price']; ?></span>
                                </p>

                            </div>
                            <div class="" style="margin-top:10px;">
                                <button type="button" class="btn btn-success">Downloade Invoice</button>
                                <?php if ($val['status'] == 'Pending' || $val['status'] == 'In-Process') {?>
<a href="javascript:void(0);" onclick="fn_order_cancelled('<?php echo $val['order_id']; ?>')">
     <button type="button" class="btn btn-danger pull-right">Cancel</button>
</a>
<?php }?>
                               
                            </div>
                            <div class="popup-panel">
                                <h4>Shipment details</h4>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Standard delivery</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p style="font-weight:700;">Delivered</p>
                                        <p>Delivery Estetment:</p>
                                        <span Style="color:#23a944;"> Monday 2 April 2021</span>
                                        <div class="form cf">
                                            <div class="plan cf  text-addresh">
                                                <div class="col-md-3 col-xs-5">
                                                    
     <img class="img-responsive" title="<?php echo $locccc_data[0]['short_name']; ?>" alt="<?php echo $locccc_data[0]['short_name']; ?>" src="<?php echo $images_data['image1']; ?>">
                                                </div>
                                                <div class="col-md-9 col-xs-12">
                                                    <div class="price">
                                                        <span
                                                            style="font-weight:700; color:#333; font-size:14px; padding-bottom:5px;"><?php echo $locccc_data[0]['short_name'] ?></span><br>
                                                        <span style="font-size:13px;"> <?php echo $locccc_data[0]['short_description'] ?>                                                        </span>
                                                        <p><span class="price-text">Price: <i class="fa fa-inr"
                                                                    aria-hidden="true"></i><?php echo $locccc_data[0]['price'] ?></span></p>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <h4 style="color:#333; font-weight:700; ">Payment Information</h4>
                                    <div class="details-order">
                                        <p style="font-size:13px; font-weight:700; color:#333;">Payment Method</p>
                                        <span><?php echo $v_pay[0]['payment_method']; ?></span>
                                        
                                    </div>
                                </div>
                                <?php if ($val['biling_type'] = 'existing') {
                    $billing_adderss = $this->common_model->getProductData('v_users_address', array('status' => '0', 'address_type' => '1', 'user_id' => $_SESSION['user_id']), '50');?>

<?php } elseif ($val['biling_type'] = 'new') {
                    $billing_adderss = $this->common_model->getProductData('v_users_address', array('status' => '0', 'address_type' => '1', 'user_id' => $_SESSION['user_id'], 'product_id' => $v_shop_vendossr[0]['product_id']), '50');?>

<?php }?>
                                  <div class="col-md-9 col-xs-12">
                                    <h4 style="color:#333; font-weight:700; ">Billing Information</h4>
                                    <div class="details-order">
                                        <p style="font-size:13px; font-weight:700; color:#333;">Billing Address</p>
                                        <span><?php echo $billing_adderss[0]['address1'] . "\n" . $billing_adderss[0]['address2']; ?></span>
                                        
                                    </div>
                                    <?php if ($val['biling_type'] = 'existing') {
                    $shipping_address = $this->common_model->getProductData('v_users_address', array('status' => '0', 'address_type' => '2', 'user_id' => $_SESSION['user_id']), '50');?>

<?php } elseif ($val['biling_type'] = 'new') {
                    $shipping_address = $this->common_model->getProductData('v_users_address', array('status' => '0', 'address_type' => '2', 'user_id' => $_SESSION['user_id'], 'product_id' => $v_shop_vendossr[0]['product_id']), '50');?>

<?php }?>
                                     <div class="details-order">
                                        <p style="font-size:13px; font-weight:700; color:#333;">Shipping Address</p>
                                         <span><?php echo $shipping_address[0]['address1'] . "\n" . $shipping_address[0]['address2']; ?></span>
                                        
                                    </div>
                                </div>
                                
                                
                                 <div class="col-md-9 col-xs-12">
                                   <div class="details-order">
                                       <p style="font-size:13px; font-weight:700; color:#333;">Order Details</p>
                                        <span>
                                <p id="order_date"><a class="" href="javascript:void(0)" style="text-decoration:none;">Items Price</a>
                                    <span class="price"><?php echo '₹' . $locccc_data[0]['price']; ?></span>
                                </p>
                                <p id="order"><a class="" href="javascript:void(0)" style="text-decoration:none">Postage & Packing</a> <span
                                        class="price"><?php echo '₹' . "&nbsp;" . '0.00'; ?></span></p>
                                <p id="order_total"><a class="" href="javascript:void(0)" style="text-decoration:none">Total Before Tax</a>
                                    <span class="price"><?php '₹' . "&nbsp;" . '0.00';?></span>
                                </p>
                                <p id="order_total"><a class="" href="javascript:void(0)" style="text-decoration:none">Total</a>
                                    <span class="price"><?php echo '₹' . "&nbsp;" . '0.00' ?></span>
                                </p>
                                <p id="order_total"><a class="" href="javascript:void(0)" style="text-decoration:none">Order Total</a>
                                    <span class="price"><?php echo '₹' . $locccc_data[0]['price']; ?></span>
                                </p>

                            </div>
                           </div>
                                
                                
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>
    </div>
    </div>


<?php
}}?>
<!----------------->
<?php } elseif ($data['action'] == 'loc_category') {
            if (!empty($data['category_id'])) {
                $categoryId = $data['category_id'];

                $sub_cate = $data['sub_cate'];

                $sub_category = $this->common_model->getCategoryBySub('v_master_sub_category', $categoryId);

            }?>
<option value="">Select Sub Category</option>
<?php
foreach ($sub_category as $sub => $val) {
                $selected = '';
                if ($sub_cate == $val->id) {
                    $selected = 'selected';

                }

                ?>

<option <?php echo $selected; ?> value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>


<?php
}

        } elseif ($data['action'] == 'vendor_list') {
            $v_vendor = $this->common_model->getData('v_vendor');
            if (!empty($v_vendor) && is_array($v_vendor)) {
                $i = 1;
                foreach ($v_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }
                    $shop_status = 'In-active';
                    if ($val->shop_status == '1') {
                        $class = 'badge-success';
                        $shop_status = 'Active';
                    }
                    $kyc_status = 'In-active';
                    if ($val->kyc_status == '1') {
                        $class = 'badge-success';
                        $kyc_status = 'Active';
                    }
                    $acc_status = 'In-active';
                    if ($val->acc_status == '1') {
                        $class = 'badge-success';
                        $acc_status = 'Active';
                    }
                   

                    echo '<tr>
                    <td>' . $i . '</td>
                      
                    <td>' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '</td>
                    <td>' . $val->email_id . '</td>
                    <td>' . $val->primary_mobile . '</td>
                    <td>' . $val->v_address . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',1)" title="' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td> <a href="javascript:void(0);" onclick="fn_shop_status(' . $val->id . ',' . $val->shop_status . ',1)" > <span class="badge ' . $class . '">' . $shop_status . '</span> </a></td>
                    <td> <a href="javascript:void(0);" onclick="fn_kyc_status(' . $val->id . ',' . $val->kyc_status . ',1)" > <span class="badge ' . $class . '">' . $kyc_status . '</span> </a></td>
                    <td> <a href="javascript:void(0);" onclick="fn_acc_status(' . $val->id . ',' . $val->acc_status . ',1)" > <span class="badge ' . $class . '">' . $acc_status . '</span> </a></td>

                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',1)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;}}

        } elseif ($data['action'] == 'v_users') {
            $v_shop_vendor = $this->common_model->getData('v_users');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '</td>
                    <td>' . $val->primary_mobile . '</td>
                    <td>' . $val->email_id . '</td>
                    <td>' . $val->dob . '</td>
                    <td>' . $val->r_address . '</td>
                    <td>' . $val->s_address . '</td>
                    <td>' . $val->created_on . '</td>

                    <td>' . $val->modified_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',3)" title="' . $val->v_shop_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                </tr>';

                    $i++;
                }
            }

        }elseif ($data['action'] == 'v_sale_report') {
            $v_shop_vendor = $this->common_model->getData('v_sale_report');
           // $v_products = $this->common_model->getData('v_product');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->order_id . '</td>
                    
                    <td>' . $val->cust_name . '</td>
                    <td>' . $val->cust_mob . '</td>
                    <td>' . $val->email . '</td>
                    <td>' . $val->address . '</td>
                    <td>' . $val->state . '</td>
                    <td>' . $val->city . '</td>
                    <td>' . $val->pincode . '</td>
                    <td><button class="btn btn-primary" onclick="fn_get_product()" data-toggle="modal" data-target="#myModal" > Product</button></td>
                </tr>';

                    $i++;
                }
            }

        }elseif ($data['action'] == 'v_shop_vendor') {
            $v_shop_vendor = $this->common_model->getData('v_shop_vendor');

            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;

                foreach ($v_shop_vendor as $val) {

                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }
                    if (isset($val->v_shop_state)) {
                        $var = $val->v_shop_state;
                        $v_shop_vendossr = $this->common_model->getProductData('v_master_state', array('status' => '0', 'id' => $var), '50');
                    }
                    if (isset($val->v_shop_city)) {
                        $var = $val->v_shop_city;
                        $v_shop_vendossrsss = $this->common_model->getProductData('v_master_city', array('status' => '0', 'id' => $var), '50');
                    }
                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->v_shop_name . '</td>
                    <td>' . $val->v_shop_address . '</td>
                    <td>' . $v_shop_vendossr[0]['name'] . '</td>
                    <td>' . $v_shop_vendossrsss[0]['name'] . '</td>
                    <td>' . $val->v_shop_pincode . '</td>
                    <td>' . $val->v_shop_area . '</td>
                    <td>' . $val->shop_id . '</td>
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>


                   <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',16)" title="' . $val->v_shop_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',16)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_master_category') {
            $v_shop_vendor = $this->common_model->getData('v_master_category');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->name . '</td>
                    <td>' . $val->url . '</td>
                     <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>


                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',10)" title="' . $val->name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',10)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_product_review') {
            $v_shop_vendor = $this->common_model->getData('v_product_review');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    if (isset($val->product_id)) {
                        $var = $val->product_id;
                        $v_shop_vendossr = $this->common_model->getProductData('v_product', array('status' => '0', 'product_id' => $var), '50');

                    }
                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $v_shop_vendossr[0]['short_name'] . '</td>
                    <td>' . $val->full_name . '</td>
                      <td>' . $val->comment . '</td>
                        <td>' . $val->rating . '</td>
                          <td>' . $val->created_ip . '</td>
                     <td>' . $val->created_on . '</td>



                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',7)" title="' . $val->name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',7)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'vendor_image') {
            $v_shop_vendor = $this->common_model->getData('vendor_image');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->image . '</td>
                    <td>' . $val->img_name . '</td>
                    <td>' . $val->IP . '</td>
                    <td>' . $val->created_by . '</td>
                    <td>' . $val->created_on . '</td>
                     <td>' . $val->modified_by . '</td>
                    <td>' . $val->modified_on . '</td>


                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',21)" title="' . $val->img_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',21)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_master_sub_category') {
            $v_shop_vendor = $this->common_model->getData('v_master_sub_category');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    //  $locccc_data = $this->common_model->getProductData('v_master_category', array('status' => '0','id'=>$val['category_id']), '50');
                    //  print_r($locccc_data);
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }
                    if (isset($val->category_id)) {
                        $var = $val->category_id;
                        $v_shop_vendossr = $this->common_model->getProductData('v_master_category', array('status' => '0', 'id' => $var), '50');

                    }
                    echo '<tr>
                    <td>' . $i . '</td>

                    <td>' . $v_shop_vendossr[0]['name'] . '</td>
                    <td>' . $val->name . '</td>
                    <td>' . $val->url . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',11)" title="' . $val->name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',11)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_contact') {
            $v_shop_vendor = $this->common_model->getData('v_contact');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->name . '</td>
                    <td>' . $val->email . '</td>
                    <td>' . $val->phone_no . '</td>
                    <td>' . $val->subject . '</td>
                    <td>' . $val->message . '</td>
                    <td>' . $val->ip . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',20)" title="' . $val->name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',20)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_product') {
            $user_id = $_SESSION['vendor_id'];
            if ($user_id == 'GHRFBD1001') {
                $v_shop_vendor = $this->common_model->getData('v_product');
                if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                    $i = 1;
                    foreach ($v_shop_vendor as $val) {

                        $class = 'badge-danger';
                        $status_name = 'In-active';
                        if ($val->status == '0') {
                            $class = 'badge-success';
                            $status_name = 'Active';
                        }

                        echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->short_name . '</td>
                    <td>' . $val->MRP_price . '</td>
                    <td>' . $val->price . '</td>
                    <td>' . $val->total_quantity . '</td>
                    <td>' . $val->brand_name . '</td>

                    <td> <button class="btn btn-primary"  onclick="fn_upload_image(' . "'$val->product_id'" . ')" title="' . $val->short_name . '"> Upload Image</button></td>
                    <td> <button  class="btn btn-primary" onclick="fn_update_size(' . "'$val->product_id'" . ')" title="' . $val->short_name . '">Update SIze & Color</button></td>

                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',4)" title="' . $val->short_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',4)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                        $i++;
                    }
                }
            } else {
                $v_shop_vendor = $this->common_model->getProductData('v_product', array('status' => '0', 'vendor_id' => $user_id), '50');
                if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                    $i = 1;
                    foreach ($v_shop_vendor as $val) {

                        $class = 'badge-danger';
                        $status_name = 'In-active';
                        if ($val['status'] == '0') {
                            $class = 'badge-success';
                            $status_name = 'Active';
                        }
                        
                        $proo_id = $val['product_id'];

                        echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val['short_name'] . '</td>
                    <td>' . $val['MRP_price'] . '</td>
                    <td>' . $val['price'] . '</td>
                    <td>' . $val['total_quantity'] . '</td>
                    <td>' . $val['brand_name'] . '</td>

                    <td> <button class="btn btn-primary"  onclick="fn_upload_image(' . "'$proo_id'" . ')" title="' . $val['short_name'] . '"> Upload Image</button></td>
                    <td> <button  class="btn btn-primary" onclick="fn_update_size(' . "'$proo_id'". ')" title="' . $val['short_name'] . '">Update SIze & Color</button></td>

                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val['id'] . ',' . $val['status'] . ',4)" title="' . $val['short_name'] . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val['id'] . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val['id'] . ',4)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                        $i++;
                    }
                }
                // print_r($v_shop_vendor);
            }
            // $v_shop_vendor = $this->common_model->getData('v_product');

        } elseif ($data['action'] == 'v_product_order') {
            $v_shop_vendor = $this->common_model->getData('v_product_order');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    if (isset($val->user_id)) {
                        $var = $val->user_id;
                        $v_shop_vendossr = $this->common_model->getProductData('v_users', array('status' => '0', 'user_id' => $var), '50');

                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->order_id . '</td>
                    <td>' . $val->invoice_id . '</td>
                    <td>' . $val->total_price . '</td>
                    <td>' . $v_shop_vendossr[0]['f_name'] . "&nbsp;" . $v_shop_vendossr[0]['l_name'] . '</td>
                    <td>' . $val->status . '</td>
                    <td>' . $val->comment . '</td>
                    <td>' . $val->order_date . '</td>

                    <td>' . $val->delivery_id . '</td>
                    <td>' . $val->shipping_method_comment . '</td>
                    <td>' . $val->payment_method . '</td>
                     <td>' . $val->payment_method_agree . '</td>
                                       <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',6)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_product_image') {
            $user_id = $_SESSION['vendor_id'];
            if ($user_id == 'GHRFBD1001') {
                $v_shop_vendor = $this->common_model->getData('v_product_image');
                if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                    $i = 1;
                    foreach ($v_shop_vendor as $val) {
                        $class = 'badge-danger';
                        $status_name = 'In-active';
                        if ($val->status == '0') {
                            $class = 'badge-success';
                            $status_name = 'Active';
                        }
                        if (isset($val->product_id)) {
                            $var = $val->product_id;
                            $v_shop_vendossr = $this->common_model->getProductData('v_product', array('status' => '0', 'product_id' => $var), '50');

                        }

                        echo '<tr>
                    <td>' . $i . '</td>
                      <td>' . $v_shop_vendossr[0]['short_name'] . '</td>
                    <td>' . $val->image . '</td>


                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_ip . '</td>
                     <td>' . $val->created_by . '</td>
                      <td>' . $val->modified_by . '</td>
                       <td>' . $val->modified_on . '</td>
                        <td>' . $val->modified_ip . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',5)" title="' . $val->image . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',5)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                        $i++;
                    }
                }
            } else {
                $v_shop_vendorsss = $this->common_model->getProductData('v_product', array('status' => '0', 'vendor_id' => $user_id), '50');
                $var = $v_shop_vendorsss[0]['product_id'];

                $v_shop_vendor = $this->common_model->getProductData('v_product_image', array('status' => '0', 'product_id' => $var), '50');
                if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                    $i = 1;
                    foreach ($v_shop_vendor as $val) {
                        $class = 'badge-danger';
                        $status_name = 'In-active';
                        if ($val['status'] == '0') {
                            $class = 'badge-success';
                            $status_name = 'Active';
                        }

                        echo '<tr>
                    <td>' . $i . '</td>
                      <td>' . $val['product_id'] . '</td>
                    <td>' . $val['image'] . '</td>


                    <td>' . $val['created_on'] . '</td>
                    <td>' . $val['created_ip'] . '</td>
                     <td>' . $val['created_by'] . '</td>
                      <td>' . $val['modified_by'] . '</td>
                      <td>' . $val['modified_on'] . '</td>
                        <td>' . $val['modified_ip'] . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val['id'] . ',' . $val['status'] . ',5)" title="' . $val['image'] . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val['id'] . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val['id'] . ',5)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                        $i++;
                    }
                }
            }

        }elseif($data['action'] == 'product_order'){
            
            if(isset($data['order_id'])){
                 $order_products = $this->common_model->getProductData('v_order', array('status' => '0', 'order_id' => $data['order_id']), '50');
     

                 if (!empty($order_products) && is_array($order_products)) {
                    $counter = 0;
                    ?>
                    
                     <?php foreach ($order_products as $val) {
                          if (isset($val['product_id'])) {
                        $var = $val['product_id'];
                         $product_name = $this->common_model->getProductData('v_product', array('status' => '0','product_id' => $var), '50');
                       
                    }
                       if (isset($val['size_id'])) {
                        $vareer = $val['size_id'];
                           $sizes = $this->common_model->getProductData('v_product_color_size', array('status' => '0', 'id' => $vareer), '50');
                     
                    }
                      if (isset($val['product_id'])) {
                        $image = $val['product_id'];
                           $images_data =  $this->common_model->getImagelist($image);
                     
                    }
                      $total = $sizes[0]['price']*$val['quantity'];
                      
                        echo '<tr>
                        
                        <td>'.++$counter.'</td>
                         <td><img width="50" height="50"
                                            src="'.$images_data['image1'].'"
                                            alt="'.$product_name[0]['short_name'].'" title="'.$product_name[0]['short_name'].'" class="img-responsive" />' .'</td>
                        <td>'.$product_name[0]['brand_name']."&nbsp;".$product_name[0]['short_name']."&nbsp;".$sizes[0]['size'].'</td>
                        <td>'.$val['quantity'].'</td>
                        <td>'. '&#8377;' .$sizes[0]['MRP_price'].'</td>
                        <td>'. '&#8377;' .$sizes[0]['price'].'</td>
                        
                        <td>'. '&#8377;' .$total.'</td>
                      </tr>
                        
                      ';
                   
                     
                     }
                 }
               
            } 
        } elseif ($data['action'] == 'v_order') { 
            $which ='payment_method';
            $where = array( 'Online', 'COD');
            
            $v_shop_vendor = $this->common_model->getProductDataWhere_In('v_product_order', $which, $where, '50');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    
                    
                    $order_status = $val['order_status'];
                    
                    $order_status11 = "'".$val['order_status']."'";
                   
                    $status_name = 'In-active';
                    if ($val['status'] == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }
                    if (isset($val['user_id'])) {
                        $var = $val['user_id'];
                        $v_shop_vendossr = $this->common_model->getProductData('v_users', array('status' => '0', 'user_id' => $var), '50');

                    }
                     if (isset($val['user_id'])) {
                        $var = $val['user_id'];
                        $v_shop_vendossrqqq = $this->common_model->getProductData('v_users_address', array('address_type' => '2', 'user_id' => $var), '50');

                    }

                    if (isset($val->product_id)) {
                        $var = $val->product_id;
                        $dddddd = $this->common_model->getProductData('v_product', array('status' => '0', 'product_id' => $var), '50');

                    }
                
                    $order_id = "'".$val['order_id']."'";
                    $users_id = "'".$val['user_id']."'";
                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val['order_id']. '</td>
                    <td>' . $v_shop_vendossr[0]['f_name'] . "&nbsp;" . $v_shop_vendossr[0]['l_name'] . '</td>
                    <td>' . $v_shop_vendossr[0]['primary_mobile'] .'</td>
                    <td>' . $v_shop_vendossr[0]['email_id'] .'</td>
                    <td>' . $v_shop_vendossrqqq[0]['address1'] . "&nbsp;" . $v_shop_vendossr[0]['address2']. "&nbsp;" . $v_shop_vendossr[0]['pincode']  .'</td>
                    <td> <button class="btn btn-primary" onclick="fn_product_status('.$order_id.','.$users_id.')" data-toggle="modal" data-target="#myModal"> Products </button></td>
 
                     <td>' . '&#8377;' .$val['total_price'] . '</td>
                     <td>' . $val['pay_status'] . '</td>
         <td> <button class="btn btn-primary"   data-toggle="modal" data-target="#order_status" onclick="fn_update_order_status('.$val['id'].','.$order_status11.')" > '.$order_status.' </button></td>

                   <td>' . $val['payment_method'] . '</td>
                    <td>' . $val['created_on'] . '</td>
                  
                 </tr>';

                    $i++;
                }
            }
          
        } elseif ($data['action'] == 'v_account_detail') {
            $v_shop_vendor = $this->common_model->getData('v_account_detail');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                      <td>' . $val->vendor_unique_id . '</td>
                    <td>' . $val->bank_name . '</td>
                    <td>' . $val->account_no . '</td>
                    <td>' . $val->ifsc . '</td>
                    <td>' . $val->account_holder_name . '</td>
                    <td>' . $val->account_type . '</td>
                    <td>' . $val->branch_address . '</td>
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',9)" title="' . $val->bank_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',9)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_menu') {
            $v_shop_vendor = $this->common_model->getData('v_menu');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }
                    if (isset($val->parent_id)) {
                        $var = $val->parent_id;
                        $v_shop_vendossr = $this->common_model->getProductData('v_menu', array('parent' => '0', 'id' => $var), '50');

                    }

                    if ($val->parent == '0') {
                        $var = "Parent";
                    } else {
                        $var = "Child";
                    }
                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->menu_name . '</td>
                    <td>' . $val->url . '</td>
                    <td>' . $val->parent_url . '</td>

                    <td>' . $v_shop_vendossr[0]['menu_name'] . '</td>
                    <td>' . $var . '</td>
                    <td>' . $val->icon . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',12)" title="' . $val->menu_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',12)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_banner') {
            $v_shop_vendor = $this->common_model->getData('v_banner');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->name . '</td>
                    <td>' . $val->image . '</td>
                    <td>' . $val->template . '</td>

                    <td>' . $val->sub_temp . '</td>
                    <td>' . $val->ip . '</td>

                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',22)" title="' . $val->name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',22)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_otp') {
            $v_shop_vendor = $this->common_model->getData('v_otp');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    // $class = 'badge-danger';
                    // $status_name = 'In-active';
                    // if ($val->status == '0') {
                    //     $class = 'badge-success';
                    //     $status_name = 'Active';
                    // }

                    echo '<tr>
                    <td>' . $i . '</td>

                    <td>' . $val->user_type . '</td>
                    <td>' . $val->otp_no . '</td>

                    <td>' . $val->mobile_email_no . '</td>
                    <td>' . $val->email_mobile_type . '</td>
                    <td>' . $val->status . '</td>

                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>

                    <td>

                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',13)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_product_cart') {
            $v_shop_vendor = $this->common_model->getData('v_product_cart');
            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }
                    if (isset($val->product_id)) {
                        $var = $val->product_id;
                        $v_shop_vendossr = $this->common_model->getProductData('v_product', array('status' => '0', 'product_id' => $var), '50');

                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $v_shop_vendossr[0]['short_name'] . '</td>
                    <td>' . $val->user_id . '</td>
                    <td>' . $val->session_user_id . '</td>
                    <td>' . $val->quantity . '</td>
                    <td>' . $val->created_on . '</td>

                     <td>' . $val->modified_ip . '</td>
                    <td>' . $val->created_by . '</td>




                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',2)" title="' . $val->product_id . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',2)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'vendor_review') {
            $v_shop_vendor = $this->common_model->getData('vendor_review');

            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->product_id . '</td>
                    <td>' . $val->user_id . '</td>
                    <td>' . $val->vendor_id . '</td>
                    <td>' . $val->review_star . '</td>
                    <td>' . $val->comment . '</td>

                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_ip . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',8)" title="' . $val->v_shop_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',8)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_pages') {
            $v_shop_vendor = $this->common_model->getData('v_pages');

            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->page_name . '</td>

                    <td>' . $val->title . '</td>
                    <td>' . $val->keywards . '</td>
                    <td>' . $val->meta_tag . '</td>
                    <td>' . $val->description . '</td>

                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',14)" title="' . $val->page_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',14)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        } elseif ($data['action'] == 'v_faq') {
            $v_shop_vendor = $this->common_model->getData('v_faq');

            if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
                $i = 1;
                foreach ($v_shop_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->faq_cat . '</td>

                    <td>' . $val->description . '</td>
                    <td>' . $val->created_by . '</td>


                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',17)" title="' . $val->faq_cat . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',17)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        }elseif ($data['action'] == 'v_party') {
            $v_party = $this->common_model->getData('v_party');

            if (!empty($v_party) && is_array($v_party)) {
                $i = 1;
                foreach ($v_party as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->order_id . '</td>

                    <td>' . $val->invoice_no . '</td>
                    <td>' . $val->party_name . '</td>
                    <td>' . $val->invoice_date . '</td>
                    <td>' . $val->total_purc_price . '</td>
                    <td>' . $val->description . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',26)" title="' . $val->order_id . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',17)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;
                }
            }

        }else if ($data['action'] == 'order_list') {
            $v_vendor = $this->common_model->getData('v_order');
            if (!empty($v_vendor) && is_array($v_vendor)) {
                $i = 1;
                foreach ($v_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '</td>
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',1)" title="' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',1)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;}}

        }else if ($data['action'] == 'product_order_id'){
        
            echo '<input type="hidden" id="hidden_page_id" name="hidden_page_id" value="'.$data['id'].'" />';
            
        }else if ($data['action'] == 'insert_data') {
            array_shift($data);
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);
            array_shift($data);
            if (!empty($data) && is_array($data)) {
                $rendom_no = rand();
                $new_arr = array();
                if ($t_code == '1') {
                    $this->form_validation->set_rules('f_name', 'First Name', 'required|min_length[3]|max_length[12]|alpha');
                    $this->form_validation->set_rules('l_name', 'Last Name', 'required|min_length[3]|max_length[12]|alpha');
                    $this->form_validation->set_rules('dob', 'DOB', 'required');
                    $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[users.email_id]');
                    $this->form_validation->set_rules('primary_mobile', 'Primary Mobile', 'required|numeric|max_length[10]');
                    $this->form_validation->set_rules('password', 'Password', 'required');
                   
                    // $this->form_validation->set_rules('gender', 'Gender', 'required');
                    $this->form_validation->set_rules('v_address', 'Address', 'required');
                    $this->form_validation->set_rules('v_state', 'State', 'required|numeric');
                    $this->form_validation->set_rules('v_city', 'City', 'required|numeric');
                    $this->form_validation->set_rules('v_pincode', 'Pincode', 'required|numeric|max_length[6]');
                 $this->form_validation->set_rules('v_area', 'Area', 'required|min_length[3]|max_length[12]|alpha');
                    // $this->form_validation->set_rules('term_con', 'Term Condition', 'required');
                    $state_data = $this->common_model->getList('v_master_state', array('id' => $data['v_state']));
                    $state_tag_name = $state_data[0]['tag_name'];
                    $city_data = $this->common_model->getList('v_master_city', array('id' => $data['v_city']));
                    $city_tag_name = $city_data[0]['tag_name'];
                    $created_by = isset($_SESSION['vendor_id']) ? $_SESSION['vendor_id'] : 'from site';
                    $created_byqqqqq = isset($_SESSION['vendor_id']) ? $_SESSION['vendor_id'] : '';
                    $ip = $this->input->ip_address();
                    $created_on = date("Y-m-d H:i:s");

                    $vendor_id = 'G' . strtoupper($state_tag_name) . strtoupper($city_tag_name) . rand(100000, 999999);
                    if ($created_byqqqqq == '') {
                        $new_arr = array('vendor_category_type' => 'top', 'username' => $data['primary_mobile'], 'vendor_type' => 'Vendor', 'vendor_id' => $vendor_id, 'created_by' => $created_by, 'created_on' => $created_on, 'created_ip' => $ip);
                    } else {
                        $new_arr = array('vendor_id' => $vendor_id, 'created_by' => $created_by, 'created_on' => $created_on, 'created_ip' => $ip);
                    }

                } else if ($t_code == '3') {
        $password = $data['password'];
								
                    $this->form_validation->set_rules('f_name', 'First Name', 'required|min_length[3]|max_length[12]|alpha');
                    $this->form_validation->set_rules('l_name', 'Last Name', 'required|min_length[3]|max_length[12]|alpha');
                    $this->form_validation->set_rules('primary_mobile', 'Primary Mobile', 'required|numeric|is_unique[users.primary_mobile]|max_length[10]');
                    $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[users.email_id]');
                    $this->form_validation->set_rules('password', 'Password', 'required');
 $otp_mo = $this->common_model->getList('v_otp', array('mobile_email_no' => $data['primary_mobile']));
 if($otp_mo[0]['status']=='Success'){
     $mobile_status = '1';
 }
                   				
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

if(!$uppercase || !$lowercase || !$number  || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    return false;
}
unset($data['password']);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$ip = $this->input->ip_address();
  $user_id = 'G'.rand(100000, 999999);	
   $new_arr = array('user_id' => $user_id, 'password' => $hashed_password, 'mobile_status' => $mobile_status, 'created_ip' => $ip);
                  
                } else if ($t_code == '14') {

                    $this->form_validation->set_rules('page_name', 'Page Name', 'required');
                    $this->form_validation->set_rules('page_url', 'Page Url', 'required');
                    $ip = $this->input->ip_address();
                    $new_arr = array('ip' => $ip);
                } else if ($t_code == '26') {

                    $this->form_validation->set_rules('order_id', 'Order Id', 'required');
                    $this->form_validation->set_rules('invoice_no', 'Invoice No', 'required');
                    $this->form_validation->set_rules('party_name', 'Party Name', 'required');
                     $this->form_validation->set_rules('total_purc_price', 'Total Price', 'required');
                      $this->form_validation->set_rules('description', 'Description', 'required');
                   // $ip = $this->input->ip_address();
                    //$new_arr = array('ip' => $ip);
                }else if ($t_code == '7') {

                    $this->form_validation->set_rules('comment', 'Comment', 'required');
                    $this->form_validation->set_rules('rating', 'Rating', 'required');
                    $this->form_validation->set_rules('product_id', 'Product', 'required');

                    $session_user = $_SESSION['user_id'];

                    $ip = $this->input->ip_address();
                    $new_arr = array('user_id' => $session_user, 'created_ip' => $ip);
                }else if ($t_code == '9') {

                    $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
                    $this->form_validation->set_rules('account_no', 'Account Number', 'required');
                    $this->form_validation->set_rules('ifsc', 'IFSC Code', 'required');
                     $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'required');
                      $this->form_validation->set_rules('account_type', 'Account Type', 'required');
                      $this->form_validation->set_rules('branch_address', 'Branch Address', 'required');

                    $vendor_id = $_SESSION['vendor_id'];
                    $created_on = date("Y-m-d H:i:s");
                    $ip = $this->input->ip_address();
                    $new_arr = array('vendor_id' => $vendor_id, 'created_ip' => $ip,'created_on' => $created_on,'created_by' => $vendor_id);
                }else if ($t_code == '20') {

                    $this->form_validation->set_rules('name', 'Name', 'min_length[3]|trim|required|regex_match[/[a-zA-Z+\s+]*/]');
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email_id]');
                    $this->form_validation->set_rules('phone_no', 'Phone', 'required|numeric|is_unique[users.primary_mobile]|max_length[10]');
                    $this->form_validation->set_rules('subject', 'Subject', 'min_length[5]|trim|required|regex_match[/^[a-zA-Z\s0-9\.\,\;\-\!\?\@\'\:\—\(\)\"]+$/]');
                    $this->form_validation->set_rules('message', 'Message', 'min_length[10]|trim|required|regex_match[/^[a-zA-Z\s0-9\.\,\;\-\!\?\@\'\:\—\(\)\"]+$/]');

                    $ip = $this->input->ip_address();
                    $created_on = date("Y-m-d H:i:s");
                    $new_arr = array('ip' => $ip, 'created_on' => $created_on);
                } else if ($t_code == '16') {
                    $this->form_validation->set_rules('category_id', 'Category ID', 'required');
                    $this->form_validation->set_rules('shop_image', 'Shop Image', 'required');
                    $this->form_validation->set_rules('shop_image_2', 'Shop Image 2', 'required');
                    $this->form_validation->set_rules('v_shop_name', 'Shop Name', 'required');
                    $this->form_validation->set_rules('v_shop_address', 'Shop Address', 'required');
                    $this->form_validation->set_rules('v_shop_state', 'Shop State', 'required');
                    $this->form_validation->set_rules('v_shop_city', 'Shop City', 'required');
                    $this->form_validation->set_rules('v_shop_pincode', 'Shop Pincode', 'required');
                      $this->form_validation->set_rules('v_shop_area', 'Shop Area', 'required');
                        $this->form_validation->set_rules('open_time', 'Open Time', 'required');
                          $this->form_validation->set_rules('closing_time', 'Closing Time', 'required');
                           $this->form_validation->set_rules('lat_log', 'Distance', 'required');
                            $vendor_id = $_SESSION['vendor_id'];
                            $created_on = date("Y-m-d H:i:s");
                            $ip = $this->input->ip_address();
                    $shop_id = 'G' . rand(100000, 999999);
                    $new_arr = array('shop_id' => $shop_id,'vendor_id' => $vendor_id,'created_by' => $vendor_id,'created_on' => $created_on,'created_ip' =>  $ip);
                }else if ($t_code == '25') {
                    $this->form_validation->set_rules('aadhar_card', 'Aadhar Card', 'required');
                    $this->form_validation->set_rules('pancard', 'Pancard', 'required');
                    $this->form_validation->set_rules('gst_no', 'GST Number', 'required');
                            $vendor_id = $_SESSION['vendor_id'];
                            $created_on = date("Y-m-d H:i:s");
                            $ip = $this->input->ip_address();
                    $new_arr = array('vendor_id' => $vendor_id,'created_by' => $vendor_id,'created_on' => $created_on,'created_ip' =>  $ip);
                }else if ($t_code == '17') {

                    $this->form_validation->set_rules('faq_cat', 'Faq Category', 'required');
                    $this->form_validation->set_rules('description', 'Description', 'required');
                    $created_on = date("Y-m-d H:i:s");
                    $created_by = $_SESSION['vendor_id'];
                    $new_arr = array('created_on' => $created_on, 'created_by' => $created_by);

                } else if ($t_code == '10') {

                    $this->form_validation->set_rules('name', 'Menu Name', 'required');
                    $this->form_validation->set_rules('url', 'URL', 'required');
                    $created_on = date("Y-m-d H:i:s");
                    $created_by = $_SESSION['vendor_id'];
                    $new_arr = array('created_on' => $created_on, 'created_by' => $created_by);

                } else if ($t_code == '11') {
                    $this->form_validation->set_rules('category_id', 'Category ID', 'required');
                    $this->form_validation->set_rules('name', 'Menu Name', 'required');
                    $this->form_validation->set_rules('url', 'URL', 'required');
                    $created_on = date("Y-m-d H:i:s");
                    $created_by = $_SESSION['vendor_id'];
                    $new_arr = array('created_on' => $created_on, 'created_by' => $created_by);

                } else if ($t_code == '12') {
                    $this->form_validation->set_rules('menu_name', 'Menu Name', 'required');
                    $this->form_validation->set_rules('url', 'URL', 'required');
                    $this->form_validation->set_rules('parent_url', 'Parent URL', 'required');
                    $this->form_validation->set_rules('parent_id', 'Parent ID', 'required');
                    $this->form_validation->set_rules('parent', 'Parent', 'required');
                    $this->form_validation->set_rules('icon', 'Icon', 'required');
                    $created_on = date("Y-m-d H:i:s");
                    $created_by = $_SESSION['vendor_id'];
                    $new_arr = array('created_on' => $created_on, 'created_by' => $created_by);

                }else if ($t_code == '27') {
                    $this->form_validation->set_rules('cust_name', 'Customer Name', 'required');
                    $this->form_validation->set_rules('cust_mob', 'Customer Mobile', 'required');
                    $this->form_validation->set_rules('email', 'Email', 'required');
                    $this->form_validation->set_rules('address', 'Address', 'required');
                    $this->form_validation->set_rules('state', 'State', 'required');
                    $this->form_validation->set_rules('city', 'City', 'required');
                    $this->form_validation->set_rules('pincode', 'Pincode', 'required');
                    $created_on = date("Y-m-d H:i:s");
                    $created_by = $_SESSION['vendor_id'];

                    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $var = substr(str_shuffle($str_result),0, 12);
                    $new_arr = array('order_id'=>$var,'invoice_id'=>$var, 'created_on' => $created_on, 'created_by' => $created_by);

                }else if ($t_code == '4') {

                    $this->form_validation->set_rules('category_id', 'category', 'required');
                    $this->form_validation->set_rules('sub_category_id', 'sub_category', 'required');
                    $length = strlen($data['category_id']);
                    $category = $data['category_id'];
                    if ($length == '1') {
                        $category = '0' . $data['category_id'];
                    }
                    $length_sub = strlen($data['sub_category_id']);
                    $sub_category = $data['sub_category_id'];
                    if ($length_sub == '1') {
                        $sub_category = '0' . $data['sub_category_id'];
                    }
                    $product_id = 'G' . $category . $sub_category . rand(100000, 999999);

                    $re_pr = implode(',', $data['related_product_id']);
                    unset($data['related_product_id']);

                    if ($_SESSION['vendor_type'] == 'Vendor') {

                        $data = array_merge(array('related_product_id' => $re_pr, 'vendor_id' => $_SESSION['vendor_id']), $data);
                    } else {
                        $data = array_merge(array('related_product_id' => $re_pr), $data);
                    }

                    $new_arr = array('product_id' => $product_id);
                }
                $data = array_merge($new_arr, $data);

                if ($this->form_validation->run()) {
                    $return_res = $this->common_model->insertData($table_name, $data);
                    if ($return_res) {
                                
                        $array = array('status' => true, 'message' => 'Insert Data Successfully.');
                    } else {
                        $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
                    }
                } else {
                    $validation_errors = validation_errors();
                    $array = array('status' => false, 'message' => 'sssssss' . $validation_errors);
                }
            }

            echo json_encode($array);
        } else if ($data['action'] == 'insert_data_size_color') {
            array_shift($data);
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);
            array_shift($data);
            $return_res = false;
            if (!empty($data['left_quantity']) && is_array($data['left_quantity'])) {
                foreach ($data['left_quantity'] as $key => $valk) {
                    $sdsd = array('product_id' => $data['product_id'], 'left_quantity' => $data['left_quantity'][$key],
                        'total_availability' => $data['total_availability'][$key], 'total_quantity' => $data['total_quantity'][$key],
                        'color' => $data['color'][$key], 'size' => $data['size'][$key],'price' => $data['price'][$key],'MRP_price' => $data['mrp_price'][$key]);
                  
                    $this->common_model->insertData($table_name, $sdsd);
                    $return_res = true;
                }
            }
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Insert Data Successfully.'); ?>
                 <script>
                     $(function () {
   $('#modal').modal('toggle');
});
                 </script>
                <?php
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
            }
            echo json_encode($array);

        } else if ($data['action'] == 'update_data') {

            array_shift($data);
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);
            array_shift($data);
            if (!empty($data) && is_array($data)) {
                $rendom_no = rand();
                $new_arr = array();
                if ($t_code == '1') {
                    $pro_id = $data['hidden_id'];
                    array_shift($data);
                    $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');   
                    $this->form_validation->set_rules('v_address', 'Address', 'required');
                    $this->form_validation->set_rules('v_state', 'State', 'required|numeric');
                    $this->form_validation->set_rules('v_city', 'City', 'required|numeric');
                    $this->form_validation->set_rules('v_pincode', 'Pincode', 'required|numeric|max_length[6]');
                    $this->form_validation->set_rules('v_area', 'Area', 'required');
                    
                    $modified_by = $_SESSION['vendor_id'];
                    $ip = $this->input->ip_address();
                    $modified_on = date("Y-m-d H:i:s");
                   
                    $new_arr = array('modified_ip' => $ip, 'modified_on' => $modified_on, 'modified_by' => $modified_by);

                } else if ($t_code == '3') {
                     $pro_id = $data['hidden_page_id'];
                    array_shift($data);
                      $this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|min_length[8]|max_length[25]');
                    $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[8]|max_length[25]');
                    
                       $old_password = $data['old_pass'];
                    
             $user = $this->common_model->getList('v_users', array('user_id' => $_SESSION['user_id']));
         
                    if(password_verify($old_password,$user[0]['password']) === TRUE){
              
                       $password = $data['password'];
                  $uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    return false;
}else{
   
 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
                   $ip = $this->input->ip_address(); 
                    $modified_on = date("Y-m-d H:i:s");
                    $modified_by = $_SESSION['user_id'];
                     unset($data['password']);
unset($data['old_pass']);    
              $new_arrrr = array('password'=> $hashed_password,'modified_on' => $modified_on, 'modified_by' => $modified_by, 'modified_ip' => $ip);
}

                   

                 }else {
                    $array_error = array('success' => false, 'message' => 'Old Password are incorrect, please try again. ');
                    echo 'sdfasdfa';
                }
              
                 
                  
                } else if ($t_code == '14') {
                    $pro_id = $data['hidden_page_id'];
                    array_shift($data);

                    $this->form_validation->set_rules('page_name', 'Page Name', 'required');
                    $this->form_validation->set_rules('page_url', 'Page Url', 'required');
                } else if ($t_code == '1') {
                    $pro_id = $data['hidden_page_id'];
                    array_shift($data);

              $this->form_validation->set_rules('new_password', 'New Password', 'required');
                    
                }
                else if ($t_code == '17') {
                    $pro_id = $data['hidden_page_id'];
                    array_shift($data);

                    $this->form_validation->set_rules('faq_cat', 'Faq Category', 'required');
                    $this->form_validation->set_rules('description', 'Description', 'required');
                    $modified_on = date("Y-m-d H:i:s");
                    $modified_by = $_SESSION['vendor_id'];
                    $new_arr = array('modified_on' => $modified_on, 'modified_by' => $modified_by);
                } else if ($t_code == '10') {
                    $pro_id = $data['hidden_page_id'];
                    array_shift($data);

                    $this->form_validation->set_rules('name', 'Menu Name', 'required');
                    $this->form_validation->set_rules('url', 'URL', 'required');
                    $modified_on = date("Y-m-d H:i:s");
                    $modified_by = $_SESSION['vendor_id'];
                    $new_arr = array('modified_on' => $modified_on, 'modified_by' => $modified_by);
                } else if ($t_code == '11') {
                    $pro_id = $data['hidden_page_id'];
                    array_shift($data);

                    $this->form_validation->set_rules('category_id', 'Category ID', 'required');
                    $this->form_validation->set_rules('name', 'Menu Name', 'required');
                    $this->form_validation->set_rules('url', 'URL', 'required');
                    $modified_on = date("Y-m-d H:i:s");
                    $modified_by = $_SESSION['vendor_id'];
                    $new_arr = array('modified_on' => $modified_on, 'modified_by' => $modified_by);
                } else if ($t_code == '12') {
                    $pro_id = $data['hidden_page_id'];
                    array_shift($data);

                    $this->form_validation->set_rules('menu_name', 'Menu Name', 'required');
                    $this->form_validation->set_rules('url', 'URL', 'required');
                    $this->form_validation->set_rules('parent_url', 'Parent URL', 'required');
                    $this->form_validation->set_rules('parent_id', 'Parent ID', 'required');
                    $this->form_validation->set_rules('parent', 'Parent', 'required');
                    $this->form_validation->set_rules('icon', 'Icon', 'required');
                    $modified_on = date("Y-m-d H:i:s");
                    $modified_by = $_SESSION['vendor_id'];
                    $new_arr = array('modified_on' => $modified_on, 'modified_by' => $modified_by);
                }else if ($t_code == '24') {
                    $pro_id = $data['hidden_page_id'];
                    array_shift($data);

                    $this->form_validation->set_rules('address1', 'Address 1', 'required');
                    $this->form_validation->set_rules('address2', 'Address 2', 'required');

                    $modified_on = date("Y-m-d H:i:s");
                    $modified_by = $_SESSION['user_id'];
                    $new_arr = array('modified_on' => $modified_on, 'modified_by' => $modified_by);
                }else if ($t_code == '6') {
        $pro_id = $data['hidden_page_id'];
                    array_shift($data);

                    $this->form_validation->set_rules('order_status', 'Order Status', 'required');
                    if($data['order_status'] == 'Confirmed'){
                            $v_order_msg = $this->common_model->getProductData('v_product_order', array('id' => $pro_id), '50');
            $v_order_iddds = $v_order_msg[0]['order_id'];
            $v_user_msg = $this->common_model->getProductData('v_users', array('user_id' => $v_order_msg[0]['user_id'],'status'=>'0'), '50');
            $v_user_name = $v_user_msg[0]['f_name'].' '.$v_user_msg[0]['l_name'];
            $primary_mobile_no = $v_user_msg[0]['primary_mobile'];
            
  $apiKey = 'bqfBa8tTgHI-kTIJjjlgDBeTqsLXDQdjioDxKHM9Jx';
                   $opt_msg = "Hello $v_user_name, Thanks for shopping with us! Your order $v_order_iddds is confirmed and will be shipped shortly. Check your status here [website]. Team Gomores.";
                    //$opt_msg = "Dear User, Your order id $password has been cancelled. Team Gomores.com.";
                    $send_otp_res = $this->common_model->send_otp($opt_msg, $primary_mobile_no, $apiKey);
                    }
                    $modified_on = date("Y-m-d H:i:s");
                 
                    $new_arr = array('modified_on' => $modified_on);
                }else if ($t_code == '4') {

                    $pro_id = $data['hidden_product_id'];
                    array_shift($data);

                    $this->form_validation->set_rules('category_id', 'category', 'required');
                    $this->form_validation->set_rules('sub_category_id', 'sub_category', 'required');
                    $re_pr = implode(',', $data['related_product_id']);
                    unset($data['related_product_id']);

                    if ($_SESSION['vendor_type'] == 'Vendor') {
                        $data = array_merge(array('related_product_id' => $re_pr, 'vendor_id' => $_SESSION['vendor_id']), $data);
                    } else {
                        $data = array_merge(array('related_product_id' => $re_pr), $data);
                    }
                    //  $new_arr =  array('product_id'=>$product_id);
                }
                $data = array_merge($new_arr, $data);
                if ($this->form_validation->run()) {
                    $return_res = $this->common_model->updateData($table_name, $data, array('id' => $pro_id));
                    if ($return_res) {
                        $array = array('status' => true, 'message' => 'Update Data Successfully.');
                      
                  } else {
                        $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');

                    }
                } else {
                    $validation_errors = validation_errors();
                    $array = array('status' => false, 'message' => 'sssssss' . $validation_errors);
                }
            }

            echo json_encode($array);
        } else if ($data['action'] == 'update_status') {
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);
            $status = '1';
            if ($data['status'] == '1') {
                $status = '0';
            }
            $return_res = $this->common_model->updateData($table_name, array('status' => $status), array('id' => $data['id']));
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Update Data Successfully.');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');

            }
            echo json_encode($array);
        } else if ($data['action'] == 'delete_record') {
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);

            $upate_case = array('status' => '2');
            if ($t_code == '2') {
                $upate_case = array('status' => '2', 'quantity' => '0');
            }
             if ($t_code == '24') {
                $upate_case = array('status' => '2');
            }
            $return_res = $this->common_model->updateData($table_name, $upate_case, array('id' => $data['id']));
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Deleted Data Successfully.');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');

            }
            echo json_encode($array);
        } else if ($data['action'] == 'login_user') {
         $status = '0';
            $this->form_validation->set_rules('username', 'Username', 'required|numeric|max_length[10]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $password= $data['password'];
           
            if ($this->form_validation->run()) {
                $response = array();
                $this->db->select('id, user_id, f_name, l_name, primary_mobile,email_id,password, cust_type');
                $this->db->from('v_users');
                $this->db->where('primary_mobile', $data['username']);
                 $this->db->where('status', $status);
                $query = $this->db->get();
                $response = $query->result_array();
             
                if(password_verify($password,$response[0]['password']) === TRUE){
               
                    $this->session->set_userdata($response[0]);
                    $array_error = array('success' => true, 'message' => 'Successfully Login');
                 }else {
                    $array_error = array('success' => false, 'message' => 'Username & password are incorrect, please try again. ');
                }
             
                
            }else {
                $array_error = array(
                    'error' => true,
                    'username_error' => form_error('username'),
                    'password_error' => form_error('password'),
                );
            }
            echo json_encode($array_error);
        }else if ($data['action'] == 'login_vendor') {
           // print_r($data);
            $this->form_validation->set_rules('username', 'Username', 'required|numeric|max_length[10]');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run()) {
                $response = array();
                $this->db->select('id, user_id, f_name, l_name, primary_mobile,email_id,cust_type,status');
                $this->db->from('v_vendor');
                $this->db->where('primary_mobile', $data['username'],'status', $data['status']);
                $this->db->where('password', $data['password']);
                $query = $this->db->get();
                $response = $query->result_array();
                if (!empty($response)) {
                    $this->session->set_userdata($response[0]);
                    $array_error = array('success' => true, 'message' => 'Successfully Login');
                } else {
                    $array_error = array('success' => false, 'message' => 'Username & password are incorrect, please try again. ');
                }
            } else {
                $array_error = array(
                    'error' => true,
                    'username_error' => form_error('username'),
                    'password_error' => form_error('password'),
                );
            }
            echo json_encode($array_error);
        }else if ($data['action'] == 'data_list') {
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);
            $return_res = $this->common_model->getList($table_name, array('id' => $data['id']));
            $array = array('status' => 'aaaa', 'message' => json_encode($return_res));
            echo json_encode($array);
        }
        
        else if ($data['action'] == 'deleverd_address') {
            $data_check = array('user_id' => $data['user_id'], 'address_type' => $data['address_type']);
            $return_res = $this->common_model->updateData('v_users_address', array('status' => '1'), $data_check);
            if ($return_res) {
            $data_check12 = array('user_id' => $data['user_id'], 'id' => $data['id'], 'address_type' => $data['address_type']);
            $return_res = $this->common_model->updateData('v_users_address', array('status' => '0'), $data_check12);
                $array = array('status' => true, 'message' => 'Your Delevery Address chenged sucessfully .');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
            }
            $array = array('status' => 'aaaa', 'message' => json_encode($return_res));
            echo json_encode($array);
        }
        
         else if ($data['action'] == 'Edit_deleverd_address') {
             
           //  action,address_type,address_id,add_edit,address1,address2
             $user_id=$_SESSION['user_id'];
             
             
           
            $data_check = array('user_id' => $user_id, 'address_type' => $data['address_type'], 'id' => $data['id']);
            //  print_r($data_check);
            $return_res = $this->common_model->updateData('v_users_address', array('address1' => $data['address1'],'address2' => $data['address2']), $data_check);
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Your Delevery Address chenged sucessfully.');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
            }
            echo json_encode($array);
        }
        
         else if ($data['action'] == 'add_deleverd_address') {
                $user_id=$_SESSION['user_id'];
            $data_check = array('user_id' => $user_id, 'address_type' => $data['address_type'],'address1' => $data['address1'],'address2' => $data['address2'],'state' => $data['loc_state'],'city' => $data['loc_city'],'pincode' => $data['postcodess']);
            $return_res = $this->common_model->insertData('v_users_address',$data_check);
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Your Delevery Address Add sucessfully .');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
            }
            echo json_encode($array);
        }
        
        
        
        
        else if ($data['action'] == 'add_cart') {
            
           // print_r($data['weight_id']);
            $session_user = $_SESSION['session_user_id'];
            $data_check = array('size_id' => $data['weight_id'],'user_id' => $session_user, 'session_user_id' => $session_user, 'product_id' => $data['product_id']);
            $return_res = $this->common_model->getProductData('v_product_cart', $data_check, 100);
            if (!empty($return_res) && is_array($return_res)) {
                $quantity = $data['quantity'];
                if ($data['quantity_cart'] == '0') {
                    $quantity = $return_res[0]['quantity'] + 1;
                }
                $return_res = $this->common_model->updateData('v_product_cart', array('size_id' => $data['weight_id'],'quantity' => $quantity, 'status' => '0'), $data_check);
            } else {
                $return_res = $this->common_model->insertData('v_product_cart', array('session_user_id' => $session_user, 'user_id' => $session_user,'size_id' => $data['weight_id'], 'quantity' => $data['quantity'], 'product_id' => $data['product_id'], 'status' => '0'));
            }
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Add Cart Successfully.');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
            }
            echo json_encode($array);
        }
        
        else if ($data['action'] == 'view_more_product') { 
 $limit = $data['limit']*8;
$all_product = $this->common_model->getProductData('v_product', array('status' => '0','product_type'=>$data['product_type']),10000);
$product_data = $this->common_model->getProductData('v_product', array('status' => '0','product_type'=>$data['product_type']), $limit);
$i =0;

if (!empty($product_data) && is_array($product_data)) {
 foreach ($product_data as $val) { 
                      
                      
                      
                      $images_data =  $this->common_model->getImagelist($val['product_id']);
                      
                      ?>

                    <div class="product-layout  product-grid  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="item">
                            <div class="product-thumb">
                                <div class="image product-imageblock"> <a href="product?pro_id=<?php echo base64_encode($val['product_id']); ?>"> <img width="200" height="200"
                                            src="<?php echo $images_data['image1']; ?>"
                                            alt="<?php echo $val['short_name']; ?>" title="<?php echo $val['short_name']; ?>" class="img-responsive" /> 
                                            <img width="200" height="200"
                                            src="<?php echo $images_data['image2']; ?>"
                                            alt="<?php echo $val['short_name']; ?>" title="<?php echo $val['short_name']; ?>" class="img-responsive" /> </a>
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
                                               
                                    <h4 class="product-name"><a href="#" title="<?php echo $val['short_name']; ?>"><?php echo substr($val['brand_name'],0,15); ?></br><?php echo substr($val['short_name'],0,15); ?></a></h4>
                                    <?php if($val['price'] == $val['MRP_price'] ){?>
                                    <p class="price product-price">₹<?php echo $val['price']; ?></p>
                                    <?php }else{ ?>
                                    <p class="price product-price">₹<?php echo $val['price']; ?><span class="less">₹<?php echo $val['MRP_price']; ?></span>
                                    </p>
                                    <?php }?>
                                    <a href="JavaScript:void(0)"  onclick="fn_add_cart('<?php echo $val['product_id'];?>','0','<?php echo $pro_weight; ?>')" class="btn add"
                                        style="padding-top:10px;">Add Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    

                    <?php $i++;
            } 
           if ($i < count($all_product)){
        ?>
                    <div class="viewmore">
                        <div class="btn" onclick="fn_view_more_product('<?php echo $data['product_type'];?>','<?php echo $data['div_id'];?>')">View More All Products</div>
                    </div>
                    <?php }?>
               
                <?php }?>
           
        <?php }
    }

    public function fn_switch_case($t_code)
    {
        switch ($t_code) {
            case 1:
                $table_name = 'v_vendor';
                break;
            case 2:
                $table_name = 'v_product_cart';
                break;
            case 3:
                $table_name = "v_users";
                break;
            case 4:
                $table_name = "v_product";
                break;
            case 5:
                $table_name = "v_product_image";
                break;
            case 6:
                $table_name = "v_product_order";
                break;
            case 7:
                $table_name = "v_product_review";
                break;
            case 8:
                $table_name = "vendor_review";
                break;
            case 9:
                $table_name = "v_account_detail";
                break;
            case 10:
                $table_name = "v_master_category";
                break;
            case 11:
                $table_name = "v_master_sub_category";
                break;
            case 12:
                $table_name = "v_menu";
                break;
            case 13:
                $table_name = "v_otp";
                break;
            case 14:
                $table_name = "v_pages";
                break;
            case 15:
                $table_name = "v_product_color_size";
                break;
            case 16:
                $table_name = "v_shop_vendor";
                break;
            case 17:
                $table_name = "v_faq";
                break;
            case 18:
                $table_name = "enquiry";
                break;
            case 19:
                $table_name = "complain";
                break;
            case 20:
                $table_name = "v_contact";
                break;
            case 21:
                $table_name = "vendor_image";
                break;
            case 22:
                $table_name = "banner";
                break;
            case 23:
                $table_name = "v_order";
                break;
            case 24:
                $table_name = "v_users_address";
                break;
            case 25:
                $table_name = "v_vendor_kyc";
                break;
            case 26:
                $table_name = "v_party";
                break;
            case 27:
                $table_name = "v_sale_report";
                break;
            default:
                $table_name = '';
                break;
        }
        return $table_name;
    }

}