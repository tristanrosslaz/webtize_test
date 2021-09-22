<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Bounce Check Transaction History Reference</li>
        </ol>
    </div>
     <section class="tables" id = "drno_id_sec" class="drno_id_sec" name = "drno_id_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <h6 class="secondary-bg px-4 py-3 white-text">Bounce Check Information</h6>
                      <div class="card-header d-flex align-items-center">
                                    <h4 style="float: left;">Delivery Receipt  #<?=$get_summary->drno?></h4>
                            </div>
                       <div class="card-body">
                            <!-- <form class="form-horizontal encode-info-css encode_form" id="encode_form"> -->
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label">Delivery To <span hidden class="asterisk" style="color:red;">*</span></label>
                                            <div class="form-group p-style">
                                                <div class="row">
                                                    <div class="col-md-4">Customer: </div>
                                                    <div class="col-md-8"><h4><?=$get_summary->name?></h4></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Branch: </div>
                                                    <div class="col-md-8"><p><?=$get_summary->branch?></p></div>
                                                  </div>
                                                   <div class="row">
                                                    <div class="col-md-4">Mode of Payment: </div>
                                                    <div class="col-md-8"><p><?=$get_summary->description?></p></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Contact No: </div>
                                                    <div class="col-md-8"><p><?=$get_summary->conno?></p></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Outlet Address: </div>
                                                    <div class="col-md-8"><p><?=$get_summary->address?></p></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">Ship Via: </div>
                                                    <div class="col-md-8"><p><?=$get_summary->shipping?></p></div>
                                                  </div>

                                                  <!-- HIDDEN FIELDS -->
                                                    <input type="text" id="drno" class="drno" value="<?=$get_summary->drno?>" hidden>
                                                    <input type="text" id="idno" class="idno" value="<?=$get_summary->idno?>" hidden>
                                            </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <div class="form-group p-style">
                                                  <div class="table-responsive">
                                                      <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                          <thead>
                                                              <tr>
                                                                  <th>Date</th>
                                                                  <th>Reference</th>
                                                                  <th>Amount</th>
                                                                  <th></th>
                                                              </tr>
                                                          </thead>
                                                      </table>
                                                  </div>
                                      </div>
                                      </div>                  
                                        <input id="inputHorizontalWarning" type="hidden" class="form-control form-control-warning datepicker sales_date" value="<?php if(!empty($get_infosummary)){ echo date_format(date_create($get_infosummary->trandate),"m/d/Y");}?>" id="sales_date" name="sales_date"/>
                                    </div>
                              </div>
                                      <input type="text" id="drno" class="drno" value="<?=$get_summary->drno?>" hidden>
                                      <input type="text" id="idno" class="idno" value="<?=$get_summary->idno?>" hidden>
                                <hr>
                                <br>      
                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Qty</th>
                                                            <th>Unit</th>
                                                            <th>Unit Price</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                </table><br>
                                </div>

                                <div class="col-md-4" style="float: right; padding-right: 0px;">

                                          <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey" data-toggle="modal" data-target="#" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" id="" ><i class="fa fa-truck white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnShipping">Shipping: <?=number_format($get_summary->freight,2);?></a></button>

                                          <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" ><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total : <?=number_format($get_summary->totalamt,2);?></a></button>
                                </div>

                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <hr>
                                <label for="notes">Notes</label> 
                                <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_summary->notes?></textarea>



                                <div hidden class="row" style="margin-top: 30px;">
                                                    <div class="col-md-6" style="margin-top: 13px;">
                                                       <div class="form-group ">
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6" style="float: right;">
                                                       <div class="form-group" style="float: right; margin-right: 85px;">
                                                          <label class="font-weight-bold" style="margin-top: 18px;">TOTAL: </label>
                                                          ₱ <input disabled type="text" class="grand_total" name="grand_total" id="grand_total" value="<?=$get_summary->total?>">
                                                       </div>
                                                    </div>
                                                 </div>
           
                                <div class="form-group row" style="margin-top: 10px;">       
                                    <div class="col-md-12">

                                         <a href="<?=base_url('Main_account/bct_history/'.$token);?>" style="float:right;margin-right:10px;" class="btn blue-grey BtnBack2"><i class="fa fa-arrow-left" aria-hidden="true" ></i> Back</a>
                                    </div>
                                </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/bct_history_reference.js');?>"></script>

