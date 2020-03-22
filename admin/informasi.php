<?php
    $ambil = $koneksi->query("SELECT * FROM informasi");
    $informasi = $ambil->fetch_assoc()
?>
<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#update_informasi"><i class="fas fa-edit fa-sm"></i>&nbsp;Update Informasi</button>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Informasi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="responsive table table-bordered" id="tabel-informasi" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Desclaimer</th>
                      <th>About</th>
                      <th data-priority="1">Email</th>
                      <th data-priority="2">Whatsapp</th>
                    </tr>
                  </thead>
                  <tbody>
                   <tr>
                    <td><?php echo $informasi['disclaimer'];?></td>
                    <td><?php echo $informasi['about'];?></td>
                    <td><?php echo $informasi['email'];?></td>
                    <td><?php echo $informasi['whatsapp'];?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

         <div class="modal" id="update_informasi" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Informasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $informasi['email'];?>" required>
                      </div>

                      <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" name="telpon" class="form-control" value="<?php echo $informasi['telpon'];?>" required>
                      </div>

                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control"  value="<?php echo $informasi['harga'];?>" required>
                      </div>

                      <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" class="form-control" value="<?php echo $informasi['instagram']; ?>" required>
                      </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          <?php
            if(isset($_POST['update'])){
                  $koneksi->query("UPDATE informasi SET email='$_POST[email]', telpon='$_POST[telpon]', harga='$_POST[harga]', 
                    instagram='$_POST[instagram]'");
                
                echo "<script>alert('data informasi telah diubah');</script>";
                echo "<script>location='index.php?halaman=information';</script>";
              }
          ?>