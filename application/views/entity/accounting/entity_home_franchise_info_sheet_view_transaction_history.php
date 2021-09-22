<style>
    .kbw-signature { width: 300px; height: 100px; }
    .backdrop{
        position: fixed;
        top: 0px;
        left: 0px;
        z-index: 999;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.2);
        display: none;
    }
    .scan_barcode{
        height: 250px;
        width: 300px;
        background-color: white;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
</style>

<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header" data-token="<?=$token?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">View Applicant Information</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid"> 
        	<li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a></li>      
	        <!-- <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a></li> -->
	       	<li class="breadcrumb-item"><a href="<?=base_url('Main_franchise_accounting/franchise_payment_details/'.$token);?>">Franchise Payment Details</a></li>
	       	<li class="breadcrumb-item"><?php echo $fis_app_info->lname . ", ".$fis_app_info->fname. " ".$fis_app_info->mname ." ". $fis_app_info->suffixname; ?></li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- <a class="btn btn-primary btn-sm" href="<?=base_url('Main_entity/proposed_location/'.$fis_app_id ."/" .$token);?>" style="float:right">Add Proposed Location</a> -->

                            <!-- <button class="btn btn-primary btn-sm btnScanQrCode" style="float:right;margin-right: 10px">Scan QR CODE</button> -->

                            <h3><?php echo $fis_app_info->lname . ", ".$fis_app_info->fname. " ".$fis_app_info->mname ." ". $fis_app_info->suffixname; ?></h3>

                            <p>Application Date: <?=$fis_app_info->signature_date?></p>

                            <input type="hidden" class="fis_app_id" value="<?=$fis_app_info->fis_applicant_id?>">

                            <?php if($fis_app_info->isConvertedToCustomer == 1): ?>
                            <!-- <button disabled class="btn btn-sm btn-success" >Converted to Customer</button> -->
                            <?php else: ?>
                            <!-- <button href="#" class="btn btn-sm btn-success convertToCustomerBtn" data-value='<?=$fis_app_info->fis_applicant_id?>'>Convert to Customer</button> -->
                            <?php endif; ?>

                            <!-- <a href="<?=base_url('Main_entity/view_pdf_fis_form/'.$fis_app_id."/".$token);?>" class="btn btn-sm btn-primary">View Application Details</a><br> -->
                            
                            <br><br>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Proposed Location ID</th>
                                            <th>Type of Ocular</th>
                                            <th>Concepts</th>
                                            <th>Proposed Location</th>
                                            <th>Date Submitted</th>
                                            <th>Initial Assessment</th>
                                            <th>Final Assessment</th>
                                            <!-- <th width="80" class="text-center">Action</th> -->
                                        </tr>
                                    </thead>
                                </table>	
                            </div>
                        </div>
                        <div class="backdrop" id="backdrop">
                            <div class="scan_barcode text-center" style="padding:20px;">
                                <i class="fa fa-qrcode" style="font-size:120px;color:lightblue"></i>
                                <h4>Scan QR Code from Application Form</h4>
                                <br>
                                <button class="btn btn-primary btnStopScan">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/accounting/lsf_for_accounting.js');?>"></script>
