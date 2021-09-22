<?php 
//071318
//this code is for destroying session and page if they access restricted page

$position_access = $this->session->userdata('get_position_access');
$access_content_nav = $position_access->access_content_nav;
$arr_ = explode(', ', $access_content_nav); //string comma separated to array 
$get_url_content_db = $this->model->get_url_content_db($arr_)->result_array();

$url_content_arr = array();
foreach ($get_url_content_db as $cun) {
    $url_content_arr[] = $cun['cn_url'];
}
$content_url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/';

if (in_array($content_url, $url_content_arr) == false){
    header("location:".base_url('Main/logout'));
}    
//071318
?>
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
            <li class="breadcrumb-item active">Inventory List</li>
        </ol>
    </div>

    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="form-control-label col-form-label-sm">Search Filter</label>
                                    <select class="form-control" name="divsearchfilter" id="divsearchfilter">
                                        <option value="divall">Search All Items</option>
                                        <option value="divitemcode">Search by Item Code</option>
                                        <option value="divbarcode">Search by Barcode</option>
                                        <option value="divname">Search by Name</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="row">
                                        <div class="form-group divitemcode" id="divitemcode" style="display:none;">
                                        <label class="form-control-label col-form-label-sm">Item Code</label>
                                        <input type="text" class="input-sm form-control search-input-text idnosearch" id="idnosearch" placeholder="Item Code" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group divbarcode" id="divbarcode" style="display:none;">
                                        <label class="form-control-label col-form-label-sm">Barcode</label>
                                        <input type="text" class="input-sm form-control search-input-text barcodeSearch" id="barcodeSearch" placeholder="Barcode" />
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="form-group divname" id="divname" style="display:none;">
                                        <label class="form-control-label col-form-label-sm">Name</label>
                                        <input type="text" class="input-sm form-control search-input-text nameSearch" id="nameSearch" placeholder="Item Name" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">    
                                <button type="button" class="btn btn-primary searchBtn">Search</button>
                                <button id="add_item_btn" class="btn btn-primary">Add Item</button>
                            </div>

                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="40">Itemcode</th>
                                            <th>Name</th>
                                            <th width="80">Unit</th>
                                            <th width="140">Category</th>
                                            <th width="150">Action</th>
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

    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Inventory Item</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="<?= base_url();?>inventory/Inv_inventorylist/save_item">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Item Code <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="inventory_code" type="text" class="form-control form-control-success" name="inventory_code" placeholder="Item Code">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Item Name <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="inventory_name" type="text" class="form-control form-control-success" name="inventory_name" placeholder="Item Name">
                                            <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Item Category <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <select id="inventory_category" type="text" class="form-control form-control-success" name="inventory_category" placeholder="Item Category">
                                                <option value=""> -- Please Select Category --</option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?= $category['id']?>"><?= $category['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Unit <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <select id="unit" type="text" class="form-control form-control-success" name="unit" placeholder="Item Unit">
                                                <option value=""> -- Please Select Unit of Measurement --</option>
                                                <?php foreach ($uoms as $uom) { ?>
                                                    <option value="<?= $uom['id']?>"><?= $uom['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Reorder Point<span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="reorder_point" type="text" class="form-control form-control-success allownumericwithoutdecimal" name="reorder_point" placeholder="Reorder Point">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Reorder Value<span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="reorder_value" type="text" class="form-control form-control-success allownumericwithoutdecimal" name="reorder_value" placeholder="Reorder Value">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">GL Account <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <select id="gl_account" type="text" class="form-control form-control-success" name="gl_account" placeholder="Item Unit">
                                                <option value=""> -- Please Select GL Account --</option>
                                                <?php foreach ($gl_accounts as $gl_account) { ?>
                                                    <option value="<?= $gl_account['id']?>"><?= $gl_account['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Barcode</label>
                                        <div class="col-md-10">
                                            <input id="barcode" type="text" class="form-control form-control-success" name="barcode" placeholder="Bar Code" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Other Info</label>
                                        <div class="col-md-10">
                                            <textarea id="other_info" type="text" class="form-control form-control-success" style="resize: none;" name="other_info" placeholder="Other Info"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-2"> </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="is_for_sale" id="is_for_sale"> Is For Sale
                                                    </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="web_for_sale" id="web_for_sale"> Web For Sale
                                                    </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="track_inventory_count" id="track_inventory_count"> Track Inventory Count
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="is_archive" id="is_archive"> Is Archive
                                                    </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="is_portal_for_sale" id="is_portal_for_sale"> Is Portal for Sale
                                                    </label>
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
                                <input type="submit" style="float:right" class="btn btn-primary" value="Save" id="btnSave">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div id="updateItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Inventory Item</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="update_inventory_form" method="post" action="<?= base_url();?>inventory/Inv_inventorylist/update_item">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Item Code <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="update_id" type="text" class="form-control form-control-success" disabled >
                                            <input id="update_item_code" type="hidden" class="form-control form-control-success" name="update_item_code" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Item Name <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="update_inventory_name" type="text" class="form-control form-control-success" name="update_inventory_name" placeholder="Item Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Item Category <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <select id="update_inventory_category" type="text" class="form-control form-control-success" name="update_inventory_category" placeholder="Item Category">
                                                <option value=""> -- Please Select Category --</option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?= $category['id']?>"><?= $category['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Unit <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <select id="update_unit" type="text" class="form-control form-control-success" name="update_unit" placeholder="Item Unit">
                                                <option value=""> -- Please Select Unit of Measurement --</option>
                                                <?php foreach ($uoms as $uom) { ?>
                                                    <option value="<?= $uom['id']?>"><?= $uom['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Reorder Point<span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="update_reorder_point" type="text" class="form-control form-control-success allownumericwithoutdecimal" name="update_reorder_point" placeholder="Reorder Point">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Reorder Value<span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="update_reorder_value" type="text" class="form-control form-control-success allownumericwithoutdecimal" name="update_reorder_value" placeholder="Reorder Value">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">GL Account <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <select id="update_gl_account" type="text" class="form-control form-control-success" name="update_gl_account" placeholder="Item Unit">
                                                <option value=""> -- Please Select GL Account --</option>
                                                <?php foreach ($gl_accounts as $gl_account) { ?>
                                                    <option value="<?= $gl_account['id']?>"><?= $gl_account['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Barcode</label>
                                        <div class="col-md-10">
                                            <input id="update_barcode" type="text" class="form-control form-control-success" name="update_barcode" placeholder="Bar Code" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Other Info</label>
                                        <div class="col-md-10">
                                            <textarea id="update_other_info" type="text" class="form-control form-control-success" style="resize: none;" name="update_other_info" placeholder="Other Info"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-2"> </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="update_is_for_sale" id="update_is_for_sale"> Is For Sale
                                                    </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="update_web_for_sale" id="update_web_for_sale"> Web For Sale
                                                    </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="update_track_inventory_count" id="update_track_inventory_count"> Track Inventory Count
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="update_is_archive" id="update_is_archive"> Is Archive
                                                    </label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="checkbox" name="update_is_portal_for_sale" id="update_is_portal_for_sale"> Is Portal for Sale
                                                    </label>
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
                                <input type="submit" style="float:right" class="btn btn-primary" value="Save" id="btnSave">
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
                <form class="form-horizontal personal-info-css" id="delete_item_form" method="post" action="<?= base_url();?>inventory/Inv_inventorylist/delete_item">
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
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_list.js');?>"></script>

