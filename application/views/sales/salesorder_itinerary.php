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
td>select.form-control:not([size]):not([multiple]) {
    height: calc(1rem + 5px);
    width: 85%;
}
</style>
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 

     <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales Order Itinerary</li>
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
                                                    <option value="sonodiv">Search by SO No</option>
                                                </select>              
                                            </div>
                                        </div>
                                        <div class="col-lg col-12">
                                            <div class="form-group">
                                                <div class="datediv" id="datediv">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control material_josh search-input-select1 datefrom" value="<?=today_text();?>" id="datefrom" readonly/>
                                                        <span class="input-group-addon" style="background-color:#fff; border:none;">to</span>
                                                        <input type="text" value="<?=today_text();?>" class="input-sm form-control material_josh search-input-select2 dateto" id="dateto" readonly/>    
                                                    </div>   
                                                </div>
                                                <div class="sonodiv" id="sonodiv" style="display: none;">
                                                    <label class="form-control-label col-form-label-sm">SO No.</label>
                                                    <input type="text" class="input-sm form-control material_josh search-input-text search_sono" id="search_sono" placeholder="SO Number.." onkeypress="return isNumberKeyOnly(event)" /> 
                                                </div>

                                                <?php
                                                    $searchArray = explode('|', $this->session->userdata('search'));
                                                    if ($searchArray[0] == "SOI") { // check first if the session data is meant for PO Approval ?>
                                                        <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                        <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                        <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                        <span id="hdnSono" hidden=""><?=$this->session->userdata('sono');?></span>
                                                <?php }
                                                    else { ?>
                                                        <span id="hdnSearch" hidden=""></span>
                                                        <span id="hdnDatefrom" hidden=""></span>
                                                        <span id="hdnDateto" hidden=""></span>
                                                        <span id="hdnSono" hidden=""></span>
                                                    <?php }
                                                    $array_items = array('search', 'datefrom', 'dateto', 'sono');
                                                    $this->session->unset_userdata($array_items);
                                                ?>
                                                
                                            </div>
                                        </div>
                                    <div class="col-lg col-12">
                                        <div class="pull-right">
                                            <!-- label is used to level it with the input. It is styled invisible -->
                                            <label class="form-control-label col-form-label-sm invisible d-block">Buttons</label>
                                            <button type="submit" id="search_order" class="btn btn-primary search_order">Search</button>                               
                                        </div>
                                    </div>

                                    <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <form id="form-itinerary">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>             
                                        <tr>
                                            <th style="width:120px">Date</th>
                                            <th style="width:100px">SO No.</th>
                                            <th>Name</th>
                                            <th>Area</th>
                                            <th style="width: 70px;">Perish (Box)</th>
                                            <th style="width: 70px;">Perish (Bag)</th>
                                            <th style="width: 60px;">Dry (Box)</th>
                                            <th style="width: 60px;">Dry (Bag)</th>
                                            <th style="width:100px">Status</th>
                                            <th style="width:140px">Truck</th>                                          
                                        </tr>
                                    </thead>
                                </table>

                            </div>
                            <br><br>
                            <div class="col-12 text-right" style="float: right; padding-right: 0px;">
                             <button class="btn btn-primary btnGrand col-md-12 BtnSaveItinerary" id="BtnSaveItinerary" name="grand_total">Save</button>
                         </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/salesorder_itinerary.js');?>"></script>
