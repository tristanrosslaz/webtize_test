<style>
.kbw-signature { width: 300px; height: 100px; }
</style>
<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Franchise Information Sheet Transaction History</li>
        </ol>
    </div>


    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Franchise Information Sheet Transaction History</h1><br>
                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Application Date</label>
                                                 <div class="row">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" data-column="0" class="input-sm form-control material_josh search-input-select searchDate searchDateFrom" name="start" value="<?=today_date();?>" />
                                                        <span class="input-group-addon" style="background-color:#fff0 ; border:none;">to</span>
                                                        <input type="text" data-column="1" class= "input-sm form-control material_josh search-input-select searchDate2 searchDateTo" name="end" value="<?=today_date();?>" />
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label col-form-label-sm">Applicant Name</label>
                                                <input type="text" data-column="2"  class="form-control material_josh form-control-sm search-input-text searchAppName" placeholder="Applicant Name">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">       
                                        <div class="col-md-12">
                                           <button type="button" style="float:right;" class="btn btn-primary filterBtn">Filter</button>
                                        </div>
                                    </div>
                            <!-- <table class="table table-striped table-hover"> -->
                            <br><br>
                            <div class="table-responsive">
                                 <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th>FIS Applicant ID</th> -->
                                            <th>Applicant Fullname</th>
                                            <th>Contact Number</th>
                                            <th>Application Date</th>
                                            <th width="80" class="text-center">Action</th>
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
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> -->
<script src="<?=base_url('assets/js/entity/franchise_info_sheet/fis_transaction_history.js');?>"></script>




