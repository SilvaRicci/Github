<?php
include "connessione.php";



if (isset($_POST["invia"])) {
    $codice_fiscale = $_POST["codice_fiscale"];
    $password = $_POST["password"];

    echo "cf: " . $codice_fiscale;
    echo "---------password: " . $password; 

    //creo una query che selezioni dal database la rig che ha questo cf e passwors
    $sql = <<<RICERCA
    SELECT * from clienti_20_11_2023
    where codice_fiscale = '$codice_fiscale'
    and password = '$password';
    RICERCA;

    $result = $db_connection->query($sql);
    $rows = $result->num_rows;

    if($rows > 0){
        echo "utente trovato ";
    }else{
        echo "utente non trovato ";
    }

    $db_connection->close();
}
?>