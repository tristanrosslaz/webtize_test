
<div class="content-inner" id="pageActive" data-num="8" data-namecollapse="#ticket-collapse">
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h6 class="secondary-bg px-4 py-3 white-text">Test Results</h6>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group p-style">
                                        <div class="row">
                                            <div class="col-md-12"><h3><?=$project_name;?></h3></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">Executed on: </div>
                                            <div class="col-md-8"><h4><?=date('d M y h:i:s');?></h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">Executed by: </div>
                                            <div class="col-md-8"><h4><?=$this->session->userdata('username');?></h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">Memory Usage: </div>
                                            <div class="col-md-8"><h4><?=$memory_usage;?></h4></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <?=$result;?>
                            </div>

                            <div class="form-group row" style="margin-top: 10px;">       
                                <div class="col-md-12">
                                    <button style="float:right"  class="btn btn-primary printBtn"> Print Test Result</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->