<style>
body, html {
margin-top:0px;
padding-top:0px;
}
.card-header.d-flex.align-items-center>.col-md-12{
  padding-left: 0px !important;
}

</style>

<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">FSR Collection Transaction History</li>
        </ol>
    </div>
    <!-- Page Header-->
    <!-- <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Collection #<?=$get_infosummary->id?></h2>
        </div>
    </header> -->
    <!-- Breadcrumb-->
    <section class="tables" id = "fsrcollection_id_sec" class="fsrcollection_id_sec" name = "fsrcollection_id_sec" data-id="<?=$get_infosummary->id;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="card-body">
                            <!-- <form class="form-horizontal encode-info-css encode_form" id="encode_form"> -->
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label returnedby">Customer Information <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Customer: </div>
                                                    <div class="col-md-8"><h4><?php echo $get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname?></h4></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Date: </div><div class="col-md-8"><?php echo $get_infosummary->trandate?></div>
                                                   </div>
                                                   <div class="row">
                                                    <div class="col-md-4">Branch:</div><div class="col-md-8"> <?=$get_edit_credit->branchname?></div>
                                                   </div>
                                                   <div class="row">
                                                    <div class="col-md-4">Mode of Payment: </div><div class="col-md-8"><?php echo $get_edit_credit->description?></div>
                                                   </div>
                                                   <div class="row">
                                                    <div class="col-md-4">Contact No: </div><div class="col-md-8"><?php echo $get_edit_membermain->conno?></div>
                                                   </div>
                                                   <div class="row">
                                                    <div class="col-md-4">Outlet Address: </div><div class="col-md-8"><?=$get_edit_membermain->address?></div>
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
                                                    <input type="hidden" value="<?=$get_infosummary->drno?>" id="drno" class="drno" name="drno">

                                                    <input type="hidden" value="<?=$get_infosummary->id?>" id="srpayno" class="srpayno" name="srpayno">
                                            </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <div class="form-group p-style">
                                              <table class="table table-striped table-hover table-bordered" id="table-srcollection" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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
                                    <table class="table table-striped table-hover table-bordered" id="table-grid" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                 
                                                <th>ID</th>
                                                <th>Payment Type</th>
                                                <th>Reference</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="col-md-3" style="float: right; padding-right: 0px;">
                                                 <button class="btn btn-warning btnGrand col-md-12 grand_total disabled" id="grand_total" name="grand_total">Total : <?php echo  number_format($get_infosummary->payamt,2,".",",") ?></button>
                                                 <input type="hidden" value= "<?=$get_infosummary->payamt?>" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2">
                                                </div>

                                </div>
                                <div hidden class="row" style="margin-top: 30px;">
                                                    <div class="col-md-6" style="margin-top: 13px;">
                                                       <div class="form-group ">
                                                          <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" class="btn btn-primary btnShipping" name="update">Add Shipping</button>
                                                          <input type="hidden" class="form-control grand_total3" value="<?=$get_infosummary->payamt?>" name="grand_total3" id="grand_total3">
                                                          <input type="hidden" class="form-control grand_total1" value="<?=$get_infosummary->payamt?>" name="grand_total1" id="grand_total1">
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6" style="float: right;">
                                                       <div class="form-group" style="float: right; margin-right: 85px;">
                                                          <label class="font-weight-bold" style="margin-top: 18px;">TOTAL: </label>
                                                          ₱ <input disabled type="text" class="grand_total" name="grand_total" id="grand_total" value="<?=$get_infosummary->payamt?>">
                                                       </div>
                                                    </div>
                                                 </div>
                                <div class="form-group" style="margin-top: 30px;">
                                <div class="col-md-12">
                                    </div>  
                                </div>          
                                <div class="form-group row" style="margin-top: 30px;">       
                                    <div class="col-md-12">
                                      <div class="col-lg-12" id="printDivsRet1">
                                        <?php if($get_print->num_rows() > 0){ ?>
                                        <i><a style="color:red;">This document has already been printed.</a></i>
                                      <?php } else { ?>
                                        <button style="float:right"  class="btn btn-primary printBtn"> Print Collection</button>
                                        <?php } ?>
                                      </div>
                                      <div class="hidden" id="printDivsret2">
                                        
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

<script type="text/javascript" src="<?=base_url('assets/js/sales/fsrcollectiondetail_view.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


