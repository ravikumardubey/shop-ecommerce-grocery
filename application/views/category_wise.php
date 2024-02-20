<?php 

$this->load->view("element/top-header.php");
$this->load->view("element/header.php");
$this->load->view("element/sidemenu.php");
$this->load->view("element/nav.php");

?>
<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?php echo base_url('public/image/prlx.jpg'); ?>" alt="#"></div>
  <h1 class="category-title">Category</h1>
  <ul>
    <li><a href="#"><?php echo $category_name;?> </a></li>
      <li><a href="#"><?php echo $sub_category_name;?> </a></li>
  </ul>
</div>

<div id="center">
    <div class="container">
        <div class="row">
            <div class="content col-sm-12">
            <?php 
  if(!empty($product_data) && is_array($product_data)) { 
    foreach($product_data as $val) { 
         $images_data =  $this->common_model->getImagelist($val['product_id']);
         
          $fn_getWeight =  $this->common_model->fn_getWeight($val['product_id']);
         
                                    $pro_weight = '';
                                    if(!empty($fn_getWeight) && is_array($fn_getWeight)) { 
                                        $pro_weight = $fn_getWeight[0]['id'];
                                    }
         
 ?>

                <div class="product-layout  product-grid  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="item">
                        <div class="product-thumb">
                            <div class="image product-imageblock"> <a  href="../product?pro_id=<?php echo base64_encode($val['product_id']); ?>"> <img height="250" width="250"
                                        src="<?php echo $images_data['image1']; ?>" alt="iPod Classic" title="iPod Classic"
                                        class="img-responsive" /> <img height="250" width="250" src="<?php echo $images_data['image2']; ?>"
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
                                <h4 class="product-name"><a href="../product?pro_id=<?php echo base64_encode($val['product_id']); ?>" title="<?php echo $val['short_name']; ?>"><?php echo substr($val['brand_name'],0,15); ?></br><?php echo $val['short_name']; ?></a></h4>
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
                                            <button onclick="fn_plus('<?php echo $val['product_id']; ?>','2')" class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <a href="JavaScript:void(0)"  onclick="fn_add_cart('<?php echo $val['product_id']; ?>','1','<?php echo $pro_weight; ?>')" class="btn add"
                                        style="padding-top:10px;">Add Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }else{ ?>
                 <div class="container">
        <div class="row ">
    <div class="col-md-offset-2 col-md-8 purchase" >
         <h3 class="purchase-title">No Product Found</h3>
      <h3 class="purchase-title">Are you Ready for shopping with us</h3>
     <button onclick="location.href='<?php echo base_url(); ?>'" type="button" class="btn btn-primary" >Buy Now</button>
    </div>
  </div>
  </div>
                
<?php                } ?>
                

            </div>
            <!-- tab-living-->

        </div>
    </div>
</div>


<style>
.button_related {
    padding: 0px 8px 0px 5px;
}

.button-custome-plus .input-group.catagre {
    width: 46px !important;
    float: left;
}
</style>





<?php $this->load->view("element/related_product.php");?>
<?php $this->load->view("element/footer.php");?>


<script>

  //fn_auto_cat();
    
    function fn_auto_cat() { 
    var data = {};
     data['action'] = 'auto_cart_view';
    $.ajax({
        type: 'POST',
        url: '../ajaxcall',
        data: data,
        dataType: 'html',
        success: function (data) {
            $('.load_container').hide();
                        var obj = JSON.parse(data);
                        $("#cart #cart_items_id").html(obj.cart_item_no);
                 $("#cart .cart-dropdown-menu").html(obj.cart_view);
                   $("#cart-total-app").html(obj.cart_item_no);
                      
                     // dropdown-menu pull-right cart-dropdown-menu
        },
        error: function (request, error) {
            swal("Something Error", "error");
           // alert("something error");
            $('.load_container').hide();
        }
    });
}
    
function fn_add_cart(product_id,type_status,pro_size) {
    
    var product_weight = pro_size;
        if(pro_size == '') { 
            var product_weight =  $("#select_by_size").val();
        }
    var data = {};
    data['action'] = 'add_cart';
    var quantity = '1';
    var quantity_cart1 = '0';
    var product_weight = product_weight;
    if(type_status == '1') { 
        var quantity_cart1 = '1';
    }
    var quantity111 = $("#qty_input"+product_id).val();
    if (typeof quantity111 !== "undefined") {
        var quantity = quantity111; 
    }
    data['quantity'] = quantity;
    data['quantity_cart'] = quantity_cart1;
     data['weight_id'] = product_weight;
    data['product_id'] = product_id;
    $.ajax({
        type: 'POST',
        url: '../ajaxcall',
        data: data,
        dataType: 'json',
        success: function (data) {
            $('.load_container').hide();
            if (data.status == false) {
                 swal("Success", data.message, "success");
              fn_auto_cat();
            //   if(quantity_cart1 == '1') { 
            //     window.location.href=lang;
            //   } 
               
            } else if (data.status == true) {
                  swal("Success", data.message, "success");
              //  alert(data.message);
                fn_auto_cat();
                
                // if(quantity_cart1 == '1') { 
                //     window.location.href=lang;
                //   } 
            } else {
                $("#data_json_div").html(data.message);
            }
        },
        error: function (request, error) {
             swal("Something error");
            //alert("something error");
            $('.load_container').hide();
        }
    });
}
    
</script>