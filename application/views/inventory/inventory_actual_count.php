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
<style> 
.col-md-12.form-collect{
  margin: auto !important;
  width: 80% !important;     
  background-color: #f5f5f5 !important;   
  padding: 0 !important; 
  box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;} 
</style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="4" data-namecollapse="" data-labelname="Inventory List"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/inventory_home/'.$token);?>">Inventory</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Inventory Actual Count</li>
        </ol>
    </div>

    <section id="div_1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card-body">
                        <div id="collectdiv" class="col-md-12 form-collect" style="background-color: #fff !important;">
                            <h6 class="px-4 py-3 primary-bg white-text">Inventory Actual Information</h6>
                            <div class="p-4">
                            <div class="form-group">
                                <input type="text" name="f1_date" id="f1_date" readonly="true" class="form-control datepicker" value="<?=today_date();?>" placeholder="mm/dd/yyyy">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="f1_from_location">
                                    <option selected value="">Select From Location</option>
                                    <?php foreach ($locations as $value) { ?> 
                                        <option value="<?= $value['id'];?>"><?= $value['description'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" id="div_1_submit_button">Proceed <i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
       </div>
    </section>

    <section class="tables" id="div_2" style="display: none;">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Inventory Actual Information</h6>
                        <div class="card-header d-flex align-items-center">
                            <div class="col-12 col-md-6">
                                <b><label>Location:</label><label id="lbl_loc"></label><br/></b>
                                <label>Date:</label><label id="lbl_date"></label><br/>
                            </div>
                        </div>
                        <div class="card-body">
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addItemModal" id="add_item_btn" class="btn btn-primary btnUpdate btnTable " name="update" style="right:20px; position: absolute; top:45px;"><i class="fa fa-plus"></i> Add Row</button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="20">ID</th>
                                            <th>Name</th>
                                            <th width="90">Unit</th>
                                            <th width="90">Quantity</th>
                                            <th width="90">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <br>
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
                                            <button class="btn btn-block btn-primary" id="submitbtn">Save Actual Count</button>
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
                                            <input id="f2_quantity" type="number" min="0" class="form-control form-control-success allownumericwithoutdecimal" name="f2_quantity" placeholder="0.00">
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
                            <button type="submit" style="float:right" class="btn btn-primary" id="btnRemove">Remove Record</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_actual_count.js');?>"></script>

