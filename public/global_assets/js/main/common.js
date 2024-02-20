

  function fn_plus_cart(pro_id,icon_sign) {
       $(":button").attr("disabled", true);
      var string = pro_id;
      var usingSplit = string.split('-');
     
    if(icon_sign == '2') {
            $('#qty_input'+pro_id).val(parseInt($('#qty_input'+pro_id).val()) + 1 );
    }
    if(icon_sign == '1') {
            $('#qty_input'+pro_id).val(parseInt($('#qty_input'+pro_id).val()) - 1 );
            if ($('#qty_input'+pro_id).val() == 0) {
                $('#qty_input'+pro_id).val(1);
            }
    }
    fn_add_cart_cart(pro_id,'1',usingSplit[0]);
    }


            function fn_plus(pro_id,icon_sign) {
               
    if(icon_sign == '2') {
            $('#qty_input'+pro_id).val(parseInt($('#qty_input'+pro_id).val()) + 1 );
    }
    if(icon_sign == '1') {
            $('#qty_input'+pro_id).val(parseInt($('#qty_input'+pro_id).val()) - 1 );
    
        
            if ($('#qty_input'+pro_id).val() == 0) {
                $('#qty_input'+pro_id).val(1);
            }
        
    }
        
    }
    
    function getCity(val,city_val) {
        var data = {};
            data['action'] = 'loc_model';
            data['loc_state'] = 'state_id='+val;
             data['city_val'] = city_val;
    
        $.ajax({
            type: "POST",
            url: "ajaxcall",
             data: data,
            beforeSend: function() {
                
                $("#loc_city").addClass("loader");
            },
            success: function(data){
             
                $("#loc_city").html(data);
                $("#loccccc_city").html(data);
                $("#loc_city").removeClass("loader");
            }
        });
    }
    
    
    
    function fn_order_cancelled(val) {
        var data = {};
            data['action'] = 'order_cancelled';
            data['order_id'] = val;
    
        $.ajax({
            type: "POST",
            url: "ajaxcall",
             data: data,
            beforeSend: function() {
                
            alert('Are You Sure');
            },
            success: function(data){
             swal("Cancelled!", "Order Successfully Cancelled!", "warning");
                     window.location.reload();
                    
            }
        });
    }
    
    
    
    
    
    function fn_auto_cat() { 
        var data = {};
         data['action'] = 'auto_cart_view';
        $.ajax({
            type: 'POST',
            url: 'ajaxcall',
            data: data,
            dataType: 'json',
            success: function (data) {
                $('.load_container').hide();
                    $("#cart .cart-dropdown-menu").html(data.cart_view);
                      $("#cart #cart_items_id").html(data.cart_item_no);
                      
                      $("#cart-total-app").html(data.cart_item_no);
                      
                      
            },
            error: function (request, error) {
                swal("Something Error", "error");
               // alert("something error");
                $('.load_container').hide();
            }
        });
    }
    
    
    
    function fn_remove_cart(cart_id) {
        var data = {};
        data['action'] = 'delete_record';
        data['t_code'] = '2';
        data['id'] = cart_id;
        $.ajax({
            type: 'POST',
            url: 'ajaxcall',
            data: data,
            dataType: 'json',
            success: function (data) {
                $('.load_container').hide();
                if (data.status == false) {
                    swal("Deleted", data.message, "error");
                 //   alert(data.message);
                    window.location.href=lang;
                } else if (data.status == true) {
                      swal("Deleted", data.message, "error");
                  //      alert(data.message);
                    window.location.href=lang;
                } else {
                    $("#data_json_div").html(data.message);
                }
            },
            error: function (request, error) {
                swal("Something error");
               // alert("something error");
                $('.load_container').hide();
            }
        });
    }
    
    
    function fn_add_cart_cart(product_id,type_status,pro_size) { 
     fn_add_cart_du(product_id,type_status,pro_size);
     var data = {};
            data['action'] = 'cart_view_model';
        $.ajax({
            type: "POST",
            url: "ajaxcall",
             data: data,
            beforeSend: function() {
                $("#loc_city").addClass("loader");
            },
            success: function(data){
                $("#cart_view_chck").html(data);
            }
        });
   
}

 function fn_add_cart_du(product_id,type_status,pro_size) {
        var product_weight = pro_size;
        if(pro_size == '') { 
            var product_weight =  $("#select_by_size").val();
        }
        var data = {};
        data['action'] = 'add_cart';
        var quantity = $("#qty_input"+product_id).val();
        
      //  alert(quantity);
        var product_weight = product_weight;
        var quantity_cart1 = '0';
        if(type_status == '1') { 
             quantity_cart1 = '1';
        }
        var quantity111 = $("#qty_input"+product_id).val();
        if (typeof quantity111 !== "undefined") {
             quantity = quantity111; 
        }
        
    // var string = product_id;
      var usingSplit = product_id.split('-');
      if(usingSplit[1] != '') { 
          var pro_idd = usingSplit[1]; 
      } else { 
           pro_idd = product_id;
      }
      
        data['quantity'] = quantity;
        data['quantity_cart'] = quantity_cart1;
        data['weight_id'] = product_weight;
        data['product_id'] = pro_idd;
        $.ajax({
            type: 'POST',
            url: 'ajaxcall',
            data: data,
            dataType: 'json',
            success: function (data) {
                $('.load_container').hide();
                if (data.status == false) {
                    //swal("Success", data.message, "success");
                   fn_auto_cat();
                    $(":button").attr("disabled", false);
                //   if(quantity_cart1 == '1') { 
                //     window.location.href=lang;
                //   } 
                } else if (data.status == true) {
                     // swal("Success", data.message, "success");
                    fn_auto_cat();
                     $(":button").attr("disabled", false);
                    
                    //   if(quantity_cart1 == '1') { 
                    //     window.location.href=lang;
                    //   } 
                } else {
                    $("#data_json_div").html(data.message);
                }
            },
            error: function (request, error) {
                 swal("Something error");
                $('.load_container').hide();
            }
        });
    }


    function fn_add_cart(product_id,type_status,pro_size) {
        var product_weight = pro_size;
        if(pro_size == '') { 
            var product_weight =  $("#select_by_size").val();
        }
        var data = {};
        data['action'] = 'add_cart';
        var quantity = '1';
        var product_weight = product_weight;
        var quantity_cart1 = '0';
        if(type_status == '1') { 
             quantity_cart1 = '1';
        }
        var quantity111 = $("#qty_input"+product_id).val();
        if (typeof quantity111 !== "undefined") {
             quantity = quantity111; 
        }
        
    // var string = product_id;
      
      
        data['quantity'] = quantity;
        data['quantity_cart'] = quantity_cart1;
        data['weight_id'] = product_weight;
        data['product_id'] = product_id;
        $.ajax({
            type: 'POST',
            url: 'ajaxcall',
            data: data,
            dataType: 'json',
            success: function (data) {
                $('.load_container').hide();
                if (data.status == false) {
                     swal("Success", data.message, "success");
                   fn_auto_cat();
                    $(":button").attr("disabled", false);
                //   if(quantity_cart1 == '1') { 
                //     window.location.href=lang;
                //   } 
                } else if (data.status == true) {
                      swal("Success", data.message, "success");
                    fn_auto_cat();
                     $(":button").attr("disabled", false);
                    
                    //   if(quantity_cart1 == '1') { 
                    //     window.location.href=lang;
                    //   } 
                } else {
                    $("#data_json_div").html(data.message);
                }
            },
            error: function (request, error) {
                 swal("Something error");
                $('.load_container').hide();
            }
        });
    }
    
    
    function fn_product_status(order_id,user_id){
       
        var data = {};
            data['action'] = 'product_order';
            data['user_id'] = user_id;
             data['order_id'] = order_id;
    
         $.ajax({
           
 	      type: "POST",
            url: "../ajaxcall",
             data: data,
          success: function(data){
             $("#html_listingsss_data").html(data);
        }
        });
    
  
    }
    function fn_update_order_status(id,order_status){
             $("#page_form_id #hidden_page_id").val(id);
              $("#page_form_id #order_status").val(order_status);
    }
    
    function fn_status(id, status,t_code) {
        bootbox.confirm({
            title: 'Confirm dialog',
            message: 'Are you sure ?.',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-link'
                }
            },
            callback: function (result) {
                if (result === true) {
                    if (id != '') {
                        var data = {};
                        data['action'] = 'update_status';
                        data['t_code'] = t_code;
                        data['status'] = status;
                        data['id'] = id;
                        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
                        ajax_function_list();
                    }
                }
            }
        });
    }
    function fn_shop_status() {
        bootbox.confirm({
            title: 'Confirm dialog',
            message: 'Are you sure ?.',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-link'
                }
            },
            callback: function (result) {
                if (result === true) {
                    if (id != '') {
                        var data = {};
                        data['action'] = 'update_status';
                        data['t_code'] = t_code;
                        data['shop_status'] = shop_status;
                        data['id'] = id;
                        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
                        ajax_function_list();
                    }
                }
            }
        });
    }
    function fn_kyc_status(id,kyc_status,t_code) {
        bootbox.confirm({
            title: 'Confirm dialog',
            message: 'Are you sure ?.',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-link'
                }
            },
            callback: function (result) {
                if (result === true) {
                    if (id != '') {
                        var data = {};
                        data['action'] = 'update_status';
                        data['t_code'] = t_code;
                     
                       
                          data['kyc_status'] = kyc_status;
                        
                        data['id'] = id;
                        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
                        ajax_function_list();
                    }
                }
            }
        });
    }
    function fn_acc_status(id,acc_status,t_code) {
        bootbox.confirm({
            title: 'Confirm dialog',
            message: 'Are you sure ?.',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-link'
                }
            },
            callback: function (result) {
                if (result === true) {
                    if (id != '') {
                        var data = {};
                        data['action'] = 'update_status';
                        data['t_code'] = t_code;
                     
                           data['acc_status'] = acc_status;
                        data['id'] = id;
                        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
                        ajax_function_list();
                    }
                }
            }
        });
    }
    
    function fn_delete_addd(id, t_code) {
    
                    if (id != '') {
                        var data = {};
                        data['action'] = 'delete_record';
                        data['t_code'] = t_code;
                        data['id'] = id;
                        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
                      swal({
  title: "Poof! Your address has been deleted!",
  icon: "warning",
}); 
                    }
                
 
   location.reload();
        
        
    }
    
    function fn_delete(id, t_code) {
        bootbox.confirm({
            title: 'Confirm dialog',
            message: 'Are you sure want to delete?.',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-link'
                }
            },
            callback: function (result) {
                if (result === true) {
                    if (id != '') {
                        var data = {};
                        data['action'] = 'delete_record';
                        data['t_code'] = t_code;
                        data['id'] = id;
                        fn_ajax('POST', data, 'json', '../ajaxcall', 'message_data');
                        ajax_function_list();
                    }
                }
            }
        });
    }
    
    function table_list(type, url, data_array, dataType, html_div, datatable_id) {
        $.ajax({
            type: type,
            url: url,
            data: data_array,
            dataType: dataType,
            success: function (data) {
                setDataTable(html_div, datatable_id, data);
                $('.load_container').hide();
            },
            error: function (request, error) {
                $('.load_container').hide();
                 swal("something error. please try again");
              //  alert("something error. please try again");
    
            }
        });
    }
    
    function setDataTable(html_div, datatable_id, data) {
        var table = $('#' + datatable_id).DataTable();
        table.clear().draw();
        table.destroy();
        $("#" + html_div).html(data);
        var table = $('#' + datatable_id);
        table.DataTable({
            buttons: {
                dom: {
                    button: {
                        className: 'btn btn-light'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            }
        });
        table.show();
    }
    
    function fn_reset(form_id) {
        $(".alert-danger").hide();
        $(".alert-success").hide();
        $("#" + form_id)[0].reset();
        $("form").validate().resetForm();
        $('.load_container').show();
    }
    
    $("#add_popup").click(function () {
        fn_reset('page_form_id');
        $("#button_add_update").html('<button type="button" onclick="fn_add()" class="btn bg-primary">Submit</button>');
        $("#modal_id").modal('show');
        $('.load_container').hide();
    });
    
    function fn_ajax(method_type, data, data_type, page_name, div_id) {
        $.ajax({
            type: method_type,
            url: page_name,
            data: data,
            dataType: data_type,
            success: function (data) {
                $('.load_container').hide();
                if (data.status == false) {
                    $(".alert-danger").show();
                    $(".alert-danger").html(data.message);
                } else if (data.status == true) {
                    $("#modal_id").modal('hide');
                    $(".alert-success").show();
                    $(".alert-success").html(data.message);
                } else {
                    $("#data_json_div").html(data.message);
                  //  ajax_function_list();
                }
            },
            error: function (request, error) {
                  swal("Something error");
                   //$(".alert-danger").html(error);
                alert("something error");
                $('.load_container').hide();
            }
        });
    }
    
    