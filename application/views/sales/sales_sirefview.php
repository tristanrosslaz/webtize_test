<style>
   .btn.disabled, .btn:disabled {
   cursor: not-allowed;
   opacity: 1;
   }
   td.dt-body-right { text-align: right; }
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales">
<!-- Page Header-->
<div class="bc-icons-2 card mb-4">
   <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
      <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
      <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/sales_invoicetran/'.$token); ?>">Sales Invoice Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
      <li class="breadcrumb-item active">Sales Invoice # <?=$get_infosummary->sino?></li>
   </ol>
</div>
<section class="tables" id = "drno_id_sec" class="drno_id_sec" name = "drno_id_sec" data-drno="<?=$get_infosummary->sino;?>" >
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <h6 class="secondary-bg px-4 py-3 white-text">Sales Invoice Information</h6>
               <div class="card-body">
                  <div class="form-group row">
                     <div class="col-md-6">
                        <label class="form-control-label">Delivery To <span hidden class="asterisk" style="color:red;">*</span></label>
                        <div class="form-group p-style">
                           <div class="row">
                              <div class="col-md-4">Customer: </div>
                              <div class="col-md-8">
                                 <h4><?php echo concatenate_name($get_edit_membermain->fname, $get_edit_membermain->mname, $get_edit_membermain->lname, $get_edit_membermain->branchname); ?></h4>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">Address: </div>
                              <div class="col-md-8">
                                 <p><?=$get_edit_membermain->address?></p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">Contact No: </div>
                              <div class="col-md-8">
                                 <p><?=$get_edit_membermain->conno?></p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">Mode of Payment: </div>
                              <div class="col-md-8">
                                 <p><?=$get_edit_credit->description?></p>
                              </div>
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
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <div class="form-group p-style">
                              <div class="table-responsive">
                                 <?php if($alloc_existed == "1") { ?>
                                 <label class="form-control-label">DR Reference</label>
                                 <?php } else { } ?>
                                 <table class="table table-hover table-hover table-striped" id="table-grid1"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                       <tr>
                                          <th>Date</th>     
                                          <th>Reference</th>  
                                          <th>Amount</th>                         
                                       </tr>
                                    </thead>
                                 </table>

                                 <table class="table table-hover table-hover table-striped" id="table-sales_return"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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
                        <input id="inputHorizontalWarning" type="hidden" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"/>
                     </div>
                  </div>
                  <input type="" class="" value="1"  id="rowrec" hidden>
                  <input type="" class="" value=""  id="priceresult" hidden>
                  <hr>
                  <br>   
                  <div class="table-responsive">
                     <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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
                  <div>
                     <div class="col-md-3" style="float: right; padding-right: 0px;">
                        <!-- <?php
                                if ($get_infosummary->discount_type ==  2) {

                                    $discount_val = number_format($get_infosummary->gen_discount).'%';

                                    $total_amount_computed= number_format(($get_infosummary->totalamt + $get_infosummary->freight) - (($get_infosummary->gen_discount / 100) * $get_infosummary->totalamt),2,".",",");
                                }else{
                                    $discount_val = number_format($get_infosummary->gen_discount,2,".",",");

                                    $total_amount_computed= number_format(($get_infosummary->totalamt + $get_infosummary->freight) - ($get_infosummary->gen_discount),2,".",",");
                                }
                                ?> -->

                                <?php
                                 if ($get_infosummary->discount_type ==  2) {

                                   $discount_val = number_format($get_infosummary->gen_discount).'%';

                               }else{
                                   $discount_val = number_format($get_infosummary->gen_discount,2,".",",");          
                               }
                                 $total_amount_computed= general_discounted_total($get_infosummary->totalamt, $get_infosummary->freight, $get_infosummary->gen_discount, $get_infosummary->discount_type);
                               ?>

                                <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val?></a></button>

                                <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnShip" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?php echo  number_format($get_infosummary->freight,2,".",",") ?></a></button>

                                <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">
                                Total : <?=$total_amount_computed;?></a></button>  
                        <input type="hidden" value= "<?=$get_infosummary->freight?>" class="form-control form-control-success shippingamt" name="shippingamt" id="shippingamt">
                        <input type="hidden" value= "<?=$get_infosummary->totalamt?>" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2">
                     </div>
                     <br><br><br><br><br><br><br><br><br>
                     <label for="notes" style="padding-top: 0px;">Notes</label> 
                     <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_infosummary->notes?></textarea>
                  </div>
                  <div hidden class="row" style="margin-top: 30px;">
                     <div class="col-md-6" style="margin-top: 13px;">
                        <div class="form-group ">
                           <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" class="btn btn-primary btnShipping" name="update">Add Shipping</button>
                           <!-- <input type="hidden" class="form-control shipping_cost" name="shipping_cost" id="shipping_cost"> -->
                           <input type="hidden" class="form-control grand_total3" value="<?=$get_infosummary->totalamt?>" name="grand_total3" id="grand_total3">
                           <input type="text" id="shipping_cost1" name="shipping_cost1" value="<?=$get_infosummary->freight?>" class="shipping_cost1" readonly="readonly" />
                           <input type="hidden" class="form-control grand_total1" value="<?=$get_infosummary->totalamt?>" name="grand_total1" id="grand_total1">
                        </div>
                     </div>
                     <div class="col-md-6" style="float: right;">
                        <div class="form-group" style="float: right; margin-right: 85px;">
                           <label class="font-weight-bold" style="margin-top: 18px;">TOTAL: </label>
                           ??? <input disabled type="text" class="grand_total" name="grand_total" id="grand_total" value="<?=$get_infosummary->totalamt?>">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_sirefview.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>