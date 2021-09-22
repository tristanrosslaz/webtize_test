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

<div class="content-inner" id="pageActive" data-num="6" data-namecollapse="" data-labelname="Manufacturing">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/manufacturing_home/'.$token);?>">Manufacturing</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Material Balance</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex">

                            <div class="col-md-12 row">

                                <div class="form-group-material" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Search Filter</label>
                                    <select class="form-control col-md-12 divsearchfilter" name="divsearchfilter" id="divsearchfilter">
                                        <option selected value="1">Search by ID No.</option>
                                        <option value="2">Search by Name</option>
                                    </select>
                                </div>                                

                                <div class="form-group-material dividno" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">ID</label> 
                                    <input type="text" data-column="0" class="input-sm form-control material_josh idSearch"  name="idSearch" placeholder="ID No..">
                                </div>

                                <div class="form-group-material divname" style="padding-left:10px; display: none;">
                                    <label class="form-control-label col-form-label-sm">Name</label> 
                                    <input type="text" data-column="1" class="input-sm form-control material_josh itemnameSearch"  name="itemnameSearch" placeholder="Name..">
                                </div>                                

                                <div class="form-group-material divname" style="padding-left:10px; display: none;">
                                    <label class="form-control-label col-form-label-sm">Unit</label>
                                    
                                    <select class="form-control col-md-12 unitSelect" name="unitSelect" id="unitSelect" data-column="2">
                                        <option selected value="">All</option>
                                        <?php foreach ($get_units as $value):?>
                                        <option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group-material divname" style="padding-left:10px; display: none;">
                                    <label class="form-control-label col-form-label-sm">Category</label>
                                    
                                    <select class="form-control col-md-12 catSelect" name="catSelect" id="catSelect" data-column="3">
                                        <option selected value="">All</option>
                                        <?php foreach ($get_category as $value):?>
                                        <option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>                            

                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="form-group-material row float-right" style="right:40px; position: absolute; top:20px;">
                                        <button type="button" class="btn btn-primary searchBtn">Search</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-primary addItem">Add Item</button>
                               </div>

                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Unit</th>
                                            <th>Category</th>
                                            <th width="60">Action</th>
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

    <div id="viewMaterialBalanceModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewIngredientlistModal">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Material Balance</h4>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">

                                <div class="row col-lg-12">
                                    <div class="row col-lg-12">
                                        <label style="color: gray; font-weight: lighter;">Bill of Materials Information</label>
                                    </div>

                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div>
                                                <label>Item: </label>
                                                <br>
                                                <label>Unit: </label>
                                            </div>
                                    
                                            <span style="margin: 3%;"></span>

                                            <div>
                                                <strong><label class="lblItemname"></label></strong>   
                                                <br>
                                                <label class="lblUnit"></label>      
                                            </div>
                                        </div>

                                    </div>
                                </div>                                

                                <div class="table-responsive margin-top-20">
                                    <table class="table  table-striped table-hover table-bordered" id="table-materials"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Qty</th>
                                                <th>Unit</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <!-- NOTES -->
                                <div class="form-group">
                                    <label class="form-control-label col-md-4">Notes</label>
                                    <textarea class="form-control txtareaview" rows="3" placeholder="Notes..." id="txtareanotes" readonly="readonly" style="resize: none;"></textarea>
                                </div>                                                                            

                                <div class="modal-footer">
                                    <div class="row float-right">       
                                            <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                    </div>
                                </div>

                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewMaterialBalanceModal -->

     <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewDeformModal">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Bill of Materials Information</h4>
                </div>
                    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                        
                                <div class="col-lg-12">     
                                    <form id="addRow">
                                        <div class="col-lg-12">
                                            <div class="row col-lg-12">
                                                <!-- SELECT Ingredients Location -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-lg-12">Select Inventory<span class="asterisk" style="color:red">*</span></label>
                                                
                                                    <select class="form-control required_fields col-lg-12 select2" name="inv" id="inv" style="width: 200px !important;">
                                                        <option selected value="">-- Select Inventory --</option>
                                                        <?php foreach ($get_inventory as $value):?>
                                                        <option data-unit="<?php echo $value['description']?>" data-itemname="<?php echo($value['itemname'])?>" value="<?php echo $value['id']?>"><?php echo($value['itemname'])?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>  
                                            </div>                                                                                         
                                        </div>
                                    </form> <!-- addRow -->
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="form-group row float-right">       
                                        <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-primary proceedBtn">Proceed</button>
                                    </div>
                                </div>

                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- addItemModal -->        

    <div id="addMaterialBalance" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Material Balance</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">

                                    <div class="row col-lg-12">
                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Bill of Materials Information</label>
                                        </div>

                                        <div class="col-lg-12">

                                            <div class="row">
                                                <div>
                                                    <label>Item: </label>
                                                    <br>
                                                    <label>Unit: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblItemnameadd"></label>   
                                                    <br>
                                                    <label class="lblUnitadd"></label>      
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#viewAddrowModal" id="add_item_btn" class="btn btn-primary btnUpdate" name="update" style="right:20px; position: absolute;">
                                <i class="fa fa-plus"></i>
                                Add Row
                                </button>
                                <br><br><br>                                            

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered" id="table-materials-edit"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Qty</th>
                                                <th>Unit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>                                         

                                <!-- NOTES -->
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4">Notes</label>
                                    
                                    <textarea class="form-control txtarea" rows="3" placeholder="Notes..." id="txtareanotes"></textarea>
                                </div>                                                                                                                     
                                
                                <div class="modal-footer">
                                    <div class="form-group row" style="float:right; margin-right:10px;">       
                                        <div style="padding-right: 3px;">
                                            <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                        
                                        <div class="btnPrintWin">
                                            <button type="button" class="btn btn-success updateMatBtn"><i class="fa fa-edit"></i> Update Material Balance</button>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- addMaterialBalance -->

     <div id="viewAddrowModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewDeformModal">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add row</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                        
                                <div class="col-lg-6 center_margin">     
                                    <form id="addRow">
                                                        
                                        <div class="col-lg-12">

                                            <!-- Itemname -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-12">Item</label> 
                                            
                                                <input type="text" class="form-control material_josh required_fields form-control-sm col-md-12" name="item" id="item" placeholder="Itemname"/>
                                            </div>
                                                        
                                            <!-- QTY -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-12">Quantity</label> 
                                            
                                                <input type="text" class="form-control material_josh required_fields form-control-sm col-md-12" name="qty" id="qty" oninput="validity.valid||(value='');" min="" placeholder="Quantity">
                                            </div>                                                     
                                                                                        
                                        </div>

                                    </form>
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="form-group row" style="float:right; margin-right:10px;">       
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                        
                                        <div class="col-md-6 btnSave">
                                            <button type="button" class="btn btn-success add_inventory_modal">Add Inventory</button>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewAddrowModal -->    
<!-- </div> -->

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/manufacturing/material balance/manufacturing_material_balance.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->