<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="99" data-namecollapse="#profile-collapse-a" data-labelname="Change Password">
    <div class="bc-icons-2 card mb-4">
        <ol class="breadcrumb mb-0 primary-bg px-4 py-3">
            <!-- <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/home/'.$token); ?>">Home</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li> -->
            <li class="breadcrumb-item"><a class="white-text" href="<?=base_url('Main_page/display_page/profile_settings_home/'.$token);?>">Profile Settings</a><i class="fa fa-chevron-right mx-2 white-text" aria-hidden="true"></i></li>
            <li class="breadcrumb-item active">Change Password</li>
        </ol>
    </div>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <!-- <p>Make sure you choose a strong password.</p> -->
                            <form class="form-horizontal security-css" id="saveChangePassForm">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="label-material">Old Password <span class="asterisk"></span></label>
                                            <input id="sec-oldpass" type="password" name="secOldpass" required="" class="form-control secOldpass" autocomplete="new-password">
                                        </div>

                                        <div class="form-group">
                                            <label class="label-material">New Password <span class="asterisk"></span></label>
                                            <input id="sec-newpass" type="password" name="secNewpass" required="" class="form-control secNewpass" autocomplete="new-password">
                                        </div>

                                        <div class="form-group">
                                            <label class="label-material">Re-type New Password <span class="asterisk"></span></label>
                                            <input id="sec-retypenewpass" type="password" name="secRetypenewpass" required="" class="form-control secRetypenewpass" autocomplete="new-password">
                                        </div>

                                        <div class="form-group row">       
                                            <div class="col-md-12">
                                                <button disabled style="float:right" class="btn btn-success saveChangePassBtn">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- add a br to eliminate whitespaces in the bottom -->
    <br><br><br><br><br><br><br><br><br>

<?php $this->load->view('includes/footer'); ?>

<script src="<?=base_url('assets/js/profile_settings/change_pass.js');?>"></script>

