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
        <li class="breadcrumb-item"><a href="#">Endorsement Form</a></li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="post" id='endorsement_form'
                            	<strong><p>Endorsement for Ocular</p></strong>
                            	<hr><br>	
                            	<div class="form-group row">
                            		<div class="col-md-5">
										<div class="form-check form-check-inline">
											<input type="hidden" name="lsf_app_id" value="<?=$lsf_app_info->lsf_id?>">
											<div class="i-checks">
												<input id="franchisee_type" type="radio" value="1" name="franchisee_type" class="radio-template">
												<label for="franchisee_type">NEW FRANCHISEE</label>
											</div>
										</div>
										<br>	
                            			<div class="form-group row">
											<div class="col-md-4 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa1" disabled type="radio" name="action" value="site assistance" class="radio-template nfcheckbox">
													<label for="sa1">Site Assistance</label>
												</div>
											</div>
											<div class="col-md-4 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa2" disabled type="radio"  name="action" value="new location" class="radio-template nfcheckbox">
													<label for="sa2">New Location</label>
												</div>
											</div>
										</div>	
									</div>

									<div class="col-md-7">	
										<div class="form-check form-check-inline">
											<div class="i-checks">
												<input id="franchisee_type1"  type="radio" value="2" name="franchisee_type" class="radio-template">
												<label for="franchisee_type1">EXISTING FRANCHISEE</label>
											</div>
										</div><br>
										<div class="form-group row">
											<div class="col-md-3 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa3" type="radio" disabled name="action" value="relocation" class="radio-template efcheckbox">
													<label for="sa3">Relocation</label>
												</div>
											
											</div>
											<div class="col-md-2 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa4" type="radio" disabled name="action" value="reopening" class="radio-template efcheckbox">
													<label for="sa4">ReOpening</label>
												</div>
											
											</div>
											<div class="col-md-4 form-check form-check-inline">
												<div class="i-checks">
													<input id="sa5" type="radio" disabled name="action" value="transfer of ownership" class="radio-template efcheckbox">
													<label for="sa5">Transfer of Ownership</label>
												</div>
											
											</div>
										</div>	
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-2">BRANCH NAME</label>
									<div class="col-md-5">
										<input type="text" class="form-control form-control-sm" name="app_branch_name">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">	
										<label>FRANCHISEE NAME</label>
									</div>
									<div class="col-md-3">
										<label>First Name</label>
										<input type="text" class="form-control form-control-sm" name="app_fname" value="<?=$fis_app_info->fname?>">
									</div>
									<div class="col-md-3">
										<label>Middle Name</label>
										<input type="text" class="form-control form-control-sm" name="app_mname" value="<?=$fis_app_info->mname?>">
									</div>
									<div class="col-md-3">
										<label>Last Name</label>
										<input type="text" class="form-control form-control-sm" name="app_lname" value="<?=$fis_app_info->lname?>">
									</div>
									<div class="col-md-3">
										<label>Name Suffix (i.e Jr, Sr)</label>
										<input type="text" class="form-control form-control-sm" name="app_suffixname" value="<?=$fis_app_info->suffixname?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Contact Number</label>
										<input type="text" class="form-control form-control-sm" name="app_home_num" value="<?=$fis_app_info->phone_no?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Old Location (For Relocation)</label>
										<input type="text" class="form-control form-control-sm" name="app_old_location">
									</div>
								</div>
								<br>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Concept</label>
										<input type="text" class="form-control form-control-sm" name="app_concept">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Preferred Location</label>
										<textarea name = "preferred_location" class="form-control" id="exampleTextarea"  style="overflow:hidden"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Prepared By (Monitoring Department)</label>
										<!-- Signature Example -->
										<div class="row signature_pad form-control">
											<div id="prepared_by_signature"></div>
											<p style="clear: both;">
												<button id="clear">Reset</button> 
												<button id="done">Done</button>
											</p>
										</div>
										<div class="signature_container" hidden>
											<img src="" id="sample_sig">
											<!-- <button id="clear2">Reset</button>  -->
										</div>
										<!-- end of signature -->
										<input required type="hidden" name="prepared_by_signature">
										<br>
										<input type="text" class="form-control form-control-sm" name="prepared_by_monitoring_dept" placeholder="Enter the name of the Monitoring Department Member" >
									</div>
								</div>
								<br><hr>	
								<strong><p>INITIAL ASSESSMENT</p></strong>
								
								<div class="form-group row">
									<div class="col-md-12">
										<textarea name = "initial_assessment" class="form-control" id="exampleTextarea"  style="overflow:hidden"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Suggested Concept (if any)</label>
										<input type="text" class="form-control form-control-sm" name="app_suggested_concept">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Acknowledged By (Monitoring Officer)</label>
										<!-- Signature Example -->
										<div class="row signature_pad2 form-control">
											<div id="acknowledged_by_signature"></div>
											<p style="clear: both;">
												<button id="clear2">Reset</button> 
												<button id="done2">Done</button>
											</p>
										</div>
										<div class="signature_container2" hidden>
											<img src="" id="sample_sig2">
											<!-- <button id="clear2">Reset</button>  -->
										</div>
										<!-- end of signature -->
										<input required type="hidden" name="acknowledged_by_signature">
										<br>
										<input type="text" class="form-control form-control-sm" name="acknowledged_by_monitoring_officer" placeholder="Enter the name of the Monitoring Officer">
									</div>
								</div>
								<br><hr>	
								<strong><p>FINAL ASSESSMENT</p></strong>
								
								<div class="form-group row">
									<div class="col-md-12">
										<textarea name = "final_assessment" class="form-control" id="exampleTextarea"  style="overflow:hidden"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" type="radio"  name="approval" id="inlineCheckbox1" value="approved">APPROVED
									  </label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" type="radio"  name="approval" id="inlineCheckbox2" value="declined">DECLINED
									  </label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4 pull-right">
										<label>Acknowledged By (Business Development Officer)</label>
										<!-- Signature Example -->
										<div class="row signature_pad3 form-control">
											<div id="acknowledged_by_signature2"></div>
											<p style="clear: both;">
												<button id="clear3">Reset</button> 
												<button id="done3">Done</button>
											</p>
										</div>
										<div class="signature_container3" hidden>
											<img src="" id="sample_sig3">
											<!-- <button id="clear2">Reset</button>  -->
										</div>
										<!-- end of signature -->
										<input required type="hidden" name="acknowledged_by_signature2">
										<br>
										<input type="text" class="form-control form-control-sm" name="acknowledged_by_bd_officer" placeholder="Enter the name of the Acknowleding BD Officer">
									</div>
								</div>
								<br>
								<button id='btnReg' class="btn btn-primary btnReg" style="float: right; margin-left: 7px;">Submit</button>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/endorsement_form/endorsement_form.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.signature.js');?>"></script>
