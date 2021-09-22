<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Reschedule Report"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Reschedule Report</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a></li>
            <li class="breadcrumb-item active">Reschedule Report</li>
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
                                    <form> 
                                        <div class="row">
                                            <div class="form-group col-md-4 col-sm-8 drno">
                                                <label class="form-control-label col-form-label-sm col-md-4">Build Number</label>
                                                <input type="text" class="input-sm form-control search-input-name col-md-8 buildno" id="buildno"  placeholder="Build No ..." />
                                            </div>
                                        </div>
                                    </form>   
                                </div>
                            </div>
                            <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO" style="right:20px; position: absolute; top:20px;">Search</button>
                            <div class="card-body table" style="display:none;">
                                <div class="col-md-12">
                                    <div class="form-group row" style="float:right;">
                                        <div>
                                            <input id="datefrom1" type="text" class="form-control datefrom1"  hidden >
                                            <input id="dateto1" type="text" class="form-control dateto1" hidden  >
                                            <input id="category1" type="text" class="form-control category1" hidden  >
                                            <input id="location1" type="text" class="form-control location1" hidden  >
                                        </div>     
                                    </div>
                                </div> 
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Build No.</th>
                                                <th>Old Date</th>
                                                <th>New Date</th>
                                                <th>Resched By</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="viewBuildlistModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewBuildlistModal">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="buildNo"></h1>
                    <h2 class="tranDate lighter"></h2>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>

                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="row col-lg-12">
                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Build Information </label>
                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Preperation Date: </label>
                                                    <br>
                                                    <label>Build Date: </label>
                                                    <br>
                                                    <label>Quantity: </label>  
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblprepDate"></label>   
                                                    <br>
                                                    <label class="lblbuildDate"></label>   
                                                    <br>
                                                    <label class="lblQty"></label>     
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Unit: </label> 
                                                    <br>
                                                    <label>Item Name: </label>
                                                    <br>
                                                    <label>Location: </label>  
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblUnit"></label>    
                                                    <br>
                                                    <strong><label class="lblItem"></label></strong>   
                                                    <br>
                                                    <label class="lbllocation"></label>   
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <br>

                                    <div class="table-responsive">
                                        <table class="table  table-striped table-hover table-bordered" id="table-build-view"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Qty</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>                                            

                                    <div class="modal-footer">
                                        <div class="row float-right">       
                                                <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                    </div>

                                    </div><!-- card body -->
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
            <!-- <div class="modal-content modal_content_preloader">
            </div> -->
        </div> 
    </div>  

  
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/reports/reschedule_report.js');?>"></script>

