<style type="text/css">
.btn.disabled, .btn:disabled {
    opacity: 100;
    cursor: context-menu;
}   
</style>
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Collection</h2>
        </div>

    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('Main_entity_jv/entity_customersoa_view/'.$token);?>">Customer Statement of Account</a></li>
            <li class="breadcrumb-item"><a>Collection</a></li>
        </div>
    </ul>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">        
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="col-md-12 margin-top-20 row">
                                
                                <div class="form-group col-md-12 row">

                                        <div class="col-md-12" style="margin-bottom: 20px;">
                                            <h1>Collection</h1>
                                        </div>

                                        <div class="col-md-12" style="margin-bottom: 20px;">
                                            <h1 class="lblDrpayno float-right"></h1>
                                            <br><br>
                                            <h2 class="lblTran lighter float-right"></h2>
                                        </div>

                                        <div class="row col-lg-12 margin-top-20">
                                           <label style="color: gray; font-weight: lighter;">Collected From</label>
                                        </div>
                                        <div class="row col-lg-12 margin-top-20">
                                                <h1 class="h1name" style="color: gray; font-weight: lighter;"></h1>
                                        </div>
                                        <div class="col-md-6 margin-top-20">
                                            <div class="row">
                                                <div>
                                                    <label>Branch: </label>
                                                    <br>
                                                    <label>Mode of Payment: </label>
                                                    <br>
                                                    <label>Contact No.: </label>
                                                    <br>
                                                    <label>Outlet Address: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblBranch"></label>   
                                                    <br>
                                                    <label class="lblMode"></label>   
                                                    <br>
                                                    <label class="lblContact"></label>
                                                    <br>
                                                    <label class="lblOutlet"></label> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">                 
                                            <div class="table-responsive">
                                                <table class="table  table-striped table-hover table-bordered" id="table-ref"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th width="200">Reference</th>
                                                            <th>Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                            </div>
                        </div>                                                        

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <input type="hidden" class="drpayno" value="<?php echo $drpayno?>">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th width="500">Payment Type</th>
                                            <th>Reference</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <div class="form-group row float-right">
                                   <span style="margin: 5px;"></span>
                                   <button type="button" class="btn btn-warning btnTotal totalBtn disable" disabled="disabled"></button>
                                </div>
                            </div> <!-- modal footer -->
                                <button type="button" class="btn btn-info btnPrint float-right margin-top-20">Print Collection</button>
                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> <!-- col 12 -->                
            </div>
        </div>
    </section>

    <section class="tables printArea printArea-position">   
        <div class="container-fluid">
            <div class="row">        
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="col-md-12 margin-top-20 row">
                                
                                <div class="form-group col-md-12 row">
                                        <div class="col-md-12" style="margin-bottom: 20px;">
                                            <h1>Collection</h1>
                                        </div>

                                        <div class="col-md-12" style="margin-bottom: 20px;">
                                            <h1 class="lblDrpayno float-right"></h1>
                                            <br><br>
                                            <h2 class="lblTran lighter float-right"></h2>
                                        </div>

                                        <div class="row col-lg-12 margin-top-20">
                                           <label style="color: gray; font-weight: lighter;">Collected From</label>
                                        </div>
                                        <div class="row col-lg-12 margin-top-20">
                                                <h1 class="h1name" style="color: gray; font-weight: lighter;"></h1>
                                        </div>
                                        <div class="col-md-12 margin-top-20">
                                            <div class="row">
                                                <div>
                                                    <label>Branch: </label>
                                                    <br>
                                                    <label>Mode of Payment: </label>
                                                    <br>
                                                    <label>Contact No.: </label>
                                                    <br>
                                                    <label>Outlet Address: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblBranch"></label>   
                                                    <br>
                                                    <label class="lblMode"></label>   
                                                    <br>
                                                    <label class="lblContact"></label>
                                                    <br>
                                                    <label class="lblOutlet"></label> 
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>                                                        

                        </div>

                        <div class="card-body">

                
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-ref2"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th width="200">Reference</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th width="500">Payment Type</th>
                                            <th>Reference</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <div class="form-group row float-right">
                                   <span style="margin: 5px;"></span>
                                   <button type="button" class="btn btn-warning btnTotal totalBtn disable" disabled="disabled"></button>
                                </div>
                            </div> <!-- modal footer -->
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
<script src="<?=base_url('assets/js/entity/customer/customer_soa_collection.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->