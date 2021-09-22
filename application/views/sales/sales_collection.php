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

    .datepicker {
      z-index:100 !important;
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
            width: 66% !important;
        }

        
    }

   
  </style>

<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>"> 
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ewallet-collapse-a" data-labelname="Collection">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Collection</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 padding-0_mobile">
                    <div class="col-lg-12" style="padding-bottom: 30px;">
                        <div class="card-progress">
                            <form class="" id="sales_form">
                                <br>
                                <div class="col-lg-12">
                                    <div class="step1" id="step1">
                                        <div class="form-group row">
                                            <form class="collection-form">
                                                <div id="collectdiv" class="col-md-6 form-collect card" style="background-color: #fff !important; padding: 0;">
                                                    <h6 class="secondary-bg px-4 py-3 white-text">Collection Information</h6>
                                                    <div class="p-4">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="form-control-label col-md-4">Date:<span class="" style="color:red">*</span></label>
                                                                <input type="text" id="trandate" readonly="true" class="form-control datepicker form-control-sm  col-md-8"  placeholder="mm/dd/yyyy" value="<?=today_date();?>">
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="form-control-label col-md-4">Select Customer:<span class="" style="color:red">*</span></label>

                                                                <select class="searchCustomer form-record select2 form-control col-md-8" id="searchCustomer" name="searchCustomer" required>
                                                                    <option selected></option>
                                                                    <?php foreach ($get_supplier->result() as $gsupplier) { ?>
                                                                        <option value="<?=$gsupplier->idno?>"><?=concatenate_name($gsupplier->fname, $gsupplier->mname, $gsupplier->lname, $gsupplier->branchname);?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div id="txtResult" hidden>
                                                                </div>
                                                                <input type="" class="form-control form-control-success idno" name="idno" id="idno" hidden>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="form-control-label col-md-4">Select Payment:<span class="" style="color:red">*</span></label>
                                                                <select class="select2 payment_id form-control col-md-8" id="payment_id" name="payment_id" required>
                                                                    <option selected></option>
                                                                    <?php foreach ($get_payment->result() as $gpayment) { ?>
                                                                        <option value="<?=$gpayment->id?>"><?php echo strtoupper($gpayment->description); ?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <input type="" class="form-control form-control-success sel_payment" name="sel_payment" id="sel_payment" required="required" hidden>
                                                                <input type="" class="form-control form-control-success payment_id" name="payment_id" id="payment_id" hidden>
                                                            </div>

                                                            <!-- <div class="form-group row">
                                                                <label class="form-control-label col-md-4" >Select Allocation Type:<span class="" style="color:red">*</span></label>
                                                                <select id="alloc_type" class="form-control sosearchfilter col-md-8">
                                                                    <option selected></option>
                                                                    <option value="1">Delivery Receipt</option>
                                                                    <option value="2">Sales Invoice</option>
                                                                </select>  
                                                            </div> -->

                                                            <div class="form-group row">
                                                                <label class="form-control-label col-md-4">Amount:<span class="" style="color:red">*</span></label>
                                                                <input type="text" class="form-control form-control-success valid_number amount col-md-8" min="0" onkeypress="return isNumberKeyOnly(event)" name="amount" id="amount" placeholder="0.00" required="required">
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="form-control-label col-md-4">Reference:<span class="" style="color:red">*</span></label>
                                                                <input type="text" class="form-control form-control-success ref_no col-md-8" name="ref_no" id="ref_no" placeholder="Reference" required="required">
                                                            </div>

                                                            <br>
                                                            <div class="form-group row float-right">
                                                                <button id="BtnSaveCollection " class="btn btn-primary float-right BtnSaveCollection m-0"> Save Collection Record </button> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>  
                                    <div class="step2" style="display: none;">
                                        <div class="form-group card" style="padding: 50px;">
                                            <center>
                                                <h3>You have successfully created a new Collection!  
                                                    <div id="showInfo" style="font-size: 15px;margin-bottom: 50px;"></div><span class="refNospan" style="color:red"></span>
                                                </h3>
                                                <a href="<?=base_url('Main_sales/sales_collection/'.$token);?>" class="btn blue-grey">  Add More Collection</a>

                                                <a href="<?=base_url('Main_sales/collection_summary/'.$token);?>" class="btn primary-bg"> Proceed to Transaction History</a>

                                                <a class="btn btn-default" id="myHref"> Proceed to Allocation</a>
                                            </center>

                                            <input  type="hidden" value="" class="form-control form-control-warning" id="collectionid" name="collectionid"/>
                                            <input  type="hidden" value="<?=$token?>" class="form-control form-control-warning" id="token" name="token"/>
                                            <input  type="hidden" value="hidden" class="form-control form-control-warning" id="customerid" name="customerid"/>
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


<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/sales/sales_collection.js');?>"></script>