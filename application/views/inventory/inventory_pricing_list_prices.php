<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="4" data-namecollapse="" data-labelname="Inventory List"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/inventory_home/'.$token);?>">Inventory</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_inventory/inventory_pricing_list/'.$token);?>">Inventory Pricing</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active"><?= $item['itemname']; ?></li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-lg-12">
                                    <br>
                                    <div class="row mar_minus_25">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Price Category</label>
                                                <input type="text" id="category" class="form-control material_josh form-control-sm" placeholder="Price Category">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Unit</label>
                                                <input type="text" id="unit"  class="form-control material_josh form-control-sm" placeholder="Unit">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Price</label>
                                                <input type="text" id="price" class="form-control material_josh form-control-sm allownumericwithdecimal" placeholder="Price">
                                            </div>
                                        </div>
                                        <input type="hidden" id="itemid" value="<?= $item['id']; ?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">    
                                <button type="button" class="btn btn-primary searchBtn">Search</button>
                                <button id="add_item_btn" class="btn btn-primary"><i class="fa fa-plus"></i> Add Row</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">ID</th>
                                            <th>Price Category</th>
                                            <th width="80">Unit</th>
                                            <th width="80">Price</th>
                                            <th width="140">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal-->
    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Item Price</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="add_inventory_price_form" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item_price">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <div class="col-md-10">
                                                    <input id="f_id" type="text" class="form-control form-control-success" name="f_id" style="display:none;" >
                                                    <input id="f_item_id" type="text" class="form-control form-control-success" name="f_item_id" style="display:none;" value="<?= $item['id']?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label" id="price_categ_label">Price Category <span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <select id="f_price_category" type="text" class="form-control form-control-success" name="f_price_category" placeholder="Item Unit">
                                                        <option value=""> -- Please Select Category --</option>
                                                        <?php
                                                            foreach ($price_cats as $price_cat) {
                                                                ?>
                                                                    <option value="<?= $price_cat['id']?>"><?= $price_cat['description']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Price <span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input id="f_price" type="text" class="form-control form-control-success allownumericwithdecimal" name="f_price" placeholder="0.00">
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
                <form class="form-horizontal personal-info-css" id="delete_item_form" method="post" action="<?= base_url();?>Main_inventory/delete_item_price">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record <br>(<bold class="info_desc" id = "info_desc"></bold>) ?</p>
                                    <input type="hidden" class="del_areaId" name="del_item_id" id="del_item_id" value="">
                                </div>
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
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_pricing_list_prices.js');?>"></script>

