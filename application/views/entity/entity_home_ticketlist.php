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
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
  
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Customer Ticket Transaction History</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">        
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-3">
                                        <div class="form-group" >
                                            <label class="form-control-label col-form-label-sm">Search Filter</label>
                                            <select class="form-control" name="divsearchfilter" id="divsearchfilter">
                                                <option value="divdate">Search by Date</option>
                                                <option value="dividno">Search by Ticket No.</option>
                                                <option value="divaccount">Search by Account No.</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md col-12">

                                             <div class="form-group divdate" style="display:none;">
                                               <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group " id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-select1" id="datefrom" readonly value="<?=today_text();?>" />
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="input-sm form-control search-input-select2" id="dateto" readonly value="<?=today_text();?>" />
                                                </div>
                                            </div>

                                             <div class="form-group dividno" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Ticket No.</label>
                                                <input type="text" class="input-sm form-control search-input-text idnosearch" data-column="1" id="idnosearch" onkeypress="return isNumberKeyOnly(event)" placeholder="Ticket Number.." />
                                            </div>

                                             <div class="form-group divname" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Name</label>
                                                <input type="text" class="input-sm form-control search-input-text namesearch" data-column="2" id="namesearch"  placeholder="Name.." />
                                            </div>
                                        </div>

                                        <div class="row">
                                             <div class="form-group divaccount" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Account No.</label>
                                                <input type="text" class="input-sm form-control search-input-text accountsearch" data-column="3" id="accountsearch"  placeholder="Account Number.." />
                                            </div>
                                        </div>
                                      <div class="col-lg col-12" style="padding-left: 0">
                                            <div class="pull-right">
                                    <button type="button" class="btn btn-primary searchBtn">Search</button>
                                </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                

                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="100">Date</th>
                                            <th>Ticket No.</th>
                                            <th>Account No.</th>
                                            <th width="500">Name</th>
                                            <th width="100">Status</th>
                                            <th>Type</th>
                                            <th>Created By</th>
                                            <th width="140">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>                            

                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> <!-- col 12 -->                
            </div>
        </div>
    </section>

    <div id="viewTicket" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewTicket">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="lblticket"></h1>
                    <h2 class="lbltrandate lighter"></h2>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">

                                    <div class="row col-lg-12">
                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Ticket Details</label>
                                        </div>

                                        <div class="row col-lg-12">
                                            <h3 class="h3customerName"></h3>
                                        </div>

                                        <div class="col-lg-12">

                                            <div class="row">
                                                <div>
                                                    <label>Branch: </label>
                                                    <br>
                                                    <label>Ticket Type: </label>
                                                    <br>
                                                    <label>Ticket Status: </label>
                                                    <br>
                                                    <label>Created By: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblBranch"></label>   
                                                    <br>
                                                    <label class="lblType"></label>   
                                                    <br>
                                                    <label class="lblStatus"></label>
                                                    <br>
                                                    <label class="lblCreatedby"></label>   
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row col-lg-12 margin-top-20">
                                            <label style="color: gray; font-weight: lighter;">DETAILS</label>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div>
                                                    <p class="parDetails"></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>                                                                                   

                                    <div class="modal-footer">
                                        <div class="form-group row float-right">       
                                            <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                    </div> <!-- modal footer -->
                                
                                </div> <!-- card body -->   
                            </div>
                        </div>
                    </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewIngredientlistModal -->

    <div id="viewTicketResolved" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewTicketResolved">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="lblticketres"></h1>
                    <h2 class="lbltrandateres lighter"></h2>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">

                                    <div class="row col-lg-12">

                                        <div class="col-md-6">

                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Ticket Details</label>
                                        </div>

                                        <div class="row col-lg-12">
                                            <h3 class="h3customerNameres"></h3>
                                        </div>

                                        <div class="col-lg-12">

                                            <div class="row">
                                                <div>
                                                    <label>Branch: </label>
                                                    <br>
                                                    <label>Ticket Type: </label>
                                                    <br>
                                                    <label>Ticket Status: </label>
                                                    <br>
                                                    <label>Created By: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblBranchres"></label>   
                                                    <br>
                                                    <label class="lblTyperes"></label>   
                                                    <br>
                                                    <label class="lblStatusres"></label>
                                                    <br>
                                                    <label class="lblCreatedbyres"></label>   
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row col-lg-12 margin-top-20">
                                            <label style="color: gray; font-weight: lighter;">DETAILS</label>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div>
                                                    <p class="parDetailsres"></p>
                                                </div>
                                            </div>
                                        </div>

                                        </div>


                                        <div class="col-md-6">

                                        <div class="row col-lg-12 margin-top-20">
                                            <label style="color: gray; font-weight: lighter;">Ticket Resolution Details</label>
                                        </div>

                                        <div class="col-lg-12">

                                            <div class="row">
                                                <div>
                                                    <label>Resolved Date: </label>
                                                    <br>
                                                    <label>Resolved By: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblResolveddate"></label>   
                                                    <br>
                                                    <label class="lblResolvedby"></label>   
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row col-lg-12 margin-top-20">
                                            <label style="color: gray; font-weight: lighter;">TICKET RESOLUTION</label>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div>
                                                    <p class="parResDetails"></p>
                                                </div>
                                            </div>
                                        </div>

                                        </div>


                                    </div>                                                                                   

                                    <div class="modal-footer">
                                        <div class="form-group row float-right">       
                                            <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                    </div> <!-- modal footer -->
                                
                                </div> <!-- card body -->   
                            </div>
                        </div>
                    </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewIngredientlistModal -->


<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/entity/customer/customer_ticketlist.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->