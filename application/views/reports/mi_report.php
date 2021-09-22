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
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Monthly Inventory Report as of (Rundate)"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
           <!--  <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/inventoryreport/'.$token);?>">Inventory Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item active">Monthly Inventory Report as of (Rundate)</li>
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
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">End Date:</label>
                                                    <input type="text" data-column="0" id="dateto" class="form-control material_josh form-control-sm search-input-text searchDate datepicker" placeholder="mm/dd/yyyy" name="trandate">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                              <label class="form-control-label col-form-label-sm">Warehouse:</label>
                                              <select class="form-control col-md-4 select2" name="customer" id="location">
                                               <option value="All">--All Location--</option>
                                               <?php foreach ($get_location->result() as $b) { ?>
                                                    <option value="<?= $b->id?>">
                                                        <?php echo ($b->description)?>
                                                    </option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                            <div class="col-md-4">
                                              <label class="form-control-label col-form-label-sm">Category:</label>
                                              <select class="form-control col-md-4 select2" name="category" id="category">
                                               <option value="All">--All Category--</option>
                                               <?php foreach ($get_category->result() as $a) { ?>
                                                    <option value="<?= $a->id?>">
                                                        <?php echo ($a->description)?>
                                                    </option>
                                                <?php } ?>
                                              </select>
                                            </div>      
                                        </div>
                                    </form>   
                                </div>
                            </div>
                            <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO" style="right:20px; position: absolute; top:20px;">Search</button>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group row" style="float:right;">
                                        <div>
                                            <button style="float:right;display:none;"  class="btn btn-primary printBtn" id="printBtn"><i class="fa fa-print" aria-hidden="true" ></i> Print Report</button>
                                                <input id="datefrom1" type="text" class="form-control datefrom1" value="<?php echo ($curdate)?>" hidden >
                                                <input id="dateto1" type="text" class="form-control dateto1" value="<?php echo ($curdate)?>" hidden >
                                                <input id="category1" type="text" class="form-control category1" value="<?php echo ($loccat)?>" hidden >
                                                <input id="location1" type="text" class="form-control location1" value="<?php echo ($loccat)?>" hidden >
                                                <input id="searchtype" type="text" class="form-control searchtype" value="none" hidden >
                                                <input id="storage1" type="text" class="form-control storage1" value="<?php echo ($get_date1)?>"hidden >
                                                <input id="storage2" type="text" class="form-control storage2" value="<?php echo ($get_date2)?>"hidden>
                                                <input id="storage3" type="text" class="form-control storage3" value="<?php echo ($get_date3)?>"hidden>
                                                <input id="storage4" type="text" class="form-control storage4" value="<?php echo ($get_date4)?>"hidden>
                                        </div>     
                                    </div>
                                </div> 
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Uom</th>
                                                <th id="date1" class="date1"></th>
                                                <th id="date2" class="date2"></th>
                                                <th id="date3" class="date3"></th>
                                                <th id="date4" class="date4"></th>
                                                <th>Ave</th>
                                                <th>SOH</th>
                                                <th>DTD</th>
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
<script type="text/javascript" src="<?=base_url('assets/js/reports/mi_report.js');?>"></script>

