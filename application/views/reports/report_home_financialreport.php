
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Reports">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Financial Report</li>
        </ol>
    </div>
    <!-- Page Header-->
    <div class="row">
        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/salesandcollectionreport/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales and Collection Report</div>
                    <small class="card-text text-black-50">Summary of all Sales and Collection List Report transaction.</small>
                </div>
            </a>           
        </div>

         <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/bd_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Bank Deposit Report</div>
                    <small class="card-text text-black-50">Summary of all bank deposit transactions.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/cr_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Check Release Report</div>
                    <small class="card-text text-black-50">Summary of all Released Check.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/pcr_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Petty Cash Reimbursement Report</div>
                    <small class="card-text text-black-50">Summary of all transaction using petty cash fund.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/pcr_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Petty Cash Reimbursement Report</div>
                    <small class="card-text text-black-50">Summary of all transaction using petty cash fund.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
             <a href="<?=base_url('Main_reports/pcto_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Petty Cash Turn Over Report</div>
                    <small class="card-text text-black-50">Petty cash turn over and breakdown of transaction.</small>
                </div>
            </a>
        </div>

        <div class="col-sm-6">
             <a href="<?=base_url('Main_reports/collection_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Collection Report</div>
                    <small class="card-text text-black-50">Summary of all Collections.</small>
                </div>
            </a>
        </div>

        <div class="col-sm-6"> 
           <a href="<?=base_url('Main_reports/cash_voucher_summary/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Cash Voucher Summary</div>
                    <small class="card-text text-black-50">Summary of all cash voucher transaction.</small>
                </div>
            </a> 
        </div>

        <div class="col-sm-6">
             <a href="<?=base_url('Main_reports/pcrep_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Petty Cash Replenishment Report</div>
                    <small class="card-text text-black-50">Petty cash replenishment daily summary.</small>
                </div>
            </a>
        </div>
</div>



<?php $this->load->view('includes/footer'); ?>
