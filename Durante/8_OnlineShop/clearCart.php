<?php session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    $SESSION['carrello'] = array();
    echo "Carrello pulito, arrivederci";
    header("Location: carrello.php");