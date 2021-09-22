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
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/check_transaction_history/'.$token);?>">Check Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Check Update</li>
        </ol>
    </div>

    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Check Information</h6>
                        <div class="card-body">

                          <div class="col-lg-12">
                            <div class="">        
                                <form id="frmbuildInventory">
                                  <div class="col-lg-12 margin-top-20">
                                                                   
                                      <div class="form-group row">
                                          <label class="form-control-label col-md-4">Check Date:<span class="" style="color:red">*</span></label>
                                          <input type="text" data-column="0" id="date1" readonly="true" value="<?=date_format(date_create($checkSummary['chkdate']),"m/d/Y");?>" class="form-control datepicker form-control-sm search-input-text search col-md-8" placeholder="mm/dd/yyyy">
                                      </div>

                                       <div class="form-group row">
                                        <label class="form-control-label col-md-4">Type:<span class="" style="color:red">*</span></label>
                                          <input type="hidden" id="f_type" value="Expenses"> 
                                          <input type="text" class="form-control form-control-sm search-input-text search col-md-8" value="Expenses" readonly> 
                                      </div>


                                      <div class="form-group row">
                                        <label class="form-control-label col-md-4">Pay To:<span class="" style="color:red">*</span></label>
                                        <input type="text" class="form-control form-control-sm search-input-text search col-md-8" value="<?=$checkSummary['idno']?>" id="payto" name="payto">
                                      </div>    

                                      <input type="hidden" class="chkno" name="chkno" id="chkno" value="<?=$checkSummary['chkno']?>">
                                      <input type="hidden" class="token" name="token" id="token" value="<?=$token?>">

                                      <div class="form-group row">
                                        <label class="form-control-label col-md-4">Amount:<span class="" style="color:red">*</span></label>
                                        <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="amt" value="<?=$checkSummary['amount']?>" name="amt" onkeypress="return isNumberKeyOnly(event)" onpaste="return false;" oninput="validity.valid||(value='');">
                                      </div>                                                                                          
                                      <div class="form-group row margin-top-20 float-right">
                                            <button class="btn btn-primary saveBtnEncode">Save Check</button>
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
<script type="text/javascript" src="<?=base_url('assets/js/account/check_edit.js');?>"></script>