<script>

	var empty_signature = "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/2wBDAQMDAwQDBAgEBAgQCwkLEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBD/wAARCABiASoDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAn/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AKpgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z";

	$(function() {
		var sig = $('#prepared_by_signature').signature();
		var sig2 = $('#acknowledged_by_signature').signature();
		var sig3 = $('#acknowledged_by_signature2').signature();

		$('#clear').click(function(e) {
			e.preventDefault();
			sig.signature('clear');
			$(".signature_container").prop('hidden', true);
		});

		$('#clear2').click(function(e) {
			e.preventDefault();
			sig2.signature('clear');
			$(".signature_container2").prop('hidden', true);
			$(".signature_pad2").prop('hidden', false);
		});			

		$('#clear3').click(function(e) {
			e.preventDefault();
			sig3.signature('clear');

			$(".signature_container3").prop('hidden', true);
			$(".signature_pad3").prop('hidden', false);
		});		

		$('#done').click(function(e) {
			e.preventDefault();
			var prepared_by_signature = sig.signature('toDataURL', 'image/jpeg');
			if(prepared_by_signature == empty_signature){
				$.toast({
				    heading: 'Error',
				    text: "Please affix your signature",
				    icon: 'error',
				    loader: false,   
				    stack: false,
				    position: 'top-center',  
				    bgColor: '#d9534f',
					textColor: 'white'        
				});
			}else{
				$("input[name='prepared_by_signature'").val(prepared_by_signature);
				$("#sample_sig").attr('src',sig.signature('toDataURL', 'image/jpeg'));
				$(".signature_container").prop('hidden', false);
				$(".signature_pad").prop('hidden', true);
			}
		});		

		$('#done2').click(function(e) {
			e.preventDefault();
			var acknowledged_by_signature = sig2.signature('toDataURL', 'image/jpeg');
			if(acknowledged_by_signature == empty_signature){
				$.toast({
				    heading: 'Error',
				    text: "Please affix your signature",
				    icon: 'error',
				    loader: false,   
				    stack: false,
				    position: 'top-center',  
				    bgColor: '#d9534f',
					textColor: 'white'        
				});
			}else{

				$("input[name='acknowledged_by_signature'").val(acknowledged_by_signature);
				$("#sample_sig2").attr('src',sig2.signature('toDataURL', 'image/jpeg'));
				$(".signature_container2").prop('hidden', false);
				$(".signature_pad2").prop('hidden', true);
			}
		});		

		$('#done3').click(function(e) {
			e.preventDefault();
			var acknowledged_by_signature2 = sig3.signature('toDataURL', 'image/jpeg');
			if(acknowledged_by_signature2 == empty_signature){
				$.toast({
				    heading: 'Error',
				    text: "Please affix your signature",
				    icon: 'error',
				    loader: false,   
				    stack: false,
				    position: 'top-center',  
				    bgColor: '#d9534f',
					textColor: 'white'        
				});
			}else{
				$("input[name='acknowledged_by_signature2'").val(acknowledged_by_signature2);
				$("#sample_sig3").attr('src',sig3.signature('toDataURL', 'image/jpeg'));
				$(".signature_container3").prop('hidden', false);
				$(".signature_pad3").prop('hidden', true);
			}
		});
	});

	$("input[name='franchisee_type']").click(function(){

		if($("input[name='franchisee_type']:checked").val() == 1){
			// disable and uncheck checkbox from existing franchisee
			$('.efcheckbox').prop('disabled', true);
			$('.efcheckbox').prop('checked', false);

			//enabled checkbox for new franchisee
			$('.nfcheckbox').prop('disabled', false); 


		}else if($("input[name='franchisee_type']:checked").val() == 2){
			// disable and uncheck checkbox from new franchisee
			$('.nfcheckbox').prop('disabled', true);
			$('.nfcheckbox').prop('checked', false);

			//enabled checkbox for existing franchisee
			$('.efcheckbox').prop('disabled', false);
		}
	})
	
	
</script>
