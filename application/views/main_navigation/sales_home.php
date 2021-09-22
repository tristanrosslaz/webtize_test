<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
-->


<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="" data-labelname="Sales">
	<div class="bc-icons-2 card mb-4">

		<ol class="breadcrumb mb-0 primary-bg px-4 py-3">
			<li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
			<li class="breadcrumb-item active">Sales</li>
		</ol>

	</div>
	<!-- Page Header-->
    <div class="row">
    	<!-- <div class="col-sm-6">
    		<a href="<?=base_url('Main_sales/sales_order_form/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Sales Order</div>
    				<small class="card-text text-black-50">New repeat order transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/sales_summary/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Sales Order Transaction History</div>
    				<small class="card-text text-black-50">Summary of all repeat order transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/sales_dr/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Delivery Receipt</div>
    				<small class="card-text text-black-50">New Delivery Receipt Order.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/sales_drtran/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Delivery Receipt Transaction History</div>
    				<small class="card-text text-black-50">Summary of all Delivery Receipt Order transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/sales_drtagging/'.$token);?>" class="w-100 d-none">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Delivery Receipt Tagging</div>
    				<small class="card-text text-black-50">Tagging of Delivery Receipt Orders.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/sales_drtagginghistory/'.$token);?>" class="w-100 d-none">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Delivery Receipt Tagging Transaction History</div>
    				<small class="card-text text-black-50">Summary of all Delivery Receipt Tagged.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/sales_return/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Sales Return</div>
    				<small class="card-text text-black-50">Inventory returns from distributors/customers.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/salesreturn_summary/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Sales Return Transaction History</div>
    				<small class="card-text text-black-50">Summary of all sales return transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/sales_collection/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Collection</div>
    				<small class="card-text text-black-50">New collection/payment transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/collection_summary/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Collection Transaction History</div>
    				<small class="card-text text-black-50">Summary of all collection transaction.</small>
    			</div>
    		</a>

            <a href="<?=base_url('Main_sales/sales_invoice/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales Invoice</div>
                    <small class="card-text text-black-50">List of Sales Invoice.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_sales/credit_memo/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Credit Memo</div>
                    <small class="card-text text-black-50">New credit memo transaction.</small>
                </div>
            </a>
    	</div>
    	<div class="col-sm-6"> 

    		<a href="<?=base_url('Main_sales/salesorder_itinerary/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Sales Order Itinerary</div>
    				<small class="card-text text-black-50">Summary of all Sales Order Itinerary transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/itinerary_summary/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Itinerary Report</div>
    				<small class="card-text text-black-50">Set the itinerary of DR.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/fran_service_receipt/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Franchise Service Receipt</div>
    				<small class="card-text text-black-50">New service receipt transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/fran_service_history/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Franchise Service Receipt Transaction History</div>
    				<small class="card-text text-black-50">New service receipt transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/service_collection/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Franchise Service Receipt Collection</div>
    				<small class="card-text text-black-50">New collection/payment transaction for franchise service.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/fsr_collection_summary/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">FSR Collection Transaction History</div>
    				<small class="card-text text-black-50">Summary of all franchise service receipt collection transaction.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/sales_order_preparation/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Sales Order for Preparation</div>
    				<small class="card-text text-black-50">List of Sales Order for Preparation.</small>
    			</div>
    		</a>

    		<a href="<?=base_url('Main_sales/salesorder_prep_summary/'.$token);?>" class="w-100">
    			<div class="card card-option card-hover white p-3 mb-3 w-100">
    				<div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
    				<div class="card-header-title font-weight-bold">Sales Order Preparation Summary Transaction History</div>
    				<small class="card-text text-black-50">New collection/payment transaction.</small>
    			</div>
    		</a>

            <a href="<?=base_url('Main_sales/sales_invoicetran/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales Invoice Transaction History</div>
                    <small class="card-text text-black-50">Summary of all Sales Invoice transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_sales/credit_memosummary/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Credit Memo Transaction History</div>
                    <small class="card-text text-black-50">Summary of all credit memo transaction.</small>
                </div>
            </a>
    	</div> -->

        <?php 
        //071318
        $position_access = $this->session->userdata('get_position_access');
        if (!empty($position_access->access_content_nav)) {
            $access_content_nav = $position_access->access_content_nav;
        }else{
            $access_content_nav = "";
        }
        
        $arr_ = explode(', ', $access_content_nav);
        $labelname = "Sales"; //check the labelname in the top div
        $main_nav = $this->model->get_main_nav_id($labelname)->row();
        $cn = $this->model->get_content_navigation($main_nav->main_nav_id)->result();
        $cn2 = $cn;
        $cn3 = $cn;
        //071318
        ?>
        <!-- //071318 -->
        <?php
            $main_counter = 0;
            foreach ($cn3 as $cn3) {
                if (in_array($cn3->id, $arr_)){
                    $main_counter++;
                }
            }
            $total = $main_counter; 
            $total_devided =  ceil($total / 2);
            $counter = 0;
            $counter2 = 0;
        ?>
        <div class="col-sm-6"> 
            
            <?php foreach($cn as $cn){ ?>
                <?php if (in_array($cn->id, $arr_)){ ?>
                    <a href="<?=base_url($cn->cn_url.$token);?>" class="w-100">
                        <div class="card card-option card-hover white p-3 mb-3 w-100">
                            <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                            <div class="card-header-title font-weight-bold"><?=$cn->cn_name;?></div>
                            <small class="card-text text-black-50"><?=$cn->cn_description;?></small>
                        </div>
                    </a>
                    <?php
                    $counter++;
                    if ($total_devided == $counter) {
                        break;
                    }
                    ?>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="col-sm-6">

            <?php foreach($cn2 as $cn2){ ?>

                <?php if (in_array($cn2->id, $arr_)){ ?>
                    <?php $counter2++; ?>
                        
                    <?php if ($counter < $counter2){ ?>
                        <a href="<?=base_url($cn2->cn_url.$token);?>" class="w-100">
                            <div class="card card-option card-hover white p-3 mb-3 w-100">
                                <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                                <div class="card-header-title font-weight-bold"><?=$cn2->cn_name;?></div>
                                <small class="card-text text-black-50"><?=$cn2->cn_description;?></small>
                            </div>
                        </a>
                    <?php } ?>
                
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <?php $this->load->view('includes/footer'); ?>
