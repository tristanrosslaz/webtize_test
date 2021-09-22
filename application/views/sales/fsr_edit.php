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
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Franchise Service Receipt # <?=$get_infosummary->fsrno?></li>
        </ol>
    </div>
    
    <section class="tables" id = "fsrno_id_sec" class="fsrno_id_sec" name = "fsrno_id_sec" data-fsrno="<?=$get_infosummary->fsrno;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Franchise Service Receipt Information</h6>
                       <div class="card-body">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Customer: </div>
                                                    <div class="col-md-8"><h4><?php echo $get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname?></h4></div>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-4">Branch: </div>
                                                    <div class="col-md-8"><p><?php echo $get_edit_membermain->branchname?></p></div>
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
                                            </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>

                                    <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-3">Date: </div>
                                                    <div class="col-md-9"><h4><?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?></h4></div>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-3">Agent: </div>
                                                    <div class="col-md-9"><p>
                                                       <?php  echo $get_agent; ?>
                                                    </p></div>
                                                  </div>

                                                
                                                
                                      </div>
                                      </div>                  
                                        <input id="inputHorizontalWarning" type="hidden" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"/>
                                </div>
                              </div>
                              <hr>
                                <div class="form-group row" style="float: right;margin-right: 0px;top:20px;">                         
                                  <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAOrderItemModal" class="btn btn-primary btnUpdate btnTable" name="update" onclick="clearFields();" >Add Service</button>
                                 </div>
                                   <input type="" class="" value="1"  id="rowrec" hidden>
                                   <input type="" class="" value=""  id="priceresult" hidden>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                 
                                                <th>Item Name</th>
                                                <th width="130">Quantity</th>
                                                <th width="130">Unit</th>
                                                <th width="130">Price</th>
                                                <th width="130">Total</th>
                                                <th width="80">Action</th>

                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="col-md-3" style="float: right; padding-right: 0px;">
                                     <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total : <?php echo  number_format($get_infosummary->totalamt,2,".",",") ?></a></button>   

                                    </div>
                                    <br>
                                    <br>
                                    <hr>
                                     <label for="notes">Notes</label> 
                                     <input type="hidden" value= "<?=$get_infosummary->totalamt?>" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2">
                                     <input type="hidden" class="form-control grand_total3" value="<?=$get_infosummary->totalamt?>" name="grand_total3" id="grand_total3">
                                          <input type="hidden" class="form-control grand_total1" value="<?=$get_infosummary->totalamt?>" name="grand_total1" id="grand_total1">
                                                 <input type="hidden" value= "<?=$get_infosummary->totalamt?>" class="form-control form-control-success item_total" name="item_total" id="item_total" >

                                     <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes"><?=$get_infosummary->notes?></textarea>

                                </div>         
                                <div class="form-group row" style="margin-top: 10px;">       
                                    <div class="col-md-12">       
                                        <button style="float:right" class="btn btn-primary saveBtnEncode "> Save Changes</button>
                                         <a href="<?=base_url('Main_sales/fran_service_history/'.$token);?>" style="float:right;margin-right:10px;" class="btn blue-grey BtnBack2"> Back</a>
                                    </div>
                                </div>
                                <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
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
            <h4 id="exampleModalLabel" class="modal-title">Add Service</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal personal-info-css" id="add_deliverypartnerinfo-form">
              <div class="form-group row">
                <label class="col-md-3 form-control-label">Search Code <span class="" style="color:red">*</span></label>
                <div class="col-md col-12">
                  <input id="searchSalesorder" type="text" class="form-control form-control-success searchSalesorder" name="searchSalesorder" value="">
                  <input type="hidden" class="searchSalesorderCode_id" name="searchSalesorderCode_id" id="searchSalesorderCode_id" required>
                  <input type="hidden" class="orig_price" name="orig_price" id="orig_price" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 form-control-label">Price <span class="" style="color:red">*</span></label>
                <div class="col">
                  <input type="" class="form-control fsr_price valid_number" min="0" onkeypress="return isNumberKeyOnly(event)" name="fsr_price" id="fsr_price" required="" disabled="disabled" autofocus>
                </div>
                <div class="col-auto">
                  <button class="btn btn-primary" id="enable">Change</button>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 form-control-label">Quantity <span class="" style="color:red">*</span></label>
                <div class="col-md col-12">
                  <input class="form-control form-control-success valid_number qty" min="" type="text" name="qty" id="qty" oninput="validity.valid||(value='');" required="required">
                </div>
              </div>
              <div class="modal-footer">
                <div class="form-group row"> 
                  <button type="button" style="margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                  <button class="btn btn-primary addSalesOrderEncodeBtn" data-dismiss="modal" aria-label="Close" type="button">Add</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/fsr_edit.js');?>"></script>
<script src="<?=base_url('assets/js/sales/functions.js');?>"></script>
