<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Customer Statement of Account View</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">        
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Customer Statement of Account Information</h6>
                        <div class="card-header d-flex">
                            <div class="col-md-12 margin-top-20 row">
                                <div class="form-group col-md-12 row">

                                <div class="col-md-12 row margin-top-20">
                                    <h2 class="form-group-material" style="padding-left:10px;"><?php echo "SOA - " . strtoupper($get_name)?></h2>
                                    <input type="hidden" class="idno" value="<?php echo $idno ?>">
                                </div>
                                
                                <div class="col-md-12 margin-top-20 row">   
                                    <div class="form-group-material" style="padding-left:10px;">                                    
                                        <select class="form-control col-md-12 filtertype" name="filtertype" id="filtertype">
                                            <option value="Unpaid">Unpaid</option>
                                        </select>
                                    </div>
                                                                
                                    <div class="form-group-material" style="padding-left:10px;">
                                        <select class="form-control col-md-12 filetype" name="filetype" id="filetype">
                                            <option value="All">All</option>
                                            <option value="1">Franchise Service</option>
                                            <option value="2">Repeat Order</option>
                                        </select>
                                    </div>
                                </div>

                                </div>                                                        

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="form-group-material float-right" style="right:20px; position: absolute; top:45px;">
                                    <button type="button" class="btn btn-primary searchBtn">Search</button>
                                    <button type="button" class="btn btn-primary exportBtn">Export Report</button>
                                </div>

                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>DR No.</th>
                                            <th>Status</th>
                                            <th>DR Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Balance Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>                            
                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> <!-- col 12 -->                
            </div>
        </div>
    </section>

<!-- </div> -->

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/entity/customer/customer_soaview.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->