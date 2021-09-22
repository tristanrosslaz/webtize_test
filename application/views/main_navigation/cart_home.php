<div class="content-inner" id="pageActive" data-num="9" data-namecollapse="" data-labelname="Cart Release">
    <div class="bc-icons-2 card mb-4">

        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cart Release</li>
        </ol>

    </div>

    <div class="row">
        <div class="col-sm-6">

            <a href="<?=base_url('Main_cart/release_schedule/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Release Schedule</div>
                    <small class="card-text text-black-50">New Release Schedule.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_cart/rst_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Release Schedule Transaction History</div>
                    <small class="card-text text-black-50">List of All Scheduled Release.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_cart/package_release/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Package Release</div>
                    <small class="card-text text-black-50">New Package Release.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_cart/prt_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Package Release Transaction History</div>
                    <small class="card-text text-black-50">List of All Package Release.</small>
                </div>
            </a>

        </div>  
        <div class="col-sm-6">

            <a href="<?=base_url('Main_cart/package_inclusion/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Package Inclusion</div>
                    <small class="card-text text-black-50">List of all package inclusion and option to add/edit/delete each record.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_cart/package_pullout/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Package Pullout</div>
                    <small class="card-text text-black-50">New Cart Pullout.</small>
                </div>
            </a>

            <a href="<?=base_url('Main_cart/ppt_history/'.$token);?>" class="w-100">
                <div class="card card-option card-hover white p-3 mb-3 w-100">
                    <div class="option-check"><i class="fa fa-hand-o-right fa-lg"></i></div>
                    <div class="card-header-title font-weight-bold">Package Pullout Transaction History</div>
                    <small class="card-text text-black-50">List of all Cart Pullout.</small>
                </div>
            </a>

        </div>  
    </div>       
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
