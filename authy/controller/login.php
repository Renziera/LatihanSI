<?php
    redirectIfAuthenticated();

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $loginQuery = $conn->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $loginQuery->bindParam(":username", $username);
        $loginQuery->execute();

        $dbPasswordHash = $loginQuery->fetch['password'];

        if(password_verify($password, $dbPasswordHash)){
            $_SESSION['login'] = array(
                "auth" => true,
                "username" => $loginQuery->fetch['username']
            );
            header("Location: /xampp/authy/public/index.php");
            return;
        }else{
            $error = base64_encode("Username atau password salah");
            header("Location: /xampp/authy/public/index.php?page=login&msg=" . $error);
            return;
        }
    }
?>