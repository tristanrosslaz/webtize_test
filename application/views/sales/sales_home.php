<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="" data-labelname="Sales">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Sales</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_sales/sales_home/'.$token);?>">Sales</a></li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
<!--                         <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Sales</h3>
                        </div> -->
                        <div class="card-body" style="margin-top: 20px;">
                        	 <div class="row">
                        	<div class="col-sm-6">
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_order_form/'.$token);?>"><h3 class="h5">Sales Order</h3></a>
	                                <br>
	                                <small>New repeat order transaction.</small>
	                                <div class="line"></div>
	                                <br>
	                            </div>

	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_summary/'.$token);?>"><h3 class="h5">Sales Order Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all repeat order transaction.</small>
	                                <div class="line"></div>
	                                <br>
	                            </div>
								
								<div class="text">
	                                <a href="<?=base_url('Main_sales/sales_dr/'.$token);?>"><h3 class="h5">Delivery Receipt</h3></a>
	                                <br>
	                                <small>New Delivery Receipt Order.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>

	                           <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_drtran/'.$token);?>"><h3 class="h5">Delivery Receipt Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all Delivery Receipt Order transaction.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>

	                            <div class="text" style="display:none">
	                                <a href="<?=base_url('Main_sales/sales_drtagging/'.$token);?>"><h3 class="h5">Delivery Receipt Tagging</h3></a>
	                                <br>
	                                <small>Tagging of Delivery Receipt Orders.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>

	                            <div class="text" style="display:none">
	                                <a href="<?=base_url('Main_sales/sales_drtagginghistory/'.$token);?>"><h3 class="h5">Delivery Receipt Tagging Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all Delivery Receipt Tagged.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>

	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_return/'.$token);?>"><h3 class="h5">Sales Return</h3></a>
	                                <br>
	                                <small>Inventory returns from distributors/customers.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/salesreturn_summary/'.$token);?>"><h3 class="h5">Sales Return Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all sales return transaction.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_collection/'.$token);?>"><h3 class="h5">Collection</h3></a>
	                                <br>
	                                <small>New collection/payment transaction.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/collection_summary/'.$token);?>"><h3 class="h5">Collection Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all collection transaction.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                             <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_invoice/'.$token);?>"><h3 class="h5">Sales Invoice</h3></a>
	                                <br>
	                                <small>List of Sales Invoice.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <!-- <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_online/'.$token);?>"><h3 class="h5">Sales Order Online</h3></a>
	                                <br>
	                                <small>List of Sales Order Online.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div> -->
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/credit_memo/'.$token);?>"><h3 class="h5">Credit Memo</h3></a>
	                                <br>
	                                <small>New credit memo transaction.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                        </div>
	                        <div class="col-sm-6"> 
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/salesorder_itinerary/'.$token);?>"><h3 class="h5">Sales Order Itinerary</h3></a>
	                                <br>
	                                <small>Summary of all Sales Order Itinerary transaction.</small>
	                                <div class="line"></div><br>
	                            </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/itinerary_summary/'.$token);?>"><h3 class="h5">Itinerary Report</h3></a>
	                                <br>
	                                <small>Set the itinerary of DR.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <div class="text">
                                    <a href="<?=base_url('Main_sales/fran_service_receipt/'.$token);?>"><h3 class="h5">Franchise Service Receipt</h3></a>
                                    <br>
                                    <small>New service receipt transaction.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
                                <div class="text">
                                    <a href="<?=base_url('Main_sales/fran_service_history/'.$token);?>"><h3 class="h5">Franchise Service Receipt Transaction History</h3></a>
                                    <br>
                                    <small>New service receipt transaction.</small>
                                    <div class="line"></div>
                                    <br>
                                </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/service_collection/'.$token);?>"><h3 class="h5">Franchise Service Receipt Collection</h3></a>
	                                <br>
	                                <small>New collection/payment transaction for franchise service.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/fsr_collection_summary/'.$token);?>"><h3 class="h5">FSR Collection Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all franchise service receipt collection transaction.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>

	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_order_preparation/'.$token);?>"><h3 class="h5">Sales Order for Preparation</h3></a>
	                                <br>
	                                <small>List of Sales Order for Preparation.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/salesorder_prep_summary/'.$token);?>"><h3 class="h5">Sales Order Preparation Summary Transaction History</h3></a>
	                                <br>
	                                <small>List of All Sales Order Preparation Summary.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/sales_invoicetran/'.$token);?>"><h3 class="h5">Sales Invoice Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all Sales Invoice transaction.</small>
	                                <div class="line"></div>
	                                <br />
	                            </div>
	                            <div class="text">
	                                <a href="<?=base_url('Main_sales/credit_memosummary/'.$token);?>"><h3 class="h5">Credit Memo Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all credit memo transaction.</small>
	                                <div class="line"></div>
	                                <br />
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
