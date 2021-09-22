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
<style type="text/css">.datepicker {
    z-index:99999 !important;
    }

/*    span.select2-selection.select2-selection--single{
        margin-top: 14px;
    }*/


</style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
           <!--  <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Check</li>
        </ol>
    </div>

    <section id="classification_div">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Check Information</h6>
                        <div class="card-body">
                            <div class=" col-md-8 mx-auto">

                                <div class="form-group">
                                    <select class="form-control" id="f_classification">
                                        <option selected value="">-- Select Classification --</option>
                                        <option value="Regular Payment">Regular Payment</option>
                                        <option value="Commission">Distributor Commission</option>
                                        <option value="Advance Payment/Deposit">Advance Payment/Deposit</option>
                                        <option value="Customer Refund">Customer Refund</option>
                                        <option value="Intercompany Fund Transfer">Intercompany Fund Transfer</option>
                                        <option value="Refundable Bond/Deposit">Refundable Bond/Deposit</option>
                                        <option value="Petty Cash Encashment">Petty Cash Encashment</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" id="classification_submit_btn">
                                        Proceed
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tables" id="petty_dates_div">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-4" style="visibility:hidden;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3>Check Information</h3>
                                            <h3>Check Information</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addItemModal2" id="add_item_btn" class="btn btn-primary btnUpdate btnTable " name="update" style="right:20px; position: absolute; top:20px;">
                            <i class="fa fa-plus"></i>
                                Add Row
                            </button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_body_petty">

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-block btn-primary" id="submitpettydates">Proceed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tables" id="details_div">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Check Information</h6>
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <input type="text" name="f_date" id="f_date" readonly="true" class="form-control datepicker-normal datepicker" placeholder="mm/dd/yyyy" value="<?=today_text();?>">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="f_type">
                                                    <option selected value="">-- Select Type --</option>
                                                    <option value="Purchases">Purchases</option>
                                                    <option value="Expenses">Expenses</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <!-- <select id="f_supplier" type="text" class="form-control form-control-success" name="f_supplier">
                                                    <option selected value=""> -- Please Select Supplier -- </option>
                                                    <?php foreach ($suppliers as $supplier) { ?>
                                                        <option value="<?= $supplier['id']?>"><?= $supplier['suppliername']?></option>
                                                    <?php } ?>
                                                </select> -->
                                                <input type="text" class="form-control form-control-sm col-md-12 f_supplier" name="f_supplier" id="f_supplier" placeholder="Supplier" />

                                                <input type="text" class="form-control form-control-sm col-md-12 f_idno" name="f_idno" id="f_idno" placeholder="ID No."  style="display: none"/>
                                                <div class="div_cur" style="display: none; margin-top: 14px">
                                                    <select id="f_currency" type="text" class="form-control form-control-sm col-md-12 select2" name="f_currency" >
                                                        <option value=""> -- Select Currency --</option>
                                                        <?php foreach ($currency as $cur) { ?>
                                                            <option value="<?= $cur['curcode']?>"><?= $cur['curcode']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_reference" id="f_reference" class="form-control" placeholder="Reference">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addItemModal" id="add_item_btn" class="btn btn-primary btnUpdate btnTable " name="update" style="right:10px; position: absolute; top:50px;">
                                Add Row
                            </button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="90">Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>GL Account</th>
                                            <th width="60" hidden>GL ID</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_body">

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <textarea class="form-control" id="f_notes" name="f_notes" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-md-3 row float-right">
                                        <!-- <div class="col-md-3" style="margin-bottom: 20px;"> -->
                                            <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc waves-e
                                            ffect" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled="disabled"><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount" id="total_label">Discount: 0.00</a></button>

                                                 <!--<button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="" ><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i>Total: <p id="total_label"></b></button>-->

                                        <!-- </div> -->
                                        
                                    </div>
                                </div>
                            </div>

                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-block btn-primary float-right mt-10" id="submitcheckbtn" style="    margin-top: 20px;">Save Check</button>
    </section>

     <section class="step3 card">
        <div class="form-group" style="margin-top: 50px;">
            <center><h3>You have successfully created a new Check Information!  <div id="showInfo" style="font-size: 15px;margin-bottom: 50px;"></div><span class="refNospan" style="color:red"></span></h3>
                <a href="<?=base_url('Main_account/check/'.$token);?>" class="btn blue-grey">  Add More Check</a>
                <a href="<?=base_url('Main_account/check_transaction_history/'.$token);?>" class="btn primary-bg"> Proceed to Transaction History</a>
            </center>
        </div>
    </section>  

    <!-- Modal-->
    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Item</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="add_check_entry_form" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Date <span class="" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <input id="ff_date" type="text" readonly="true" class="form-control form-control-success  datepicker" name="ff_date" placeholder="mm/dd/yyyy" value="<?=today_text()?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Description<span class="" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <input id="ff_description" type="text" class="form-control form-control-success" name="ff_description" placeholder="Description">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Amount<span class="" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <input id="ff_amount" type="text" min="0" class="form-control form-control-success allownumericwithdecimal" name="ff_amount" placeholder="0.00">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">GL Account <span class="" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <select id="ff_gl_account" type="text" class="form-control form-control-success select2" name="ff_gl_account" placeholder="GL Account">
                                                        <option value=""> -- Select GL Account --</option>
                                                        <?php foreach ($gl_accounts as $gl_account) { ?>
                                                            <option value="<?= $gl_account['id']?>"><?= $gl_account['description']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                        

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <input type="submit" style="float:right" class="btn btn-primary" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="addItemModal2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Item</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_petty_date_form" method="post">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Date <span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="petty_date" type="text" class="form-control form-control-success datepicker-normal" name="petty_date" placeholder="mm/dd/yyyy" value="<?=today_date()?>">
                                                </div>
                                            </div>
                                        

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <input type="submit" style="float:right" class="btn btn-success" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Item</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="delete_item_form" method="post" action="<?= base_url();?>Main_inventory/delete_item">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record <br>(<bold class="info_desc" id = "info_desc"></bold>) ?</p>
                                    <input type="hidden" class="del_areaId" name="del_item_id" id="del_item_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteAreaBtn">Delete Record</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/account/check.js');?>"></script>

