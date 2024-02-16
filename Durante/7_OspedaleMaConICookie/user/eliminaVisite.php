<?php
    include "../config/path.php";
    include $CONN_PATH;
    session_start();
    if(!isset($_SESSION['CF'])){
      header("Location: $LOGIN_PATH");
    }else{

        $CF = $_SESSION['CF'];
        $id = $_GET['id'];

        $query = "DELETE FROM `visita` WHERE `CF_utente` = '$CF' AND `id` = '$id'";
        
        $db_connection->query($query);                      
        
        $db_connection->close();

        header("Location: visite.php");
    }
