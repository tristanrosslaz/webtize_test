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
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Accounts Payable Voucher List</li>
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

                                <div class="col-lg-12">
                                  
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label class="form-control-label col-form-label-sm">Search Filter</label>
                                                <select class="form-control" name="apvsearchfilter" id="apvsearchfilter">
                                                    <option value="apvdatediv">Search by Date</option>
                                                    <option value="apvstatdiv">Search by APV Status</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">

                                                <div class="form-group apvdatediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom" value="<?=today_date();?>" readonly />
                                                        <span class="input-group-addon" style="background-color:#fff; border:none; margin-left:3px; margin-right:3px;">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto" value="<?=today_date();?>" readonly/>
                                                    </div>
                                                </div>

                                                <div class="form-group apvstatdiv col-md-12" style="display:none; padding-left: 0;">
                                                    <select class="form-control select2" name="apvstatus" id="apvstatus">
                                                        <option value="none">Select APV Status...</option>
                                                        <option value="Waiting for Approval">Waiting for Approval</option>
                                                        <option value="Approved">Approved</option>
                                                        <option value="Processed">Processed</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <?php 
                                            $searchArray = explode('|', $this->session->userdata('search'));
                                            if ($searchArray[0] == "APVL") { // check first if the session data is meant for PO Approval ?>
                                                <span id="hdnSearchtype" hidden=""><?=$searchArray[1];?></span>
                                                <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                <span id="hdnStatus" hidden=""><?=$this->session->userdata('status');?></span>
                                            <?php }
                                            else { ?>
                                                <span id="hdnSearchtype" hidden=""></span>
                                                <span id="hdnDatefrom" hidden=""></span>
                                                <span id="hdnDateto" hidden=""></span>
                                                <span id="hdnStatus" hidden=""></span>
                                            <?php }
                                            $array_items = array('search', 'datefrom', 'dateto', 'status');
                                            $this->session->unset_userdata($array_items);
                                        ?>

                                        <div class="form-group-material float-right" style="right:0px; position: absolute;">    
                                            <button type="button" style="float:left; margin-left:0px;" class="btn btn-default btn-primary btnSearchAPV" id="btnSearchAPV">Search</button>
                                        </div>

                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="90">APV No.</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
                                            <th>Status</th>
                                            <th width="70">Action</th>
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

    <div id="approveApvModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">APV Approve</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="approveApvForm" method="post" action="<?= base_url();?>Main_account/apv_approve">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Proceed with the Approval of <br>APV #<bold class="apvno" id = "apvno"></bold></p>
                                    <input type="hidden" class="hdn_apvno" name="hdn_apvno" id="hdn_apvno" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary approveApvBtn">Approve</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
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



<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/apv_list.js');?>"></script>

