<?php session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    $SESSION['username'] = null;
    echo "Disconnessione eseguita, arrivederci";
    header("Location: login.php");