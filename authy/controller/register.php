<?php
    redirectIfAuthenticated();

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $ifUserExistQuery = $conn->prepare("SELECT 1 FROM users WHERE username = :username");
        $ifUserExistQuery->bindParam(":username", $username);
        $ifUserExistQuery->execute();

        $errors = array();

        if($ifUserExistQuery->fetchColumn()){
            $errors['taken'] = "Username sudah terdaftar";
        }

        if($username == ""){
            $errors['username'] = "Username tidak boleh kosong";
        }

        if($password == ""){
            $errors['password'] = "Password tidak boleh kosong";
        }

        if(!empty($errors)){
            header("location: index.php?page=register&errors=".base64_encode(urlencode(serialize($errors))));
            return;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $insertQuery = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $insertQuery->bindParam(":username", $username);
        $insertQuery->bindParam(":password", $passwordHash);
        $insertQuery->execute();

        $_SESSION['login'] = array(
            "auth" => true,
            "username" => $username
        );

        header("Location: /xampp/authy/public/index.php");
        return;
    }
?>