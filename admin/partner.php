 <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_partner"><i class="fas fa-plus fa-sm"></i>&nbsp;Tambah Partner</button>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Partner</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="tabel-partner" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Logo</th>
            <th>Nama Partner</th>
            <th>Bidang</th>
            <th>Link</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          $ambil=$koneksi->query("SELECT * FROM partner");
          while($partner=$ambil->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><img src="../images/partner/<?php echo $partner['logo'];?>" width="80px" height="80px"></td>
          <td><?php echo $partner['nama_partner'];?></td>
          <td><?php echo $partner['bidang'];?></td>
          <td><?php echo $partner['link'];?></td>
          <td><?php echo $partner['deskripsi'];?></td>
          <td>
            <a href="index.php?halaman=edit_partner&id=<?php echo $partner['id_partner'] ;?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="index.php?halaman=hapus_partner&id=<?php echo $partner['id_partner'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
            
          </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal" id="tambah_partner" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Partner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label>Nama Partner</label>
          <input type="text" name="nama_partner" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Bidang</label>
          <input type="text" name="bidang" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Link</label>
          <input type="url" name="link" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <textarea type="text" name="deskripsi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
          <label>Logo</label>
          <input type="file" name="logo" class="form-control" required>
          <small>Ukuan file 400 x 400px</small>
        </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" name="tambah">Save</button>
    </div>
    </form>
  </div>
</div>
    
<?php
  if(isset($_POST['tambah'])){
    $nama_partner = $_POST['nama_partner'];
    $bidang = $_POST['bidang'];
    $link = $_POST['link'];
    $deskripsi = $_POST['deskripsi'];
    $logo = $_FILES['logo']['name'];
    $lokasilogo = $_FILES['logo']['tmp_name'];
    if(!empty($lokasilogo)){
      move_uploaded_file($lokasilogo, "../images/partner/$logo");
      $koneksi->query("INSERT INTO partner VALUES ('','$nama_partner','$logo','$bidang','$link','$deskripsi')");
      
      echo "<script>alert('Data partner telah ditambah');</script>";
      echo "<script>location='index.php?halaman=partner';</script>";
  
    }
  }
  

?>