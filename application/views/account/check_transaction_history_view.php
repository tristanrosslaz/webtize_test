<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
           <!--  <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->

            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/check_transaction_history/'.$token); ?>">Check Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Check Transaction Release View</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Check Information</h6>
                        <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12">
                                    <br>
                                    <div class="row">
                                            <div class="col-lg-4 text-right offset-lg-8">
                                                <h3>Reference #: <?= $checkSummary['chkno']; ?></h3>
                                                <label><?= $checkSummary['chkdate']; ?></label>
                                            </div>
                                    </div>
                         
                                        <div class="col-12">
                                                       <div class="row">
                                            <div class="col-6">
                                            <h5>Pay To:</h5><br/>
                                            <h1><?php 

                                            // if($checkSummary['supname'] == 0 || $checkSummary['supname'] == ''){
                                            //        echo $checkSummary["idno"];
                                            //     }else{
                                                    echo check_recipient($checkSummary["chkno"],$checkSummary["idno"]);
                                             //  }

                                            $totalAmount = 0;

                                            foreach ($checkdetails as  $value) {
                                                $totalAmount+=$value['amount'];
                                            }
                                
                                                ?></h1><br/>

                                            <label>Type: 
                                                <?php 

                                                    if($checkSummary['isgl']==="No"){
                                                        echo "Purchases";
                                                    }
                                                    else{
                                                        echo "Expenses";
                                                    }

                                                ?>
                                            </label><br/>
                                            <label>Cleared: <?= $checkSummary['cleared'];?></label><br/>
                                            <label>Printed: <?= $checkSummary['printed'];?></label><br/>
                                            <label>Status: <?= $checkSummary['checkstatus'];?></label><br/>
                                            <label>Allocation: <?= $checkSummary['isallocated'];?></label><br/>
                                            <label>Total: <?= number_format($totalAmount, 2);?></label><br/>
                                        </div>
                                            <div class="col-lg-6">
                                                <?php if(empty($apvno_summary)){

                                                }else{

                                                ?>
                                                <div class="">
                                                    <div class="">
                                                        <label class="">APV Details </label>
                                                    </div>  
                                                </div>

                                                <?php } ?>
                                                    <?php foreach($apvno_summary as $apv_details){ 
                                                        if($apv_details["reftype"]=="PO Payment") { ?>
                                                            <div>
                                                                <div class="">
                                                                    <label></label>
                                                                    <span type="text" style="border:none; text-decoration: none !important" disabled><?php echo $apv_details["trandate"] . " | APV #<a class='link-color' target='_blank' style='text-decoration: none !important' href=".base_url('account/APV_list/apvno_log/'.$token.'/'.$apv_details["allocrefid"].'>').$apv_details["allocrefid"] . '</a>'. " | " . number_format($apv_details["totalamt"], 2); ?></span>   
                                                                </div>      
                                                            </div>
                                                    <?php } ?>
                                                 <?php } ?>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id=""  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>GL Account</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $totalAmount = 0;

                                            foreach ($checkdetails as  $value) {
                                                ?>
                                                    <tr>
                                                        <td><?= $value['chkdate'];?></td>
                                                        <td><?= $value['description'];?></td>
                                                        <td><?= $value['gl_account'];?></td>
                                                        <td><?= number_format($value['amount'],2);?></td>
                                                    </tr>
                                                <?php

                                                $totalAmount+=$value['amount'];
                                            }
                                        ?>
                                    </tbody>
                                  <!--   <tr><td colspan="4" class="text-right" style="color:teal; font-size:25px;">Total: <?= number_format($totalAmount,2); ?></td></tr> -->
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                   <div class="col-md-3 row float-right">
                                            <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;" ><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><b>Total: <?= number_format($totalAmount,2,".",",") ?></b></button>

                                            <!-- <button type="button" class="btn btn-block ml-0 mb-2 border-deco-left blue-grey pd-0 btnGenDisc waves-effect waves-light" data-toggle="modal" data-target="#AddOverallDiscount" style="width: 100%; font-size: 15px; line-height: 20px;" id="" disabled="disabled"><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="btnGenDiscount" id="total_label">Discount: 0.00</a></button> -->
                                    </div>
                                </div>
                            </div>  

                            <!-- <div class="col-12"> -->
                                <label>Notes</label>
                                <textarea class="form-control" readonly style="resize: none;"><?= $checkSummary['notes']; ?></textarea>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal-->
    <div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Add New Inventory Item</h4>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <form class="form-horizontal personal-info-css" id="add_inventory_form" method="post" action="<?= base_url();?>Main_inventory/save_inventory_item">
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Inventory Name <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="inventory_name" type="text" class="form-control form-control-success" name="inventory_name" placeholder="Inventory Name">
                                                    <input id="id" type="text" class="form-control form-control-success" name="id" style="display:none;" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Inventory Category <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <select id="inventory_category" type="text" class="form-control form-control-success" name="inventory_category" placeholder="Inventory Category">
                                                        <option value=""> -- Please Select Category --</option>
                                                        <?php
                                                            foreach ($categories as $category) {
                                                                ?>
                                                                    <option value="<?= $category['id']?>"><?= $category['description']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Unit <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <select id="unit" type="text" class="form-control form-control-success" name="unit" placeholder="Item Unit">
                                                        <option value=""> -- Please Select Unit of Measurement --</option>
                                                        <?php
                                                            foreach ($uoms as $uom) {
                                                                ?>
                                                                    <option value="<?= $uom['id']?>"><?= $uom['description']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Reorder Point<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="reorder_point" type="text" class="form-control form-control-success" name="reorder_point" placeholder="Reorder Point">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Reorder Value<span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <input id="reorder_value" type="text" class="form-control form-control-success" name="reorder_value" placeholder="Inventory Name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">GL Account <span class="asterisk" style="color:red">*</span></label>
                                                <div class="col-md-10">
                                                    <select id="gl_account" type="text" class="form-control form-control-success" name="gl_account" placeholder="Item Unit">
                                                        <option value=""> -- Please Select GL Account --</option>
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

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Barcode</label>
                                                <div class="col-md-10">
                                                    <input id="barcode" type="text" class="form-control form-control-success" name="barcode" placeholder="Bar Code">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 form-control-label">Other Info</label>
                                                <div class="col-md-10">
                                                    <textarea id="other_info" type="text" class="form-control form-control-success" name="other_info" placeholder="Other Info"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="checkbox" name="is_for_sale" id="is_for_sale"> Is For Sale
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="checkbox" name="web_for_sale" id="web_for_sale"> Web For Sale
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="checkbox" name="track_inventory_count" id="track_inventory_count"> Track Inventory Count
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
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
                                <input type="submit" style="float:right" class="btn btn-success" value="Save">
                                <button type="button" style="float:right; margin-right:10px;" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
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
<script type="text/javascript" src="<?=base_url('assets/js/account/check_transaction_history.js');?>"></script>

