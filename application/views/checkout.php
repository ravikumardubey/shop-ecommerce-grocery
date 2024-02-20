<?php include "element/top-header.php";
include "element/header.php";
include "element/sidemenu.php";
include "element/nav.php";

?>
<link href="<?php echo base_url('public/css/checkout.css'); ?>" rel="stylesheet" media="screen" />



<span class="side-menu-2" style="" onclick="openNav()">&#9776;</span>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}
</script>

<?php
$my_aa = isset($_SESSION['id']) ? $_SESSION['id'] : '';
if ($my_aa == '') {
    redirect('login?check_login=no', 'refresh');
}

$data_check = array('user_id' => $_SESSION['session_user_id'], 'session_user_id' => $_SESSION['session_user_id'], 'status' => '0');
$v_product_cart = $this->common_model->getProductData('v_product_cart', $data_check, 100);

if (count($v_product_cart) == '0') {
    redirect('profile', 'refresh');
}
$biling_address = $this->common_model->getList('v_users_address', array('address_type' => '1', 'user_id' => $_SESSION['user_id']));
$delivery_address = $this->common_model->getList('v_users_address', array('address_type' => '2', 'user_id' => $_SESSION['user_id']));

?>
<div class="breadcrumb parallax-container">
    <div class="parallax"><img src="<?php echo base_url('public/image/prlx.jpg'); ?>" alt="#"></div>
    <h1>Checkout</h1>
    <ul>
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url('cart'); ?>">Shopping Cart</a></li>
        <li><a href="<?php echo base_url('checkout'); ?>">Checkout</a></li>
    </ul>
</div>



 <div class="container">
    <div class="row">
    


        <div class="col-sm-12" id="content">
            <div id="accordion" class="panel-group">

                <form class="form-horizontal" action="" method="post" id="order_page_form_id" name="order_page_form_id">

                    <div class="col-sm-" id="content">
                        <div id="accordion" class="panel-group">
                         <!--   <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle collapsed"
                                            data-parent="#accordion" data-toggle="collapse"
                                            href="#collapse-payment-address" aria-expanded="">Step 1: Billing Details <i
                                                class="fa fa-caret-down"></i></a></h4>
                                </div>
                                <div id="collapse-payment-address" role="heading" class="panel-collapse collapse"
                                    aria-expanded="" style="height: 0px;">
                                    <div class="panel-body">

                                        <?php /* $pay_exi = 'display';
$pay_new = 'none';

$checked_exi_b = 'checked';
$checked_new_b = '';
if (count($biling_address) == '0') {$pay_exi = 'none';
    $pay_new = 'display';

    $checked_exi_b = '';
    $checked_new_b = 'checked';
} */ ?>

                                        <div class="radio">
                                            <label>
                                                <input type="radio" <?php //echo $checked_exi_b; ?> value="existing"
                                                    name="payment_address_biling" id="payment_address_biling1"
                                                    data-id="payment-existing">
                                                I want to use an existing address</label>
                                        </div>



                                        <div id="payment-existing" style="display: <?php /*echo $pay_exi; ?>;">
                                            <?php if (!empty($biling_address) && is_array($biling_address)) {

    $i = 1;?>
                                            <select class="required form-control" name="address_id_biling"
                                                id="address_id_biling">
                                                <?php
foreach ($biling_address as $val) {?>
                                                <option value="<?php echo $val['id']; ?>">
                                                    <?php echo $i . '. ' . $val['address1']; ?></option>
                                                <?php $i++;}?>
                                            </select>
                                            <?php } else {echo ' <h3 style="color:red"> Not existing addres </h3>';}?>






                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" <?php echo $checked_new_b; ?> value="new"
                                                    name="payment_address_biling" id="payment_address_biling2"
                                                    data-id="payment-new">
                                                I want to use a new address</label>
                                        </div>
                                        <br>
                                        <div id="payment-new" style="display: <?php echo $pay_new; ?>;">


                                            <div class="form-group">
                                                <label for="address-1" class="col-sm-2 control-label">Address 1</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="required form-control"
                                                        id="address_1_biling" placeholder="Address 1" value=""
                                                        name="address_1_biling">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address-2" class="col-sm-2 control-label">Address 2</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="required form-control"
                                                        id="address_2_biling" placeholder="Address 2" value=""
                                                        name="address_2_biling">
                                                </div>
                                            </div>
                                                <div class="form-group required">
                                                    <label for="input-email" class="col-sm-2 control-label">State</label>
    
                                                    <div class="col-sm-10">
                                                        <select class="form-control select-fixed-single" id="loc_state"
                                                            name="loc_state" onChange="getCity(this.value);" data-fouc>
                                                            <option value="0">Select State</option>
                                                            <?php $loc_data = $this->common_model->getProductData('v_master_state', array('status' => '0','id'=> '13'), '50');
    
    if (!empty($loc_data) && is_array($loc_data)) {
        foreach ($loc_data as $val) {?>
                                                            <option value="<?php echo $val['id']; ?>">
                                                                <?php echo $val['name']; ?></option>
                                                            <?php }} */?>
                                                        </select>
                                                      
                                                    </div>
                                                </div>
                                            <div class="form-group required">
                                                <label for="input-email" class="col-sm-2 control-label">City</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select-fixed-single" id="loc_city"
                                                        name="loc_city" data-fouc>
                                                        <optgroup label="Select City">
                                                            <option value="0">Select City</option>

                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="postcode" class="col-sm-2 control-label">Post Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="required form-control"
                                                        id="postcode_biling" placeholder="Post Code" value=""
                                                        name="postcode_biling">
                                                </div>
                                            </div>


                                        </div>


                                        <script type="text/javascript">
                                        $('input[name=\'payment_address_biling\']').on('change', function() {
                                            if (this.value == 'new') {
                                                $('#payment-existing').hide();
                                                $('#payment-new').show();
                                            } else {
                                                $('#payment-existing').show();
                                                $('#payment-new').hide();
                                            }
                                        });
                                        </script>
                                    </div>
                                      
                                </div>
                            </div>  -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle collapsed"
                                            data-parent="#accordion" data-toggle="collapse"
                                            href="#collapse-shipping-address" aria-expanded="false">Step 1: Delivery
                                            Details <i class="fa fa-caret-down"></i></a></h4>
                                </div>
                                <div id="collapse-shipping-address" role="heading" class="panel-collapse collapse"
                                    aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">


                                        <?php $pay_exi_de = 'display';
