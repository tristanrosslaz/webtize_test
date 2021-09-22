<style>
    .col-md-6.form-collect {
        margin: auto !important;
        width: 50% !important;     
        background-color: #f5f5f5 !important;   
        padding: 25px !important; 
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;
    } 
    .select2 {
        width: calc(100%) !important;
        margin-left: 0;
    }
</style>
  <!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="9" data-namecollapse="" data-labelname="Package Inclusion View"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Package Inclusion View</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/home/'.$token);?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a></li>
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_cart/package_inclusion/'.$token.'');?>">Package Inclusion </a></li>
            <li class="breadcrumb-item active">Package Inclusion View</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <div class="modal-body">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <div class="card-body">

                                                <div class="form-group row">

                                                    <div class="col-md-6">
                                                        <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>
                                                        
                                                        <div class="form-group p-style">

                                                            <div class="row">
                                                                <div class="col-md-4">Package Name: </div>
                                                                <div class="col-md-8"><h4><?=$get_package->pkg_desc?></h4></div>
                                                                <span id="pkgid" hidden=""><?=$pkgid?></span>
                                                                <span id="type" hidden=""><?=$type?></span>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">

                                                        <?php if ($type == "edit") { ?>

                                                            <div class="">
                                                                <div class="">
                                                                    <button type="button" style="float:right;" class="btn btn-success btnAddRow" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addRowModal" aria-label="Add Row">Add Row</button>
                                                                </div>  
                                                            </div>

                                                        <?php } ?>

                                                    </div>

                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="90">Item ID</th>
                                                                <th>Description</th>
                                                                <th width="90">Qty</th>
                                                                <th width="90">Unit</th>
                                                                <?php if ($type == "edit") { ?>
                                                                    <th width="120">Action</th>
                                                                <?php } ?>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row">       
                                <div class="col-md-12">
                                    <?php if ($type == "edit") { ?>
                                        <!-- <button type="button" style="float:right; margin-right:10px;" class="btn btn-success printBtn" data-dismiss="modal" aria-label="Close">Save Package Release</button> -->
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="addRowModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Row</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>

                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">

                                    <div class="form-group row">
                                        <label class="col-md-4 form-control-label">Item<span class="asterisk" style="color:red">*</span></label>
                                        <div class="col-md-8">
                                            <select id="am_item" type="text" class="form-control form-control-success select2" name="am_item" placeholder="Item">
                                                <option value=""> -- Select an Item --</option>
                                                <?php foreach ($items->result_array() as $item) { ?>
                                                    <option value="<?= $item['id']?>"><?= $item['itemname']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 form-control-label">Quantity<span class="asterisk" style="color:red">*</span></label>
                                        <div class="col-md-8">
                                            <input id="am_qty" type="text" class="form-control form-control-success" name="am_qty" placeholder="Quantity">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 form-control-label">Unit<span class="asterisk" style="color:red">*</span></label>
                                        <div class="col-md-8">
                                            <select id="am_unit" type="text" class="form-control form-control-success select2" name="am_unit" placeholder="Unit">
                                                <option value=""> -- Select Unit --</option>
                                                <?php foreach ($units->result_array() as $unit) { ?>
                                                    <option value="<?= $unit['id']?>"><?= $unit['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right" class="btn btn-success saveItemBtn">Add</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="editModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Edit Item</h4>
                </div>

                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">

                                    <div class="form-group row">
                                        <label class="col-md-4 form-control-label">Item<span class="asterisk" style="color:red">*</span></label>
                                        <div class="col-md-8">
                                            <input id="em_item" type="text" class="form-control form-control-success" name="em_item" placeholder="Item" disabled="">
                                            <input id="em_id" type="hidden" name="em_id">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 form-control-label">Quantity<span class="asterisk" style="color:red">*</span></label>
                                        <div class="col-md-8">
                                            <input id="em_qty" type="text" class="form-control form-control-success" name="em_qty" placeholder="Quantity">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 form-control-label">Unit<span class="asterisk" style="color:red">*</span></label>
                                        <div class="col-md-8">
                                            <select id="em_unit" type="text" class="form-control form-control-success select2" name="em_unit" placeholder="Unit">
                                                <option value=""> -- Select Unit --</option>
                                                <?php foreach ($units->result_array() as $unit) { ?>
                                                    <option value="<?= $unit['id']?>"><?= $unit['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right" class="btn btn-success em_saveEditBtn">Save</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Item</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="dm_id" class="dm_id" id="dm_id">
                                <p>Proceed with the deletion of Item: <b><span class="dm_item" id = "dm_item"></span></b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right" class="btn btn-primary dm_deleteBtn">Approve</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/cart_release/packageinclusion_view.js');?>"></script>

