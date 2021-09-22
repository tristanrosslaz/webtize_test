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
/* Extra Small Devices, Phones */ 

th.dt-center {
  width: 90px !important;
}

th.size1 {
  width: 90px !important;
}

th.size2 {
  width: 120px !important;
}

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
      <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
      <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
      <li class="breadcrumb-item active">Purchase Order</li>
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
      <div class="col-lg-12 padding-0_mobile">
        <div class="step1" id="step1">
          <div class="form-group row">
            <div class="col-md-6">
              <div class="card h-100">
                <h6 class="secondary-bg px-4 py-3 white-text">Deliver To</h6>
                <div class="p-4">


                  <div class="form-group">
                    <div class="alert alert-warning notif_changecustomer" id="notif_changecustomer" hidden>NOTE: Remove item added before select enable</div>
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
<div class="col-md-6">
    <div class="card h-100">
      <h6 class="px-4 py-3 secondary-bg white-text">Delivery Information</h6>
      <div class="p-4">

         <div class="form-group">
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
      <h6 class="secondary-bg px-4 py-3 white-text">Purchase Order Information</h6>
      <div class="p-4" id="showInfo" style="font-size: 15px; margin-bottom: 10px;"></div>

      <div class="form-group text-right p-4" style="float: right;margin-right: 0px;top:0px;">  
        <hr>      
        <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAOrderItemModal" class="btn btn-primary btnUpdate btnTable" id="addpurchaseorder" name="update" >Add Item Order</button>
    </div>

    <div class="table-responsive p-4">
        <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
           <thead>
              <tr>
                <th>ID</th>
                <th>UnitID</th>
                <th>Item Name</th>
                <th class="size1" width="80px">Quantity</th>
                <th class="size2" width="120px">Unit</th>
                <th class="size2" width="120px">Price</th>
                <th class="size1" >Discount</th>
                <th class="size2" width="120px">Total</th>
                <th>disctype</th>
                <th width="80">Action</th>
            </tr>
        </thead>
    </table>
</div>  

<div class="p-4 pb-10">     
  <div class="col-md-4 pr-0" style="float: right;">

    <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled="disabled"><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: 0.00</a></button>

    <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnShip" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled="disabled"><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: 0.00</a></button>

    <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total: 0.00</a></button>

    <input type="" class="disc_perc" id="disc_perc" value="0" hidden>
    <input type="" class="discount" id="discount" value="0" hidden>
    <input type="text" class="ship_hide" id="ship_hide" value="0" hidden>
    <input type="text" class="grandtotal_hide" id="grandtotal_hide" value="0" hidden>
</div>
</div> 
<div class="p-4 pb-10"> 
  <label for="notes">Notes</label> 
  <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes"></textarea>
</div>

                                                 <!-- <input type="text" class="" value="0"  id="rowrec" hidden>
                                                  <input type="" class="" value=""  id="priceresult" hidden> -->

                                              </div>
                                          </div> <!-- End step 2 -->
                                          <div class="step3" style="display: none;">
                                            <div class="card p-4">
                                              <div class="form-group" style="margin-top: 50px;">
                                                 <center><h3>You have successfully created a new Purchase Order!  <div id="showInfo" style="font-size: 15px;margin-bottom: 50px;"></div><span class="refNospan" style="color:red"></span></h3>
                                                   <button class="btn btn-primary" onclick="reloadBack()"> Add More Purchase Order</button>
                                                   <a class="btn btn-danger" href="<?=base_url('Main_purchase/po_transaction_history/'.$token);?>"> Proceed to Transaction History</a>
                                               </center>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-lg-12" style="margin-top: 20px;">
                                      <button style="float: right;" id="btnSONext" class="btn btn-primary BtnNext" onclick="show_info_supplier()" data-page="0">Next </button>

                                      <button hidden style="float: right;" id="BtnProceed" class="btn btn-primary BtnProceed"> Save </button>

                                      <button hidden style="float: right;" id="btnVioBack2" class="btn blue-grey BtnBack2"> Back</button> 

                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

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

<div id="addAOrderItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewDeformModal">
    <div role="document" class="modal-dialog modal-md modal-md-custom">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Add item</h4>
          <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
      </div>
      <form id="addRow">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-body">

                  <div class="col-lg-12">     

                    <div class="col-lg-12">

                      <!-- Itemname -->
                      <div class="form-group row">
                        <label class="col-md-4 form-control-label">Item<span class="" style="color:red">*</span></label>
                        <div class="col-md-8">
                           <input type="text" class="form-control required_fields form-control-sm col-md-12 searchSalesorder loading" name="searchSalesorder" id="searchSalesorder" placeholder="Item Name" value=""/>

                           <input type="" class="searchInventory_id" name="searchInventory_id" id="searchInventory_id" hidden> 
                           <input type="" class="supplierid" name="supplierid" id="supplierid" hidden>

                           <!-- <input type="" class="searchSalesorderCode_id w-100"  name="searchSalesorderCode_id" id="searchSalesorderCode_id" required> -->
                       </div>
                   </div>

                   <!-- Itemname -->
                   <div class="form-group row price_div" id="price_div" hidden>
                      <label class="col-md-4 form-control-label">Price<span class="" style="color:red">*</span></label>
                      <div class="col-md-8">
                         <input type="text" class="form-control allownumericwithdecimal price required_fields form-control-sm col-md-12 price" name="price" id="price" oninput="validity.valid||(value='');" min=""  value="0" hidden>
                     </div>
                 </div>

                 <input type="text" class="form-control unit required_fields form-control-sm col-md-12 unit" name="unit" id="unit" min=""  value="" hidden>
                 <input type="text" class="form-control required_fields form-control-sm col-md-12 unitid" name="unitid" id="unitid" min=""  value="" hidden>

                 <!-- QTY -->
                 <div class="form-group row">
                    <label class="col-md-4 form-control-label">Quantity<span class="" style="color:red">*</span></label>
                    <div class="col-md-8">
                       <input type="text" class="form-control allownumericwithdecimal required_fields form-control-sm col-md-12 qty" name="qty" id="qty" oninput="validity.valid||(value='');" min="" placeholder="Quantity">
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

</div> <!-- card body -->   
</div>
</div>
</div> <!-- modal body -->
<div class="modal-footer">
    <div class="form-group float-right">       
      <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
      <span style="margin: 5px;"></span>
      <button type="button" class="btn btn-primary add_inventory_modal">Add Inventory</button>
  </div>
</div>
</form>
</div> <!-- modal content -->
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
                    <input class="form-control valid_number allownumericwithdecimal" min="0" type="text" id="shipping" placeholder="0.00" value="0">
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

<script src="<?=base_url('assets/js/purchase/purchase_order.js');?>"></script>
<script src="<?=base_url('assets/js/sales/functions.js');?>"></script>