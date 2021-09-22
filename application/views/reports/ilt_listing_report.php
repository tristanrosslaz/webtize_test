<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="ILT Listing Report"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">ILT Listing Report</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a></li>
            <li class="breadcrumb-item active">ILT Listing Report</li>
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
                                    <form action="<?php echo base_url();?>Main_reports/ilt_listing_export" method="post" target="_blank"> 
                                    <div class="row">
                                       
                                        <div class="col-lg-3">
                                            <div class="form-group row">
                                                <div class="form-group bddatediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date</label>
                                                    <div class="input-daterange input-group " id="datepicker">
                                                    <input type="text" class="input-sm form-control search-input-date" id="datefrom" readonly />
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="input-sm form-control search-input-date" id="dateto" readonly/>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>

                                    <div class="col-md-5">
                                        <div class="form-group row" style="float:right;">
                                            <div>
                                                <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO">Search</button>

                                                

                                                    <button type="submit" class="btn btn-default btn-primary iltExport" name="iltExport" id="iltExport">Export</button>

                                                

                                            </div>     
                                        </div>
                                    </div>                

                                     
                                </div>
                              </form>   
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="80">Date</th>
                                            <th width="80">ILT No.</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th></th>
                                          <!--   <th width="80"></th> -->
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


    <div id="viewBDModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="card-header d-flex align-items-center">
                                    <h4>ILT Listing Transfer # </h4>
                                    <h4 class="iltno" id="iltno"></h4>
                            </div>
                                <div class="col-md-6">
                                    <p id="trandate" class="trandate" ></p>
                                </div>
                <form class="form-horizontal personal-info-css" id="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            
                                    <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label">Delivery To <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">From Location: </div>
                                                    <p class="col-md-8 itemlocid1" id="itemlocid1"></p>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">To Location: </div>
                                                    <p class="col-md-8 itemlocid2" id="itemlocid2"></p>
                                                  </div>
                                            </div>
                                    </div>
                                    </div>
                  
                            </div>
                        </div>

                        
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table table-hover table-hover table-striped" id="table-grid1"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
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
                                     <br>
                                     <br>
                                     <label for="notes">Notes</label> 
                                     <textarea style="resize:none" class="form-control notes" id="notes" rows="4" cols="40" name="notes" disabled=""></textarea>

                            <div class="row">
                                <label class="col-md-12 form-control-label" id="info_notes" type="text" ></label>
                            </div>    
                        

                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
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
<script type="text/javascript" src="<?=base_url('assets/js/reports/ilt_listing_report.js');?>"></script>

