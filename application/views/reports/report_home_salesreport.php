
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Reports">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales Report</li>
        </ol>
    </div>
    <!-- Page Header-->
    <div class="row">
        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/cb_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Customer Balances Report</div>
                    <small class="card-text text-black-50">Summary of all distributor account that has balances for payment.</small>
                </div>
            </a>           
        </div>

         <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/dr_listing_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">DR Listing Report </div>
                    <small class="card-text text-black-50">Summary of all Delivery Receipt transaction.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/drlbc_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">DR Listing Report (by Warehouse)</div>
                    <small class="card-text text-black-50">Summary of all Delivery Receipt Listing transaction filter by warehouse.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/srb_customer/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales Report by Franchise</div>
                    <small class="card-text text-black-50">Summary of all sales report by franchise.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/srl_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales Return Listing Report</div>
                    <small class="card-text text-black-50">Summary of all Sales Return transaction.</small>
                </div>
            </a>           
        </div>
</div>



<?php $this->load->view('includes/footer'); ?>
