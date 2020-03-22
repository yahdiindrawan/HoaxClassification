
<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm"></i>&nbsp;Tambah Data</button>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="tabel-cek">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama Lengkap</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          $ambil=$koneksi->query("SELECT * FROM admin");
          while($admin=$ambil->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $admin['username'];?></td>
          <td><?php echo $admin['password'];?></td>
          <td><?php echo $admin['nama_admin'];?></td>
          <td>
            <a href="index.php?halaman=edit_admin&id=<?php echo $admin['id_admin'] ;?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="index.php?halaman=hapus_admin&id=<?php echo $admin['id_admin'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
            
          </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal" id="tambah_data" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required></input>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_admin" class="form-control" required></input>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="tambah">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
    
<?php
  if(isset($_POST['tambah'])){
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $password_encrypt = addslashes(base64_encode($password));
    $nama_admin = addslashes($_POST['nama_admin']);

    $koneksi->query("INSERT INTO admin VALUES ('','$username','$password_encrypt','$nama_admin')");
  
    echo "<script>alert('Data telah ditambah');</script>";
    echo "<script>location='index.php?halaman=admin';</script>";
  }

?>
