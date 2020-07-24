<?php 
    session_start();
    include 'koneksi.php';
    if(!isset($_SESSION['admin']))
    {
        echo "<script>alert('Anda harus login');</script>";
        echo "<script>location='login.php';</script>";
        header('location:login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - StopHoax!.</title>

  <link href="../img/cave.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="vendor/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/loader.css">

  <style type="text/css">
    .highcharts-figure, .highcharts-data-table table {
        min-width: 360px; 
        max-width: 900px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #EBEBEB;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
    }
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    .highcharts-data-table th {
      font-weight: 600;
        padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
    .loader {
      border: 7px solid #f3f3f3; /* Light grey */
      border-top: 7px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 2s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }

  </style>

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?halaman=dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">STOP HOAX!.</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?halaman=dashboard">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=admin">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Admin</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=cek_hoax">
          <i class="fas fa-fw fa-search"></i>
          <span>Data Cek Hoax!</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=lapor_hoax">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Data Lapor Hoax!</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=training">
          <i class="fas fa-fw fa-file-invoice"></i>
          <span>Data Training</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=testing">
          <i class="fas fa-fw fa-file"></i>
          <span>Data Testing</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=pengujian">
          <i class="fas fa-fw fa-stream"></i>
          <span>Data Pengujian</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=CNN">
          <i class="fas fa-fw fa-chart-line"></i>
          <span>Model CNN</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=perbaharui_model">
          <i class="fas fa-fw fa-sync"></i>
          <span>Perbaharui Model</span></a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item">
        <a class="nav-link" href="../index.php" target="_blank">
          <i class="fas fa-fw fa-random"></i>
          <span>Go to Website</span></a>
      </li>

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

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['admin']['nama_admin']; ?><i class="fas fa-user-circle fa-lg fa-fw mr-2 text-gray-400"></i></span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#GantiPassword">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php
              if(isset($_GET['halaman'])){
                  if($_GET['halaman']=="dashboard"){
                      include 'dashboard.php';
                  }
                  else if($_GET['halaman']=="admin"){
                      include 'admin.php';
                  }
                  else if($_GET['halaman']=="edit_admin"){
                      include 'edit_admin.php';
                  }
                  else if($_GET['halaman']=="hapus_admin"){
                      include 'hapus_admin.php';
                  }
                  else if($_GET['halaman']=="cek_hoax"){
                      include 'cek_hoax.php';
                  }
                  else if($_GET['halaman']=="proses_cek"){
                      include 'proses_cek.php';
                  }
                  else if($_GET['halaman']=="detail_cek"){
                      include 'detail_cek.php';
                  }
                  else if($_GET['halaman']=="hapus_cek"){
                      include 'hapus_cek.php';
                  }
                  else if($_GET['halaman']=="lapor_hoax"){
                      include 'lapor_hoax.php';
                  }
                  else if($_GET['halaman']=="edit_lapor"){
                      include 'edit_lapor.php';
                  }
                  else if($_GET['halaman']=="hapus_lapor"){
                      include 'hapus_lapor.php';
                  }
                  else if($_GET['halaman']=="training"){
                      include 'training.php';
                  }
                  else if($_GET['halaman']=="detail_training"){
                      include 'detail_training.php';
                  }
                  else if($_GET['halaman']=="testing"){
                      include 'testing.php';
                  }
                  else if($_GET['halaman']=="detail_testing"){
                      include 'detail_testing.php';
                  }
                  else if($_GET['halaman']=="pengujian"){
                      include 'pengujian.php';
                  }
                  else if($_GET['halaman']=="CNN"){
                      include 'CNN.php';
                  }
                  else if($_GET['halaman']=="perbaharui_model"){
                      include 'perbaharui_model.php';
                  }
                  else if($_GET['halaman']=="edit_model"){
                      include 'edit_model.php';
                  }
                  else if($_GET['halaman']=="hapus_model"){
                      include 'hapus_model.php';
                  }

              }
              else{
                  //include 'index.php';
              }
          ?>
          


        </div>
          

      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            &copy;Copyright 2020 | <strong>Teknik Informatika</strong><br><br>
            <span>UPN Veteran Yogyakarta</span>
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

  <!-- Ganti Password Modal-->
  <div class="modal" id="GantiPassword" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ganti Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">            

            <div class="form-group">
              <label>Password Lama</label>
              <input type="password" name="password_lama" class="form-control" required></input>
            </div>

            <div class="form-group">
              <label>Password Baru</label>
              <input type="password" name="password_baru" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" name="konfirmasi_password" class="form-control" required></input>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="ganti">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  if(isset($_POST['ganti'])){
    $id_admin = $_SESSION['admin']['id_admin'];
    $password_lama = $_POST['password_lama'];
    $password_lama_encrypt = base64_encode($password_lama);
    $password_baru = $_POST['password_baru'];
    $password_baru_encrypt = base64_encode($password_baru);
    $konfirmasi_password = $_POST['konfirmasi_password'];
    $konfirmasi_password_encrypt = base64_encode($konfirmasi_password);
    if($password_lama_encrypt==$_SESSION['admin']['password']){
        if($password_baru_encrypt==$konfirmasi_password_encrypt){
          $koneksi->query("UPDATE admin SET password='$password_baru_encrypt' WHERE id_admin='$id_admin'");
          echo "<script>alert('Password berhasil diganti');</script>";
          echo "<script>location='index.php?halaman=admin';</script>";
        }
        else{
          echo "<script>alert('Gagal! Password baru dan konfirmasi password berbeda.');</script>";
          echo "<script>location='index.php?halaman=admin';</script>";
        }
    }else{
      echo "<script>alert('Gagal! Password lama salah.');</script>";
      echo "<script>location='index.php?halaman=admin';</script>";
    }
  }

  ?>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" jika ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script src="vendor/highchart/highcharts.js"></script>
  <script src="vendor/highchart/series-label.js"></script>
  <script src="vendor/highchart/exporting.js"></script>
  <script src="vendor/highchart/export-data.js"></script>
  <script src="vendor/highchart/accessibility.js"></script>

  <script>
    function nilai(akurasi){
      document.querySelector('#akurasi2').value = akurasi + '%';
    }
    $(document).ready(function(){
        $('#tabel-berita').DataTable();
        $('#tabel-cek').DataTable();
        $('#tabel-lapor').DataTable();
        $('#tabel-partner').DataTable();
        $('#tabel-informasi').DataTable({
          "responsive" : true,
          "columnDefs" : [
            { responsivePriority : 1, targets: 0 },
            { responsivePriority : 2, targets: 4 }
          ]
        });
        var btn_kirim = $('#btn_kirim_berita').on('click',function(){
          $.get('proses.php?text='+$("#myInput").val(),function(data,status){
           
            var hasil = JSON.parse(data);
            console.log(hasil)
            $('#data_awal').text(hasil.text_send)
            $('#case_folding').text(hasil.case_folding)
            $('#remove_punctuation').text(hasil.remove_punctuation)
            $('#remove_number').text(hasil.remove_number)
            $('#tokenizing').text(hasil.tokenizing)
            $('#stopword').text(hasil.stopword)
            $('#stemming').text(hasil.stemming)
            $('#hasil_preprocessing').text(hasil.hasil_preprocessing)
            $('#vektor').text(hasil.vektor)
            $('#probabilitas').text(hasil.probabilitas)
            $('#probabilitas_pembulatan').text(hasil.probabilitas_pembulatan)
            $('#klasifikasi').text(hasil.klasifikasi)
            $("#loading_div").hide()
            $("#content_prediksi").show()

            if(hasil.klasifikasi.trim() == "Hoax"){
              $('#img_hoax').attr("src","../images/hoax.png");
            }else{
              $('#img_hoax').attr("src","../images/fakta.png");
            }

          });
        });
    });
        Highcharts.chart('container', {

        title: {
            text: 'Convolutional Neural Network'
        },

        subtitle: {
            text: 'Berdasarkan Data Pengujian'
        },

        yAxis: {
            title: {
                text: 'Persentase (%)'
            }
        },

        xAxis: {
            title:{
              text: 'Waktu Pengujian'
            },

            categories: [
              <?php 
                  $ambil=$koneksi->query("SELECT * FROM pengujian ORDER BY tanggal");
                  while($pengujian=$ambil->fetch_assoc()){?>
                    '<?php  echo $pengujian['tanggal']; ?>'
            <?php }
              ?>
            ]

        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        series: [{
            name: 'Precision',
            data: [
              <?php 
                  $ambil=$koneksi->query("SELECT * FROM pengujian ORDER BY tanggal");
                  while($pengujian=$ambil->fetch_assoc()){
                      echo $pengujian['presisi']; ?>,
            <?php }
              ?>
            ]
        }, {
            name: 'Recall',
            data: [
              <?php 
                  $ambil=$koneksi->query("SELECT * FROM pengujian ORDER BY tanggal");
                  while($pengujian=$ambil->fetch_assoc()){
                      echo $pengujian['recall']; ?>,
            <?php }
              ?>
            ]
        }, {
            name: 'Accuracy',
            data: [
              <?php 
                  $ambil=$koneksi->query("SELECT * FROM pengujian ORDER BY tanggal");
                  while($pengujian=$ambil->fetch_assoc()){
                      echo $pengujian['akurasi']; ?>,
            <?php }
              ?>
            ]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

  </script>

</body>

</html>
