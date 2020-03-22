<?php
	$ambil = $koneksi->query("SELECT * FROM cek_hoax WHERE id_cek='$_GET[id]'");
	$cek = $ambil->fetch_assoc();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post">
			<div class="form-group">
				<label>Konten</label>
				<input type="hidden" class="form-control" name="id_cek" value="<?php echo $cek['id_cek'];?>">
				<input type="text" class="form-control" name="konten" value="<?php echo $cek['konten'];?>" required>
			</div>

			<div class="form-group">
				<label>Tanggal</label>
				<input type="date" class="form-control" name="tanggal" value="<?php echo $cek['tanggal'];?>" required>
			</div>

      <div class="form-group">
        <label>Hasil Prediksi</label>
        <select class="form-control" name="prediksi">
          <option>--Pilih Kategori--</option>
          <?php 
            $ambil=$koneksi->query("SELECT * FROM kategori");
            while($kategori=$ambil->fetch_assoc()){
              if($kategori['id_kategori']==$cek['id_kategori']){ ?>
                <option value="<?php echo $kategori['id_kategori'];?>" selected><?php echo $kategori['kategori'];?></option>
        <?php  } else { ?>
                <option value="<?php echo $kategori['id_kategori'];?>"><?php echo $kategori['kategori'];?></option>
        <?php  } $no++ ?>
                
        <?php } ?>
        </select>
      </div>

			<div class="form-group">
        <label>Akurasi</label>
        <input type="range" name="akurasi" class="form-control" min="0" max="100" value="<?php echo $cek['akurasi'];?>" id="akurasi" oninput="nilai(value)" required><br>
        <input type="text" name="akurasi2" id="akurasi2" value="<?php echo $cek['akurasi'];?>%" class="form-control" disabled>
      </div>

			<button class="btn btn-primary" name="update">Update</button>
		</form>
      </div>
    </div>
</div>
<?php
	if(isset($_POST['update'])){
      $id_cek = $_POST['id_cek'] ;
      $konten = $_POST['konten'];
      $tanggal = $_POST['tanggal'];
      $id_kategori = $_POST['prediksi'];
      $akurasi = $_POST['akurasi'];
      $koneksi->query("UPDATE cek_hoax SET konten='$konten', tanggal='$tanggal', id_kategori='$id_kategori', akurasi='$akurasi' WHERE id_cek='$id_cek'");
      echo "<script>alert('Data telah diubah');</script>";
      echo "<script>location='index.php?halaman=cek_hoax';</script>";
    }
?>

           