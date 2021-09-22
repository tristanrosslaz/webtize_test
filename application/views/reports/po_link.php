<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Purchase Order"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Purchase Order</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a></li>
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_reports/it_report/'.$token);?>">Inventory Transaction Report</a></li>
            <li class="breadcrumb-item active">Purchase Order</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="">
                            <div class="modal-body">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="card-body">

                                                    <div class="form-group row">

                                                        <div class="col-lg-12">

                                                            <div class="" >
                                                                <div class="">
                                                                    <h4 class="pono" style="border:none; float:left;">Purchase Order # <?=$get_summary->pono?></h4>
                                                                    <input id="pono" type="text" value="<?=$get_summary->pono?>" hidden  >

                                                                    <p><br></p>
                                                                </div>  
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6">

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Purchase From </label>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <H2><?=$get_summary->name?></H2>
                                                                </div>  
                                                            </div>

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Delivery Status: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="voucher_name" style="border:none;" disabled><?=$get_summary->status?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Date of Delivery: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->trandate?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Contact Person: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_amount" style="border:none;" disabled><?=$get_summary->contactperson?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Mode of Payment: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_balance" style="border:none;" disabled><?=$get_summary->mode?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Contact No. </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->contactno?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Address: </label></div>
                                                                    <div class="col-md-8"><span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->address?></span></div>
                                                                </div>  
                                                            
                                                        </div>


                                                        <div class="col-lg-6">
                                                            
                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">To </label>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <H2><?=company_name();?></H2>
                                                                </div>  
                                                            </div>

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Contact: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="voucher_name" style="border:none;" disabled>63.2.8894474 to 76</span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Email: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Website: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_amount" style="border:none;" disabled>www.siomaiking.com</span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Contact Address: </label></div>
                                                                    <div class="col-md-8"><span type="text" class="apv_balance" style="border:none;" disabled>1196 Batangas Street, San Isidro, Makati City, Philippines</span></div>
                                                                </div>  
                                                            
                                                        </div>

                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th width="90">Name</th>
                                                                    <th>PO Qty</th>
                                                                    <th>Unit</th>
                                                                    <th>Received Qty</th>
                                                                    <th>Amount</th>
                                                                    <th>Total Amount</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>

                                                    <br><br>
                                                    <label for="notes">Notes</label> 
                                                    <textarea style="resize:none" class="form-control notes" rows="4" cols="40" id="notes" name="notes" disabled=""><?=$get_summary->notes?></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="form-group row">       
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title">Purchase Order</h1>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="card-body">
                                        
                                        <div class="" >
                                            <div class="">
                                                <label class="" style="float:left;">PO # </label>
                                                <H1 class="rcvno" style="border:none; float:left;"><?=$get_summary->pono?></H1>
                                                <p><br></p>
                                            </div>  
                                        </div>

                                        <div class="">
                                            <div class="">
                                                <label class="">Purchase From </label>
                                            </div>  
                                        </div>

                                        <div class="">
                                            <div class="">
                                                <H2><?=$get_summary->name?></H2>
                                            </div>  
                                        </div>

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Date of Delivery: </label></div>
                                                <div class="col-md-8"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->trandate?></span></div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Contact Person: </label></div>
                                                <div class="col-md-8"><span type="text" class="apv_amount" style="border:none;" disabled><?=$get_summary->contactperson?></span></div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Mode of Payment: </label></div>
                                                <div class="col-md-8"><span type="text" class="apv_balance" style="border:none;" disabled><?=$get_summary->mode?></span></div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Contact No. </label></div>
                                                <div class="col-md-8"><span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->contactno?></span></div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-4"><label class="">Address: </label></div>
                                                <div class="col-md-8"><span type="text" class="apv_status" style="border:none;" disabled><?=$get_summary->address?></span></div>
                                            </div>  

                                        <div class="table-responsive">
                                            <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="90">RCV No.</th>
                                                        <th>Name</th>
                                                        <th>Ref No.</th>
                                                        <th>Received Date</th>
                                                        <th>Received Qty</th>
                                                        <th>Unit</th>
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

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/reports/po_link.js');?>"></script>

