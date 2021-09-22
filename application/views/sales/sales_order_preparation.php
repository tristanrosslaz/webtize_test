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
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales Order for Preparation"> 
    <div class="bc-icons-2 card mb-4">
    	<ol class="breadcrumb mb-0 primary-bg px-4 py-3">
    		<!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
    		<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
    		<li class="breadcrumb-item active">Sales Order for Preparation</li>
    	</ol>
    </div>
    <section class="tables">   
    	<div class="container-fluid">
    		<div class="row">

    			<div class="col-lg-12">
    				<div class="card">
    					<div class="">
    						<div class="card-header d-flex align-items-center">
    							<div class="col-lg-12" style="padding-right: 0">
    								<div class="row">
    									<div class="col-lg col-12">
    										<div class="form-group row">
    											<div class="podatediv" id="podatediv">
    												<label class="form-control-label col-form-label-sm">Date</label>
    												<div class="input-daterange input-group" id="datepicker">
    													<input type="text" data-column="0" autocomplete="off" class="input-sm form-control search-input-select1 searchDateFrom" name="start" value="<?=today_text();?>" readonly/>
    													<span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
    													<input type="text" data-column="1" autocomplete="off" class="input-sm form-control search-input-select2 searchDateTo margin-5_mobile" name="end" value="<?=today_text();?>" readonly/>    
    												</div>   
    											</div> 
    										</div> 
    									</div>
    									<input  type="hidden" value="<?=$token?>" class="form-control form-control-warning" id="token" name="token"/>
    									<div class="col-lg col-12 pl-0_mobile">
    										<div class="sowarehouse" id="sowarehouse">
    											<label class="form-control-label col-form-label-sm">Location</label>
    											<select class="form-control search_warehouse" id="search_warehouse" data-column="5" name="search_warehouse" data-column="5">
    												<option selected value="all">All</option>
    												<?php
    												foreach ($get_warehouse->result() as $gwarehouse) { ?>
    												<option value="<?=$gwarehouse->id?>"><?=$gwarehouse->description?></option>
    												<?php } ?>
    												?>                              
    											</select>
    										</div>                                  
    									</div>
    									<div class="col-lg col-12">
    										<div class="pull-right">
    											<button type="submit" id="search_order" class="btn btn-primary search_order">Search</button>                           
    										</div>
    									</div>                                       
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="card-body">
    						<div class="table-responsive table_prep" style="display: none">
    							<table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
    								<thead>
    									<tr>
    										<th>Date</th>
    										<th>SO No.</th>  
    										<th>Name</th>
    										<th>Warehouse</th>
    										<th><input type="checkbox" id="checkedAll" class="checkedAll"></th>
    									</tr>
    								</thead>
    							</table>
    						</div>
    						<div class="col-12 text-right" style="float: right; padding: 0px;">
    							<button class="btn btn-primary btnGrand col-md-12 BtnSaveSOPrep" id="BtnSaveSOPrep" name="BtnSaveSOPrep" disabled="disabled">Generate Sales Order Preparation Summary Report</button>
    						</div>
    					</div>

    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <?php $this->load->view('includes/footer'); ?>
    <script type="text/javascript" src="<?=base_url('assets/js/sales/sales_order_preparation.js');?>"></script>
    <script>
    	$(document).ready(function() {
    		$("#checkedAll").change(function(){
    			if(this.checked){
    				$(".prep_check").each(function(){
    					this.checked=true;
    				})              
    			}else{
    				$(".prep_check").each(function(){
    					this.checked=false;
    				})              
    			}
    		});
            
    		$(".prep_check").click(function () {
    			if ($(this).is(":checked")){
    				var isAllChecked = 0;
    				$(".prep_check").each(function(){
    					if(!this.checked)
    						isAllChecked = 1;
    				})              
    				if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }     
    			}else {
    				$("#checkedAll").prop("checked", false);
    			}
    		});
    	});
    </script>