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
        <li class="breadcrumb-item active">Franchise Service Receipt #<?=$get_infosummary->fsrno?></li>
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
                                    <label class="form-control-label"> <span hidden class="asterisk" style="color:red;">*</span></label>

                                    <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-3">Date: </div>
                                                    <div class="col-md-9"><?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-3">Agent: </div>
                                                    <div class="col-md-9">
                                                       <?=$get_agent->description?></div>
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
                                                <th width="130">Total</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="col-md-3" style="float: right; padding-right: 0px;">
 
                                        <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;"><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total : <?php echo  number_format($get_infosummary->totalamt) ?></a></button>  

                                    </div>


                                     <br>
                                     <br>
                                     <hr>
                                     <label for="notes">Notes</label> 
                                     <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_infosummary->notes?></textarea>
                                </div>
                                <!--  -->    
                                <div class="form-group row" style="margin-top: 10px;">       
                                    <div class="col-md-12">
                                        <button style="float:right"  class="btn btn-primary printBtn"> Print Franchise Service</button>
                                  
                                    </div>
                                </div>

                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets/js/sales/fsr_view.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


