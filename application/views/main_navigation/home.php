<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->

 <?php // matching the token url and the token session
    if($this->session->userdata('token_session') != en_dec("dec", $token)){
        header("Location:".base_url('Main/logout')); /* Redirect to login */
        exit();
    }

    //022818
    $position_access = $this->session->userdata('get_position_access');
    $access_nav = $position_access->access_nav;
?>


<style>
table.table td, table.table th {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.chart-title{
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
    color: #333; 
    font-family: inherit; 
    font-weight: 500
}

.hide_column{
 display: none !important;
}

.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: #666;
}

table {
    font-size: 0.9em;
    color: #fff;
}
</style>

<div class="content-inner" id="pageActive" data-num="1" data-namecollapse="" data-labelname="Home">
    <!-- Page Header-->
    <!-- Breadcrumb-->

    <?php if($this->session->userdata('position_id') == 1){ ?>

    <h1 class="chart-title">Income Report</h1>
    <div class="row">
        <div class="col-md-8">
            <div id="chart"></div>
        </div>

   <!--  <div class="col-md-4">
        <div id="chartpurchase"></div>
    </div> -->

    <div class="col-md-4">
        <div class="table-responsive">
            <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                <thead>
                    <tr>
                        <!-- <th class="hide_column">Date.</th> -->
                        <th>MONTH</th>
                        <th>AMOUNT</th>
                        <th>AMOUNT</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 10px">
    <div class="col-md-8">
        <div id="chartpurchase"></div>
    </div> 
    <div class="col-md-4">
        <div class="table-responsive" >
            <table  class="table  table-striped table-hover table-bordered" id="purchase-chart-table"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                <thead>
                    <tr>
                     <th>MONTH</th>
                        <th>AMOUNT</th>
                        <th>AMOUNT</th>
                 </tr>
             </thead>
         </table>
     </div>
 </div>
</div>


<?php }else{ ?>

    <div class="row">
        
        <?php 
            $main_page_nav = $this->model->get_main_page_navigation()->result();
            $data_num = 0;
        ?>

        <?php 
            $arr_ = explode(', ', $access_nav); //array to string concut using comma 
        ?>

        <?php foreach($main_page_nav as $mpn){ ?>
            <?php $data_num++; ?>
            <?php 

            if (in_array('All Access', $arr_)){ ?>
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <a href="<?=base_url('Main_page/display_page/'.$mpn->main_nav_href.'/'.$token);?>" id="<?='btn'.$mpn->main_nav_desc;?>">
                    <div class="p-5 card card-hover text-center home-card w-100">
                        <span><i class="fa <?=$mpn->main_nav_icon;?> fa-3x text-white"></i></span>
                        <h6 class="text-white mt-3 primary-bg m-0 py-2"><?=$mpn->main_nav_desc;?></h6>
                    </div>
                </a>
            </div>


            <?php }else{ ?>
                <?php if ($mpn->main_nav_desc == ''){ ?>



                 <!--    <li data-num="<?=$data_num;?>"> 
                        <a href="<?=base_url('Main_page/display_page/home'.'/'.$token);?>"><i class="fa <?=$mpn->main_nav_icon;?>" aria-hidden="true" class="list-group-item list-group-item-action waves-effect active"></i> <?=$mpn->main_nav_desc;?></a>
                    </li> -->
                <?php } ?>
                <!-- //for now 030518 -->
            
                <!-- end for now 030518 -->  


                <?php if (in_array($mpn->main_nav_desc, $arr_)){ ?>

                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <a href="<?=base_url('Main_page/display_page/'.$mpn->main_nav_href.'/'.$token);?>" class="w-100" id="<?='btn'.$mpn->main_nav_desc;?>">
                        <div class="p-5 card card-hover text-center home-card w-100">
                            <span><i class="fa <?=$mpn->main_nav_icon;?> fa-3x text-white"></i></span>
                            <h6 class="text-white mt-3 primary-bg m-0 py-2"><?=$mpn->main_nav_desc;?></h6>
                        </div>
                    </a>
                </div>

                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php foreach($main_page_nav as $mpn){ ?>
            <?php if (in_array($mpn->main_nav_id, $arr_)){ ?>
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <a href="<?=base_url('Main_page/display_page/'.$mpn->main_nav_href.'/'.$token);?>" class="w-100" id="<?='btn'.$mpn->main_nav_desc;?>">
                    <div class="p-5 card card-hover text-center home-card w-100">
                        <span><i class="fa <?=$mpn->main_nav_icon;?> fa-3x text-white"></i></span>
                        <h6 class="text-white mt-3 primary-bg m-0 py-2"><?=$mpn->main_nav_desc;?></h6>
                    </div>
                </a>
            </div>
            <?php } ?>
        <?php } ?>
        <!-- <div class="col-lg-3 col-md-4 col-6 mb-5">
            <a href="<?=base_url("main/purchases") ?>" class="h-100 w-100">
                <div class="blue-grey p-4 card card-hover text-center home-card h-100 w-100">
                    <span><i class="fas fa-money-bill fa-3x text-white"></i></span>
                    <h6 class="text-white primary-bg m-0 py-2">Purchases</h6>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mb-5">
            <a href="<?=base_url("main/inventory") ?>" class="h-100 w-100">
                <div class="blue-grey p-4 card card-hover text-center home-card h-100 w-100">
                    <span><i class="fas fa-tag fa-3x text-white"></i></span>
                    <h6 class="text-white primary-bg m-0 py-2">Inventory</h6>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mb-5">
            <a href="<?=base_url("main/entity") ?>" class="h-100 w-100">
                <div class="blue-grey p-4 card card-hover text-center home-card h-100 w-100">
                    <span><i class="fas fa-university fa-3x text-white"></i></span>
                    <h6 class="text-white primary-bg m-0 py-2">Entity</h6>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mb-5">
            <a href="<?=base_url("main/manufacturing") ?>" class="h-100 w-100">
                <div class="blue-grey p-4 card card-hover text-center home-card h-100 w-100">
                    <span><i class="fas fa-sync-alt fa-3x text-white"></i></span>
                    <h6 class="text-white primary-bg m-0 py-2">Manufacturing</h6>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mb-5">
            <a href="<?=base_url("main/accounts") ?>" class="h-100 w-100">
                <div class="blue-grey p-4 card card-hover text-center home-card h-100 w-100">
                    <span><i class="fas fa-users fa-3x text-white"></i></span>
                    <h6 class="text-white primary-bg m-0 py-2">Accounts</h6>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mb-5">
            <a href="<?=base_url("main/settings") ?>" class="h-100 w-100">
                <div class="blue-grey p-4 card card-hover text-center home-card h-100 w-100">
                    <span><i class="fas fa-cog fa-3x text-white"></i></span>
                    <h6 class="text-white primary-bg m-0 py-2">Settings</h6>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mb-5">
            <a href="<?=base_url("main/cart_release") ?>" class="h-100 w-100">
                <div class="blue-grey p-4 card card-hover text-center home-card h-100 w-100">
                    <span><i class="fas fa-store fa-3x text-white"></i></span>
                    <h6 class="text-white primary-bg m-0 py-2">Cart Release</h6>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mb-5">
            <a href="<?=base_url("main/reports") ?>" class="h-100 w-100">
                <div class="blue-grey p-4 card card-hover text-center home-card h-100 w-100">
                    <span><i class="fas fa-file-alt fa-3x text-white"></i></span>
                    <h6 class="text-white primary-bg m-0 py-2">Reports</h6>
                </div>
            </a>
        </div> -->
    </div>
    <?php } ?>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/no-data-to-display.js"></script> -->
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/home.js');?>"></script>
