<?php
    include "connessione.php";

    $query = "SELECT * FROM `tbl_image` WHERE 1";
    $result = $db_connection->query($query);
    $row = $result->fetch_array();

    echo 
    `<img src = "data:image/png;base64,' . base64_encode(`.$row['imageData'].`) . '" width = "80px" height = "80px"/>`
?>


