<style>
.kbw-signature { width: 300px; height: 100px; }
</style>
<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$fis_app_info->fis_applicant_id?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Entity</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a></li>    
        <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a></li>
      	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>">FIS Transaction History</a></li>
       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_fis_transaction_history/'.$fis_app_info->fis_applicant_id."/".$token);?>"><?php echo $fis_app_info->lname . ", ".$fis_app_info->fname. " ".$fis_app_info->mname ." ". $fis_app_info->suffixname; ?></a></li>
       		<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_pdf_lsf_form/'.$lsf_app_info->lsf_id.'/'. $token)?>">Location Study Form <?=$lsf_app_info->lsf_id?></a></li>
        <li class="breadcrumb-item"><a href="#">View Endorsement Form</a></li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="post" id='preview_endorsement_form'>
                            	<button style="float: right; margin-left: 7px;" class="btn btn-primary btn-sm btnViewApp" data-value="<?=$lsf_app_info->lsf_id?>">Export to PDF</button>
                            	<strong><p>Endorsement for Ocular</p></strong>
                            	<hr><br>
                            	<?php 
	                            	$fillfranchisee = "";
	                            	$fillfranchisee2 = "";
                            		if($row->franchisee_type == 1){
										$fillfranchisee = "checked";
									}else{
										$fillfranchisee2 = "checked";
									}
                            	?>

                            	<div class="form-group row">
                            		<div class="col-md-5">
										<div class="form-check form-check-inline">
											<input type="hidden" name="lsf_app_id" value="<?=$lsf_app_info->lsf_id?>">

											<div class="i-checks">
												<input id="franchisee_type" <?=$fillfranchisee?> type="radio" value="1" name="franchisee_type" class="radio-template">
												<label for="franchisee_type">NEW FRANCHISEE</label>
											</div>
											
											<!-- <label class="form-check-label">
										    	<input class="form-check-input" type="radio" <?=$fillfranchisee?> name="franchisee_type" id="franchisee_type" value="1">NEW FRANCHISEE
										 	</label> -->
										</div>
										<br>
										<?php
											$fill1 ="";
											$fill2 ="";
											$fill3 ="";
											$fill4 ="";
											$fill5 ="";

											if($row->action == 'site assistance'){
												$fill1 = "checked";
											}else if ($row->action == 'new location'){
												$fill2 = "checked";
											}else if ($row->action == 'relocation'){
												$fill3 = "checked";
											}else if ($row->action == 'reopening'){
												$fill4 = "checked";
											}else if ($row->action == 'transfer of ownership'){
												$fill5 = "checked";
											}
										?>	
                            			<div class="form-group row">
											<div class="col-md-4 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa1" <?=$fill1?>  type="radio" name="action" value="site assistance" class="radio-template nfcheckbox">
													<label for="sa1">Site Assistance</label>
												</div>
											 	<!-- <label class="form-check-label">
											    <input <?=$fill1?> class="form-check-input nfcheckbox" type="radio"  name="action" disabled id="inlineCheckbox1" value="site assistance">Site Assistance
											  </label> -->
											</div>
											<div class="col-md-4 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa2" <?=$fill2?> type="radio"  name="action" value="new location" class="radio-template nfcheckbox">
													<label for="sa2">New Location</label>
												</div>
											 	<!-- <label class="form-check-label">
											    <input <?=$fill2?> class="form-check-input nfcheckbox" type="radio"  name="action" disabled id="inlineCheckbox2" value="new location">New Location
											  </label> -->
											</div>
										</div>	
									</div>

									<div class="col-md-7">	
										<div class="form-check form-check-inline">
											<div class="i-checks">
												<input id="franchisee_type1" <?=$fillfranchisee2?> type="radio" value="2" name="franchisee_type" class="radio-template">
												<label for="franchisee_type1">EXISTING FRANCHISEE</label>
											</div>
										 
										</div><br>
										<div class="form-group row">
											<div class="col-md-3 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa3" type="radio" <?=$fill3?> name="action" value="relocation" class="radio-template efcheckbox">
													<label for="sa3">Relocation</label>
												</div>
											 
											</div>
											<div class="col-md-2 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa4" type="radio" <?=$fill4?> name="action" value="reopening" class="radio-template efcheckbox">
													<label for="sa4">ReOpening</label>
												</div>
											 
											</div>
											<div class="col-md-4 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa5" type="radio" <?=$fill5?>  name="action" value="transfer of ownership" class="radio-template efcheckbox">
													<label for="sa5">Transfer of Ownership</label>
												</div>
											 
											</div>
										</div>	
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-2">BRANCH NAME</label>
									<div class="col-md-5">
										<input type="text" class="form-control form-control-sm" name="app_branch_name" value="<?=$row->branch_name?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">	
										<label>FRANCHISEE NAME</label>
									</div>
									<div class="col-md-3">
										<label>First Name</label>
										<input type="text" class="form-control form-control-sm not-editable" name="app_fname" value="<?=$fis_app_info->fname?>">
									</div>
									<div class="col-md-3">
										<label>Middle Name</label>
										<input type="text" class="form-control form-control-sm not-editable" name="app_mname" value="<?=$fis_app_info->mname?>">
									</div>
									<div class="col-md-3">
										<label>Last Name</label>
										<input type="text" class="form-control form-control-sm not-editable" name="app_lname" value="<?=$fis_app_info->lname?>">
									</div>
									<div class="col-md-3">
										<label>Name Suffix (i.e Jr, Sr)</label>
										<input type="text" class="form-control form-control-sm not-editable" name="app_suffixname" value="<?=$fis_app_info->suffixname?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Contact Number</label>
										<input type="text" class="form-control form-control-sm not-editable" name="app_home_num" value="<?=$fis_app_info->phone_no?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Old Location (For Relocation)</label>
										<input value="<?=$row->old_location?>" type="text" class="form-control form-control-sm" name="app_old_location">
									</div>
								</div>
								<br>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Concept</label>
										<input value="<?=$row->concept?>" type="text" class="form-control form-control-sm" name="app_concept">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Preferred Location</label>
										<textarea name = "preferred_location" class="form-control" id="exampleTextarea"  style="overflow:hidden"><?=$row->preferred_location?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Prepared By (Monitoring Department)</label>
										
										<div class="signature_container">
											<img src="<?=$row->prepared_by_monitoring_dept_signature?>" id="sample_sig">
										</div>
										<br>
										<input value="<?=$row->prepared_by_monitoring_dept?>" type="text" class="form-control form-control-sm not-editable" name="prepared_by_monitoring_dept" placeholder="Enter the name of the Monitoring Department Member" >
									</div>
								</div>
								<br><hr>	
								<strong><p>INITIAL ASSESSMENT</p></strong>
								
								<div class="form-group row">
									<div class="col-md-12">
										<textarea name = "initial_assessment" class="form-control" id="exampleTextarea"  style="overflow:hidden"><?=$row->initial_assessment?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Suggested Concept (if any)</label>
										<input value="<?=$row->suggested_concept?>" type="text" class="form-control form-control-sm" name="app_suggested_concept">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Acknowledged By (Monitoring Officer)</label>
										
										<div class="signature_container2" >
											<img src="<?=$row->acknowledged_by_moni_officer_signature?>" id="sample_sig2">
										</div>
										<br>
										<input value="<?=$row->acknowledged_by_moni_officer?>" type="text" class="form-control form-control-sm not-editable" name="acknowledged_by_monitoring_officer" placeholder="Enter the name of the Monitoring Officer">
									</div>
								</div>
								<br><hr>	
								<strong><p>FINAL ASSESSMENT</p></strong>
								
								<div class="form-group row">
									<div class="col-md-12">
										<textarea name = "final_assessment" class="form-control" id="exampleTextarea"  style="overflow:hidden"><?=$row->final_assessment?></textarea>
									</div>
								</div>

								<?php 
									$fill1 = "";
	                            	$fill2 = "";

                            		if($row->approval_result == "approved"){
										$fill1 = "checked";
									}else{
										$fill2 = "checked";
									}
                            	?>
								<div class="form-group row">
									<div class="col-md-12 form-check form-check-inline">
										<div class="i-checks">
											<input id="apr" <?=$fill1?> type="radio" name="approval" value="approved" class="radio-template">
											<label for="apr">APPROVED</label>
										</div>
							
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12 form-check form-check-inline">
										<div class="i-checks">
											<input id="apr1" <?=$fill2?> type="radio"  name="approval" value="declined" class="radio-template">
											<label for="apr1">DECLINED</label>
										</div>
								
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4 pull-right">
										<label>Acknowledged By (Business Development Officer)</label>
										
										<div class="signature_container3">
											<img src="<?=$row->acknowledged_by_bd_officer_signature?>" id="sample_sig3">
							
										</div>
										<br>
										<input value="<?=$row->acknowledged_by_bd_officer?>" type="text" class="form-control form-control-sm not-editable" name="acknowledged_by_bd_officer" placeholder="Enter the name of the Acknowleding BD Officer">
									</div>
								</div>
								<br>
								<button hidden style="float: right; margin-left: 7px;" class="btn btn-primary btnSaveApp" data-value="<?=$row->lsf_app_id?>">Save Changes</button>
								<button hidden style="float: right; margin-left: 7px;" class="btn btnCancel" >Cancel</button>
								<!-- Do not edit yet -->
						<!-- 		<button style="float: right; margin-left: 7px;" class="btn btn-danger btnEditApp" data-value="<?=$row->lsf_app_id?>">Edit Endorsement</button> -->
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/endorsement_form/endorsement_editform.js');?>"></script>
<!-- <script src="<?=base_url('assets/js/jquery.signature.js');?>"></script> -->
