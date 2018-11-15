<?php

    if(!isset($_SESSION['login'])){
        $_SESSION['login'] = array(
            "auth" => false,
            "username" => null
        );
    }

    function redirectIfAuthenticated(){
        if($_SESSION['login']['auth']){
            header("Location: index.php?page=home");
        }
        return;
    }

    function redirectIfNotAuthenticated(){
        if(!$_SESSION['login']['auth']){
            header("Location: index.php?page=login");
        }
        return;
    }
?>