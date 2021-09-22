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
            <li class="breadcrumb-item active">Area</li>
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
                                                <label class="form-control-label col-form-label-sm">Area</label>
                                                <input type="text" class="form-control material_josh form-control-sm search-input-text searchArea" placeholder="Description">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAreaModal" class="btn btn-primary btnClickAddArea" style="right:20px; position: absolute; top:20px;">Add Area</button>
                            <button class="btn btn-primary btnSearch" style="right:120px; position: absolute; top:20px;">Search</button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">ID</th>
                                            <th>Description</th>
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
    <div id="addAreaModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add New Area</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_area-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Area <span class="asterisk"></span></label>
                                                <div class="col-md-10">
                                                    <input id="info_desc" type="text" class="form-control form-control-success" name="info_desc"><small class="form-text">Description</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-12 form-control-label">Delivery</label>
                                                <div class="col-md-6">
                                                    <input id="monday_checks" type="hidden" value="false" class="checkbox-template monday_check" style="margin-left: 20px;" name="monday_check">   
                                                    <input id="monday_check" type="checkbox" value="true" class="checkbox-template monday_check" style="margin-left: 20px;" name="monday_check" onclick="checkMonday(this)">
                                                    <label class="form-control-label" for="monday_check">Monday</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="tuesday_checks" type="hidden" value="false" class="checkbox-template tuesday_check" style="margin-left: 20px;" name="tuesday_check">   
                                                    <input id="tuesday_check" type="checkbox" value="true" class="checkbox-template tuesday_check" style="margin-left: 20px;" name="tuesday_check" onclick="checkTuesday(this)"> 
                                                    <label class="form-control-label" for="tuesday_check">Tuesday</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <input id="wednesday_checks" type="hidden" value="false" class="checkbox-template wednesday_check" style="margin-left: 20px;" name="wednesday_check">   
                                                    <input id="wednesday_check" type="checkbox" value="true" class="checkbox-template wednesday_check" style="margin-left: 20px;" name="wednesday_check" onclick="checkWed(this)"> 
                                                    <label class="form-control-label" for="wednesday_check">Wednesday</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="thursday_checks" type="hidden" value="false" class="checkbox-template thursday_check" style="margin-left: 20px;" name="thursday_check">  
                                                    <input id="thursday_check" type="checkbox" value="true" class="checkbox-template thursday_check" style="margin-left: 20px;" name="thursday_check" onclick="checkThurs(this)">  
                                                    <label class="form-control-label" for="thursday_check">Thursday</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <input id="friday_checks" type="hidden" value="false" class="checkbox-template friday_check" style="margin-left: 20px;" name="friday_check">    
                                                    <input id="friday_check" type="checkbox" value="true" class="checkbox-template friday_check" style="margin-left: 20px;" name="friday_check" onclick="checkFriday(this)">
                                                    <label class="form-control-label" for="friday_check">Friday</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="saturday_checks" type="hidden" value="false" class="checkbox-template saturday_check" style="margin-left: 20px;" name="saturday_check">  
                                                    <input id="saturday_check" type="checkbox" value="true" class="checkbox-template saturday_check" style="margin-left: 20px;" name="saturday_check" onclick="checkSat(this)">  
                                                    <label class="form-control-label" for="saturday_check">Saturday</label>
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
                                <button type="button" style="float:right" class="btn btn-success saveBtnArea">Add Area</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="viewAreaModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Update Area</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="update_area-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Area <span class="asterisk"></span></label>
                                                <div class="col-md-10">
                                                    <input type="hidden" name="info_areaId" class="info_areaId">
                                                    <input id="info_desc" type="text" class="form-control form-control-success info_desc" name="info_desc"><small class="form-text">Description</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-12 form-control-label">Delivery</label>
                                                <div class="col-md-6">
                                                    <input id="monday_checks" type="hidden" value="false" class="checkbox-template monday_check" style="margin-left: 20px;" name="monday_check">   
                                                    <input id="monday_check_update" type="checkbox" value="true" class="checkbox-template monday_check" style="margin-left: 20px;" name="monday_check">
                                                    <label class="form-control-label" for="monday_check_update">Monday</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="tuesday_checks" type="hidden" value="false" class="checkbox-template tuesday_check" style="margin-left: 20px;" name="tuesday_check">   
                                                    <input id="tuesday_check_update" type="checkbox" value="true" class="checkbox-template tuesday_check" style="margin-left: 20px;" name="tuesday_check"> 
                                                    <label class="form-control-label" for="tuesday_check_update">Tuesday</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <input id="wednesday_checks" type="hidden" value="false" class="checkbox-template wednesday_check" style="margin-left: 20px;" name="wednesday_check">   
                                                    <input id="wednesday_check_update" type="checkbox" value="true" class="checkbox-template wednesday_check" style="margin-left: 20px;" name="wednesday_check"> 
                                                    <label class="form-control-label" for="wednesday_check_update">Wednesday</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="thursday_checks" type="hidden" value="false" class="checkbox-template thursday_check" style="margin-left: 20px;" name="thursday_check">  
                                                    <input id="thursday_check_update" type="checkbox" value="true" class="checkbox-template thursday_check" style="margin-left: 20px;" name="thursday_check">  
                                                    <label class="form-control-label" for="thursday_check_update">Thursday</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <input id="friday_checks" type="hidden" value="false" class="checkbox-template friday_check" style="margin-left: 20px;" name="friday_check">    
                                                    <input id="friday_check_update" type="checkbox" value="true" class="checkbox-template friday_check" style="margin-left: 20px;" name="friday_check">
                                                    <label class="form-control-label" for="friday_check_update">Friday</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="saturday_checks" type="hidden" value="false" class="checkbox-template saturday_check" style="margin-left: 20px;" name="saturday_check">  
                                                    <input id="saturday_check_update" type="checkbox" value="true" class="checkbox-template saturday_check" style="margin-left: 20px;" name="saturday_check">  
                                                    <label class="form-control-label" for="saturday_check_update">Saturday</label>
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
                                <button type="submit" style="float:right" class="btn btn-primary updateBtnArea">Save Changes</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteAreaModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Area</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="delete_area-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record <br>(<bold class="info_desc"></bold>) ?</p>
                                    <input type="hidden" class="del_areaId" name="del_areaId" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteAreaBtn">Delete Record</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/settings/settings_area.js');?>"></script>

