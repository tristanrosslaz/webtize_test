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
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;
    }

    .datepicker {
        z-index:2 !important;
    }
</style>

<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="#" data-labelname="Bank Deposit">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Bank Deposit</li>
        </ol>
    </div>
    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Bank Deposit Information</h6>
                        <div class="card-body">

                            <div class="col-lg-12">
                                <div class="">        
                                    <form id="frmbuildInventory">
                                        <div class="col-lg-12 margin-top-20">
                                 
                                        <div class="form-group row">
                                            <label class="form-control-label col-md-4">Transaction Date:<span class="" style="color:red">*</span></label>
                                            <input type="text" data-column="0" id="date1" readonly="true" value="<?=today_date();?>" class="form-control datepicker form-control-sm search-input-text search col-md-8" placeholder="mm/dd/yyyy">
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-control-label col-md-4">Sales Date:<span class="" style="color:red">*</span></label>
                                            <input type="text" data-column="0" id="date2" readonly="true" value="<?=today_date();?>" class="form-control datepicker form-control-sm search-input-text search col-md-8" placeholder="mm/dd/yyyy">
                                        </div>

                                        <div class="form-group row">
                                            <label class="form-control-label col-md-4">Account:<span class="" style="color:red">*</span></label>
                                            <select class="form-control col-md-8" name="account" id="account">
                                                <option value="none">Select Account</option>
                                                <?php
                                                foreach ($get_account->result() as $acc) { ?>
                                                <option value="<?=$acc->id?>"><?php echo strtoupper($acc->description); ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div> 

                                        <div class="form-group row">
                                            <label class="form-control-label col-md-4">Type:<span class="" style="color:red">*</span></label>
                                            <select class="form-control col-md-8" name="bdtype" id="bdtype">
                                                <option value="none">Select Type</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Check">Check</option>
                                                <option value="Cash Others">Cash Others</option>
                                                <option value="Check Others">Check Others</option>
                                                <option value="Check Others">Check Others</option>
                                                <option value="Online/Bank Deposit">Online/Bank Deposit</option>
                                            </select>
                                        </div> 

                                        <div class="form-group row">
                                            <label class="form-control-label col-md-4">Amount:<span class="" style="color:red">*</span></label>
                                            <input type="text" class="form-control form-control-sm search-input-text search col-md-8" id="amt" name="amt" onkeypress="return isNumberKeyOnly(event)" onpaste="return false;" placeholder="0.00">
                                        </div>

                                        <!-- NOTES -->
                                        <div class="form-group row">
                                            <label class="form-control-label col-md-4">Notes:<span class="" style="color:red">*</span></label>
                                            <textarea class="form-control col-md-8" style="resize:none" placeholder="Notes.." ="" rows="5" cols="59" id="notes" type="text"></textarea>
                                        </div>

                                        <div class="form-group row float-right">
                                             <button class="btn btn-primary float-right saveBDBtn m-0"> Save Bank Deposit </button> 
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

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/account/bankdeposit.js');?>"></script>
