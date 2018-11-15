<?php
    redirectIfNotAuthenticated();

    $_SESSION['login'] = array(
        "auth" => false,
        "username" => null
    );

    header("Location: /xampp/authy/public/index.php");
    return;
?>