  <style> .col-md-6.form-collect{
    margin: auto !important;
    width: 50% !important;     
    background-color: #f5f5f5 !important;   
    padding: 25px !important; 
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;} </style>

    <div class="content-inner" id="pageActive" data-num="7" data-namecollapse="#" data-labelname="Cash Voucher"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/cashvoucher_transaction/'.$token);?>">Cash Voucher Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">APV Allocate through Cash Voucher</li>
        </ol>
    </div>

    <section class="tables" id = "collection_id_sec" class="collection_id_sec" name = "collection_id_sec" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="list-group-item active card-header d-flex align-items-center">
                               
                                    <h4 style="float:left; margin-left:10px;">Cash Voucher#<?php echo $cvno ?></h4>
                               
                            </div>

                               <form id="form1">
                                 <div class="card-body">
                                     <div class="row" style="margin-bottom: 20px;">
                                         <div class="col-md-8 text-uppercase text-primary"><h4 style="margin-top: 8px;"><i class="fa fa-user"></i> <?php echo strtoupper($get_suppinfo->suppliername)?></h4>
                                      </div>
                                      <div class="col-md-4" style="text-align: right;"> 
                                          <button class="btn btn-primary pull-right" id="allocatecvBtn" disabled type="button">Allocate Now</button></div>
                                      </div>
                                 <div class="form-group row">
                                    <div class="col-md-4">
                                            <ul class="list-group">
                                              <li class="list-group-item active">Collection Details</li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Total
                                                <span class="badge badge-warning badge-pill"><?php echo number_format($get_cvinfo->actualamt,2) ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Balance
                                                <span class="badge badge-warning badge-pill"><?php echo number_format($balance,2) ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Allocation
                                                <span class="badge badge-warning badge-pill" id="allocLabel">0.00</span>
                                              </li>
                                            </ul>
                                    </div>

                                    <input value="<?php echo $cvno ?>" type="hidden"  name="cvno" id="cvno" />
                                    <input value="<?php echo $supid ?>" type="hidden"  name="supid" id= "supid" />
                                    <input value="<?php echo $token ?>" type="hidden" name="token" id="token" />
                                    <input value="0" type="hidden" name="isGood" id="isGood" />
                                    <input value="<?php echo $balance ?>" type="" id="popaybalance" name="popaybalance" hidden/>

                                            
                                <div class="col-md-8">
                                  <h2 class="text-center" style="margin-right:250px" hidden id="loadingImg" > 
                                       <img height="100px" style="position: absolute;margin-top: 80px" class="loadingImg" src="<?=base_url('assets/img/loader.gif');?>">
                                  </h2>
                                    <div class="form-group p-style">
                                            <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                              <thead>
                                                  <tr>  
                                                      <th>Date</th>
                                                      <th>PO No</th>
                                                      <th>Balance</th>
                                                      <th style="width: 200px;">Amount</th>
                                                  </tr>
                                              </thead>
                                            </table>
                                      </div>               
                                </div>
                              </div>
                            </div>
                          </form>
            
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div id="confirmModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="exampleModalLabel" class="modal-title">Confirmation</h4>
            </div>
                <div class="modal-body">
                    <div class="card-header d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="row">

                                <label class="form-control-label " type="text">Are you sure you want to allocate this to expenses?</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">No</button>
                                <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-success btnSaveExpenses" id="btnConvert">Yes</button>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

    

<div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
    <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
        <div class="modal-content modal_content_preloader">
        </div>
    </div> 
</div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/account/cashvoucher_allocatedetailspo.js');?>"></script>
