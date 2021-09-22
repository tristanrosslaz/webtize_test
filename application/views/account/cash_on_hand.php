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
<style type="text/css">
.btn-primary {
  color: #fff !important; 
  background-color: #13496f !important;
  border-color: #13496f !important; 
}  
</style>
<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="7" data-namecollapse="" data-labelname="Inventory List"> 
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/account_home/'.$token);?>">Accounts</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Cash On Hand</li>
        </ol>
    </div>
    <section id="classification_div">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Cash On Hand Information</h6>
                        <div class="card-body">
                          
                                <form class="form-horizontal personal-info-css" id="add_coh_form" method="post" action="">

                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label class="col-md-4 form-control-label">Date <span class="" style="color:red">*</span></label>
                                            <div class="col-md-8">
                                                <input id="coh_date" type="text" class="form-control form-control-success datepicker" name="ff_date" placeholder="mm/dd/yyyy">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 form-control-label">Cash On Hand Amount<span class="" style="color:red">*</span></label>
                                            <div class="col-md-8">
                                                <input id="coh_amount" type="number" class="form-control form-control-success" name="ff_description" placeholder="Cash On Hand Amount" onkeypress="return isNumberKeyOnly(event)" min="0" onpaste="return false;">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 form-control-label">Encashment Check No.<span class="" style="color:red">*</span></label>
                                            <div class="col-md-8">
                                                <input id="coh_enchkno" type="text" class="form-control form-control-success" name="ff_description" placeholder="Encashment Check No.">
                                            </div>
                                        </div>

                                        <div class="form-group row float-right">
                                            <label class=" form-control-label"></label>
                                            <div class="col-md-12">
                                             <input type="submit" class="btn btn-primary btnCashhand" value="Save Cash on Hand Record" >
                                            </div>   
                                        </div>


                                    </div>                                   

                                </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="Modalloadingbar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" data-backdrop="static" data-keyboard="false">
        <div role="document" class="modal-dialog " data-backdrop="static" data-keyboard="false">
        </div> 
    </div>  

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script type="text/javascript" src="<?=base_url('assets/js/account/cash_on_hand.js');?>"></script>

