<!-- change the data-num and data-subnum for numbering of navigation -->
<style type="text/css">
    .dataTables_filter{ display: none; }
</style>

<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#settings-collapse" data-labelname="Document Type"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Document Type</h2>
        </div>
    </header>

    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active">Settings</li>
            <li class="breadcrumb-item active">Document Type</li>
        </div>
    </ul>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 no-padding">
                    <div class="card">
                        <div class="card-body">
                            <h1>Document Type</h1><br>
                            <!-- <table class="table table-striped table-hover"> -->
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addRequirementModal" class="btn btn-primary btnUpdate btnTable btnClickAddRequirement" name="update" style="right:20px; position: absolute; top:20px;">Add Document Type</button>
                            <br><br><br>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid2"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Document ID</th>
                                            <th>Description</th>
                                            <th width="185" style="text-align: center;">Action</th>
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

    <!-- <button type="button" data-toggle="modal" data-target="#addAccountsModal" class="btn btn-primary">Form in simple modal </button> -->
    <!-- Modal-->
   

<!-- 2nd set of modal -->
    <div id="addRequirementModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Document</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_reqinfo-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                             <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Document Description<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-4">
                                                    <input required id="inputHorizontalSuccess" type="text" class="form-control form-control-success info_req_desc" name="info_req_desc">
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
                                <button type="button" style="float:right" class="btn btn-success saveBtnReq">Add</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="viewRequirementModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">View Document</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="view_reqinfo-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Document ID</label>
                                                <div class="col-md-7"> 
                                                    <input disabled id="inputHorizontalSuccess" type="number" class="form-control form-control-success info_req_id" name="info_req_id">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Document Description</label>
                                                <div class="col-md-7">
                                                    <input  disabled id="inputHorizontalWarning" type="text" class="form-control form-control-warning info_req_desc" name="info_req_desc">
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
                                <button type="button" style="float:right" class="btn btn-primary goToEditModalReqBtn">Edit</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Back</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editRequirementModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Edit Document</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="edit_view_requirementinfo-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Document Description <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <input hidden id="inputHorizontalSuccess" type="number" class="form-control form-control-success info_req_id" name="info_req_id">

                                                    <input required id="inputHorizontalWarning" type="text" class="form-control form-control-warning info_req_desc" name="info_req_desc">
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary EditRequirementModalBtn">Save Changes</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteRequirementModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Requirement</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="delete_accountspersonalinfo-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record?</p>
                                    <input type="hidden" class="del_requirement_id" name="del_requirement_id" value="">                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteReqBtn">Delete</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/admin/settings/applications.js');?>"></script>

