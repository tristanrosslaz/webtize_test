<!-- change the data-num and data-subnum for numbering of navigation -->

<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
     <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/apv_list/'.$token); ?>">Accounts Payable Voucher List</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Accounts Payable Voucher</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <h6 class="secondary-bg px-4 py-3 white-text">Accounts Payable Voucher Information</h6>    
                <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item">
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
                                                            <label class="" style="float:left;"># </label>
                                                            <H1 class="apvno" style="border:none; float:left;"><?=$get_summary->apvno?></H1>
                                                            <p><br></p>
                                                        </div>  
                                                    </div>

                                                    <div class="">
                                                        <div class="">
                                                            <span type="text" class="trandate"><?=$get_summary->trandate?></span>
                                                            <p><br></p>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="col-lg-6">

                                                    <div class="">
                                                        <div class="">
                                                            <label class="">Payable To </label>
                                                        </div>  
                                                    </div>

                                                    <div class="">
                                                        <div class="">
                                                                <div class="">
                                                                    <H2><?=$get_summary->supname?></H2>
                                                                </div>  
                                                            </div>
                                                    </div>

                                                    <div class="">
                                                        <div class="">
                                                            <label class="">Terms of Payment: </label>
                                                            <span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->terms?></span>
                                                        </div>  
                                                    </div>

                                                    <div class="">
                                                        <div class="">
                                                            <label class="">APV Amount: </label>
                                                            <span type="text" class="apv_amount" style="border:none;" disabled><?=number_format($get_summary->amount, 2)?></span>
                                                        </div>  
                                                    </div>

                                                    <div class="">
                                                        <div class="">
                                                            <label class="">APV Balance: </label>
                                                            <span type="text" class="apv_balance" style="border:none;" disabled><?=number_format($balance,2)?></span>
                                                        </div>  
                                                    </div>

                                                    <div class="">
                                                        <div class="">
                                                            <label class="">APV Status: </label>
                                                            <span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->apvstatus?></span>
                                                        </div>  
                                                    </div>

                                                </div>

                                                <div class="col-lg-6">

                                                    <?php if ($get_summary->apvstatus=="Processed") { ?>
                                                
                                                        <div class="">
                                                            <div class="">
                                                                <label class="">Payment Details </label>
                                                            </div>  
                                                        </div>

                                                        <?php foreach($checks as $value) { 
                                                            if($value["checkno"]=="none") {?>
                                                                <div class="" >
                                                                    <div class="">
                                                                        <label></label>
                                                                        <span type="text" style="border:none;" disabled><?php echo $value["checkdate"] . " | PORet#" .$value["desc2"] . " | " . number_format($value["checkamount"], 2); ?></span>
                                                                    </div>  
                                                                </div>
                                                            <?php }
                                                                else { ?>
                                                                <div class="" >
                                                                    <div class="">
                                                                        <label></label>
                                                                        <span type="text" style="border:none;" disabled><?php echo $value["checkdate"] . " | " .$value["checkno"] . " | " . number_format($value["checkamount"], 2); ?></span>   
                                                                    </div>  
                                                                </div>
                                                        <?php }
                                                        } ?>

                                                    <?php }
                                                    elseif ($get_summary->apvstatus=="Approved") {
                                                        if ($count == 1) { ?>

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Payment Details </label>
                                                                </div>  
                                                            </div>

                                                            <?php foreach($checks as $value) { 
                                                                if($value["checkno"]=="none") {?>
                                                                    <div class="" >
                                                                        <div class="">
                                                                            <label></label>
                                                                            <span type="text" style="border:none;" disabled><?php echo $value["checkdate"] . " | PORet#" .$value["desc2"] . " | " . number_format($value["checkamount"], 2); ?></span>
                                                                        </div>  
                                                                    </div>
                                                                <?php }
                                                                    else { ?>
                                                                    <div class="" >
                                                                        <div class="">
                                                                            <label></label>
                                                                            <span type="text" style="border:none;" disabled><?php echo $value["checkdate"] . " | " .$value["checkno"] . " | " . number_format($value["checkamount"], 2); ?></span>   
                                                                        </div>  
                                                                    </div>
                                                            <?php }
                                                            } ?>
                                                         
                                                    <?php } 
                                                    } ?>
                                                    
                                                </div>

                                            </div>

                                            <div class="table-responsive">
                                                <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
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
                                <?php if ($get_summary->apvstatus == "Approved" || $get_summary->apvstatus == "Processed") { ?>
                                    <button type="button" style="float:right; margin-right:10px;" class="btn btn-primary printBtn" data-dismiss="modal" aria-label="Close">Print</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
<input type="hidden" class="hidden_apvno" name="hidden_apvno" id="hidden_apvno" value="<?php $this->session->userdata('apvno'); ?>">
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/apvno_log.js');?>"></script>

