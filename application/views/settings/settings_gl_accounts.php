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
<div class="content-inner" id="pageActive" data-num="8" data-namecollapse="" data-labelname="Settings"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/settings_home/'.$token);?>">Settings</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">GL Accounts</li>
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
                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">GL Accounts</label>
                                                <input type="text" class="form-control material_josh form-control-sm search-input-text searchAccount" placeholder="Description">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Account Type</label>
                                                <input type="text" class="form-control material_josh form-control-sm search-input-text searchType" placeholder="Type">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addGLAccountsModal" class="btn btn-primary btnClickAddGLAccounts" style="right:20px; position: absolute; top:20px;">Add GL Accounts</button>
                            <button class="btn btn-primary btnSearch" style="right:170px; position: absolute; top:20px;">Search</button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">ID</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Account Code</th>
                                            <th width="190">Action</th>
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
    <div id="addGLAccountsModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add New GL Accounts</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">??</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_gl_accounts-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">GL Accounts<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input id="info_desc" type="text" class="form-control form-control-success" name="info_desc"><small class="form-text">Description</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Type<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <select id="info_type" class="form-control form-control-success" name="info_type" tabindex="2">
                                                        <option value="">-- Select GL Account --</option>
                                                        <!--<option value="none">-- Select GL Account --</option>-->
                                                        <option value="Assets">Assets</option>
                                                        <option value="Bank">Bank Account</option>
                                                        <option value="Costs">Cost of Goods Sold</option>
                                                        <option value="Expenses">Expenses</option>
                                                        <option value="Equity">Equity</option>
                                                        <option value="Income">Income</option>
                                                        <option value="Liabilities">Liabilities</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Account Code<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input id="accountcode" type="text" class="form-control form-control-success accountcode" name="accountcode">
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
                                <button type="button" style="float:right" class="btn btn-success saveBtnGLAccounts">Add GL Accounts</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="viewGLAccountsModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Update GL Accounts</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">??</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="update_gl_accounts-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">GL Accounts<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input type="hidden" name="info_id" class="info_id">
                                                    <input id="info_desc" type="text" class="form-control form-control-success info_desc" name="info_desc" >
                                                    <small class="form-text">Description</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Type<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <select id="info_type" class="form-control form-control-success info_type" name="info_type" tabindex="2">
                                                        <option value="none">-- Select GL Account --</option>
                                                        <option value="Assets">Assets</option>
                                                        <option value="Bank">Bank Account</option>
                                                        <option value="Costs">Cost of Goods Sold</option>
                                                        <option value="Expenses">Expenses</option>
                                                        <option value="Equity">Equity</option>
                                                        <option value="Income">Income</option>
                                                        <option value="Liabilities">Liabilities</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Account Code<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input id="accountcode" type="text" class="form-control form-control-success accountcode" name="accountcode">
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
                                <button type="submit" style="float:right" class="btn btn-primary updateBtnGLAccounts">Save Changes</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="deleteGLAccountsModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete GL Accounts</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">??</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="delete_gl_accounts-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record <br>(<bold class="info_desc"></bold>) ?</p>
                                    <input type="hidden" class="del_id" name="del_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteGLAccountsBtn">Delete Record</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/settings/settings_gl_accounts.js');?>"></script>

