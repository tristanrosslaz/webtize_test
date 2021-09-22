<?php 
//071318
//this code is for destroying session and page if they access restricted page

// $position_access = $this->session->userdata('get_position_access');
// $access_content_nav = $position_access->access_content_nav;
// $arr_ = explode(', ', $access_content_nav); //string comma separated to array 
// $get_url_content_db = $this->model->get_url_content_db($arr_)->result_array();

// $url_content_arr = array();
// foreach ($get_url_content_db as $cun) {
//     $url_content_arr[] = $cun['cn_url'];
// }
// $content_url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/';

// if (in_array($content_url, $url_content_arr) == false){
//     header("location:".base_url('Main/logout'));
// }    
//071318
?>
<style type="text/css">
td.dt-body-right { text-align: right; }
</style>
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales Invoice Transaction History"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales Invoice Transaction History</li>
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
                                                <label class="form-control-label col-form-label-sm" >Select Filter</label>
                                                <select id="sisearchfilter" class="form-control sisearchfilter">
                                                    <option value="sidatediv">Search by Date</option>
                                                    <option value="sinodiv">Search by SI No</option>
                                                    <option value="sistatus">Search by Payment Status</option>
                                                    <option value="searchbyName">Search by Name</option>
                                                </select>              
                                            </div>
                                        </div>

                                        <div class="col-md col-12">
                                            <div class="form-group sidatediv" id="sidatediv" style="">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-select1 date_from datepicker" style="z-index: 2 !important;" id="date_from" value="<?=today_text();?>" name="start" readonly data-column="0" />
                                                    <span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
                                                    <input type="text" value="<?=today_text();?>" class="input-sm form-control search-input-select2 date_to datepicker" style="z-index: 2 !important;" id="date_to" name="end" readonly data-column="1"/>    
                                                </div>   
                                            </div> 

                                            <div class="form-group sinodiv" id="sinodiv" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">SI No.</label>
                                                <input type="text"class="input-sm form-control search-input-text search_sino allownumericwithoutdecimal" id="search_sino" placeholder="SI Number.." data-column="2"/> 
                                            </div>

                                            <div class="form-group sistatus" id="sistatus" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Status</label>
                                                <select id="search_status" class="input-sm form-control search-input-text search_status" data-column="3">
                                                    <option selected value="">Select Status</option>
                                                    <option value="No Payment">No Payment</option>
                                                    <option value="Partial Payment">Partial Payment</option>
                                                    <option value="Full Payment">Full Payment</option>
                                                </select> 
                                            </div>

                                            <div class="form-group searchbyName" id="searchbyName" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Customer Name</label>
                                                <input type="text" class="input-sm form-control search-input-text search_customer" id="search_customer" placeholder="Customer Name.." data-column="4" /> 
                                            </div>
                                        </div>

                                        <div class="col-lg col-12" style="padding-left: 0">
                                            <div class="pull-right">
                                                <!-- label is used to level it with the input. It is styled invisible -->
                                                <button type="button" class="btn btn-default btn-primary btnAddSales" id="btnAddSales">Add Sales Invoice</button>
                                                <button type="submit" id="searchBtn" class="btn btn-primary searchBtn m-0" style="margin-right: 2px">Search</button>                             
                                            </div>
                                        </div>

                                        <?php
                                            $searchArray = explode('|', $this->session->userdata('search'));
                                            if ($searchArray[0] == "SItran") { // check first if the session data is meant for PO Approval ?>
                                                <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                <span id="hdnSino" hidden=""><?=$this->session->userdata('sino');?></span>
                                                <span id="hdnPayStatus" hidden=""><?=$this->session->userdata('paystatus');?></span>
                                                <span id="hdnName" hidden=""><?=$this->session->userdata('name');?></span>
                                        <?php }
                                            else { ?>
                                                <span id="hdnSearch" hidden=""></span>
                                                <span id="hdnDatefrom" hidden=""></span>
                                                <span id="hdnDateto" hidden=""></span>
                                                <span id="hdnSino" hidden=""></span>
                                                <span id="hdnPayStatus" hidden=""></span>
                                                <span id="hdnName" hidden=""></span>
                                            <?php }
                                            $array_items = array('search', 'datefrom', 'dateto', 'sino', 'paystatus', 'name');
                                            $this->session->unset_userdata($array_items);
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="50">Date</th>
                                            <th width="50">SI No.</th>  
                                            <th width="200">Name</th>
                                            <th width="80">Amount</th>
                                            <th width="80">Shipping</th>
                                            <th width="70">Payment Status</th>
                                            <th width="130">Action</th>
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


    <div id="emailModal" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="emailModalLabel" class="modal-title">Send Bill Email</h4>
                </div>

                <div class="modal-body">
                     <label class="form-control-label " type="text">Are you sure you want to send an Email?</label>
                     <input type="hidden" id="sino" name="sino" class="sino">
                </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-primary" id="btnSendEmail">Send Email</button>
                                <button type="button" style="float:right;" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_invoicetran.js');?>"></script>
