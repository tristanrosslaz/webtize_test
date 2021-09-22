<style>
   .easy-autocomplete.eac-square {
        width: 500px !important;
   }

   input#grand_total{
       border: none transparent;
       outline: none;
       background-color: #ffff;
   }

   input#shipping_cost1{
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
   }

   .easy-autocomplete.eac-square input {
        border: 1px solid #e6e6e6; 
        border-radius: 0;
        color: #7f8c8d;
        font-family: inherit;
        font-size: 18px;
        font-style: italic;
        font-weight: 300;
        margin: 0;
        min-width: 564px;
        padding: 12px 43px 12px 15px;
    }

</style>

   <div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ewallet-collapse-a" data-labelname="Sales Order">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Sales Order</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active">Sales</li>
            <li class="breadcrumb-item active">Sales Order</li>
        </div>
    </ul>

     <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-progress">
                                <div class="card-header d-flex align-items-center">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                    <h3 class="search_label" style="text-align: right;"></h3>
                                                    <h3 class="step_label">Sales Order Form 1</h3>
                                                   <!--  <div class="progress" style="margin-top: 10px;">
                                                        
                                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 33.3%;  height: 25px; transition:none;"></div>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" style="padding-bottom: 30px;">
                                <div class="card-progress">
                                    <form class="form-horizontal encode-info-css sales_form" id="sales_form">
                                    <!-- <form id="reload-form" class="formViolator">  -->
                                        <br>
                                        <div class="col-lg-12">
                                            <div class="step1" id="step1">
                                                <!-- <h3 class="step1_label">Select Ticket/s to pay</h3>
                                                <p class="totalamt_p">Total Amount: <span class="totalamt_span">₱ 0.00</span></p> -->

                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                       <label class="form-control-label">Deliver To</label>
                                                       <div class="form-group">
                                                        <div class="form-group">
                                                          <small class="form-text">Select Customer</small>
                                                          <input required id="searchCustomer" type="text" class="form-control form-control-success searchCustomer" name="searchCustomer">
                                                           <input type="hidden" class="branchname" name="branchname" id="branchname">
                                                            <input type="hidden" class="name_only" name="name_only" id="name_only">
                                                        </div>
                                                          <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                                          <div class="form-group">
                                                          <small class="form-text">Address</small>
                                                          <input type="text" class="form-control form-control-success address" name="address" id="address">
                                                      </div>
                                                      <div class="form-group">
                                                          <small class="form-text">Contact No</small>
                                                          <input type="text" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                                      </div>
                                                          <input type="hidden" value="" class="form-control form-control-success mode_payment" name="mode_payment" id="mode_payment" >
                                                        <div class="form-group">
                                                          <small class="form-text">Mode of Payment</small>
                                                          <input type="text" value="" class="form-control form-control-success term_credit" name="term_credit" id="term_credit">
                                                        </div>
                                                          <input type="hidden" value="" class="form-control form-control-success idno" name="idno" id="idno">
                                                          <input type="hidden" value="" class="form-control form-control-success franchise_id" name="franchise_id" id="franchise_id">
                                                          <input type="text" class="form-control form-control-success ishold" name="ishold" id="ishold">
                                                          
                                                          <input type="hidden" value="<?=$get_users->username?>" id="username" class="username" name="username">
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                       <div class="form-group">
                                                          <label class="form-control-label">Delivery Information <span hidden class="asterisk" style="color:red;">*</span></label>
                                                          <small class="form-text">Date</small>
                                                          <input  type="text" value="<?php echo date("m/d/y"); ?>" class="form-control form-control-warning datepicker sales_date" id="sales_date" name="sales_date"/>
                                                       </div>
                                                       <div class="form-group">
                                                          <small class="form-text">Shipping</small>
                                                          <select class="form-control select2 shipping_id" id="shipping_id" name="shipping_id">
                                                             <option selected>Select Shipping</option>
                                                             <?php
                                                                foreach ($get_shipping->result() as $gshipping) { ?>
                                                             <option value="<?=$gshipping->shipping_id?>"><?=$gshipping->description?></option>
                                                             <?php } ?>
                                                             ?>                              
                                                          </select>
                                                       </div>
                                                       <div class="form-group">
                                                          <small class="form-text">Location</small>
                                                          <select class="form-control select2 location_id" id="location_id" name="location_id">
                                                             <option selected>Select Location</option>
                                                             <?php
                                                                foreach ($get_location->result() as $glocation) { ?>
                                                             <option value="<?=$glocation->location_id?>"><?=$glocation->description?></option>
                                                             <?php } ?>
                                                             ?>                      
                                                          </select>
                                                       </div>
                                                    </div>
                                                 </div>
                                            </div>      
                                            <!-- //end of choose payment transaction -->
                                            <div class="step2" style="display: none;">
                                                <div id="showInfo" style="font-size: 15px; margin-bottom: 30px;"></div>
                                                <div class="form-group row" style="float: right;margin-right: 0px;top:20px;">         
                                                    <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAOrderItemModal" class="btn btn-primary btnUpdate btnTable" id="addsalesorder" name="update" disabled >Add Sales Order</button>
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
                                                 </div>
                                                 <!--                      <div class="form-group row" style="margin-top: 30px;">
                                                    <label class="col-md-1 form-control-label" style="margin-top: 18px;">Shipping</label>
                                                    <div class="col-md-4">
                                                       <input type="number" value="" class="form-control shipping" name="shipping" id="shipping">
                                                    </div>
                                                    <label class="col-md-1 font-weight-bold" style="margin-top: 18px;">TOTAL</label>
                                                    <div class="col-md-4">
                                                       <input type="text" class="form-control grand_total" name="grand_total" id="grand_total">
                                                       <input type="hidden" class="form-control grand_total1" name="grand_total1" id="grand_total1">
                                                    </div>
                                                    </div> -->
                                                 <div class="row" style="margin-top: 30px;">
                                                    <div class="col-md-6" style="margin-top: 13px;">
                                                       <div class="form-group ">
                                                          <!--  <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" class="btn btn-primary btnShipping" name="update">Add Shipping</button> -->
                                                         <!--  <input type="text" class="form-control shipping_cost" name="shipping_cost" id="shipping_cost"> -->

                                                          <input type="hidden" class="form-control grand_total3" name="grand_total3" id="grand_total3">

                                                          Add Shipping: <input type="number" min="1" oninput="validity.valid||(value='');" id="shipping_cost1" name="shipping_cost1" class="shipping_cost1" disabled />

                                                          <input type="hidden" class="form-control grand_total1" name="grand_total1" id="grand_total1">



                                                          <input type="button" name="Sumbit" class="btn btn-primary addShipping" name="addShipping" id="addShipping" value="Add to Total Amount" onclick="javascript:addNumbers()" disabled />
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6" style="float: right;">
                                                       <div class="form-group" style="float: right; margin-right: 85px;">
                                                          <label class="font-weight-bold" style="margin-top: 18px;">TOTAL: </label>
                                                          ₱ <input disabled type="text" class=" grand_total" name="grand_total" id="grand_total">
                                                          <!--  <input type="text" class="form-control grand_total1" name="grand_total1" id="grand_total1"> -->
                                                          <!--  <p class="form-control grand_total1" name="grand_total1" id="grand_total1"></p> -->
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <div class="form-group" style="margin-top: 30px;">
                                                    <label for="notes">Notes</label> 
                                                    <div class="col-md-12">
                                                       <input type="text" class="form-control c_notes" id="c_notes" name="c_notes" disabled>
                                                    </div>
                                                 </div>
                                            </div>

                                            <div class="step3" style="display: none;">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="alert alert-success" role="alert">
                                                            <div class="form-group">
                                                                <br><br>
                                                               <label for="reload-notes" class="label-material"><h3>You have succefully save information <span class="refNospan" style="color:red"></span></h3>
                                                                <br>
                                                                
                                                               </label>
                                                               <button hidden style="float: right; margin-right:10px;" id="BtnForm1" class="btn btn-danger BtnForm1" onclick="reloadBack()"><i class="fa fa-plus" aria-hidden="true"></i> Add More Sales Order</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <button style="float: right;" id="btnSONext" class="btn btn-primary BtnNext" onclick="example_append()" data-page="0">Next <i class="fa fa-arrow-right" aria-hidden="true" ></i></button>


                                             <button hidden style="float: right;" id="BtnProceed" class="btn btn-primary BtnProceed">Proceed <i class="fa fa-arrow-right" aria-hidden="true"></i></button>

                                             <button hidden style="float: right; margin-right:10px;" id="btnVioBack2" class="btn btn-danger BtnBack2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>

                                             
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            
                </div>
            </div>
        </div>
    </section>

