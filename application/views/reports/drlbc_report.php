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
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="DR Listing Report (By Warehouse)"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/salesreport/'.$token);?>">Sales Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item active">DR Listing Report (By Warehouse)</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12">
                                    <form> 
                                        <div class="row">
                                            <div class="col-lg-3">
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
                                            <div class="col-lg-4">
                                              <label class="form-control-label col-form-label-sm">Location:</label>
                                              <select class="form-control col-md-8 select2" name="customer" id="location">
                                               <option value="All">--All Location--</option>
                                               <?php foreach ($get_location->result() as $b) { ?>
                                                    <option value="<?= $b->id?>">
                                                        <?php echo ($b->description)?>
                                                    </option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                            <div class="col-lg-4">
                                              <label class="form-control-label col-form-label-sm">Status:&nbsp;&nbsp;</label>
                                              <select class="form-control col-md-8 select2" name="category" id="category">
                                               <option value="none">--Select Void Status--</option>
                                                <option value="all">All</option>
                                                <option value="void">Voided</option>
                                                <option value="notvoid">Not Voided</option>
                                              </select>
                                            </div> 
                                        </div>
                                    </form>   
                                </div>
                            </div>
                            <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO" style="right:20px; position: absolute; top:20px;">Search</button>
                            <div class="card-body table" style="display:none;">
                                <div class="col-md-12">
                                    <div class="form-group row" style="float:right;">
                                        <div>
                                                <form action="<?php echo base_url('main_reports/drlbc_report_export');?>" method="post" target="_blank"> 
                                                <input id="datefrom1" type="text" class="form-control datefrom1" name="datefrom1" hidden >
                                                <input id="dateto1" type="text" class="form-control dateto1" name="dateto1" hidden  >
                                                <input id="category1" type="text" class="form-control category1" name="category1" hidden  >
                                                <input id="location1" type="text" class="form-control location1" name="location1" hidden  >
                                                <button style="float:right;display:none;" type="submit" class="btn btn-default btn-primary printBtn" name="printBtn" id="printBtn"><i class="fa fa-print" aria-hidden="true" ></i> Export</button>
                                                </form>
                                                
                                        </div>     
                                    </div>
                                </div> 
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>DR No.</th>
                                                <th>DR Amount</th>
                                                <th>Shipping</th>
                                                <th>Encoded By</th>
                                                <th>Status</th>
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

    <div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
            <!-- <div class="modal-content modal_content_preloader">
            </div> -->
        </div> 
    </div>  

  
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/reports/drlbc_report.js');?>"></script>

