<button class="btn btn-sm btn-primary mb-3" onclick="window.location.href='index.php?halaman=proses_cek'"><i class="fas fa-search fa-sm"></i>&nbsp;Cek Hoax</button>
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
            <th>Tanggal</th>
            <th>Konten</th>
            <th>Klasifikasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          $ambil=$koneksi->query("SELECT * FROM cek_hoax ORDER BY id_cek DESC");
          while($cek=$ambil->fetch_assoc()){  
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $cek['tanggal'];?></td>
          <td>
            <?php 
              if(strlen($cek['konten'])>=200){
              $text = $cek['konten'];
              $num_char = 200;
              $cut_text = substr($text, 0, $num_char);
                if ($text{$num_char - 1} != ' ') { // jika huruf ke 50 (50 - 1 karena index dimulai dari 0) buka  spasi
                  $new_pos = strrpos($cut_text, ' '); // cari posisi spasi, pencarian dari huruf terakhir
                  $cut_text = substr($text, 0, $new_pos);
                }
              echo $cut_text . '...' ;
              }
              else{
                echo $cek['konten'];
              }
            ?>
          </td>
          <td><?php echo $cek['klasifikasi'];?></td>
          <td>
            <a href="index.php?halaman=detail_cek&id=<?php echo $cek['id_cek'] ;?>" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
            <a href="index.php?halaman=hapus_cek&id=<?php echo $cek['id_cek'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
  