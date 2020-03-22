<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_dataset"><i class="fas fa-plus fa-sm"></i>&nbsp;Tambah Dataset</button>
<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_lapor"><i class="fas fa-sync fa-sm"></i>&nbsp;Perbaharui Model</button>
<br>
<strong><small>Peringatan !</small></strong>
<br>
<small>
  * Proses perbaharui model memakan waktu yang lama<br>
  * Disarankan masing-masing label pada dataset memiliki jumlah yang seimbang
</small>
<br><br>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dataset</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="tabel-cek">
        <thead>
          <tr>
            <th>No</th>
            <th>Konten</th>
            <th>Label</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          $ambil=$koneksi->query("SELECT * FROM dataset");
          while($dataset=$ambil->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td>
            <?php 
              if(strlen($dataset['konten'])>=200){
              $text = $dataset['konten'];
              $num_char = 200;
              $cut_text = substr($text, 0, $num_char);
                if ($text{$num_char - 1} != ' ') { // jika huruf ke 50 (50 - 1 karena index dimulai dari 0) buka  spasi
                  $new_pos = strrpos($cut_text, ' '); // cari posisi spasi, pencarian dari huruf terakhir
                  $cut_text = substr($text, 0, $new_pos);
                }
              echo $cut_text . '...' ;
              }
              else{
                echo $dataset['konten'];
              }
            ?>
          </td>
          <td><?php echo $dataset['label'];?></td>
          <td>
            <a href="index.php?halaman=edit_model&id=<?php echo $dataset['id_dataset'] ;?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="index.php?halaman=hapus_model&id=<?php echo $dataset['id_dataset'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal" id="tambah_dataset" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Dataset</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label>Konten</label>
            <textarea type="text" name="konten" class="form-control" rows="5" required></textarea>
          </div>

          <div class="form-group">
            <label>Label</label>
            <select class="form-control" name="label">
              <option value="label">-- Pilih Label--</option>
              <option value="Hoax">Hoax</option>
              <option value="Fakta">Fakta</option>
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
    $konten = $_POST['konten'];
    $label = $_POST['label'];
    if($label!="label"){
      $koneksi->query("INSERT INTO dataset VALUES ('','$konten','$label')");
      echo "<script>alert('Dataset telah ditambah');</script>";
      echo "<script>location='index.php?halaman=perbaharui_model';</script>";
    }else{
      echo "<script>alert('Gagal! Pilih salah satu label terlebih dahulu.');</script>";
      echo "<script>location='index.php?halaman=perbaharui_model';</script>";  
    }
    
  }

?>
