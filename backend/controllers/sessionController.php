<?php 

    session_start();

    if (!isset($_SESSION['user'])) {
        if($page = "home") {
            header("Location: ../login.php");
        } else {
            header("Location: ../login.php");
        }
    };

    $sessionUser = $_SESSION['user'];
    $sessionLayoutType = 1;

    if ($pageAccess == $sessionUser OR $pageAccess == "allUser") {

        if($sessionUser == "Kasir") {
            $sessionLayoutType = 1;
        } else if ($sessionUser == "Komisaris") {
            $sessionLayoutType = 2;
        }

    } else {

        header("Location: $redirect");
        exit();

    }

    