<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="8" data-namecollapse="" data-labelname="Entity"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Supplier</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-lg-12">
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Supplier</label>
                                                <input type="text" data-column="0"  class="form-control material_josh form-control-sm search-input-text search" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Credit Term</label>
                                                <input type="text" data-column="1"  class="form-control material_josh form-control-sm search-input-text search" placeholder="Terms">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Contact Person</label>

                                                <input type="text" data-column="2"  class="form-control material_josh form-control-sm search-input-text search" placeholder="Full Name">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addSupplierModal" class="btn btn-primary btnUpdate btnTable btnClickAddSupplier" name="update" style="right:20px; position: absolute; top:20px;">Add Supplier</button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="20">ID</th>
                                            <th>Supplier Name</th>
                                            <th>Contact No.</th>
                                            <th>Credit Term</th>
                                            <th>Contact Person</th>
                                            <th width="60">Action</th>
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

    <!-- Modal-->
    <div id="addSupplierModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add New Supplier</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_supplier-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Supplier<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <input id="info_name" type="text" class="form-control form-control-success" name="info_name"><small class="form-text">Full Name</small>
                                                </div>
                                                <label class="col-md-2 form-control-label">Contact Person<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <input id="info_contactperson" type="text" class="form-control form-control-success" name="info_contactperson"><small class="form-text">Full Name</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Contact No.<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <input id="info_contactno" type="text" class="form-control form-control-success" name="info_contactno"><small class="form-text">Mobile/Landline</small>
                                                </div>
                                                <label class="col-md-2 form-control-label">Credit Term<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2" name="info_term">
                                                        <option selected value="">-- Select Term --</option>
                                                        <?php
                                                        foreach ($get_creditterm->result() as $gcreditterm) { ?>
                                                                <option value="<?=$gcreditterm->id?>"><?=$gcreditterm->description?></option>
                                                        <?php } ?>
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Address<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="info_address" type="text" class="form-control form-control-success" name="info_address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Other Info<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="info_other" type="text" class="form-control form-control-success" name="info_other">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right" class="btn btn-success saveBtnSupplier">Add Supplier</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="viewSupplierModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Update Supplier</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="update_supplier-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Supplier<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="info_id" class="info_id">
                                                    <input id="info_name" type="text" class="form-control form-control-success info_name" name="info_name"><small class="form-text">Full Name</small>
                                                </div>
                                                <label class="col-md-2 form-control-label">Contact Person<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <input id="info_contactperson" type="text" class="form-control form-control-success info_contactperson" name="info_contactperson"><small class="form-text">Full Name</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Contact No.<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <input id="info_contactno" type="text" class="form-control form-control-success info_contactno" name="info_contactno"><small class="form-text">Mobile/Landline</small>
                                                </div>
                                                <label class="col-md-2 form-control-label">Credit Term<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <select class="form-control select2 info_term" name="info_term">
                                                        <option selected value="">-- Select Term --</option>
                                                        <?php
                                                        foreach ($get_creditterm->result() as $gcreditterm) { ?>
                                                                <option value="<?=$gcreditterm->id?>"><?=$gcreditterm->description?></option>
                                                        <?php } ?>
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Address<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="info_address" type="text" class="form-control form-control-success info_address" name="info_address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Other Info</label>
                                                <div class="col-md-10">
                                                    <input id="info_other" type="text" class="form-control form-control-success info_other" name="info_other">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary updateBtnSupplier">Save Changes</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="deleteSupplierModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Supplier</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="delete_supplier-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record <br>(<bold class="info_name"></bold>) ?</p>
                                    <input type="hidden" class="del_id" name="del_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteSupplierBtn">Delete Record</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/entity/entity_supplier.js');?>"></script>

