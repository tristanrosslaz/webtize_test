<style>
.col-md-6.form-collect {
    margin: auto !important;
    width: 50% !important;     
    background-color: #f5f5f5 !important;   
    padding: 25px !important; 
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;
}
.datepicker-z-index {
    z-index:2 !important;
}
</style>

<div class="content-inner" id="pageActive" data-num="9" data-namecollapse="#" data-labelname="Release Schedule"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Release Schedule</li>
            <span class="token" hidden=""><?=$token?></span>
        </ol>
    </div>

    <section class="tables interface1">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Release Information</h6>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="col-lg-12 margin-top-20">
                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Release Date: <span class="" style="color:red"> *</span></label>
                                        <input  type="text" value="<?=today_text()?>" class="form-control datepicker-z-index col-md-8 r_date" id="r_date" name="r_date" readonly required/>
                                    </div>

                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Franchisee Name: <span class="" style="color:red"> *</span></label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control" name="r_franchisee" id="r_franchisee" autocomplete="off">
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Location Address: <span class="" style="color:red"> *</span></label>
                                        <textarea style="resize:none" class="form-control notes col-md-8" rows="2" cols="40" id="r_location" name="r_location" disabled=""></textarea>
                                    </div>    

                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Concept: <span class="" style="color:red"> *</span></label>
                                        <select class="form-control col-md-8" name="r_concept" id="r_concept">
                                            <option value="none">-- Select Concept --</option>
                                            <option value="Siomai King">Siomai King</option>
                                            <option value="Potato King">Potato King</option>
                                            <option value="Siopao Da King">Siopao Da King</option>
                                            <option value="Sgt. Sisig">Sgt. Sisig</option>
                                            <option value="Burger Factory">Burger Factory</option>
                                            <option value="Noodle House">Noodle House</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Type: <span class="" style="color:red"> *</span></label>
                                        <select class="form-control col-md-8" name="r_type" id="r_type">
                                            <option value="none">-- Select Type --</option>
                                            <option value="Cart">Cart</option>
                                            <option value="Kiosk">Kiosk</option>
                                            <option value="Stall">Stall</option>
                                            <option value="Counter">Counter</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Size: <span class="" style="color:red"> *</span></label>
                                        <select class="form-control col-md-8" name="r_size" id="r_size">
                                            <option value="none">-- Select Size --</option>
                                            <option value="Cart - 170">Cart - 170</option>
                                            <option value="Cart - 150">Cart - 150</option>
                                            <option value="Cart - 130">Cart - 130</option>
                                            <option value="Customized Cart">Customized Cart</option>
                                            <option value="Customized Kiosk">Customized Kiosk</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Improvements: <span class="" style="color:red"> *</span></label>
                                        <select class="form-control col-md-8" name="r_improvements" id="r_improvements">
                                            <option value="none">-- Select Improvements --</option>
                                            <option value="Signages">Signages</option>
                                            <option value="Additional Services">Additional Services</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Mode of Release: <span class="" style="color:red"> *</span></label>
                                        <select class="form-control col-md-8" name="r_mode" id="r_mode">
                                            <option value="none">-- Select Mode of Release --</option>
                                            <option value="Delivery">Delivery</option>
                                            <option value="Pick Up">Pick Up</option>
                                            <option value="Shipment">Shipment</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label class="form-control-label col-md-4">Notes: <span class="" style="color:red"> </span></label>
                                        <textarea style="resize:none" class="form-control notes col-md-8" rows="4" cols="40" id="r_notes" name="r_notes"></textarea>
                                    </div> 

                                    <div class="form-group row margin-top-20">
                                        <button class="btn btn-primary save col-md-12">Proceed</button>
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
                    <h4 id="exampleModalLabel" class="modal-title">Save Release Schedule</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="confirmForm" method="post" action="<?= base_url();?>Main_cart/save_release_schedule">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <p>Proceed with the saving of Release Schedule for <b><span class="m_franchisee" id = "m_franchisee"></span></b></p>
                            <p>Dated: <span class="m_date" id = "m_date"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary approveApvBtn">Approve</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $this->load->view('includes/footer'); ?>
    <script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/cart_release/release_schedule.js');?>"></script>
