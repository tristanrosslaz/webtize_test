<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="9" data-namecollapse="" data-labelname="Package Pullout Transaction History View"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Package Release Transaction History View</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/home/'.$token);?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a></li>
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_cart/prt_history/'.$token.'');?>">Package Release Transaction History </a></li>
            <li class="breadcrumb-item active">Package Release Transaction History View</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="">
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
                                                            <div class="col-md-4">Franchisee Name: </div>
                                                            <div class="col-md-8"><h4><?=$packagerelease_details->name?></h4></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">Location Address: </div>
                                                            <div class="col-md-8"><h4><?=$packagerelease_details->location?></h4></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">Concept: </div>
                                                            <div class="col-md-8"><h4><?=$packagerelease_details->concept?></h4></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">Contact No.: </div>
                                                            <div class="col-md-8"><h4><?=$packagerelease_details->conno?></h4></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">Type: </div>
                                                            <div class="col-md-8"><h4><?=$packagerelease_details->type?></h4></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">Size: </div>
                                                            <div class="col-md-8"><h4><?=$packagerelease_details->size?></h4></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">Mode of Release: </div>
                                                            <div class="col-md-8"><h4><?=$packagerelease_details->mor?></h4></div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-right">
                                                    <div class="form-group">
                                                        <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>

                                                        <div class="form-group p-style">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <H1 class="prv_prno" style="border:none; float:right;"><?=$prno?></H1>
                                                                    <label class="" style="float:right;"># </label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12"><?=$packagerelease_details->trandate?></div>
                                                            </div>
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
                                                            <th width="120">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                            <div class="">
                                                <div class="">
                                                    <label for="notes">Notes</label> 
                                                    <textarea style="resize:none" class="form-control prv_notes" rows="4" cols="40" id="prv_notes" name="prv_notes" disabled=""><?=$packagerelease_details->notes?></textarea>
                                                </div>
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
                </form>

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
                <form class="form-horizontal personal-info-css" id="addRowForm" method="post" action="<?= base_url();?>Main_cart/add_packageitem">

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
                                                    <?php foreach ($uniform_equipments as $row) { ?>
                                                        <option value="<?= $row['id']?>"><?= $row['itemname']?></option>
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
                                                <input id="am_uomid" type="hidden" name="am_uomid" placeholder="Unit">
                                                <input id="am_unit" type="text" class="form-control form-control-success" name="am_unit" placeholder="Unit" disabled="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 form-control-label">Remarks<span class="asterisk" style="color:red"></span></label>
                                            <div class="col-md-8">
                                                <textarea style="resize:none" class="form-control form-control-success" rows="3" cols="40" id="am_remarks" name="am_remarks"></textarea>
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
                                <input type="submit" style="float:right" class="btn btn-success" value="Add">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<input type="hidden" class="hidden_apvno" name="hidden_apvno" id="hidden_apvno" value="<?php $this->session->userdata('apvno'); ?>">
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/cart_release/packagerelease_view.js');?>"></script>

