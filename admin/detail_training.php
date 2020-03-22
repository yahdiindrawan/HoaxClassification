<?php
	$ambil = $koneksi->query("SELECT * FROM training WHERE id_training='$_GET[id]'");
	$training = $ambil->fetch_assoc();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Data Training</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post">
      <div class="form-group">
        <strong><label>Konten</label></strong>
        <br>
        <input type="hidden" class="form-control" name="id_training" value="<?php echo $training['id_training'];?>">
        <p><?php echo $training['konten']?></p>
      </div>

      <div class="form-group">
        <strong><label>Label</label></strong>
        <br>
        <p><?php echo $training['label']?></p>
      </div>

      <a href="index.php?halaman=training" class="btn btn-primary">Back</a>
		</form>
      </div>
    </div>
</div>
