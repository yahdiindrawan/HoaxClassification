<?php
	$koneksi->query("DELETE FROM kumpulan_berita WHERE id_berita='$_GET[id]'");

	echo "<script>alert('Data berita telah dihapus');</script>";
	echo "<script>location='index.php?halaman=kumpulan_berita';</script>";
?>