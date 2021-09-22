  <style> .col-md-6.form-collect{
    margin: auto !important;
    width: 50% !important;     
    background-color: #f5f5f5 !important;   
    padding: 25px !important; 
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;}

    .datepicker {
      z-index:2 !important;
    }

     </style>
    <div class="content-inner" id="pageActive" data-num="7" data-namecollapse="#" data-labelname="Cash Voucher"> 
     <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/cashvoucher_transaction/'.$token);?>">Cash Voucher Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cash Voucher Update</li>
        </ol>
    </div>

    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Cash Voucher Information</h6>
                        <div class="card-body">

                          <div class="col-lg-12">
                            <div class="">        
                                <form id="frmbuildInventory">
                                  <div class="col-lg-12 margin-top-20">
                                                                   
                                      <div class="form-group row">
                                          <label class="form-control-label col-md-4">Cash Voucher Date:<span class="" style="color:red">*</span></label>
                                          <input type="text" data-column="0" id="date1" readonly="true" value="<?=$get_summary->trandate?>" class="form-control datepicker form-control-sm search-input-text search col-md-8" placeholder="mm/dd/yyyy">
                                      </div>

                                      <div class="form-group row">
                                          <label class="form-control-label col-md-4">Funds Date:<span class="" style="color:red">*</span></label>
                                          <input type="text" data-column="0" id="date2" readonly="true" value="<?=$get_summary->fundsdate?>" class="form-control datepicker form-control-sm search-input-text search col-md-8" placeholder="mm/dd/yyyy">
                                      </div>
                                      <?php if($get_summary->fundfrom == "Petty Cash"){?>
                                      <div class="form-group row">
                                          <label class="form-control-label col-md-4">Account:<span class="" style="color:red">*</span></label>
                                          <select class="form-control col-md-8" name="cvtype" id="cvtype">
                                           <option value="none">Select Account</option>
                                           <option value="Petty Cash" selected>Petty Cash</option>
                                           <option value="Cash Sales">Cash Sales</option>
                                          </select>
                                      </div> 
                                      <?php }else if($get_summary->fundfrom == "Cash Sales"){ ?>
                                      <div class="form-group row">
                                          <label class="form-control-label col-md-4">Account:<span class="" style="color:red">*</span></label>
                                          <select class="form-control col-md-8" name="cvtype" id="cvtype">
                                           <option value="none">Select Account</option>
                                           <option value="Petty Cash">Petty Cash</option>
                                           <option value="Cash Sales" selected>Cash Sales</option>
                                          </select>
                                      </div> 
                                      <?php } ?>

                                      <div class="form-group row">
                                        <label class="form-control-label col-md-4">Pay To:<span class="" style="color:red">*</span></label>
                                        <input type="text" class="form-control form-control-sm search-input-text search col-md-8" value="<?=$get_summary->payto?>" id="payto" name="payto">
                                      </div>    

                                      <input type="hidden" class="cvno" name="cvno" id="cvno" value="<?=$get_summary->cvno?>">
                                      <input type="hidden" class="token" name="token" id="token" value="<?=$token?>">

                                      <div class="form-group row">
                                        <label class="form-control-label col-md-4">Amount:<span class="" style="color:red">*</span></label>
                                        <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="amt" value="<?=$get_summary->tranamt?>" name="amt" onkeypress="return isNumberKeyOnly(event)" onpaste="return false;" oninput="validity.valid||(value='');">
                                      </div>                                                                                          
                                        
                                      <!-- NOTES -->
                                      <div class="form-group row">
                                        <label class="form-control-label col-md-4">Notes:<span class="" style="color:red">*</span></label>
                                         <textarea class="form-control col-md-8" style="resize:none" style="" rows="5" cols="59" id="notes" type="text"><?=$get_summary->trandetails?></textarea>
                                       </div>

                                      <div class="form-group row margin-top-20 float-right">
                                            <button class="btn btn-primary saveCVBtn">Save Cash Voucher</button>
                                       </div>
                                        
                                        </div> <!-- padding 20 -->        
                                </form>
                            </div> <!-- interface1 -->
                          </div>
                        
                        </div><!-- card body -->
                    </div><!-- card -->
        </div> <!-- col 12 -->
      </div>
        </div>
    </section>

<div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
    <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
    
    </div> 
</div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/account/cash_voucher_update.js');?>"></script>
