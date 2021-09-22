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

<div class="content-inner contento" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Receive PO"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Receive PO</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-lg-12" style="padding-right: 0">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label col-form-label-sm">Select Filter</label>
                                            <select id="sosearchfilter" class="form-control sosearchfilter">
                                              <option value="podatediv">Search by Date</option>
                                              <option value="ponodiv">Search by Purchase Order No</option>
                                              <option value="posupplier">Search by Supplier</option>
                                              <option value="postatus">Delivery Status</option>
                                          </select>              
                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="form-group row">
                                        <div class="podatediv" id="podatediv">
                                            <label class="form-control-label col-form-label-sm">Date</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" data-column="0" class="input-sm form-control material_josh search-input-select1 searchDateFrom" value="<?=today_text();?>" name="start" />
                                                <span class="input-group-addon" style="background-color:#fff; border:none;">to</span>
                                                <input type="text" data-column="1" value="<?=today_text();?>" class="input-sm form-control material_josh search-input-select2 searchDateTo" name="end" />    
                                            </div>   
                                        </div>
                                        <div class="ponodiv" id="ponodiv" style="display: none;">
                                            <label class="form-control-label col-form-label-sm">Purchase No.</label>
                                            <input type="text" data-column="2" class="input-sm form-control material_josh search-input-text search_pono" placeholder="Purchase Number.." id="search_pono"/> 
                                        </div>
                                        <div class="posupplier" id="posupplier" style="display: none;">
                                            <label class="form-control-label col-form-label-sm">Supplier</label>
                                            <input type="text" data-column="3" class="input-sm form-control search-input-text search_supplier" placeholder="Supplier.." id="search_supplier"/> 
                                        </div>

                                        <div class="postatus" id="postatus" style="display: none">
                                            <label class="form-control-label col-form-label-sm">Delivery Status</label>
                                            <select id="search_status" data-column="4" class="input-sm form-control search-input-text search_status" >
                                              <option selected value="">Delivery Status</option>
                                              <option value="No Delivery">No Delivery</option>
                                              <option value="Partial Delivery">Partial Delivery</option>
                                              <option value="Full Delivery">Full Delivery</option>
                                          </select>
                                      </div>

                                        <!-- <div class="powarehouse" id="powarehouse" style="display: none">
                                                <label class="form-control-label col-form-label-sm">Warehouse Location</label>

                                                <select class="form-control search_warehouse" id="search_warehouse" name="search_warehouse" data-column="4">
                                                   <option selected value="">Select Warehouse Location</option>
                                                   <?php
                                                   foreach ($get_warehouse->result() as $gwarehouse) { ?>
                                                   <option value="<?=$gwarehouse->id?>"><?=$gwarehouse->description?></option>
                                                   <?php } ?>
                                                   ?>                              
                                               </select>
                                           </div> -->
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
                    <div class="table-responsive">
                        <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                            <thead>
                                <tr>     
                                    <th width="60px">Date</th>                    
                                    <th width="60px">PO No.</th>
                                    <th>Name</th>
                                    <th width="90px">Amount</th>
                                    <th width="80px">Delivery Status</th>
                                    <th width="80px">Action</th>
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

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/receive_po.js');?>"></script>
