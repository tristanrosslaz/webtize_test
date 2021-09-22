<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="4" data-namecollapse="" data-labelname="Inventory List"> 

    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/inventory_home/'.$token);?>">Inventory</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_inventory/inventory_adjustment_history/'.$token);?>">Inventory Adjustment History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Inventory Adjustment View</li>
        </ol>
    </div>

    <section class="tables" id="div_2">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="">
                            <div class="col-12 text-right" style="padding:30px;">
                                <h2># <?= $adjno; ?></h2>
                                <input id="adjno" type="hidden" value="<?= $adjno; ?>" />
                                <label id="lbl_date"></label>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <div class="col-12 col-md-6">
                                    <label>Location:</label> <label id="lbl_loc"></label><br/>
                                    <label>Type:</label> <label id="lbl_type"></label><br/>
                                    <label>Classification:</label> <label id="lbl_class"></label><br/>
                                </div>
                                <div class="col-12 col-md-6 text-right">
                                    <button data-toggle="modal" data-backdrop="static" data-keyboard="false" id="add_item_btn" class="btn btn-primary printBtn btnTable " name="update" ><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <textarea class="form-control" id="f2_notes" name="f2_notes" readonly style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('includes/footer');?>
<script type="text/javascript" src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/inventory/inventory_adjustment_history_items_review.js');?>"></script>