$pay_new_de = 'none';
$checked_exi = 'checked';
$checked_new = '';
if (count($delivery_address) == '0') {$pay_exi_de = 'none';
    $pay_new_de = 'display';
    $checked_exi = '';
    $checked_new = 'checked';
}?>


                                        <div class="radio">
                                            <label>
                                                <input type="radio" <?php echo $checked_exi; ?> value="existing"
                                                    name="shipping_address_delivery" id="shipping_address_delivery1">
                                                I want to use an existing address</label>
                                        </div>
                                        <div id="shipping-existing" style="display:<?php echo $pay_exi_de; ?>;">

                                            <?php if (!empty($delivery_address) && is_array($delivery_address)) {
    $ii = 1;
    ?>
                                            <select class="required form-control" name="address_id_delivery"
                                                id="address_id_delivery">
                                                <?php
foreach ($delivery_address as $val) {?>
                                                <option value="<?php echo $val['id']; ?>">
                                                    <?php echo $ii . '. ' . $val['address1']; ?></option>
                                                <?php }?>
                                            </select>
                                            <?php } else {echo ' <h3 style="color:red"> Not existing addres </h3>';}?>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" <?php echo $checked_new; ?> value="new"
                                                    name="shipping_address_delivery" id="shipping_address_delivery2">
                                                I want to use a new address</label>
                                        </div>
                                        <br>
                                        <div id="shipping-new" style="display: <?php echo $pay_new_de; ?>;">

                                            <div class="form-group">
                                                <label for="address-1" class="col-sm-2 control-label">Address 1</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="required form-control"
                                                        id="address_1_delivery" placeholder="Address 1" value=""
                                                        name="address_1_delivery">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address-2" class="col-sm-2 control-label">Address 2</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="required form-control"
                                                        id="address_2_delivery" placeholder="Address 2" value=""
                                                        name="address_2_delivery">
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-email" class="col-sm-2 control-label">State</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select-fixed-single" id="locccc_state"
                                                        name="locccc_state" onChange="getCity(this.value);" data-fouc>
                                                        <option value="0">Select State</option>
                                                        <?php $loc_dataaaa = $this->common_model->getProductData('v_master_state', array('status' => '0','id'=> '13'), '50');

