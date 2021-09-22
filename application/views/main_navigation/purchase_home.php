<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
-->

<div class="content-inner" id="pageActive" data-num="3" data-namecollapse="" data-labelname="Purchases">
    <div class="bc-icons-2 card mb-4">

        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Purchases</li>
        </ol>

    </div>
    <!-- Page Header-->
    <div class="row">
        <!-- <div class="col-sm-6">

            <a href="<?=base_url('Main_purchase/purchase_order/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Purchase Order</div>
                    <small class="card-text text-black-50">New Supplier Purchase Order.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_purchase/purchase_summary/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Purchase Order Approval & Transaction History</div>
                    <small class="card-text text-black-50">List of all approved and for approval purchase order.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_purchase/po_transaction_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Purchase Order Transaction History</div>
                    <small class="card-text text-black-50">Summary of all purchase order.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_purchase/receive_po/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Receive PO</div>
                    <small class="card-text text-black-50">Receive delivery of all approved purchase order.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_purchase/receivepo_tranHistory/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Receive PO Transaction History</div>
                    <small class="card-text text-black-50">List of all purchase order received transactions.</small>
                </div>
            </a>
        </div>


        <div class="col-sm-6"> 

            <a href="<?=base_url('Main_purchase/poreceipt_summary/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Purchase Order Receipt</div>
                    <small class="card-text text-black-50">New purchase order receipt for purchase order for payment issuance.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_purchase/purchase_return/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">PO Return</div>
                    <small class="card-text text-black-50">New purchase order return.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_purchase/return_summary/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">PO Return Transaction History</div>
                    <small class="card-text text-black-50">Summary of all purchase order return.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_purchase/po_payment/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">PO Payment</div>
                    <small class="card-text text-black-50">Summary of all purchase order payment for allocation.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_purchase/price_adjustment/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">PO Price Adjustment</div>
                    <small class="card-text text-black-50">Purchase order price adjustment.</small>
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
        $labelname = "Purchases"; //check the labelname in the top div
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
