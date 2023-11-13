<?php

$db="Bersan";     		//nome del database (db in questo caso)
$db_host="localhost";		//dove vengo salvate tutte le informazioni del database (localhost)
$db_user="root";		    //nome utente del database
$db_password="";	        //password associato al nome utente 

$db_connection = new mysqli($db_host, $db_user, $db_password, $db);
if($db_connection->connect_error){		                                                        //la freccia è l'accesso a un metodo
  die("Si è verificato il seguente problema tecnico: " . $db_connection->connect_error);		//stampa il testo e stampa l'errore //die stampa e blocca il processo di esecuzione
}

?>
