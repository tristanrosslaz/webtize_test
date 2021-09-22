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
<style>
.easy-autocomplete.eac-square input {
    min-width: 543px !important;
}
</style>
<link rel="stylesheet" href="<?=base_url('assets/css/extra.css');?>">
   <div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ewallet-collapse-a" data-labelname="Collection">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Sales</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item active"><a href="<?=base_url('Main_sales/sales_home/'.$token);?>">Sales</a></li>
            <li class="breadcrumb-item active">Delivery Receipt Tagging</li>
        </div>
    </ul>
     <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="col-lg-12" style="padding-bottom: 30px;">
                                <div class="card-progress">
                                    <form class="form-horizontal encode-info-css sales_form" id="sales_form">
                                        <br>
                                        <div class="col-lg-12">
                                            <div class="step1" id="step1">
                                                <div class="form-group row">
                                                  <form class="collection-form">
                                                    <div class="col-md-6 form-collect">
                                                       <label class="form-control-label">Tagging Information</label>
                                                       <div class="form-group">
                                                          <small class="form-text">DR No</small>
                                                           <input type="text" class="form-control " onkeypress="return isNumberKeyOnly(event)" name="drno" id="drno" placeholder="DR No.." >
                                                       </div>
                                                        <div class="form-group">
                                                          <small class="form-text">DR Status </small>
                                                          <select class="select2 form-control" id="drstat" name="drstat" tabindex="1" required>
                                                            <option selected></option>
                                                             <option value="release" >Release</option>
                                                             <option value="notrelease" >Not Release</option>            
                                                          </select>
                                                        </div>


                                                        <div class="form-group">
                                                          <small class="form-text">Driver</small>
                                                           <select class="select2 form-control" id="driver" name="driver" tabindex="2" required>
                                                             <option selected></option>
                                                             <?php
                                                                foreach ($get_driver->result() as $gdriver) { ?>
                                                             <option value="<?=$gdriver->id?>"><?php echo strtoupper($gdriver->name); ?> </option>
                                                             <?php } ?>
                                                             ?>             
                                                          </select>
                                                        </div>


                                                      <div class="form-group">
                                                         <small class="form-text">No. of bags</small>
                                                          <input type="text" class="form-control form-control-success noofbags" onkeypress="return isNumberKeyOnly(event)" name="noofbags" id="noofbags" placeholder="0.00" required="required" tabindex="3">
                                                      </div>

                                                      <div class="form-group">
                                                          <small class="form-text">Prepared by</small>
                                                           <select class="select2 form-control" id="crew1" name="crew1" tabindex="4" required>
                                                             <option selected></option>
                                                             <?php
                                                                foreach ($get_crew->result() as $gcrew) { ?>
                                                             <option value="<?=$gcrew->id?>"><?php echo strtoupper($gcrew->name); ?> </option>
                                                             <?php } ?>
                                                             ?>             
                                                          </select>
                                                      </div>

                                                      <div class="form-group">
                                                          <small class="form-text">Packed by</small>
                                                           <select class="select2 form-control" id="crew2" name="crew2" tabindex="5" required>
                                                             <option selected></option>
                                                             <?php
                                                                foreach ($get_crew->result() as $gcrew) { ?>
                                                             <option value="<?=$gcrew->id?>"><?php echo strtoupper($gcrew->name); ?> </option>
                                                             <?php } ?>
                                                             ?>             
                                                          </select>
                                                      </div>


                                                       <div class="form-group">
                                                         <small class="form-text">Notes</small>
                                                          <textarea class="form-control" id="notes" tabindex="6" style="resize: none;" rows="5"></textarea>
                                                      </div>


                                                        <br>
                                                        <button id="BtnSavetag" class="btn btn-primary float-right BtnSavetag"><i class="fa fa-save" aria-hidden="true"></i> Save DR Tagging Record </button> 
                                                    </div>
                                                  </form>
                                                 </div>
                                            </div>  
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>


<?php $this->load->view('includes/footer'); ?>

<script src="<?=base_url('assets/js/sales/sales_tagging.js');?>"></script>
