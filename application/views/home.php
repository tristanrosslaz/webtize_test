<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Webtize PHP Test</title>

  <link href="<?=base_url('assets/sostrax_assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/sostrax_assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url('assets/css/select2-materialize.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/select2.min.css');?>">
  <!-- Bootstrap Datepicker CSS-->
  <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-datepicker3.min.css');?>">
  <!-- Jquery Toast CSS-->
  <link rel="stylesheet" href="<?=base_url('assets/css/jquery.toast.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/easy-autocomplete.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/custom2css.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/stylecss.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/loader.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/jquery.toast.css');?>">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <link rel="stylesheet" href="<?=base_url('assets/css/datatables.min.css');?>">

</head>

<body id="page-top" data-base_url="<?=base_url();?>">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-2">Webtize<sup> PHP Test</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('Main/index');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Products</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" style="display:none">

      <!-- Heading -->
      <div class="sidebar-heading" style="display:none">
        Interface
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List of Products</h1>
            <button type="button btn-primary" class="btn btn-primary" id="btnPlaceOrder">
            Place Order
            </button>

          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- display list of products -->
            <?php foreach($listProducts as $row){?>
              <div class="col-sm-3 pb-2">
                <div class="card">
                  <div class="card-body">
                    <input class="form-check-input checkboxPerProduct" type="checkbox" id="checkboxPerProduct" name="checkboxPerProduct" data-name="<?=$row['product_name'];?>" data-price="<?=$row['price'];?>" data-weight="<?=$row['weight'];?>">
                    <label class="control-label"><?=$row['product_name'];?> - <?=$row['price']?> - <?=$row['weight']?></label>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Webtize PHP Test</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- Product List Modal -->
<div class="modal fade" id="productListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="packageDiv">
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/sostrax_assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?=base_url('assets/sostrax_assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/sostrax_assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/sostrax_assets/js/sb-admin-2.min.js');?>"></script>
  <!-- Page level plugins -->
  <script src="<?=base_url('assets/sostrax_assets/vendor/chart.js/Chart.min.js');?>"></script>
  <!-- Page level custom scripts -->
  <script src="<?=base_url('assets/sostrax_assets/js/jquery-ui.js');?>"></script>
  <script src="<?=base_url('assets/js/select2.min.js');?>"></script>
  <script src="<?=base_url('assets/sostrax_assets/js/custom.js');?>"></script>
  <script src="<?=base_url('assets/js/home.js');?>"></script>
  <script src="<?=base_url('assets/js/jquery.toast.js'); ?>"></script>
  <script async src="<?=base_url('assets/sostrax_assets/js/purecounter.js');?>"></script>
  <script src="<?=base_url('assets/js/datatables.min.js');?>"></script>
</body>
</html>
