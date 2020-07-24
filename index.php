<?php
  include 'admin/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>STOP HOAX!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="css/loader.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">


  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">


  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
    .loader {
      border: 7px solid #f3f3f3; /* Light grey */
      border-top: 7px solid red; /* Blue */
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

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    
    <!-- Navbar -->

    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo"><a href="index.php">Stop Hoax!<span>.</span> </a></div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#cek" class="nav-link">Cek Hoax!</a></li>
                <li><a href="#lapor" class="nav-link">Lapor Hoax!</a></li>
                <li><a href="#disclaimer" class="nav-link">Disclaimer</a></li>
                <li><a href="#footer" class="nav-link">Contact</a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      </div>

    </header>

    <!-- Home -->
    <a id="bgndVideo" class="player"
      data-property="{videoURL:'https://www.youtube.com/watch?v=w-cRWOjlk8c',showYTLogo:false, showAnnotations: false, showControls: false, cc_load_policy: false, containment:'#home-section',autoPlay:true, mute:true, startAt:255, stopAt: 271, opacity:1}">
    </a>

    <div class="intro-section" id="home">
      <div class="container">

        <div class="row align-items-center" >
          <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
            <h1 class="mb-3">Lawan Hoax!</h1>
            <p class="lead mx-auto desc mb-5">kami anak muda indonesia menolak jadi korban informasi hoax</p>
            <p class="text-center">
              <a href="#cek" class="btn btn-outline-white py-3 px-5">Get Started</a>
            </p>
          </div>
        </div>

      </div>
    </div>

    <!-- Cek Hoax! -->

    <div class="site-section" id="cek">
    <div class="bgimg"  data-stellar-background-ratio="0.5">

      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-7">
            <h2 class="">Cek Hoax!</h2>
            <p class="lead mx-auto desc mb-5">Cek berita yang anda temukan. Saring sebelum sharing.</p>
            <form id="form" method="post">
              <input type="text" id="myInput" name="cek_berita" class="input_berita form-control" placeholder="Masukkan berita yang ingin diperiksa ..."><br>
              <input type="button" id="btn_kirim_berita" name="btn" class="btn btn-primary py-2 px-10" value="Cek Sekarang!" data-toggle="modal" data-target="#hasil_cek"  >
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>

    
    <div class="modal" id="hasil_cek" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
       
          <div class="modal-header">
            <h5 class="modal-title">Hasil Prediksi</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">


            <div style="text-align: center;" id="loading_div"> 
              <h5> Loading .... </h5><br>
              <center>
              <div class="loader"></div>
              </center>
            </div>
            <div id="content_prediksi" style=" display: none;" class="form-group">
              <center>
              <img id="img_hoax" width="400px" height="300px">
              </center>

            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Lapor Hoax! -->

    <div class="site-section bg-light contact-wrap" id="lapor">
      <div class="container">
        
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Lapor Hoax!</h2>
            <p>Anda menemukan berita hoax ? <strong style="font-weight: bold;">Lapor Sekarang!</strong>
            </p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-7">
            <form method="post" data-aos="fade">
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                  <input type="text" class="form-control" placeholder="Nama Depan" name="nama_depan" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea class="form-control" id="" cols="30" rows="10"
                    placeholder="Tulis konten berita ..." name="konten" required></textarea>
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-6">
    
                  <input type="submit" name="lapor_hoax" class="btn btn-primary py-3 px-5 btn-block" value="Kirim Laporan">
                </div>
              </div>
    
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
      if(isset($_POST['lapor_hoax'])){
        $nama_depan = addslashes($_POST['nama_depan']);
        $nama_belakang = addslashes($_POST['nama_belakang']);
        $email = addslashes($_POST['email']);
        $konten = addslashes($_POST['konten']);
        $tanggal = date('Y-m-d');
        $koneksi->query("INSERT INTO lapor_hoax VALUES ('','$nama_depan','$nama_belakang','$email','$konten','$tanggal')");
        echo "<script>alert('Terima kasih telah mengirim laporan');</script>";
        echo "<script>location='index.php';</script>";  
      }
    ?>
    
    <!-- Disclaimer -->

    <div class="site-section" id="disclaimer"> 
    <div class="bgimg" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Disclaimer</h2>
            <p class="lead mx-auto desc mb-5">Semua prediksi yang dihasilkan belum bisa menjamin kebenaran</p>
          </div>
        </div>
      </div>
    </div>
    </div>


    <br><br>

    <!-- Contact -->

    <div class="site-section" id="footer">
      <br><br>
    <footer class="footer">
      <div class="container">
        <div class="row">

          <div class="col-md-3 ml-auto">
            <h3 class="text-dark">Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#home">Home</a></li>
              <li><a href="#cek">Cek Hoax!</a></li>
              <li><a href="#lapor">Lapor Hoax!</a></li>
              <li><a href="#disclaimer">Disclaimer</a></li>
              <li><a href="#footer">Contact</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3 class="text-dark" align="center">About StopHoax!.</h3>
            <p align="justify">Sebuah website yang dibuat untuk melakukan pengecekan terhadap tingkat kebenaran dari suatu berita. Website ini akan memprediksi berita tersebut apakah termasuk berita hoax atau tidak.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3 class="text-dark">Contact</h3>
            <ul class="list-unstyled footer-links">
              <div>
                <li>0212-1000-1000</li>
                <li>stophoax@gmail.com</li>
              </div>
            </ul>
          </div>
          

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p class="copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Teknik Informatika UPN "Veteran" Yogyakarta
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>

            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>



  </div>
  <!-- .site-wrap -->

  

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>
  <head>
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
   </script>
</head>
  <script>
    

    $( document ).ready(function() {

    
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
          $('#img_hoax').attr("src","images/hoax.png");
        }else{
          $('#img_hoax').attr("src","images/fakta.png");
        }

      });
    })
    })
  </script>
</body>

</html>