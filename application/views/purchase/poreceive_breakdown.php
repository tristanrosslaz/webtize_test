<style>
   .easy-autocomplete.eac-square {
   width: 500px !important;
   }
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Purchase Order #<?=$get_infosummary->pono?></h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item active"><a href="<?=base_url('Main_purchase/purchase_home/'.$token);?>">Purchases</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_purchase/receivepo_tranHistory/'.$token);?>">Transaction History</a></li>
        <li class="breadcrumb-item active">Puchase Order</li>
        </div>
    </ul>
    
    <section class="tables" id = "pono_id_sec" class="pono_id_sec" name = "pono_id_sec" data-pono="<?=$get_infosummary->pono;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                      <div class="card-header d-flex align-items-center">
                                <div class="col-md-12">
                                    <!-- <h4 style="float: left;">Purchase Order #<?=$get_infosummary->pono?></h4> -->
                            </div>
                            </div>
                       <div class="card-body">
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
                                                    <div class="col-md-4">Date of Delivery: </div>
                                                    <div class="col-md-8"><p><?=$get_infosummary->trandate?></p></div>
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

                                                  <input type="hidden" value="<?=$get_edit_supplier->id?>" class="searchSupplier_id" name="searchSupplier_id" id="searchSupplier_id">
                                                  <input id="searchCustomer" type="hidden" class="form-control form-control-success searchCustomer" value="" name="searchCustomer"><br />
                                                  <input type="hidden" class="searchCustomer_id" name="searchCustomer_id" id="searchCustomer_id">
                                                  <input type="hidden" class="form-control form-control-success address" name="address" id="address"> 

                                                  <input type="" class="form-control form-control-success itemid" name="itemid" id="itemid" value="<?=$itemid; ?>" hidden> 

                                                  <input type="hidden" class="form-control form-control-success contact_no" name="contact_no" id="contact_no" value="">
                                                    <!-- <input type="hidden" value="" class="form-control form-control-success term_credit" name="term_credit" id="term_credit"> -->                                                
                                            </div>
                                    </div>
                                  </div>
                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>RCV No</th>
                                                <th>Name</th>
                                                <th>Ref No</th>
                                                <th>Received Date</th>                                 
                                                <th>Receive Qty</th>
                                                <th>Unit</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="form-group row" style="margin-top: 30px;">       
                                    <div class="col-md-12">
                                        <a onclick="history.back(-1)" style="float:right; margin-right:10px;color: #fff;" class="btn btn-danger backButton "><i class="fa fa-arrow-left"></i> Back</a>
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
<script type="text/javascript" src="<?=base_url('assets/js/purchase/poreceive_breakdown.js');?>"></script>
<!-- <script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>

