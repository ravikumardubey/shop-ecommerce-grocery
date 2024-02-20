<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

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
	   // $this->session->sess_destroy();
	    
	    $this->session->unset_userdata('id');
	    $this->session->unset_userdata('user_id');
	    $this->session->unset_userdata('f_name');
	    $this->session->unset_userdata('l_name');
	    $this->session->unset_userdata('primary_mobile');
	    $this->session->unset_userdata('email_id');
		redirect('login', 'refresh');
	}
}
