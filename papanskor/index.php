<?php 
    require_once "connection.php";

    $readSQL = "SELECT * FROM papanskor";
	$readList = $conn->prepare($readSQL);
	$readList->execute();
	$todoList = $readList->fetchall();
    
    $berlangsung = true;

    if(isset($_GET["do"])){
        switch ($_GET["do"]) {
            case 'tambahA':
                $skor = $todoList[0]["skorA"];
                $skor++;
                $query = $conn->prepare("UPDATE papanskor SET skorA = :skor WHERE id = 1");
                break;
            case 'tambahB':
                $skor = $todoList[0]["skorB"];
                $skor++;
                $query = $conn->prepare("UPDATE papanskor SET skorB = :skor WHERE id = 1");
                break;
            case 'kurangA':
                $skor = $todoList[0]["skorA"];
                if($skor > 0){
                    $skor--;
                }
                $query = $conn->prepare("UPDATE papanskor SET skorA = :skor WHERE id = 1");
                break;
            case 'kurangB':
                $skor = $todoList[0]["skorB"];
                if($skor > 0){
                    $skor--;
                }
                $query = $conn->prepare("UPDATE papanskor SET skorB = :skor WHERE id = 1");
                break; 
            case 'selesai':
                $berlangsung = false;
                break;       
            default:
                break;
        }
        if($berlangsung){
            $query->bindParam(':skor', $skor);
            $query->execute();
        }
        
    }

	$readList = $conn->prepare($readSQL);
	$readList->execute();
	$todoList = $readList->fetchall();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Papan Skor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1 style="font-size:300%; text-align:center; font-family: Arial, Helvetica, sans-serif; color:darkkhaki;">
        <?php echo $todoList[0]["timA"]; ?> - <?php echo $todoList[0]["timB"]; ?>
    </h1>
    <h1 style="font-size:1000%; text-align:center; font-family: Arial, Helvetica, sans-serif">
        <?php echo $todoList[0]["skorA"]; ?> - <?php echo $todoList[0]["skorB"]; ?>
    </h1>
    <?php if($berlangsung) : ?>
    <h1 style="text-align:center;">
        <a href="index.php?do=tambahA">Tambah</a> ---
        <a href="index.php?do=tambahB">Tambah</a> <br>
        <a href="index.php?do=kurangA">Kurang</a> ---
        <a href="index.php?do=kurangB">Kurang</a>
    </h1>
    <h1 style="text-align:center">
        <a href="index.php?do=selesai">Pertandingan selesai</a>
    </h1>
    <?php else: ?>
    <h1 style="text-align:center">
        Pertandingan telah selesai
    </h1>
    <?php endif; ?>
</body>
</html>