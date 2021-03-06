<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
        <!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/sales_summary/'.$token);?>">Sales Order Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales Order Edit</li>
        </ol>
    </div>
<section class="tables" id = "sono_id_sec" class="sono_id_sec" name = "sono_id_sec" data-sono="<?=$get_infosummary->sono;?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h6 class="secondary-bg px-4 py-3 white-text">Sales Order Information</h6>
                        <div class="card-header d-flex align-items-center">
                            <h4 style="float: left;">Sales Order # <?php echo $sono ?></h4>
                        </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                    <label class="form-control-label">Delivery To <span hidden class="asterisk" style="color:red;">*</span></label>
                                <div class="form-group p-style">
                                    <div class="row">
                                        <div class="col-md-4">Customer: </div>
                                            <div class="col-md-8">
                                                <h4><?php echo $get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname?></h4>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Branch: </div>
                                        <div class="col-md-8"><p><?=$get_edit_membermain->branchname?></p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Mode of Payment: </div>
                                        <div class="col-md-8"><p><?=$get_edit_credit->description?></p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Contact No: </div>
                                        <div class="col-md-8"><p><?=$get_edit_membermain->conno?></p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Address: </div>
                                        <div class="col-md-8"><p><?=$get_edit_membermain->address?></p></div>
                                    </div>
                                        <!-- HIDDEN FIELDS -->
                                        <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                        <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                        <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                        <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                        <input type="hidden" value="<?=$get_edit_membermain->pricecat?>" class="form-control form-control-success pricecat" name="pricecat" id="pricecat">
                                        <input type="hidden" class="form-control form-control-success mode_payment" name="mode_payment" id="mode_payment" value="">
                                        <input disabled type="hidden" class="form-control form-control-success term_credit" name="term_credit" id="term_credit" value="<?=$get_edit_credit->description?>">
                                        <input type="hidden" value="<?=$get_edit_membermain->idno?>" class="form-control form-control-success idno" name="idno" id="idno">
                                        <input type="hidden" class="form-control form-control-success franchise_id" name="franchise_id" id="franchise_id" value="<?=$get_edit_membermain->franchiseid?>">
                                        <input type="hidden" value="<?=$get_users->username?>" id="username" class="username" name="username">
                                        <input id="edate" type="hidden" class="form-control form-control-warning datepicker edate" value="<?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?>" id="edate" name="edate"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Delivery Information <span hidden class="asterisk" style="color:red;">*</span></label>

                                    <div class="form-group p-style">
                                        <div class="row">
                                            <div class="col-md-3">Delivery Date: </div>
                                            <div class="col-md-9"><?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Shipping: </div>
                                            <div class="col-md-9">
                                                <p><?php  echo $get_shippingDescription ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Location: </div>
                                            <div class="col-md-9">
                                                <p><?php  echo $get_itemlocationDescription ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                  
                                <input id="inputHorizontalWarning" type="hidden" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"/>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row" style="float: right;margin-right: 0px;top:20px;">                         
                            <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAOrderItemModal" class="btn btn-primary btnUpdate btnTable" name="update">Add Item Order</button>
                        </div>
                       <!--  <input type="" class="" value="1"  id="rowrec" hidden>
                        <input type="" class="" value=""  id="priceresult" hidden> -->

                        <div class="table-responsive p-4">
                            <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UnitID</th>
                                    <th>Item Name</th>
                                    <th class="size1" width="80px">Quantity</th>
                                    <th class="size2" width="120px">Unit</th>
                                    <th class="size2" width="120px">Price</th>
                                    <th class="size1" width="120px">Discount</th>
                                    <th class="size2" width="120px">Total</th>
                                    <th>disctype</th>
                                    <th width="80">Action</th>
                                </tr>
                            </thead>
                            </table>
                        </div>
                        <div class="p-4 pb-10">     
                            <div class="col-md-4 pr-0" style="float: right;">

                                <?php
                                  if ($get_infosummary->discount_type ==  2) {

                                    $discount_val = number_format($get_infosummary->gen_discount).'%';

                                }else{
                                    $discount_val = number_format($get_infosummary->gen_discount,2,".",",");               
                                }
                                    $total_amount_computed= general_discounted_total($get_infosummary->totalamt, $get_infosummary->freight, $get_infosummary->gen_discount, $get_infosummary->discount_type);
                                ?>
                                <!-- <?php
                                if ($get_infosummary->discount_type ==  2) {

                                    $discount_val = number_format($get_infosummary->gen_discount).'%';

                                    $total_amount_computed= number_format(($get_infosummary->totalamt + $get_infosummary->freight) - (($get_infosummary->gen_discount / 100) * $get_infosummary->totalamt),2,".",",");
                                }else{
                                    $discount_val = number_format($get_infosummary->gen_discount,2,".",",");

                                    $total_amount_computed= number_format(($get_infosummary->totalamt + $get_infosummary->freight) - ($get_infosummary->gen_discount),2,".",",");
                                }
                                ?> -->

                                <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val?></a></button>

                                <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnShip" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?php echo  number_format($get_infosummary->freight,2,".",",") ?></a></button>

                                <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">
                                Total : <?=$total_amount_computed;?></a></button>

                                <input type="" class="disc_perc" id="disc_perc" value="<?=$get_infosummary->discount_type?>" hidden>
                                <input type="" class="discount" id="discount" value="<?=$get_infosummary->gen_discount?>" hidden>
                                <input type="text" class="ship_hide" id="ship_hide" value= "<?=$get_infosummary->freight?>" hidden>
                                <input type="text" class="grandtotal_hide" id="grandtotal_hide" value= "<?=remove_format($get_infosummary->totalamt);?>" hidden>
                                <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                            </div>
                        </div>     
                            <br><br><br><br><br><br><br>
                            <label for="notes" style="padding-top: 10px;">Notes</label> 
                            <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes"><?=$get_infosummary->notes?></textarea>
                        <div hidden class="row" style="margin-top: 30px;">
                            <div class="col-md-6" style="margin-top: 13px;">
                                <div class="form-group ">
                                    <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" class="btn btn-primary btnShipping" name="update">Add Shipping</button>
                                </div>
                            </div>
                            <div class="col-md-6" style="float: right;">
                                <div class="form-group" style="float: right; margin-right: 85px;">
                                    <label class="font-weight-bold" style="margin-top: 18px;">TOTAL: </label>
                                    ??? <input disabled type="text" class="grand_total" name="grand_total" id="grand_total" value="<?=$get_infosummary->totalamt?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top: 10px;">       
                            <div class="col-md-12">       
                                <button style="float:right" class="btn btn-primary saveBtnEncode "> Save Changes</button>
                                <a href="<?=base_url('Main_sales/sales_summary/'.$token);?>" style="float:right;margin-right:10px;" class="btn btn-secondary BtnBack2"> Back</a>
                            </div>
                        </div>
                        <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="addAOrderItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewDeformModal">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add item</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">??</span></button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                        
                                <div class="col-lg-12">     
                                    <form id="addRow">
                                        <div class="col-lg-12">

                                            <!-- Itemname -->
                                            <div class="form-group row">
                                              <label class="col-md-4 form-control-label">Item<span class="" style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                 <input type="text" class="form-control so_required_fields form-control-sm col-md-12 searchSalesorder loading" name="searchSalesorder" id="searchSalesorder" placeholder="Item Name" value="" onchange="get_discount(this.value);"/>
                                                 <input type="" class="searchSalesorderCode_id w-100"  name="searchSalesorderCode_id" id="searchSalesorderCode_id" required hidden>
                                              </div>
                                            </div>
                                            <input type="hidden" value="<?=$get_sodetails->itemlocid?>" class="form-control form-control-success eitemlocid" name="eitemlocid" id="eitemlocid">
                                            <input type="text" class="form-control allownumericwithdecimal price so_required_fields form-control-sm col-md-12 price" name="price" id="price" oninput="validity.valid||(value='');" min=""  value="0" hidden>

                                            <input type="text" class="form-control unit so_required_fields form-control-sm col-md-12 unit" name="unit" id="unit" min=""  value="" hidden>
                                            <input type="text" class="form-control so_required_fields form-control-sm col-md-12 unitid" name="unitid" id="unitid" min=""  value="" hidden>
                                                        
                                            <!-- QTY -->
                                            <div class="form-group row">
                                              <label class="col-md-4 form-control-label">Quantity<span class="" style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                 <input type="text" class="form-control allownumericwithdecimal so_required_fields form-control-sm col-md-12 qty" name="qty" id="qty" oninput="validity.valid||(value='');" min="" placeholder="Quantity">
                                              </div>
                                            </div>

                                            <div class="form-group row select_disc">
                                                <label class="col-md-4 form-control-label">Discount Type</label>
                                                <div class="col-md-8">
                                                    <select class="form-control form-control-success discount_type_select" id="discount_type_select">   
                                                        <option value="">Select Discount Type</option>
                                                        <option value="1">Amount</option>
                                                        <option value="2">Percentage</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="form-group row percentage_div" style="display: none">
                                              <label class="col-md-4 form-control-label">Discount Percentage<span class="" style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                 <input class="form-control form-control-success disc w-100 allownumericwithdecimal" min="" type="number" name="disc_percent" id="disc_percent" required="" required="" placeholder="Discount Percent.." max="100">
                                              </div>
                                            </div>

                                            <div class="form-group row amount_div" style="display: none">
                                              <label class="col-md-4 form-control-label">Discount Amount<span class="" style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                 <input class="form-control form-control-success disc w-100 allownumericwithdecimal" min="" type="number" name="disc_amt" id="disc_amt" required="" required="" placeholder="Discount Amount..">
                                              </div>
                                            </div>                                                  
                                                                                         
                                        </div>
                                    </form>
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="form-group float-right">       
                                        <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-primary add_inventory_modal">Add Inventory</button>
                                    </div>
                                </div>
                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div>

