<style>
.btn.disabled, .btn:disabled {
  cursor: not-allowed;
  opacity: 1;
}

.table-dark.table-bordered, .table-responsive>.table-bordered {
    border: 1px solid #dee2e6;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 

  <div class="bc-icons-2 card mb-4">
    <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
      <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
      <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
      <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/poreceipt_summary/'.$token);?>">Purchase Order Receipt</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
      <li class="breadcrumb-item active">Purchase Order # <?=$get_infosummary->pono?></li>
    </ol>
  </div>
  
  <section class="tables" id = "pono_id_sec" class="pono_id_sec" name = "pono_id_sec" data-pono="<?=$get_infosummary->pono;?>">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <h6 class="secondary-bg px-4 py-3 white-text">Purchase Order Information</h6>
            <div class="card-body">
              <div class="alert alert-warning"><button class="close" data-dismiss="alert" type="button">×</button>NOTE: Once PO has been converted to PO Receipt, all undelivered inventories will automatically be canceled.</div>
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
                      <div class="col-md-8"><?=$get_edit_supplier->contactperson?></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Contact No: </div>
                      <div class="col-md-8"><?=$get_edit_supplier->contactno?></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Mode of Payment: </div>
                      <div class="col-md-8"><?=$get_edit_credit->description?></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Address: </div>
                      <div class="col-md-8"><?=$get_edit_supplier->address?></div>
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
                    <input class="form-control"  type="text" id="tdata" value="<?=$totalData?>" hidden>';
                    <input type="" value="<?=$get_infosummary->discount_type?>" class="discount_type" name="discount_type" id="discount_type" hidden>
                    <input type="" value="<?=$get_infosummary->gen_discount?>" class="gen_discount" name="gen_discount" id="gen_discount" hidden>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Item Name</th>
                      <th>PO Qty</th>
                      <th>Unit</th>
                      <th>Received Qty</th>
                      <th>price</th>
                      <th>uomid</th>
                      <th>discamt</th>
                      <th>dtype</th>
                    </tr>
                  </thead>
                </table>
              </div>    
              <div class="form-group row" style="margin-top: 10px;">       
                <div class="col-md-12">
                  <button style="float:right" class="btn btn-primary approvePOReceiptModal" data-target="#approvePOReceiptModal" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false">Convert to PO Receipt</button>
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
<script type="text/javascript" src="<?=base_url('assets/js/purchase/poreceipt_view.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>

