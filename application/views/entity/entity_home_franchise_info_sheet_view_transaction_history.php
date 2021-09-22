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
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>">FIS Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><?php echo $fis_app_info->lname . ", ".$fis_app_info->fname. " ".$fis_app_info->mname ." ". $fis_app_info->suffixname; ?></li>
        </ol>
    </div>



    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h1>Application Details</h1><br> -->
                            <h3><?php echo $fis_app_info->lname . ", ".$fis_app_info->fname. " ".$fis_app_info->mname ." ". $fis_app_info->suffixname; ?></h3>
                            <p>Application Date: <?=$fis_app_info->signature_date?></p>
                            <input type="hidden" class="fis_app_id" value="<?=$fis_app_info->fis_applicant_id?>">
<!--                             <?php if($fis_app_info->isConvertedToCustomer == 1): ?>
                            <button disabled class="btn btn-sm btn-success" >Converted to Customer</button>
                            <?php else: ?>
                            <button href="#" class="btn btn-sm btn-success convertToCustomerBtn" data-value='<?=$fis_app_info->fis_applicant_id?>'>Convert to Customer</button>
                            <?php endif; ?> -->
                            <a href="<?=base_url('Main_entity/view_pdf_fis_form/'.$fis_app_id."/".$token);?>" class="btn btn-sm btn-primary">View Application Details</a><br>
                            
                            <!-- <a href="#"><i class="fa fa-download"> Download Application Form</i></a> -->
                            <!-- <table class="table table-striped table-hover"> -->
                            <br><br>
                             <a class="btn btn-primary" href="<?=base_url('Main_entity/location_study_form/'.$fis_app_id ."/" .$token);?>" style="right:20px; position: absolute; top:20px;">Add Location Study Form</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Location Study Form ID</th>
                                            <th>Application Date</th>
                                            <th>Endorsement Form</th>
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
<script src="<?=base_url('assets/js/entity/franchise_info_sheet/lsf_transaction_history.js');?>"></script>




