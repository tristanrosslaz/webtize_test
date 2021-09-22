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

th.size1 {
    width: 90px !important;
}

th.size2 {
    width: 120px !important;
}

@media only screen and (min-width : 480px) {
	.select2 {
		width: calc(100%) !important;
		margin-left: 0;
	}

    span.select2.select2-container.select2-container--default {
            width: 100% !important;
        }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {

	.select2 {
		width: calc(100%) !important;
		margin-left: 0;
	}
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ewallet-collapse-a" data-labelname="Collection">

    <div class="bc-icons-2 card mb-4">
    	<ol class="breadcrumb mb-0 primary-bg px-4 py-3">
    		<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
    		<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
    		<li class="breadcrumb-item active">Franchise Service Receipt</li>
    	</ol>
    </div>
    <section class="tables">   
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="">
    					<div class="card-progress d-none">
    						<div class="card-header d-flex align-items-center">
    							<div class="col-lg-12">
    								<div class="row">
    									<div class="col-md-12 " style="padding-left: 0;">
    										<div class="col-md-6">
    											<h3 class="step_label">Step 1</h3>
    										</div>
    										<div class="col-md-6">
    											<small class="form-text required_fields" style="margin-bottom: 0; margin-top: 5px;">Required fields</small>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="col-lg-12 px-0 padding-0_mobile" style="padding-bottom: 30px;">
    						<div class="card-progress">
    							<form class="form-horizontal encode-info-css sales_form" id="sales_form ">
    								<br>
    								<div class="col-lg-12 padding-0_mobile">
    									<div class="step1" id="step1">
    										<div class="">
    											<div class="">
                                                    
    												<input type="hidden" class="passCustomerLink" id="" name="passCustomerLink" value="<?=base_url("Main_sales/ticketlist_customer/".$token);?>">
    												<div class="form-group row">
    													<div class="col-md-6">
                                                            <div class="card h-100">
                                                                <h6 class="secondary-bg px-4 py-3 white-text">FSR To</h6>
                                                                <div class="p-4">
            														<div class="form-group">
            															<div class="alert alert-warning notif_changecustomer" id="notif_changecustomer" hidden>NOTE: Remove item added before select enable</div>
            															<small class="form-text">Select Customer </small>
            															<select class="form-control col-md-6 select2 searchCustomer" id="searchCustomer" name="searchCustomer">
            																<option selected></option>
            																<?php
            																foreach ($get_supplier->result() as $gsupplier) { ?>
            																<option value="<?php echo $gsupplier->idno . '|' . $gsupplier->franchiseid?>"><?php echo strtoupper($gsupplier->lname) . ", " . strtoupper($gsupplier->fname) . " " . strtoupper($gsupplier->mname) . " - " . strtoupper($gsupplier->branchname); ?> </option>
            																<?php } ?>
            																?>                              
            															</select>
            														</div>
            														<div id="txtResult">

            															<div class="form-group">
            																<small class="form-text">Contact No </small>
            																<input type="" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" disabled>
            															</div>
            															<input type="hidden" class="form-control form-control-success mode_payment" name="mode_payment" id="mode_payment">
            															<div class="form-group">
            																<small class="form-text">Mode of Payment </small>
            																<input type="text" class="form-control form-control-success term_credit" name="term_credit" id="term_credit" disabled>
            															</div>
            															<div class="form-group">
            																<small class="form-text">Address </small>
            																<input type="" class="form-control form-control-success address" name="address" id="address" disabled>
            															</div>
            														</div> 
                                                                </div>
                                                            </div>
    													</div>
    													<input type="" value="<?=$get_users->username?>" id="username" class="username" name="username" hidden>

    													<div class="col-md-6">
                                                            <div class="card h-100">
                                                                <h6 class="secondary-bg px-4 py-3 white-text">FSR Details</h6>
                                                                <div class="p-4">
            														<div class="form-group">
            															<small class="form-text">Date </small>
            															<input  type="text" value="<?=today_text()?>" class="form-control form-control-warning  sales_date" id="sales_date" name="sales_date" required/>
            														</div>
            														<div class="form-group">
            															<small class="form-text">Select Agent </small>
            															<select class="agentid form-control select2" id="agentid" name="agentid" required>
            																<option value="1" selected>IN HOUSE</option>
            																<?php
            																foreach ($get_agent->result() as $gagent) { ?>
            																<option value="<?=$gagent->id?>"><?php echo strtoupper($gagent->description); ?> </option>
            																<?php } ?>
            																?>                              
            															</select>
            														</div>
                                                                </div>
                                                            </div>
    													</div>
    												</div>
    											</div>
    										</div>
    									</div>   
    									<div class="step2" style="display: none;">
    										<div class="card">
    											<div id="showInfo" style="font-size: 15px; margin-bottom: 30px;"></div>
    											<div class="form-group text-right p-4" style="float: right;margin-right: 0px;top:20px;">  
                                                <hr>       
    												<button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAOrderItemModal" class="btn btn-primary btnUpdate btnTable" id="addsalesorder" name="update" disabled >Add Service</button>
    											</div>
    											<div class="table-responsive p-4">
    												<table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
    													<thead>
    														<tr>
    															<th>Name</th>
    															<th class="size1" width="80px">Quantity</th>
                                                                <th class="size2" width="120px">Unit</th>
                                                                <th class="size2" width="120px">Price</th>
                                                                <th class="size2" width="120px">Total</th>
                                                                <th class="size1" width="80">Action</th>
    														</tr>
    													</thead>
    												</table>
    												<div class="col-md-3 text-right" style="float: right; padding-right: 0px;">
                                                        <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total: 0.00</a></button>


    													<input type="hidden" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2" >
    													<input type="hidden" class="form-control form-control-success item_total" name="item_total" id="item_total" >
    												</div>
    												<br>
    												<br>
    												<label for="notes">Notes</label> 
    												<textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes"></textarea>
    											</div>
    											<input type="text" class="" value="0"  id="rowrec" name="rowrec" hidden>
    											<input type="" class="" value=""  id="priceresult" hidden>

    										</div>
    									</div>
    									<div class="step3 card" style="display: none;">
    										<div class="form-group" style="margin-top: 50px;">
    											<center><h3>You have successfully created a new Franchise Service Receipt!  <div id="showInfo" style="font-size: 15px;margin-bottom: 50px;"></div><span class="refNospan" style="color:red"></span></h3>
    												<button style="" class="btn blue-grey" onclick="reloadBack()"> Add More Franchise Service</button>

    												<a href="<?=base_url('Main_sales/fran_service_history/'.$token);?>" class="btn primary-bg">  Proceed to Transaction History</a>
    											</center>
    										</div>
    									</div>
    								</div>
    								<div class="col-lg-12">
    									<br><br>
    									<button style="float: right;" id="btnSONext" class="btn btn-primary BtnNext" onclick="show_infofsr()" data-page="0">Next </button>
    									<button hidden style="float: right;" id="BtnSaveProceed"  onclick="show_infofsr()" class="btn btn-primary BtnSaveProceed"> Save</button>
    									<button hidden style="float: right; margin-right:10px;" id="btnVioBack2" class="btn blue-grey BtnBack2"> Back</button>                                    
    								</div>
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <div id="addAOrderItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    	<div role="document" class="modal-dialog modal-lg">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h4 id="exampleModalLabel" class="modal-title">Add Service</h4>
    			</div>
    			<div class="modal-body">
    				<form class="form-horizontal personal-info-css" id="add_deliverypartnerinfo-form">
    					<div class="form-group row">
    						<label class="col-md-3 form-control-label">Search Code <span class="" style="color:red">*</span></label>
    						<div class="col-md col-12">
    							<input id="searchSalesorder" type="text" class="form-control form-control-success searchSalesorder" name="searchSalesorder" value="">
    							<input type="hidden" class="searchSalesorderCode_id" name="searchSalesorderCode_id" id="searchSalesorderCode_id" required>
    							<input type="hidden" class="orig_price" name="orig_price" id="orig_price" required>
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-md-3 form-control-label">Price <span class="" style="color:red">*</span></label>
    						<div class="col">
    							<input type="" class="form-control fsr_price valid_number" min="0" onkeypress="return isNumberKeyOnly(event)" name="fsr_price" id="fsr_price" required="" disabled="disabled" autofocus>
    						</div>
    						<div class="col-auto">
    							<button class="btn btn-primary" id="enable">Change</button>
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-md-3 form-control-label">Quantity <span class="" style="color:red">*</span></label>
    						<div class="col-md col-12">
    							<input class="form-control form-control-success valid_number qty" min="" type="text" name="qty" id="qty" oninput="validity.valid||(value='');" required="required">
    						</div>
    					</div>
    					<div class="modal-footer">
    						<div class="form-group row"> 
    							<button type="button" style="margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
    							<button class="btn btn-primary addSalesOrderEncodeBtn" data-dismiss="modal" aria-label="Close" type="button">Add</button>
    						</div>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>



    <?php $this->load->view('includes/footer'); ?>
    <script src="<?=base_url('assets/js/sales/fran_service_receipt.js');?>"></script>
    <script src="<?=base_url('assets/js/sales/functions.js');?>"></script>