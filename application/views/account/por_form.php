<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Purchase Order</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a></li>
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_account/apv_list/'.$token);?>">Accounts Payable Voucher List</a></li>
            <li class="breadcrumb-item active">Accounts Payable Voucher for Purchases (with PO)</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            
                                            

                                            <div class="" >
                                                <div class="">
                                                    <span class="pono" style="border:none; float:right;"><?=$get_summary->rcvno?></span>
                                                    <label class="" style="float:right;"># </label>
                                                    <p><br></p>
                                                </div>  
                                            </div>

                                            <div class="">
                                                <div class="">
                                                    <span type="text" class="trandate" style="border:none;float:right;" disabled><?=$get_summary->trandate?></span>
                                                    <p><br></p>
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="">
                                                    <label class="">Purchase From </label>
                                                </div>  
                                            </div>

                                            <div class="">
                                                <div class="">
                                                    <H2><?=$get_summary->supname?></H2>
                                                </div>  
                                            </div>

                                            <div class="">
                                                <div class="">
                                                    <label class="">PO No.: </label>
                                                    <span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->pono?></span>
                                                </div>  
                                            </div>

                                            <div class="">
                                                <div class="">
                                                    <label class="">Po Date: </label>
                                                    <span type="text" class="apv_amount" style="border:none;" disabled>
                                                </div>  
                                            </div>

                                            <div class="">
                                                <div class="">
                                                    <label class="">Supplier Ref. No.: </label>
                                                    <span type="text" class="apv_balance" style="border:none;" disabled><?=$get_summary->refno?></span>
                                                </div>  
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="90">Debit/Credit</th>
                                                            <th>GL Account</th>
                                                            <th>RCV No. | PO No.</th>
                                                            <th>Supplier Ref. No.</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                </table>
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
                                <input type="submit" style="float:right" class="btn btn-success" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Back</button>
                            </div>
                        </div>
                    </div>
                </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/por_form.js');?>"></script>

