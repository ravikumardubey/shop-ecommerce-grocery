<?php 
$category = $this->common_model->getcategorylist('master_category',array('status'=>'0'));
?>
<nav id="menu" class="navbar main-menu">
    <div class="nav-inner">
        <div class="navbar-header"><span id="category" class="visible-xs"><img
                    src="<?php echo base_url('public/image/logo-2.png'); ?>" /></span>
            <button type="button" class="btn btn-navbar navbar-toggle"><i class="fa fa-bars"></i></button>
        </div>
        <div class="navbar-collapse">
            <ul class="main-navigation">
                <li class="home_first"><a href="<?php echo base_url(); ?>" class="active parent">Home</a> </li>


                <?php if(!empty($category) && is_array($category)) { 
          foreach($category as $val) {
            $sub_category = $this->common_model->getcategorylist('master_sub_category',array('category_id'=>$val['id'],'status'=>'0'));
            
            $node = $val['id'];
          ?>
                <li class="level-top"><a href="<?php echo base_url($val['url']);?>"
                        onClick="showDetails('<?php echo $node;?>');" class="parent"><?php echo $val['name']; ?></a>
                    <?php if(!empty($sub_category) && is_array($sub_category)) {  ?>
                    <ul>
                        <?php  foreach($sub_category as $val_sub) { ?>
                        <li><a
                                href="<?php echo base_url($val['url'].'/'.$val_sub['url']); ?>"><?php echo $val_sub['name']; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </li>
                <?php } } ?>

            </ul>
        </div>
    </div>
</nav>