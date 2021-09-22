<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/return_summary/'.$token);?>">PO Return Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">PO Return Transaction</li>
        </ol>
    </div>

    <section class="tables" id = "poretno_id" class="poretno_id" name = "poretno_id" data-poretno="<?=$get_infosummary->poretno;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">PO Return Information</h6>
                       <div class="card-body">
                            <form class="form-horizontal encode-info-css encode_form" id="encode_form">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        
                                        <label class="form-control-label">Delivery To <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Supplier: </div>
                                                    <div class="col-md-8"><h4><?php echo $get_edit_supplier->suppliername?></h4></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Contact Person: </div>
                                                    <div class="col-md-8"><?=$get_edit_supplier->contactperson?></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Contact No: </div>
                                                    <div class="col-md-8"><?=$get_edit_supplier->contactno?></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Mode of Payment: </div>
                                                    <div class="col-md-8"><?=$get_edit_credit->description?></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Address: </div>
                                                    <div class="col-md-8"><?=$get_edit_supplier->address?></div>
                                                  </div>

                                                  <!-- HIDDEN FIELDS -->
                                                  <input type="hidden" value="<?=$get_edit_supplier->id?>" class="searchSupplier_id" name="searchSupplier_id" id="searchSupplier_id">
                                                  <input  type="hidden" value="<?=today_text()?>" class="form-control form-control-warning edate purchase_date" id="edate" name="edate"/>
                                                    <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                                    <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                                    <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                                    <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                                    <input type="hidden" class="form-control form-control-success mode_payment" name="mode_payment" id="mode_payment" value="">
                                                    <input type="hidden" value="<?=$get_users->username?>" id="username" class="username" name="username"> 
                                                    <input type="hidden" value="<?=$get_location?>" id="itemlocid" class="itemlocid" name="itemlocid"> 

                                                      
                                            </div>
                                    </div>
                                  </div>
                                  <input type="" class="" value="1"  id="rowrec" hidden>
                                   <input type="" class="" value=""  id="priceresult" hidden>
                                <hr>    
                                <div class="form-group row" style="float: right;margin-right: 0px;top:20px;">    

                                  <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAPurchaseItemModal" class="btn btn-primary btnUpdate btnTable" id="addpurchaseorder" name="update" >Add Item Order</button>
                                 </div>

                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th width="80">Action</th>

                                            </tr>
                                        </thead>
                                    </table>

                                    <div class="col-md-3 text-right" style="float: right; padding-right: 0px;">
                                      <input value="<?=$token;?>" type="" id="token" name="token" hidden/>

                                      <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?php echo  number_format($get_infosummary->freight,2,".",",") ?></a></button>

                                      <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total"><?php $totalamt = $get_infosummary->totalamt + $get_infosummary->freight; ?>
                                      Total : <?php echo  number_format($totalamt,2,".",",") ?></a></button>


                                     <input type="hidden" value= "<?=$get_infosummary->freight?>" class="form-control form-control-success shippingamt" name="shippingamt" id="shippingamt"> 
                                     <input type="hidden" value= "<?=$get_infosummary->totalamt?>" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2">
                                     <input type="hidden" value= "<?=$get_infosummary->totalamt?>" class="form-control form-control-success item_total" name="item_total" id="item_total" >
                                   </div>

                                     <br>
                                     <br>
                                     <br>
                                     <br>
                                     <br>
                                     <hr>
                                     <label for="notes" style="margin-top: 5px">Notes</label> 
                                     <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes"><?=$get_infosummary->notes?></textarea>
                                </div>         
                                <div class="form-group row" style="margin-top: 10px;">       
                                    <div class="col-md-12">
                                        <button type="submit" style="float:right" class="btn btn-primary saveBtnEncode ">Save Changes</button>
                                        <a onclick="history.back(-1)" style="float:right; margin-right: 10px; color: #fff" class="btn blue-grey backButton "> Back</a>
                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div id="addAPurchaseItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
   <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Add Item Order</h4>
            <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
         </div>
         <div class="modal-body">
            <form class="form-horizontal personal-info-css" id="add_deliverypartnerinfo-form">
               <div class="form-group row">
                  <label class="col-md-3 form-control-label">Inventory <span class="" style="color:red">*</span></label>
                  <div class="col-md-6">
                     <input id="searchInventory" type="text" class="form-control form-control-success searchInventory" name="searchInventory">
                     <input type="hidden" class="searchInventory_id" name="searchInventory_id" id="searchInventory_id"> 
                     <input type="hidden" class="supplierid" name="supplierid" id="supplierid">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-3 form-control-label">Quantity <span class="" style="color:red">*</span></label>
                  <div class="col-md-6">
                     <input type="text" class="form-control qty valid_number" min='1' oninput="validity.valid||(value='');" name="qty" id="qty">
                  </div>
               </div>
               <div class="modal-footer">
                  <div class="form-group row">
                     <div class="col-md-12">
                        
                        <button type="button" style="margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        <button class="btn btn-primary addPurchaseOrderEncodeBtn" data-dismiss="modal" type="button">Add</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div id="approvePurchaseModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
   <div role="document" class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Message</h4>
         </div>
         <form class="form-horizontal personal-info-css" id="">
            <div class="modal-body">
               <div class="">
                  <div class="row">
                     <div class="col-lg-12">
                      <input type="hidden" class="passApporoveLink" id="passApporoveLink" name="passApporoveLink" value="<?=base_url('Main_purchase/purchase_summary/'.$token);?>">
                          <p>Are you sure you want to approve?</p> 
                          <input type="hidden" value="<?=$get_infosummary->poretno;?>" class="app_pono" name="app_pono" id="app_pono">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <div class="form-group row">
                  <div class="col-md-12"> 
                     <button type="button" style="margin-right:10px;" data-dismiss="modal" class="btn blue-grey cancelBtn" aria-label="Close">Close</button>
                     <button type="submit" class="btn btn-primary approvePurchaseOrder" name="approvePurchaseOrder" id="approvePurchaseOrder" class="approvePurchaseOrder">Add</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
   <div id="addAShippingModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="exampleModalLabel" class="modal-title">Shipping</h4>
            </div>
            <form class="form-horizontal personal-info-css" data-toggle="validator" role="form" id="forminv">
                <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="form-group row col-md-12">
                                    <div class="col-md-3">
                                        <label class="form-control-label " type="text">Shipping Amount<span class="" style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-8">
                                         <input class="form-control valid_number" min="" value="<?=$get_infosummary->freight?>" onkeypress="return isNumberKeyOnly(event)" type="text" id="shipping" placeholder="0.00">
                                    </div>
                                </div>

                            </div>
                        </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-md-12">
                                
                                <button type="button" aria-label="Close" data-dismiss="modal" style="margin-right:10px;" class="btn blue-grey btnassignShip">Add</button>
                                <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close" onclick="cleartag();">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/purchasereturn_edit.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>

