   <?php
?>
<div class="mainbanner">
  <div id="main-banner" class="owl-carousel home-slider">
      
      <?php
      $v_banner = $this->common_model->getList('v_banner',array('status' => '0'));
       if(!empty($v_banner) && is_array($v_banner)) {
      foreach($v_banner as $val) {
      ?>
    <div class="item"> <a href="#"><img src="public/image/banners/<?php echo $val['image']; ?>" alt="<?php echo $val['name']; ?>" class="img-responsive" /></a> </div>
    <?php }
    } ?>
  </div>
</div>