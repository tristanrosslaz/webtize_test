<style>
   .btn.disabled, .btn:disabled {
   cursor: not-allowed;
   opacity: 1;
   }
   .table-dark.table-bordered, .table-responsive>.table-bordered {
   border: 1px solid #dee2e6;
   }
</style>

<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <!-- Page Header-->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/apv_list/'.$token);?>">Accounts Payable Voucher List</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Process Accounts Payable Voucher</li>
            <input type="hidden" name="hdnToken" id="hdnToken" class="hdnToken" value="<?=$token?>">
        </ol>
    </div>
    
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <form class="form-horizontal personal-info-css" id="apvpo_process_form" method="post" action="">
                            
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <div class="card-body">

                                                <div class="" >
                                                    <div class="">
                                                        <label class="" style="border:none; float:left;"># </label>
                                                        <h1 class="pono" style="border:none; float:left;"><?=$apvno?></h1>
                                                        <p><br></p>
                                                    </div>  
                                                </div>

                                                <div class="">
                                                    <div class="">
                                                        <H2><?=$get_summary->suppliername?></H2>
                                                    </div>  
                                                </div>

                                                <div class="">
                                                    <div class="">
                                                        <label class="">Amount: </label>
                                                        <?php if ($get_summary->description == "30-60-90 Days") { ?>
                                                            <span type="text" class="voucher_name" style="border:none;" disabled><?=number_format($checkamount, 2)?></span>
                                                        <?php }
                                                        else { ?>
                                                            <span type="text" class="voucher_name" style="border:none;" disabled><?=number_format($get_summary->amount, 2)?></span>
                                                        <?php } ?>
                                                    </div>  
                                                </div>

                                                <div class="">
                                                    <div class="">
                                                        <label class="">Terms of Payment: </label>
                                                        <span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->description?></span>
                                                    </div>  
                                                </div>

                                                <?php if ($get_summary->description == "30-60-90 Days") {
                                                    $counter = 0;
                                                    foreach ($dates as $value) { ?>                                                    

                                                        <div class="">
                                                            <div class="">
                                                                <label class="">Check Date <?php echo $counter+1; ?>: </label>
                                                                <span type="text" class="apv_amount" style="border:none;" disabled><?=$dates[$counter]?></span>
                                                            </div>  
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-4 form-control-label">Check Number <?php echo $counter+1; ?>:<span class="asterisk" style="color:red"></span></label>
                                                            <div class="col-md-8">
                                                                <input id="chk_number<?php echo $counter+1; ?>" type="text" class="form-control form-control-success" name="chk_number<?php echo $counter+1; ?>" placeholder="Enter Check Number (e.g. BDO12345)">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-4 form-control-label">Check Amount <?php echo $counter+1; ?>:</label>
                                                            <div class="col-md-8">
                                                                <span id="chk_amount" type="text" class="form-control form-control-success" name="chk_amount" placeholder="0.00" disabled><?=number_format($divided[$counter], 2)?></span>
                                                            </div>
                                                        </div>

                                                    <?php 
                                                        $counter++;
                                                    } 
                                                }
                                                else { ?>

                                                    <div class="">
                                                        <div class="">
                                                            <label class="">Check Date: </label>
                                                            <span type="text" class="apv_amount" style="border:none;" disabled><?=$checkdate?></span>
                                                        </div>  
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-4 form-control-label">Check Number:<span class="asterisk" style="color:red"></span></label>
                                                        <div class="col-md-8">
                                                            <input id="chk_number" type="text" class="form-control form-control-success" name="chk_number" placeholder="Enter Check Number (e.g. BDO12345)">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 form-control-label">Check Amount:</label>
                                                        <div class="col-md-8">
                                                            <span id="chk_amount" type="text" class="form-control form-control-success" name="chk_amount" placeholder="0.00" disabled><?=number_format($total, 2)?></span>
                                                            <input type="hidden" name="hdn_amount" id="hdn_amount" value="<?=$total?>">
                                                        </div>
                                                    </div>

                                                <?php } ?>

                                                <?php if ($avpPaymentLog == "1") { ?>

                                                    <div class="table-responsive">
                                                        <table class="table  table-striped table-hover table-bordered" id="table-grid3"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>PO Ret No. / Cash Voucher No.</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                    <div class="col-12 text-right" style="margin-bottom: 20px;">
                                                        TOTAL: <b><?=number_format($unpaid->totalamt, 2)?></b>
                                                    </div>

                                                <?php } ?>

                                                <span type="" class="apvno" style="border:none; float:right;" hidden><?=$apvno?></span>
                                                <div class="table-responsive">
                                                    <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="90">PO No. </th>
                                                                <th>RCV No.</th>
                                                                <th>Supplier Ref No.</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>

                                                <br><br>
                                                <div class="col-md-3" style="float: right; padding-right: 0px;">
                                                    <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total"> Total : <?=number_format($total, 2)?> </a></button>
                                                </div>
                                                <br><br><br><br><br>

                                                <div class="col-md-12">
                                                    <input type="submit" style="float:right" class="btn btn-success" value="Save">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group row"></div>
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
                                            <H1 class="m_rcvno" style="border:none; float:left;"></span></H1>
                                            <p><br></p>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <span type="text" class="m_itemtrandate"></span>
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
                                            <H2><?=$get_summary->suppliername?></H2>
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
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-success printBtn" id="printBtn">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmProcessModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">APV Approve</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="apvpo_process_form2" method="post" action="<?= base_url();?>Main_account/process_apvpo">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Proceed with the Approval of #<bold><?=$apvno?></bold></p>
                                    <input type="hidden" class="hdn_apvno" name="hdn_apvno" id="hdn_apvno" value="<?=$apvno?>">
                                    
                                    <input type="hidden" class="hdn_chk_supplierid" name="hdn_chk_supplierid" id="hdn_chk_supplierid" value="<?=$get_summary->supplierid?>">
                                    <input type="hidden" class="hdn_chk_trandate" name="hdn_chk_trandate" id="hdn_chk_trandate" value="<?=$get_summary->trandate?>">
                                    <input type="hidden" class="hdn_chk_count" name="hdn_chk_count" id="hdn_chk_count" value="<?=$ctype?>">

                                    <?php if ($get_summary->description == "30-60-90 Days") {
                                        $counter = 0;
                                        foreach ($dates as $value) { ?>

                                            <input type="hidden" class="hdn_chk_number<?php echo $counter+1; ?>" name="hdn_chk_number<?php echo $counter+1; ?>" id="hdn_chk_number<?php echo $counter+1; ?>" value="">
                                            <input type="" class="hdn_chk_amount<?php echo $counter+1; ?>" name="hdn_chk_amount<?php echo $counter+1; ?>" id="hdn_chk_amount<?php echo $counter+1; ?>" value="<?=$divided[$counter]?>" hidden>
                                            <input type="hidden" class="hdn_chk_date<?php echo $counter+1; ?>" name="hdn_chk_date<?php echo $counter+1; ?>" id="hdn_chk_date<?php echo $counter+1; ?>" value="<?=$dates[$counter]?>">

                                        <?php 
                                            $counter++;
                                        } 
                                    }
                                    else { ?>
                                        <input type="hidden" class="hdn_chk_number1" name="hdn_chk_number1" id="hdn_chk_number1" value="">
                                        <input type="" class="hdn_chk_amount1" name="hdn_chk_amount1" id="hdn_chk_amount1" value="<?=$total?>" hidden>
                                        <input type="hidden" class="hdn_chk_date1" name="hdn_chk_date1" id="hdn_chk_date1" value="<?=$checkdate?>">
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary approveApvBtn">Approve</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/apvpo_process.js');?>"></script>

