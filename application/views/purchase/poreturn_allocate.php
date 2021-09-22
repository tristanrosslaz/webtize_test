<style>
   .btn.disabled, .btn:disabled {
    cursor: not-allowed;
    opacity: 1;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchase"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/return_summary/'.$token);?>">PO Return Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">PO Return Allocate</li>
        </ol>
    </div> 
    <section class="tables">
        <form id="form1">
            <input type = "hidden" id = "poretno" class = "poretno" name = "poretno" data-poretno = "<?=$poretno;?>">
            <input type = "hidden" id = "supid" class = "supid" name = "supid" data-supid = "<?=$get_supplier->id;?>">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-8 text-uppercase text-primary">
                                        <h4 style="margin-top: 8px;"><i class="fa fa-user"></i> <?php echo $get_supplier->suppliername?></h4>
                                    </div>
                                    <div class="col-md-4" style="text-align: right;"> 
                                        <button class="btn btn-primary pull-right" id="allocateBtn" type="submit"> Allocate Now</button>
                                        <a href="<?=base_url('Main_purchase/return_summary/'.$token);?>" style="float:right;margin-right:10px;" class="btn blue-grey BtnBack2"></i> Back</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <ul class="list-group">
                                            <li class="list-group-item active">Purchase Return Details</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Total
                                                <span class="badge badge-warning badge-pill"><?php echo number_format($totaldrretamount,2,".",",") ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Balance
                                                <span class="badge badge-warning badge-pill"><?php echo number_format($get_retbalance,2,".",",") ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Allocation
                                                <span class="badge badge-warning badge-pill" id="allocLabel">0.00</span>
                                            </li>
                                            <input value="<?=$get_retbalance?>" type="" id="retbalance" name="retbalance" hidden/>
                                            <input value="<?=$get_infosummary->poretno;?>" type="" id="poretno" name="poretno" hidden/>
                                            <input value="<?=$token;?>" type="hidden" id="token" name="token"/>
                                        </ul>
                                    </div>
                                    <input hidden value="<?=today_text();?>" id="todaydate" class="todaydate" name="todaydate">             
                                    <div class="col-md-8">
                                        <div class="form-group p-style">
                                            <h2 class="text-center" style="margin-right:250px" hidden id="loadingImg" > 
                                                <img height="100px" style="position: absolute;margin-top: 80px" class="loadingImg" src="<?=base_url('assets/img/loader.gif');?>">
                                            </h2>
                                            <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                <thead>
                                                    <tr>  
                                                        <th>Date</th>
                                                        <th>APV No</th>
                                                        <th>Balance</th>
                                                        <th style="width: 200px;">Amount</th>
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
            </div>
        </form>
    </section>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript" src="<?=base_url('assets/js/sales/poreturn_allocate.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script>


