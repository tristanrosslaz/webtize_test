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
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Entity</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid"> 
        	<li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a></li>      
	        <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a></li>
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/franchise_info_sheet/'.$token);?>">Franchise Information Sheet</a></li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id='register_franchise_form' method="post">
                            	<strong><p>Personal Data</p></strong>
                            	<hr>
								<div class="form-group row">
									<div class="col-md-3">
										<label>First Name</label>
										<input type="text" class="form-control form-control-sm" name="app_fname">
									</div>
									<div class="col-md-3">
										<label>Middle Name</label>
										<input type="text" class="form-control form-control-sm" name="app_mname">
									</div>
									<div class="col-md-3">
										<label>Last Name</label>
										<input type="text" class="form-control form-control-sm" name="app_lname">
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
												<label>Date of Birth</label>
												<input type="text" class="form-control form-control-sm" name="app_dob" id='datepicker'>
											</div>
											<div class="col-md-6">
												<label>Age</label>
												<input type="number" class="form-control form-control-sm" name="app_age">
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Phone Number</label>
												<input type="text" class="form-control form-control-sm" name="app_home_num">
											</div>
											<div class="col-md-6">
												<label>Mobile No</label>
												<input type="text" class="form-control form-control-sm" name="app_mobile_num">
											</div>
										</div>										

										<div class="row">
											<div class="col-md-6">
												<label>Citizenship</label>
												<input type="text" class="form-control form-control-sm" name="app_citizenship">
											</div>
											<div class="col-md-6">
												<label>Religion</label>
												<input type="text" class="form-control form-control-sm" name="app_religion">
											</div>
										</div>										

										<div class="row">
											<div class="col-md-12">
												<label>Email</label>
												<input type="email" class="form-control form-control-sm" name="app_email">
											</div>
										</div>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<div class="row">
											<label>Applicant Photo (take a snapshot or upload photo)</label>

											<div class="col-md-7">
												<div class="row">
													<div class="form-check">
													    <label class="form-check-label">
													        <input checked type="radio" class="form-check-input" name="upload_type" id="from_upload" value="2">
													        Upload photo from files
													      </label>
													 </div>
													<!-- <label for="upload-photo" class="btn btn-primary btn-sm upload_btn">Upload Photo
													</label> -->
													<input type="file" class="btn btn-primary btn-sm upload_btn" id="File" size="17" onchange="loadFile(event)">
												</div>
												<br>
												<div class="row">
													<div class="form-check">
												     	<label class="form-check-label">
												        	<input type="radio" class="form-check-input" name="upload_type" id="from_webcam" value="1">
												       		Take photo from webcam
												    	</label>
											   		</div>
											   		<br>
												    <button class="btn btn-primary btn-sm snapshot_btn" disabled>Take Snapshot</button>
												    <button class="btn btn-primary btn-sm retake_btn" style="display:none">Retake Photo</button>
												</div>
											</div>

											<div class="col-md-5">
												<div class="row">
															
													<img id="preview" class="img-responsive" style="width:180px; height:180px;">
													<div id="my_camera" style="width:180px; height:180px;display:none;"></div> 
													<input type="hidden" name="app_image" class="app_image">
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label>Address</label>
										<input type="text" class="form-control form-control-sm" name="app_addrs">
									</div>
								</div>
								<br>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Civil Status</label>
											<input type="text" class="form-control form-control-sm" name="app_civil_status">
									</div>
						
									<div class="col-md-6">
										<label>Name of Spouse</label>
										<input type="text" class="form-control form-control-sm" name="app_spouse_name">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Valid ID Presented</label>
										<input type="text" class="form-control form-control-sm" name="app_id_presented">
									</div>
									<div class="col-md-4">
										<label>Valid ID No</label>
										<input type="text" class="form-control form-control-sm" name="app_id_presented_no">
									</div>
									<div class="col-md-4">
										<label>Expiry Date</label>
										<input type="text" class="form-control form-control-sm" name="app_id_expiry_date" id='datepicker2'>
									</div>
								</div>
								<div class="form-group row">

									
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
										<input type="text" class="form-control form-control-sm" name="authrep_age">
									</div>
									<div class="col-md-2">
										<label>With SPA</label>
										<select class="form-control form-control-sm" name="authrep_spa">
										    <option value="">--Select Option--</option>
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
										<input type="text" class="form-control form-control-sm" name="app_annual_income">
									</div>
								</div>
								<br>
								<strong><p>PREFERRED TYPE OF ACCOUNTS / PACKAGE</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-3 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" type="checkbox"  name="app_package_type[]" id="inlineCheckbox1" value="7 Accounts">7 Accounts
									  </label>
									</div>
									<div class="col-md-4 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" type="checkbox"  name="app_package_type[]" id="inlineCheckbox2" value="Super Mobile Stockist">Super Mobile Stockist
									  </label>
									</div>
									<div class="col-md-4 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" type="checkbox"  name="app_package_type[]" id="inlineCheckbox3" value="Mobile Center"> Mobile Center
									  </label>
									</div>
								</div>		
								<div class="form-group row">
									<div class="col-md-3 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" type="checkbox"  name="app_package_type[]" id="inlineCheckbox4" value="Mobile Stocklist">Mobile Stocklist
									  </label>
									</div>
									<div class="col-md-4 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" type="checkbox"  name="app_package_type[]" id="inlineCheckbox5" value="Business Center">Business Center
									  </label>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="row">
											<div class="col-md-3">
												<label class="form-check-label">
												<input class="form-check-input" type="checkbox"  name="app_package_type[]" id="others" value=""> Others :  </label>
											</div>
											<div class="col-md-9">
												 <input disabled type="text" id="other_value"  name="other_value" class="form-control form-control-sm">
											</div>
										</div>
									</div>
								</div>
								<strong><h5>Mode of Payment</h5></strong><br>
								<div class="form-group row">
									<div class="col-md-2 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" name="app_payment_mode[]" type="checkbox" id="inlineCheckbox1" value="debit">Debit
									  </label>
									</div>
									<div class="col-md-2 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" name="app_payment_mode[]" type="checkbox" id="inlineCheckbox1" value="check">Check
									  </label>
									</div>
									<div class="col-md-2 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" name="app_payment_mode[]" type="checkbox" id="inlineCheckbox1" value="cash">Cash
									  </label>
									</div>
									<div class="col-md-2 form-check form-check-inline">
									 	<label class="form-check-label">
									    <input class="form-check-input" name="app_payment_mode[]" type="checkbox" id="inlineCheckbox1" value="credit card">Credit Card
									    </label>
									</div>
									<div class="col-md-2 form-check form-check-radio">
									 	<label class="form-check-label">
									    <input class="form-check-input" name="app_payment_mode[]" type="checkbox" id="inlineCheckbox1" value="bank deposit">Bank Deposit
									  </label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Details</label>
										<input type="text" class="form-control form-control-sm" name="app_payment_mode_details">
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
												<button id="done">Done</button>
											</p>
										</div>
										<div class="signature_container" hidden>
											<img src="" id="sample_sig">
											<label id="applicant_fullname"></label>
											<!-- <button id="clear2">Reset</button>  -->
										</div>
										<!-- end of signature -->

									<!-- 	<input type="text" class="form-control form-control-sm" name="app_signature" placeholder="Enter Applicant Name Here"> -->
									<input type="hidden" name="app_signature">
									</div>
									<div class="col-md-6">
										<label>Date</label>
										<input type="text" class="form-control form-control-sm" id="datepicker3" name="app_signature_date">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Acknowledged By</label>
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
										<input type="hidden" name="acknowledged_by_signature">
										<br>
										<input type="text" class="form-control form-control-sm" name="app_acknowledged_by" placeholder="Enter Acknowledger Name">
									</div>
									<div class="col-md-6">
										<label>Approved By</label>
										<!-- Signature Example -->
										<div class="row signature_pad3 form-control">
											<div id="approver_signature"></div>
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
										<input type="hidden" name="approved_by_signature">
										<br>
										<input type="text" class="form-control form-control-sm" name="app_approved_by" placeholder="Enter Approver Name">
									</div>
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

<script type="text/javascript">

	var loadFile = function(event) {
		$('#preview').css('display',"block");
	    var reader = new FileReader();
	    reader.onload = function(){
	      var preview = document.getElementById('preview');
	      preview.src = reader.result;
	   	  $('.app_image').val(reader.result);
	    };
	    reader.readAsDataURL(event.target.files[0]);
	  };


</script>

