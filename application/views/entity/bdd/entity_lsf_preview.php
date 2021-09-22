<style>
.kbw-signature { width: 300px; height: 100px; }
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-id = "<?=$row->fis_app_id?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">View Location Study Form</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
	    	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/entity_home/'.$token);?>">Entity</a></li>      
	        <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a></li>
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>">FIS Transaction History</a></li>
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_fis_transaction_history/'.$row->fis_app_id."/".$token);?>"><?php echo $lsf_app_info->lname . ", ".$lsf_app_info->fname. " ".$lsf_app_info->mname ." ". $lsf_app_info->suffixname; ?></a></li>
	        <li class="breadcrumb-item">View Location Study Form</li>
        
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                        	
                            <form action="post" id='view_location_study_form'>
                            	<button style="float: right; margin-left: 7px;" class="btn btn-primary btn-sm btnViewApp" data-value="<?=$lsf_app_info->lsf_id?>">Export to PDF</button>
                            	<strong><p>LOCATION STUDY FORM</p></strong>
                            	<hr><br>
                            	<input type="hidden" name="lsf_id" value="<?=$lsf_app_info->lsf_id?>">
                            	<div class="col-md-12">
									<div class="row">
										<div class="col-md-1">
											<div class="form-group">
												<label class="form-label">Date<span class="text-danger">*</span></label>
											</div>
										</div>										
										<div class="col-md-5">
											<div class="form-group">
												<input type="text" class="form-control form-control-sm datepicker required_fields" id="datepicker" name="lsf_date" value="<?=$row->lsf_date?>" >
											</div>
										</div>
										<?php $my_array= explode(',',rtrim($row->lsf_concept,',')); ?>
										<div class="col-md-1">
											<div class="form-group">
												<label class="form-label">Concept<span class="text-danger">*</span></label>
											</div>
										</div>										
										<div class="col-md-5">
											<div class="form-group">
												<select class="form-control form-control-sm required_fields" name="lsf_concept" >
													<?php foreach ($my_array as $concept): ?>
														<option selected value="<?=$concept?>"><?=$concept?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>

										<?php
											$string1 = "";
											$string2 = "";
											if($row->lsf_type_of_ocular == 1){
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
											<input type="text" readonly class="form-control form-control-sm" name="lsf_proposed_location" value="<?=$row->lsf_proposed_location?>">
										</div>

										<div class="col-md-2 form-group">
											<label class="form-label">Franchisee Name<span class="text-danger">*</span></label>
										</div>

										<div class="col-md-4 form-group">
											<input type="text" readonly class="form-control form-control-sm" name="lsf_franchisee_name" value ="<?php echo $lsf_app_info->fname .' '. $lsf_app_info->mname . ' ' . $lsf_app_info->lname .' '. $lsf_app_info->suffixname?>" >
										</div>

										<div class="col-md-2 form-group">
											<label class="form-label">Franchisee Contact No<span class="text-danger">*</span></label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" readonly class="form-control form-control-sm" name="lsf_contact_num" value="<?=$lsf_app_info->mobile_no?>">
										</div>										

										<div class="col-md-2 form-group">
											<label class="form-label">Lessor Name</label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" class="form-control form-control-sm" name="lsf_lessor_name" value="<?=$row->lsf_lessor_name?>">
										</div>

										<div class="col-md-2 form-group">
											<label class="form-label">Lessor Contact No</label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" class="form-control form-control-sm" name="lsf_lessor_contact_num" value="<?=$row->lsf_lessor_contact_num?>">
										</div>										

										<div class="col-md-2 form-group">
											<label class="form-label">Location Name</label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" class="form-control form-control-sm" name="lsf_location_name" value="<?=$row->lsf_location_name?>">
										</div>										

										<div class="col-md-2 form-group">
											<label class="form-label">Location Complete Address</label>
										</div>
										<div class="col-md-4 form-group">
											<input type="text" class="form-control form-control-sm" name="lsf_location_addrs" value="<?=$row->lsf_location_addrs?>">
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
												            		<?php if($elem == 1):  ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											        	</td>
											            <td><input type="text" name="estimated_population[0]" class="form-control form-control-xs" value="<?=$elem_pop?>"></td>
											            <td><input type="text" name="market_type[0]" class="form-control form-control-xs" value="<?=$elem_mart?>"></td>
											        </tr>
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">High School</span>
												            <div class="col-sm-8">
												            	<select name="target_market[1]" class="form-control form-control-xs">
												            		<?php if($hs == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>
									          			<td><input type="text" name="estimated_population[1]" class="form-control form-control-xs" value="<?=$hs_pop?>"></td>
									           			<td><input type="text" name="market_type[1]" class="form-control form-control-xs" value="<?=$hs_mart?>"></td>
											        </tr>     
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">College</span>
												            <div class="col-sm-8">
												            	<select name="target_market[2]" class="form-control form-control-xs">
												            		<?php if($col == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>
     													<td><input type="text" name="estimated_population[2]" class="form-control form-control-xs" value="<?=$col_pop?>"></td>
									           			<td><input type="text" name="market_type[2]" class="form-control form-control-xs" value="<?=$col_mart?>"></td>
											       	</tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Malls</span>
												            <div class="col-sm-8">
												            	<select name="target_market[3]" class="form-control form-control-xs">
												            		<?php if($mall == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>
   														<td><input type="text" name="estimated_population[3]" class="form-control form-control-xs" value="<?=$mall_pop?>"></td>
									           			<td><input type="text" name="market_type[3]" class="form-control form-control-xs" value="<?=$mall_mart?>"></td>
											        </tr>   
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Terminals</span>
												            <div class="col-sm-8">
												            	<select name="target_market[4]" class="form-control form-control-xs">
												            		<?php if($term == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td><td><input type="text" value="<?=$term_pop?>" name="estimated_population[4]" class="form-control form-control-xs"></td>
									           			<td><input type="text" value="<?=$term_mart?>" name="market_type[4]" class="form-control form-control-xs"></td>	
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Call Centers</span>
												            <div class="col-sm-8">
												            	<select name="target_market[5]" class="form-control form-control-xs">
												            		<?php if($cc == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>

											            <td><input type="text" value="<?=$cc_pop?>" name="estimated_population[5]" class="form-control form-control-xs"></td>
									            		<td><input type="text" value="<?=$cc_mart?>" name="market_type[5]" class="form-control form-control-xs"></td>
											        </tr>   
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Church</span>
												            <div class="col-sm-8">
												            	<select name="target_market[6]" class="form-control form-control-xs">
												            		<?php if($ch == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>

											            <td><input type="text" value="<?=$ch_pop?>" name="estimated_population[6]" class="form-control form-control-xs"></td>
									           			<td><input type="text" value="<?=$ch_mart?>" name="market_type[6]" class="form-control form-control-xs"></td>
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Hospitals</span>
												            <div class="col-sm-8">
												            	<select name="target_market[7]" class="form-control form-control-xs">
												            		<?php if($hos == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>

											            <td><input type="text" value="<?=$hos_pop?>" name="estimated_population[7]" class="form-control form-control-xs"></td>
									           			<td><input type="text" value="<?=$hos_mart?>" name="market_type[7]" class="form-control form-control-xs"></td>
											        </tr>   
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Passer by</span>
												            <div class="col-sm-8">
												            	<select name="target_market[8]" class="form-control form-control-xs">
												            		<?php if($pass == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>
 														<td><input type="text" value="<?=$pass_pop?>" name="estimated_population[8]" class="form-control form-control-xs"></td>
									            		<td><input type="text" value="<?=$pass_mart?>" name="market_type[8]" class="form-control form-control-xs"></td>
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Nearby Offices</span>
												            <div class="col-sm-8">
												            	<select name="target_market[9]" class="form-control form-control-xs">
												            		<?php if($off == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>

											            <td><input type="text" value="<?=$off_pop?>" name="estimated_population[9]" class="form-control form-control-xs"></td>
									           			<td><input type="text" value="<?=$off_mart?>" name="market_type[9]" class="form-control form-control-xs"></td>
											        </tr>						        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Residents</span>
												            <div class="col-sm-8">
												            	<select name="target_market[10]" class="form-control form-control-xs">
												            		<?php if($res == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>

											            <td><input type="text" value="<?=$res_pop?>" name="estimated_population[10]" class="form-control form-control-xs"></td>
									           			<td><input type="text" value="<?=$res_mart?>" name="market_type[10]" class="form-control form-control-xs"></td>
											        </tr>        
											        <tr>
											            <td class="row" style="margin-left: -4px;"> 
											            	<span class="col-sm-4">Others</span>
												            <div class="col-sm-8">
												            	<select name="target_market[11]" class="form-control form-control-xs">
												            		<?php if($other == 1): ?>
												            		<option value="0">None</option>
												            		<option selected value="1">Visible</option>
												            		<?php else: ?>
												            		<option selected value="0">None</option>
												            		<option  value="1">Visible</option>
												            		<?php endif; ?>
												            	</select>
												            </div>
											            </td>

											             <td><input type="text" value="<?=$other_pop?>" name="estimated_population[11]" class="form-control form-control-xs"></td>
									            		<td><input type="text" value="<?=$other_mart?>" name="market_type[11]" class="form-control form-control-xs"></td>
											        </tr>
											    </tbody>
											</table>
										</div>
										<div class="col-md-12">
											<hr>
										</div>	

										<div class="col-md-12">
											<label>LOCATION SKETCH / IMAGES<span class="text-danger"><strong>*</strong></span></label>
											<!-- <button id='ADDFILE' class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button> -->
										</div>
									<!-- 	<div class="col-md-12 form-group">
											<span class="small "> Note: You can only upload jpg or png file. You can upload 5 images.</span><span class="asterisk" style="color:red">*</span>
										</div>
 -->		                            <!-- 	<div class="col-md-12 uploadFileContainer">
		                            		<div class="alert alert-info">
		                            			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Upload file</strong><input type="file" name="images[]" class="req_upload">
		                            		</div>
		                            	</div>
 -->										<div class='row col-md-12'>
											<?php for($i = 0; $i < count($row7); $i++){
													$pic = base_url() ."assets/img/lsf_location_images/".$row7[$i]['lsf_location_image'];
													echo "<a href ='$pic'><div class ='col-md-4'>
														<img src ='$pic' class='img-responsive' height='200px' width='200px'>
														</div></a>";
												}
											?>
		                            	</div>
		                            	<div class="col-md-12"><hr></div>
										
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
												<label class="row">Equipment Requested<span class="text-danger"><strong>*</strong></span></label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-check">
															<input <?=$fill?> id="er" class="checkbox-template" type="checkbox" name="equip_req_a" value ="gas">
															<label for="er" class="form-check-label">
															Gas
															</label>
														</div>
													</div>
													<div class="col-md-6">		
														<div class="form-check">
															<input <?=$fill2?> id="er1" class="checkbox-template" type="checkbox" name="equip_req_b" value="electric">
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
															<input <?=$fill3?> id="con" class="radio-template" type="radio" name="construction" value="jcwf">
															<label for="con" class="form-check-label">
															JCWF
															</label>
														</div>
													</div>
													<div class="col-md-6">		
														<div class="form-check">
															<input <?=$fill4?> id="con1" class="radio-template" type="radio" name="construction" value="franchisee">
															<label for="con1" class="form-check-label">
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
															<input <?=$fill1?> id="sa" class="checkbox-template" type="checkbox" name="construction_action[]" value="signage provision">
															<label for="sa" class="form-check-label">
															Signage Provision
															</label>
														</div>
													</div>	
													<div class="col-md-7">
														<div class="form-check">
															<input <?=$fill2?> id="ca1" class="checkbox-template" type="checkbox" name="construction_action[]" value="menu provision">
															<label for="ca1" class="form-check-label">
															Menu Provision
															</label>
														</div>
													</div>	
													<div class="col-md-7">
														<div class="form-check">
															<input <?=$fill3?> id="ca2" class="checkbox-template" type="checkbox" name="construction_action[]" value="space improvement">
															<label for="ca2" class="form-check-label">
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

										<div class="col-md-2 form-group">
											<label>Type of Outlet<span class="text-danger"><strong>*</strong></span></label>
										</div>

										<div class="col-md-2 form-group">
											<div class="form-check">
												<input <?=$fill1?> id="ot" class="checkbox-template" type="checkbox" name="outlet_type[]" value="cart">
												<label for ="ot" class="form-check-label">
												Cart
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input <?=$fill2?> id="ot1" class="checkbox-template" type="checkbox" name="outlet_type[]" value="stall">
												<label for="ot1" class="form-check-label">
												Stall
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input <?=$fill3?> id="ot2" class="checkbox-template" type="checkbox" name="outlet_type[]" value="indoor">
												<label for="ot2" class="form-check-label">
												Indoor
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input <?=$fill4?> id="ot3" class="checkbox-template" type="checkbox" name="outlet_type[]" value="outdoor">
												<label for="ot3" class="form-check-label">
												Outdoor
												</label>
											</div>
										</div>
						
										<div class="col-md-2 form-group">		
											<div class="form-check">
												<input <?=$fill5?> id="ot4" class="checkbox-template" type="checkbox" name="outlet_type[]" value="kiosk">
												<label for="ot4" class="form-check-label">
												KIOSK
												</label>
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
									
										<div class="col-md-2 form-group">
											<label>Menu Pricing<span class="text-danger"><strong>*</strong></span></label>
										</div>
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input <?=$fill1?> id ="mp" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="luzon">
												<label for="mp" class="form-check-label">
												Luzon
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input <?=$fill2?> id="mp1" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="visayas">
												<label for="mp1" class="form-check-label">
												Visayas
												</label>
											</div>
										</div>	
										<div class="col-md-2 form-group">
											<div class="form-check">
												<input <?=$fill3?> id="mp2" class="checkbox-template" type="checkbox" name="menu_pricing[]" value="mindanao">
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
												<input value="<?=$row2->customized_pricing?>" type="text" class="form-control form-control-sm required_fields" name="customized_pricing">
											</div>
										</div>
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
											$fill20 = "";
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
												}else if($myArray[$i] == "none"){
													$fill20 = 'checked';
												}
											}

										?>

										<div class="col-md-12 form-group">
											<label>Additional Requirements/List of Improvements</label>
										</div>
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill20?> id="ra17" class="checkbox-template" type="checkbox" name="additional_req[]" value="none">
												<label for="ra17" class="form-check-label">
												None
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill1?> iid="ra" class="checkbox-template" type="checkbox" name="additional_req[]" value="submeter and breaker">
												<label for="ra" class="form-check-label">
												Submeter and Breaker
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill2?> iid="ra1" class="checkbox-template" type="checkbox" name="additional_req[]" value="cabinet">
												<label for="ra1" class="form-check-label">
												Cabinet
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill3?> iid="ra2" class="checkbox-template" type="checkbox" name="additional_req[]" value="enclosure with teaser">
												<label for="ra2" class="form-check-label">
												Enclosure with Teaser
												</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill4?> iid="ra3" class="checkbox-template" type="checkbox" name="additional_req[]" value="water meter">
												<label for="ra3" class="form-check-label">
												Water meter
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill5?> iid="ra4" class="checkbox-template" type="checkbox" name="additional_req[]" value="cabinet with teaser">
												<label for="ra4" class="form-check-label">
												Cabinet with Teaser
												</label>
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill6?> iid="ra5" class="checkbox-template" type="checkbox" name="additional_req[]" value="enclosure without teaser">
												<label for="ra5" class="form-check-label">
												Enclosure without Teaser
												</label>
											</div>
										</div>
								
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill7?> iid="ra6" class="checkbox-template" type="checkbox" name="additional_req[]" value="range hood">
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
										<div class="col-md-3">
											<div class="form-check">
												<input <?=$fill10?> id="ra9" class="checkbox-template" type="checkbox" name="additional_req[]" value="royal cord">
												<label  for="ra9" class="form-check-label">
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
									<div class="col-md-3">
										<div class="form-check">
											<input <?=$fill13?> id="ra12" class="checkbox-template" type="checkbox" name="additional_req[]" value="sink with grease trap">
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
									<div class="col-md-6 form-group">
										<div class="row">
											<div class="col-md-3">
												<div class="form-check">
													<input <?=$fill18?> class="checkbox-template" type="checkbox" name="additional_req[]" id="other_req" value="other">
													<label for="other_req" class="form-check-label">
													Others
													</label>
												</div>
											</div>
											<div class="col-md-9">
												<input disabled type="text" value="<?=$other_req?>" class="form-control form-control-sm" name="additional_req_others" id="additional_req_others">
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
												<input value="<?=$row3->lease_period?>" type="text" class="form-control form-control-sm" name="lease_period" >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Monthly Rent:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row3->monthly_rent,2,'.', '')?>" type="number" min="1" step="0.01" class="form-control form-control-sm required_fields" name="monthly_rent" id="monthly_rent">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Advance Rent:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->advance_rent,2,'.','')?>" type="number" min="1" class="form-control form-control-sm" name ="advance_rent">

											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Security Deposit:</label>
											<div class="col-sm-8">

												<input <input value="<?=number_format($row3->security_deposit,2,'.','')?>" type="number" min="1" class="form-control form-control-sm" name="security_deposit" >

											</div>
										</div>
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">C.U.S.A.:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->cusa,2,'.','')?>" type="number" min="1" class="form-control form-control-sm" name="cusa" >

											</div>
										</div>
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">Escalation:</label>
												<div class="col-sm-8">

											<input value="<?=number_format($row3->escalation,2,'.','')?>" type="number" min="1" class="form-control form-control-sm"  name ="escalation">

											</div>
										</div>
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">Electric/Water:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input <input value="<?=number_format($row3->ew,2,'.','')?>" type="number" min="1" class="form-control form-control-sm required_fields" name="ew" id="ew">
											</div>
										</div>										
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">Govt Permit<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row3->yearly_gov_permit,2,'.','')?>" type="number" min="1" class="form-control form-control-sm required_fields" name="gov_permit" id="gov_permit">
											</div>
										</div>										
										<div class="row form-group">
											<label class="col-sm-4 col-form-label">Marketing Fee and Admin Fee<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row3->yearly_gov_permit,2,'.','')?>" type="number" min="1" class="form-control form-control-sm required_fields" name="marketing_fee" id="marketing_fee">
											</div>
										</div>
										<div class="row form-group ">
											<label class="col-sm-4 col-form-label">Others:</label>
											<div class="col-sm-8">
												<input value="<?=number_format($row3->others,2,'.','')?>" type="number" min="1" class="form-control form-control-sm" name="other_terms" id="other_terms">
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
												<input value="<?=number_format($row4->rent,2,'.','')?>" readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_rent" id="break_even_rent">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">LC:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->labor_cost,2,'.','')?>" readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_lc" id="break_even_lc">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">E/W:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->electric_water,2,'.','')?>" readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_ew" id="break_even_ew">
											</div>
										</div>		
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Gov’t Permit<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->gov_permit,2,'.','')?>" readonly type="number" min="1" step="0.01" class="form-control form-control-sm required_fields" name="break_even_gov_permit" id="break_even_gov_permit">
											</div>
										</div>		
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Marketing Fee and Admin Fee<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->marketing_fee,2,'.','')?>" readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_market_fee" id="break_even_market_fee">
											</div>
										</div>
										<div class="row form-group ">
											<label class="col-sm-4 col-form-label">Others:</label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->other_fee,2,'.','')?>" readonly type="number" min="1" class="form-control form-control-sm" name="break_even_other" id="break_even_other">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Total Daily Cost:<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->total_daily_cost,2,'.','')?>" readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_daily_cost" id="break_even_daily_cost">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Lowest SRP<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->lowest_srp,2,'.','')?>" type="text" class="form-control form-control-sm required_fields" name="bes_lowest_srp" id="bes_lowest_srp">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">GP%<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->gross_percentage,2,'.','')?>" type="text" class="form-control form-control-sm required_fields" name="break_even_gp" id="break_even_gp" placeholder="%">
											</div>
										</div>		
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">B.E.S.<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->break_even_sales,2,'.','')?>" readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_bes" id="break_even_bes">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">T.C.<span class="text-danger"><strong>*</strong></span></label>
											<div class="col-sm-8">
												<input value="<?=number_format($row4->transaction_count,2,'.','')?>" readonly type="number" min="1" class="form-control form-control-sm required_fields" name="break_even_tc" id="break_even_tc">
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
														<input value="<?=$row5->operation_days?>" type="number" min="1" class="form-control form-control-sm required_fields" name="operation_days" id="operation_days" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Time of Foot Traffic:</label>
													<div class="col-sm-8">
														<input value="<?=$row5->foot_traffic?>" type="text" class="form-control form-control-sm" name="foot_traffic" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Peak time:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-4">
														<input value="<?=$row5->peak_time?>" type="text" class="form-control form-control-sm required_fields" name="peak_time">
													</div>
													<label class="col-sm-2 col-form-label">Foot count:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-4">
														<input value="<?=$row5->peak_time_footcount?>" type="number" class="form-control form-control-sm required_fields" name="peak_time_foot_count" id="peak_time_foot_count">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Lean time:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-4">
														<input value="<?=$row5->lean_time?>" type="text" class="form-control form-control-sm required_fields" name="lean_time" >
													</div>
													<label class="col-sm-2 col-form-label">Foot count:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-4">
														<input value="<?=$row5->lean_time_footcount?>" type="number" class="form-control form-control-sm required_fields" name="lean_time_foot_count" id="lean_time_foot_count">
													</div>
												</div>											
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Estimated Transaction Count:<span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-8">
														<input value="<?=$row5->estimated_trans_count?>" readonly type="text" class="form-control form-control-sm required_fields" name="transact_count" id="transact_count" >
													</div>
												</div>												
											</div>
											<div class="form-group col-sm-6">
												<div class="form-group row">	
													<label class="col-sm-5 col-form-label">Recommended No of Crew: <span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-7">
														<input value="<?=$row5->recommended_crew?>" type="number" min="1" class="form-control form-control-sm required_fields" name="recommended_crew" id="recommended_crew" >
													</div>
												</div>													

												<div class="form-group row">	
													<label class="col-sm-5 col-form-label">Labor Cost per Crew: <span class="text-danger"><strong>*</strong></span></label>
													<div class="col-sm-7">
														<input value="<?=$row5->labor_cost_per_crew?>" type="number" min="1" class="form-control form-control-sm required_fields" name="labor_cost_per_crew" id="labor_cost_per_crew">
													</div>
												</div>												
												<div class="form-group row">	
													<label class="col-sm-5 col-form-label">Number of Working Days per Crew:<span class="text-danger"><strong>*</strong></span> </label>
													<div class="col-sm-7">
														<input value="<?=$row5->working_days_per_crew?>" type="number" min="1" class="form-control form-control-sm required_fields" name="working_days" id="working_days" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-5 col-form-label">AM:</label>
													<div class="col-sm-7">
														<input value="<?=$row5->am_crew?>" type="number" min="1" class="form-control form-control-sm" name="am_crew">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-5 col-form-label">PM:</label>
													<div class="col-sm-7">
														<input value="<?=$row5->pm_crew?>" type="number" min="1" class="form-control form-control-sm" name="pm_crew">

													</div>
												</div>
											</div>	
										</div>
									</div>
<!-- 									<div class="col-md-12">
										<label><strong>ACTUAL GROSS SALES</strong></label>
									</div> -->
									<div class="col-md-6 form-group">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Number of Competitors:<span class="text-danger"><strong>*</strong></label>
											<div class="col-sm-8">
												<input value="<?=$row5->no_of_competitors?>" type="number" max="4" class="form-control form-control-sm required_fields" name="no_of_competitors" id="no_of_competitors" placeholder ="Maximum of 4 competitors">
											</div>
										</div>
									</div>
									<?php  if($row5->actual_gross_sales > 0):?>								
									<div class="col-md-6 form-group" id="actual_gross_sales_div">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Actual Gross Sales<span class="text-danger"><strong>*</strong></label>
											<div class="col-sm-8">
												<input value="<?=$row5->actual_gross_sales?>" type="number" class="form-control form-control-sm" name="actual_gross_sales" id="actual_gross_sales" >
											</div>
										</div>
									</div>
									<?php endif; ?>
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
										       
										    </tbody>
										</table>
									</div>
									
									<div class="col-md-12">
										<label>Expected Gross Sales (Outlet) <span class="text-danger">*</span></label>
									</div>
									<div class="form-group col-md-6">
										<input value="<?=$row5->expected_gross_sales?>" readonly type="number" min="1" class="form-control form-control-sm required_fields" name="expected_gross" id="expected_gross">
									</div>

									<div class="col-md-12">
										<hr>	
										<label class="form-label"><strong>FINAL ASSESSMENT<span class="text-danger">*</span></strong></label>
									</div>
									<?php 
										$final_assess = rtrim(str_replace("_","&#13;&#10;",$row->final_assessment),",");
									?>
									<div class="col-md-12">
										<textarea class="form-control required_fields" rows="4" style="margin-bottom:20px" name ="final_assessment"><?=$final_assess?></textarea>
									</div>

									<?php 

										$fill1 =  "";
										$fill2 =  "";
										$fill3 =  "";
										
										if($row->lsf_status == 1){
											$fill1 = "checked";
										}

										if($row->lsf_status == 2){
											$fill2 = "checked";
										}

										if($row->lsf_status == 3){
											$fill3 = "checked";
										}

									?>

									<div class="col-md-3">
										<div class="form-group">
										 	<label class="approval_label" >
										    	<input <?=$fill1?> class="radio-template" type="radio" name="lsf_status" id="inlineCheckbox1" value="1"> APPROVED
										  </label>
										</div>
									</div>										
									<div class="col-md-3">
										<div class="form-group">
										 	<label class="approval_label">
										    <input <?=$fill2?> class="radio-template" type="radio" name="lsf_status" id="inlineCheckbox2" value="2"> DECLINED FOR WAIVER
										  </label>
										</div>
									</div>									

									<div class="col-md-3">
										<div class="form-group">
										 	<label class="approval_label">
										    <input <?=$fill3?> class="radio-template" type="radio" name="lsf_status" id="inlineCheckbox2" value="3"> DECLINED
										  </label>
										</div>
									</div>
									
									<div class="col-md-6 form-group" style="margin-top:20px">
										<label>Prepared By<span class="text-danger">*</span></label><br>
										<!-- Signature Example -->
					<!-- 	 				<div class="row signature_pad form-control">
											<div id="prepared_by_signature"></div>
											<p style="clear: both;">
												<button class="btn btn-default btn-sm" id="clear">Reset</button> 
											</p>
										</div>
										<div class="signature_container" hidden>
											<img src="" id="sample_sig">
											<button id="clear2">Reset</button> 
										</div>
										<input required type="hidden" name="prepared_by_signature"> -->
										<div class="form-group">
											<input value="<?=$row->bdd_officer?>" type="text" class="form-control form-control-sm required_fields" name="prepared_by_officer">
											<label class="form-text text-muted">Business Development Officer<span class="text-danger">*</span></label>
										</div>
									</div>
						<!-- 			<div class="col-md-12">
										<button id='btnReg' class="btn btn-primary btnReg" style="float: right; margin-left: 7px;">Submit</button>
									</div> -->
									</div>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>

<script src="<?=base_url('assets/js/entity/location_study_form/location_study_editform.js');?>"></script>
