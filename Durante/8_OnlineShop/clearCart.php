<?php session_start();
    $SESSION['carrello'] = array();
    session_destroy();
    session_unset();
    echo "Carrello pulito, arrivederci";
    header("Location: carrello.php");