if (!empty($loc_dataaaa) && is_array($loc_dataaaa)) {
    foreach ($loc_dataaaa as $val) {?>
                                                        <option value="<?php echo $val['id']; ?>">
                                                            <?php echo $val['name']; ?></option>
                                                        <?php }}?>
                                                    </select>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-email" class="col-sm-2 control-label">City</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select-fixed-single" id="loccccc_city"
                                                        name="loccccc_city" data-fouc>
                                                        <optgroup label="Select City">
                                                            <option value="0">Select City</option>

                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="postcode" class="col-sm-2 control-label">Post Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="required form-control"
                                                        id="postcode_delivery" placeholder="Post Code"
                                                        name="postcode_delivery">
                                                </div>
                                            </div>


                                        </div>


                                        <script type="text/javascript">
                                        $('input[name=\'shipping_address_delivery\']').on('change', function() {
                                            if (this.value == 'new') {
                                                $('#shipping-existing').hide();
                                                $('#shipping-new').show();
                                            } else {
                                                $('#shipping-existing').show();
                                                $('#shipping-new').hide();
                                            }
                                        });
                                        </script>
                                    </div>
                                </div>
                            </div>
                    <!--------------payment mode--------------->
                    
                    
                     <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle collapsed"
                                            data-parent="#accordion" data-toggle="collapse"
                                            href="#collapse-paymentsss-address" aria-expanded="false">Step 2: Payment
                                            Mode <i class="fa fa-caret-down"></i></a></h4>
                                </div>
                                <div id="collapse-paymentsss-address" role="heading" class="panel-collapse collapse"
                                    aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">

                                        <div class="form-check">
  <input type="radio" class="form-check-input" id="cod" name="payment_method" value="COD" checked>&nbsp;&nbsp;COD
  <label class="form-check-label" for="radio1"></label>
<!--<input type="radio" class="form-check-input" id="online" name="payment_method" value="Online">&nbsp;&nbsp;Online
  <label class="form-check-label" for="radio2"></label> -->
</div>
                                        </div>
                                        </div>
                               
                            </div>
                    
                    
                    
                    
                    
                    
                    <!-----------------end of statement--------------->
                    
                    
                    
                            <div class=" panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion"
                                            data-toggle="collapse" href="#collapse-checkout-confirm"
                                            aria-expanded="true">Step 3: Confirm Order <i
                                                class="fa fa-caret-down"></i></a></h4>
                                </div>
                                <div id="collapse-checkout-confirm" role="heading" class="panel-collapse collapse in"
                                    aria-expanded="true" style="">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <td class="text-left">Product Name</td>
                                                        <td class="text-right">Quantity</td>

                                                        <td class="text-right">Total</td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
