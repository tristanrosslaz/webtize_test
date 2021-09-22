<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="9" data-namecollapse="" data-labelname="Package Pullout Transaction History View"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Package Pullout Transaction History View</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/home/'.$token);?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/cart_home/'.$token);?>">Cart Release</a></li>
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_cart/ppt_history/'.$token.'');?>">Package Pullout Transaction History </a></li>
            <li class="breadcrumb-item active">Package Pullout Transaction History View</li>
        </div>
    </ul>
    <section class="tables">   
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
                                                                    <div class="col-md-8"><h4><?=$packagepullout_details->name?></h4></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">Location Address: </div>
                                                                    <div class="col-md-8"><h4><?=$packagepullout_details->address?></h4></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">Concept: </div>
                                                                    <div class="col-md-8"><h4><?=$packagepullout_details->concept?></h4></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">Contact No.: </div>
                                                                    <div class="col-md-8"><h4><?=$packagepullout_details->conno?></h4></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">Type: </div>
                                                                    <div class="col-md-8"><h4><?=$packagepullout_details->pp_type?></h4></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">Size: </div>
                                                                    <div class="col-md-8"><h4><?=$packagepullout_details->pp_size?></h4></div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">Mode of Release: </div>
                                                                    <div class="col-md-8"><h4></h4></div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 text-right">
                                                            <div class="form-group">
                                                                <label class="form-control-label"><span hidden class="asterisk" style="color:red;">*</span></label>

                                                                <div class="form-group p-style">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <H1 class="prv_ppfno" style="border:none; float:right;"><?=$packagepullout_details->ppfno?></H1>
                                                                            <label class="" style="float:right;"># </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12"><?=$packagepullout_details->trandate?></div>
                                                                    </div>
                                                              </div>

                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">

                                                            <div class="">
                                                                <div class="">
                                                                    
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

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
<input type="hidden" class="hidden_apvno" name="hidden_apvno" id="hidden_apvno" value="<?php $this->session->userdata('apvno'); ?>">
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/cart_release/packagepullout_view.js');?>"></script>

