  <style>
    .col-md-6.form-collect {
      margin: auto !important;
      width: 50% !important;     
      background-color: #f5f5f5 !important;   
      padding: 25px !important; 
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;
    } 
    .select2 {
      width: calc(75% - 45px) !important;
      margin-left: 0;
    }

    .datepicker {
      z-index:2 !important;
    }
  </style>

  <div class="content-inner" id="pageActive" data-num="9" data-namecollapse="#" data-labelname="Package Pullout"> 
  <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Package Pullout</li>
             <span class="token" hidden=""><?=$token?></span>
        </ol>
    </div>


  <section class="tables interface1">   
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-sm-12 center_margin">
          <div class="card">
            <h6 class="secondary-bg px-4 py-3 white-text">Package Pullout Information</h6>
            <div class="card-body">
              <div class="col-lg-12">
                <div class="col-lg-12 margin-top-20">

                  <div class="form-group row">
                    <label class="form-control-label col-md-12">Pullout From: </label>
                  </div>
             
                  <div class="form-group row">
                    <label class="form-control-label col-md-4">Pullout Date: <span class="" style="color:red"> *</span></label>
                    <input type="text" data-column="0" id="pp_date" readonly="true" class="pp_date form-control datepicker search-input-text search col-md-8" placeholder="mm/dd/yyyy">
                  </div>

                  <div class="form-group row">
                    <label class="form-control-label col-md-4">Franchisee Name: <span class="" style="color:red"> *</span></label>
                    <select class="form-control col-md-8" name="pp_franchisee" id="pp_franchisee">
                      <option value="none">--Select Franchisee--</option>
                      <?php foreach ($released_packages->result() as $packages) { 
                        if ($this->model_cart->check_encode_pp($packages->franchisee_id) < 3) { ?>
                          <option value="<?=$packages->idno . '|' . $packages->prno?>">
                            <?php echo strtoupper($packages->lname) . ", ". strtoupper($packages->fname) . " " . strtoupper($packages->mname) . " (" . $packages->branchname . ")"; ?>
                          </option>
                        <?php } 
                      } ?>
                    </select>
                  </div> 

                  <div class="form-group row">
                    <label class="form-control-label col-md-4">Location: <span class="" style="color:red"> *</span></label>
                    <input type="text" class="form-control search-input-text col-md-8" id="pp_location" name="pp_location" disabled="">
                  </div>    

                  <div class="form-group row">
                    <label class="form-control-label col-md-4">Concept: <span class="" style="color:red"> *</span></label>
                    <input type="text" class="form-control search-input-text col-md-8" id="pp_concept" name="pp_concept" disabled="">
                  </div>

                  <div class="form-group row">
                    <label class="form-control-label col-md-4">Type: <span class="" style="color:red"> *</span></label>
                    <select class="form-control col-md-8" name="pp_type" id="pp_type">
                      <option value="none">--Select Type--</option>
                      <option value="Cart">Cart</option>
                      <option value="Kiosk">Kiosk</option>
                      <option value="Stall">Stall</option>
                      <option value="Counter">Counter</option>
                    </select>
                  </div>

                  <div class="form-group row">
                    <label class="form-control-label col-md-4">Size: <span class="" style="color:red"> *</span></label>
                    <select class="form-control col-md-8" name="pp_size" id="pp_size">
                      <option value="none">--Select Size--</option>
                      <option value="Cart - 170">Cart - 170</option>
                      <option value="Cart - 150">Cart - 150</option>
                      <option value="Cart - 130">Cart - 130</option>
                      <option value="Customized Cart">Customized Cart</option>
                      <option value="Customized Kiosk">Customized Kiosk</option>
                    </select>
                  </div>

                  <div class="form-group row">
                    <label class="form-control-label col-md-4">Release Details History: <span class="" style="color:red"> </span></label>
                    <input type="text" class="form-control search-input-text col-md-8" id="pp_rdhistory" name="pp_rdhistory">
                  </div> 

                  <div class="form-group row">
                    <label class="form-control-label col-md-4">Notes: <span class="" style="color:red"> </span></label>
                    <textarea style="resize:none" class="form-control notes col-md-8" rows="4" cols="40" id="pp_notes" name="pp_notes"></textarea>
                  </div> 

                  <div class="form-group row margin-top-20">
                    <button class="btn btn-success proceed col-md-12">Proceed</button>
                  </div>
                          
                </div>       
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </section>

  <section class="tables interface2">   
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              
            <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item">
              <div class="modal-body">
                  <div class="">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="">
                                  <div class="card-body">

                                      <div class="form-group row">

                                          <div class="col-md-6">
                                              <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>
                                              
                                              <div class="form-group p-style">

                                                  <div class="row">
                                                      <div class="col-md-4">Franchisee Name: </div>
                                                      <div class="col-md-8"><h4 id="franchisee"></h4></div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-md-4">Location Address: </div>
                                                      <div class="col-md-8"><h4 id="address"></h4></div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-md-4">Concept: </div>
                                                      <div class="col-md-8"><h4 id="concept"></h4></div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-md-4">Contact No.: </div>
                                                      <div class="col-md-8"><h4 id="contact"></h4></div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-md-4">Type: </div>
                                                      <div class="col-md-8"><h4 id="type"></h4></div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-md-4">Size: </div>
                                                      <div class="col-md-8"><h4 id="size"></h4></div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-md-4">Mode of Release: </div>
                                                      <div class="col-md-8"><h4 id="mode"></h4></div>
                                                  </div>

                                              </div>
                                          </div>

                                          <div class="col-md-6 text-right">
                                              <div class="form-group">
                                                  <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>

                                                  <div class="form-group p-style">
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                              <H1 class="ppfno" style="border:none; float:right;"id="ppfno"><?=$this->model_cart->latest_ppfno();?></H1>
                                                              <label class="" style="float:right;"># </label>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-12"><span id="date"></span></div>
                                                      </div>
                                                </div>

                                              </div>
                                          </div>

                                          <div class="col-md-12">

                                              <div class="">
                                                  <div class="">
                                                      <button type="button" style="float:right;" class="btn btn-success printBtn" data-toggle="modal" data-target="#addRowModal" aria-label="Close">Add Row</button>
                                                  </div>  
                                              </div>

                                          </div>

                                      </div>

                                      <div class="table-responsive">
                                          <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                              <thead>
                                                  <tr>
                                                      <th width="90">Item ID</th>
                                                      <th>Description</th>
                                                      <th width="90">Qty</th>
                                                      <th width="90">Unit</th>
                                                      <th width="120">Remarks</th>
                                                      <th></th>
                                                  </tr>
                                              </thead>
                                              <tbody id="t_body"></tbody>
                                          </table>
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="modal-footer">
                  <div class="form-group row">       
                      <div class="col-md-12">
                          <button type="button" style="float:right; margin-right:10px;" class="btn btn-success savePulloutBtn" data-dismiss="modal" aria-label="Close">Save Package Pullout</button>
                      </div>
                  </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="addRowModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Add Row</h4>
        </div>
        <form class="form-horizontal personal-info-css" id="addRowForm" method="post" action="">

          <div class="modal-body">
            <div class="">
              <div class="row">
                <div class="col-lg-12">
                  <div class="">

                    <div class="form-group row">
                      <label class="col-md-4 form-control-label">Item<span class="asterisk" style="color:red">*</span></label>
                      <div class="col-md-8">
                        <select id="am_item" type="text" class="form-control form-control-success" name="am_item" placeholder="Item">
                          <option value=""> -- Select an Item --</option>
                          <?php foreach ($equipments as $row) { ?>
                              <option value="<?= $row['id']?>"><?= $row['itemname']?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-4 form-control-label">Quantity<span class="asterisk" style="color:red">*</span></label>
                      <div class="col-md-8">
                        <input id="am_qty" type="text" class="form-control form-control-success" name="am_qty" placeholder="Quantity" onkeypress="return isNumberKeyOnly(event)">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-4 form-control-label">Unit<span class="asterisk" style="color:red">*</span></label>
                      <div class="col-md-8">
                        <input id="am_unit" type="text" class="form-control form-control-success" name="am_unit" placeholder="Unit" disabled="">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <div class="form-group row">       
              <div class="col-md-12">
                <input type="submit" style="float:right" class="btn btn-success" value="Add">
                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div id="confirmModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Save Package Pullout</h4>
        </div>
        <form class="form-horizontal personal-info-css" id="confirmForm" method="post" action="<?= base_url();?>Main_cart/save_package_pullout">
          <div class="modal-body">
            <div class="">
              <div class="row">
                <div class="col-lg-12">
                  <p>Proceed with the saving of Package Pullout for <b><span class="m_franchisee" id = "m_franchisee"></span></b></p>
                  <p>Dated: <span class="m_date" id = "m_date"></span></p>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <div class="form-group row">       
              <div class="col-md-12">
                <button type="submit" style="float:right" class="btn btn-success approveApvBtn">Approve</button>
                <button type="button" style="float:right; margin-right:10px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/cart_release/package_pullout.js');?>"></script>
