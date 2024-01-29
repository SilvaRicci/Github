<?php
    include "../config/path.php";
    include $CONN_PATH;
    session_start();
    if(!isset($_SESSION['username'])){
      header("Location: $LOGIN_PATH");
    }else{

        $CF = $_GET['CF'];

        $query = "DELETE FROM `utente` WHERE `CF_utente` = '$CF'";
        
        $db_connection->query($query);                      
        
        $db_connection->close();

        header("Location: utenti.php");
    }
