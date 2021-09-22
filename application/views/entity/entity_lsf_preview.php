<style>
.kbw-signature { width: 300px; height: 100px; }
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$row->fis_app_id?>">
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
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_fis_transaction_history/'.$row->fis_app_id."/".$token);?>"><?php echo $lsf_app_info->lname . ", ".$lsf_app_info->fname. " ".$lsf_app_info->mname ." ". $lsf_app_info->suffixname; ?></a></li>
	        <li class="breadcrumb-item"><a href="#">Preview Location Study Form <?=$lsf_app_info->lsf_app_id?></a></li>
        
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="post" id='preview_location_study_form'>
                            	<button style="float: right; margin-left: 7px;" class="btn btn-primary btn-sm btnViewApp" data-value="<?=$lsf_app_info->lsf_id?>">Export to PDF</button>
                            	<strong><p>LOCATION STUDY FORM</p></strong>
                            	<hr><br>
								<div class="form-group row">
									<label class="col-sm-1 col-form-label-sm">Date</label>
									<div class="col-sm-3">
										<input type="hidden" name="lsf_id" value="<?=$row->lsf_id?>">
										<input type="text" class="form-control form-control-sm datecpicker" id="datecpicker" name="lsf_date" value="<?=$row->lsf_date?>">
									</div>
									<label class="col-sm-1 col-form-label-sm">Concept</label>
									<div class="col-sm-3">
										<input type="text" class="form-control form-control-sm" name="lsf_concept" value="<?=$row->lsf_concept?>">
									</div>
									<label class="col-sm-1 col-form-label-sm">Ingress Date</label>
										<div class="col-sm-3">
									<input type="text" class="form-control form-control-sm datecpicker" id="datecpicker2" name="lsf_ingress_date"  value="<?=$row->lsf_ingress_date?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-1 col-form-label-sm">New Franchisee</label>
									<div class="col-sm-3">
										<input type="text" class="form-control form-control-sm" name="lsf_new_franchisee" value="<?=$row->lsf_new_franchisee?>">
									</div>
									<label class="col-sm-1 col-form-label-sm">For Relocation</label>
									<div class="col-sm-3">
										<input type="text" class="form-control form-control-sm" name="lsf_for_relocation" value="<?=$row->lsf_for_relocation?>">
									</div>
									<label class="col-sm-1 col-form-label-sm">Site Assistance</label>
										<div class="col-sm-3">
									<input type="text" class="form-control form-control-sm" name="lsf_site_assistance" value="<?=$row->lsf_site_assistance?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label-sm">Proposed Location</label>
									<div class="col-sm-10">
										<input type="text" class="form-control form-control-sm" name="lsf_proposed_location" value="<?=$row->lsf_proposed_location?>">
									</div>
								</div><br>
								<div class="form-group row">
									<input type="hidden" name="fis_app_id" value="<?=$row->fis_app_id?>">
									<label class="col-sm-2 col-form-label-sm">Franchisee Name</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm not-editable" name="lsf_franchisee_name" value ="<?php echo $lsf_app_info->fname .' '. $lsf_app_info->mname . ' ' . $lsf_app_info->lname .' '. $lsf_app_info->suffixname?>" >
									</div>
									<label class="col-sm-2 col-form-label-sm">Franchisee Contact No</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm not-editable" name="lsf_contact_num" value="<?=$lsf_app_info->mobile_no?>" value="<?$row->lsf_contact_num?>">
									</div>
								</div>									
								<div class="form-group row">
									<label class="col-sm-2 col-form-label-sm">Lessor Name</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm" name="lsf_lessor_name" value="<?=$row->lsf_lessor_name?>">
									</div>
									<label class="col-sm-2 col-form-label-sm">Lessor Contact No</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm"  name="lsf_lessor_contact_num" value="<?=$row->lsf_lessor_contact_num?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label-sm">Location Name</label>
									<div class="col-sm-4">
										<input type="text" class="form-control form-control-sm" name="lsf_location_name" value="<?=$row->lsf_location_name?>">
									</div>
								</div>									
								<div class="form-group row">
									<label class="col-sm-2 col-form-label-sm">Location Complete Address</label>
									<div class="col-sm-10">
										<input type="text" class="form-control form-control-sm" name="lsf_location_addrs" value="<?=$row->lsf_location_addrs?>">
									</div>
								</div>

								<?php 

									$elem = "";
									$elem_pop = "";
									$elem_mart = "";

									$hs = "";
									$hs_pop = "";
									$hs_mart = "";

									$col = "";
									$col_pop = "";
									$col_mart = "";

									$mall = "";
									$mall_pop = "";
									$mall_mart = "";

									$term = "";
									$term_pop = "";
									$term_mart = "";

									$cc = "";
									$cc_pop = "";
									$cc_mart = "";

									$ch = "";
									$ch_pop = "";
									$ch_mart = "";

									$hos = "";
									$hos_pop = "";
									$hos_mart = "";

									$pass = "";
									$pass_pop = "";
									$pass_mart = "";

									$off = "";
									$off_pop = "";
									$off_mart = "";

									$res = "";
									$res_pop = "";
									$res_mart = "";

									$other = "";
									$other_pop = "";
									$other_mart = "";

									for($i = 0 ; $i < count($row1) ; $i++){

										$sub = $row1[$i]['lsf_target_market'][0];

										if($sub == 0){
											$elem = substr($row1[$i]['lsf_target_market'],2);
											$elem_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$elem_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 1){
											$hs = substr($row1[$i]['lsf_target_market'],2);
											$hs_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$hs_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 2){
											$col = substr($row1[$i]['lsf_target_market'],2);
											$col_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$col_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 3){
											$mall = substr($row1[$i]['lsf_target_market'],2);
											$mall_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$mall_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 4){
											$term = substr($row1[$i]['lsf_target_market'],2);
											$term_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$term_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 5){
											$cc = substr($row1[$i]['lsf_target_market'],2);
											$cc_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$cc_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 6){
											$ch = substr($row1[$i]['lsf_target_market'],2);
											$ch_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$ch_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 7){
											$hos = substr($row1[$i]['lsf_target_market'],2);
											$hos_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$hos_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 8){
											$pass = substr($row1[$i]['lsf_target_market'],2);
											$pass_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$pass_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 9){
											$off = substr($row1[$i]['lsf_target_market'],2);
											$off_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$off_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 11){
											$res = substr($row1[$i]['lsf_target_market'],2);
											$res_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$res_mart = substr($row1[$i]['lsf_market_type'],2);
										}else if($sub == 12){
											$other = substr($row1[$i]['lsf_target_market'],2);
											$other_pop = substr($row1[$i]['lsf_estimated_population'],2);
											$other_mart = substr($row1[$i]['lsf_market_type'],2);
										}
									}
								?>

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
										            	<input type="text" class="form-control form-control-xs" name="target_market[0]" value="<?=$elem?>">
										            </div>
									        	</td>
									            <td><input type="text" name="estimated_population[0]" class="form-control form-control-xs" value="<?=$elem_pop?>"></td>
									            <td><input type="text" name="market_type[0]" class="form-control form-control-xs" value="<?=$elem_mart?>"></td>
									        </tr>
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">High School</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[1]" value="<?=$hs?>">
										            </div>
									            </td>
									            <td><input type="text" name="estimated_population[1]" class="form-control form-control-xs" value="<?=$hs_pop?>"></td>
									            <td><input type="text" name="market_type[1]" class="form-control form-control-xs" value="<?=$hs_mart?>"></td>
									        </tr>     
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">College</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[2]" value="<?=$col?>">
										            </div>
									            </td>
									            <td><input type="text" name="estimated_population[2]" class="form-control form-control-xs" value="<?=$col_pop?>"></td>
									            <td><input type="text" name="market_type[2]" class="form-control form-control-xs" value="<?=$col_mart?>"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Malls</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" name="target_market[3]" value="<?=$mall?>">
										            </div>
									            </td>
									            <td><input type="text" name="estimated_population[3]" class="form-control form-control-xs" value="<?=$mall_pop?>"></td>
									            <td><input type="text" name="market_type[3]" class="form-control form-control-xs" value="<?=$mall_mart?>"></td>
									        </tr>   
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Terminals</span>
										            <div class="col-sm-8">
										            	<input type="text" class="form-control form-control-xs" value="<?=$term?>" name="target_market[4]">
										            </div>
									            </td>
									            <td><input type="text" value="<?=$term_pop?>" name="estimated_population[4]" class="form-control form-control-xs"></td>
									            <td><input type="text" value="<?=$term_mart?>" name="market_type[4]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Call Centers</span>
										            <div class="col-sm-8">
										            	<input type="text" value="<?=$cc?>" class="form-control form-control-xs" name="target_market[5]">
										            </div>
									            </td>
									            <td><input type="text" value="<?=$cc_pop?>" name="estimated_population[5]" class="form-control form-control-xs"></td>
									            <td><input type="text" value="<?=$cc_mart?>" name="market_type[5]" class="form-control form-control-xs"></td>
									        </tr>   
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Church</span>
										            <div class="col-sm-8">
										            	<input type="text" value="<?=$ch?>" class="form-control form-control-xs" name="target_market[6]">
										            </div>
									            </td>
									            <td><input type="text" value="<?=$ch_pop?>" name="estimated_population[6]" class="form-control form-control-xs"></td>
									            <td><input type="text" value="<?=$ch_mart?>" name="market_type[6]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Hospitals</span>
										            <div class="col-sm-8">
										            	<input type="text" value="<?=$hos?>" class="form-control form-control-xs" name="target_market[7]">
										            </div>
									            </td>
									            <td><input type="text" value="<?=$hos_pop?>" name="estimated_population[7]" class="form-control form-control-xs"></td>
									            <td><input type="text" value="<?=$hos_mart?>" name="market_type[7]" class="form-control form-control-xs"></td>
									        </tr>   
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Passer by</span>
										            <div class="col-sm-8">
										            	<input type="text" value="<?=$pass?>" class="form-control form-control-xs" name="target_market[8]">
										            </div>
									            </td>
									            <td><input type="text" value="<?=$pass_pop?>" name="estimated_population[8]" class="form-control form-control-xs"></td>
									            <td><input type="text" value="<?=$pass_mart?>" name="market_type[8]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Nearby Offices</span>
										            <div class="col-sm-8">
										            	<input type="text" value="<?=$off?>" class="form-control form-control-xs" name="target_market[9]">
										            </div>
									            </td>
									            <td><input type="text" value="<?=$off_pop?>" name="estimated_population[9]" class="form-control form-control-xs"></td>
									            <td><input type="text" value="<?=$off_mart?>" name="market_type[9]" class="form-control form-control-xs"></td>
									        </tr>						        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Residents</span>
										            <div class="col-sm-8">
										            	<input type="text" value="<?=$res?>" class="form-control form-control-xs" name="target_market[10]">
										            </div>
									            </td>
									            <td><input type="text" value="<?=$res_pop?>" name="estimated_population[10]" class="form-control form-control-xs"></td>
									            <td><input type="text" value="<?=$res_mart?>" name="market_type[10]" class="form-control form-control-xs"></td>
									        </tr>        
									        <tr>
									            <td class="row">
									            	<span class="col-sm-4">Others</span>
										            <div class="col-sm-8">
										            	<input type="text" value="<?=$other?>" class="form-control form-control-xs" name="target_market[11]">
										            </div>
									            </td>
									            <td><input type="text" value="<?=$other_pop?>" name="estimated_population[11]" class="form-control form-control-xs"></td>
									            <td><input type="text" value="<?=$other_mart?>" name="market_type[11]" class="form-control form-control-xs"></td>
									        </tr>
									    </tbody>
									</table>
								</div>
								<hr>
								<label>LOCATION IMAGES</label>
								<div class='row'>
									<?php for($i = 0; $i < count($row7); $i++){
											$pic = base_url() ."assets/img/lsf_location_images/".$row7[$i]['lsf_location_image'];
											echo "<a href ='$pic'><div class ='col-md-4'>
												<img src ='$pic' class='img-responsive' height='200px' width='200px'>
												</div></a>";
										}
									?>
                            	</div>
                            	 <br>
                            	<div class="uploadFileContainer"></div>
								<hr>
								<label><strong>TO BE FILLED UP BY BUSINESS DEVELOPMENT OFFICER</strong></label>
								<hr>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Remarks</label>
										<textarea name="remarks" class="form-control" id="exampleTextarea"  style="overflow:hidden"><?=$row2->lsf_bdo_remarks?></textarea>
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
										            <td><input type="text" value="<?=$row2->floor_area_length?>" name="floor_length" class="form-control form-control-xs"></td>
										            <td><input type="text" value="<?=$row2->cart_area_length?>" name="cart_length" class="form-control form-control-xs"></td>
										        </tr>
										        <tr>
										            <td>Width</td>
										            <td><input type="text" value="<?=$row2->floor_area_width?>" name="floor_width" class="form-control form-control-xs"></td>
										            <td><input type="text" value="<?=$row2->cart_area_width?>" name="cart_width" class="form-control form-control-xs"></td>
										        </tr>									        
										        <tr>
										            <td>Height</td>
										            <td><input type="text" value="<?=$row2->floor_area_height?>" name="floor_height" class="form-control form-control-xs"></td>
										            <td><input type="text" value="<?=$row2->cart_area_height?>" name="cart_height" class="form-control form-control-xs"></td>
										        </tr>
										    </tbody>
										</table>
									</div>

									<?php 
										if($row2->equip_req_a == ""){
											$fill = "";
										}else{
											$fill = "checked";
										}

										if($row2->equip_req_b == ""){
											$fill2 = "";
										}else{
											$fill2 = "checked";
										}

										if($row2->construction == "jcwf"){
											$fill3 = "checked";
										}else{
											$fill3 = "";
										}

										if($row2->construction == "franchisee"){
											$fill4 = "checked";
										}else{
											$fill4 = "";
										}
									?>
								
									<div class="col-md-3">
										<label class="row">Equipment Requested</label>
										<div class="row">
											<div class="col-md-6">
												<div class="form-check">
													<input <?=$fill?> class="checkbox-template" type="checkbox" id="gridCheck1" name="equip_req_a" value="gas">
													<label for="gridCheck1" class="form-check-label">
													Gas
													</label>
												</div>
											</div>
											<div class="col-md-6">		
												<div class="form-check">
													<input <?=$fill2?> class="checkbox-template" type="checkbox" id="gridCheck2" name="equip_req_b" value="electric">
													<label for="gridCheck2" class="form-check-label">
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
													<input <?=$fill3?> id="ca" class="radio-template" type="radio" name="construction" value="jcwf">
													<label for="ca" class="form-check-label">
													JCWF
													</label>
												</div>
											</div>
											<div class="col-md-6">		
												<div class="form-check">
													<input <?=$fill4?> id="ca1" class="radio-template" type="radio" name="construction" value="franchisee">
													<label for="ca1" class="form-check-label">
													Franchisee
													</label>
												</div>
											</div>
										</div>

										<?php 
											$myString = $row2->construction_action;
											$myArray = explode(',', $myString);
											$fill1 = "";
											$fill2 = "";
											$fill3 = "";

											for ($i=0; $i < count($myArray); $i++) {

												if ($myArray[$i] == "signage provision"){
													$fill1 = 'checked';
												}else if($myArray[$i] == "menu provision"){
													$fill2 = 'checked';
												}else if($myArray[$i] == "space improvement"){
													$fill3 = 'checked';
												}
											}
										?>
										<div class="row">
											<div class="col-md-7">
												<div class="form-check">
													<input <?=$fill1?> id="con" class="checkbox-template" type="checkbox" name="construction_action[]" value="signage provision">
													<label for="con" class="form-check-label">
													Signage Provision
													</label>
												</div>
											</div>	
											<div class="col-md-7">
												<div class="form-check">
													<input <?=$fill2?> id="con1" class="checkbox-template" type="checkbox" name="construction_action[]" value="menu provision">
													<label for="con1" class="form-check-label">
													Menu Provision
													</label>
												</div>
											</div>	
											<div class="col-md-7">
												<div class="form-check">
													<input <?=$fill3?> id="con2" class="checkbox-template" type="checkbox" name="construction_action[]" value="space improvement">
													<label for="con2" class="form-check-label">
													Space Improvement
													</label>
												</div>
											</div>	
										</div>
									</div>
								</div>
								<?php 
									$myString = $row2->outlet_type;
									$myArray = explode(',', $myString);
									$fill1 = "";
									$fill2 = "";
									$fill3 = "";
									$fill4 = "";
									$fill5 = "";

									for ($i=0; $i < count($myArray); $i++) {

										if ($myArray[$i] == "cart"){
											$fill1 = "checked";
										}else if($myArray[$i] == "stall"){
											$fill2 = "checked";
										}else if($myArray[$i] == "kiosk"){
											$fill3 = "checked";
										}else if($myArray[$i] == "indoor"){
											$fill4 = "checked";
										}else if($myArray[$i] == "outdoor"){
											$fill5 = "checked";
										}
									}
								?>
								<div class="form-group row">
									<label class="col-md-2">Type of Outlet</label>
									<div class="col-md-2">
										<div class="form-check">
											<input <?=$fill1?> id="ot" class="checkbox-template" type="checkbox" name="outlet_type[]" value="cart">
											<label for="ot" class="form-check-label">
											Cart
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input <?=$fill2?> id="ot1" class="checkbox-template" type="checkbox" name="outlet_type[]" value="stall">
											<label for="ot1" class="form-check-label">
											Stall
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input <?=$fill3?> id="ot2" class="checkbox-template" type="checkbox" name="outlet_type[]" value="indoor">
											<label for="ot2" class="form-check-label">
											Indoor
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input <?=$fill4?> id="ot3" class="checkbox-template" type="checkbox" name="outlet_type[]" value="outdoor">
											<label for="ot3" class="form-check-label">
											Outdoor
											</label>
										</div>
									</div>
						
									<div class="col-md-2">		
										<div class="form-check">
											<input <?=$fill5?> id="ot4" class="checkbox-template" type="checkbox" name="outlet_type[]" value="kiosk">
											<label for="ot4" class="form-check-label">
											KIOSK
											</label>
										</div>
									</div>
								</div>
								<?php
									$myString = $row2->menu_pricing;
									$myArray = explode(',', $myString);
									$fill1 = "";
									$fill2 = "";
									$fill3 = "";

									for ($i=0; $i < count($myArray); $i++) {

										if ($myArray[$i] == "luzon"){
											$fill1 = "checked";
										}else if($myArray[$i] == "visayas"){
											$fill2 = "checked";
										}else if($myArray[$i] == "mindanao"){
											$fill3 = "checked";
										}
									}
								?>
								<div class="form-group row">
									<label class="col-md-2">Menu Pricing</label>
									<div class="col-md-2">
										<div class="form-check">
											<input <?=$fill1?> id="mp" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="luzon">
											<label for="mp" class="form-check-label">
											Luzon
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input <?=$fill2?> id="mp1" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="visayas">
											<label for="mp1" class="form-check-label">
											Visayas
											</label>
										</div>
									</div>	
									<div class="col-md-2">
										<div class="form-check">
											<input <?=$fill3?> id="mp2" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="mindanao">
											<label for="mp2" class="form-check-label">
											Mindanao
											</label>
										</div>
									</div>	
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label>Customized Pricing</label>
										<input value="<?=$row2->customized_pricing?>" type="text" class="form-control form-control-sm" name="customized_pricing">
									</div>
								</div>
								<hr>
								<label>Additional Requirements/List of Improvements</label>
								<br>
								<?php 
									$myString = $row2->additional_req;
									$myArray = explode(',', $myString);
									$fill1 = "";
									$fill2 = "";
									$fill3 = "";
									$fill4 = "";
									$fill5 = "";
									$fill6 = "";
									$fill7 = "";
									$fill8 = "";
									$fill9 = "";
									$fill10 = "";
									$fill11 = "";
									$fill12 = "";
									$fill13 = "";
									$fill14 = "";
									$fill15 = "";
									$fill16 = "";
									$fill17 = "";
									$fill18 = "";
									$fill19 = "";
									$other_req ="";
									for ($i=0; $i < count($myArray); $i++) {

										if ($myArray[$i] == "submeter and breaker"){
											$fill1 = "checked";
										}else if($myArray[$i] == "cabinet"){
											$fill2 = "checked";
										}else if($myArray[$i] == "enclosure with teaser"){
											$fill3 = "checked";
										}else if($myArray[$i] == "water meter"){
											$fill4 = "checked";
										}else if($myArray[$i] == "cabinet with teaser"){
											$fill5 = "checked";
										}else if($myArray[$i] == "enclosure without teaser"){
											$fill6 = "checked";
										}else if($myArray[$i] == "range hood"){
											$fill7 = "checked";
										}else if($myArray[$i] == "counter table"){
											$fill8 = "checked";
										}else if($myArray[$i] == "back to back lighted signage"){
											$fill9 = "checked";
										}else if($myArray[$i] == "royal cord"){
											$fill10 = "checked";
										}else if($myArray[$i] == "customized table"){
											$fill11 = "checked";
										}else if($myArray[$i] == "panaflex on frame"){
											$fill12 = "checked";
										}else if($myArray[$i] == "sink with grease trap"){
											$fill13 = "checked";
										}else if($myArray[$i] == "fire extinguisher"){
											$fill14 = "checked";
										}else if($myArray[$i] == "panaflex on wood"){
											$fill15 = "checked";
										}else if($myArray[$i] == "heavy duty wheels"){
											$fill16 = "checked";
										}else if($myArray[$i] == "glass"){
											$fill17 = "checked";
										}else if(strpos($myArray[$i],"other") === 0){
											$fill18 = 'checked';
											$other_req = substr($myArray[$i], 6);
											// print_r($other_req);
											// die();
										}
									}

								?>
								<div class="form-group row">
									<div class="col-md-2"></div>
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill1?> id="ra" class="checkbox-template" type="checkbox" name="additional_req[]" value="submeter and breaker">
											<label for="ra" class="form-check-label">
											Submeter and Breaker
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill2?> id="ra1" class="checkbox-template" type="checkbox" name="additional_req[]" value="cabinet">
											<label for="ra1" class="form-check-label">
											Cabinet
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill3?> id="ra2" class="checkbox-template" type="checkbox" name="additional_req[]" value="enclosure with teaser">
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
											<input <?=$fill4?> id="ra3" class="checkbox-template" type="checkbox" name="additional_req[]" value="water meter">
											<label for="ra3" class="form-check-label">
											Water meter
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill5?> id="ra4" class="checkbox-template" type="checkbox" name="additional_req[]" value="cabinet with teaser">
											<label for="ra4" class="form-check-label">
											Cabinet with Teaser
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill6?> id="ra5" class="checkbox-template" type="checkbox" name="additional_req[]" value="enclosure without teaser">
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
											<input <?=$fill7?> id="ra6" class="checkbox-template" type="checkbox" name="additional_req[]" value="range hood">
											<label for="ra6" class="form-check-label">
											Range hood
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill8?> id="ra7" class="checkbox-template" type="checkbox" name="additional_req[]" value="counter table">
											<label for="ra7" class="form-check-label">
											Counter Table
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill9?> id="ra8" class="checkbox-template" type="checkbox" name="additional_req[]" value="back to back lighted signage">
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
											<input <?=$fill10?> id="ra9" class="checkbox-template" type="checkbox" name="additional_req[]" value="royal cord">
											<label for="ra9" class="form-check-label">
											Royal Cord
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill11?> id="ra10" class="checkbox-template" type="checkbox" name="additional_req[]" value="customized table" >
											<label for="ra10" class="form-check-label">
											Customized Table
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill12?> id="ra11" class="checkbox-template" type="checkbox" name="additional_req[]" value="panaflex on frame">
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
											<input <?=$fill13?> id="ra12"  class="checkbox-template" type="checkbox" name="additional_req[]" value="sink with grease trap">
											<label for="ra12" class="form-check-label">
											Sink with Grease Trap
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill14?> id="ra13" class="checkbox-template" type="checkbox" name="additional_req[]" value="fire extinguisher">
											<label for="ra13" class="form-check-label">
											Fire Extinguisher
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill15?> id="ra14" class="checkbox-template" type="checkbox" name="additional_req[]" value="panaflex on wood">
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
											<input <?=$fill16?> id="ra15" class="checkbox-template" type="checkbox" name="additional_req[]" value="heavy duty wheels">
											<label for="ra15" class="form-check-label">
											Heavy Duty Wheels
											</label>
										</div>
									</div>	
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill17?> id="ra16" class="checkbox-template" type="checkbox" name="additional_req[]" value="glass">
											<label for="ra16" class="form-check-label">
											Glass
											</label>
										</div>
									</div>	
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-4">
												<div class="form-check">
													<input <?=$fill18?> class="checkbox-template" type="checkbox" name="additional_req[]" id="other_req" value="other">
													<label for="other_req" class="form-check-label">
													Others
													</label>	
												</div>
											</div>
											<div class="col-md-8">
												<input value="<?=$other_req?>" type="text" class="form-control form-control-sm" name="additional_req_others">
											</div>
										</div>										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label>Recommendations</label>
										<input value="<?=$row2->recommendations?>" type="text" class="form-control form-control-sm" name="recommendation">
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
												<input value="<?=$row3->lease_period?>" type="text" class="form-control form-control-sm" name="lease_period" >
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Monthly Rent:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->monthly_rent,2,'.', '')?>" type="number" class="form-control form-control-sm" name="monthly_rent" >
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Advance Rent:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->advance_rent,2,'.','')?>" type="number" class="form-control form-control-sm" name ="advance_rent">
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Security Deposit:</label>
											<div class="col-sm-8">

												<input value="<?=number_format($row3->security_deposit,2,'.','')?>" type="number" class="form-control form-control-sm" name="security_deposit" >

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">C.U.S.A.:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->cusa,2,'.','')?>" type="number" class="form-control form-control-sm" name="cusa" >

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Escalation:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->escalation,2,'.','')?>" type="number" class="form-control form-control-sm"  name ="escalation">

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">E/W:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->ew,2,'.','')?>" type="number" class="form-control form-control-sm" name="ew" >

											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Others:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->others,2,'.','')?>" type="number" class="form-control form-control-sm" name="other_terms">

											</div>
										</div>
									</div>

									<?php 
										$myString = $row3->work_permit;
										$myArray = explode(',', $myString);
										$fill1 = '';
										$fill2 = '';	

										for ($i=0; $i < count($myArray); $i++) {

											if ($myArray[$i] == "jcwf"){
												$fill1 = "checked";
											}else if($myArray[$i] == "franchisee"){
												
												$fill2 = "checked";
											}
										}
									?>	
									
									<div class="form-group col-sm-6">
										<div class="form-group row">
											<label class="col-sm-4">Work Permit:</label>
											<div class="col-sm-4">
												<div class="form-check">
													<input <?=$fill1?> id="wp" class="radio-template" type="radio" name="work_permit" value="jcwf">
													<label for="wp" class="form-check-label">
													JCWF
													</label>
												</div>
											</div>	
											<div class="col-sm-4">
												<div class="form-check">
													<input <?=$fill2?> id="wp1" class="radio-template" type="radio" name="work_permit" value="franchisee">
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

													<input value="<?=number_format($row4->rent,2,'.','')?>" type="number" class="form-control form-control-sm" name="rent" >

												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-form-label">LC:</label>
												<div class="col-sm-8">

													<input value="<?=number_format($row4->lc,2,'.','')?>" type="number" class="form-control form-control-sm" name="lc">

												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-form-label">E/W:</label>
												<div class="col-sm-8">

													<input value="<?=number_format($row4->break_even_ew,2,'.','')?>" type="number" class="form-control form-control-sm" name="break_even_ew">

												</div>
											</div>		
											<div class="row">
												<label class="col-sm-4 col-form-label">Gov’t Permit</label>
												<div class="col-sm-8">

													<input value="<?=number_format($row4->gov_permit,2,'.','')?>" type="number" class="form-control form-control-sm" name="gov_permit">

												</div>
											</div>		
											<div class="row">
												<label class="col-sm-4 col-form-label">Marketing Fee</label>
												<div class="col-sm-8">

													<input value="<?=number_format($row4->marketing_fee,2,'.','')?>" type="number" class="form-control form-control-sm" name="market_fee" >

												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-form-label">Daily Cost:</label>
												<div class="col-sm-8">

													<input value="<?=number_format($row4->daily_cost,2,'.','')?>" type="number" class="form-control form-control-sm" name="daily_cost" >

												</div>
											</div>		
											<div class="row">
												<label class="col-sm-4 col-form-label">B.E.S.</label>
												<div class="col-sm-8">

													<input value="<?=number_format($row4->bes,2,'.','')?>" type="number" class="form-control form-control-sm" name="BES">

												</div>
											</div>
											<div class="row">
												<label class="col-sm-4 col-form-label">T.C.</label>
												<div class="col-sm-8">

													<input value="<?=number_format($row4->tc,2,'.','')?>" type="number" class="form-control form-control-sm" name="tc">

												</div>
											</div>		
											<div class="row">
												<label class="col-sm-4 col-form-label">GP%</label>
												<div class="col-sm-8">

													<input value="<?=number_format($row4->gp,2,'.','')?>" type="number" class="form-control form-control-sm" name="gp" >

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
												<input type="number" value="<?=$row5->operation_days?>" class="form-control form-control-sm" name="operation_days" >
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Time of Foot Traffic:</label>
											<div class="col-sm-8">
												<input type="text" value="<?=$row5->foot_traffic?>" class="form-control form-control-sm" name="foot_traffic" >
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Peak time:</label>
											<div class="col-sm-8">
												<input type="text" value="<?=$row5->peak_time?>" class="form-control form-control-sm" name="peak_time">
											</div>
										</div>
										<div class="row">
											<label class="col-sm-4 col-form-label">Lean time:</label>
											<div class="col-sm-8">
												<input type="text" value="<?=$row5->lean_time?>" class="form-control form-control-sm" name="lean_time" >
											</div>
										</div>
									</div>
									<div class="form-group col-sm-6">
										<div class="row">	
											<label class="col-sm-5 col-form-label">Recommended No of Crew: </label>
											<div class="col-sm-7">
												<input type="number" value="<?=$row5->recommended_crew?>" class="form-control form-control-sm" name="recommended_crew" >
											</div>
										</div><div class="row"><br></div>
										<div class="row">
											<label class="col-sm-2 col-form-label">AM:</label>
											<div class="col-sm-4">
												<input type="number" value="<?=$row5->am_crew?>" class="form-control form-control-sm" name="am_crew">
											</div>
											<label class="col-sm-2 col-form-label">PM:</label>
											<div class="col-sm-4">
												<input type="number" value="<?=$row5->pm_crew?>" class="form-control form-control-sm" name="pm_crew">
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
										            <td><input value="<?=$row6->competitor1?>" type="text" name="competitor_a" class="form-control form-control-xs"></td>
										            <td><input value="<?=$row6->menu1?>" type="text" name="menu_a" class="form-control form-control-xs"></td>

										            <td><input value="<?=number_format($row6->price1,2,'.','')?>" type="number" name="price_a" class="form-control form-control-xs"></td>
										            <td><input value="<?=number_format($row6->highest_price1,2,'.','')?>" type="number" name="highest_price_a" class="form-control form-control-xs"></td>
										            <td><input value="<?=number_format($row6->lowest_price1,2,'.','')?>" type="number" name="lowest_price_a" class="form-control form-control-xs"></td>

										        </tr>
										        <tr>
										            <td><input value="<?=$row6->competitor2?>"  type="text" name="competitor_b" class="form-control form-control-xs"></td>
										            <td><input value="<?=$row6->menu2?>" type="text" name="menu_b" class="form-control form-control-xs"></td>

										            <td><input value="<?=number_format($row6->price2,2,'.','')?>" type="number" name="price_b" class="form-control form-control-xs"></td>
										            <td><input value="<?=number_format($row6->highest_price2,2,'.','')?>" type="number" name="highest_price_b" class="form-control form-control-xs"></td>
										            <td><input value="<?=number_format($row6->lowest_price2,2,'.','')?>" type="number" name="lowest_price_b" class="form-control form-control-xs"></td>

										        </tr>									        
										        <tr>
										            <td><input value="<?=$row6->competitor3?>" type="text" name="competitor_c" class="form-control form-control-xs"></td>
										            <td><input value="<?=$row6->menu3?>" type="text" name="menu_c" class="form-control form-control-xs"></td>

										            <td><input value="<?=number_format($row6->price3,2,'.','')?>" type="number" name="price_c" class="form-control form-control-xs"></td>
										            <td><input value="<?=number_format($row6->highest_price3,2,'.','')?>" type="number" name="highest_price_c" class="form-control form-control-xs"></td>
										            <td><input value="<?=number_format($row6->lowest_price3,2,'.','')?>" type="number" name="lowest_price_c" class="form-control form-control-xs"></td>

										        </tr>   
										        <tr>
										            <td><input value="<?=$row6->competitor4?>" type="text" name="competitor_d" class="form-control form-control-xs"></td>
										            <td><input value="<?=$row6->menu4?>" type="text" name="menu_d" class="form-control form-control-xs"></td>

										            <td><input value="<?=number_format($row6->price4,2,'.','')?>" type="number" name="price_d" class="form-control form-control-xs"></td>
										            <td><input value="<?=number_format($row6->highest_price4,2,'.','')?>" type="number" name="highest_price_d" class="form-control form-control-xs"></td>
										            <td><input value="<?=number_format($row6->lowest_price4,2,'.','')?>" type="number" name="lowest_price_d" class="form-control form-control-xs"></td>

										        </tr>  
