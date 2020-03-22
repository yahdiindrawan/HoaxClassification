<?php
	$koneksi->query("DELETE FROM lapor_hoax WHERE id_lapor='$_GET[id]'");

	echo "<script>alert('Data laporan telah dihapus');</script>";
	echo "<script>location='index.php?halaman=lapor_hoax';</script>";

?>