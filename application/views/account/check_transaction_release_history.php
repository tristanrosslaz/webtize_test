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
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Check Transaction Release History</li>
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
                                   
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label class="form-control-label col-form-label-sm">Search Filter</label>
                                                <select class="form-control" name="chksearchfilter" id="chksearchfilter">
                                                    <option value="chkdatediv">Search by Date</option>
                                                    <option value="chkstatdiv">Search by Status</option>
                                                    <option value="checknodiv">Search by Check No</option>
                                                    <option value="userdiv">Search by Username</option>
                                                    <option value="paytodiv">Search by Pay To</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group row">

                                                <div class="form-group chkdatediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom" value="<?=today_text();?>" readonly />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto" value="<?=today_text();?>" readonly/>
                                                    </div>
                                                </div>

                                                <div class="form-group chkstatdiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date and Status</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom1" value="<?=today_text();?>" readonly />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto1" value="<?=today_text();?>" readonly/>
                                                    </div>
                                                    <br>

                                                    <select class="form-control" name="chkstatus" id="chkstatus">
                                                        <option value="none" selected=""></option>
                                                        <option value="Waiting for Approval">Waiting for Approval</option>
                                                        <option value="Approved">Approved</option>
                                                    </select>
                                                </div>

                                                <div class="form-group checknodiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Check No</label>
                                                        <input type="text" class="input-sm form-control checkno" id="checkno"/>
                                                </div>

                                                <div class="form-group userdiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Username</label>
                                                        <input type="text" class="input-sm form-control susername" id="susername"/>
                                                </div>

                                                <div class="form-group paytodiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Pay To</label>
                                                        <input type="text" class="input-sm form-control payto" id="payto"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-material float-right" style="right:0px; position: absolute;">    
                                                 <button type="button" style="float:left; margin-left:0px;" class="btn btn-default btn-primary btnSearchChk" id="btnSearchChk">Search</button>
                                        </div> 
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Check No.</th>
                                            <th>Amount</th>
                                            <th>Username</th>
                                            <th width="90">Check Status</th>
                                            <th>Issued To</th>
                                            <!-- <th width="70">Action</th> -->
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
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add New Inventory Item</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Inventory Name <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="inventory_name" type="text" class="form-control form-control-success" name="inventory_name" placeholder="Inventory Name">
                                                    <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Inventory Category <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <select id="inventory_category" type="text" class="form-control form-control-success" name="inventory_category" placeholder="Inventory Category">
                                                        <option value=""> -- Please Select Category --</option>
                                                        <?php
                                                            foreach ($categories as $category) {
                                                                ?>
                                                                    <option value="<?= $category['id']?>"><?= $category['description']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Unit <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <select id="unit" type="text" class="form-control form-control-success" name="unit" placeholder="Item Unit">
                                                        <option value=""> -- Please Select Unit of Measurement --</option>
                                                        <?php
                                                            foreach ($uoms as $uom) {
                                                                ?>
                                                                    <option value="<?= $uom['id']?>"><?= $uom['description']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Reorder Point<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="reorder_point" type="text" class="form-control form-control-success" name="reorder_point" placeholder="Reorder Point">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Reorder Value<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="reorder_value" type="text" class="form-control form-control-success" name="reorder_value" placeholder="Inventory Name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">GL Account <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <select id="gl_account" type="text" class="form-control form-control-success" name="gl_account" placeholder="Item Unit">
                                                        <option value=""> -- Please Select GL Account --</option>
                                                        <?php
                                                            foreach ($gl_accounts as $gl_account) {
                                                                ?>
                                                                    <option value="<?= $gl_account['id']?>"><?= $gl_account['description']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Barcode</label>
                                                <div class="col-md-10">
                                                    <input id="barcode" type="text" class="form-control form-control-success" name="barcode" placeholder="Bar Code">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Other Info</label>
                                                <div class="col-md-10">
                                                    <textarea id="other_info" type="text" class="form-control form-control-success" name="other_info" placeholder="Other Info"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    
                                                </div>
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
                                <input type="submit" style="float:right" class="btn btn-success" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
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
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="delete_item_form" method="post" action="<?= base_url();?>Main_inventory/delete_item">
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
<script type="text/javascript" src="<?=base_url('assets/js/account/check_transaction_release_history.js');?>"></script>

