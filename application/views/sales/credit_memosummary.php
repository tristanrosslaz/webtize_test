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
<style type="text/css">
td.dt-body-right { text-align: right; }
</style>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Credit Memo Transaction History</li>
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
                                <div class="col-lg-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Select Filter</label>
                                                <select id="searchfilter" class="form-control searchfilter">
                                                    <option value="datediv">Search by Date</option>
                                                    <option value="cmnodiv">Search by ID No</option>
                                                    <option value="statusdiv">Search by Status</option>
                                                </select>              
                                            </div>
                                        </div>
                                        <div class="col-lg col-12">
                                            <div class="form-group">
                                                <div class="datediv" id="datediv">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-select1 datefrom datepicker" style="z-index: 2 !important;" id="datefrom" value="<?=today_text();?>" name="start" readonly/>
                                                        <span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
                                                        <input type="text" value="<?=today_text();?>" class="input-sm form-control search-input-select2 dateto datepicker" id="dateto" name="end" readonly/>    
                                                    </div>  
                                                </div>

                                                <div class="cmnodiv" id="cmnodiv" style="display: none;">
                                                    <label class="form-control-label col-form-label-sm">ID No.</label>
                                                    <input type="text" class="input-sm form-control material_josh search-input-text search_cmno allownumericwithoutdecimal" id="search_cmno" placeholder="ID Number.." /> 
                                                </div>

                                                <div class="statusdiv" id="statusdiv" style="display: none;">
                                                    <label class="form-control-label col-form-label-sm">Status</label>
                                                    <select id="search_status" class="input-sm form-control material_josh search-input-text search_status" >
                                                        <option value="">Select Status</option>
                                                        <option value="No Allocation">No Allocation</option>
                                                        <option value="Partial Allocation">Partial Allocation</option>
                                                        <option value="Full Allocation">Full Allocation</option>
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                            $searchArray = explode('|', $this->session->userdata('search'));
                                            if ($searchArray[0] == "CM") { // check first if the session data is meant for PO Approval ?>
                                                <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                <span id="hdnCmno" hidden=""><?=$this->session->userdata('cmno');?></span>
                                                <span id="hdnStatus" hidden=""><?=$this->session->userdata('status');?></span>
                                        <?php }
                                            else { ?>
                                                <span id="hdnSearch" hidden=""></span>
                                                <span id="hdnDatefrom" hidden=""></span>
                                                <span id="hdnDateto" hidden=""></span>
                                                <span id="hdnCmno" hidden=""></span>
                                                <span id="hdnStatus" hidden=""></span>
                                            <?php }
                                            $array_items = array('search', 'datefrom', 'dateto', 'cmno', 'status');
                                            $this->session->unset_userdata($array_items);
                                        ?>

                                    <div class="col-lg col-12">
                                        <div class="pull-right">
                                            <button type="submit" id="search_order" class="btn btn-primary search_order" style="margin-right: 2px">Search</button>         
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                        <div class="card-body">     
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">Date</th>
                                            <th width="40">ID</th>
                                            <th>Name</th>
                                            <th width="80">Amount</th>
                                            <th width="80">Balance</th>
                                            <th width="100">Status</th>
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
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/credit_memosummary.js');?>"></script>
