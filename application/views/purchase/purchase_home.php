<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="" data-labelname="Purchases">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Purchases</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
   <!--  <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_purchase/purchase_home/'.$token);?>">Purchases</a></li>
        </div>
    </ul> -->
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
<!--                         <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Purchases</h3>
                        </div> -->
                        <div class="card-body" style="margin-top: 20px;">
                        	 <div class="row">
                        	<div class="col-sm-6">
	                            <div class="text">
	                                <a href="<?=base_url('Main_purchase/purchase_order/'.$token);?>"><h3 class="h5">Purchase Order</h3></a>
	                                <br>
	                                <small>New Supplier Purchase Order.</small>
	                                <div class="line"></div>
	                                <br>
	                            </div>

	                             <div class="text">
	                                <a href="<?=base_url('Main_purchase/purchase_summary/'.$token);?>"><h3 class="h5">Purchase Order Approval & Transaction History</h3></a>
	                                <br>
	                                <small>List of all approved and for approval purchase order.</small>
	                                <div class="line"></div>
	                                <br>
	                            </div>
                                <div class="text">
                                    <a href="<?=base_url('Main_purchase/po_transaction_history/'.$token);?>"><h3 class="h5">Purchase Order Transaction History</h3></a>
                                    <br>
                                    <small>Summary of all purchase order.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
                                <div class="text">
                                    <a href="<?=base_url('Main_purchase/receive_po/'.$token);?>"><h3 class="h5">Receive PO</h3></a>
                                    <br>
                                    <small>Receive delivery of all approved purchase order.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
                                <div class="text">
                                    <a href="<?=base_url('Main_purchase/receivepo_tranHistory/'.$token);?>"><h3 class="h5">Receive PO Transaction History</h3></a>
                                    <br>
                                    <small>List of all purchase order received transactions.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text">
                                    <a href="<?=base_url('Main_purchase/poreceipt_summary/'.$token);?>"><h3 class="h5">Purchase Order Receipt</h3></a>
                                    <br>
                                    <small>New purchase order receipt for purchase order for payment issuance.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
                                <div class="text">
                                    <a href="<?=base_url('Main_purchase/purchase_return/'.$token);?>"><h3 class="h5">PO Return</h3></a>
                                    <br>
                                    <small>New purchase order return.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
                                <div class="text">
                                    <a href="<?=base_url('Main_purchase/return_summary/'.$token);?>"><h3 class="h5">PO Return Transaction History</h3></a>
                                    <br>
                                    <small>Summary of all purchase order return.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
                                <div class="text">
                                    <a href="<?=base_url('Main_purchase/po_payment/'.$token);?>"><h3 class="h5">PO Payment</h3></a>
                                    <br>
                                    <small>Summary of all purchase order payment for allocation.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
                                <div class="text">
                                    <a href="<?=base_url('Main_purchase/price_adjustment/'.$token);?>"><h3 class="h5">PO Price Adjustment</h3></a>
                                    <br>
                                    <small>Purchase order price adjustment.</small>
                                    <div class="line"></div>
                                    <br>
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
    <br /><br><br>
<?php $this->load->view('includes/footer'); ?>
