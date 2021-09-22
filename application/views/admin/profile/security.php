<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="1" data-namecollapse="#profile-collapse-a" data-labelname="Security">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Security</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item active">Profile</li>
        <li class="breadcrumb-item active">Security</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <p>Make sure you choose a strong password.</p>
                            <form class="form-horizontal security-css" id="saveChangePassForm">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group-material">
                                            <input id="sec-oldpass" type="password" name="secOldpass" required="" class="input-material secOldpass">
                                            <label for="sec-oldpass" class="label-material">Old Password</label>
                                        </div>
                                        <div class="form-group-material">
                                            <input id="sec-newpass" type="password" name="secNewpass" required="" class="input-material secNewpass">
                                            <label for="sec-newpass" class="label-material">New Password</label>
                                        </div>
                                        <div class="form-group-material">
                                            <input id="sec-retypenewpass" type="password" name="secRetypenewpass" required="" class="input-material secRetypenewpass">
                                            <label for="sec-retypenewpass" class="label-material">Re-type New Password</label>
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

<script src="<?=base_url('assets/js/admin/profile/admin_security.js');?>"></script>

