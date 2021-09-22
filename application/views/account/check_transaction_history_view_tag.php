<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Clear Check</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Check Information</h6>
                        <div class="card-header d-flex align-items-center">
                                <h4 style="float: left;">Check Reference: <?= $checkSummary['chkno']; ?></h4>
                          </div>
                        <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12">
                                    <br>
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                            <label>Date: <?= $checkSummary['chkdate'];?></label><br/>
                                            <label>Type: 
                                                <?php 

                                                    if($checkSummary['isgl']==="No"){
                                                        echo "Purchases";
                                                    }
                                                    else{
                                                        echo "Expenses";
                                                    }

                                                    $totalAmount1=0;

                                                    foreach ($checkdetails as  $value) {
                                                        $value['amount'];
                                                        $totalAmount1+=$value['amount'];
                                                    }

                                                ?>
                                            </label><br/>
                                            <label>Pay To: <?= check_recipient($checkSummary["chkno"],$checkSummary["idno"]);?></label><br/>
                                            <label>Reference: </label><label id="lbl_check_number"><?= $checkSummary['chkno'];?></label><br/>
                                            <label>Total: <?= number_format($totalAmount1,2,".",",") ?></label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>GL Account</th>
                                            <th>Amount</th>
                                            <th>GL ID</th>
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
                                                        <td><?= $value['acctid'];?></td>
                                                    </tr>
                                                <?php

                                                $totalAmount+=$value['amount'];
                                            }


                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-md btn-block ml-0 mt-0 border-deco-left blue-grey col-md-3 float-right" id="grand_total" style="width: 100%; font-size: 15px; padding-right: 0px; line-height: 20px;     margin-bottom: 40px;" disabled><i class="fa fa-cart-plus white-text fa-lg" style="float: left; margin-left: -18px; margin-top: 10px;"></i><a class="grand_total">Total: <?= number_format($totalAmount,2); ?></a></button>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-12">
                                     <label>Notes</label>
                                    <textarea style="resize: none;" class="form-control" readonly><?= $checkSummary['notes']; ?></textarea>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#tagModal"  style="float: right;margin-top: 20px;">
            Mark Check
        </button>
    </section>

<!-- Modal -->
<div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clear Check</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to clear check?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="markascleared">Mark as Cleared</button>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/check_transaction_history_view_tag.js');?>"></script>

