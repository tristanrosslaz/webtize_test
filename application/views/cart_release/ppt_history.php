<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="9" data-namecollapse="" data-labelname="Package Pullout Transaction History"> 
 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Package Pullout Transaction History</li>
            <span id="toast" hidden=""><?=$this->session->flashdata('ppftoast');?></span>
            <span id="ppfnoflash" hidden=""><?=$this->session->flashdata('ppfno');?></span>
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

                                        <div class="col-md-3">
                                            <div class="form-group searchfilter">
                                                <label class="form-control-label col-form-label-sm">Search Filter</label>
                                                <select class="form-control" name="ppfsearchfilter" id="ppfsearchfilter">
                                                    <option value="ppfdatediv">Search by Date</option>
                                                    <option value="ppfnodiv">Search by PPF No.</option>
                                                    <option value="ppffranchiseediv">Search by Franchisee</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">

                                                <div class="form-group ppfdatediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm datelabel">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom" readonly />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto" readonly/>
                                                    </div>
                                                </div>

                                                <div class="form-group ppfnodiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">PPF Number</label>
                                                    <input type="text" class="input-sm form-control search-input-name" id="ppfno" onkeypress="return isNumberKeyOnly(event)" placeholder="PPF Number.." />
                                                </div>

                                                <div class="form-group ppffranchiseediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Franchisee</label>
                                                    <select class="form-control" name="franchisee" id="franchisee">
                                                        <option value="none">Select Franchisee</option>
                                                        <?php foreach ($get_frachisee->result() as $franchisee) { ?>
                                                            <option value="<?=$franchisee->idno?>">
                                                              <?php echo strtoupper($franchisee->name); ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row" style="float:right;">
                                                <div>
                                                    <button type="button" style="float:left; margin-left:0px;" class="btn btn-default btn-primary btnSearchPPF" id="btnSearchPPF">Search</button>
                                                    <br><br>
                                                </div>     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="70">Date.</th>
                                            <th width="70">PPF No.</th>
                                            <th>Franchisee Name / Concept</th>
                                            <th width="90">Type</th>
                                            <th width="90">Action</th>
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

    <div id="approveApvModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">APV Approve</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="approveApvForm" method="post" action="<?= base_url();?>Main_account/apv_approve">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Proceed with the Approval of <br>APV #<bold class="apvno" id = "apvno"></bold></p>
                                    <input type="hidden" class="hdn_apvno" name="hdn_apvno" id="hdn_apvno" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary approveApvBtn">Approve</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/cart_release/ppt_history.js');?>"></script>