<div id="addAOrderItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
   <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Add Item Order</h4>
            <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
         </div>
         <div class="modal-body">
            <form class="form-horizontal personal-info-css" id="add_deliverypartnerinfo-form">
               <div class="form-group row">
                  <label class="col-md-3 form-control-label">Search Code <span class="asterisk" style="color:red">*</span></label>
                  <div class="col-md-6">
                     <input id="searchSalesorder" type="text" class="form-control form-control-success searchSalesorder" value="" name="searchSalesorder">
                     <input type="hidden" class="searchSalesorderCode_id" name="searchSalesorderCode_id" id="searchSalesorderCode_id"> 
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-3 form-control-label">Quantity <span class="asterisk" style="color:red">*</span></label>
                  <div class="col-md-6">
                     <input type="number" class="form-control qty" min='1' oninput="validity.valid||(value='');" name="qty" id="qty">
                  </div>
               </div>
               <div class="modal-footer">
                  <div class="form-group row">
                     <div class="col-md-12">
                        <button class="btn btn-primary addSalesOrderEncodeBtn" type="button">Add</button>
                        <button type="button" style="float:right; margin-left:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div id="addAShippingModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
   <div role="document" class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Add Shipping Amount</h4>
            <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
         </div>
         <form class="form-horizontal personal-info-css" id="addshippingcost-form">
            <div class="modal-body">
               <div class="">
                  <div class="row">
                     <div class="col-lg-12">
                        <input type="text" class="form-control shipping_cost" name="shipping_cost" id="shipping_cost">
                        <input type="hidden" class="form-control grand_total2" name="grand_total2" id="grand_total2">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <div class="form-group row">
                  <div class="col-md-12">
                     <button type="submit" style="float:right" onclick="myFunction()" class="btn btn-primary addShippingCostBtn">Update Total</button>
                     <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<?php $this->load->view('includes/footer'); ?>

