<?php 
	require_once "koneksi.php";

	if(isset($_POST["description"])){
		$description = $_POST["description"];

		$insertSQL = "INSERT INTO konten (description) VALUES (:description)";
		$query = $conn->prepare($insertSQL);
		$query->bindParam(':description', $description);
		$query->execute();

		header("Location: index.php");
	}else {
		echo "Hmmm";
	}
?>