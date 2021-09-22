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
// 071318
?>

<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales Order Transaction History"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales Order Transaction History</li>
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
                                                <label class="form-control-label col-form-label-sm" data-column="6">Select Filter</label>
                                                    <select id="sosearchfilter" class="form-control sosearchfilter">
                                                      <option value="sodatediv">Search by Date</option>
                                                      <option value="sonodiv">Search by SO No</option>
                                                      <option value="sostatus">Search by Status</option>
                                                      <option value="searchbyName">Search by Name</option>
                                                      <option value="soshipping">Search by Shipping</option>
                                                    </select>              
                                            </div>
                                        </div>

                                        <div class="col-md col-12">

                                            <div class="form-group podatediv" id="podatediv" style="">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-select1 date_from datepicker" style="z-index: 2 !important;" id="date_from" value="<?=today_text();?>" name="start" readonly/>
                                                    <span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
                                                    <input type="text" value="<?=today_text();?>" class="input-sm form-control search-input-select2 date_to datepicker" id="date_to" name="end" readonly/>    
                                                </div>   
                                            </div> 

                                            <div class="form-group ponodiv" id="ponodiv" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">SO No.</label>
                                                <input type="text" data-column="2" class="input-sm form-control search-input-text search_sono" id="search_sono" placeholder="SO Number.." /> 
                                            </div>

                                            <div class="form-group ponostatus" id="ponostatus" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Status</label>
                                                <select id="search_status" data-column="3" class="input-sm form-control search-input-text search_status" >
                                                  <option selected value="">Select Status</option>
                                                  <option value="Waiting for Conversion">Waiting for Conversion</option>
                                                  <option value="Converted to DR">Converted to DR</option>
                                                  <option value="Converted to SI">Converted to SI</option>
                                              </select> 
                                            </div>

                                            <div class="form-group searchbyName" id="searchbyName" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Customer Name</label>
                                                <input type="text" data-column="4" class="input-sm form-control search-input-text search_customer" id="search_customer" placeholder="Customer Name.." /> 
                                            </div>

                                            <div class="poshipping" id="poshipping" style="display: none">
                                                <label class="form-control-label col-form-label-sm">Shipping</label>
                                                <select class="form-control search_shipping" id="search_shipping" data-column="5" name="search_shipping" data-column="5">
                                                   <option selected value="">Select Shipping</option>
                                                   <?php
                                                   foreach ($get_shipping->result() as $gshipping) { ?>
                                                   <option value="<?=$gshipping->id?>"><?=$gshipping->description?></option>
                                                   <?php } ?>
                                                   ?>                              
                                               </select>
                                            </div>
                                        </div>

                                        <?php
                                            $searchArray = explode('|', $this->session->userdata('search'));
                                            if ($searchArray[0] == "SO") { // check first if the session data is meant for PO Approval ?>
                                                <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                <span id="hdnSono" hidden=""><?=$this->session->userdata('sono');?></span>
                                                <span id="hdnStatus" hidden=""><?=$this->session->userdata('status');?></span>
                                                <span id="hdnName" hidden=""><?=$this->session->userdata('name');?></span>
                                                <span id="hdnShipping" hidden=""><?=$this->session->userdata('shipping');?></span>
                                        <?php }
                                            else { ?>
                                                <span id="hdnSearch" hidden=""></span>
                                                <span id="hdnDatefrom" hidden=""></span>
                                                <span id="hdnDateto" hidden=""></span>
                                                <span id="hdnSono" hidden=""></span>
                                                <span id="hdnStatus" hidden=""></span>
                                                <span id="hdnName" hidden=""></span>
                                                <span id="hdnShipping" hidden=""></span>
                                            <?php }
                                            $array_items = array('search', 'datefrom', 'dateto', 'sono', 'status', 'name', 'shipping');
                                            $this->session->unset_userdata($array_items);
                                        ?>

                                        <div class="col-lg col-12" style="padding-left: 0">
                                            <div class="pull-right">
                                                <!-- label is used to level it with the input. It is styled invisible -->
                                                <button type="submit" id="searchBtn" class="btn btn-primary searchBtn m-0" style="margin-right: 2px">Search</button>                             
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
                                            <th width="50">Date</th>
                                            <th width="50">SO No.</th>  
                                            <th>Name</th>
                                            <th width="80">Amount</th>
                                            <th width="80">Shipping</th>
                                            <th width="100">Status</th>
                                            <th width="60">Action</th>
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
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_summary.js');?>"></script>
