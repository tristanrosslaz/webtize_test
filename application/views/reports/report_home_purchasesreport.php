
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Reports">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Purchases Report</li>
        </ol>
    </div>
    <!-- Page Header-->
    <div class="row">
        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/po_listing_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">PO Listing Report</div>
                    <small class="card-text text-black-50">Summary of all purchase order transaction.</small>
                </div>
            </a>           
        </div>

         <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/po_adjustment_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">PO Adjustment Report </div>
                    <small class="card-text text-black-50">Summary of purchase order transaction with adjustment for payment.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/po_receive_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Purchase Order Receive Report</div>
                    <small class="card-text text-black-50">Summary of all purchase order transaction that has been received</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/purchases_payable_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Purchases Payable Report</div>
                    <small class="card-text text-black-50">Summary of purchase order transaction with purchase order receipt for payment.</small>
                </div>
            </a>           
        </div>

        <div class="col-sm-6">
            <a href="<?=base_url('Main_reports/po_payable_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Payable Report (with Purchase Order)</div>
                    <small class="card-text text-black-50">Summary of all transaction using petty cash fund.</small>
                </div>
            </a>           
        </div>
</div>



<?php $this->load->view('includes/footer'); ?>
