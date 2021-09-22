<div class="content-inner" id="pageActive" data-num="4" data-namecollapse="" data-labelname="Settings">
    <div class="bc-icons-2 card mb-4">

        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Inventory</li>
        </ol>

    </div>
    <!-- Page Header-->
    <div class="row">
        <!-- <div class="col-sm-6">

            <a href="<?=base_url('Main_inventory/inventory_list/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory List</div>
                    <small class="card-text text-black-50">List of all inventory and option to add/edit/delete each record.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_pricing_list/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Pricing</div>
                    <small class="card-text text-black-50">Set inventory selling price for inventory for each pricing category.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_location_transfer/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Location Transfer</div>
                    <small class="card-text text-black-50">Transfer inventory from one location to another.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_ilt_receive/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Location Transfer Receive</div>
                    <small class="card-text text-black-50">Set receive inventory location transfer items.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_location_transfer_transaction_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Location Transfer Transaction History</div>
                    <small class="card-text text-black-50">Summary of all inventory location transfer transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_adjustment/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Adjustment</div>
                    <small class="card-text text-black-50">Inventory adjustment for construction materials, manufacturing, spoilages, research and development and expense.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_adjustment_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Adjustment History</div>
                    <small class="card-text text-black-50">Summary of all inventory adjustment transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_adjustment_offset/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Adjustment (Off Set)</div>
                    <small class="card-text text-black-50">Inventory adjustment for balancing the inventory count.</small>
                </div>
            </a>
        </div>


        <div class="col-sm-6"> 

            <a href="<?=base_url('Main_inventory/inventory_supplier_pricing/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Supplier Pricing</div>
                    <small class="card-text text-black-50">Set inventory purchasing price.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_franchise_assignment/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Franchise Assignment</div>
                    <small class="card-text text-black-50">Set franchise inventory.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_actual_count/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Actual Count</div>
                    <small class="card-text text-black-50">Add new inventory actual count record.</small>
                </div>
            </a>

             <a href="<?=base_url('Main_inventory/inventory_limit_purchases/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Actual Count History</div>
                    <small class="card-text text-black-50">List of all inventory limit purchases.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_status_update/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Status Update</div>
                    <small class="card-text text-black-50">Update inventory status. This will be use to determine in which part of the system the inventory can be used.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_inventory/inventory_limit_purchases/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Inventory Limit Purchases</div>
                    <small class="card-text text-black-50">List of all inventory limit purchases.</small>
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
        $labelname = "Inventory"; //check the labelname in the top div
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
                    <a href="<?=base_url($cn->cn_url.$token);?>" class="w-100" id="<?='nav'.$cn->cn_name;?>">
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
                        <a href="<?=base_url($cn2->cn_url.$token);?>" class="w-100" id="<?='nav'.$cn->cn_name;?>">
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
