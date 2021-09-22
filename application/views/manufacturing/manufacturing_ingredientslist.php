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
<div class="content-inner" id="pageActive" data-num="6" data-namecollapse="" data-labelname="Manufacturing">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/manufacturing_home/'.$token);?>">Manufacturing</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Ingredients Addition Transaction History</li>
        </ol>
    </div>

    <section class="tables">   
        <div class="container-fluid">
            <div class="row">        
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex">
                            <div class="col-md-12 row">

                                <div class="form-group-material" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Search Filter</label>
                                    <select class="form-control col-md-12 divsearchfilter" name="divsearchfilter" id="divsearchfilter">
                                        <option selected value="1">Search by Date</option>
                                        <option value="2">Search by Ref No.</option>
                                    </select>
                                </div>

                                <div>
                                
                                <div class="form-group-material divdate" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Date</label>

                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" data-column="0" class="input-sm form-control material_josh search-input-select1" value="<?=today_text()?>" name="start" />
                                        <span class="input-group-addon" style="background-color:#fff0; border:none; margin: 5px;">to</span>
                                        <input type="text" data-column="1" class="input-sm form-control material_josh search-input-select2"  value="<?=today_text()?>" name="end" />
                                    </div>
                                </div>

                                <div class="form-group-material divlocation" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Build Location</label>
                                    
                                    <select class="form-control col-md-6 buildLocation" name="buildLocation" id="buildLocation" data-column="4">
                                        <option selected value="">All</option>
                                        <?php foreach ($get_location as $value):?>
                                        <option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                                </div>  

                                <div class="form-group-material divrefno" style="padding-left:10px;display: none">
                                    <label class="form-control-label col-form-label-sm">Ref. No.</label> 
                                    <input type="text" data-column="2" class="input-sm form-control material_josh refnosearch"  name="refnosearch" placeholder="Ref No..">
                                </div>

                                <div class="form-group-material divlocation" style="padding-left:10px;">
                                    <label class="form-control-label col-form-label-sm">Ingredients Location</label>
                                    
                                    <select class="form-control col-md-12 ingLocation" name="ingLocation" id="ingLocation" data-column="3">
                                        <option selected value="">All</option>
                                        <?php foreach ($get_location as $value):?>
                                        <option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>                                                         

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="form-group-material float-right" style="right:20px; position: absolute; top:20px;">
                                    <button type="button" class="btn btn-primary searchBtn">Search</button>
                                </div>

                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Preperation Date</th>
                                            <th>Build Date</th>
                                            <th>Ref. No.</th>
                                            <th>Ingredients Location</th>
                                            <th>Build Location</th>
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

    <div id="viewIngredientlistModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left" name="viewIngredientlistModal">
        <div role="document" class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="lblAddno"></h1>
                    <h2 class="lblPrep lighter"></h2>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">

                                    <div class="row col-lg-12">
                                        <div class="row col-lg-12">
                                            <label style="color: gray; font-weight: lighter;">Ingredients Addition Build Information</label>
                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Preperation Date: </label>
                                                    <br>
                                                    <label>Build Date: </label>
                                                    <br>
                                                    <label>Ingredients Location: </label>
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblprepDate"></label>   
                                                    <br>
                                                    <label class="lblbuildDate"></label>   
                                                    <br>
                                                    <label class="lblingLocation"></label>   
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="row">
                                                <div>
                                                    <label>Build Location: </label>
                                                    <br>
                                                    <label>Encoded By: </label> 
                                                </div>
                                    
                                                <span style="margin: 3%;"></span>

                                                <div>
                                                    <label class="lblbuildLocation"></label>
                                                    <br>
                                                    <label class="lblencoder"></label> 
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="table-responsive margin-top-20">
                                        <table class="table  table-striped table-hover table-bordered" id="table-ingredients-view"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Qty</th>
                                                    <th>Unit</th>
                                                    </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <br>
                                    <!-- NOTES -->
                                    <div class="form-group">
                                        <label class="form-control-label col-md-12">Notes</label>
                                        <textarea class="form-control txtarea" rows="3" placeholder="Notes" style="resize: none;" readonly="readonly" id="notes"></textarea>
                                    </div>                                                                                       

                                    <div class="modal-footer">
                                        <div class="form-group row float-right">       
                                            <button type="button" class="btn blue-grey cancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                                            <span style="margin: 5px;"></span>
                                            <button type="button" class="btn btn-primary printWin">Print</button>
                                        </div>
                                    </div> <!-- modal footer -->
                                
                                </div> <!-- card body -->   
                            </div>
                        </div>
                    </div> <!-- modal body -->
            </div> <!-- modal content -->
        </div>
    </div> <!-- viewIngredientlistModal -->
<!-- </div> -->

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/manufacturing/ingredients addition/manufacturing_ingredientslist.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->