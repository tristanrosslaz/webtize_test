<?php
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
?>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="4" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/inventory_home/'.$token);?>">Inventory</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Inventory Location Transfer Receive</li>
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
                                    <div class="form-group">
                                        <label class="form-control-label col-form-label-sm">Search Filter</label>
                                        <select class="form-control" name="divsearchfilter" id="divsearchfilter">
                                            <option value="divdate">Search by Date</option>
                                            <option value="dividno">Search by ILT No.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="form-group dividno" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">ILT No.</label>
                                            <input type="text" class="input-sm form-control allownumericwithoutdecimal idnosearch" id="idnosearch" placeholder="ILT Number.." />
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
                        </div>
                        <div class="card-body">
                            <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">    
                                <button type="button" class="btn btn-primary searchBtn">Search</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="90">Date</th>
                                            <th width="70">ILT No.</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th width="90">Total Quantity</th>
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

    <div id="receiveItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog  col-md-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">ILT Receive Quantity</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="receiveForm" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4">ILT No.:</label>
                                    <input type="text" class="form-control form-control-sm search-input-text search col-md-6 allownumericwithoutdecimal" id="iltno" name="iltno" onpaste="return false;" placeholder="0.00" readonly="true">
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4">ITL Quantity.:</label>
                                    <input type="text" class="form-control form-control-sm search-input-text search col-md-6" id="totalqty" name="totalqty"  onpaste="return false;" placeholder="0.00" readonly="true">
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4">Receive Quantity:<span style="color:red">*</span></label>
                                    <input type="text" class="form-control form-control-sm search-input-text search col-md-6 allownumericwithoutdecimal" id="iltqty" name="iltqty" onpaste="return false;" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right" class="btn btn-primary saveILTbtn">Receive</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
<?php $this->load->view('includes/footer');?>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_ilt_receive.js');?>"></script>

