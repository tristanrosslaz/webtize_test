<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Build Inventory Deform"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Build Inventory Deform</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a></li>
            <li class="breadcrumb-item active">Build Inventory Deform</li>
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
                                                                    <h4 class="pono" style="border:none; float:left;">Build Inventory Deform # <?=$get_summary->buildno?></h4>
                                                                    <p><br></p>
                                                                    <label class=""><?=$get_summary->trandate?></label>
                                                                </div>  
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6">

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Build Information </label>
                                                                </div>  
                                                            </div>

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Preparation Date: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="voucher_name" style="border:none;" disabled><?=$get_summary->prepdate?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Build Date: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->trandate?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Build Quantity: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_amount" style="border:none;" disabled><?=$get_summary->buildqty?></span></div>
                                                                    <input type="text" id="buildno" class="buildno" value="<?=$get_summary->buildno?>" hidden>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Unit: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->description?></span></div>
                                                                </div> 
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Item: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->itemname?></span></div>
                                                                </div> 
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Location: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->locdesc?></span></div>
                                                                </div> 

                                                        </div>

                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadd3ing="0" cellspacing="0" border="0" class="display" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th width="90">Name</th>
                                                                    <th>Qty</th>
                                                                    <th>Unit</th>
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

    

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/reports/bi_deform.js');?>"></script>

