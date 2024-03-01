<?php session_start();
    $SESSION = array();
    session_destroy();
    session_unset();
    echo "Carrello pulito, arrivederci";
    header("Location: index.php");