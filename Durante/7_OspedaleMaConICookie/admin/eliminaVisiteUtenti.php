<?php
    include "../config/path.php";
    include $CONN_PATH;
    session_start();
    if(!isset($_SESSION['username'])){
      header("Location: $LOGIN_PATH");
    }else{

        $id = $_GET['id'];

        $query = "DELETE FROM `visita` WHERE `id` = '$id'";
        
        $db_connection->query($query);                      
        
        $db_connection->close();

        header("Location: visiteUtenti.php");
    }
