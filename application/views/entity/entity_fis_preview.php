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
    <!-- <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Entity</h2>
        </div>
    </header> -->
    <!-- Breadcrumb-->

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>      
	        <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
	       	<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>">FIS Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
	       	<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/view_fis_transaction_history/'.$row->fis_app_id."/".$token);?>"><?php echo $row->lname . ", ".$row->fname. " ".$row->mname ." ". $row->suffixname; ?></a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
	       	<li class="breadcrumb-item active">FIS Preview</li>
        </ol>
    </div>

<!--     <ul class="breadcrumb">
        <div class="container-fluid"> 
     		<li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a></li>      
	        <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a></li>
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>">FIS Transaction History</a></li>
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_fis_transaction_history/'.$row->fis_app_id."/".$token);?>"><?php echo $row->lname . ", ".$row->fname. " ".$row->mname ." ". $row->suffixname; ?></a></li>
	       	<li class="breadcrumb-item">FIS Preview</li>
        </div>
    </ul> -->
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id='preview_franchise_form' method="post">
                            	<button style="float: right; margin-left: 7px;" class="btn btn-primary btn-sm btnViewApp" data-value="<?=$row->fis_applicant_id?>">Export to PDF</button>
                            	<strong><p>Personal Data</p></strong>
                            	<hr>
								<div class="form-group row">
									<div class="col-md-9">
										<div class="row">
											<input type="hidden" name="fis_app_id" value="<?=$row->fis_app_id?>">
											<input type="hidden" name="isCustomer" value="<?=$row->isConvertedToCustomer?>">
											<div class="col-md-3">
												<label>First Name</label>
												<input  type="text" class="form-control form-control-sm" name="app_fname" value="<?=$row->fname?>">
											</div>
											<div class="col-md-3">
												<label>Middle Name</label>
												<input type="text" class="form-control form-control-sm" name="app_mname" value="<?=$row->mname?>">
											</div>
											<div class="col-md-3">
												<label>Last Name</label>
												<input type="text" class="form-control form-control-sm" name="app_lname" value="<?=$row->lname?>">
											</div>
											<div class="col-md-3">
												<label>Ext Name</label>
												<input type="text" class="form-control form-control-sm" name="app_suffixname" value="<?=$row->suffixname?>">
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Date of Birth</label>
												<input type="text" class="form-control form-control-sm" name="app_dob" id='datepicker' value="<?=$row->birthdate?>">
											</div>
											<div class="col-md-6">
												<label>Age</label>

												<input type="number" min="1" class="form-control form-control-sm" name="app_age" value="<?=$row->age?>">

											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label>Phone Number</label>
												<input type="text" class="form-control form-control-sm" name="app_home_num" value="<?=$row->phone_no?>">
											</div>
											<div class="col-md-6">
												<label>Mobile No</label>
												<input type="text" class="form-control form-control-sm" name="app_mobile_num" value="<?=$row->mobile_no?>">
											</div>
										</div>
									</div>
									<div class="col-md-3 text-center">
										<img id="preview" class="img-responsive" style="width:180px; height:180px;" src="<?=$row->applicant_image?>">
										<br>
										<label>Applicant Photo</label>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-4">
										<label>Citizenship</label>
										<input type="text" class="form-control form-control-sm" name="app_citizenship" value="<?=$row->citizenship?>">
									</div>
									<div class="col-md-4">
										<label>Religion</label>
										<input type="text" class="form-control form-control-sm" name="app_religion" value="<?=$row->religion?>">
									</div>
									<div class="col-md-4">
										<label>Email</label>
										<input type="email" class="form-control form-control-sm" name="app_email" value="<?=$row->email?>">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label>Address</label>
										<input type="text" class="form-control form-control-sm" name="app_addrs" value="<?=$row->address?>">
									</div>
								</div>
								<br>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Civil Status</label>
											<input type="text" class="form-control form-control-sm" name="app_civil_status" value="<?=$row->civil_status?>">
									</div>
						
									<div class="col-md-6">
										<label>Name of Spouse</label>
										<input type="text" class="form-control form-control-sm" name="app_spouse_name" value="<?=$row->spouse_name?>" >
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Valid ID Presented</label>

										<select class="form-control form-control-sm" name="app_id_presented" >
											<?php foreach ($typeofid as $id): ?>
												<?php if ($id->id_name == $row->valid_id_presented): ?>
													<option selected value="<?=$id->id_name?>"><?=$id->id_name?></option>
												<?php else: ?>
													<option value="<?=$id->id_name?>"><?=$id->id_name?></option>
												<?php endif ?>
											<?php endforeach; ?>
										</select>
										<!-- <input type="text" class="form-control form-control-sm" value="<?=$row->valid_id_presented?>"> -->
									</div>
									<div class="col-md-4">
										<label>Valid ID No</label>
										<input type="text" class="form-control form-control-sm" name="app_id_presented_no" value="<?=$row->valid_id_no?>">
									</div>
									<div class="col-md-4">
										<label>Expiry Date</label>
										<input type="text" class="form-control form-control-sm" id="datepicker2" name="app_id_expiry_date" value="<?=$row->valid_id_expiry_date?>">
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
										<input type="text" class="form-control form-control-sm" name="authrep_name" value="<?=$row->ofw_rep_name?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Address</label>
										<input type="text" class="form-control form-control-sm" name="authrep_addrs" value="<?=$row->ofw_rep_address?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
										<label>Phone Number</label>
										<input type="text" class="form-control form-control-sm" name="authrep_home_num" value="<?=$row->ofw_rep_home_no?>">
									</div>
									<div class="col-md-3">
										<label>Mobile No</label>
										<input type="text" class="form-control form-control-sm" name="authrep_mobile_num" value="<?=$row->ofw_rep_mobile_no?>">
									</div>
									<div class="col-md-3">
										<label>Relationship</label>
										<input type="text" class="form-control form-control-sm" name="authrep_rel" value="<?=$row->ofw_rep_relationship?>">
									</div>
									<div class="col-md-1">
										<label>Age</label>

										<input type="number" min="1" class="form-control form-control-sm" name="authrep_age" value="<?=$row->ofw_rep_age?>">
									</div>
									<div class="col-md-2">
										<label>With SPA</label>
										<?php 
											$string1 = "";
											$string2 = "";
											if($row->ofw_rep_with_spa == 'Yes'){
												$string1 = "selected";
											}if($row->ofw_rep_with_spa == 'No'){
												$string2 = "selected";
											}
										?>
										<select class="form-control form-control-sm" name="authrep_spa">
											<option <?=$string1?> value="Yes">Yes</option>
											<option <?=$string2?> value="No">No</option>
										</select>
										<!-- <input type="text" class="form-control form-control-sm" name="authrep_spa" value="<?=$row->ofw_rep_with_spa?>"> -->

									</div>
								
								</div>
								<br>
								<strong><p>BUSINESS / EMPLOYMENT DATA</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Company Name</label>
										<input type="text" class="form-control form-control-sm" name="app_comp_name" value="<?=$row->company_name?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Company Address</label>
										<input type="text" class="form-control form-control-sm" name="app_comp_addrs" value="<?=$row->company_address?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Phone Number</label>
										<input type="text" class="form-control form-control-sm" name="app_com_num" value="<?=$row->company_phone_no?>">
									</div>
									<div class="col-md-6">
										<label>Email</label>
										<input type="email" class="form-control form-control-sm" name="app_com_email" value="<?=$row->company_email?>">
									</div>
								</div>	
								<div class="form-group row">
									<div class="col-md-3">
										<label>Position</label>
										<input type="text" class="form-control form-control-sm" name="app_com_post" value="<?=$row->position?>">
									</div>
									<div class="col-md-3">
										<label>Type of Industry</label>
										<input type="text" class="form-control form-control-sm" name="app_com_industry" value="<?=$row->industry_type?>">
									</div>
									<div class="col-md-3">
										<label>Tenure of Stay</label>
										<input type="text" class="form-control form-control-sm" name="app_com_tenure" value="<?=$row->tenure_of_stay?>">
									</div>
									<div class="col-md-3">
										<label>Annual Income</label>

										<input type="number" min="1" class="form-control form-control-sm" name="app_annual_income" value="<?php echo number_format($row->annual_income,2,'.', '');?>">

									</div>
								</div>
								<br>
								<?php 
									$myString = $row->selected_account;
									$myArray = explode(',', $myString);
									$fill1 = "";
									$fill2 = "";
									$fill3 = "";
									$fill4 = "";
									$fill5 = "";
									$fill6 = "";
									$other_value ="";

									for ($i=0; $i < count($myArray); $i++) {

										if ($myArray[$i] == "7 Accounts"){
											$fill1 = "checked";
										}else if($myArray[$i] == "Mobile Stocklist"){
											$fill2 = "checked";
										}else if($myArray[$i] == "Super Mobile Stocklist"){
											$fill3 = "checked";
										}else if($myArray[$i] == "Mobile Center"){
											$fill4 = "checked";
										}else if($myArray[$i] == "Business Center"){
											$fill5 = "checked";
										}else if(strpos($myArray[$i],"other") === 0){
											$fill6 = "checked";
											$other_value = substr($myArray[$i],7);
										}
									}
								?>
								<strong><p>PREFERRED TYPE OF ACCOUNTS / PACKAGE</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-3 form-check form-check-inline">
										<div class="form-check">
											<input <?=$fill1;?> id="at" class="checkbox-template" type="checkbox" name="app_package_type[]"  value="7 Accounts">
											<label for="at" class="form-check-label">
												7 Accounts
											</label>
										</div>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="form-check">
											<input <?=$fill3;?> id="at1" class="checkbox-template" type="checkbox"  name="app_package_type[]"  value="Super Mobile Stocklist">
											<label for="at1" class="form-check-label">
												Super Mobile Stocklist
											</label>
										</div>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="form-check">
											<input <?=$fill4;?> id="at2" class="checkbox-template" type="checkbox"  name="app_package_type[]" value="Mobile Center">
											<label for="at2" class="form-check-label">
												Mobile Center
											</label>
										</div>
									</div>
								</div>		
								<div class="form-group row">
									<div class="col-md-3 form-check form-check-inline">
										<div class="form-check">
											<input <?=$fill2;?> id="at3" class="checkbox-template" type="checkbox"  name="app_package_type[]" value="Mobile Stocklist">
											<label for="at3" class="form-check-label">
												Mobile Stocklist
											</label>
										</div>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="form-check">
											<input <?=$fill5;?> id="at4" class="checkbox-template" type="checkbox"  name="app_package_type[]" value="Business Center">
											<label for="at4" class="form-check-label">
												Business Center
											</label>
										</div>
									</div>
									<div class="col-md-4 form-check form-check-inline">
										<div class="row">
											<div class="col-md-4">
												<div class="form-check">
													<input <?=$fill6;?> id="others" class="checkbox-template" type="checkbox"  name="app_package_type[]" value="other">
													<label for="others" class="form-check-label">
														Others
													</label>
												</div>
											</div>
											<!-- <div class="col-md-3">
												<label class="form-check-label">
												<input class="form-check-input" <?=$fill6;?> type="checkbox"  name="app_package_type[]" id="others" value="other"> Others :  </label>
											</div> -->
											<div class="col-md-8">
												 <input disabled type="text" id="other_value"  name="other_value" class="form-control form-control-sm" value="<?=$other_value;?>">
											</div>
										</div>
									</div>
								</div>

								<?php 

									$myString = $row->mode_of_payment;
									$myArray = explode(',', $myString);
									$fill1 = "";
									$fill2 = "";
									$fill3 = "";
									$fill4 = "";
									$fill5 = "";

									for ($i=0; $i < count($myArray); $i++) {

										if ($myArray[$i] == "debit"){
											$fill1 = "checked";
										}else if($myArray[$i] == "check"){
											$fill2 = "checked";
										}else if($myArray[$i] == "cash"){
											$fill3 = "checked";
										}else if($myArray[$i] == "credit card"){
											$fill4 = "checked";
										}else if($myArray[$i] == "bank deposit"){
											$fill5 = "checked";
										}
									}
								?>
								<strong><h5>Mode of Payment</h5></strong><br>
								<div class="form-group row">
									<div class="col-md-2 form-check form-check-inline">
										<div class="form-check">
											<input <?=$fill1?> id="pm" class="checkbox-template" type="checkbox"  name="app_payment_mode[]" value="debit">
											<label for="pm" class="form-check-label">
												Debit
											</label>
										</div>
									</div>
									<div class="col-md-2 form-check form-check-inline">
										<div class="form-check">
											<input <?=$fill2?> id="pm1" class="checkbox-template" type="checkbox"  name="app_payment_mode[]" value="check">
											<label for="pm1" class="form-check-label">
												Check
											</label>
										</div>
									</div>
									<div class="col-md-2 form-check form-check-inline">
										<div class="form-check">
											<input <?=$fill3?> id="pm2" class="checkbox-template" type="checkbox"  name="app_payment_mode[]" value="cash">
											<label for="pm2" class="form-check-label">
												Cash
											</label>
										</div>
									</div>
									<div class="col-md-2 form-check form-check-inline">
                                        <div class="form-check">
                                            <input <?=$fill4?> id="pm3" class="checkbox-template" type="checkbox"  name="app_payment_mode[]" value="credit card">
                                            <label for="pm3" class="form-check-label">
                                                Credit Card
                                            </label>
                                        </div>
									</div>
									<div class="col-md-2 form-check form-check-radio">
                                        <div class="form-check">
                                            <input <?=$fill5?> id="pm4" class="checkbox-template" type="checkbox"  name="app_payment_mode[]" value="bank deposit">
                                            <label for="pm4" class="form-check-label">
                                                Bank Deposit
                                            </label>
                                        </div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Details</label>
										<input type="text" class="form-control form-control-sm" name="app_payment_mode_details" value="<?=$row->payment_mode_details;?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Name of Sponsor:</label>
									</div>
									<div class="row col-md-12">
										<div class="col-md-3">
											<label>First Name</label>
											<input type="text" class="form-control form-control-sm" name="app_sponsor_fname" value="<?=$row->sponsor_fname;?>">
										</div>
										<div class="col-md-3">
											<label>Middle Name</label>
											<input type="text" class="form-control form-control-sm" name="app_sponsor_mname" value="<?=$row->sponsor_mname;?>">
										</div>
										<div class="col-md-3">
											<label>Last Name</label>
											<input type="text" class="form-control form-control-sm" name="app_sponsor_lname" value="<?=$row->sponsor_lname;?>">
										</div>
										<div class="col-md-3">
											<label>Suffix (i.e Jr, Sr)</label>
											<input type="text" class="form-control form-control-sm" name="app_sponsor_sname" value="<?=$row->sponsor_sname;?>">
										</div>
									</div>
										
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Sponsor’s ID No:</label>
										<input type="text" class="form-control form-control-sm" name="app_sponsor_id_no" value="<?=$row->sponsor_id_no;?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-8">
										<div class="row">
											<label class="col-md-7">Are you knowledgeable of the package inclusions you avail?</label>

										<?php 
											$string1 = "";
											$string2 = "";
											if($row->misc_q1 == 'yes'){
												$string1 = "selected";
											}if($row->misc_q1 == 'no'){
												$string2 = "selected";
											}
										?>
											<select class="form-control form-control-sm" name="app_miscq1">
												<option <?=$string1?> value="yes">Yes</option>
												<option <?=$string2?> value="no">No</option>
										 	</select>
											<!-- <input type="text" class="form-control form-control-sm"  value="<?=$row->misc_q1;?>"> -->

									    </div>
									</div>
									<br><br>
									<div class="col-md-8">
										<div class="row">
											<label class="col-md-7">Did our Marketing Consultant discuss the package inclusions to you?</label>

											<?php 
												$string1 = "";
												$string2 = "";
												if($row->misc_q2 == 'yes'){
													$string1 = "selected";
												}if($row->misc_q2 == 'no'){
													$string2 = "selected";
												}
											?>
											<select class="form-control form-control-sm" name="app_miscq2">
												<option <?=$string1?> value="yes">Yes</option>
												<option <?=$string2?> value="no">No</option>
										 	</select>
											<!-- <input type="text" class="form-control form-control-sm" name="app_miscq2" value="<?=$row->misc_q2;?>"> -->

										</div>
										<br>
									</div>
									
									<div class="col-md-8">
										<div class="row">
											<label class="col-md-5">If NO, who presented the program?</label>
											<input type="text" class="form-control form-control-sm col-md-7" name="app_miscq3" value="<?=$row->misc_q3;?>">
										</div>
									</div>
								</div>
								<br>
								<strong><p>BANK REFERENCES / OTHER ASSETS OR SOURCES OF INCOME</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Bank Name</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_name" value="<?=$row->bank_name;?>">
									</div>
									<div class="col-md-4">
										<label>Bank Branch</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_branch" value="<?=$row->bank_branch;?>">
									</div>
									<div class="col-md-4">
										<label>Telephone Number</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_phone_no" value="<?=$row->bank_phone_no;?>">
									</div>
									<div class="col-md-4">
										<label>Bank Name</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_name2" value="<?=$row->bank_name2;?>">
									</div>
									<div class="col-md-4">
										<label>Bank Branch</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_branch2" value="<?=$row->bank_branch2;?>">
									</div>
									<div class="col-md-4">
										<label>Telephone Number</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_phone_no2" value="<?=$row->bank_phone_no2;?>">
									</div>
										<div class="col-md-4">
										<label>Bank Name</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_name3" value="<?=$row->bank_name3;?>">
									</div>
									<div class="col-md-4">
										<label>Bank Branch</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_branch3" value="<?=$row->bank_branch3;?>">
									</div>
									<div class="col-md-4">
										<label>Telephone Number</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_phone_no3" value="<?=$row->bank_phone_no3;?>">
									</div>
									<div class="col-md-12">
										<label>Others</label>
										<input type="text" class="form-control form-control-sm" name="misc_bank_type_other" value="<?=$row->other_bank;?>">
									</div>
								</div>
								<br>
								<strong><p>NOTES</p></strong>
								<hr>
								<div class="form-group row">
									<div class="col-md-12">
										<textarea name = "misc_notes" class="form-control" id="exampleTextarea"  style="overflow:hidden"><?=$row->notes?></textarea>
									</div>
								</div>
								<br>
								<p>I certify that the above information is true and correct and I understand that any misrepresent or omission of facts in availing of the packages, whether in connection in this report or otherwise, or any accounts granted may be terminated.</p><br>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Signature of Applicant</label>
						
										<div class="signature_container">
											<img src="<?=$row->app_signature;?>" id="sample_sig">
											<label id="applicant_fullname"></label>
											<!-- <button id="clear2">Reset</button>  -->
										</div>

									<input type="hidden" name="app_signature">
									</div>
									<div class="col-md-6">
										<label>Date</label>
										<input type="text" class="form-control form-control-sm not-editable" id="datepicker3" name="app_signature_date" value="<?=$row->signature_date?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label>Acknowledged By</label>
										
										<div class="signature_container2">
											<img src="<?=$row->acknowledged_by_signature;?>" id="sample_sig2">
											<!-- <button id="clear2">Reset</button>  -->
										</div>
									
										<input type="hidden" name="acknowledged_by_signature">
										<br>
										<input type="text" class="form-control form-control-sm not-editable" name="app_acknowledged_by" value="<?=$row->acknowledged_by?>">
									</div>
									<div class="col-md-6">
										<label>Approved By</label>
										<div class="signature_container3">
											<img src="<?=$row->approved_by_signature;?>" id="sample_sig3">
											<!-- <button id="clear2">Reset</button>  -->
										</div>
										<!-- end of signature -->
										<br>
										<input type="text" class="form-control form-control-sm not-editable" name="app_approved_by"  value="<?=$row->approved_by?>">
									</div>
								</div>

								<!-- <button id='convertToPDF' class="btn btn-primary btnconvertToPDF" style="float: right; margin-left: 7px;">Convert to PDF</button> -->
								<br>
								<button hidden style="float: right; margin-left: 7px;" class="btn btn-primary btnSaveApp" data-value="<?=$row->fis_applicant_id?>">Save Changes</button>
								<button hidden style="float: right; margin-left: 7px;" class="btn btnCancel" >Cancel</button>
								
								<button style="float: right; margin-left: 7px;" class="btn btn-danger btnEditApp" data-value="<?=$row->fis_applicant_id?>">Edit Application</button>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>

<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/franchise_info_sheet/fis_editform.js');?>"></script>

