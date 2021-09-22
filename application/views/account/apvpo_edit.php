<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <!-- Page Header-->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/apv_list/'.$token);?>">Accounts Payable Voucher List</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Edit Accounts Payable Voucher</li>
        </ol>
    </div>
    
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <form class="form-horizontal personal-info-css" id="apvpo_edit_form" method="post" action="">
                            <div class="modal-body">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="card-body">

                                                    <div class="">
                                                        <div class="">
                                                            <H2><?=$get_summary->supname?></H2>
                                                        </div>  
                                                    </div>

                                                    <span type="" class="apvno" style="border:none; float:right;" hidden><?=$get_summary->apvno?></span>
                                                    <div class="table-responsive">
                                                        <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th width="90">PO No. </th>
                                                                    <th>RCV No.</th>
                                                                    <th>Supplier Ref No.</th>
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
                                        <button type="button" style="float:right" class="btn btn-success btnSave">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="poReceiveModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">PO Receive Form</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="card-body">
                                    
                                    <div class="" >
                                        <div class="">
                                            <label class="" style="float:left;"># </label>
                                            <H1 class="m_rcvno" style="border:none; float:left;"></H1>
                                            <p><br></p>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <span type="text" class="trandate"><?=$get_summary->trandate?></span>
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
                                            <span type="text" class="m_pono" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Po Date: </label>
                                            <span type="text" class="m_potrandate" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Supplier Ref. No.: </label>
                                            <span type="text" class="m_suprefno" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered" id="table-grid" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="90">ID</th>
                                                    <th>Name</th>
                                                    <th>Received Date</th>
                                                    <th>Received Qty</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <p id="printedText" style="float:left; margin-left:10px; color: red;"><i>This document has already been printed.</i></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-success printBtn" data-dismiss="modal" aria-label="Close">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmSaveModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Save</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="apvpo_process_form2" method="post" action="<?= base_url();?>Main_account/process_apvpo">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Proceed with saving?</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right" class="btn btn-primary approveApvBtn">Approve</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/apvpo_edit.js');?>"></script>

