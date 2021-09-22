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
            <li class="breadcrumb-item active">Inventory Pricing</li>
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
                                        <option value="divall">Search All Item</option>
                                        <option value="dividno">Search by Item Code</option>
                                        <option value="divname">Search by Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="form-group dividno" style="display:none;">
                                        <label class="form-control-label col-form-label-sm">Item Code</label>
                                        <input type="text" class="input-sm form-control search-input-text idnosearch" id="idnosearch" placeholder="Item Code.." />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group divname" style="display:none;">
                                        <label class="form-control-label col-form-label-sm">Name</label>
                                        <input type="text" class="input-sm form-control search-input-text nameSearch" id="nameSearch"  placeholder="Name.." />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">    
                                <button type="button" class="btn btn-primary searchBtn">Search</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="20">ID</th>
                                            <th>Name</th>
                                            <th width="90">Unit</th>
                                            <th width="90">Category</th>
                                            <th width="70">Action</th>
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

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_pricing_list.js');?>"></script>

