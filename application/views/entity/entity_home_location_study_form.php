<style>
.kbw-signature { width: 300px; height: 100px; }
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$fis_app_id?>">
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
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_fis_transaction_history/'.$fis_app_id."/".$token);?>"><?php echo $fis_app_info->lname . ", ".$fis_app_info->fname. " ".$fis_app_info->mname ." ". $fis_app_info->suffixname; ?></a></li>
	        <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/location_study_form/'.$fis_app_id ."/" .$token);?>">Location Study Form</a></li>
        
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="post" id='location_study_form'
                            	<strong><p>LOCATION STUDY FORM</p></strong>
                            	<hr><br>
								<div class="form-group row">
									<label class="col-sm-1 col-form-label-sm">Date</label>
									<div class="col-sm-3">
										<input type="text" class="form-control form-control-sm datecpicker" id="datecpicker" name="lsf_date" >
									</div>
									<label class="col-sm-1 col-form-label-sm">Concept</label>
									<div class="col-sm-3">
										<input type="text" class="form-control form-control-sm" name="lsf_concept" >
									</div>
									<label class="col-sm-1 col-form-label-sm">Ingress Date</label>
										<div class="col-sm-3">
									<input type="text" class="form-control form-control-sm datecpicker" id="datecpicker2" name="lsf_ingress_date" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-1 col-form-label-sm">New Franchisee</label>
									<div class="col-sm-3">
										<input type="text" class="form-control form-control-sm" name="lsf_new_franchisee" >
									</div>
									<label class="col-sm-1 col-form-label-sm">For Relocation</label>
									<div class="col-sm-3">
										<input type="text" class="form-control form-control-sm" name="lsf_for_relocation">
									</div>
									<label class="col-sm-1 col-form-label-sm">Site Assistance</label>
										<div class="col-sm-3">
									<input type="text" class="form-control form-control-sm" name="lsf_site_assistance" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label-sm">Proposed Location</label>
									<div class="col-sm-10">
										<input type="text" class="form-control form-control-sm" name="lsf_proposed_location">
									</div>
								</div><br>
								<div class="form-group row">
									<input type="hidden" name="fis_app_id" value="<?=$fis_app_id?>">
									<label class="col-sm-2 col-form-label-sm">Franchisee Name</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm" name="lsf_franchisee_name" value ="<?php echo $fis_app_info->fname .' '. $fis_app_info->mname . ' ' . $fis_app_info->lname .' '. $fis_app_info->suffixname?>" >
									</div>
									<label class="col-sm-2 col-form-label-sm">Franchisee Contact No</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm" name="lsf_contact_num" value="<?=$fis_app_info->mobile_no?>">
									</div>
								</div>									
								<div class="form-group row">
									<label class="col-sm-2 col-form-label-sm">Lessor Name</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm" name="lsf_lessor_name" >
									</div>
									<label class="col-sm-2 col-form-label-sm">Lessor Contact No</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm"  name="lsf_lessor_contact_num">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label-sm">Location Name</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm" name="lsf_location_name">
									</div>
								</div>									
								<div class="form-group row">
									<label class="col-sm-2 col-form-label-sm">Location Complete Address</label>
									<div class="col-sm-10">
										<input type="text" class="form-control form-control-sm" name="lsf_location_addrs">
									</div>
								</div>

								<div class="form-group row">
									<table class="table table-sm">
									    <tbody class="thead-inverse">
									        <tr >
									            <th>Target Market</th>
									            <th>Estimated Number of Population</th>
									            <th>Type of Market</th>
									        </tr>
									        <tr>
									            <td class="row">
										            <span class="col-sm-4">Elementary</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[0]">
										            </div>
									        	</td>

									            <td><input type="number" min="1" name="estimated_population[0]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[0]" class="form-control form-control-xs"></td>
									        </tr>
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">High School</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[1]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[1]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[1]" class="form-control form-control-xs"></td>
									        </tr>     
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">College</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[2]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[2]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[2]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Malls</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[3]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[3]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[3]" class="form-control form-control-xs"></td>
									        </tr>   
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Terminals</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[4]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[4]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[4]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Call Centers</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[5]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[5]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[5]" class="form-control form-control-xs"></td>
									        </tr>   
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Church</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[6]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[6]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[6]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Hospitals</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[7]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[7]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[7]" class="form-control form-control-xs"></td>
									        </tr>   
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Passer by</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[8]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[8]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[8]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Nearby Offices</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[9]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[9]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[9]" class="form-control form-control-xs"></td>
									        </tr>						        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Residents</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[10]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[10]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[10]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Others</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[11]">
										            </div>
									            </td>

									            <td><input type="number" min="1" name="estimated_population[11]" class="form-control form-control-xs"></td>

									            <td><input type="text" name="market_type[11]" class="form-control form-control-xs"></td>
									        </tr>
									    </tbody>
									</table>
								</div>
								<hr>
								<label>LOCATION SKETCH</label>
								<div>
                               		<button id='ADDFILE' class="btn btn-primary">Upload Photo of Preferred Location</button><span class="small "> (You can only upload jpg or png file. You can upload 5 images.)</span><span class="asterisk" style="color:red">*</span>
                            	</div>
                            	 <br>
                            	<div class="uploadFileContainer"></div>
								<hr>
								<label><strong>TO BE FILLED UP BY BUSINESS DEVELOPMENT OFFICER</strong></label>
								<hr>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Remarks</label>
										<textarea name="remarks" class="form-control" id="exampleTextarea"  style="overflow:hidden"></textarea>
									</div>
								</div>
								<br>
								<div class="form-group row col-md-12">
									<div class="col-md-4">
										<label>Actual Area Size/ Cart Size</label>
										<table class="table table-sm">
										    <tbody>
										        <tr>
										            <th></th>
										            <th>Floor Area</th>
										            <th>Cart Size</th>
										        </tr>
										        <tr>
										            <td>Length</td>

										            <td><input type="number" min="1"  name="floor_length" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="cart_length" class="form-control form-control-xs"></td>
										        </tr>
										        <tr>
										            <td>Width</td>
										            <td><input type="number" min="1" name="floor_width" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="cart_width" class="form-control form-control-xs"></td>
										        </tr>									        
										        <tr>
										            <td>Height</td>
										            <td><input type="number" min="1" name="floor_height" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="cart_height" class="form-control form-control-xs"></td>

										        </tr>
										    </tbody>
										</table>
									</div>
									<div class="col-md-3">
										<label class="row">Equipment Requested</label>
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
											<input id="sa1" class="checkbox-template" type="checkbox" name="construction_action[]" value="menu provision">
											<label for="sa1" class="form-check-label">
											Menu Provision
											</label>
										</div>
									</div>	
									<div class="col-md-7">
										<div class="form-check">
											<input id="sa2" class="checkbox-template" type="checkbox" name="construction_action[]" value="space improvement">
											<label for="sa2" class="form-check-label">
											Space Improvement
											</label>
										</div>
									</div>	
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-2">Type of Outlet</label>
									<div class="col-md-2">
										<div class="form-check">
											<input id="ot" class="checkbox-template" type="checkbox" name="outlet_type[]" value="cart">
											<label for ="ot" class="form-check-label">
											Cart
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input id="ot1" class="checkbox-template" type="checkbox" name="outlet_type[]" value="stall">
											<label for="ot1" class="form-check-label">
											Stall
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input id="ot2" class="checkbox-template" type="checkbox" name="outlet_type[]" value="indoor">
											<label for="ot2" class="form-check-label">
											Indoor
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input id="ot3" class="checkbox-template" type="checkbox" name="outlet_type[]" value="outdoor">
											<label for="ot3" class="form-check-label">
											Outdoor
											</label>
										</div>
									</div>
						
									<div class="col-md-2">		
										<div class="form-check">
											<input id="ot4" class="checkbox-template" type="checkbox" name="outlet_type[]" value="kiosk">
											<label for="ot4" class="form-check-label">
											KIOSK
											</label>
										</div>
									</div>
									
								</div>
								<div class="form-group row">
									<label class="col-md-2">Menu Pricing</label>
									<div class="col-md-2">
										<div class="form-check">
											<input id ="mp" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="luzon">
											<label for="mp" class="form-check-label">
											Luzon
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input id="mp1" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="visayas">
											<label for="mp1" class="form-check-label">
											Visayas
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input id="mp2" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="mindanao">
											<label for="mp2" class="form-check-label">
											Mindanao
											</label>
										</div>
									</div>	
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Customized Pricing</label>
										<input type="text" class="form-control form-control-sm" name="customized_pricing">
									</div>
								</div>
								<hr>
								<label>Additional Requirements/List of Improvements</label>
								<br>	
								<div class="form-group row">
									<div class="col-md-2"></div>
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
								</div>								
								<div class="form-group row">
									<div class="col-md-2"></div>
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
								</div>
								<div class="form-group row">
									<div class="col-md-2"></div>
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
								</div>
								<div class="form-group row">
									<div class="col-md-2"></div>
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
								</div>
								<div class="form-group row">
									<div class="col-md-2"></div>
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
								</div>
								<div class="form-group row">
									<div class="col-md-2"></div>
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
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-4">
												<div class="form-check">
													<input class="checkbox-template" type="checkbox" name="additional_req[]" id="other_req" value="other">
													<label for="other_req" class="form-check-label">
													Others
													</label>
												</div>
											</div>
											<div class="col-md-8">
												<input disabled type="text" class="form-control form-control-sm" name="additional_req_others" id="additional_req_others">
											</div>
										</div>										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Recommendations</label>
										<input type="text" class="form-control form-control-sm" name="recommendation">
									</div>
								</div>
								<hr>
								<label><strong>TERMS AND CONDITIONS/ REQUIREMENTS DURING INGRESS</strong></label>
								<br><br>
								<div class="row">	
									<div class="form-group col-sm-6">
										<div class="row">	
											<label class="col-sm-4 col-form-label">Lease Period: </label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control-sm" name="lease_period" >
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Monthly Rent:</label>
												<div class="col-sm-8">

											<input type="number" min="1"class="form-control form-control-sm" name="monthly_rent" >

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Advance Rent:</label>
												<div class="col-sm-8">

											<input type="number" min="1" class="form-control form-control-sm" name ="advance_rent">

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Security Deposit:</label>
											<div class="col-sm-8">

												<input type="number" min="1" class="form-control form-control-sm" name="security_deposit" >

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">C.U.S.A.:</label>
												<div class="col-sm-8">

											<input type="number" min="1" class="form-control form-control-sm" name="cusa" >

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Escalation:</label>
												<div class="col-sm-8">

											<input type="number" min="1" class="form-control form-control-sm"  name ="escalation">

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">E/W:</label>
												<div class="col-sm-8">

											<input type="number" min="1" class="form-control form-control-sm" name="ew" >

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Others:</label>
												<div class="col-sm-8">

											<input type="number" min="1" class="form-control form-control-sm" name="other_terms">

											</div>
										</div>
									</div>	
									
									<div class="form-group col-sm-6">
										<div class="form-group row">
											<label class="col-sm-4">Work Permit:</label>
											<div class="col-sm-4">
												<div class="form-check">
													<input id="wp" class="radio-template" type="radio" name="work_permit" value="jcwf">
													<label for="wp" class="form-check-label">
													JCWF
													</label>
												</div>
											</div>	
											<div class="col-sm-4">
												<div class="form-check">
													<input id="wp1" class="radio-template" type="radio" name="work_permit" value="franchisee">
													<label for="wp1" class="form-check-label">
													Franchisee
													</label>
												</div>
											</div>	
										</div>
										<div class="form-group">
											<label>Break-Even Sales Computation</label>
											<div class="row">	
												<label class="col-sm-4 col-form-label">Rent: </label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="rent" >

												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-form-label">LC:</label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="lc">

												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-form-label">E/W:</label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="break_even_ew">

												</div>
											</div>		
											<div class="row">
												<label class="col-sm-4 col-form-label">Gov’t Permit</label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="gov_permit" value ="41.00">

												</div>
											</div>		
											<div class="row">
												<label class="col-sm-4 col-form-label">Marketing Fee</label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="market_fee" >

												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-form-label">Daily Cost:</label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="daily_cost" >

												</div>
											</div>		
											<div class="row">
												<label class="col-sm-4 col-form-label">B.E.S.</label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="BES">

												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-form-label">T.C.</label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="tc">

												</div>
											</div>		
											<div class="row">
												<label class="col-sm-4 col-form-label">GP%</label>
												<div class="col-sm-8">

													<input type="number" min="1" class="form-control form-control-sm" name="gp" >

												</div>
											</div>		
										</div>
									</div>
								</div>
								<hr>
								<label><strong>FRANCHISE OPERATION</strong></label>
								<br><br>
								<div class="row">
									<div class="form-group col-sm-6">
										<div class="row">	
											<label class="col-sm-4 col-form-label">Days of Operation: </label>
											<div class="col-sm-8">

												<input type="number" min="1" class="form-control form-control-sm" name="operation_days" >

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Time of Foot Traffic:</label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control-sm" name="foot_traffic" >
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Peak time:</label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control-sm" name="peak_time">
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Lean time:</label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control-sm" name="lean_time" >
											</div>
										</div>
									</div>
									<div class="form-group col-sm-6">
										<div class="row">	
											<label class="col-sm-5 col-form-label">Recommended No of Crew: </label>
											<div class="col-sm-7">

												<input type="number" min="1" class="form-control form-control-sm" name="recommended_crew" >

											</div>
										</div><div class="row"><br></div>
										<div class="row">
											<label class="col-sm-2 col-form-label">AM:</label>
											<div class="col-sm-4">

												<input type="number" min="1" class="form-control form-control-sm" name="am_crew">
											</div>
											<label class="col-sm-2 col-form-label">PM:</label>
											<div class="col-sm-4">
												<input type="number" min="1" class="form-control form-control-sm" name="pm_crew">

											</div>
										</div>
									</div>	
								</div>
								<hr>
								<label><strong>ACTUAL GROSS SALES</strong></label>
								<br><br>
								<div class="row">
									<div class="col-md-12">
										<table class="table table-sm">
										    <tbody class="thead-inverse">
										        <tr>
										            <th>Competitor’s Name</th>
										            <th>Menu</th>
										            <th>Price</th>
										            <th>Highest</th>
										            <th>Lowest</th>
										        </tr>
										        <tr>
										            <td><input type="text" name="competitor_a" class="form-control form-control-xs"></td>
										            <td><input type="text" name="menu_a" class="form-control form-control-xs"></td>

										            <td><input type="number" min="1" name="price_a" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="highest_price_a" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="lowest_price_a" class="form-control form-control-xs"></td>

										        </tr>
										        <tr>
										            <td><input type="text" name="competitor_b" class="form-control form-control-xs"></td>
										            <td><input type="text" name="menu_b" class="form-control form-control-xs"></td>

										            <td><input type="number" min="1" name="price_b" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="highest_price_b" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="lowest_price_b" class="form-control form-control-xs"></td>
										        </tr>									        
										        <tr>
										            <td><input type="text" name="competitor_c" class="form-control form-control-xs"></td>
										            <td><input type="text" min="1" name="menu_c" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="price_c" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="highest_price_c" class="form-control form-control-xs"></td>

										            <td><input type="number" min="1" name="lowest_price_c" class="form-control form-control-xs"></td>
										        </tr>   
										        <tr>
										            <td><input type="text" name="competitor_d" class="form-control form-control-xs"></td>
										            <td><input type="text" name="menu_d" class="form-control form-control-xs"></td>

										            <td><input type="number" min="1" name="price_d" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="highest_price_d" class="form-control form-control-xs"></td>
										            <td><input type="number" min="1" name="lowest_price_d" class="form-control form-control-xs"></td>

										        </tr>  
