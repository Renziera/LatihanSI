<?php
	$hasNIM = false;
	if ($hasNIM = isset($_POST["nim"])) {
		$nim = $_POST["nim"];
		$regexNIM = '/^\d{2}\/\d{6}\/[A-Z]{2,3}\/\d{5}$/';

		if (!preg_match($regexNIM, $nim)) {
			$msg = "NIM tidak valid";
		}else{
			$msg = "NIM valid";
		}
	}
?>

<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
	<h1>Cek NIM gan</h1>
	<form action="" method="post">
		<p>NIM anda: </p>
		<input type="text" name="nim">
		<input type="submit" name="cek">
	</form> 
	<p>
		<?php if($hasNIM): ?>
			<?php echo $msg ?>
		<?php endif; ?>
	</p>
 </body>
 </html>