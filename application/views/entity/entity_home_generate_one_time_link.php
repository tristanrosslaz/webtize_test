
<div class="content-inner" id="pageActive" data-num="5" data-namecollapse="" data-labelname="Entity">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/entity_home/'.$token);?>">Entity</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_entity/applicant/'.$token);?>">Applicant</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Send Franchisee Info Sheet One Time Link</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <form action="post" id='send_otl' style="width:60%">
                            	<div class="col-md-12">
									<div class="row row-reg">

								        <div class="col-md-3 d-flex align-items-center">
                                            <label class="form-label">Applicant Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input class="form-control form-control-sm" type="email" name="app_email" id="app_email" placeholder="sample@email.com">
                                            </div>
                                        </div>		
                                        <div class="form-group col-md-12">
                                        </div>
										<div class="col-md-12">	
											<button id='btnSend' class="btn btn-primary btnSend" style="float: right; margin-left: 7px;">Send Link</button>
										</div>
									</div>
								</div>	
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </di v>
    </section>
    <br><br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>
<script src="<?=base_url('assets/js/entity/generate_one_time_link.js');?>"></script>