<!-- 										        <tr>
										            <td><input value="<?=$row6->competitor5?>" type="text" name="competitor_e" class="form-control form-control-xs"></td>
										            <td><input value="<?=$row6->menu5?>" type="text" name="menu_e" class="form-control form-control-xs"></td>
										            <td><input value="<?=$row6->price5?>" type="number" name="price_e" class="form-control form-control-xs"></td>
										            <td><input value="<?=$row6->highest_price5?>" type="number" name="highest_price_e" class="form-control form-control-xs"></td>
										            <td><input value="<?=$row6->lowest_price5?>" type="number" name="lowest_price_e" class="form-control form-control-xs"></td>
										        </tr> -->
										    </tbody>
										</table>
									</div>
								</div>	
								<div class="form-group row">
									<div class="col-md-6">
										<label>Expected Gross Sales (Outlet)</label>
										<input type="text" value="<?=$row5->expected_gross?>" class="form-control form-control-sm" name="expected_gross">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-4">
										<label>Prepared By</label><br><br>
									
										<div class="signature_container">
											<img src="<?=$row5->prepared_by_officer_signature?>" class="img-responsive" id="sample_sig">
										</div>
								
										<input type="hidden" name="prepared_by_signature">
										<input type="text" class="form-control form-control-sm not-editable" name="prepared_by_officer" value='<?=$row5->prepared_by_officer?>'>
										<small class="form-text text-muted">BDD Officer</small>
									</div>
									<div class="col-sm-4">
										<label>Checked By</label><br><br>
										
										<div class="signature_container2">
											<img src="<?=$row5->checked_by_officer_signature?>" class="img-responsive" id="sample_sig2">
										</div>
										
										<input type="text" class="form-control form-control-sm not-editable" name="checked_by_officer" value='<?=$row5->checked_by_officer?>'>
										<small class="form-text text-muted">Business Development Assistant</small>
									</div>
									<div class="col-sm-4">
										<label>Approved By</label><br><br>
										
										<div class="signature_container3">
											<img src="<?=$row5->franchisee_signature?>" class="img-responsive" id="sample_sig3">
										</div>
										
										<input type="hidden" name="approved_by_signature">
										<input type="text" class="form-control form-control-sm not-editable" name="approved_by_franchisee" value ="<?php echo $lsf_app_info->fname .' '. $lsf_app_info->mname . ' ' . $lsf_app_info->lname .' '. $lsf_app_info->suffixname?>">
										<small class="form-text text-muted">Franchisee's Signature</small>
									</div>
								</div>
								<br><hr>
								<button hidden style="float: right; margin-left: 7px;" class="btn btn-primary btnSaveApp" data-value="<?=$row->lsf_id?>">Save Changes</button>
								<button hidden style="float: right; margin-left: 7px;" class="btn btnCancel" >Cancel</button>
								
								<!-- <button style="float: right; margin-left: 7px;" class="btn btn-danger btnEditApp" data-value="<?=$row->lsf_id?>">Edit Endorsement</button> -->	
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </di v>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>

<script src="<?=base_url('assets/js/entity/location_study_form/location_study_editform.js');?>"></script>