<script src="<?=base_url('assets/js/sales/sales_order_form.js');?>"></script>

<script type="text/javascript">
   function addNumbers()
       {
               var val1 = parseInt(document.getElementById("shipping_cost1").value);
               var val2 = parseInt(document.getElementById("grand_total1").value);
               var totalcost = val1 + val2;
               $("#grand_total").val(totalcost + '.00');

               $("#grand_total1").val(totalcost);

       }
   $(window).load(function(){
   $('#shipping_cost1').change(function() {
       $('#shipping_cost').val($(this).val());
   });
   });

function reloadBack() {
    location.reload();
}

$('.searchCustomer', '.address').each(function() {
    var default_value = this.value;
    $(this).focus(function() {
        if(this.value == default_value) {
            this.value = '';
        }
    });
    $(this).blur(function() {
        if(this.value == '') {
            this.value = default_value;
        }
    });
});

function example_append() {
    var list = "";
                  //  var reslen = res.length;

                        list += '<h4><i> '+ $('#name_only').val() + '</i></h4>';
                        list += '<b>Date of Delivery:</b>   ' + $('#sales_date').val() + '<br />';
                        list += '<b>Branch:</b>   '+ $('#branchname').val() + '<br />';
                        list += '<b>Mode of Payment</b>   ' + $('#term_credit').val() + '<br />';
                        list += '<b>Contact#:</b>   '+ $('#contact_no').val() + '<br />';
                        list += '<b>Address:</b>   '+ $('#address').val() + '<br />';

                    $("#showInfo").html(list);
}


</script>