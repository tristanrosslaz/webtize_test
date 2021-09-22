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
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Expense History Report"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/expensereport/'.$token);?>">Expense Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item active">Expense History Report</li>
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
                                    <br>
                                    <div class="row" style="padding-top: 30px;">

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <form action="<?php echo base_url('main_reports/eh_report_export');?>" method="post" target="_blank">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-date datefrom" id="date1" name= "date1" value="" readonly />
                                                    <span class="input-group-addon"> to </span>
                                                    <input type="text" class="input-sm form-control search-input-date dateto" id="date2" name= "date2" value="" readonly/>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Account</label>
                                                 <select class="form-control search-input-status select2" data-column="0" name="statfilter" id="statfilter" style="width: 50px">
                                                    <option value="All"> All GL Account </option>
                                                    <?php foreach ($gl_accounts->result() as $row) { ?>
                                                    <option value="<?= $row->id?>">
                                                        <?php echo ($row->description)?>
                                                    </option>
                                                    <?php } ?>
                                                 </select>
                                            </div>
                                        </div>

                                        <!-- <button type="button" class="btn btn-primary" id="searchBtn" style="right:20px; position: absolute; top:20px;">Search</button> -->

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                            <button type="button" class="btn btn-default btn-primary btnSearchSO" id="searchBtn" style="right:20px; position: absolute; top:20px;">Search</button>
                        <div class="card-body tbl1">
                             <div class="col-md-12">
                                    <div class="form-group row" style="float:right;">
                                        <div>
                                                <button style="float:right;display:none;" type="submit" class="btn btn-default btn-primary printBtn" name="printBtn" id="printBtn"><i class="fa fa-print" aria-hidden="true" ></i>Export</button>
                                        </div>     
                                    </div>
                                </div>
                            
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%" hidden>
                                    <thead>
                                        <tr>
                                            <th>Pay to</th>
                                            <th>GL account</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Reference no.</th>
                                            <th>Amount</th>
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

    <div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
            <!-- <div class="modal-content modal_content_preloader">
            </div> -->
        </div> 
    </div>  


<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/reports/eh_report.js');?>"></script>