<!-- 										        <tr>
										            <td><input type="text" name="competitor_e" class="form-control form-control-xs"></td>
										            <td><input type="text" name="menu_e" class="form-control form-control-xs"></td>
										            <td><input type="number" name="price_e" class="form-control form-control-xs"></td>
										            <td><input type="number" name="highest_price_e" class="form-control form-control-xs"></td>
										            <td><input type="number" name="lowest_price_e" class="form-control form-control-xs"></td>
										        </tr> -->
										    </tbody>
										</table>
									</div>
								</div>	
								<div class="form-group row">
									<div class="col-md-6">
										<label>Expected Gross Sales (Outlet)</label>

										<input type="number" min="1" class="form-control form-control-sm" name="expected_gross">

									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-4">
										<label>Prepared By</label><br><br>
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
										<input required type="text" class="form-control form-control-sm" name="prepared_by_officer">
										<small class="form-text text-muted">BDD Officer</small>
									</div>
									<div class="col-sm-4">
										<label>Checked By</label><br><br>
										<!-- Signature Example -->
										<div class="row signature_pad2 form-control">
											<div id="checked_by_signature"></div>
											<p style="clear: both;">
												<button id="clear2">Reset</button> 
												<button id="done2">Done</button>
											</p>
										</div>
										<div class="signature_container2" hidden>
											<img src="" id="sample_sig2">
										</div>
										<!-- end of signature -->
										<input required type="hidden" name="checked_by_signature">
										<input required type="text" class="form-control form-control-sm" name="checked_by_officer">
										<small class="form-text text-muted">Business Development Assistant</small>
									</div>
									<div class="col-sm-4">
										<label>Approved By</label><br><br>
										<!-- Signature Example -->
										<div class="row signature_pad3 form-control">
											<div id="approved_by_signature"></div>
											<p style="clear: both;">
												<button id="clear3">Reset</button> 
												<button id="done3">Done</button>
											</p>
										</div>
										<div class="signature_container3" hidden>
											<img src="" id="sample_sig3">
										</div>
										<!-- end of signature -->
										<input required type="hidden" name="approved_by_signature">
										<input required type="text" class="form-control form-control-sm" name="approved_by_franchisee" value ="<?php echo $fis_app_info->fname .' '. $fis_app_info->mname . ' ' . $fis_app_info->lname .' '. $fis_app_info->suffixname?>">
										<small class="form-text text-muted">Franchisee's Signature</small>
									</div>
								</div>
								<br><hr>
								<button id='btnReg' class="btn btn-primary btnReg" style="float: right; margin-left: 7px;">Submit</button>	
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </di v>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/location_study_form/location_study_form.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.signature.js');?>"></script>
<script>

	$(':input[type="number"]').keypress(function(e){
		if(!((e.keyCode > 95 && e.keyCode < 106)
	      || (e.keyCode > 47 && e.keyCode < 58) 
	      || e.keyCode == 8)) {
	        return false;
	    }
	});

		var empty_signature = "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/2wBDAQMDAwQDBAgEBAgQCwkLEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBD/wAARCABiASoDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAn/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AKpgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//Z";

	$(function() {
		var sig = $('#prepared_by_signature').signature();
		var sig2 = $('#checked_by_signature').signature();
		var sig3 = $('#approved_by_signature').signature();

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
			var checked_by_signature = sig2.signature('toDataURL', 'image/jpeg');
			if(checked_by_signature == empty_signature){
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
				$("input[name='checked_by_signature'").val(checked_by_signature);
				$("#sample_sig2").attr('src',sig2.signature('toDataURL', 'image/jpeg'));
				$(".signature_container2").prop('hidden', false);
				$(".signature_pad2").prop('hidden', true);
			}
		});		

		$('#done3').click(function(e) {
			e.preventDefault();
			var approved_by_signature = sig3.signature('toDataURL', 'image/jpeg');
			if(approved_by_signature == empty_signature){
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
				$("input[name='approved_by_signature'").val(approved_by_signature);
				$("#sample_sig3").attr('src',sig3.signature('toDataURL', 'image/jpeg'));
				$(".signature_container3").prop('hidden', false);
				$(".signature_pad3").prop('hidden', true);
			}
		});

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
