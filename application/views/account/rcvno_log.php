<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <!-- Page Header-->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/apv_list/'.$token);?>">Accounts Payable Voucher List</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/apvno_log/'.$token.'/'.$this->session->userdata('apvno'));?>">Accounts Payable Voucher</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Purchase Order</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="">
                            <div class="modal-body">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="card-body">

                                                    <div class="form-group row">

                                                        <div class="col-lg-12">

                                                            <div class="" >
                                                                <div class="">
                                                                    <label class="" style="border:none; float:left;"># </label>
                                                                    <h1 class="pono" style="border:none; float:left;"><?=$get_summary->pono?></h1>
                                                                    <p><br></p>
                                                                </div>  
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6">

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Purchase From </label>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <H2><?=$get_summary->name?></H2>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Delivery Status: </label>
                                                                    <span type="text" class="voucher_name" style="border:none;" disabled><?=$get_summary->status?></span>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Date of Delivery: </label>
                                                                    <span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->trandate?></span>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Contact Person: </label>
                                                                    <span type="text" class="apv_amount" style="border:none;" disabled><?=$get_summary->contactperson?></span>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Mode of Payment: </label>
                                                                    <span type="text" class="apv_balance" style="border:none;" disabled><?=$get_summary->mode?></span>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Contact No. </label>
                                                                    <span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->contactno?></span>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Address: </label>
                                                                    <span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->address?></span>
                                                                </div>  
                                                            </div>
                                                            
                                                        </div>


                                                        <div class="col-lg-6">
                                                            
                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">To </label>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <H2><?=company_name();?></H2>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Contact: </label>
                                                                    <span type="text" class="voucher_name" style="border:none;" disabled>63.2.8894474 to 76</span>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Email: </label>
                                                                    <span type="text" class="terms_of_payment" style="border:none;" disabled></span>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Website: </label>
                                                                    <span type="text" class="apv_amount" style="border:none;" disabled>www.siomaiking.com</span>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Contact Address: </label>
                                                                    <span type="text" class="apv_balance" style="border:none;" disabled>1196 Batangas Street, San Isidro, Makati City, Philippines</span>
                                                                </div>  
                                                            </div>
                                                            
                                                        </div>

                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th width="90">Name</th>
                                                                    <th>PO Qty</th>
                                                                    <th>Unit</th>
                                                                    <th>Received Qty</th>
                                                                    <th>Amount</th>
                                                                    <th>Total Amount</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>

                                                    <br><br>
                                                    <label for="notes">Notes</label> 
                                                    <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_summary->notes?></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="form-group row">       
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">Purchase Order</h1>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="card-body">
                                        
                                        <div class="" >
                                            <div class="">
                                                <label class="" style="float:left;"># </label>
                                                <H1 class="rcvno" style="border:none; float:left;"><?=$get_summary->pono?></H1>
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
                                                <H2><?=$get_summary->name?></H2>
                                            </div>  
                                        </div>

                                        <div class="">
                                            <div class="">
                                                <label class="">Date of Delivery: </label>
                                                <span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->trandate?></span>
                                            </div>  
                                        </div>

                                        <div class="">
                                            <div class="">
                                                <label class="">Contact Person: </label>
                                                <span type="text" class="apv_amount" style="border:none;" disabled><?=$get_summary->contactperson?></span>
                                            </div>  
                                        </div>

                                        <div class="">
                                            <div class="">
                                                <label class="">Mode of Payment: </label>
                                                <span type="text" class="apv_balance" style="border:none;" disabled><?=$get_summary->mode?></span>
                                            </div>  
                                        </div>

                                        <div class="">
                                            <div class="">
                                                <label class="">Contact No. </label>
                                                <span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->contactno?></span>
                                            </div>  
                                        </div>

                                        <div class="">
                                            <div class="">
                                                <label class="">Address: </label>
                                                <span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->address?></span>
                                            </div>  
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="90">RCV No.</th>
                                                        <th>Name</th>
                                                        <th>Ref No.</th>
                                                        <th>Received Date</th>
                                                        <th>Received Qty</th>
                                                        <th>Unit</th>
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
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/rcvno_log.js');?>"></script>

