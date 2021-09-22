<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
-->

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">

        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Entity</li>
        </ol>

    </div>
    <!-- Page Header-->
    <div class="row">
        <!-- <div class="col-sm-6">

            <a href="<?=base_url('Main_entity/applicant/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Applicant</div>
                    <small class="card-text text-black-50">Manage applicant information.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/entity_supplierlist/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Supplier</div>
                    <small class="card-text text-black-50">List of all suppliers and option to add/edit/delete each record.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/customer/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Customer</div>
                    <small class="card-text text-black-50">Manage customer information.</small>
                </div>
            </a>
           
            <a href="<?=base_url('Main_entity/entity_ticket/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Customer Ticket</div>
                    <small class="card-text text-black-50">New customer ticket to manage distributor's account and concerns.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/entity_ticketlist/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Customer Ticket Transaction History</div>
                    <small class="card-text text-black-50">Summary of all customer ticket transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/entity_deliveryvehicle/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Delivery Vehicle Maintenance</div>
                    <small class="card-text text-black-50">Delivery vehicle maintenance record.</small>
                </div>
            </a> 
        </div>

        <div class="col-sm-6"> 
            <a href="<?=base_url('Main_entity/entity_franchise_paymentrecord/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Payment Record</div>
                    <small class="card-text text-black-50">New Franchise Payment Record.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/entity_franchiseList/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Payment Record Transaction History</div>
                    <small class="card-text text-black-50">Summary of all Franchise Payment Record.</small>
                </div>
            </a>
            
            <a href="<?=base_url('Main_entity/entity_supplier_limitpurchases/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Supplier Limit Purchases</div>
                    <small class="card-text text-black-50">Supplier limit purchase and option to add/edit/delete each record.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/entity_customersoa/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Customer Statement of Account</div>
                    <small class="card-text text-black-50">Customer statement of account.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/entity_salesagent/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Sales Agent</div>
                    <small class="card-text text-black-50">Update Sales Agent.</small>
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
        $labelname = "Entity"; //check the labelname in the top div
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
