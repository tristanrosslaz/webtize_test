<?php 
//071318
//this code is for destroying session and page if they access restricted page

// $position_access = $this->session->userdata('get_position_access');
// $access_content_nav = $position_access->access_content_nav;
// $arr_ = explode(', ', $access_content_nav); //string comma separated to array 
// $get_url_content_db = $this->model->get_url_content_db($arr_)->result_array();

// $url_content_arr = array();
// foreach ($get_url_content_db as $cun) {
//     $url_content_arr[] = $cun['cn_url'];
// }
// $content_url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/';

// if (in_array($content_url, $url_content_arr) == false){
//     header("location:".base_url('Main/logout'));
// }    
//071318
?>

<style>
    td.dt-right {
        text-align: right;
    }

    td.dt-center {
        text-align: center;
    }

    table td strong {
        font-weight: bold;
    }
    
</style>

<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="SI Summary">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3" id="bcrumb_id" data-id="<?= $get_customer_info->idno ?>">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/cbal_report/'.$token);?>">Customer Balance Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active"><?= $get_customer_info->customer_name ?></li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12" style="padding: 0">
                                <form action="<?php echo base_url('Main_reports/cbal_report_sisum_export') ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm" >Search SI No.</label>
                                                <input type="text" class="input-sm form-control" id="si_search" name="si_search" autocomplete="off"> 
                                                <input type="hidden" name="idno" value="<?= $get_customer_info->idno ?>">        
                                            </div>
                                        </div>
                
                                        <div class="col-lg col-12" style="padding-left: 0">
                                            <div class="pull-right">
                                                <!-- label is used to level it with the input. It is styled invisible -->
                                                <button type="button" id="searchBtn" class="btn btn-primary searchBtn m-0" style="margin-right: 2px">Search</button>                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pull-right">
                                    <button type="submit" id="exportBtn" name="exportExBtn" class="btn btn-info exportBtn m-0" style="margin-right: 2px">Export to excel</button>                          
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>SI No.</th>
                                            <th>Total Amount</th>
                                            <th>Total Payment</th>
                                            <th>Total Balance</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" style="text-align: right;"><strong>Grand Total</strong></td>
                                            <td id="total_si"></td>
                                            <td id="total_pd"></td>
                                            <td id="total_bal"></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/si_summary_report.js');?>"></script>
