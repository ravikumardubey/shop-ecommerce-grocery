
<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="top-left pull-left">
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
            <div class="wel-come-msg"> Welcome to Gomores.com! </div>
          </div>
          <div class="top-right pull-right">
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">
                <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span>My Account</span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                      <?php if(isset($_SESSION['id']) && $_SESSION['id'] != '' && isset($_SESSION['user_id']) &&  $_SESSION['user_id'] != '' && isset($_SESSION['email_id']) && $_SESSION['email_id'] != '' && isset($_SESSION['primary_mobile']) && $_SESSION['primary_mobile'] != '') { ?>
                        <li><a href="<?php echo base_url('profile'); ?>"><?php echo $_SESSION['f_name']. $_SESSION['l_name']; ?></a></li>
                          <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                      <?php } else {  ?>
                    <li><a href="<?php echo base_url('register'); ?>">Register</a></li>
                    <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
                    <?php } ?>
                  </ul>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container top__header">
    <div class="header-inner">
      <div class="col-sm-3 col-xs-3 header-left">
        <div id="logo"> <a href="<?php echo base_url();  ?>"><img src="<?php echo base_url(); ?>public/image/logo2.png" title="E-Commerce" alt="E-Commerce" class="img-responsive" /></a> </div>
      </div>
      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <input type="text" id="search_bar" name="search" value="" placeholder="Enter your keyword ..." class="form-control input-lg" />
          <span class="input-group-btn">
          <button type="button" class="btn btn-default btn-lg"><span>Search</span></button>
          </span> </div>
        <div id="cart" class="btn-group btn-block">
          
        </div>
      </div>
    </div>
  </div>

<style>
    .header-right:{
       border-top-left-radius: 5px;
       border-bottom-left-radius: 5px;
    }
    
    
</style>



</header>
