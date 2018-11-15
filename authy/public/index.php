<?php
    session_start();

    require __DIR__ . "/../bootstrap/config.php";
    require __DIR__ . "/../bootstrap/middleware.php";


    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $whiteListPage = ["login", "register", "home"];

        if(!in_array($page, $whiteListPage)){
            include __DIR__ . "/../view/404.php";
        }else{
            include __DIR__ . "/../view/" . $page . ".php";
        }
        return;
    }

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        $whiteListAction = ["login", "register", "logout"];

        if(!in_array($action, $whiteListAction)){
            include __DIR__ . "/../view/404.php";
        }else{
            include __DIR__ . "/../controller/" . $action . ".php";
        }
        return;
    }

    redirectIfNotAuthenticated();
    include __DIR__ . "/../view/home.php";
?>