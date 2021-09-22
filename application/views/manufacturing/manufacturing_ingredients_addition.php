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
      z-index:2 !important;
    }
</style>
<div class="content-inner" id="pageActive" data-num="6" data-namecollapse="" data-labelname="Manufacturing">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/manufacturing_home/'.$token);?>">Manufacturing</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Ingredients Addition</li>
        </ol>
    </div>
    
    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 center_margin">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Ingredients Addition Information</h6>
                        <div class="card-body">
                            
                            <div class="col-lg-12">
                                <div>        
                                    <form id="frmaddIngredients">
                                        <div class="col-lg-12">
                                              
                                            <!-- PREP DATE -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Preperation Date<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control col-md-8 form-control-success required_fields datepicker" name="prepDate" id="prepDate" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                            </div>
                                
                                            <!-- BUILD DATE -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Build Date<span class="" style="color:red">*</span></label> 
                                                <input type="text" class="form-control col-md-8 form-control-success required_fields datepicker" name="buildDate" id="buildDate" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                            </div>

                                            <!-- SELECT Ingredients Location -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Ingredients Location<span class="" style="color:red">*</span></label>
                                                <select class="form-control required_fields col-md-8" name="ing" id="ing">
                                                    <option selected value="">-- Select Build Location --</option>
                                                    <?php foreach ($get_location as $value):?>
                                                    <option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            
                                            <!-- MDF NO -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">MDF No.<span class="" style="color:red">*</span></label> 
                                                <input type="text" class="form-control col-md-8 form-control-success allownumericwithoutdecimal mdfno required_fields" name="mdfno" id="mdfno">
                                            </div>                                                                               

                                            <div class="float-right row margin-top-20">
                                                <button class="btn btn-primary proceedBtn">Proceed</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- interface1 -->
                            </div> <!-- center margin -->
                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> 
            </div>
        </div>    
    </section> <!-- tables -->

    <section class="tables interface2">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row col-lg-12">

                                <div class="row col-lg-12 margin-top-20">
                                    <label style="color: gray; font-weight: lighter;">Ingredients Addition Information</label>
                                </div>

                                <div class="col-lg-6">

                                    <div class="row">
                                        <div>
                                            <label>Preperation Date: </label>
                                            <br>
                                            <label>Build Date: </label>
                                            <br>
                                            <label>Ingredients Location: </label>
                                            <br>
                                            <label>Build Location: </label>
                                        </div>
                                    
                                        <span style="margin: 3%;"></span>

                                        <div>
                                            <label class="lblprepDate"></label>   
                                            <br>
                                            <label class="lblbuildDate"></label>   
                                            <br>
                                            <label class="lblIngredients"></label>
                                            <br>
                                            <label class="lblBuild"></label>   
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div>
                                            <label>MDF No.: </label>
                                        </div>
                                    
                                        <span style="margin: 3%;"></span>

                                        <div>
                                            <strong><label class="lblMDF"></label></strong>      
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tbl-details margin-top-20">

                                <div class="form-group-material" style="right:20px; position: absolute; top:20px;">
                                    <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#viewAddrowModal" id="add_item_btn" class="btn btn-primary btnUpdate btnTable " name="update">
                                        Add Item
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="60">ID</th>
                                                <th>Item Name</th>
                                                <th>Qty</th>

                                                <th>Unit</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th width="50">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control txtarea" rows="3" style="resize: none;" placeholder="Notes..." id="txtareanotes"></textarea>
                                </div>
                            </div> <!-- tbl-details -->

                            <div class="form-group float-right margin-top-20">
                                <button type="submit" class="btn btn-primary btnSaveIngredient">Save Ingredients Addition</button>
                            </div> 
                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> 
            </div>
        </div>    
    </section> <!-- tables -->    

     <div id="viewAddrowModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewDeformModal">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add item</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                        
                                <div class="col-lg-12">     
                                    <form id="addRow">
                                        <div class="col-lg-12">

                                            <!-- Itemname -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-12">Item<span class="" style="color:red">*</span></label> 
                                                <input type="text" class="form-control material_josh required_fields form-control-sm col-md-12" name="item" id="item" placeholder="Itemname"/>
                                            </div>
                                                        
                                            <!-- QTY -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-12">Quantity<span class="" style="color:red">*</span></label> 
                                                <input type="text" class="form-control allownumericwithdecimal material_josh required_fields form-control-sm col-md-12 qty" name="qty" id="qty" oninput="validity.valid||(value='');" min="" placeholder="Quantity">

                                                <input type="text" class="form-control allownumericwithdecimal price required_fields form-control-sm col-md-12 price" name="price" id="price" oninput="validity.valid||(value='');" min="" placeholder="Price" value="100">
                                            </div>                                                     
                                                                                         
                                        </div>
                                    </form>
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="form-group row float-right">       
                                        <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-primary add_inventory_modal">Add Inventory</button>
                                    </div>
                                </div>
                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div>


    
<br><br><br><br><br><br>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/manufacturing/ingredients addition/manufacturing_ingredients_addition.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->