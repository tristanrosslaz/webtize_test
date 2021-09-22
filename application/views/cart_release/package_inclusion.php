<style>
    .col-md-6.form-collect {
        margin: auto !important;
        width: 50% !important;     
        background-color: #f5f5f5 !important;   
        padding: 25px !important; 
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;
    } 
    .select2 {
        width: 100% !important;
        margin-left: 0;
    }
    .datepicker {
        z-index: 999999999 !important;
    }
</style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="9" data-namecollapse="" data-labelname="Package Inclusion"> 
    <!-- Page Header-->
   <!--  <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Package Inclusion</h2>
        </div>
    </header> -->
    <!-- Breadcrumb-->
  <!--   <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/home/'.$token);?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a></li>
            <li class="breadcrumb-item active">Package Inclusion</li>
        </div>
    </ul> -->
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Package Inclusion</li>
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
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">

                                                <div class="form-group piconceptdiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Concept</label>
                                                    <select class="form-control" name="concept" id="concept">
                                                        <option value="none">-- Select Concept --</option>
                                                        <option value="Siomai King">Siomai King</option>
                                                        <option value="Potato King">Potato King</option>
                                                        <option value="Siopao Da King">Siopao Da King</option>
                                                        <option value="Sgt. Sisig">Sgt. Sisig</option>
                                                        <option value="Burger Factory">Burger Factory</option>
                                                        <option value="Noodle House">Noodle House</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="form-group row" style="float:right;">
                                                <div>
                                                    <button type="button" style="float:left; margin-left:0px;" class="btn btn-default btn-primary btnSearchPI" id="btnSearchPI">Search</button>
                                                </div>     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="40">ID</th>
                                            <th>Package</th>
                                            <th width="90">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="viewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">Release Details</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="card-body">

                                    <div class="form-group row">

                                            <div class="col-md-6">
                                                <label class="form-control-label">To </label>

                                                <div class="form-group p-style">

                                                    <div class="row">
                                                        <div class="col-md-4">Franchisee Name: </div>
                                                        <div class="col-md-8"><H2 class="m_franchisee"></H2></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">Location Address: </div>
                                                        <div class="col-md-8"><span type="text" class="m_location" style="border:none;" disabled></span></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">Concept: </div>
                                                        <div class="col-md-8"><span type="text" class="m_concept" style="border:none;" disabled></span></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">Type: </div>
                                                        <div class="col-md-8"><H2 class="m_type"></H2></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">Size: </div>
                                                        <div class="col-md-8"><span type="text" class="m_size" style="border:none;" disabled></span></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">Mode of Release: </div>
                                                        <div class="col-md-8"><span type="text" class="m_mor" style="border:none;" disabled></span></div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6 text-right">
                                                <div class="form-group">
                                                    <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>

                                                    <div class="form-group p-style">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <H1 class="m_rdno" style="border:none; float:right;"></H1>
                                                                <label class="" style="float:right;"># </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <span type="text" class="col-md-12 m_trandate"></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                    </div>

                                    <br><br>
                                    <label for="notes">Notes</label> 
                                    <textarea style="resize:none" class="form-control m_notes" rows="4" cols="40" id="notes" name="notes" disabled=""></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-basic cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">Edit Release Details</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="card-body">

                                    <div class="form-group row">

                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 text-right">
                                            <div class="form-group">
                                                <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>

                                                <div class="form-group p-style">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <H1 class="em_rdno" style="border:none; float:right;"></H1>
                                                            <label class="" style="float:right;"># </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <span type="text" class="col-md-12 em_trandate"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-6">
                                            <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>

                                            <div class="form-group p-style">

                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="form-control-label">Release Date: <span class="asterisk" style="color:red"> *</span></label></div>
                                                    <div class="col-md-8"><input type="text" data-column="0" id="em_date" readonly="true" class="em_date form-control datepicker form-control-sm search-input-text search" placeholder="mm/dd/yyyy" disabled=""></div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="form-control-label">Franchisee Name: <span class="asterisk" style="color:red"> *</span></label></div>
                                                    <div class="col-md-8"><input type="text" class="form-control em_franchisee" name="em_franchisee" id="em_franchisee" disabled=""></div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="form-control-label">Location Address: <span class="asterisk" style="color:red"> *</span></label></div>
                                                    <div class="col-md-8"><textarea style="resize:none" class="form-control form-control-sm" rows="2" cols="40" id="em_location" name="em_location" disabled=""></textarea></div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="form-control-label">Concept: <span class="asterisk" style="color:red"> *</span></label></div>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2" name="em_concept" id="em_concept">
                                                            <option value="none">-- Select Concept --</option>
                                                            <option value="Siomai King">Siomai King</option>
                                                            <option value="Potato King">Potato King</option>
                                                            <option value="Siopao Da King">Siopao Da King</option>
                                                            <option value="Sgt. Sisig">Sgt. Sisig</option>
                                                            <option value="Burger Factory">Burger Factory</option>
                                                            <option value="Noodle House">Noodle House</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>

                                            <div class="form-group p-style">

                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="form-control-label">Type: <span class="asterisk" style="color:red"> *</span></label></div>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2" name="em_type" id="em_type">
                                                            <option value="none">-- Select Type --</option>
                                                            <option value="Cart">Cart</option>
                                                            <option value="Kiosk">Kiosk</option>
                                                            <option value="Stall">Stall</option>
                                                            <option value="Counter">Counter</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="form-control-label">Size: <span class="asterisk" style="color:red"> *</span></label></div>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2" name="em_size" id="em_size">
                                                            <option value="none">-- Select Size --</option>
                                                            <option value="Cart - 170">Cart - 170</option>
                                                            <option value="Cart - 150">Cart - 150</option>
                                                            <option value="Cart - 130">Cart - 130</option>
                                                            <option value="Customized Cart">Customized Cart</option>
                                                            <option value="Customized Kiosk">Customized Kiosk</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="form-control-label">Improvements: <span class="asterisk" style="color:red"> *</span></label></div>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2" name="em_improvements" id="em_improvements">
                                                            <option value="none">-- Select Improvements --</option>
                                                            <option value="Signages">Signages</option>
                                                            <option value="Additional Services">Additional Services</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4"><label class="form-control-label">Mode of Release: <span class="asterisk" style="color:red"> *</span></label></div>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2" name="em_mode" id="em_mode">
                                                            <option value="none">-- Select Mode of Release --</option>
                                                            <option value="Delivery">Delivery</option>
                                                            <option value="Pick Up">Pick Up</option>
                                                            <option value="Shipment">Shipment</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Notes: <span class="asterisk" style="color:red"> *</span></label>
                                        <textarea style="resize:none" class="form-control notes form-control-sm" rows="4" cols="40" id="em_notes" name="em_notes"></textarea>
                                    </div> 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-basic em_cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-success em_saveBtn" data-dismiss="modal" aria-label="Close">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Package</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="dm_pkgid" class="dm_pkgid" id="dm_pkgid">
                                <p>Proceed with the deletion of Package: <b><span class="dm_pkgname" id = "dm_pkgname"></span></b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right" class="btn btn-primary dm_deleteBtn">Approve</button>
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/cart_release/package_inclusion.js');?>"></script>