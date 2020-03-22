<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Testing</h6>
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
          $ambil=$koneksi->query("SELECT * FROM testing");
          while($testing=$ambil->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td>
            <?php 
              if(strlen($testing['konten'])>=200){
              $text = $testing['konten'];
              $num_char = 200;
              $cut_text = substr($text, 0, $num_char);
                if ($text{$num_char - 1} != ' ') { // jika huruf ke 50 (50 - 1 karena index dimulai dari 0) buka  spasi
                  $new_pos = strrpos($cut_text, ' '); // cari posisi spasi, pencarian dari huruf terakhir
                  $cut_text = substr($text, 0, $new_pos);
                }
              echo $cut_text . '...' ;
              }
              else{
                echo $testing['konten'];
              }
            ?>
          </td>
          <td><?php echo $testing['label'];?></td>
          <td>
            <a href="index.php?halaman=detail_testing&id=<?php echo $testing['id_testing'] ;?>" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
          </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

