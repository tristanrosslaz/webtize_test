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
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cash On Hand Transaction History</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class=""> -->
                            <div class="card-header d-flex align-items-center">

                                <div class="col-lg-12">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label class="form-control-label col-form-label-sm">Search Filter</label>
                                                <!-- <input type="text" class="form-control" value="Search by Date" readonly="readonly"> -->
                                                <!-- <input type="hidden" id="cohsearchfilter" name="cohsearchfilter" value="cohdatediv"> -->
                                                <select class="form-control" name="cohsearchfilter" id="cohsearchfilter">
                                                    <option value="cohdatediv">Search by Date</option>
                                                    <option value="cohencashdiv">Search by Encashment Check</option>
                                                    <option value="cohencodeddiv">Search by Encoded By</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group row">

                                                <div class="form-group cohdatediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom" readonly value="<?=today_text();?>" />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto" readonly value="<?=today_text();?>" />
                                                    </div>
                                                </div>

                                                 <div class="form-group cohencashdiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Enchasment Check</label>    
                                                        <input type="text" class="input-sm form-control enchashment" id="enchashment" />
                                                </div>

                                                <div class="form-group cohencodeddiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Encoded By</label>    
                                                        <input type="text" class="input-sm form-control encodedby" id="encodedby" />
                                                </div>

                                            </div>
                                        </div>

                                        <!-- <div class="col-md-5">
                                            <div class="form-group row" style="float:right;">
                                                <div>
                                                    <button type="button" style="float:left; margin-left:0px;" class="btn btn-default btn-primary btnSearchCOH" id="btnSearchCOH">Search</button>
                                                </div>     
                                            </div>
                                        </div> -->

                                         <div class="form-group-material float-right" style="right:0px; position: absolute;">    
                                                 <button type="button"  class="btn btn-default btn-primary btnSearchCOH" id="btnSearchCOH">Search</button>
                                        </div> 

                                    </div>
                                </div>
                                
                            </div>
                        <!-- </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="90">Date</th>
                                            <th>Cash On Hand</th>
                                            <th>Encashment Check</th>
                                            <th>Encoded By</th>
                                            <th width="70">Status</th>
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
<script type="text/javascript" src="<?=base_url('assets/js/account/cash_on_hand_history.js');?>"></script>