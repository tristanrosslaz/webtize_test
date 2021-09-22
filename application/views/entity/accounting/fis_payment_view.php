<style>
.kbw-signature { width: 300px; height: 100px; }
.no-margin-bottom { margin-bottom: 0; }
.approval_label { font-weight: bold;font-size: 14px; }
.my_label {font-size: 13px;text-transform:uppercase;}
.my_label1 {font-size: 13px;}
/* Extra Small Devices, Phones */ 

th.dt-center {
  width: 90px !important;
}

th.size1 {
  width: 90px !important;
}

th.size2 {
  width: 120px !important;
}

@media only screen and (min-width : 480px) {
  .select2 {
    width: calc(100%) !important;
    margin-left: 0;
  }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {

  .select2 {
    width: calc(100%) !important;
    margin-left: 0;
  }
}
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header" data-token="<?php echo en_dec('en', $this->session->userdata('token_session')); ?>" data-fpno = "<?=$payment_summary->fpno?>">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">View Payment Details</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a></li>      
            <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('Main_franchise_accounting/franchise_payment_transaction_history/'.$token);?>">Franchise Payment Details Summary</a></li>      
            <!-- <li class="breadcrumb-item"><a href="<?=base_url('Main_entity/view_fis_transaction_history/'.$payment_summary->fis_applicant_id."/".$token);?>"><?php echo $payment_summary->lname . ", ".$payment_summary->fname. " ".$payment_summary->mname ." ". $payment_summary->suffixname; ?></a></li> -->
            <li class="breadcrumb-item">View Payment Details</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <form action="post" id='endorsement_for_ocular'>
                                <h3>Payment Details</h3>
                                <hr>
                                <input type="hidden" name="lsf_id" value="<?=$payment_summary->proposed_location_id?>">
                                <div class="col-md-12">
                                    <div class="row row-reg">
                                        <div class="col-md-12 no">
                                            <div class="form-group no-margin-bottom row">   
                                                <label class="form-label col-md-2 col-4">TYPE OF OCULAR : </label>
                                                <?php if($payment_summary->type_of_ocular == 1  ): ?>
                                                    <label class="col-md-10 col-8 my_label">New Location</label>
                                                <?php else: ?>
                                                    <label class="col-md-10 col-8 my_label">Site Assistance</label>
                                                <?php endif; ?>
                                            </div>
                                        </div>                                      

                                        <div class="col-md-12">
                                            <div class="form-group no-margin-bottom row">   
                                                <label class="form-label col-md-2 col-4">CONCEPT(S) : </label>
                                                <label class="col-md-10 col-8 my_label"><?php 
                                                foreach ($concepts as $value) {
                                                   echo $value["concepts"];
                                                }
                                                ?></label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group no-margin-bottom row">   
                                                <label class="form-label col-md-2 col-4">FRANCHISEE : </label>
                                                <label class="col-md-10 col-8 my_label"><?=$payment_summary->fname." ".$payment_summary->mname." ".$payment_summary->fname." ".$payment_summary->suffixname?></label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group no-margin-bottom row">   
                                                <label class="form-label col-md-2 col-4">CONTACT NUMBER : </label>
                                                <label class="col-md-10 col-8 my_label"><?=$payment_summary->mobile_no?></label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">    
                                                <label class="form-label col-md-2 col-4">EMAIL : </label>
                                                <label class="col-md-10 col-8 my_label1"><?=$payment_summary->email?></label>
                                            </div>
                                        </div>                                      

                                        <div class="col-md-12">
                                            <div class="form-group row">    
                                                <label class="form-label col-md-2 col-4">PREFERRED LOCATION: </label>
                                                <label class="col-md-10 col-8 my_label"><?=$payment_summary->preferred_location?></label>
                                            </div>
                                        </div>

                                        <input type="" id="franchise_id" value="<?=$payment_summary->fis_applicant_id?>" hidden>
                                        <input type="" id="fpno" class="fpno" value="<?=$payment_summary->fpno?>" hidden>
                                        <input type="" id="todaydate" value="<?=today_text()?>" hidden>
                                        <input type="" id="token" value="<?=$token?>" hidden>
                                    
                                    </div>
                                </div>  
                            </form>
                        </div>
                        <div class="form-group text-right" style="float: right;margin-right: 0px; top:0px;">
                            <hr>        
                            <div class="table-responsive p-4">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>     
                                            <th>Payment</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="p-4 pb-10">     
                                <div class="col-md-4 pr-0" style="float: right;">
                                    <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left btn-primary" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><a class="grand_total">Total: <?=number_format($payment_summary->totalamt,2,".",",")?></a></button>
                                    <input type="text" class="grandtotal_hide" id="grandtotal_hide" value="<?=$payment_summary->totalamt?>" hidden>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/accounting/franchise_payment_view.js');?>"></script>
