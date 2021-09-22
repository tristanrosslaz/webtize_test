<style type="text/css">
    
    .btn-primary {
      color: #fff !important; 
      background-color: #13496f !important;
      border-color: #13496f !important; 
    }  

</style>
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Supplier</li>
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
                                            <!-- label is used to level it with the input. It is styled invisible -->
                                            <button type="button" class="btn btn-primary searchBtn">Search</button>
                                            <span style="margin: 5px;"></span>
                                            <button type="button" data-target="#addSalesAgent" class="btn btn-primary addsupp">Add Supplier</button>                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>           

                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- <div class="form-group-material row float-right" style="right:20px; top:10px;">
                                        <button type="button" class="btn btn-primary searchBtn">Search</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" data-target="#addSalesAgent" class="btn btn-primary addsupp">Add Supplier</button>
                               </div><br><br> -->

                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%" hidden>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Contact No.</th>
                                            <th>Credit Term</th>
                                            <th>Contact Person</th>
                                            <th style="width: 105 !important">Action</th>
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

    <div id="addsupplier" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Inventory Item</h4>
                </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Supplier Name <span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="add_suppliername" type="text" class="form-control form-control-success" name="add_suppliername" placeholder="Supplier Name">
                                                    <input id="add_id" type="text" class="form-control form-control-success" name="add_id" style="display:none;" hidden >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label"> Contact Person<span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="add_contact" type="text" class="form-control form-control-success" name="add_contact" placeholder="Contact Person">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Contact No.<span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="add_contactno" type="text" class="form-control form-control-success" name="add_contactno" placeholder="Contact No.">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Credit Term <span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <select id="add_credit_term" type="text" class="form-control form-control-success" name="add_credit_term" placeholder="Credit Term">
                                                        <option value=""> -- Select Credit Term --</option>
                                                        <?php
                                                            foreach ($credit as $row) {
                                                                ?>
                                                                    <option value="<?= $row['id']?>"><?= $row['description']?></option>
                                                                <?php
                                                            }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Address</label>
                                                <div class="col-md-10">
                                                    <input id="add_address" type="text" class="form-control form-control-success" name="add_address" placeholder="Address">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Other Info</label>
                                                <div class="col-md-10">
                                                    <textarea id="add_other_info" type="text" class="form-control form-control-success" style="resize: none;" name="add_other_info" placeholder="Other Info"></textarea>
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
                                <input type="button" style="float:right" class="btn btn-primary savebtn" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
     <div id="editSupplier" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="editSalesAgent">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Supplier Update</h4>
                </div>
                <form id="updatesupplierlist">
                <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Supplier Name <span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="suppliername" type="text" class="form-control form-control-success" name="suppliername" >
                                                    <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Contact Person<span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="contact" type="text" class="form-control form-control-success" name="contact" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Contact No.<span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="contactno" type="text" class="form-control form-control-success" name="contactno" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Credit Term <span class="" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <select id="credit_term" type="text" class="form-control form-control-success" name="credit" >
                                                        <option selected value="credit"> </option>
                                                        <?php
                                                            foreach ($credit as $row) {
                                                                ?>
                                                                    <option value="<?= $row['id']?>"><?= $row['description']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Address</label>
                                                <div class="col-md-10">
                                                    <input id="address" type="text" class="form-control form-control-success" name="address" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Other Info</label>
                                                <div class="col-md-10">
                                                    <textarea id="other_info" type="text" class="form-control form-control-success" style="resize: none;" name="other_info" ></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    
                                                </div>
                                     
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <input type="button" style="float:right" class="btn btn-primary updateBtn" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                    
               <!-- modal body -->
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
                                    <p>Are you sure you want to delete supplier <br> (<bold class="confirmMsg"></bold>) ?</p>
                                    <input type="hidden" class="del_id" name="del_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row float-right">       
                                <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
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
<script src="<?=base_url('assets/js/entity/supplierlist/entity_supplierlist.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->