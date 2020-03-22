<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data About</h6>
            </div>
            <div class="card-body">
              <section id="about" style="padding-top: 50px; min-height: 700px">
                <div class="container">
                  <div class="row about-container">
                    <?php
                          $ambil = $koneksi->query("SELECT * FROM about");
                          $about = $ambil->fetch_assoc()
                    ?>
                    <div class="col-lg-6 content order-lg-1 order-2">
                      <h2 class="title" style="text-transform:Capitalize"><?php echo $about['judul']; ?></h2>
                      <p align="justify"> &emsp;
                        <?php echo $about['isi']; ?>
                      </p>
                    </div>

                    <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
                  </div>
                <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#update_about"><i class="fas fa-edit fa-sm"></i>Edit</button>

                </div>

                
              </section><!-- #about -->

              <div class="modal" id="update_about" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update About Us</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Judul</label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $about['id'];?>">
                        <input type="text" name="judul" class="form-control" value="<?php echo $about['judul'];?>">
                      </div>

                      <div class="form-group">
                        <label>Isi</label>
                        <textarea type="text" name="isi" class="form-control" rows="10"><?php echo $about['isi'];?></textarea>
                      </div>

                      <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto" class="form-control" name="foto">
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
              </div>
              <!-- Modal -->
              <?php
                if(isset($_POST['update'])){
                  $namafoto = $_FILES['foto']['name'];
                  $lokasifoto = $_FILES['foto']['tmp_name'];
                  if(!empty($lokasifoto)){
                    // $folder = "../img/about/";
                    // $width_size = 480;

                    // $file_save = $folder . $upload_image;
                    // move_uploaded_file($lokasifoto, $file_save);

                    // $resize_image = $folder."resize_".uniqid(rand()).".jpg";

                    // list($width,$height) = getimagesize($file_save);
                    // $k = $width/$width_size;
                    // $newwidth = $width/$k;
                    // $newheight = $height/$k;
                    // $thumb = imagecreatetruecolor($newwidth, $newheight);
                    // $source = imagecreatefromjpeg($file_save);
                    // imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    // imagejpeg($thumb,$resize_image);
                    // imagedestroy($thumb);
                    // imagedestroy($source);


                    // list($lebar,$tinggi)= getimagesize($lokasifoto);
                    // $file_baru = imagecreatepng ($lokasifoto);
                    // $warna_baru = imagecreatetruecolor($lebar, $tinggi);
                    // imagecopyresampled($warna_baru, $file_baru, 0, 0, 0, 0, 400, 500, $lebar, $tinggi);
                    // imagepng($warna_baru,$lokasifoto,9);
                    // move_uploaded_file($file_baru, "../img/about/$namafoto");
                    move_uploaded_file($lokasifoto, "../img/about/$namafoto");
                    $koneksi->query("UPDATE about SET judul='$_POST[judul]', isi='$_POST[isi]', foto='$namafoto' 
                      WHERE id='$_POST[id]'");
                  }
                  else{
                    $koneksi->query("UPDATE about SET judul='$_POST[judul]', isi='$_POST[isi]' 
                      WHERE id='$_POST[id]'");
                  }
                  echo "<script>alert('data about telah diubah');</script>";
                  echo "<script>location='index.php?halaman=about';</script>";
                }
              ?>

            </div>
