<?php 
//071318
//this code is for destroying session and page if they access restricted page

$position_access = $this->session->userdata('get_position_access');
$access_content_nav = $position_access->access_content_nav;
$arr_ = explode(', ', $access_content_nav); //string comma separated to array 
$get_url_content_db = $this->model->get_url_content_db($arr_)->result_array();

$url_content_arr = array();
foreach ($get_url_content_db as $cun) {
    $url_content_arr[] = $cun['cn_url'];
}
$content_url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/';

if (in_array($content_url, $url_content_arr) == false){
    header("location:".base_url('Main/logout'));
}    
//071318
?>
<style>

th.dt-center {
    width: 90px !important;
}

th.size1 {
    width: 90px !important;
}

th.size2 {
    width: 120px !important;
}
/* Extra Small Devices, Phones */ 
@media only screen and (min-width : 480px) {
    .select2 {
        width: calc(100%) !important;
        margin-left: 0;
      }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {
  
    .select2 {
        width: calc(100%) !important;
        margin-left: 0;
      }
}
td.dt-body-right { text-align: right; }
</style>

<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
   <div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ewallet-collapse-a" data-labelname="Purchases">

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Purchase Return</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 padding-0_mobile">
                        <div class="">
                            <div class="card-progress d-none">
                                <div class="card-header d-flex align-items-center">
                                    <div class="col-lg-12 padding-0_mobile">
                                        <div class="row">
                                            <div class="col-md-12 padding-0_mobile" style="padding-left: 0;">
                                                    <!-- <h3 class="search_label" style="text-align: right;"></h3> -->
                                                    <div class="col-md-6">
                                                    <h3 class="step_label">Step 1</h3>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <small class="form-text required_fields" style="margin-bottom: 0; margin-top: 5px;">Required fields</small>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 padding-0_mobile" style="padding-bottom: 30px;">
                                <div class="card-progress">
                                    <form class="form-horizontal encode-info-css sales_form" id="sales_form">
                                        <br>
                                        <div class="col-lg-12">
                                            <div class="step1" id="step1">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                       <div class="card h-100">
                                                        <h6 class="secondary-bg px-4 py-3 white-text">Deliver To</h6>
                                                         <div class="p-4">

                                                       <div class="form-group">
                                                        <div class="form-group">
                                                          <small class="form-text">Select Supplier </small>
                                                          <select class="form-control select2 searchSupplier" id="searchSupplier" name="searchSupplier">
                                                             <option selected></option>
                                                             <?php
                                                                foreach ($get_supplier->result() as $gsupplier) { ?>
                                                             <option value="<?=$gsupplier->id?>"><?php echo strtoupper($gsupplier->suppliername); ?> </option>
                                                             <?php } ?>
                                                             ?>                              
                                                          </select>                                                        
                                                        </div>
                                                      <div id="txtResult">
                                                      <div class="form-group">
                                                          <small class="form-text">Contact No </small>
                                                          <input type="text" class="form-control form-control-success supp_contact" name="supp_contact" id="supp_contact" disabled>
                                                      </div>
                                                          <input type="hidden" class="form-control form-control-success supp_payment" name="supp_payment" id="supp_payment">
                                                        <div class="form-group">
                                                          <small class="form-text">Mode of Payment </small>
                                                          <input type="text" class="form-control form-control-success term_credit" name="term_credit" id="term_credit" disabled>
                                                        </div>
                                                      <div class="form-group">
                                                          <small class="form-text">Outlet Address </small>
                                                          <input type="text" class="form-control form-control-success supp_address" name="supp_address" id="supp_address" disabled>
                                                      </div>
                                                          <input type="hidden" class="contact_person" name="contact_person" id="contact_person">
                                                          <input type="hidden" value="<?=$get_users->username?>" id="username" class="username" name="username">
                                                        </div>
                                                       </div>
                                                      </div>
                                                     </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                      <div class="card h-100">
                                                        <h6 class="px-4 py-3 secondary-bg white-text">Delivery Information</h6>
                                                        <div class="p-4">


                                                       <div class="form-group">
                                                          <label class="form-control-label">Purchase Order Information <span hidden class="asterisk" style="color:red;">*</span></label>
                                                          <small class="form-text">Purchase Date</small>
                                                          <input  type="text" value="<?=today_text()?>" class="form-control form-control-warning  purchase_date" id="purchase_date" name="purchase_date"/>
                                                       </div>
                                                       <div class="form-group">
                                                          <small class="form-text">Select Location </small>
                                                          <select class="form-control select2 searchAddress" id="searchAddress" name="searchAddress">
                                                             <option selected></option>
                                                             <?php
                                                                foreach ($get_warehouse->result() as $gwarehouse) { ?>
                                                             <option value="<?=$gwarehouse->id?>"><?php echo strtoupper($gwarehouse->description); ?> </option>
                                                             <?php } ?>
                                                             ?>                              
                                                          </select>
                                                       </div>

                                                  </div>
                                                 </div>
                                               </div> 
                                              </div> 
                                            </div>      
                                            <div class="step2" style="display: none;">
                                              <div class="card">
                                                <div id="showInforet" style="font-size: 15px; margin-bottom: 10px;"></div>
                                                    <div class="form-group text-right p-4" style="float: right;margin-right: 0px;top: 0px;"> 
                                                        <hr>         
                                                        <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAPurchaseItemModal" class="btn btn-primary btnUpdate btnTable" id="addpurchaseorder" name="update" >Add Item Order</button>
                                                    </div>
                                                    <div class="table-responsive p-4">
                                                        <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Item ID</th>
                                                                    <th>Item Name</th>
                                                                    <th width="80px">Quantity</th>
                                                                    <th>UnitID</th>
                                                                    <th width="80px">Unit</th>
                                                                    <th width="100px">Price</th>
                                                                    <th width="100px">Discount</th>
                                                                    <th>Discount Type</th>
                                                                    <th>Raw Total</th>
                                                                    <th width="100px">Total</th>
                                                                    <th width="80">Action</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>

                                                    <div class="p-4">
                                                        <div class="col-md-3 text-right" style="float: right; padding-right: 0px;">

                                                            <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: 0.00</a></button>

                                                            <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnShip" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: 0.00</a></button>

                                                            <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGrandtotal">Total: 0.00</a></button>

                                                            <input type="" class="gendiscount" id="gendiscount" value="0" hidden>
                                                            <input type="" class="gendiscounttype" id="gendiscounttype" value="0" hidden>
                                                            <input type="text" class="shippingamt" id="shippingamt" value="0" hidden>
                                                            <input type="text" class="totalamt" id="totalamt" value="0" hidden>

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
                                                            <label for="notes" style="margin-top: 5px">Notes</label> 
                                                            <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes"></textarea>

                                                        </div>
                                                    </div> 
                                                </div>

                                                <input type="text" class="" value="0" id="rowrec" hidden>
                                                <input type="" class="" value="" id="priceresult" hidden>

                                                <div class="step3" style="display: none;">
                                                    <div class="card p-4">
                                                        <div class="form-group" style="margin-top: 50px;">
                                                        <center><h3>You have successfully created a new Purchase Return!  <div id="showInfo" style="font-size: 15px;margin-bottom: 50px;"></div><span class="refNospan" style="color:red"></span></h3>
                                                        <button class="btn btn-primary" onclick="reloadBack()"> Add More Purchase Return</button>
                                                        <a class="btn btn-success" href="<?=base_url('Main_purchase/return_summary/'.$token);?>"> Proceed to Transaction History</a>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <button style="float: right;" id="btnSONext" class="btn btn-primary BtnNext" onclick="show_info_purchasereturn()" data-page="0">Next </button>
                                             <button hidden style="float: right;" id="BtnProceed" class="btn btn-primary BtnProceed"> Save </button>
                                             <button hidden style="float: right; margin-right:10px;" id="btnVioBack2" class="btn blue-grey BtnBack2"> Back</button>                                    
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <div id="addAPurchaseItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Item Order</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <div class="modal-body">
                    <form class="form-horizontal personal-info-css" id="add_deliverypartnerinfo-form">
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label">Item <span class="" style="color:red">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control required_fields form-control-sm col-md-12 searchInventory loading" name="searchInventory" id="searchInventory" placeholder="Item Name" value=""/>
                        </div>
                    </div>

                    <input type="" class="searchInventory_id" name="searchInventory_id" id="searchInventory_id" hidden> 
                    <input type="" class="supplierid" name="supplierid" id="supplierid" hidden>
                    <input type="text" class="form-control allownumericwithdecimal price required_fields form-control-sm col-md-12 price" name="price" id="price" min="" value="0" hidden>
                    <input type="text" class="form-control unit required_fields form-control-sm col-md-12 unit" name="unit" id="unit" min=""  value="" hidden>
                    <input type="text" class="form-control required_fields form-control-sm col-md-12 unitid" name="unitid" id="unitid" min=""  value="" hidden>

                    <div class="form-group row">
                        <label class="col-md-4 form-control-label">Quantity <span class="" style="color:red">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control valid_number qty allownumericwithoutdecimal" min='' name="qty" id="qty">
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
                                            <input class="form-control valid_number shipping allownumericwithdecimal" min="0" type="text" id="shipping" placeholder="0.00">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <div class="modal-footer">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    
                                    <button type="button" aria-label="Close" data-dismiss="modal" style="margin-right:10px;" class="btn btn-primary btnassignShip">Add</button>
                                    <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
    </div>

<?php $this->load->view('includes/footer'); ?>

<script src="<?=base_url('assets/js/purchase/purchase_return.js');?>"></script>
<script src="<?=base_url('assets/js/sales/functions.js');?>"></script>