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
            <li class="breadcrumb-item active">Inventory Transaction Report</li>
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
                                    <div class="col-lg-4" style="padding-left:10px;">
                                      <label class="form-control-label col-md-4">Inventory:</label>
                                      <select class="form-control col-md-8 select2" name="category" id="category">
                                       <option value="none">--Select Inventory--</option>
                                       <?php foreach ($get_item->result() as $a) { ?>
                                            <option value="<?= $a->id?>">
                                                <?php echo ($a->itemname)?>
                                            </option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="col-lg-4"  style="padding-left:10px;">
                                      <label class="form-control-label col-md-4">Location:</label>
                                      <select class="form-control col-md-8 select2" name="customer" id="location">
                                       <option value="All">--All Location--</option>
                                       <?php foreach ($get_location->result() as $b) { ?>
                                            <option value="<?= $b->id?>">
                                                <?php echo ($b->description)?>
                                            </option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row" style="float:right;">
                                            <div>
                                                    <button style="float:right;display:none;"  class="btn btn-primary printBtn" id="printBtn"><i class="fa fa-print" aria-hidden="true" ></i> Print Report</button>
                                                    <input id="datefrom1" type="text" class="form-control datefrom1"  hidden >
                                                    <input id="dateto1" type="text" class="form-control dateto1" hidden  >
                                                    <input id="category1" type="text" class="form-control category1" hidden  >
                                                    <input id="location1" type="text" class="form-control location1" hidden  >
                                            </div>     
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO" style="right:20px; position: absolute; top:20px;">Search</button>
                            <div class="card-body table" style="display:none;">
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>In</th>
                                                <th>Out</th>
                                                <th>Balance</th>
                                                <th>Location</th>
                                                <th></th>
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

    <div id="viewBuildlistModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left viewBuildlistModal" name="viewBuildlistModal">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="buildNo"></h1>
                    <h2 class="tranDate lighter"></h2>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>

                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="row col-lg-12">
                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Build Information </label>
                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Preperation Date: </label>
                                                    <br>
                                                    <label>Build Date: </label>
                                                    <br>
                                                    <label>Quantity: </label>  
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblprepDate"></label>   
                                                    <br>
                                                    <label class="lblbuildDate"></label>   
                                                    <br>
                                                    <label class="lblQty"></label>     
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Unit: </label> 
                                                    <br>
                                                    <label>Item Name: </label>
                                                    <br>
                                                    <label>Location: </label>  
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblUnit"></label>    
                                                    <br>
                                                    <strong><label class="lblItem"></label></strong>   
                                                    <br>
                                                    <label class="lbllocation"></label>   
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <br>

                                    <div class="table-responsive">
                                        <table class="table  table-striped table-hover table-bordered" id="table-build-view"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Qty</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>                                            

                                    <div class="modal-footer">
                                        <div class="row float-right">       
                                                <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                                <span style="margin: 5px;"></span>
                                                <button type="button" class="btn btn-primary printWin" aria-label="Close">Print</button>
                                        </div>
                                    </div>

                                    </div><!-- card body -->
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div id="viewIngredientlistModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewIngredientlistModal">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="lblAddno"></h1>
                    <h2 class="lblPrep lighter"></h2>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">

                                    <div class="row col-lg-12">
                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Ingredients Addition Build Information</label>
                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Preperation Date: </label>
                                                    <br>
                                                    <label>Build Date: </label>
                                                    <br>
                                                    <label>Ingredients Location: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblprepDate"></label>   
                                                    <br>
                                                    <label class="lblbuildDate"></label>   
                                                    <br>
                                                    <label class="lblingLocation"></label>   
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Build Location: </label>
                                                    <br>
                                                    <label>Encoded By: </label> 
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblbuildLocation"></label>
                                                    <br>
                                                    <label class="lblencoder"></label> 
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="table-responsive margin-top-20">
                                        <table class="table  table-striped table-hover table-bordered" id="table-ingredients-view"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Qty</th>
                                                    <th>Unit</th>
                                                    </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <br>
                                    <!-- NOTES -->
                                    <div class="form-group">
                                        <label class="form-control-label col-md-12">Notes</label>
                                        <textarea class="form-control txtarea" rows="3" placeholder="Notes" readonly="readonly" id="notes"></textarea>
                                    </div>                                                                                       

                                    <div class="modal-footer">
                                        <div class="form-group row float-right">       
                                            <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                            <span style="margin: 5px;"></span>
                                            <button type="button" class="btn btn-info printWin">Print</button>
                                        </div>
                                    </div> <!-- modal footer -->
                                
                                </div> <!-- card body -->   
                            </div>
                        </div>
                    </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewIngredientlistModal -->

    <div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
            <!-- <div class="modal-content modal_content_preloader">
            </div> -->
        </div> 
    </div>  

  
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/reports/it_report.js');?>"></script>

