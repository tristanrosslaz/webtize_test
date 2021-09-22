<style>
    div#table-grid-edit_filter {
        display: none;
    }

    .btn.disabled, .btn:disabled {
        cursor: not-allowed;
        opacity: 1;
    }
</style>
 
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/sales_invoice/'.$token);?>">Sales Invoice</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales Invoice Convert</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid" id="DRdiv" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <h6 class="secondary-bg px-4 py-3 white-text">Sales Invoice Information</h6>
                            <div class="card-header d-flex align-items-center">
                                <h4 style="float: left;">Delivery Receipt #<?=$getSummary->drno?></h4>
                                 </div>
                                        <div class="card-body">

                                          <div class="form-group row">   
                                             <div class="col-md-6">
                                                 <label class="form-control-label returnedby">Deliver To: </label><br>
                                          
                                             <div class="form-group p-style">
                                                <div class="row">
                                                 
                                                 <div class="col-md-4">Customer: </div>
                                                     <div class="col-md-8"><h4><?=concatenate_name($getSummary->fname, $getSummary->mname, $getSummary->lname, $getSummary->branchname) ?></h4></div>
                                                   </div>

                                                    <div class="row">
                                                        <div class="col-md-4">Branch Address: </div>
                                                        <div class="col-md-8"><p><?=$getSummary->branchname?></p></div>
                                                    </div>

                                                     <div class="row">
                                                        <div class="col-md-4">Mode of Payment: </div>
                                                        <div class="col-md-8"><p><?=$getSummary->mop?></p></div>
                                                    </div>

                                                     <div class="row">
                                                        <div class="col-md-4">Contact#: </div>
                                                        <div class="col-md-8"><p><?=$getSummary->conno?></p></div>
                                                    </div>

                                                      <div class="row">
                                                        <div class="col-md-4">Address: </div>
                                                        <div class="col-md-8"><p><?=$getSummary->homeaddress?></p></div>
                                                    </div>
                                                         
                                                 <input type="hidden" value="<?=$getSummary->drno?>" class="form-control form-control-success drno" name="drno" id="drno_id">
                                                 <input type="hidden" value="<?=$getSummary->idno?>" class="form-control form-control-success idno" name="idno" id="idno_id">
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
                                                                     <input hidden readonly="true" id="inputHorizontalWarning"  type="text" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($getSummary)){ echo date_format(date_create($getSummary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"  />
                                                                     <div class="col-md-8"><p><?php if(!empty($getSummary)){ echo date_format(date_create($getSummary->trandate),"m/d/Y");}?></p></div>
                                                                </div>
                                                            </div>      
                                                        
                                                        <div class="row">
                                                            <div class="col-md-4">Shipping: </div>
                                                                <div class="col-md-8">
                                                                    <div class="col-md-8"><p><?php  echo $getSummary->shipping ?></p></div>
                                                                    <input readonly="true" class="shipping_id" id="shipping_id" value="<?php  echo $getSummary->shipping_id ?>" hidden />
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                            <div class="col-md-4">Location: </div>
                                                                <div class="col-md-8">
                                                                    <div class="col-md-8"><p><?php  echo $getLocation->location ?></p></div>
                                                                    <input readonly="true" class="location_id" id="location_id" value="<?php  echo $getLocation->itemlocid ?>" hidden />
                                                                </div>
                                                            </div>   
                                                        
                                                      <input type="text" class="" id="code-scan" autofocus hidden />       
                                                      <input class="form-control" type="text" id="barcode_validator2" hidden>  
                                                </div>   
                                        </div> 
                                        <!-- end lg-6  -->
                                    </div>
                            <hr>
                            <div class="table-responsive">
                                <input type="text" class="" id="isActive" value="0" hidden/>  
                                <br>
                                <br>
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                                <th>Item Name</th>
                                                <th width="130">Quantity</th>
                                                <th width="130">Unit</th>
                                                <th width="130">Price</th>
                                                <th width="100">Discount</th>
                                                <th width="130">Total</th>                                  
                                        </tr>
                                    </thead>
                                </table>
                            </div>  
                            <div class="">    
                                <div class="col-md-4" style="float: right; padding-right: 0px;">

                                    <!-- <?php //check the discount type if percentage or whole number  
                                        if ($getSummary->discount_type ==  2) {
                                          $discount_val = $getSummary->gen_discount.'%';
                                          $total_amount_computed= number_format(($getSummary->totalamt + $getSummary->freight) - (($getSummary->gen_discount / 100) * $getSummary->totalamt),2,".",",");
                                        }
                                        else{
                                            $discount_val = number_format($getSummary->gen_discount,2,".",",");
                                            $total_amount_computed= number_format(($getSummary->totalamt + $getSummary->freight) - ($getSummary->gen_discount),2,".",",");
                                        }
                                    ?> -->

                                    <?php
                                        if ($getSummary->discount_type ==  2) {

                                            $discount_val = number_format($getSummary->gen_discount).'%';

                                        }else{
                                            $discount_val = number_format($getSummary->gen_discount,2,".",",");       
                                        }
                                            $total_amount_computed= general_discounted_total($getSummary->totalamt, $getSummary->freight, $getSummary->gen_discount, $getSummary->discount_type);
                                    ?>

                                    <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled="disabled"><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val;?></a></button>
                        
                                    <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey" data-toggle="modal" data-target="#" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?php echo  number_format($getSummary->freight,2,".",",") ?></a></button>

                                    <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="btnGrandtotal" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" ><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGrandtotal">Total: <?=$total_amount_computed;?></a></button>

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
                                <label for="notes" style="padding-top: 5px">Notes</label> 
                                <textarea class="col-md-12 form-control-label packing" style="resize: none;" rows="4" cols="40" id="notes" type="text" ><?php echo $getSummary->notes ?></textarea>

                                <button type="button" class="btn btn-primary col-md-4 btnDeliveryComfirm" data-toggle="modal"  data-backdrop="static" data-keyboard="false" style="float:right;" data-target="#approvalModal">Convert to Sales Invoice</button>



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
                                            <label class="form-control-label " type="text">Shipping Amount<span class="asterisk" style="color:red">*</span></label>
                                        </div>
                                        <div class="col-md-8">
                                             <input class="form-control" type="text" onpaste="return false;" id="shipping" onkeypress="return isNumberKeyOnly(event)" oninput="validity.valid||(value='');" min="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-success btnassignShip">Add Shipping</button>
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

                                <label class="form-control-label " type="text">Are you sure you want to convert to Sales Invoice?</label>
                                <input class="form-control" type="text" id="barcode_validator1" hidden>  
                            </div>
                        </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">No</button>
                                <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-primary btnConvert" id="btnConvert">Yes</button>

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
                                            <label class="form-control-label " type="text">Item Name<span class="asterisk" style="color:red">*</span></label>
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
                                            <label class="form-control-label " type="text">Release Qty<span class="asterisk" style="color:red">*</span></label>
                                        </div>
                                        <div class="col-md-8">
                                             <input class="form-control" type="text" id="releaseqty" onpaste="return false;" onkeypress="return isNumberKeyOnly(event)" oninput="validity.valid||(value='');" min="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn1" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button type="button" aria-label="Close" data-dismiss="modal" style="float:right; margin-right:10px;" class="btn btn-blue-grey btnManualRelease">Release</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_invoiceconvert.js');?>"></script>
