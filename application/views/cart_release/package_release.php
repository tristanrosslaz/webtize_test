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

  <div class="content-inner" id="pageActive" data-num="9" data-namecollapse="#" data-labelname="Package Release"> 
  <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Package Release</li>
            <span class="token" hidden=""><?=$token?></span>
        </ol>
    </div>

  <section class="tables interface1">   
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-6 col-sm-12 center_margin">
                  <div class="card">
                    <h6 class="secondary-bg px-4 py-3 white-text">Package Release Information</h6>
                      <div class="card-body">
                         <div class="col-lg-12">
                            <div class="col-lg-12 margin-top-20">

                              <div class="form-group row">
                                <label class="form-control-label col-md-12">Deliver To: </label>
                              </div>
                         
                              <div class="form-group row">
                                <label class="form-control-label col-md-4">Date: <span class="" style="color:red"> *</span></label>
                                <input type="text" data-column="0" id="p_date" readonly="true" class="p_date form-control datepicker search-input-text search col-md-8" placeholder="mm/dd/yyyy">
                              </div>

                              <div class="form-group row">
                                <label class="form-control-label col-md-4">RD No.: <span class="" style="color:red"> *</span></label>
                                <input type="text" class="form-control search-input-text col-md-8" id="p_rdno" name="p_rdno">
                              </div>

                              <div class="form-group row">
                                <label class="form-control-label col-md-4">Franchisee Name: <span class="" style="color:red"> *</span></label>
                                <input type="text" class="form-control search-input-text col-md-8" id="p_franchisee" name="p_franchisee" disabled="">
                                <input type="hidden" name="p_franchiseeid" id="p_franchiseeid">
                              </div>

                              <div class="form-group row">
                                <label class="form-control-label col-md-4">Address: <span class="" style="color:red"> *</span></label>
                                <input type="text" class="form-control search-input-text col-md-8" id="p_location" name="p_location" disabled="">
                              </div>    

                              <div class="form-group row">
                                <label class="form-control-label col-md-4">Concept: <span class="" style="color:red"> *</span></label>
                                <input type="text" class="form-control search-input-text col-md-8" id="p_concept" name="p_concept" disabled="">
                              </div>

                              <div class="form-group row">
                                <label class="form-control-label col-md-4">Mode of Release: <span class="" style="color:red"> *</span></label>
                                <input type="text" class="form-control search-input-text col-md-8" id="p_mode" name="p_mode" disabled="">
                              </div>

                              <div class="form-group row">
                                <label class="form-control-label col-md-4">Category: <span class="" style="color:red"> *</span></label>
                                <select class="form-control col-md-8" name="p_category" id="p_category">
                                  <option value="none">--Select Category--</option>
                                  <?php if ($this->model_cart->check_encode_prcat($this->session->userdata('pr_franchiseeid'), "Marketing Colaterals") < 3) { ?>
                                    <option value="Marketing Colaterals">Marketing Colaterals</option>
                                  <?php } ?>
                                  <?php if ($this->model_cart->check_encode_prcat($this->session->userdata('pr_franchiseeid'), "Package Release") < 3) { ?>
                                    <option value="Package Release">Package Release</option>
                                  <?php } ?>
                                  <?php if ($this->model_cart->check_encode_prcat($this->session->userdata('pr_franchiseeid'), "Replacements") < 3) { ?>
                                    <option value="Replacements">Replacements</option>
                                  <?php } ?>
                                </select>
                              </div>

                              <div class="form-group row">
                                <label class="form-control-label col-md-4">Package Inclusion: <span class="" style="color:red"> *</span></label>
                                <select class="form-control col-md-8" name="p_package" id="p_package">
                                  <option value="none">--Select Type--</option>
                                  <?php foreach ($get_package_type->result() as $packages) { ?>
                                    <option value="<?=$packages->pkg_id?>"><?=$packages->pkg_desc?></option>
                                  <?php } ?>
                                </select>
                              </div>

                              <div class="form-group row">
                                <label class="form-control-label col-md-4">Notes: <span class="" style="color:red"> </span></label>
                                <textarea style="resize:none" class="form-control notes form-control-sm col-md-8" rows="4" cols="40" id="p_notes" name="p_notes"></textarea>
                              </div> 

                              <div class="form-group row margin-top-20">
                                <button class="btn btn-success save col-md-12">Proceed</button>
                              </div>
                                      
                            </div>       
                         </div>
                      </div>
                  </div>
              </div> 
          </div>
      </div>
  </section>

  <div id="confirmModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Save Package Release</h4>
            <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
        </div>
        <form class="form-horizontal personal-info-css" id="confirmForm" method="post" action="<?= base_url();?>Main_cart/save_package_release">
          <div class="modal-body">
            <div class="">
              <div class="row">
                <div class="col-lg-12">
                  <p>Proceed with the saving of Package Release for <b><span class="m_franchisee" id = "m_franchisee"></span></b></p>
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
<script type="text/javascript" src="<?=base_url('assets/js/cart_release/package_release.js');?>"></script>
