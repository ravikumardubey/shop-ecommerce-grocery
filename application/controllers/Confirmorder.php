<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Confirmorder extends CI_Controller
{
    public function index()
    {
        $data = $this->input->post();
        if ($data['action'] == 'order_confirm') {
         //   print_r($data);
        
            if (!empty($data) && is_array($data)) {
                // $this->form_validation->set_rules('delivery_type', 'delivery_type');
                // $this->form_validation->set_rules('biling_type', 'biling_type');
                // if ($this->form_validation->run()) {
                $data_check = array('user_id' => $_SESSION['session_user_id'], 'session_user_id' => $_SESSION['session_user_id'], 'status' => '0');
                $v_product_cart = $this->common_model->getProductData('v_product_cart', $data_check, 100);
                $this->load->helper('string');
                $order_id = random_string('alnum',12);
                $invoice_id = random_string('alnum',12);
                $total_price = 0;

                $insert_id_biling = '';
                 $ip = $this->input->ip_address();
                  $created_on = date("Y-m-d H:i:s");
                if ($data['biling_type'] == 'new') {
                    $post_data_biling = array('product_id'=>$data['product_id'],'address1' => $data['address_1_biling'], 'address2' => $data['address_2_biling'],  'pincode' => $data['postcode_biling'], 'address_type' => '1','created_by'=>$_SESSION['user_id'],'created_on'=>$created_on,'created_ip'=>$ip,'user_id'=>$_SESSION['user_id']);
                    $this->db->insert('v_users_address', $post_data_biling);
                    $insert_id_biling = $this->db->insert_id();
                }

                $insert_id_delivery = '';
                 $ip = $this->input->ip_address();
                  $created_on = date("Y-m-d H:i:s");
                if ($data['delivery_type'] == 'new') {
                    $post_data_delivery = array('product_id'=>$data['product_id'],'address1' => $data['address_1_delivery'], 'address2' => $data['address_2_delivery'], 'state' => $data['loc_state'],
                        'city' => $data['loc_city'], 'pincode' => $data['postcode_delivery'], 'address_type' => '2','created_by'=>$_SESSION['user_id'],'created_on'=>$created_on,'created_ip'=>$ip,'user_id'=>$_SESSION['user_id']);
                    $this->db->insert('v_users_address', $post_data_delivery);
                    $insert_id_delivery = $this->db->insert_id();
                }
                if (!empty($v_product_cart) && is_array($v_product_cart)) {
                    foreach ($v_product_cart as $val) {
                        $product_data = $this->common_model->getProductData('v_product', array('product_id' => $val['product_id']), '100');
                        $product_data_data = $this->common_model->getProductData('v_product_color_size', array('product_id' => $val['product_id'],'id' => $val['size_id']), '100');
                        $total_amt = $product_data_data[0]['price'] * $val['quantity'];
                        $total_price = $total_amt + $total_price;
                        $order_cart_data = array('order_id' => $order_id,'size_id' => $val['size_id'], 'product_id' => $val['product_id'], 'user_id' => $_SESSION['user_id'], 'quantity' => $val['quantity']);
                        $this->common_model->insertData('v_order', $order_cart_data);
                    }}
                $coupon_code = '';
                $coupon_discount = '';
                $commission = '';
                $biling_id = isset($data['address_id_biling']) ? $data['address_id_biling'] : $insert_id_biling;
                $delivery_id = isset($data['address_id_delivery']) ? $data['address_id_delivery'] :  $insert_id_delivery;
                $order_de = array('order_id' => $order_id, 'invoice_id' => $invoice_id, 'total_price' => $total_price, 'user_id' => $_SESSION['user_id'], 'status' => 'Pending',
                    'order_date' => date('Y-m-d'),
                    'coupon_code' => $coupon_code, 'coupon_discount' => $coupon_discount, 'commission' => $commission, 'biling_type' => $data['biling_type'],
                    'delivery_type' => $data['delivery_type'],
                    'biling_id' => $biling_id, 'delivery_id' => $delivery_id, 'shipping_method' => $data['shipping_method'],
                    'payment_method' => $data['payment_method'],
                );
                $return_res = $this->common_model->insertDataOrder('v_product_order', $order_de);
                if ($return_res) {
                $_SESSION['last_iserted_id'] = $return_res;
            // $mobile_no = $_SESSION['primary_mobile'];
            // $apiKey = 'bqfBa8tTgHI-kTIJjjlgDBeTqsLXDQdjioDxKHM9Jx';
            // $opt_msg = "Hello User, Thanks for shopping with us! Your order $order_id is confirmed and will be shipped shortly. Team Gomores.com.";
            // $send_otp_res = $this->common_model->send_otp($opt_msg, $mobile_no, $apiKey);
                    if (!empty($v_product_cart) && is_array($v_product_cart)) {
                        foreach ($v_product_cart as $val) {
                            $this->db->delete('v_product_cart', array('user_id' => $_SESSION['session_user_id']));
                        }}
                    $array = array('status' => true, 'message' => 'Insert Data Successfully.');
                } else {
                    $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
                }
                // } else {
                //     $validation_errors = validation_errors();
                //     $array = array('status' => false, 'message' => $validation_errors);
                // }
            }
            echo json_encode($array);
        } else   if ($data['action'] == 'payment_stats') {
            echo $last_iser = $_SESSION['last_iserted_id'];
            $where = array('id'=>$last_iser);
            $data_value = array('pay_status'=>'Completed','status'=>'0');
            $return_res = $this->common_model->updateData('v_product_order', $data_value, $where);
                if ($return_res) {
              $array = array('status' => true, 'message' => 'Insert Data Successfully.');
                } else {
                    $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
                }
        }

    }
    
    

}
