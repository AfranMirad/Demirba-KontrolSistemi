<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KaizerTech | Envanter Kontrol Sistemi</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('css/sb-admin.css'); ?>" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <button class="btn btn-link btn-sm text-blue order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand mr-1" href="index.html">Envanter Kontrol Sistemi</a>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">

          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">


        <li class="nav-item dropdown no-arrow">

          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Çıkış</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('user/user_profile'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Ana Sayfa</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/urun'); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Ürün</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/bolum'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Bölüm</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/satinAl'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Ürün Satın Al</span></a>
        </li>
      </ul>

      <div id="content-wrapper">



          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Kullanıcılar</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Urun Adı</th>
                      <th>Urun Parça Adı</th>
                      <th>Personel Adı</th>
                      <th>Personel Soyadı</th>
                      <th>Zimmetleyen Kullanıcı</th>
                      <th>Zimmetlenme Tarihi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Urun Adı</th>
                      <th>Urun Parça Adı</th>
                      <th>Personel Adı</th>
                      <th>Personel Soyadı</th>
                      <th>Zimmetleyen Kullanıcı</th>
                      <th>Zimmetlenme Tarihi</th>
                    </tr>
                  </tfoot>
                  <tbody>

                      <?php


                        foreach ($zimmetle as $row) {
                        echo "<tr>";
                        echo "<td>".$row->urun_adi."</td>";
                        echo "<td>".$row->urun_parca_adi."</td>";
                        echo "<td>".$row->personel_adi."</td>";
                        echo "<td>".$row->personel_soyadi."</td>";
                        echo "<td>".$row->user_mail."</td>";
                        echo "<td>".$row->zimmet_tarih."</td></tr>";

                        }
                       ?>



                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © 2018 KaizerTech</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Çıkış Yap!</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Çıkış yapmak istediğinize emin misiniz?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
            <a class="btn btn-primary" href="<?php echo base_url('user/user_logout');?>">Çıkış Yap</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('vendor/chart.js/Chart.min.js');  ?>"></script>
    <script src="<?php echo base_url('vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin.min.js'); ?>"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url('js/demo/datatables-demo.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/chart-area-demo.js'); ?>"></script>

  </body>

</html>
