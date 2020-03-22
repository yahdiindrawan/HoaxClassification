<?php
	include '../admin/koneksi.php';
	$result = file_get_contents('data_test.json');
	$hasil = json_decode($result, TRUE);
	// for($i=0; $i<count($hasil['data_testing'][0]); $i++){
	// 	$data_testing = $hasil['data_testing'][0][$i];
	// 	echo $data_testing; echo "<br>";
	// 	$label = $hasil['label'][0][$i];
	// 	$label_testing = "";
	// 	if($label=='1'){
	// 		$label_testing = "Hoax";
	// 	}else{
	// 		$label_testing = "Fakta";
	// 	}
	// 	echo $label_testing;
	// 	echo $i; echo "<br>";
	// 	$koneksi->query("INSERT INTO testing VALUES ('','$data_testing','$label_testing')");
		
	// }
	//echo var_dump(count($hasil['data_testing'][0]));