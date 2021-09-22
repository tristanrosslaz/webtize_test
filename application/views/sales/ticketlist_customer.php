<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="#ticket-collapse" data-labelname="Sales"> 
    <!-- Page Header-->


    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_sales/sales_home/'.$token);?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Hold Customer Ticket</li>
        </ol>
    </div>




    
    <section class="tables" id = "sono_id_sec" class="sono_id_sec" name = "sono_id_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover table-bordered" id="table-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Ticket#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Created by</th>
                                            <th width="80">Action</th>

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
<?php $this->load->view('includes/footer'); ?>