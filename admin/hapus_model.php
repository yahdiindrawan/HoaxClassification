<?php
	$koneksi->query("DELETE FROM dataset WHERE id_dataset='$_GET[id]'");

	echo "<script>alert('Data dataset telah dihapus');</script>";
	echo "<script>location='index.php?halaman=perbaharui_model';</script>";

?>