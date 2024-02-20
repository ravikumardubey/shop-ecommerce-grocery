<!-- Main sidebar -->
<?php
 $class_name = $this->router->fetch_class();
 $method_name = $this->router->fetch_method();
$menu = $this->common_model->fn_getMenuData('0');
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
                        <a href="#"><img src="<?php echo base_url(); ?>public/global_assets/images/placeholders/placeholder.jpg" width="38"
                                height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold"><?php echo $this->session->userdata('name'); ?>
                        </div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i>
                            &nbsp;<?php echo $this->session->userdata('username'); ?>
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
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>

                <?php if (!empty($menu) && is_array($menu)) {
    $class = '';
    foreach ($menu as $menu_val) {
        $url_path = 'javascript:void(0);';
        $url_path_class = 'nav-item-submenu';
        if ($menu_val->url != '') {
            $url_path = $menu_val->url;
            $url_path_class = '';
        }
        //nav-item-expanded nav-item-open
        $sub_menu = $this->common_model->fn_getsubMenuData('1', $menu_val->id);
        ?>
                <li class="nav-item <?php echo $url_path_class; ?> ">
                    <a href="<?php echo $url_path; ?>" class="nav-link"><i
                            class="icon-<?php echo $menu_val->icon ?>"></i> <span>
                            <?php echo $menu_val->menu_name; ?></span></a>
                    <?php if (!empty($sub_menu) && is_array($sub_menu)) {?>
                    <ul class="nav nav-group-sub" data-submenu-title="Themes">
                        <?php foreach ($sub_menu as $submenu_val) {?>
                        <li class="nav-item"><a href="<?php echo $submenu_val->url; ?>"
                                class="nav-link active"><?php echo $submenu_val->menu_name; ?></a>
                        </li>
                        <?php }?>
                    </ul>
                    <?php }?>
                </li>
                <?php }}?>
                <!-- /page kits -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->