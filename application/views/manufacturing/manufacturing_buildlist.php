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
    <!-- Page Header-->

<div id="ajaxbusy" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left" name="ajaxbusy" data-backdrop="static" data-keyboard="false">

<div class="center_image">
<center>
    <img src="<?=base_url('assets/img/loader.gif');?>" style="margin: auto; vertical-align: center; width: 80px; height: 80px;">   
    <h3>Loading...</h3>
</center>
</div>

</div>
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/manufacturing_home/'.$token);?>">Manufacturing</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Build Inventory Transaction History</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="col-lg-12 row" >

                                <div class="form-group-material">
                                    <label class="form-control-label col-form-label-sm">Search Filter</label>
                                    <select class="form-control col-md-12 divsearchfilter" name="divsearchfilter" id="divsearchfilter">
                                        <option selected value="divdate">Search by Date</option>
                                        <option value="divbuildno">Search by Build No.</option>
                                        <option value="divitemname">Item Name</option>
                                    </select>
                                </div>

                                <div class="form-group-material divdate" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Date</label>
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" data-column="0" class="input-sm form-control material_josh search-input-select1" value="<?=today_text()?>" name="start" />
                                            <span class="input-group-addon" style="background-color:#fff0; border:none; margin: 5px;">to</span>
                                            <input type="text" data-column="1" class="input-sm form-control material_josh search-input-select2" value="<?=today_text()?>" name="end" />
                                        </div>
                                </div>

                                <div class="form-group-material divbuildno" style="padding-left:10px; display: none;">
                                    <label class="form-control-label col-form-label-sm">Build No.</label> 
                                    <input type="text" data-column="2" class="input-sm form-control material_josh buildnosearch"  name="buildnosearch" placeholder="Build No..">
                                </div>

                                <div class="form-group-material divitemname" style="padding-left:10px; display: none;">
                                    <label class="form-control-label col-form-label-sm">Item name</label> 
                                    <input type="text" data-column="3" class="input-sm form-control material_josh itemsearch"  name="itemsearch" placeholder="Item name..">
                                </div>

                                <div class="form-group-material divlocation" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Location</label>
                                    <select class="form-control col-md-12 locationsearch" name="locationsearch" id="locationsearch" data-column="4">
                                        <option selected value="">All</option>
                                        <?php foreach ($get_location as $value):?>
                                        <option value="<?php echo $value['description']?>"><?php echo($value['description'])?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                            </div>                            
                        </div>

                        <div class="card-body">
                            <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">
                                <button type="button" class="btn btn-primary searchBtn btnTable">Search</button>
                            </div>

                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="100">Date</th>
                                            <th>Build No.</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th>Item</th>
                                            <th>Location</th>
                                            <th width="170">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>                            
                        </div><!-- card body -->


                    </div><!-- card -->
                </div> <!-- col 12 -->                
            </div>
        </div>
    </section>

    <div id="viewBuildlistModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewBuildlistModal">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="buildNo"></h1>
                    <h2 class="tranDate lighter"></h2>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>

                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="row col-lg-12">
                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Build Information </label>
                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Preperation Date: </label>
                                                    <br>
                                                    <label>Build Date: </label>
                                                    <br>
                                                    <label>Quantity: </label>  
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblprepDate"></label>   
                                                    <br>
                                                    <label class="lblbuildDate"></label>   
                                                    <br>
                                                    <label class="lblQty"></label>     
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Unit: </label> 
                                                    <br>
                                                    <label>Item Name: </label>
                                                    <br>
                                                    <label>Location: </label>  
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblUnit"></label>    
                                                    <br>
                                                    <strong><label class="lblItem"></label></strong>   
                                                    <br>
                                                    <label class="lbllocation"></label>   
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <br>

                                    <div class="table-responsive">
                                        <table class="table  table-striped table-hover table-bordered" id="table-build-view"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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

                                    <div class="modal-footer">
                                        <div class="row float-right">       
                                                <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                                <span style="margin: 5px;"></span>
                                                <button type="button" class="btn btn-primary printWin" aria-label="Close">Print</button>
                                        </div>
                                    </div>

                                    </div><!-- card body -->
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

     <div id="viewReschedModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left" name="viewReschedModal">
        <div role="document" class="modal-dialog modal-m modal-m-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Build Inventory Reschedule</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                        
                                        <div class="col-lg-12">
                                            <div class="interface1 margin-top-20">        
                                                <form id="frmbuildInventory">
                                                    <div class="col-lg-12">
                                                        <!-- PREP DATE -->
                                                        <div class="form-group row">
                                                            <label class="form-control-label col-md-4">Preperation Date</label>
                                                            <input type="text" class="form-control col-md-8 form-control-success datepicker" name="resched_prep_date" id="resched_prep_date" placeholder="mm/dd/yyyy" disabled>
                                                        </div>
                                
                                                        <!-- BUILD DATE -->
                                                        <div class="form-group row">
                                                            <label class="form-control-label col-md-4">Build Date</label> 
                                                            <input type="text" class="form-control required_fields col-md-8 form-control-success" name="resched_build_date" id="resched_build_date" placeholder="mm/dd/yyyy">
                                                        </div>

                                                        <!-- QTY -->
                                                        <div class="form-group row">
                                                            <label class="form-control-label col-md-4">Quantity</label> 
                                                            <input type="text" class="form-control material_josh form-control-sm col-md-8" name="resched_qty" id="resched_qty" placeholder="Quantity" disabled>
                                                        </div>


                                                        <!-- Unit -->
                                                        <div class="form-group row">
                                                            <label class="form-control-label col-md-4">Unit</label> 
                                                            <input type="text" class="form-control material_josh form-control-sm col-md-8" name="resched_unit" id="resched_unit" placeholder="Unit" disabled>
                                                        </div>

                                                        <!-- Itemname -->
                                                        <div class="form-group row">
                                                            <label class="form-control-label col-md-4">Item</label> 
                                                            <input type="text" class="form-control material_josh form-control-sm col-md-8" name="resched_item" id="resched_item" placeholder="itemname" readonly="readonly">
                                                        </div>

                                                        <!-- Location -->
                                                        <div class="form-group row">
                                                            <label class="form-control-label col-md-4">Location</label> 
                                                            <input type="text" class="form-control material_josh form-control-sm col-md-8" name="resched_location" id="resched_location" placeholder="location" disabled>
                                                        </div>

                                                        <!--HIDDEN VALUES -->

                                                        <!-- NOTES -->
                                                        <div class="row">
                                                            <label class="form-control-label col-md-4">Notes</label>
                                                            <textarea class="form-control txtarea" style="resize: none;" rows="3" placeholder="Notes..." readonly="readonly" id="resched_notes"></textarea>
                                                        </div>

                                                        <div class="form-group row">
                                                            <input type="hidden" class="form-control material_josh form-control-sm col-md-8" name="resched_buildno" id="resched_buildno" placeholder="buildno" disabled>
                                                        </div>

                                                        <div class="form-group row">
                                                            <input type="hidden" class="form-control material_josh form-control-sm col-md-8" name="resched_olddate" id="resched_olddate" placeholder="olddate" disabled>
                                                        </div>

                                                        <div class="form-group row">
                                                            <input type="hidden" class="form-control material_josh form-control-sm col-md-8" name="resched_itemid" id="resched_itemid" placeholder="itemid" disabled>
                                                        </div>

                                                        <!--HIDDEN VALUES -->                                                                                        

                                                    </div> <!-- padding 10 -->
                                                </form>
                                            </div> <!-- interface1 -->
                                        </div>                                       

                                            <div class="modal-footer">
                                                <div class="row float-right">       
                                                        <button type="button" class="btn blue-grey resched_cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                                        <span style="margin: 5px;"></span>
                                                        <button type="button" class="btn btn-primary resched_btn_save" aria-label="Close">Save</button>
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
    </div>

     <div id="viewDeformModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewDeformModal">
        <div role="document" class="modal-dialog modal-m modal-m-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Build Inventory Deform</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                        
                                <div class="col-lg-12">
                                    <div class="interface1 margin-top-20">        
                                        <form id="frmbuildInventory">
                                            <div class="col-lg-12">
                                                <!-- BUILD DATE -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Build Date</label> 
                                                    <input type="text" class="form-control col-md-8 form-control-success datepicker" name="deform_build_date" id="deform_build_date" placeholder="mm/dd/yyyy" disabled>
                                                </div>

                                                <!-- QTY -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Quantity</label> 
                                                    <input type="text" class="form-control material_josh form-control-sm col-md-8" name="deform_qty" id="deform_qty" placeholder="Quantity" disabled>
                                                </div>


                                                <!-- Unit -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Unit</label> 
                                                    <input type="text" class="form-control material_josh form-control-sm col-md-8" name="deform_unit" id="deform_unit" placeholder="Unit" disabled>
                                                </div>

                                                <!-- Itemname -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Item</label> 
                                                    <input type="text" class="form-control material_josh form-control-sm col-md-8" name="deform_item" id="deform_item" placeholder="itemname" readonly="readonly">
                                                </div>

                                                <!-- Location -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Location</label> 
                                                    <input type="text" class="form-control material_josh form-control-sm col-md-8" name="deform_location" id="deform_location" placeholder="location" disabled>
                                                </div>

                                                <!-- NOTES -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Notes</label>
                                                    <input type="text" class="form-control material_josh form-control-sm col-md-8" name="deform_notes" id="deform_notes" placeholder="Notes" disabled>
                                                </div>

                                                <!-- DEFORM QTY -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Deform quantity<span class="" style="color:red">*</span></label>
                                                    <input type="text" class="form-control required_fields allownumericwithdecimal material_josh form-control-sm col-md-8" name="deform_defqty" id="deform_defqty" oninput="validity.valid||(value='');" min="" placeholder="Deform quantity">
                                                </div>

                                                <!-- DEFORM TYPE -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Deform Type</label>
                                                    <select class="form-control col-md-8" name="deform_deftype" id="deform_deftype">
                                                        <option selected value="Siomai">Siomai</option>
                                                        <option value="Siopao">Siopao</option>
                                                        <option value="Sisig">Sisig</option>
                                                    </select>
                                                </div>

                                                <!-- REMARKS -->
                                                <div class="form-group row">
                                                    <label class="form-control-label col-md-4">Remarks</label>
                                                    <textarea class="form-control txtarea" rows="3" placeholder="Remarks..." id="deform_remarks" style="resize: none;"></textarea>
                                                </div>                                                         

                                                <!--HIDDEN VALUES -->
                                                <div class="form-group row">
                                                    <input type="hidden" class="form-control material_josh form-control-sm col-md-8" name="deform_buildno" id="deform_buildno" placeholder="buildno" disabled>
                                                </div>

                                                <div class="form-group row">
                                                    <input type="hidden" class="form-control material_josh form-control-sm col-md-8" name="deform_locid" id="deform_locid" placeholder="olddate" disabled>
                                                </div>

                                                <div class="form-group row">
                                                    <input type="hidden" class="form-control material_josh form-control-sm col-md-8" name="deform_itemid" id="deform_itemid" placeholder="itemid" disabled>
                                                </div>
                                                    <!--HIDDEN VALUES -->                                                                                         
                                            </div>
                                        </form>
                                    </div> <!-- interface1 -->
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="row float-right">       
                                            <button type="button" class="btn blue-grey deform_cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                            <span style="margin: 5px;"></span>
                                            <button type="button" class="btn btn-primary deform_btn_save" aria-label="Close">Save</button>
                                    </div>
                                </div>

                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewDeformModal -->
    

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/manufacturing/build inventory/manufacturing_buildlist.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->