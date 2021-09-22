<style>
   .easy-autocomplete.eac-square {
   width: 500px !important;
   }
</style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/receive_po/'.$token);?>">Receive PO</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
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
                            <form class="form-horizontal encode-info-css poreceiveform" id="poreceiveform">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        
                                        <label class="form-control-label">Deliver From <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Supplier: </div>
                                                    <div class="col-md-8"><h4><?php echo $get_edit_supplier->suppliername?></h4></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Date of Delivery: </div>
                                                    <div class="col-md-8"><?=$get_infosummary->trandate?></div>
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

                                                  <input type="" value="<?=$get_edit_supplier->id?>" class="supplierid" name="supplierid" id="supplierid" hidden>
                                                  <input type="" value="<?=$get_warehouse?>" class="warehouseid" name="warehouseid" id="warehouseid" hidden>
                                                  <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                                  <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                                  <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 
                                                  <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                                  <input type="" class="form-control form-control-success totalrows" name="totalrows" id="totalrows" value="<?php echo $get_totalrows->num_rows(); ?>" hidden>
                                                  <input type="hidden" class="form-control form-control-success pono" name="pono" id="pono" value="<?=$get_infosummary->pono?>">
                                                  <input value="<?=$token;?>" type="" id="token" name="token" hidden/>                                              
                                            </div>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-bottom: 30px;">      
                                        <div class="col-md-4"><small class="form-text">Date </small> <input class="form-control" type="text" readonly id="rcvdate" name="rcvdate" value="<?=today();?>"  /></div>
                                          <div class="col-md-4"><small class="form-text">Ref. No. <span class="" style="color:red">*</span></small><input class="form-control" type="text" id="suprefno" name="suprefno" placeholder="Supplier Ref. No."  /></div>
                                        </div>
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item Name</th>
                                                <th>PO Qty</th>
                                                <th>Unit</th>
                                                <th>Receive Qty</th>
                                                <th>Qty to Receive</th>
                                            </tr>
                                        </thead>
                                    </table>
                                <div class="form-group row" style="margin-top: 30px;">       
                                    <div class="col-md-12"> 

                                        <button style="float:right; margin-left: 10px;" class="btn btn-primary processBtn" id="processBtn" type="submit" disabled>Process Receive Inventory</button>

                                        <a href="<?=base_url('Main_purchase/receive_po/'.$token);?>" style="float:right" class="btn blue-grey backButton "> Back</a>


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
<script type="text/javascript" src="<?=base_url('assets/js/purchase/poreceiveform.js');?>"></script>

