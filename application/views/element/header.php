
<header>
    <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="top-left pull-left custome">
            <div class="language">
              <form action="#" method="post" enctype="multipart/form-data" id="language">
                <div class="btn-group">
                  <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> English <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    
                    <li><a href="#"> English</a></li>
                    
                  </ul>
                </div>
              </form>
            </div>
            <div class="currency">
              <form action="#" method="post" enctype="multipart/form-data" id="currency">
                <div class="btn-group">
                  <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"> <strong>Rupees</strong> <span class="caret"></span> </button>
                  <ul class="dropdown-menu">
                    
                    <li><a href="#">Rupees</a></li>
                    
                  </ul>
                </div>
              </form>
            </div>
            <div class="wel-come-msg"> Welcome to our online store! </div>
          </div>
          <div class="top-right pull-right">
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">
                <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span>My Account</span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">



                    <?php if(isset($_SESSION['id']) && $_SESSION['id'] != '' && isset($_SESSION['user_id']) &&  $_SESSION['user_id'] != '' && isset($_SESSION['email_id']) && $_SESSION['email_id'] != '' && isset($_SESSION['primary_mobile']) && $_SESSION['primary_mobile'] != '') { ?>
                          <li><a href="<?php echo base_url('password_change'); ?>">Change Password</a></li>
                          <li><a href="<?php echo base_url('profile'); ?>"><?php echo $_SESSION['f_name'].'&nbsp;'. $_SESSION['l_name']; ?></a></li>
                          <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                      <?php } else {  ?>
                      
                    <li><a href="<?php echo base_url('register'); ?>">Register</a></li>
                    <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
                    <?php } ?>


                  </ul>
                </li>
                <li data-toggle="modal" data-target="#notification"><a href="#" id="wishlist-total" title="Notification" ><i class="fa fa-bell" aria-hidden="true"  ></i><span data-toggle="modal" data-target="#notification">Notification</span><span> (0)</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="header-inner">
      <div class="col-sm-3 col-xs-3 header-left">
        <div id="logo"> <a href="<?php echo base_url();?>"><img src="<?php echo base_url('public/image/logo.png'); ?>" title="E-Commerce" alt="E-Commerce" class="img-responsive" /></a> </div>
      </div>
      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <div id="search" class="input-group">
            <form action="<?php echo base_url('category'); ?>" method="get">
                <input type="text" name="search" value="" placeholder="Search for products or shop" class="form-control input-lg" />
          <span class="input-group-btn">
          <button type="submit" class="btn btn-default btn-lg"><span>Search</span></button>
            </form>
          
          </span> </div>
         
          <?php 
           $session_user = $_SESSION['__ci_last_regenerate'];

           $session_user_id = isset($_SESSION['session_user_id']) ? $_SESSION['session_user_id'] : '';
           $data_check = array('user_id' => $session_user_id, 'session_user_id' => $session_user_id, 'status' => '0');
           $v_product_cart = $this->common_model->getProductData('v_product_cart', $data_check, 100);
          ?>
        <div id="cart" class="btn-group btn-block">
        <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button"> <span id="cart-total"> <span>Shopping Cart</span><br> <span id="cart_items_id"> <?php  echo count($v_product_cart); ?> Item(s) </span></span></button>
          <ul class="dropdown-menu pull-right cart-dropdown-menu">

        </ul>
        </div>
      </div>
    </div>
  </div>
</header>


