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
<div class="content-inner" id="pageActive" data-num="12" data-namecollapse="" data-labelname="Settings"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/dev_settings_home/'.$token);?>">Developer Settings</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Content Navigation</li>
        </ol>
    </div>
    
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="">
                            <div class="card-header d-flex align-items-center">

                                <div class="col-md-12">
                                    <br>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Name</label>
                                                <input type="text" class="form-control material_josh form-control-sm search-input-text searchName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Main Navigation Category</label>
                                                <select id="main-category-search" class="form-control material_josh form-control-sm searchMainNav search-input-select main-category-search">
                                                    <option value="" selected>Select Category</option>
                                                    <?php foreach($main_nav_categories as $category):?>
                                                        <option value="<?=$category['main_nav_id']?>"><?=$category["main_nav_desc"]?></option>
                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addContentNavigationModal" class="btn btn-primary btnClickAddSystemUser" name="update" style="right:20px; position: absolute; top:20px;">Add Content Navigation</button>
                            <button class="btn btn-primary btnSearch" style="right:210px; position: absolute; top:20px;">Search</button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60">ID</th>
                                            <th>URL</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Main Navigation</th>
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
    <div id="addContentNavigationModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add New Content Navigation</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_content_navigation-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label col-form-label-sm">URL <span class="asterisk" style="color:red"></span></label>
                                                    <input id="info_url" type="text" class="form-control form-control-success" name="info_url">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label col-form-label-sm">Name <span class="asterisk" style="color:red"></span></label>
                                                    <input id="info_name" type="text" class="form-control form-control-success" name="info_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label col-form-label-sm">Description <span class="asterisk" style="color:red"></span></label>
                                                    <textarea id="info_description" type="text" class="form-control form-control-success" name="info_description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label col-form-label-sm">Main Navigation <span class="asterisk" style="color:red"></span></label>
                                                    <select name="info_main_nav_category" class="form-control material_josh form-control-sm">
                                                        <option disabled value="" selected>Select Category</option>
                                                        <?php foreach($main_nav_categories as $category):?>
                                                            <option value="<?=$category['main_nav_id']?>"><?=$category["main_nav_desc"]?></option>
                                                        <?php endforeach?>
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
                                <button type="submit" style="float:right" class="btn btn-primary saveBtnContentNavigation">Add Content Navigation</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="viewContentNavigationModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Update Content Navigation</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="update_content_navigation-form">
                    <input type="hidden" name="update_user_id" id="update_user_id" class="update_user_id">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label col-form-label-sm">URL <span class="asterisk" style="color:red"></span></label>
                                                    <input id="update_url" type="text" class="form-control form-control-success" name="update_url">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label col-form-label-sm">Name <span class="asterisk" style="color:red"></span></label>
                                                    <input id="update_name" type="text" class="form-control form-control-success" name="update_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label col-form-label-sm">Description <span class="asterisk" style="color:red"></span></label>
                                                    <textarea id="update_description" type="text" class="form-control form-control-success" name="update_description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label col-form-label-sm">Main Navigation <span class="asterisk" style="color:red"></span></label>
                                                    <select name="update_main_nav_category" id="update_main_nav_category" class="form-control material_josh form-control-sm">
                                                        <option disabled value="" selected>Select Category</option>
                                                        <?php foreach($main_nav_categories as $category):?>
                                                            <option value="<?=$category['main_nav_id']?>"><?=$category["main_nav_desc"]?></option>
                                                        <?php endforeach?>
                                                    </select>
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
                                <button type="submit" style="float:right" class="btn btn-success updateBtnContentNavigation">Update Content Navigation</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="deleteContentNavigationModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Content Navigation</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="delete_system_user-form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Are you sure you want to delete this record <br>(<bold class="del_name"></bold>) ?</p>
                                    <input type="hidden" id="del_id" class="del_id" name="del_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right" class="btn btn-primary deleteContentNavigationBtn">Delete Record</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/dev_settings/settings_content_navigation.js');?>"></script>

