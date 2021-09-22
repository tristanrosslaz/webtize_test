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
	.col-md-6.form-collect{
		margin: auto !important;
		width: 50% !important;     
		background-color: #f5f5f5 !important;   
		padding: 25px !important; 
		box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;} 
  	.select2 {
		width: calc(75% - 45px) !important;
		margin-left: 0;
    }
  	.loadingoverlay{
    	z-index:2 !important;
  	}

	.datepicker {
		z-index:2000 !important;
	}
</style>
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="#" data-labelname="Cash Voucher"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cash Voucher</li>
        </ol>
    </div>
    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                      	<h6 class="secondary-bg px-4 py-3 white-text">Cash Voucher Information</h6>
                        <div class="card-body" id="cvdiv">

							<div class="col-lg-12">
								<div class="">

									<div class="col-lg-12 margin-top-20">
								
										<div class="form-group row">
											<label class="form-control-label col-md-4">Cash Voucher Date:<span class="" style="color:red">*</span></label>
											<input type="text" data-column="0" id="date1" readonly="true" class="form-control datepicker form-control-sm search col-md-8" value="<?=today_date();?>" placeholder="mm/dd/yyyy">
										</div>

										<div class="form-group row">
											<label class="form-control-label col-md-4">Funds Date:<span class="" style="color:red">*</span></label>
											<input type="text" data-column="0" id="date2" readonly="true" class="form-control datepicker form-control-sm search col-md-8" value="<?=today_date();?>" placeholder="mm/dd/yyyy">
										</div>

										<div class="form-group row">
											<label class="form-control-label col-md-4">Account:<span class="" style="color:red">*</span></label>
											<select class="form-control col-md-8" name="cvtype" id="cvtype">
											<option value="none">Select Account</option>
											<option value="Petty Cash">Petty Cash</option>
											<option value="Cash Sales">Cash Sales</option>
											</select>
										</div>

										<div class="form-group row">
											<label class="form-control-label col-md-4">Pay To:<span class="" style="color:red">*</span></label>
											<input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="payto" name="payto" placeholder="Pay to..">
										</div>

										<div class="form-group row">
											<label class="form-control-label col-md-4">Amount:<span class="" style="color:red">*</span></label>
											<input type="text" class="form-control form-control-sm search-input-text search col-md-8 allownumericwithdecimal" id="amt" name="amt" onpaste="return false;" placeholder="0.00">
										</div>
									
										<!-- NOTES -->
										<div class="form-group row">
											<label class="form-control-label col-md-4">Notes:<span class="" style="color:red">*</span></label>
											<textarea class="form-control col-md-8" placeholder="Notes.." style="resize:none" style="" rows="5" cols="59" id="notes" type="text"></textarea>
										</div>
									
										<div class="form-group row float-right">
											<button id="BtnSaveCollection " class="btn btn-primary float-right saveCVBtn m-0"> Save Cash Voucher </button> 
										</div>

									</div> <!-- padding 20 -->        
								</div>
							</div><!-- card body -->
						</div><!-- card -->
					</div> <!-- col 12 -->
				</div>
			</div>
		</section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/account/cashvoucher.js');?>"></script>
