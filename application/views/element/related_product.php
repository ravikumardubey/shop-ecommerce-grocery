<div class="container">
    <div class="row">
        <h3 class="productblock-title">Related Products</h3>
        <h4 class="title-subline">What’s so special? Check it out!</h4>
        <div class="box">
            <div id="related-slidertab" class="row owl-carousel owl-carousels product-slider">
                <?php  $product_data_related = $this->common_model->getProductData('v_product',array('status'=>'0'),'8');  
                
                //print_r($product_data);
                                if(!empty($product_data_related) && is_array($product_data_related)) { 
                                  foreach($product_data_related as $val) {
                                  
                                   $images_data =  $this->common_model->getImagelist($val['product_id']);
                                  ?>
               
                <div class="item items">
                    <div class="product-thumb transition">
                        <div class="image product-imageblock"> <a href="product?pro_id=<?php echo base64_encode($val['product_id']); ?>">
                               <img src="<?php echo $images_data['image1']; ?>" alt="<?php echo $val['short_name']; ?>" title="<?php echo $val['short_name']; ?>" class="img-responsive" width="250" height="250"/>
                <img src="<?php echo $images_data['image2']; ?>" alt="<?php echo $val['short_name']; ?>" title="<?php echo $val['short_name']; ?>" class="img-responsive" width="250" height="250"/>
                </a>
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
                <ul class="button-group">
                  <li>
                    <button title="Add to Cart" class="addtocart-btn" type="button" onclick="fn_add_cart('<?php echo $val['product_id']; ?>','0','<?php echo $pro_weight; ?>')">Add Cart</button>
                  </li>
                </ul>
                </div>
                <div class="caption product-detail">
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                <h4 class="product-name"><a href="product?pro_id=<?php echo base64_encode($val['product_id']); ?>" title="Casual Shirt With Ruffle Hem"><?php echo substr($val['brand_name'],0,15); ?></br><?php echo substr($val['short_name'],0,13); ?></a></h4>
                  <?php if($val['price'] == $val['MRP_price'] ){?>
                                    <p class="price product-price">₹<?php echo $val['price']; ?></p>
                                    <?php }else{ ?>
                                    <p class="price product-price">₹<?php echo $val['price']; ?><span class="less">₹<?php echo $val['MRP_price']; ?></span>
                                    </p>
                                    <?php }?>
              </div>
              </div>
          </div>
                                  <?php } }  ?>

                      
            </div>
        </div>
    </div>
</div>

