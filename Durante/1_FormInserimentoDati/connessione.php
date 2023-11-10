<?php

$db = "Durante";                                                                                               //nome tabella database
$db_host = "localhost";                                                                                     //server host + porta su cui mi collego (127.0.0.1:8080)
$db_user = "root";                                                                                          //utente root del database
$db_password = "";                                                                               //psw di root

$db_connection = new mysqli($db_host,$db_user,$db_password,$db);                                            //oggetto che contiene la connessione alla determinata tabella ($db)

if($db_connection->connect_error){                                                                          //verifica eventuali errori riscontrati nella connessione
    die("Si e' verificato il seguente problema tecnico: " . $db_connection->connect_error);                 // -> in PHP = accesso ad un metodo
}                                                                                                           // echo della stringa interna e blocca lo script

?>