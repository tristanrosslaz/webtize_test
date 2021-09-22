<?php 
//071318
//this code is for destroying session and page if they access restricted page

$position_access = $this->session->userdata('get_position_access');
$access_content_nav = $position_access->access_content_nav;
$arr_ = explode(', ', $access_content_nav); //string comma separated to array 
$get_url_content_db = $this->model->get_url_content_db($arr_)->result_array();

$url_content_arr = array();
foreach ($get_url_content_db as $cun) {
    $url_content_arr[] = $cun['cn_url'];
}
$content_url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/';

if (in_array($content_url, $url_content_arr) == false){
    header("location:".base_url('Main/logout'));
}    
//071318
?>
  <style> 
    /* Extra Small Devices, Phones */ 
    @media only screen and (min-width : 480px) {
        .select2 {
            width: calc(100%) !important;
            margin-left: 0;
        }

         .col-md-6.form-collect{
            margin: auto !important;
            width: 50% !important;     
            background-color: #f5f5f5 !important;   
            padding: 0 !important; 
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;
        } 

        span.select2.select2-container.select2-container--default {
            width: 100% !important;
        }
        }

    /* Small Devices, Tablets */
    @media only screen and (min-width : 768px) {
        
        .select2 {
            width: calc(74% - 43px) !important;
            margin-left: 0;
        }

        span.select2.select2-container.select2-container--default {
            width: 66% !important;
        }
    }
  </style>
