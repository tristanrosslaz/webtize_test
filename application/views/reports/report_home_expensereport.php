
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Reports">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Expense Report</li>
        </ol>
    </div>
    <!-- Page Header-->
    <div class="row">
        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/gl_tran_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">GL Transaction Report</div>
                    <small class="card-text text-black-50">Summary of all GL Transaction.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/eh_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Expense History Report</div>
                    <small class="card-text text-black-50">Summary of all expense transaction with all entries listed base on classification.</small>
                </div>
            </a>           
        </div>
    </div>



<?php $this->load->view('includes/footer'); ?>
