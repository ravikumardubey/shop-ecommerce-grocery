<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajaxcall extends CI_Controller
{
    public function index()
    {
        
      

        $data = $this->input->post();
        if ($data['action'] == 'auto_cart_view') {

           $session_user = $_SESSION['__ci_last_regenerate'];
            $data_check = array('user_id'=>$_SESSION['session_user_id'],'session_user_id'=>$_SESSION['session_user_id'],'status'=>'0');
            $v_product_cart = $this->common_model->getProductData('v_product_cart',$data_check,100);

             ?>
             <a href="cart" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button"> <span id="cart-total"> <span>Shopping Cart</span><br>
          <?php echo count($v_product_cart); ?> Items</span></a>
          <ul class="dropdown-menu pull-right cart-dropdown-menu">
            
          
           
          <?php if(!empty($v_product_cart) && is_array($v_product_cart)) { 
              foreach($v_product_cart as $val) {  ?>

<li>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td class="text-center"><a href="#"><img class="img-thumbnail" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" src="public/image/product/7product56x72.jpg"></a></td>
                    <td class="text-left"><a href="#">lorem ippsum dolor dummy</a></td>
                    <td class="text-right">x 1</td>
                  <!--  <td class="text-right">$254.00</td> -->
                    <td class="text-center"><button class="btn btn-danger btn-xs" title="Remove" type="button"><i class="fa fa-times"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </li>

       <?php   }  } ?>
       </ul>
            
          
             <?php 
        
        }elseif($data['action'] == 'loc_model') {
        
       if (!empty($data['loc_state'])) {
          $stateId = $data['loc_state'];
          $loc_city = $this->common_model->getCityByStateId('v_master_city',$stateId);
          
      
   
      }?>
      <option>Select City</option>
      <?php
foreach ($loc_city as $city=>$val) {
   
        ?>
<option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
<?php
}
        
        } elseif ($data['action'] == 'vendor_list') {
            $v_vendor = $this->common_model->getData('v_vendor');
            if (!empty($v_vendor) && is_array($v_vendor)) {
                $i = 1;
                foreach ($v_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                      <td>' . $val->vendor_type . '</td>
                        <td>' . $val->vendor_category_type . '</td>
                    <td>' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '</td>
                    <td>' . $val->email . '</td>
                    <td>' . $val->primary_mobile . '</td>
                    <td>' . $val->v_address . '</td>
                    
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',3)" title="' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',3)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;}}

        }elseif ($data['action'] == 'v_users') {
        $v_shop_vendor = $this->common_model->getData('v_users');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name .  '</td>
                    <td>' . $val->primary_mobile. '</td>
                    <td>' . $val->email_id. '</td>
                    <td>' . $val->dob. '</td>
                    <td>' . $val->r_address. '</td>
                    <td>' . $val->s_address. '</td>
                    <td>' . $val->created_on. '</td>
      
                    <td>' . $val->modified_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',1)" title="' . $val->v_shop_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',1)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'vendor_shop_list') {
        $v_shop_vendor = $this->common_model->getData('v_shop_vendor');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->v_shop_name. '</td>
                    <td>' . $val->v_shop_address. '</td>
                    <td>' . $val->v_shop_state. '</td>
                    <td>' . $val->v_shop_city. '</td>
                    <td>' . $val->v_shop_pincode. '</td>
                    <td>' . $val->v_shop_area. '</td>
                    <td>' . $val->shop_id. '</td>
      
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',1)" title="' . $val->v_shop_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',1)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    } elseif ($data['action'] == 'master_category') {
$v_shop_vendor = $this->common_model->getData('v_master_category');
if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
$i = 1;
foreach ($v_shop_vendor as $val) {
$class = 'badge-danger';
$status_name = 'In-active';
if ($val->status == '0') {
$class = 'badge-success';
$status_name = 'Active';
}

echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->name. '</td>
                    <td>' . $val->url. '</td>
                     <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                 
                    
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',10)" title="' . $val->name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',10)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

$i++;
}
}


} elseif ($data['action'] == 'master_sub_category') {
        $v_shop_vendor = $this->common_model->getData('v_master_sub_category');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->category_id. '</td>
                    <td>' . $val->name. '</td>
                    <td>' . $val->url. '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',11)" title="' . $val->name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',11)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'v_product') {
        $v_shop_vendor = $this->common_model->getData('v_product');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->short_name. '</td>
                    <td>' . $val->price. '</td>
                    <td>' . $val->discount. '</td>
                    
                    <td>' . $val->left_quantity. '</td>
                    <td>' . $val->total_quantity. '</td>
                    <td>' . $val->brand_name. '</td>
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',4)" title="' . $val->short_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',4)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'v_product_order_id') {
        $v_shop_vendor = $this->common_model->getData('v_product_order_id');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->order_id. '</td>
                    <td>' . $val->invoice_id. '</td>
                    <td>' . $val->total_quantity. '</td>
                    <td>' . $val->total_price. '</td>
                    <td>' . $val->comment. '</td>
                    <td>' . $val->order_date. '</td>
                    <td>' . $val->products_unit_price. '</td>
      
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',6)" title="' . $val->order_id . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',6)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'v_product_image') {
        $v_shop_vendor = $this->common_model->getData('v_product_image');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                      <td>' . $val->product_id. '</td>
                    <td>' . $val->image. '</td>
                 
      
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_ip . '</td>
                     <td>' . $val->created_by . '</td>
                      <td>' . $val->modified_by . '</td>
                       <td>' . $val->modified_on . '</td>
                        <td>' . $val->modified_ip . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',5)" title="' . $val->image . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',5)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'product_review') {
        $v_shop_vendor = $this->common_model->getData('v_product_review');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->product_id. '</td>
                    <td>' . $val->user_id. '</td>
                   
                    <td>' . $val->review_star. '</td>
                    <td>' . $val->comment. '</td>
                
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_ip . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',7)" title="' . $val->product_id . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',7)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'v_account_detail') {
        $v_shop_vendor = $this->common_model->getData('v_account_detail');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                      <td>' . $val->vendor_unique_id. '</td>
                    <td>' . $val->bank_name. '</td>
                    <td>' . $val->account_no. '</td>
                    <td>' . $val->ifsc. '</td>
                    <td>' . $val->account_holder_name. '</td>
                    <td>' . $val->account_type. '</td>
                    <td>' . $val->branch_address. '</td>
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',9)" title="' . $val->bank_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',9)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'v_menu') {
        $v_shop_vendor = $this->common_model->getData('v_menu');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->menu_name. '</td>
                    <td>' . $val->url. '</td>
                    <td>' . $val->parent_url. '</td>
                   
                    <td>' . $val->parent_id. '</td>
                    <td>' . $val->parent. '</td>
                    <td>' . $val->icon. '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',12)" title="' . $val->menu_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',12)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'v_otp') {
        $v_shop_vendor = $this->common_model->getData('v_otp');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->user_vendor_id. '</td>
                    <td>' . $val->user_type. '</td>
                    <td>' . $val->otp_no. '</td>
                  
                    <td>' . $val->mobile_email_no. '</td>
                    <td>' . $val->email_mobile_type. '</td>
                
      
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',13)" title="' . $val->user_type . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',13)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'v_product_cart') {
        $v_shop_vendor = $this->common_model->getData('v_product_cart');
        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->product_id. '</td>
                    <td>' . $val->user_id. '</td>
                    <td>' . $val->session_user_id. '</td>
                    <td>' . $val->quantity. '</td>
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->modified_on . '</td>
                    <td>' . $val->modified_by . '</td>
                     <td>' . $val->modified_ip . '</td>
                    <td>' . $val->created_by . '</td>
                   
                     
                    
                    
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',2)" title="' . $val->product_id . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',2)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }elseif ($data['action'] == 'vendor_review') {
        $v_shop_vendor = $this->common_model->getData('vendor_review');

        if (!empty($v_shop_vendor) && is_array($v_shop_vendor)) {
            $i = 1;
            foreach ($v_shop_vendor as $val) {
                $class = 'badge-danger';
                $status_name = 'In-active';
                if ($val->status == '0') {
                    $class = 'badge-success';
                    $status_name = 'Active';
                }

                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->product_id. '</td>
                    <td>' . $val->user_id. '</td>
                    <td>' . $val->vendor_id. '</td>
                    <td>' . $val->review_star. '</td>
                    <td>' . $val->comment. '</td>
      
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_ip . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',8)" title="' . $val->v_shop_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',8)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                $i++;
            }
        }


    }





    else if ($data['action'] == 'order_list') {
            $v_vendor = $this->common_model->getData('v_order');
            if (!empty($v_vendor) && is_array($v_vendor)) {
                $i = 1;
                foreach ($v_vendor as $val) {
                    $class = 'badge-danger';
                    $status_name = 'In-active';
                    if ($val->status == '0') {
                        $class = 'badge-success';
                        $status_name = 'Active';
                    }

                    echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '</td>
                    <td>' . $val->created_on . '</td>
                    <td>' . $val->created_by . '</td>
                    <td> <a href="javascript:void(0);" onclick="fn_status(' . $val->id . ',' . $val->status . ',1)" title="' . $val->f_name . ' ' . $val->m_name . ' ' . $val->l_name . '"> <span class="badge ' . $class . '">' . $status_name . '</span> </a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="fn_edit_popup(' . $val->id . ',)"> <i
                                class="icon-pencil mr-6 icon-4x"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0);" onclick="fn_delete(' . $val->id . ',1)"> <i
                                class="icon-box-remove mr-6 icon-4x"></i></a>
                    </td>

                </tr>';

                    $i++;}}

        } else if ($data['action'] == 'insert_data') {
            print_r($data);
             array_shift($data);
            $t_code = $data['t_code'];
             $table_name = $this->fn_switch_case($t_code);
            array_shift($data);
            // Shoe validation condtion
           
           
            ////
            if(!empty($data) && is_array($data)) { 
                foreach($data as $key=>$val_v) { 
                  $this->form_validation->set_rules($key, 'Enter '.$key, 'required');
                }
                
                 $rendom_no =  rand();
                  $new_arr = array();
                 if($t_code=='1') { 
                    $new_arr =  array('vendor_id'=>$rendom_no);
                  } else if($t_code=='3') { 
                      
                $this->form_validation->set_rules('f_name', 'First Name', 'required|min_length[3]|max_length[12]|alpha');
                $this->form_validation->set_rules('l_name', 'Last Name', 'required|min_length[3]|max_length[12]|alpha');
                $this->form_validation->set_rules('primary_mobile', 'Primary Mobile', 'required|numeric|is_unique[users.primary_mobile]|max_length[10]');
                $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[users.email_id]');
                $this->form_validation->set_rules('password', 'Password', 'required');
                         $new_arr =  array('user_id'=>$rendom_no);
                  }
                $data = array_merge($new_arr,$data);
                if ($this->form_validation->run()) {
                $return_res = $this->common_model->insertData($table_name, $data);
                if ($return_res) {
                    $array = array('status' => true, 'message' => 'Insert Data Successfully.');
                } else {
                    $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
                }
            } else {
                $validation_errors = validation_errors();
                $array = array('status' => false, 'message' => $validation_errors);
            }
            }
            
            
            echo json_encode($array);
        } else if ($data['action'] == 'update_status') {
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);
            $status = '1';
            if ($data['status'] == '1') {
                $status = '0';
            }
            $return_res = $this->common_model->updateData($table_name, array('status' => $status), array('id' => $data['id']));
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Update Data Successfully.');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');

            }
            echo json_encode($array);
        } else if ($data['action'] == 'delete_record') {
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);
            
            $upate_case = array('status' => '2');
            if($t_code=='2') { 
                  $upate_case = array('status' => '2','quantity'=>'0');
            }
            $return_res = $this->common_model->updateData($table_name,$upate_case, array('id' => $data['id']));
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Deleted Data Successfully.');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');

            }
            echo json_encode($array);
        } 
        
        else if ($data['action'] == 'login_user') {
        $this->form_validation->set_rules('username', 'Username', 'required|numeric|max_length[10]');
       $this->form_validation->set_rules('password', 'Password', 'required');
       
       
        if ($this->form_validation->run()) {
            $response = array();
            $this->db->select('id, user_id, f_name, l_name, primary_mobile,email_id');
            $this->db->from('v_users');
            $this->db->where('primary_mobile', $data['username']);
            $this->db->where('password',$data['password']);
            $query = $this->db->get();
            $response = $query->result_array();
           if(!empty($response)) {
                $this->session->set_userdata($response[0]);
               $array_error = array('success' => true, 'message'=>'Successfully Login');
            } else {
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
        } else if ($data['action'] == 'data_list') {
            $t_code = $data['t_code'];
            $table_name = $this->fn_switch_case($t_code);
            $return_res = $this->common_model->getList($table_name, array('id' => $data['id']));
            $array = array('status' => 'aaaa', 'message' => json_encode($return_res));
            echo json_encode($array);
        } else if ($data['action'] == 'add_cart') {
            $session_user = $_SESSION['session_user_id'];
            $data_check = array('user_id' => $session_user, 'session_user_id' => $session_user, 'product_id' => $data['product_id']);
            $return_res = $this->common_model->getProductData('v_product_cart', $data_check, 100);
            if (!empty($return_res) && is_array($return_res)) {
                $quantity = $data['quantity'];
                if($data['quantity_cart'] == '0') { 
                    $quantity = $return_res[0]['quantity'] + 1;
                }
                $return_res = $this->common_model->updateData('v_product_cart', array('quantity' => $quantity,'status'=>'0'), $data_check);
            } else {
                $return_res = $this->common_model->insertData('v_product_cart', array('session_user_id' => $session_user, 'user_id' => $session_user, 'quantity' => $data['quantity'], 'product_id' => $data['product_id'],'status'=>'0'));
            }
            if ($return_res) {
                $array = array('status' => true, 'message' => 'Add Cart Successfully.');
            } else {
                $array = array('status' => false, 'message' => 'Something Wrong. Please try again.');
            }
            echo json_encode($array);
        }
    }

    public function fn_switch_case($t_code)
    {
        switch ($t_code) {
            case 1:
                $table_name = 'v_vendor';
                break;
            case 2:
                $table_name = 'v_product_cart';
                break;
            case 3:
                 $table_name =  "v_users";
                break;
            case 4:
                $table_name =  "v_product";
                break;
            case 5:
                $table_name =  "v_product_image";
                break;
            case 6:
                $table_name =  "v_product_order_id";
                break;
            case 7:
                $table_name =  "product_review";
                break;
            case 8:
                $table_name =  "vendor_review";
                break;
            case 9:
                $table_name =  "v_account_detail";
                break;
            case 10:
                $table_name =  "v_master_category";
                break;
            case 11:
                $table_name =  "v_master_sub_cateogry";
                break;
            case 12:
                $table_name =  "v_menu";
                break;
            case 13:
                $table_name =  "v_otp";
                break;

            default:
                $table_name = '';
                break;
        }
        return $table_name;
    }

}
