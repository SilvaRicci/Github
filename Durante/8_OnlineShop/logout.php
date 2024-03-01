<?php session_start();
    $SESSION = array();
    session_destroy();
    echo "Disconnessione riuscita, arrivederci";
    header("Location: login.php");