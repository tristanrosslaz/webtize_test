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
div#table-grid-edit_filter {
    display: none;
}
</style>
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Delivery Receipt Transaction History</li>
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
                                    <div class="row" >
                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label class="form-control-label col-form-label-sm">Select Filter</label>
                                                <select class="form-control" name="searchFilter" id="searchFilter">
                                                    <option value="datediv">Search by Date</option>
                                                    <option value="nodiv">Search by DR No.</option>
                                                    <option value="statusdiv">Search by DR Status</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md col-12">
                                            <div class="datediv">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control search-input-date" id="datefrom" value="<?=today_text();?>" readonly />
                                                <span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
                                                <input type="text" class="input-sm form-control search-input-date" id="dateto" value="<?=today_text();?>" readonly/>
                                                </div>
                                            </div>

                                            <div class="nodiv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">DR No.</label>
                                                <input type="text" class="input-sm form-control search-input-text allownumericwithoutdecimal" id="searchNo" placeholder="123456"/>
                                            </div>

                                            <div class="form-group statusdiv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Status </label>
                                                <select class="form-control input-lg search-input-status" name="searchStatus" id="searchStatus">
                                                    <option value="">Search Status</option>
                                                    <option value="No Payment">No Payment</option>
                                                    <option value="Partial Payment">Partial Payment</option>
                                                    <option value="Full Payment">Full Payment</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-12">
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-default btn-primary btnSearch m-0" id="btnSearch">Search</button>  
                                            </div>  
                                        </div>

                                        <?php
                                            $searchArray = explode('|', $this->session->userdata('search'));
                                            if ($searchArray[0] == "DRtran") { // check first if the session data is meant for PO Approval ?>
                                                <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                <span id="hdnDrno" hidden=""><?=$this->session->userdata('drno');?></span>
                                                <span id="hdnDRStatus" hidden=""><?=$this->session->userdata('drstatus');?></span>
                                        <?php }
                                            else { ?>
                                                <span id="hdnSearch" hidden=""></span>
                                                <span id="hdnDatefrom" hidden=""></span>
                                                <span id="hdnDateto" hidden=""></span>
                                                <span id="hdnDrno" hidden=""></span>
                                                <span id="hdnDRStatus" hidden=""></span>
                                            <?php }
                                            $array_items = array('search', 'datefrom', 'dateto', 'drno', 'drstatus');
                                            $this->session->unset_userdata($array_items);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- <table class="table table-striped table-hover"> -->
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="60px">Date</th>
                                                <th width="50px">DR No.</th>
                                                <th>Name</th>
                                                <th width="70px">Amount</th>
                                                <th width="70px">Shipping</th>
                                                <th width="80px">Payment Status</th>
                                                <!-- <th width="80px">DR Status</th> -->
                                                <th  width="150px">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="viewDRpacking" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delivery Receipt Packing</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group row">
                                    <div class="col-md-3">DR Number:</div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="drno_id" disabled="true" />
                                    </div> 

                                    <div class="col-md-12">Dry Goods: </div>
                                        <div class="col-md-2">
                                        </div>         
                                    <div class="col-md-1">
                                        <label class="form-control-label" type="text" >Box:</label>
                                    </div>

                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="dry1" onkeypress="return isNumberKeyOnly(event)" onpaste="return false;" />
                                    </div> 

                                    <div class="col-md-1">
                                        <label class="form-control-label" type="text" >Bag:</label>
                                    </div>

                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="dry2" onkeypress="return isNumberKeyOnly(event)" onpaste="return false;" />
                                    </div> 
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">Perishable Goods: </div>
                                    <div class="col-md-2">
                                    </div>   
                                    <div class="col-md-1">
                                        <label class="form-control-label" type="text" >Box:</label>
                                    </div>

                                    <div class="col-md-3">
                                      <input class="form-control" type="text" id="per1" onkeypress="return isNumberKeyOnly(event)" onpaste="return false;" />
                                    </div> 


                                    <div class="col-md-1">
                                        <label class="form-control-label" type="text" >Bag:</label>
                                    </div>

                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="per2" onkeypress="return isNumberKeyOnly(event)" onpaste="return false;" />
                                    </div> 
                                    <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">  
                                <button type="button" style="float:right;" class="btn btn-success saveBtnPack" data-dismiss="modal" aria-label="Close">Save</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_drtran.js');?>"></script>
