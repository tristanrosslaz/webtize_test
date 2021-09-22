<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/check_transaction_history/'.$token);?>">Check Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Edit Check</li>
        </ol>
    </div>
    <section class="tables" data-checkid="<?=$check_data['chkno']?>">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Check Information</h6>
                        <div class="">
                        </div>

                        <?php
                            $total = 0;
                            foreach ($check_entries as $value) {
                                $total+=$value['amount'];
                            }
                        ?> 


                        <div class="card-body">
                            <div class="col-md-6">
                                <h4>Date: <?= $check_data['chkdate'];?></h4>
                                <h4>Type: <?= $check_data['isgl']==='Yes'? "Expenses": "Purchases"; ?></h4>
                                <h4>Pay To: <?= check_recipient($check_data['chkno'],$check_data['idno']);?></h4>
                                <h4>Reference: <?= $check_data['chkno'];?></h4>
                                <h4>Total: <?= number_format($total,2,".",",") ?></h4>
                            </div>
                            <hr>
                            <br>
                            <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addItemModal" id="add_item_btn" class="btn btn-primary btnUpdate btnTable " name="update" style="right:10px; position: absolute; top:50px;">
                                Add Row
                            </button>
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>GL Account</th>
                                            <th>GL ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <textarea class="form-control" style="resize: none;" id="f_notes" name="f_notes"><?=$check_data['notes']?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                   <div class="col-md-3 row float-right">
                                            <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey grand_total" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" ><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><b>Total: <?= number_format($total,2,".",",") ?></b></button>

                                            <!-- <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc waves-effect waves-light" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled="disabled"><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount" id="total_label">Discount: 0.00</a></button> -->
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="token" value="<?=$token?>">
            <input type="" value="<?=$total?>" id="grandtotal_hide" class="grandtotal_hide" hidden>
            <button class="btn btn-block btn-primary submitcheckbtn mt-20" id="submitcheckbtn" style="margin-top: 20px; float: right;">Save Changes</button>
    </section>

    <!-- Modal-->
    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add Item</h4>
                </div>
                <form class="form-horizontal personal-info-css" id="add_check_entry_form">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Date <span class="" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <input id="ff_date" type="text" readonly="true" class="form-control form-control-success datepicker" name="ff_date" placeholder="mm/dd/yyyy" value="<?=today_date()?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Description<span class="" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <input id="ff_description" type="text" class="form-control form-control-success" name="ff_description" placeholder="Description">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Amount<span class="" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <input id="ff_amount" type="text"  min="0" class="form-control form-control-success allownumericwithdecimal" name="ff_amount" placeholder="0.00">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">GL Account <span class="" style="color:red">*</span></label>
                                                <div class="col-md-9">
                                                    <select id="ff_gl_account" type="text" class="form-control form-control-success select2" name="ff_gl_account" placeholder="GL Account">
                                                        <option value=""> -- Select GL Account --</option>
                                                        <?php
                                                            foreach ($gl_accounts as $gl_account) {
                                                                ?>
                                                                    <option value="<?= $gl_account['id']?>"><?= $gl_account['description']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        <input type="" value="<?=$check_id?>" id="checkid" hidden>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <input type="button" style="float:right" class="btn btn-primary" id="addcheck" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="deleteItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Delete Item</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="delete_item_form" method="post" action="<?= base_url();?>Main_inventory/delete_item">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Are you sure you want to delete this record <br>(<bold class="info_desc" id = "info_desc"></bold>) ?</p>
                                    <input type="hidden" class="del_areaId" name="del_item_id" id="del_item_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                            <div class="col-md-12">
                                <button type="submit" style="float:right" class="btn btn-primary deleteAreaBtn">Delete Record</button>
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script src="<?=base_url('assets/js/globalfunctions.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/account/account_check_edit.js');?>"></script>

