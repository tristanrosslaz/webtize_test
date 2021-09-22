<style>
   .btn.disabled, .btn:disabled {
    cursor: not-allowed;
    opacity: 1;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Delivery Receipt #<?=$get_infosummary->drno?></h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
          <li class="breadcrumb-item"><a href="<?=base_url('Main/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item active"><a href="<?=base_url('Main_sales/sales_home/'.$token);?>">Sales</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_sales/salesreturn_summary/'.$token);?>">Transaction History</a></li>
        <li class="breadcrumb-item active">Direct Sales</li>
        </div>
    </ul>
    
    <section class="tables" id = "drno_id_sec" class="drno_id_sec" name = "drno_id_sec" data-drno="<?=$get_infosummary->drno;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                                <div class="col-md-12 ">
                                    <div class="col-md-6">
                                    <!-- <h4 style="float: left;">Delivery Receipt #<?=$get_infosummary->drno?></h4> -->
                                  </div>
                            </div>
                            </div>
                       <div class="card-body">
                            <!-- <form class="form-horizontal encode-info-css encode_form" id="encode_form"> -->
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label">Returned by <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Customer: </div>
                                                    <div class="col-md-8"><h4><?php echo $get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname?></h4></div>
                                                  </div>
                                                  
                                                  <div class="row">
                                                    <div class="col-md-4">Branch: </div>
                                                    <div class="col-md-8"><p><?=$get_edit_credit->branchname?></p></div>
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
                                                    <div class="col-md-4">Outlet Address: </div>
                                                    <div class="col-md-8"><p><?=$get_edit_membermain->address?></p></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Ship via: </div>
                                                      <div class="col-md-8"><p><select disabled class="form-control select2 shipping_id select2-hidden-accessible" id="shipping_id" name="shipping_id">
                                                        <option selected>Select Shipping</option>
                                                        <?php foreach ($get_shipping->result() as $gshipping) { ?>
                                                                
                                                                <?php if ($get_infosummary->shipping == $gshipping->id) { ?>
                                                                        <option selected value="<?=$gshipping->id?>"><?=$gshipping->description?></option>
                                                                    <?php }else{ ?>
                                                                        <option value="<?=$gshipping->id?>"><?=$gshipping->description?></option>
                                                            <?php } } ?>                           
                                                        </select>
                                                      </p>
                                                    </div>
                                        
                                                    </div>
                                                  <!-- HIDDEN FIELDS -->
                                                    <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                                    <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                                    <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                                    <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                                    <input type="hidden" value="<?=$get_edit_membermain->pricecat?>" class="form-control form-control-success pricecat" name="pricecat" id="pricecat">
                                                    <!-- <input type="hidden" value="" class="form-control form-control-success term_credit" name="term_credit" id="term_credit"> -->
                                                    <input type="hidden" class="form-control form-control-success mode_payment" name="mode_payment" id="mode_payment" value="">
                                                    <input disabled type="hidden" class="form-control form-control-success term_credit" name="term_credit" id="term_credit" value="<?=$get_edit_credit->description?>">
                                                    <input type="hidden" value="<?=$get_edit_membermain->idno?>" class="form-control form-control-success idno" name="idno" id="idno">
                                                    <input type="hidden" class="form-control form-control-success franchise_id" name="franchise_id" id="franchise_id" value="<?=$get_edit_membermain->franchiseid?>">
                                                    <input type="hidden" value="<?=$get_users->username?>" id="username" class="username" name="username">
                                                    <input type="hidden" value="<?=$get_infosummary->drno?>" id="drno" class="drno" name="drno">
                                            </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                  

                                    <div class="form-group p-style">

                                                  <table class="table table-striped table-hover table-bordered" id="table-drsales"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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
                                        <input id="inputHorizontalWarning" type="hidden" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"/>
                                    </div>
                              </div>
                                   <input type="" class="" value="1"  id="rowrec" hidden>
                                   <input type="" class="" value=""  id="priceresult" hidden>


                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                 
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Price</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                    </table>

                                     <button type="button" class="btn btn-default col-md-12 btnShipping" id="btnShipping" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" disabled="">Shipping: <?php echo  number_format($get_infosummary->freight,2,".",",") ?></button>
                                                  <input type="hidden" value= "<?=$get_infosummary->freight?>" class="form-control form-control-success shippingamt" name="shippingamt" id="shippingamt">
                                                 <button class="btn btn-warning btnGrand col-md-12 grand_total disabled" id="grand_total" name="grand_total">Total : <?php echo  number_format($get_infosummary->totalamt,2,".",",") ?></button>
                                                 <input type="hidden" value= "<?=$get_infosummary->totalamt?>" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2">

                                     <br>
                                     <br>
                                     <label for="notes">Notes</label> 
                                     <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_infosummary->notes?></textarea>

                                </div>
                                <div hidden class="row" style="margin-top: 30px;">
                                                    <div class="col-md-6" style="margin-top: 13px;">
                                                       <div class="form-group ">
                                                          <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" class="btn btn-primary btnShipping" name="update">Add Shipping</button>
                                                          <input type="hidden" class="form-control grand_total3" value="<?=$get_infosummary->totalamt?>" name="grand_total3" id="grand_total3">
                                                          <input type="text" id="shipping_cost1" name="shipping_cost1" value="<?=$get_infosummary->freight?>" class="shipping_cost1" readonly="readonly" />
                                                          <input type="hidden" class="form-control grand_total1" value="<?=$get_infosummary->totalamt?>" name="grand_total1" id="grand_total1">
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6" style="float: right;">
                                                       <div class="form-group" style="float: right; margin-right: 85px;">
                                                          <label class="font-weight-bold" style="margin-top: 18px;">TOTAL: </label>
                                                          ₱ <input disabled type="text" class="grand_total" name="grand_total" id="grand_total" value="<?=$get_infosummary->totalamt?>">
                                                       </div>
                                                    </div>
                                                 </div>
                                <div class="form-group" style="margin-top: 30px;">
                                <div class="col-md-12">
                                    </div>  
                                </div>          
                               <div class="form-group row" style="margin-top: 30px;">       
                                    <div class="col-md-12">
                                        <button style="float:right"  class="btn btn-primary printBtn"><i class="fa fa-print" aria-hidden="true" ></i> Print Delivery Receipt</button>

                                         <a href="<?=base_url('Main_sales/sales_dr/'.$token);?>" style="float:right;margin-right:10px;" class="btn btn-danger BtnBack2"><i class="fa fa-arrow-left" aria-hidden="true" ></i> Back</a>
                                    </div>
                                </div>
                          <!--   </form> -->
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets/js/sales/directsales_view.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


