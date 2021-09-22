<style>
.kbw-signature { width: 300px; height: 100px; }
.no-margin-bottom { margin-bottom: 0; }
.approval_label { font-weight: bold;font-size: 14px; }
.my_label {font-size: 13px;text-transform:uppercase;}
.my_label1 {font-size: 13px;}
a.btn.btn-primary.btn-sm.waves-effect.waves-light {
    bottom: 13px;
}
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header hidden class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$proposed_location_info->fis_applicant_id?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">PROPOSED LOCATION</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history_sales_agent/'.$token);?>">FIS Transaction History - Sales Agent</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">View Proposed Location For : <?php echo $proposed_location_info->lname . ", ".$proposed_location_info->fname. " ".$proposed_location_info->mname ." ". $proposed_location_info->suffixname; ?></li>
        </ol>
    </div>




    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <form action="post" id='endorsement_for_ocular'>
                            	<a href="<?=base_url('Main_entity/pdf_proposed_location/'.$proposed_location_info->proposed_location_id);?>" style="float: right; margin-left: 7px;" class="btn btn-primary btn-sm">Export as PDF</a>
                            	<!-- <strong><p>PROPOSED LOCATION</p></strong> -->
                            	<br><hr>
                            	<input type="hidden" name="proposed_location_id" value="<?=$proposed_location_info->proposed_location_id?>">
                            	<div class="col-md-12">
									<div class="row row-reg">
										<div class="col-md-12 no">
											<div class="form-group no-margin-bottom row">	
												<label class="form-label col-md-2 col-4">TYPE OF OCULAR : </label>
												<?php if($proposed_location_info->type_of_ocular == 1): ?>
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
									</div>
								</div>	
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </di v>
    </section>

<?php $this->load->view('includes/footer'); ?>

