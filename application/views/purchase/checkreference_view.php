<style>
    body, html {
      margin-top:0px;
      padding-top:0px;
    }
    .card-header.d-flex.align-items-center>.col-md-12{
      padding-left: 0px !important;
    }
   .btn.disabled, .btn:disabled {
    cursor: not-allowed;
    opacity: 1;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">

<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 


    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/po_payment/'.$token);?>">PO Payment</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Check Details</li>
        </ol>
    </div> 

    
    <section class="tables" id = "checkno_id" class="checkno_id" name = "checkno_id" data-checkno_id="<?=$checkno?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                      <div class="card-header d-flex align-items-center">
         
                                  <div class="col-md-6">
                                    <h4 style="float: left;">Reference #<?=$checkno?></h4>
                                  </div>
                                  <div class="col-md-6">
                                      <h3 style="float: right;"><?=$get_checksummary->chkdate?></h3>
                                  </div>
    
                            </div>
                       <div class="card-body">
                            <form class="form-horizontal encode-info-css encode_form" id="encode_form">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        
                                        <label class="form-control-label">Pay To <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                  <div class="row">
                                                    <div class="col-md-4">Supplier: </div>
                                                    <div class="col-md-8"><h4><?php echo $get_edit_supplier->suppliername?></h4></div>
                                                  </div>

                                                   <div class="row">
                                                    <div class="col-md-4">Type: </div>
                                                    <div class="col-md-8"><div class="row" style="margin-left: 0px;">
                                                      <?php
                                                      if($get_checksummary->isgl=="Yes")
                                                        {?>Expenses
                                                        <?php }
                                                        else if($get_checksummary->isgl=="No")
                                                        {?>Purchases
                                                        <?php } ?>
                                                        </div></div>
                                                      </div>

                                                  <div class="row">
                                                    <div class="col-md-4">Cleared: </div>
                                                    <div class="col-md-8"><?php echo $get_checksummary->cleared?></div>
                                                  </div>
                                                   <div class="row">
                                                    <div class="col-md-4">Printed: </div>
                                                    <div class="col-md-8"><?php echo $get_checksummary->printed?></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Status: </div>
                                                    <div class="col-md-8"><?php echo $get_checksummary->checkstatus?></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Allocation: </div>
                                                    <div class="col-md-8"><?php echo $get_checksummary->isallocated?></div>
                                                  </div>                                               
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <div class="form-group p-style">

                                                  <table class="table table-striped table-hover table-bordered" id="table-checkno"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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
                                  </div>
                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>GL Account</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                 <div class="col-md-3" style="float: right; padding-right: 0px;">
                                     <button class="btn btn-warning btnGrand col-md-12 grand_total disabled" id="grand_total" name="grand_total">
                                              Total : <?php echo  number_format($get_checksummary->amount,2,".",",") ?></button>
                                            </div>
                                     <br>
                                     <br>
                                     <label for="notes" style="margin-top: 35px">Notes</label> 
                                     <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_checksummary->notes?></textarea>         
                                    <div class="form-group row" style="margin-top: 30px;">       
                                        <div class="col-md-12">

                                        </div>
                                    </div>      
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/checkreference_view.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>

