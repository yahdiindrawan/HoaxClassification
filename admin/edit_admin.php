<?php
	$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
	$admin = $ambil->fetch_assoc();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data Admin</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post">
			<div class="form-group">
				<label>Username</label>
				<input type="hidden" class="form-control" name="id_admin" value="<?php echo $admin['id_admin'];?>">
				<input type="text" class="form-control" name="username" value="<?php echo $admin['username'];?>" required>
			</div>

      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_admin" value="<?php echo $admin['nama_admin'];?>" required>
      </div>

      <div class="form-group">
        <small>*Tidak dapat ganti password pada halaman ini</small>
      </div>
      <a href="index.php?halaman=admin" class="btn btn-secondary">Back</a>&nbsp;
			<button class="btn btn-primary" name="update">Update</button>
		</form>
      </div>
    </div>
</div>
<?php
	if(isset($_POST['update'])){
      $id_admin = $_POST['id_admin'] ;
      $username = $_POST['username'];
      $nama_admin = $_POST['nama_admin'];
      $koneksi->query("UPDATE admin SET username='$username', nama_admin='$nama_admin' WHERE id_admin='$id_admin'");
      echo "<script>alert('Data telah diubah');</script>";
      echo "<script>location='index.php?halaman=admin';</script>";
    }
?>

           