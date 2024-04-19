<?php
    include "connessione.php";

    $query = "SELECT imageData FROM `tbl_image` WHERE `imageId` = '5'";
    $result = $db_connection->query($query);
    $row = $result->fetch_array();
?>
<img src="sesso" width = "80px" height = "80px/> 

