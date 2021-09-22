<style>
.kbw-signature { width: 300px; height: 100px; }
.no-margin-bottom { margin-bottom: 0; }
.approval_label { font-weight: bold;font-size: 14px; }
.my_label {font-size: 13px;text-transform:uppercase;}
.my_label1 {font-size: 13px;}
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->



    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
	    	<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>      
	        <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
	       	<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>">FIS Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>   	
	       	<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/view_fis_transaction_history/'.$proposed_location_info->fis_applicant_id."/".$token);?>"><?php echo $proposed_location_info->lname . ", ".$proposed_location_info->fname. " ".$proposed_location_info->mname ." ". $proposed_location_info->suffixname; ?></a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
	       	<li class="breadcrumb-item active">View Proposed Location</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <form action="post" id='endorsement_for_ocular'>
                            	<?php if($proposed_location_info->lsf_status ==""): ?>
                            	<a href="<?=base_url('Main_entity/location_study_form/'.$proposed_location_info->proposed_location_id.'/'. $token);?> " class="btn btn-success btn-sm btnAddLSF">Add Location Study Form</a>
                            	<?php endif; ?>
                           		<?php if($proposed_location_info->lsf_status !=""): ?>
                           		<a href="<?=base_url('Main_entity/view_pdf_lsf_form/'.$proposed_location_info->lsf_id.'/'. $token);?> " class="btn btn-success btn-sm btnAddLSF">View Location Study Form</a>
                           		<?php endif; ?>
                            	<!-- <strong><p>PROPOSED LOCATION</p></strong> -->
                            	<a href="<?=base_url('Main_entity/pdf_endorsement_for_ocular/'.$proposed_location_info->proposed_location_id);?>" style="float: right; margin-left: 7px;" class="btn btn-primary btn-sm">Export as PDF</a>
                            	<br><hr>
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
												<label class="col-md-10 col-8 my_label"><?=rtrim( $proposed_location_info->concepts,',')?></label>
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
										<!-- <div class="col-md-12">
											<a href="<?=base_url('assets/img/lsf_proposed_location/'.$proposed_location_info->preferred_location_image)?>" target="_blank"><img style="height: 150px;width: 150px;margin:15px 0" class="img-thumbnail" id="preview" src="<?=base_url('assets/img/lsf_proposed_location/'.$proposed_location_info->preferred_location_image)?>"></a>
										</div> -->
										<div class="col-md-12 preview_div">
												<?php for ($i = 0; $i < count($id_images); $i++) { ?>
													<?php $pic = base_url() ."./assets/img/lsf_proposed_location/".$id_images[$i]['proposed_location_image']; ?>
													<img src="<?=$pic?>" class='img-responsive uploaded_id' height='200px' width='200px' style="object-fit:cover" id="<?='uploaded_id_'.$i?>">
													<!-- <input type="file" hidden name="<?='images['.$i.']'?>" id="upload_id<?=$i?>" onchange="<?="loadFile".$i."(event)"?>" class='req_upload' data-value="<?=$id_images[$i]['image_id']?>"> -->
												<?php }; ?>
											</div>
										
										<div class="col-md-12">
											<label class="form-label"><strong>INITIAL ASSESSMENT<span class="text-danger">*</span></strong></label>
										</div>
										<?php 
											$initial_assess = rtrim(str_replace("_","&#13;&#10;",$proposed_location_info->initial_assessment),",");
										?>

										<div class="col-md-12">
											<textarea readonly class="form-control required_fields" rows="4" style="margin-bottom:20px" name ="initial_assessment"><?=$initial_assess?></textarea>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="form-label"><strong>SUGGESTED CONCEPTS</strong></label>
											</div>
										</div>										
										<div class="col-md-9">
											<div class="form-group">
												<input readonly type="text" class="form-control" name="suggested_concept" value="<?=$proposed_location_info->suggested_concepts?>">
											</div>
										</div>										

										<div class="col-md-3">
											<div class="form-group">
												<label class="form-label"><strong>MONITORING OFFICER<span class="text-danger">*</span></strong></label>
											</div>
										</div>										
										<div class="col-md-9">
											<div class="form-group" style="margin-bottom:30px">
												<input readonly type="text" class="form-control required_fields" name="monitoring_officer" value="<?=$proposed_location_info->monitoring_officer?>">
											</div>
										</div>

										<?php if($proposed_location_info->status == 1): ?>
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    	<input disabled class="radio-template" type="radio"  name="status" id="inlineCheckbox1" value="3"> CHECK DISTANCE
											  </label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    	<input disabled checked class="radio-template" type="radio"  name="status" id="inlineCheckbox1" value="1"> APPROVED
											  </label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    <input disabled readonly class="radio-template" type="radio"  name="status" id="inlineCheckbox2" value="2"> DECLINED
											  </label>
											</div>
										</div>
										<?php elseif($proposed_location_info->status == 2): ?>	
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    	<input disabled class="radio-template" type="radio"  name="status" id="inlineCheckbox1" value="3"> CHECK DISTANCE
											  </label>
											</div>
										</div>								
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    	<input disabled class="radio-template" type="radio"  name="status" id="inlineCheckbox1" value="1"> APPROVED
											  </label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    <input disabled checked class="radio-template" type="radio"  name="status" id="inlineCheckbox2" value="2"> DECLINED
											  </label>
											</div>
										</div>
										<?php else: ?>
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    	<input disabled checked class="radio-template" type="radio"  name="status" id="inlineCheckbox1" value="3"> CHECK DISTANCE
											  </label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    	<input disabled class="radio-template" type="radio"  name="status" id="inlineCheckbox1" value="1"> APPROVED
											  </label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-group">
											 	<label class="approval_label">
											    <input disabled class="radio-template" type="radio"  name="status" id="inlineCheckbox2" value="2"> DECLINED
											  </label>
											</div>
										</div>
										<?php endif; ?>
									</div>
								</div>	
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </di v>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/location_study_form/endorsement_for_ocular.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.signature.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.ui.touch-punch.min.js');?>"></script>
