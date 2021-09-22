  <style> .col-md-6.form-collect{
    margin: auto !important;
    width: 50% !important;     
    background-color: #f5f5f5 !important;   
    padding: 25px !important; 
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;} .datepicker {
    z-index:99999 !important;
    }
 </style>
    <div class="content-inner" id="pageActive" data-num="7" data-namecollapse="#" data-labelname="Cash Voucher"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/check_transaction_history/'.$token);?>">Check Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Check Allocate</li>
        </ol>
    </div>

    <section class="tables" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Check Information</h6>
                      <div class="card-header d-flex align-items-center">
                          <h4 style="float: left;">Check  # <?php echo $get_chkinfo->chkno ?></h4>
                      </div>
                      <div class="card-body">
                          <div class="form-group row">
                              <div class="col-md-6">

                                <div class="form-group p-style">
                                  <div class="row">
                                        <div class="col-md-3">Pay To: </div>
                                        <div class="col-md-8"><?php 
                                      
                                          echo strtoupper($get_chkinfo->idno);
                                      

                                         ?></div>
                                      </div>

                                   <div class="row">
                                        <div class="col-md-3">Date: </div>
                                        <div class="col-md-8"><?php echo $get_chkinfo->chkdate ?></div>
                                   </div>

                                  <!--  <div class="row">
                                        <div class="col-md-3">Funds From: </div>
                                        <div class="col-md-8"><?php echo $get_chkinfo->fundsdate ?></div>
                                   </div> -->

                                   <div class="row">
                                        <div class="col-md-3">Amount: </div>
                                        <div class="col-md-8"><?php echo number_format($get_chkinfo->amount,2) ?></div>
                                        <input value="<?php echo $get_chkinfo->amount ?>" type="hidden"  name="tranamt" id="tranamt" />
                                   </div>
                                   <?php if($get_chkinfo->notes == ""){
                                    }else{?>
                                   <div class="row">
                                        <div class="col-md-3">Details: </div>
                                        <div class="col-md-8"><?php echo $get_chkinfo->notes ?></div>
                                   </div>
                                   <?php } ?>
                                </div>    

                              </div>
                          </div>
                          <hr>
                          <div class="table-responsive">
                            <div class="form-group row" style="float: right;margin-right: 0px;top:20px;">         
                              <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addGLModal" class="btn btn-primary adddetails" id="adddetails" ><i class="fa fa-plus"></i>Add Row</button>
                            </div>

                            <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="cvno" name="cvno" onkeypress="return isNumberKeyOnly(event)" value="<?php echo $get_chkinfo->chkno ?>" hidden>

                             <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="token" name="token"  value="<?php echo $token ?>" hidden>

                             <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="origamt" name="origamt"  value="<?php echo $get_chkinfo->amount ?>" hidden>

                             <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="diffamt" name="diffamt"  value="<?php echo $get_chkinfo->amount ?>" hidden>

                            <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="payto" name="payto"  value="<?php echo $get_chkinfo->supid ?>" hidden>


                              <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                  <thead>
                                      <tr>
                                          <th width="90">Date</th>
                                          <th>Description</th>
                                          <th width="120">Amount</th>
                                          <th>GL Account</th>
                                          <th width="50"></th>
                                      </tr>
                                  </thead>
                              </table>
                              <div class="col-md-3" style="float: right; padding-right: 0px;">

                               <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total: 0.00</a></button>

                              </div> 

                               </br>
                               </br>
                               </br>
                               </br>


                               <button type="button" class="btn btn-primary col-md-4 btnCVComfirm" data-toggle="modal"  data-backdrop="static" data-keyboard="false" style="float:right;" data-target="#confirmModal">Allocate to Expense</button>
                          </div>


                       </div>

                    </div>
                </div>
            </div>
        </div>
    </section> 


    <!-- Modal-->
    <div id="addGLModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Entry</h4>
                </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Date<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                     <input type="text" id="t_date" name="t_date" class="form-control datepicker material_josh form-control-sm search-input-text search" placeholder="mm/dd/yyyy" readonly="true" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Description<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <input id="t_description" type="text" class="form-control form-control-success" name="t_description" placeholder="Description...">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Amount<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <!-- <input id="t_amount" class="form-control" value="<?php echo $get_chkinfo->amount ?>"> -->
                                                    <input value="<?php echo $get_chkinfo->amount ?>" type="hidden"  name="t_amount" id="t_amount" />

                                                    <input value="<?php echo $get_chkinfo->amount ?>" type=""  class="form-control" name="" id="" />
                                                </div>
                                            </div>

                                           

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">GL Account<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <select id="t_glacc" type="text" class="form-control form-control-success" name="t_glacc" placeholder="">
                                                     <option value="none">Select Account</option>
                                                        <?php
                                                      foreach ($get_account->result() as $acc) { ?>
                                                        <option value="<?=$acc->id?>"><?php echo strtoupper($acc->description); ?> </option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                
                                <button type="button" style="float:right;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>

                                <button type="button" style="float:right;margin-right:10px;" class="btn btn-primary btnAddGlaccount" data-dismiss="modal" >Add</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>   


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
<script type="text/javascript" src="<?=base_url('assets/js/account/check_allocatedetails.js');?>"></script>
