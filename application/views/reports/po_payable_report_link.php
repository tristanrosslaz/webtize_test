<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num=10 data-namecollapse="" data-labelname="Purchase Order"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/purchasesreport/'.$token);?>">Purchases Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/po_payable_report/'.$token);?>">Payable Report (with Purchase Order)</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item active">Account Payable Voucher</li>
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
                                                                    <h4 class="apvno" style="border:none; float:left;">Receive no. <?=$get_summary->apvno?></h4><br>
                                                                   <!--  <h6 style="border:none; float:left;"><?=$get_summary->trandate?></h6> -->
                                                                    <input type="text" value="<?=$get_summary->apvno?>" class="apvno" id="apvno" hidden>
                                                                    <p><br></p>
                                                                </div>  
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6">

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class=""> Payable to: </label></div>
                                                                    <div class="col-md-6"><h2 type="text" class="voucher_name" style="border:none;" disabled><?=$get_summary->name?></h2></div>
                                                                </div> 

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class=""> Terms of Payment: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="voucher_name" style="border:none;" disabled><?=$get_summary->description?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">APV Amount: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=number_format($get_summary->amount,2);?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">APV Balance: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_amount" style="border:none;" disabled><?php echo number_format($get_balance,2) ?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">APV Status: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_balance" style="border:none;" disabled><?=$get_summary->status?></span></div>
                                                                </div>  

                                                                <!-- <div class="row">
                                                                    <div class="col-md-4"><label class="">Contact No. </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->contactno?></span></div>
                                                                </div>   -->

                                                                <!-- <div class="row">
                                                                    <div class="col-md-4"><label class="">Address: </label></div>
                                                                    <div class="col-md-8"><span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->address?></span></div>
                                                                </div>   -->
                                                            
                                                        </div>


                                                        <!-- <div class="col-lg-6">
                                                            
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

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Contact: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="voucher_name" style="border:none;" disabled>63.2.8894474 to 76</span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Email: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Website: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_amount" style="border:none;" disabled>www.siomaiking.com</span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Contact Address: </label></div>
                                                                    <div class="col-md-8"><span type="text" class="apv_balance" style="border:none;" disabled>1196 Batangas Street, San Isidro, Makati City, Philippines</span></div>
                                                                </div>  
                                                            
                                                        </div>

                                                    </div> -->

                                                    <div class="table-responsive">
                                                        <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Debit/Credit</th>
                                                                    <th>GL Account</th>
                                                                    <th>RCV No. | PO No.</th>
                                                                    <th> Supplier Ref. No.</th>
                                                                    <th>Amount</th>
                                                                    
                                                                    <!-- <th>Total</th> -->
                                                                    <!-- <th width="10" ></th> -->
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                       <!--  <button type="button" class="btn btn-default col-md-12 btnShipping" id="btnShipping" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" disabled="">Subtotal: <?=number_format($get_summary->totalamt,2);?></button>
                                                        <input type="hidden" value= "<?=number_format($get_summary->totalamt,2);?>" class="form-control form-control-success shippingamt" name="shippingamt" id="shippingamt">
                                                        <button type="button" class="btn btn-default col-md-12 btnShipping" id="btnShipping" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" disabled="">Shipping: <?=number_format($get_summary->freight,2);?></button>
                                                        <input type="hidden" value= "<?=number_format($get_summary->freight,2);?>" class="form-control form-control-success shippingamt" name="shippingamt" id="shippingamt">
                                                        <button class="btn btn-warning btnGrand col-md-12 grand_total disabled" id="grand_total" name="grand_total">Total : <?=number_format($get_summary->totalamt,2);?></button>
                                                        <input type="hidden" value= "<?=number_format($get_summary->total,2);?>" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2"> -->
                                                    </div>

<!--                                                     <br><br>
                                                    <label for="notes">Notes</label> 
                                                    <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_summary->notes?></textarea> -->

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
                    <h1 id="exampleModalLabel" class="modal-title">PO Receive Report</h1>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="card-body">
                                        
                                        <div class="" >
                                            <div class="">
                                                <label class="" style="float:left;">PO # </label>
                                                <H1 class="rcvno" style="border:none; float:left;"><?=$get_summary->rcvno?></H1>
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

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Date of Delivery: </label></div>
                                                <div class="col-md-8"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->trandate?></span></div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Contact Person: </label></div>
                                                <div class="col-md-8"><span type="text" class="apv_amount" style="border:none;" disabled><?=$get_summary->contactperson?></span></div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Mode of Payment: </label></div>
                                                <div class="col-md-8"><span type="text" class="apv_balance" style="border:none;" disabled><?=$get_summary->mode?></span></div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Contact No. </label></div>
                                                <div class="col-md-8"><span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->contactno?></span></div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Address: </label></div>
                                                <div class="col-md-8"><span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->address?></span></div>
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
<script type="text/javascript" src="<?=base_url('assets/js/reports/po_payable_report_link.js');?>"></script>
