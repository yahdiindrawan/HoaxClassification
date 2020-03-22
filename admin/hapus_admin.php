<?php
	$koneksi->query("DELETE FROM admin WHERE id_admin='$_GET[id]'");

	echo "<script>alert('Data telah dihapus');</script>";
	echo "<script>location='index.php?halaman=admin';</script>";
?>