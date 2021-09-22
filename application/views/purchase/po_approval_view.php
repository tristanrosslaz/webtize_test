<style>
.btn.disabled, .btn:disabled {
    cursor: not-allowed;
    opacity: 1;
}
.table-dark.table-bordered, .table-responsive>.table-bordered {
    border: 1px solid #dee2e6 !important;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">

<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/purchase_summary/'.$token);?>">Purchase Order Approval</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Purchase Order # <?=$pono?></li>
        </ol>
    </div>
    
    <section class="tables" id = "pono_id_sec" class="pono_id_sec" name = "pono_id_sec" data-pono="<?=$pono;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Purchase Order Information</h6>
                      <div class="card-body">
                        <form class="form-horizontal encode-info-css encode_form" id="encode_form">
                         <div class="form-group row">
                            <div class="col-md-6">
                                <label class="form-control-label">Purchase From <span hidden class="asterisk" style="color:red;">*</span></label>
                                <div class="form-group p-style">

                                    <div class="row">
                                        <div class="col-md-4">Supplier: </div>
                                        <div class="col-md-8"><h4><?=$get_pohistoryposummary->suppliername?></h4></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Contact Person: </div>
                                        <div class="col-md-8"><p><?=$get_pohistoryposummary->contactperson?></p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Contact No: </div>
                                        <div class="col-md-8"><p><?=$get_pohistoryposummary->contactno?></p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Mode of Payment: </div>
                                        <div class="col-md-8"><p><?=$get_pohistoryposummary->description?></p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Address: </div>
                                        <div class="col-md-8"><p><?=$get_pohistoryposummary->address?></p></div>
                                    </div>

                                    <!-- HIDDEN FIELDS -->
                                    <input type="hidden" value="<?=$get_pohistoryposummary->id?>" class="searchSupplier_id" name="searchSupplier_id" id="searchSupplier_id">
                                    <input type="hidden" value="<?=$token?>" class="token" name="token" id="token">
                                    <input type="hidden" value="<?=$supid?>" class="idno" name="idno" id="idno">
                                    <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                    <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                    <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                    <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="table-responsive">
                            <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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
                       <!--  <?php //check the discount type if percentage or whole number  
                        if ($get_pohistoryposummary->discount_type ==  2) {

                            $discount_val = $get_pohistoryposummary->gen_discount.'%';

                            $total_amount_computed= number_format(($get_pohistoryposummary->totalamt + $get_pohistoryposummary->freight) - (($get_pohistoryposummary->gen_discount / 100) * $get_pohistoryposummary->totalamt),2,".",",");
                        }else{
                            $discount_val = number_format($get_pohistoryposummary->gen_discount,2,".",",");

                            $total_amount_computed= number_format(($get_pohistoryposummary->totalamt + $get_pohistoryposummary->freight) - ($get_pohistoryposummary->gen_discount),2,".",",");
                        }
                        ?> -->
                        <div class="col-md-4 pr-0" style="float: right;">

                          <!--   <?php
                            if ($get_pohistoryposummary->discount_type ==  2) {

                                $discount_val = number_format($get_pohistoryposummary->gen_discount).'%';

                                $total_amount_computed= number_format(($get_pohistoryposummary->totalamt + $get_pohistoryposummary->freight) - (($get_pohistoryposummary->gen_discount / 100) * $get_pohistoryposummary->totalamt),2,".",",");
                            }else{
                                $discount_val = number_format($get_pohistoryposummary->gen_discount,2,".",",");

                                $total_amount_computed= number_format(($get_pohistoryposummary->totalamt + $get_pohistoryposummary->freight) - ($get_pohistoryposummary->gen_discount),2,".",",");
                            }
                            ?> -->

                             <?php
                                if ($get_pohistoryposummary->discount_type ==  2) {

                                    $discount_val = number_format($get_pohistoryposummary->gen_discount).'%';

                                }else{
                                    $discount_val = number_format($get_pohistoryposummary->gen_discount,2,".",",");    
                                }
                                    $total_amount_computed= general_discounted_total($get_pohistoryposummary->totalamt, $get_pohistoryposummary->freight, $get_pohistoryposummary->gen_discount, $get_pohistoryposummary->discount_type);
                                ?>
                            <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val?></a></button>

                            <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnShip" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?php echo  number_format($get_pohistoryposummary->freight,2,".",",") ?></a></button>

                            <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">
                                Total : <?=$total_amount_computed;?></a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <button style="float:right; margin-top: 15px;"  class="btn btn-primary printBtn">Print Purchase Order</button> -->
</section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/purchaseorder_view.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>

