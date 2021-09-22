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
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Franchise Payment Record Transaction History</li>
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-12">
                                        <div class="form-group dividno" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">ID No.</label>
                                            <input type="text" class="input-sm form-control search-input-text idnosearch" data-column="1" id="idnosearch" onkeypress="return isNumberKeyOnly(event)" placeholder="ID No.." />
                                        </div>

                                        <div class="form-group divname" style="display:none;">
                                            <label class="form-control-label col-form-label-sm">Name</label>
                                            <input type="text" class="input-sm form-control search-input-text nameSearch" data-column="2" id="nameSearch"  placeholder="Name.." />
                                        </div>
                                    </div>
                                    <div class="col-lg col-12" style="padding-left: 0">
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-primary searchBtn">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                

                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="50">ID No.</th>
                                            <th width="500">Name</th>
                                            <th width="120">Payment Type</th>
                                            <th width="120">Payment For</th>
                                            <th>Payment Date</th>
                                            <th width="100">Ref No.</th>
                                            <th>Amount</th>
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

    <div id="viewFranchise" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewTicket">
        <div role="document" class="modal-dialog modal-md modal-md-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="lblid"></h2>
                    <!-- <h2 class="lbltrandate lighter"></h2> -->
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">

                                <div class="row col-lg-12">
                                    <div class="row col-lg-12">
                                        <label style="color: gray; font-weight: lighter;">Information</label>
                                    </div>

                                    <div class="row col-lg-12">
                                        <h3 class="h3customerName"></h3>
                                    </div>

                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div>
                                                <label>Date: </label>
                                                <br>
                                                <label>Reference No.: </label>
                                                <br>
                                                <label>Mode of Payment: </label>
                                                <br>
                                                <label>Payment for: </label>
                                            </div>
                                            
                                            <span style="margin: 3%;"></span>

                                            <div>
                                                <label class="lbltrandate"></label>   
                                                <br>
                                                <label class="lblReference"></label>   
                                                <br>
                                                <label class="lblMode"></label>   
                                                <br>
                                                <label class="lblFor"></label>
                                            </div>
                                        </div>

                                    </div>


                                </div> 

                                <table class="table  table-striped table-hover table-bordered" id="table-grid2"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID No.</th>
                                            <th>Payment Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                </table>                                                                                 
                                <br>
                                <div class="row col-lg-12 margin-top-20">
                                    <label style="color: gray; font-weight: lighter;">Notes:</label>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div>
                                            <p class="parDetails"></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <div class="form-group row float-right">       
                                        <button type="button" class="btn btn-default cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                        <span style="margin: 5px;"></span>
                                        <button type="button" class="btn btn-info printBtn"><i class="fa fa-print"></i> Print Payment</button>
                                    </div>
                                </div> <!-- modal footer -->
                                
                            </div> <!-- card body -->   
                        </div>
                    </div>
                </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewIngredientlistModal -->

    <section class="tables printArea printArea-position">
        <div class="container-fluid">
            <div class="row">        
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="col-md-12 margin-top-20 row">
                                
                                <div class="form-group col-md-12 row">

                                    <div class="col-md-12" style="margin-bottom: 20px;">
                                        <h1>Franchise Information</h1>
                                    </div>

                                    <div class="col-md-12" style="margin-bottom: 20px;">
                                        <h1 class="lblid float-right"></h1>
                                        <br><br>
                                        <h2 class="lbltrandate lighter float-right"></h2>
                                    </div>

                                    <div class="row col-lg-12 margin-top-20">
                                        <h1 class="h3customerName" style="color: gray; font-weight: lighter;"></h1>
                                    </div>                                        
                                    
                                    <div class="col-md-12 margin-top-20">
                                        <div class="row">
                                            <div>
                                                <label>Reference No.: </label>
                                                <br>
                                                <label>Mode of Payment: </label>
                                                <br>
                                                <label>Payment for: </label>
                                            </div>
                                            
                                            <span style="margin: 3%;"></span>

                                            <div>
                                                <label class="lblReference"></label>   
                                                <br>
                                                <label class="lblMode"></label>   
                                                <br>
                                                <label class="lblFor"></label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>                                                        

                        <div class="card-body">
                            
                            <table class="table  table-striped table-hover table-bordered" id="table-grid3"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>Payment Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                            </table>

                            <div class="row col-lg-12 margin-top-20">
                                <label style="color: gray; font-weight: lighter;">Notes</label>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div>
                                        <p class="parDetails"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- print -->    
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
    <script src="<?=base_url('assets/js/entity/franchise_payment_record/franchise_list.js');?>"></script>
    <!-- javascript -->

<!-- ramdc -->