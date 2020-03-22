<?php
	$ambil = $koneksi->query("SELECT * FROM testing WHERE id_testing='$_GET[id]'");
	$testing = $ambil->fetch_assoc();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Data Testing</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
		<form method="post">
			<div class="form-group">
        <strong><label>Konten</label></strong>
        <br>
        <input type="hidden" class="form-control" name="id_testing" value="<?php echo $testing['id_testing'];?>">
        <p><?php echo $testing['konten']?></p>
      </div>

      <div class="form-group">
        <strong><label>Label</label></strong>
        <br>
        <p><?php echo $testing['label']?></p>
      </div>

      <a href="index.php?halaman=testing" class="btn btn-primary">Back</a>
		</form>
      </div>
    </div>
</div>
