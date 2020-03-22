<?php
	$ambil = $koneksi->query("SELECT * FROM lapor_hoax WHERE id_lapor='$_GET[id]'");
	$lapor = $ambil->fetch_assoc();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data Lapor Hoax!</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post">
			<div class="form-group">
				<label>Nama Depan</label>
				<input type="hidden" class="form-control" name="id_lapor" value="<?php echo $lapor['id_lapor'];?>">
				<input type="text" class="form-control" name="nama_depan" value="<?php echo $lapor['nama_depan'];?>" required>
			</div>

      <div class="form-group">
        <label>Nama Belakang</label>
        <input type="text" class="form-control" name="nama_belakang" value="<?php echo $lapor['nama_belakang'];?>" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $lapor['email'];?>" required>
      </div>

      <div class="form-group">
        <label>Konten</label>
        <textarea type="text" name="konten" class="form-control" rows="5" required><?php echo $lapor['konten']?></textarea>
      </div>

      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo $lapor['tanggal']?>" required>
      </div>

      <a href="index.php?halaman=lapor_hoax" class="btn btn-secondary">Back</a>&nbsp;
			<button class="btn btn-primary" name="update">Update</button>
		</form>
      </div>
    </div>
</div>
<?php
  if(isset($_POST['update'])){
      $id_lapor = $_POST['id_lapor'] ;
      $nama_depan = $_POST['nama_depan'];
      $nama_belakang = $_POST['nama_belakang'];
      $email = $_POST['email'];
      $konten = $_POST['konten'];
      $tanggal = $_POST['tanggal'];
      $koneksi->query("UPDATE lapor_hoax SET nama_depan='$nama_depan', nama_belakang='$nama_belakang', email='$email', konten='$konten', tanggal='$tanggal' WHERE id_lapor='$id_lapor'");
      echo "<script>alert('Data laporan telah diubah');</script>";
      echo "<script>location='index.php?halaman=lapor_hoax';</script>";
    }
?>