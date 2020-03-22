<?php 
	if (isset($_POST['data'])) {
		echo $_POST['data'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post" id="form">
		<input type="hidden" name="data" id="data">
	</form>
	<button id="btn">Click me</button>
</body>
	<script>
	function click() {
		var data = "ini data";
		document.getElementById("data").value = data;
		document.getElementById("form").submit();
	}
	var klik = document.getElementById("btn");
	klik.addEventListener("click", click);
   </script>
</html>