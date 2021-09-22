<style>
    th.dt-center {
        width: 90px !important;
    }

    th.size1 {
        width: 90px !important;
    }

    th.size2 {
        width: 120px !important;
    }

    .card-body{
        padding-bottom: 0px;
    }
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<div class="content-inner" id="pageActive" data-num="8" data-namecollapse="#ewallet-collapse-a" data-labelname="Void Record">

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/settings_home/'.$token);?>">Settings</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Void Record</li>
            <input type="hidden" name="hdnToken" id="hdnToken" class="hdnToken" value="<?=$token;?>">
        </ol>
    </div>

    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="col-lg-12 padding-0_mobile" style="padding-bottom: 30px;">
                            <div class="card-progress">
                                <br>
                                <div class="col-lg-12 padding-0_mobile">

                                    <div class="step1" id="step1">
                                        <input type="hidden" class="passCustomerLink" id="" name="passCustomerLink" value="<?=base_url("Main_sales/ticketlist_customer/".$token);?>">
                                        <div class="form-group row">

                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="card h-100">
                                                    <h6 class="secondary-bg px-4 py-3 white-text">Void Record</h6>
                                                    <div class="p-4">
                                                        <div class="form-group">
                                                            <div class="alert alert-warning notif_changecustomer" id="notif_changecustomer" hidden>NOTE: Remove item added before select enable</div>
                                                            <small class="form-text">Select Void Record Type </small>
                                                            <!-- Inventory Manager Access -->
                                                            <select class="form-control select2 recordType" id="recordType" name="recordType">
                                                            <option value = "">Select Void Record Type</option>
                                                            <?php if (in_array($this->session->userdata('position_id'), [11])) { ?>
                                                                <option value = "Receive Purchase Order">Receive Purchase Order</option>
                                                                <option value = "PO Return">PO Return</option>
                                                            <?php } else {?>
                                                                <option value = "Sales Order">Sales Order</option>
                                                                <option value = "Delivery Receipt">Delivery Receipt</option>
                                                                <option value = "Collection">Collection</option>
                                                                <option value = "Sales Return">Sales Return</option>
                                                                <option value = "Credit Memo">Credit Memo</option>
                                                                <option value = "Accounts Payable Voucher">Accounts Payable Voucher</option>
                                                                <option value = "Bank Deposit">Bank Deposit</option>
                                                                <option value = "Build Inventory">Build Inventory</option>
                                                                <option value = "Cash Voucher">Cash Voucher</option>                                                               
                                                                <option value = "Check">Check</option>                                                                
                                                                <option value = "Customer Ticket">Customer Ticket</option>
                                                                <option value = "GL Transaction">GL Transaction</option>
                                                                <option value = "Inventory Adjustment">Inventory Adjustment</option>
                                                                <option value = "Inventory Location Transfer">Inventory Location Transfer</option>
                                                                <!-- <option value = "Package Sales">Package Sales</option> -->
                                                                <option value = "PO Return">PO Return</option>
                                                                <option value = "Purchase Order">Purchase Order</option>
                                                                <option value = "Receive Purchase Order">Receive Purchase Order</option>
                                                                <option value = "Supplier">Supplier</option>
                                                            <?php }?> 
                                                            </select> 
                                                        </div>
                                                        <div class="form-group" id = "divReference" hidden>
                                                            <small class="form-text">Reference Number </small>
                                                            <input type="" class="form-control form-control-success refno" name="refno" id="refno" title="Reference Number is the Identification Number of a Record to void.">
                                                        </div>
                                                        <div class="form-group">
                                                            <small class="form-text">Reason </small>
                                                            <textarea class="form-control form-control-success reason" name="reason" id="reason"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button style="float: right;" id="btnNext" class="btn btn-primary BtnNext">Next </button>
                                                <button style="float: right;display: none" id="BtnNextOthers" class="btn btn-primary BtnNextOthers">Next </button>
                                                <button style="float: right;display: none" id="BtnNextVoid" class="btn btn-primary BtnNextVoid">Next </button>
                                                <button style="float: right;display: none" id="BtnNextVoid2" class="btn btn-primary BtnNextVoid2">Next </button>
                                            </div>

                                        </div>
                                    </div>  

                                    <div class="step2" style="display: none;">
                                        <div class="card">
                                            <div id="showInfo" style="font-size: 15px; margin-bottom: 0px;">
                                                <h6 class="secondary-bg px-4 py-3 white-text voidtype" id="voidtype"></h6>
                                                
                                                
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div class="form-group p-style">
                                                                <div class="row">
                                                                    <div class="col-md-3">Reference No: </div>
                                                                    <div class="col-md-9"><h4 class="text-uppercase" id="drno"></h4></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">Name: </div>
                                                                    <div class="col-md-9"><h4 class="text-uppercase" id="name"></h4></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">ID No: </div>
                                                                    <div class="col-md-9"><h4 class="text-uppercase" id="idno"></h4></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">Address: </div>
                                                                    <div class="col-md-9"><p id="address"></p></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-3">Date: </div>
                                                                    <div class="col-md-9"><p id="trandate"></p></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-3">Classification: </div>
                                                                    <div class="col-md-9"><p id="classification"></p></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-3">Total Amount: </div>
                                                                    <div class="col-md-9"><p id="totalamt"></p></div>
                                                                </div>

                                                                <!-- INSIDE SHOWINFO-->
                                                                <div class="row" id="divreason" style="display: none">
                                                                    <div class="col-md-3">Ticket Details: </div>
                                                                    <div class="col-md-9"><p id="t_details"></p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button style="float: right;" id="btnVoid" class="btn btn-primary btnVoid"> Void Record</button>
                                        <button style="float: right; display: none" id="packageBtn" type="button" data-toggle="modal" data-target="#confirmApvModal" class="btn btn-success btnBack"> Void</button>
                                        <button style="float: right; margin-right:10px;" id="btnBack" class="btn blue-grey btnBack"> Back</button>  
                                        <button style='float: right; display: none' id='btnConfirmVoid_additional' type="button" data-toggle="modal" data-target="#confirmApvModal_additional" class='btn btn-primary btnConfirmVoid_additional'> Void Record</button>
                                        <button style='float: right; display: none' id='btnConfirmVoid2' type="button" data-toggle="modal" data-target="#confirmApvModal2" class='btn btn-primary btnConfirmVoid2'> Void Record</button>
                                    </div>

                                    <div class="step3 card" style="display: none;">
                                        <div class="form-group" style="margin-top: 50px;">
                                            <!-- <center><h3>You have successfully created a new Sales Order!  <div id="showInfo" style="font-size: 15px;margin-bottom: 50px;"></div><span class="refNospan" style="color:red"></span></h3>
                                                <a href="<?=base_url('Main_sales/sales_order_form/'.$token);?>" class="btn blue-grey">  Add More Sales Order</a>
                                                <a href="<?=base_url('Main_sales/sales_summary/'.$token);?>" class="btn primary-bg"> Proceed to Transaction History</a>
                                            </center> -->
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

    <div id="confirmApvModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Confirm Action</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Void <bold class="txtRecordType" id="txtRecordType"></bold> Record?</p>
                                <input type="hidden" class="hdn_apvno" name="hdn_apvno" id="hdn_apvno" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="submit" style="float:right" class="btn btn-primary btnConfirmVoid" id="btnConfirmVoid">Void</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmApvModal_additional" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Confirm Action</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Void <bold class="txtRecordType" id="txtRecordType"></bold> Record?</p>
                                <input type="hidden" class="hdn_apvno" name="hdn_apvno" id="hdn_apvno" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="submit" style="float:right" class="btn btn-primary btnConfirmVoidProceed" id="btnConfirmVoidProceed">Void</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmApvModal2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Confirm Action</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Void <bold class="txtRecordType" id="txtRecordType"></bold> Record?</p>
                                <input type="hidden" class="hdn_apvno" name="hdn_apvno" id="hdn_apvno" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="submit" style="float:right" class="btn btn-primary btnConfirmVoidProceed2" id="btnConfirmVoidProceed2">Void</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/settings/settings_voidrecord.js');?>"></script>
<script src="<?=base_url('assets/js/settings/settings_voidrecord_additional.js');?>"></script>
<script src="<?=base_url('assets/js/settings/settings_voidrecord_others.js');?>"></script>
<script src="<?=base_url('assets/js/settings/settings_voidrecord2.js');?>"></script>
