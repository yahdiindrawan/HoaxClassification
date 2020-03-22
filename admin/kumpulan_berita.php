<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_berita"><i class="fas fa-plus fa-sm"></i>&nbsp;Tambah Berita</button>
<div class="card shadow mb-4">
    <div class="card-header py-3">
    	<h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
    </div>
    <div class="card-body">
      <table id="tabel-berita" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Link</th>
          <th>Tanggal</th>
          <th>Sumber</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $no=1;
            $ambil=$koneksi->query("SELECT * FROM kumpulan_berita b INNER JOIN partner p ON b.id_partner=p.id_partner ORDER BY tanggal DESC");
            while($berita=$ambil->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $berita['judul'];?></td>
            <td><?php echo $berita['link_berita'];?></td>
            <td><?php echo $berita['tanggal'];?></td>
            <td><?php echo $berita['nama_partner'];?></td>
            <td>
              <a href="index.php?halaman=edit_kumpulan_berita&id=<?php echo $berita['id_berita'] ;?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
              <a href="index.php?halaman=hapus_kumpulan_berita&id=<?php echo $berita['id_berita'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
              
            </td>
          </tr>
          <?php $no++; } ?>
        </tbody>
        
      </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="modal" id="tambah_berita" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Berita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
            
            <div class="form-group">
              <label>Judul</label>
              <input type="text" class="form-control" name="judul" required>
            </div>

            <div class="form-group">
              <label>Link</label>
              <input type="url" name="link" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d');?>" required>
            </div>
            
            <div class="form-group">
              <label>Sumber</label>
              <select class="form-control" name="sumber">
                <option>--Pilih Sumber--</option>
                <?php 
                  $ambil=$koneksi->query("SELECT * FROM partner");
                  while($partner=$ambil->fetch_assoc()){
                ?>
                  <option value="<?php echo $partner['id_partner'];?>"><?php echo $partner['nama_partner'];?></option>
              <?php } ?>
              </select>
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
    $judul = $_POST['judul'];
    $link = $_POST['link'];
    $tanggal = $_POST['tanggal'];
    $id_partner = $_POST['sumber'];
    $koneksi->query("INSERT INTO kumpulan_berita VALUES ('','$judul','$link','$tanggal','$id_partner')");
  
    echo "<script>alert('Data berita telah ditambah');</script>";
    echo "<script>location='index.php?halaman=kumpulan_berita';</script>";
  }

?>