<div id="AddOverallDiscount" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="exampleModalLabel" class="modal-title">Add Discount</h4>
            </div>
            <!-- <form class="form-horizontal personal-info-css" data-toggle="validator" role="form" id="forminv"> -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card-body">

                        <div class="col-lg-12">     
                            <div class="form-group row">
                                <label class="col-md-4 form-control-label">Discount Type</label>
                                <div class="col-md-8">
                                    <select class="form-control form-control-success discount_gen_type_select" id="discount_gen_type_select">   
                                    <option value="">Select Discount Type</option>
                                    <option value="1">Amount</option>
                                    <option value="2">Percentage</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row percentage_div" style="display: none;">
                                <label class="col-md-4 form-control-label">Discount Percentage<span class="" style="color:red">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control form-control-success disc w-100 allownumericwithdecimal" min="" type="number" name="disc_gen_percent" id="disc_gen_percent" required="" required="" placeholder="Discount Percent.." max="100">
                                </div>
                            </div>

                            <div class="form-group row amount_div" style="display: none;">
                                <label class="col-md-4 form-control-label">Discount Amount<span class="" style="color:red">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control form-control-success disc w-100 allownumericwithdecimal" min="" type="number" name="disc_gen_amt" id="disc_gen_amt" required=""  placeholder="Discount Amount..">
                            </div>
                            </div>  
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close" style="margin-right: 10px;">Cancel</button>
                    <button type="button" aria-label="Close" data-dismiss="modal" class="btn btn-primary btnGeneralDiscount">Add</button>     
                </div>
            </div>
        </div>
    </div>
</div>

<div id="addAShippingModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header">
              <h4 id="exampleModalLabel" class="modal-title">Add Shipping</h4>
          </div>
          <form class="form-horizontal personal-info-css" data-toggle="validator" role="form" id="forminv">
              <div class="modal-body">
                  <!-- <div class="card-header d-flex align-items-center"> -->
                      <div class="col-lg-12">
                          <div class="row">

                              <div class="form-group row col-md-12">
                                  <div class="col-12">
                                      <label class="form-control-label " type="text">Shipping Amount<span class="" style="color:red">*</span></label>
                                  </div>
                                  <div class="col-12">
                                      <input class="form-control valid_number" min="0" onkeypress="return isNumberKeyOnly(event)" type="text" id="shipping" placeholder="0.00" value="<?=$get_infosummary->freight?>">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- </div> -->

                      <div class="modal-footer">
                          <div class="form-group">
                              <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close" style="margin-right: 10px;">Cancel</button>
                              <button type="button" aria-label="Close" data-dismiss="modal" class="btn btn-primary btnassignShip">Add</button>     
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
</div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/salesorder_edit.js');?>"></script>
<script src="<?=base_url('assets/js/sales/functions.js');?>"></script>
