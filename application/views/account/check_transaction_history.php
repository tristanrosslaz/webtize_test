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
.btn {
    padding: .7rem 1.6rem !important;
    font-size: .7rem !important;
    width: max-content;
}
</style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Check Transaction History</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-lg-12">
                                   
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label class="form-control-label col-form-label-sm">Search Filter</label>
                                                <select class="form-control" name="chksearchfilter" id="chksearchfilter">
                                                    <option value="chkdatediv">Search by Date</option>
                                                    <option value="chkchecknodiv">Search by Check No.</option>
                                                    <option value="chkstatdiv">Search by Status</option>
                                                    <option value="chkpaytodiv">Search by Pay To</option>
                                                    <option value="chkprintdiv">Search by Print</option>
                                                    <option value="chkcleardiv">Search by Clear</option>
                                                    <option value="chkclassificationdiv">Search by Classification</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group row">

                                                <div class="form-group chkdatediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date datepicker" id="datefrom" value="<?=today_text();?>" readonly />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date datepicker" id="dateto" value="<?=today_text();?>" readonly/>
                                                    </div>
                                                </div>

                                                <div class="form-group chkstatdiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date and Status</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom1" value="<?=today_text();?>" readonly />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto1" value="<?=today_text();?>" readonly/>
                                                    </div>
                                                    <br>

                                                    <select class="form-control " name="chkstatus" id="chkstatus">
                                                        <option value="none" selected></option>
                                                        <option value="Waiting for Approval">Waiting for Approval</option>
                                                        <option value="Approved">Approved</option>
                                                    </select>
                                                </div>

                                                <div class="form-group chkchecknodiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Reference</label>
                                                        <input type="text" class="form-control form-control-sm search-input-text" id="checkno" name="checkno"  placeholder="Check No..">

                                                </div>
                                                <div class="form-group chkprintdiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Printed</label>
                                                        <select class="form-control " name="chkprint" id="chkprint">
                                                        <option value="none" selected></option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>

                                                </div>

                                                <div class="form-group chkpaytodiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Pay To</label>
                                                        <input type="text" class="form-control form-control-sm search-input-text" id="payto" name="payto"  placeholder="Pay To..">

                                                </div>

                                                <div class="form-group chkcleardiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Cleared</label>
                                                        <select class="form-control chkclear" name="chkclear" id="chkclear">
                                                        <option value="none" selected></option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group chkclassificationdiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Classification</label>
                                                        <select class="form-control chkclassification" name="chkclassification" id="chkclassification">
                                                        <option selected value="none">-- Select Classification --</option>
                                                        <option value="Regular Payment">Regular Payment</option>
                                                        <option value="Advance Payment/Deposit">Advance Payment/Deposit</option>
                                                        <option value="Customer Refund">Customer Refund</option>
                                                        <option value="Intercompany Fund Transfer">Intercompany Fund Transfer</option>
                                                        <option value="Refundable Bond/Deposit">Refundable Bond/Deposit</option>
                                                        <option value="Petty Cash Encashment">Petty Cash Encashment</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group-material float-right" style="right:0px; position: absolute;">    
                                                <button type="button" class="btn btn-default btn-primary btnSearchChk" id="btnSearchChk">Search</button>
                                        </div> 

                                        <input type="" value="<?=$token?>" id="token" hidden>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Classification</th>
                                            <th>Reference</th>
                                            <th>Pay To</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
                                            <th>Status</th>
                                            <th>Printed</th>
                                            <th>Cleared</th>
                                            <th>Allocation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clear Check</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <center><p class="p_check"></p></center>
        <input type="text" class="checknum" id="checknum" hidden>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="markascleared">Mark as Cleared</button>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/check_transaction_history.js');?>"></script>