$total_price = 0;
if (!empty($v_product_cart) && is_array($v_product_cart)) {
    foreach ($v_product_cart as $val) {
        $product_data = $this->common_model->getProductData('v_product', array('product_id' => $val['product_id']), '100');
        
        $product_data_data = $this->common_model->getProductData('v_product_color_size', array('product_id' => $val['product_id'],'id' => $val['size_id']), '100');
       
       
        ?>

                                                    <tr>
                                                        <td class="text-left"><a
                                                                href="#"><?php echo $product_data[0]['short_name'].'('.$product_data_data[0]['size'].')'; ?></a>
                                                        </td>
                                                        <td class="text-right"><?php echo $product_data_data[0]['price'] .' X '.$val['quantity']; ?></td>
                                                       

                                                        <td class="text-right">₹ <?php echo $total_amt = $product_data_data[0]['price'] * $val['quantity'];
        $total_price = $total_amt + $total_price;

        ?></td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right" colspan="2"><strong>Sub-Total:</strong>
                                                        </td>
                                                        <td class="text-right">₹ <?php echo $total_price; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right" colspan="2"><strong>Flat Shipping
                                                                Rate:</strong></td>
                                                            <?php     if($total_price >= '3000'){ ?>
                                                        <td class="text-right">Free</td>
                                                        <?php }else{?>
                                                        <td class="text-right">₹ 30.00</td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right" colspan="2"><strong>Total:</strong></td>
                                                        <td class="text-right">₹
                                                            <?php 
                                                            if($total_price >= '999'){
                                                            
                                                            echo $grand_total = floatval($total_price + 0); 
                                                                
                                                            }else{
                                                                 echo $grand_total = floatval($total_price + 30);
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <input type="button"
                                            onclick="fn_confirm_order('<?php echo $product_data[0]['product_id']; ?>')"
                                            data-loading-text="Loading..." class="btn btn-primary" id="button-confirm"
                                            value="Confirm Order">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </form>



            </div>

        </div>
    </div>


    <div class="col-xs-12 p-0 fixed bottom-55 left-0">
        <div class="col-xs-12 p-0 bg-blueButton flex align-items-center">
            <div class="col-xs-12 p-10 pt-5 pr-10  pl-10 pb-15">
                <button
                    class="mat-button-ripple gradient-green z-depth-1 blackColor width-100-p nunito-bold font-14 text-center p-6 bd-0 p-0 radius-10 line-22 pl-35"
                    onclick="fn_confirm_order('<?php echo $product_data[0]['product_id']; ?>')">Confirm Order<span
                        class="fa fa-angle-right floatR font-22 line-22"></span>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-footer-custom" class="mobile-footer-custom">
        <ul>
            <li onclick="location.href='';" class="home-mobile-content"><span
                    class="fa fa-home"></span><span>home</span></li>
            <li class="search-mobile-content"><span class="fa fa-search-plus"></span><span>search</span></li>
            <li onclick="location.href='/offer-zone';" class="offer-mobile-content"><span
                    class="fa fa-gift"></span><span>offers</span></li>
            <li class="category-mobile-content"><span class="fa fa-th-large"></span><span>categories</span></li>
            <li class="category-mobile-content"><span class="fa fa-shopping-cart"></span><span>Cart</span></li>
        </ul>
    </div>
</div>



<script src="javascript/jquery.parallax.js"></script>
<script src="public/js/checkout.js"></script>
<script>
function fn_confirm_order(val) {
    var valid = $("#order_page_form_id").valid();
    var product_id = val;
    if (valid) {
        var data = {};
        var action = 'order_confirm';
        var biling_type = $("input[name=payment_address_biling]:checked").val();
        var delivery_type = $("input[name=shipping_address_delivery]:checked").val();
        var payment_method = $("input[name=payment_method]:checked").val();
        var shipping_method = $("input[name=shipping_method]:checked").val();
        //var shipping_method_comment = $("#order_page_form_id #shipping_method_comment").val();
       // var payment_method = $("input[name=payment_method]:checked").val();
        //var payment_method_comment = $("#order_page_form_id #payment_method_comment").val();
        //var payment_method_agree = $("#order_page_form_id #payment_method_agree").val();
        
        if (biling_type == 'new') {
            var product_id = product_id;
            var address_1_biling = $("#order_page_form_id #address_1_delivery").val();
            var address_2_biling = $("#order_page_form_id #address_2_delivery").val();
            var postcode_biling = $("#order_page_form_id #postcode_delivery").val();
            if(address_1_biling ==''){
                alert('address_1_biling');
                return false;
            }
            if(address_2_biling ==''){
                alert('address_2_biling');
                return false;
            }
             if(postcode_biling ==''){
                alert('postcode_biling');
                return false;
            }
            
            
        } else {
            var address_id_biling = $("#order_page_form_id #address_id_delivery").val();
        }
        if (delivery_type == 'new') {
            var product_id = product_id;
            var address_1_delivery = $("#order_page_form_id #address_1_delivery").val();
            var address_2_delivery = $("#order_page_form_id #address_2_delivery").val();
            var loc_city = $("#order_page_form_id #loc_city").val();
            var postcode_delivery = $("#order_page_form_id #postcode_delivery").val();
            var loc_state = $("#order_page_form_id #loc_state").val();
            
            if(address_1_delivery ==''){
                alert('address_1_delivery');
                return false;
            }
            if(address_2_delivery ==''){
                alert('address_2_delivery');
                return false;
            }
             if(loc_city ==''){
                alert('loc_city');
                return false;
            }
            if(postcode_delivery ==''){
                alert('postcode_delivery');
                return false;
            }
            if(loc_state ==''){
                alert('loc_state');
                return false;
            }
        } else {
            var address_id_delivery = $("#order_page_form_id #address_id_delivery").val();
        }
        var request_pars = "action="+action+"&payment_method="+payment_method+"&biling_type="+biling_type+"&delivery_type="+delivery_type+
		"&shipping_method="+shipping_method+
		"&product_id="+product_id+"&address_1_biling="+address_1_biling+"&address_2_biling="+address_2_biling+"&postcode_biling="+postcode_biling+
		"&address_id_biling="+address_id_biling+
		"&address_1_delivery="+address_1_delivery+"&address_2_delivery="+address_2_delivery+"&loc_city="+loc_city+"&postcode_delivery="+postcode_delivery+"&loc_state="+loc_state+
		"&address_id_delivery="+address_id_delivery;

<?php $name = $_SESSION['f_name'] ." ". $_SESSION['l_name'];
$email = $_SESSION['email_id'];
$phone = $_SESSION['primary_mobile'];
  ?>
if(payment_method == 'Online'){
    $.ajax({
            type: 'POST',
            url: 'confirmorder',
            data: request_pars,
            dataType: 'html',
            success: function (data) {
                $('.load_container').hide();
				var options = {
                "key": "rzp_live_frgPr042wibmAh",
                "amount": "<?php echo $grand_total; ?>" * 100,
                "currency": "INR",
                "name": "GOMORES",
                "description": "Payment",
                "prefill" : {
    "name": "<?php echo $name; ?>",
    "email": "<?php echo $email; ?>",
    "contact": "<?php echo $phone; ?>",
    },
     "notify" : {
    "sms": true,
    "email": true,
   
    },
    
                "image": "https://gomores.com/public/image/logo (1).png",
                "handler": function(response) {
                    $.ajax({
                        type: 'POST',
                        url: 'confirmorder',
                        data: "action=payment_stats&payment_id=" + response.razorpay_payment_id,
                        success: function(results) {
                            console.log(results);
                            $('.load_container').hide();
                             swal("Order Confirm successfully", "Success");
                             window.location.href='thankyou';
                        },
                        error: function(request, error) {
                            swal("Something Error", "error");
                            $('.load_container').hide();
                        }
                    });
                },
                "modal": {
        "ondismiss": function(){
            location.reload();
            // window.history
               window.history.back();
               window.history.go(-1);
        }
    }
            };
            
            
            
            
        var rzp = new Razorpay(options);
        rzp.open();
            },
            error: function (request, error) {
                swal("Something Error", "error");
              // alert("something error");
                $('.load_container').hide();
            }
        });


}else{
           

           $.ajax({
             type: 'POST',
             url: 'confirmorder',
             data: request_pars,
             dataType: 'html',
             success: function (data) {
                 $('.load_container').hide();
                      swal("Order Confirm successfully", "Success");
                     window.location.href='profile';
             },
             error: function (request, error) {
                 swal("Something Error", "error");
                alert("something error");
                 $('.load_container').hide();
             }
         });
}

    }
}
</script>

<script>
function guestLogin() {
    if (document.getElementById("radio1").checked) {
        window.location.href = '<?php echo base_url('register'); ?>';
    }
    if (document.getElementById("radio2").checked) {
        window.location.href = '<?php echo base_url('login'); ?>';
    }

}

jQuery(document).ready(function($) {
    $('.parallax').parallax();
});

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>


<?php include "element/footer.php";?>