<?php include("element/top-header.php");
include("element/header.php");
include("element/sidemenu.php");
include("element/nav.php");


?>
<?php 

$my_aa = isset($_SESSION['id']) ? $_SESSION['id'] : '';
if($my_aa == '') { 
redirect('login', 'refresh');
}
 ?>


<style>
/*body {background-color: powderblue;}*/
/*h1   {color: blue;}*/
/*p    {color: red;}*/
.container_ddd {
    width: 100%;
    background: #f3f7f8;
    padding: 20px 30px;
    border-radius: 5px;
    border: 1px solid #90EE90;
    margin-bottom: 10px;
}

.container_sss {
    width: 100%;
    background: #f3f7f8;
    padding: 20px 30px;
    border-radius: 5px;
    border: 1px solid #90EE90;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center flex-direction:column;



}

h3 {
    padding: 0;
    margin: 0;
}

.sssssss {
    text-align: right;

}

.abdddd-title {

    margin: 7px 0 0px;
}

.addtocart-btn {
    background-color: #32CD32;
    padding: 7px;
    color: #ffffff;
    border-radius: 3px;
    text-align: center;
}

.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: #000;
    z-index: 0;
}

.modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;
}

.progressbar-wrapper {
    background: #fff;
    width: 100%;
    padding-top: 10px;
    padding-bottom: 5px;
}

.progressbar li {
    list-style-type: none;
    width: 30%;
    float: left;
    /* top: 8px; */
    font-size: 12px;
    position: relative;
    text-align: center;
    /* text-transform: uppercase; */
    color: #7d7d7d;
}


.progressbar li:before {
    width: 20px;
    height: 20px;
    content: "";
    line-height: 15px;
    border: 2px solid #7d7d7d;
    display: block;
    text-align: center;
    margin: 0 auto 10px auto;
    border-radius: 50%;
    position: relative;
    z-index: 2;
    margin-top: 20px;
    background-color: #fff;
}

.progressbar li:after {
    width: 100%;
    height: 2px;
    content: '';
    position: absolute;
    background-color: #7d7d7d;
    top: 30px;
    left: -50%;
    z-index: 0;
}

.progressbar li:first-child:after {
    content: none;
}

.progressbar li.active {
    color: green;
    font-weight: bold;
}

.progressbar li.active:before {
    border-color: #55b776;
    background: green;
}

.progressbar li.active+li:after {
    background-color: #55b776;
}


.progressbar-2 li.active:before {
    background: #55b776 url(user.svg) no-repeat center center;
    background-size: 60%;
}

.progressbar-2 li::before {
    background: #fff url(user.svg) no-repeat center center;
    background-size: 60%;
}
</style>
<?php $my_aa = isset($_SESSION['id']) ? $_SESSION['id'] : '';
if($my_aa == '') { 
redirect('login', 'refresh');
} ?>

