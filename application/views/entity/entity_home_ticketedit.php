<style type="text/css">.datepicker {
    z-index:2 !important;
    }</style>

<style> 
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
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/entity_ticketlist/'.$token); ?>">Customer Ticket Transaction History</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Customer Ticket Update</li>
        </ol>
    </div>

    <section class="tables interface1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12 center_margin">
                    <div class="col-lg-12">     
                        <form id="updateTicket">
                        <div class="col-md-12 margin-top-20">

                            <div id="collectdiv" class="col-md-12 form-collect card" style="background-color: #fff !important; padding: 0;">
                                                <h6 class="px-4 py-3 primary-bg white-text">Ticket Information</h6>
                                <div class="p-4">


                                            <!-- TICKET DETAILS -->
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-4">Ticket Details</label>
                                                <textarea class="form-control txtarea txtareaticketdetails" rows="8" placeholder="Details" id="txtareaticketdetails" readonly="readonly" style="resize: none;"><?php echo $ticket ?></textarea>
                                            </div>
                                  
                                			<!--NAME -->
                                            <div class="form-group row"">
                                                <label class="form-control-label col-md-12">Name</label> 
                                                <input type="text" class="input-sm form-control material_josh name" name="name" disabled value="<?php echo $name ?>">
                                                <input type="hidden" class="input-sm form-control material_josh ticketid" name="ticketid" disabled value="<?php echo $ticketid ?>">
                                                <input type="hidden" class="input-sm form-control material_josh idno" name="idno" disabled value="<?php echo $ticketdetails[0]['idno'] ?>">
                                            </div>

                                            <!-- DATE -->    
                                            <div class="form-group row">
                                                <label class="form-control-label col-md-12">Date<span class="" style="color:red">*</span></label>
                                                <input type="text" class="form-control required_fields col-md-12 form-control-success trandate datepicker" name="trandate" id="trandate" value="<?=today_text()?>" placeholder="mm/dd/yyyy">
                                            </div>                                                                                                                                                                				
                                            <!-- SELECT STATUS -->
                                			<div class="form-group row">
                                    			<label class="form-control-label col-md-12">Status<span class="" style="color:red">*</span></label>
                                    				<select class="form-control required_fields col-md-12 status" name="status" id="status">  
                                        				<?php foreach ($get_status as $value):?>
                                        				<option value="<?php echo $value['id']?>"><?php echo($value['description'])?></option>
                                         				<?php endforeach;?>
                                    				</select>     
                                			</div>

                                			<!-- DETAILS -->
                                			<div class="form-group row">
                                				<label class="form-control-label col-md-4">Resolution<span class="" style="color:red">*</span></label>
                                				<textarea class="form-control txtarea txtareadetailsresolution required_fields" style="resize: none;" rows="8" placeholder="Ticket details.." id="txtareadetailsresolution"></textarea>
											</div>

                                            <div class="form-group row float-right">
                                                <button id="BtnSaveCollection " class="btn btn-primary float-right updatedBtn m-0"> Update Customer Ticket </button> 
                                            </div>

                                            <input type="text" class="form-control form-control-sm" id="token" name="token"  value="<?php echo $token ?>" hidden>
                                        
                                        </div> <!-- padding 20 -->        
                            		</form>
                        	</div>
                        </div><!-- card body -->
                    </div><!-- card -->
				</div> <!-- col 12 -->
			</div>
          </div>
       </div> 
    </section>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
<!-- footer -->

<!-- javascript -->
<script src="<?=base_url('assets/js/entity/customer/customer_ticketedit.js');?>"></script>
<!-- javascript -->

<!-- ramdc -->