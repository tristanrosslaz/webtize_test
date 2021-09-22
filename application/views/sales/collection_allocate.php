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
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Collection Allocate (Delivery Receipt)</li>
        </ol>
    </div>
    
    <section class="tables" id = "collection_id_sec" class="collection_id_sec" name = "collection_id_sec" data-collectionid="<?=$get_infosummary->id;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                               <form id="form1">
                                 <div class="card-body">
                                     <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-8 text-uppercase text-primary"><h4 style="margin-top: 8px;"><i class="fa fa-user"></i> <?php echo $get_edit_membermain->lname . ", " . $get_edit_membermain->fname . " " . $get_edit_membermain->mname?></h4>
                                      </div>
                                      <div class="col-md-4" style="text-align: right;"> 

                                          <button class="btn btn-primary pull-right" id="allocateBtn" disabled type="submit"> Allocate Now</button>
                                          <a href="<?=base_url('Main_sales/collection_summary/'.$token);?>" style="float:right;margin-right:10px;" class="btn blue-grey BtnBack2"> Back</a>
                                        </div>
                                      </div>
                                 <div class="form-group row">
                                    <div class="col-md-4">
                                            <ul class="list-group">
                                              <li class="list-group-item active">Collection Details</li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Total
                                                <span class="badge badge-warning badge-pill"><?php echo number_format($totalcollectionamt,2,".",",") ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Balance
                                                <span class="badge badge-warning badge-pill"><?php echo number_format($get_collectionbalance,2,".",",") ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Allocation
                                                <span class="badge badge-warning badge-pill" id="allocLabel">0.00</span>
                                              </li>
                                              <input value="<?=$get_collectionbalance?>" type="" id="drpaybalance" name="drpaybalance" hidden/>
                                              <input value="<?=$get_infosummary->id;?>" type="" id="collectionid" name="collectionid" hidden/>
                                              <input value="<?=$idno;?>" type="" id="idno" name="idno" hidden/>

                                              <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                                            </ul>
                                    </div>
                                    <input hidden value="<?=today_text();?>" id="todaydate" class="todaydate" name="todaydate">             
                                <div class="col-md-8">

                                  <h2 class="text-center" style="margin-right:250px" hidden id="loadingImg" > 
                                       <img height="100px" style="position: absolute;margin-top: 80px" class="loadingImg" src="<?=base_url('assets/img/loader.gif');?>">
                                  </h2>

                                    <div class="form-group p-style">
                                            <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                              <thead>
                                                  <tr>  
                                                      <th>Date</th>
                                                      <th>DR No</th>
                                                      <th>Balance</th>
                                                      <th style="width: 200px;">Amount</th>
                                                  </tr>
                                              </thead>
                                            </table>
                                      </div>               
                                    </div>
                              </div>
                            </div>
                               </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets/js/sales/collection_allocate.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


