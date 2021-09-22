<?php 
//071318
//this code is for destroying session and page if they access restricted page

$position_access = $this->session->userdata('get_position_access');
$access_content_nav = $position_access->access_content_nav;
$arr_ = explode(', ', $access_content_nav); //string comma separated to array 
$get_url_content_db = $this->model->get_url_content_db($arr_)->result_array();

$url_content_arr = array();
foreach ($get_url_content_db as $cun) {
    $url_content_arr[] = $cun['cn_url'];
}
$content_url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/';

if (in_array($content_url, $url_content_arr) == false){
    header("location:".base_url('Main/logout'));
}    
//071318
?>
<style>
    .kbw-signature { width: 300px; height: 100px; }
    .datepicker {
        z-index: 10000 !important;
    }
    .error {  
        border-color: rgba(255, 10, 0, 0.8) !important;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(255, 10, 0, 0.6) !important;
        outline: 0 none !important;
    }
</style>
<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
-->
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Customer</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- ramdc -->
                        <div class="card-header d-flex align-items-center">
                            <div class="col-lg-12" style="padding: 0">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group" >
                                            <label class="form-control-label col-form-label-sm">Search Filter</label>
                                            <select class="form-control" name="divsearchfilter" id="divsearchfilter">
                                                <option value="dividno">Search by ID No.</option>
                                                <option value="divname">Search by Name</option>
                                                <option value="divarea">Search by Area</option>
                                                <option value="divcredit">Search by Credit Term</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md col-12">

                                        <div class="form-group dividno" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">ID No.</label>
                                            <input type="text" class="input-sm form-control search-input-text idno allownumericwithoutdecimal" data-column="1" id="idno" placeholder="ID No.." />
                                        </div>

                                        <div class="form-group divname" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">Name</label>
                                            <input type="text" class="input-sm form-control search-input-text nameSearch" data-column="2" id="nameSearch"  placeholder="Name.." />
                                        </div>

                                        <div class="form-group divarea" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">Area</label>
                                            <select type="text" class="form-control form-control-success areaSearch" id="areaSearch" data-column="3" name="areaSearch" >
                                                <option selected value="">Select Area</option>
                                                <?php foreach ($get_area as $area) { ?>
                                                    <option value="<?=$area->id?>"><?=$area->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group divcredit" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">Credit Term</label>
                                            <select type="text" class="form-control form-control-success creditSearch" id="creditSearch" data-column="4" name="creditSearch" >
                                                <option selected value="">Select Credit Term</option>
                                                <?php foreach ($get_creditterm as $credit) { ?>
                                                    <option value="<?=$credit->id?>"><?=$credit->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-lg col-12" style="padding-left: 0">
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-primary searchBtn" id="searchBtn">Search</button>
                                            <span style="margin: 5px;"></span>
                                            <button data-toggle="modal" data-target="#addItemModal" data-backdrop="static" data-keyboard="false" id="add_item_btn" class="btn btn-primary btnUpdate add_new" name="update">Add Customer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ramdc -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">ID</th>
                                            <th>Name</th>
                                            <th width="90">Contact No.</th>
                                            <th width="90">Area</th>
                                            <th width="90">Credit Term</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>

    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Customer / Company</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <form id ="customer_info">
                                    <label class="label-material">Select Personal / Company Information</label>
                                    <select class="form-control col-md-4 mb15" id="select-data-info">
                                        <option value="1">Personal Information</option>
                                        <option value="2">Company Information</option>
                                    </select>

                                    <div class="personal-information-div">
                                        <h4> Personal Information</h4> 
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <label for="cust_fname" class="label-material">First Name <span class="" style="color:red">*</span></label>
                                                <input id="cust_fname" type="text" class="form-control form-control-success req" name="fname" placeholder="First Name" >
                                            </div>
                                            <div class="col-md-3">
                                                <label for="cust_mname" class="label-material active">Middle Name</label> 
                                                <input id="cust_mname" type="text" name="mname" class="form-control form-control-success" placeholder="Middle Name" >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cust_lname" class="label-material active ">Last Name <span class="" style="color:red">*</span></label>
                                                <input id="cust_lname" type="text" name="lname" required="" class="form-control form-control-success req" placeholder="Last Name" >
                                            </div>                                                
                                        </div>
                                        <!-- <br> -->
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <label for="cust_bday" class="label-material active">Birthday</label>
                                                <input id="cust_bday" type="text" name="bday" required="" class="form-control form-control-success datepicker" readOnly = "true">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="cust_gender" class="label-material active">Gender <span class="" style="color:red">*</span></label>
                                                <select id="cust_gender" name="gender" required="" class="form-control form-control-success req">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="company-information-div" style="display: none">
                                        <h4> Company Information</h4>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <label for="cust_companyname" class="label-material active">Company Name <span class="" style="color:red">*</span></label>
                                                <input id="cust_companyname" type="text" name="cust_companyname" required="" class="form-control form-control-success req" placeholder="Acme Corporation">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cust_branch" class="label-material active">Branch </label>
                                                <input id="cust_branch" type="text" name="cust_branch" required="" class="form-control form-control-success req" placeholder="Main Branch">
                                            </div>
                                        </div>
                                    </div>

                                    <h4> General Information</h4>

                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label for="cust_conno" class="label-material active">Contact Number <span class="" style="color:red">*</span></label>
                                            <input id="cust_conno" type="text" name="conno" required="" class="form-control form-control-success req allownumericwithoutdecimal" placeholder="09xxxxxxxxx">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cust_email" class="label-material active">Email Address <span class="" style="color:red">*</span></label>
                                            <input id="cust_email" type="email" name="email_add" required="" class="form-control form-control-success req" placeholder="example@domain.com">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cust_agent" class="label-material active">Agent <span class="" style="color:red">*</span></label>
                                            <select id="cust_agent" type="text" class="form-control form-control-success cust_agent" name="credit" >
                                                <option selected value="">Select Agent</option>
                                                <?php foreach ($get_agent as $agent) { ?>
                                                    <option value="<?=$agent->id?>"><?=$agent->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-md-2">
                                            <label for="cust_SoC" class="label-material active">Start of Contract</label>
                                            <input id="cust_SoC" type="text" name="SoC" required="" class="form-control form-control-success datepicker" readonly="True">
                                        </div>  
                                        <div class="col-md-2">
                                            <label for="cust_EoC" class="label-material active">End of Contract</label>
                                            <input id="cust_EoC" type="text" name="EoC" required="" class="form-control form-control-success datepicker">
                                        </div> -->
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label class="form-control-label">Credit Term <span class="" style="color:red">*</span></label>
                                            <select id="cust_credit_term" type="text" class="form-control form-control-success cust_credit_term" name="credit" >
                                                <option selected value="">Select Credit Term</option>
                                                <?php foreach ($get_creditterm as $credit) { ?>
                                                    <option value="<?=$credit->id?>"><?=$credit->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cust_area" class="label-material active">Area <span class="" style="color:red">*</span></label>
                                            <select id="cust_area" type="text" class="form-control form-control-success cust_area" name="area" >
                                                <option selected value="">Select Area</option>
                                                <?php foreach ($get_area as $area) { ?>
                                                    <option value="<?=$area->id?>"><?=$area->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cust_pricecat" class="label-material active">Price Category <span class="" style="color:red">*</span></label>
                                            <select id="cust_pricecat" type="text" class="form-control form-control-success cust_pricecat" name="pricecat" >
                                                <option selected value="">Select Price Category</option>
                                                <?php foreach ($get_price_cat as $pricecat) { ?>
                                                    <option value="<?=$pricecat->id?>"><?=$pricecat->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label for="account number" class="label-material active">Account Number<span class="" style="color:red">*</span></label>
                                            <input id="accno" type="text" name="accno" required="" class="form-control form-control-success  accno">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="monthly service fee" class="label-material active">Monthly Service Fee</label>
                                            <input id="monthly" type="number" name="monthly" required="" class="form-control form-control-success  monthly">
                                        </div> -->
                                    </div>

                                     <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label for="cust_company_code" class="label-material active">Company Code</label>
                                            <input id="cust_company_code" type="text" name="company_code" required="" class="form-control form-control-success">
                                        </div>
                                    </div>

                                    <h4> Address Information</h4>

                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label for="cust_street" class="label-material active">Building / Street</label>
                                            <input id="cust_street" type="text" name="home_add" required="" class="form-control form-control-success req" placeholder="Builing / Street">
                                        </div>  
                                        <div class="col-md-3">
                                            <label for="ucust_barangay" class="label-material active">Barangay <span class="asterisk"</span></label>
                                            <input id="cust_barangay" type="text" name="cust_barangay" required="" class="form-control form-control-success cust_barangay" placeholder="Barangay">
                                        </div>  
                                        <div class="col-md-3">
                                            <label for="cust_city" class="label-material active">City <span class="asterisk"</span></label>
                                            <input id="cust_city" type="text" name="cust_city" required="" class="form-control form-control-success req" placeholder="City" >
                                        </div>
                                        <div class="col-md-2">
                                            <label for="cust_zip" class="label-material active">Zip Code</label>
                                                <input id="cust_zip" type="text" name="cust_zip" required="" class="form-control form-control-success req allownumericwithoutdecimal" placeholder="Zip Code" >
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row float-right">
                            <button type="button" class="btn btn-primary btn-success saveCustomer" style="float:right;" id="saveCustomer" >Save</button>
                            <button type="button" class="btn blue-grey cancelBtn" style="float:right; margin-right:30px;" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div> <!-- modal footer -->                    
                </div>
            </div>
        </div>
    </div>

    <div id="updateItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Update Customer / Company</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <form id ="customer_update_form">
                                    <label class="label-material">Select Personal / Company Information</label>
                                    <select class="form-control col-md-4 mb15" id="ucust_record_type">
                                        <option value="1">Personal Information</option>
                                        <option value="2">Company Information</option>
                                    </select>

                                    <div class="upersonal-information-div">
                                        <h4> Personal Information</h4> 
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <label for="ucust_fname" class="label-material">First Name <span class="" style="color:red">*</span></label>
                                                <input id="ucust_fname" type="text" class="form-control form-control-success req" name="fname" placeholder="First Name" >
                                                <input type="hidden" id="ucust_idno">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="ucust_mname" class="label-material active">Middle Name</label> 
                                                <input id="ucust_mname" type="text" name="mname" class="form-control form-control-success" placeholder="Middle Name" >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ucust_lname" class="label-material active ">Last Name <span class="" style="color:red">*</span></label>
                                                <input id="ucust_lname" type="text" name="lname" required="" class="form-control form-control-success req" placeholder="Last Name" >
                                            </div>                                                
                                        </div>
                                        <!-- <br> -->
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <label for="ucust_bday" class="label-material active">Birthday</label>
                                                <input id="ucust_bday" type="text" name="bday" required="" class="form-control form-control-success datepicker" readOnly = "true">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="ucust_gender" class="label-material active">Gender <span class="" style="color:red">*</span></label>
                                                <select id="ucust_gender" name="gender" required="" class="form-control form-control-success req">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ucompany-information-div" style="display: none">
                                        <h4> Company Information</h4>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <label for="ucust_companyname" class="label-material active">Company Name <span class="" style="color:red">*</span></label>
                                                <input id="ucust_companyname" type="text" name="cust_companyname" required="" class="form-control form-control-success req" placeholder="Acme Corporation">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ucust_branch" class="label-material active">Branch</label>
                                                <input id="ucust_branch" type="text" name="ucust_branch" required="" class="form-control form-control-success req" placeholder="Main Branch">
                                            </div>
                                        </div>
                                    </div>

                                    <h4> General Information</h4>

                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label for="ucust_conno" class="label-material active">Contact Number <span class="" style="color:red">*</span></label>
                                            <input id="ucust_conno" type="text" name="conno" required="" class="form-control form-control-success req allownumericwithoutdecimal" placeholder="09xxxxxxxxx">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ucust_email" class="label-material active">Email Address <span class="" style="color:red">*</span></label>
                                            <input id="ucust_email" type="email" name="email_add" required="" class="form-control form-control-success req">
                                            <input id="ucust_email_orig" type="email" name="email_add" required="" class="form-control form-control-success req" readonly="true" hidden="true" placeholder="example@domain.com">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ucust_agent" class="label-material active">Agent <span class="" style="color:red">*</span></label>
                                            <select id="ucust_agent" type="text" class="form-control form-control-success ucust_agent" name="credit" >
                                                <option selected value="">Select Agent</option>
                                                <?php foreach ($get_agent as $agent) { ?>
                                                    <option value="<?=$agent->id?>"><?=$agent->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-md-2">
                                            <label for="cust_SoC" class="label-material active">Start of Contract</label>
                                            <input id="cust_SoC" type="text" name="SoC" required="" class="form-control form-control-success datepicker" readonly="True">
                                        </div>  
                                        <div class="col-md-2">
                                            <label for="cust_EoC" class="label-material active">End of Contract</label>
                                            <input id="cust_EoC" type="text" name="EoC" required="" class="form-control form-control-success datepicker">
                                        </div> -->
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label class="form-control-label">Credit Term <span class="" style="color:red">*</span></label>
                                            <select id="ucust_credit_term" type="text" class="form-control form-control-success ucust_credit_term" name="credit" >
                                                <option selected value="">Select Credit Term</option>
                                                <?php foreach ($get_creditterm as $credit) { ?>
                                                    <option value="<?=$credit->id?>"><?=$credit->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ucust_area" class="label-material active">Area <span class="" style="color:red">*</span></label>
                                            <select id="ucust_area" type="text" class="form-control form-control-success ucust_area" name="area" >
                                                <option selected value="">Select Area</option>
                                                <?php foreach ($get_area as $area) { ?>
                                                    <option value="<?=$area->id?>"><?=$area->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ucust_pricecat" class="label-material active">Price Category <span class="" style="color:red">*</span></label>
                                            <select id="ucust_pricecat" type="text" class="form-control form-control-success ucust_pricecat" name="pricecat" >
                                                <option selected value="">Select Price Category</option>
                                                <?php foreach ($get_price_cat as $pricecat) { ?>
                                                    <option value="<?=$pricecat->id?>"><?=$pricecat->description?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label for="account number" class="label-material active">Account Number<span class="" style="color:red">*</span></label>
                                            <input id="accno" type="text" name="accno" required="" class="form-control form-control-success  accno">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="monthly service fee" class="label-material active">Monthly Service Fee</label>
                                            <input id="monthly" type="number" name="monthly" required="" class="form-control form-control-success  monthly">
                                        </div> -->
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label for="ucust_company_code" class="label-material active">Company Code</label>
                                            <input id="ucust_company_code" type="text" name="company_code" required="" class="form-control form-control-success">
                                        </div>
                                    </div>

                                    <h4> Address Information</h4>

                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label for="ucust_street" class="label-material active">Building / Street</label>
                                            <input id="ucust_street" type="text" name="home_add" required="" class="form-control form-control-success req" placeholder="Builing / Street">
                                        </div>  
                                        <div class="col-md-3">
                                            <label for="ucust_barangay" class="label-material active">Barangay <span class="asterisk"</span></label>
                                            <input id="ucust_barangay" type="text" name="ucust_barangay" required="" class="form-control form-control-success cust_barangay" placeholder="Barangay">
                                        </div>  
                                        <div class="col-md-3">
                                            <label for="ucust_city" class="label-material active">City <span class="asterisk"</span></label>
                                            <input id="ucust_city" type="text" name="ucust_city" required="" class="form-control form-control-success req" placeholder="City" >
                                        </div>
                                        <div class="col-md-2">
                                            <label for="ucust_zip" class="label-material active">Zip Code</label>
                                                <input id="ucust_zip" type="text" name="ucust_zip" required="" class="form-control form-control-success req allownumericwithoutdecimal" placeholder="Zip Code" >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row float-right">
                            <button type="button" class="btn btn-primary btn-success updatesaveCustomer" style="float:right;" id="updatesaveCustomer" >Save</button>
                            <button type="button" class="btn blue-grey cancelBtn" style="float:right; margin-right:30px;" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div> <!-- modal footer -->                    
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script src="<?=base_url('assets/js/entity/customer/customer_jv.js');?>"></script>