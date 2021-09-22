<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="#ticket-collapse" data-labelname="Purchases"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/purchase_home/'.$token);?>">Purchases</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Purchase Order #<?=$get_infosummary->pono?></li>
        </ol>
    </div>
    <section class="tables" id = "pono_id_sec" class="pono_id_sec" name = "pono_id_sec" data-pono="<?=$get_infosummary->pono;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Price Adjustment Information</h6>
                       <div class="card-body">
                            <form class="form-horizontal encode-info-css" id="">
                                  <input type="" class="" value="1"  id="rowrec" hidden>
                                   <input type="" class="" value=""  id="priceresult" hidden>
                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th width="80">Action</th>

                                            </tr>
                                        </thead>
                                    </table>
                                </div>    
                                <input type="" value="<?=$pono;?>" id="pono" class="pono" hidden>    
                                <input type="" value="<?=md5($get_edit_supplier->id);?>" id="supid" class="supid" hidden>        

                                   
                                <div class="form-group row" style="margin-top: 10px;">       
                                    <div class="col-md-12">
                                        <a href="<?=base_url('Main_purchase/price_adjustment/'.$token);?>" style="float:right; margin-right: 10px;" class="btn blue-grey backButton "> Back</a>
                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div id="updatePriceAdjustModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
   <div role="document" class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Adjust Price</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal personal-info-css" id="updatepriceadjust-form">
               <div class="form-group row">
                <div class="col-md-12">
                      <div class="form-group">
                        <small>Item Name</small>
                        <input class="form-control hidden itemid" type="text"  name="itemid" id="itemid" hidden>
                        <input class="form-control hidden pono" type="text"  name="pono" id="pono" value="<?=$get_infosummary->pono;?>" hidden>
                        <input value="<?=$token;?>" type="" id="token" name="token" hidden/>
                        <input type="text" class="form-control form-control-success itemdesc" name="itemdesc" id="itemdesc" readonly>
                      </div>
                    <div class="form-group">
                        <small>Unit </small>
                        <input type="text" class="form-control form-control-success unit" name="unit" id="unit" readonly>
                    </div>
                    <div class="form-group">
                        <small>Qty </small>
                        <input type="text" class="form-control form-control-success qty" name="qty" id="qty" readonly>
                    </div>
                    <div class="form-group">
                        <small >Price </small>
                        <input type="text" class="form-control form-control-success price" name="price" id="price" readonly>
                    </div>
                    <div class="form-group">
                        <small>Adjust Price </small>
                        <input class="form-control valid_number newprice" min="0" onkeypress="return isNumberKeyOnly(event)" name="newprice" type="text" id="newprice" placeholder="Enter Price">
                    </div>
                 </div>
               </div>
               <div class="modal-footer">
                  <div class="form-group row">
                     <div class="col-md-12">
                        
                        <button type="button" style="margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        <button class="btn btn-primary savePriceAdjust" id="savePriceAdjust" data-dismiss="modal" aria-label="Close" type="button" >Update</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/purchase/tbl_price_adjustment.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/sales/functions.js');?>"></script> 

