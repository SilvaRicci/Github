<?php session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    $SESSION['username'] = null;
    session_destroy();
    session_unset();
    echo "Disconnessione eseguita, arrivederci";
    header("Location: login.php");