<style type="text/css">
    .btn-primary {
      color: #fff !important; 
      background-color: #13496f !important;
      border-color: #13496f !important; 
    }     
</style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="4" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/inventory_home/'.$token);?>">Inventory</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_inventory/inventory_location_transfer_transaction_history/'.$token);?>">Inventory Location Transfer Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Inventory Location Transfer #<?=$iltno;?></li>
        </ol>
    </div>
    <input id="iltnumberli" type="hidden" value="<?= $iltno; ?>"/>
    <section class="tables" id="div_2">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Inventory Location Transfer Transaction Information</h6>
                        <div class="card-header d-flex align-items-center">
                            <div class="col-12 col-md-6">
                                <label>Date of Transfer:</label> <label id="lbl_date"></label><br/>
                                <label>Transfer Location From:</label> <label id="lbl_from_loc"></label><br/>
                                <label>Transfer Location To:</label> <label id="lbl_to_loc"></label><br/>
                            </div>
                            <div class="col-12 col-md-6 text-right">
                                <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addItemModal" id="add_item_btn" class="  btn btn-primary btnUpdate btnTable " name="update"><i class="fa fa-plus"></i> Add Row</button>
                                <button data-toggle="modal" data-backdrop="static" id="<?= $iltno; ?>" data-keyboard="false"  class="btn btn-primary btnTable printBtn" name="update" ><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="50">ID</th>
                                            <th>Name</th>
                                            <th width="100">Unit</th>
                                            <th width="90">Quantity</th>
                                            <th width="90">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_body">

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <textarea class="form-control" id="f2_notes" name="f2_notes" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-block btn-primary" id="submitbtn">Save Inventory Transfer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Item</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="add_inventory_entry_modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Inventory<span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="f2_inventory" type="text" class="form-control" name="f2_inventory" placeholder="Inventory">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Quantity<span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="f2_quantity" type="number" min="0" class="form-control form-control-success" name="f2_quantity" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <input type="submit" style="float:right" class="btn btn-primary" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Item</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="delete_item_form" method="post" action="<?= base_url();?>Main_inventory/delete_item">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Are you sure you want to delete this record <br>(<bold class="info_desc" id = "info_desc"></bold>) ?</p>
                                <input type="hidden" class="del_areaId" name="del_item_id" id="del_item_id" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteAreaBtn">Delete Record</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_location_transfer_transaction_history_items.js');?>"></script>

