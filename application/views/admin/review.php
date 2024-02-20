<?php $this->load->view('admin/includes/top_header');


?>
<?php $this->load->view('admin/includes/header');

 	$userdata = $this->common_model->getList('v_vendor',array('vendor_id'=>$_SESSION['vendor_id'],'username'=>$_SESSION['username'],'primary_mobile'=>$_SESSION['primary_mobile']));
$status = $userdata['0']['status'];
$shop_status = $userdata['0']['shop_status'];
$kyc_status = $userdata['0']['kyc_status'];
$acc_status = $userdata['0']['acc_status'];
$term_con = $userdata['0']['term_con'];
if($status == '1' && $status == '2'){
     redirect('users');
}

if(($shop_status == '0') and ($kyc_status == '0') and ($acc_status == '0') and ($term_con == 'Yes') ) { 
    redirect('dashboard');

}else {
     redirect('users');
}
?>
<!-- Page content -->
<h1> Thanks! for registration in Gomores.com, Your account is on In-Review please wait for call our technical member or Login after 1 day while our technical member reiew your account</h1>
</html>