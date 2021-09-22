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
<style>
.bddatediv{
    margin-left: 5px;
}
.datetotext{
    margin: 5px;
}
</style>
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="ILT Listing Report"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/inventoryreport/'.$token);?>">Inventory Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item active">Received Items Summary Report</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12 row margin-top-20">
                                    <div class="col-md-3 col-sm-8">
                                        <div class="form-group row">
                                            <div class="form-group bddatediv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group " id="datepicker">
                                                <input type="text" class="input-sm form-control search-input-date" id="datefrom" readonly />
                                                <span class="datetotext">to</span>
                                                <input type="text" class="input-sm form-control search-input-date" id="dateto" readonly/>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding-left:10px;">
                                        <label class="form-control-label col-form-label-sm">Supplier:</label>
                                        <select class="form-control col-md-8 select2" name="category" id="category">
                                            <option value="none">--Select Supplier--</option>
                                            <?php foreach ($get_supplier->result() as $a) { ?>
                                                <option value="<?= $a->id?>">
                                                    <?php echo ($a->suppliername)?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="padding-left:10px;">
                                        <label class="form-control-label col-form-label-sm">Search Type:</label>
                                        <select class="form-control col-md-8 select2" name="location" id="location">
                                            <option value="none">--Select Search Type-</option>
                                            <option value="ListItem">List by Item</option>
                                            <option value="ListDate">List by Date</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO" style="right:20px; position: absolute; top:20px;">Search</button>
                            <div class="card-body lbi" style="display:none;">
                                <div class="col-md-12">
                                    <div class="form-group row" style="float:right;">
                                        <div>
                                            <button style="float:right;display:none;"  class="btn btn-primary printBtn" id="printBtn"><i class="fa fa-print" aria-hidden="true" ></i> Print Report</button>
                                            <input id="datefrom1" type="text" class="form-control datefrom1"  hidden >
                                            <input id="dateto1" type="text" class="form-control dateto1" hidden  >
                                            <input id="category1" type="text" class="form-control category1" hidden  >
                                        </div>     
                                    </div>
                                </div> 
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>PO No.</th>
                                                <th>Receive No.</th>
                                                <th>Ref No.</th>
                                                <th>Date</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Item Name</th>
                                                <th>Item Category</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body lbd" style="display:none;">
                                    <div class="col-md-12">
                                        <div class="form-group row" style="float:right;">
                                            <div>
                                                <button style="float:right;display:none;"  class="btn btn-primary printBtn" id="printBtn"><i class="fa fa-print" aria-hidden="true" ></i> Print Report</button>
                                            </div>     
                                        </div>
                                    </div> 
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid2" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Receive No.</th>
                                                <th>Date</th>
                                                <th>Quantity</th>
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

    <div id="poReceiveModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">PO Receive Form</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-md-4">Purchase Order #<H1 class="m_rcvno"></H1></label>
                                            <p><br></p>
                                        </div>  
                                        <div class="row">
                                            <span type="text" class="col-md-4 m_itemtrandate"></span>
                                            <p><br></p>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-4">Purchase From </label>
                                        </div>  

                                        <div class="row">
                                            <H2><span type="text" class="col-md-4 suppliername"></span></H2>
                                        </div>  

                                        <div class="row">
                                            <label class="col-md-4">PO No.: </label>
                                            <span type="text" class="col-md-8 m_pono" style="border:none;" disabled></span>
                                        </div>  

                                        <div class="row">
                                            <label class="col-md-4">Po Date: </label>
                                            <span type="text" class="col-md-8 m_potrandate" style="border:none;" disabled></span>
                                        </div>  

                                        <div class="row">
                                            <label class="col-md-4">Supplier Ref. No.: </label>
                                            <span type="text" class="col-md-8 m_suprefno" style="border:none;" disabled></span>
                                        </div>  
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered" id="table-grid3" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Received Date</th>
                                                    <th>Received Qty</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <p id="printedText" style="float:left; margin-left:10px; color: red;"><i>This document has already been printed.</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
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
<script type="text/javascript" src="<?=base_url('assets/js/reports/ris_report.js');?>"></script>

