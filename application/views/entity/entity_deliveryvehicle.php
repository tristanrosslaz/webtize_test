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

  <style> 
    .datepicker {
    z-index:2 !important;
    }
  </style>

  <style> 
    /* Extra Small Devices, Phones */ 
    @media only screen and (min-width : 480px) {
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
    }
  </style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Delivery Vehicle Maintenance</li>
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
                                            <select class="form-control " name="divsearchfilter" id="divsearchfilter">
                                                <option value="divdate" >Search by Date</option>
                                                <option value="divdelid">Search by Delivery Vehicle</option>
                                            </select>
                                        </div>
                                    </div>

                                <div class="col-md col-12">
                                             <div class="form-group divdate" style="display: none;">
                                               <label class="form-control-label col-form-label-sm">Date</label>
                                                <div class="input-daterange input-group " id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-select1" id="datefrom" value="<?=today_text();?>" readonly />
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="input-sm form-control search-input-select2" id="dateto" value="<?=today_text();?>" readonly/>
                                                </div>
                                             </div>

                                             <div class="form-group divdelid" style="display: none;">
                                               <label class="form-control-label col-form-label-sm">Delivery Vehicle</label>
                                                <select class="form-control  vehicle" name="vehicle" id="vehicle">
                                                    <option selected value="all">All Delivery Vehicle</option>
                                                    <?php foreach ($get_vehicle as $value):?>
                                                    <option value="<?php echo $value["id"]?>"><?php echo strtoupper($value["plateno"])?></option>
                                                    <?php endforeach;?>
                                                </select>
                                             </div>
                                </div>

                                <!-- <div class="form-group-material">
                                    <label class="form-control-label col-form-label-sm">Date</label>

                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control material_josh search-input-select1" value="<?=today_text()?>" name="start" />
                                        <span class="input-group-addon" style="background-color:#fff0; border:none; margin: 5px;">to</span>
                                        <input type="text" class="input-sm form-control material_josh search-input-select2"  value="<?=today_text()?>" name="end" />
                                    </div>
                                </div>


                                <div class="form-group-material" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Delivery Vehicle</label>
                                    
                                    <select class="form-control col-md-12 select2 vehicle" name="vehicle" id="vehicle">
                                        <option selected value="">All Delivery Vehicle</option>
                                        <?php foreach ($get_vehicle as $value):?>
                                        <option value="<?php echo $value["id"]?>"><?php echo strtoupper($value["plateno"])?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                                                
                                <div class="form-group-material">
                                    <label class="form-control-label col-form-label-sm">Category</label>
                                    <br>
                                    <select class="form-control col-md-12 maintenance" name="maintenance" id="maintenance">
                                        <option selected value="">All</option>
                                        <option value="Battery Maintenance">Battery Maintenance</option>
                                        <option value="Body Maintenance">Body Maintenance</option>
                                        <option value="Oil and Electrical">Oil and Electrical</option>
                                        <option value="Permits and Licenses">Permits and Licenses</option>
                                        <option value="Tire Maintenance">Tire Maintenance</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div class="form-group-material" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Status</label>
                                    
                                    <select class="form-control col-md-12 status" name="status" id="status">
                                        <option selected value="">All Status</option>
                                        <option value="OPEN">OPEN</option>
                                        <option value="CLOSED">CLOSED</option>
                                    </select>
                                </div> -->
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
                                            <th width="50">Date</th>
                                            <th width="110">Delivery Vehicle</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th width="500">Details</th>
                                            <th>Status</th>
                                            <th width="190">Action</th>
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

    <div id="viewVehicle" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewVehicle">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="lblticket"></h1>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">

                                    <div class="row col-lg-12">
                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Vehicle Details</label>
                                        </div>

                                        <div class="row col-lg-12">
                                            <h3 class="h3customerName"></h3>
                                        </div>

                                        <div class="col-lg-12">

                                            <div class="row">
                                                <div>
                                                    <label>Date: </label>
                                                    <br>
                                                    <label>Delivery Vehicle: </label>
                                                    <br>
                                                    <label>Amount: </label>
                                                    <br>
                                                    <label>Category: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblDate"></label>   
                                                    <br>
                                                    <label class="lblDelvehicle"></label>   
                                                    <br>
                                                    <label class="lblAmount"></label>
                                                    <br>
                                                    <label class="lblCategory"></label>   
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row col-lg-12 margin-top-20">
                                            <label style="color: gray; font-weight: lighter;">DETAILS</label>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div>
                                                    <p class="parDetails"></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>                                                                                   

                                    <div class="modal-footer">
                                        <div class="form-group row float-right">       
                                            <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                    </div> <!-- modal footer -->
                                
                                </div> <!-- card body -->   
                            </div>
                        </div>
                    </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewIngredientlistModal -->

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">               
                    <div class="col-lg-12">

                                    <form id="frmDelVehicle">
                                        <div class="col-lg-12 margin-top-20">

                                            <div id="collectdiv" class="col-md-12 form-collect card" style="background-color: #fff !important; padding: 0;">
                                                    <h6 class="px-4 py-3 primary-bg white-text">Delivery Vehicle Maintenance Information</h6>
                                                <div class="p-4">



                                            <!-- DATE -->    
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Date<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control required_fields col-md-8 form-control-success datepicker" name="adddate" id="adddate" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                            </div>
                                  
                                            <!-- DELIVERY VEHICLE -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Delivery Vehicle<span class="" style="color:red">*</span></label>
                                                <select class="form-control col-md-8 required_fields" name="addvehicle" id="addvehicle">
                                                    <option selected value="">-- Select Vehicle--</option>
                                                    <?php foreach ($get_vehicle as $value):?>
                                                    <option value="<?php echo $value["id"]?>"><?php echo strtoupper($value["plateno"])?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>                                    

                                            <!-- Category -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Category<span class="" style="color:red">*</span></label>
                                                <select class="form-control required_fields col-md-8" name="addcategory" id="addcategory">
                                                    <option selected value="">-- Select Category--</option>
                                                    <option value="Battery Maintenance">Battery Maintenance</option>
                                                    <option value="Body Maintenance">Body Maintenance</option>
                                                    <option value="Oil and Electrical">Oil and Electrical</option>
                                                    <option value="Permits and Licenses">Permits and Licenses</option>
                                                    <option value="Tire Maintenance">Tire Maintenance</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>                                                                                     

                                            <!-- Amount -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Amount<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control required_fields material_josh form-control-sm search-input-text search col-md-8 amount allownumericwithdecimal" name="addamount" id="addamount" oninput="validity.valid||(value='');" min="" placeholder="0.00">
                                            </div>

                                            <!-- Details -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Details<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control required_fields material_josh form-control-sm col-md-8" id="adddetails" name="adddetails" placeholder="Details">
                                            </div>

                                            <div class="form-group row margin-top-20 float-right">
                                            <button class="btn blue-grey backBtn" type="button">Cancel</button>
                                            <span style="margin:5px;"></span>
                                            <button class="btn btn-primary saveBtn">Save Delivery Vehicle</button>
                                            </div>
                                        
                                    </div> <!-- padding 20 -->                    
                                </div> <!-- interface1 -->
                            </form>
                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> <!-- col 12 -->                
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
<script src="<?=base_url('assets/js/entity/delivery_vehicle/delivery_vehicle.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->