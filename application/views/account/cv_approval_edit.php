<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Cash Voucher Approval</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a></li>
            <li class="breadcrumb-item active">Accounts Payable Voucher for Purchases (with PO)</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
              
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="card-body">

                                            <div class="" >
                                                <div class="">
                                                    <H1>Cash Voucher #<?=$get_summary->cvno?></H1>
                                                </div>  
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Cash Voucher Information</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Transaction Date</label>
                                                    <label class="form-control-label col-form-label-sm"><?=$get_summary->trandate?></label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Funds Date:</label>
                                                    <label class="form-control-label col-form-label-sm"><?=$get_summary->fundsdate?></label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Fund Form:</label>
                                                    <label class="form-control-label col-form-label-sm"><?=$get_summary->fundfrom?></label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Pay To:</label>
                                                    <label class="form-control-label col-form-label-sm"><?=$get_summary->payto?></label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Transaction Amount:</label>
                                                    <label class="form-control-label col-form-label-sm"><?=$get_summary->tranamt?></label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-control-label col-form-label-sm">Transaction Details:</label>
                                                    <label class="form-control-label col-form-label-sm"><?=$get_summary->trandetails?></label>
                                                </div>
                                            </div>

                                            <div class="col-3" >
                                                <!-- <button class="btn btn-block btn-primary submitcheckbtn" id="">Approve Cash Voucher Record</button> -->
                                            </div>

                                            <span type="" class="apvno" style="border:none; float:right;" hidden><?=$get_summary->apvno?></span>
                                            <input type="text" id="cvno" value="<?=$get_summary->cvno?>" hidden>
                                            <input type="text" id="token" value="<?= $token ?>" hidden>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">       
                           <!--  <div class="col-md-12"> -->
                                <button type="submit" style="float:right; margin-right:10px;" class="btn btn-success submitcheckbtn">Approve Cash Voucher Record</button>
                                <button type="button" style="float:right; margin-right:50px;" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Back</button>
                            <!-- </div> -->
                        </div>
                    </div>
                

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/cv_approval_edit.js');?>"></script>

