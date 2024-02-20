<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin/dashboard');
	} 
		public function order_list ()
	{
		$this->load->view('admin/order_list');
	}

    public function user_list()
    {
        $this->load->view('admin/user_list');
    }
    
   
		public function cart_list()
	{
		$this->load->view('admin/cart_list');
	}
		public function product_list()
	{
		$this->load->view('admin/product_list');
	}
		public function vendor_list()
	{
		$this->load->view('admin/vendor_list');
	}
	public function vendor_shop_list()
    {
        $this->load->view('admin/vendor_shop_list');

    }
    public function master_category()
    {
        $this->load->view('admin/master_category');

    }
    public function master_sub_category()
    {
        $this->load->view('admin/master_sub_category');

    }
    public function product_order()
    {
        $this->load->view('admin/product_order');

    }
    public function product_image()
    {
        $this->load->view('admin/product_image');

    }
    public function product_review()
    {
        $this->load->view('admin/product_review');

    }
    public function vendor_account_detail()
    {
        $this->load->view('admin/vendor_account_detail');

    }
    public function vendor_menu()
    {
        $this->load->view('admin/vendor_menu');

    }
    public function vendor_otp()
    {
        $this->load->view('admin/vendor_otp');

    }
    public function vendor_product_cart()
    {
        $this->load->view('admin/vendor_product_cart');

    }
    public function vendor_review()
    {
        $this->load->view('admin/vendor_review');

    }
    public function vendor_registration()
    {
        $this->load->view('admin/vendor_registration');

    }
    public function shop_registration()
    {
        $this->load->view('admin/shop_registration');

    }

    public function vendor_kyc()
    {
        $this->load->view('admin/vendor_kyc');

    }
    public function pages()
    {
        $this->load->view('admin/pages');

    }
     public function faq()
    {
        $this->load->view('admin/faq');

    }
     public function complain()
    {
        $this->load->view('admin/complain');

    }
     public function contact()
    {
        $this->load->view('admin/contact');

    }
     public function enquiry()
    {
        $this->load->view('admin/enquiry');

    }
     public function vendor_image()
    {
        $this->load->view('admin/vendor_image');

    }
      public function banner()
    {
        $this->load->view('admin/banner');

    }
    
    public function user_order()
    {
        $this->load->view('admin/user_order');

    }
     public function account_kyc()
    {
        $this->load->view('admin/account_kyc');

    }
     public function review()
    {
        $this->load->view('admin/review');

    }
      public function change_password()
    {
        $this->load->view('admin/change_password');

    }
      public function edit_profile()
    {
        $this->load->view('admin/edit_profile');

    }
   public function party()
    {
        $this->load->view('admin/party');

    }
    public function sale_report()
    {
        $this->load->view('admin/sale_report');

    }
    
}
