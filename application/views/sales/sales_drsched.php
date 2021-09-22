<style>
div#table-grid-edit_filter {
    display: none;
}
</style>
<div class="content-inner contento" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Transaction History"> 
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Delivery Receipt Reschedule</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item"><a href="<?=base_url('Main/home/'.$token);?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('Main_sales/sales_home/'.$token);?>">Sales</a></li>
        <li class="breadcrumb-item active">Delivery Receipt Reschedule</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-lg-12">
                                    <div class="row">

                                         <div class="col-lg-4">
                                            <div class="form-group" >
                                             <select class="form-control select2" name="sosearchfilter" id="sosearchfilter">
                                                 <option value="drnodiv">Search by DR No.</option>
                                            </select>
                                            </div>
                                        </div>

                                         <div class="col-lg-4">
                                             <div class="form-group drnodiv" style="display:none;">
                                                <input type="text" class="input-sm form-control search-input-text" data-column="2" id="drno" onkeypress="return isNumberKeyOnly(event)" placeholder="DR Number.." onkeypress="return isNumberKeyOnly(event)"/>
                                            </div>
                                        </div>

                                          <div class="col-lg-4"> 

                                             <div class="form-group soSearchdiv" style="display:none;">
                                                <button type="button" style="float:left; margin-left:0px;" class="btn btn-default btn-primary btnSearchSO" id="btnSearchSO">Search</button>
                                             </div>     
                                           
                                            <div class="form-group" >
                           
                                            </div>     

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <table class="table table-striped table-hover"> -->
                            <div class="table-responsive">
                                <table  class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>DR No.</th>
                                            <th>Name</th>
                                            <th>Shipping</th>
                                            <th>Payment Status</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <div id="DRschedModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="exampleModalLabel" class="modal-title">Delivery Receipt Reschedule</h4>
            </div>
                <div class="modal-body">
                    <div class="">
                        <div class="col-lg-10">
                                <div class="row">

                                       <input type="" id="drno_value" hidden>
                                       <input type="" id="date_value" hidden>  


                                       <h3><label class="col-md-12 form-control-label" id="info_fullname" type="text"></label></h3>
                                       <br>
                                       <label class="col-md-12 form-control-label" id="info_drno" type="text"></label>
                                       <br>
                                       
                                       <label class="col-md-12 form-control-label" id="info_date" type="text"></label>
                                      
                                       <br>
                                       <label class="col-md-12 form-control-label" id="" type="text">Reschedule Date:</label>
                                       <div class="input-daterange input-group col-md-6" id="datepicker">
                                                <input type="text" class="input-sm form-control search-input-date" id="newdate" data-column="0" value="" readonly />
                                       </div>
                                       

                                 </div> 
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group row">
                            <button type="button" style="float:right; margin-right:15px;" class="btn btn-primary btnReschedule">Reschedule</button>
                            <button type="button" style="float:right; margin-right:15px;" class="btn btn-default idcancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?=base_url('assets/js/sales/sales_drsched.js');?>"></script>
