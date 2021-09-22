<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$proposed_location_info->proposed_location_id?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">View Franchise Details</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
	    	<li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a></li>      
	        <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a></li>
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_franchise_accounting/franchise_payment_transaction_history/'.$token);?>">Franchise Payment Details</a></li>   	
	       	<!-- <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_fis_transaction_history/'.$proposed_location_info->fis_applicant_id."/".$token);?>"><?php echo $proposed_location_info->lname . ", ".$proposed_location_info->fname. " ".$proposed_location_info->mname ." ". $proposed_location_info->suffixname; ?></a></li> -->
	       	<li class="breadcrumb-item">View Franchise Details</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <form action="post" id='endorsement_for_ocular'>
                            	<h3>Franchise Details</h3>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
<br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<!-- <script src="<?=base_url('assets/js/entity/accounting/franchise_payment_add.js');?>"></script> -->
<!-- <script src="<?=base_url('assets/js/jquery.signature.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.ui.touch-punch.min.js');?>"></script> -->
