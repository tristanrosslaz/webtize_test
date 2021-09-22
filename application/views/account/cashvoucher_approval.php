  <style> .col-md-6.form-collect{
    margin: auto !important;
    width: 50% !important;     
    background-color: #f5f5f5 !important;   
    padding: 25px !important; 
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;} </style>
    <div class="content-inner" id="pageActive" data-num="7" data-namecollapse="#" data-labelname="Cash Voucher"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cash Voucher Approval Details</li>
        </ol>
    </div>
    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Cash Voucher Information</h6>
                        <div class="card-body" id="hideDiv">

                          <div class="col-lg-12">     
                                
                                  <div class="col-lg-12 margin-top-20">
                                 
                                      <div class="form-group row">
                                          <label class="form-control-label col-md-4">Cash Voucher Date:</label>
                                          <input type="text" data-column="0" id="date1" readonly="true" class="form-control form-control-sm search-input-text search col-md-8" value="<?php echo $get_cvinfo->trandate ?>">
                                      </div>

                                      <div class="form-group row">
                                          <label class="form-control-label col-md-4">Funds Date:</label>
                                          <input type="text" data-column="0" id="date2" readonly="true" class="form-control form-control-sm search-input-text search col-md-8" value="<?php echo $get_cvinfo->fundsdate ?>">
                                      </div>

                                      <div class="form-group row">
                                          <label class="form-control-label col-md-4">Account:</label>
                                          <input type="text" id="cvtype" readonly="true" class="form-control form-control-sm search-input-text search col-md-8" value="<?php echo $get_cvinfo->fundfrom ?>">
                                      </div> 

                                      <div class="form-group row">
                                        <label class="form-control-label col-md-4">Pay To:</label>
                                        <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="payto" readonly="true" name="payto" value="<?php echo $get_cvinfo->payto ?>">
                                      </div>    


                                      <div class="form-group row">
                                        <label class="form-control-label col-md-4">Amount:</label>
                                        <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="amt" readonly="true" name="amt" onkeypress="return isNumberKeyOnly(event)" value="<?php echo $get_cvinfo->tranamt ?>">
                                      </div>                                                                                          
                                        
                                      <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="cvno" name="cvno" onkeypress="return isNumberKeyOnly(event)" value="<?php echo $get_cvinfo->cvno ?>" hidden>

                                      <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="token" name="token"  value="<?php echo $token ?>" hidden>

                                      <!-- NOTES -->
                                      <div class="form-group row">
                                        <label class="form-control-label col-md-4">Notes:</label>
                                         <textarea class="form-control col-md-8" style="resize:none" style="" rows="5" cols="59" id="notes" readonly="true" type="text"><?php echo $get_cvinfo->trandetails ?></textarea>
                                       </div>

                                        <div class="form-group row float-right">
                                            <button id="BtnSaveCollection " class="btn btn-primary float-right approveCVBtn m-0"> Approve Cash Voucher </button> 
                                        </div>
                                        
                                        </div> <!-- padding 20 -->        
                               
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
<script type="text/javascript" src="<?=base_url('assets/js/account/cashvoucher_approval.js');?>"></script>
