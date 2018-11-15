<?php
    include __DIR__ . "/config/db.php";
    include __DIR__ . "/config/auth.php";

    $pageWhitelist = ["register", "login", "dashboard"];
    if(isset($_GET["page"])){
        if(!in_array($_GET["page"], $pageWhitelist)){
            echo "Halaman tidak ditemukan";
        }else{
            include __DIR__ . "/view/" . $_GET["page"] . ".php";
        }
    }else if(isset($_GET["action"])){
        $actionWhitelist = ["register", "login"];
        if(!in_array($_GET["action"], $actionWhitelist)){
            echo "Aksi tidak ditemukan";
        }else{
            include __DIR__ . "/controller/" . $_GET["action"] . ".php";
        }
    }else{
        include __DIR__ . "/view/home.php";
    }
?>