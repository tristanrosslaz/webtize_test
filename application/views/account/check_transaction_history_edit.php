<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
         <!--  <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->

         <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
         <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_account/check_transaction_history/'.$token); ?>">Check Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
         <li class="breadcrumb-item active">Check Transaction Edit</li>
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
                                <div class="row">
                                    <div class="col-12">
                                        <h5>Pay To:</h5><br/>
                                        <h1><?= $checkSummary['supname']; ?></h1><br/>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#addItemModal2" id="add_item_btn" class="btn btn-primary btnUpdate btnTable float-right " name="update" style="top:20px;">
                            Add Item
                        </button>
                        <div class="table-responsive">
                            <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>GL Account</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                        <th>Acctid</th>
                                    </tr>
                                </thead>
                                <tbody>                         
                                </tbody>
                            </table>
                        </div>
                        <div class="pb-10">     
                            <div class="col-md-4 pr-0" style="padding: 30px 0; float: right">
                                <button type="button" class="btn btn-md btn-block ml-0 mt-0 pr-0 border-deco-left blue-grey" id="grand_total" style="width: 100%;font-size: 15px; line-height: 20px;" disabled><i class="fa fa-pie-chart white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total : <?= number_format($checkSummary['amount'], 2); ?></a></button>
                            </div>

                            <input type="" class="totalamt" id="totalamt" value="<?=$checkSummary['amount']?>" hidden>
                        </div>      
                    </div>
                    <div class="col-12" style="padding-bottom: 22px">
                        <label>Notes</label>
                        <textarea class="form-control notes" style="resize: none;"><?= $checkSummary['notes']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="col-lg-12 pr-0">
            <button style="float: right;" id="saveBtnEncode" class="btn btn-primary saveBtnEncode"> Update Changes</button>                                  
        </div>
    </div>
</section>

<!-- Modal-->
<div id="addItemModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-md-8">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="exampleModalLabel" class="modal-title">Add Item</h4>
                <input type="" class="checkno" id="checkno" name="checkno" value="<?=$checkno?>" hidden>
            </div>
            <form class="form-horizontal personal-info-css">
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label">Date <span class="" style="color:red">*</span></label>
                                            <div class="col-md-9">
                                                <input id="ff_date" type="text" readonly="true" class="form-control form-control-success datepicker-normal" name="ff_date" placeholder="mm/dd/yyyy">
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
                                                <input id="ff_amount" type="number" onkeypress="return isNumberKeyOnly(event)" min="0" class="form-control form-control-success" name="ff_amount" placeholder="0.00">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label">GL Account <span class="" style="color:red">*</span></label>
                                            <div class="col-md-9">
                                                <select id="ff_gl_account" type="text" class="form-control form-control-success" name="ff_gl_account" placeholder="GL Account">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group row">       
                        <div class="col-md-12">
                            <input type="button" style="float:right" class="btn btn-primary" id="save_gl_item" value="Add">
                            <button type="button" style="float:right; margin-right:10px;" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/check_transaction_history_edit.js');?>"></script>

