<?php 
	require_once "koneksi.php";

	$readSQL = "SELECT * FROM konten";
	$readList = $conn->prepare($readSQL);
	$readList->execute();
	$todoList = $readList->fetchall();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
</head>
<body>
	<h1>Todo Do List</h1>
	<form action="submit.php" method="post">
		<input type="text" name="description">
		<input type="submit" name="Submit">
	</form>
	<p>Daftar to do list</p>
	<ul>
		<?php foreach ($todoList as $todo): ?>
			<li>
				<?php echo $todo["description"]; ?>|
				<a href="delete.php?id=<?php echo $todo['ID']; ?>">Delete</a>|
				<a href="update.php?id=<?php echo $todo['ID']; ?>">Update</a>
			</li>
		<?php endforeach; ?>
	</ul>
</body>
</html>