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
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="8" data-namecollapse="" data-labelname="Settings"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/settings_home/'.$token);?>">Settings</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Employee</li>
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
                                                <label class="form-control-label col-form-label-sm">Employee</label>
                                                <input type="text" class="form-control material_josh form-control-sm search-input-text searchID" placeholder="ID">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Employee Name</label>
                                                <input type="text" class="form-control material_josh form-control-sm search-input-text searchName" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Employee Type</label>
                                                <input type="text" class="form-control material_josh form-control-sm search-input-text searchType" placeholder="Type">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addEmployeeModal" class="btn btn-primary btnClickAddEmployee" style="right:20px; position: absolute; top:20px;">Add Employee</button>
                            <button class="btn btn-primary btnSearch" style="right:165px; position: absolute; top:20px;">Search</button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">ID</th>
                                            <th>Employee ID</th>
                                            <th>Full Name</th>
                                            <th>Type</th>
                                            <th width="190">Action</th>
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
    <div id="addEmployeeModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add New Employee</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_employee-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Employee ID<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input id="info_empid" type="text" class="form-control form-control-success" name="info_empid">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Full Name<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input id="inputHorizontalSuccess" type="text" class="form-control form-control-success" name="info_fname"><small class="form-text">First Name <span class="asterisk"></span></small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label"></label>
                                                <div class="col-md-8">
                                                    <input id="inputHorizontalSuccess" type="text" class="form-control form-control-success" name="info_mname"><small class="form-text">Middle Name</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label"></label>
                                                <div class="col-md-8">
                                                    <input id="inputHorizontalSuccess" type="text" class="form-control form-control-success" name="info_lname"><small class="form-text">Last Name <span class="asterisk"></span></small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Type<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2" name="info_type">
                                                        <option selected value="">-- Select Type --</option>
                                                        <?php
                                                        foreach ($get_emptype->result() as $gemptype) { ?>
                                                                <option value="<?=$gemptype->id?>"><?=$gemptype->description?></option>
                                                        <?php } ?>
                                                        ?>
                                                    </select>
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
                                <button type="button" style="float:right" class="btn blue-grey saveBtnEmployee">Add Employee</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="viewEmployeeModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Update Employee</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="update_employee-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Employee ID<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <input type="hidden" name="info_id" class="info_id">
                                                    <input id="info_empid" type="text" class="form-control form-control-success info_empid" name="info_empid">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Full Name<span class="asterisk" ></span></label>
                                                <div class="col-md-8">
                                                    <input id="info_fname" type="text" class="form-control form-control-success info_fname" name="info_fname"><small class="form-text">First Name <span class="asterisk"></span></small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label"></label>
                                                <div class="col-md-8">
                                                    <input id="info_mname" type="text" class="form-control form-control-success info_mname" name="info_mname"><small class="form-text">Middle Name</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label"></label>
                                                <div class="col-md-8">
                                                    <input id="info_lname" type="text" class="form-control form-control-success info_lname" name="info_lname"><small class="form-text">Last Name <span class="asterisk"></span></small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 form-control-label">Type<span class="asterisk"></span></label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2 info_type" name="info_type">
                                                        <?php
                                                        foreach ($get_emptype->result() as $gemptype) { ?>
                                                                <option value="<?=$gemptype->id?>"><?=$gemptype->description?></option>
                                                        <?php } ?>
                                                        ?>
                                                    </select>
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
                                <button type="submit" style="float:right" class="btn btn-primary updateBtnEmployee">Save Changes</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteEmployeeModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Employee</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="delete_employee-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record <br>(<bold class="fullname_del"></bold>) ?</p>
                                    <input type="hidden" class="del_id" name="del_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteEmployeeBtn">Delete Record</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/settings/settings_employee.js');?>"></script>

