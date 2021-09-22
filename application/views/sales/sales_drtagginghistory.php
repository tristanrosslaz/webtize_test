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
<style>
div#table-grid-edit_filter {
    display: none;
}
</style>
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Sales</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_sales/sales_home/'.$token);?>">Sales</a></li>
        <li class="breadcrumb-item active">Delivery Receipt Tagging Transaction History</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12">
                                    <div class="row">

                                         <div class="col-lg-4">
                                            <div class="form-group" >
                                             <select class="form-control select2" name="sosearchfilter" id="sosearchfilter">
                                               <!--   <option value="none">Select Search</option> -->
                                                 <option value="sodatediv">Search by Date</option>
                                                 <option value="drnodiv">Search by DR No.</option>
                                                 <option value="statdiv">Search by Status</option>
                                            </select>
                                            </div>
                                        </div>

                                         <div class="col-lg-4">
                                            <div class="form-group sodatediv" style="display:none;">
                                                <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control search-input-date" id="datefrom" data-column="0" value="" readonly />
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class="input-sm form-control search-input-date" id="dateto" data-column="1" value="" readonly/>
                                                </div>
                                            </div>

                                             <div class="form-group drnodiv" style="display:none;">
                                                <input type="text" class="input-sm form-control search-input-text" data-column="2" id="drno" onkeypress="return isNumberKeyOnly(event)" placeholder="drno number.." onkeypress="return isNumberKeyOnly(event)"/>
                                            </div>

                                             <div class="form-group statdiv" style="display:none;">

                                                <select class="form-control search-input-status select2" data-column="3" name="statfilter" id="statfilter">
                                                 <option value="none">Select Status</option>
                                                 <option value="release" >Release</option>
                                                 <option value="notrelease" >Not Release</option> 
                                                </select>
                                            </div>

                                            <div class="form-group namediv" style="display:none;">
                                                <input type="text" class="input-sm form-control search-input-name" data-column="4" id="sono" placeholder="Customer Name.." />
                                            </div>
                                        </div>

                                          <div class="col-lg-4"> 

                                             <div class="form-group soSearchdiv" style="display:none;">
                                                <button type="button" style="float:left; margin-left:0px;" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO">Search</button>
                                             </div>     
                                           
                                            <div class="form-group" >
                                             
                                            </div>     

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>DR No.</th>
                                            <th>Status</th>
                                            <th width="70px"></th>
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


     <div id="viewDRtagged" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delivery Receipt Tag Details</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="form-control-label" type="text" >Driver:</label>
                                        </div>

                                        <div class="col-md-6">
                                          <input class="form-control" type="text" id="drivername"  onpaste="return false;"  disabled="true" />
                                        </div> 
                                </div>

                                 <div class="form-group row">
                                       
                                        <div class="col-md-3">
                                            <label class="form-control-label" type="text" >Prepared By:</label>
                                        </div>

                                        <div class="col-md-6">
                                          <input class="form-control" type="text" id="prepby" onpaste="return false;" disabled="true" />
                                        </div> 


                
                                        <input class="form-control" type="text" id="drno_id" hidden/>
                                </div>

                                <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="form-control-label" type="text" >Packed By:</label>
                                        </div>

                                        <div class="col-md-6">
                                          <input class="form-control" type="text" id="packby"  onpaste="return false;" disabled="true" />
                                        </div> 
                                </div>

                                <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="form-control-label" type="text" >Number of bags:</label>
                                        </div>

                                        <div class="col-md-6">
                                          <input class="form-control" type="text" id="noofbag"  onpaste="return false;" disabled="true" />
                                        </div> 
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">

                                <button type="button" style="float:right;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_tagginghistory.js');?>"></script>
