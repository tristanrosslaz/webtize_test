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
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Bank Deposit Transaction History"> 
     <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Bank Deposit Transaction History</li>
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

                                        <div class="col-lg-3">
                                            <div class="form-group" >
                                                <label class="form-control-label col-form-label-sm">Search Filter</label>
                                                <select class="form-control" name="bdsearchfilter" id="bdsearchfilter">
                                                    <option value="bddatediv">Search by Date</option>
                                                    <option value="bdnodiv">Search by Deposit No.</option>
                                                    <option value="bdtypediv">Search by Account</option>
                                                    <option value="bdtype2div">Search by Type</option>
                                                </select>
                                            </div>
                                        </div>

                                         <div class="col-lg-4">
                                            <div class="form-group row">
                                            <div class="form-group bddatediv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group " id="datepicker">
                                                <input type="text" class="input-sm form-control search-input-date" id="datefrom" readonly value="<?=today_text();?>" />
                                                <span class="input-group-addon" style="background-color:#fff; border:none; margin: 3px">to</span>
                                                <input type="text" class="input-sm form-control search-input-date" id="dateto" readonly value="<?=today_text();?>" />
                                                </div>
                                            </div>

                                            <div class="form-group bdnodiv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Deposit Number</label>
                                                <input type="text" class="input-sm form-control search-input-name" id="depno" onkeypress="return isNumberKeyOnly(event)" placeholder="Deposit Number.." />
                                            </div>

                                            <div class="form-group bdtypediv" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Account</label>
                                                <select class="form-control bdtype" id="bdtype">
                                                    <option selected=""><option>
                                                    <?php $result = $get_account->result_array();

                                                    foreach($result as $account){?>
                                                    <option value="<?=$account['description']?>"><?php echo $account['description']; ?></option>
                                                    <?php } ?>
                                                    <select>
                                            </div>

                                            <div class="form-group bdtype2div" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Type</label>
                                                <input type="text" class="input-sm form-control bdtype2" id="bdtype2"  placeholder="Type.." />
                                            </div>

                                        </div>
                                    </div>

                                  <!--   <div class="col-md-5">
                                        <div class="form-group row" style="float:right;">
                                            <div>
                                                <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO">Search</button>
                                            </div>     
                                        </div>
                                    </div>    -->

                                    <div class="form-group-material float-right" style="right:0px; position: absolute;">    
                                                 <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO">Search</button>
                                    </div>             


                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="80">Deposit No.</th>
                                            <th width="80">Sales Date</th>
                                            <th>Type</th>
                                            <th>Account</th>
                                            <th>Amount</th>
                                            <th width="110">Transaction Date</th>
                                          <!--   <th width="80"></th> -->
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
                    <h4 id="exampleModalLabel" class="modal-title">Bank Deposit View</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            
                                    <div class="form-group row">
                                        <h1><label class="col-md-12 form-control-label" id="info_fullname" type="text" ></label></h1> 
                                       

                                        <div class="form-group row">
                                            <h1><label class=" form-control-label" style="right:20px; position: absolute; top:-50px;" id="info_depno"></label></h1>

                                            <label class=" form-control-label" style="right:20px; position: absolute; top:5px;" id="info_trandate"></label>
                                        </div>
                                     </div> 

                                    <div class="form-group row"> 
                                      <!--   <label class="col-md-12" form-control-label" id="info_branch" type="text" ></label>
                                        <label class="col-md-12" form-control-label" id="info_cont" type="text" ></label>
                                        <label class="col-md-12" form-control-label" id="info_address" type="text" ></label> -->
                                    </div> 
                  
                            </div>
                        </div>

                        
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table table-hover table-hover table-striped" id="table-grid1"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="100">Sales Date</th>
                                            <th>Type</th>
                                            <th>Account</th>
                                            <th>Amount</th>
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
<script type="text/javascript" src="<?=base_url('assets/js/account/bankdeposit_tran.js');?>"></script>

