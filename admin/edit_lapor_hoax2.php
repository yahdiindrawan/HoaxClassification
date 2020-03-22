<?php
	$ambil = $koneksi->query("SELECT * FROM lapor_hoax WHERE id_lapor='$_GET[id]'");
	$lapor= $ambil->fetch_assoc();
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit News</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
	          <label>Nama Depan</label>
	          <input type="hidden" name="id" class="form-control" value="<?php echo $lapor['id_lapor']?>">
	          <input type="text" name="nama_depan" class="form-control" value="<?php echo $lapor['nama_depan']?>" required>
	        </div>

	        <div class="form-group">
	          <label>Nama Belakang</label>
	          <input type="text" name="nama_belakang" class="form-control" value="<?php echo $lapor['nama_belakang']?>" required >
	        </div>

	        <div class="form-group">
	          <label>Email</label>
	          <input type="email" name="email" class="form-control" value="<?php echo $lapor['email']?>" required>
	        </div>

	        <div class="form-group">
	          <label>Judul</label>
	          <input type="text" name="judul" class="form-control" value="<?php echo $lapor['judul']?>" required>
	        </div>

	        <div class="form-group">
	          <label>Konten</label>
	          <textarea type="text" name="konten" class="form-control" rows="5" required><?php echo $lapor['konten']?></textarea>
	        </div>

	        <div class="form-group">
	          <label>Tanggal</label>
	          <input type="date" name="tanggal" class="form-control" value="<?php echo $lapor['tanggal']?>" required>
	        </div>
			<button class="btn btn-primary" name="update">Update</button>
		</form>
      </div>
    </div>
</div>

<?php
  if(isset($_POST['update'])){
      $id_lapor = $_POST['id'] ;
      $nama_depan = $_POST['nama_depan'];
      $nama_belakang = $_POST['nama_belakang'];
      $email = $_POST['email'];
      $judul = $_POST['judul'];
      $konten = $_POST['konten'];
      $tanggal = $_POST['tanggal'];
      $koneksi->query("UPDATE lapor_hoax SET nama_depan='$nama_depan', nama_belakang='$nama_belakang', email='$email', judul='$judul', konten='$konten', tanggal='$tanggal' WHERE id_lapor='$id_lapor'");
      echo "<script>alert('Data laporan telah diubah');</script>";
      echo "<script>location='index.php?halaman=lapor_hoax';</script>";
    }
?>