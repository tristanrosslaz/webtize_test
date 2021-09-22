<style>
.kbw-signature { width: 300px; height: 100px; }
.margin-top { margin-top: 15px; }
.target_market_table td{ height: 12px; }
.target_market_table input[type=number],.target_market_table input[type=text],.table_cart input[type=number]{ padding:9px; }
.target_market_table span, .table_cart span{ font-size: 0.9em; }
.competitors_table input[type=text], ..competitors_table input[type=text] { padding:9px; }

</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <!-- <header class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$proposed_location_info->fis_applicant_id?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Add Location Study Form</h2>
        </div>
    </header> -->
    <!-- Breadcrumb-->

    <!--  -->

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
	    	<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/location_study_form/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>      
	        <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
	       	<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>">FIS Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
	       	<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/view_fis_transaction_history/'.$proposed_location_info->fis_applicant_id."/".$token);?>"><?php echo $proposed_location_info->lname . ", ".$proposed_location_info->fname. " ".$proposed_location_info->mname ." ". $proposed_location_info->suffixname; ?></a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
	        <li class="breadcrumb-item active">Location Study Form</li>
        </ol>
    </div>


    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <form action="post" id='location_study_form'>
                            	<strong><p>LOCATION STUDY FORM</p></strong>
                            	<hr><br>
                            	<input type="hidden" name="fis_app_id" value="<?=$proposed_location_info->fis_applicant_id?>">
                            	<input type="hidden" name="pl_id" value="<?=$proposed_location_info->proposed_location_id?>">
                            	<div class="col-md-12">
									<div class="row">
										<div class="col-md-1">
											<div class="form-group">
												<label class="form-label">Date<span class="text-danger">*</span></label>
											</div>
										</div>										
										<div class="col-md-5">
											<div class="form-group">
												<input type="text" class="form-control form-control-sm datepicker required_fields" id="datepicker" name="lsf_date" value="<?=today_date()?>" >
											</div>
										</div>
										<?php $my_array= explode(',',rtrim($proposed_location_info->concepts,',')); ?>
										<div class="col-md-1">
											<div class="form-group">
												<label class="form-label">Concept<span class="text-danger">*</span></label>
											</div>
										</div>										
										<div class="col-md-5">
											<div class="form-group">
												<select class="form-control form-control-sm required_fields" name="lsf_concept" >
														<option value="" hidden selected>Select Concept</option>
													<?php foreach ($my_array as $concept): ?>
														<option value="<?=$concept?>"><?=$concept?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>

										<?php
											$string1 = "";
											$string2 = "";
											if($proposed_location_info->type_of_ocular == 1){
												$string1 = "checked";
											}else{
												$string2 ="checked";
											}
										?>

										<div class="col-md-4 form-check margin-top">
											<div class="form-group">
												<div class="i-checks">
													<input <?=$string1?> id="sa1" type="radio" name="lsf_ocular" value="1" class="radio-template">
													<label for="sa1">New Franchisee</label>
												</div>
											</div>
										</div>	

										<div class="col-md-4 form-check margin-top">
											<div class="form-group">
												<div class="i-checks">
													<input <?=$string2?> id="sa3" type="radio" name="lsf_ocular" value="2" class="radio-template">
													<label for="sa3">Site Assistance</label>
												</div>
											</div>
										</div>							

										<div class="col-md-4 form-check margin-top">
											<div class="form-group">
												<div class="i-checks">
													<input id="sa2" type="radio" name="lsf_ocular" value="3" class="radio-template">
													<label for="sa2">For Relocation</label>
												</div>
											</div>
										</div>								

										<div class="col-md-2 form-group">
											<label class="form-label">Proposed Location<span class="text-danger">*</span></label>
										</div>

										<div class="col-md-10 form-group">
											<input type="text" readonly class="form-control form-control-sm" name="lsf_proposed_location" value="<?=$proposed_location_info->preferred_location?>">
										</div>

										<div class="col-md-2 form-group">
											<label class="form-label">Franchisee Name<span class="text-danger">*</span></label>
										</div>

										<div class="col-md-4 form-group">
											<input type="text" readonly class="form-control form-control-sm" name="lsf_franchisee_name" value ="<?php echo $proposed_location_info->fname .' '. $proposed_location_info->mname . ' ' . $proposed_location_info->lname .' '. $proposed_location_info->suffixname?>" >
										</div>

										<div class="col-md-2 form-group">
											<label class="form-label">Franchisee Contact No<span class="text-danger">*</span></label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" readonly class="form-control form-control-sm" name="lsf_contact_num" value="<?=$proposed_location_info->mobile_no?>">
										</div>										

										<div class="col-md-2 form-group">
											<label class="form-label">Lessor Name</label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" class="form-control form-control-sm" name="lsf_lessor_name" >
										</div>

										<div class="col-md-2 form-group">
											<label class="form-label">Lessor Contact No</label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" class="form-control form-control-sm" name="lsf_lessor_contact_num">
										</div>										

										<div class="col-md-2 form-group">
											<label class="form-label">Location Name</label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" class="form-control form-control-sm" name="lsf_location_name">
										</div>										

										<div class="col-md-2 form-group">
											<label class="form-label">Location Complete Address</label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" class="form-control form-control-sm" name="lsf_location_addrs">
										</div>

										<div class="col-md-12 form-group">
											<table class="table table-sm target_market_table">
									    		<tbody class="thead-inverse">
											        <tr>
											            <th>Target Market</th>
											            <th>Estimated Number of Population</th>
											            <th>Type of Market</th>
											        </tr>
									        		<tr>
											            <td class="row" style="margin-left: -4px;height: 15px"> 
												            <span class="col-sm-4">Elementary</span>
												            <div class="col-sm-8">
												            	<select name="target_market[0]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											        	</td>
											            <td><input type="number" min="1" name="estimated_population[0]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[0]" class="form-control form-control-xs"></td>
											        </tr>
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">High School</span>
												            <div class="col-sm-8">
												            	<select name="target_market[1]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[1]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[1]" class="form-control form-control-xs"></td>
											        </tr>     
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">College</span>
												            <div class="col-sm-8">
												            	<select name="target_market[2]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[2]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[2]" class="form-control form-control-xs"></td>
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Malls</span>
												            <div class="col-sm-8">
												            	<select name="target_market[3]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[3]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[3]" class="form-control form-control-xs"></td>
											        </tr>   
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Terminals</span>
												            <div class="col-sm-8">
												            	<select name="target_market[4]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[4]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[4]" class="form-control form-control-xs"></td>
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Call Centers</span>
												            <div class="col-sm-8">
												            	<select name="target_market[5]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[5]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[5]" class="form-control form-control-xs"></td>
											        </tr>   
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Church</span>
												            <div class="col-sm-8">
												            	<select name="target_market[6]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[6]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[6]" class="form-control form-control-xs"></td>
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Hospitals</span>
												            <div class="col-sm-8">
												            	<select name="target_market[7]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[7]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[7]" class="form-control form-control-xs"></td>
											        </tr>   
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Passer by</span>
												            <div class="col-sm-8">
												            	<select name="target_market[8]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[8]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[8]" class="form-control form-control-xs"></td>
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Nearby Offices</span>
												            <div class="col-sm-8">
												            	<select name="target_market[9]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[9]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[9]" class="form-control form-control-xs"></td>
											        </tr>						        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Residents</span>
												            <div class="col-sm-8">
												            	<select name="target_market[10]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[10]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[10]" class="form-control form-control-xs"></td>
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Others</span>
												            <div class="col-sm-8">
												            	<select name="target_market[11]" class="form-control form-control-xs">
												            		<option value="0">None</option>
												            		<option value="1">Visible</option>
												            	</select>
												            </div>
											            </td>

											            <td><input type="number" min="1" name="estimated_population[11]" class="form-control form-control-xs"></td>

											            <td><input type="text" name="market_type[11]" class="form-control form-control-xs"></td>
											        </tr>
											    </tbody>
											</table>
										</div>
										<div class="col-md-12">
											<hr>
										</div>	

										<div class="col-md-12">
											<label>LOCATION SKETCH / IMAGES<span class="text-danger"><strong>*</strong></span></label>
											<button id='ADDFILE' class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button>
										</div>
										<div class="col-md-12 form-group">
											<span class="small "> Note: You can only upload jpg or png file. You can upload 5 images.</span><span class="asterisk" style="color:red">*</span>
										</div>

		                            	<div class="col-md-12 uploadFileContainer">
		                            		<div class="alert alert-info">
		                            			<strong>Upload file</strong><input type="file" name="images[]" class="req_upload">
		                            		</div>
		                            	</div>
										<hr>
										<div class="form-group row col-md-12">
											<div class="col-md-4">
												<label>Actual Area Size/ Cart Size<span class="text-danger"><strong>*</strong></span></label>
												<table class="table table-sm table_cart">
												    <tbody>
												        <tr>
												            <th></th>
												            <th><span>Floor Area</span></th>
												            <th><span>Cart Size</span></th>
												        </tr>
												        <tr>
												            <td><span>Length</span></td>

												            <td><input type="number" min="1"  name="floor_length" class="form-control form-control-xs required_fields"></td>
												            <td><input type="number" min="1" name="cart_length" class="form-control form-control-xs required_fields"></td>
												        </tr>
												        <tr>
												            <td><span>Width</span></td>
												            <td><input type="number" min="1" name="floor_width" class="form-control form-control-xs required_fields"></td>
												            <td><input type="number" min="1" name="cart_width" class="form-control form-control-xs required_fields"></td>
												        </tr>									        
												        <tr>
												            <td><span>Height</span></td>
												            <td><input type="number" min="1" name="floor_height" class="form-control form-control-xs required_fields"></td>
												            <td><input type="number" min="1" name="cart_height" class="form-control form-control-xs required_fields"></td>

												        </tr>
												    </tbody>
												</table>
											</div>
											<div class="col-md-3">
												<label class="row">Equipment Requested<span class="text-danger"><strong>*</strong></span></label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-check">
															<input id="er" class="checkbox-template" type="checkbox" name="equip_req_a" value ="gas">
															<label for="er" class="form-check-label">
															Gas
															</label>
														</div>
													</div>
													<div class="col-md-6">		
														<div class="form-check">
															<input id="er1" class="checkbox-template" type="checkbox" name="equip_req_b" value="electric">
															<label for="er1" class="form-check-label">
															Electric
															</label>
														</div>
													</div>
												</div>
											</div>		
											<div class="col-md-5">
												<label class="row">Construction</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-check">
															<input id="con" class="radio-template" type="radio" name="construction" value="jcwf">
															<label for="con" class="form-check-label">
															JCWF
															</label>
														</div>
													</div>
													<div class="col-md-6">		
														<div class="form-check">
															<input id="con1" class="radio-template" type="radio" name="construction" value="franchisee">
															<label for="con1" class="form-check-label">
															Franchisee
															</label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-7">
														<div class="form-check">
															<input id="sa" class="checkbox-template" type="checkbox" name="construction_action[]" value="signage provision">
															<label for="sa" class="form-check-label">
															Signage Provision
															</label>
														</div>
													</div>	
													<div class="col-md-7">
														<div class="form-check">
															<input id="ca1" class="checkbox-template" type="checkbox" name="construction_action[]" value="menu provision">
															<label for="ca1" class="form-check-label">
															Menu Provision
															</label>
														</div>
													</div>	
													<div class="col-md-7">
														<div class="form-check">
															<input id="ca2" class="checkbox-template" type="checkbox" name="construction_action[]" value="space improvement">
															<label for="ca2" class="form-check-label">
															Space Improvement
															</label>
														</div>
													</div>	
												</div>
											</div>
										</div>

										<div class="col-md-2 form-group">
											<label>Type of Outlet<span class="text-danger"><strong>*</strong></span></label>
										</div>

										<div class="col-md-2 form-group">
											<div class="form-check">
												<input id="ot" class="checkbox-template" type="checkbox" name="outlet_type[]" value="cart">
												<label for ="ot" class="form-check-label">
												Cart
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input id="ot1" class="checkbox-template" type="checkbox" name="outlet_type[]" value="stall">
												<label for="ot1" class="form-check-label">
												Stall
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input id="ot2" class="checkbox-template" type="checkbox" name="outlet_type[]" value="indoor">
												<label for="ot2" class="form-check-label">
												Indoor
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input id="ot3" class="checkbox-template" type="checkbox" name="outlet_type[]" value="outdoor">
												<label for="ot3" class="form-check-label">
												Outdoor
												</label>
											</div>
										</div>
						
										<div class="col-md-2 form-group">		
											<div class="form-check">
												<input id="ot4" class="checkbox-template" type="checkbox" name="outlet_type[]" value="kiosk">
												<label for="ot4" class="form-check-label">
												KIOSK
												</label>
											</div>
										</div>
									
										<div class="col-md-2 form-group">
											<label>Menu Pricing<span class="text-danger"><strong>*</strong></span></label>
										</div>
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input id ="mp" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="luzon">
												<label for="mp" class="form-check-label">
												Luzon
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input id="mp1" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="visayas">
												<label for="mp1" class="form-check-label">
												Visayas
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input id="mp2" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="mindanao">
												<label for="mp2" class="form-check-label">
												Mindanao
												</label>
											</div>
										</div>		
									
										<div class="row col-md-12">
											<div class="col-md-2 form-group">
												<label>Customized Pricing<span class="text-danger"><strong>*</strong></span></label>
											</div>	

											<div class="col-md-4 form-group">
												<input type="text" class="form-control form-control-sm required_fields" name="customized_pricing">
											</div>
										</div>

										<div class="col-md-12 form-group">
											<label>Additional Requirements/List of Improvements</label>
										</div>
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra17" class="checkbox-template" type="checkbox" name="additional_req[]" value="none">
												<label for="ra17" class="form-check-label">
												None
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra" class="checkbox-template" type="checkbox" name="additional_req[]" value="submeter and breaker">
												<label for="ra" class="form-check-label">
												Submeter and Breaker
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra1" class="checkbox-template" type="checkbox" name="additional_req[]" value="cabinet">
												<label for="ra1" class="form-check-label">
												Cabinet
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra2" class="checkbox-template" type="checkbox" name="additional_req[]" value="enclosure with teaser">
												<label for="ra2" class="form-check-label">
												Enclosure with Teaser
												</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra3" class="checkbox-template" type="checkbox" name="additional_req[]" value="water meter">
												<label for="ra3" class="form-check-label">
												Water meter
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra4" class="checkbox-template" type="checkbox" name="additional_req[]" value="cabinet with teaser">
												<label for="ra4" class="form-check-label">
												Cabinet with Teaser
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra5" class="checkbox-template" type="checkbox" name="additional_req[]" value="enclosure without teaser">
												<label for="ra5" class="form-check-label">
												Enclosure without Teaser
												</label>
											</div>
										</div>
								
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra6" class="checkbox-template" type="checkbox" name="additional_req[]" value="range hood">
												<label for="ra6" class="form-check-label">
												Range hood
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra7" class="checkbox-template" type="checkbox" name="additional_req[]" value="counter table">
												<label for="ra7" class="form-check-label">
												Counter Table
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra8" class="checkbox-template" type="checkbox" name="additional_req[]" value="back to back lighted signage">
												<label for="ra8" class="form-check-label">
												Back to back lighted signage
												</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra9" class="checkbox-template" type="checkbox" name="additional_req[]" value="royal cord">
												<label  for="ra9" class="form-check-label">
												Royal Cord
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra10" class="checkbox-template" type="checkbox" name="additional_req[]" value="customized table" >
												<label for="ra10" class="form-check-label">
												Customized Table
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input id="ra11" class="checkbox-template" type="checkbox" name="additional_req[]" value="panaflex on frame">
												<label for="ra11" class="form-check-label">
												Panaflex on Frame
												</label>
											</div>
										</div>
									<div class="col-md-3">
										<div class="form-check">
											<input id="ra12" class="checkbox-template" type="checkbox" name="additional_req[]" value="sink with grease trap">
											<label for="ra12" class="form-check-label">
											Sink with Grease Trap
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input id="ra13" class="checkbox-template" type="checkbox" name="additional_req[]" value="fire extinguisher">
											<label for="ra13" class="form-check-label">
											Fire Extinguisher
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input id="ra14" class="checkbox-template" type="checkbox" name="additional_req[]" value="panaflex on wood">
											<label for="ra14" class="form-check-label">
											Panaflex on Wood
											</label>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-check">
											<input id="ra15" class="checkbox-template" type="checkbox" name="additional_req[]" value="heavy duty wheels">
											<label for="ra15" class="form-check-label">
											Heavy Duty Wheels
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input id="ra16" class="checkbox-template" type="checkbox" name="additional_req[]" value="glass">
											<label for="ra16" class="form-check-label">
											Glass
											</label>
										</div>
									</div>										
									<div class="col-md-6 form-group">
										<div class="row">
											<div class="col-md-3">
												<div class="form-check">
													<input class="checkbox-template" type="checkbox" name="additional_req[]" id="other_req" value="other">
													<label for="other_req" class="form-check-label">
													Others
													</label>
												</div>
											</div>
											<div class="col-md-9">
												<input disabled type="text" class="form-control form-control-sm" name="additional_req_others" id="additional_req_others">
											</div>
										</div>										
									</div>
							
									<div class="col-md-2 form-group">
										<label>Recommendations</label>
									</div>
									<div class="col-md-10 form-group">
										<input type="text" class="form-control form-control-sm" name="recommendation">
									</div>
									<div class="col-md-12 form-group">
										<hr>
										<label><strong>TERMS AND CONDITIONS/ REQUIREMENTS DURING INGRESS</strong></label>
									</div>
									<div class="form-group col-sm-6">
										<div class="form-group row">	
											<label class="col-sm-4 col-form-label">Lease Period: </label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control-sm" name="lease_period" >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Monthly Rent:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input type="number" min="1" step="0.01" class="form-control form-control-sm required_fields" name="monthly_rent" id="monthly_rent">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Advance Rent:</label>
												<div class="col-sm-8">

											<input type="number" min="1" class="form-control form-control-sm" name ="advance_rent">

											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Security Deposit:</label>
											<div class="col-sm-8">

												<input type="number" min="1" class="form-control form-control-sm" name="security_deposit" >

											</div>
										</div>
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">C.U.S.A.:</label>
												<div class="col-sm-8">

											<input type="number" min="1" class="form-control form-control-sm" name="cusa" >

											</div>
										</div>
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">Escalation:</label>
												<div class="col-sm-8">

											<input type="number" min="1" class="form-control form-control-sm"  name ="escalation">

											</div>
										</div>
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">Electric/Water:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input type="number" min="1" class="form-control form-control-sm required_fields" name="ew" id="ew">
											</div>
										</div>										
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">Yearly Govt Permit<span class="text-danger"><strong></strong></span></label>
											<div class="col-sm-8">
												<input type="number" min="1" class="form-control form-control-sm required_fields" name="gov_permit" id="gov_permit" value="15000.00" readonly>
											</div>
										</div>										
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">Marketing Fee and Admin Fee<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input type="number" min="1" class="form-control form-control-sm required_fields" name="marketing_fee" id="marketing_fee">
											</div>
										</div>
										<div class="row form-group ">
											<label class="col-sm-4 col-form-label">Others:</label>
											<div class="col-sm-8">
													<input type="number" min="1" class="form-control form-control-sm" name="other_terms" id="other_terms">
											</div>
										</div>
									</div>	
									
									<div class="form-group col-sm-6">
										<div class="form-group row">
											<label class="col-md-12">Break-Even Sales Computation</label>
										</div>
										<div class="form-group row">	
											<label class="col-sm-4 col-form-label">Rent: <span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_rent" id="break_even_rent">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">LC:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_lc" id="break_even_lc">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">E/W:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_ew" id="break_even_ew">
											</div>
										</div>		
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Gov’t Permit<span class="text-danger"><strong></strong></span></label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" step="0.01" class="form-control form-control-sm required_fields" name="break_even_gov_permit" id="break_even_gov_permit" value="41.00">
											</div>
										</div>		
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Marketing Fee and Admin Fee<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_market_fee" id="break_even_market_fee">
											</div>
										</div>
										<div class="row form-group ">
											<label class="col-sm-4 col-form-label">Others:</label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" class="form-control form-control-sm" name="break_even_other" id="break_even_other">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Total Daily Cost:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_daily_cost" id="break_even_daily_cost">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Lowest SRP<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control-sm required_fields" name="bes_lowest_srp" id="bes_lowest_srp">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">GP%<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control-sm required_fields" name="break_even_gp" id="break_even_gp" placeholder="%">
											</div>
										</div>		
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">B.E.S.<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_bes" id="break_even_bes">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">T.C.<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_tc" id="break_even_tc">
											</div>
										</div>		
									</div>
									<div class="col-md-12">
										<hr>
									</div>

									<div class="col-md-12 form-group">
										<label><strong>FRANCHISE OPERATION</strong></label>
									</div>

									<div class="col-md-12">
										<div class="row">
											<div class="form-group col-sm-6">
												<div class="form-group row">	
													<label class="col-sm-4 col-form-label">Days of Operation:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-8">
														<input type="number" min="1" class="form-control form-control-sm required_fields" name="operation_days" id="operation_days" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Time of Foot Traffic:</label>
													<div class="col-sm-8">
														<input type="text" class="form-control form-control-sm" name="foot_traffic" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Peak time:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control form-control-sm required_fields" name="peak_time">
													</div>
													<label class="col-sm-2 col-form-label">Foot count:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-4">
														<input type="number" class="form-control form-control-sm required_fields" name="peak_time_foot_count" id="peak_time_foot_count">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Lean time:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control form-control-sm required_fields" name="lean_time" >
													</div>
													<label class="col-sm-2 col-form-label">Foot count:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-4">
														<input type="number" class="form-control form-control-sm required_fields" name="lean_time_foot_count" id="lean_time_foot_count">
													</div>
												</div>											
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Estimated Transaction Count:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-8">
														<input readonly type="text" class="form-control form-control-sm required_fields" name="transact_count" id="transact_count" >
													</div>
												</div>												
											</div>
											<div class="form-group col-sm-6">
												<div class="form-group row">	
													<label class="col-sm-5 col-form-label">Recommended No of Crew: <span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-7">
														<input type="number" min="1" class="form-control form-control-sm required_fields" name="recommended_crew" id="recommended_crew" >
													</div>
												</div>													

												<div class="form-group row">	
													<label class="col-sm-5 col-form-label">Labor Cost per Crew: <span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-7">
														<input type="number" min="1" class="form-control form-control-sm required_fields" name="labor_cost_per_crew" id="labor_cost_per_crew">
													</div>
												</div>												
												<div class="form-group row">	
													<label class="col-sm-5 col-form-label">Number of Working Days per Crew:<span class="text-danger"><strong>*</strong></span> </label>
													<div class="col-sm-7">
														<input type="number" min="1" class="form-control form-control-sm required_fields" name="working_days" id="working_days" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-5 col-form-label">AM:</label>
													<div class="col-sm-7">
														<input type="number" min="1" class="form-control form-control-sm" name="am_crew">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-5 col-form-label">PM:</label>
													<div class="col-sm-7">
														<input type="number" min="1" class="form-control form-control-sm" name="pm_crew">

													</div>
												</div>
											</div>	
										</div>
									</div>
									<div class="col-md-6 form-group">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Number of Competitors:<span class="text-danger"><strong>*</strong></label>
											<div class="col-sm-8">
												<input type="number" max="4" class="form-control form-control-sm required_fields" name="no_of_competitors" id="no_of_competitors" placeholder ="Maximum of 4 competitors">
											</div>
										</div>
									</div>									
									<div class="col-md-6 form-group" style="display:none" id="actual_gross_sales_div">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Actual Gross Sales<span class="text-danger"><strong>*</strong></label>
											<div class="col-sm-8">
												<input type="number" class="form-control form-control-sm" name="actual_gross_sales" id="actual_gross_sales" >
											</div>
										</div>
									</div>
									<div class="col-md-12 form-group">
										<table class="table table-sm competitors_table">
										    <tbody class="thead-inverse competitors_row">
										        <tr>
										            <th>Competitor’s Name</th>
										            <th>Menu</th>
										            <th>Price</th>
										            <th>Highest</th>
										            <th>Lowest</th>
										        </tr>
										       
										    </tbody>
										</table>
									</div>
									
									<div class="col-md-12">
										<label>Expected Gross Sales (Outlet) <span class="text-danger">*</span></label>
									</div>
									<div class="form-group col-md-6">
										<input readonly type="number" min="1" class="form-control form-control-sm required_fields" name="expected_gross" id="expected_gross">
									</div>

									<div class="col-md-12 form-group">
										<hr>	
										<label class="form-label"><strong>FINAL ASSESSMENT<span class="text-danger" style="margin-right: 3px;">*</span></strong></label>
										<button id='ADDASSESSMENT' class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button>
									</div>
									
									<div class="col-md-12 row assessment_div">
										<div class="col-md-12">
											<input class="form-control required_fields" style="margin-bottom:20px" name ="final_assessment[]"></input>
										</div>
									</div>								

									<div class="col-md-3">
										<div class="form-group">
										 	<label class="approval_label" >
										    	<input checked class="radio-template" type="radio" name="lsf_status" id="inlineCheckbox1" value="1"> APPROVED
										  </label>
										</div>
									</div>										
									<div class="col-md-3">
										<div class="form-group">
										 	<label class="approval_label">
										    <input class="radio-template" type="radio" name="lsf_status" id="inlineCheckbox2" value="2"> DECLINED FOR WAIVER
										  </label>
										</div>
									</div>									

									<div class="col-md-3">
										<div class="form-group">
										 	<label class="approval_label">
										    <input class="radio-template" type="radio" name="lsf_status" id="inlineCheckbox2" value="3"> DECLINED
										  </label>
										</div>
									</div>
									
									<div class="col-md-6 form-group" style="margin-top:20px">
										<label>Prepared By<span class="text-danger">*</span></label><br>
										<!-- Signature Example -->

										<div class="form-group">
											<input type="text" class="form-control form-control-sm required_fields" name="prepared_by_officer">
											<label class="form-text text-muted">Business Development Officer<span class="text-danger">*</span></label>
										</div>
									</div>
									<div hidden id="qrcode"></div>
									<div class="col-md-12">
										<button id='btnReg' class="btn btn-primary btnReg" style="float: right; margin-left: 7px;">Submit</button>
									</div>
						
									</div>
								</div>
							</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="confirmModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Confirm Location Study Status</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="confirm_endorsement_approval">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p id="warning_message"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" style="float:right;margin-right:10px;" class="btn btn-danger confirmBtn">Confirm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/location_study_form/location_study_form.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.signature.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.ui.touch-punch.min.js');?>"></script>
<script src="<?=base_url('assets/js/entity/jquery.qrcode.min.js');?>"></script>
<script>

	$(':input[type="number"]').keypress(function(e){
		if(!((e.keyCode > 95 && e.keyCode < 106)
	      || (e.keyCode > 47 && e.keyCode < 58) 
	      || e.keyCode == 8)) {
	        return false;
	    }
	});

	$(".datecpicker").datepicker({
		 todayHighlight: true,
		 setDate: 0
	});
	$("#other_req").click(function(){
		if($(this).is(":checked")){
			$("#additional_req_others").prop("disabled", false);
		}else{
			$("#additional_req_others").prop("disabled", true);
			$("#additional_req_others").val("");
		}
	});

</script>
