<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="11" data-namecollapse="" data-labelname="QR Quick Search">

    <div class="bc-icons-2 card mb-4">

        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">QR Quick Search</li>
        </ol>

    </div>

    <div class="row">
        <div class="col-sm-2">
        
        </div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header d-flex align-items-center primary-bg">
                    <h3 class="h4" style="color:white;">Scan QR Now</h3>
                </div>
                <div class="card-body">
                    <div id="no-result" class="alert alert-danger hide-elements">Scanned QR does not have a matching result on the database.</div>
                    <input type="text" id="qr-info" autocomplete="off" style="opacity: 0">
                    <input type="hidden" id="token" value="<?= $token ?>">
                    <img src="<?= base_url('assets/img/qrsearch.png') ?>" height="325px;" width="325px;">
                </div>
            </div>    
        </div>


        <div class="col-sm-2"> 

        </div>
    </div>
<?php $this->load->view('includes/footer'); ?>
