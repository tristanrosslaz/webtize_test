<style>
body, html {
margin-top:0px;
padding-top:0px;
}
.card-header.d-flex.align-items-center>.col-md-12{
  padding-left: 0px !important;
}
td.dt-body-right { text-align: right; }
</style>

<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/collection_summary/'.$token);?>">Collection Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Collection # <?=$get_infosummary->id?></li>
        </ol>
    </div>
    
    <section class="tables" id = "collection_id_sec" class="collection_id_sec" name = "collection_id_sec" data-id="<?=$get_infosummary->id;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="px-4 py-3 secondary-bg white-text">Collection Information</h6>
                       <div class="card-body">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-3">Customer: </div>
                                                    <div class="col-md-9"><h4><?=concatenate_name($get_edit_membermain->fname, $get_edit_membermain->mname, $get_edit_membermain->lname, $get_edit_membermain->branchname) ?></h4></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-12">Date: <n style="margin-left: 133px;"><?php echo $get_infosummary->trandate?></n></div>
                                                   </div>
                                                   <div class="row">
                                                    <div class="col-md-12">Branch: <n style="margin-left: 117px;"><?=$get_edit_credit->branchname?></n></div>
                                                   </div>
                                                  <div class="row">
                                                    <div class="col-md-12">Mode of Payment: <n style="margin-left: 53px;"><?php echo $get_edit_credit->description?></n></div>
                                                   </div>
                                                   <div class="row">
                                                    <div class="col-md-12">Contact No: <n style="margin-left: 92px;"><?php echo $get_edit_membermain->conno?></n></div>
                                                   </div>
                                                   <div class="row">
                                                    <div class="col-md-12">Outlet Address: <n style="margin-left: 71px;"><?=$get_edit_membermain->address?></n></div>
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

                                                    <input type="hidden" value="<?=$get_infosummary->id?>" id="drpayno" class="drpayno" name="drpayno">
                                            </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <div class="form-group p-style">

                                                  <table class="table table-striped table-hover table-bordered" id="table-drcollection"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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
                                 
                                                <th>ID</th>
                                                <th>Payment Type</th>
                                                <th>Reference</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="col-md-3" style="float: right; padding-right: 0px;">

                                                 <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;"><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Totals : <?php echo  number_format($get_infosummary->payamt,2,".",",") ?></a></button> 

                                    </div>

                                </div>
                                <div hidden class="row" style="margin-top: 30px;">
                                                    
                                </div>        
                                <div class="form-group row" style="margin-top: 10px;">       
                                      <div class="col-lg-12" id="printDivsRet1">             
                                        <button style="float:right"  class="btn btn-primary printBtn "> Print Collection</button>
                                    </div>
                                </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets/js/sales/collectiondetail_view.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


