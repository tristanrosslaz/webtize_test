<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Bounce Check Transaction History View</li>
        </ol>
    </div>
    <section class="tables" id = "drno_id_sec" class="drno_id_sec" name = "drno_id_sec" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                                <!-- <div class="col-md-12 "> -->
                                    <!-- <div class="col-md-6"> -->
                                    <h4 style="float: left;">Delivery Receipt  #<?=$get_summary->drno?></h4>
                                  <!-- </div> -->
                            <!-- </div> -->
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
                                                    <div class="col-md-8"><p><?=$get_summary->branchname?></p></div>
                                                  </div>
                                                   <div class="row">
                                                    <div class="col-md-4">Mode of Payment: </div>
                                                    <div class="col-md-8"><p><?=$get_summary->termcredit?></p></div>
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
                                                    <div class="col-md-4">Encoded By: </div>
                                                    <div class="col-md-8"><p><?=$get_summary->username?></p></div>
                                                  </div>

                                                  <!-- HIDDEN FIELDS -->

                                                    <input type="text" id="drno" class="drno" value="<?=$get_summary->drno?>" hidden>
                                                    <!-- <input type="text" value="<?php if(!empty($get_drno)){ echo $get_drno->drno;}?>" id="drno" class="drno" name="drno"> -->
                                            </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
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
                                     <button type="button" class="btn btn-default col-md-12 btnShipping" id="btnShipping" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" disabled="">Shipping: <?=number_format($get_summary->freight,2);?></button>
                                                  <input type="hidden" value= "<?=number_format($get_summary->freight,2);?>" class="form-control form-control-success shippingamt" name="shippingamt" id="shippingamt">
                                                 <button class="btn btn-warning btnGrand col-md-12 grand_total disabled" id="grand_total" name="grand_total">Total : <?=number_format($get_summary->total,2);?></button>
                                                 <input type="hidden" value= "<?=number_format($get_summary->total,2);?>" class="form-control form-control-success grand_total2" name="grand_total2" id="grand_total2">

                                     <br>
                                     <br>
                                     <label for="notes">Notes</label> 
                                     <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_summary->notes?></textarea>
                                     <label for="notes">I hereby certify that I have received all the items listed above in complete quantity and good conidition.</label> <br>
                                     <label for="notes">Received By / Date:</label>

                                </div>
                                <div hidden class="row" style="margin-top: 30px;">
                                                    <div class="col-md-6" style="margin-top: 13px;">
                                                       <div class="form-group ">
                                                          <button type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addAShippingModal" class="btn btn-primary btnShipping" name="update">Add Shipping</button>
                                                          <!-- <input type="hidden" class="form-control shipping_cost" name="shipping_cost" id="shipping_cost"> -->
                                                         <!--  <input type="button" name="Sumbit" class="btn btn-primary addShipping" name="addShipping" id="addShipping" value="Add to Total Amount" onclick="javascript:addNumbers()" disabled /> -->
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6" style="float: right;">
                                                       <div class="form-group" style="float: right; margin-right: 85px;">
                                                          <label class="font-weight-bold" style="margin-top: 18px;">TOTAL: </label>
                                                          ??? <input disabled type="text" class="grand_total" name="grand_total" id="grand_total" value="<?=$get_infosummary->totalamt?>">
                                                          <!--  <input type="text" class="form-control grand_total1" name="grand_total1" id="grand_total1"> -->
                                                          <!--  <p class="form-control grand_total1" name="grand_total1" id="grand_total1"></p> -->
                                                       </div>
                                                    </div>
                                                 </div>
                                <div class="form-group" style="margin-top: 30px;">
                                   <!--  <label for="notes">Notes</label>  -->
                                <div class="col-md-12">
                                        <!--  <textarea type="text" style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes"><?=$get_infosummary->notes?></textarea> -->
                                    </div>  
                                </div>          
                                <div class="form-group row" style="margin-top: 30px;">       
                                    <div class="col-md-12">
                                        <button style="float:right; margin-right:15px;"  class="btn btn-primary printBtn" id="printBtn"><i class="fa fa-print" aria-hidden="true" ></i> Print Delivery Receipt</button>

                                         <a href="<?=base_url('Main_account/bct_history/'.$token);?>" style="float:right;margin-right:15px;" class="btn blue-grey BtnBack2"><i class="fa fa-arrow-left" aria-hidden="true" ></i> Back</a>
                                    </div>
                                </div>
                          <!--   </form> -->
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/bct_history_view.js');?>"></script>

