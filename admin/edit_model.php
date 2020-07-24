<?php
	$ambil = $koneksi->query("SELECT * FROM dataset WHERE id_dataset='$_GET[id]'");
	$dataset = $ambil->fetch_assoc();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Dataset!</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post">
      <div class="form-group">
        <label>Konten</label>
        <input type="hidden" class="form-control" name="id_dataset" value="<?php echo $dataset['id_dataset'];?>">
        <textarea type="text" name="konten" class="form-control" rows="5" required><?php echo $dataset['konten']?></textarea>
      </div>

      <div class="form-group">
        <label>Label</label>
        <select class="form-control" name="label">
          <option value="label">--Pilih Label--</option>
          <?php
            if($dataset['label']=="Hoax"){ ?>
              <option value="Hoax" selected>Hoax</option>
              <option value="Fakta">Fakta</option>
    <?php   }else{ ?>
              <option value="Hoax">Hoax</option>
              <option value="Fakta" selected>Fakta</option>
    <?php   }
          ?>
        </select>
      </div>

      <a href="index.php?halaman=perbaharui_model" class="btn btn-secondary">Back</a>&nbsp;
			<button class="btn btn-primary" name="update">Update</button>
		</form>
      </div>
    </div>
</div>
<?php
  if(isset($_POST['update'])){
    $id_dataset = $_POST['id_dataset'];
    $konten = $_POST['konten'];
    $label = $_POST['label'];
    if($label!="label"){
      $koneksi->query("UPDATE dataset SET konten='$konten', label='$label' WHERE id_dataset='$id_dataset'");
      echo "<script>alert('Dataset telah diubah');</script>";
      echo "<script>location='index.php?halaman=perbaharui_model';</script>";
    }else{
      echo "<script>alert('Gagal! Pilih salah satu label terlebih dahulu.');</script>";
      echo "<script>location='index.php?halaman=perbaharui_model';</script>";  
    }
    
  }

?>