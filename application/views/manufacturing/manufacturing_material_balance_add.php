<div class="content-inner" id="pageActive" data-num="6" data-namecollapse="" data-labelname="Manufacturing">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Material Balance Add Item</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/manufacturing_home/'.$token);?>">Manufacturing</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('Main_manufacturing/Material_balance/'.$token);?>">Material Balance</a></li>
            <li class="breadcrumb-item"><a>Material Balance Add Item</a></li>
        </div>
    </ul>
    
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row col-lg-12">
                                <div class="row col-lg-12 margin-top-20">
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
                                            <strong><label class="lblItemnameadd" data-value="<?php echo $id?>"><?php echo $itemname?></label></strong>   
                                            <br>
                                            <label class="lblUnitadd"><?php echo $unit;?></label>      
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive margin-top-20">
                                <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">
                                    <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#viewAddrowModal" id="add_item_btn" class="btn btn-primary btnUpdate btnTable " name="update">
                                    Add Row
                                    </button>
                                </div>

                                <table class="table table-striped table-hover table-bordered" id="table-materials-add"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th width="50">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>                                         

                            <!-- NOTES -->
                            <div class="form-group">
                                <label class="form-control-label col-md-4">Notes</label>
                                <textarea class="form-control txtarea" rows="3" placeholder="Notes..." id="txtareanotes"></textarea>
                            </div>
                                            
                            <button type="button" class="btn btn-success saveMaterialBtn float-right margin-top-20">Save Material Balance</button>
                        
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
                                                <label class="form-control-label col-md-12">Item<span class="asterisk" style="color:red">*</span></label> 
                                                <input type="text" class="form-control material_josh required_fields form-control-sm col-md-12" name="item" id="item" placeholder="Itemname"/>
                                            </div>
                                                        
                                            <!-- QTY -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-12">Quantity<span class="asterisk" style="color:red">*</span></label> 
                                                <input type="text" class="form-control allownumericwithdecimal material_josh required_fields form-control-sm col-md-12 qty" name="qty" id="qty" oninput="validity.valid||(value='');" min="" placeholder="Quantity">
                                            </div>                                                     
                                                                                         
                                        </div>
                                    </form>
                                </div>                                       

                                <div class="modal-footer">
                                    <div class="form-group row float-right">       
                                        <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-info add_inventory_modal">Add Inventory</button>
                                    </div>
                                </div>
                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div>
</div>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/manufacturing/material balance/manufacturing_material_balance.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->