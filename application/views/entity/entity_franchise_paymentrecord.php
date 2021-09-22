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
<style type="text/css">


    .datepicker {
      z-index:2 !important;
    }


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
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Franchise Payment Record</li>
        </ol>
    </div>


    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="hidethis">
                        	<div class="col-lg-12">     
                            		<form id="frmPaymentRecord">
                            			<div class="col-lg-12 margin-top-20">

                                            <div id="collectdiv" class="col-md-12 form-collect card" style="background-color: #fff !important; padding: 0;">
                                                    <h6 class="px-4 py-3 primary-bg white-text">Franchise Payment Information</h6>
                                                <div class="p-4">


                            			    <!-- DATE -->    
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Date<span class="" style="color:red">*</span></label>
                                    			<input type="text" class="form-control required_fields col-md-8 form-control-success datepicker" name="date" id="date"  placeholder="mm/dd/yyyy">
                                			</div>

                                			<!-- SELECT NAME -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Name<span class="" style="color:red">*</span></label>
                                    			<select class="form-control col-md-8 select2 required_fields" name="name" id="name">
                                        			<option selected value="none">-- Select Name--</option>
                                         			<?php foreach ($get_name as $value):?>
                                        			<option value="<?php echo $value['id']?>"><?php echo strtoupper($value['fname'].' '.$value['mname'].' '.$value['lname'])?></option>
                                         			<?php endforeach;?>
                                    			</select>
                                			</div>                                    

                                			<!-- SELECT PAYMENT TYPE -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Payment Type<span class="" style="color:red">*</span></label>
                                    			<select class="form-control required_fields col-md-8" name="paymenttype" id="paymenttype">
                                        			<option selected value="">-- Select Payment Type --</option>
                                                    <option  value="Bank Deposit">Bank Deposit</option>
                                                    <option  value="Cash">Cash</option>
                                                    <option  value="Check">Check</option>
                                                    <option  value="JC Premiere">JC Premiere</option>
                                                    <option  value="Manager Check">Manager Check</option>
                                    			</select>
                                			</div>                                                                                             
                                				
                                            <!-- SELECT PAYMENT FOR -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Payment For<span class="" style="color:red">*</span></label>
                                    				<select class="form-control required_fields col-md-8" name="paymentfor" id="paymentfor">  
                                        				<option selected value="">-- Select Payment For --</option>
                                                        <option  value="Advertising Fee">Advertising Fee</option>
                                                        <option  value="Assistance Fee">Assistance Fee</option>
                                                        <option  value="Cash Bond">Cash Bond</option>
                                                        <option  value="Franchise Fee">Franchise Fee</option>
                                                        <option  value="Listing of Improvement">Listing of Improvement</option>
                                                        <option  value="Ocular Fee">Ocular Fee</option>
                                                        <option  value="Penalty Fee">Penalty Fee</option>
                                                        <option  value="Referral Fee">Referral Fee</option>
                                                        <option  value="Renewal Fee">Renewal Fee</option>
                                                        <option  value="Traveling Fee">Traveling Fee</option>
                                                        <option  value="Others">Others</option>
                                    				</select>     
                                			</div>

                                			<!-- PAYMENT AMOUNT -->
                                			<div class="form-group row">
                                				<label class="form-control-label col-md-4">Payment Amount<span class="" style="color:red">*</span></label>
                                				<input type="text" class="form-control required_fields material_josh form-control-sm search-input-text search col-md-8 payment allownumericwithdecimal" name="paymentamount" id="paymentamount" oninput="validity.valid||(value='');" min="" placeholder="0.00">
                                			</div>

                                            <!-- REF NO -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Ref No<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control required_fields material_josh form-control-sm search-input-text search col-md-8 refno " name="refno" id="refno" min="" placeholder="Ref No">
                                            </div>

                                			<!-- NOTES -->
                                			<div class="form-group row">
                                				<label class="form-control-label col-md-4">Notes</label>
                                				<input type="text" class="form-control material_josh form-control-sm search-input-text search col-md-8" id="notes" name="notes" placeholder="Notes">
											</div>

                                            <div class="form-group row float-right">
                                                <button id="BtnSaveCollection " class="btn btn-primary float-right proceedBtn m-0"> Save Franchise Payment</button> 
                                            </div>
                                        
                                        </div> <!-- padding 20 -->        
                            		</form>
                        		</div> <!-- interface1 -->
                        	</div>
                        
                        </div><!-- card body -->
                    </div><!-- card -->
				</div> <!-- col 12 -->
    </section>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/entity/franchise_payment_record/franchise_payment.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->