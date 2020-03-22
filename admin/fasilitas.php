<?php
    $ambil = $koneksi->query("SELECT * FROM fasilitas");
    $fasilitas = $ambil->fetch_assoc()
?>
 <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_fasilitas"><i class="fas fa-plus fa-sm"></i>&nbsp;Tambah Fasilitas</button>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Fasilitas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    $no=1;
                    $ambil=$koneksi->query("SELECT * FROM fasilitas");
                    while($fasilitas=$ambil->fetch_assoc()){
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $fasilitas['nama'];?></td>
                    <td>
                      <a href="index.php?halaman=hapusfasilitas&id=<?php echo $fasilitas['id'] ;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i>&nbsp;Delete</a>                      
                    </td>
                  </tr>
                  <?php $no++; } ?>

                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal" id="tambah_fasilitas" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Fasilitas</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $fasilitas['id'];?>">
                        <input type="text" name="nama" class="form-control" value="<?php echo $fasilitas['nama'];?>">
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
                    $koneksi->query("INSERT INTO fasilitas (nama) values ('$_POST[nama]')");
                  
                  echo "<script>alert('data fasilitas telah ditambah');</script>";
                  echo "<script>location='index.php?halaman=fasilitas';</script>";
                  }
                  

              ?>