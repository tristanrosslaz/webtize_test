<style>
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

.table-dark.table-bordered, .table-responsive>.table-bordered {
  border: 1px solid #dee2e6;
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
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 
  <div class="bc-icons-2 card mb-4">
    <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
      <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
      <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_purchase/purchase_summary/'.$token);?>">Purchase Order Approval</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
      <li class="breadcrumb-item active">Purchase Order Approve View</li>
      <input type="hidden" name="hdnToken" id="hdnToken" class="hdnToken" value="<?=$token?>">
    </ol>
  </div>

  <?php
    if (empty($get_next)) { 
      $nextpono = "";
      $nextsupid = "";
    }
    else {
      $nextpono = $get_next->pono;
      $nextsupid = md5($get_next->supid);
    }
  ?>
  <section class="tables" id="pono" class="pono" name = "pono" data-pono="<?=$pono;?>" data-nextpono="<?=$nextpono?>" data-nextsupid="<?=$nextsupid;?>">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <h6 class="secondary-bg px-4 py-3 white-text">Purchase Order Information</h6>
            <div class="card-header d-flex align-items-center">
              <h4 style="float: left;">Purchase Order # <?=$pono?></h4>
            </div>
            <div class="card-body">
              <form class="form-horizontal encode-info-css encode_form" id="encode_form">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="form-control-label">Delivery To <span hidden class="asterisk" style="color:red;">*</span></label>
                    <div class="form-group p-style">
                      <div class="row">
                        <div class="col-md-4">Supplier: </div>
                        <div class="col-md-8"><h4><?php echo $get_summary->suppliername?></h4></div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">Contact Person: </div>
                        <div class="col-md-8"><p><?=$get_summary->contactperson?></p></div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">Contact No: </div>
                        <div class="col-md-8"><p><?=$get_summary->contactno?></p></div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">Mode of Payment: </div>
                        <div class="col-md-8"><p><?=$get_summary->description?></p></div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">Address: </div>
                        <div class="col-md-8"><p><?=$get_summary->address?></p></div>
                      </div>  
                    </div>
                    
                  </div>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                    <thead>
                      <tr>
                        <th>Item Name</th>
                        <th class="size1" width="80px">Quantity</th>
                        <th class="size1" width="80px">Unit</th>
                        <th class="size1" width="80px">Price</th>
                        <th class="size1" width="80px">Discount</th>
                        <th class="size1" width="80px">Total</th>
                      </tr>
                    </thead>
                  </table>
                </div>       
                  <div class="p-4 pb-10">     
                    <div class="col-md-4 pr-0" style="float: right;">

                      <?php
                        if ($get_summary->discount_type ==  2) {
                          $discount_val = number_format($get_summary->gen_discount).'%';
                        }
                        else {
                          $discount_val = number_format($get_summary->gen_discount,2,".",",");
                        }

                        $total_amount_computed = general_discounted_total($get_summary->totalamt, $get_summary->freight, $get_summary->gen_discount, $get_summary->discount_type);
                      ?>

                      <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount">Discount: <?=$discount_val?></a></button>

                      <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnShip" data-toggle="modal" data-target="#addAShippingModal" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?php echo  number_format($get_summary->freight,2,".",",") ?></a></button>

                      <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">
                      Total : <?=$total_amount_computed;?></a></button>

                      <input type="" class="disc_perc" id="disc_perc" value="<?=$get_summary->discount_type?>" hidden>
                      <input type="" class="discount" id="discount" value="<?=$get_summary->gen_discount?>" hidden>
                      <input type="text" class="ship_hide" id="ship_hide" value= "<?=$get_summary->freight?>" hidden>
                      <input type="text" class="grandtotal_hide" id="grandtotal_hide" value= "<?=$total_amount_computed;?>" hidden>
                      <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                    </div>
                  </div> 
                <br><br><br><br><br><br><br>
                <label for="notes" style="margin-top: 10px">Notes</label> 
                <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled><?=$get_summary->notes?></textarea>     
              </form>
            </div>
          </div>

          <div class="form-group row" style="margin-top: 30px;">       
            <div class="col-md-12">
              <?php $searchArray = explode('|', $this->session->userdata('search')); ?>
              <?php if (!empty($get_next) AND $searchArray[1] != "ponodiv") { ?>
                <a href="<?=base_url('purchase/PO_approvalview/poapprovalview/'.$token.'/'.$get_next->pono.'/'.md5($get_next->supid));?>" style="float:right" class="btn btn-primary btnNext "> Next</a>
              <?php } ?>
              <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#approvePurchaseModal" style="float:right; margin-right: 10px;" class="btn btn-primary btnApprove"> Approve</button>
              <a href="<?=base_url('Main_purchase/purchase_summary/'.$token);?>" style="float:right; margin-right: 10px;" class="btn blue-grey backButton "> Back</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <div id="approvePurchaseModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Confirm</h4>
        </div>
        <form class="form-horizontal personal-info-css" id="">
          <div class="modal-body">
            <div class="">
              <div class="row">
                <div class="col-lg-12">
                  <p style="margin: auto;padding: 20px;">Are you sure you want to approve?</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-group row">
              <div class="col-md-12">
                <button type="button" style="margin-right:10px;" data-dismiss="modal" class="btn blue-grey cancelBtn" aria-label="Close">Close</button>
                <button type="submit" class="btn btn-primary approvePurchaseOrder" name="approvePurchaseOrder" id="approvePurchaseOrder" class="approvePurchaseOrder" >Approve</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/poapprovalview.js');?>"></script>