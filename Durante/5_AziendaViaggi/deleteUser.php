<?php include "connessione.php"; 
    session_start();
    if(!isset($_SESSION['id'])){
      header("Location: login.php");
    }

    $deleteUser = $_GET["deleteUser_btn"];

    $db_connection->query("DELETE FROM `utenti` WHERE `utenti`.`id_utente` = $deleteUser");

    header("Location: home.php");
?>