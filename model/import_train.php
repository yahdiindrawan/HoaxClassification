<?php
	include '../admin/koneksi.php';
	$result = file_get_contents('data_train.json');
	$hasil = json_decode($result, TRUE);	
	echo count($hasil['label'][0]);
	// for($i=3130; $i<count($hasil['data_training'][0]); $i++){
	// 	$data_training = $hasil['data_training'][0][$i];
	// 	echo $data_training; echo "<br>";
	// 	$label = $hasil['label'][0][$i];
	// 	$label_training = "";
	// 	if($label=='1'){
	// 		$label_training = "Hoax";
	// 	}else{
	// 		$label_training = "Fakta";
	// 	}
	// 	echo $label_training; echo "<br>";
	// 	echo $i;
	// 	$koneksi->query("INSERT INTO training VALUES ('','$data_training','$label_training')");
		
	// }
	//echo var_dump(count($hasil['data_testing'][0]));