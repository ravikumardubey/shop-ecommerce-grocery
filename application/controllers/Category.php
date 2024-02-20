 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('category');
    }

    public function cart()
    {
        $this->load->view('cart');
    }
    public function login()
    {
        $this->load->view('login');
    }
    public function checkout()
    {
        $this->load->view('checkout');
    }
    public function register()
    {
        $this->load->view('register');
    }
    public function forgetpassword()
    {
        $this->load->view('forgetpassword');
    }
    
 public function my_account()
    {
        $this->load->view('my_account');
    }
    
 
     public function contactus()
    {
        $this->load->view('contactus');
    }
    
     public function aboutus()
    {
        $this->load->view('aboutus');
    }
    
     public function offer()
    {
        $this->load->view('offer');
    }
    
     public function our_team()
    {
        $this->load->view('our_team');
    }
     public function termcondition()
    {
        $this->load->view('termcondition');
    }
     public function security()
    {
        $this->load->view('security');
    }
     public function vendorRegistration()
    {
        $this->load->view('vendorRegistration');
    }
      public function helpFaq()
    {
        $this->load->view('helpFaq');
    }
      public function addressbook()
    {
        $this->load->view('addressbook');
    }
      public function orderhistory()
    {
        $this->load->view('orderhistory');
    }
      public function rewardPoint()
    {
        $this->load->view('rewardPoint');
    }
      public function transction()
    {
        $this->load->view('transction');
    }
      public function single_product()
    {
        $this->load->view('single_product');
    }
     public function sidecategory()
    {
        $this->load->view('sidecategory');
    }
      public function cart2()
    {
        $this->load->view('cart2');
    }
     public function profile()
    {
        $this->load->view('profile');
    }
    public function password_change()
    {
        $this->load->view('password_change');
    }
}

