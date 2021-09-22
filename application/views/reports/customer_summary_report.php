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
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
<!--             <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/entityreport/'.$token);?>">Entity Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item active">Customer Summary Report</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo base_url('main_reports/customer_summary_report_export');?>" method="post">
                    <div class="card"> 
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm" data-column="6">Select Filter</label>
                                                    <select id="statfilter" class="form-control statfilter">
                                                        <option value="all">All</option>
                                                      <option value="namediv">Search by Name</option>
                                                      <option value="addressdiv">Search by Address</option>
                                                    </select>              
                                            </div>
                                        </div>

                                            <div class="form-group namediv" id="namediv" style="display:none">
                                                <label class="form-control-label col-form-label-sm">Customer Name</label>
                                                <input type="text" data-column="4" class="input-sm form-control search-input-text search_customer" id="search_customer" placeholder="Customer Name.." name="search_customer" /> 
                                            </div>

                                            <div class="form-group addressdiv" id="addressdiv" style="display:none">
                                                <label class="form-control-label col-form-label-sm">Address</label>
                                                <input type="text" data-column="5" class="input-sm form-control search-input-text search_address" id="search_address" placeholder="Address.." name="search_address"/> 
                                            </div>

                                    <!-- <div class="row" style="padding-top: 30px;">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                
                                                <label class="form-control-label col-form-label-sm">Select</label>
                                                 <select class="form-control search-input-status select2" data-column="0" name="statfilter" id="statfilter" style="width: 50px">
                                                 
                                                    <option value="all">All</option>
                                                    <option value="TEMPORARY CLOSED">Temporary Closed</option>
                                                    <option value="TERMINATED">Terminated</option>
                                                    <option value="CART SWAPPING">Cart swapping</option>
                                                    <option value="SAFE KEEP">Safe Keep</option>
                                                    <option value="FOR PULL OUT">For pull out</option>
                                                    <option value="NO RECORD">No record</option>
                                                    <option value="NO RESPONSE">No response</option>
                                                    <option value="TRANSFER OF OWNERSHIP">Transfer of ownership</option>

                                                    <option value="FOR RELOCATION">For relocation</option>
                                                    <option value="CART WITH JCWFI">Cart with JCWFI</option>
                                                    
                                                 </select>
                                            </div>
                                        </div>
                                    </div> -->

                            </div>
                     
                        <button type="button" class="btn btn-default btn-primary" id="searchBtn" style="right:20px; position: absolute; top:20px;">Search</button>
                        <div class="card-body">
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Branch</th>
                                            <th>Contact No.</th>
                                            <th width="90px">Credit Term</th>
                                            <th>Area</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                         </form>
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
<script type="text/javascript" src="<?=base_url('assets/js/reports/customer_summary_report.js');?>"></script>

