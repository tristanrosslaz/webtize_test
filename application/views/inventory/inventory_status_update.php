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
    .btnDelete{
        display: none !important;
    } 
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
            <li class="breadcrumb-item active">Inventory Status Update</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-md-3">
                                    <div class="form-group" >
                                        <label class="form-control-label col-form-label-sm">Search Filter</label>
                                        <select class="form-control" id="divsearchfilter">
                                            <option value="divall">Search All Items</option>
                                            <option value="dividno">Search by Item Code</option>
                                            <option value="divname">Search by Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="form-group dividno" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">Item Code</label>
                                            <input type="text" class="input-sm form-control idnosearch" id="idnosearch" placeholder="Item Code.." />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group divname" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">Name</label>
                                            <input type="text" class="input-sm form-control nameSearch" id="nameSearch"  placeholder="Name.." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">    
                                <button type="button" class="btn btn-primary searchBtn">Search</button>
                                <!-- <button id="add_item_btn" class="btn btn-primary">Add Item</button> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="20">Item Code</th>
                                            <th>Name</th>
                                            <th width="70">Unit</th>
                                            <th width="90">Category</th>
                                            <th width="90">Action</th>
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
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Inventory Item</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="<?= base_url();?>inventory/Inv_invstatusupdate/save_inventory_update">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Inventory Name <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <input id="update_inventory_name" type="text" class="form-control form-control-success" name="update_inventory_name" placeholder="Inventory Name" disabled>
                                            <input id="update_item_code" type="hidden" class="form-control form-control-success" name="update_item_code" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Inventory Category <span class="" style="color:red">*</span></label>
                                        <div class="col-md-10">
                                            <select id="update_inventory_category" type="text" class="form-control form-control-success" name="update_inventory_category" placeholder="Inventory Category" disabled>
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
                                            <select id="update_unit" type="text" class="form-control form-control-success" name="update_unit" placeholder="Item Unit" disabled>
                                                <option value=""> -- Please Select Unit of Measurement --</option>
                                                <?php foreach ($uoms as $uom) { ?>
                                                    <option value="<?= $uom['id']?>"><?= $uom['description']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
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
                                <input type="submit" style="float:right" class="btn btn-primary" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_status_update.js');?>"></script>