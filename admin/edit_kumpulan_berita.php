<?php
	$ambil = $koneksi->query("SELECT * FROM kumpulan_berita WHERE id_berita='$_GET[id]'");
	$berita = $ambil->fetch_assoc();

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Berita</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post">
			<div class="form-group">
        <label>Judul</label>
        <input type="hidden" class="form-control" name="id" value="<?php echo $berita['id_berita'] ?>" required>
        <input type="text" class="form-control" name="judul" value="<?php echo $berita['judul'] ?>" required>
      </div>

      <div class="form-group">
        <label>Link</label>
        <input type="url" name="link" class="form-control"value="<?php echo $berita['link_berita'] ?>" required>
      </div>

      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo $berita['tanggal'] ?>" required>
      </div>
            
      <div class="form-group">
        <label>Sumber</label>
        <select class="form-control" name="sumber">
          <option>--Pilih Sumber--</option>
          <?php 
            $ambil=$koneksi->query("SELECT * FROM partner");
            while($partner=$ambil->fetch_assoc()){
              if($partner['id_partner']==$berita['id_partner']){ ?>
                <option value="<?php echo $partner['id_partner'];?>" selected><?php echo $partner['nama_partner'];?></option>
        <?php  } else { ?>
                <option value="<?php echo $partner['id_partner'];?>"><?php echo $partner['nama_partner'];?></option>
        <?php  } $no++ ?>
                
        <?php } ?>
        </select>
      </div>

			<button class="btn btn-primary" name="update">Update</button>
		</form>
      </div>
    </div>
</div>

<?php
  if(isset($_POST['update'])){
      $id_berita = $_POST['id'] ;
      $judul = $_POST['judul'];
      $link = $_POST['link'];
      $tanggal = $_POST['tanggal'];
      $id_partner = $_POST['sumber'];
      $koneksi->query("UPDATE kumpulan_berita SET judul='$judul', link_berita='$link', tanggal='$tanggal', id_partner='$id_partner' WHERE id_berita='$id_berita'");
      echo "<script>alert('Data berita telah diubah');</script>";
      echo "<script>location='index.php?halaman=kumpulan_berita';</script>";
    }
?>