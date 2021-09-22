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

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales Agent</li>
        </ol>
    </div>
    
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-3">
                                        <div class="form-group" >
                                            <label class="form-control-label col-form-label-sm">Search Filter</label>
                                            <select class="form-control" name="divsearchfilter" id="divsearchfilter">
                                                <option value="dividno">Search by ID No.</option>
                                                <option value="divname">Search by Name</option>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="col-md col-12">
                                             <div class="form-group dividno" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">ID No.</label>
                                                <input type="text" class="input-sm form-control search-input-text idnosearch" data-column="1" id="idnosearch" onkeypress="return isNumberKeyOnly(event)" placeholder="ID No.." />
                                            </div>
                                             <div class="form-group divname" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Name</label>
                                                <input type="text" class="input-sm form-control search-input-text nameSearch" data-column="2" id="nameSearch"  placeholder="Name.." />
                                            </div>
                                    </div>

                                    <div class="col-lg col-12" style="padding-left: 0">
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-primary searchBtn">Search</button>
                                            <span style="margin: 5px;"></span>
                                            <button type="button" data-target="#addSalesAgent" class="btn btn-primary addItem">Add Item</button>
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
                                            <th width="50">ID</th>
                                            <th>Name</th>
                                            <th>ID No.</th>
                                            <th width="130">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>                            

                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> <!-- col 12 -->                
            </div>
        </div>
    </section>

     <div id="addSalesAgent" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="addSalesAgent">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">New Sales Agent</h4>
                </div>
                    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                        
                                <div class="col-lg-12 center_margin">     
                                    <form id="newAgent">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group-material row">
                                                        <label class="form-control-label col-form-label-sm">Name</label> 
                                                        <input type="text" data-column="1" class="input-sm form-control required_fields material_josh name"  name="name">
                                                    </div> 

                                                    <div class="form-group-material row">
                                                        <label class="form-control-label col-form-label-sm">ID No.</label> 
                                                        <input type="text" data-column="0" class="input-sm form-control material_josh idSearch required_fields idno"  name="idno">
                                                    </div>
                                                </div>  
                                            </div>                                                                                         
                                        </div>
                                    </form> <!-- addRow -->
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="form-group row float-right margin-top-20">       
                                        <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-primary saveBtn">Save Record</button>
                                    </div>
                                </div>

                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- addItemModal -->        

     <div id="editSalesAgent" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="editSalesAgent">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Sales Agent Upadate</h4>
                </div>
                    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                        
                                <div class="col-lg-12 center_margin">     
                                    <form id="updateAgent">
                                        <div class="col-lg-12">
                                            <div class="row">


                                                <div class="form-group">
                                                    <div class="form-group-material row" style="padding-left:10px;">
                                                        <label class="form-control-label col-form-label-sm">Name</label> 
                                                        <input type="text" class="input-sm form-control material_josh editname required_fields"  name="editname">
                                                    </div> 

                                                    <div class="form-group-material row" style="padding-left:10px;">
                                                        <label class="form-control-label col-form-label-sm">ID No.</label> 
                                                        <input type="text" class="input-sm form-control material_josh editidno required_fields"  name="editidno">

                                                        <input type="text" class="input-sm form-control material_josh editidno1 required_fields"  name="editidno" hidden="true">


                                                    </div>
                                                </div>  


                                            </div>                                                                                         
                                        </div>
                                    </form> <!-- addRow -->
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="form-group row float-right margin-top-20">       
                                        <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-primary updateBtn">Update Record</button>
                                    </div>
                                </div>

                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- addItemModal -->

     <div id="confirmationBox" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="confirmationBox">

        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Agent</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete agent <br> (<bold class="confirmMsg"></bold>) ?</p>
                                    <input type="hidden" class="del_id" name="del_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row float-right">       
                                <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <span style="margin: 5px;"></span>
                            <button type="button" class="btn btn-primary deleteBtn" style="margin-right: 10px;">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- addItemModal -->  




<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/entity/sales_agent/entity_salesagent.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->