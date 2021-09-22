<style>
   .btn.disabled, .btn:disabled {
    cursor: not-allowed;
    opacity: 1;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/itinerary_summary/'.$token);?>">Itinerary Report Summary</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Itinerary Report</li>
        </ol>
    </div><!-- Page Header-->


    <!-- Breadcrumb-->
    <section class="tables" id = "itno_id_sec" class="itno_id_sec" name = "itno_id_sec" data-itno="<?=$get_infosummary->itno;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header d-flex align-items-center">
                            <h4 style="float: left;">ITNO #<?=$get_infosummary->itno?></h4>
                        </div>
                       <div class="card-body">
                            <!-- <form class="form-horizontal encode-info-css encode_form" id="encode_form"> -->
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label">Information <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Date : </div>
                                                    <div class="col-md-8"><?=$get_infosummary->trandate?></div>
                                                  </div>
                                                 <div class="row">
                                                    <div class="col-md-4">Truck Plate No. : </div>
                                                    <div class="col-md-8"><?=$get_truck->plateno?></div>
                                                  </div>                                           
                                            </div>
                                    </div>
                                    <div class="col-md-6" >
                                    <div id="qrcode" style="float: right" hidden></div>
                                    <!-- <img id="qrcimg"> -->
                                  </div>
                              </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>DR No.</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Area</th>
                                                <th>Perish (Box)</th>
                                                <th>Perish (Bag)</th>
                                                <th>Dry (Box)</th>
                                                <th>Dry (Bag)</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <label for="notes">Notes</label> 
                               <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes"><?=$get_infosummary->notes?></textarea>
                                <div class="form-group row" style="margin-top: 30px;">       
                                    <div class="col-md-12">

                                        <button class="btn btn-primary addNotes">Save Changes</button>
                                        <input type="" value="<?=$token?>" id="token" hidden>
                                        <button style="float:right"  class="btn btn-primary printBtn"></i> Print Itinerary Report</button>
                                         <a href="<?=base_url('Main_sales/itinerary_summary/'.$token);?>" style="float:right;margin-right:10px;" class="btn btn-success BtnBack2"> Back</a>
                                    </div>
                                </div>
                          <!--   </form> -->
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets/js/sales/itnerary_report.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


