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
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Cash Voucher Transaction History"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cash Voucher Transaction History</li>
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
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label class="form-control-label col-form-label-sm">Search Filter</label>
                                                <select class="form-control" name="bdsearchfilter" id="cvsearchfilter">
                                                    <option value="cvdatediv">Search by Date</option>
                                                    <option value="cvnodiv">Search by CV No.</option>
                                                    <option value="cvpaydiv">Search by Pay To</option>
                                                    <option value="cvstatdiv">Search by Status</option>
                                                </select>
                                            </div>
                                        </div>

                                         <div class="col-md-3">
                                            <div class="form-group row">
                                            <div class="form-group cvdatediv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-date" value="<?=today_text();?>" id="datefrom" readonly />
                                                    <span class="input-group-addon" style="background-color:#fff; border:none;">to</span>
                                                    <input type="text" class="input-sm form-control search-input-date" value="<?=today_text();?>" id="dateto" readonly/>
                                                </div>
                                            </div>

                                            <div class="form-group cvnodiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">CV Number</label>
                                                    <input type="text" class="input-sm form-control search-input-name" id="cvno" onkeypress="return isNumberKeyOnly(event)" placeholder="CV Number.." />
                                                </div>

                                             <div class="form-group cvstatdiv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Date and Check Status</label>
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-date" value="<?=today_text();?>" id="datefrom1" readonly />
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="input-sm form-control search-input-date" id="dateto1" value="<?=today_text();?>" readonly/>
                                                </div>
                                                <br>
                                              
                                                <!-- <label class="form-control-label col-form-label-sm">Status</label> -->
                                                <select class="form-control" name="cvstatus" id="cvstatus">
                                                    <option value="" selected</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Full Allocation">Full Allocation</option>
                                                    <option value="Partial">Partial Allocations</option>
                                                    <option value="Settled">Settled</option>
                                                    <option value="Waiting for Approval">Waiting for Approval</option>
                                                </select>
                                            </div>

                                                

                                            <div class="form-group cvpaydiv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Pay To</label>
                                                <input type="text" class="input-sm form-control search-input-name" id="payto"  placeholder="Pay to.." />
                                            </div>

                                        </div>
                                    </div>

                                  <!--   <div class="col-md-5">
                                        <div class="form-group row" style="float:right;">
                                            <div>
                                               
                                            </div>     
                                        </div>
                                    </div>  -->

                                    <div class="form-group-material float-right" style="right:0px; position: absolute;">    
                                                 <button type="button" class="btn btn-default btn-primary btnSearchCV" id="btnSearchCV">Search</button>
                                        </div>



                                    <input type="text" class="form-control form-control-sm" id="token" name="token"  value="<?php echo $token ?>" hidden>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="80">Date</th>
                                            <th width="80">CV No.</th>
                                            <th>Pay To</th>
                                            <th>Released Amount</th>
                                            <th>Actual Amount</th>
                                            <th width="110">Status</th>
                                            <th width="140">Action</th>
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


    <div id="viewBDModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Cash Voucher View</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            
                                    <div class="form-group row">
                                        <h1><label class="col-md-12 form-control-label" id="info_fullname" type="text" ></label></h1> 
                                        
                                        <label class="col-md-12 form-control-label" id="info_funds" type="text" ></label>
                                        <label class="col-md-12 form-control-label" id="info_status" type="text" ></label>
                                        <label class="col-md-12 form-control-label" id="info_create" type="text" ></label>
                                        <label class="col-md-12 form-control-label" id="info_app" type="text" ></label>
                                        <div class="form-group row">
                                            <h1><label class=" form-control-label" style="right:20px; position: absolute; top:-10px;" id="info_cvno"></label></h1>

                                            <label class=" form-control-label" style="right:20px; position: absolute; top:10px;" id="info_trandate"></label>
                                        </div>
                                     </div> 

                                    <div class="form-group row"> 
                                    </div> 
                  
                            </div>
                        </div>

                        
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table table-hover table-hover table-striped" id="table-grid1"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Details</th>
                                            <th width="120">Release Account</th>
                                            <th width="120">Actual Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="row">
                                <label class="col-md-12 form-control-label" id="info_notes" type="text" ></label>
                            </div>    
                        

                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
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
<script type="text/javascript" src="<?=base_url('assets/js/account/cashvoucher_tran.js');?>"></script>

