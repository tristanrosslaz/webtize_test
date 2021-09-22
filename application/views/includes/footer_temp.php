                <!-- Page Footer-->
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
    </main>
                <footer class="main-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <p><?php echo company_initial($this->session->userdata('company_id')); ?> | <?php echo company_name($this->session->userdata('company_id')); ?> &copy; <?php echo year_only(); ?></p>
                            </div>
                            <div class="col-sm-6">
                                <p><?=powered_by();?></p>
                            </div>
                        </div>
                    </div>
                </footer>
<!-- Javascript files-->
<script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.js');?>"></script>
<script src="<?=base_url('assets/js/tether.min.js');?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?=base_url('assets/js/mdb.min.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.cookie.js');?>"> </script>
<script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.dataTables.js');?>"></script>
<!-- <script src="<?=base_url('assets/js/datatables.min.js');?>"></script> -->
<script src="<?=base_url('assets/js/select2.min.js');?>"></script>
<script src="<?=base_url('assets/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?=base_url('assets/js/accounting.min.js');?>"></script>
<script src="<?=base_url('assets/js/moment.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.easy-autocomplete.min.js');?>"></script>
<!-- custom script for your overall script -->
<script src="<?=base_url('assets/js/custom.js');?>"></script>
<script src="<?=base_url('assets/js/loadingoverlay.js');?>"></script>
<!-- uncomment this if you need charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="js/charts-home.js"></script> -->
<!-- uncomment this if you need charts -->
<script src="<?=base_url('assets/js/front.js');?>"></script>
<script src="<?= base_url('assets/js/jquery.toast.js'); ?>"></script>
<script src="<?=base_url('assets/js/jquery-code-scanner.js');?>"></script>
<!---->
</body>
</html>