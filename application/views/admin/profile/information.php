<!-- change the data-num and data-subnum for numbering of navigation -->
<div class="content-inner" id="pageActive" data-num="1" data-namecollapse="#profile-collapse-a" data-labelname="Personal Info">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Personal Information</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <li class="breadcrumb-item active">Profile</li>
        <li class="breadcrumb-item active">Personal Info</li>
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal personal-info-css" id="personalinfo-form">
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Fullname <span hidden class="asterisk" style="color:red">*</span></label>
                                    <div class="col-md-4">
                                        <input disabled id="inputHorizontalSuccess" type="text" class="form-control form-control-success" value="<?=$admin_info->admin_first_name?>" name="info_fname"><small class="form-text">First Name <span hidden class="asterisk" style="color:red">*</span></small>
                                    </div>
                                    <div class="col-md-3">
                                        <input disabled id="inputHorizontalSuccess" type="text" class="form-control form-control-success" value="<?=$admin_info->admin_middle_name?>" name="info_mname"><small class="form-text">Middle Name</small>
                                    </div>
                                    <div class="col-md-3">
                                        <input disabled id="inputHorizontalSuccess" type="text" class="form-control form-control-success" value="<?=$admin_info->admin_last_name?>" name="info_lname"><small class="form-text">Last Name <span hidden class="asterisk" style="color:red">*</span></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Birthdate <span hidden class="asterisk" style="color:red">*</span></label>
                                    <div class="col-md-4">
                                        <input disabled id="inputHorizontalWarning" type="text" class="form-control form-control-warning datepicker" value="<?= date_format(date_create($admin_info->admin_birthdate),"m/d/Y")?>" name="info_bdate">
                                    </div>

                                    <label class="col-md-2 form-control-label">Contact No. <span hidden class="asterisk" style="color:red">*</span></label>
                                    <div class="col-md-4">
                                        <input disabled id="inputHorizontalWarning" type="text" class="form-control form-control-warning" value="<?=$admin_info->admin_contact_num?>" name="info_contact_num">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Address <span hidden class="asterisk" style="color:red">*</span></label>
                                    <div class="col-md-10">
                                        <input disabled id="inputHorizontalWarning" type="text" class="form-control form-control-warning" value="<?=$admin_info->admin_address?>" name="info_address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Country <span hidden class="asterisk" style="color:red">*</span></label>
                                    <div class="col-md-4">
                                        <select disabled class="form-control select2" name="info_country">
                                            <?php
                                            foreach ($get_country->result() as $gcountry) { ?>
                                                <?php if($gcountry->country_id == $admin_info->admin_country_id){ ?>
                                                    <option selected value="<?=$gcountry->country_id?>"><?=$gcountry->country?></option>
                                                <?php }else{ ?>
                                                    <option value="<?=$gcountry->country_id?>"><?=$gcountry->country?></option>
                                            <?php } } ?>
                                            ?>
                                            
                                        </select>
                                    </div>

                                    <label class="col-md-2 form-control-label">City <span hidden class="asterisk" style="color:red">*</span></label>
                                    <div class="col-md-4">
                                        <select disabled class="form-control select2" name="info_city">
                                            <?php
                                            foreach ($get_city->result() as $gcity) { ?>
                                                <?php if($gcity->city_id == $admin_info->admin_city_id){ ?>
                                                    <option selected value="<?=$gcity->city_id?>"><?=$gcity->city?></option>
                                                <?php }else{ ?>
                                                    <option value="<?=$gcity->city_id?>"><?=$gcity->city?></option>
                                            <?php } } ?>
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Male = 1 & Female = 2 -->
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Gender <span hidden class="asterisk" style="color:red">*</span></label>
                                    <?php if($admin_info->admin_gender_id == 1){ //male?> 
                                    <div class="col-md-2">
                                        <div class="i-checks martop12">
                                            <input disabled id="register-gendermale" type="radio" value="1" name="info_gender" class="radio-template" checked="">
                                            <label for="register-gendermale">Male</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="i-checks martop12">
                                            <input disabled id="register-genderfemale" type="radio" value="2" name="info_gender" class="radio-template">
                                            <label for="register-genderfemale">Female</label>
                                        </div>
                                    </div>
                                    <?php }else{?>

                                    <div class="col-md-2">
                                        <div class="i-checks martop12">
                                            <input disabled id="register-gendermale" type="radio" value="1" name="info_gender" class="radio-template">
                                            <label for="register-gendermale">Male</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="i-checks martop12">
                                            <input disabled id="register-genderfemale" type="radio" value="2" name="info_gender" class="radio-template" checked="">
                                            <label for="register-genderfemale">Female</label>
                                        </div>
                                    </div>

                                    <?php } ?>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Email</label>
                                    <div class="col-md-6">
                                        <!-- tinanggal ko muna sa editable  remove ung "_2" if isasama-->
                                        <input disabled id="inputHorizontalWarning" type="text" class="form-control form-control-warning emailAdd" value="<?=$admin_info->admin_email?>" name="info_emailaddress_2">
                                    </div>
                                </div>


                                <div class="form-group row">       
                                    <div class="col-md-12">
                                        <input type="submit" style="float:right" value="Update" class="btn btn-primary">
                                        <button hidden type="button" style="float:right" class="btn btn-success saveEditBtn ">Save</button>
                                        <button hidden type="button" style="float:right; margin-right:10px;" class="btn btn-danger cancelEditBtn">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- add a br to eliminate whitespaces in the bottom -->
    <br><br><br><br><br>
<?php $this->load->view('includes/footer'); ?>

<script src="<?=base_url('assets/js/admin/profile/admin_information.js');?>"></script>
