<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="10" data-namecollapse="" data-labelname="Package Release"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/report_home/'.$token);?>">Reports</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_reports/inventoryreport/'.$token);?>">Inventory Report</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item active">Package Release</li>
        </ol>
    </div>
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
                                                                    <h4 class="pono" style="border:none; float:left;">Package Release # <?=$get_summary->pkno?></h4>
                                                                    <p><br></p>
                                                                    <label class=""><?=$get_summary->trandate?></label>
                                                                </div>  
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6">

                                                            <div class="">
                                                                <div class="">
                                                                    <label class="">Delivered To </label>
                                                                </div>  
                                                            </div>

                                                            <div class="">
                                                                <div class="">
                                                                    <H3><?=strtoupper($get_summary->lname)?>, <?=strtoupper($get_summary->fname)?> <?=strtoupper($get_summary->mname)?></H3>
                                                                </div>  
                                                            </div>

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Branch: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="voucher_name" style="border:none;" disabled><?=$get_summary->branchname?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Contact No.: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="terms_of_payment" style="border:none;" disabled><?=$get_summary->conno?></span></div>
                                                                </div>  

                                                                <div class="row">
                                                                    <div class="col-md-4"><label class="">Outlet Address: </label></div>
                                                                    <div class="col-md-6"><span type="text" class="apv_amount" style="border:none;" disabled><?=$get_summary->address?></span></div>
                                                                    <input type="text" id="pkno" class="pkno" value="<?=$get_summary->pkno?>" hidden>
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
<script type="text/javascript" src="<?=base_url('assets/js/reports/package_release.js');?>"></script>

