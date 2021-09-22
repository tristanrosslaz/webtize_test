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
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cash Voucher Approval</li>
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

                                                <select class="form-control" name="cvsearchfilter" id="cvsearchfilter">
                                                    <option value="cvdatediv">Search by Date</option>
                                                    <option value="cvnodiv">Search by CV No.</option>
                                                    <option value="cvnamediv">Search by Name</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <div class="form-group cvdatediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-date" id="datefrom" readonly value="<?=today_text();?>" />
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="input-sm form-control search-input-date" id="dateto" readonly value="<?=today_text();?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group cvnodiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">CV Number</label>
                                                    <input type="text" class="input-sm form-control search-input-name" id="cvno" onkeypress="return isNumberKeyOnly(event)" placeholder="CV Number.." />
                                                </div>

                                                <div class="form-group cvnamediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Pay To</label>
                                                    <input type="text" class="input-sm form-control search-input-name" id="cvname" placeholder="Name.." />
                                                </div>
                                                <?php 
                                                    $searchArray = explode('|', $this->session->userdata('search'));
                                                    if ($searchArray[0] == "CA") { // check first if the session data is meant for PO Approval ?>
                                                        <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                        <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                        <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                        <span id="hdnCvno" hidden=""><?=$this->session->userdata('cvno');?></span>
                                                        <span id="hdnCvname" hidden=""><?=$this->session->userdata('cvname');?></span>
                                                    <?php }
                                                    else { ?>
                                                        <span id="hdnSearch" hidden=""></span>
                                                        <span id="hdnDatefrom" hidden=""></span>
                                                        <span id="hdnDateto" hidden=""></span>
                                                        <span id="hdnCvno" hidden=""></span>
                                                        <span id="hdnCvname" hidden=""></span>
                                                    <?php }
                                                    $array_items = array('search', 'datefrom', 'dateto', 'sino', 'status');
                                                    $this->session->unset_userdata($array_items);
                                                ?>

                                            </div>
                                        </div>


                                    <div class="col-md-6">
                                            <div class="form-group row" style="float:right;">
                                                <div>
                                                <button type="button" class="btn btn-default btn-primary btnSearchSO col-md-12" id="btnSearchSO">Search</button>
                                             </div>  

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <div class="col-md-12" style="padding-right: 0">
                                    <div class="pull-right">
                                        <button type="submit" id="btnBatchApprove" class="btn btn-info btnBatchApprove m-0" style="margin-left: 5px" disabled>Batch Approve</button>      
                                    </div>
                                </div> 
                                <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="25"><input type="checkbox" id="chkAll" name="chkAll" /></th>
                                            <th width="90">Date</th>
                                            <th width="90">CV No. </th>
                                            <th>Pay To</th>
                                            <th width="100">Amount</th>
                                            <th width="90">Action</th>
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

    <div id="viewBDModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Cash Voucher View</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            
                                    <div class="form-group row">
                                        <h1><label class="col-md-12 form-control-label" id="info_fullname" type="text" ></label></h1> 
                                        
                                        <label class="col-md-12 form-control-label" id="info_funds" type="text" ></label>
                                        <label class="col-md-12 form-control-label" id="info_status" type="text" ></label>
                                        <label class="col-md-12 form-control-label" id="info_create" type="text" ></label>
                                        <label class="col-md-12 form-control-label" id="info_app" type="text" ></label>

                                      

                                        <div class="form-group row">
                                            <h1><label class=" form-control-label" style="right:20px; position: absolute; top:-50px;" id="info_cvno"></label></h1>

                                            <label class=" form-control-label" style="right:20px; position: absolute; top:-10px;" id="info_trandate"></label>
                                        </div>
                                     </div> 

                                    <div class="form-group row"> 
                                    </div> 
                  
                            </div>
                        </div>

                        
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table table-hover table-hover table-striped" id="table-grid1"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Details</th>
                                            <th width="">Release Account</th>
                                            <th width="">Actual Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="row">
                                <label class="col-md-12 form-control-label" id="info_notes" type="text" ></label>
                            </div>    
                        

                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
            <!-- <div class="modal-content modal_content_preloader">
            </div> -->
        </div> 
    </div>  

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
                                <p>Approve all selected Cash Voucher?</p>
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
  
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/cv_approval.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/functions.js');?>"></script>

