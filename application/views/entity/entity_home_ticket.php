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
  </style>
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Customer Ticket</li>
        </ol>
    </div>
    <section class="tables interface1">
        <div class="container-fluid">
            <div class="row">
                   <div class="col-lg-12 col-sm-12">
                          <div class="col-lg-12">  

                            			  <div id="collectdiv" class="col-md-6 form-collect card" style="background-color: #fff !important; padding: 0;">
                                                    <h6 class="px-4 py-3 primary-bg white-text">Customer Ticket Information</h6>
                                            <div class="p-4">


                            			    <!-- DATE -->    
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Date<span class="" style="color:red">*</span></label>
                                    			<input type="text" class="form-control required_fields col-md-8 form-control-success trandate datepicker" name="trandate" id="trandate"  placeholder="mm/dd/yyyy" readonly="true">
                                			</div>
                                  
                                			<!-- SELECT NAME -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Name<span class="" style="color:red">*</span></label>
                                                <select class="form-control col-md-8 required_fields customerList select2" name="customerList" id="customerList" style="display: none;">
                                                    <option value="none">Select Customer</option>
                                                        <?php foreach ($get_customer as $value):?>
                                                            <option value="<?php echo $value['idno']?>"><?php echo concatenate_name($value['fname'], $value['mname'], $value['lname'], $value['branchname']); ?></option>
                                                        <?php endforeach;?>
                                                </select>
                                			</div>
                                            
                                            <!-- SELECT NAME -->
                                            <div class="form-group row">

                                            </div>                                    

                                			<!-- SELECT TYPE -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Ticket Type<span class="" style="color:red">*</span></label>
                                    			<select class="form-control required_fields col-md-8 type" name="type" id="type">
                                                    <option  value="none">Select Type</option>
                                                    <option  value="Billings">Billings</option>
                                                    <option  value="Deliveries">Deliveries</option>
                                                    <option  value="Equipments">Equipments</option>
                                                    <option  value="General">General</option>
                                                    <option  value="Orders">Orders</option>
                                                    <option  value="Others">Others</option>
                                                    <option  value="Personnel">Personnel</option>
                                                    <option  value="Products">Products</option>
                                    			</select>
                                			</div>                                                                                             
                                				
                                            <!-- SELECT STATUS -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-4">Ticket Status<span class="" style="color:red">*</span></label>
                                    				<select class="form-control required_fields col-md-8 status" name="status" id="status">  
                                                        <option value="none">Select Status</option>
                                        				<?php foreach ($get_status as $value):?>
                                        				<option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                         				<?php endforeach;?>
                                    				</select>     
                                			</div>

                                			<!-- DETAILS -->
                                			<div class="form-group row">
                                				<label class="form-control-label col-md-4">Details</label>
                                				<textarea class="form-control col-md-8 txtarea txtareadetails" rows="8" style="resize: none;" placeholder="Details" id="txtareadetails"></textarea>
											</div>

                                            <div class="form-group row float-right">
                                                <button id="BtnSaveCollection " class="btn btn-primary float-right savedBtn m-0"> Save Customer Ticket </button> 
                                            </div>


                                        
                                        </div> <!-- padding 20 -->        
                            		<!-- </form> -->
                        		</div> <!-- interface1 -->
                        
                        </div><!-- card body -->
				</div> <!-- col 12 -->
			</div>
    </section>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/entity/customer/customer_ticket.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->