<body class="about">
    <div class="breadcrumb parallax-container">
        <div class="parallax"><img src="public/image/prlx.jpg" alt="#"></div>
        <h1>Order History</h1>
        <ul>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>orderhistory">Order History</a></li>
        </ul>
    </div>





    <div class="container">
        <div class="row">
            <div class="col-sm-9" id="content">
                <div class="modal fade" id="order_history" role="dialog">
                    <div class="modal-dialog order" style="z-index:9999;">
                        <!-- Modal content-->
                        <div class="modal-header" id="order_date">
                            <h3 class=" abdddd-title">View Order Details</h3><br>
                        </div>
                    </div>
                </div>



                <?php 
     $user_id=$_SESSION['user_id'];
   
     $loc_data = $this->common_model->getProductData('v_product_order', array('user_id'=>$user_id,'pay_status'=>'completed'), '50'); 
     
     
 
      
                  if (!empty($loc_data) && is_array($loc_data)){
    foreach ($loc_data as $val) { 
   $timestamp = strtotime($val['created_on']);
    $new_time = date("g:i A",$timestamp);
   $new_date = date("d-m-Y", $timestamp);
   if(isset($val['delivery_id'])){
        $delivery_id = $this->common_model->getProductData('v_users_address', array('user_id'=>$user_id,'id'=>$val['delivery_id']), '50');
        
}
   
     ?>

                <div class="popup-panel">
                    <div class="panel panel-success">
                        <div class="panel-heading">

                            <a href="#" onclick="fn_view_order('<?php echo $val['order_id']; ?>','<?php echo $val['invoice_id'] ?>','<?php echo $user_id; ?>')">
                                <h3 class="panel-title">Order is <?php echo $val['order_status'];?> </h3> </a>
                                <h5 style="font-weight:600; font-family:arial;"><?php echo $new_date; ?> at
                                    <?php echo $new_time ?></h5>
                        </div>
                        <div class="plan cf  text-addresh">
                            
                            <div class="col-md-3 col-xs-5">
                                 <h5 style="font-weight:600; font-family:arial;">Billing Address</h5>
                             <span style="font-weight:400; color:#333; font-size:16px; padding-bottom:5px;">   <?php echo $delivery_id[0]['address1'].' '.$delivery_id[0]['address2'].' '.$delivery_id[0]['pincode'];?></span>
                            </div>
                            <div class="col-md-9 col-xs-12">
                                <div class="price">

                                    <span style="font-weight:400; color:#333; font-size:16px; padding-bottom:5px;">Order
                                        ID : <?php echo $val['order_id']?></span><br>
                                    <span
                                        style="font-weight:700; color:#333; font-size:14px; padding-bottom:5px;"><?php //echo $locccc_data[0]['name']?></span><br>
                                    <span style="font-size:13px;"> <?php //echo $locccc_data[0]['short_description'] ?>

                                    </span>
                                    <p><span class="price-text">Price: <i class="fa fa-inr"
                                                aria-hidden="true"></i><?php echo $val['total_price'] ?></span></p>
                                    </a>
                                </div>
                            </div>
                            <div class="" style="margin-top:10px;">
                                <!--- <button type="button" class="btn btn-danger pull-left">Cancel</button> -->
                                <button style='margin-left: 10px;' type="button" class="btn btn-success pull-right"><i class="fa fa-shopping-bag">&nbsp;&nbsp;Download Invoice</i></button>
                                <button type="button" class="btn btn-success pull-right"onclick="fn_view_order('<?php echo $val['order_id']; ?>','<?php echo $val['invoice_id'] ?>','<?php echo $user_id; ?>')" ><i class="fa fa-shopping-bag">&nbsp;&nbsp;View Order</i></button>

                            </div>
                        </div>
                        <?php 
                        
                          $in_pros = 'active';
                         $confirmed = '';
                         $delivered = '';
                        if($val['order_status'] == 'In-Progress') { 
                         $in_pros = 'active';
                         $confirmed = '';
                         $delivered = '';
                        } else if($val['order_status'] == 'Confirmed') { 
                         $in_pros = 'active';
                         $confirmed = 'active';
                         $delivered = '';
                        } else if($val['order_status'] == 'Delivered') { 
                         $in_pros = 'active';
                         $confirmed = 'active';
                         $delivered = 'active';
                        } 
                        ?>
                       <div class="progressbar-wrapper clearfix">
                                <ul class="progressbar">
                                    <li class="<?php echo $in_pros; ?>" alt="<?php echo $val['order_status'];?>" title="<?php echo $val['order_status'];?>">In-Progress</li>
                                    <li class="<?php echo $confirmed; ?>" alt="<?php echo $val['order_status'];?>" title="<?php echo $val['order_status'];?>" >Confirmed</li>
                                    <li class="<?php echo $delivered; ?>" alt="<?php echo $val['order_status'];?>" title="<?php echo $val['order_status'];?>">Delivered</li>
                                </ul>
                            </div>
                    </div>

                </div>





                <?php } }?>






            </div>

        </div>

    </div>

    <div class="container">
        <h3 class="client-title">Favourite Brands</h3>
        <h4 class="title-subline">The High Quality Products</h4>
        <div id="brand_carouse" class="owl-carousel brand-logo">
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand1.png'); ?>" alt="Disney"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand2.png'); ?>" alt="Dell"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand3.png'); ?>" alt="Harley"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand4.png'); ?>" alt="Canon"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand5.png'); ?>" alt="Canon"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand6.png'); ?>" alt="Canon"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand7.png'); ?>" alt="Canon"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand8.png'); ?>" alt="Canon"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand9.png'); ?>" alt="Canon"
                        class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img
                        src="<?php echo base_url('public/image/brand/brand5.png'); ?>" alt="Canon"
                        class="img-responsive" /></a> </div>
        </div>
    </div>



<!--- Modal Transction History --->
<div class="modal" id="oder_history_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order History Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" id="order_table_history">


                </div>
                
        </div>
    </div>
</div>


    <?php include("element/footer.php"); ?>
</body>

</html>
<!-- Footer block End  -->
<script type='text/javascript'>

function fn_view_order(order_id,invoice_id,user_id) { 
     $("#order_table_history").html('');
    
    
    
    var data = {};
    data['action'] = 'order_list_history';
     data['order_id'] = order_id;
     data['invoice_id'] = invoice_id;
      data['user_id'] = user_id;
    $.ajax({
        type: 'POST',
        url: 'ajaxcall',
        data: data,
        dataType: 'html',
        success: function(data) {
            $('.load_container').hide();
                 $("#order_table_history").html(data);
        },
        error: function(request, error) {
            swal("Something Error", "error");
            $('.load_container').hide();
        }
    });
    
 
    
      $("#oder_history_modal").modal('show');
}

function check(order_id, product_id) {
    var data = {};
    data['action'] = 'order';
    data['order_id'] = order_id;
    data['product_id'] = product_id;
    $.ajax({
        type: "POST",
        url: "ajaxcall",
        data: data,
        beforeSend: function() {

            $("#order_date").addClass("loader")
        },
        success: function(data) {
            $("#order_date").html(data);
            $("#shipment").html(data);
            $("#payment_info").html(data);
            $("#shipping_add").html(data);

            $("#order_date").removeClass("loader");
        }
    });
}
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jQuery.html"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.html"></script>