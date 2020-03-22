<?php
	$koneksi->query("DELETE FROM cek_hoax WHERE id_cek='$_GET[id]'");

	echo "<script>alert('Data telah dihapus');</script>";
	echo "<script>location='index.php?halaman=cek_hoax';</script>";
?>