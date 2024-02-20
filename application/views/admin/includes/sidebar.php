<!-- Main sidebar -->

<?php
//print_r($_SESSION);
$class_name = $this->router->fetch_class();
$method_name = $this->router->fetch_method();
$menu = $this->common_model->fn_getMenuData('0');

$userdata = $this->common_model->getList('v_vendor', array('vendor_id' => $_SESSION['vendor_id'], 'username' => $_SESSION['user_name'], 'primary_mobile' => $_SESSION['p_mobile']));
$status = $userdata['0']['status'];
$shop_status = $userdata['0']['shop_status'];
$kyc_status = $userdata['0']['kyc_status'];
$acc_status = $userdata['0']['acc_status'];
$term_con = $userdata['0']['term_con'];
$userdata = $this->common_model->getList('v_shop_vendor', array('vendor_id' => $_SESSION['vendor_id']));
$vendordata = $this->common_model->getList('v_vendor_kyc', array('vendor_id' => $_SESSION['vendor_id']));
$accdata = $this->common_model->getList('v_account_detail', array('vendor_id' => $_SESSION['vendor_id']));
if ($status == '1' && $status == '2') {
    redirect('users', 'refresh');
    if ($shop_status == '0') {
        $shop_status[0]['status'] == '1';

        redirect('dashboard/vendor_kyc', 'refresh');
    } elseif ($kyc_status == '0') {
        $vendordata[0]['status'] == '1';
        redirect('dashboard/account_kyc', 'refresh');
    } elseif ($acc_status == '0') {
        $accdata[0]['status'] == '1';
        redirect('dashboard/review', 'refresh');
    }
}
?>
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="<?php echo base_url(); ?>public/global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold"><?php echo $this->session->userdata('first_name'); ?>
                        </div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i>
                            &nbsp;<?php echo $this->session->userdata('user_name'); ?>
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"><?php echo $this->session->userdata('user_name'); ?></i>
                </li>


                <?php


                $menu_dadad = json_decode($_SESSION['menu_access'], true);
                if (!empty($menu_dadad) && is_array($menu_dadad)) {

                    foreach ($menu_dadad as $key => $menu_dadad) {

                        $menu_val = $this->common_model->getList('menu', array('status' => '0', 'id' => $key));

                ?>

                        <li class="nav-item ">
                            <a href="" class="nav-link"><i class="icon-<?php echo $menu_val[0]['icon']; ?>"></i> <span>
                                    <?php echo $menu_val[0]['menu_name']; ?></span></a>

                            <?php if (!empty($menu_val) && is_array($menu_val)) { ?>
                                <ul class="nav nav-group-sub" data-submenu-title="Themes">
                                    <?php foreach ($menu_dadad as $submenu_val) {
                                        $submenu_val = $this->common_model->getList('menu', array('status' => '0', 'id' => $submenu_val));
                                    ?>
                                        <li class="nav-item"><a href="<?php echo base_url() . '/' . $submenu_val[0]['url']; ?>" class="nav-link active"><i class="icon-<?php echo $submenu_val[0]['icon'] ?>"></i><?php echo $submenu_val[0]['menu_name']; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                <?php

                    }
                }
                ?>






            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>


<!-- /main sidebar -->