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
    th.dt-center {
        width: 90px !important;
    }

    th.size1 {
        width: 90px !important;
    }

    th.size2 {
        width: 120px !important;
    }

    .card-body{
        padding-bottom: 0px;
    }
    </style>
    <div class="content-inner" id="pageActive" data-num="7" data-namecollapse="#" data-labelname="Cash Voucher"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Bounce Check</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12 padding-0_mobile" style="padding-bottom: 30px;">
                        <div class="card-progress">
                            <br>
                            <div class="col-lg-12 padding-0_mobile">
                                <div class="step1" id="step1">
                                    <input type="hidden" class="passCustomerLink" id="" name="passCustomerLink" value="<?=base_url("Main_sales/ticketlist_customer/".$token);?>">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="card h-100">
                                                <h6 class="secondary-bg px-4 py-3 white-text">Bounced Check Information</h6>
                                                <div class="p-4">
                                                    <div class="form-group">
                                                        <small class="form-text">Select Bounced Check<span style="color:red">*</span> </small>
                                                        <select class="form-control select2 searchBouncedCheck" id="searchBouncedCheck" name="searchBouncedCheck">
                                                            <option value=""></option>                          
                                                        </select>
                                                    </div>
                                                    <div id="txtResult">
                                                        <div class="form-group">
                                                            <small class="form-text">Bounced Check Date </small>
                                                            <input type="" class="form-control form-control-success bcheckDate" name="bcheckDate" id="bcheckDate" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <small class="form-text">Bounced Check Amount </small>
                                                            <input type="text" class="form-control form-control-success bcheckAmount" name="bcheckAmount" id="bcheckAmount" disabled>
                                                            <input type="hidden" class="form-control form-control-success hdnBcheckAmount" name="hdnBcheckAmount" id="hdnBcheckAmount" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <small class="form-text">Replacement Reason<span style="color:red">*</span> </small>
                                                            <textarea type="" class="form-control form-control-success reason" name="reason" id="reason" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card h-100">
                                                <h6 class="px-4 py-3 secondary-bg white-text">Replacement Check Information</h6>
                                                <div class="p-4">
                                                    <div class="form-group">
                                                        <small class="form-text">Replacement Check Number<span style="color:red">*</span> </small>
                                                        <input type="text" class="form-control form-control-success rcheckNumber" name="rcheckNumber" id="rcheckNumber">
                                                    </div>
                                                    <div class="form-group">
                                                        <small class="form-text">Replacement Check Date<span style="color:red">*</span> </small>
                                                        <input  type="text" value="<?=today_text()?>" class="form-control form-control-warning rcheckDate" id="rcheckDate" name="rcheckDate" readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                        <small class="form-text">Replacement Check Amount<span style="color:red">*</span> </small>
                                                        <input type="text" class="form-control form-control-success allownumericwithdecimal rcheckAmount" name="rcheckAmount" id="rcheckAmount">
                                                    </div>
                                                    <div class="form-group">
                                                        <small class="form-text">Replacement Check Type<span style="color:red">*</span> </small>
                                                        <select class="form-control select2 rcheckType" id="rcheckType" name="rcheckType">
                                                            <option value = "">Select Replacement Check Type</option>                        
                                                            <option value = "Online">Online</option>                        
                                                            <option value = "Cash">Cash</option>                        
                                                            <option value = "Bank">Bank Deposit</option>                        
                                                            <option value = "PayPanda">PayPanda</option>                        
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <small class="form-text">Remarks </small>
                                                        <textarea type="" class="form-control form-control-success remarks" name="remarks" id="remarks" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <button style="float: right;" id="btnSave" class="btn btn-primary btnSave">Save</button>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/account/bounce_check.js');?>"></script>
