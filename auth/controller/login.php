<?php
    include __DIR__ . "/../config/db.php";

    if(isset($_POST['login'])){
        
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        //var_dump ($passHash);

        $loginSQL = "SELECT * FROM users WHERE username = :user";
        $query = $conn->prepare($loginSQL);
        $query->bindParam(":user", $user);
        $query->execute();

        $dbHash = $query->fetch()['password'];
        
        if (password_verify($pass, $dbHash)) {
            $_SESSION['login']=[
                "username" => $user,
                "password" => $dbHash
            ];
            header("Location: ?page=dashboard");
        }else{
            header("Location: ?page=login&msg=Username/Password Salah!");
        }     
    }
?>