<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Common_model extends CI_Model
{

    public function fn_getOrderHistory($table_name, $column)
    {
        //   $this->db->select('image','name');
        //     $this->db->from('v_product');
        //     $this->db->JOIN('v_order', 'v_product.'$column' = v_order.product_id', 'left');
        //       $this->db->where('status !=' ,'2');
        //       $response = $query->result_array();
        //   return $query->result();
    }

    public function fn_getMenuDdddata($table_name, $where, $limit)
    {

        $this->db->from('v_master_sub_category');
        $this->db->where('status !=', '2');
        $this->db->where('category_id', $where);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        echo $this->db->last_query();
        return $query->result();
    }

    public function getCityByStateId($table_name, $stateId)
    {

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($stateId);
        //  $this->db->order_by("id", "desc");
        // $this->db->limit($limit);

        $query = $this->db->get();
        //echo  $this->db->last_query();
        $response = $query->result_array();
        return $query->result();
    }
    
     public function getProductdatasss($table_name, $proId)
    {

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($proId);
        $query = $this->db->get();
      //  echo  $this->db->last_query(); die;
        $response = $query->result_array();
        return $query->result();
    }

    public function getCategoryBySub($table_name, $categoryId)
    {

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where('category_id', $categoryId);
        //  $this->db->order_by("id", "desc");
        // $this->db->limit($limit);

        $query = $this->db->get();
        //echo  $this->db->last_query();
        $response = $query->result_array();
        return $query->result();
    }

    public function fn_getMenuData($where)
    {

        $this->db->from('v_menu');
        $this->db->where('status !=', '2');
        $this->db->where('parent', $where);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result();
    }
    
     public function fn_getWeight($product_id)
    {

        $this->db->from('v_product_color_size');
        $this->db->where('status', '0');
        $this->db->where('product_id', $product_id);
        $this->db->order_by("id", "asc");
         $this->db->limit('1');
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result_array();
    }
    

    public function fn_getsubMenuData($where, $id)
    {

        $this->db->from('v_menu');
        $this->db->where('status !=', '2');
        $this->db->where('parent', $where);
        $this->db->where('parent_id', $id);
        $this->db->order_by("id", "asc");
        
        $query = $this->db->get();
        // echo  $this->db->last_query();
        return $query->result();
    }

    public function getProductData($table_name, $where, $limit)
    {
        $this->db->from($table_name);
        $this->db->where($where);
        $this->db->order_by("id", "desc");
        $this->db->limit($limit);

        $query = $this->db->get();
        // echo  $this->db->last_query();
        $response = $query->result_array();
        return $response;
    }
     public function getProductDataWhere_In($table_name,$which, $where, $limit)
    {
        $this->db->from($table_name);
        $this->db->where_in($which,$where);
        $this->db->order_by("id", "desc");
        $this->db->limit($limit);

        $query = $this->db->get();
    // echo  $this->db->last_query();
        $response = $query->result_array();
        return $response;
    }

public function getColor_Size($table_name, $where, $limit)
    {
        $this->db->from($table_name);
        $this->db->where($where);
        $this->db->order_by("id", "asc");
        $this->db->limit($limit);

        $query = $this->db->get();
        // echo  $this->db->last_query();
        $response = $query->result_array();
        return $response;
    }

    public function getData($table_name)
    {
        $this->db->from($table_name);
        $this->db->where('status !=', '2');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getListlist($table_name, $where)
    {
        $response = array();
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($where);
        $this->db->where_not_in('status', '2');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        $response = $query->result();
        return $response;
    }
    
     public function getcategorylist($table_name, $where)
    {
        $response = array();
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($where);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function getImagelist($product_id)
    {
        $product_image = $this->getlist('v_product_image', array('status' => '0', 'product_id' => $product_id));
        //   print_r($product_image);
        if (!empty($product_image) && is_array($product_image)) {
            $image1 = isset($product_image['0']['image']) ? base_url('public/upload/' . $product_image['0']['image']) : base_url('public/image/product/Pro-04-1.jpg');
            $image2 = isset($product_image['1']['image']) ? base_url('public/upload/' . $product_image['0']['image']) : base_url('public/image/product/product2.jpg');
            $data_res = array('image1' => $image1, 'image2' => $image2);
        } else {
            $data_res = array('image1' => base_url('public/image/product/Pro-04-1.jpg'), 'image2' => base_url('public/image/product/product2.jpg'));
        }

        return $data_res;

    }


public function insertDataOrder($table_name, $data)
    {
        $data = array_merge(array('created_by' => 'admin', 'created_on' => date('Y-m-d H:i:s')), $data);
        $return_response = $this->db->insert($table_name, $data);
        return $this->db->insert_id();;
    }

    public function insertData($table_name, $data)
    {
        $data = array_merge(array('created_by' => 'admin', 'created_on' => date('Y-m-d H:i:s')), $data);
        $return_response = $this->db->insert($table_name, $data);
        return $return_response;
    }

    public function updateData($table_name, $data, $where)
    {
        $data = array_merge(array('modified_by' => 'admin', 'modified_on' => date('Y-m-d H:i:s')), $data);
        $return_response = $this->db->update($table_name, $data, $where);
        //  echo $this->db->last_query();
        return $return_response;
    }
    public function getList($table_name, $where)
    {
        $response = array();
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($where);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function getUsers($where)
    {
        $response = array();
        $this->db->select('username, f_name, email_id,primary_mobile');
        $this->db->from('v_vendor');
        $this->db->where('username', $where['username']);
        $this->db->where('password', $where['password']);
        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function send_otp($opt_msg, $mobile_no, $apiKey)
    {
        $apiKey = urlencode($apiKey);
        
         $mobileno = '91' . $mobile_no;
    if(!empty($mobile_no) && is_array($mobile_no)) { 
       // print_r($mobile_no);
       foreach($mobile_no as $val) { 
      $mobile_no1 .= '91'.$val.',';
       }
       $mobileno = rtrim($mobile_no1,',');
    }
    $numbers = array($mobileno);
        
        
        
        $sender = urlencode('GMORES');
        $message = rawurlencode($opt_msg);
        $numbers = implode(',', $numbers);
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $data_return = array();
        if (curl_errno($ch)) {
            $data_return = curl_error($ch);
        } else {
            $res_data = json_decode($response, true);
            if ($res_data['status'] == 'failure') {
                $data_return = array('status' => 'failure', 'message' => $res_data['errors'][0]['message'], 'code' => $res_data['errors'][0]['code']);
            } else {
                $data_return = array('status' => 'success', 'message' => 'Send Opt your Mobile No.', 'code' => '100');
            }
        }
        return $data_return;
        curl_close($ch);
    }

}
