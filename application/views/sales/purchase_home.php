<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="" data-labelname="Sales">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Purchases</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_purchasing/purchasing_home/'.$token);?>">Purchases</a></li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Purchases</h3>
                        </div>
                        <div class="card-body">
                        	 <div class="row">
                        	<div class="col-sm-6">
	                            <div class="text">
	                                <a href="<?=base_url('Main_purchase/purchase_order/'.$token);?>"><h3 class="h5">Purchase Order</h3></a>
	                                <br>
	                                <small>New Supplier Purchase Order.</small>
	                                <div class="line"></div>
	                                <br>
	                            </div>

	                           <!--  <div class="text">
	                                <a href="<?=base_url('Main_sMain_purchasingales/purchasing_summary/'.$token);?>"><h3 class="h5">Sales Order Transaction History</h3></a>
	                                <br>
	                                <small>Summary of all repeat order transaction.</small>
	                                <div class="line"></div>
	                                <br>
	                            </div>
 -->
	                         
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
