<?php session_start();
    $SESSION = array();
    session_destroy();
    echo "Carrello pulito, arrivederci";
    header("Location: index.php");