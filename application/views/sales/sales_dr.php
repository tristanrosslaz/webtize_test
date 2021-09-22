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
    <!-- Breadcrumb-->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Delivery Receipt</li>
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
                                            <div class="form-group" >
                                             <label class="form-control-label col-form-label-sm">Select Filter</label>
                                             <select class="form-control" name="searchfilter" id="searchfilter">
                                                 <option value="datediv">Search by Date</option>
                                                 <option value="nodiv">Search by SO No.</option>
                                                 <option value="statusdiv">Search by DR Status</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group datediv">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-date datepicker" id="datefrom" value="<?=today_text();?>" readonly />
                                                    <span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
                                                    <input type="text" class="input-sm form-control search-input-date datepicker-before" id="dateto" value="<?=today_text();?>" readonly/>
                                                </div>
                                            </div>

                                            <div class="form-group nodiv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">SO No. </label>
                                                <input type="text" class="input-sm form-control search-input-text allownumericwithoutdecimal" id="searchNo" placeholder="123456" />
                                            </div>

                                            <div class="form-group statusdiv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Status </label>
                                                <select class="form-control input-lg search-input-status" data-column="3" name="searchStatus" id="searchStatus">
                                                   <option value="">Select Status</option>
                                                   <option value="Converted to DR">Converted to DR</option>
                                                   <option value="Waiting for Conversion">Waiting for Conversion</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-lg col-12" style="padding-left: 0">
                                            <div class="pull-right">
                                                <!-- label is used to level it with the input. It is styled invisible -->
                                                <button type="button" class="btn btn-default btn-primary btnSearch" id="btnSearch">Search</button>
                                            </div>  
                                        </div>

                                        <?php
                                            $searchArray = explode('|', $this->session->userdata('search'));
                                            if ($searchArray[0] == "DR") { // check first if the session data is meant for PO Approval ?>
                                                <span id="hdnSearch" hidden=""><?=$searchArray[1];?></span>
                                                <span id="hdnDatefrom" hidden=""><?=$this->session->userdata('datefrom');?></span>
                                                <span id="hdnDateto" hidden=""><?=$this->session->userdata('dateto');?></span>
                                                <span id="hdnSono" hidden=""><?=$this->session->userdata('sono');?></span>
                                                <span id="hdnDRStatus" hidden=""><?=$this->session->userdata('drstatus');?></span>
                                        <?php }
                                            else { ?>
                                                <span id="hdnSearch" hidden=""></span>
                                                <span id="hdnDatefrom" hidden=""></span>
                                                <span id="hdnDateto" hidden=""></span>
                                                <span id="hdnSono" hidden=""></span>
                                                <span id="hdnDRStatus" hidden=""></span>
                                            <?php }
                                            $array_items = array('search', 'datefrom', 'dateto', 'sono', 'drstatus');
                                            $this->session->unset_userdata($array_items);
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="50">Date</th>
                                            <th width="50">SO No.</th>
                                            <th>Name</th>
                                            <th width="70">Shipping</th>
                                            <th width="150">DR Status</th>
                                            <th width="110">Action</th>
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

    <div id="viewDRModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Direct Sales View</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            
                                <div class="form-group row">
                                    <h1><label class="col-md-12 form-control-label" id="info_fullname" type="text" ></label></h1> 
                                   

                                    <div class="form-group row">
                                        <h1><label class=" form-control-label" style="right:20px; position: absolute; top:-25px;" id="info_sono"></label></h1>

                                        <label class=" form-control-label" style="right:20px; position: absolute; top:10px;" id="info_trandate"></label>
                                    </div>
                                 </div> 

                                <div class="form-group row"> 
                                    <label class="col-md-12" form-control-label" id="info_branch" type="text" ></label>
                                    <label class="col-md-12" form-control-label" id="info_cont" type="text" ></label>
                                    <label class="col-md-12" form-control-label" id="info_address" type="text" ></label>
                                </div> 
									
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-hover table-striped" id="table-grid1"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Unit</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td class="text-right form-control-label" colspan="5"><strong>Subtotal</strong></td>
                                        <td><span class="subtotalspan"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right form-control-label" colspan="5"><strong>Shipping</strong></td>
                                        <td><span class="freightspan"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right form-control-label" colspan="5"><h4>Total</h4></td>
                                        <td><b><span class="gtotalspan"></span><b></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Back</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="viewDRModal1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delivery Receipt View</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            
                                    <div class="form-group row">
                                        <h1><label class="col-md-12 form-control-label" id="uinfo_fullname" type="text" ></label></h1> 
                                       

                                        <div class="form-group row">
                                            <h1><label class=" form-control-label" style="right:20px; position: absolute; top:-25px;" id="uinfo_sono"></label></h1>

                                            <label class=" form-control-label" style="right:20px; position: absolute; top:10px;" id="uinfo_trandate"></label>
                                        </div>
                                     </div> 

                                    <div class="form-group row"> 
                                        <label class="col-md-12" form-control-label" id="uinfo_branch" type="text" ></label>
                                        <label class="col-md-12" form-control-label" id="uinfo_cont" type="text" ></label>
                                        <label class="col-md-12" form-control-label" id="uinfo_address" type="text" ></label>
										<input type="text" class="drno_value" id="drno_value" hidden />
                                    </div> 

                            </div>
                        </div>

                        
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table table-hover table-hover table-striped" id="table-grid3"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <tr>
                                            <td class="text-right form-control-label" colspan="5"><strong>Subtotal</strong></td>
                                            <td><span class="usubtotalspan"></span></td>
                                            </tr>
                                            <tr>
                                            <td class="text-right form-control-label" colspan="5"><strong>Shipping</strong></td>
                                            <td><span class="ufreightspan"></span></td>
                                            </tr>
                                            <tr>
                                            <td class="text-right form-control-label" colspan="5"><h4>Total</h4></td>
                                            <td><b><span class="ugtotalspan"></span><b></td>
                                            </tr>
                                    </tfoot>
                                </table>
                            </div>
                        

                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
								<button style="float:right" class="btn btn-primary printDR"><i class="fa fa-print" aria-hidden="true" ></i> Print Direct Sales</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Back</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="releaseRDRModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="exampleModalLabel" class="modal-title">Release Delivery Receipt Transaction</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="view_officerpersonalinfo-form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            
                                    <div class="form-group row">
                                        <h1><label class="col-md-12 form-control-label" id="uinfo_fullname" type="text" ></label></h1> 
                                       

                                        <div class="form-group row">
                                            <h1><label class=" form-control-label" style="right:20px; position: absolute; top:-25px;" id="uinfo_sono"></label></h1>

                                            <label class=" form-control-label" style="right:20px; position: absolute; top:10px;" id="uinfo_trandate"></label>
                                        </div>
                                     </div> 

                                    <div class="form-group row"> 
                                        <label class="col-md-12" form-control-label" id="uinfo_branch" type="text" ></label>
                                        <label class="col-md-12" form-control-label" id="uinfo_cont" type="text" ></label>
                                        <label class="col-md-12" form-control-label" id="uinfo_address" type="text" ></label>
                                    </div> 
                                    <input type="text" class="input-sm form-control" id="info_drno"  hidden />

                                    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <h3><label class="col-md-12" form-control-label" type="text" ><b>Direct Sales</b></label></h3>
                            <!-- <table class="table table-striped table-hover"> -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-hover table-striped" id="table-grid0"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Remaining Qty</th>
                                                <th>Released Qty</th>

                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                             <div class="col-lg-6">
                                <h3><label class="col-md-12" form-control-label" type="text" ><b>Release</b></label></h3>
                                <div class="table-responsive">
                                    <table class="table table-hover table-hover table-striped" id="table-grid00"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                             </div>
                        </div>    
                        

                    </div>
                 
                      
                   
                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" id="cancel_btn" data-dismiss="modal" aria-label="Close">Close</button>

                                <!-- <button type="button" style="float:right; margin-right:10px;" class="btn btn-default btn-info btnConvertDr" id="btnConvertDr">Release</button> -->
                               <!--  <button type="button" style="float:right; margin-right:10px;" class="btn btn-default btn-info notifRelease" id="notifRelease" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#NotifInvModal">Release</button> -->

                               <button type="button" style="float:right; margin-right:10px;" class="btn btn-default btn-info" onclick="dispalyNotif();" id="">Release</button> 



                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default testBtn" hidden>Testing!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="NotifInvModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Confirmation</h4>
                </div>
                <form class="form-horizontal personal-info-css" data-toggle="validator" role="form" id="forminv">
                    <div class="modal-body">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-lg-12">
                                <div class="row">

                                    <label class="form-control-label " type="text">Are you sure you want to release the following items?<span class="asterisk" style="color:red">*</span></label>
                                    <input type="hidden" id="id_rec">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">No</button>
                                    <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-success btnConvertDr">Yes</button>

                                


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_dr.js');?>"></script>
