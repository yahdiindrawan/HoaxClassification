
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pengujian</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="tabel-cek">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total Dataset</th>
            <th>Data Training</th>
            <th>Data Testing</th>
            <th>Presisi</th>
            <th>Recall</th>
            <th>Akurasi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no=1;
          $ambil=$koneksi->query("SELECT * FROM pengujian ORDER BY TANGGAL DESC");
          while($pengujian=$ambil->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $pengujian['tanggal'];?></td>
          <td><?php echo $pengujian['total_dataset'];?></td>
          <td><?php echo $pengujian['data_latih'];?></td>
          <td><?php echo $pengujian['data_test'];?></td>
          <td><?php echo $pengujian['presisi'];?></td>
          <td><?php echo $pengujian['recall'];?></td>
          <td><?php echo $pengujian['akurasi'];?></td>        
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
