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
     z-index: 1 !important; 
    }

    .select2 {
            width: calc(100%) !important;
            margin-left: 0;
        }

         .col-md-6.form-collect{
            margin: auto !important;
            width: 50% !important;     
            background-color: #f5f5f5 !important;   
            padding: 0 !important; 
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;
        } 

        span.select2.select2-container.select2-container--default {
            width: 100% !important;
        }
        }

    /* Small Devices, Tablets */
    @media only screen and (min-width : 768px) {
        
        .select2 {
            width: calc(74% - 43px) !important;
            margin-left: 0;
        }

        span.select2.select2-container.select2-container--default {
            width: 66% !important;
        }
</style>


<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Supplier Limit Purchases</li>
        </ol>
    </div>
    <section class="tables interface1">   
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
                                                <br>
                                                <select class="form-control"  name="divsearchfilter" id="divsearchfilter">
                                                    <option value="dividno">Search by ID No.</option>
                                                    <option value="divname">Search by Supplier Name</option>
                                                </select>
                                            </div>
                               
                                    </div>


                                    <div class="col-md col-12">
                                        <!-- <div class="row"> -->
                                             <div class="form-group dividno" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">ID No.</label>
                                                <input type="text" class="input-sm form-control search-input-text idnosearch" data-column="1" id="idnosearch" onkeypress="return isNumberKeyOnly(event)" placeholder="ID Number.." />
                                            </div>
                                        <!-- </div> -->


                                        <!-- <div class="row"> -->
                                             <div class="form-group divname" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Name</label>
                                                <input type="text" class="input-sm form-control search-input-text nameSearch" data-column="2" id="nameSearch"  placeholder="Name.." />
                                            </div>
                                        <!-- </div> -->

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
                                            <th>Supplier Name</th>
                                            <th>Date</th>
                                            <th>Limit Amount</th>
                                            <th>Limit status</th>
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

    <div id="viewSupplierinfo" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewVehicle">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Supplier Limit</h1>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">

                                    <div class="row col-lg-12">

                                        <div class="col-lg-12">

                                            <div class="row">
                                                <div>
                                                    <label>Supplier Name: </label>
                                                    <br>
                                                    <label>Start Date: </label>
                                                    <br>
                                                    <label>End Date: </label>
                                                    <br>
                                                    <label>Limit Amount: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblSupplier"></label>   
                                                    <br>
                                                    <label class="lblStart"></label>   
                                                    <br>
                                                    <label class="lblEnd"></label>
                                                    <br>
                                                    <label class="lblAmount"></label>   
                                                </div>
                                            </div>

                                        </div>

                                    </div>                                                                                   

                                    <div class="modal-footer">
                                        <div class="form-group row float-right">       
                                            <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                    </div> <!-- modal footer -->
                                
                                </div> <!-- card body -->   
                            </div>
                        </div>
                    </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewIngredientlistModal -->

    <section class="tables inter2">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6  center_margin">   

                                    <form id="frmSupplierLimit">
                                        <!-- <div class="col-lg-12 margin-top-20"> -->

                                            <div id="collectdiv" class="col-md-12 form-collect card" style="background-color: #fff !important; padding: 0;">
                                                    <h6 class="px-4 py-3 primary-bg white-text">Supplier Limit Purchases Information</h6>
                                            <div class="p-4">



                                  
                                            <!-- SUPPLIER NAME -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Supplier Name<span class="" style="color:red">*</span></label>
                                                <select class="form-control col-md-8 select2 required_fields" name="addsupplier" id="addsupplier">
                                                    <option selected value="">-- Select Supplier--</option>
                                                    <?php foreach ($get_supplier as $value):?>
                                                    <option value="<?php echo $value["id"]?>"><?php echo strtoupper($value["suppliername"])?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>                                    

                                            <!-- START DATE -->    
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Start Date<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control required_fields col-md-8 form-control-success datepicker-before" name="addstart" id="addstart" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                            </div>

                                            <!-- END DATE -->    
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">End Date<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control required_fields col-md-8 form-control-success datepicker-after" name="addend" id="addend" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                            </div>                                            

                                            <!-- Limit Amount -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Amount<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control required_fields material_josh form-control-sm search-input-text search col-md-8 amount allownumericwithdecimal" name="addamount" id="addamount" oninput="validity.valid||(value='');" min="" placeholder="0.00">
                                            </div>

                                            <div class="form-group row float-right">
                                                <button class="btn blue-grey backBtn" type="button">Cancel</button>
                                                <span style="margin:5px;"></span>
                                                <button id="BtnSaveCollection " class="btn btn-primary float-right saveBtn"> Save Supplier Limit Purchases </button> 
                                            </div>
                                            
                                               </div>
                                            </div>
                                        </div> <!-- padding 20 -->        
                                    </form>
  
                </div> <!-- col 12 -->                
            </div>
        </div>
    </section>

     <div id="confirmationBox" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="confirmationBox">

        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Delivery Vehicle</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete delivery vehicle maintenance <br> (<bold class="confirmMsg"></bold>) ?</p>
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
<script src="<?=base_url('assets/js/entity/supplier/supplier_limit.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->