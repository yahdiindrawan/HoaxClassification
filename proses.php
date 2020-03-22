<?php
	include 'admin/koneksi.php';
	if(isset($_GET['text'])){
		$data = $_GET['text'];
		$tanggal=date('Y-m-d');
		$array = array('data' => $data);
		$hasil = shell_exec("python model/prediksi.py " . base64_encode(json_encode($array)));
		$hasil = json_decode($hasil);
		$data = addslashes($data);
		$case_folding = implode(' ', $hasil->case_folding);
		$remove_punctuation = implode(' ', $hasil->remove_punctuation);
		$remove_punctuation = implode(' ', $hasil->remove_punctuation);
		$remove_number = implode(' ', $hasil->remove_number);
		$remove_whitespace = implode(' ', $hasil->remove_whitespace);
		$tokenizing = addslashes($hasil->tokenizing);
		$stopword = addslashes($hasil->stopword);
		$stemming = addslashes($hasil->stemming);
		$hasil_preprocessing = addslashes($hasil->hasil_preprocessing);
		$vektor = $hasil->vektor;
		$probabilitas = $hasil->probabilitas;
		$probabilitas_pembulatan = $hasil->probabilitas_pembulatan;
		$klasifikasi = $hasil->klasifikasi;
		
		$koneksi->query("INSERT INTO cek_hoax VALUES ('','$data','$tanggal','$case_folding','$remove_punctuation','$remove_number','$remove_whitespace','$tokenizing','$stopword','$stemming','$hasil_preprocessing','$vektor','$probabilitas','$probabilitas_pembulatan','$klasifikasi')");
		$output = array(
			'status' => 'sukses',
			'text_send' =>$data,
			'case_folding' => $hasil->case_folding,
			'remove_punctuation' => $hasil->remove_punctuation,
			'remove_number' => $hasil->remove_number,
			'remove_whitespace' => $hasil->remove_whitespace,
			'tokenizing' => $hasil->tokenizing,
			'stopword' => $hasil->stopword,
			'stemming' => $hasil->stemming,
			'hasil_preprocessing' => $hasil->hasil_preprocessing,
			'vektor' => $hasil->vektor,
			'probabilitas' => $hasil->probabilitas,
			'probabilitas_pembulatan' => $hasil->probabilitas_pembulatan,
			'klasifikasi' => $hasil->klasifikasi
		);
		
	}else{
		$output = array('status' => 'error, cek_berita empty');
	}

	echo json_encode($output);
	
?>