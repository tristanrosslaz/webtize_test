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
.datepicker {
    z-index:99999 !important;
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
            <li class="breadcrumb-item active">Inventory Limit Purchases</li>
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
                                        <option value="divdate">Search by Date</option>
                                        <option value="dividno">Search by Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                        <div class="form-group dividno" style="display:none;">
                                        <label class="form-control-label col-form-label-sm">Name</label>
                                        <input type="text" class="input-sm form-control search-input-text idnosearch" data-column="1" id="idnosearch" placeholder="Name.." />
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="form-group divdate" style="display:none;">
                                        <label class="form-control-label col-form-label-sm">Date</label>
                                        <div class="input-daterange input-group " id="datepicker">
                                            <input type="text" class="input-sm form-control search-input-select1" id="datefrom" value="<?=today_text();?>" readonly />
                                            <span class="input-group-addon" style="border: none; background-color: #fff; margin-left: 2px; margin-right: 2px;">to</span>
                                            <input type="text" class="input-sm form-control search-input-select2" id="dateto" value="<?=today_text();?>" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">    
                                <button type="button" class="btn btn-primary searchBtn">Search</button>
                                <button  data-backdrop="static" data-keyboard="false"  id="add_item_btn" class="btn btn-primary btnUpdate btnTable " name="update" >Add Record </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="90">ID</th>
                                            <th>Item Name</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Limit Status</th>
                                            <th>Action</th>
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
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Purchase Limit</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="add_purchase_limit_form" method="post" action="<?= base_url();?>inventory/Inv_invlimitpurchases/save_item_purchase_limit">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Item Name<span style="color:red">*</span></label>
                                        <div class="col-md-9">
                                            <input id="f_itemname" type="text" class="form-control form-control-success" name="f_itemname" placeholder="Item Name">
                                            <input id="f_id" type="text" class="form-control  form-control-success" style="display: none;" name="f_id" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Start Date<span style="color:red">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="input-sm form-control datepicker" id="f_start_date" name="f_start_date" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">End Date<span style="color:red">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="input-sm form-control datepicker" id="f_end_date" name="f_end_date" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Quantity<span style="color:red">*</span></label>
                                        <div class="col-md-9">
                                            <input id="f_quantity" type="text" class="form-control form-control-success allownumericwithoutdecimal" name="f_quantity" placeholder="Quantity">
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
                <form class="form-horizontal personal-info-css" id="delete_item_form" method="post" action="<?= base_url();?>Main_inventory/delete_item_purchase_limit">
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
<?php $this->load->view('includes/footer');?>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_limit_purchases.js');?>"></script>