<?php
//defined('BASEPATH') or exit('No direct script access allowed');
//
//class Login extends CI_Controller
//{
//    public function __construct()
//    {
//        parent::__construct();
//    }
//    public function index()
//    {
//        $this->load->view('index');
//    }
//
//    public function login_users()
//    {
//        $this->form_validation->set_rules('username', 'Username', 'required');
//        $this->form_validation->set_rules('password', 'Password', 'required');
//        if ($this->form_validation->run()) {
//            //$data = $this->Common_model->getUsers(array('username'=>$this->input->post('username'),'password'=>$this->input->post('password')));
//
//            $response = array();
//            $this->db->select('username, name, email,mobile');
//            $this->db->from('v_users');
//            $this->db->where('username', $this->input->post('username'));
//            $this->db->where('password',$this->input->post('password'));
//            $query = $this->db->get();
//            $response = $query->result_array();
//           // print_r($response);
//            if(!empty($response)) {
//                $this->session->set_userdata($response[0]);
//                $array_error = array('success' => true);
//            }else {
//                $array_error = array('success' => false, 'message'=>'Username & password are incorrect, please try again. ');
//            }
//        } else {
//            $array_error = array(
//                'error' => true,
//                'username_error' => form_error('username'),
//                'password_error' => form_error('password'),
//            );
//        }
//
//        echo json_encode($array_error);
//        //$dataa = $this->input->post('');
//         print_r($dataa);
//        $data = $this->Common_model->getUsers();
//        //print_r($data);
//    }
//}
