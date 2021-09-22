<style>
   .btn.disabled, .btn:disabled {
    cursor: not-allowed;
    opacity: 1;
}
</style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Puchases"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Purchase Order View</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_account/cashvoucher_transaction/'.$token);?>">Cash Voucher Transaction History</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_account/cashvoucher_allocatedetailspo/'.$cvno.'/'.$supid.'/'.$token);?>">PO Payment Allocate</a></li>

        <li class="breadcrumb-item active">Purchase Order View</li>
        </div>
    </ul>
    
    <section class="tables" id = "pono_id_sec" class="pono_id_sec" name = "pono_id_sec" data-pono="<?=$get_infosummary->pono;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                      <div class="card-header d-flex align-items-center">
                                <div class="col-md-12">
                                    <h4 style="float: left;">Purchase Order #<?=$get_infosummary->pono?></h4>
                            </div>
                            </div>
                       <div class="card-body">
                        <!-- <div class="alert alert-warning"><button class="close" data-dismiss="alert" type="button">×</button>NOTE: Once PO has been converted to PO Receipt, all undelivered inventories will automatically be canceled.</div> -->
                            <form class="form-horizontal encode-info-css encode_form" id="encode_form">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        
                                        <label class="form-control-label">Purchase From <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Supplier: </div>
                                                    <div class="col-md-8"><h4><?php echo $get_edit_supplier->suppliername?></h4></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Contact Person: </div>
                                                    <div class="col-md-8"><p><?=$get_edit_supplier->contactperson?></p></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Contact No: </div>
                                                    <div class="col-md-8"><p><?=$get_edit_supplier->contactno?></p></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Mode of Payment: </div>
                                                    <div class="col-md-8"><p><?=$get_edit_credit->description?></p></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Address: </div>
                                                    <div class="col-md-8"><p><?=$get_edit_supplier->address?></p></div>
                                                  </div>

                                                  <!-- HIDDEN FIELDS -->

                                                  <input type="" value="<?=$get_edit_supplier->id?>" class="supplierid" name="supplierid" id="supplierid" hidden>
                                                    <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                                    <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                                    <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                                    <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                                    <input type="" value="<?=$get_warehouse->id?>" class="warehouseid" name="warehouseid" id="warehouseid" hidden>
                                                    <input type="" value="<?=$get_infosummary->trandate?>" class="trandate" name="trandate" id="trandate" hidden>
                                                    <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                                                    <input value="<?php echo $get_infosummary->pono ?>" type="hidden"  name="pono" id="pono" />
                                                    
                                                    
                                                                                                

                                            </div>
                                    </div>
                                  </div>
                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>PO Qty</th>
                                                <th>Unit</th>
                                                <th>Received Qty</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>    
                                   <div class="form-group row" style="margin-top: 30px;">       
                                    <div class="col-md-12">
                                      <!-- <button style="float:right" class="btn btn-primary approvePOReceiptModal" data-target="#approvePOReceiptModal" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false">Convert to PO Receipt</button> -->
                                        <a href="<?=base_url('Main_account/cashvoucher_allocatedetailspo/'.$cvno.'/'.$supid.'/'.$token);?>" style="float:right; margin-right:10px;" class="btn btn-danger backButton "><i class="fa fa-arrow-left"></i> Back</a>

                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div id="approvePOReceiptModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
   <div role="document" class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Action</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal personal-info-css" id="add_salesorder-form">
               <div class="form-group row">
                <div class="col-md-12">
                 <center><p style="padding: 8px; line-height: 25px;">Are you sure you want to proceed with conversion of PO No. <br>(<?=$get_infosummary->pono;?>)? </h5></p>
                    <input type="" class="app_rcvno" name="app_rcvno" value="" hidden>
                    <input type="" class="rcvno" name="rcvno" value="" hidden>
                    <input type="" class="poreceive_id" name="poreceive_id" value="" hidden>
                 </div>
               </div>
               <div class="modal-footer">
                  <div class="form-group row">
                     <div class="col-md-12">
                        <button class="btn btn-primary approvePOReceiptBtn" id="approvePOReceiptBtn" data-dismiss="modal"  type="button" >Approve</button>
                        <button type="button" style="float:right; margin-left:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/account/poreceiptcv_view.js');?>"></script>

