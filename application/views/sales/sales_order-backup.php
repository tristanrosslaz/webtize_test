<!-- 
data-num = for numbering of navigation
data-namecollapse = is for collapsible navigation
data-labelname = label name of this file in navigation
 -->
<div class="content-inner" id="pageActive" data-num="2" data-namecollapse="" data-labelname="Sales">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Sales</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
        <!-- <li class="breadcrumb-item"><a href="index.html">Reports</a></li> -->
        <!-- <li class="breadcrumb-item active">Tables</li> -->
        </div>
    </ul>
    <section class="tables">   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Sales Order</h3>
                        </div>
                        <div class="card-body">
                           
                                <div class="col-sm-6">
                                     <form name="demoForm" >
                                    <select class="form-control select2" name="demoSelect" onchange="showData()">
                                        <option selected>Select Customer</option>
                                            <?php
                                            foreach ($get_membermain->result() as $gmembermain) { 
                                                $name =  $gmembermain->lname . ", " . $gmembermain->fname . " " . $gmembermain->mname . " - " . $gmembermain->branchname;?>
                                                    
                                                    <option value="<?=$gmembermain->member_id?>"><?=$name?></option>
                                            <?php } ?>
                                            ?>
                                            
                                        </select>


                                    </form>
                              

<!--     <p id="firstP">&nbsp;</p>
    <p id="secondP">&nbsp;</p>
    <p id="thirdP">&nbsp;</p>


    
 -->
  <br />
                               
                                    <div class="form-group">
                                    <label class="form-control-label">Deliver Information <span hidden class="asterisk" style="color:red">*</span></label>
                                    <div class="">
                                        <input id="inputHorizontalWarning" type="text" class="form-control form-control-warning datepicker" value="" />
    
                                      </div>
                                  </div>

                                  <div class="form-group">
                                   <select class="form-control select2" name="demoSelect" onchange="showData()">
                                        <option selected>Select Customer</option>
                                            <?php
                                            foreach ($get_membermain->result() as $gmembermain) { 
                                                $name =  $gmembermain->lname . ", " . $gmembermain->fname . " " . $gmembermain->mname . " - " . $gmembermain->branchname;?>
                                                    
                                                    <option value="<?=$gmembermain->idno?>"><?=$name?></option>
                                            <?php } ?>
                                            ?>
                                            
                                        </select>

                                    </div>
                                    <div class="form-group">
                                   <select class="form-control select2" name="demoSelect" onchange="showData()">
                                        <option selected>Select Customer</option>
                                            <?php
                                            foreach ($get_membermain->result() as $gmembermain) { 
                                                $name =  $gmembermain->lname . ", " . $gmembermain->fname . " " . $gmembermain->mname . " - " . $gmembermain->branchname;?>
                                                    
                                                    <option value="<?=$gmembermain->idno?>"><?=$name?></option>
                                            <?php } ?>
                                            ?>
                                            
                                        </select>

                                    </div>
    </section>
    <br /><br><br>
    <script>
    function showData() {
        var theSelect = demoForm.demoSelect;
        var firstP = document.getElementById('firstP');
        var secondP = document.getElementById('secondP');
        var thirdP = document.getElementById('thirdP');
        firstP.innerHTML = ('Contact No. : ' + theSelect.selectedIndex + <?=$gmembermain->conno?>);
        secondP.innerHTML = ('Its value is: ' + theSelect.selectedIndex + <?=$gmembermain->termcredit?>);
        thirdP.innerHTML = ('Its text is: ' + theSelect.selectedIndex + <?=$gmembermain->conno?>);
    }
    </script>
<?php $this->load->view('includes/footer'); ?>
