<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Reports">
     <div class="bc-icons-2 card mb-4">

        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Reports</li>
        </ol>

    </div>
    <!-- Page Header-->
    <div class="row">
        <?php 
        //071318
        $position_access = $this->session->userdata('get_position_access');
        if (!empty($position_access->access_content_nav)) {
            $access_content_nav = $position_access->access_content_nav;
        }else{
            $access_content_nav = "";
        }
        
        $arr_ = explode(', ', $access_content_nav);
        $labelname = "Reports"; //check the labelname in the top div
        $main_nav = $this->model->get_main_nav_id($labelname)->row();
        $cn = $this->model->get_content_navigation($main_nav->main_nav_id)->result();
        // $cn2 = $cn;
        // $cn3 = $cn;
        // print_r($cn);
        $ch = $this->model->get_url_content_hasline_db()->result();
        //071318
        ?>
        <!-- //071318 -->
        <?php

        ?>
        <?php foreach($ch as $ch){ ?>
            <div class="col-sm-6"> 
                <div class="card card-hover secondary-bg p-3 mb-3 w-100 report-title" id="headingOne">
                    <div class="card-header-title font-weight-bold text-white" data-toggle="collapse" data-target="#<?=$ch->id;?>" aria-expanded="true" aria-controls="collapseOne"><?=$ch->ch_name;?></div>
                </div>
                <div id="<?=$ch->id;?>" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                <?php foreach($cn as $cn2){ ?>
                    <?php if ($ch->id == $cn2->cn_hasline) { ?>
                        <?php if (in_array($cn2->id, $arr_)){ ?>
                            <a href="<?=base_url($cn2->cn_url.$token);?>"  class="w-100">
                                <div class="card card-option card-hover white p-3 mb-3 w-100">
                                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                                    <div class="card-header-title font-weight-bold"><?=$cn2->cn_name;?></div>
                                    <small class="card-text text-black-50"><?=$cn2->cn_description;?></small>
                                </div>
                            </a>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
                <hr>
            </div>
        <?php } ?>

<!-- <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
</div>
</div> -->

        <!-- <div class="col-sm-6">
            <div class="card card-hover secondary-bg p-3 mb-3 w-100 report-title">
                <div class="card-header-title font-weight-bold text-white"> Entity Report</div>
            </div>
            <a href="<?=base_url('Main_reports/customer_summary_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Customer Summary Report</div>
                    <small class="card-text text-black-50">Summary of all Customer.</small>
                </div>
            </a>
            <hr>
        </div>
        <div class="col-sm-6">
            <div class="card card-hover secondary-bg p-3 mb-3 w-100 report-title">
                <div class="card-header-title font-weight-bold text-white">Expense Report</div>
            </div>
            <a href="<?=base_url('Main_reports/gl_tran_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">GL Transaction Report</div>
                    <small class="card-text text-black-50">Summary of all GL Transaction.</small>
                </div>
            </a>
            <a href="<?=base_url('Main_reports/eh_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Expense History Report</div>
                    <small class="card-text text-black-50">Summary of all expense transaction with all entries listed base on classification.</small>
                </div>
            </a>       
            <hr>
        </div>
        <div class="col-sm-6">
            <div class="card card-hover secondary-bg p-3 mb-3 w-100 report-title">
                <div class="card-header-title font-weight-bold text-white">Financial Report</div>
            </div>
            <a href="<?=base_url('Main_reports/salesandcollectionreport/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales and Collection Report</div>
                    <small class="card-text text-black-50">Summary of all Sales and Collection List Report transaction.</small>
                </div>
            </a>  
            <a href="<?=base_url('Main_reports/bd_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Bank Deposit Report</div>
                    <small class="card-text text-black-50">Summary of all bank deposit transactions.</small>
                </div>
            </a>   
            <a href="<?=base_url('Main_reports/cr_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Check Release Report</div>
                    <small class="card-text text-black-50">Summary of all Released Check.</small>
                </div>
            </a> 
            <a href="<?=base_url('Main_reports/pcr_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Petty Cash Reimbursement Report</div>
                    <small class="card-text text-black-50">Summary of all transaction using petty cash fund.</small>
                </div>
            </a> 
            <a href="<?=base_url('Main_reports/pcr_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Petty Cash Reimbursement Report</div>
                    <small class="card-text text-black-50">Summary of all transaction using petty cash fund.</small>
                </div>
            </a>  
            <a href="<?=base_url('Main_reports/pcto_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Petty Cash Turn Over Report</div>
                    <small class="card-text text-black-50">Petty cash turn over and breakdown of transaction.</small>
                </div>
            </a>
            <a href="<?=base_url('Main_reports/collection_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Collection Report</div>
                    <small class="card-text text-black-50">Summary of all Collections.</small>
                </div>
            </a>
            <a href="<?=base_url('Main_reports/cash_voucher_summary/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Cash Voucher Summary</div>
                    <small class="card-text text-black-50">Summary of all cash voucher transaction.</small>
                </div>
            </a>
            <a href="<?=base_url('Main_reports/pcrep_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Petty Cash Replenishment Report</div>
                    <small class="card-text text-black-50">Petty cash replenishment daily summary.</small>
                </div>
            </a>
            <hr>
        </div>
        <div class="col-sm-6">
            <div class="card card-hover secondary-bg p-3 mb-3 w-100 report-title">
                <div class="card-header-title font-weight-bold text-white">Inventory Report</div>
            </div>
            <a href="<?=base_url('Main_reports/icr_by_category/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Consumption Report (By Category)</div>
                    <small class="card-text text-black-50">Summary of all inventory consumption (By Category).</small>
                </div>
            </a> 
            <a href="<?=base_url('Main_reports/icr_by_Item/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Consumption Report (By Item)</div>
                    <small class="card-text text-black-50">Summary of all inventory consumption (By Item).</small>
                </div>
            </a> 
            <a href="<?=base_url('Main_reports/ie_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Ending Report</div>
                    <small class="card-text text-black-50">Summary of all inventory ending count.</small>
                </div>
            </a>
            <a href="<?=base_url('Main_reports/ris_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Received Items Summary Report</div>
                    <small class="card-text text-black-50">Summary of all Received Items details.</small>
                </div>
            </a> 
            <a href="<?=base_url('Main_reports/it_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Transaction Report</div>
                    <small class="card-text text-black-50">Summary of all inventory transaction history. From the sales, purchases, location transfer, returns, production and spoilages.</small>
                </div>
            </a> 
            <a href="<?=base_url('Main_reports/mi_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Monthly Inventory Report as of (Rundate)</div>
                    <small class="card-text text-black-50">Summary of monthly inventory history. From the sales, purchases, location transfer, returns, production and spoilages.</small>
                </div>
            </a>  
            <hr>
        </div>
        <div class="col-sm-6">
            <div class="card card-hover secondary-bg p-3 mb-3 w-100 report-title">
                <div class="card-header-title font-weight-bold text-white">Purchases Report</div>
            </div>
            <a href="<?=base_url('Main_reports/po_listing_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">PO Listing Report</div>
                    <small class="card-text text-black-50">Summary of all purchase order transaction.</small>
                </div>
            </a>  
            <a href="<?=base_url('Main_reports/po_adjustment_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">PO Adjustment Report </div>
                    <small class="card-text text-black-50">Summary of purchase order transaction with adjustment for payment.</small>
                </div>
            </a>
            <a href="<?=base_url('Main_reports/po_receive_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Purchase Order Receive Report</div>
                    <small class="card-text text-black-50">Summary of all purchase order transaction that has been received</small>
                </div>
            </a>  
            <a href="<?=base_url('Main_reports/purchases_payable_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Purchases Payable Report</div>
                    <small class="card-text text-black-50">Summary of purchase order transaction with purchase order receipt for payment.</small>
                </div>
            </a>   
            <a href="<?=base_url('Main_reports/po_payable_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Payable Report (with Purchase Order)</div>
                    <small class="card-text text-black-50">Summary of all transaction using petty cash fund.</small>
                </div>
            </a> 
            <hr>
        </div>
        <div class="col-sm-6">
            <div class="card card-hover secondary-bg p-3 mb-3 w-100 report-title">
                <div class="card-header-title font-weight-bold text-white">Sales Report</div>
            </div>
            <a href="<?=base_url('Main_reports/cb_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Customer Balances Report</div>
                    <small class="card-text text-black-50">Summary of all distributor account that has balances for payment.</small>
                </div>
            </a>      
            <a href="<?=base_url('Main_reports/dr_listing_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">DR Listing Report </div>
                    <small class="card-text text-black-50">Summary of all Delivery Receipt transaction.</small>
                </div>
            </a>    
            <a href="<?=base_url('Main_reports/drlbc_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">DR Listing Report (by Warehouse)</div>
                    <small class="card-text text-black-50">Summary of all Delivery Receipt Listing transaction filter by warehouse.</small>
                </div>
            </a>
            <a href="<?=base_url('Main_reports/srb_customer/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales Report by Franchise</div>
                    <small class="card-text text-black-50">Summary of all sales report by franchise.</small>
                </div>
            </a>
            <a href="<?=base_url('Main_reports/srl_report/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales Return Listing Report</div>
                    <small class="card-text text-black-50">Summary of all Sales Return transaction.</small>
                </div>
            </a> 
            <hr>    
        </div> -->
    </div>
<?php $this->load->view('includes/footer'); ?>
