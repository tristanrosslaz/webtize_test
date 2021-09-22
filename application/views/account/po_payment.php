<style>
   .btn.disabled, .btn:disabled {
    cursor: not-allowed;
    opacity: 1;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchase"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
           <!--  <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Account</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/po_payment/'.$token);?>">PO Payment</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">PO Payment Allocate</li>
        </ol>
    </div> 

    
    <section class="tables" id = "checkno_id" class="checkno_id" name = "checkno_id" data-checkno_id="<?=$checksummary->chkno;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                               <form id="form1">
                                 <div class="card-body">
                                     <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-8 text-uppercase text-primary"><h4 style="margin-top: 8px;"><?php echo $get_supplier->suppliername?></h4>
                                      </div>
                                      <div class="col-md-4" style="text-align: right;"> 
                                          <button class="btn btn-primary pull-right" id="allocateBtn" disabled type="submit"> Allocate Now</button>
                                          <a href="<?=base_url('Main_purchase/po_payment/'.$token);?>" style="float:right;margin-right:10px;" class="btn blue-grey BtnBack2"> Back</a>

                                        </div>
                                      </div>
                                 <div class="form-group row">
                                    <div class="col-md-4">
                                            <ul class="list-group">
                                              <li class="list-group-item active">PO Payment Details</li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Total
                                                <span class="badge badge-warning badge-pill"><?php echo number_format($totalamount,2,".",",") ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Balance
                                                <span class="badge badge-warning badge-pill"><?php echo number_format($checkbalance,2,".",",") ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Allocation
                                                <span class="badge badge-warning badge-pill" id="allocLabel">0.00</span>
                                              </li>
                                              <input value="<?=$balance?>" type="" id="balance" name="balance" hidden/>
                                              <input value="<?=$checksummary->chkno;?>" type="" id="checkno" name="checkno" hidden/>
                                              <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                                              <input value="<?=$idno;?>" type="" id="idno" name="idno" hidden/>
                                            </ul>
                                    </div>
                                    <input hidden value="<?=today_text();?>" id="todaydate" class="todaydate" name="todaydate">             
                                <div class="col-md-8">
                                    <div class="form-group p-style">
                                      <h2 class="text-center" style="margin-right:250px" hidden id="loadingImg" > 
                                           <img height="100px" style="position: absolute;margin-top: 80px" class="loadingImg" src="<?=base_url('assets/img/loader.gif');?>">
                                      </h2>
                                            <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                              <thead>
                                                  <tr>  
                                                      <th>Date</th>
                                                      <th>APV No</th>
                                                      <th>Balance</th>
                                                      <th style="width: 200px;">Amount</th>
                                                  </tr>
                                              </thead>
                                            </table>
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

<script type="text/javascript" src="<?=base_url('assets/js/purchase/popayment_allocate.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


