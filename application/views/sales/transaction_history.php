<!-- change the data-num and data-subnum for numbering of navigation -->


<style>
div#table-grid-edit_filter {
    display: none;
}
</style>
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Transaction History</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_sales/sales_home/'.$token);?>">Sales</a></li>
        <li class="breadcrumb-item active">Transaction History</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">SO No.</label>
                                                <input type="text" data-column="0" class="form-control material_josh form-control-sm searchCode search-input-text" placeholder="SO No.">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Status</label>
                                                <select  data-column="1" id="summary_status" class="form-control select2 search-input-select summary_status material_josh" name="summary_status">
                                                    <option value="1" selected>1</option>
                                                  
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Date</label>
                                                <!-- <input type="text" data-column="1"  class="form-control material_josh form-control-sm search-input-text searchDescription" placeholder="Description"> -->

                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" data-column="2" class="input-sm form-control material_josh search-input-select" name="start" />
                                                    <span class="input-group-addon" style="background-color:#fff0 ; border:none;">to</span>
                                                    <input type="text" data-column="3" class="input-sm form-control material_josh search-input-select" name="end" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>SO No.</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Shipping</th>
                                            <th>Status</th>
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
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/transaction_history.js');?>"></script>
