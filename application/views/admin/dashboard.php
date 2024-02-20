
<?php

if(isset($_SESSION['vendor_id'])  && $_SESSION['vendor_id'] != '') { 
$this->load->view('admin/includes/top_header'); 


	$userdata = $this->common_model->getList('v_vendor',array('vendor_id'=>$_SESSION['vendor_id'],'username'=>$_SESSION['user_name'],'primary_mobile'=>$_SESSION['p_mobile']));
 	$status = $userdata['0']['status'];
$shop_status = $userdata['0']['shop_status'];
$kyc_status = $userdata['0']['kyc_status'];
$acc_status = $userdata['0']['acc_status'];
$term_con = $userdata['0']['term_con'];
 $userdata = $this->common_model->getList('v_shop_vendor',array('vendor_id'=>$_SESSION['vendor_id']));
 $vendordata = $this->common_model->getList('v_vendor_kyc',array('vendor_id'=>$_SESSION['vendor_id']));
  $accdata = $this->common_model->getList('v_account_detail',array('vendor_id'=>$_SESSION['vendor_id']));
if($status == '1' && $status == '2') { 
     redirect('users', 'refresh');
     if($shop_status == '0'){
$shop_status[0]['status']=='1';
 
      redirect('dashboard/vendor_kyc', 'refresh');

  }elseif($kyc_status == '0'){
      $vendordata[0]['status']=='1';
       redirect('dashboard/account_kyc', 'refresh');
  }elseif($acc_status == '0'){
      $accdata[0]['status']=='1';
       redirect('dashboard/review', 'refresh');
  }   
  

 } 

?>


<?php $this->load->view('admin/includes/header'); ?>


	<!-- Page content -->
	<div class="page-content">

		
	<?php $this->load->view('admin/includes/sidebar'); ?>

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Dashboard</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

			


				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-12">

					

<?php
$v_users_data = $this->common_model->getProductData('v_users', array('status'=>'0'), '50'); 

 ?>
						<!-- Quick stats boxes -->
						<div class="row">
							<div class="col-lg-4">

								<!-- Members online -->
								<div class="card bg-teal-400">
									<div class="card-body">
										<div class="d-flex" >
										    <?php
if (!empty($v_users_data) && is_array($v_users_data)) {
$counter = 0;
    foreach ($v_users_data as $val => $key) { 
    $counter++;
  
   }
   
   $total_count=$counter;
} 
   ?>
 
      
 
  
   
											<h3 class="font-weight-semibold mb-0"  id="total_user"><?php echo $total_count; ?></h3>
										<div class="list-icons ml-auto">
						                		<a class="list-icons-item" data-action="reload" onclick="reload('total_user')"></a>
						                	</div>
											<span class="badge bg-teal-800 badge-pill align-self-center ml-auto"></span>
					                	</div>
					                	
					             	<div>
									Total Users
											<div class="font-size-sm opacity-75"></div>
										</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-4">
<?php
$v_order_data = $this->common_model->getProductData('v_product_order', array('status'=>''), '50'); 

 ?>
								<!-- Current server load -->
								<div class="card bg-pink-400">
									<div class="card-body">
										<div class="d-flex">
										    	    <?php
if (!empty($v_order_data) && is_array($v_order_data)) {
$counter = 0;

    foreach ($v_order_data as $val) { 
 
        $items[] = $val['order_id'];
      
    $counter++;
  
   }

   $total_order=$counter;

} 
   ?>
										    
											<h3 class="font-weight-semibold mb-0" id="total_order"><?php echo $total_order?></h3>
											<div class="list-icons ml-auto">
						                		<a class="list-icons-item" data-action="reload" onclick="reload('total_order')"></a>
						                	</div>
										<!--	<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
											<!---		<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
														<a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
														<a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
														<a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
													</div> -->
						                	<!--	</div>
					                		</div> -->
					                	</div>
					                	
					                	<div>
										Total Orders
											<div class="font-size-sm opacity-75"></div>
										</div>
									</div>

									<div id="server-load"></div>
								</div>
								<!-- /current server load -->

							</div>

							<div class="col-lg-4">
<?php
$v_order_data = $this->common_model->getProductData('v_product_order', array('status'=>''), '50'); 

 ?>
								<!-- Today's revenue -->
								<div class="card bg-blue-400">
									<div class="card-body">
										<div class="d-flex">
										      <?php
if (!empty($v_order_data) && is_array($v_order_data)) {

$items=array();
    foreach ($v_order_data as $val) { 
        $items[] = $val['total_price'];
     
   }
   
   $total_amont=array_sum($items);


} 
   ?>
											<h3 class="font-weight-semibold mb-0" id="total_sale"><?php echo '&#x20b9;'. $total_amont ?></h3>
											<div class="list-icons ml-auto">
						                		<a class="list-icons-item" data-action="reload" onclick="reload('total_sale')"></a>
						                	</div>
					                	</div>
					                	
					                	<div>
										Total Sale
											<div class="font-size-sm opacity-75"></div>
										</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>
							
								<div class="col-lg-4">
<?php
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
//$date = '2021-11-02';
$v_current_user = $this->common_model->getProductData('v_users', array('status'=>'0'), '50'); 


 ?>
								<!-- Today's revenue -->
								<div class="card bg-blue-400">
									<div class="card-body">
										<div class="d-flex">
										      <?php
if (!empty($v_current_user) && is_array($v_current_user)) {

$counter = 0;
    foreach ($v_current_user as $val) {
        $dt = new DateTime($val['created_on']);
$sss = $dt->format('Y-m-d');
        if(isset($sss)&&($date == $sss) ){
            $counter++;
        }
     
   }
   
   $current_user=$counter;


} 
   ?>
											<h3 class="font-weight-semibold mb-0" id="today_user"><?php echo $current_user ?></h3>
											<div class="list-icons ml-auto">
						                		<a class="list-icons-item" data-action="reload" onclick="reload('today_user')"></a>
						                	</div>
					                	</div>
					                	
					                	<div>
										Today Users
											<div class="font-size-sm opacity-75"></div>
										</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>
							
								<div class="col-lg-4">
<?php
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
//$date = '2021-11-28';
$v_current_user = $this->common_model->getProductData('v_product_order', array('pay_status'=>'Completed','status'=>'0'), '50'); 


 ?>
								<!-- Today's revenue -->
								<div class="card bg-blue-400">
									<div class="card-body">
										<div class="d-flex">
										      <?php
if (!empty($v_current_user) && is_array($v_current_user)) {

$counter = 0;
    foreach ($v_current_user as $val) {
        $dt = new DateTime($val['order_date']);
$sss = $dt->format('Y-m-d');
        if(isset($sss)&&($date == $sss) ){
            $counter++;
        }
     
   }
   
   $current_user=$counter;


} 
   ?>
											<h3 class="font-weight-semibold mb-0" id="today_order"><?php echo $current_user ?></h3>
											<div class="list-icons ml-auto">
						                		<a class="list-icons-item" data-action="reload" onclick="reload('today_order')"></a>
						                	</div>
					                	</div>
					                	
					                	<div>
										Today Orders
											<div class="font-size-sm opacity-75"></div>
										</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>
							
								<div class="col-lg-4">
<?php
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
//$date = '2021-11-27';
$v_order_data = $this->common_model->getProductData('v_product_order', array('status'=>''), '50'); 

 ?>
								<!-- Today's revenue -->
								<div class="card bg-blue-400">
									<div class="card-body">
										<div class="d-flex">
										      <?php
if (!empty($v_order_data) && is_array($v_order_data)) {

$items=array();
    foreach ($v_order_data as $val) { 
        
        $dt = new DateTime($val['order_date']);
$sss = $dt->format('Y-m-d');
        if(isset($sss)&&($date == $sss) ){
            
             $items[] = $val['total_price'];
          
        }
        
       
     
   }
   
   $today_amont=array_sum($items);


} 
   ?>
											<h3 class="font-weight-semibold mb-0" id="today_sale"><?php echo '&#x20b9;'. $today_amont ?></h3>
											<div class="list-icons ml-auto">
						                		<a class="list-icons-item" data-action="reload" onclick="reload('today_sale')"></a>
						                	</div>
					                	</div>
					                	
					                	<div>
										Today Sale
											<div class="font-size-sm opacity-75"></div>
										</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>
							
						</div>
						<!-- /quick stats boxes -->


					</div>

					
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->


		
<?php $this->load->view('admin/includes/footer'); ?>

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
<script>
    function reload(id){
    $('#'+id).load(location.href + " #"+id);
    }
</script>

<?php } else { 
	redirect('users', 'refresh');
}?>
