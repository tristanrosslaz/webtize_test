<div class="content-inner" id="pageActive" data-num="6" data-namecollapse="" data-labelname="Manufacturing">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/manufacturing_home/'.$token);?>">Manufacturing</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Material Balance Edit Item</li>
        </ol>
    </div>
    
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Bill of Materials Information</h6>
                        <div class="card-body">

                            <div class="row col-lg-12">
                               <!--  -->

                                <div class="col-lg-12">

                                    <div class="row">
                                        <div>
                                            <label>Item: </label>
                                            <br>
                                            <label>Unit: </label>
                                        </div>
                                    
                                        <span style="margin: 3%;"></span>

                                        <div>
                                            <strong><label class="lblItemnameedit" style="text-transform: capitalize !important;" data-value="<?php echo $id?>"><?php echo strtoUpper($itemname);?></label></strong>   
                                            <br>
                                            <label class="lblUnitedit"><?php echo $unit;?></label>      
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#viewAddrowModal" id="add_item_btn" class="btn btn-primary btnUpdate btnTable " name="update" style="right:20px; position: absolute; top:45px;">
                            Add Item
                            </button>
                            <br><br><br>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-materials-edit"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">ID</th>
                                            <th>Name</th>
                                            <th width="120">Qty</th>
                                            <th width="120">Unit</th>
                                            <th width="70">Action</th>
                                            </tr>
                                    </thead>
                                </table>
                            </div>                                         

                            <!-- NOTES -->
                            <div class="form-group">
                                <label class="form-control-label col-md-4">Notes</label>
                                <textarea class="form-control txtarea" style="resize: none;" rows="3" placeholder="Notes..." id="txtareanotes"></textarea>
                            </div>
                                            
                            <button type="button" class="btn btn-primary float-right margin-top-20 updateMatBtn">Update Material Balance</button>

                        </div> <!-- card body -->
                    </div> <!-- card -->                
                </div>
            </div>
        </div> 
    </section>

     <div id="viewAddrowModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewDeformModal">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add item</h4>
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
<!-- </div> -->

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/manufacturing/material balance/manufacturing_material_balance_edit.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->