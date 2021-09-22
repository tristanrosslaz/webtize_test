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
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">FSR Collection Transaction History</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-md-12 row">
                                   <div class="col-lg-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Select Filter</label>
                                                    <select id="sosearchfilter" class="form-control sosearchfilter">
                                                      <option value="podatediv">Search by Date</option>
                                                      <option value="ponodiv">Search by ID No</option>
                                                    </select>              
                                            </div>
                                        </div>
                                        <div class="col-md col-12">
                                        <div class="form-group podatediv" id="podatediv">
                                            <label class="form-control-label col-form-label-sm">Date</label>
                                             <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" data-column="0" class="input-sm form-control material_josh search-input-select1 searchDateTo" value="<?=today_text();?>" name="start" readonly/>
                                                    <span class="input-group-addon" style="background-color:#fff; border:none;">to</span>
                                                    <input type="text" data-column="1" value="<?=today_text();?>" class="input-sm form-control material_josh search-input-select2 searchDateFrom" name="end" readonly/>    
                                                </div>   
                                                </div>
                                                <div class="form-group ponodiv" id="ponodiv" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">ID No.</label>
                                                <input type="text" data-column="2" class="input-sm form-control material_josh search-input-text search_pono" id="search_pono" placeholder="ID Number.." /> 
                                            </div>

                                            <div class="form-group ponostatus" id="ponostatus" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Status</label>

                                                <select id="search_status" data-column="3" class="input-sm form-control material_josh search-input-text search_status" >
                                                      <option selected></option>
                                                      <option value="No Allocation">No Allocation</option>
                                                      <option value="Partial Allocation">Partial Allocation</option>
                                                      <option value="Full Allocation">Full Allocation</option>
                                                    </select> 
                                            </div>
                                            
                                        </div>

                                        <div class="col-lg col-12" style="padding-left: 0">
                                            <div class="pull-right">
                                                <button type="submit" id="search_order" class="btn btn-primary search_order" style="margin-right: 2px">Search</button>                            
                                            </div>
                                        </div>


                                </div>
                                  
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                                  
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
                                            <th>Payment Status</th>
                                            <th width="90px">Action</th>
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
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/fsr_collection_summary.js');?>"></script>
