<?php
    require_once "koneksi.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $deleteQuery = "DELETE FROM konten WHERE ID = :id";
        $query = $conn->prepare($deleteQuery);
        $query->bindParam(':id', $id);
        $query->execute();

		header("Location: index.php");
    }
?>