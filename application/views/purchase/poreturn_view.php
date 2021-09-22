<style>
   .btn.disabled, .btn:disabled {
   cursor: not-allowed;
   opacity: 1;
   }
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases">
    <!-- Breadcrumb-->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/return_summary/'.$token); ?>">PO Return Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">PO Return #<?=$poretno?></li>
        </ol>
    </div>
    
    <section class="tables" id = "poretno_id" class="poretno_id" name = "poretno_id" data-poretno="<?=$poretno;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="card-body">
                            <form class="form-horizontal encode-info-css encode_form" id="encode_form">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label">Returned To <span hidden class="asterisk" style="color:red;">*</span></label>
                                        <div class="form-group p-style">
                                            <div class="row">
                                                <div class="col-md-4">Supplier: </div><div class="col-md-8"><h4><?php echo $get_summary->suppliername?></h4></div>
                                            </div>
                                                
                                            <div class="row">
                                                <div class="col-md-4">Contact Person: </div><div class="col-md-8"><?=$get_summary->contactperson?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Contact No: </div><div class="col-md-8"><?=$get_summary->contactno?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Mode of Payment: </div><div class="col-md-8"><?=$get_summary->description?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Address: </div><div class="col-md-8"><?=$get_summary->address?></div>
                                            </div>

                                            <!-- HIDDEN FIELDS -->
                                            <input type="hidden" value="<?=$get_summary->supid?>" class="searchSupplier_id" name="searchSupplier_id" id="searchSupplier_id">
                                            <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                            <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                            <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                            <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group p-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-hover table-striped" id="table-poretno"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                        <thead>
                                                            <tr>  
                                                                <th>Date</th>
                                                                <th>Reference</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>                  
                                        <input id="inputHorizontalWarning" type="hidden" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($get_summary)){ echo date_format(date_create($get_summary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"/>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit</th>
                                                    <th>Price</th>
                                                    <th>Discount</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-3" style="float: right; padding-right: 0px;">
                                    <?php
                                        if ($get_summary->discount_type ==  2) {
                                            $discount_val = number_format($get_summary->gen_discount).'%';
                                        }
                                        else {
                                            $discount_val = number_format($get_summary->gen_discount,2,".",",");
                                        }
                                        $total_amount_computed = general_discounted_total($get_summary->totalamt, $get_summary->freight, $get_summary->gen_discount, $get_summary->discount_type);
                                    ?>

                                        <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val?></a></button>

                                        <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnShip" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?php echo  number_format($get_summary->freight,2,".",",") ?></a></button>

                                        <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">
                                        Total : <?=$total_amount_computed;?></a></button>  
                                        <input type="hidden" value= "<?=$get_summary->freight?>" class="form-control form-control-success shippingamt" name="shippingamt" id="shippingamt">
                                        <input type="hidden" value= "<?=$get_summary->totalamt?>" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2">
                                    </div>
                                    <br><br><br><br><br><br><br><br><br>
                                    <label for="notes" style="padding-top: 0px;">Notes</label> 
                                    <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_summary->notes?></textarea>
                                    <div class="form-group row" style="margin-top: 30px;">       
                                        <div class="col-md-12">
                                            <button style="float:right"  class="btn btn-primary printBtn">Print Purchase Return</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/poreturn_view.js');?>"></script>

