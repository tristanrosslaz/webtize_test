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
tr td:nth-child(4) { text-align: right; }
</style>
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Inventory Consumption Report (By Category)"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/inventoryreport/'.$token);?>">Inventory Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item active">Inventory Consumption Report (By Category)</li>
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
                                    <!-- <form action="<?php echo base_url();?>Main_reports/ilt_listing_export" method="post" target="_blank">  -->
                                    <form> 

                                        <div class="row">
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
                                            <div class="col-md-4">
                                              <label class="form-control-label col-md-4">Category:</label>
                                              <select class="form-control col-md-4 select2" name="category" id="category">
                                               <option value="All">--All Category--</option>
                                               <?php foreach ($get_category->result() as $a) { ?>
                                                    <option value="<?= $a->id?>">
                                                        <?php echo ($a->description)?>
                                                    </option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                            <div class="col-md-4">
                                              <label class="form-control-label col-md-4">Location:</label>
                                              <select class="form-control col-md-4 select2" name="customer" id="location">
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
                                    </form>   
                                </div>
                            </div>
                            <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO" style="right:20px; position: absolute; top:20px;">Search</button>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Description</th>
                                                <th>Unit</th>
                                                <th>Total</th>
                                                <th>Location</th>
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
<script type="text/javascript" src="<?=base_url('assets/js/reports/icr_by_category.js');?>"></script>

