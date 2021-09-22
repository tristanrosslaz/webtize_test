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
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Franchise Service Receipt Transaction History</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-md-12 row" style="padding: 0">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Select Filter</label>
                                                    <select id="sosearchfilter" class="form-control sosearchfilter">
                                                      <option value="podatediv">Search by Date</option>
                                                      <option value="ponodiv">Search by Franchise Service No</option>
                                                      <!-- <option value="ponostatus">Search by Status</option> -->
                                                      <option value="searchbyName">Search by Name</option>
                                                    </select>              
                                            </div>
                                        </div>
                                        <div class="col-lg col-12">
                                            <div class="form-group">

                                        <div class="podatediv" id="podatediv">
                                            <label class="form-control-label col-form-label-sm">Date</label>
                                             <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" data-column="0" class="input-sm form-control search-input-select1 searchDateTo" value="<?=today_text();?>" name="start" readonly/>
                                                    <span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
                                                    <input type="text" data-column="1" value="<?=today_text();?>" class="input-sm form-control search-input-select2 searchDateFrom" name="end" readonly/>    
                                                </div>   
                                        </div> 
                                        

                                        <div class="ponodiv" id="ponodiv" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Franchise Service No.</label>
                                                <input type="text" data-column="2" class="input-sm form-control search-input-text search_pono" id="search_pono" placeholder="Franchise Service Number.." onkeypress="return isNumberKeyOnly(event)"/> 
                                        </div>

                                        <div class="searchbyName" id="searchbyName" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Customer Name</label>
                                                <input type="text" data-column="4" class="input-sm form-control search-input-text search_customer" id="search_customer" placeholder="Customer Name.." /> 
                                            </div>
                                            <div class="ponostatus" id="ponostatus" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Status</label>

                                                <select id="search_status" data-column="3" class="input-sm form-control material_josh search-input-text search_status" >
                                                      <option selected></option>
                                                      <option value="No Payment">No Payment</option>
                                                      <option value="Partial Payment">Partial Payment</option>
                                                      <option value="Full Payment">Full Payment</option>
                                                    </select> 
                                            </div>
                                        

                                            </div>
                                        </div>
                                        <div class="col-lg col-12" style="padding-right: 0">
                                            <div class="pull-right">
                                                <button type="submit" id="search_order" class="btn btn-primary search_order" style="margin-right: 2px">Search</button>                 
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
                                            <th width="80px">Date</th>
                                            <th width="60px">FSR No</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th width="60px">Action</th>
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
<script type="text/javascript" src="<?=base_url('assets/js/sales/franchise_summary.js');?>"></script>
