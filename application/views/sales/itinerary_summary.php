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
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">

<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Itinerary Report Summary</li>
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
                                                    <option value="truckdiv">Search by Truck</option>
                                                </select>              
                                            </div>
                                        </div>
                                        <div class="col-lg col-12">
                                            <div class="form-group">

                                                <div class="datediv" id="datediv" >
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-select1 datefrom" value="<?=today_text();?>" id="datefrom" readonly/>
                                                        <span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
                                                        <input type="text" value="<?=today_text();?>" class="input-sm form-control search-input-select2 dateto" id="dateto" readonly/>    
                                                    </div>   
                                                </div> 

                                                <div class="truckdiv" id="truckdiv" style="display: none">
                                                    <label class="form-control-label col-form-label-sm">Shipping</label>
                                                    <select class="form-control search_shipping" id="search_shipping" name="search_shipping">
                                                        <option value=""></option>
                                                        <?php
                                                        foreach ($get_truck->result() as $gtruck) { ?>
                                                        <option value="<?=$gtruck->id?>"><?=$gtruck->plateno?></option>
                                                        <?php } ?>
                                                        ?>                              
                                                    </select>
                                                </div>

                                                <?php
                                                    $searchArray = explode('|', $this->session->userdata('search'));
                                                    if ($searchArray[0] == "IRS") { // check first if the session data is meant for PO Approval ?>
                                                        <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                        <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                        <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                        <span id="hdnTruck" hidden=""><?=$this->session->userdata('truck');?></span>
                                                <?php }
                                                    else { ?>
                                                        <span id="hdnSearch" hidden=""></span>
                                                        <span id="hdnDatefrom" hidden=""></span>
                                                        <span id="hdnDateto" hidden=""></span>
                                                        <span id="hdnTruck" hidden=""></span>
                                                    <?php }
                                                    $array_items = array('search', 'datefrom', 'dateto', 'truck');
                                                    $this->session->unset_userdata($array_items);
                                                ?>
                                                    
                                            </div>
                                        </div>
                                        <div class="col-lg cpl-12">
                                            <div class="pull-right">
                                                <label class="form-control-label col-form-label-sm d-block invisible">Buttons</label>
                                                <button type="submit" id="search_order" class="btn btn-primary search_order">Search</button>
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
                                            <th>IT No.</th>
                                            <th>Truck</th>
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
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/itinerary_summary.js');?>"></script>
