<style>
.kbw-signature { width: 300px; height: 100px; }
</style>
<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Franchise Information Sheet</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id='register_franchise_form' method="post" enctype='multipart/form-data'>
                            	<strong><p>Personal Data</p></strong>
                            	<hr>
								<div class="form-group row">
									<div class="col-md-3">
										<label>First Name<span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm required_fields" name="app_fname">
									</div>
									<div class="col-md-3">
										<label>Middle Name<span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm required_fields" name="app_mname">
									</div>
									<div class="col-md-3">
										<label>Last Name<span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm required_fields" name="app_lname">
									</div>
									<div class="col-md-3">
										<label>Name Suffix (i.e Jr, Sr)</label>
										<input type="text" class="form-control form-control-sm" name="app_suffixname">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<label>Date of Birth<span class="text-danger">*</span></label>

												<input type="text" class="form-control form-control-sm app_dob required_fields" name="app_dob" id='datepicker'>
											</div>
											<div class="col-md-6">
												<label>Age<span class="text-danger">*</span></label>
												<input type="number" readonly="" min="1" class="form-control form-control-sm number app_age required_fields" name="app_age">

											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Mobile No<span class="text-danger">*</span></label>
												<input type="text" class="form-control form-control-sm required_fields" name="app_mobile_num">
											</div>
											<div class="col-md-6">
												<label>Phone Number</label>
												<input type="text" class="form-control form-control-sm" name="app_home_num">
											</div>
										</div>										

										<div class="row">
											<div class="col-md-6">
												<label>Citizenship<span class="text-danger">*</span></label>
												<input type="text" class="form-control form-control-sm required_fields" name="app_citizenship">
											</div>
											<div class="col-md-6">
												<label>Religion<span class="text-danger">*</span></label>
												<input type="text" class="form-control form-control-sm required_fields" name="app_religion">
											</div>
										</div>										

										<div class="row">
											<div class="col-md-12">
												<label>Email<span class="text-danger">*</span></label>
												<input type="email" class="form-control form-control-sm required_fields" name="app_email">
											</div>
										</div>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<div class="row">
											<label>Applicant Photo (take a snapshot or upload photo)<span class="text-danger">*</span></label>

											<div class="col-md-7">
												<div class="row">
													<div class="form-check">
													    <label class="form-check-label uploadphoto_rdbtn">
													        <input checked type="radio" class="radio-template required_fields" name="upload_type" id="from_upload" value="2">
													        Upload photo from files. Only PNG or JPG format is allowed
													      </label>
													 </div>
													<!-- <label for="upload-photo" class="btn btn-primary btn-sm upload_btn">Upload Photo
													</label> -->
													<input type="file" class="btn btn-primary btn-sm upload_btn" id="File" size="17" onchange="loadFile(event)">
												</div>
												<br>
												<div class="row">
													<div class="form-check">
												     	<label class="form-check-label takephoto_rdbtn">
												        	<input type="radio" class="radio-template" name="upload_type" id="from_webcam" value="1">
												       		Take photo from webcam
												    	</label>
											   		</div>
											   		<br>
											   		
											   		<div class="btn_shot col-md-12">
											   			
													    <button class="btn btn-primary btn-sm snapshot_btn pull-right" disabled>Take Snapshot</button>
													    <button class="btn btn-primary btn-sm retake_btn pull-right" style="display:none">Retake Photo</button>
												    </div>
												    
												</div>
											</div>

											<div class="col-md-5">
												<div class="row">
													<img id="preview" class="img-responsive" style="object-fit:cover;width:180px; height:140px;">
												<div id="my_camera" style="width:180px; height:140px;display:none;"></div>
													<input type="hidden" name="app_image" class="app_image">
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label>Address<span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm required_fields" name="app_addrs">
									</div>
								</div>
								<br>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Civil Status<span class="text-danger">*</span></label>
											<select name="app_civil_status" class="form-control form-control-sm registerCivilstatus required_fields" id="register-civilstatus">
												<option selected hidden value="">Select Status</option>
												<option value="single">Single</option>
												<option value="married">Married</option>
												<option value="anulled">Anulled</option>
												<option value="widowed">Widowed</option>
												<option value="divorced">Divorced</option>
											</select>
											<!-- <input type="text" class="form-control form-control-sm" name="app_civil_status"> -->
									</div>
						
									<div class="col-md-6">
										<label>Name of Spouse</label>
										<input type="text" class="form-control form-control-sm" name="app_spouse_name">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Valid ID Presented<span class="text-danger">*</span></label>

										<select class="form-control form-control-sm required_fields"  name="app_id_presented">
											<option selected hidden value="">Select ID Type</option>
											<?php foreach ($typeofid as $id): ?>
												<option value="<?=$id->id_name?>"><?=$id->id_name?></option>
											<?php endforeach; ?>
										</select>
										<!-- <input type="text" class="form-control form-control-sm" name="app_id_presented"> -->

									</div>
									<div class="col-md-4">
										<label>Valid ID No<span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm required_fields" name="app_id_presented_no" >
									</div>
									<div class="col-md-4">
										<label>Expiry Date</label>
										<input type="text" class="form-control form-control-sm" name="app_id_expiry_date" id='datepicker2'>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">			
										<label>Upload photo of submitted ID (front and back). You can only upload a maximum of 2 photos in jpg or png format <span class="text-danger">*</span></label>
									</div>
                                </div>
                                
                                <div class="uploadFileContainer form-group row ">
                                    <div class="col-md-12" style="margin-bottom:5px">
                                        <input type="file" name="images[]" class="req_upload btn btn-primary btn-sm required_fields">
                                        <button class="btn btn-primary btn-sm" id='ADDFILE'><span class="fa fa-plus-circle" style="font-size:20px;"></span></button>
                                    </div>
                                </div>      
								<br>
								<strong><p>For OFW / OCW Only</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Name(s) of Authorized Representative in the Philippines </label>
										<input type="text" class="form-control form-control-sm" name="authrep_name">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Address</label>
										<input type="text" class="form-control form-control-sm" name="authrep_addrs">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label>Phone Number</label>
										<input type="text" class="form-control form-control-sm" name="authrep_home_num">
									</div>
									<div class="col-md-3">
										<label>Mobile No</label>
										<input type="text" class="form-control form-control-sm" name="authrep_mobile_num">
									</div>
									<div class="col-md-3">
										<label>Relationship</label>
										<input type="text" class="form-control form-control-sm" name="authrep_rel">
									</div>
									<div class="col-md-1">
										<label>Age</label>

										<input type="number" min="1" class="form-control form-control-sm number" name="authrep_age">

									</div>
									<div class="col-md-2">
										<label>With SPA</label>
										<select class="form-control form-control-sm" name="authrep_spa">
										    <option selected value="">Select Option</option>
										    <option value="Yes">Yes</option>
										    <option value ="No">No</option>
									    </select>
									</div>
								
								</div>
								<br>
								<strong><p>BUSINESS / EMPLOYMENT DATA</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Company Name</label>
										<input type="text" class="form-control form-control-sm" name="app_comp_name">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Company Address</label>
										<input type="text" class="form-control form-control-sm" name="app_comp_addrs">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Phone Number</label>
										<input type="text" class="form-control form-control-sm" name="app_com_num">
									</div>
									<div class="col-md-6">
										<label>Email</label>
										<input type="email" class="form-control form-control-sm" name="app_com_email">
									</div>
								</div>	
								<div class="form-group row">
									<div class="col-md-3">
										<label>Position</label>
										<input type="text" class="form-control form-control-sm" name="app_com_post">
									</div>
									<div class="col-md-3">
										<label>Type of Industry</label>
										<input type="text" class="form-control form-control-sm" name="app_com_industry">
									</div>
									<div class="col-md-3">
										<label>Tenure of Stay</label>
										<input type="text" class="form-control form-control-sm" name="app_com_tenure">
									</div>
									<div class="col-md-3">
										<label>Annual Income</label>

										<input type="number" min="1" class="form-control form-control-sm number" name="app_annual_income">

									</div>
								</div>
								<br>
								<strong><p>PREFERRED TYPE OF ACCOUNTS / PACKAGE<span class="text-danger"><strong>*</strong></span></p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-3 form-check form-check-inline">
										<div class="form-check">
											<input id="at" checked class="radio-template" type="radio" name="app_package_type"  value="7 Accounts">
											<label for="at" class="form-check-label">
												7 Accounts
											</label>
										</div>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="form-check">
											<input id="at1" class="radio-template" type="radio"  name="app_package_type"  value="Super Mobile Stocklist">
											<label for="at1" class="form-check-label">
												Super Mobile Stockist
											</label>
										</div>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="form-check">
											<input id="at2" class="radio-template" type="radio"  name="app_package_type" value="Mobile Center">
											<label for="at2" class="form-check-label">
												Mobile Center
											</label>
										</div>
									</div>
								</div>		
								<div class="form-group row">
									<div class="col-md-3 form-check form-check-inline">
										<div class="form-check">
											<input id="at3" class="radio-template" type="radio"  name="app_package_type" value="Mobile Stocklist">
											<label for="at3" class="form-check-label">
												Mobile Stocklist
											</label>
										</div>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="form-check">
											<input id="at4" class="radio-template" type="radio"  name="app_package_type" value="Business Center">
											<label for="at4" class="form-check-label">
												Business Center
											</label>
										</div>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="row">
											<div class="col-md-5">
												<div class="form-check">
													<input id="others" class="radio-template" type="radio"  name="app_package_type" value="other">
													<label for="others" class="form-check-label">
														Others
													</label>
												</div>
											</div>
											<div class="col-md-7">
												 <input disabled type="text" id="other_value"  name="other_value" class="form-control form-control-sm">
											</div>
										</div>
									</div>
								</div>
								<strong><h5>Mode of Payment<span class="text-danger"><strong>*</strong></span></h5></strong><br>
								<div class="form-group row">
									<div class="col-md-2 form-check form-check-inline">
										<div class="form-check">
											<input id="pm" checked class="radio-template" type="radio"  name="app_payment_mode" value="debit">
											<label for="pm" class="form-check-label">
												Debit
											</label>
										</div>
									</div>
									<div class="col-md-2 form-check form-check-inline">
										<div class="form-check">
											<input id="pm1" class="radio-template" type="radio"  name="app_payment_mode" value="check">
											<label for="pm1" class="form-check-label">
												Check
											</label>
										</div>
									</div>
									<div class="col-md-2 form-check form-check-inline">
										<div class="form-check">
											<input id="pm2" class="radio-template" type="radio"  name="app_payment_mode" value="cash">
											<label for="pm2" class="form-check-label">
												Cash
											</label>
										</div>
									</div>
									<div class="col-md-2 form-check form-check-inline">
										<div class="form-check">
											<input id="pm3" class="radio-template" type="radio"  name="app_payment_mode" value="credit card">
											<label for="pm3" class="form-check-label">
												Credit Card
											</label>
										</div>
									</div>
									<div class="col-md-2 form-check form-check-inline">
										<div class="form-check">
											<input id="pm4" class="radio-template" type="radio"  name="app_payment_mode" value="bank deposit">
											<label for="pm4" class="form-check-label">
												Bank Deposit
											</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Details<span class="text-danger"><strong>*</strong></span></label>
										<input type="text" class="form-control form-control-sm required_fields" name="app_payment_mode_details">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Name of Sponsor:</label>
									</div>
									<div class="row col-md-12">
										<div class="col-md-3">
											<label>First Name</label>
											<input type="text" class="form-control form-control-sm" name="app_sponsor_fname">
										</div>
										<div class="col-md-3">
											<label>Middle Name</label>
											<input type="text" class="form-control form-control-sm" name="app_sponsor_mname">
										</div>
										<div class="col-md-3">
											<label>Last Name</label>
											<input type="text" class="form-control form-control-sm" name="app_sponsor_lname">
										</div>
										<div class="col-md-3">
											<label>Suffix (i.e Jr, Sr)</label>
											<input type="text" class="form-control form-control-sm" name="app_sponsor_sname">
										</div>
									</div>
										
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Sponsor’s ID No:</label>
										<input type="text" class="form-control form-control-sm" name="app_sponsor_id_no">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-8">
										<div class="row">
										<label class="col-md-7">Are you knowledgeable of the package inclusions you avail?</label>
										<select class="form-control col-md-5" name="app_miscq1" id="exampleSelect2">
										    <option value="yes">Yes</option>
										    <option value ="no">No</option>
									    </select>
									    </div>
									</div>
									<br><br>
									<div class="col-md-8">
										<div class="row">
										<label class="col-md-7">Did our Marketing Consultant discuss the package inclusions to you?</label>
										<select class="form-control col-md-5" name="app_miscq2" id="exampleSelect2">
										    <option value="yes">Yes</option>
										    <option value ="no">No</option>
									    </select>
										</div>
									</div>
									<br><br>
									<div class="col-md-8">
										<div class="row">
											<label class="col-md-5">If NO, who presented the program?</label>
											<input type="text" class="form-control form-control-sm col-md-7" name="app_miscq3">
										</div>
									</div>
								</div>
								<br>
								<strong><p>BANK REFERENCES / OTHER ASSETS OR SOURCES OF INCOME</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Bank Name</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_name">
									</div>
									<div class="col-md-4">
										<label>Bank Branch</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_branch">
									</div>
									<div class="col-md-4">
										<label>Telephone Number</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_phone_no">
									</div>
									<div class="col-md-4">
										<label>Bank Name</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_name2">
									</div>
									<div class="col-md-4">
										<label>Bank Branch</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_branch2">
									</div>
									<div class="col-md-4">
										<label>Telephone Number</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_phone_no2">
									</div>
										<div class="col-md-4">
										<label>Bank Name</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_name3">
									</div>
									<div class="col-md-4">
										<label>Bank Branch</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_branch3">
									</div>
									<div class="col-md-4">
										<label>Telephone Number</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_phone_no3">
									</div>
									<div class="col-md-12">
										<label>Others</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_type_other">
									</div>
								</div>
								<br>
								<strong><p>NOTES</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-12">
										<textarea name = "misc_notes" class="form-control" id="exampleTextarea"  style="overflow:hidden"></textarea>
									</div>
								</div>
								<br>
								<p>I certify that the above information is true and correct and I understand that any misrepresent or omission of facts in availing of the packages, whether in connection in this report or otherwise, or any accounts granted may be terminated.</p><br>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Signature of Applicant</label>
										<!-- Signature Example -->
										<div class="row signature_pad form-control">
											<div id="app_signature"></div>
											<p style="clear: both;">
												<button id="clear">Reset</button> 
											</p>
										</div>
										<div class="signature_container" hidden>
											<img src="" id="sample_sig">
											<label id="applicant_fullname"></label>
										</div>
										<!-- end of signature -->

									<input type="hidden" name="app_signature">
									<label>Date<span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm required_fields" id="datepicker3" name="app_signature_date">
									</div>
									<div class="col-md-6">
										<label>Acknowledged By Signature</label>
										<!-- Signature Example -->
										<div class="row signature_pad2 form-control">
											<div id="acknowledged_by_signature"></div>
											<p style="clear: both;">
												<button id="clear2">Reset</button> 
											</p>
										</div>
										<div class="signature_container2" hidden>
											<img src="" id="sample_sig2">
										</div>
										<!-- end of signature -->
										<input type="hidden" name="acknowledged_by_signature">
										<label>Acknowledger Name (Sales Agent)<span class="text-danger">*</span></label>
										<input type="text" class="form-control form-control-sm required_fields" name="app_acknowledged_by" >
									</div>
									<div hidden id="qrcode"></div>
								</div>
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
<!-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> -->
<script src="<?=base_url('assets/js/entity/franchise_info_sheet/fis_register.js');?>"></script>
<script src="<?=base_url('assets/js/entity/franchise_info_sheet/webcam.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.signature.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.ui.touch-punch.min.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.qrcode.min.js');?>"></script>


