<?php $this->load->view('admin/includes/top_header');?>
	
<?php ?>

<?php $this->load->view('admin/includes/header');
?>
<!-- Page content -->
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-6">
    <div class="card">
    <div class="card-body">
        <legend class="text-uppercase font-size-sm font-weight-bold">Vendor Information</legend>
                        <div class="alert alert-danger" style="margin: 0px 30px 0px 30px; display:none;">

                        </div>

                        <form id="page_form_id" name="page_form_id" action="post">


                                <div class="form-group">
                                    <div class="row">
                                        <!----SECTION - 1 ---->

                                        <div class="col-sm-6">
                                            <label class="d-block">Vendor Type</label>
                                            <select class="form-control select-fixed-single" id="vendor_type" name="vendor_type" data-fouc>
                                                <optgroup label="Select Vendor Type">
                                                    <option value="0" >Select Vendor Type</option>
                                                    <option value="vendor">Vendor</option>
                                                    <option value="vendor_emp">Vendor Emp</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Vendor Category Type</label>
                                                <select multiple="multiple" class="form-control select" data-fouc>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="0" disabled>Select Vendor Category Type</option>
                                                        <option value="top">Top</option>
                                                        <option value="special">Specials</option>
                                                        <option value="recommended">Recommended</option>
                                                    </optgroup>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="col-sm-6">
                                            <label>Username</label>
                                            <input type="text" placeholder="Enter User Name"
                                                   class="form-control required" id="username" name="username">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" placeholder="Enter First Name"
                                                   class="form-control required" id="f_name" name="f_name">
                                        </div>

                            

                                        <div class="col-sm-6">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Enter last Name"
                                                   class="form-control required" id="l_name" name="l_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Email</label>
                                            <input type="text" placeholder="Enter Email"
                                                   class="form-control required" id="email" name="email" >
                                        </div>
                                        
<!--                                        <div class="col-sm-6">-->
<!--                                            <div class="card-header header-elements-inline">-->
<!--                                                <div class="header-elements">-->
<!--                                                    <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm">-->
<!--                                                        <label class="form-check-label">-->
<!--                                                            <input type="checkbox" class="form-input-switchery" checked data-fouc>-->
<!--                                                            Email Status-->
<!--                                                        </label>-->
<!--                                                    </div>-->
<!---->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->


                                        <div class="col-sm-6">
                                            <label>Primary Mobile Number</label>
                                            <input type="text" placeholder="Enter Primary Mobile Number"
                                                   class="form-control required" id="primary_mobile" name="primary_mobile" >
                                        </div>

                                        <div class="col-sm-6" id="mobile_otp">
                                            <label>Mobile OTP</label>
                                            <input type="text" placeholder="Enter OTP"
                                                   class="form-control required" id="mobile_otp" name="mobile_otp">
                                        </div>
<!--                                        <div class="col-sm-6">-->
<!--                                            <div class="card-header header-elements-inline">-->
<!--                                                <div class="header-elements">-->
<!--                                                    <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm">-->
<!--                                                        <label class="form-check-label">-->
<!--                                                            <input type="checkbox" class="form-input-switchery" checked data-fouc>-->
<!--                                                            Mobile Status-->
<!--                                                        </label>-->
<!--                                                    </div>-->
<!---->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="col-sm-6">
                                            <label>Password</label>
                                            <input type="text" placeholder="Enter Password"
                                                   class="form-control required" id="psw" name="psw">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Alternate Mobile Number</label>
                                            <input type="text" placeholder="Enter Alternate Mobile Number"
                                                   class="form-control required" id="alt_mobile" name="alt_mobile">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3 mb-md-2">
                                                <label class="d-block font-weight-semibold">Gender</label>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="gender" value="male" checked data-fouc>
                                                        Male
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="gender" value="female" data-fouc>
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="gender" value="other" data-fouc>
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <label>Address</label>
                                            <input type="text" placeholder="Enter Vendor Address"
                                                   class="form-control required" id="v_address" name="v_address">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">State</label>
                                            <select class="form-control select-fixed-single" id="state" name="state" data-fouc>
                                                <optgroup label="Select State">
                                                    <option value="0">Select State</option>
                                                    <option value="1">Haryana</option>
                                                    <option value="2">Delhi</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">City</label>
                                            <select class="form-control select-fixed-single" id="city" name="city" data-fouc>
                                                <optgroup label="Select City">
                                                    <option value="0">Select City</option>
                                                    <option value="1">Delhi</option>
                                                    <option value="2">Faridabad</option>
                                                    <option value="3">Ballabhgarh</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Pincode</label>
                                            <input type="text" placeholder="Enter Pincode"
                                                   class="form-control required" id="pincode" name="pincode">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="d-block">Area</label>
                                            <select class="form-control select-fixed-single" id="area" name="area" data-fouc>
                                                <optgroup label="Select Area">
                                                    <option value="0">Select Area</option>
                                                    <option value="1">Sector-89</option>
                                                    <option value="2">Sector-91</option>
                                                    <option value="2">Bhopani</option>
                                                </optgroup>
                                            </select>
                                        </div>




                                    </div>
                                </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                    <i class="icon-paperplane ml-2">

                                    </i>
                                </button>
                            </div>

                        </form>
                    </div>
    </div>
</div>

    </div>
</div>
<!----e content -->


        <?php $this->load->view('admin/includes/footer');?>

        <div id="data_json_div" style="display:none;"></div>

  <!----e content -->


<script src="../public/global_assets/js/main/common.js"></script>
</body>

</html>