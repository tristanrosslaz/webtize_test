<?php 
//071318
//this code is for destroying session and page if they access restricted page

$position_access = $this->session->userdata('get_position_access');
$access_content_nav = $position_access->access_content_nav;
$arr_ = explode(', ', $access_content_nav); //string comma separated to array 
$get_url_content_db = $this->model->get_url_content_db($arr_)->result_array();

$url_content_arr = array();
foreach ($get_url_content_db as $cun) {
    $url_content_arr[] = $cun['cn_url'];
}
$content_url = $this->uri->segment(1).'/'.$this->uri->segment(2).'/';

if (in_array($content_url, $url_content_arr) == false){
    header("location:".base_url('Main/logout'));
}    
//071318
?>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Applicant</li>
        </ol>
    </div>
    <!-- Page Header-->
    <!-- Super User -->
    <?php if($this->session->userdata('position_id') == 1 ){?>
    <div class="row">
        <div class="col-sm-6">

            <a href="<?=base_url('Main_entity/franchise_info_sheet/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet</div>
                    <small class="card-text text-black-50">Create a new Information Sheet.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet Transaction History</div>
                    <small class="card-text text-black-50">List of all franchise information sheet history.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/generate_one_time_link/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Generate One Time Link</div>
                    <small class="card-text text-black-50">Generate a one time link to fill up Franchisee Info Sheet.</small>
                </div>
            </a>
           
           
           

        
        </div>


        <div class="col-sm-6"> 


            <a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history_sales_agent/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet Transaction History (Sales Agent)</div>
                    <small class="card-text text-black-50">List of all franchise information sheet history without proposed location.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history_moni_officer/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet Transaction History (Monitoring Officer)</div>
                    <small class="card-text text-black-50">List of all franchise information sheet history without proposed location.</small>
                </div>
            </a>


            
           


        </div>
    </div>
    <!-- BDD Manager -->
    <?php } if($this->session->userdata('position_id') == 17 ){?>

    <div class="row">
        <div class="col-sm-6">

            <a href="<?=base_url('Main_entity/franchise_info_sheet/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet</div>
                    <small class="card-text text-black-50">Create a new Information Sheet.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet Transaction History</div>
                    <small class="card-text text-black-50">List of all franchise information sheet history.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_entity/generate_one_time_link/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Generate One Time Link</div>
                    <small class="card-text text-black-50">Generate a one time link to fill up Franchisee Info Sheet.</small>
                </div>
            </a>
        
        </div>

        <div class="col-sm-6">             

        </div>
    </div>

    <!-- BDD JCP -->
    <?php } if($this->session->userdata('position_id') == 19){?>

    <div class="row">
        <div class="col-sm-6">

            <a href="<?=base_url('Main_entity/franchise_info_sheet/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet</div>
                    <small class="card-text text-black-50">Create a new Information Sheet.</small>
                </div>
            </a>
        
        </div>

        <div class="col-sm-6">             

        </div>
    </div>

    <!-- BDD Monitoring -->
    <?php } if($this->session->userdata('position_id') == 20){?>

    <div class="row">
        <div class="col-sm-6">

            <a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history_moni_officer/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet Transaction History (Monitoring Officer)</div>
                    <small class="card-text text-black-50">List of all franchise information sheet history.</small>
                </div>
            </a>
        
        </div>

        <div class="col-sm-6">             

        </div>
    </div>

    <!-- BDD Sales Agent -->
    <?php } if($this->session->userdata('position_id') == 21){?>


     <div class="row">
        <div class="col-sm-6">

            <a href="<?=base_url('Main_entity/franchise_info_sheet/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet</div>
                    <small class="card-text text-black-50">Create a new Information Sheet.</small>
                </div>
            </a>



            <a href="<?=base_url('Main_entity/franchise_info_sheet_transaction_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Information Sheet Transaction History</div>
                    <small class="card-text text-black-50">List of all franchise information sheet history.</small>
                </div>
            </a>
        
        </div>

        <div class="col-sm-6">             

            <a href="<?=base_url('Main_entity/generate_one_time_link/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Generate One Time Link</div>
                    <small class="card-text text-black-50">Generate a one time link to fill up Franchisee Info Sheet.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_franchise_accounting/franchise_payment_details/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Payment Details</div>
                    <small class="card-text text-black-50">Create Franchise Payment.</small>
                </div>
            </a>
            
        </div>

        <div class="col-sm-6">             

            <a href="<?=base_url('Main_franchise_accounting/franchise_payment_transaction_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Franchise Payment Transaction History</div>
                    <small class="card-text text-black-50">List of all franchise information sheet history for payment.</small>
                </div>
            </a> 
            
        </div>
    </div>      


    <?php }?>

    <div class="row">
     <div class="col-sm-6">             

                <a href="<?=base_url('Main_franchise_accounting/franchise_payment_details/'.$token);?>" class="w-100">
                    <div class="card card-option card-hover white p-3 mb-3 w-100">
                        <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                        <div class="card-header-title font-weight-bold">Franchise Payment Details</div>
                        <small class="card-text text-black-50">Create Franchise Payment.</small>
                    </div>
                </a>   
            </div>
    <div class="col-sm-6">             

                <a href="<?=base_url('Main_franchise_accounting/franchise_payment_transaction_history/'.$token);?>" class="w-100">
                    <div class="card card-option card-hover white p-3 mb-3 w-100">
                        <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                        <div class="card-header-title font-weight-bold">Franchise Payment Transaction History</div>
                        <small class="card-text text-black-50">List of all franchise information sheet history for payment.</small>
                    </div>
                </a> 
                
            </div>
          
    </div>

    <?php $this->load->view('includes/footer'); ?>