<div class="content-inner" id="pageActive" data-num="6" data-namecollapse="" data-labelname="Manufacturing">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/manufacturing_home/'.$token);?>">Manufacturing</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Build Inventory</li>
        </ol>
    </div>
    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Build Inventory Information</h6>
                        <div class="card-body">
                        	<div class="col-lg-12">
                        		<div class="">        
                            		<form id="frmbuildInventory">
                            			<div class="col-lg-12 margin-top-20">
                                      
                            			    <!-- PREP DATE -->    
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Preparation Date<span class="" style="color:red">*</span></label>
                                    			<input type="text" class="form-control required_fields col-md-8 form-control-success" name="prep_date" id="prep_date" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                			</div>

                                			<!-- MIX DATE -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Mix Date<span class="" style="color:red">*</span></label>
                                    			<input type="text" class="form-control required_fields col-md-8 form-control-success" name="mix_date" id="mix_date" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                			</div>

                                
                                			<!-- BUILD DATE -->
                                			<div class="form-group row">
                                  				<label class="form-control-label col-md-4">Build Date<span class="" style="color:red">*</span></label>
                                				<input type="text" class="form-control required_fields col-md-8 form-control-success" name="build_date" id="build_date" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                			</div>
                                  
                                			<!-- SELECT INVENTORY -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Inventory<span class="" style="color:red">*</span></label>
                                    			<select class="form-control col-md-8 required_fields" name="inv" id="inv">
                                        			<option selected value="">-- Select Inventory--</option>
                                         			<?php foreach ($get_inventory as $value):?>
                                        			<option value="<?php echo $value['itemid']?>"><?php echo strtoupper($value['itemname'])?></option>
                                         			<?php endforeach;?>
                                    			</select>
                                			</div>                                    

                                			<!-- SELECT Ingredients Location -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Ingredients Location<span class="" style="color:red">*</span></label>
                                    			<select class="form-control required_fields col-md-8" name="ing" id="ing">
                                        			<option selected value="">-- Select Ingredients Location --</option>
                                         			<?php foreach ($get_location as $value):?>
                                        			<option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                         			<?php endforeach;?>
                                    			</select>
                                			</div>                                                                                             
                                				
                                            <!-- Select Meat Location -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Meat Location<span class="" style="color:red">*</span></label>
                                    				<select class="form-control required_fields col-md-8" name="meat" id="meat">  
                                        				<option selected value="">-- Select Meat Location --</option>
                                        				<?php foreach ($get_location as $value):?>
                                        				<option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                         				<?php endforeach;?>
                                    				</select>     
                                			</div>

                                 			<!-- SELECT Build Location -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Build Location<span class="" style="color:red">*</span></label>
                                    				<select class="form-control required_fields col-md-8" name="build" id="build">
                                        				<option selected value="">-- Select Build Location --</option>
                                        				<?php foreach ($get_location as $value):?>
                                        				<option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                         				<?php endforeach;?>
                                    				</select>
                                			</div>

                                			<!-- QTY -->
                                			<div class="form-group row">
                                				<label class="form-control-label col-md-4">Quantity<span class="" style="color:red">*</span></label>
                                				<input type="text" class="form-control required_fields material_josh form-control-sm search-input-text search col-md-8 qty allownumericwithdecimal" name="qty" id="qty" oninput="validity.valid||(value='');" min="" placeholder="0.00">
                                			</div>

                                			<!-- NOTES -->
                                			<div class="form-group row">
                                				<label class="form-control-label col-md-4">Notes</label>
                                				<input type="text" class="form-control material_josh form-control-sm search-input-text search col-md-8" id="notes" name="notes" placeholder="Notes">
											</div>

                                            <div class="form-group row margin-top-20 float-right">
                                            <button class="btn btn-primary proceedBtn">Proceed</button>
                                            </div>
                                        
                                        </div> <!-- padding 20 -->        
                            		</form>
                        		</div> <!-- interface1 -->
                        	</div>
                        
                        </div><!-- card body -->
                    </div><!-- card -->
				</div> <!-- col 12 -->
			</div>
        </div>
    </section>

    <section class="tables interface2">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row col-lg-12">
                                <div class="row col-lg-12">
                                    <label style="color: gray; font-weight: lighter;">Build Information </label>
                                </div>

                                <div class="col-lg-6">

                                    <div class="row">
                                        <div>
                                            <label>Preperation Date: </label>
                                            <br>
                                            <label>Mix Date: </label> 
                                            <br>
                                            <label>Build Date: </label>
                                            <br>
                                            <label>Quantity: </label>  
                                            <br>
                                            <label>Unit:</label> 
                                        </div>
                                    
                                    <span style="margin: 3%;"></span>

                                        <div>
                                            <label class="lblprepDate"></label>   
                                            <br>
                                            <label class="lblmixDate"></label>   
                                            <br>
                                            <label class="lblbuildDate"></label>   
                                            <br>
                                            <label class="lblQty"></label>   
                                            <br>
                                            <label class="lblUnit"></label>   
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="row">
                                        <div>
                                            <label>Item Name: </label>
                                            <br>
                                            <label>Ingredients Location: </label> 
                                            <br>
                                            <label>Meat Location: </label>
                                            <br>
                                            <label>Build Location: </label>  
                                        </div>
                                    
                                    <span style="margin: 3%;"></span>

                                        <div>
                                            <strong><label class="lblItem"></label></strong>    
                                            <br>
                                            <label class="lblIngredients"></label>   
                                            <br>
                                            <label class="lblMeat"></label>  
                                            <br>
                                            <label class="lblBuild"></label>   
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tbl-details">
                                <br>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label col-form-label-sm">Item Name</label>
                                            <input type="text" data-column="0" id="search_item"  class="form-control material_josh form-control-sm search-input-text search_item" placeholder="Item Name">
                                        </div>   
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label col-form-label-sm">Quantity</label>
                                            <input type="text" data-column="1" id="search_quantity"  class="form-control material_josh form-control-sm search-input-text search_quantity allownumericwithdecimal"  oninput="validity.valid||(value='');" min="" placeholder="Quantity">
                                        </div>
                                    </div>
                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label col-form-label-sm">Unit</label>
                                            <input type="text" data-column="2" id="search_unit"  class="form-control material_josh form-control-sm search-input-text search_unit" placeholder="Unit">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group-material" style="padding-left:10px; padding-top: 30px;">
                                            <button type="button" class="btn btn-primary searchBtn">Search</button>
                                        </div>
                                    </div>
                                </div> 

                                       

                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="60">ID</th>
                                                <th>Item Name</th>
                                                <th>Qty</th>
                                                <th>Unit</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <br>
                                <div class="form-group">
                                    <textarea class="form-control txtarea" style="resize: none;" rows="3" placeholder="Notes" readonly="readonly" id="txtareanotes"></textarea>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary float-right buildButton">Build Inventory</button>
                                </div> 
                            </div> <!-- tbl-details -->
                        
                        </div><!-- card body -->
                    </div><!-- card -->
                </div> <!-- col 12 -->
            </div>
        </div>
    </section>

    <br><br><br><br><br><br>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/manufacturing/build inventory/manufacturing_buildinventory.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->