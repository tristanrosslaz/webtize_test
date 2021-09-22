
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
                        <small class="form-text">Date </small>
                        <div class="input-daterange input-group" id="datepicker" style=" cursor: not-allowed;">
                          <p class="prep_date" style="margin-top: 10px;" name="prep_date" > <?php if(!empty($get_summary)){ echo date_format(date_create($get_summary->trandate),"m/d/Y");}?></p>
                      </div> 
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <small class="form-text">Location (From)</small>
                    <?php foreach ($get_location->result() as $glocation) { ?>      
                    <?php if ($get_summary->itemlocid1 == $glocation->id) { ?>
                    <p class="" style="margin-top: 10px"><?=$glocation->description?></p>
                    <?php }else{ ?>
                    
                    <?php } } ?>  
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <small class="form-text">Location (To) </small>
                <?php foreach ($get_location->result() as $glocation) { ?>      
                <?php if ($get_summary->itemlocid2 == $glocation->id) { ?>
                <p class="" style="margin-top: 10px"><?=$glocation->description?></p>
                <?php }else{ ?>
                
                <?php } } ?>                           
                
            </div>
        </div>
        
        <input type="" id="token" value="<?=$token?>" hidden>
        <input type="" id="sono" value="<?=$sono?>" name="sono" hidden>
        <input type="" id="iltno" value="<?=$get_summary->iltno?>" name="iltno" hidden>
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
              <!-- <th style="width: 150px;display: none">Remarks</th> -->
          </tr>
      </thead>
  </table>
</div>
<small class="form-text">Notes </small>
<?php if($get_salesprep->row()->notes == ""){?>
<?php }else{ ?>
  <textarea class="form-control"  id="remarks" name="remarks" readonly="readonly"><?=$get_salesprep->row()->notes?></textarea>
<?php } ?>
<input type="text" class="form-control form-control-success totalrows" name="totalrows" id="totalrows" value="<?php echo $get_totalrows->num_rows(); ?>" hidden>
<div class="col-md-3" style="float: right; padding-right: 0px;">
</div>

</form>
</div>
</div>
</div>
</div>
</section>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_order_preparation_view.js');?>"></script>


