<style>
    div#table-grid-edit_filter {
        display: none;
    }
    .blue-grey.btn.disabled, .blue-grey.btn:disabled {
        cursor: not-allowed;
        opacity: 1;
    }
</style>
 
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/sales_dr/'.$token);?>">Delivery Receipt</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Delivery Receipt Convert</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid" id="DRdiv" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Delivery Receipt Information</h6>
                        <div class="card-header d-flex align-items-center">
                            <h4 style="float: left;">Sales Order #<?=$get_sosummary->sono?></h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">   
                                <div class="col-md-6">
                                    <label class="form-control-label returnedby">Deliver To: </label><br>
                                  
                                    <div class="form-group p-style">
                                        <div class="row">
                                         
                                            <div class="col-md-4">Customer: </div>
                                            <div class="col-md-8"><h4><?=concatenate_name($get_sosummary->fname, $get_sosummary->mname, $get_sosummary->mname, $get_sosummary->branchname) ?></h4></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">Branch Address: </div>
                                            <div class="col-md-8"><p><?=$get_sosummary->branchname?></p></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">Mode of Payment: </div>
                                            <div class="col-md-8"><p><?=$get_sosummary->mop?></p></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">Contact#: </div>
                                            <div class="col-md-8"><p><?=$get_sosummary->conno?></p></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">Address: </div>
                                            <div class="col-md-8"><p><?=$get_sosummary->homeaddress?></p></div>
                                        </div>
                                                 
                                        <input type="hidden" value="<?=$get_sosummary->sono?>" class="form-control form-control-success sono" name="sono" id="sono_id">
                                        <input type="hidden" value="<?=$get_sosummary->idno?>" class="form-control form-control-success idno" name="idno" id="idno_id">
                                        <input type="hidden" value="<?=$token ?>" class="form-control  token" name="token" id="token">
                                     
                                    </div>
                                </div> 
                                <!-- end lg-6  -->

                                <div class="col-md-6">
                                    <label class="form-control-label returnedby">Deliver Information: </label><br>
                                    <div class="form-group p-style">

                                        <div class="row">
                                            <div class="col-md-4">Date: </div>
                                                <div class="col-md-8">
                                                <input hidden readonly="true" id="inputHorizontalWarning"  type="text" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($get_sosummary)){ echo date_format(date_create($get_sosummary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"  />
                                                <div class="col-md-8"><p><?php if(!empty($get_sosummary)){ echo date_format(date_create($get_sosummary->trandate),"m/d/Y");}?></p></div>
                                            </div>
                                        </div>      
                                                
                                        <div class="row">
                                            <div class="col-md-4">Shipping: </div>
                                            <div class="col-md-8">
                                                <div class="col-md-8"><p><?php  echo $get_sosummary->shipping ?></p></div>
                                                <input readonly="true" class="shipping_id" id="shipping_id" value="<?php  echo $get_sosummary->shipping_id ?>" hidden />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">Location: </div>
                                            <div class="col-md-8">
                                                <div class="col-md-8"><p><?php  echo $get_location->location ?></p></div>
                                                <input readonly="true" class="location_id" id="location_id" value="<?php  echo $get_location->itemlocid ?>" hidden />
                                            </div>
                                        </div>

                                    </div>   
                                </div>
                                <!-- end lg-6  -->
                            </div>

                            <hr>         
                            <div class="">
                                <input type="text" class="" id="isActive" value="0" hidden/>  
                                <button type="button" style="float:left;" class="btn btn-success btnActiveBarcode">
                                Barcode</button>
                                <button type="button" style="float:left; margin-left:10px;" class="btn btn-secondary btnActiveManual">Manual</button>
                                
                                <br>
                                <br>
                                <div class="table-responsive ">
                                <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Item ID</th>
                                            <th>Item Name</th>
                                            <th>SO Qty</th>
                                            <th>Release Qty</th>
                                            <th>Difference</th>
                                            <th>UOM ID</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th width="50px">Discount</th>
                                            <th>Discount Type</th>
                                            <th>SubTotal</th>
                                            <th>Total</th>
                                            <th width="80">Action</th>                                     
                                        </tr>
                                    </thead>
                                </table>
                                </div> 

                                <div class="col-md-4" style="float: right; padding-right: 0px;">

                                    <?php //check the discount type if percentage or whole number  
                                        if ($get_sosummary->discount_type ==  2) {
                                            $discount_val = $get_sosummary->gen_discount.'%';
                                        }
                                        else {
                                            $discount_val = number_format($get_sosummary->gen_discount,2,".",",");
                                        }
                                    ?>

                                    <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled="disabled"><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val;?></a></button>

                                    <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey" id="btnShipping" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#ShippingModal" onclick="ClearFieldsshipping();" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;" disabled></i><a class="btnShipping">Shipping: <?php echo  number_format($get_sosummary->freight,2,".",",") ?></a></button>

                                    <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="btnGrandtotal" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" ><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGrandtotal">Total: 0.00</a></button>

                                    <input type="hidden" value="<?=$get_sosummary->freight?>" class="form-control form-control-success shippingamt" name="shippingamt" id="shippingamt">
                                    <input type="hidden" value="<?=$get_sosummary->gen_discount?>" class="form-control form-control-success gendiscount" name="gendiscount" id="gendiscount">
                                    <input type="hidden" value="<?=$get_sosummary->discount_type?>" class="form-control form-control-success gendiscounttype" name="gendiscounttype" id="gendiscounttype">
                                    <input type="hidden" class="form-control form-control-success totalamt" name="totalamt" id="totalamt">
                                    <input type="hidden" class="form-control form-control-success discountedtotalamt" name="discountedtotalamt" id="discountedtotalamt">

                                </div>

                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <hr>

                                <label for="notes" style="padding-top: 0px">Notes</label> 
                                <textarea class="col-md-12 form-control-label packing" style="resize: none;" rows="4" cols="40" id="notes" type="text"><?php echo $get_sosummary->notes ?></textarea>

                                <button type="button" class="btn btn-primary col-md-4 btnDeliveryComfirm" data-toggle="modal"  data-backdrop="static" data-keyboard="false" style="float:right;" data-target="#approvalModal">Convert to Delivery Receipt</button>
                                <!-- <button type="button" class="btn btn-info col-md-2 btnfinalize" id="btnfinalize" style="float:right; margin-right:10px;">Closed DR</button> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="ShippingModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Shipping</h4>
                </div>
                <div class="modal-body">
                    <div class="card-header d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="form-group row col-md-12">
                                    <div class="col-md-3">
                                        <label class="form-control-label " type="text">Shipping Amount<span class="" style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                         <input class="form-control allownumericwithdecimal" type="text" id="shipping" min="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-secondary cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-primary btnassignShip">Add Shipping</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="approvalModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="row">

                                <label class="form-control-label " type="text">Are you sure you want to convert to Delivery Receipt?</label>
                                <input class="form-control" type="text" id="barcode_validator1" hidden>  
                            </div>
                        </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-secondary cancelBtn" data-dismiss="modal" aria-label="Close">No</button>
                                <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-success btnConvert" id="btnConvert">Yes</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editdrModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Manual Input</h4>
                </div>
                <div class="modal-body">

                    <div class="card-header d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="form-group row col-md-12">
                                    <div class="col-md-4">
                                        <label class="form-control-label " type="text">Item Name<span class="" style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" id="invname" disabled="true">
                                        <input class="form-control" type="text" id="sono_value" hidden>
                                        <input class="form-control" type="text" id="itemid_value" hidden>
                                        <input class="form-control" type="text" id="actual_qty" hidden>
                                        <input class="form-control" type="text" id="actual_itemid" hidden>
                                        <input class="form-control" type="text" id="disc_qty" hidden>
                                    </div>
                                </div>

                                <div class="form-group row col-md-12">
                                    <div class="col-md-4">
                                        <label class="form-control-label " type="text">Release Qty<span class="" style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                         <input class="form-control allownumericwithdecimal" type="text" id="releaseqty" min="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-secondary cancelBtn1" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-primary btnManualRelease">Release</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="barcodeModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Manual Input</h4>
                </div>
                <div class="modal-body">

                    <div class="card-header d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="form-group row col-md-12">
                                    <div class="col-md-4">
                                        <label class="form-control-label " type="text">Item Barcode<span class="" style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" id="code-scan">
                                    </div>
                                </div>

                                <div class="form-group row col-md-12">
                                    <div class="col-md-4">
                                        <label class="form-control-label " type="text">Item Name<span class="" style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" id="bc-invname" disabled="true">
                                        <input class="form-control" type="text" id="bc-itemid_value" hidden>
                                        <input class="form-control" type="text" id="bc-sono_value" hidden>
                                        <input class="form-control" type="text" id="bc-actual_qty" hidden>
                                        <input class="form-control" type="text" id="bc-actual_itemid" hidden>
                                        <input class="form-control" type="text" id="bc-disc_qty" hidden>
                                    </div>
                                </div>

                                <div class="form-group row col-md-12">
                                    <div class="col-md-4">
                                        <label class="form-control-label " type="text">Release Qty<span class="" style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                         <input class="form-control allownumericwithdecimal" type="text" id="bc-releaseqty" min="" disabled="true">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-secondary cancelBtn1" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-primary btnBarcodeRelease">Release</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_drconvert.js');?>"></script>
