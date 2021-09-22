
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/sales_home/'.$token);?>">Sales</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/salesorder_prep_summary/'.$token); ?>">Sales Order Preparation Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Sales Order Preparation # <?=$prepno?></li>
        </ol>
    </div>
    
    <section class="tables" id = "sono_id_sec" class="sono_id_sec" name = "sono_id_sec" data-sono="<?=$prepno;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                     <div class="card-body">
                      <form class="form-horizontal encode-info-css salesprepform" id="salesprepform">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <small class="form-text">Date <span class="asterisk" style="color:red;"></span></small>
                                    <div class="input-daterange input-group" id="datepicker" style=" cursor: not-allowed;">
                                        <?php 
                                        if($get_salesprep->row()->regdate == "0000-00-00"){?>
    
                                            <input type="text" data-column="0" class="input-sm form-control search-input-select1 prep_date" name="prep_date" value="<?=today_date();?>"/>  
                                            
                                        <?php }else{?>
                                        <p><?=$get_salesprep->row()->regdate?></p>                      
                                        <?php }?>   
                                    </div> 
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                  <small class="form-text">Location (From) <span class="asterisk" style="color:red;"></span></small>
                                  <?php if($get_summary->iltno > 0){
                                    ?><?php foreach ($get_location->result() as $glocation) { ?>      
                                        <?php if ($get_summary->itemlocid1 == $glocation->id) { ?>
                                        <input type="" class="form-control locationTo" id="locationTo" name="locationTo" value="<?=$get_location_SO->row()->itemlocid?>" hidden>
                                        <p class="" style="margin-top: 10px"><?=$glocation->description?></p>
                                        <input type="" class="form-control locationFrom" id="locationFrom" name="locationFrom" value="<?=$glocation->id?>" hidden>
                                        <?php }else{ ?>

                                        <?php } } ?> <?php
                                  }else{ ?>
                                  <select class="form-control locationFrom" id="locationFrom" name="locationFrom">
                                    <option value="" selected>Select Warehouse</option>
                                    <?php foreach ($get_location->result() as $glocation) { ?>

                                    <?php if ($get_summary->itemlocid1 == $glocation->id && $get_summary->iltno > 0) { ?>
                                    <option selected value="<?=$glocation->id?>"><?=$glocation->description?></option>
                                    <?php }else{ ?>
                                    <option value="<?=$glocation->id?>"><?=$glocation->description?></option>
                                    <?php } } ?>     

                                </select>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <small class="form-text">Location (To) </small>
                                      <!-- <select class="form-control locationTo" id="locationTo" name="locationTo">
                                        <option value="" selected>Select Warehouse</option> -->
                                        <?php foreach ($get_location->result() as $glocation) { ?>      
                                        <?php if ($get_location_SO->row()->itemlocid == $glocation->id) { ?>
                                        <input type="" class="form-control locationTo" id="locationTo" name="locationTo" value="<?=$get_location_SO->row()->itemlocid?>" hidden>
                                        <p class="" style="margin-top: 10px"><?=$glocation->description?></p>
                                        <?php }else{ ?>

                                        <?php } } ?>  
                                         <!-- <?php foreach ($get_location->result() as $glocation) { ?>      
                                                  <?php if ($get_location_SO->itemlocid == $glocation->id && $get_summary->iltno > 0) { ?>
                                                          <option selected value="<?=$glocation->id?>"><?=$glocation->description?></option>
                                                      <?php }else{ ?>
                                                          <option value="<?=$glocation->id?>"><?=$glocation->description?></option>
                                                          <?php } } ?>   -->                         
                                                          <!-- </select> -->
                                                      </div>
                                                  </div>

                                                  <input type="" id="token" value="<?=$token?>" hidden>
                                                  <input type="" id="sono" value="<?=$sono?>" name="sono" hidden>
                                                  <input type="" id="iltno" value="<?=$get_summary->iltno?>" name="iltno" hidden>
                                                   <input type="" id="prepno" value="<?=$prepno?>" name="prepno" hidden>
                                                  <!-- <input type="" id="totalqty" value="<?=$qtyTotal?>" hidden> -->
                                              </div>
                                              <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Name</th> 
                                                            
                                                            <th>SO Qty</th>
                                                            <th>Unit</th>
                                                            <th style="width: 110px !important;">Receive Qty</th>
                                                            <th style="width: 150px !important;">Qty to Receive</th>
                                                           <!--  <th style="display:none !important;">Remarks</th> -->
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <small class="form-text">Notes </small>
                                            <?php if($get_salesprep->row()->notes == ""){?>
                                            <textarea class="form-control"  id="remarks" name="remarks" ></textarea>                                          <?php }else{ ?>
                                            <textarea class="form-control"  id="remarks" name="remarks" ><?=$get_salesprep->row()->notes?></textarea>
                                          <?php } ?>

                                            <input type="text" class="form-control form-control-success totalrows" name="totalrows" id="totalrows" value="<?php echo $get_totalrows->num_rows(); ?>" hidden>
                                            <div class="" style="float: right; padding-right: 0px;">

                                                <?php if($get_summary->iltno > 0){
                                                    ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#closePrepModal">Close Sales Order Preparation</button>
                                                    <?php
                                                }else{ ?>

                                                <?php } ?>
                                                
                                               <button class="btn btn-secondary btnGrand col-md-12 BtnCreateITL" id="BtnCreateITL" name="BtnCreateITL" type="submit" disabled>Create Inventory Transfer Location</button>
                                           </div>

                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </section>

<!-- Modal -->
<div class="modal fade" id="closePrepModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to close Sales Order Preparation # <?=$prepno?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="closePrep">Proceed</button>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_prep_edit.js');?>"></script>


