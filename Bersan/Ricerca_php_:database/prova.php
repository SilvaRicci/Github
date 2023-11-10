<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Cognome</th>
      <th scope="col">Classe</th>
      <th scope="col">Sezione</th>
      <th scope="col">Indirizzo</th>
    </tr>
  </thead>
  <tbody>
  <?php

include "connessione.php";

$result = $db_connection->query("SELECT ID, Nome, Cognome, Classe, Sezione, Indirizzo FROM studenti");		            //query va ad eseguire quello che c'è dentro la parentesi, tutto il risultato va su result 
$rows=$result->num_rows;	//result ha tutti i dati della tabella			    //calcola il numero di righe e lo salva in rows  //metodo num_rows calcola quante righe ci sono 



if($rows>0){
   while($row=$result->fetch_assoc()){							                //assoc prende i risultati da result e controlla riga per riga (questo è un array associativo in row)
   echo "
   <tr>
     <th>$row[ID]</th>
     <td>$row[Nome]</td>
     <td>$row[Cognome]</td>
     <td>$row[Classe]</td>
     <td>$row[Sezione]</td>
     <td>$row[Indirizzo]</td>
     
     </tr>";
   }
}

?>
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>