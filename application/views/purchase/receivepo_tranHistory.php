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
<div class="content-inner contento" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Receive PO Transaction History"> 

 <div class="bc-icons-2 card mb-4">
    <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
        <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
        <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
        <li class="breadcrumb-item active">Receive PO Transaction History</li>
    </ol>
</div>
<section class="tables">   
    <div class="container-fluid">
        <div class="row">   
            <div class="col-lg-12">
                <div class="card">
                 <div class="">
                    <div class="card-header d-flex align-items-center">
                     <div class="col-lg-12" style="padding: 0">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label col-form-label-sm">Select Filter</label>
                                    <select id="sosearchfilter" class="form-control sosearchfilter">
                                      <option value="podatediv">Search by Date</option>
                                      <option value="ponodiv">Search by PO No</option>
                                      <option value="porcvnodiv">Search by PO Receive No</option>
                                  </select>              
                              </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group row">

                                <div class="podatediv" id="podatediv">
                                    <label class="form-control-label col-form-label-sm">Date</label>
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" id="datefrom" class="input-sm form-control material_josh search-input-select1 searchDateTo" value="<?=today_text();?>" name="start" readonly/>
                                        <span class="input-group-addon" style="background-color:#fff; border:none;">to</span>
                                        <input type="text" id="dateto" value="<?=today_text();?>" class="input-sm form-control material_josh search-input-select2 searchDateFrom" name="end" readonly/>    
                                    </div>   
                                </div>
                                <div class="ponodiv" id="ponodiv" style="display: none;">
                                    <label class="form-control-label col-form-label-sm">PO No.</label>
                                    <input type="text" class="input-sm form-control material_josh search-input-text search_pono" id="search_pono" placeholder="PO Number.." onkeypress="return isNumberKeyOnly(event)" /> 
                                </div>
                                <div class="porcvnodiv" id="porcvnodiv" style="display: none;">
                                    <label class="form-control-label col-form-label-sm">PO Receive No.</label>
                                    <input type="text" class="input-sm form-control material_josh search-input-text search_rcvno" id="search_rcvno" placeholder="PO Receive Number.." onkeypress="return isNumberKeyOnly(event)" /> 
                                </div>

                            </div>
                        </div>
                        <div class="col-lg col-12" style="padding-left: 0">
                            <div class="pull-right">
                                <label class="form-control-label col-form-label-sm "></label>
                                <button type="submit" id="search_order" class="btn btn-primary search_order">Search</button>   
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
            <div class="table-responsive">
                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                    <thead>
                        <tr>           
                            <th width="50">Date</th>
                            <th width="50">Receive No.</th>
                            <th width="50">PO No.</th>
                            <th>Supplier</th>
                            <th width="50">Ref. No.</th>
                            <th width="80">Status</th>
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

<div id="deletePOReceiveModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="exampleModalLabel" class="modal-title">Action</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal personal-info-css" id="add_salesorder-form">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <center><p style="padding: 8px; line-height: 25px;">Are you sure you want to proceed with deletion of PO Receive No. <br>(<bold class="del_rcvno"></bold>)? </h5></p>
                                <input type="" class="del_rcvno" name="del_rcvno" value="" hidden>
                                <input type="" class="rcvno" name="rcvno" value="" hidden>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary deletePOReceiveBtn" id="deletePOReceiveBtn" aria-label="Close" type="button" >Delete</button>
                                    <button type="button" style="float:right; margin-left:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="approvePOReceiveModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Action</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal personal-info-css" id="add_salesorder-form">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <center><p style="padding: 8px; line-height: 25px;">Are you sure you want to proceed with approval of PO Receive No. <br>(<bold class="app_rcvno"></bold>)? </h5></p>
                                    <input type="" class="app_rcvno" name="app_rcvno" value="" hidden>
                                    <input type="" class="rcvno" name="rcvno" value="" hidden>
                                    <input type="" class="poreceive_id" name="poreceive_id" value="" hidden>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary approvePOReceiveBtn" id="approvePOReceiveBtn" aria-label="Close" type="button" >Approve</button>
                                        <button type="button" style="float:right; margin-left:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('includes/footer'); ?>
        <script type="text/javascript" src="<?=base_url('assets/js/purchase/receivepo_tranHistory.js');?>"></script>
