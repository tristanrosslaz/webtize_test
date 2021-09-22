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
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Accounts"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Accounts Payable Voucher</li>
            <input type="hidden" name="hdnToken" id="hdnToken" class="hdnToken" value="<?=$token?>">
        </ol>
    </div>
    
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12" style="padding-right: 0">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Supplier</label>
                                                <select id="searchSelect" class="form-control search-input-select searchSelect select2">
                                                    <option value="">Select Supplier</option>
                                                    <?php foreach ($get_supplier->result() as $gsupp) { ?>
                                                        <option value="<?=$gsupp->id?>"><?=$gsupp->suppliername?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" id="date1" class="input-sm form-control material_josh search-input-select1 searchDateFrom" name="start" readonly value="<?=today_text();?>" />
                                                    <span class="input-group-addon" style="background-color:#fff; border:none; margin:3px;">to</span>
                                                    <input type="text" id="date2" class="input-sm form-control material_josh search-input-select2 searchDateTo" name="end" readonly value="<?=today_text();?>"/>    
                                                </div> 
                                            </div>
                                        </div>

                                        <?php 
                                            $searchArray = explode('|', $this->session->userdata('search'));
                                            if ($searchArray[0] == "APV") { // check first if the session data is meant for PO Approval ?>
                                                <span id="hdnSearch" hidden=""><?=$searchArray[0];?></span>
                                                <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                <span id="hdnSupid" hidden=""><?=$this->session->userdata('supid');?></span>
                                            <?php }
                                            else { ?>
                                                <span id="hdnDatefrom" hidden=""></span>
                                                <span id="hdnDateto" hidden=""></span>
                                                <span id="hdnSupid" hidden=""></span>
                                            <?php }
                                            $array_items = array('search', 'datefrom', 'dateto', 'supid');
                                            $this->session->unset_userdata($array_items);
                                        ?>
                                        
                                        <div class="col-lg col-12" style="padding-left: 0">
                                            <div class="pull-right">
                                                <button type="submit" id="btnSearch" class="btn btn-primary btnSearch my-0" style="margin-right: 2px">Search</button>
                                            </div>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>  
                                            <th width="25"><input type="checkbox" id="chkAll" name="chkAll" /></th>
                                            <th>PO No</th>
                                            <th>RCV No.</th>
                                            <th>Date</th>
                                            <th>Supplier Ref No.</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary btnProceed" id="btnProceed" style="padding: 10px;" disabled>PROCEED</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="batchApproveConfirmationModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Confirm</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Proceed generating Accounts Payable Voucher for:<br><bold class="supplier" id = "supplier"></bold></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="submit" style="float:right" class="btn btn-primary btnConfirmBatchApprove" id="btnConfirmBatchApprove">Confirm</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="poViewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row" style="width: 100%;">
                        <div class="col-6">
                            <h1 id="exampleModalLabel" class="modal-title">Purchase Order</h1>
                        </div>
                        <div class="text-right col-6">
                            <h1><span class="pono text-right"></span></h1>
                            <p class="text-right tdate"></p>
                        </div>
                    </div>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="purchase_form" method="post" >
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6><small>Purchase From</small></h6>
                                                    <h1><span class="supp" data-value=""></span></h1> 
                                                    <hr>
                                                    <p>Delivery Status: <span class="stat"></span></p> 
                                                    <p>Date of Delivery: <span class="delivery"></span></p>
                                                    <p>Contact Person: <span class="contactp"></span></p>
                                                    <p>Mode of Payment: <span class="mop"></span></p>
                                                    <p>Contact No: <span class="num"></span></p>
                                                    <p>Address: <span class="add"></span></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table  table-striped table-hover table-bordered" id="table-grid-modal"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>PO Quantity</th>
                                                                <th>Unit</th>
                                                                <th>Received Quantity</th>
                                                                <th>Amount</th>
                                                                <th>Total Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tablebody">

                                                        </tbody>
                                                    </table>
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
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="poReceiveModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">PO Receive Form</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="card-body">
                                    
                                    <div class="" >
                                        <div class="">
                                            <label class="" style="float:left;"># </label>
                                            <H1 class="m_rcvno" style="border:none; float:left;"></span></H1>
                                            <p><br></p>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <span type="text" class="m_itemtrandate"></span>
                                            <p><br></p>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Purchase From </label>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <H2 class="m_suppname"></H2>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">PO No.: </label>
                                            <span type="text" class="m_pono" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Po Date: </label>
                                            <span type="text" class="m_potrandate" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Supplier Ref. No.: </label>
                                            <span type="text" class="m_suprefno" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered" id="table-grid2" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="90">ID</th>
                                                    <th>Name</th>
                                                    <th>Received Date</th>
                                                    <th>Received Qty</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <p id="printedText" style="float:left; margin-left:10px; color: red;"><i>This document has already been printed.</i></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-success printBtn" id="printBtn">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="viewItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">Purchase Order</h1><span class="pono text-right"></span><br>
                    <span class="text-right tdate"></span>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="purchase_form" method="post" >
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6><small>Purchase From</small></h6>
                                                    <h1><span class="supp1"></span></h1> 
                                                    <hr>
                                                    <p>Purchase Order No. : <span class="pon1"></span></p> 
                                                    <p>Purchase Order Date : <span class="pod1"></span></p>
                                                    <p>Supplier Ref No. : <span class="srf"></span></p>

                                                </div>

                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table class="table  table-striped table-hover table-bordered" id="table-grid-modalview"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Recieved Date</th>
                                                                    <th>Recieved Quantity</th>
                                                                    <th>Unit</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tablebody">

                                                            </tbody>
                                                        </table>
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
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                   </div>
               </form>
           </div>
       </div>
    </div>

    <?php $this->load->view('includes/footer');?> <!-- includes your footer -->
    <script type="text/javascript" src="<?=base_url('assets/js/account/accounts_payable_voucher.js');?>"></script>

