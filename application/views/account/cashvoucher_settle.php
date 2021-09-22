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
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/cashvoucher_transaction/'.$token);?>">Cash Voucher Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cash Voucher Settle</li>
        </ol>
    </div>
    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 ">
                    <div class="card">
                       	<h6 class="secondary-bg px-4 py-3 white-text">Cash Voucher Information</h6>
                        <div class="card-body">
							<div class="col-lg-12">
								<div class="">  
									<div class="col-lg-12 margin-top-20">

										<div class="form-group row">
											<label class="form-control-label col-md-4">CV Number:</label>
											<input type="text" class="form-control form-control-sm search col-md-8 allownumericwithoutdecimal" id="" name="" readonly="true" value="<?php echo $get_cvinfo->cvno ?>">
										</div>  
									
										<div class="form-group row">
											<label class="form-control-label col-md-4">Cash Voucher Date:</label>
											<input type="text" data-column="0" id="date1" readonly="true" class="form-control form-control-sm search-input-text search col-md-8 cvdate" value="<?php echo $get_cvinfo->trandate ?>">
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
											<input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="amt" name="amt" readonly="true" onkeypress="return isNumberKeyOnly(event)" value="<?php echo $get_cvinfo->tranamt ?>">
										</div>                                                                                          
											
										<input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="cvno" name="cvno" onkeypress="return isNumberKeyOnly(event)" value="<?php echo $get_cvinfo->cvno ?>" hidden>

										<input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="token" name="token"  value="<?php echo $token ?>" hidden>

										<!-- NOTES -->
										<div class="form-group row">
											<label class="form-control-label col-md-4">Notes:</label>
											<textarea class="form-control col-md-8" style="resize:none" style="" rows="5" cols="59" id="notes" readonly="true" type="text"><?php echo $get_cvinfo->trandetails ?></textarea>
										</div>

									</div> <!-- padding 20 -->        
								</div> <!-- interface1 -->
							</div>
                        </div><!-- card body -->
                    </div><!-- card -->
        		</div> <!-- col 12 -->

        		<div class="col-lg-6 col-sm-12 ">
                    <div class="card">
						<h6 class="secondary-bg px-4 py-3 white-text">Settle Information</h6>
                        <div class="card-body">
							<div class="col-lg-12">
								<div class="">  
									<div class="col-lg-12 margin-top-20">
										<div class="form-group row">
											<label class="form-control-label col-md-4">Settle Date:<span class="" style="color:red">*</span></label>
											<input type="text" data-column="0" id="sdate" readonly="true" class="form-control datepicker form-control-sm search col-md-8" value="<?=today_date();?>" placeholder="mm/dd/yyyy">
										</div>

										<div class="form-group row">
											<label class="form-control-label col-md-4">Actual Amount:<span class="" style="color:red">*</span></label>
											<input type="text" class="form-control form-control-sm search-input-text search col-md-8 allownumericwithdecimal" id="actualamt" name="actualamt" placeholder="Actual Amount.." onpaste="return false;">
										</div>

										<div class="form-group row">
											<label class="form-control-label col-md-4">Actual Amount with No Receipt:<span class="" style="color:red">*</span></label>
											<input type="text" class="form-control form-control-sm search-input-text search col-md-8 allownumericwithdecimal" id="actualwo" name="actualwo" placeholder="Actual Amount with No Receipt" onpaste="return false;">
										</div>  
											
										<input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="cvno" name="cvno" value="<?php echo $get_cvinfo->cvno ?>" hidden>

										<input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="token" name="token"  value="<?php echo $token ?>" hidden>

										<!-- NOTES -->
										<div class="form-group row">
											<label class="form-control-label col-md-4">Remarks:<span class="" style="color:red">*</span></label>
											<textarea class="form-control col-md-8" style="resize:none" style="" rows="5" cols="59" id="remarks" placeholder="Remarks.." type="text"></textarea>
										</div>

										<div class="form-group row margin-top-20 float-right">
												<button class="btn btn-primary settleCVBtn">Settle Cash Voucher</button>
										</div>
							
									</div> <!-- padding 20 -->        
								</div> <!-- interface1 -->
							</div>
						</div><!-- card body -->
					</div><!-- card -->
        		</div> <!-- col 12 -->
      		</div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/account/cashvoucher_settle.js');?>"></script>
