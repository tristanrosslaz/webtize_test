<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<style type="text/css">
    table.dataTable {
        font-size: 0.8em;
        color: #666;
    }
    table.dataTable thead th, table.dataTable thead td {
        padding: 2px 5px;
        border-bottom: 1px solid #111111;
    }

    table.dataTable tbody th, table.dataTable tbody td {
        padding: 2px 5px;
    }

    table.dataTable tfoot th, table.dataTable tfoot td {
        padding: 2px 5px !important;
    }

    table.table_dynamic thead th, table.table_dynamic thead td {
        padding: 2px 5px;
        border-bottom: 1px solid #111111;
    }

    table.table_dynamic tbody th, table.table_dynamic tbody td {
        padding: 2px 5px;
    }

    table.table_dynamic tfoot th, table.table_dynamic tfoot td {
        padding: 2px 5px !important;
    }
    

    .table-responsive {
        white-space: nowrap;
    }

    tfoot th{
        padding:0px !important;
    }

    .leftalign{
        text-align: left !important;
    }

    input.form-control {
        padding: 9px 15px;
    }

    table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:before, table.dataTable thead .sorting_desc_disabled:after {
        bottom: 0.3em;
    }

    a#table-grid_previous {
        line-height: 1.25;
        color: #868e96;
        background-color: #fff;
        padding: .5rem .75rem;
    }

    a.paginate_button.current {
        line-height: 1.25;
        color: #ffffff;
        background-color: #5ab733;

        padding: .5rem .75rem;
    }

    a.paginate_button {
        line-height: 1.25;
        color: #868e96;
        background-color: #ffffff;

        padding: .5rem .75rem;
    }

    a.paginate_button:hover {
        -webkit-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
        -webkit-border-radius: .125rem;
        border-radius: .125rem;
        background-color: #eee;
    }

    div#table-grid_processing {
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
        -webkit-border-radius: .125rem;
        border-radius: .125rem;
        background-color: #5AB733;
        color: #fff;
    }
</style>
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Sales and Collection Report">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales and Collection Report</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">
                                <form class="col-lg-12" action="<?php echo base_url();?>Main_reports_salesandcollection/bank_recon_report" method="post" target="_blank">
                                <br><br>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-group" id="datepicker">
                                                    <input type="text" data-column="0" class="input-xs form-control search-input-select1 date_to datepicker searchDate" style="z-index: 2 !important;" id="date_to" value="<?=today_text();?>" name="trandate" readonly/>
                                                    <span class="input-group-addon" style="background-color:#fff; border:none;">&nbsp;to&nbsp;</span>
                                                    <input type="text" data-column="1" value="<?=today_text();?>" class="input-sm form-control search-input-select2 date_from datepicker searchDate2" style="z-index: 2 !important;" id="date_from" name="trandate2" readonly/>    
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Filter</label>
                                                    <br>
                                                    <select data-column="2" class="form-control search-input-select filter_report" name="filter_report">
                                                        <option value="1">Detailed List</option>
                                                        <option value="2">Summary</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Filter</label>
                                                    <br>
                                                    <select data-column="3" class="form-control search-input-select filter_report2" name="filter_report2">
                                                        <option value="1">Active Records</option>
                                                        <option value="2">Voided Records</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center loader" style="display: none;"><img height="50" src="<?=base_url('assets/img/loader.gif');?>"></h3>
                        </div>
                        <div class="card-body">
                            <button disabled data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAccountsModal" class="pull-right btn btn-default btnUpdate btnExportRecon " name="bank_recon_reportBtn" style="right:20px; position: absolute; top:20px;">Export</button>
                            <button type="button" class="btn btn-primary" id="searchBtn" style="right:108px; position: absolute; top:20px;">Search</button>
                            </form><!-- bank_recon_report -->
                            <!-- <table class="table table-striped table-hover"> -->
                                
                            <div class="table-responsive">
                                <table hidden class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name - Branch name</th>
                                            <th>SI #</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="tfoot">
                                        <tr>
                                            <th>Grand Total</th>
                                            <th></th>
                                            <th class="th_total_amount text-right"></th>
                                        </tr>   
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 dynamic_card">

                    <!-- <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-lg-12">
                                    <div class="row">
                                        <h3>261 - CASH IN BANK - JCW NEW - </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table hidden class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Account In</th>
                                            <th>Sales Date</th>
                                            <th>Deposit Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-lg-12">
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table hidden class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Account In</th>
                                            <th>Sales Date</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="">
                        
                    </div> -->


                </div>
            </div>
        </div>
        
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/reports/salesandcollectionreport.js');?>"></script>
