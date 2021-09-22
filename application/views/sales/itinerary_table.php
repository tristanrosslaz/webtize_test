<style>
td>select.form-control:not([size]):not([multiple]) {
    height: calc(1rem + 5px);
    width: 85%;
}
</style>
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Itinerary Table</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_sales/sales_home/'.$token);?>">Sales</a></li>
        <li class="breadcrumb-item active">Transaction History</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                       <!-- <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-md-12 row">
                                    <div class="col-md-6">
                                    <h3 class="step_label">Sales Order Itinerary</h3>
                                  </div>
                                  <div class="col-md-6">
                              </div>
                            </div>
                            </div>
                        </div> -->
                        <div class="card-body">
                            <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Select Filter</label>
                                                <!-- <input type="text" data-column="1"  class="form-control material_josh form-control-sm search-input-text searchDescription" placeholder="Description"> -->
                                                    <select id="sosearchfilter" class="form-control sosearchfilter select2">
                                                      <option value="podatediv">Search by Date</option>
                                                     <!--  <option value="ponodiv">Search by SO No</option>
                                                      <option value="ponostatus">Search by Status</option> -->
                                                    </select>              
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                               <!--  <div class="podatediv" id="podatediv"></div> -->
                                        <div class="podatediv" id="podatediv">
                                            <label class="form-control-label col-form-label-sm">Date</label>
                                             <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" data-column="0" class="input-sm form-control material_josh search-input-select1 searchDateTo" value="<?=today_text();?>" name="start" />
                                                    <span class="input-group-addon" style="background-color:#fff; border:none;">to</span>
                                                    <input type="text" data-column="1" value="<?=today_text();?>" class="input-sm form-control material_josh search-input-select2 searchDateFrom" name="end" />    
                                                </div>   
                                                </div>
                                                <div class="ponodiv" id="ponodiv" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">SO No.</label>
                                                <input type="text" data-column="2" class="input-sm form-control material_josh search-input-text search_pono" id="search_pono"/> 
                                            </div>

                                            <div class="ponostatus" id="ponostatus" style="display: none;">
                                                <label class="form-control-label col-form-label-sm">Status</label>

                                                <select id="search_status" data-column="3" class="input-sm form-control material_josh search-input-text search_status" >
                                                      <option selected></option>
                                                      <option value="Waiting for Conversion">Waiting for Conversion</option>
                                                      <option value="Converted to DR">Converted to DR</option>
                                                    </select> 
                                            </div>
                                            </div>
                                        </div>
                                        <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                                        <div class="col-lg-4" style="height: 114px; display: flex; align-items: center;">
                                       
                                            <label class="form-control-label col-form-label-sm "></label>
                                            <button type="submit" id="search_order" class="btn btn-primary search_order">Search</button>                             
                                        </div>
                                    </div>
                                </div>
                            <form id="form-itinerary">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                  
                                        <tr>
                                            <th>DR No.</th>
                                            <th>Name (Branch)</th>
                                            <th>Date</th>
                                            <th>No. of bags</th>
                                            <th>Driver</th>
                                            <th>Crew #1</th>
                                            <th>Crew #2</th>
                                            <th>Crew #3</th>
                                        </tr>
                                    </thead>
                                </table>

                            </div>
                            <br><br><br>
                             <button class="btn btn-warning btnGrand col-md-12 BtnSaveItinerary" id="BtnSaveItinerary" name="grand_total">Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/itinerary_table.js');?>"></script>
