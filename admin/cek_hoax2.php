
<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm"></i>&nbsp;Tambah Data</button>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Cek Hoax!</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="tabel-cek">
        <thead>
          <tr>
            <th>No</th>
            <th>Konten</th>
            <th>Tanggal</th>
            <th>Hasil Prediksi</th>
            <th>Akurasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          $ambil=$koneksi->query("SELECT * FROM cek_hoax INNER JOIN kategori ON cek_hoax.id_kategori=kategori.id_kategori ORDER BY tanggal DESC");
          while($cek=$ambil->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $cek['konten'];?></td>
          <td><?php echo $cek['tanggal'];?></td>
          <td><?php echo $cek['kategori'];?></td>
          <td><?php echo $cek['akurasi'];?>%</td>
          <td>
            <a href="index.php?halaman=edit_cek_hoax&id=<?php echo $cek['id_cek'] ;?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="index.php?halaman=hapus_cek_hoax&id=<?php echo $cek['id_cek'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
            
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
          <h5 class="modal-title">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Konten</label>
            <input type="hidden" name="id" class="form-control">
            <textarea type="text" name="konten" class="form-control" rows="5" required></textarea>
          </div>

          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d');?>" required>
          </div>

          <div class="form-group">
            <label>Hasil Prediksi</label>
            <select class="form-control" name="prediksi">
              <option>--Pilih Kategori--</option>
              <?php 
                $ambil=$koneksi->query("SELECT * FROM kategori");
                while($kategori=$ambil->fetch_assoc()){
              ?>
                <option value="<?php echo $kategori['id_kategori'];?>"><?php echo $kategori['kategori'];?></option>
            <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Akurasi</label>
            <input type="range" name="akurasi" class="form-control" min="0" max="100" value="50" id="akurasi" oninput="nilai(value)" required><br>
            <input type="text" name="akurasi2" id="akurasi2" value="50%" class="form-control" disabled>
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
    $konten = $_POST['konten'];
    $tanggal = $_POST['tanggal'];
    $id_kategori = $_POST['prediksi'];
    $akurasi = $_POST['akurasi'];
    $koneksi->query("INSERT INTO cek_hoax VALUES ('','$konten','$tanggal','$id_kategori','$akurasi')");
  
    echo "<script>alert('Data telah ditambah');</script>";
    echo "<script>location='index.php?halaman=cek_hoax';</script>";
  }

?>
