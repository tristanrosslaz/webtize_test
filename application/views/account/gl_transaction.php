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
   .datepicker {
        z-index:99999 !important;
    }

    .btn-primary {
        color: #fff !important; 
        background-color: #13496f !important;
        border-color: #13496f !important; 
    }
    .btn.disabled, .btn:disabled {
        cursor: not-allowed;
        opacity: 1;
    }
    .table-dark.table-bordered, .table-responsive>.table-bordered {
        border: 1px solid #dee2e6;
    }
 </style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">GL Transaction</li>
        </ol>
    </div>

    <section class="tables" id="details_div">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">GL Transaction Information</h6>
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-lg-12">
                                    <div class="col-12">
                                        <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addItemModal" id="add_row_btn" style="float:right; margin-right:-23px;" class="btn btn-primary btnUpdate btnTable" id="add_item_btn" name="update">
                                        <i class="fa fa-plus"></i>
                                            Add Row
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Debit Account</th>
                                            <th>Credit Account</th>
                                            <th width="90px">Action</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody id="t_body">

                                    </tbody> -->
                                </table>

                                <br><br>
                                <div class="col-md-3" style="float: right; padding-right: 0px;">
                                    <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total"> Total : <b id="total_label"> </a></button>
                                </div>
                                <br><br><br><br><br>
                            </div>
                        </div>
                    </div><button class="btn btn-block btn-primary float-right" id="submitgltransbtn" style="margin-top: 20px;">Save GL Transaction</button>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Modal-->
    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Entry</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="add_entry_form" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Date<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="t_date" name="t_date" readonly="true" class="form-control datepicker material_josh form-control-sm search-input-text search" placeholder="mm/dd/yyyy" value="<?=today_date();?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Description<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <input id="t_description" type="text" class="form-control form-control-success" name="t_description" placeholder="Description...">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Amount<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <input id="t_amount" type="number" onkeypress="return isNumberKeyOnly(event)" class="form-control form-control-success" name="t_amount" min="0" placeholder="0.00">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Debit Accounts<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <select id="t_debit_account" type="text" class="form-control form-control-success" name="t_debit_account" placeholder="Inventory Category">
                                                        <option value=""> -- Select GL Account --</option>
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
                                                <label class="col-md-4 form-control-label">Credit Accounts<span class="" style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <select id="t_credit_account" type="text" class="form-control form-control-success" name="t_credit_account" placeholder="Inventory Category">
                                                        <option value=""> -- Select GL Account --</option>
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

    <div id="confirmationModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Confirm</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Save all GL Transaction/s?</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="submit" style="float:right" class="btn btn-primary btnConfirm" id="btnConfirm">Confirm</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/gl_transaction.js');?>"></script>