<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_lapor"><i class="fas fa-plus fa-sm"></i>&nbsp;Tambah Laporan</button>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Lapor Hoax!</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="tabel-cek">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pelapor</th>
            <th>Email</th>
            <th>Konten</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          $ambil=$koneksi->query("SELECT * FROM lapor_hoax ORDER BY tanggal DESC");
          while($lapor=$ambil->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td>
            <?php
              $nama_pelapor = $lapor['nama_depan'].' '.$lapor['nama_belakang'];
              echo $nama_pelapor;
            ?>
          </td>
          <td><?php echo $lapor['email'];?></td>
          <td>
            <?php 
              if(strlen($lapor['konten'])>=200){
              $text = $lapor['konten'];
              $num_char = 200;
              $cut_text = substr($text, 0, $num_char);
                if ($text{$num_char - 1} != ' ') { // jika huruf ke 50 (50 - 1 karena index dimulai dari 0) buka  spasi
                  $new_pos = strrpos($cut_text, ' '); // cari posisi spasi, pencarian dari huruf terakhir
                  $cut_text = substr($text, 0, $new_pos);
                }
              echo $cut_text . '...' ;
              }
              else{
                echo $lapor['konten'];
              }
            ?>
          </td>
          <td><?php echo $lapor['tanggal'];?></td>
          <td>
            <a href="index.php?halaman=edit_lapor&id=<?php echo $lapor['id_lapor'] ;?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="index.php?halaman=hapus_lapor&id=<?php echo $lapor['id_lapor'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal" id="tambah_lapor" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Laporan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Depan Pelapor</label>
            <input type="text" name="nama_depan" class="form-control" required></input>
          </div>

          <div class="form-group">
            <label>Nama Belakang Pelapor</label>
            <input type="text" name="nama_belakang" class="form-control" required></input>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Konten</label>
            <textarea type="text" name="konten" class="form-control" rows="5" required></textarea>
          </div>

          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" required>
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
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $konten = $_POST['konten'];
    $tanggal = $_POST['tanggal'];
    $koneksi->query("INSERT INTO lapor_hoax VALUES ('','$nama_depan','$nama_belakang','$email','$konten','$tanggal')");
  
    echo "<script>alert('Data laporan telah ditambah');</script>";
    echo "<script>location='index.php?halaman=lapor_hoax';</script>";
  }

?>
