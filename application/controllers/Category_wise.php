<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_wise extends CI_Controller 
{
    public function index($category, $sub_category)
    {
        $v_category = $this->common_model->getList('v_master_category', array('url' => $category));
        $v_sub_category = $this->common_model->getList('v_master_sub_category', array('url' => $sub_category));
        
          if(!empty($v_category) && is_array($v_category) && !empty($v_sub_category) && is_array($v_sub_category) ) { 
           $v_category_id = $v_category['0']['id'];
           
           
         $v_sub_category_id = $v_sub_category['0']['id'];
        $where_con = array('status' => '0', 'kyc_status' => '0', 'acc_status' => '0', 'shop_status' => '0');
        $v_vendor = $this->common_model->getList('v_vendor', $where_con);
        $ii = 0;

        $vendor_ids = array();
        if (!empty($v_vendor) && is_array($v_vendor)) {
            $i = 1;
            foreach ($v_vendor as $val) {
                $category_ids_arr = json_decode($val['category_id'], true);
                if (is_array($category_ids_arr) && array_key_exists($v_category_id, $category_ids_arr)) {
                    $valusr_arr = $category_ids_arr[$v_category_id];
                    if (!empty($valusr_arr) && in_array($v_sub_category_id, $valusr_arr)) {
                        $where_shop = array('vendor_id' => $val['vendor_id'], 'status' => '0');
                        $v_shop11 = $this->common_model->getList('v_shop_vendor', $where_shop);
                        if (!empty($v_shop11) && is_array($v_shop11)) {
                            foreach ($v_shop11 as $v_shop) {
                                $vendor_ids[] = $v_shop['vendor_id'];
                            }
                        }
                    }
                }
            }
        }

        $vendor_ids_arr = array_unique($vendor_ids);
        $vendor_ids_arr = array_merge(array('GHRFBD1001'),$vendor_ids_arr);
        $this->db->select('*');
        $this->db->from('v_product');
        $this->db->where('status', '0');
        $this->db->where('category_id', $v_category_id);
        $this->db->where('sub_category_id', $v_sub_category_id);
        $this->db->where_in('vendor_id', $vendor_ids_arr);
       $query = $this->db->get();
     // echo  $this->db->last_query();
        $response = $query->result_array();
        $this->load->view('category_wise', array('category_name'=>$v_category['0']['name'],'sub_category_name'=>$v_sub_category['0']['name'],'product_data' => $response));
          } else { 
            redirect(base_url(),'refresh');
          }
    }
    
    
    public function main_category($category)
    {
      // echo '<pre>';
        
       // echo 'ddddddd'.$category;

        $v_category = $this->common_model->getList('v_master_category', array('url' => $category));
       // print_r($v_category);
        if(!empty($v_category) && is_array($v_category)) { 
            
            
         
          $v_category_id = $v_category['0']['id'];
       
        $where_con = array('status' => '0', 'kyc_status' => '0', 'acc_status' => '0', 'shop_status' => '0');
        $v_vendor = $this->common_model->getList('v_vendor', $where_con);
        
        
     //   print_r($v_vendor);
        $ii = 0;

        $vendor_idss = array();
        if (!empty($v_vendor) && is_array($v_vendor)) {
            $i = 1;
            foreach ($v_vendor as $val) {
                $category_ids_arr = json_decode($val['category_id'], true);
                if (is_array($category_ids_arr)&&array_key_exists($v_category_id, $category_ids_arr)) {
                    $valusr_arr = $category_ids_arr[$v_category_id];
                    if (!empty($valusr_arr)) {
                        $where_shop = array('vendor_id' => $val['vendor_id'], 'status' => '0');
                        $v_shop11 = $this->common_model->getList('v_shop_vendor', $where_shop);
                        if (!empty($v_shop11) && is_array($v_shop11)) {
                            foreach ($v_shop11 as $v_shop) {
                                $vendor_idss[] = $v_shop['vendor_id'];
                            }
                        }
                    }
                }
            }
        }

        $vendor_ids_arrr = array_unique($vendor_idss);
        
       // print_r($vendor_ids_arrr);
       
     //  echo $v_category_id;
      $vendor_ids_arrr = array_merge(array('GHRFBD1001'),$vendor_ids_arrr);
       //print_r($vendor_ids_arrr);
        $this->db->select('*');
        $this->db->from('v_product');
        $this->db->where('status', '0');
        $this->db->where('category_id', $v_category_id);
        $this->db->where_in('vendor_id', $vendor_ids_arrr);
       $query = $this->db->get();
        $response = $query->result_array();
        $this->load->view('category_wise', array('category_name'=>$v_category['0']['name'],'sub_category_name'=>'','product_data' => $response));
        }
        else { 
        redirect(base_url(),'refresh');
            
        }
    }
    
    
    
    
    
}
