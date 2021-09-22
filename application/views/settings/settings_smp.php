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
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="8" data-namecollapse="" data-labelname="Settings"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/settings_home/'.$token);?>">Settings</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Software Monthly Pay</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form id="search_form">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Client Name</label>
                                                <input type="text" class="form-control form-control-sm search-input-text" id="search_name" placeholder="Acme Corporation">
                                            </div>
                                        </div>

                                        <div class="col-lg col-12 p-0">
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-primary btnSearch m-0">Search</button>
                                                <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#software_monthly_pay_modal" class="btn btn-primary m-0" id="software_monthly_pay_modal_btn mr-3">Add Software Monthly Pay</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">Code</th>
                                            <th>Client Name</th>
                                            <th>MSF</th>
                                            <th width="190">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal-->
    <div id="software_monthly_pay_modal" role="dialog" aria-labelledby="software_monthly_pay_modal_label" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="software_monthly_pay_modal_label" class="modal-title"></h4>
                </div>
                <form class="form-horizontal personal-info-css" id="software_monthly_pay_form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Client Name<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input id="cu_client_name" type="text" class="form-control form-control-success" name="cu_client_name" autocomplete="off" placeholder="Acme Corporation"><small class="form-text">Name</small>
                                                    <input type="hidden" id="cu_code" name="cu_code">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Monthly Pay<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input id="cu_monthly_pay" type="number" class="form-control form-control-success allownumericwithdecimal" name="cu_monthly_pay" placeholder="0.00"><small class="form-text">Monthly Cost of Software</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                <button type="submit" style="float:right" class="btn btn-primary" id="cu_save_btn">Add Software Monthly Pay</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete_modal" role="dialog" aria-labelledby="delete_modal_label" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="delete_modal_label" class="modal-title">Delete Software MSF</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="delete_form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record?</p>

                                    <p class="mb-1"><b>Record Details:</b></p>
                                    <p class="m-0"><b>Client<b>: <span id="d_client_name"></span></p>
                                    <p class="m-0"><b>MSF<b>: <span id="d_msf"></span></p>

                                    <input type="hidden" id="d_code" name="d_code" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" style="float:right" class="btn btn-primary deleteTicketStatusBtn">Delete Record</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/settings/settings_smp.js');?>"></script>

