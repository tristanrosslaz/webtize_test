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

  .datepicker {
     z-index: 2 !important; 
    }

    /* Extra Small Devices, Phones */ 
    @media only screen and (min-width : 480px) {
        .select2 {
            width: calc(100%) !important;
            margin-left: 0;
        }

         .col-md-6.form-collect{
            margin: auto !important;
            width: 50% !important;     
            background-color: #f5f5f5 !important;   
            padding: 0 !important; 
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05) !important;
        } 

        span.select2.select2-container.select2-container--default {
            width: 100% !important;
        }
    }

    /* Small Devices, Tablets */
    @media only screen and (min-width : 768px) {
        
        .select2 {
            width: calc(74% - 43px) !important;
            margin-left: 0;
        }

        span.select2.select2-container.select2-container--default {
            width: 66% !important;
        }
    }

    span.small.col-md-8 {
        padding-left: 0;
    }

    button#ADDFILE {
        margin: 0px 10px 10px 0;
    }

    strong.col-md-4 {
        padding-left: 0;
        padding-right: 0;
    }
</style>

<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/support_home/'.$token);?>">Support</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Contact Support</li>
        </ol>
    </div>
    <section class="tables interface1">
        <div class="container-fluid">
            <div class="row">
                   <div class="col-lg-12 col-sm-12">
                          <div class="col-lg-12">  
                            <form action="post" id='contact_form'>
                        			  <div id="collectdiv" class="col-md-6 form-collect card" style="background-color: #fff !important; padding: 0;">
                                                <h6 class="px-4 py-3 primary-bg white-text">User Ticket Information</h6>
                                        <div class="p-4">

                                        <div class="form-group row">
                                            <label class="form-control-label col-md-4">Submodule<span class="" style="color:red">*</span></label>
                                            <select class="form-control col-md-8 required_fields submodule select2" name="submodule" id="submodule">
                                                <option value="none">Select Model</option>
                                                    <?php foreach ($get_submodule->result() as $value){ ?>
                                                        <option value="<?php echo $value->id?>"><?php echo $value->cn_name; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div> 

                                        <div class="form-group row">
    
                                            <label class="form-control-label col-md-4">Document<span class="asterisk"></span></label>

                                            <div class="col-md-8 pl-0">
                                                <button id='ADDFILE' class="btn btn-primary"><i class="fa fa-plus-circle fa-lg"></i></button>
                                            </div>

                                            <div class="col-md-4"></div>

                                            <div class="col-md-8 uploadFileContainer row">
                                                <div class="alert alert-info">
                                                    <strong class="col-md-4">Upload file</strong><input type="file" name="images[]" class="document col-md-8">
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-4"></div>

                                            <span class="small col-md-8">Note: You can only upload jpg or png file. You can upload 5 images.</span><span class="asterisk"></span>
                                        </div>  
                                        

                                        <div class="form-group row">
                                            <label class="form-control-label col-md-4 asterisk">Details</label>
                                            <textarea class="form-control col-md-8 txtarea details" rows="8" style="resize: none;" name="details" placeholder="Details" id="details"></textarea>
                                        </div>                                                                                     
                                        <div class="form-group row float-right">
                                            <button id="BtnSave" class="btn btn-primary float-right BtnSave m-0"> Save User Ticket </button> 
                                        </div>
                                    </div> <!-- padding 20 -->        
                        		<!-- </form> -->
                    		</div> <!-- interface1 -->
                            </form>
                        </div><!-- card body -->
				</div> <!-- col 12 -->
			</div>
    </section>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/support/contact_support.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->