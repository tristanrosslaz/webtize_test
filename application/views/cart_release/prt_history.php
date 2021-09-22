<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="9" data-namecollapse="" data-labelname="Package Release Transaction History"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Package Release</li>
            <span id="toast" hidden=""><?=$this->session->flashdata('prtoast');?></span>
            <span id="prnoflash" hidden=""><?=$this->session->flashdata('prno');?></span>
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
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group searchfilter">
                                                <label class="form-control-label col-form-label-sm">Search Filter</label>
                                                <select class="form-control" name="prsearchfilter" id="prsearchfilter">
                                                    <option value="prdatediv">Search by Date</option>
                                                    <option value="prnodiv">Search by PR No.</option>
                                                    <option value="prfranchiseediv">Search by Franchisee</option>
                                                    <option value="prstatdiv">Search by Status</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">

                                                <div class="form-group prdatediv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm datelabel">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom" readonly />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto" readonly/>
                                                    </div>
                                                </div>

                                                <div class="form-group prnodiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">PR No.</label>
                                                    <input type="text" class="input-sm form-control search-input-name" id="prno" onkeypress="return isNumberKeyOnly(event)" placeholder="PR No." />
                                                </div>

                                                <div class="form-group prfranchiseediv" style="display:none;">
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

                                                <div class="form-group prstatdiv" style="display:none;">
                                                    <label class="form-control-label col-form-label-sm">Date and Status</label>
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="input-sm form-control search-input-date" id="datefrom1" readonly />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" class="input-sm form-control search-input-date" id="dateto1" readonly/>
                                                    </div>
                                                    <br>

                                                    <select class="form-control" name="prstatus" id="prstatus">
                                                        <option value="none">Select Status...</option>
                                                        <option value="Waiting for Approval">Waiting for Approval</option>
                                                        <option value="Approved">Approved</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row" style="float:right;">
                                                <div>
                                                    <button type="button" style="float:left; margin-left:0px;" class="btn btn-default btn-primary btnSearchPR" id="btnSearchPR">Search</button>
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
                                            <th width="50">PR No.</th>
                                            <th>Franchisee Name / Concept</th>
                                            <th width="50">Type</th>
                                            <th>Mode of Release</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Action</th>
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

    <div id="viewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">Package Release</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="card-body">
                                    
                                    <div class="" >
                                        <div class="">
                                            <label class="" style="float:left;"># </label>
                                            <H1 class="vm_prno" style="border:none; float:left;"></H1>
                                            <p><br></p>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <span type="text" class="vm_trandate"></span>
                                            <p><br></p>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">To </label>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <H2 class="vm_franchisee"></H2>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Location Address: </label>
                                            <span type="text" class="vm_location" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Concept: </label>
                                            <span type="text" class="vm_concept" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Contact No.: </label>
                                            <span type="text" class="vm_contact" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Type: </label>
                                            <span type="text" class="vm_type" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Size: </label>
                                            <span type="text" class="vm_size" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <label class="">Mode of Release: </label>
                                            <span type="text" class="vm_mor" style="border:none;" disabled></span>
                                        </div>  
                                    </div>

                                    <br><br>
                                    <div class="table-responsive">
                                        <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="90">Item ID</th>
                                                    <th>Description</th>
                                                    <th width="90">Qty</th>
                                                    <th width="90">Unit</th>
                                                    <th width="120">Remarks</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                    <br><br>
                                    <label for="notes">Notes</label> 
                                    <textarea style="resize:none" class="form-control vm_notes" rows="4" cols="40" id="vm_notes" name="vm_notes" disabled=""></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-basic cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="approveModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Approve Package Release</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="approveForm" method="post" action="<?= base_url();?>Main_cart/approve_package_release">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="am_prno" class="am_prno" id="am_prno">
                                    <p>Proceed with the approval of Package Release for <b><span class="am_franchisee" id = "am_franchisee"></span></b></p>
                                    <p>Dated: <span class="am_date" id = "am_date"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary approveBtn">Approve</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-basic" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Package Release</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="deleteForm" method="post" action="<?= base_url();?>Main_cart/delete_package_release">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="dm_prno" class="dm_prno" id="dm_prno">
                                    <p>Proceed with the deletion of Package Release for <b><span class="dm_franchisee" id = "dm_franchisee"></span></b></p>
                                    <p>Dated: <span class="dm_date" id = "dm_date"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteBtn">Approve</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-basic" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/cart_release/prt_history.js');?>"></script>