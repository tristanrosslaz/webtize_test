<style>
.kbw-signature { width: 300px; height: 100px; }
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header hidden class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$fis_app_id?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Add Proposed Location</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history_moni_officer/'.$token);?>">FIS Transaction History - Monitoring Officer</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item white-text">Proposed Location For: <?php echo $fis_app_info->lname . ", ".$fis_app_info->fname. " ".$fis_app_info->mname ." ". $fis_app_info->suffixname; ?></li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <form action="post" id='location_study_form'>
                            	<!-- <strong><p>AProposed Location</p></strong> -->
                            	<!-- hr><br> -->
                            	<input type="hidden" name="fis_app_id" value="<?=$fis_app_id?>">
                            	<div class="col-md-12">
									<div class="row row-reg">
										<div class="col-md-12">
											<div class="form-group">	
												<label class="form-label-sm">TYPE OF OCULAR<span class="text-danger">*</span></label>
											</div>
										</div>

										<div class="col-md-2 col-sm-6 form-check">
											<div class="form-group">
												<div class="i-checks">
													<input checked id="sa2" type="radio"  name="ocular" value="1" class="radio-template">
													<label for="sa2">New Location</label>
												</div>
											</div>
										</div>
										<div class="col-md-2 form-check">
											<div class="form-group">
												<div class="i-checks">
													<input id="sa1" type="radio" name="ocular" value="2" class="radio-template">
													<label for="sa1">Site Assistance</label>
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">	
												<label class="form-label"><strong>Concepts</strong><span class="text-danger">*</span></label>
											</div>
										</div>

										
										<div class="col-md-4 form-check">
											<div class="form-group">
												<div class="i-checks">
													<input id="c1" type="checkbox" name="concepts[]" value="Siomai King" class="checkbox-template nfcheckbox">
													<label for="c1">Siomai King</label>
												</div>
											</div>
										</div>

										<div class="col-md-4 form-check">
											<div class="form-group">
												<div class="i-checks">
													<input id="c2" type="checkbox" name="concepts[]" value="Burger Factory" class="checkbox-template nfcheckbox">
													<label for="c2">Burger Factory</label>
												</div>
											</div>
										</div>		

										<div class="col-md-4 form-check">
											<div class="form-group">
												<div class="i-checks">
													<input id="c3" type="checkbox" name="concepts[]" value="Noodle House" class="checkbox-template nfcheckbox">
													<label for="c3">Noodle House</label>
												</div>
											</div>
										</div>										
										<div class="col-md-4 form-check">
											<div class="form-group">
												<div class="i-checks">
													<input id="c4" type="checkbox" name="concepts[]" value="Potato King" class="checkbox-template nfcheckbox">
													<label for="c4">Potato King</label>
												</div>
											</div>
										</div>
										<div class="col-md-4 form-check">
											<div class="form-group">
												<div class="i-checks">
													<input id="c5" type="checkbox" name="concepts[]" value="Sgt. Sisig" class="checkbox-template nfcheckbox">
													<label for="c5">Sgt. Sisig</label>
												</div>
											</div>
										</div>
										<div class="col-md-4 form-check">
											<div class="form-group">
												<div class="i-checks">
													<input id="c6" type="checkbox" name="concepts[]" value="Siopao Da King" class="checkbox-template nfcheckbox">
													<label for="c6">Siopao Da King</label>
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<label class="form-label"><strong>Preferred Location</strong><span class="text-danger">*</span></label>
										</div>
										<div class="col-md-6"> 
											<div class="form-group">	
												<input id="loc" type="text" name="location_name" class="form-control form-control-sm required_fields">
											</div>	
										</div>
										<!-- <div class="col-md-6">
											<button class="btn btn-primary btn-sm" id='ADDFILE'><span class="fa fa-plus-circle" style="font-size:20px;"></span></button>
											<label class="form-label"><strong>Upload Sketch / Location Images</strong><span class="text-danger">*</span></label>
											<input type="file" hidden name="location_image" id="location_image">
											<label class="form-label" id="filename_label"></label>
										</div> -->

										<input type="hidden" id="user_access_image_id" value="2" name="user_access_image_id">
										<div class="col-md-12">
											<label>Upload Sketch / Location Images <span class="text-danger"><strong>*</strong></span></label>
											<button id='ADDFILE' class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button>
										</div>
										<div class="col-md-12 form-group">
											<span class="small "> Note: You can only upload jpg or png file. You can upload 3 images.</span><span class="asterisk" style="color:red">*</span>
										</div>

		                            	<div class="col-md-12 uploadFileContainer">
		                            		<div class="alert alert-info">
		                            			<strong>Upload file</strong><input type="file" name="images[]" class="req_upload">
		                            		</div>
		                            	</div>
										<div class="col-md-12">
											<img style="display:none;height: 200px;width: 200px;margin:10px 0" class="img-thumbnail" id="preview">
										</div>
										<div hidden id="qrcode"></div>

										<div class="col-md-12">	
											<button id='bntReg' class="btn btn-primary bntReg" style="float: right; margin-left: 7px;">Submit</button>	
										</div>
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
<script src="<?=base_url('assets/js/entity/monitoring_officer/proposed_location.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.signature.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.ui.touch-punch.min.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.qrcode.min.js');?>"></script>
<script>

	$("#ADDFILE").click(function(e){
		e.preventDefault();
		$("#location_image").click();
	});

	$("#location_image").change(function(e){
		// $("#filename_label").text($("#location_image")[0].files[0].name);
		loadFile(e);
	});

	var loadFile = function(event){
	    $('#preview').css('display',"block");

	    var reader = new FileReader();
	    reader.onload = function(){
		    var preview = document.getElementById('preview');
		    preview.src = reader.result;
	    };
	    reader.readAsDataURL(event.target.files[0]);
	};

</script>
