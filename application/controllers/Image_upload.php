<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image_upload extends CI_Controller
{
    public function index()
    {
        $data = $this->input->post();
        if ($data['hidden_action'] == 'image_upload') {
            if (!empty($_FILES['product_image']['name'])) {
                $filesCount = count($_FILES['product_image']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['product_image']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['product_image']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['product_image']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['product_image']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['product_image']['size'][$i];
                    $uploadPath = 'public/upload/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('file')) {
                        $fileData = $this->upload->data();
                         $uploadData[$i]['product_id'] = $data['hidden_product_id']; 
                        $uploadData[$i]['image'] = $fileData['file_name'];
                        $uploadData[$i]['created_by'] = $_SESSION['vendor_id'];
                        $uploadData[$i]['created_on'] = date("Y-m-d H:i:s");
                         $uploadData[$i]['created_ip'] =$this->input->ip_address();
                    } else {
                        $errorUploadType .= $_FILES['file']['name'] . ' | ';
                    }
                }
                $errorUploadType = !empty($errorUploadType) ? '<br/>File Type Error: ' . trim($errorUploadType, ' | ') : '';
                if (!empty($uploadData)) {
                    foreach($uploadData as $val_d) { 
                      $this->common_model->insertData('v_product_image', $val_d);
                    }
                    $statusMsg = 'Files uploaded successfully!' ;
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file." . $errorUploadType;
                }
            } else {
                $statusMsg = 'Please select image files to upload.';
            }
            
           // redirect('my_account', 'refresh');
            
            $this->session->set_flashdata('msg', $statusMsg);
            redirect('dashboard/product_list','refresh');
           // echo $statusMsg;
        }else if ($data['hidden_action'] == 'image_upload_kyc') {

        if (!empty($_FILES['aadhar_card_img']['name'])) {
                if($_FILES['aadhar_card_img']['name']){
                $filesCount = count($_FILES['aadhar_card_img']['name']);
             
                 for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['aadhar_card_img']['name'][$i]; 
                    $_FILES['file']['type'] = $_FILES['aadhar_card_img']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['aadhar_card_img']['tmp_name'][$i];  
                    $_FILES['file']['error'] = $_FILES['aadhar_card_img']['error'][$i]; 
                    $_FILES['file']['size'] = $_FILES['aadhar_card_img']['size'][$i];
                    $uploadPath = 'public/upload/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('file')) {
                        $fileData = $this->upload->data();
                        $uploadData[$i]['pages'] = $data['pages']; 
                        $uploadData[$i]['image'] = $fileData['file_name'];
                        $uploadData[$i]['created_by'] = $_SESSION['vendor_id'];
                        $uploadData[$i]['created_on'] = date("Y-m-d H:i:s");
                         $uploadData[$i]['created_ip'] =$this->input->ip_address();
                    } else {
                        $errorUploadType .= $_FILES['file']['name'] . ' | ';
                    }
                }
                $errorUploadType = !empty($errorUploadType) ? '<br/>File Type Error: ' . trim($errorUploadType, ' | ') : '';
                if (!empty($uploadData)) {
                    foreach($uploadData as $val_d) { 
                      $this->common_model->insertData('v_product_image', $val_d);
                    }
                    $statusMsg = 'Files uploaded successfully!' ;
                      redirect('dashboard/vendor_kyc', 'refresh');
                    
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file." . $errorUploadType;
                }
                }
                
                
                
               
            }
        
        }else if($data['hidden_action'] == 'image_data_list') { 
              $data_res =  $this->common_model->getListlist('v_product_image', array('product_id'=>$data['product_id']));
              if(!empty($data_res) && is_array($data_res)) { 
                  $i =1;
                  foreach($data_res as $val) { 
                      
                      $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }
                 
                     echo '<tr>
                          <td> '. $i .'</td>
                          <td> <img style="width:100px;" src="'. base_url().'public/upload/'.$val->image .'" ></td>
                          <td><a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',5)" > <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                          <td><a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',5)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a></td>
                      </tr>';
                      $i++;
                      
                  }
              }
        } else if($data['hidden_action'] == 'size_color_data_list') { 
              $data_res =  $this->common_model->getListlist('v_product_color_size', array('product_id'=>$data['product_id']));
              if(!empty($data_res) && is_array($data_res)) { 
                  $i =1;
                  foreach($data_res as $val) { 
                      
                      $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }
                    $modal_color_size_id = 'modal_color_size_id';
                 
                     echo '<tr>
                          <td> '. $i .'</td>
                          <td> '.$val->total_quantity .' </td>
                          <td> '.$val->total_availability .' </td>
                          <td> '.$val->left_quantity .' </td>
                          <td> '.$val->color .' </td>
                          <td> '.$val->size .'</td>
                          <td> '.$val->MRP_price .' </td>
                          <td> '.$val->price .'</td>
                          
                          
                          <td><a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',15)" > <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                          <td><a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',15)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a></td>
                      </tr>';
                      $i++;
                      
                  }
              }
        }
    }
 
       
      
       
      
    
    
}
