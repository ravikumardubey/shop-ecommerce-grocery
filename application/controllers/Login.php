<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
   public function __construct()
    {
        parent::__construct();
   }
    public function index()
    {
       $this->load->view('admin/index');
    }

   public function login_users()
    {
       $this->form_validation->set_rules('username', 'Username', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $data = $this->common_model->getUsers(array('username'=>$this->input->post('username'),'password'=>$this->input->post('password')));

          $response = array();
            $this->db->select('vendor_id,status,menu_access,vendor_type,username as user_name, f_name as first_name, email_id as mail_id,primary_mobile as p_mobile');
            $this->db->from('v_vendor');
            $this->db->where('username', $this->input->post('username'),'status',$this->input->post('status'));
            $this->db->where('password',$this->input->post('password'));
            $query = $this->db->get();
            $response = $query->result_array();

           if(!empty($response)) {
                $this->session->set_userdata($response[0]);
               $array_error = array('success' => true, 'message'=>'Successfully Login');
            }else {
               $array_error = array('success' => false, 'message'=>'Username & password are incorrect, please try again. ');
           }
        } else {
            $array_error = array(
              'error' => true,
                'username_error' => form_error('username'),
                'password_error' => form_error('password'),
           );
       }

        echo json_encode($array_error);
       //$dataa = $this->input->post('');
       //  print_r($dataa);
        //$data = $this->Common_model->getUsers();
        //print_r($data);
   }
}
