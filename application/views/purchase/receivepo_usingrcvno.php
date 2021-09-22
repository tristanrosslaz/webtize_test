<style>
.easy-autocomplete.eac-square {
 width: 500px !important;
}
table#table-grid {
    border: 1px solid #dee2e6;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/receivepo_tranHistory/'.$token);?>">Receive PO Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Purchase Order Receive # <?php echo $rcvno ?></li>
        </ol>
    </div>
    
    <section class="tables" id = "rcvno_id_sec" class="rcvno_id_sec" name = "rcvno_id_sec" data-rcvno="<?=$rcvno;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Purchase Order Receive Information</h6>
                      <div class="card-body">
                        <form class="form-horizontal encode-info-css encode_form" id="encode_form">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    
                                    <label class="form-control-label">Purchase From <span hidden class="asterisk" style="color:red;">*</span></label>
                                    <div class="form-group p-style">
                                        <div class="row">
                                            <div class="col-md-4">Supplier: </div>
                                            <div class="col-md-8"><h4><?php echo $get_rcvhistoryrcvview->suppliername?></h4></div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">PO No: </div>
                                            <div class="col-md-8"><?=$pono?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">PO Date: </div>
                                            <div class="col-md-8"><?=$get_rcvhistoryrcvview->trandate?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">Supplier Ref No: </div>
                                            <div class="col-md-8"><?=$rcvno?></div>
                                        </div>
                                        
                                        <!-- HIDDEN FIELDS -->

                                        <input type="hidden" value="<?=$get_rcvhistoryrcvview->id?>" class="searchSupplier_id" name="searchSupplier_id" id="searchSupplier_id">
                                        <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                        <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                        <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                        <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">

                                        <input type="hidden" value="<?=$pono?>" class="form-control form-control-success pono" name="pono" id="pono">    
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Receive Date</th>   
                                            <th>Unit</th>  
                                            <th>Price</th>             
                                            <th>Receive Qty</th>  
                                            <th>Discount</th>
                                            <th>Total</th>
                                            
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-md-4 pr-0" style="float: right;">

                            <?php
                            if ($get_rcvhistoryrcvview->discount_type ==  2) {

                                $discount_val = number_format($get_rcvhistoryrcvview->gen_discount).'%';

                                // $total_amount_computed= number_format(($get_rcvhistoryrcvview->totalamt + $get_rcvhistoryrcvview->freight) - (($get_rcvhistoryrcvview->gen_discount / 100) * $get_rcvhistoryrcvview->totalamt),2,".",",");
                            }else{
                                $discount_val = number_format($get_rcvhistoryrcvview->gen_discount,2,".",",");

                                // $total_amount_computed= number_format(($get_rcvhistoryrcvview->totalamt + $get_rcvhistoryrcvview->freight) - ($get_rcvhistoryrcvview->gen_discount),2,".",",");
                            }
                                $total_amount_computed = general_discounted_total($get_rcvhistoryrcvview->totalamt, $get_rcvhistoryrcvview->freight, $get_rcvhistoryrcvview->gen_discount, $get_rcvhistoryrcvview->discount_type);
                            ?>
                            <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val?></a></button>

                            <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnShip" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?php echo  number_format($get_rcvhistoryrcvview->freight,2,".",",") ?></a></button>

                            <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">
                                Total : <?=$total_amount_computed;?></a></button>
                            </div>
                            
                    </form>
                </div>
            </div><div class="form-group row" style="margin-top: 10px;">       
                  <div class="col-lg-12" id="printDivsRet1" style="float: right; padding-right: 10px;">
                    <?php if($get_print->num_rows() > 0){ ?>
                    <i><a style="color:red;">This document has already been printed.</a></i>
                    <?php } else { ?>
                    <button style="float:right"  class="btn btn-primary printBtn"> Print Receive PO Form</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/receivepo_usingrcvno.js');?>"></script>
<!-- <script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script> -->

