<!-- change the data-num and data-subnum for numbering of navigation -->
<style>
.bddatediv{
    margin-left: 5px;
}
.datetotext{
    margin: 5px;
}
</style>
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Deform Report"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Deform Report</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a></li>
            <li class="breadcrumb-item active">Deform Report</li>
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
                                            <div class="col-md-4 col-sm-8">
                                                <div class="form-group row">
                                                    <div class="form-group bddatediv" style="display:none;">
                                                        <label class="form-control-label col-form-label-sm">Date</label>
                                                        <div class="input-daterange input-group " id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom" readonly />
                                                        <span class="datetotext">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto" readonly/>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>  
                                        </div>
                                    </form>   
                                </div>
                            </div>
                            <button type="button" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO" style="right:20px; position: absolute; top:20px;">Search</button>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group row" style="float:right;">
                                        <div>
                                            <form action="<?php echo base_url('main_reports/cb_report_export');?>" method="post" target="_blank"> 
                                            <input id="datefrom1" type="text" class="input-sm form-control" name="datefrom1" value="<?php echo ($curdate)?>" hidden >
                                            <input id="dateto1" type="text" class="input-sm form-control" name="dateto1" value="<?php echo ($curdate)?>" hidden >
                                            <button style="float:right;display:none;" type="submit" class="btn btn-default btn-primary printBtn" name="printBtn" id="printBtn"><i class="fa fa-print" aria-hidden="true" ></i> Export</button>
                                            </form>
                                        </div>     
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date.</th>
                                                <th>Build No.</th>
                                                <th>Item</th>
                                                <th>Location</th>
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

    <div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
            <!-- <div class="modal-content modal_content_preloader">
            </div> -->
        </div> 
    </div>  

  
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/reports/deform_report.js');?>"></script>

