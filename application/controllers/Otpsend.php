<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Otpsend extends CI_Controller
{
    public function index()
    {
        $data = $this->input->post();
        if ($data['action'] == 'otp_send') {
            $otp_no = rand(111111, 999999);
            $mobile_no = $data['mobile_no'];
          $apiKey = 'bqfBa8tTgHI-kTIJjjlgDBeTqsLXDQdjioDxKHM9Jx';
            
            $opt_msg = "Hi User, Your OTP is $otp_no. Team Gomores.com";
            $data_check_mobile = $this->common_model->getList('v_mobile_blocked', array('mobile_no' => $mobile_no, 'status' => 'Blocked'));
            if (empty($data_check_mobile)) {
                $data_check = $this->common_model->getList('v_otp', array('mobile_email_no' => $mobile_no, 'email_mobile_type' => 'Mobile', 'status' => 'Pending'));
                if (count($data_check) <= 2) {
                     $send_otp_res = $this->common_model->send_otp($opt_msg, $mobile_no, $apiKey);
                   //  if ($send_otp_res['status'] == 'success')
                   // $sdd= 'success';
                   if ($send_otp_res['status'] == 'success') {
                        $insert_data = array('user_type' => $data['user_type'], 'otp_no' => $otp_no, 'status' => 'Pending', 'mobile_email_no' => $mobile_no, 'email_mobile_type' => 'Mobile');
                        $return_res = $this->common_model->insertData('v_otp', $insert_data);
                        // $return_res = 1;
                        if ($return_res) {
                            $array = array('status' => 'success', 'message' => 'Send OTP in Entered your Mobile No. Please check.');
                        } else {
                            $array = array('status' => 'failure', 'message' => 'Something Wrong. Please try again.');
                        }

                    } else {
                        $array = array('status' => $send_otp_res['status'], 'message' => $send_otp_res['message']);
                    }
                } else {
                    $return_res = $this->common_model->insertData('v_mobile_blocked', array('mobile_no' => $mobile_no, 'status' => 'Blocked'));
                    if ($return_res) {
                        $array = array('status' => 'success', 'message' => 'You Crossed Limit 3 Times. Your Number has been Blocked. Please contact Administrator.');
                    } else {
                        $array = array('status' => 'failure', 'message' => 'Something Wrong. Please try again.');
                    }
                }
            } else {
                $array = array('status' => 'failure', 'message' => 'Your number is blocked. Please contact administaror. ');
            }
            echo json_encode($array);
        } else if ($data['action'] == 'check_otp_send') {
            $where = array('user_type' => $data['user_type'], 'mobile_email_no' => $data['mobile_no'], 'otp_no' => $data['mobile_otp'], 'email_mobile_type' => 'Mobile', 'status' => 'Pending');
            $data_check = $this->common_model->getList('v_otp', $where);
            if (!empty($data_check)) {
                $this->common_model->getList('v_otp', $where);
                $return_res = $this->common_model->updateData('v_otp', array('status' => 'Success'), $where);
                if ($return_res) {
                    $array = array('status' => 'success', 'message' => 'Matched OTP');
                } else {
                    $array = array('status' => 'failure', 'message' => 'Something Wrong. Please try again. OTP');
                }
            } else {
                $array = array('status' => 'failure', 'message' => 'OTP is incorrect. Please try again');
            }
            echo json_encode($array);
        }
    }
}
