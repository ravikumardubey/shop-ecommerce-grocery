
<?php 
$category = $this->common_model->getList('master_category',array('status'=>'0'));
?>
<nav id="menu" class="navbar">
  <div class="nav-inner">
    <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
      <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
    </div>
    <div class="navbar-collapse">
      <ul class="main-navigation">
        <li><a href="<?php echo base_url(); ?>"   class="active parent"  >Home</a> </li>
        <?php if(!empty($category) && is_array($category)) { 
          foreach($category as $val) {
            $sub_category = $this->common_model->getList('master_sub_category',array('category_id'=>$val['id'],'status'=>'0'));
            
            $node = $val['id'];
          ?>
        <li class="level-top"><a href="<?php echo base_url(); ?><?php echo $val['url']; ?>" onClick="showDetails('<?php echo $node;?>');" class="parent"><?php echo $val['name']; ?></a>
        <?php if(!empty($sub_category) && is_array($sub_category)) {  ?>
        <ul>
       <?php  foreach($sub_category as $val_sub) { ?>
            <li><a href="<?php echo base_url(); ?><?php echo $val['url']; ?>/<?php echo $val_sub['url']; ?>"><?php echo $val_sub['name']; ?></a></li>
       <?php } ?>
          </ul>
        <?php } ?>
        </li>
          <?php } } ?>
      
      </ul>
    </div>
  </div>
</nav>


<nav class="mobile-bottom-nav">
    <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
        <div class="mobile-bottom-nav__item-content">
            <a href="<?php echo base_url(); ?>" class="nav__link">
                <i class="fa fa-home" aria-hidden="true"></i>
                HOME
            </a>
        </div>
    </div>
        <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
        <div class="mobile-bottom-nav__item-content">
            <a href="<?php echo base_url(); ?>my_account" class="nav__link">
                <i class="fa fa-user" aria-hidden="true"></i>
                Profile
            </a>
        </div>
    </div>
        <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
        <div class="mobile-bottom-nav__item-content">
            <a href="<?php echo base_url(); ?>contactus" class="nav__link">
                <i class="fa fa-phone" aria-hidden="true"></i>
                Contact Us
            </a>
        </div>
    </div>
        <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
        <div class="mobile-bottom-nav__item-content">
            <a href="<?php echo base_url(); ?>cart" class="nav__link">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
             <!---   <span class="badge" id="cart" ><?php //echo $_Session['cart']?></span> -->
                Cart
            </a>
        </div>
    </div>
</nav>