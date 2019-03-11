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


        <div id="content-wrapper">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Ürün Satın Alma
            </div>

              <div class="container-fluid">

                  <form role="form" method="post" action="<?php echo base_url('user/getTedarikUpdate'); ?>">
                  </br>
                    <div class="col">

                    <div class="col">

                      Tedarikçinizi seçiniz  : <select name="tedarik_id">

                          <?php

                          foreach ($tedar as $row) {

                          ?><option value="<?php echo $row->tedarik_id;?>"><?php echo $row->tedarik_adi;?></option><?php
                          }
                           ?>
                        </select>
                      </br>
                    </div>
                  </br>
                    <div class="col">

                        Alınacak ürününüzü giriniz  :    <select name="urun_id">

                          <?php

                          foreach ($tedarik  as $row) {

                          ?><option value="<?php echo $row->urun_id;?>"><?php echo $row->urun_adi;?></option><?php
                          }
                           ?>
                        </select>
                      </br>
                    </div>
                  </br>
                   <button type="submit" class="btn btn-outline-primary">Parca Ekle</button>

                  </div>
                  </br>
                  </form>
              </div>
            </div>




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

    <!-- Urun Ekle -->
    <div class="modal fade" id="urunSatinAl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
          <div class="form-group">
              <input class="form-control" placeholder="Adı Soyadı" name="user_name" type="text" autofocus>
          </div>

          <div class="form-group">
              <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
          </div>
          <div class="form-group">
              <input class="form-control" placeholder="Parola" name="user_password" type="password" value="">
          </div>

          <div class="form-group">
              <input class="form-control" placeholder="Yaşı" name="user_age" type="number" value="">
          </div>

          <div class="form-group">
              <input class="form-control bfh-phone" data-format="+1 (ddd) ddd-dddd" placeholder="Telefon" name="user_mobile" type="text" value="">
          </div>
          <div class="form-group">
            <select class="form-control" id="sel1">

            <?php

            foreach ($urun as $row) {
            echo "<option>".$row->urun_adi."</option>";
            }
            ?>
          </select>

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
