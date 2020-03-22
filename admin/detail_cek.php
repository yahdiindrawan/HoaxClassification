<?php
	$ambil = $koneksi->query("SELECT * FROM cek_hoax WHERE id_cek='$_GET[id]'");
	$cek = $ambil->fetch_assoc();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Data Cek Hoax!</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post">
      <div class="form-group">
        <strong><label>Tanggal</label></strong>
        <input type="hidden" class="form-control" name="id_cek" value="<?php echo $cek['id_cek'];?>">
        <br>
        <p><?php echo $cek['tanggal']?></p>
      </div>

			<div class="form-group">
				<strong><label>Konten</label></strong>
				<br>
        <p><?php echo $cek['konten']?></p>
			</div>

      <br>
      <strong><h4>Proses Preprocessing</h4></strong>
      <br>

      <div class="form-group">
        <strong><label>Case Folding</label></strong>
        <br>
        <p><?php echo $cek['case_folding']?></p>
      </div>

      <div class="form-group">
        <strong><label>Remove Punctuation</label></strong>
        <br>
        <p><?php echo $cek['remove_punctuation']?></p>
      </div>

      <div class="form-group">
        <strong><label>Remove Number</label></strong>
        <br>
        <p><?php echo $cek['remove_number']?></p>
      </div>

      <div class="form-group">
        <strong><label>Remove Whitespace</label></strong>
        <br>
        <p><?php echo $cek['remove_whitespace']?></p>
      </div>

      <div class="form-group">
        <strong><label>Tokenizing</label></strong>
        <br>
        <p><?php echo $cek['tokenizing']?></p>
      </div>

      <div class="form-group">
        <strong><label>Stopword</label></strong>
        <br>
        <p><?php echo $cek['stopword']?></p>
      </div>

      <div class="form-group">
        <strong><label>Stemming</label></strong>
        <br>
        <p><?php echo $cek['stemming']?></p>
      </div>

      <div class="form-group">
        <strong><label>Hasil Preprocessing</label></strong>
        <br>
        <p><?php echo $cek['hasil_preprocessing']?></p>
      </div>

      <br>
      <strong><h4>Proses Prediksi</h4></strong>
      <br>

      <div class="form-group">
        <strong><label>Vektor</label></strong>
        <br>
        <p><?php echo $cek['vektor']?></p>
      </div>

      <div class="form-group">
        <strong><label>Probabilitas</label></strong>
        <br>
        <p><?php echo $cek['probabilitas']?></p>
      </div>

      <div class="form-group">
        <strong><label>Hasil Pembulatan Probabilitas</label></strong>
        <br>
        <p><?php echo $cek['probabilitas_pembulatan']?></p>
      </div>

      <br>
      <strong><h4>Hasil Klasifikasi : <?php echo strtoupper($cek['klasifikasi']) ?></h4></strong>
      <br>

      <a href="index.php?halaman=cek_hoax" class="btn btn-primary">Back</a>
		</form>
      </div>
    </div>
</div>
