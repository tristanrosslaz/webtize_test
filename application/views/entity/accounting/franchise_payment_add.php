<style>
.kbw-signature { width: 300px; height: 100px; }
.no-margin-bottom { margin-bottom: 0; }
.approval_label { font-weight: bold;font-size: 14px; }
.my_label {font-size: 13px;text-transform:uppercase;}
.my_label1 {font-size: 13px;}
/* Extra Small Devices, Phones */ 

th.dt-center {
  width: 90px !important;
}

th.size1 {
  width: 90px !important;
}

th.size2 {
  width: 120px !important;
}

@media only screen and (min-width : 480px) {
  .select2 {
    width: calc(100%) !important;
    margin-left: 0;
  }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {

  .select2 {
    width: calc(100%) !important;
    margin-left: 0;
  }
}
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <!-- <header class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$proposed_location_info->proposed_location_id?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Add Payment Details</h2>
        </div>
    </header> -->
    <!-- Breadcrumb-->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>      
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_franchise_accounting/franchise_payment_details/'.$token);?>">Franchise Payment Details</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>      
            <!-- <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_fis_transaction_history/'.$proposed_location_info->fis_applicant_id."/".$token);?>"><?php echo $proposed_location_info->lname . ", ".$proposed_location_info->fname. " ".$proposed_location_info->mname ." ". $proposed_location_info->suffixname; ?></a></li> -->
            <li class="breadcrumb-item active">Add Payment Details</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <form action="post" id='endorsement_for_ocular'>
                            	<h3>Payment Details</h3>
                           		<hr>
                            	<input type="hidden" name="lsf_id" value="<?=$proposed_location_info->proposed_location_id?>">
                            	<div class="col-md-12">
									<div class="row row-reg">
										<div class="col-md-12 no">
											<div class="form-group no-margin-bottom row">	
												<label class="form-label col-md-2 col-4">TYPE OF OCULAR : </label>
												<?php if($proposed_location_info->type_of_ocular == 1  ): ?>
													<label class="col-md-10 col-8 my_label">New Location</label>
												<?php else: ?>
													<label class="col-md-10 col-8 my_label">Site Assistance</label>
												<?php endif; ?>
											</div>
										</div>										

										<div class="col-md-12">
											<div class="form-group no-margin-bottom row">	
												<label class="form-label col-md-2 col-4">CONCEPT(S) : </label>
												<label class="col-md-10 col-8 my_label"><?php 
                                                foreach ($concepts as $value) {
                                                   echo $value["concepts"];
                                                }
                                                ?></label>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group no-margin-bottom row">	
												<label class="form-label col-md-2 col-4">FRANCHISEE : </label>
												<label class="col-md-10 col-8 my_label"><?=$proposed_location_info->fname." ".$proposed_location_info->mname." ".$proposed_location_info->fname." ".$proposed_location_info->suffixname?></label>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group no-margin-bottom row">	
												<label class="form-label col-md-2 col-4">CONTACT NUMBER : </label>
												<label class="col-md-10 col-8 my_label"><?=$proposed_location_info->mobile_no?></label>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group row">	
												<label class="form-label col-md-2 col-4">EMAIL : </label>
												<label class="col-md-10 col-8 my_label1"><?=$proposed_location_info->email?></label>
											</div>
										</div>										

										<div class="col-md-12">
											<div class="form-group row">	
												<label class="form-label col-md-2 col-4">PREFERRED LOCATION: </label>
												<label class="col-md-10 col-8 my_label"><?=$proposed_location_info->preferred_location?></label>
											</div>
										</div>

										<input type="" id="franchise_id" value="<?=$proposed_location_info->fis_applicant_id?>" hidden>
										<input type="" id="todaydate" value="<?=today_text()?>" hidden>
										<input type="" id="token" value="<?=$token?>" hidden>
									
									</div>
								</div>	
							</form>
                        </div>
                        <div class="form-group text-right p-4" style="float: right;margin-right: 0px; top:0px;">
                            <hr>        
                                <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addPayment" class="btn btn-primary btnUpdate btnTable" id="addsalesorder" name="update" >Add Payment</button>
                            </div>
                            <div class="table-responsive p-4">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>     
                                            <th>Payment</th>
                                          	<th>Amount</th>
                                            <th width="80">Action</th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="p-4 pb-10">     
	                  			<div class="col-md-4 pr-0" style="float: right;">
		                            <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total: 0.00</a></button>
									<input type="text" class="grandtotal_hide" id="grandtotal_hide" value="0" hidden>
								</div>
							</div>
                    </div>
                    <div class="">                            
                        <button style="float: right; margin-top: 15px;" id="BtnSaveProceed" class="btn btn-primary BtnSaveProceed"> Save</button>                          
                    </div>
                </div>
            </div>
        </div>
    </section>

<div id="addPayment" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewDeformModal">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Payment</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                        
                                <div class="col-lg-12">     
                                    <form id="addRow">
                                        <div class="col-lg-12">

                                            <!-- Itemname -->
                                            <div class="form-group row">
                                              <label class="col-md-4 form-control-label">Payment<span class="" style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                 <input class="form-control searchPayment loading" name="searchPayment" id="searchPayment" placeholder="Payment" value=""/>
                                                 <input type="" class="searchPayment_id w-100"  name="searchPayment_id" id="searchPayment_id" required hidden>
                                              </div>
                                            </div>
                                     
                                            <!-- QTY -->
                                            <div class="form-group row">
                                              <label class="col-md-4 form-control-label">Amount<span class="" style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                 <input type="text" class="form-control allownumericwithdecimal so_required_fields form-control-sm col-md-12 price" name="price" id="price" oninput="validity.valid||(value='');" min="" placeholder="Amount">
                                              </div>
                                            </div>                                                
                                        </div>
                                    </form>
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="form-group float-right">       
                                        <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-primary add_inventory_modal">Add Payment</button>
                                    </div>
                                </div>
                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/accounting/franchise_payment_add.js');?>"></script>
<!-- <script src="<?=base_url('assets/js/jquery.signature.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.ui.touch-punch.min.js');?>"></script> -->
