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
<div class="content-inner contento" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="PO Return Transaction History"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">PO Return Transaction History</li>
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
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Select Filter</label>
                                                <select id="sosearchfilter" class="form-control sosearchfilter">
                                                    <option value="podatediv">Search by Date</option>
                                                    <option value="poretnodiv">Search by PO Return No</option>
                                                </select>              
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                            
                                                <div class="podatediv col-md-8" id="podatediv">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" id="date1" class="input-sm form-control material_josh search-input-select1 searchDateTo" value="<?=today_text();?>" name="start" readonly/>
                                                        <span class="input-group-addon" style="background-color:#fff; border:none;">to</span>
                                                        <input type="text" id="date2" value="<?=today_text();?>" class="input-sm form-control material_josh search-input-select2 searchDateFrom" name="end" readonly />    
                                                    </div>   
                                                </div>

                                                <div class="poretnodiv" id="poretnodiv" style="display: none;">
                                                    <label class="form-control-label col-form-label-sm">PO No.</label>
                                                    <input type="text" id="poretnoField" class="input-sm form-control material_josh search-input-text search_pono" id="search_pono" placeholder="PO Ret. Number.." onkeypress="return isNumberKeyOnly(event)" /> 
                                                </div>

                                                <?php
                                                    $searchArray = explode('|', $this->session->userdata('search'));
                                                    if ($searchArray[0] == "PORet") { // check first if the session data is meant for PO Approval ?>
                                                        <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                        <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                        <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                        <span id="hdnPoretno" hidden=""><?=$this->session->userdata('poretno');?></span>
                                                <?php }
                                                    else { ?>
                                                        <span id="hdnSearch" hidden=""></span>
                                                        <span id="hdnDatefrom" hidden=""></span>
                                                        <span id="hdnDateto" hidden=""></span>
                                                        <span id="hdnPoretno" hidden=""></span>
                                                    <?php }
                                                    $array_items = array('search', 'datefrom', 'dateto', 'poretno');
                                                    $this->session->unset_userdata($array_items);
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-md-3" style="padding-left: 0">
                                            <div class="pull-right">
                                                <label class="form-control-label col-form-label-sm "></label>
                                                <button type="submit" id="searchBtn" class="btn btn-primary searchBtn" style="margin-right: 2px">Search</button>
                                            </div>
                                        </div>
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
                                            <th>PO Ret. No.</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
                                            <th>Status</th>
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

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/return_summary.js');?>"></script>
