<?php
	$koneksi->query("DELETE FROM fasilitas WHERE id='$_GET[id]'");

	echo "<script>alert('data fasilitas terhapus');</script>";
	echo "<script>location='index.php?halaman=fasilitas';</script>";
?>