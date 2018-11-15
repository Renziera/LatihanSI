<?php

    if(isset($_POST['register'])){
        include __DIR__ . "/../config/db.php";
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        //var_dump ($passHash);

        $registerSQL = "INSERT INTO users(username, password) VALUE (:user, :password)";
        $query = $conn->prepare($registerSQL);
        $query->bindParam(":user", $user);
        $query->bindParam(":password", $passHash);
        $query->execute();

        echo "Register berhasil";
    }
?>