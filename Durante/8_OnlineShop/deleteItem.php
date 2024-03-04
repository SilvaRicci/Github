<?php
    session_start();
    $id = $_GET['id'];
    $_SESSION['carrello'][$id] = null;
    echo "Prodotto con id: ".$id." eliminato con successo!";
    header("Location: carrello.php");