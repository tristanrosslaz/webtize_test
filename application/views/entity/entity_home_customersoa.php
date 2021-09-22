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
$labelname = "Entity";
$data_num_pk = $this->model->get_datanum_mainnavigation_using_labelname($labelname);

?>
<div class="content-inner" id="pageActive" data-num="<?=$data_num_pk;?>" data-namecollapse="" data-labelname="Entity">

   <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Customer Statement of Account</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">        
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-3">
                                        <div class="form-group" >
                                            <label class="form-control-label col-form-label-sm">Search Filter</label>
                                            <select class="form-control" name="divsearchfilter" id="divsearchfilter">
                                                <option value="dividno">Search by ID No.</option>
                                                <option value="divname">Search by Name</option>
                                                <option value="divaccount">Search by Account No</option>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="col-md col-12">
                                             <div class="form-group dividno" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">ID No.</label>
                                                <input type="text" class="input-sm form-control search-input-text idnosearch" data-column="1" id="idnosearch" onkeypress="return isNumberKeyOnly(event)" placeholder="ID Number.." />
                                            </div>
                                             <div class="form-group divname" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Name</label>
                                                <input type="text" class="input-sm form-control search-input-text nameSearch" data-column="2" id="nameSearch"  placeholder="Name.." />
                                            </div>
                                             <div class="form-group divaccount" style="display:none;">
                                                <label class="form-control-label col-form-label-sm">Account No.</label>
                                                <input type="text" class="input-sm form-control search-input-text accountSearch" data-column="3" id="accountSearch"  placeholder="Account Number.." />
                                            </div>
                                        </div>


                                        <div class="col-lg col-12" style="padding-left: 0">
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-primary searchBtn">Search</button>
                                            </div>
                                        </div>

                                   <!--  <div class="form-group-material">
                                        <label class="form-control-label col-form-label-sm">ID No.</label> 
                                        <input type="text" class="input-sm form-control material_josh idnosearch"  name="idnosearch">
                                    </div>

                                    <div class="form-group-material" style="padding-left:10px;">
                                        <label class="form-control-label col-form-label-sm">Name</label> 
                                        <input type="text" class="input-sm form-control material_josh namesearch"  name="namesearch">
                                    </div>                                

                                    <div class="form-group-material" style="padding-left:10px;">
                                        <label class="form-control-label col-form-label-sm">Credit Term</label>
                                        
                                        <select class="form-control col-md-12 creditterm" name="creditterm" id="creditterm">
                                            <option selected value="">All</option>
                                            <?php  foreach ($get_creditterm as $value):?>
                                            <option value="<?php echo $value->id?>"><?php echo($value->description)?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                                                    
                                    <div class="form-group-material col-md-4" style="padding-left:10px;">
                                        <label class="form-control-label col-form-label-sm">Branch</label>
                                        <br>
                                        <select class="form-control col-md-12 select2 branch" name="branch" id="branch">
                                            <option selected value="">All</option>
                                            <?php foreach ($get_branchname as $value):?>
                                            <option value="<?php echo $value['branchname']?>"><?php echo($value['branchname'])?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div> -->

                                </div>                                                        

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                

                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="100">ID No.</th>
                                            <th width="100">Account No.</th>
                                            <th width="500">Name</th>
                                            <th width="350">Branch</th>
                                            <th width="130">Credit Term</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>                            

                        </div> <!-- card body -->
                    </div> <!-- card -->
                </div> <!-- col 12 -->                
            </div>
        </div>
    </section>



<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/entity/customer/customer_soa.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->