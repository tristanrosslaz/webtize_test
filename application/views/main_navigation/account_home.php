<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
-->

<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Accounts">
    <div class="bc-icons-2 card mb-4">

        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Accounts</li>
        </ol>

    </div>
    <!-- Page Header-->
    <div class="row">
        <!-- <div class="col-sm-6">
            <a href="<?=base_url('Main_account/accounts_payable_voucher/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Accounts Payable Voucher</div>
                    <small class="card-text text-black-50">New accounts payable voucher.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/check/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Check</div>
                    <small class="card-text text-black-50">New check.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/cashvoucher/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Cash Voucher</div>
                    <small class="card-text text-black-50">New cash voucher.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/cv_approval/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Cash Voucher Approval</div>
                    <small class="card-text text-black-50">Summary of all cash voucher for approval.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/check_release/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Check Release</div>
                    <small class="card-text text-black-50">Release check.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/check_transaction_release_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Check Release Transaction History</div>
                    <small class="card-text text-black-50">Summary of all checks that has been released.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/bankdeposit/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Bank Deposit</div>
                    <small class="card-text text-black-50">New bank deposit.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/bankdeposit_transaction/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Bank Deposit Transaction History</div>
                    <small class="card-text text-black-50">Summary of all bank deposit transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/bounce_check/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Bounce Check</div>
                    <small class="card-text text-black-50">New Bounce Check.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/bct_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Bounce Check Transaction History</div>
                    <small class="card-text text-black-50">Summary of all Bounce Check transaction.</small>
                </div>
            </a>
        </div>

        <div class="col-sm-6"> 
            <a href="<?=base_url('Main_account/apv_list/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Accounts Payable Voucher List</div>
                    <small class="card-text text-black-50">Summary of all accounts payable voucher.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/check_approval/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Check Approval</div>
                    <small class="card-text text-black-50">Summary of all checks for approval.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/check_transaction_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Check Transaction History</div>
                    <small class="card-text text-black-50">Summary of all check transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/cashvoucher_transaction/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Cash Voucher Transaction History</div>
                    <small class="card-text text-black-50">Summary of all cash voucher transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/gl_transaction/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">GL Transaction</div>
                    <small class="card-text text-black-50">New GL transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/gl_transaction_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">GL Transaction History</div>
                    <small class="card-text text-black-50">Summary of all GL transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/cash_on_hand/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Cash On Hand</div>
                    <small class="card-text text-black-50">Summary of cash on hand transaction.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_account/cash_on_hand_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Cash On Hand Transaction History</div>
                    <small class="card-text text-black-50">Summary of cash on hand transaction list.</small>
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
        $labelname = "Accounts"; //check the labelname in the top div
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
