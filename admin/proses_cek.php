<button class="btn btn-sm btn-primary mb-3" onclick="window.location.href='index.php?halaman=cek_hoax'"><i class="fas fa-back fa-sm"></i><<&nbsp;Kembali</button>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Cek Hoax!</h6>
  </div>
  <div class="card-body">
    <form method="post">
    <textarea type="text" name="cek" id="myInput" rows="5" class="form-control" placeholder="Masukkan berita yang ingin diperiksa ..." required></textarea><br>
    <center><input type="button" id="btn_kirim_berita" class="btn btn-primary py-2 px-10" value="Cek Sekarang!" class="form-control" data-toggle="modal" data-target="#hasil_cek"></center>
    </form>
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
              <!-- <small style="font-weight: bold;">Data Awal</small><br>
              <small id="data_awal"></small><br>
              <small style="font-weight: bold;">Case Folding</small><br>
              <small id="case_folding"></small><br>
              <small style="font-weight: bold;">Remove Punctuation</small><br>
              <small id="remove_punctuation"></small><br>
              <small style="font-weight: bold;">Remove Number</small><br>
              <small id="remove_number"></small><br>
              <small style="font-weight: bold;">Tokenizing</small><br>
              <small id="tokenizing"></small><br>
              <small style="font-weight: bold;">Stopword</small><br>
              <small id="stopword"></small><br>
              <small style="font-weight: bold;">Stemming</small><br>
              <small id="stemming"></small><br>
              <small style="font-weight: bold;">Hasil Preprocessing</small><br>
              <small id="hasil_preprocessing"></small><br>
              <small style="font-weight: bold;">Vektor</small><br>
              <small id="vektor"></small><br>
              <small style="font-weight: bold;">Probabilitas</small><br>
              <small id="probabilitas"></small><br>
              <small style="font-weight: bold;">Probabilitas Pembulatan</small><br>
              <small id="probabilitas_pembulatan"></small><br>
              <small style="font-weight: bold;">Hasil Klasifikasi</small><br>
              <small id="klasifikasi"></small><br> -->
              <br>
              <?php 
                $ambil=$koneksi->query("SELECT * FROM cek_hoax ORDER BY id_cek DESC LIMIT 1");
                $cek=$ambil->fetch_assoc();
                $id_cek = $cek['id_cek'] + 1 ;
              ?>
              <a href="index.php?halaman=detail_cek&id=<?php echo $id_cek ;?>">Tampilkan Selengkapnya</a>
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