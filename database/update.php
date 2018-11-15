<?php
    require_once "koneksi.php";

    if(isset($_GET['id'])) :
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Entry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Update entry</h1>
    <form action="update.php" method="post">
        <input type="text" name="description">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<input type="submit" name="Submit">
    </form>
</body>
</html>

<?php
    endif;

    if(isset($_POST['description'])){
        $id = (int) $_POST['id'];
        $description = $_POST['description'];
        $updateQuery = "UPDATE konten SET description = :description WHERE ID = :id";
        $query = $conn->prepare($updateQuery);
        $query->bindParam(':description', $description);
        $query->bindParam(':id', $id);
        $query->execute();

		header("Location: index.php");
    }
?>