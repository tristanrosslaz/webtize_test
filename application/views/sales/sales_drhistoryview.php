<style>
  .btn.disabled, .btn:disabled {
      cursor: not-allowed;
      opacity: 1;
  }
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/sales_drtran/'.$token);?>">Delivery Receipt Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Delivery Receipt # <?=$getSummary->drno?></li>
        </ol>
    </div>
    
    <section class="tables" id = "drno_id_sec" class="drno_id_sec" name = "drno_id_sec" data-drno="<?=$getSummary->drno?>">
        <input type="hidden" name="hdnTokken" id="hdnTokken" class="hdnTokken" value="<?=$token?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Delivery Receipt Information</h6>
                       <div class="card-body">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label">Delivery To <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Customer: </div>
                                                    <div class="col-md-8"><h4><?=concatenate_name($getSummary->fname, $getSummary->mname, $getSummary->lname, $getSummary->branchname)?></h4></div>
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
                                                    <div class="col-md-4">Contact No: </div>
                                                    <div class="col-md-8"><p><?=$getSummary->conno?></p></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Address: </div>
                                                    <div class="col-md-8"><p><?=$getSummary->address?></p></div>
                                                  </div>

                                                  <!-- HIDDEN FIELDS -->
                                                    <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                                    <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                                    <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                                    <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                                    <input type="hidden" value="<?=$getSummary->pricecat?>" class="form-control form-control-success pricecat" name="pricecat" id="pricecat">
                                                    <input type="hidden" class="form-control form-control-success mode_payment" name="mode_payment" id="mode_payment" value="">
                                                    <input disabled type="hidden" class="form-control form-control-success term_credit" name="term_credit" id="term_credit" value="<?=$getSummary->mop?>">
                                                    <input type="hidden" value="<?=$getSummary->idno?>" class="form-control form-control-success idno" name="idno" id="idno">
                                                    <input type="hidden" class="form-control form-control-success franchise_id" name="franchise_id" id="franchise_id" value="<?=$getSummary->franchiseid?>">
                                                    <input type="hidden" value="<?=$get_users->username?>" id="username" class="username" name="username">
                                            </div>
                                    </div>

 

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-control-label">Delivery Information <span hidden class="asterisk" style="color:red;">*</span></label>

                                    <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Delivery Date: </div>
                                                    <div class="col-md-8"><?php if(!empty($getSummary)){ echo date_format(date_create($getSummary->trandate),"m/d/Y");}?></div>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-4">Shipping: </div>
                                                    <div class="col-md-8"><p>
                                                       <?php  echo $getSummary->shipping ?>
                                                     </p>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Location:</div>
                                                    <div class="col-md-8"><p>
                                                      <?php  echo $getLocation->location ?>
                                                    </p></div>
                                                  </div>
                                                     </div>
                                                      <p>Packing:</p>
                                                         <table class="table">
                                                            <thead>
                                                              <tr>
                                                                <th>Dry Bag</th>
                                                                <th>Dry Box</th>
                                                                <th>Perish Bag</th>
                                                                <th>Perish Box</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>
                                                                <?php  if(empty($getSummary->drybox)){
                                                                  echo 'none';
                                                                }else{
                                                                  echo $getSummary->drybox;
                                                                } ?></td>

                                                                 <td>
                                                                <?php  if(empty($getSummary->drybag)){
                                                                  echo 'none';
                                                                }else{
                                                                  echo $getSummary->drybag;
                                                                } ?></td>

                                                                 <td>
                                                                <?php  if(empty($getSummary->pershbox)){
                                                                  echo 'none';
                                                                }else{
                                                                  echo $getSummary->pershbox;
                                                                } ?></td>

                                                                 <td>
                                                                <?php  if(empty($getSummary->pershbag)){
                                                                  echo 'none';
                                                                }else{
                                                                  echo $getSummary->pershbag;
                                                                } ?></td>
      
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                      </div>                  
                                        <input id="inputHorizontalWarning" type="hidden" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($getSummary)){ echo date_format(date_create($getSummary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"/>
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
                                <br>
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
                                          
                                          <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled="disabled"><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val;?></a></button>

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
                                     <label for="notes" style="padding-top: 0px">Notes</label> 
                                     <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$getSummary->notes?></textarea>

                                </div>
                                <div hidden class="row" style="margin-top: 30px;">
                                                    <div class="col-md-6" style="margin-top: 13px;">
                                                       <div class="form-group ">
                                                          <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" class="btn btn-primary btnShipping" name="update">Add Shipping</button>
                                                          <input type="hidden" class="form-control grand_total3" value="<?=$getSummary->totalamt?>" name="grand_total3" id="grand_total3">
                                                          <input type="text" id="shipping_cost1" name="shipping_cost1" value="<?=$getSummary->freight?>" class="shipping_cost1" readonly="readonly" />
                                                          <input type="hidden" class="form-control grand_total1" value="<?=$getSummary->totalamt?>" name="grand_total1" id="grand_total1">
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6" style="float: right;">
                                                       <div class="form-group" style="float: right; margin-right: 85px;">
                                                          <label class="font-weight-bold" style="margin-top: 18px;">TOTAL: </label>
                                                          ??? <input disabled type="text" class="grand_total" name="grand_total" id="grand_total" value="<?=$getSummary->totalamt?>">
                                                       </div>
                                                    </div>
                                                 </div>
        
                                <div class="form-group row" style="margin-top: 10px;">       
                                    <div class="col-md-12">
                                        <button style="float:right"  class="btn btn-primary printBtn"> Print Delivery Receipt</button>
                                    </div>
                                </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_viewdr.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


