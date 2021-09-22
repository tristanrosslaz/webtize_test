<style>
.kbw-signature { width: 300px; height: 100px; }
</style>
<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Entity</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid"> 
        	<li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a></li>      
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_entity/customer/'.$token);?>">Customer</a></li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Customer Login</h1><br>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <!-- <label class="form-control-label col-form-label-sm">Search</label> -->
                                            <input type="text" data-column="1" id="p_name"  class="form-control material_josh form-control-sm search-input-text search" placeholder="SEARCH">
                                        </div>
                                    </div>
                                    <!-- <table class="table table-striped table-hover"> -->
                                    <!-- <button data-toggle="modal" data-target="#addItemModal" data-backdrop="static" data-keyboard="false" id="add_item_btn" class="btn btn-primary btnUpdate btnTable add_new" name="update" style="right:20px; position: absolute; top:20px;">
                                    <i class="fa fa-plus"></i>
                                        Add row
                                    </button> -->
                                    <div class="table-responsive">
                                        <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="60">ID</th>
                                                    <th>Name</th>
                                                    <th>Branch</th>
<!--                                                     <th>Contact No.</th>
                                                    <th width="7em">Credit Term</th>
                                                    <th>Area</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                    <!-- <div class="form-group row">       
                                        <div class="col-md-12">
                                           <button type="button" style="float:right; margin-right:10px;" class="btn btn-primary filterBtn">Filter</button>
                                        </div>
                                    </div> -->
                            <!-- <table class="table table-striped table-hover"> -->
                            <br><br>
                            <!-- <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>FIS Applicant ID</th> 
                                            <th>Customer Name</th>
                                            <th>Contact Number</th>
                                            <th>Application Date</th>
                                            <th width=" 85" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                </table>	
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> -->
<script src="<?=base_url('assets/js/entity/customer/customer_login_jv.js');?>"></script>
<!-- <div class="modal fade" id="myModal" role="dialog" ">
    <div class="modal-dialog">
    
      <!-- Modal content-
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body info_body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 -->

<div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Customer Login Details</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="customer_login_info" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">ID Number: <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="idno" type="text" class="form-control form-control-success req" name="idno" placeholder="ID Number" readonly="true">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Full Name: <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="full_name" type="text" class="form-control form-control-success req" name="full_name" placeholder="Full Name" readonly="true">
                                                    <!-- <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" > -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Branch Name: <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="branch_name" type="text" class="form-control form-control-success req" name="branch_name" placeholder="Branch Name" readonly="true">
                                                    <!-- <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" > -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Username: <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="username" type="text" class="form-control form-control-success req" name="username" placeholder="Username">
                                                    <!-- <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" > -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Password: <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="password" type="text" class="form-control form-control-success req" name="password" placeholder="Password">
                                                    <!-- <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" > -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Confirm Password: <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="repassword" type="text" class="form-control form-control-success req" name="repassword" placeholder="Re-enter Password">
                                                    <!-- <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" > -->
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
                                <input type="submit" style="float:right" class="btn btn-success" value="Save" id="save_changes">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

